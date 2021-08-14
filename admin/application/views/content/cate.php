<?php $query = $this->db->query("select * from system_category");

foreach ($query->result() as $Crow){
echo'<option value="'.site_url('gallery/category/'.$Crow->id.''')">'.$Crow->name.'</option>';
}
?>
dddddd