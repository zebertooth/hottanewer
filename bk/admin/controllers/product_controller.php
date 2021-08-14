<?php
header('Content-type: text/html; charset=utf-8');
require('../authorized/admin_authorize.inc.php');
require('../../connections/mall.php');
require('../../class/SQLManager.php');
require("../../class/PicManager.php");

$folderUpload = 'upload/product';


$Image = new PicManager();
$Image->new_random_name = true;
$Image->resize_type = "LessWidth";
$Image->folder_resize = "../../$folderUpload/";
$Image->folder_fullsize = "../../$folderUpload/";


$thumb = "";
$image1 = "";
$image2 = "";
$image3 = "";
$image4 = "";
$image5 = "";



function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}





$sql = new SQLManager();

    // ======================================= ADD PRODUCT ==================================
    if(isset($_POST['btn_add'])) {
  
        $showWeb = 1;
        $statusNew = ($_POST['product_new'] == "Y")? "1":"0";
        $statusRec = ($_POST['product_reccommend'] == "Y")? "1":"0";
        $statusBestsell = ($_POST['product_bestsell'] == "Y")? "1":"0";
        
        if($_FILES['thumb']['name'] != "") {
            $Image->picture_tmp = $_FILES['thumb']['tmp_name'];
            $Image->picture_name = $_FILES['thumb']['name'];
            $Image->new_picture_name = "ProductThumb_45998";
            $Image->uploadPicture("1320","",true,false);
            
            $thumb = "/upload/product/".$Image->new_picture_resize_name;
            
            // Upload Image to TTN
            //if($_SERVER['SERVER_NAME'] != 'localhost') {
                $sendImage = url()."/$folderUpload/{$Image->new_picture_resize_name}"; 
               // serviceImageTTN("add", $sendImage, 'product');
                
           // }
     
        }
        
        
        
        if($_FILES['pic1'] ['name'] != ""){
            $Image->picture_tmp = $_FILES['pic1'] ['tmp_name'];
            $Image->picture_name = $_FILES['pic1'] ['name'];
            $Image->new_picture_name = "Product_45998";
            $Image->uploadPicture("1320","",false,true);
            $image1 = "/upload/product/".$Image->new_picture_fullsize_name;  
            
            
            // Upload Image to TTN
            //if($_SERVER['SERVER_NAME'] != 'localhost') {
                $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
             //   serviceImageTTN("add", $sendImage, 'product');

           // }
            
            
        }
        
        if($_FILES['pic2'] ['name'] != ""){
            $Image->picture_tmp = $_FILES['pic2'] ['tmp_name'];
            $Image->picture_name = $_FILES['pic2'] ['name'];
            $Image->new_picture_name = "Product_45998";
            $Image->uploadPicture("1320","",false,true);
            $image2 = "/upload/product/".$Image->new_picture_fullsize_name;
            
            // Upload Image to TTN
           // if($_SERVER['SERVER_NAME'] != 'localhost') {
                $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
             //   serviceImageTTN("add", $sendImage, 'product');

            //}
            
            
        }
        
        if($_FILES['pic3'] ['name'] != ""){
            $Image->picture_tmp = $_FILES['pic3'] ['tmp_name'];
            $Image->picture_name = $_FILES['pic3'] ['name'];
            $Image->new_picture_name = "Product_45998";
            $Image->uploadPicture("","",false,true);
            $image3 = "/upload/product/".$Image->new_picture_fullsize_name;
            
            // Upload Image to TTN
            //if($_SERVER['SERVER_NAME'] != 'localhost') {
                $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
             //   serviceImageTTN("add", $sendImage, 'product');

            //}
            
        }
        
        if($_FILES['pic4'] ['name'] != ""){
            $Image->picture_tmp = $_FILES['pic4'] ['tmp_name'];
            $Image->picture_name = $_FILES['pic4'] ['name'];
            $Image->new_picture_name = "Product_45998";
            $Image->uploadPicture("","",false,true);
            $image4 = "/upload/product/".$Image->new_picture_fullsize_name;
            
            // Upload Image to TTN
            //if($_SERVER['SERVER_NAME'] != 'localhost') {
                $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
             //   serviceImageTTN("add", $sendImage, 'product');

            //}  
            
        }
        
        if($_FILES['pic5'] ['name'] != ""){
            $Image->picture_tmp = $_FILES['pic5'] ['tmp_name'];
            $Image->picture_name = $_FILES['pic5'] ['name'];
            $Image->new_picture_name = "Product_45998";
            $Image->uploadPicture("","",false,true);
            $image5 = "/upload/product/".$Image->new_picture_fullsize_name;
            
            // Upload Image to TTN
            //if($_SERVER['SERVER_NAME'] != 'localhost') {
                $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
             //   serviceImageTTN("add", $sendImage, 'product');
                
            //}
            
        }
        

       

        
        $sql->table = "tbl_product";
        $sql->field = "productname, productnameen, brandname, brandnameen, model,
		shortdesc, shortdescen, description, description1, description2,
		description3, description4, lastupdated, view, item, users_oid,
		thumbnailimage, fullimage, fullimage1, fullimage2, fullimage3, fullimage4,
            	                    show_web, new_product, recommend_product, best_selling, url";
        $sql->value =sprintf("%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 
                                    %s, %s, NOW(), 0, 'N', '64001',
            						%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s",
                                    GetSQLValueString($_POST['name'], "text"),
                                    GetSQLValueString($_POST['name_en'], "text"), 
                                    GetSQLValueString($_POST['brand'], "text"), 
                                    GetSQLValueString($_POST['branden'], "text"), 
                                    GetSQLValueString($_POST['model'], "text"),
                                    GetSQLValueString($_POST['intro'], "text"), 
                                    GetSQLValueString($_POST['intro_en'], "text"), 
                                    GetSQLValueString($_POST['detail1'], "text"), 
                                    GetSQLValueString($_POST['detail2'], "text"), 
                                    GetSQLValueString($_POST['detail3'], "text"),
                                    GetSQLValueString($_POST['detail4'], "text"), 
                                    GetSQLValueString($_POST['detail5'], "text"),   
                                    GetSQLValueString($thumb, "text"), 
                                    GetSQLValueString($image1, "text"), 
                                    GetSQLValueString($image2, "text"), 
                                    GetSQLValueString($image3, "text"), 
                                    GetSQLValueString($image4, "text"), 
                                    GetSQLValueString($image5, "text"),
                                    GetSQLValueString($showWeb, "int"), 
                                    GetSQLValueString($statusNew, "int"), 
                                    GetSQLValueString($statusRec, "int"), 
                                    GetSQLValueString($statusBestsell, "int"),
                                    GetSQLValueString($_POST['url'], "int"));
        
        if($sql->insert()) {

            $idMax = mysqli_insert_id($GLOBALS["conn"]);
            
            $sql->table = "product";
            $sql->field  = "id, show_web, status_new, status_recommend, status_bestseller, group_id, subgroup_id";
            $sql->value = sprintf("%s, %s, %s, %s, %s, %s, %s",
                                                    GetSQLValueString($idMax, "int"),
                                                    GetSQLValueString($_POST['status'], "text"),
                                                    GetSQLValueString($_POST['product_new'], "text"),
                                                    GetSQLValueString($_POST['product_reccommend'], "text"),
                                                    GetSQLValueString($_POST['product_bestsell'], "text"),
                                                    GetSQLValueString($_POST['group'], "int"),
                                                    GetSQLValueString($_POST['subgroup'], "int"));
            $sql->insert();
            
            $alert = "บันทึกข้อมูลเรียบร้อย";
           $location = "../product.php";
            
        } else {
            
            $alert = "เกิดข้อผิดพลาด กรุณาดำเนินการอีกคร้ัง";
            $location = "../product_add.php";
            
        }
        
        
    }
    // ======================================= END ADD PRODUCT ===============================

    // ======================================= EDIT PRODUCT ===================================
    if(isset($_POST['btn_edit'])) {
        
        $statusNew = ($_POST['product_new'] == "Y")? "1":"0";
        $statusRec = ($_POST['product_reccommend'] == "Y")? "1":"0";
        $statusBestsell = ($_POST['product_bestsell'] == "Y")? "1":"0";

        $sql->field = "*";
        $sql->table = "tbl_product";
        $sql->condition = sprintf("WHERE oid = %s AND
                                        users_oid = '64001'",
                                        GetSQLValueString($_POST['id'], "int"));
        $rs = $sql->select();
        
        if(mysqli_num_rows($rs)) {
            
            $row = mysqli_fetch_assoc($rs);
            
            if($_FILES['thumb']['name'] != ""){
                
                $Image->picture_tmp = $_FILES['thumb']['tmp_name'];
                $Image->picture_name = $_FILES['thumb']['name'];
                $Image->new_picture_name = "ProductThumb_45998";
                $Image->uploadPicture("1000","",true,false);
                $thumb = "/upload/product/".$Image->new_picture_resize_name;
                
                // Upload Image to TTN
                //if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $sendImage = url()."/$folderUpload/{$Image->new_picture_resize_name}";
                //    serviceImageTTN("add", $sendImage, 'product');
                //}
                
                if(!empty($row['thumbnailimage'])){
                     // Delete image
                     $deleteImage = pathinfo($row['thumbnailimage'], PATHINFO_BASENAME);
                     @unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if( $_SERVER['SERVER_NAME'] != 'localhost') {
                    //    serviceImageTTN("remove", $deleteImage, 'product');
                    //}
                }
                
            } else {
                $thumb = $row['thumbnailimage'];
            }
            
            if($_FILES['pic1'] ['name'] != ""){
                $Image->picture_tmp = $_FILES['pic1'] ['tmp_name'];
                $Image->picture_name = $_FILES['pic1'] ['name'];
                $Image->new_picture_name = "Product_45998";
                $Image->uploadPicture("1000","",false,true);
                $image1 = "/upload/product/".$Image->new_picture_fullsize_name;
                
                // Upload Image to TTN
                //if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
                //    serviceImageTTN("add", $sendImage, 'product');
                //}
                
                if(!empty($row['fullimage'])){
                    // Delete image
                    $deleteImage = pathinfo($row['fullimage'], PATHINFO_BASENAME);
                    @unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if( $_SERVER['SERVER_NAME'] != 'localhost') {
                    //    serviceImageTTN("remove", $deleteImage, 'product');
                    //}
                }
                
            } else {
                $image1 = $row['fullimage'];
            }
            
            
            if($_FILES['pic2'] ['name'] != ""){
                $Image->picture_tmp = $_FILES['pic2'] ['tmp_name'];
                $Image->picture_name = $_FILES['pic2'] ['name'];
                $Image->new_picture_name = "Product_45998";
                $Image->uploadPicture("","",false,true);
                $image2 = "/upload/product/".$Image->new_picture_fullsize_name;
                
                
                // Upload Image to TTN
                //if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
                //    serviceImageTTN("add", $sendImage, 'product');
                //}
                
                if(!empty($row['fullimage1'])){
                    // Delete image
                    $deleteImage = pathinfo($row['fullimage1'], PATHINFO_BASENAME);
                    @unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if( $_SERVER['SERVER_NAME'] != 'localhost') {
                    //    serviceImageTTN("remove", $deleteImage, 'product');
                    //}
                }
                
                
            } else {
                $image2 = $row['fullimage1'];
            }
            
            if($_FILES['pic3'] ['name'] != ""){
                $Image->picture_tmp = $_FILES['pic3'] ['tmp_name'];
                $Image->picture_name = $_FILES['pic3'] ['name'];
                $Image->new_picture_name = "Product_45998";
                $Image->uploadPicture("","",false,true);
                $image3 = "/upload/product/".$Image->new_picture_fullsize_name;
                
                // Upload Image to TTN
                //if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
                //    serviceImageTTN("add", $sendImage, 'product');
                //}
                
                if(!empty($row['fullimage2'])){
                    // Delete image
                    $deleteImage = pathinfo($row['fullimage2'], PATHINFO_BASENAME);
                    @unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if( $_SERVER['SERVER_NAME'] != 'localhost') {
                     //   serviceImageTTN("remove", $deleteImage, 'product');
                    //}
                }
                
            } else {
                $image3 = $row['fullimage2'];
            }
            
            if($_FILES['pic4'] ['name'] != ""){
                $Image->picture_tmp = $_FILES['pic4'] ['tmp_name'];
                $Image->picture_name = $_FILES['pic4'] ['name'];
                $Image->new_picture_name = "Product_45998";
                $Image->uploadPicture("","",false,true);
                $image4 = "/upload/product/".$Image->new_picture_fullsize_name;
                
                // Upload Image to TTN
                //if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
                //    serviceImageTTN("add", $sendImage, 'product');
                //}
                
                if(!empty($row['fullimage3'])){
                    // Delete image
                    $deleteImage = pathinfo($row['fullimage3'], PATHINFO_BASENAME);
                    @unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if( $_SERVER['SERVER_NAME'] != 'localhost') {
                    //    serviceImageTTN("remove", $deleteImage, 'product');
                    //}
                }
                
            } else {
                $image4 = $row['fullimage3'];
            }
            
            if($_FILES['pic5'] ['name'] != ""){
                $Image->picture_tmp = $_FILES['pic5'] ['tmp_name'];
                $Image->picture_name = $_FILES['pic5'] ['name'];
                $Image->new_picture_name = "Product_45998";
                $Image->uploadPicture("","",false,true);
                $image5 = "/upload/product/".$Image->new_picture_fullsize_name;
                
                // Upload Image to TTN
                //if($_SERVER['SERVER_NAME'] != 'localhost') {
                    $sendImage = url()."/$folderUpload/{$Image->new_picture_fullsize_name}";
                 //   serviceImageTTN("add", $sendImage, 'product');
                //}
                
                if(!empty($row['fullimage4'])){
                    // Delete image
                    $deleteImage = pathinfo($row['fullimage4'], PATHINFO_BASENAME);
                    @unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if( $_SERVER['SERVER_NAME'] != 'localhost') {
                    //    serviceImageTTN("remove", $deleteImage, 'product');
                    //}
                }
                
            } else {
                $image5 = $row['fullimage4'];
            }
            
            $sql->value = sprintf("productname=%s, productnameen=%s, brandname=%s, brandnameen=%s, model=%s,
            						shortdesc=%s, shortdescen=%s, description=%s, description1=%s, description2=%s,
            						description3=%s, description4=%s, lastupdated=now(), thumbnailimage=%s,
                                    fullimage=%s, fullimage1=%s, fullimage2=%s, fullimage3=%s, fullimage4=%s,
            	                    new_product=%s, recommend_product=%s, best_selling=%s, url=%s",
                                    GetSQLValueString($_POST['name'], "text"),
                                    GetSQLValueString($_POST['name_en'], "text"),
                                    GetSQLValueString($_POST['brand'], "text"),
                                    GetSQLValueString($_POST['branden'], "text"),
                                    GetSQLValueString($_POST['model'], "text"),
                                    GetSQLValueString($_POST['intro'], "text"),
                                    GetSQLValueString($_POST['intro_en'], "text"),
                                    GetSQLValueString($_POST['detail1'], "text"),
                                    GetSQLValueString($_POST['detail2'], "text"),
                                    GetSQLValueString($_POST['detail3'], "text"),
                                    GetSQLValueString($_POST['detail4'], "text"),
                                    GetSQLValueString($_POST['detail5'], "text"),
                                    GetSQLValueString($thumb, "text"),
                                    GetSQLValueString($image1, "text"),
                                    GetSQLValueString($image2, "text"),
                                    GetSQLValueString($image3, "text"),
                                    GetSQLValueString($image4, "text"),
                                    GetSQLValueString($image5, "text"),
                                    GetSQLValueString($statusNew, "int"),
                                    GetSQLValueString($statusRec, "int"),
                                    GetSQLValueString($statusBestsell, "int"),
                                    GetSQLValueString($_POST['url'], "text"));
            $sql->condition = "WHERE oid = ".GetSQLValueString($row['oid'], "int");
            
            if($sql->update()) {
                
               
                $query = sprintf("INSERT INTO product
                        						(id, show_web, status_new, status_recommend, status_bestseller, group_id, subgroup_id)
                        						VALUES (%s, %s, %s, %s, %s, %s, %s)
                        						ON DUPLICATE KEY
                        						UPDATE show_web=%s, status_new=%s, status_recommend=%s, status_bestseller=%s, group_id=%s, subgroup_id=%s",
                                                GetSQLValueString($row['oid'], "int"),
                                                GetSQLValueString($_POST['status'], "text"),
                                                GetSQLValueString($_POST['product_new'], "text"),
                                                GetSQLValueString($_POST['product_reccommend'], "text"),
                                                GetSQLValueString($_POST['product_bestsell'], "text"),
                                                GetSQLValueString($_POST['group'], "int"),
                                                GetSQLValueString($_POST['subgroup'], "int"),
                                        
                                                GetSQLValueString($_POST['status'], "text"),
                                                GetSQLValueString($_POST['product_new'], "text"),
                                                GetSQLValueString($_POST['product_reccommend'], "text"),
                                                GetSQLValueString($_POST['product_bestsell'], "text"),
                                                GetSQLValueString($_POST['group'], "int"),
                                                GetSQLValueString($_POST['subgroup'], "int"));
                
               mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));
                
                
                $alert = "บันทึกข้อมูลเรียบร้อย";
                $location = "../product.php";
            } else {
                $alert = "เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง";
                $location = "../product_edit.php?id=".$row['OID'];
            }
            
        } else {
            $location = "../product.php";
        }
        
    }
    // ======================================= END EDIT PRODUCT ===============================
    
    // ======================================= DELETE PRODUCT ================================
    if(isset($_GET['Delete'])) {
        
        
        
        $sql->field = "*";
        $sql->table = "tbl_product";
        $sql->condition = sprintf("WHERE oid = %s AND 
                                        users_oid = '64001'",
                                        GetSQLValueString($_GET['Delete'], "int"));
        $rs  = $sql->select();
        
        if(mysqli_num_rows($rs)) {
            
            $row = mysqli_fetch_assoc($rs);
            
            if($sql->delete()) {
                
                $images = array(
                  'THUMBNAILIMAGE', 'FULLIMAGE', 'FULLIMAGE1', 'FULLIMAGE2', 'FULLIMAGE3', 'FULLIMAGE4'
                );
                
                foreach ($images as $image) {     
                    
                    // Remove uploaded file
                    $deleteImage = pathinfo($row[$image], PATHINFO_BASENAME);
                    unlink($Image->folder_fullsize.$deleteImage);
                    
                    // Delete Image  TTN
                    //if(!empty($row[$image]) && $_SERVER['SERVER_NAME'] != 'localhost') {
                    //    serviceImageTTN("remove", $row[$image], 'product'); 
                    //}      
                }
                
                $sql->table = "product";
                $sql->condition = "WHERE id = ".GetSQLValueString($row['OID'], "int");
                $sql->delete();
                
                $alert = "ลบข้อมูลเรียบร้อย";
                
            } 
            
        }
        
        $location = "../product.php";

    }
    // ======================================= END DELETE PRODUCT ============================

	//======================================== SEO PRODUCT ==================================
		if(isset($_POST['btn_seo'])) {

		$sql->table = "tbl_product";
		$sql->value = sprintf("SHORTDESC = %s ,KEYSEARCH = %s",
							    GetSQLValueString($_POST['description'],"text"),
								GetSQLValueString($_POST['keyword'],"text"));
		$sql->condition = sprintf("WHERE oid = %s",GetSQLValueString($_POST['id'],"int"));

			if ($sql->update ()) {

				$alert = "บันทึกข้อมูลเรียบร้อย";
				$location = "../product.php";
			} else {
				$alert = "เกิดข้อผิดพลาด กรุณาดำเนินการอีกคร้ัง";
				$location = "../product.php";
			}

		}
	//======================================== END SEO PRODUCT ==============================

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){

$sql->table = "product";

	//======================================== STATUS SHOW ==================================
	if(isset($_GET['statusShow'])) {

		$query = sprintf("INSERT INTO product
						(id, show_web)
						VALUES (%s, IF(show_web='Y','N','Y'))
						ON DUPLICATE KEY
						UPDATE show_web = IF(show_web='Y','N','Y')",
						GetSQLValueString($_GET['id'], "int"));
		$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));

		if($result) {
		 	$sql->field = "show_web";
		 	$sql->condition = sprintf("WHERE id = %s",
		 						GetSQLValueString($_GET['id'], "int"));
		 	$row = mysqli_fetch_assoc($sql->select());
		 	echo $row['show_web'];
		} else echo 0;

	}
	//======================================== END STATUS SHOW ==============================

	//======================================== CHANGE STATUS MALL =======================
	if(isset($_GET['statusPost'])) {

		if($_GET['type']=="new") {
			$field = "status_new";
		} else if($_GET['type']=="recommend") {
			$field = "status_recommend";
		} else if($_GET['type']=="bestsell") {
			$field = "status_bestseller";
		} else $field = "";

		if($field!="") {
			$query = sprintf("INSERT INTO product
							(id, $field)
							VALUES (%s, IF($field='Y','N','Y'))
							ON DUPLICATE KEY
							UPDATE $field = IF($field='Y','N','Y')",
							GetSQLValueString($_GET['id'], "int"));
			$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));
			if($result) {
				$sql->field = $field;
				$sql->condition = sprintf("WHERE id = %s",
						GetSQLValueString($_GET['id'], "int"));
				$row = mysqli_fetch_assoc($sql->select());
				echo $row[$field];
			} else echo 0;
		} else echo 0;

	}
	//======================================== END CHANGE STATUS MALL ===================

	//======================================== CHANGE PRODUCT GROUP ======================
	if(isset($_GET['changeIndus'])) {
		$query = sprintf("INSERT INTO product
						(id, group_id, subgroup_id)
						VALUES (%s, %s, NULL)
						ON DUPLICATE KEY
						UPDATE group_id = %s, subgroup_id = NULL",
						GetSQLValueString($_GET['id'], "int"),
						GetSQLValueString($_GET['indus'], "int"),
						GetSQLValueString($_GET['indus'], "int"));
		$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));


		$response = array();
		$response['result'] = ($result)? true:false;

		echo json_encode($response);

	}
	//======================================== END CHANGE PRODUCT GROUP ==================

	//======================================== CHANGE PORDUCT SUB GROUP ==================
	if(isset($_GET['changeSub'])) {
		$query = sprintf("INSERT INTO product
						(id, subgroup_id)
						VALUES (%s, %s)
						ON DUPLICATE KEY
						UPDATE subgroup_id = %s",
						GetSQLValueString($_GET['id'], "int"),
						GetSQLValueString($_GET['subgroup'], "int"),
						GetSQLValueString($_GET['subgroup'], "int"));
		$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));


		$response = array();
		$response['result'] = ($result)? true:false;


		echo json_encode($response);

	}
	//======================================== END CHANGE PORDUCT SUB GROUP ==============

	//======================================== CHANGE PORDUCT SPACIAL DAY ==================
	if(isset($_GET['spacialDay'])) {
		$query = sprintf("INSERT INTO product
						(id, spacial_day_id)
						VALUES (%s, %s)
						ON DUPLICATE KEY
						UPDATE spacial_day_id = %s",
						GetSQLValueString($_GET['id'], "int"),
						GetSQLValueString($_GET['spacialDay'], "int"),
						GetSQLValueString($_GET['spacialDay'], "int"));
		$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));


		$response = array();
		$response['result'] = ($result)? true:false;


		echo json_encode($response);

	}
	//======================================== END CHANGE PORDUCT SPACIAL DAY ==============

	//======================================== CHEANGE RATING ===============================
	if(isset($_GET['editRating'])) {
		$query = sprintf("INSERT INTO product
						(id, rating)
						VALUES (%s, %s)
						ON DUPLICATE KEY
						UPDATE rating = %s",
						GetSQLValueString($_GET['id'], "int"),
						GetSQLValueString($_GET['num'], "int"),
						GetSQLValueString($_GET['num'], "int"));
		$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));
		echo ($result)? 1:0;
	}
	//======================================== END CHEANGE RATING ===========================

	//======================================== SHOW SUBGROUP ================================
	if(isset($_GET['showSubgroup'])) {

		$sql->field = "id, name";
		$sql->table = "product_subgroup";
		$sql->condition = "WHERE group_id = ".GetSQLValueString($_GET['indus'], "int");
		$rs = $sql->select();

		$result = "<option value=''>กรุณาเลือกหมวดย่อย</option>";

		while($row = mysqli_fetch_assoc($rs)) {

			$select = ($_GET['select']==$row['id'])? "selected='select'":"";

			$data = <<<DATA
			<option value='{$row['id']}' {$select}>{$row['name']}</option>
DATA;
			$result .= $data;

		}

		echo json_encode($result);
	}
	//======================================== END SHOW SUBGROUP ============================


	//======================================== CHANGE SHIPPING ==================
	if(isset($_GET['changeShipping'])) {
		$query = sprintf("INSERT INTO product
						(id, shipping)
						VALUES (%s, %s)
						ON DUPLICATE KEY
						UPDATE shipping = %s",
				GetSQLValueString($_GET['id'], "int"),
				GetSQLValueString($_GET['shipping'], "text"),
				GetSQLValueString($_GET['shipping'], "text"));
		$result = mysqli_query($GLOBALS["conn"], $query) or die(mysqli_error($GLOBALS["conn"]));


		$response = array();
		$response['result'] = ($result)? true:false;


		echo json_encode($response);

	}
	//======================================== END CHANGE SHIPPING ==============
}

require_once ("../../class/JsControl.php");

?>