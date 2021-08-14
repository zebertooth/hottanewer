<?php
header ( 'Content-type: text/html; charset=utf-8' );
require ('../authorized/admin_authorize.inc.php');
require ('../../connections/mall.php');
require ('../../class/SQLManager.php');
require ('../../class/PicManager.php');

$sql = new SQLManager ();
$sql->table = "news";

// NEW CLASS PICTURE
$Image = new PicManager ();
$Image->new_picture_name = "News";
$Image->new_random_name = true;
$Image->resize_type = "LessWidth";

$folder_thumb = "../../upload/news/thumbs/";
$folder_resize = "../../upload/news/images/";
$folder_attach = "../../upload/news/files/";
$allow_files = array (
		'pdf',
		'txt',
		'doc',
		'docx',
		'ppt',
		'pptx',
		'xls',
		'xlsx',
		'jpg',
		'jpeg',
		'gif',
		'png',
		'bitmap'
);
$thumb = "";
$pic1 = "";
$pic2 = "";
$pic3 = "";
$pic4 = "";
$pic5 = "";
$file1 = "";
$file2 = "";
$file3 = "";
$dateStart = "";
$dateEnd = "";

if (isset ( $_POST ['dateStart'] )) {
	if ($_POST ['dateStart'] != "") {
		$arrdate = explode ( "/", $_POST ['dateStart'] );
		$dateStart = $arrdate [2] . "-" . $arrdate [1] . "-" . $arrdate [0];
	} else {
		$dateStart = "";
	}
}
if (isset ( $_POST ['dateEnd'] )) {
	if ($_POST ['dateEnd'] != "") {
		$arrdate = explode ( "/", $_POST ['dateEnd'] );
		$dateEnd = $arrdate [2] . "-" . $arrdate [1] . "-" . $arrdate [0];
	} else {
		$dateEnd = "";
	}
}

function dataready($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	} 

// ==========================  ADD NEWS ===========================================
if (isset ( $_POST ['btn_add'] )) {

	if ($_FILES ['thumb'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['thumb'] ['tmp_name'];
		$Image->picture_name = $_FILES ['thumb'] ['name'];
		$Image->folder_resize = $folder_thumb;
		$Image->uploadPicture ( "900", "", true, false );
		$thumb = $Image->new_picture_resize_name;
	}
	if ($_FILES ['pic1'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic1'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic1'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic1 = $Image->new_picture_resize_name;
	}
	if ($_FILES ['pic2'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic2'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic2'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic2 = $Image->new_picture_resize_name;
	}
	if ($_FILES ['pic3'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic3'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic3'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic3 = $Image->new_picture_resize_name;
	}
	if ($_FILES ['pic4'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic4'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic4'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic4 = $Image->new_picture_resize_name;
	}
	if ($_FILES ['pic5'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic5'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic5'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic5 = $Image->new_picture_resize_name;
	}
	// UPLOAD FILES
	if ($_FILES ['attach1'] ['name'] != "") {
		$FileAttachTmp = $_FILES ['attach1'] ['tmp_name'];
		$FileAttachSize = round ( $FileAttachsize = $_FILES ['attach1'] ['size'] / 2048, 2 );
		$FileAttachType = strtolower ( end ( explode ( '.', $_FILES ['attach1'] ['name'] ) ) );
		if (($FileAttachSize > 2048) || (! in_array ( $FileAttachType, $allow_files ) == true)) {
			$AlertAttach = true;
		} else {
			$file1 = "File_" . date ( 'YmdHis' ) . "_" . md5 ( rand ( 0, 999999999 ) ) . "." . $FileAttachType;
			copy ( $FileAttachTmp, $folder_attach . $file1 );
		}
	}
	if ($_FILES ['attach2'] ['name'] != "") {
		$FileAttachTmp = $_FILES ['attach2'] ['tmp_name'];
		$FileAttachSize = round ( $FileAttachsize = $_FILES ['attach2'] ['size'] / 2048, 2 );
		$FileAttachType = strtolower ( end ( explode ( '.', $_FILES ['attach2'] ['name'] ) ) );
		if (($FileAttachSize > 2048) || (! in_array ( $FileAttachType, $allow_files ) == true)) {
			$AlertAttach = true;
		} else {
			$file2 = "File_" . date ( 'YmdHis' ) . "_" . md5 ( rand ( 0, 999999999 ) ) . "." . $FileAttachType;
			copy ( $FileAttachTmp, $folder_attach . $file2 );
		}
	}
	if ($_FILES ['attach3'] ['name'] != "") {
		$FileAttachTmp = $_FILES ['attach3'] ['tmp_name'];
		$FileAttachSize = round ( $FileAttachsize = $_FILES ['attach3'] ['size'] / 2048, 2 );
		$FileAttachType = strtolower ( end ( explode ( '.', $_FILES ['attach3'] ['name'] ) ) );
		if (($FileAttachSize > 2048) || (! in_array ( $FileAttachType, $allow_files ) == true)) {
			$AlertAttach = true;
		} else {
			$file3 = "File_" . date ( 'YmdHis' ) . "_" . md5 ( rand ( 0, 999999999 ) ) . "." . $FileAttachType;
			copy ( $FileAttachTmp, $folder_attach . $file3 );
		}
	}

	if (isset ( $_POST ['ntype'] ) && $_POST ['ntype'] == 0) {
		$country = $_POST ['country'];
	} else
		$country = "";

	$sql->field = "title, intro, thumb, pic1, pic2, pic3, pic4, pic5, detail1, detail2, detail3, detail4, detail5,
						name_attach1, name_attach2, name_attach3, attach1, attach2, attach3, date_start, date_end,
						date_post, view, show_web, type, subtype";
	$sql->value = sprintf ( "%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, now(), 0, 1, %s, %s", 
	GetSQLValueString ( $_POST ['name'], "text" ), GetSQLValueString ( $_POST ['sh_detail'], "text" ), GetSQLValueString ( $thumb, "text" ), 
	GetSQLValueString ( $pic1, "text" ), GetSQLValueString ( $pic2, "text" ), GetSQLValueString ( $pic3, "text" ), GetSQLValueString ( $pic4, "text" ), 
	GetSQLValueString ( $pic5, "text" ), GetSQLValueString ( $_POST ['detail1'], "text" ), GetSQLValueString ( $_POST ['detail2'], "text" ), 
	GetSQLValueString ( $_POST ['detail3'], "text" ), GetSQLValueString ( $_POST ['detail4'], "text" ), GetSQLValueString ( $_POST ['detail5'], "text" ), 
	GetSQLValueString ( $_POST ['nameAttach1'], "text" ), GetSQLValueString ( $_POST ['nameAttach2'], "text" ), GetSQLValueString ( $_POST ['nameAttach3'], "text" ), 
	GetSQLValueString ( $file1, "text" ), GetSQLValueString ( $file2, "text" ), GetSQLValueString ( $file3, "text" ), GetSQLValueString ( $dateStart, "date" ), 
	GetSQLValueString ( $dateEnd, "date" ), GetSQLValueString ( $_POST ['type'], "text" ), GetSQLValueString ( $_POST ['subtype'], "text" ) );
	if ($sql->insert ()) {

		if (isset ( $_POST ['product_id'] )) {
			$sql->field = "id";
			$id = $sql->selectMax ();

			$product = $_POST ['product_id'];
			for($i = 0; $i < count ( $product ); $i ++) {
				$sql->field = "news_id, product_id";
				$sql->table = "news_product";
				$sql->value = sprintf ( "%s, %s", $id, GetSQLValueString ( $product [$i], "int" ) );
				$sql->insert ();
			}
		}

		$alert = "บันทึกข้อมูลเรียบร้อย";
		$location = "../information.php?type=".$_POST ['type'];
	} else {
		$alert = "เกิดข้อผิดพลาด กรุณาดำเนินการอีกคร้ัง";
		$location = "../information_add.php?type=".$_POST ['type'];
	}
}
// ================================== END ADD NEWS ================================

// ================================== EDIT NEWS ===================================
if (isset ( $_POST ['btn_edit'] )) {

	$sql->field = "thumb, pic1, pic2, pic3, pic4, pic5, attach1, attach2, attach3";
	$sql->condition = "where id=" . GetSQLValueString ( $_POST ['id'], "int" );
	$row = mysqli_fetch_object ( $sql->select () );

	if ($_FILES ['thumb'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['thumb'] ['tmp_name'];
		$Image->picture_name = $_FILES ['thumb'] ['name'];
		$Image->folder_resize = $folder_thumb;
		$Image->uploadPicture ( "900", "", true, false );
		$thumb = $Image->new_picture_resize_name;

		if ($row->thumb != "") {
			@unlink ( $folder_thumb . $row->thumb );
		}
	} else {
		$thumb = $row->thumb;
	}

	if ($_FILES ['pic1'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic1'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic1'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic1 = $Image->new_picture_resize_name;

		if ($row->pic1 != "") {
			@unlink ( $folder_resize . $row->pic1 );
		}
	} else {
		if (isset ( $_POST ['del_pic1'] ) && $_POST ['del_pic1'] == 1) {
			@unlink ( $folder_resize . $row->pic1 );
			$pic1 = "";
		} else {
			$pic1 = $row->pic1;
		}
	}

	if ($_FILES ['pic2'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic2'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic2'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic2 = $Image->new_picture_resize_name;

		if ($row->pic2 != "") {
			@unlink ( $folder_resize . $row->pic2 );
		}
	} else {
		if (isset ( $_POST ['del_pic2'] ) && $_POST ['del_pic2'] == 1) {
			@unlink ( $folder_resize . $row->pic2 );
			$pic2 = "";
		} else {
			$pic2 = $row->pic2;
		}
	}

	if ($_FILES ['pic3'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic3'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic3'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic3 = $Image->new_picture_resize_name;

		if ($row->pic3 != "") {
			@unlink ( $folder_resize . $row->pic3 );
		}
	} else {
		if (isset ( $_POST ['del_pic3'] ) && $_POST ['del_pic3'] == 1) {
			@unlink ( $folder_resize . $row->pic3 );
			$pic3 = "";
		} else {
			$pic3 = $row->pic3;
		}
	}

	if ($_FILES ['pic4'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic4'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic4'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic4 = $Image->new_picture_resize_name;

		if ($row->pic4 != "") {
			@unlink ( $folder_resize . $row->pic4 );
		}
	} else {
		if (isset ( $_POST ['del_pic4'] ) && $_POST ['del_pic4'] == 1) {
			@unlink ( $folder_resize . $row->pic4 );
			$pic4 = "";
		} else {
			$pic4 = $row->pic4;
		}
	}

	if ($_FILES ['pic5'] ['name'] != "") {
		$Image->picture_tmp = $_FILES ['pic5'] ['tmp_name'];
		$Image->picture_name = $_FILES ['pic5'] ['name'];
		$Image->folder_resize = $folder_resize;
		$Image->uploadPicture ( "900", "", true, false );
		$pic5 = $Image->new_picture_resize_name;

		if ($row->pic5 != "") {
			@unlink ( $folder_resize . $row->pic5 );
		}
	} else {
		if (isset ( $_POST ['del_pic5'] ) && $_POST ['del_pic5'] == 1) {
			@unlink ( $folder_resize . $row->pic5 );
			$pic5 = "";
		} else {
			$pic5 = $row->pic5;
		}
	}

	// UPLOAD FILES
	if ($_FILES ['attach1'] ['name'] != "") {
		$FileAttachTmp = $_FILES ['attach1'] ['tmp_name'];
		$FileAttachSize = round ( $FileAttachsize = $_FILES ['attach1'] ['size'] / 2048, 2 );
		$FileAttachType = strtolower ( end ( explode ( '.', $_FILES ['attach1'] ['name'] ) ) );
		if (($FileAttachSize > 2048) || (! in_array ( $FileAttachType, $allow_files ) == true)) {
			$AlertAttach = true;
			$file1 = $row->attach1;
		} else {
			$file1 = "File_" . date ( 'YmdHis' ) . "_" . md5 ( rand ( 0, 999999999 ) ) . "." . $FileAttachType;
			copy ( $FileAttachTmp, $folder_attach . $file1 );
			if ($row->attach1 != "") {
				@unlink ( $folder_attach . $row->attach1 );
			}
		}
	} else {
		if (isset ( $_POST ['del_file1'] ) && $_POST ['del_file1'] == 1) {
			@unlink ( $folder_attach . $row->attach1 );
			$file1 = "";
		} else {
			$file1 = $row->attach1;
		}
	}

	if ($_FILES ['attach2'] ['name'] != "") {
		$FileAttachTmp = $_FILES ['attach2'] ['tmp_name'];
		$FileAttachSize = round ( $FileAttachsize = $_FILES ['attach2'] ['size'] / 2048, 2 );
		$FileAttachType = strtolower ( end ( explode ( '.', $_FILES ['attach2'] ['name'] ) ) );
		if (($FileAttachSize > 2048) || (! in_array ( $FileAttachType, $allow_files ) == true)) {
			$AlertAttach = true;
			$file2 = $row->attach2;
		} else {
			$file2 = "File_" . date ( 'YmdHis' ) . "_" . md5 ( rand ( 0, 999999999 ) ) . "." . $FileAttachType;
			copy ( $FileAttachTmp, $folder_attach . $file2 );
			if ($row->attach2 != "") {
				@unlink ( $folder_attach . $row->attach2 );
			}
		}
	} else {
		if (isset ( $_POST ['del_file2'] ) && $_POST ['del_file2'] == 1) {
			@unlink ( $folder_attach . $row->attach2 );
			$file2 = "";
		} else {
			$file2 = $row->attach2;
		}
	}

	if ($_FILES ['attach3'] ['name'] != "") {
		$FileAttachTmp = $_FILES ['attach3'] ['tmp_name'];
		$FileAttachSize = round ( $FileAttachsize = $_FILES ['attach3'] ['size'] / 2048, 2 );
		$FileAttachType = strtolower ( end ( explode ( '.', $_FILES ['attach3'] ['name'] ) ) );
		if (($FileAttachSize > 2048) || (! in_array ( $FileAttachType, $allow_files ) == true)) {
			$AlertAttach = true;
			$file3 = $row->attach3;
		} else {
			$file3 = "File_" . date ( 'YmdHis' ) . "_" . md5 ( rand ( 0, 999999999 ) ) . "." . $FileAttachType;
			copy ( $FileAttachTmp, $folder_attach . $file3 );
			if ($row->attach3 != "") {
				@unlink ( $folder_attach . $row->attach3 );
			}
		}
	} else {
		if (isset ( $_POST ['del_file3'] ) && $_POST ['del_file3'] == 1) {
			@unlink ( $folder_attach . $row->attach3 );
			$file3 = "";
		} else {
			$file3 = $row->attach3;
		}
	}

	$sql->value = sprintf ( "title=%s, intro=%s, thumb=%s, pic1=%s, pic2=%s, pic3=%s, pic4=%s, pic5=%s, detail1=%s, detail2=%s,
						detail3=%s, detail4=%s, detail5=%s, name_attach1=%s, name_attach2=%s, name_attach3=%s, attach1=%s, attach2=%s,
						attach3=%s, date_start=%s, date_end=%s, date_post=now(), show_web=%s, type=%s, subtype=%s", 
						GetSQLValueString ( $_POST ['name'], "text" ), GetSQLValueString ( $_POST ['sh_detail'], "text" )
						, GetSQLValueString ( $thumb, "text" )
						, GetSQLValueString ( $pic1, "text" ), GetSQLValueString ( $pic2, "text" ), GetSQLValueString ( $pic3, "text" )
						, GetSQLValueString ( $pic4, "text" ), GetSQLValueString ( $pic5, "text" )
						, GetSQLValueString ( dataready($_POST['detail1']), "text" ), GetSQLValueString ( $_POST ['detail2'], "text" )
						, GetSQLValueString ( $_POST ['detail3'], "text" ), GetSQLValueString ( $_POST ['detail4'], "text" )
						, GetSQLValueString ( $_POST ['detail5'], "text" ), GetSQLValueString ( $_POST ['nameAttach1'], "text" )
						, GetSQLValueString ( $_POST ['nameAttach2'], "text" ), GetSQLValueString ( $_POST ['nameAttach3'], "text" )
						, GetSQLValueString ( $file1, "text" ), GetSQLValueString ( $file2, "text" ), GetSQLValueString ( $file3, "text" )
						, GetSQLValueString ( $dateStart, "date" ), GetSQLValueString ( $dateEnd, "date" ), GetSQLValueString ( $_POST ['statusShow'], "int" )
						, GetSQLValueString ( $_POST ['type'], "text" ), GetSQLValueString ( $_POST ['subtype'], "text" ) );
	$sql->condition = "where id=" . GetSQLValueString ( $_POST ['id'], "int" );



	if ($sql->update ()) {

		// Link Product
		$sql->table = "news_product";
		$sql->condition = sprintf ( "WHERE news_id = %s", GetSQLValueString ( $_POST ['id'], "int" ) );
		$sql->delete ();

		if (isset ( $_POST ['product_id'] )) {
			$product = $_POST ['product_id'];
			for($i = 0; $i < count ( $product ); $i ++) {
				$sql->field = "news_id, product_id";
				$sql->table = "news_product";
				$sql->value = sprintf ( "%s, %s", $_POST ['id'], GetSQLValueString ( $product [$i], "int" ) );
				$sql->insert ();
			}
		}
		// END Link Product

		$alert = "บันทึกข้อมูลเรียบร้อย";
		$location = "../information.php?type=".$_POST ['type'];
		
	} else {
		$alert = "เกิืดข้อผิดพลาด กรุณาดำเนินการอีกคร้ัง";
		$location = "../information_edit.php?id=" . $_POST ['id'];
	}
}
// ================================== END EDIT NEWS =================================

// ================================== DELETE NEWS ==================================
if (isset ( $_GET ['Delete'] )) {
	$sql->field = "thumb, pic1, pic2, pic3, pic4, pic5, attach1, attach2, attach3";
	$sql->condition = "where id=" . GetSQLValueString ( $_GET ['Delete'], "int" );
	$row = mysqli_fetch_object ( $sql->select () );

	if ($row->thumb != "") {
		@unlink ( $folder_thumb . $row->thumb );
	}
	if ($row->pic1 != "") {
		@unlink ( $folder_resize . $row->pic1 );
	}
	if ($row->pic2 != "") {
		@unlink ( $folder_resize . $row->pic2 );
	}
	if ($row->pic3 != "") {
		@unlink ( $folder_resize . $row->pic3 );
	}
	if ($row->pic4 != "") {
		@unlink ( $folder_resize . $row->pic4 );
	}
	if ($row->pic5 != "") {
		@unlink ( $folder_resize . $row->pic5 );
	}
	if ($row->attach1 != "") {
		@unlink ( $folder_attach . $row->attach1 );
	}
	if ($row->attach2 != "") {
		@unlink ( $folder_attach . $row->attach2 );
	}
	if ($row->attach3 != "") {
		@unlink ( $folder_attach . $row->attach3 );
	}

	if ($sql->delete ()) {

		// Link Product
		$sql->table = "news_product";
		$sql->condition = sprintf ( "WHERE news_id = %s", GetSQLValueString ( $_GET ['Delete'], "int" ) );
		$sql->delete ();

		$alert = "ลบข้อมูลเรียบร้อย";
	} else {
		$alert = "เกิดข้อผิดพลาดกรุณา ลองอีกครั้ง";
	}
	$location = "../information.php?type=".$_GET ['type'];
}
// ================================== END DELETE NEWS ==========================

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){

    // =========================== CHANGE STATUS SHOW ================================
    if(isset($_GET['statusShow'])) {

        $sql->table = "news";
        $sql->value = "show_web=IF(show_web = 0, 1, 0)";
        $sql->condition = "WHERE id = ".GetSQLValueString($_GET['id'], "int");

        if($sql->update()) {
            $sql->field = "show_web";
            $row = mysqli_fetch_assoc($sql->select());
            echo $row['show_web'];
        } else {
            echo 0;
        }

    }
    // =========================== END STATUS SHOW ================================
}

require_once ("../../class/JsControl.php");
