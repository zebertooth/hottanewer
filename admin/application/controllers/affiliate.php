<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Affiliate extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
				$this->load->model('aff_model');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}
public function index(){
		$data['content_view']='affiliate/index';
		$this->load->view('index',$data);
}
public function getData(){
date_default_timezone_set('Asia/Bangkok');
/*

		$this->db->select('B.id,B.username,B.name,B.cash_online,B.g_id,SUM(A.RollingAmount) as AviliableBet');
		$this->db->where('B.g_id',$this->session->userdata('company_id'));
		$this->db->where('DATE_FORMAT(`A`.`TotalTime`,\'%Y-%m\')','\''.$month.'\'',false);
		$this->db->group_by('A.company_id');
		$this->db->order_by('B.id','ASC');
		$this->db->from($this->config->item('system_rolling').' A');
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$q=$this->db->get();
		*/



		//$this->load->library('pagination');
		//$per_page=25;
		
		
		//$this->db->order_by('roll_id','DESC');
	$aff_date = date("Y-m", strtotime("first day of previous month"));	
	
	
		$this->db->select('B.id,B.name,B.username,B.aff_pay,SUM(C.RollingAmount) as AviliableBet,SUM(C.Winlost) as SumWinlost,SUM(C.TotalBet) as SumTotalBet');
	    $this->db->where('DATE_FORMAT(`A`.`last_pays`,\'%Y-%m\')','\''.date('Y-m').'\'',false);
		//$this->db->where('DATE_FORMAT(`C`.`FromTime`,\'%Y-%m\')','\''.$aff_date.'\'');
		//$this->db->where('C.FromTime',date('Y-m-d'),FALSE);
		//$this->db->order_by('C.id','ASC');
		$this->db->from($this->config->item('system_affiliate').' A');
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$this->db->join($this->config->item('system_rolling').' C','B.id=C.ref_id');
		//$this->db->where('A.company_id','B.g_id');
		$this->db->group_by('B.id');
		//$this->db->join($this->config->item('system_province').' B','A.province=B.province_id','LEFT');
		//$this->db->limit($per_page,($this->uri->segment(3)?($this->uri->segment(3)*$per_page)-$per_page:0));
		$this->db->limit('20');
		$query=$this->db->get();
		$result = $query->result();
	//$rm=$result->row();
	//echo $rm->username;
		//$config['use_page_numbers'] = TRUE;
		//$config['base_url'] = site_url('affiliate/index/');
		//$config['total_rows'] = $this->db->count_all_results($this->config->item('system_affiliate'));
		//$nums = $this->db->count_all_results($this->config->item('system_affiliate'));
		//$config['per_page'] = $per_page;
		//$this->pagination->initialize($config); 

		//$data['content_data']=array('nums'=>$nums,'q'=>$result,'pagination'=>$this->pagination->create_links());
		//$data['content_view']='affiliate/index';
		//$this->load->view('index',$data);
	//	$data[]=array('q'=>$result);
        foreach($result as $r){
		$suml_AviliableBet+=$r->AviliableBet;
		$pay_percent = $r->AviliableBet*$r->aff_pay/100;
		$sum_percent+=$r->AviliableBet*$r->aff_pay/100;
      $data[] = array("id"=>$r->id,"username"=>$r->username,"name"=>$r->name,"totalbet"=>$r->SumTotalBet,"winlost"=>$r->SumWinlost,"rolling"=>$r->AviliableBet,"affpay"=>$r->aff_pay,"payment"=>$pay_percent);

		}

        
        // Output to JSON format
       echo json_encode($data);
	}
public function payment(){	
date_default_timezone_set('Asia/Bangkok');
/*
if(isset($_POST['hidden_id']))
{
 $name = $_POST['name'];
 $address = $_POST['address'];
 $gender = $_POST['gender'];
 $designation = $_POST['designation'];
 $age = $_POST['age'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':name'   => $name[$count],
   ':address'  => $address[$count],
   ':gender'  => $gender[$count],
   ':designation' => $designation[$count],
   ':age'   => $age[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE tbl_employee 
  SET name = :name, address = :address, gender = :gender, designation = :designation, age = :age 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}*/
if(isset($_POST['hidden_id'])):
$username = $this->input->post('username');
 //$id = $_POST['hidden_id'];
 $id = $this->input->post('hidden_id');
 for($count = 0; $count < count($id); $count++) {
 $data_array = array(
								'company_id'			=> $this->input->post('hidden_id')[$count],
								 'date_reward'	=> date('Y-m-d H:i:s'),
								  'username'		=> $this->input->post('username')[$count],
							    'winlost'		=> $this->input->post('winlost')[$count],
								'totalbet'	=> $this->input->post('totalbet')[$count],
								'rolling'	=> $this->input->post('rolling')[$count],
								'pay'	=> $this->input->post('affpay')[$count],
							    'Balance'		=> $this->input->post('payment')[$count],
								'status'		=> 1
						);
$this->db->insert($this->config->item('system_reward'),$data_array);
#อัพเดทเวลาในการจ่ายล่าสุด
					$this->db->where('id',$this->input->post('hidden_id')[$count]);
					$this->db->set('`affiliate_amount`','`affiliate_amount`+'.$this->input->post('payment')[$count],false);
					$this->db->update($this->config->item('system_company'));
#อัพเดทเวลา
					$this->db->where('company_id',$this->input->post('hidden_id')[$count]);
					$this->db->set('last_pays',date('Y-m-d H:i:s'));
					$this->db->update($this->config->item('system_affiliate'));
  }
  endif;
}
#ฟังชั่นเสดงข้อมูลการจ่าย AFF ที่ผ่านมา
public function history(){	
        // Load the member list view
		$data['content_view']='affiliate/history';
		$this->load->view('index',$data);
}
public function getHistory(){	
$data = $row = array();
        
        $manage = $this->uri->segment(3);
        // Fetch member's records
        $memData = $this->aff_model->getRows($_POST,$manage);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            //$created = date( 'D j M Y', strtotime($member->date_reward));
            $status = ($member->status == 1)?'<span class="badge badge-success">Success</span>':'<span class="badge badge-warning">Wait</span>';
            $data[] = array($member->id, $member->company_id, $member->username,$member->date_reward, $member->rolling, $member->pay, $member->Balance, $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->aff_model->countAll(),
            "recordsFiltered" => $this->aff_model->countFiltered($_POST,$manage),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
}
public function report(){	

}
}
?>