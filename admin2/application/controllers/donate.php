<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Donate extends CI_Controller{
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
		$this->db->order_by('id','ASC');
		$this->db->limit($perpage,($this->uri->segment(3)?$this->uri->segment(3):0));
		$q = $this->db->get($this->config->item('system_donate'));
		$this->db->where('(status = 1)');
		$rows = $this->db->count_all_results($this->config->item('system_donate'));
		$config['base_url'] = site_url('donate/index/');
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config); 
		
		$data['content_view'] = 'donate/index';
		$data['content_data'] = array(
				'q'				=>$q,
			     'row'=>$rows,
				'status'=>$this->config->item('status'),
				'pagination'	=>$this->pagination->create_links()
		);
		$this->load->view('index',$data);
	
	}
		public function donate_edit()
	{

$data['content_view']='donate/donate_edit';
$this->load->view('index',$data);

	}
public function donatedit_complete()
	{
			$data=array(
				'name'	=> $this->input->post('name'),
				'detail'	=> $this->input->post('detail'),
				'cover'	=> $this->input->post('ImgMain')
			);
$this->db->where('id',$this->input->post('id'));
$this->db->update($this->config->item('system_donate'), $data);
redirect(site_url('donate'),'refresh');
    }	
}
?>