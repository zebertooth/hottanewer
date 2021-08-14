<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Organize extends CI_Controller{
		function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
#oftion stament reply		(เสริม ถ้ามี .etc )		
	}

public function index()
	{
        $perpage = '20';
	    $this->db->where('(status = 1)');
		$this->db->order_by('orderID','ASC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_org'));
		$this->db->where('(status = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_org'));
		$config['base_url'] = site_url('organize/index/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'organize/index';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
		public function add()
	{

$data['content_view']='organize/add';
$this->load->view('index',$data);

	}
		public function org_edit()
	{

$data['content_view']='organize/org_edit';
$this->load->view('index',$data);

	}
public function complete()
	{
		if($this->input->post('process')=='1'){
			$data=array(
	'name'	=> $this->input->post('name'),
				'name2'	=> $this->input->post('name2'),
				'name3'	=> $this->input->post('name3'),
				'pic1'	=> $this->input->post('pic1'),
				'pic2'	=> $this->input->post('pic2'),
				'pic3'	=> $this->input->post('pic3'),
				'orderID'	=> $this->input->post('orderID'),
				'detail'	=> $this->input->post('detail'),
				'position'	=> $this->input->post('position'),
				'position2'	=> $this->input->post('position2'),
				'position3'	=> $this->input->post('position3'),
				'show1'	=> $this->input->post('show1'),
				'show2'	=> $this->input->post('show2'),
				'show3'	=> $this->input->post('show3'),
				'status'	=> $this->input->post('status')
			);
			$this->db->insert($this->config->item('system_org'),$data);
		redirect(site_url('organize'),'refresh');
		}
}
public function orgedit_complete()
	{
			$data=array(
				'name'	=> $this->input->post('name'),
				'name2'	=> $this->input->post('name2'),
				'name3'	=> $this->input->post('name3'),
				'pic1'	=> $this->input->post('pic1'),
				'pic2'	=> $this->input->post('pic2'),
				'pic3'	=> $this->input->post('pic3'),
				'orderID'	=> $this->input->post('orderID'),
				'detail'	=> $this->input->post('detail'),
				'position'	=> $this->input->post('position'),
				'position2'	=> $this->input->post('position2'),
				'position3'	=> $this->input->post('position3'),
				'show1'	=> $this->input->post('show1'),
				'show2'	=> $this->input->post('show2'),
				'show3'	=> $this->input->post('show3'),
				'status'	=> $this->input->post('status')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_org'), $data);
redirect(site_url('organize'),'refresh');
}
	public function delete()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete($this->config->item('system_org'));
		redirect(site_url('organize'),'refresh');
	}
}
?>