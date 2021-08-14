<?php
class Ref_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'system_rolling';
        // Set orderable column fields
        $this->column_order = array(null, 'username','name','SumTotalBet','SumWinlost','AviliableBet','aff_pay','aff_pay','aff_pay');
        // Set searchable column fields
        $this->column_search = array('username');
        // Set default order
        $this->order = array('id' => 'desc');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
        $month=date('Y-m');
            $this->db->limit($postData['length'], $postData['start']);
/*---START-----------*/
		$this->db->select('B.id,B.name,B.username,B.aff_pay,SUM(C.RollingAmount) as AviliableBet,SUM(C.Winlost) as SumWinlost,SUM(C.TotalBet) as SumTotalBet');
	   // $this->db->where('B.g_id','A.company_id');
		$this->db->where('DATE_FORMAT(`C`.`TotalTime`,\'%Y-%m\')','\''.$month.'\'',false);
		$this->db->group_by('B.id');
		//$this->db->order_by('C.id','ASC');
		//$this->db->from($this->config->item('system_affiliate').' A');
		$this->db->from($this->config->item('system_company').' B');
		$this->db->join($this->config->item('system_rolling').' C','B.id=C.ref_id');
/*---END-----------*/
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
		$month=date('Y-m');
			$this->db->select('B.id,B.name,B.username,B.aff_pay,SUM(C.RollingAmount) as AviliableBet,SUM(C.Winlost) as SumWinlost,SUM(C.TotalBet) as SumTotalBet');
	   // $this->db->where('B.g_id','A.company_id');
		$this->db->where('DATE_FORMAT(`C`.`TotalTime`,\'%Y-%m\')','\''.$month.'\'',false);
		$this->db->group_by('B.id');
		//$this->db->order_by('C.id','ASC');
	//	$this->db->from($this->config->item('system_affiliate').' A');
		$this->db->from($this->config->item('system_company').' B');
		$this->db->join($this->config->item('system_rolling').' C','B.id=C.ref_id');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
         
        $this->db->from($this->table);
 
		     if(isset($_POST["search"]["value"]))  
           {  
		#'message','dateRecieve','bank_type','time_deposit','amount','from_bank','to_bank,status'
                $this->db->like("username", $_POST["search"]["value"]);  
               // $this->db->or_like("time_deposit", $_POST["search"]["value"]);  
               // $this->db->or_like("amount", $_POST["search"]["value"]);  
               // $this->db->or_like("from_bank", $_POST["search"]["value"]);  
               //$this->db->or_like("to_bank", $_POST["search"]["value"]); 
              // $this->db->or_like("status", $_POST["search"]["value"]); 
           }  
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}