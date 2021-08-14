<?php
class Winner_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'system_company';
        // Set orderable column fields
        $this->column_order = array(null, 'username','name','telephone','account','cash_online','regis_date','active');
        // Set searchable column fields
        $this->column_search = array('username','name','telephone','account','cash_online','regis_date','active');
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
            $this->db->limit($postData['length'], $postData['start']);
$this->db->where('mClass','0');
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
$this->db->where('mClass','0');
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
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("name", $_POST["search"]["value"]);  
                $this->db->or_like("telephone", $_POST["search"]["value"]);  
                $this->db->or_like("account", $_POST["search"]["value"]);  
                $this->db->or_like("cash_online", $_POST["search"]["value"]);  
           }  
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}