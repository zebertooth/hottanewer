<?php
function set_cookie($name='',$value='',$expire='',$domain='',$path='/',$prefix='',$secure=FALSE){
	$CI=& get_instance();
	$CI->input->set_cookie($name,$value,$expire,$domain,$path,$prefix,$secure);
}
function get_cookie($index='',$xss_clean=FALSE){
	$CI=& get_instance();
	$prefix='';
	if(!isset($_COOKIE[$index]) && config_item('cookie_prefix')!=''){
		$prefix=config_item('cookie_prefix');
	}
	return $CI->input->cookie($prefix.$index,$xss_clean);
}
function delete_cookie($name='',$domain='',$path='/',$prefix=''){
	set_cookie($name,'','',$domain,$path,$prefix);
}