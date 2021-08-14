<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Server extends CI_Controller{
	
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
		
	}
	
	public function online()
	{
		$data['content_view']='server/online';
		$this->load->view('index',$data);
	}
	
	public function get_online()
	{		
		$this->db->select('A.ip_address,B.name,A.username,A.browser,A.add_activity,A.last_activity');
		$this->db->from($this->config->item('topup_online').' A');
		$this->db->join($this->config->item('system_company').' B','A.company_id=B.id');
		$this->db->order_by('A.add_activity','ASC');
		$q = $this->db->get();
		foreach($q->result() as $r){
			echo $r->ip_address.'|'.$r->name.'|'.$r->username.'|'.$r->browser.'|'.date('d H:i:s',strtotime($r->add_activity)).'|'.date('d H:i:s',strtotime($r->last_activity)).'|'.rel_time($r->add_activity,$r->last_activity).'+';
		}
	}
	
	public function optimizer()
	{
		$t = $this->db->list_tables();
		
		$data['content_view'] = 'server/optimizer';
		$data['content_data'] = array('table'=>$t);
		$this->load->view('index',$data);
	}
	
	public function check()
	{
		if($this->input->post('table')){
			$this->db->query('CHECK TABLE `'.$this->input->post('table').'`');
		}
	}
	
	public function optimize()
	{
		if($this->input->post('table')){
			$this->db->query('OPTIMIZE TABLE `'.$this->input->post('table').'`');
		}
	}
	
	public function repair()
	{
		if($this->input->post('table')){
			$this->db->query('REPAIR TABLE `'.$this->input->post('table').'`');
		}
	}
	
	public function analyze()
	{
		if($this->input->post('table')){
			$this->db->query('ANALYZE TABLE `'.$this->input->post('table').'`');
		}
	}
	
	public function logs()
	{
		if($this->uri->segment(3)){
			$now = $this->uri->segment(3);
		}else{
			$now = date('Y-m-d');
		}
		$this->db->where('DATE(`add_date`)',"'$now'",false);
		$this->db->order_by('add_date','DESC');
		$this->db->limit(500);
		$log=$this->db->get($this->config->item('topup_logs'));
		
		$date=array();
		for($i=0;$i<=31;$i++){
			$date[(string)date('Y-m-d',strtotime(date('Y-m-d')." -$i day"))]=(string)date('d-m-Y',strtotime(date('Y-m-d')." -$i day"));
		}
		
		$data['content_view'] = 'server/logs';
		$data['content_data'] = array('log'=>$log,'date'=>$date,'now'=>$now);
		$this->load->view('index',$data);
	}
	
}
?>