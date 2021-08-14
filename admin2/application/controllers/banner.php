<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Banner extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('img_model');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}

		
	}

public function index()
	{
			$q=$this->db->get($this->config->item('banner'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='banner/index';
		$this->load->view('index',$data);
	
	}
public function fusion()
	{
	       $this->db->where('type','2');
			$this->db->order_by('id','DESC');
			$q=$this->db->get($this->config->item('banner'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='banner/fusion';
		$this->load->view('index',$data);
	
	}
public function slice()
	{
	       $this->db->where('type','1');
			$this->db->order_by('id','DESC');
			$q=$this->db->get($this->config->item('banner'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='banner/slice';
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
		public function add()
	{

$data['content_view']='banner/add';
$this->load->view('index',$data);

	}
		public function edit()
	{

$data['content_view']='banner/edit';
$this->load->view('index',$data);

	}

public function complete()
	{
		if($this->input->post('process')=='1'){
#ระบบอัพโหลด SLIP
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './../items/uploads/banner/';
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
#-----------------------ระบบภาพ 2
            if(!empty($_FILES['banner_eng']['name'])){
                $config['upload_path'] = './../items/uploads/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF';
                $config['file_name'] = $_FILES['banner_eng']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('banner_eng')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }else{
                    $picture2 = '';
                }
            }else{
                $picture2 = '';
            }
#-----------------------สิ้นสุดภาพ 2
			$data=array(
				'name'	=> $this->input->post('name'),
				'banner'	=> $this->input->post('banner'),
				'banner_en'	=> $this->input->post('banner_en'),
				//'date_add'	=> date('Y-m-d H:i:s'),
                'banner' => $picture,
                'banner_en' => $picture2,
				'orderindex'	=> $this->input->post('orderindex'),
				'type'	=> $this->input->post('type'),
				'link'	=> $this->input->post('link'),
				'video'	=> $this->input->post('video'),
				'show'	=> $this->input->post('show'),
				'status'	=> $this->input->post('status')
			);
			$this->db->insert($this->config->item('banner'),$data);
			echo $picture;echo $picture2;
			redirect(site_url('banner/'.$this->input->post('return').''),'refresh');
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
public function edit_complete()
	{
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = '../items/uploads/banner/';
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
#ภาพสอง
            if(!empty($_FILES['banner_eng']['name'])){
                $config['upload_path'] = '../items/uploads/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF';
                $config['file_name'] = $_FILES['banner_eng']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('banner_eng')){
                    $uploadData = $this->upload->data();
                    $banner_eng = $uploadData['file_name'];
                }else{
                    $banner_eng = $this->input->post('banner_eng2');
                }
            }else{
                $banner_eng = $this->input->post('banner_eng2');
            }
#สิ้นสุด
			$data=array(
				'name'	=> $this->input->post('name'),
				'banner'	=> $picture,
				'banner_en'	=> $banner_eng,
				'type'	=> $this->input->post('type'),
				'link'	=> $this->input->post('link'),
				'video'	=> $this->input->post('video'),
				'show'	=> $this->input->post('show'),
				'orderindex'	=> $this->input->post('orderindex'),
				'status'	=> $this->input->post('status')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('banner'), $data);
//redirect(site_url('page/content_edit/'.$this->input->post('id').''),'refresh');
redirect(site_url('banner/'.$this->input->post('return').''),'refresh');
}
		public function adver_complete()
	{

$data['content_view']='content/adver_complete';
$this->load->view('index',$data);

	}
	
	public function key()
	{
#page
        $perpage='1';
$this->db->where('(status = 1)');
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_key'));
$this->db->where('(status = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_key'));
		
		$config['base_url'] = site_url('content/key/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'content/key';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status_key'=>$this->config->item('status_key'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}public function del(){

$this->db->where('id', $this->uri->segment(3));
$this->db->delete('banner');
redirect(site_url('banner'),'refresh');
	}
	
}
?>