

          <?php 
	if(isset($content_view)&&!isset($content_data)){$this->load->view($content_view);}
	if(isset($content_view)&&isset($content_data)){foreach($content_data as $key=>$value){$data[$key]=$value;}$this->load->view($content_view,$data);} 
?>
  