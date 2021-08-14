<?php
// ============================= JAVASCRIPT CONTROL
// ===================================
if (isset ( $alert ))
	echo "<script type='text/javascript'>alert('$alert');</script>";
if (isset ( $reload ))
	echo "<script type='text/javascript'>window.location.reload();</script>";
if (isset ( $reloadOpener ))
	echo "<script type='text/javascript'> window.opener.location.reload();</script>";
if (isset ( $reloadMainFrame ))
	echo "<script type='text/javascript'>window.top.mainFrame.location.reload();</script>";
if (isset ( $reloadParentMainFrame ))
	echo "<script type='text/javascript'>opener.top.mainFrame.location.reload();</script>";
if (isset ( $location ))
	echo "<script type='text/javascript'>window.location = '$location';</script>";
if (isset ( $locationTop ))
	echo "<script type='text/javascript'>window.top.location = '$locationTop';</script>";
if (isset ( $locationOpener ))
	echo "<script type='text/javascript'>window.opener.location = '$locationOpener';</script>";
if (isset ( $close ))
	echo "<script type='text/javascript'>window.close();</script>";
	
	// ========================= END JAVASCRIPT CONTROL
// ===================================
?>