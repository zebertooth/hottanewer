<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Product extends CI_Controller{
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
		$this->db->order_by('oid','DESC');
			$q=$this->db->get($this->config->item('tbl_product'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='product/index';
		$this->load->view('index',$data);
	
	}

public function content()
	{
			$this->db->order_by('id','DESC');
			$q=$this->db->get($this->config->item('news'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='page/content';
		$this->load->view('index',$data);
	
	}
		public function changepass()
	{

$data['content_view']='content/changepass';
$this->load->view('index',$data);

	}
public function pass_complete()
	{
$password = md5($this->input->post('password')); 
$this->db->where('id','1');
$this->db->set('`password`',$password);
$this->db->update($this->config->item('system_users'));
redirect(site_url('dashboard'),'refresh');
}
		public function article_add()
	{

$data['content_view']='content/article_add';
$this->load->view('index',$data);

	}
		public function content_add()
	{

$data['content_view']='page/content_add';
$this->load->view('index',$data);

	}
		public function page_edit()
	{

$data['content_view']='product/page_edit';
$this->load->view('index',$data);

	}
		public function add()
	{

$data['content_view']='product/add';
$this->load->view('index',$data);

	}
		public function content_edit()
	{

		$this->db->select('`category_id`,`cate_name`',false);
		$this->db->order_by('cate_name','ASC');
		$query=$this->db->get($this->config->item('system_category'));
		$data['content_view']='page/content_edit';
		$data['content_data']=array('cate'=>$query);
		$this->load->view('index',$data);

	}

public function del(){

$this->db->where('oid', $this->uri->segment(3));
$this->db->delete('tbl_product');
redirect(site_url('product'),'refresh');
	}

public function contentadd_complete()
	{
		if($this->input->post('process')=='1'){
#ระบบอัพโหลด SLIP
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = '../items/uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
			$data=array(
				'name'	=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'linkname'	=> $this->input->post('linkname'),
				'category'	=> $this->input->post('category'),
				//'date_add'	=> date('Y-m-d H:i:s'),
                'pic' => $picture,
				'title'	=> $this->input->post('title'),
				'detail'	=> $this->input->post('detail'),
				'keyword'	=> $this->input->post('keyword'),
				'status'	=> $this->input->post('status')
			);
			$this->db->insert($this->config->item('system_content'),$data);
			echo $picture;
			redirect(site_url('page/content'),'refresh');
		}
}
public function pageedit_complete()
	{
			$data=array(
				'productname'	=> $this->input->post('productname'),
				'brandname'	=> $this->input->post('brandname'),
				'shortdesc'	=> $this->input->post('shortdesc'),
				'description'	=> $this->input->post('description'),
				'description1'	=> $this->input->post('description1')
			);
$this->db->where('oid',$this->input->post('id'));
$this->db->update($this->config->item('tbl_product'), $data);
redirect(site_url('product/page_edit/'.$this->input->post('id').''),'refresh');
}
public function edit_complete()
	{
			$data=array(
				'brand_TH'	=> $this->input->post('brand_TH'),
				'shortth_name'	=> $this->input->post('shortth_name'),
				'enname'	=> $this->input->post('enname'),
				'description'	=> $this->input->post('description'),
				'sub_nameUE'	=> $this->input->post('sub_nameUE'),
				'sub_nameUTH'	=> $this->input->post('sub_nameUTH'),
				'short_detail'	=> $this->input->post('short_detail'),
				'detail'	=> $this->input->post('detail')
			);
$this->db->where('oid',$this->input->post('id'));
$this->db->update($this->config->item('tbl_product'), $data);
redirect(site_url('product/page_edit/'.$this->input->post('id').''),'refresh');
}
public function complete()
	{
			$data=array(
				'brand_TH'	=> $this->input->post('brand_TH'),
				'shortth_name'	=> $this->input->post('shortth_name'),
				'enname'	=> $this->input->post('enname'),
				'description'	=> $this->input->post('description'),
				'sub_nameUE'	=> $this->input->post('sub_nameUE'),
				'sub_nameUTH'	=> $this->input->post('sub_nameUTH'),
				'short_detail'	=> $this->input->post('short_detail'),
				'detail'	=> $this->input->post('detail')
			);
			$this->db->insert($this->config->item('tbl_product'),$data);
redirect(site_url('product'),'refresh');
}
	
}
?>