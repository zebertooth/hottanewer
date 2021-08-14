<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Winner extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('winner_model');
		$this->load->model('topup_model');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

	public function index()
	{
        // Load the member list view
		$data['content_view']='winner/index';
		$this->load->view('index',$data);
	}
	public function summary()
	{
#จุดเริ่มต้นของเดือน
if($this->input->post('year')){
$year=$this->input->post('year');
$month =$this->input->post('month'); 
$query_date = date(''.$year.'-'.$month.'-d');
}else{
$query_date = date('Y-m-d');
}
$month_start = date('Y-m-01', strtotime($query_date));
$month_end = date('Y-m-t', strtotime($query_date));
//กำหนดเดือน
//$month_start = strtotime('first day of this month', time());
//$month_end = strtotime('last day of this month', time());
//echo date('Y-m-d', $month_start).'<br/>';
//echo date('Y-m-d', $month_end).'<br/>';
// create start/end dates and interval
$start    = new DateTime(date($month_start));
$end      = new DateTime(date($month_end));
$interval = new DateInterval('P1D');

// DatePeriod excludes the last day
// so bump the end date by one
$end->modify('+1 day');

// create a DatePeriod for each day in range
$period = new DatePeriod($start, $interval, $end);

$months = [];

/*foreach ($period as $date) {
   // $months[$date->format('F')][] = $date->format('Y-m-d');
   echo $date->format('Y-m-d');
}*/

			$data['content_data']=array('period'=>$period);
			$data['content_view']='winner/summary';
		    $this->load->view('index',$data);
        // Load the member list view
		//$data['content_view']='winner/summary';
		//$this->load->view('index',$data);
	}
		public function infosuccess(){

$this->db->where('id',$this->input->post('company_id'));
			$data=array(
				'agent'		=> $this->input->post('agent'),
				'active'	=> $this->input->post('active'),
				'mClass'	=> $this->input->post('mClass')
			);
			$this->db->update($this->config->item('system_company'),$data);
echo'<div class="alert alert-success" role="alert">
  อัพเดทข้อมูลสำเร็จ
</div>';

		}
	public function info(){
		/*
		$this->db->select('id,username,name,cash_online,regis_date,active_date,agent,mClass,active');
		$this->db->where('id',$this->input->post('company_id'));
		$q=$this->db->get($this->config->item('system_company'));
		*/
		$this->db->select('A.id,A.username,A.cash_online,A.regis_date,A.active_date,A.account,A.acc_name,A.name,A.telephone,A.agent,A.active,A.mClass,B.bankname');
		$this->db->where('A.id',$this->input->post('company_id'));
		$this->db->from($this->config->item('system_company').' A');
		$this->db->join($this->config->item('system_bank').' B','A.bank=B.bank_id');
		$q=$this->db->get();
		$r=$q->row();
	if($r->agent == 1){$agent = 'selected';}else{$agent = '';}
	if($r->active == 1){$active = 'selected';}else{$active = '';}
if($r->mClass == 1){$mClass = 'selected';}else{$mClass = '';}
echo'
<form id="info">
  <div class="form-row">
  <div class="col-12" id="result"></div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username/เบอรโทรศัพท์</label>
   <p>'.$r->username.'</p>
    </div>
    <div class="form-group col-md-6">
      <label for="name">ชื่อ</label>
       <p>'.$r->name.'</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">บัญชีธนาคาร</label>
     <p>'.$r->bankname.' '.$r->account.' '.$r->acc_name.' </p>  
  </div>
  <div class="form-group">
    <label for="inputAddress2">เครดิต</label>
    <p> '.$r->cash_online.'</p>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">สมัครเมื่อ</label>
   <p> '.$r->regis_date.'</p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">ยืนยันเมื่อ</label>
     <p> '.$r->active_date.'</p>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">ยืนยัน</label>
   <p>
    <select id="agent" name="agent" class="form-control">
        <option value="0" '.$agent.'>ไม่</option>
        <option value="1" '.$agent.'>ยืนยันการใช้งาน</option>
      </select>
 </p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">เข้าใช้งาน</label>
   <p>
    <select id="active" name="active" class="form-control">
        <option value="0" '.$active.'>ระงับการใช้งาน</option>
        <option value="1" '.$active.'>ใช้งาน</option>
      </select>
 </p>
    </div>
  </div>
<input type="hidden" name="company_id" id="company_id" value="'.$r->id.'">
  <button type="button" class="btn btn-primary" id="Btninfo">อัพเดทข้อมูล</button>
</form>
';
		}

	public function pwedit(){
			$this->db->where('id',$this->input->post('company_id'));
			$q=$this->db->get($this->config->item('system_company'));
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
	 <input type="hidden" id="company_id" value="'.$r->id.'">
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
	public function generate(){
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

echo randomPassword();
	}
/*start----------------------*/
	public function getLists(){
function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->winner_model->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
		#คำนวณยอดกำไรขาดทุน
		$user = $member->id;
		$withdraw = $this->topup_model->getWithdrawall($user);
		$deposit = $this->topup_model->getDepositall($user);
		$profit = $withdraw-$deposit;
        $created = DateThai($member->regis_date);
        $status = ($member->active == 1)?'Active':'Inactive';
       // $this->column_search = array('username','name','telephone','account','cash_online','regis_date','g_id');
/*<button type="button" class="btn btn-danger btn-sm view_addcredit" id="'.$member->id.'">เติมเงิน</button>*/
            $data[] = array('
<button type="button" class="btn btn-cyan btn-sm view_info" id="'.$member->id.'">ข้อมูล</button>
<button type="button" class="btn btn-success btn-sm view_data" name="view" value="view" id="'.$member->id.'">สรุป</button>
', $member->username, $member->name,number_format($deposit,2,'.',','),number_format($withdraw,2,'.',','), $member->cash_online,number_format($profit,2,'.',','), $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->winner_model->countAll(),
            "recordsFiltered" => $this->winner_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
/*------------------ENd----------------------------*/
	public function creditRefresh() {
            $this->db->select('cash_online');
            $this->db->where('id',$this->uri->segment(3));
			$q=$this->db->get($this->config->item('system_company'));
			$m=$q->row();
			echo '<h3>'.$m->cash_online.'</h3>';
	}
	public function creditAdd() {
		$this->db->select('id,username,cash_online,name');
		$this->db->where('id',$this->input->post('company_id'));
		$q=$this->db->get($this->config->item('system_company'));

		$r=$q->row();
echo'<center>รหัส user : '.$r->username.' ชื่อ '.$r->name.'</center><br/><center><div id="amounts"><h3>'.$r->cash_online.'</h3></div></center>';
echo'
<form id="Addcredit">
 <div id="result"></div>
<div class="form-group">
    <label for="amount">ยอด</label>
    <input type="text" class="form-control form-control-lg" id="amount" name="amount" placeholder="ระบุยอด">
  </div>
 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="time_1">นาฬิกา</label>
    <select name="time_1" id="time_1" class="form-control input-lg">
                    <option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11" selected>11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option> 
                </select> 
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">นาที</label>
  <select name="time_2" id="time_2" class="form-control input-lg">
                <option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20" selected>20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>       
                </select>
    </div>
  </div>

 <div class="form-group row f1-buttons mt-5">
  <div class="col-8 col-md-8 mb-2">
<button type="button" class="btn btn-success btn-block btn-lg" id="BtnAddcredit">เพิ่มเครดิต</button>
  </div>
  <div id="egv" class="col-4 col-md-4">
  <input type="hidden" name="company_id" id="company_id" value="'.$r->id.'">
<button type="button" class="btn btn-cancle btn-block btn-danger btn-lg" id="btnCancle" name="btnCancle" data-dismiss="modal" aria-label="Close">ปิดหน้าต่าง</button>
  </div>
  </div>

                            </form>
<hr>
<div id="last_transaction"></div>
';
	}
	public function addcredit_success()
	{
date_default_timezone_set("Asia/Bangkok");
			if($this->input->post('company_id')){
/*-------------ดึงค่าต่างๆ---------------------*/
$this->db->select('A.username,A.name,A.account,A.acc_name,A.bank,A.jointBank,B.account as account_dep,B.acc_name as acc_name_dep,B.bank as bank_dep,B.bank_id');
		$this->db->where('A.id',$this->input->post('company_id'));
		$this->db->from($this->config->item('system_company').' A');
		$this->db->join($this->config->item('topup_bank_transfer').' B','A.jointBank=B.bank_id','left');
		$q=$this->db->get();
		$r=$q->row();
			$time_in = $this->input->post('time_1').':'.$this->input->post('time_2');
      $data=array(
					'userID'	=> $this->input->post('company_id'),
					'bank_id'		=> $r->bank_id,
					'money'			=> $this->input->post('amount'),
					'time_deposit'			=> $time_in,
					'date_tran'	=> date('Y-m-d H:i:s'),
					'date_end' => date('Y-m-d H:i:s'),
					'date_deposit'	=> date('Y-m-d'),
				    'bank_deposit'		=> $r->account_dep.'-'.$r->bank_dep,
					'name'			=> $r->name,
					'user'			=> $r->username,
				    'type'			=> 1,
					'date_approve'	=> date('Y-m-d H:i:s'),
					'approve'	=> $this->session->userdata('usernane'),
					'approve_uid'	=> $this->session->userdata('id'),
					'comment' => 'สำเร็จ '.$this->session->userdata('usernane'),
					'status'		=> 1
				);
				$this->db->insert($this->config->item('system_deposit'),$data);
#ระบบอัพเดทสถานะ
						$this->db->where('id',$this->input->post('company_id'));
						$this->db->set('`cash_online`','`cash_online`+'.$this->input->post('amount'),false);
						$this->db->update($this->config->item('system_company'));
		echo'<div class="alert alert-success" role="alert">
 เพิ่มข้อมุลสำเร็จ
</div>';
			}
	}
	public function pwsave()
	{
		if($this->input->post('password')){
		$this->db->where('id',$this->input->post('company_id'));
		$this->db->set('password',md5($this->input->post('password')));
		$this->db->update($this->config->item('system_company'));
		echo '<p class="text-success">แก้ไขสำเร็จ</p>';

		}
	}
	public function edit()
	{

		if($this->input->post('action')){

			$this->db->where('id',$this->input->post('userID'));
			if($this->input->post('password1')){
				if($this->input->post('password1') == $this->input->post('password2')){
					$this->db->set('password',md5($this->input->post('password1')));
				}
			}
			$data=array(
				'name'		=> $this->input->post('nameM'),
				'telephone'	=> $this->input->post('telephone'),
				'acc_name'	=> $this->input->post('acc_name'),
				'account'	=> $this->input->post('account'),
				'bank'	=> $this->input->post('bank'),
				//'address'	=> $this->input->post('address'),
				//'province'	=> $this->input->post('province'),
				//'amphur'	=> $this->input->post('amphur'),
				//'district'	=> $this->input->post('district'),
				//'postal'	=> $this->input->post('postal'),
				'agent'		=> $this->input->post('agent'),
				//'upline'	=> $this->input->post('guide'),
				'active'	=> $this->input->post('active')
			);
			$this->db->update($this->config->item('system_company'),$data);
			echo '<div class="alert alert-success">บันทึกข้อมูลเรียนร้อยแล้ว</div>';
			
		}else{
			
			$this->db->where('id',$this->input->post('id'));
			$q=$this->db->get($this->config->item('system_company'));
			$data['r']=$q->row();

			$this->db->select('bank_id,bankname');
			$this->db->order_by('bank_id','ASC');
			$data['bank']=$this->db->get($this->config->item('system_bank'));

			$this->load->view('customers/edit',$data);
		}
	}
	#---winloss----#
		public function winloss(){

		$this->load->library('pagination');
		$per_page=50;
		
		
		$this->db->order_by('id','DESC');
		$this->db->limit($per_page,($this->uri->segment(3)?($this->uri->segment(3)*$per_page)-$per_page:0));
		//$this->db->join($this->config->item('system_province').' B','A.province=B.province_id','LEFT');
		$q=$this->db->get($this->config->item('system_winloss'));
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = site_url('customers/winloss/');
		$config['total_rows'] = $this->db->count_all_results($this->config->item('system_winloss'));
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config); 
		
		$data['content_data']=array('q'=>$q,'pagination'=>$this->pagination->create_links());
		$data['content_view']='customers/winloss';
		$this->load->view('index',$data);
	}
	#--end winloss--#

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
	public function live()
	{
			$this->db->where('mClass',1);
			$q=$this->db->get($this->config->item('system_company'));
			$data['r']=$q->row();
			$data['content_data']=array('q'=>$q);
#			$data['content_data']=array('q'=>$q,'class'=>$this->config->item('class'),'active'=>$this->config->item('active'));
		$data['content_view']='customers/live';
		$this->load->view('index',$data);
	}
public function liveinfo(){

		$this->db->select('id,username,password,name,bank,account,acc_name,cash_online,regis_date,active_date,agent,mClass,active');
		$this->db->where('id',$this->input->post('company_id'));
		$q=$this->db->get($this->config->item('system_company'));

		$r=$q->row();
	if($r->agent == 1){$agent = 'selected';}else{$agent = '';}
	if($r->active == 1){$active = 'selected';}else{$active = '';}
if($r->mClass == 1){$mClass = 'selected';}else{$mClass = '';}
echo'
<form id="Editmembers">
  <div class="col-12" id="result"></div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">username</label>
      <input type="text" class="form-control" id="username" name="username" value="'.$r->username.'">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">รหัสผ่าน</label>
      <input type="text" class="form-control" id="password" name="password" value="'.$r->password.'">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">เครดิต</label>
    <input type="text" class="form-control" id="cash_online" name="cash_online" value="'.$r->cash_online.'">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">ชื่อ-สกุล</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="กรอก ชื่อ-สกุล" value="'.$r->name.'">
  </div>
</div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputAddress">ธนาคาร</label>
    <input type="text" class="form-control" id="bank" name="bank" placeholder="ค่ากำหนดเครดิต" value="'.$r->bank.'">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">เลขบัญชี</label>
    <input type="text" class="form-control" id="account" name="account" placeholder="ระบุเลขบัญชี" value="'.$r->account.'">
  </div>
    <div class="form-group col-md-4">
    <label for="inputAddress2">ชื่อบัญชี</label>
    <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="กรอก ชื่อ-สกุล" value="'.$r->acc_name.'">
  </div>
</div>ffffff
  <div class="form-row">
      <div class="form-group col-md-4">
      <label for="inputCity">สถานะ</label>
      <select id="agent" name="agent" class="form-control">
      <option value="0" '.$agent.'>ไม่</option>
        <option value="1" '.$agent.'>ยืนยันการใช้งาน</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">สถานะ</label>
      <select id="agent" name="agent" class="form-control">
      <option value="0" '.$agent.'>ไม่</option>
        <option value="1" '.$agent.'>ยืนยันการใช้งาน</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="active">ออนไลน์</label>
      <select id="active" name="active" class="form-control">
        <option value="0" '.$active.'>ระงับ</option>
        <option value="1" '.$active.'>ออนไลน์</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="mClass">ระดับ</label>
        <select id="mClass" name="mClass" class="form-control">
        <option value="0" '.$mClass.'>สมาชิก</option>
        <option value="1" '.$mClass.'>การตลาด</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
      <label class="form-check-label" for="gridCheck">
       เเก้ไขข้อมูล
      </label>
    </div>
  </div>
  <input type="hidden" name="company_id" id="company_id" value="'.$r->id.'">
  <button type="button" class="btn btn-primary" id="Btnliveinfo">อัพเดทข้อมูล</button>
</form>';
		}
		public function livesuccess2(){

$this->db->where('id',$this->input->post('company_id'));
			$data=array(
				'agent'		=> $this->input->post('agent'),
				'active'	=> $this->input->post('active')
			);
			$this->db->update($this->config->item('system_company'),$data);
echo'<div class="alert alert-success" role="alert">
อัพเดทข้อมูลสมาชิกสำเร็จ
</div>';

		}
		public function livesuccess(){
		if($this->input->post('gridCheck')){
            $this->db->where('id',$this->input->post('company_id'));
			$data=array(
				'username'		=> $this->input->post('username'),
				'name'		=> $this->input->post('name'),
				'cash_online'		=> $this->input->post('cash_online'),
				'bank'		=> $this->input->post('bank'),
				'account'		=> $this->input->post('account'),
				'acc_name'		=> $this->input->post('acc_name'),
				'mClass'		=> $this->input->post('mClass'),
				'agent'		=> $this->input->post('agent'),
				'active'	=> $this->input->post('active')
			);
			$this->db->update($this->config->item('system_company'),$data);
echo'<div class="alert alert-success" role="alert">
อัพเดทข้อมูลสมาชิกสำเร็จ
</div>';
		}
		}
		public function addmembers(){

		if($this->input->post('gridCheck')){
			
			$data=array(
				'username'	=> $this->input->post('username'),
				'password'			=> md5($this->input->post('password2')),
				'cash_online'			=> $this->input->post('cash_online'),
				'telephone'	=> $this->input->post('username'),
				'name'			=> $this->input->post('name'),
				'agent'			=> $this->input->post('agent'),
				'bank'			=> $this->input->post('bank'),
				'account'			=> $this->input->post('account'),
				'acc_name'			=> $this->input->post('acc_name'),
				'active'			=> $this->input->post('active'),
				'mClass'			=> $this->input->post('mClass'),
				'regis_date'	=> date('Y-m-d H:i:s'),
				'active_date'	=> date('Y-m-d H:i:s')
			);
			$this->db->insert($this->config->item('system_company'),$data);
			echo'
<div class="alert alert-success">
  <strong>Success!</strong> เพิ่มข้อมูลเรียบร้อย
</div>
			';
		}


		}
#เเก้ไขสมาชิก
public function useredit(){

		$this->db->select('id,bookbank,username,password,name,bank,account,s_account,acc_name,cash_online,regis_date,active_date,agent,mClass,active,promotion,witdraw,hash_bank');
		$this->db->where('id',$this->input->post('company_id'));
		$q=$this->db->get($this->config->item('system_company'));

		$r=$q->row();
	if($r->agent == 1){$agent = 'selected';}else{$agent = '';}
	if($r->active == 1){$active = 'selected';}else{$active = '';}
if($r->mClass == 1){$mClass = 'selected';}else{$mClass = '';}
if($r->witdraw == 1){$witdraw = 'selected';}else{$witdraw = '';}
echo'
<form id="Editmembers">
  <div class="form-row">
      <div class="col-12" id="result"></div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">username</label>
      <input type="text" class="form-control" id="username" name="username" value="'.$r->username.'">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">รหัสบัญชีอัตโนมัติ</label>
      <input type="text" class="form-control" id="bookbank" name="bookbank" value="'.$r->bookbank.'">
	  <p>เฉพาะไทยพาณิชย์เท่านั้น </p>
	  <p class="text-danger">'.$r->hash_bank.'</p>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">เครดิต</label>
    <input type="text" class="form-control" id="cash_online1" name="cash_online1" value="'.$r->cash_online.'" disabled>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">ชื่อ-สกุล</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="กรอก ชื่อ-สกุล" value="'.$r->name.'">
  </div>
</div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputAddress">ธนาคาร</label>';?>
  <select class="form-control" id="bank" name="bank">
<?php
$this->db->order_by('id','ASC');
$query = $this->db->get('system_bank');
$value = $query->result();
		foreach ($value as $c): 
$select_op = ($r->bank == $c->id) ?  'selected="selected"' : '';			
		?>
<option value="<?php echo $c->id;?>" <?php echo $select_op;?>><?php echo $c->bankname; ?></option>
<?php endforeach; ?>
</select>
 <?php  echo'
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">เลขบัญชี</label>
    <input type="text" class="form-control" id="account" name="account" placeholder="ระบุเลขบัญชี" value="'.$r->account.'">
	<p class="text-danger">รหัส-'.$r->s_account.'</p>
  </div>
    <div class="form-group col-md-3">
    <label for="inputAddress2">ชื่อบัญชี</label>
    <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="กรอก ชื่อ-สกุล" value="'.$r->acc_name.'">
  </div>
</div>
  <div class="form-row">
      <div class="form-group col-md-3">
      <label for="inputCity">ถอนเครดิต</label>
      <select id="witdraw" name="witdraw" class="form-control">
      <option value="0" '.$witdraw.'>ถอนได้</option>
        <option value="1" '.$witdraw.'>ระงับชั่วคราว</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">สถานะ</label>
      <select id="agent" name="agent" class="form-control">
      <option value="0" '.$agent.'>ไม่</option>
        <option value="1" '.$agent.'>ยืนยันการใช้งาน</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="active">ออนไลน์ casino</label>
      <select id="active" name="active" class="form-control">
        <option value="0" '.$active.'>ระงับ</option>
        <option value="1" '.$active.'>ออนไลน์</option>
      </select>
    </div>
    <div class="form-group col-md-3">
       <label for="active">โปรโมชั่น</label>';
	
?>
  <select class="form-control" id="promotion" name="promotion">
<?php
$this->db->order_by('id','ASC');
$query = $this->db->get('system_promotion');
$value = $query->result();
		foreach ($value as $c): 
$select_op2 = ($r->promotion == $c->id) ?  'selected="selected"' : '';			
		?>
<option value="<?php echo $c->id;?>" <?php echo $select_op2;?>><?php echo $c->name; ?></option>
<?php endforeach; ?>
</select>
 <?php echo'
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
      <label class="form-check-label" for="gridCheck">
       คลิกเเก้ไขข้อมูล
      </label>
    </div>
  </div>
  <input type="hidden" name="company_id" id="company_id" value="'.$r->id.'">
  <button type="button" class="btn btn-primary" id="BtnUpdateuser">อัพเดทข้อมูล</button>
</form>';
		}
		public function update_success(){
		if($this->input->post('gridCheck')){
            $this->db->where('id',$this->input->post('company_id'));
#นำค่ามาเอาเลขหกหลักบัญชี
	$s_account = substr($this->input->post('account') , -6);
			$data=array(
				'username'		=> $this->input->post('username'),
				'name'		=> $this->input->post('name'),
				//'cash_online'		=> $this->input->post('cash_online'),
				'bank'		=> $this->input->post('bank'),
				'account'		=> $this->input->post('account'),
				's_account'		=> $s_account,
				'acc_name'		=> $this->input->post('acc_name'),
				'witdraw'		=> $this->input->post('witdraw'),
				'agent'		=> $this->input->post('agent'),
				'promotion'		=> $this->input->post('promotion'),
				'bookbank'		=> $this->input->post('bookbank'),
				'hash_bank'		=> md5($this->input->post('bookbank')),
				'active'	=> $this->input->post('active')
			);
			$this->db->update($this->config->item('system_company'),$data);
echo'<div class="alert alert-success" role="alert">
อัพเดทสำเร็จ
</div>';
		}
		}
}
?>