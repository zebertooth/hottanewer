<?php
header ( 'Content-type: text/html; charset=utf-8' );
require ('../authorized/admin_authorize.inc.php');
require '../../connections/mall.php';
require '../../class/PicManager.php';
require '../../class/SQLManager.php';


$Image = new PicManager ();
$sql = new SQLManager ();

$Image->new_picture_name = "banner";
$Image->new_random_name = true;
$Image->resize_type = "LessWidth";
$folder_thumb = "../../upload/banner/";
$thumb = "";
$thumb_en = "";

// =================================== ADD BANNER ==================================
if($_POST['hid_type'] == 'add'){


	if ($_FILES['banner']['name'] != "") {
		$Image->picture_tmp = $_FILES['banner']['tmp_name'];
		$Image->picture_name = $_FILES['banner']['name'];
		$Image->folder_resize = $folder_thumb;
		$Image->uploadPicture ( "1280", "", true, false );
		$thumb = $Image->new_picture_resize_name;
	}

	if ($_FILES['banner_en']['name'] != "") {
		$Image->picture_tmp = $_FILES['banner_en']['tmp_name'];
		$Image->picture_name = $_FILES['banner_en']['name'];
		$Image->folder_resize = $folder_thumb;
		$Image->uploadPicture ( "1280", "", true, false );
		$thumb_en = $Image->new_picture_resize_name;
	}



	$link = $_POST['link'];
	$show_web = $_POST['statusShow'];

	$sql->table="banner";
	$sql->field="banner, link, show_web, banner_en";
	$sql->value= sprintf("%s, %s, %s, %s",
			GetSQLValueString($thumb,"text"),
			GetSQLValueString($link,"text"),
			GetSQLValueString($show_web,"int"),
			GetSQLValueString($thumb_en,"text"));
	if($sql->insert()){
	    $alert = "เพิ่มที่รูป Banner เรียบร้อย";
	    $location = "../banner.php";
	}else{
	    $alert = "เกิดข้อผิดพลาด กรุณาตรวจสอบใหม่อีกครั้ง";
	    $location = "../banner_add.php";
	}
}
// ============================== END ADD BANNER ===================================

// ============================== EDIT BANNER ======================================
if($_POST['hid_type'] == 'edit'){
	$id = $_POST['hid_id'];

	$sql->field = "banner, banner_en";
	$sql->table = "banner";
	$sql->condition = "WHERE id = " . GetSQLValueString($id,"int");
	$rs = $sql->select ();
	$row = mysqli_fetch_assoc($rs);

	if ($_FILES ['banner'] ['name'] != "") {
		$Image->picture_tmp = $_FILES['banner']['tmp_name'];
		$Image->picture_name = $_FILES['banner']['name'];
		$Image->folder_resize = $folder_thumb;
		$Image->uploadPicture ( "2700", "", true, false );
		$thumb = $Image->new_picture_resize_name;

		if ($row['banner'] != "") {
			@unlink ( $folder_thumb . $row['banner'] );
		}
	} else {
		if(isset($_POST['del_banner'])) {
			if ($row['banner'] != "") {
				@unlink ( $folder_thumb . $row['banner'] );
			}
			$thumb = "";
		} else {
			$thumb = $row['banner'];
		}
	}

	if ($_FILES ['banner_en'] ['name'] != "") {
		$Image->picture_tmp = $_FILES['banner_en']['tmp_name'];
		$Image->picture_name = $_FILES['banner_en']['name'];
		$Image->folder_resize = $folder_thumb;
		$Image->uploadPicture ( "900", "", true, false );
		$thumb_en = $Image->new_picture_resize_name;

		if ($row['banner_en'] != "") {
			@unlink ( $folder_thumb . $row['banner_en'] );
		}

	} else {
		if(isset($_POST['del_banner_en'])) {
			if ($row['banner_en'] != "") {
				@unlink ( $folder_thumb . $row['banner_en'] );
			}
			$thumb_en = "";
		} else {
			$thumb_en = $row['banner_en'];
		}
	}

	$link = $_POST['link'];
	$show_web = $_POST['statusShow'];

	$sql->table="banner";
	$sql->value = sprintf("banner = %s, link = %s, show_web = %s, banner_en = %s",
				GetSQLValueString($thumb,"text"),
				GetSQLValueString($link,"text"),
				GetSQLValueString($show_web,"int"),
				GetSQLValueString($thumb_en,"text"));
	$sql->condition = "WHERE id = " . GetSQLValueString($id,"int");
	
	if( $sql->update() ){
	    $alert = "แก้ไขข้อมูลเรียบร้อย";
	    $location = "../banner.php";
	}else{
	    $alert = "เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง";
	    $location = "../banner_edit.php?id=".$id;
	}
}
// ============================== DELETE EDIT BANNER =================================

// ================================ DELETE BANNER ===================================
if( $_GET['Delete'] != "" ) {

	$sql->field = "banner, banner_en";
	$sql->table = "banner";
	$sql->condition = "WHERE id = " . GetSQLValueString($_GET['Delete'],"int");
	$rs = $sql->select ();
	$row = mysqli_fetch_assoc($rs);

	if ($row['banner'] != "") {
		@unlink ( $folder_thumb . $row['banner'] );
	}

	if ($row['banner_en'] != "") {
		@unlink ( $folder_thumb . $row['banner_en'] );
	}

	$sql->table = "banner";
	$sql->condition = sprintf ( "WHERE id = %s", GetSQLValueString ( $_GET ['Delete'], "int" ) );

	if( $sql->delete () ){
	    $alert = "ลบข้อมูลเรียบร้อย";
	}else{
	    $alert = "เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง";
	}
	
	$location = "../banner.php";
}
// ================================= END DELETE BANNER ==============================


if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
    
    // =========================== CHANGE STATUS SHOW ================================
    if(isset($_GET['statusShow'])) {
        
        $sql->table = "banner";
        $sql->value = "show_web=IF(show_web = 0, 1, 0)";
        $sql->condition = "WHERE id = ".GetSQLValueString($_GET['id'], "int");
        
        if($sql->update()) {
            $sql->field = "show_web";
            $row = mysql_fetch_assoc($sql->select());
            echo $row['show_web'];
        } else {
            echo 0;
        }
        
    }
    // =========================== END STATUS SHOW ================================
}

require_once ("../../class/JsControl.php");
?>