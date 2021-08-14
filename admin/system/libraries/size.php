<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class CI_Size{
	function getNiceFileSize($file,$PathRoot, $digits = 2){
    if (is_file($file)) {
        $filePath = $file;
        if (!realpath($filePath)) {
            $filePath = $_SERVER["DOCUMENT_ROOT"] .$PathRoot. $filePath;
        }
        $fileSize = filesize($filePath);
        $sizes = array("TB", "GB", "MB", "KB", "B");
        $total = count($sizes);
        while ($total-- && $fileSize > 1024) {
            $fileSize /= 1024;
        }
        return round($fileSize, $digits) . " " . $sizes[$total];
    }
    return false;
}

}