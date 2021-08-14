<?php
$net=$this->uri->segment(4);
 $query = $this->db->query("SELECT * FROM images2 WHERE id < '".$net."' ORDER BY id DESC LIMIT 60");
$json = include('data.php');
//echo json_encode($json);
?>