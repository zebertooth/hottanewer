<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class dashboard extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

	public function index()
	{
	$this->load->model('topup_model');		
		$data['content_view']='dashboard/index';
		$this->load->view('index',$data);
	}
	
}
?>