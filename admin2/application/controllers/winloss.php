<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Winloss extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

	#---winloss----#
		public function user(){

		$this->load->library('pagination');
		$per_page=50;
		
		
		$this->db->order_by('id','DESC');
		$this->db->limit($per_page,($this->uri->segment(3)?($this->uri->segment(3)*$per_page)-$per_page:0));
		//$this->db->join($this->config->item('system_province').' B','A.province=B.province_id','LEFT');
		$q=$this->db->get($this->config->item('system_winloss'));
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = site_url('winloss/user/');
		$config['total_rows'] = $this->db->count_all_results($this->config->item('system_winloss'));
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config); 
		
		$data['content_data']=array('q'=>$q,'pagination'=>$this->pagination->create_links());
		$data['content_view']='winloss/user';
		$this->load->view('index',$data);
	}
	#--end winloss--#
public function index(){

		$this->load->library('pagination');
		$per_page=50;
		
		
		$this->db->order_by('id','DESC');
		$this->db->limit($per_page,($this->uri->segment(3)?($this->uri->segment(3)*$per_page)-$per_page:0));
		//$this->db->join($this->config->item('system_province').' B','A.province=B.province_id','LEFT');
		$q=$this->db->get($this->config->item('system_winloss'));
		$config['use_page_numbers'] = TRUE;
		$config['base_url'] = site_url('winloss/index/');
		$config['total_rows'] = $this->db->count_all_results($this->config->item('system_winloss'));
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config); 
		
		$data['content_data']=array('q'=>$q,'pagination'=>$this->pagination->create_links());
		$data['content_view']='winloss/index';
		$this->load->view('index',$data);
	}
	#user End
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
	
}
?>