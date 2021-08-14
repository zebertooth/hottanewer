<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Dashboard Template · Bootstrap</title>

	<script>var base_url='<?php echo base_url(); ?>',site_url='<?php echo site_url(); ?>';</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>items/code/jquery211.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>items/code/bootstrap.min.js"></script>
  </head>
  <body>
<div class="container-fluid">
  <div class="row">

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
	if(isset($content_view)&&!isset($content_data)){$this->load->view($content_view);}
	if(isset($content_view)&&isset($content_data)){foreach($content_data as $key=>$value){$data[$key]=$value;}$this->load->view($content_view,$data);} 
?>
    </main>
  </div>
</div>
   <script src="<?php echo base_url(); ?>items/template/assets/libs/jquery/dist/jquery.min.js"></script>
		</body>
</html>
