<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Site extends CI_Controller{
	
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
		$this->load->view('index');
	}
	
	public function page()
	{
		if($this->input->post('page')){
			$this->db->where('page',$this->input->post('page'));
			$data_upd=array('header'=>$this->input->post('header'),'content'=>$this->input->post('content'),'date_up'=>date('Y-m-d H:i:s'));
			$this->db->update($this->config->item('system_site'),$data_upd);
		}
		
		$this->db->where('page',$this->uri->segment(3));
		$q=$this->db->get($this->config->item('system_site'));
		$data['content_data']=array('r'=>$q->row());
		$data['content_view']='site/page';
		$this->load->view('index',$data);
	}
	
}
?>