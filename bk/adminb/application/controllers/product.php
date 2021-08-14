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
			$q=$this->db->get($this->config->item('tbl_product'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='product/index';
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

$data['content_view']='product/page_edit';
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
		public function pro_edit()
	{

$data['content_view']='page/pro_edit';
$this->load->view('index',$data);

	}

public function del(){

$this->db->where('id', $this->uri->segment(3));
$this->db->delete('system_content');
redirect(site_url('page/content'),'refresh');
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
                    $picture = $this->input->post('picture2');
                }
            }else{
                $picture = $this->input->post('picture2');
            }
			$data=array(
				'name'	=> $this->input->post('topic'),
				'title'	=> $this->input->post('title'),
				'category'	=> $this->input->post('category'),
				'linkname'	=> $this->input->post('linkname'),
				'keyword'	=> $this->input->post('keyword'),
				'pic'	=> $picture,
				'description'	=> $this->input->post('description'),
				'detail'	=> $this->input->post('detail')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_content'), $data);
//redirect(site_url('page/content_edit/'.$this->input->post('id').''),'refresh');
redirect(site_url('page/content'),'refresh');
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
	
	}public function key01()
	{
#page
        $perpage='60';
	
	#$this->db->where('(package = 1 OR package = 2 OR package = 3 OR package = 4 OR package = 5 OR package = 6)');
#$this->db->where('status','1');
$this->db->where('(status = 0)');
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_key'));
		
		#$this->db->where('(package = 1 OR package = 2 OR package = 3 OR package = 4 OR package = 5 OR package = 6)');
	    #$this->db->where('status','1');
$this->db->where('(status = 0)');
		$rows = $this->db->count_all_results($this->config->item('system_key'));
		
		$config['base_url'] = site_url('content/key01/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'content/key01';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status_key'=>$this->config->item('status_key'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}	
}
?>