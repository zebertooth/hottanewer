<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('captcha');
	}
	
	function getcapachaimage()
	{
		$captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
		$captchanumber = substr(str_shuffle($captchanumber), 0, 6);
		/*$datase=array(
							'code'		=> $captchanumber
						);
						$this->session->set_userdata($datase);*/
		$this->session->set_userdata('code', $captchanumber);
		$path= base_url().'items/img/1.jpg';
		$image = imagecreatefromjpeg($path);
		$foreground = imagecolorallocate($image, 175, 199, 200); //font color
		imagestring($image, 8, 25, 8, $captchanumber, $foreground);
		header('Content-type: image/png');
		imagepng($image);
	}
	function checkcaptcha()
	{	
		if ($this->session->userdata('code') == $this->input->post('captcha')) {
			$json['success']  = true;
		} else {
			$json['error']  = true;
		}
		echo json_encode($json);
	}
}
