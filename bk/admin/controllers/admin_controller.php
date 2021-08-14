<?php
session_start ();
header ( 'Content-type: text/html; charset=utf-8' );
require ('../../connections/mall.php');
require ('../../class/SQLManager.php');

error_reporting(E_ALL);

$sql = new SQLManager ();
$sql->table = "admin";

// =============================== LOGIN ================================================
if (isset ( $_POST ['btn_login'] )) {
	$sql->field = "admin_id, admin_user, admin_type_id, admin_status";
	$sql->condition = sprintf ( "WHERE admin_user = %s AND admin_pass = %s",
				GetSQLValueString ( $_POST ['username'], "text" ), GetSQLValueString ( base64_encode ( $_POST ['password'] ), "text" ) );
	$rs = $sql->select ();
	$num = mysqli_num_rows ( $rs );
	if ($num != 0) {
		$row = mysqli_fetch_object ( $rs );

		if($row->admin_status == 'Y') {

			$_SESSION ['session_id'] = session_id ();
			$_SESSION ['admin_user'] = $row->admin_user;
			$_SESSION ['admin_type'] = $row->admin_type_id;


			// Config authorized page
			if($row->admin_type_id != '1' || $row->admin_type_id == 0) {

				$sql->field = "p.name";

				if($row->admin_type_id != 0) { // Authorized By Group

					$sql->table = "admin_type_authorize_page AS a
										INNER JOIN admin_page AS p ON a.admin_page_id = p.id";
					$sql->condition = "WHERE admin_type_id = ".GetSQLValueString($row->admin_type_id, "int");

				} else { // Manual Authorized

					$sql->table = "admin_authorize_page AS a
										INNER JOIN admin_page AS p ON a.admin_page_id = p.id";
					$sql->condition = "WHERE admin_id = ".GetSQLValueString($row->admin_id, "int");

				}
				$rsPage = $sql->select();

				$arrPage = array();
				while($page = mysqli_fetch_assoc($rsPage)) {
					array_push($arrPage, $page['name']);
				}

				require "../authorized/page_authorize.inc.php";
				setAuthorizePage($arrPage);

			}


			$location = '../index.php';
		} else {
			$alert = 'ท่านได้ถูกระงับสิทธิ์ในการเข้าถึงข้อมูล กรุณาติดต่อผู้ดูแลหลัก';
			$locationTop = '../signin.php';
		} // End Check Status
	} else {
		$alert = 'ชื่อผู้เข้าใช้งาน หรือรหัสผ่านไม่ถุกต้อง';
		$locationTop = '../signin.php';
	}

	echo $alert;

}
// ==================================END LOGIN ========================================

// =============================== LOGOUT================================================
if (isset ( $_GET ['logout'] )) {
	session_start ();
	unset($_SESSION['session_id']);
	unset($_SESSION['admin_user']);
	unset($_SESSION['admin_type']);
	unset($_SESSION['authorizePage']);
	$locationTop = '../signin.php';
}
// ==================================END LOGOUT ========================================

// ================================== ADD MEMBER =======================================
if(isset($_POST['btn_add'])) {
	if(!empty($_POST['user'])) {
		$sql->field = "admin_id";
		$sql->condition = sprintf("WHERE admin_user = %s",
								GetSQLValueString($_POST['username'], "text"));
		if(mysqli_num_rows($sql->select())) {
			$alert = "Username นี้ มีในระบบแล้ว กรุณาดำเนินการใหม่อีกครั้ง";
			$location = "../admin_add.php";
		} else {
			$sql->field = "admin_user, admin_pass, admin_name, admin_position, admin_email, admin_type_id, admin_status";
			$sql->value = sprintf("%s, %s, %s, %s, %s, %s, 'Y'",
								GetSQLValueString($_POST['user'], "text"),
								GetSQLValueString(base64_encode($_POST['pass']), "text"),
								GetSQLValueString($_POST['name'], "text"),
								GetSQLValueString($_POST['position'], "text"),
								GetSQLValueString($_POST['email'], "text"),
								GetSQLValueString($_POST['type'], "int"));
			if($sql->insert()) {

 				// Manual Authorized Page
				if($_POST['type'] == 0) {
					if(!empty($_POST['page'])) {
						$sql->field = "admin_id";
						$idMax = $sql->selectMax();
						for($i=0; $i < count($_POST['page']); $i++) {
							$sql->field = "admin_id, admin_page_id";
							$sql->table = "admin_authorize_page";
							$sql->value = sprintf("%s, %s",
											GetSQLValueString($idMax,"int"),
											GetSQLValueString($_POST['page'][$i], "int"));
							$sql->insert();
						}
					}
				}


				$alert = "เพิ่มข้อมูลเรียบร้อย";
				$location = "../admin.php";
			} else {
				$alert = "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง";
				$location = "../admin_add.php";
			}
		}
	} else {
		$alert = "ท่านยังไม่ได้กรอก Username";
		$location = "../admin_add.php";
	}
}
// ================================== END ADD MEMBER ===================================


// ================================== EDIT MEMBER ======================================
if(isset($_POST['btn_edit'])) {

	if(empty($_POST['pass'])) {
		$sql->field = "admin_pass";
		$sql->condition = "WHERE admin_id = ".GetSQLValueString($_POST['id'], "int");
		$row = mysqli_fetch_assoc($sql->select());
		$pass = $row['admin_pass'];
	} else {
		$pass = base64_encode($_POST['pass']);
	}

	if($_POST['id'] == 6) {
		$_POST['type'] = 1;
		$_POST['status'] = 'Y';
	}

	$sql->value = sprintf("admin_pass=%s, admin_name=%s, admin_position=%s, admin_email=%s, admin_type_id=%s, admin_status=%s",
								GetSQLValueString($pass, "text"),
								GetSQLValueString($_POST['name'], "text"),
								GetSQLValueString($_POST['position'], "text"),
								GetSQLValueString($_POST['email'], "text"),
								GetSQLValueString($_POST['type'], "int"),
								GetSQLValueString($_POST['status'], "text"));
	$sql->condition = "WHERE admin_id = ".GetSQLValueString($_POST['id'], "int");
	if($sql->update()) {

		// Manual Authorized Page
		if($_POST['type'] == 0) {

			// Delete Authorized Page Before update
			$sql->table = "admin_authorize_page";
			$sql->condition = "WHERE admin_id = ".GetSQLValueString($_POST['id'], "int");
			$sql->delete();

			if(!empty($_POST['page'])) {
				for($i=0; $i < count($_POST['page']); $i++) {
					$sql->field = "admin_id, admin_page_id";

					$sql->value = sprintf("%s, %s",
							GetSQLValueString($_POST['id'],"int"),
							GetSQLValueString($_POST['page'][$i], "int"));
					$sql->insert();
				}
			}
		}


		$alert = "บันทึกข้อมูลเรียบร้อย";
	} else {
		$alert = "เกิดข้อผิดพลาด กรุณาดำเนินใหม่อีกครั้ง";
	}

	$location = "../admin.php";

}
// ================================== END EDIT MEMBER ==================================


// ================================== DELETE MEMBER ====================================
if(isset($_GET['Delete'])) {
	$sql->condition =sprintf("WHERE admin_id = %s
						AND admin_id <> 6",
						GetSQLValueString($_GET['Delete'], "int"));

	if($sql->delete()) {

		// Delete Admin page authorize
		$sql->table = "admin_authorize_page";
		$sql->condition = "WHERE admin_id = ".GetSQLValueString($_GET['Delete'], "int");
		$sql->delete();

		$alert = "ลบข้อมูลเรียบร้อย";
	} else {
		$alert = "เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง";
	}

	$location = "../admin.php";
}
// ================================== END DELETE MEMBER ================================


// ================================== Change Password ==================================
if(isset($_POST['btn_pass'])) {
	session_start ();
	$sql->field = "admin_pass";
	$sql->condition = "WHERE admin_user = ".GetSQLValueString($_SESSION['admin_user'], "text");
	$row = mysqli_fetch_assoc($sql->select());

	if($row['admin_pass'] == base64_encode($_POST['oldPass'])) {
		$sql->value = sprintf('admin_pass= %s',
							GetSQLValueString(base64_encode($_POST['pass']),"text"));
		if($sql->update()) {
			$alert = 'แก้ไขข้อมูลเรียบร้อยแล้ว';
		} else {
			$alert = "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง";
		}
	} else {
		$alert = 'คุณกรอกรหัสเก่าไม่ถูกต้อง';
	}

	$location = "../change_pass.php";
}
// ================================== End Change Password ==============================



if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
	//================================================================ CHECK USERNAME =============================================
	if(isset($_GET['checkuser'])) {

		$sql->field = "admin_id";
		$sql->table = "admin";
		$sql->condition = sprintf("WHERE admin_user = %s",
							GetSQLValueString($_GET['checkuser'],"text"));
		if($sql->countRow()) {
			echo 1;
		} else {
			echo 0;
		}
	}
	//================================================================ END CHECK USERNAME =========================================
}

require "../../class/JsControl.php";
?>
