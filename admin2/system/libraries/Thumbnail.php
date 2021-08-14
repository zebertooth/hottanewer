<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class CI_Thumbnail{
/*===============START========================*/
function thumbnail_generator($srcfile, &$params)
{
    // getting source image size
    @list($w, $h) = getimagesize($srcfile);
    if ($w == false)
        return false;

    // checking params array 
    if (!(is_array($params)&&is_array($params[0])))
        return false;

    $src = ImageCreateFromJpeg($srcfile);
    list($s1_w, $s1_h) = thumbnail_calcsize($w, $h, $params[0]['size']);

    // Create first thumbnail
    // Remember, first thumbnail should be largest thumbnail
    $img_s1 = imagecreatetruecolor($s1_w, $s1_h);
    imagecopyresampled($img_s1, $src, 0, 0, 0, 0, $s1_w, $s1_h, $w, $h);
    imagedestroy($src); // Destroy source image 


    // Other thumbnails are just downscaled copies of the first one
    for($i=1; $i<sizeof($params); $i++)
    {
        list($cur_w, $cur_h) = thumbnail_calcsize($w, $h, $params[$i]['size']);
        $img_cur = imagecreatetruecolor($cur_w, $cur_h);
        imagecopyresampled($img_cur, $img_s1, 0, 0, 0, 0, $cur_w, $cur_h, $s1_w, $s1_h);
        imagejpeg($img_cur, $params[$i]['file'], 90);
        imagedestroy($img_cur);
    }

    // Saving first thumbnail 
    imagejpeg($img_s1, $params[0]['file'], 90);
    imagedestroy($img_s1);
    return true;
}
/*===============END==========================*/

}