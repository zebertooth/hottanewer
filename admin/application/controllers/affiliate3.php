<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Affiliate extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ref_model');
		if(!$this->session->userdata('usernane')){
			redirect(site_url('users/login'),'refresh');
			die();
		}
		
	}

	public function index()
	{
        // Load the member list view
		$data['content_view']='affiliate/index';
		$this->load->view('index',$data);
	}

/*start----------------------*/
	public function getLists(){
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->ref_model->getRows($_POST);
        
        $i = $_POST['start'];
		$total_order = 0;
        foreach($memData as $member){
          //  $i++;
		$sum_AviliableBet=$member->AviliableBet/$this->ref_model->countAll();
		$sum_SumTotalBet=$member->SumTotalBet/$this->ref_model->countAll();
		$sum_SumWinlost=$member->SumWinlost/$this->ref_model->countAll();
		$pay_percent = $sum_AviliableBet*$member->aff_pay/100;
		$total_order = $total_order + floatval($pay_percent);
		$tool ='xxxx';
		//$sum_percent+=$member->AviliableBet*$member->aff_pay/100;
           // $created = date( 'D j M Y', strtotime($member->dateRecieve));
            //$status = ($member->status == 1)?'<span class="badge badge-success">Success</span>':'<span class="badge badge-warning">Wait</span>';
            $data[] = array($member->id, $member->username, $member->name,$sum_SumTotalBet, $sum_SumWinlost, $sum_AviliableBet, $member->aff_pay, $pay_percent,$tool);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ref_model->countAll(),
            "recordsFiltered" => $this->ref_model->countFiltered($_POST),
            'total'    => number_format($total_order, 2),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
	
}
?>