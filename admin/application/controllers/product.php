<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Product extends CI_Controller{
	function __construct()
	{
		parent::__construct();
	//	$this->load->model('Product_model');
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

public function type()
	{
			$this->db->order_by('category_id','DESC');
			$q=$this->db->get($this->config->item('system_cateproduct'));
			$data['r']=$q->row();
		$data['content_data'] = array(
				'q'				=>$q
		);
		$data['content_view']='product/type';
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
		public function cate_edit()
	{

$data['content_view']='product/cate_edit';
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

			$this->db->insert($this->config->item('system_cateproduct'),$data);
			redirect(site_url('product/type'),'refresh');
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
$this->db->update($this->config->item('system_cateproduct'), $data);
redirect(site_url('product/cate_edit/'.$this->input->post('id').''),'refresh');
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
		public function cate_add()
	{

$data['content_view']='product/cate_add';
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
#หาข้อมูล หมวดหมู่
		$this->db->select('cate_thname,cate_enname');
		$this->db->where('category_id',$this->input->post('category-dropdown'));
		$u=$this->db->get($this->config->item('system_cateproduct'));
		$cate=$u->row();
			$data=array(
				'type'	=> $this->input->post('category-dropdown'),
				'type_name'	=> $cate->cate_thname,
				'cate_enname'	=> $cate->cate_enname,
				'brand_TH'	=> $this->input->post('brand_TH'),
				'brand_EN'	=> $this->input->post('brand_EN'),
				'shortth_name'	=> $this->input->post('shortth_name'),
				'shorten_name'	=> $this->input->post('shorten_name'),
				'short_descriptionEN'	=> $this->input->post('short_descriptionEN'),
				'short_descriptionTH'	=> $this->input->post('short_descriptionTH'),
				'urllink'	=> $this->input->post('urllink'),
				'detail'	=> $this->input->post('detail'),
				'product_new'	=> $this->input->post('product_new'),
				'product_reccommend'	=> $this->input->post('product_reccommend'),
				'detail_sec1'	=> $this->input->post('detail_sec1'),
				'detail_sec2'	=> $this->input->post('detail_sec2'),
				'product_bestsell'	=> $this->input->post('product_bestsell')
			);
$this->db->where('oid',$this->input->post('id'));
$this->db->update($this->config->item('tbl_product'), $data);
redirect(site_url('product/page_edit/'.$this->input->post('id').''),'refresh');
}
public function complete()
	{
#หาข้อมูล หมวดหมู่
		$this->db->select('cate_thname,cate_enname');
		$this->db->where('category_id',$this->input->post('category-dropdown'));
		$u=$this->db->get($this->config->item('system_cateproduct'));
		$cate=$u->row();
			$data=array(
				'type'	=> $this->input->post('category-dropdown'),
				'type_name'	=> $cate->cate_thname,
				'cate_enname'	=> $cate->cate_enname,
				'brand_TH'	=> $this->input->post('brand_TH'),
				'brand_EN'	=> $this->input->post('brand_EN'),
				'shortth_name'	=> $this->input->post('shortth_name'),
				'shorten_name'	=> $this->input->post('shorten_name'),
				'short_descriptionEN'	=> $this->input->post('short_descriptionEN'),
				'short_descriptionTH'	=> $this->input->post('short_descriptionTH'),
				'urllink'	=> $this->input->post('urllink'),
				'detail'	=> $this->input->post('detail'),
				'detail_sec1'	=> $this->input->post('detail_sec1'),
				'detail_sec2'	=> $this->input->post('detail_sec2'),
				'product_new'	=> $this->input->post('product_new'),
				'product_reccommend'	=> $this->input->post('product_reccommend'),
				'product_bestsell'	=> $this->input->post('product_bestsell')
			);
			$this->db->insert($this->config->item('tbl_product'),$data);
redirect(site_url('product'),'refresh');
}
	// get sub category by category_id
	function get_sub_category(){
		$this->db->select('`category_id`,`cate_thname`',false);
		$this->db->order_by('category_id','ASC');
		$this->db->where('main',$this->input->post('category_id'));
		$cate1=$this->db->get($this->config->item('system_cateproduct'));
		$cate1->result();
		foreach($cate1->result() as $result){
echo'<option value="'.$result->category_id.'"';
 if($row->type == $result->category_id) echo 'selected';
echo'>'.$result->cate_thname.'</option>';
		}

	
		/*$category_id = '1';
		$data = $this->product_model->get_sub_category($category_id)->result();
		echo json_encode($data);*/
	}	
}
?>