<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Service extends CI_Controller{
	
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
		$q=$this->db->get($this->config->item('topup_bills'));
		$data['content_data']=array('q'=>$q);
		$data['content_view']='service/index';
		$this->load->view('index',$data);
	}
	
	public function save()
	{
		if($_POST){
			foreach($_POST as $key=>$value){
				$this->db->where('id',$key);
				$this->db->update($this->config->item('topup_bills'),array('service'=>$value[1],'discount'=>$value[2]));
			}
		}
		redirect('service','refresh');
	}
	
}
?>