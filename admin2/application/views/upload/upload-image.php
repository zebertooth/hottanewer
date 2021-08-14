<? include('../../system/config.inc.php');?>
<?
function getFileNameUploadNew($str,$directory){
	if($str):
		$str=strtolower($str);
		$last=pathinfo($str, PATHINFO_EXTENSION);
		$name=basename($str, ".".$last);
		$fileName=$name.'.'.$last;
		$i=0;
		while(getFileNameDownloadDri($fileName,$directory)):$i++;
			$fileName=$name.'_'.$i.'.'.$last;
		endwhile;
		
		return $fileName;
	endif;
}
function getFileNameDownloadDri($str,$directory){
	$dri=$directory.$str;
	
	if (file_exists($dri)):
		return true;
	else:
		return false;
	endif;
}

//=================START_RESIZE_IMAGE==============================================
function crop_resize_image($FileImageOrg,$FileImageName,$FileImageW,$FileImageH){
//SET=== File Original Image : $FileImageOrg  [EX = c:/images/newfile.jpg]
//SET=== FileOutputPath and ImageName : $FileImageName  [EX = c:/images/newfile.jpg]
//SET=== Image WIDTH : $FileImageW
//SET=== Image HEIGHT : $FileImageH
if($FileImageOrg):
$source_path = $FileImageOrg;

$source_name = $source_path;
$lastname=strtolower(pathinfo($source_name, PATHINFO_EXTENSION));
list($source_width, $source_height, $source_type) = getimagesize($source_path);
switch ($source_type) {
    case IMAGETYPE_GIF:
        $source_gdim = imagecreatefromgif($source_path);
        break;
    case IMAGETYPE_JPEG:
        $source_gdim = imagecreatefromjpeg($source_path);
        break;
    case IMAGETYPE_PNG:
        $source_gdim = imagecreatefrompng($source_path);
        break;
}

if(!$FileImageW and !$FileImageH):
	$FileImageW=$source_width;
	$FileImageH=$source_height;
endif;

$source_aspect_ratio = $source_width / $source_height;
$desired_aspect_ratio = $FileImageW / $FileImageH;

if ($source_aspect_ratio > $desired_aspect_ratio) {
    $temp_height = $FileImageH;
    $temp_width = ( int ) ($FileImageH * $source_aspect_ratio);
} else {
    $temp_width = $FileImageW;
    $temp_height = ( int ) ($FileImageW / $source_aspect_ratio);
}

$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
if($lastname=='png'):
	imagealphablending($temp_gdim , false);
	imagesavealpha($temp_gdim , true);
elseif($lastname=='gif'):
	imagealphablending($temp_gdim , false);
	imagesavealpha($temp_gdim , true);
elseif($lastname=='jpg' or $lastname=='jpeg'):

endif;
imagecopyresampled($temp_gdim,$source_gdim,0, 0,0, 0,$temp_width, $temp_height,$source_width, $source_height);

$x0 = ($temp_width - $FileImageW) / 2;
$y0 = ($temp_height - $FileImageH) / 2;
$desired_gdim = imagecreatetruecolor($FileImageW, $FileImageH);

if($lastname=='png'):
	imagealphablending($desired_gdim , false);
	imagesavealpha($desired_gdim , true);
elseif($lastname=='gif'):
	imagealphablending($desired_gdim , false);
	imagesavealpha($desired_gdim , true);
elseif($lastname=='jpg' or $lastname=='jpeg'):

endif;
imagecopy($desired_gdim,$temp_gdim,0, 0,$x0, $y0,$FileImageW, $FileImageH);

if($lastname=='png'):
	imagepng($desired_gdim,$FileImageName,9);
elseif($lastname=='gif'):
	imagepng($desired_gdim,$FileImageName,9);
elseif($lastname=='jpg' or $lastname=='jpeg'):
	imagejpeg($desired_gdim,$FileImageName,100);
endif;

endif;
}
//=================END_RESIZE_IMAGE==============================================
?>
<?
$valid_formats = array("jpg", "jpeg" , "png", "gif", "bmp");
$max_file_size = 1024*$file_size; //1000 kb
$path = $root_path.$dir_uploads;//"uploads/"; // Upload directory
$count = 0;

$ssid=$_POST['ssid'];
$time=$_POST['time'];
$numImg=$_POST['numImg'];

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" and $ssid and $time){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name - ไฟล์นี้ใหญ่เกินไป!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name - ไฟล์นี้ไม่ได้รับการรองรับ";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 

				if($numImg<$max_num_img){
					$numImg++;
					$new_file=getFileNameUploadNew($name,$path);
					if(!file_exists($path))mkdir($path);
					if(!file_exists($path.'_thumbs/'))mkdir($path.'_thumbs/');
					
					if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$new_file)){
						crop_resize_image($path.$new_file , $path.'_thumbs/'.$new_file , 256 , 181);
						$sql="INSERT INTO images (ssid , time , img)VALUES('$ssid' , '$time' , '$new_file')";
						mysql_query($sql);
						$last_id=mysql_insert_id();
						echo'<div class="pvImg" id="Div'.$last_id.'"><img src="../css/images/del_drg.png" class="btnDelImg" imgName="'.$new_file.'" imgID="'.$last_id.'";><img src="'.$dir_uploads.'_thumbs/'.$new_file.'" class="img"></div>';
						$count++; // Number of successfully uploaded file
					}
				}else{
					$message[] = "สามารถอัพโหลดไฟล์ได้ ".$max_num_img." ไฟล์เท่านั้น";
					break;
				}
	        }
	    }
	}
}
?>
<?php
# error messages
if (isset($message)) {
	echo '<div class="alertErr hid">';
	foreach ($message as $msg) {
		printf("%s \n", $msg);
	}
	echo '</div>';
}
# success message
if($count !=0){
	//printf("<p class='status'>%d files added successfully!</p>\n", $count);
}
?>