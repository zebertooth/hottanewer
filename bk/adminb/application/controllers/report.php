<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Report extends CI_Controller{
	
	var $bank;
	var $network;
	var $ratio;
	var $ratio_vip;
	
	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
		$this->bank=array('Other','KTB','SCB','BBL','KSK','TMB','krungsri','7-Eleven','BONUS','Transfer');
		$this->network=array('Balance','AIS','DTAC','TRUE','IMOBILE','MY','AIS2','DTAC2','Cards','Public Utility');
		$this->network[80]='Transfer';
		$this->network[81]='Drawing';
		$this->ratio=array(0,3,3,5);
		$this->ratio_vip=array(0,3.5,3.5,7.5);
		
	}

	public function index()
	{
		
	}
	
	public function bank_transfer()
	{
		if($this->uri->segment(3)){
			$date=$this->uri->segment(3);
		}else{
			$date=date('Y-m-d');
		}
		$this->load->model('topup_model');
		$this->total_ew = $this->topup_model->getTotal_ew($date);
		$this->db->select('A.id,A.regis_date,A.ref,B.id as company_id,B.name,B.username,A.money,A.time,A.to_bank,A.from_bank,A.from_type,A.check,A.status');
		$this->db->where('date(A.regis_date)',$date);
		$this->db->order_by('id','DESC');
		$this->db->limit(($this->uri->segment(3)?$this->uri->segment(3):500));
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$q=$this->db->get($this->config->item('topup_bank_transfer').' A');
		$data['content_view']='topup/bank_transfer';
		$data['content_data']=array('q'=>$q);
		$this->load->view('index',$data);
	}
	
	public function drawing_transfer()
	{
		$this->db->limit(500);
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$q=$this->db->get($this->config->item('topup_drawing').' A');
		//$q=$this->db->get($this->config->item('topup_drawing'));
      //  $this->db->order_by('A.draw_id', 'desc');
		$data['content_data']=array('q'=>$q);
		$data['content_view']='topup/drawing_transfer';
		$this->load->view('index',$data);
	}
	
	public function bank_drawing_check()
	{
		if($this->input->post('id')){
			
			$this->db->where('draw_id',$this->input->post('id'));
			$this->db->update($this->config->item('topup_drawing'),array('check'=>$this->input->post('check'),'status'=>$this->input->post('status')));
			
			redirect(site_url('topup/drawing_transfer'),'refresh');
					
		}else{
			$this->db->select('*,A.draw_id as drawing_id');
			$this->db->where('A.draw_id',$this->uri->segment(3));
			$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
			$q=$this->db->get($this->config->item('topup_drawing').' A');
			$data['r']=$q->row();
			$this->load->view('topup/bank_drawing_check',$data);
		}
	}
	
	public function bank_transfer_check()
	{
		if($this->input->post('id')){
			if($this->input->post('status')){
				
				$money=(float)str_replace(',','',$this->input->post('money'));
				
				$this->db->where('id',$this->input->post('company_id'));
				$q=$this->db->get($this->config->item('system_company'));
				$r_com=$q->row();
					
				$this->db->where('id',$this->input->post('id'));
				$this->db->update($this->config->item('topup_bank_transfer'),array('check'=>$this->input->post('check'),'status'=>$this->input->post('status')));
					
				if($this->input->post('status') && !$this->input->post('old_status')){
					
					$this->db->where('id',$this->input->post('company_id'));
					$this->db->set('`cash_online`','`cash_online`+'.$money,false);
					$this->db->update($this->config->item('system_company'));
						
				}
				$id = $this->input->post('company_id');
				$this->db->select('id,cash_online');
				$this->db->where('id',$id);
				$q=$this->db->get($this->config->item('system_company'));
				$r=$q->row();
					
				$data=array(
					'add_ewallet'	=> $this->input->post('money'),
					'balance'		=> $r->cash_online,
					'company_id'	=> $this->input->post('company_id'),
					'log_transfer'	=> $this->input->post('id'),
					'date_add'		=> date('Y-m-d H:i:s')
				);
				$this->db->insert('ewallet_history',$data);
				
				
			}
			redirect(site_url('topup/bank_transfer'),'refresh');
		}else{
			$this->db->select('*,A.id as transfer_id');
			$this->db->where('A.id',$this->uri->segment(3));
			$this->db->from($this->config->item('topup_bank_transfer').' A');
			$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
			$q=$this->db->get();
			$data['r']=$q->row();
			$this->load->view('topup/bank_transfer_check',$data);
		}
	}
	
	public function bank_transfer_copy()
	{
		if($this->input->post('id')){
			$data=array(
				'company_id'	=> $this->input->post('company_id'),
				'to_bank'		=> $this->input->post('to_bank'),
				'money'			=> $this->input->post('money'),
				'time'			=> $this->input->post('time'),
				'regis_date'	=> date('Y-m-d H:i:s'),
				'from_bank '	=> $this->input->post('from_bank'),
				'from_type'		=> 9,
				'check'			=> 0,
				'status'		=> 0
			);
			$this->db->insert($this->config->item('topup_bank_transfer'),$data);
			redirect(site_url('topup/bank_transfer'),'refresh');
		}else{
			$this->db->where('A.id',$this->uri->segment(3));
			$this->db->from($this->config->item('topup_bank_transfer').' A');
			$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
			$q=$this->db->get();
			$data['r']=$q->row();
			$this->load->view('topup/bank_transfer_copy',$data);
		}
	}
	
	public function bank_transfer_delete()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete($this->config->item('topup_bank_transfer'));
		
		echo '1';
	}
	public function cancel_list()
	{
		if($this->uri->segment(3)){
			$date=$this->uri->segment(3);
		}else{
			$date=date('Y-m-d');
		}
		
		$this->db->select('*,A.regis_date as regis,A.id as tc_id,B.id as shop');
#select 
$st="send_ok='0' AND cancel_ok='0' AND DATE(A.regis_date)='$date'";
  $this->db->where($st, NULL, FALSE); 
		//$this->db->where('DATE(A.regis_date)','\''.$date.'\'',false);
		$this->db->order_by('A.regis_date','DESC');
		$this->db->limit(1000);
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$q=$this->db->get($this->config->item('topup_truncate').' A');
		
		$date=array();
		for($i=0;$i<=31;$i++){
			$date[(string)date('Y-m-d',strtotime(date('Y-m-d')." -$i day"))]=(string)date('d-m-Y',strtotime(date('Y-m-d')." -$i day"));
		}
		
		$data['content_view']='topup/cancel_list';
		$data['content_data']=array('q'=>$q,'day'=>$date);
		$this->load->view('index',$data);
	}
	public function truncate()
	{
		if($this->uri->segment(3)){
			$date=$this->uri->segment(3);
		}else{
			$date=date('2019-09-22');
		}
		
		$this->db->select('*,A.regis_date as regis,A.id as tc_id,B.id as shop');
		$this->db->where('DATE(A.regis_date)','\''.$date.'\'',false);
		$this->db->order_by('A.regis_date','DESC');
		$this->db->limit(1000);
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$q=$this->db->get($this->config->item('topup_truncate').' A');
		
		$date=array();
		for($i=0;$i<=31;$i++){
			$date[(string)date('Y-m-d',strtotime(date('Y-m-d')." -$i day"))]=(string)date('d-m-Y',strtotime(date('Y-m-d')." -$i day"));
		}
		
		$data['content_view']='topup/truncate';
		$data['content_data']=array('q'=>$q,'day'=>$date);
		$this->load->view('index',$data);
	}
	
	public function refill_refresh()
	{
		if($this->input->post('id2')){
			file_get_contents('http://working.cmtopup.com/api_easysoft.php?update='.$this->input->post('id2'));
			echo '1';
		}else{
			echo '2';
		}
	}
	
	public function refill_cancel()
	{
error_reporting(0);
		if($this->input->post('id1') && $this->input->post('id2')){
			
			$this->db->where('id',$this->input->post('id2'));
			$q=$this->db->get($this->config->item('topup_truncate'));
			if($q->num_rows()>0){
				$r=$q->row();
				
				$this->db->where('id',$this->input->post('id2'));
				$this->db->update($this->config->item('topup_truncate'),array('cancel_list'=>1,'cancel_ok'=>1,'cancel_ok_time'=>date('Y-m-d H:i:s')));
				
				$this->db->where('id',$this->input->post('id1'));
				$this->db->set('`cash_online`','`cash_online`+'.$r->balance,false);
				$this->db->update($this->config->item('system_company'));
/*-----------------------ค่าเเจ้ง EW------------------*/
#ดึงข้อมูลค่า EW มาทำรายการ
date_default_timezone_set("Asia/Bangkok");
$date = date('Y-m-d H:i:s');
$sql = "SELECT cash_online FROM  system_company where id='".$this->input->post('id1')."'";
$query=mysql_query($sql) or die ("Error[".$sql."]");
$callback = mysql_fetch_array($query) ;
$balance = $callback['cash_online'];
/*--------------------สิ้นสุด--------------*/
$sql_log="INSERT INTO ewallet_history (network,number,category,add_ewallet , de_ewallet , balance,regis_date,company_id,date_add)VALUES('".$r->network."', '".$r->number."','4','".$r->balance."','0', '".$balance."','".$r->regis_date."', '".$r->company_id."','$date')";
mysql_query($sql_log);
#สิ้นสุด
				echo '1';
			
			}else{
				echo '2';
			}
		}else{
			echo '3';
		}
	}
public function bills_cancel()
	{
error_reporting(0);

		if($this->input->post('id1') && $this->input->post('id2')){
			
			$this->db->where('id',$this->input->post('id2'));
			$q=$this->db->get($this->config->item('topup_truncate'));
			if($q->num_rows()>0){
				$r=$q->row();
				
				$this->db->where('id',$this->input->post('id2'));
				$this->db->update($this->config->item('topup_truncate'),array('cancel_list'=>1,'cancel_ok'=>1,'cancel_ok_time'=>date('Y-m-d H:i:s')));
				
				$this->db->where('id',$this->input->post('id1'));
				$this->db->set('`cash_online`','`cash_online`+'.$r->balance,false);
				$this->db->update($this->config->item('system_company'));
#คำสั่งดึงข้อมูลหมวดหมู่บริการ
			$this->db->where('tc_id',$this->input->post('id2'));
			$n=$this->db->get($this->config->item('topup_service'));
			$m=$n->row();
$tc_type=$m->tc_type;
/*-----------------------ค่าเเจ้ง EW------------------*/
#ดึงข้อมูลค่า EW มาทำรายการ
date_default_timezone_set("Asia/Bangkok");
$date = date('Y-m-d H:i:s');
$sql = "SELECT cash_online FROM  system_company where id='".$this->input->post('id1')."'";
$query=mysql_query($sql) or die ("Error[".$sql."]");
$callback = mysql_fetch_array($query) ;
$balance = $callback['cash_online'];
/*--------------------สิ้นสุด--------------*/
$sql_log="INSERT INTO ewallet_history (network,number,category,add_ewallet , de_ewallet , balance,regis_date,company_id,code,date_add)VALUES('".$r->network."', '".$r->number."','11','".$r->balance."','0', '".$balance."','".$r->regis_date."', '".$r->company_id."', '".$tc_type."','$date')";
mysql_query($sql_log);
#สิ้นสุด
				echo '1';
			
			}else{
				echo '2';
			}
		}else{
			echo '3';
		}
	}
	public function report_month()
	{
		if($this->input->post('month')){
			$month=$this->input->post('month');
		}else{
			$month=date('Y-m');
		}
		$this->db->select('B.id,B.username,B.name,B.cash_online,SUM(A.cash) as total_cash,SUM(A.balance) as total_balance');
		$this->db->where('A.send_ok',1);
		$this->db->where('A.cancel_ok',0);
		$this->db->where('A.network !=',80);
		$this->db->where('DATE_FORMAT(`A`.`regis_date`,\'%Y-%m\')','\''.$month.'\'',false);
		$this->db->group_by('A.company_id');
		$this->db->order_by('total_cash','DESC');
		$this->db->from($this->config->item('topup_truncate').' A');
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$q=$this->db->get();
		$sum=0;
		$line='[';
		$sum_network1=array();
		$sum_network2=array();
		$this->db->select('`network`,SUM(`cash`) as top_cash,SUM(`balance`) as top_balance',false);
		$this->db->where('send_ok',1);
		$this->db->where('cancel_ok',0);
		$this->db->where('network !=',80);
		$this->db->where('DATE_FORMAT(`regis_date`,\'%Y-%m\')=\''.$month.'\'','',false);
		$this->db->group_by('network');
		$qq=$this->db->get($this->config->item('topup_truncate'));
		if($qq->num_rows()>0){
			foreach($qq->result() as $r){
				$sum+=$r->top_cash;
				$sum_network1[$r->network]=$r->top_cash;
				$sum_network2[$r->network]=$r->top_balance;
				$line.=sprintf('{sales:%s,year:\'%s\'},',$r->top_cash,$this->network[$r->network]);
			}
		}else{
			$line.=' ';
		}
		$a=explode('-',$month);
		$j=cal_days_in_month(CAL_GREGORIAN,$a[1],$a[0]);
		$line2='[';
		$line3='[';
		for($i=1;$i<=$j;$i++){	
		$qq=$this->db->query(sprintf('SELECT SUM(`money`) as money FROM `topup_bank_transfer` WHERE `from_type`!=5 AND `check`=1 AND `status`=1 AND DATE(`regis_date`)=\'%s-%02d\'',$month,$i));
		$rr = $qq->row();
		$line3 .= sprintf('{sales:%01.2f,year:\'%d\'},',$rr->money,$i);
		$qq=$this->db->query(sprintf('SELECT SUM(`cash`) as top_cash FROM `topup_truncate` WHERE `network`!=80 AND `send_ok`=1 AND `cancel_ok`=0 AND DATE(`regis_date`)=\'%s-%02d\'',$month,$i));
		$rr = $qq->row();
		$line2 .= sprintf('{sales:%01.2f,year:\'%d\'},',$rr->top_cash,$i);
		}
		$month_array = array();
		for($i=0;$i<=7;$i++){
			$month_array[(string)date('Y-m',strtotime(date('Y-m')." -$i month"))]=(string)date('m-Y',strtotime(date('Y-m')." -$i month"));
		}
		$data['content_view']='topup/report_month';
		$data['content_data']=array(
				'q'				=> $q,
				'month'			=> $month,
				'month_array'	=> $month_array,
				'sum_network1'	=> $sum_network1,
				'sum_network2'	=> $sum_network2,
				'json_network'	=> substr($line,0,-1).']',
				'json_day'		=> substr($line2,0,-1).']',
				'json_bank'		=> substr($line3,0,-1).']'
		);
		$this->load->view('index',$data);
	}
	#รายงานผลทั้งหมด
	public function report_total()
	{
$this->load->model('topup_model');
date_default_timezone_set("Asia/Bangkok");
$current = date('Y-m');
		$this->db->select('A.company_id,A.user,A.FromTime,A.TotalBet as total_bet,A.RollingAmount as AviliableBet,A.Count as total_BetNumber,A.WinLost as total_winloss,B.name');
		//$this->db->where('DATE_FORMAT(`TotalTime`,\'%Y-%m\')','\''.date('Y-m-d').'\'');
        $this->db->where('DATE_FORMAT(`A`.`FromTime`,\'%Y-%m\')','\''.$current.'\'',false);
		//$this->db->where('TotalTime','2019-12-01');
		$this->db->group_by('A.company_id');
		$this->db->order_by('total_bet','DESC');
		$this->db->from($this->config->item('system_rolling').' A');
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
	    $this->db->join($this->config->item('system_winloss').' C','A.user=C.user');
	//	$this->db->where('DATE_FORMAT(`A`.`FromTime`,\'%Y-%m\')','\''.$current.'\'',false);
		$this->db->where('DATE_FORMAT(`C`.`PayoutTime`,\'%Y-%m-%d\')','\''.date('Y-m-d').'\'',false);
		$q=$this->db->get();
		
		//echo $this->db->last_query();
		
		$data['content_data']=array('q'=>$q);
		$data['content_view']='report/report_total';
		$this->load->view('index',$data);
	}
#ยอดเมื่อวานนี้
	public function report_yesterday()
	{ 
$this->load->model('topup_model');
		$yesterday = date("Y-m-d",strtotime("yesterday"));

		$this->db->select('A.company_id,A.user,A.TotalBet as total_bet,A.RollingAmount as AviliableBet,A.Count as total_BetNumber,A.WinLost as total_winloss');
		$this->db->group_by('A.company_id');
		$this->db->order_by('total_bet','DESC');
		$this->db->from($this->config->item('system_rolling').' A');
	    $this->db->join($this->config->item('system_winloss').' C','A.user=C.user');
		$this->db->where('DATE_FORMAT(`C`.`PayoutTime`,\'%Y-%m-%d\')','\''.$yesterday.'\'',false);
		$q=$this->db->get();
		
		//echo $this->db->last_query();
		
		$data['content_data']=array('q'=>$q);
		$data['content_view']='report/report_yesterday';
		$this->load->view('index',$data);
	}
	public function report_week()
	{ 
$date = date('Y-m-d');
$custom_date = strtotime( date('Y-m-d', strtotime($date)) ); 
$week_start = date('Y-m-d', strtotime('this week monday', $custom_date));
$week_end = date('Y-m-d', strtotime('this week sunday', $custom_date));

		$this->db->select('A.user,A.TotalBet as total_bet,A.RollingAmount as AviliableBet,A.Count as total_BetNumber,A.WinLost as total_winloss');
		$this->db->group_by('A.company_id');
		$this->db->order_by('total_bet','DESC');
		$this->db->from($this->config->item('system_rolling').' A');
	    $this->db->join($this->config->item('system_winloss').' C','A.user=C.user');
		//$this->db->where('DATE_FORMAT(`C`.`PayoutTime`,\'%Y-%m-%d\')','\''.$yesterday.'\'',false);
$array = array('PayoutTime >=' => $week_start, 'PayoutTime <=' => $week_end);
$this->db->where($array);
		$q=$this->db->get();
		
		//echo $this->db->last_query();
		
		$data['content_data']=array('q'=>$q);
		$data['content_view']='report/report_total';
		$this->load->view('index',$data);
	}	
	public function report_mounth()
	{ 
$date = date('Y-m');

		$this->db->select('A.user,A.TotalBet as total_bet,A.RollingAmount as AviliableBet,A.Count as total_BetNumber,A.WinLost as total_winloss');
		$this->db->group_by('A.company_id');
		$this->db->order_by('total_bet','DESC');
		$this->db->from($this->config->item('system_rolling').' A');
	    $this->db->join($this->config->item('system_winloss').' C','A.user=C.user');
		$this->db->where('DATE_FORMAT(`C`.`PayoutTime`,\'%Y-%m\')','\''.$date.'\'',false);
		$q=$this->db->get();
		
		//echo $this->db->last_query();
		
		$data['content_data']=array('q'=>$q);
		$data['content_view']='report/report_total';
		$this->load->view('index',$data);
	}	
	
	public function test(){
$date = date('Y-m-d');
$custom_date = strtotime( date('Y-m-d', strtotime($date)) ); 
$week_start = date('Y-m-d 00:00:00', strtotime('this week monday', $custom_date));
$week_end = date('Y-m-d 23:59:59', strtotime('sunday this week', $custom_date));
echo '<br>Start: '. $week_start;
echo '<br>End: '. $week_end;
	}
	public function user(){
		$data['content_view']='report/user';
		$this->load->view('index',$data);
	}
	public function users(){
$this->load->library('des');
#code
#error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);
date_default_timezone_set("Asia/Bangkok");
$date2 = date('Y-m-d');
$yesterday = date("Y-m-d",strtotime("yesterday"));
$today = date("Y-m-d",strtotime("today"));
if($this->input->post('thisweek')) {
$custom_date = strtotime( date('d-m-Y', strtotime($date2)) ); 
$week_start = date('Y-m-d', strtotime('this week monday', $custom_date));
$week_end = date('Y-m-d', strtotime('this week sunday', $custom_date));
$username = $this->input->post('company');
$FromTime = $week_start.' 00:00:00';
$ToTime = $week_end.' 23:59:59';
echo 'Report From สัปดาห์นี้ '.$week_start.' 00:00:00 - '.$week_end.' 23:59:59';

}elseif($this->input->post('thismounth')) {
$custom_date = strtotime( date('d-m-Y', strtotime($date2)) ); 
$week_start = date('Y-m-d', strtotime('last week monday', $custom_date));
$week_end = date('Y-m-d', strtotime('last week sunday', $custom_date));
$username = $this->input->post('company');
$FromTime = $week_start.' 00:00:00';
$ToTime = $week_end.' 23:59:59';
echo 'Report From '.$week_start.' 00:00:00 - '.$week_end.' 23:59:59';

}elseif($this->input->post('today')) {
$username = $this->input->post('company');
$FromTime = $today.' 00:00:00';
$ToTime = $today.' 23:59:59';
echo 'Report From วันนี้ '.$today.' 00:00:00 - '.$today.' 23:59:59';

}elseif($this->input->post('yesterday')) {
$username = $this->input->post('company');
$FromTime = $yesterday.' 00:00:00';
$ToTime = $yesterday.' 23:59:59';
echo 'Report From เมื่อวานนี้ '.$yesterday.' 00:00:00 - '.$yesterday.' 23:59:59';

}else if($this->input->post('FromTime')) {
echo 'Report From ช่วงเวลา '.$this->input->post('FromTime').' 00:00:00 - '.$this->input->post('ToTime').' 23:59:59';
$username = $this->input->post('company');
$FromTime = $this->input->post('FromTime').' 00:00:00';
$ToTime = $this->input->post('ToTime').' 23:59:59';
}else{
$month=date('Y-m');#เดือนปัจจุบัน
$this->db->where('DATE_FORMAT(`TotalTime`,\'%Y-%m\')','\''.$month.'\'',false);
$this->db->where('user',$this->uri->segment(3));
$q=$this->db->get($this->config->item('system_rolling'));
$r=$q->row();
$username = $this->uri->segment(3);
$date_5 = date('Y-m-d', strtotime("-7 days"));
$FromTime = $date_5.' 00:00:00';
$ToTime = $r->ToTime;
echo 	'Report From ล่าสุด '.$FromTime.' - '.$ToTime;
}
$date = date("Ymdhis");
//$str = "method=GetAllBetDetailsForTimeIntervalDV&Key=53A95905C7594A49AFC94A4532E4FE7A&Time=".$date."&Username=".$username."&FromTime=".$FromTime."&ToTime=".$ToTime.""; // for example
$str = "method=GetUserBetItemDV&Key=53A95905C7594A49AFC94A4532E4FE7A&Time=".$date."&Username=".$username."&FromTime=".$FromTime."&ToTime=".$ToTime."&Offset=0"; // for example
$key = 'g9G16nTs'; // for example
$crypt = new DES($key);
$mstr = $crypt->encrypt($str);
$urlemstr = urlencode($mstr);

$md5key = "GgaIMaiNNtg"; // for example
$Time = "".$date.""; // for example
$SecretKey = "53A95905C7594A49AFC94A4532E4FE7A"; // for example
$PreMD5Str = $str . $md5key . $Time . $SecretKey;
$OutMD5 = md5($PreMD5Str);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://api.sa-rpt.net/api/api.aspx");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "q=".$urlemstr."&s=".$OutMD5);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//$server_output = curl_exec ($ch);
//$shop=json(curl_exec($ch),true);
//print_r($response);
$data = curl_exec($ch);
curl_close($ch);
$response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $data);
$xml = new \SimpleXMLElement($data);
$shop = json_decode(json_encode((array)$xml), TRUE);


/*echo '<pre>';
print_r($shop);
echo '</pre>';
*/
/*REPORT*/
function build_table($array){
	// start table
	$html='<table id="zero_config" class="table table-striped table-bordered table-hover table-condensed mt-3">';
	// header row
	$html.='<tr>';
	$html.='
                        <th>Bet Time</th>
						
						<th>Type</th>
						
						<th>Bet ID</th>
						<th>Bet Type</th>
                        <th>Bet Amount</th>
                        <th>Win/Loss</th>
                        <th>Rolling Amount</th>
                        <th>Balance</th>
                        <th>Result</th>';
	/*foreach($array[0] as $key=>$value):
		$html.='<th>'.htmlspecialchars($key).'</th>';
	endforeach;*/
	$html.='</tr>';

	// data rows
	foreach($array as $key=>$value):
		$html.='<tr>';
		/*foreach($value as $key2=>$value2):
			if($key2=='Detail'):
				$html.='<td>'.$value2.'</td>';
			else:
				$html.='<td>'.htmlspecialchars($value2).'</td>';
			endif;
		endforeach;*/
if($value[ResultAmount] > 0 ):
$win = '<p class="text-success">win</p>';
$result ='<p class="text-success">'.$value[ResultAmount].'</p>';
elseif($value[ResultAmount] == 0 ):
$win = '<p class="text-primary">Cancle</p>';
$result ='<p class="text-primary">'.$value[ResultAmount].'</p>';
else:
$win = '<p class="text-danger">loss</p>';
$result ='<p class="text-danger">'.$value[ResultAmount].'</p>';
endif;
/*<td>'.$value[GameID].'</td><td>'.$value[PayoutTime].'</td>*/
$html.='<td>'.date("Y-m-d H:i:s",strtotime(str_replace('T'," ", $value[BetTime]))).'</td>
<td>'.$value[GameType].'</td><td>'.$value[BetID].'</td><td>'.$value[BetType].'</td><td>'.$value[BetAmount].'</td><td>'.$result.'</td><td>'.$value[Rolling].'</td><td>'.$value[Balance].'</td><td>'.$win.'</td>
';
		$html .= '</tr>';

	endforeach;
	// finish table and return it
	$html .= '</table>';
	return $html;
}

$arrForTable=$shop['UserBetItemList']['UserBetItem'];
 rsort($arrForTable);
foreach($arrForTable as $key=>$value):
	unset($arrForTable[$key]['Detail']);
	unset($arrForTable[$key]['TransactionID']);
	unset($arrForTable[$key]['State']);
	unset($arrForTable[$key]['BetSource']);
//	unset($arrForTable[$key]['BetType']);
endforeach;

#end report
$table = build_table($arrForTable);
echo $table;	



/*REPORT*/

	}
}
?>