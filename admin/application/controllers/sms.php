<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Sms extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sms_model');
		$this->load->model('smsdata_model');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

	public function index()
	{
		$date = 'today';
        // Load the member list view
		$data['content_view']='sms/index';
		$this->load->view('index',$data);
	}
	public function smsdata()
	{
        // Load the member list view
		$data['content_view']='sms/smsdata';
		$this->load->view('index',$data);
	}
		public function update()
	{
						$this->db->where('id',$this->uri->segment(3));
						$this->db->set('status',1);
						$this->db->update($this->config->item('system_smsdata'));
	redirect(site_url('sms/smsdata'),'refresh');
	}
		public function updatesms()
	{
						$this->db->where('id',$this->uri->segment(3));
						$this->db->set('status',1);
						$this->db->update($this->config->item('system_sms'));
	redirect(site_url('sms'),'refresh');
	}
/*start----------------------*/
	public function getLists(){
		$manage = 'today';
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->sms_model->getRows($_POST,$manage);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $created = date( 'D j M Y', strtotime($member->dateRecieve));
			//$status_c = $this->config->item('status_sms');
			//$status = $status_c[$member->status];
            $status = ($member->status == 1)?'<span class="badge badge-success">Success</span>':'<a href="'.base_url().'sms/updatesms/'.$member->id.'" class="badge badge-warning">Wait</a>';
			$name = ($member->name != '')?'<input type="text" class="form-control form-control-sm" value="'.$member->lastname.'">':'';
            $data[] = array($member->id, $member->message, $name,$member->time_deposit, $member->amount, $member->from_bank, $member->to_bank, $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sms_model->countAll(),
            "recordsFiltered" => $this->sms_model->countFiltered($_POST,$manage),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
public function getsms(){
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->smsdata_model->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
		//$status_c = $this->config->item('status_sms');
		//	$status = $status_c[$member->status];
           $status = ($member->status == 1)?'<span class="badge badge-success">Success</span>':'<a href="'.base_url().'sms/update/'.$member->id.'" class="badge badge-warning">Wait</a>';
			//$name = ($member->name != '')?'<input type="text" class="form-control" value="'.$member->name.'">':'';
            $data[] = array($member->id,$member->from, $member->message,$member->dateRecieve,$status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->smsdata_model->countAll(),
            "recordsFiltered" => $this->smsdata_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
/*------------------ENd----------------------------*/
public function check(){
		$q = $this->db->query("select *,count(id) as Total from system_smsdata where status = 0");
		$r = $q->row();
	$badge_number = $r->Total;
	$data = array(
		'badge_number' => $badge_number
	);
	echo json_encode($data);	
}
public function checkscb(){
		$q = $this->db->query("select *,count(id) as Total from system_sms where bank_type = 1 and status = 0");
		$r = $q->row();
	$badge_number = $r->Total;
	$data = array(
		'badge_scb' => $badge_number
	);
	echo json_encode($data);	
}
public function checkwit(){
		$q = $this->db->query("select *,count(with_id) as Total from system_withdraw where status = 0");
		$r = $q->row();
	$badge_number = $r->Total;
	$data = array(
		'badge_wit' => $badge_number
	);
	echo json_encode($data);	
}
public function checkincome(){
		$this->load->model('topup_model');
		$this->total_ew = $this->topup_model->getTotal_ew(date('Y-m-d'),'today');
        $this->total_withdraw = $this->topup_model->getTotal_withdraw(date('Y-m-d'),'today');
		$this->income =  $this->total_ew - $this->total_withdraw;

$badge_number = number_format($this->income,2);
	$data = array(
		'badge_income' => $badge_number
	);
	echo json_encode($data);	
}
}
?>