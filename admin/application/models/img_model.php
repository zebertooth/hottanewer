<?php 
date_default_timezone_set("Asia/Bangkok");
class Img_model extends CI_Model{

function resize($file, $imgpath, $width, $height){
    /* Get original image x y*/
    list($w, $h) = getimagesize($file['tmp_name']);
    /* calculate new image size with ratio */
    $ratio = max($width/$w, $height/$h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);

    /* new file name */
    $path = $imgpath;
    /* read binary data from image file */
    $imgString = file_get_contents($file['tmp_name']);
    /* create image from string */
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
    /* Save image */
    switch ($file['type']) {
       case 'image/jpeg':
          imagejpeg($tmp, $path, 100);
          break;
       case 'image/png':
          imagepng($tmp, $path, 0);
          break;
       case 'image/gif':
          imagegif($tmp, $path);
          break;
          default:
          //exit;
          break;
        }
     return $path;

     /* cleanup memory */
     imagedestroy($image);
     imagedestroy($tmp);
}

}
?>