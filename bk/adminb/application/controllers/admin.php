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
	public function manager()
	{
			$this->db->where('user_private',2);
			$q=$this->db->get($this->config->item('system_users'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q,'class'=>$this->config->item('class'),'active'=>$this->config->item('active'));
		$data['content_view']='admin/manager';
		$this->load->view('index',$data);
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
	
}
?>