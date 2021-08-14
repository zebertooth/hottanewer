<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Gallery extends CI_Controller{
	
	var $bank;
	var $network;
	var $ratio;
	var $ratio_vip;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}	
	}

public function index()
	{
        $perpage = '20';
	    $this->db->where('(status = 1)');
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_gallery'));
		$this->db->where('(status = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_gallery'));
		$config['base_url'] = site_url('page/index/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'gallery/index';
		$data['content_data'] = array(
				'q'		=>$q,
			     'row'=>$rows,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
		public function category() {
#ข้อมูลหมวดหมู่
		$this->db->select('id,name');
		$this->db->order_by('name','ASC');
		$query=$this->db->get($this->config->item('gallery_category'));
#ข้อมูลเเต่ละหมวด
$category = $this->uri->segment(3);
if($category =='' || $category =='all'){
$pagin = 'all';}else{$pagin = $category;}
 $perpage = '20';
if($category =='' || $category =='all'){}else{
$this->db->like('category', $category);
}
		
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(4)?$this->uri->segment(4):0));
		$q = $this->db->get($this->config->item('system_gallery'));
if($category =='' || $category =='all'){}else{
$this->db->like('category', $category);
}
		$rows = $this->db->count_all_results($this->config->item('system_gallery'));
		$config['base_url'] = site_url('gallery/category/'.$category.'/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'gallery/category';
		$data['content_data'] = array(
				'q'		=>$q,
			     'row'=>$rows,
                 'query'=>$query,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);

	}
		public function cate()
	{

$data['content_view']='gallery/cate';
$this->load->view('index',$data);

	}
		public function add()
	{

$data['content_view']='gallery/add';
$this->load->view('index',$data);

	}
		public function edit()
	{

$data['content_view']='gallery/edit';
$this->load->view('index',$data);

	}
public function Addcomplete()
	{
$stuff = $this->input->post('category'); 
$data2=implode(",",$stuff );
		if($this->input->post('process')=='1'){
			$data=array(
				'topic'	=> $this->input->post('topic'),
				'category'	=> $data2,
				'pic'	=> $this->input->post('ImgMain')
			);
			$this->db->insert($this->config->item('system_gallery'),$data);
			redirect(site_url('gallery/category/all'),'refresh');
		}
}
public function edit_complete()
	{
$stuff = $this->input->post('category'); 
$data2=implode(",",$stuff );
			$data=array(
				'topic'	=> $this->input->post('topic'),
				'pic'	=> $this->input->post('ImgMain'),
				'category'	=> $data2
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_gallery'), $data);
redirect(site_url('gallery/edit/'.$this->input->post('id').''),'refresh');
}
		public function adver_complete()
	{

$data['content_view']='content/adver_complete';
$this->load->view('index',$data);

	}
	#ลบข้อมูลบทความ
	public function delete()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete($this->config->item('system_gallery'));
        redirect(site_url('gallery/category/all'),'refresh');
	}
	
}
?>