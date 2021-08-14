<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Users extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

		public function index()
	{
        $perpage='20';
$this->db->where('(active = 1)');
		$this->db->order_by('id','DESC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_users'));
$this->db->where('(active = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_users'));
		
		$config['base_url'] = site_url('users/index/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'users/index';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
			//	'status_key'=>$this->config->item('status_users'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	

	}
	public function login()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('doing',1);
		$this->db->where('working',3);
		$this->db->where('target',$this->input->ip_address());
		$this->db->where('adddate >=',date('Y-m-d H:i:s',strtotime('-1hour')));
		$q=$this->db->get($this->config->item('system_logs'));
		if($q->num_rows()<=2){
			if($this->input->post('username')){
		
				$this->db->where('username',$this->input->post('username'));
				$this->db->where('password',md5($this->input->post('password')));
				$q=$this->db->get($this->config->item('system_users'));
				if($q->num_rows()>0){
					$r=$q->row();
					if($r->active){
					
						$newdata=array(
							'id'		=> $r->id,
							'usernane'		=> $r->username,
							'email'			=> $r->email,
							'telephone'		=> $r->telephone,
							'user_private'	=> $r->user_private
						);
						$this->session->set_userdata($newdata);
						
						$this->db->set('adddate','now()',false);
						$data_ins=array(
							'username'		=> $r->username,
							'doing'			=> 1,
							'working'		=> 1,
							'target'		=> $this->input->ip_address()
						);
						$this->db->insert($this->config->item('system_logs'),$data_ins);
						
						redirect(site_url('dashboard'),'refresh');
					}else{
						$data['msg'] = 'คุณถูกระงับการใช้งาน กรุณาติดต่อผู้ดูแลระบบ';
						$this->load->view('login',$data);	
					}
				}else{
					$this->db->set('adddate','now()',false);
					$data_ins=array(
						'username'		=> $this->input->post('username'),
						'doing'			=> 1,
						'working'		=> 3,
						'target'		=> $this->input->ip_address()
					);
					$this->db->insert($this->config->item('system_logs'),$data_ins);
					
					$data['msg'] = 'ชื่อเข้าใช้ หรือ รหัสผ่าน ของคุณไม่ถูกต้อง';
					$this->load->view('login',$data);	
				}
			
			}else{
/*chapcha*/
$this->load->helper(array('form', 'url'));

    // load the BotDetect Captcha library and set its parameter
    $this->load->library('botdetect/BotDetectCaptcha', array(
      'captchaConfig' => 'ExampleCaptcha'
    ));

    // make Captcha Html accessible to View code
    $data['captchaHtml'] = $this->botdetectcaptcha->Html();

    // initially, the message shown to the visitor is empty
    $data['captchaValidationMessage'] = '';

    if ($_POST) {
      // validate the user-entered Captcha code when the form is submitted
      $code = $this->input->post('CaptchaCode');
      $isHuman = $this->botdetectcaptcha->Validate($code);

      if ($isHuman) {
        // Captcha validation passed
        $data['captchaValidationMessage'] = 'CAPTCHA validation passed, human visitor confirmed!';
        // TODO: continue with form processing, knowing the submission was made by a human
      } else {
        // Captcha validation failed, return an error message
        $data['captchaValidationMessage'] = 'CAPTCHA validation failed, please try again.';
      }
    }
/*---end*******/
				$this->load->view('login');	
			}
		// login <3
		}else{
			echo '<html><head><title>Ban 1 hour</title></head><body>Ban 1 hour</body></html>';
		}
	}
	
	public function logout()
	{
		$this->db->set('adddate','now()',false);
		$data_ins=array(
			'username'		=> $this->session->userdata('username'),
			'doing'			=> 1,
			'working'		=> 2,
			'target'		=> $this->input->ip_address()
		);
		$this->db->insert($this->config->item('system_logs'),$data_ins);
		
		$this->session->sess_destroy();
		redirect(site_url('users/login'),'refresh');
	}
		public function password()
	{

$data['content_view']='users/password';
$this->load->view('index',$data);

	}
		public function save()
	{
#เช็ครหัสผ่านเดิมว่าถูกต้องไหม

				$this->db->where('id',$this->session->userdata('id'));
				$q=$this->db->get($this->config->item('system_users'));
				$r=$q->row();

if(md5($this->input->post('password_old')) ==$r->password){
#--------------------------------------------------------------------------------------------------------------
	if($this->input->post('password_new')==$this->input->post('password_confirm')){
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->update($this->config->item('system_users'),array('password'=>md5($this->input->post('password_new'))));
echo '<div class="alert alert-success" role="alert">เปลื่อนรหัสผ่านสำเร็จ</div>
<a href="./password" id="refresh">กลับ Dashboard</a>
';	
				}else{
echo '<div class="alert alert-warning" role="alert">รหัสผ่านใหม่ เเละ รหัสยืนยันไม่ตรงกัน <a href="./password" id="refresh">click</a>
</div>';	
				}
#-----------------------------------------------------------------------------------
			}else{
echo '<div class="alert alert-warning" role="alert">รหัสผ่านเดิมไม่ถูกต้อง <a href="./password" id="refresh">click</a></div>';	
            }
//echo '<div class="alert alert-warning" role="alert">รหัสผ่านเดิมไม่ถูกต้อง</div>';	
//echo '<div class="alert alert-warning" role="alert">รหัสผ่านใหม่ เเละ รหัสยืนยันไม่ตรงกัน</div>';	
//echo '<div class="alert alert-success" role="alert">เปลื่อนรหัสผ่านสำเร็จ</div>';	
	}#สิ้นสุด

}
?>