<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Page extends CI_Controller{
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
			$q=$this->db->get($this->config->item('system_page'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='page/index';
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

$data['content_view']='page/page_edit';
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
		public function contenten_edit()
	{

		$this->db->select('`category_id`,`cate_name`',false);
		$this->db->order_by('cate_name','ASC');
		$query=$this->db->get($this->config->item('system_category'));
		$data['content_view']='page/contenten_edit';
		$data['content_data']=array('cate'=>$query);
		$this->load->view('index',$data);

	}
		public function pro_edit()
	{

$data['content_view']='page/pro_edit';
$this->load->view('index',$data);

	}

public function del(){

$this->db->where('id', $this->uri->segment(3));
$this->db->delete('news');
redirect(site_url('page/content'),'refresh');
	}

public function contentadd_complete()
	{
		if($this->input->post('process')=='1'){
#ระบบอัพโหลด SLIP
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = '../items/uploads/news/';
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
#หาข้อมูล หมวดหมู่
		$this->db->select('cate_thname,cate_enname');
		$this->db->where('category_id',$this->input->post('category-dropdown'));
		$u=$this->db->get($this->config->item('system_catearticle'));
		$cate=$u->row();
			$data=array(
				'title'	=> $this->input->post('title'),
				'keyword'	=> $this->input->post('keyword'),
				'category'	=> $this->input->post('category-dropdown'),
				'sub_category'	=> $this->input->post('sub-category-dropdown'),
				'description'	=> $this->input->post('description'),
				'detail'	=> $this->input->post('detail'),
				'thumb'	=> $picture,
				'status'	=> $this->input->post('status')
			);
			$this->db->insert($this->config->item('news'),$data);
			redirect(site_url('page/content'),'refresh');
		}
}
public function pageedit_complete()
	{
			$data=array(
				'topic'	=> $this->input->post('topic'),
				'title'	=> $this->input->post('title'),
				'keyword'	=> $this->input->post('keyword'),
				'description'	=> $this->input->post('description'),
				'detail'	=> $this->input->post('detail')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_page'), $data);
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
public function contentedit_complete()
	{
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = '../items/uploads/news/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = $this->input->post('picture2');
                }
            }else{
                $picture = $this->input->post('picture2');
            }
		$this->db->select('cate_thname,cate_enname');
		$this->db->where('category_id',$this->input->post('category-dropdown'));
		$u=$this->db->get($this->config->item('system_catearticle'));
			$data=array(
				'category'	=> $this->input->post('category-dropdown'),
				'sub_category'	=> $this->input->post('sub-category-dropdown'),
				'title'	=> $this->input->post('title'),
				'keyword'	=> $this->input->post('keyword'),
				'description'	=> $this->input->post('description'),
				'detail'	=> $this->input->post('detail'),
				//'title_en'	=> $this->input->post('title_en'),
				//'keyword_en'	=> $this->input->post('keyword_en'),
				//'description_en'	=> $this->input->post('description_en'),
				//'detail_en'	=> $this->input->post('detail_en'),
				'thumb'	=> $picture
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('news'), $data);
redirect(site_url('page/content_edit/'.$this->input->post('id').''),'refresh');
#redirect(site_url('page/content'),'refresh');
}public function contentediten_complete()
	{
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = '../items/uploads/news/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = $this->input->post('picture2');
                }
            }else{
                $picture = $this->input->post('picture2');
            }
			$data=array(
				
				'title_en'	=> $this->input->post('title_en'),
				'keyword_en'	=> $this->input->post('keyword_en'),
				'description_en'	=> $this->input->post('description_en'),
				'detail_en'	=> $this->input->post('detail_en'),
				'thumb'	=> $picture
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('news'), $data);
redirect(site_url('page/contenten_edit/'.$this->input->post('id').''),'refresh');
#redirect(site_url('page/content'),'refresh');
}
		public function adver_complete()
	{

$data['content_view']='content/adver_complete';
$this->load->view('index',$data);

	}
#type
public function type()
	{
			$this->db->order_by('category_id','DESC');
			$q=$this->db->get($this->config->item('system_catearticle'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='page/type';
		$this->load->view('index',$data);
	
	}
		public function cate_add()
	{

$data['content_view']='page/cate_add';
$this->load->view('index',$data);

	}
		public function cate_edit()
	{

$data['content_view']='page/cate_edit';
$this->load->view('index',$data);

	}
public function cateadd_complete()
	{
	if($this->input->post('a_SignatureOption')=='0'){
$sub = '0';
$main = '0';
	}else{
$sub = '1';
$main = $this->input->post('category');
	}
			$data=array(
				'cate_thname'	=> $this->input->post('cate_thname'),
				'cate_enname'	=> $this->input->post('cate_enname'),
				'sub'	=> $sub,
				'main'	=> $main,
				'title'	=> $this->input->post('title'),
				'keyword'	=> $this->input->post('keyword'),
				'description'	=> $this->input->post('description')
			);

			$this->db->insert($this->config->item('system_catearticle'),$data);
			redirect(site_url('page/type'),'refresh');
}
public function cateedit_complete()
	{
	if($this->input->post('a_SignatureOption')=='0'){
$sub = '0';
$main = '0';
	}else{
$sub = '1';
$main = $this->input->post('category');
	}
			$data=array(
				'cate_thname'	=> $this->input->post('cate_thname'),
				'cate_enname'	=> $this->input->post('cate_enname'),
				'sub'	=> $sub,
				'main'	=> $main,
				'title'	=> $this->input->post('title'),
				'keyword'	=> $this->input->post('keyword'),
				'description'	=> $this->input->post('description')
			);
$this->db->where('category_id',$this->input->post('id'));
$this->db->update($this->config->item('system_catearticle'), $data);
redirect(site_url('page/cate_edit/'.$this->input->post('id').''),'refresh');
}
	function get_sub_category(){
		$this->db->select('`category_id`,`cate_thname`',false);
		$this->db->order_by('category_id','ASC');
		$this->db->where('main',$this->input->post('category_id'));
		$cate1=$this->db->get($this->config->item('system_catearticle'));
		$cate1->result();
		foreach($cate1->result() as $result){
echo'<option value="'.$result->category_id.'"';
 if($row->type == $result->category_id) echo 'selected';
echo'>'.$result->cate_thname.'</option>';
		}
	}
}
?>