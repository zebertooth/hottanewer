<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Config extends CI_Controller{
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
			$q=$this->db->get($this->config->item('topup_config'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='config/index';
		$this->load->view('index',$data);
	
	}
public function promotion()
	{
			$q=$this->db->get($this->config->item('system_promotion'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='page/promotion';
		$this->load->view('index',$data);
	
	}
		public function changepass()
	{

$data['content_view']='content/changepass';
$this->load->view('index',$data);

	}

		public function article_add()
	{

$data['content_view']='content/article_add';
$this->load->view('index',$data);

	}
		public function page_edit()
	{

$data['content_view']='page/page_edit';
$this->load->view('index',$data);

	}
		public function pro_edit()
	{

$data['content_view']='page/pro_edit';
$this->load->view('index',$data);

	}
public function article_complete()
	{
		if($this->input->post('process')=='1'){
			$data=array(
				'topic'	=> $this->input->post('topic'),
				'description'	=> $this->input->post('description'),
				'category_id'	=> $this->input->post('category_id'),
				'date_add'	=> date('Y-m-d H:i:s'),
				'detail'	=> $this->input->post('detail'),
				'keyword'	=> $this->input->post('keyword'),
				'status'	=> $this->input->post('status')
			);
			$this->db->insert($this->config->item('system_article'),$data);
			redirect(site_url('content/article'),'refresh');
		}
}
public function pageedit_complete()
	{
			$data=array(
				'name'	=> $this->input->post('topic'),
				'detail'	=> $this->input->post('detail')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_help'), $data);
redirect(site_url('page/page_edit/'.$this->input->post('id').''),'refresh');
}
public function proedit_complete()
	{
			$data=array(
				'name'	=> $this->input->post('topic'),
				'description'	=> $this->input->post('description'),
				'detail'	=> $this->input->post('detail')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_promotion'), $data);
redirect(site_url('page/pro_edit/'.$this->input->post('id').''),'refresh');
}
		public function adver_complete()
	{

$data['content_view']='content/adver_complete';
$this->load->view('index',$data);

	}

}
?>