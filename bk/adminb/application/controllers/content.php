<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Content extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('date');
		$this->load->library('thumbnail');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

	public function index()
	{
		
	}
		public function main()
	{
require_once(APPPATH."views/content/main.php");
	}

		public function show_box(){
if(isset($_POST["t1"])){
$this->db->from('images2');
$this->db->where('img',$_POST["t1"]);
$query = $this->db->get();
$row = $query->row();
echo'<form class="form-horizontal row-1">
<div class="spinA"><img src="'.base_url().'items/icon/spinner.gif" alt=""></div>

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-5">ข้อความ Alt</label>
                                        <div class="col-sm-7">
 <input type="text" class="form-control form-control-sm" name="Altimg" id="Altimg" value="'.$row->altimg.'" />  
<p>ถ้าว่างไว้หากเป็นแค่เพียงรูปภาพที่ใช้ตบแต่งเว็บเท่านั้น</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5"> คำบรรยายภาพ</label>
                                        <div class="col-sm-7">
    <textarea class="form-control form-control-sm" name="post_description" id="post_description">'.$row->description.'</textarea>
 <input type="hidden" name="post_id" id="post_id" value="'.$row->id.'" />  
                                        </div>
                                    </div>
                            </form>  
 <div class="form-group row row-1">
                                        <label class="col-sm-5"> 
<div class="tooltip1">
<button class="btn btn-light btn-sm" onclick="myFunction()" onmouseout="outFunc()">
  <span class="tooltiptext" id="myTooltip">คัดลอก</span>
  คัดลอกลิงก์
  </button>
</div>
</label>
                                        <div class="col-sm-7">
<input type="text" class="form-control tm2 form-control-sm" id="Tmname" name="Tmname" value="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').''.$row->img.'">
                                        </div>
                                    </div>      
';
}else{
echo'<form class="form-horizontal">
<div class="spinA"><img src="'.base_url().'items/icon/spinner.gif" alt=""></div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4">ข้อความ Alt</label>
                                        <div class="col-sm-8">
 <input type="text" class="form-control" name="alt" id="alt"  />  
<p>ถ้าว่างไว้หากเป็นแค่เพียงรูปภาพที่ใช้ตบแต่งเว็บเท่านั้น</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4"> คำบรรยายภาพ</label>
                                        <div class="col-sm-8">
    <textarea class="form-control" name="post_description" id="post_description"></textarea>
 <input type="hidden" name="post_id" id="post_id" value="" />  
                                        </div>
                                    </div>
                            </form>  
 <div class="form-group row">
                                        <label class="col-sm-4"> 
<div class="tooltip1">
<button class="btn btn-light btn-sm" onclick="myFunction()" onmouseout="outFunc()">
  <span class="tooltiptext" id="myTooltip">คัดลอก</span>
  คัดลอกลิงก์
  </button>
</div>
</label>
                                        <div class="col-sm-8">
<input type="text" class="form-control tm2 form-control-sm" id="Tmname" name="Tmname" value="">
                                        </div>
                                    </div>      
';
}

	}
		public function show_time(){
if(isset($_POST["t2"])){
$this->db->from('images2');
$this->db->where('img',$_POST["t2"]);
$query = $this->db->get();
$row = $query->row();
echo $row->add_Date;
    }
}
		public function del_img()
	{
$dir_uploads = $this->config->item('dir_uploads');
$root_path = $_SERVER['DOCUMENT_ROOT']; 
$dir_uploads_article = $this->config->item('dir_uploads_article');
$img=basename($_POST['file_org']);
$this->db->where('img',$img);
$this->db->delete($this->config->item('images2'));
$file_org=$_POST['file_org'];
$file_tmp=$_POST['file_tmp'];
echo $file_org;
@unlink($root_path.$dir_uploads_article.$img);
@unlink($root_path.$dir_uploads_article.'_thumbs/'.$img);
}
		public function loadMoreData()
	{
require_once(APPPATH."views/content/loadMoreData.php");
}
		public function list_img()
	{

if(isset($_POST["fileType"])){
$images = $_POST['fileType'];
if($images =='all'){
$name='';
}else{
$this->db->from('images2');
$this->db->where('img',$images);
$query = $this->db->get();
$row = $query->row();
$name = 'where id ='.$row->id.'';
}
}else{
$name = 'where id !=""';
}
require_once(APPPATH."views/content/list_img.php");
}
		public function upload()
	{
$file_size = $this->config->item('file_size');
$dir_uploads = $this->config->item('dir_uploads');
$root_path = $_SERVER['DOCUMENT_ROOT']; 
$dir_uploads_article = $this->config->item('dir_uploads_article');
function getFileNameUploadNew($str,$directory){
	if($str):
		$str=strtolower($str);
		$last=pathinfo($str, PATHINFO_EXTENSION);
		$name=basename($str, ".".$last);
		$fileName=trim($name).'.'.$last;
		$i=0;
		while(getFileNameDownloadDri($fileName,$directory)):$i++;
			$fileName=$name.'_'.$i.'.'.$last;
		endwhile;
		
		return $fileName;
	endif;
}
function getFileNameDownloadDri($str,$directory){
	$dri=$directory.$str;
	
	if (file_exists($dri)):
		return true;
	else:
		return false;
	endif;
}

//=================START_RESIZE_IMAGE==============================================
function crop_resize_image($FileImageOrg,$FileImageName,$FileImageW,$FileImageH){
if($FileImageOrg):
$source_path = $FileImageOrg;

$source_name = $source_path;
$lastname=strtolower(pathinfo($source_name, PATHINFO_EXTENSION));
list($source_width, $source_height, $source_type) = getimagesize($source_path);
switch ($source_type) {
    case IMAGETYPE_GIF:
        $source_gdim = imagecreatefromgif($source_path);
        break;
    case IMAGETYPE_JPEG:
        $source_gdim = imagecreatefromjpeg($source_path);
        break;
    case IMAGETYPE_PNG:
        $source_gdim = imagecreatefrompng($source_path);
        break;
}

if(!$FileImageW and !$FileImageH):
	$FileImageW=$source_width;
	$FileImageH=$source_height;
endif;

$source_aspect_ratio = $source_width / $source_height;
$desired_aspect_ratio = $FileImageW / $FileImageH;

if ($source_aspect_ratio > $desired_aspect_ratio) {
    $temp_height = $FileImageH;
    $temp_width = ( int ) ($FileImageH * $source_aspect_ratio);
} else {
    $temp_width = $FileImageW;
    $temp_height = ( int ) ($FileImageW / $source_aspect_ratio);
}

$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
if($lastname=='png'):
	imagealphablending($temp_gdim , false);
	imagesavealpha($temp_gdim , true);
elseif($lastname=='gif'):
	imagealphablending($temp_gdim , false);
	imagesavealpha($temp_gdim , true);
elseif($lastname=='jpg' or $lastname=='jpeg'):

endif;
imagecopyresampled($temp_gdim,$source_gdim,0, 0,0, 0,$temp_width, $temp_height,$source_width, $source_height);

$x0 = ($temp_width - $FileImageW) / 2;
$y0 = ($temp_height - $FileImageH) / 2;
$desired_gdim = imagecreatetruecolor($FileImageW, $FileImageH);

if($lastname=='png'):
	imagealphablending($desired_gdim , false);
	imagesavealpha($desired_gdim , true);
elseif($lastname=='gif'):
	imagealphablending($desired_gdim , false);
	imagesavealpha($desired_gdim , true);
elseif($lastname=='jpg' or $lastname=='jpeg'):

endif;
imagecopy($desired_gdim,$temp_gdim,0, 0,$x0, $y0,$FileImageW, $FileImageH);

if($lastname=='png'):
	imagepng($desired_gdim,$FileImageName,9);
elseif($lastname=='gif'):
	imagepng($desired_gdim,$FileImageName,9);
elseif($lastname=='jpg' or $lastname=='jpeg'):
	imagejpeg($desired_gdim,$FileImageName,100);
endif;

endif;
}
//=================END_RESIZE_IMAGE==============================================
$valid_formats = array("jpg", "jpeg" , "JPG", "JPEG" , "png", "gif", "bmp");
$max_file_size = $file_size*1024*1024; //1000 kb
$path = $root_path.$dir_uploads_article;//"uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name - ไฟล์นี้ใหญ่เกินไป!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name - ไฟล์นี้ไม่ได้รับการรองรับ";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
				$new_file=getFileNameUploadNew($name,$path);
				if(!file_exists($path))mkdir($path);
				if(!file_exists($path.'_thumbs/'))mkdir($path.'_thumbs/');
				
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$new_file)){
//---------------------------------------------Resize --------------------------------------------------
	            crop_resize_image($path.$new_file , $path.'_thumbs/'.$new_file , 564 , 374);
	           // crop_resize_image($path.$new_file , $path.'small/'.$new_file , 120 , 110);
//--------------------------------------------- End resize---------------------------------------------
#ระบบอัพโหลด Sql
$data = array(
        'img' => $new_file,
		'add_Date'	=> date('Y-m-d')
);
$this->db->insert($this->config->item('images2'), $data);
					$count++;
				}
	        }
	    }
	}
}
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
		public function category_edit()
	{

$data['content_view']='content/category_edit';
$this->load->view('index',$data);

	}
public function categoryedit_complete()
	{
if ($this->input->post('title') ==''){
$title = $this->input->post('topic');
}else{
$title = $this->input->post('title');
}if ($this->input->post('description') ==''){
$description = $this->input->post('short_detail');
}else{
$description = $this->input->post('description');
}
	$data=array(
				'name'	=> $this->input->post('name'),
				'topic'	=> $this->input->post('topic'),
				'short_detail'	=> $this->input->post('short_detail'),
				'thumb'	=> $this->input->post('ImgMain'),
				'title'	=> $title,
				'keyword'	=> $this->input->post('keyword'),
				'description'	=> $description,
				'cover'	=> $this->input->post('ImgCover'),
				'text_cover'	=> $this->input->post('detail'),
				'status'	=> $this->input->post('status')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_category'), $data);
redirect(site_url('content/category_edit/'.$this->input->post('id').''),'refresh');
}
		public function article_edit()
	{

$data['content_view']='content/article_edit';
$this->load->view('index',$data);

	}
public function article_complete()
	{
		if($this->input->post('process')=='1'){
if ($this->input->post('title') ==''){
$title = $this->input->post('topic');
}else{
$title = $this->input->post('title');
}if ($this->input->post('description') ==''){
$description = $this->input->post('short_detail');
}else{
$description = $this->input->post('description');
}if ($this->input->post('keyword1') ==''){
$keyword = $this->input->post('tag');
}else{
$keyword = $this->input->post('keyword1');
}
$stuff = $this->input->post('category'); 
$data2=implode(",",$stuff );
	$data=array(
				'topic'	=> $this->input->post('topic'),
				'short_detail'	=> $this->input->post('short_detail'),
				'category_id'	=> $data2,
				'date_add'	=> date('Y-m-d H:i:s'),
				'detail'	=> $this->input->post('detail'),
				'thumb'	=> $this->input->post('ImgMain'),
				'cover'	=> $this->input->post('ImgCover'),
				'title'	=> $title,
				'link'	=> $this->input->post('link'),
				'link_out'	=> $this->input->post('link_out'),
				'tag'	=> $this->input->post('keyword'),
				'keyword'	=> $this->input->post('keyword1'),
				'description'	=> $description,
				'status'	=> $this->input->post('status')
			);
			$this->db->insert($this->config->item('system_article'),$data);
	redirect(site_url('content/article'),'refresh');
		}
}
public function articleedit_complete()
	{
if ($this->input->post('title') ==''){
$title = $this->input->post('topic');
}else{
$title = $this->input->post('title');
}if ($this->input->post('description') ==''){
$description = $this->input->post('short_detail');
}else{
$description = $this->input->post('description');
}
$stuff = $this->input->post('category'); 
$data2=implode(",",$stuff );
	$data=array(
				'topic'	=> $this->input->post('topic'),
				'short_detail'	=> $this->input->post('short_detail'),
				'category_id'	=> $data2,
				'last_update'	=> date('Y-m-d H:i:s'),
				'detail'	=> $this->input->post('detail'),
				'thumb'	=> $this->input->post('ImgMain'),
				'cover'	=> $this->input->post('ImgCover'),
				'link'	=> $this->input->post('link'),
				'link_out'	=> $this->input->post('link_out'),
				'title'	=> $title,
				'tag'	=> $this->input->post('keyword'),
				'keyword'	=> $this->input->post('keyword1'),
				'description'	=> $description,
				'status'	=> $this->input->post('status')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_article'), $data);
redirect(site_url('content/article_edit/'.$this->input->post('id').''),'refresh');
}
		public function adver_complete()
	{

$data['content_view']='content/adver_complete';
$this->load->view('index',$data);

	}
	
	
public function article()
	{
 $perpage = '20';
$this->db->where('(status = 1)');
$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_article'));
$this->db->where('(status = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_article'));
		
		$config['base_url'] = site_url('content/article/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'content/article';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
public function trashed()
	{
 $perpage = '20';
$this->db->where('(status = 3)');
$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_article'));
$this->db->where('(status = 3)');
		$rows = $this->db->count_all_results($this->config->item('system_article'));
		
		$config['base_url'] = site_url('content/trashed/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'content/trashed';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
public function draft()
	{
 $perpage = '20';
$this->db->where('(status = 2)');
$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_article'));
$this->db->where('(status = 2)');
		$rows = $this->db->count_all_results($this->config->item('system_article'));
		
		$config['base_url'] = site_url('content/draft/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'content/draft';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
	public function category()
	{
$perpage = '10';
//$this->db->where('(status = 1)');
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_category'));
//$this->db->where('(status = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_category'));
		
		$config['base_url'] = site_url('content/category/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'content/category';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
	//			'status_key'=>$this->config->item('status_key'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
#ลบข้อมูลบทความ
	public function delete_content()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete($this->config->item('system_article'));
        redirect(site_url('content/article'),'refresh');
	}
#ย้ายไปไว้ถังขยะ
	public function trash()
	{
$this->db->where('id',$this->uri->segment(3));
$this->db->set('`status`','3');
$this->db->update($this->config->item('system_article'));
redirect(site_url('content/trashed'),'refresh');
     }
public function get_root(){
	echo $this->config->item('imgurl');
}
public function autosave()
	{
if(isset($_POST["Desc"])){
	$data=array(
				'altimg'	=> $this->input->post('Altimg'),
				'description'	=> $this->input->post('Desc')
			);
$this->db->where('id',$this->input->post('postId'));
$this->db->update($this->config->item('images2'), $data);
		}
   }
public function autoalt()
	{
 if(isset($_POST["Altimg"])){
	$data=array(
				'altimg'	=> $this->input->post('Altimg')
			);
$this->db->where('id',$this->input->post('postId'));
$this->db->update($this->config->item('images2'), $data);
		}
}
}

?>