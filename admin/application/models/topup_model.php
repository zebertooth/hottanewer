<?php 
date_default_timezone_set("Asia/Bangkok");
class Topup_model extends CI_Model{
	function getCom() {
		$this->load->database();
		$q = $this->db->query("select *,SUM(commission) as Total from system_company");
		$r = $q->row();
		return $r->Total;
	}
	function wheel($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(amount) as Totalwheel from system_wheel where month(dateGen) = '".date('m')."' and year(dateGen) = '".date('Y')."' and company_id = $user");
		$r = $q->row();
		return $r->Totalwheel;
	}
	function promotion($date) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(amount) as Total from system_promo where date_promo = '".$date."'");
		$r = $q->row();
		return $r->Total;
	}
	function wheel_indate($date) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(amount) as Totalwheel from system_wheel where dateGen = '".$date."'");
		$r = $q->row();
		return $r->Totalwheel;
	}
	function SumDeposit($date) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_deposit where date_deposit = '".$date."' and status = 1");
		$r = $q->row();
		return $r->Total;
	}
	function SumWithdraw($date) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where date_withdraw = '".$date."' and status = 1");
		$r = $q->row();
		return $r->Total;
	}
	function get_cash($user)
	{
			$this->db->select('cash_online');
			$this->db->where('id',$user);
			$q=$this->db->get($this->config->item('system_company'));
			$r=$q->row();
			return $r->cash_online;

	}
	function get_promotion($user)
	{
			$this->db->select('promotion');
			$this->db->where('id',$user);
			$q=$this->db->get($this->config->item('system_company'));
			$r=$q->row();
			return $r->promotion;

	}
	function getPerson_regis($date) {
		$this->load->database();
		$q = $this->db->query("select *,count(id) as Total from system_company where date(regis_date) = '".$date."'");
		$r = $q->row();
		return $r->Total;
	}
	function getPerson_active() {
		$this->load->database();
		$q = $this->db->query("select *,count(id) as Total from system_company");
		$r = $q->row();
		return $r->Total;
	}
	function user_active() {
		$this->load->database();
		$q = $this->db->query("select *,count(id) as Total from system_company where active = 1");
		$r = $q->row();
		return $r->Total;
	}
	function total_aff() {
		$this->load->database();
		$q = $this->db->query("select *,count(id) as Total from system_affiliate");
		$r = $q->row();
		return $r->Total;
	}
	function getonline() {
		$this->load->database();
		$q = $this->db->query("select *,count(session_id) as Total from topup_online");
		$r = $q->row();
		return $r->Total;
	}
	function getPerson_ac_month($month) {
		$this->load->database();
		$q = $this->db->query("select *,count(id) as Total from system_company where month(regis_date) = '".$month."' and year(regis_date) = '".date('Y')."' and active_abo = 'yes'");
		$r = $q->row();
		return $r->Total;
	}
		function getWithdrawall($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where status = 1 and userID = $user");
		$r = $q->row();
		return $r->Total;
	}
	function getWithdraw($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where MONTH(date_withdraw) = '".date('m')."' and YEAR(date_withdraw) = '".date('Y')."' and status = 1 and userID = $user");
		$r = $q->row();
		return $r->Total;
	}
	function getDepositall($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_deposit where status = 1 and userID = $user");
		$r = $q->row();
		return $r->Total;
	}
	function getDeposit($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_deposit where MONTH(date_deposit) = '".date('m')."' and YEAR(date_deposit) = '".date('Y')."' and status = 1 and userID = $user");
		$r = $q->row();
		return $r->Total;
	}
	function getDeposit_user($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_deposit where date(date_deposit) = '".date('Y-m-d')."' and status = 1 and userID = $user");
		$r = $q->row();
		return $r->Total;
	}
		function getWithdraw_user($user) {
		$this->load->database();
		$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where date(date_withdraw) = '".date('Y-m-d')."' and status = 1 and userID = $user");
		$r = $q->row();
		return $r->Total;
	}
	function getTotal_ew($date,$choice) {
		$this->load->database();
         if($choice=='today' OR $choice=='yesterday'){
		$q = $this->db->query("select *,SUM(money) as Total from system_deposit where date(date_deposit) = '".$date."' and status = 1");
		 }elseif($choice=='mounth'){
		$q = $this->db->query("select *,SUM(money) as Total from system_deposit where MONTH(date_deposit) = '".date('m')."' and YEAR(date_deposit) = '".date('Y')."' and status = 1");
		 }elseif($choice=='week'){

		 $q = $this->db->query("select *,SUM(money) as Total from system_deposit WHERE date_deposit BETWEEN '2019-11-18' AND '2019-11-24' and status = 1");
		 }
		$r = $q->row();
		return $r->Total;
	}
	function getTotal_withdraw($date,$choice) {
		$this->load->database();
$custom_date = strtotime( date('d-m-Y', strtotime(date('Y-m-d'))) ); 
$week_start = date('Y-m-d', strtotime('this week last monday', $custom_date));
$week_end = date('Y-m-d', strtotime('this week next sunday', $custom_date));
         if($choice=='today' OR $choice=='yesterday'){
		$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where date(date_withdraw) = '".$date."' and status = 1");
		 }elseif($choice=='mounth'){
	$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where MONTH(date_withdraw) = '".date('m')."' and YEAR(date_withdraw) = '".date('Y')."' and status = 1");
		 }elseif($choice=='week'){
	$q = $this->db->query("select *,SUM(money) as Total from system_withdraw where date_withdraw BETWEEN '".$week_start."' AND '".$week_end."' and status = 1");
		 }
		$r = $q->row();
		return $r->Total;
	}

}
?>