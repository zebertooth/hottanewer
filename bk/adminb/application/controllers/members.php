<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class members extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

		public function deposits(){
		$this->load->model('dep_model');
#Load total deposit
		if($this->uri->segment(3)){
			$date=$this->uri->segment(3);
		}else{
			$date=date('Y-m-d');
		}
#end load total deposit
		$this->load->model('topup_model');
		$this->total_ew = $this->topup_model->getTotal_ew($date);
        $this->total_withdraw = $this->topup_model->getTotal_withdraw($date);
		$this->income =  $this->total_ew - $this->total_withdraw;

		$this->load->library('pagination');
		$per_page=2;
		$this->db->order_by('id','DESC');
		$this->db->limit($per_page,($this->uri->segment(3)?($this->uri->segment(3)*$per_page)-$per_page:0));
		//$this->db->join($this->config->item('system_province').' B','A.province=B.province_id','LEFT');
		$q=$this->db->get($this->config->item('system_deposit'));
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = site_url('credit/deposit/');
		$config['total_rows'] = $this->db->count_all_results($this->config->item('system_deposit'));
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config); 
		
		$data['content_data']=array('q'=>$q,'pagination'=>$this->pagination->create_links(),'status'=>$this->config->item('status'));
		$data['content_view']='credit/deposit';
		$this->load->view('index',$data);
	}
		public function last(){

		$this->load->library('pagination');
		$this->load->library('md5crypt');
		$per_page=50;
		
		$this->db->where('status','0');
		$this->db->order_by('id','DESC');
		$this->db->limit($per_page,($this->uri->segment(3)?($this->uri->segment(3)*$per_page)-$per_page:0));
		//$this->db->join($this->config->item('system_province').' B','A.province=B.province_id','LEFT');
		$q=$this->db->get($this->config->item('system_deposit'));
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = site_url('credit/last/');
		$config['total_rows'] = $this->db->count_all_results($this->config->item('system_deposit'));
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config); 
		
		$data['content_data']=array('q'=>$q,'pagination'=>$this->pagination->create_links());
		$data['content_view']='credit/last';
		$this->load->view('index',$data);
	}
				#--user deposit----#
		public function lastpop(){
        $this->load->library('md5crypt');
           // $this->db->where('status','0');
            $this->db->or_where('status','3');
			$this->db->order_by('id','DESC');
			$q=$this->db->get($this->config->item('system_deposit'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q);
			$data['content_view']='credit/lastpop';
		    $this->load->view('pop',$data);
	}
				#--last withdraw----#
		public function withpop(){
        $this->load->library('md5crypt');
            $this->db->where('status','0');
			$this->db->order_by('with_id','DESC');
			$q=$this->db->get($this->config->item('system_withdraw'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q);
			$data['content_view']='credit/withpop';
		    $this->load->view('pop',$data);
	}
public function deposit_manual(){
$this->load->library('md5crypt');
$id_crypt = $this->input->post('de_crypt');
#function
$decrypted = $this->md5crypt->decryptIt( $id_crypt );
#ค้นหาสมาชิกเพื่อดึงค่าจากที่ยืนยันมาว่าค่าตรงไหน
				$this->db->where('id',$this->uri->segment(3));
				$q=$this->db->get($this->config->item('system_deposit'));
				$r=$q->row();
#อัพเดทเครดิตให้สมาชิก
				if($r->id==$decrypted && $r->status =='3' OR $r->status =='0'){
					$this->db->where('id',$r->userID);
					$this->db->set('`cash_online`','`cash_online`+'.$r->money,false);
					$this->db->update($this->config->item('system_company'));
#อัพเดทสถานะ deposit ID , comment Approve, User , UID
$comment = 'สำเร็จโดย'.$this->session->userdata('usernane');
	$data=array(
				'comment'	=> $comment,
				'status'	=> 1,
				'date_approve'	=> date('Y-m-d H:i:s'),
				'approve'	=> $this->session->userdata('usernane'),
				'approve_uid'	=> $this->session->userdata('id')
			);
$this->db->where('id',$r->id);
$this->db->update($this->config->item('system_deposit'), $data);
#สิ้นสุดระบบอัพเดท
         echo'success';
		
				}else{
					echo'Access Denie';

				}

		}
public function RefundNewWith(){ #คืนเงินถอน
#เข้ารหัส
$this->load->library('md5crypt');
$id_crypt = $this->input->post('wit_crypt');
#function
$decrypted = $this->md5crypt->decryptIt( $id_crypt );
#ค้นหาสมาชิกเพื่อดึงค่าจากที่ยืนยันมาว่าค่าตรงไหน
				$this->db->where('with_id',$this->uri->segment(3));
				$q=$this->db->get($this->config->item('system_withdraw'));
				$r=$q->row();
#อัพเดทเครดิตให้สมาชิก
				if($r->with_id==$decrypted && $r->status =='0'){
					$this->db->where('id',$r->userID);
					$this->db->set('`cash_online`','`cash_online`+'.$r->money,false);
					$this->db->update($this->config->item('system_company'));
#อัพเดทสถานะ deposit ID , comment Approve, User , UID
$comment = 'By'.$this->session->userdata('usernane');
	$data=array(
				'comment'	=> $this->input->post('msg'),
				'status'	=> 2,
				'date_approve'	=> date('Y-m-d H:i:s'),
				'approve'	=> $this->session->userdata('usernane'),
				'approve_uid'	=> $this->session->userdata('id')
			);
$this->db->where('with_id',$r->with_id);
$this->db->update($this->config->item('system_withdraw'), $data);
#สิ้นสุดระบบอัพเดท
         echo'success';
		
				}else{
					echo'Access Denie';

				}

		}

public function ConfirmWith(){ #ถอนเงินออกจากระบบ
#นำเข้าค่าต่างๆ
$this->load->library('md5crypt');
$id_crypt = $this->input->post('wit_crypt');
#function
$decrypted = $this->md5crypt->decryptIt( $id_crypt );
#ค้นหาสมาชิกเพื่อดึงค่าจากที่ยืนยันมาว่าค่าตรงไหน
				$this->db->where('with_id',$this->uri->segment(3));
				$q=$this->db->get($this->config->item('system_withdraw'));
				$r=$q->row();
#อัพเดทเครดิตให้สมาชิก
				if($r->with_id==$decrypted && $r->status =='0'){
	echo'success';
$comment = 'สำเร็จโดย'.$this->session->userdata('usernane');
	$data=array(
				'comment'	=> $comment,
				'status'	=> 1,
				'date_approve'	=> date('Y-m-d H:i:s'),
				'date_withdraw'	=> date('Y-m-d'),
				'approve'	=> $this->session->userdata('usernane'),
				'approve_uid'	=> $this->session->userdata('id')
			);
$this->db->where('with_id',$r->with_id);
$this->db->update($this->config->item('system_withdraw'), $data);
				}


		}
public function RejectNewDepo(){ #คืนค่าฝาก
#select data
$this->load->library('md5crypt');
$id_crypt = $this->input->post('de_crypt');
#function
$decrypted = $this->md5crypt->decryptIt( $id_crypt );
#ค้นหาสมาชิกเพื่อดึงค่าจากที่ยืนยันมาว่าค่าตรงไหน
				$this->db->where('id',$this->uri->segment(3));
				$q=$this->db->get($this->config->item('system_deposit'));
				$r=$q->row();
#อัพเดทเครดิตให้สมาชิก
				if($r->id==$decrypted){

#อัพเดทสถานะ deposit ID , comment Approve, User , UID
	$data=array(
				'comment'	=> $this->input->post('comment'),
				'status'	=> 2,
				'date_approve'	=> date('Y-m-d H:i:s'),
				'approve'	=> $this->session->userdata('usernane'),
				'approve_uid'	=> $this->session->userdata('id')
			);
$this->db->where('id',$r->id);
$this->db->update($this->config->item('system_deposit'), $data);
#สิ้นสุดระบบอัพเดท
         echo'success';
		
				}else{
					echo'Access Denie';

				}

		}
		public function dep_user(){
            $this->db->where('userID',$this->uri->segment(3));
			$this->db->order_by("id", "desc");
			$this->db->limit(5);
			$q=$this->db->get($this->config->item('system_deposit'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q,'status'=>$this->config->item('status'));
			$data['content_view']='credit/dep_user';
		    $this->load->view('pop',$data);
	}
		#--user deposit----#
		public function wit_user(){
            $this->db->where('userID',$this->uri->segment(3));
			$this->db->limit(5); 
			$q=$this->db->get($this->config->item('system_withdraw'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q,'status'=>$this->config->item('status'));
			$data['content_view']='credit/wit_user';
		    $this->load->view('pop',$data);
	}
		public function monitor(){
			$data['content_view']='credit/monitor';
		    $this->load->view('index',$data);
	}
	#--return--#
		public function returnwinloss(){
$this->load->library('des');
#อัพเดทล่าสุดของ user นี้
			$this->db->select('id,username');
            $this->db->where('username',$this->uri->segment(3));
			$s=$this->db->get($this->config->item('system_company'));
			$m=$s->row();
date_default_timezone_set('Asia/Bangkok');
#ระบบส่งค่าไปถาม Betamount Winloss RollingAmount
$currentDate = date('Y-m');
$startTime = date("Y-m-d", strtotime("first day of this month"));#เวลาเริ่มต้นของเดือน
$EndTime = date("Y-m-d", strtotime("last day of this month"));#เวลาสิ้นสุดของเดือน
/*---Call---*/
#ระบบลอกอิน
 $date = date('YmdHis', time());
$language = "th";
// Your own secret key
$secretkey = $this->config->item('secretkey');
// Change the API url if production url is used
$url = $this->config->item('ckbeturl');

	// MD5 Signature key
	$md5key = $this->config->item('md5key');
	
	// Encryption key
	$key = $this->config->item('encryptkey');
	
	// Change for your currency if necessary
	$currency = "THB";
	
	// Your Lobby code, please refer to integration email
	$lobbyCode = $this->config->item('Lobby');
	
	// Mobile mode?
	$mobile = "false";

	#เช็คข้อมูลก่อนว่ามีuser ใน lobby ของระบบไหมถ้าไม่มีก้ Reginfo ก่อน
$QS = "method=GetTransactionDetails&Key=".$secretkey."&Time=".$date."&Username=".$m->username."&FromTime=".$startTime." 00:00:00&ToTime=".$EndTime." 23:59:59";
	$s = md5($QS.$md5key.$date.$secretkey);
	
	$crypt = new Des($key);
	$q = $crypt->encrypt($QS);
	$data = array('q' => $q, 's' => $s);

	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { 
		/* Handle error เออเร่อออกทันที */ 
		echo "Error in request";
		exit();
	}

	$xml=simplexml_load_string($result) or die("Error: Cannot create object");
#เช็คว่ามีสมาชิกนั้นอยู่ในระบบไหม ถ้ามีให้เข้าระบบเลยถ้าไม่มีให้เด้งไปหน้าลงทะเบียนก่อน
	if ($xml->ErrorMsgId == 0){ 
	#echo $xml->Count.'<br>';
	#echo $xml->Winlose.'<br>';
	#echo $xml->TotalBet.'<br>';
	#echo $xml->TotalRolling.'<br>';
#นำค่าเหล่านี้มา insert เเละอัพเดท Check ก่อนว่ามียังถ้ามีเล้ว UPDATE
	if ($xml->Count > 0){ 
		$this->db->select('TotalTime,roll_id');
        $this->db->where('company_id',$m->id);
		$this->db->where('DATE_FORMAT(`TotalTime`,\'%Y-%m\')','\''.$currentDate.'\'',false);
		$b=$this->db->get($this->config->item('system_rolling'));
		$s=$b->row();
        $count = $b->num_rows(); 
if ( $count >= 1 ){
#ถ้าเจอก็อัพเดท
 $data_array = array(
								'Count'			=> $xml->Count,
							    'Winlost'		=> $xml->Winlose,
								'TotalBet'	=> $xml->TotalBet,
								'RollingAmount'	=> $xml->TotalRolling,
								'FromTime'		    => $startTime.' 00:00:00.',
								'ToTime'		    => $EndTime.' 23:59:59.' 
						);
					$this->db->where('company_id',$m->id);
					$this->db->where('DATE_FORMAT(`TotalTime`,\'%Y-%m\')','\''.$currentDate.'\'',false);
					$this->db->update($this->config->item('system_rolling'), $data_array);

}else{
#ถ้าไม่มีให้นำเข้าฐานข้อมูล
 $data_array = array(
								'company_id'			=> $m->id,
							    'user'		=> $m->username,
								'Count'			=> $xml->Count,
							    'Winlost'		=> $xml->Winlose,
								'TotalBet'	=> $xml->TotalBet,
								'RollingAmount'	=> $xml->TotalRolling,
								'TotalTime'	=> date('Y-m-d'),
								'FromTime'		    => $startTime.' 00:00:00.',
								'ToTime'		    => $EndTime.' 23:59:59.' 
						);
$this->db->insert($this->config->item('system_rolling'),$data_array);
				}
	}
	}
/*--สิ้นสุด Call--*/

/*-------------------ENd------------------------------------------*/

            $this->db->where('user',$this->uri->segment(3));
            $this->db->order_by('TotalTime','DESC');
			$this->db->limit(1);  // Produces: LIMIT 1
			$q=$this->db->get($this->config->item('system_rolling'));
			$data['r']=$q->row();
			$start = $data['r']->FromTime;
			$last = $data['r']->ToTime;
			$data['content_data']=array('q'=>$q,'start'=>$start,'last'=>$last);
			$data['content_view']='credit/returnwinloss';
		    $this->load->view('pop',$data);
	}
			public function bank_tranfer(){
			/*joint*/
            $this->db->where('A.id',$this->uri->segment(3));
		     $this->db->select('A.promotion,A.bank,A.account,A.acc_name,B.bankname');
			$this->db->join($this->config->item('system_bank').' B','A.bank=B.bank_id');
			$q=$this->db->get($this->config->item('system_company').' A');
			$r=$q->row();
			$promotion = $r->promotion;
			$this->db->where('id',$promotion);
			$m=$this->db->get('system_promotion');
			$s=$m->row();
// จัดให้อยู่ในรูปแบบนี้ ### - #### - ### 
 
// สมมติเบอร์นี้
$var = $r->account; 
$srt[0] = substr($var, 0, 3);
$srt[1] = substr($var, 3, 4);
$srt[2] = substr($var, 7, 5);
			echo'<h3>บัญชีรับเงิน</h3><div class="alert alert-success"><span class="font-weight-bold text-secondary f20">ธนาคาร '.$r->bankname.'</span><br/><span class="font-weight-bold text-danger f20"> '.$srt[0]."-".$srt[1]."-".$srt[2].'</span><br/><span class="font-weight-bold text-secondary f20">ชื่อ '.$r->acc_name.'</span>
			<hr>
			โปรโมชั่น  -<span class="text-danger">'.$s->name.'</span>
			</div>';
			$data['content_view']='credit/bank_tranfer';
		    //$this->load->view('credit/bank_tranfer',$data);
	}
	public function transfer()
	{
		if($this->input->post('action')){
			
			$data=array(
				'company_id'	=> $this->input->post('id'),
				'to_bank'		=> 0,
				'money'			=> $this->input->post('money'),
				'ref'			=> $this->input->post('reference'),
				'time'			=> date('H:i'),
				'regis_date'	=> date('Y-m-d H:i:s'),
				'from_bank '	=> 0,
				'from_type'		=> 9,
				'check'			=> 0,
				'status'		=> 0
			);
			$this->db->insert($this->config->item('topup_bank_transfer'),$data);
			
			echo '1';
			
		}else{			
			$this->db->where('id',$this->input->post('id'));
			$q=$this->db->get($this->config->item('system_company'));
			$data['r']=$q->row();
			
			$this->load->view('customers/transfer',$data);
		}
	}
		public function deposit(){
		if($this->uri->segment(3)=='today'){
			$date=date('Y-m-d');
			$choice = 'today';
		}elseif($this->uri->segment(3)=='yesterday'){
			$date = date("Y-m-d",strtotime("yesterday"));$choice = 'yesterday';
		}elseif($this->uri->segment(3)=='week'){
$choice = 'week';$date = date("Y-m-d",strtotime("yesterday"));
	    }elseif($this->uri->segment(3)=='mounth'){
        $choice = 'mounth';$date = date("Y-m-d",strtotime("yesterday"));
		}
#end load total deposit
		$this->load->model('topup_model');
		$this->total_ew = $this->topup_model->getTotal_ew($date,$choice);
        $this->total_withdraw = $this->topup_model->getTotal_withdraw($date,$choice);
		$this->income =  $this->total_ew - $this->total_withdraw;
		$data['content_data']=array('q'=>$q);
		$data['content_view']='credit/deposit';
		$this->load->view('index',$data);
		
		}
	public function getLists(){
		$this->load->model('dep_model');
        $data = $row = array();
        $manage = $this->uri->segment(3);
        // Fetch member's records
        $memData = $this->dep_model->getRows($_POST,$manage);
        
        $i = $_POST['start'];
		$total_order = 0;
        foreach($memData as $member){
            $i++;
        $total_order = $total_order + floatval($member->money);
           // $created = date( 'D j M Y', strtotime($member->dateRecieve));
            //$status = ($member->status == 1)?'Active':'Inactive';
            $data[] = array($member->id,$member->date_tran, $member->name, $member->bank_deposit, $member->money, $member->user, $member->status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->dep_model->countAll(),
            "recordsFiltered" => $this->dep_model->countFiltered($_POST,$manage),
             'total'    => number_format($total_order, 2),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
/*------------------------GET withdraw---------------*/
		public function withdraw(){
		$this->load->model('with_model');
		$this->load->library('md5crypt');
		if($this->uri->segment(3)=='today'){
			$date=date('Y-m-d');
			$choice = 'today';
		}elseif($this->uri->segment(3)=='yesterday'){
			$date = date("Y-m-d",strtotime("yesterday"));$choice = 'yesterday';
		}elseif($this->uri->segment(3)=='week'){
$choice = 'week';$date = date("Y-m-d",strtotime("yesterday"));
	    }elseif($this->uri->segment(3)=='mounth'){
        $choice = 'mounth';$date = date("Y-m-d",strtotime("yesterday"));
		}
#end load total deposit
		$this->load->model('topup_model');
		$this->total_ew = $this->topup_model->getTotal_ew($date,$choice);
        $this->total_withdraw = $this->topup_model->getTotal_withdraw($date,$choice);
		$this->income =  $this->total_ew - $this->total_withdraw;
		$data['content_data']=array('q'=>$q);
		$data['content_view']='credit/withdraw';
		$this->load->view('index',$data);
		
		}
	public function getWithdraw(){
		$this->load->model('with_model');
        $data = $row = array();
        $manage = $this->uri->segment(3);
        // Fetch member's records
        $memData = $this->with_model->getRows($_POST,$manage);
        
        $i = $_POST['start'];
		$total_order = 0;
        foreach($memData as $member){
            $i++;
        $total_order = $total_order + floatval($member->money);
           // $created = date( 'D j M Y', strtotime($member->dateRecieve));
		   	  $detail = ' <a href="'.site_url('credit/withdraw/mounth').'" class="btn btn-sm btn-secondary"><i class="fas fa-check"></i> รายละเอียด</a>';
              $status = ($member->status == 1)?'<span class="badge badge-success">Success</span>':'NO';
              $data[] = array($member->user,$member->date_tran,'',$member->money, $status, $member->approve, $detail);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->with_model->countAll(),
            "recordsFiltered" => $this->with_model->countFiltered($_POST,$manage),
             'total'    => number_format($total_order, 2),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
/*------------------------ END GET withdraw---------------*/
	public function realtime(){
	echo date('Y-m-d H:i:s').'<br>';
			$this->db->select('id,message,status');
            $this->db->where('status',0);
			$s=$this->db->get('system_smsdata');
			$this->db->limit(1);  // Produces: LIMIT 1
			$ms=$s->row();
			echo $ms->message;
			#ระบบ
 $mixedStr = $ms->message;
 $searchStr= "โอนจาก";
   if(strpos($mixedStr,$searchStr)) {
#ค่าต่างๆ
$arr_data = explode(" ", $ms->message);#ข้อมูลที่นำเข้ามาเเยก
$t = explode("@", $arr_data[0]); // เเยกวันที่ออกมาจากเวลา เช่น 04/11@08:28
$f=explode("โอนจาก", $arr_data[2]);#โอนจากใคร เช่น โอนจากxxxxxx
$ar_4 = array("เข้า","x"); #กรณีไม่ใช่ SCB to SCB นำค่า จ ากKBNK/x146861เข้าx421875
$data_ar4 = str_replace($ar_4," ", $arr_data[4]);#ก็จะได้ KHAI421875
$s_arr = explode(" ", $data_ar4);

#ตัวเเปรสำคัญ
$FromBank='scb';
$time_sms = $t[1];//เวลาโอนจาก SMS
$date_sms = date('Y-m-d');//วันปัจจุบัน
//$amount = $arr_data[1]; //ยอด
$amount = str_replace(',','', $arr_data[1]);
$from_sms = $f[1].''.$s_arr[0];#ชื่อ
$surname = $s_arr[0];#นามสกุล
$to_bank = $s_arr[2];#เลขหกหลักสุดท้ายเลขบัญชีรับโอน
echo '<br>'.$time_sms.'-'.$date_sms.'-'.$amount.'-'.$from_sms.'-'.$surname.'-'.$to_bank;
#สิ้นสุดเเละนอกจากคำสั่งจริงนอกนั้นเป็นต่างธนาคาร
$datasms=array(
								'message'		=> $ms->message,
								'date_deposit'		=> $date_sms,
								 'amount'		=> $amount,
							     'bank'		=> 'SCB',
								'to_bank'		=> $to_bank,
								'time_deposit'		    => $time_sms,
								'name'		    => $from_sms,
								'bank_type'		=> 1	
				);
				$this->db->insert($this->config->item('system_sms'),$datasms);
#อัพเดทสถานะเป็น yes
$this->db->set('status', '1', FALSE);
$this->db->where('id', $ms->id);
$this->db->update('system_smsdata');
   }else{
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
   }
	}
	public function realcheck(){
#นำข้อมุลจาก system_sms มาหาว่าหมายเลขบัญชีที่ลงท้ายด้วยตัวนี้เป็นใคร
			$this->db->select('*');
            $this->db->where('status',0);
			$s=$this->db->get('system_sms');
			$this->db->limit(1);  // Produces: LIMIT 1
			$ms=$s->row();
			//echo $ms->message;echo '<br>';
			//echo $ms->amount;echo '<br>';

#นำข้อมูลมาเเยกประเภท------------------------------------------------------
   if($ms->bank_type == 1):
	   echo'ประเภท 1';
	endif;
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
#ถ้าค้นหาจากฝากเครดิตเเล้วเจอให้ทำการอัพเดทเครดิตเลย
//echo'เจอข้อมูล';
#ดึงข้อมูลออกมา
$company_id = $data2->userID;
$amount = $data2->money;
$orderId = $data2->id;
#เพิ่มเครดิตให้สมาชิก
						$this->db->where('id',$company_id);
						$this->db->set('`cash_online`','`cash_online`+'.$amount,false);
						$this->db->update($this->config->item('system_company'));
#อัพเดทรายการฝาก
						$this->db->where('id',$orderId);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_deposit'));
#อัพเดทสถานะ SMS
						$this->db->where('id',$ms->id);
						$this->db->set('status','1');
						$this->db->update($this->config->item('system_sms'));
				}else{
echo'ไม่เจอข้อมูลการฝาก';
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
				}

				}else{
echo'ไม่เจอข้อมูล';
				}



/*------------------------------------------------------สิ้นสุด*/
	endif;
	}
/*----------------------เริ่มต้นเเสดงข้อมูลสรุปรายได้-------------------------------*/
public function getIncome(){
date_default_timezone_set('Asia/Bangkok');

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
}

?>