<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class System extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('date');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}

		
	}
		public function setting()
	{

$data['content_view']='system/setting';
$this->load->view('index',$data);

	}
		public function save()
	{
		if($this->input->post('process')=='1'){
#Start
	$data=array(
				'facebook'	=> $this->input->post('facebook'),
				'tel'	=> $this->input->post('tel'),
				'email1'	=> $this->input->post('email1'),
				'email2'	=> $this->input->post('email2'),
				'email3'	=> $this->input->post('email3'),
				'email4'	=> $this->input->post('email4'),
				'latitude'	=> $this->input->post('latitude'),
				'lontitude'	=> $this->input->post('lontitude'),
				'api_key'	=> $this->input->post('api_key')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_config'), $data);
echo '<div class="alert alert-success" role="alert">เเก้ไขข้อมูลสำเร็จ</div>';	
redirect(site_url('system/setting'),'refresh');
#End
		}
	}
public function email() {
#ข้อมูลหมวดหมู่
	/*	$this->db->select('id,name');
		$this->db->order_by('name','ASC');
		$categorycom=$this->db->get($this->config->item('gallery_category'));*/
#ข้อมูลเเต่ละหมวด
$category = $this->uri->segment(3);
if($category =='' || $category =='all'){
$pagin = 'all';}else{$pagin = $category;}
 $perpage = '20';
if($category =='' || $category =='all'){}else{$this->db->where('(ststus = '.$category.')');}
		
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(4)?$this->uri->segment(4):0));
		$q = $this->db->get($this->config->item('system_mail'));
if($category =='' || $category =='all'){}else{$this->db->where('(status = '.$category.')');}
		$rows = $this->db->count_all_results($this->config->item('system_mail'));
		$config['base_url'] = site_url('system/email/'.$category.'/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'system/email';
		$data['content_data'] = array(
				'q'		=>$q,
			     'row'=>$rows,
                // 'categorycom'=>$categorycom,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);

	}
}
?>