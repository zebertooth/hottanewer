<?php
if (! isset ( $_SESSION )) {
	session_start ();
}


function checkAdminAuthorize() {
	if (! isset ( $_SESSION ['session_id'] ) || ! isset ( $_SESSION ['admin_user'] )) {
		echo "<script type='text/javascript'>window.top.location = '/admin/signin.php'; </script>";
	} else if (isset ( $_SESSION ['session_id'] )) {
		if ($_SESSION ['session_id'] != session_id ()) {
			echo "<script type='text/javascript'>window.top.location = '/admin/signin.php'; </script>";
		}
	}
}

checkAdminAuthorize ();

require "page_authorize.inc.php";
checkAdminPage();
?>