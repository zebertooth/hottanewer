<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Monitor extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		/*if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}*/
		
	}
		public function test(){
$this->load->model('topup_model');
echo $this->topup_model->get_cash('1');#หาค่าของเงินของระบบ
//echo $this->topup_model->get_promotion('1');#promotion
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#
if ($this->topup_model->get_promotion('1') == '4'):
echo 'มีโปรเเล้วตัดยอดเป็นยอดล่าสุด';
elseif ($this->topup_model->get_promotion('1') == '1'):
echo'ติดโปร 1 อยู่';
else:
echo 'ยังไม่ใช้โปรตัดยอดโปรเป็น บวกเข้า';

endif;
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#
echo'test';
	}
		public function index(){
			$data['content_view']='monitor/index';
		    $this->load->view('monitor',$data);
	}
	public function realtime(){
	echo date('Y-m-d H:i:s').'<br>';
/*--------------------------st---------------------------*/
#ภายในธนาคาร
			$this->db->select('id,message,status');
            $this->db->where('status',0);
            $this->db->where('from','027777777');
			$s=$this->db->get('system_smsdata');
			$this->db->limit(1);  // Produces: LIMIT 1
			$ms=$s->row();
        $count = $s->num_rows(); 
if ( $count >= 1 ){
$string_value = $ms->message;
$sub_string_value   = 'โอนจาก';
$str_pos = strpos($string_value, $sub_string_value);


if ($str_pos == TRUE) {
echo "พบข้อมูล<br>";
$a_data = preg_replace('/[[:space:]]+/', '|', trim($ms->message));
$arr_data = explode("|", $a_data);#ข้อมูลที่นำเข้ามาเเยก
$t = explode("@", $arr_data[0]); // เเยกวันที่ออกมาจากเวลา เช่น 04/11@08:28
//echo $t[1];#เวลา
//echo '<br>';
$f=explode("โอนจาก", $arr_data[2]);#โอนจากใคร เช่น โอนจากxxxxxx
//echo $f[1];#ชื่อเช่น PHIMNARA
//echo '<br>';
//echo $arr_data[3];echo '<br>';#ชื่อ เช่น PIMWเข้าx421875
$ar_4 = array("เข้าx"); #กรณีไม่ใช่ SCB to SCB นำค่า จ ากKBNK/x146861เข้าx421875
$data_ar4 = str_replace($ar_4,"/", $arr_data[3]);#ก็จะได้ KHAI421875
$s_arr = explode("/", $data_ar4);
//echo 'aaa'.$s_arr[0];#นาวสกุลaaaPIMW
//echo '<br>';
//echo $s_arr[1];#บัญชีธนาคารบริษัท
#ตัวเเปรสำคัญ
$FromBank='scb';
$time_sms = $t[1];//เวลาโอนจาก SMSok
$date_sms = date('Y-m-d');//วันปัจจุบันok
//$amount = $arr_data[1]; //ยอด
$amount = str_replace(',','', $arr_data[1]);#ok
$from_sms = $f[1];#ชื่อ
$lastname = $s_arr[0];
$to_bank = $s_arr[1];#เลขหกหลักสุดท้ายเลขบัญชีรับโอน
echo'<hr>';
/*echo 'ยอด'.$amount;
echo '<br>';
echo 'โอนไป'.$to_bank;
echo '<br>';
echo 'บัญชีรับโอน'.$s_arr[1];
echo '<br>';
echo 'เวลาโอน'.$t[1];
echo '<br>ชื่อคนโอน'.$from_sms;*/

#ตัวอย่าง


$newStr = preg_replace('/[[:space:]]+/', '|', trim($ms->message));
echo $newStr;

#นำเข้าฐานข้อมูลเพื่อเข้าระบบเช็คยอด
$datasms=array(
								'message'		=> $ms->message,
								'date_deposit'		=> $date_sms,
								 'amount'		=> $amount,
							     'bank'		=> 'SCB',
								'to_bank'		=> $to_bank,
								'time_deposit'		    => $time_sms,
								'name'		    => $from_sms,
								'lastname'		    => $from_sms.''.$lastname,
								'bank_type'		=> 1	
				);
				$this->db->insert($this->config->item('system_sms'),$datasms);
$this->db->set('status', '1', FALSE);
$this->db->where('id', $ms->id);
$this->db->update('system_smsdata');
} else {
echo "ไม่พบข้อความโอนจาก";
/*----------------DATA----------------------------------*/
#ถ้าไม่ใช่ไทยพานิชย์
$arr_data = explode(" ", $ms->message);
#เเยกเครื่องหมาย/
$b = explode("/", $arr_data[2]); 
$arr_data[2] ;#ไทยพานิชย์เข้าไทยพานิชย์ เเยกภาษาไทยออกจาก ENG
#เเยกเวลากับวันที่ออกจากกัน
$t = explode("@", $arr_data[0]); // เเยกวันที่ออกมาจากเวลา เช่น 04/11@08:28
$day = explode("/", $t[0]); #เเยกวันกับเดือนออกจากกัน เช่น 04/11
$year =  date('Y');//ปีปัจจุบัน
$ymds = $year.'-'.$day[1].'-'.$day[0]; #เอามารวมกันเป็น Ymd
#ฟังชั่นตัดรูปเเบบเเละเเทนที่ด้วยภาษาต่างๆ
$rough = array("จาก", "/", "เข้า"); #กรณีไม่ใช่ SCB to SCB นำค่า จ ากKBNK/x146861เข้าx421875
$content = str_replace($rough,"", $arr_data[2]);
$m=explode("x", $content); //นำค่าที่ได้มาตัด x ออก KBNKx146861x421875
$date_trans = $arr_data[0];
//$amount = $arr_data[1];
$amount = str_replace(',','', $arr_data[1]);
$bankCode = $m[0];
$FromBank = $m[1]; 
$ToBank = $m[2]; 
/*----------------------------------นำค่าต่างๆมาเก็บ------------------------------------------------*/
echo'ต่างธนาคาร';
$datasms=array(
								'message'		=> $ms->message,
								 'date_deposit'		=> $ymds,
								 'amount'		=> $amount,
								'bank'		=> $bankCode,
								'from_bank'		=> $FromBank,
								'to_bank'		=> $ToBank,
								'time_deposit'		    => $t[1],
								'bank_type'		=> 2	
				);
				$this->db->insert($this->config->item('system_sms'),$datasms);
/*----------------------------------นำค่าต่างๆมาเก็บ------------------------------------------------*/
#อัพเดทสถานะเป็น yes
$this->db->set('status', '1', FALSE);
$this->db->where('id', $ms->id);
$this->db->update('system_smsdata');

/*----------------end------------------------------------*/
  }
}else{
echo'ไม่มีรายการ';
}
/*---------------------------end--------------------------*/
   }
	public function realcheck(){
	$this->load->model('topup_model');	
#นำข้อมุลจาก system_sms มาหาว่าหมายเลขบัญชีที่ลงท้ายด้วยตัวนี้เป็นใคร
			$this->db->select('*');
            $this->db->where('status',0);
            $this->db->where('bank_type',2);
			$s=$this->db->get('system_sms');
			$this->db->limit(1);  // Produces: LIMIT 1
			$ms=$s->row();
			//echo $ms->message;echo '<br>';
			//echo $ms->amount;echo '<br>';

/*---------------ประเภท 2----------------------------*/
   if($ms->bank_type == 2):
/*ระบบ------------------------------------------------------*/
#นำบัญชีหกหลักมาหาว่าเป็นของ ไอดีไหน
			$this->db->select('id,username,s_account,name,jointBank');
            $this->db->where('s_account',$ms->from_bank);
			$sb=$this->db->get('system_company');
			$data5=$sb->row();
			$num_rows = $sb->num_rows();
				if($num_rows > 0){
			//echo $data->id; echo '<br>';
			//echo $ms-amount;echo '<br>';
#เลือกบัญชีธนาคาร
			$this->db->select('bank,account');
            $this->db->where('id',$data5->jointBank);
			$sc=$this->db->get('topup_bank_transfer');
			$co=$sc->row();
$company_bank = $co->account.'-'.$co->bank;
#เจอข้อมูลเเล้วว่าไอดีไหน ตรวจสอบว่ามีการฝากหรือไม่
$this->db->select('id,userID,money,date_deposit,time_deposit,status');
$where = array('money ' => $ms->amount , 'status ' => 0, 'userID ' => $data5->id, 'date_deposit'=> $ms->date_deposit, 'time_deposit'=> $ms->time_deposit);
#$where = array('money ' => $ms-amount , 'status ' => 0, 'userID ' => $data->id, 'date_deposit'=> $ms->date_deposit, 'time_deposit'=> $ms->time_deposit);
$this->db->where($where);
$m=$this->db->get($this->config->item('system_deposit'));
$num_rows = $m->num_rows();
$data2=$m->row();
				if($num_rows > 0){
$company_id = $data2->userID;
#----------------------------------------------------------------ระบบก่อนจะค้นหา--------------------------------#
if ($this->topup_model->get_promotion($company_id) == '4'):
#--------------โปร  4---------------------#
echo 'มีโปรเเล้วตัดยอดเป็นยอดล่าสุด';
#ถ้าค้นหาจากฝากเครดิตเเล้วเจอให้ทำการอัพเดทเครดิตเลย
$amount = $data2->money;
$orderId = $data2->id;
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`',$amount,false);
						$this->db->update($this->config->item('system_company'));
#อัพเดทรายการฝาก
$data = array(
        'comment' => 'สำเร็จระบบอัตโนมัติ',
        'date_approve' => date('Y-m-d H:i:s'),
	     'status' => 1,
        'approve' => 'system'
);

$this->db->where('id', $orderId);
$this->db->update($this->config->item('system_deposit'), $data);
						
#อัพเดทสถานะ SMS-----------------------------------------------------------------------------#
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
#----อัพเดทสถานะสมาชิกให promotion=0--------#
						$this->db->where('id',$company_id);
						$this->db->set('promotion','0');
						$this->db->update($this->config->item('system_company'));

#--------------โปร  4---------------------#
elseif ($this->topup_model->get_promotion($company_id) == '1'):
#-------------------------------โปรโมชั่น 1--------------------------------------------------#
echo'ติดโปร 1 อยู่';
#ถ้าค้นหาจากฝากเครดิตเเล้วเจอให้ทำการอัพเดทเครดิตเลย
$amount = $data2->money;
$orderId = $data2->id;
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`','`cash_online`+'.$amount,false);
						$this->db->update($this->config->item('system_company'));
#อัพเดทรายการฝาก
$data = array(
        'comment' => 'สำเร็จระบบอัตโนมัติ',
        'date_approve' => date('Y-m-d H:i:s'),
	     'status' => 1,
        'approve' => 'system'
);

$this->db->where('id', $orderId);
$this->db->update($this->config->item('system_deposit'), $data);
						
#อัพเดทสถานะ SMS-----------------------------------------------------------------------------#
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
#-------------------------------โปรโมชั่น 1--------------------------------------------------#
else:
echo 'ยังไม่ใช้โปรตัดยอดโปรเป็น บวกเข้า';
#ถ้าค้นหาจากฝากเครดิตเเล้วเจอให้ทำการอัพเดทเครดิตเลย
$amount = $data2->money;
$orderId = $data2->id;
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`','`cash_online`+'.$amount,false);
						$this->db->update($this->config->item('system_company'));
#อัพเดทรายการฝาก
$data = array(
        'comment' => 'สำเร็จระบบอัตโนมัติ',
        'date_approve' => date('Y-m-d H:i:s'),
	     'status' => 1,
        'approve' => 'system'
);

$this->db->where('id', $orderId);
$this->db->update($this->config->item('system_deposit'), $data);
						
#อัพเดทสถานะ SMS-----------------------------------------------------------------------------#
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));

endif;
#----------------------------------------------------------------ระบบถ้าค้นหาโปรโมชั่น--------------------------------#
				}else{
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#
if ($this->topup_model->get_promotion($data5->id) == '4'):
echo 'มีโปรเเล้วตัดยอดเป็นยอดล่าสุด';
#------------------------------------ตรวจพบ oro 4-----------------------------------#
	$data=array(
					'userID'	=> $data5->id,
				//	'bank_id'		=> $this->input->post('to_bank'),
					'money'			=> $ms->amount,
					'time_deposit'			=> $ms->time_deposit,
					'date_tran'	=> date('Y-m-d H:i:s'),
					'date_deposit'	=> date($ms->date_deposit),
				     'bank_deposit'		=> $company_bank,
					'name'			=> $data5->name,
					'user'			=> $data5->username,
				    'type'			=> 1,
					'comment'			=> 'อัตโนมัติ',
					'approve'			=> 'system',
					'date_approve'			=> date('Y-m-d H:i:s'),
					'status'		=> 1
				);
				$this->db->insert($this->config->item('system_deposit'),$data);
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`',$ms->amount,false);
						$this->db->update($this->config->item('system_company'));

#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
#อัพเดทโปร
						$this->db->where('id',$data5->id);
						$this->db->set('promotion','0');
						$this->db->update($this->config->item('system_company'));
/*--------------------------------------------------end pro 4 ------------------------------------------*/
elseif ($this->topup_model->get_promotion($data5->id) == '1'):
echo'ติดโปร 1 อยู่';
#----------------ติดตโปร 1 -------------------------------------#
	$data=array(
					'userID'	=> $data5->id,
				//	'bank_id'		=> $this->input->post('to_bank'),
					'money'			=> $ms->amount,
					'time_deposit'			=> $ms->time_deposit,
					'date_tran'	=> date('Y-m-d H:i:s'),
					'date_deposit'	=> date($ms->date_deposit),
				     'bank_deposit'		=> $company_bank,
					'name'			=> $data5->name,
					'user'			=> $data5->username,
				    'type'			=> 1,
					'comment'			=> 'อัตโนมัติ',
					'approve'			=> 'system',
					'date_approve'			=> date('Y-m-d H:i:s'),
					'status'		=> 1
				);
				$this->db->insert($this->config->item('system_deposit'),$data);
/*--------------------------------------------------นำเข้าเรียบร้อย ------------------------------------------*/
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`','`cash_online`+'.$ms->amount,false);
						$this->db->update($this->config->item('system_company'));

#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
#สิ้นสุด-------------- ติดโปร 1-------------------------------------#
else:
echo 'ยังไม่ใช้โปรตัดยอดโปรเป็น บวกเข้า';
#นำเข้าการฝาก
	$data=array(
					'userID'	=> $data5->id,
				//	'bank_id'		=> $this->input->post('to_bank'),
					'money'			=> $ms->amount,
					'time_deposit'			=> $ms->time_deposit,
					'date_tran'	=> date('Y-m-d H:i:s'),
					'date_deposit'	=> date($ms->date_deposit),
				     'bank_deposit'		=> $company_bank,
					'name'			=> $data5->name,
					'user'			=> $data5->username,
				    'type'			=> 1,
					'comment'			=> 'อัตโนมัติ',
					'approve'			=> 'system',
					'date_approve'			=> date('Y-m-d H:i:s'),
					'status'		=> 1
				);
				$this->db->insert($this->config->item('system_deposit'),$data);
/*--------------------------------------------------นำเข้าเรียบร้อย ------------------------------------------*/
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`','`cash_online`+'.$ms->amount,false);
						$this->db->update($this->config->item('system_company'));

#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));

endif;
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#

				}

				}else{
echo'ไม่เจอข้อมูลทำการอัพเดทสถานะเป็น 2';
#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','2');
						$this->db->update($this->config->item('system_sms'));
				}



/*------------------------------------------------------สิ้นสุด*/
	endif;
	}
	public function realcheck_scb(){
$this->load->model('topup_model');
#นำข้อมุลจาก system_sms มาหาว่าหมายเลขบัญชีที่ลงท้ายด้วยตัวนี้เป็นใคร
			$this->db->select('*');
            $this->db->where('status',0);
            $this->db->where('bank_type',1);
			$s=$this->db->get('system_sms');
			$this->db->limit(1);  // Produces: LIMIT 1
			$ms=$s->row();
			//echo $ms->message;echo '<br>';
			//echo $ms->amount;echo '<br>';

#นำข้อมูลมาเเยกประเภท------------------------------------------------------
   if($ms->bank_type == 1):

	//   echo'ธนาคารเดียวกัน';
#---------------------------------------รายการ-----------------------------------------#
			$this->db->select('id,name,username,s_account,bookbank,jointBank');
            $this->db->where('bookbank',$ms->name);
			$sb=$this->db->get('system_company');
			$data5=$sb->row();
			$num_rows = $sb->num_rows();
				if($num_rows >= 1){
echo  'ID'.$data5->username.'<br>';
			//echo $data->id; echo '<br>';
			//echo $ms-amount;echo '<br>';
#เลือกบัญชีธนาคาร
			$this->db->select('bank,account');
            $this->db->where('id',$data5->jointBank);
			$sc=$this->db->get('topup_bank_transfer');
			$co=$sc->row();
$company_bank = $co->account.'-'.$co->bank;
#เชคข้อมูลจาก ORDER ว่ามีไอดีสมาชิกไหมว่ายอดนี้มีไหม
$this->db->select('id,userID,money,date_deposit,time_deposit,status');
$where = array('money ' => $ms->amount , 'status ' => 0, 'userID ' => $data5->id, 'date_deposit'=> $ms->date_deposit, 'time_deposit'=> $ms->time_deposit);
#$where = array('money ' => $ms-amount , 'status ' => 0, 'userID ' => $data->id, 'date_deposit'=> $ms->date_deposit, 'time_deposit'=> $ms->time_deposit);
$this->db->where($where);
$m=$this->db->get($this->config->item('system_deposit'));
$num_rows = $m->num_rows();
$data2=$m->row();
				if($num_rows > 0){
echo'พบยอด ทำการอัพเดทยอดโอน';
#ดึงข้อมูลออกมา
$company_id = $data2->userID;
$amount = $data2->money;
$orderId = $data2->id;
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`','`cash_online`+'.$amount,false);
						$this->db->update($this->config->item('system_company'));
#อัพเดทรายการฝาก
$data = array(
        'comment' => 'สำเร็จระบบอัตโนมัติ',
        'date_approve' => date('Y-m-d H:i:s'),
	     'status' => 1,
        'approve' => 'system'
);

$this->db->where('id', $orderId);
$this->db->update($this->config->item('system_deposit'), $data);

#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
				}else{
#---------------------------------------รายการ-----------------------------------------#
echo 'ไม่เจอรายการฝากเงินทำการเพิ่มในออเดอร์ทันทีเเละเพิ่มเครดิตทันที';
	$data=array(
					'userID'	=> $data5->id,
				//	'bank_id'		=> $this->input->post('to_bank'),
					'money'			=> $ms->amount,
					'time_deposit'			=> $ms->time_deposit,
					'date_tran'	=> date('Y-m-d H:i:s'),
					'date_deposit'	=> date($ms->date_deposit),
				     'bank_deposit'		=> $company_bank,
					'name'			=> $data5->name,
					'user'			=> $data5->username,
				    'type'			=> 1,
					'comment'			=> 'อัตโนมัติ',
					'approve'			=> 'system',
					'date_approve'			=> date('Y-m-d H:i:s'),
					'status'		=> 1
				);
				$this->db->insert($this->config->item('system_deposit'),$data);
/*--------------------------------------------------นำเข้าเรียบร้อย ------------------------------------------*/
#เพิ่มเครดิตให้สมาชิก
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#
if ($this->topup_model->get_promotion($data5->id) == '4'):
echo 'มีโปรเเล้วตัดยอดเป็นยอดล่าสุด';
						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`',$ms->amount,false);
						$this->db->update($this->config->item('system_company'));
#อัพเดทสถานะโปรโมชั่น
						$this->db->where('id',$data5->id);
						$this->db->set('promotion','0');
						$this->db->update($this->config->item('system_company'));

elseif ($this->topup_model->get_promotion($data5->id) == '1'):
echo'ติดโปร 1 อยู่';
						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`','`cash_online`+'.$ms->amount,false);
						$this->db->update($this->config->item('system_company'));
else:
echo 'ยังไม่ใช้โปรตัดยอดโปรเป็น บวกเข้า';
						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`','`cash_online`+'.$ms->amount,false);
						$this->db->update($this->config->item('system_company'));
endif;
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#
#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
#---------------------------------------รายการ-----------------------------------------#


				}
				}else{
echo'ไม่เจอ user';
				
				}
#---------------------------------------รายการ-----------------------------------------#
	endif;

	}
/*------------------check scb-----------------------------------------*/
public function realcheck_scb2(){
$this->load->model('topup_model');
#นำข้อมุลจาก system_sms มาหาว่าหมายเลขบัญชีที่ลงท้ายด้วยตัวนี้เป็นใคร
			$this->db->select('*');
            $this->db->where('status',0);
            $this->db->where('bank_type',1);
			$s=$this->db->get('system_sms');
			$this->db->limit(1);  // Produces: LIMIT 1
			$ms=$s->row();
			echo $ms->lastname;echo '<br>';
			//echo $ms->amount;echo '<br>';

#นำข้อมูลมาเเยกประเภท------------------------------------------------------
   if($ms->bank_type == 1):

	//   echo'ธนาคารเดียวกัน';
#---------------------------------------รายการ-----------------------------------------#
			$this->db->select('id,name,username,s_account,hash_bank,jointBank');
            $this->db->where('hash_bank',md5($ms->lastname));
			$sb=$this->db->get('system_company');
			$data5=$sb->row();
			$num_rows = $sb->num_rows();
				if($num_rows >= 1){
echo  'ID'.$data5->username.'<br>';
			//echo $data->id; echo '<br>';
			//echo $ms-amount;echo '<br>';
#เลือกบัญชีธนาคาร
			$this->db->select('bank,account');
            $this->db->where('id',$data5->jointBank);
			$sc=$this->db->get('topup_bank_transfer');
			$co=$sc->row();
$company_bank = $co->account.'-'.$co->bank;
#เชคข้อมูลจาก ORDER ว่ามีไอดีสมาชิกไหมว่ายอดนี้มีไหม
$this->db->select('id,userID,money,date_deposit,time_deposit,status');
$where = array('money ' => $ms->amount , 'status ' => 0, 'userID ' => $data5->id, 'date_deposit'=> $ms->date_deposit, 'time_deposit'=> $ms->time_deposit);
#$where = array('money ' => $ms-amount , 'status ' => 0, 'userID ' => $data->id, 'date_deposit'=> $ms->date_deposit, 'time_deposit'=> $ms->time_deposit);
$this->db->where($where);
$m=$this->db->get($this->config->item('system_deposit'));
$num_rows = $m->num_rows();
$data2=$m->row();
				if($num_rows > 0){
echo'พบยอด ทำการอัพเดทยอดโอน';
#ดึงข้อมูลออกมา
$company_id = $data2->userID;
$amount = $data2->money;
$orderId = $data2->id;
#เพิ่มเครดิตให้สมาชิก
if ($this->topup_model->get_promotion($company_id) == '4'):
echo 'มีโปรเเล้วตัดยอดเป็นยอดล่าสุด';

						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`',$amount,false);
						$this->db->update($this->config->item('system_company'));
#---อัพเดทสถานะของโปรโมชั่นเป็นยกเลิกโปร---#
						$this->db->where('id',$company_id);
						$this->db->set('promotion','0');
						$this->db->update($this->config->item('system_company'));
#---อัพเดทสถานะของโปรโมชั่นเป็นยกเลิกโปร---#
elseif ($this->topup_model->get_promotion($company_id) == '1'):
echo'ติดโปร 1 อยู่';

						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`','`cash_online`+'.$amount,false);
						$this->db->update($this->config->item('system_company'));
else:
echo 'ยังไม่ใช้โปรตัดยอดโปรเป็น บวกเข้า';

						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`','`cash_online`+'.$amount,false);
						$this->db->update($this->config->item('system_company'));

endif;

#อัพเดทรายการฝาก
$data = array(
        'comment' => 'สำเร็จระบบอัตโนมัติ',
        'date_approve' => date('Y-m-d H:i:s'),
	     'status' => 1,
        'approve' => 'system'
);

$this->db->where('id', $orderId);
$this->db->update($this->config->item('system_deposit'), $data);

#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
				}else{
#---------------------------------------รายการ-----------------------------------------#
echo 'ไม่เจอรายการฝากเงินทำการเพิ่มในออเดอร์ทันทีเเละเพิ่มเครดิตทันที';
	$data=array(
					'userID'	=> $data5->id,
				//	'bank_id'		=> $this->input->post('to_bank'),
					'money'			=> $ms->amount,
					'time_deposit'			=> $ms->time_deposit,
					'date_tran'	=> date('Y-m-d H:i:s'),
					'date_deposit'	=> date($ms->date_deposit),
				     'bank_deposit'		=> $company_bank,
					'name'			=> $data5->name,
					'user'			=> $data5->username,
				    'type'			=> 1,
					'comment'			=> 'อัตโนมัติ',
					'approve'			=> 'system',
					'date_approve'			=> date('Y-m-d H:i:s'),
					'status'		=> 1
				);
				$this->db->insert($this->config->item('system_deposit'),$data);
/*--------------------------------------------------นำเข้าเรียบร้อย ------------------------------------------*/
#เพิ่มเครดิตให้สมาชิก
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#
if ($this->topup_model->get_promotion($data5->id) == '4'):
echo 'มีโปรเเล้วตัดยอดเป็นยอดล่าสุด';

						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`',$ms->amount,false);
						$this->db->update($this->config->item('system_company'));
#---อัพเดทสถานะของโปรโมชั่นเป็นยกเลิกโปร---#
						$this->db->where('id',$data5->id);
						$this->db->set('promotion','0');
						$this->db->update($this->config->item('system_company'));
#---อัพเดทสถานะของโปรโมชั่นเป็นยกเลิกโปร---#
elseif ($this->topup_model->get_promotion($data5->id) == '1'):
echo'ติดโปร 1 อยู่';

						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`','`cash_online`+'.$ms->amount,false);
						$this->db->update($this->config->item('system_company'));
else:
echo 'ยังไม่ใช้โปรตัดยอดโปรเป็น บวกเข้า';

						$this->db->where('id',$data5->id);
						$this->db->set('`cash_online`','`cash_online`+'.$ms->amount,false);
						$this->db->update($this->config->item('system_company'));
endif;
#------------------------------ค่าของโปรโมชั่นถ้ามีโปรโมชั่นอยู่เเล้วตัดค่าเป็น   0 --------------------------------#

#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
#---------------------------------------รายการ-----------------------------------------#


				}
				}else{
echo'hash book no';
#อัพเดทรายการ sms เป็น 2 เพื่อรอการตรวจสอบ
					/*	$this->db->where('id',$ms->id);
						$this->db->set('status','2');
						$this->db->update($this->config->item('system_sms'));*/
				}
#---------------------------------------รายการ-----------------------------------------#
	endif;

	}
#---------------------------------------scb 2-----------------------------------------#
		public function sms(){
			$data['content_view']='monitor/sms';
		    $this->load->view('monitor',$data);
	}
		public function send(){
			$data['content_view']='monitor/send';
		    $this->load->view('monitor/send',$data);
	}
}

?>