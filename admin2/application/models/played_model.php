<?php
class Played_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'system_winloss';
        // Set orderable column fields
        $this->column_order = array('id', 'user','GameID','Winloss','BetAmount','balance','PayoutTime','gametype','txnid','comment','Result');
        // Set searchable column fields
        $this->column_search = array('id', 'user','GameID','WinLoss','BetAmount','balance','PayoutTime','gametype','txnid','comment','Result');
        // Set default order
        $this->order = array('id' => 'desc');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData,$manage){
date_default_timezone_set("Asia/Bangkok");
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
if($manage=='today'){
		//$date=date('Y-m-d');
		//$this->db->where('date_deposit',$date);
 // $this->db->like('CompletedDate', date('Y-m'));
	      $this->db->where('MONTH(PayoutTime)', date('m'));
	    $this->db->where('YEAR(PayoutTime)', date('Y'));
		//$this->db->or_where('Result','0');
		}
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
    public function countFiltered($postData,$manage){
    date_default_timezone_set("Asia/Bangkok");
        $this->_get_datatables_query($postData);
               if($manage=='today'){
	    $this->db->where('MONTH(PayoutTime)', date('m'));
	    $this->db->where('YEAR(PayoutTime)', date('Y'));
//$this->db->or_where('Result','0');
		}
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
               /* $this->db->like("bank_type", $_POST["search"]["value"]);  
                $this->db->or_like("time_deposit", $_POST["search"]["value"]);  
                $this->db->or_like("amount", $_POST["search"]["value"]);  
                $this->db->or_like("from_bank", $_POST["search"]["value"]);  
               $this->db->or_like("to_bank", $_POST["search"]["value"]); */
               $this->db->like("user", $_POST["search"]["value"]); 
           }  
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}