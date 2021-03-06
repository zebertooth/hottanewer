<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Admin extends CI_Controller{
	
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
		   $this->db->where('user_private',1);
			$q=$this->db->get($this->config->item('system_users'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q,'class'=>$this->config->item('class'),'active'=>$this->config->item('active'));
		$data['content_view']='admin/index';
		$this->load->view('index',$data);
	}
		public function add()
	{

$data['content_view']='admin/add';
$this->load->view('index',$data);

	}
public function del(){

$this->db->where('id', $this->uri->segment(3));
$this->db->delete('system_users');
redirect(site_url('admin/index'),'refresh');
	}
public function complete()
	{
		if($this->input->post('process')=='1'){
#เพิ่มข้อมูลเข้าระบบ
$data=array(
				'name'	=> $this->input->post('name'),
				'telephone'	=> $this->input->post('telephone'),
				'email'	=> $this->input->post('email'),
				'username'	=> $this->input->post('username'),
				'address'	=> $this->input->post('address'),
				'position'	=> $this->input->post('position'),
				'active'	=> '1',
	'user_private' 	=> '1',
				'password'	=> md5($this->input->post('password'))
			);
			$this->db->insert($this->config->item('system_users'),$data);
	redirect(site_url('admin'),'refresh');


		}
	}
	public function manager()
	{
			$this->db->where('user_private',2);
			$q=$this->db->get($this->config->item('system_users'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q,'class'=>$this->config->item('class'),'active'=>$this->config->item('active'));
		$data['content_view']='admin/manager';
		$this->load->view('index',$data);
	}
public function useredit(){
			$this->db->where('id',$this->input->post('users_id'));
			$q=$this->db->get($this->config->item('system_users'));
			$r=$q->row();
echo'
<form id="usersave">
  <div class="form-row align-items-center">
	<p class="col-12"><b>Username</b>'.$r->username.' <b>ชื่อ</b>   '.$r->name.' </p>
	<hr>
    <div class="col-8 my-1">
      <label class="sr-only" for="password">name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">ชื่อ-สกุล</div>
        </div>
	 <input type="hidden" id="users_id" value="'.$r->id.'">
        <input type="text" class="form-control" id="name" value="'.$r->name.'">
      </div>
    </div>

  <div class="col-8 my-1">
      <label class="sr-only" for="password">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">USERNAME</div>
        </div>
        <input type="text" class="form-control" id="username" value="'.$r->username.'">
      </div>
    </div>


  <div class="col-8 my-1">
      <label class="sr-only" for="password">email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">email</div>
        </div>
        <input type="text" class="form-control" id="email" value="'.$r->email.'">
      </div>
    </div>

  <div class="col-8 my-1">
      <label class="sr-only" for="password">telephone</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">โทรศัพท์</div>
        </div>
        <input type="text" class="form-control" id="telephone" value="'.$r->telephone.'">
      </div>
    </div>


  </div>
<div class="form-group row mt-3">
    <div class="col-4"><button type="button" class="btn btn-success" id="BtnSubmit2">เเก้ไขข้อมูล</button></div>
	<div class="col-4" id="success"></div>
  </div>
</form>';
	}
public function add_user(){
echo'
<form id="usersave">
  <div class="form-row align-items-center">
    <div class="col-8 my-1">
      <label class="sr-only" for="password">name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">ชื่อ-สกุล</div>
        </div>
        <input type="text" class="form-control" id="name" >
      </div>
    </div>

  <div class="col-8 my-1">
      <label class="sr-only" for="password">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">USERNAME</div>
        </div>
        <input type="text" class="form-control" id="username" >
      </div>
    </div>

  <div class="col-8 my-1">
      <label class="sr-only" for="password">password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Password</div>
        </div>
        <input type="text" class="form-control" id="password" >
      </div>
    </div>

  <div class="col-8 my-1">
      <label class="sr-only" for="password">email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">email</div>
        </div>
        <input type="text" class="form-control" id="email">
      </div>
    </div>

  <div class="col-8 my-1">
      <label class="sr-only" for="password">telephone</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">โทรศัพท์</div>
        </div>
        <input type="text" class="form-control" id="telephone" >
      </div>
    </div>


  </div>
<div class="form-group row mt-3">
    <div class="col-4"><button type="button" class="btn btn-success" id="BtnSubmitSave">เพิ่มข้อมูล</button></div>
	<div class="col-4" id="success"></div>
  </div>
</form>';
	}
public function pwedit(){
			$this->db->where('id',$this->input->post('users_id'));
			$q=$this->db->get($this->config->item('system_users'));
			$r=$q->row();
echo'
<form id="pwpass">
  <div class="form-row align-items-center">
	<p class="col-12"><b>Username/โทรศัพท์   </b>'.$r->username.' <b>ชื่อ</b>   '.$r->name.' </p>
	<hr>
    <div class="col-8 my-1">
      <label class="sr-only" for="password">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">รหัส</div>
        </div>
	 <input type="hidden" id="users_id" value="'.$r->id.'">
        <input type="text" class="form-control" id="password">
      </div>
    </div>
    
    <div class="col-auto my-1">
      <button type="button" class="btn btn-secondary pwgenerate">สร้างรหัส</button>
    </div>
  </div>
<div class="form-group row mt-3">
    <div class="col-4"><button type="button" class="btn btn-primary" onclick="myFunction()">คัดลอกรหัสผ่าน</button></div>
    <div class="col-4"><button type="button" class="btn btn-success" id="BtnSubmit">เเก้ไขรหัสผ่าน</button></div>
	<div class="col-4" id="success"></div>
  </div>
</form>';
	}
	public function pwsave()
	{
		if($this->input->post('password')){
		$this->db->where('id',$this->input->post('users_id'));
		$this->db->set('password',md5($this->input->post('password')));
		$this->db->update($this->config->item('system_users'));
		echo '<p class="text-success">แก้ไขสำเร็จ</p>';

		}
	}	
		public function usereditsave(){
		if($this->input->post('username')){
	$data=array(
				'username'	=> $this->input->post('username'),
				'name'	=> $this->input->post('name'),
				'email'	=> $this->input->post('email'),
				'telephone'	=> $this->input->post('telephone')
			);
		$this->db->where('id',$this->input->post('users_id'));
$this->db->update($this->config->item('system_users'), $data);
		echo '<p class="text-success">แก้ไขสำเร็จ</p>';
		}
	}
		public function usersave(){
		if($this->input->post('username')){
	$data=array(
				'username'	=> $this->input->post('username'),
				'name'	=> $this->input->post('name'),
				'password'	=> $this->input->post('password'),
				'email'	=> $this->input->post('email'),
				'telephone'	=> $this->input->post('telephone')
			);
					$this->db->insert($this->config->item('system_users'),$data);
		//$this->db->where('id',$this->input->post('users_id'));
//$this->db->update($this->config->item('system_users'), $data);
		echo '<p class="text-success">เพิ่มสำเร็จ</p>';
		}
	}
}
?>