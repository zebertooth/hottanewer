<?php
class With_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'system_withdraw';
        // Set orderable column fields
        $this->column_order = array('with_id','date_tran','name_with','bank_deposit','bank_id','money','user','status');
        // Set searchable column fields
        $this->column_search = array('money','user','date_tran');
        // Set default order
        $this->order = array('with_id' => 'desc');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData,$manage){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        if($manage=='today'){
		$date=date('Y-m-d');
		$this->db->where('date_withdraw',$date);
		$this->db->where('status','1');
		}elseif($manage=='yesterday'){
		$date = date("Y-m-d",strtotime("yesterday"));
		$this->db->where('date_withdraw',$date);
		$this->db->where('status','1');
		}elseif($manage=='mounth'){
		$this->db->where('MONTH(date_withdraw)', date('m'));
	    $this->db->where('YEAR(date_withdraw)', date('Y'));
		$this->db->where('status','1');
		}elseif($manage=='week'){
$custom_date = strtotime( date('d-m-Y', strtotime(date('Y-m-d'))) ); 
$week_start = date('Y-m-d', strtotime('this week last monday', $custom_date));
$week_end = date('Y-m-d', strtotime('this week next sunday', $custom_date));
	$this->db->where('date_withdraw >=', $week_start);
	$this->db->where('date_withdraw <=', $week_end);
	$this->db->where('status','1');
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
        $this->_get_datatables_query($postData);
               if($manage=='today'){
		$date=date('Y-m-d');
		$this->db->where('date_withdraw',$date);
		$this->db->where('status','1');
		}elseif($manage=='yesterday'){
		$date = date("Y-m-d",strtotime("yesterday"));
		$this->db->where('date_withdraw',$date);
		$this->db->where('status','1');
		}elseif($manage=='mounth'){
		$this->db->where('MONTH(date_withdraw)', date('m'));
	    $this->db->where('YEAR(date_withdraw)', date('Y'));
		$this->db->where('status','1');
		}elseif($manage=='week'){
	$custom_date = strtotime( date('d-m-Y', strtotime(date('Y-m-d'))) ); 
	$week_start = date('Y-m-d', strtotime('this week last monday', $custom_date));
	$week_end = date('Y-m-d', strtotime('this week next sunday', $custom_date));
	$this->db->where('date_withdraw >=', $week_start);
	$this->db->where('date_withdraw <=', $week_end);
	$this->db->where('status','1');
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
              $this->db->like("user", $_POST["search"]["value"]);  
              //$this->db->or_like("name_with", $_POST["search"]["value"]);  
              //$this->db->or_like("date_deposit", $_POST["search"]["value"]);  
               // $this->db->or_like("amount", $_POST["search"]["value"]);  
               // $this->db->or_like("from_bank", $_POST["search"]["value"]);  
               //$this->db->or_like("to_bank", $_POST["search"]["value"]); 
               //$this->db->or_like("status", $_POST["search"]["value"]); 
           }  
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}