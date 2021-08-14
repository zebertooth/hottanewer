<?php
class Smsdata_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'system_smsdata';
        // Set orderable column fields
        $this->column_order = array('id', 'from','message','dateRecieve','status');
        // Set searchable column fields
        $this->column_search = array('from','message','dateRecieve','status');
        // Set default order
        $this->order = array('id' => 'desc');
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
date_default_timezone_set("Asia/Bangkok");
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
//$this->db->where('date_deposit',date('Y-m-d'));
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
date_default_timezone_set("Asia/Bangkok");
//$this->db->where('date_deposit',date('Y-m-d'));
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
		#'from','message','dateRecieve','status'
                $this->db->like("from", $_POST["search"]["value"]);  
                $this->db->or_like("message", $_POST["search"]["value"]);  
                $this->db->or_like("dateRecieve", $_POST["search"]["value"]);  
                $this->db->or_like("status", $_POST["search"]["value"]);   
           }  
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}