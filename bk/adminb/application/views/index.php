<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>items/template/assets/images/favicon.png">
    <title>ระบบจัดการผู้ดูเเลระบบ</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>items/template/dist/css/style.min.css" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>items/template/assets/extra-libs/multicheck/multicheck.css">
	<link href="<?php echo base_url(); ?>items/template/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>items/template/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
   
   <!--page win/loss user-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>items/template/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>items/template/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   
   <!-- Glow -->
	<link href="<?php echo base_url(); ?>items/growl/stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />

<!--scrip-->
	<script>var base_url='<?php echo base_url(); ?>',site_url='<?php echo site_url(); ?>';</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>items/code/jquery211.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>items/code/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>items/code/validate.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
<?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper h550">

          <?php 
	if(isset($content_view)&&!isset($content_data)){$this->load->view($content_view);}
	if(isset($content_view)&&isset($content_data)){foreach($content_data as $key=>$value){$data[$key]=$value;}$this->load->view($content_view,$data);} 
?>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved. Designed and Developed by Divth
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- Bootstrap tether Core JavaScript -->
	   <script src="<?php echo base_url(); ?>items/template/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>items/template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
	    <script src="<?php echo base_url(); ?>items/template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>items/template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>items/template/assets/extra-libs/sparkline/sparkline.js"></script>
   <!--GLOW Popup -->
<script src="<?php echo base_url(); ?>items/growl/javascripts/jquery.growl.js" type="text/javascript"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>items/template/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>items/template/dist/js/sidebarmenu.js"></script>

    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>items/template/dist/js/custom.min.js"></script>
	    <!-- this page js -->
    <script src="<?php echo base_url(); ?>items/template/assets/libs/toastr/build/toastr.min.js"></script>
 <script src="<?php echo base_url(); ?>items/template/assets/extra-libs/DataTables/datatables.min.js"></script>
<!--notificate-->
 <script src="<?php echo base_url(); ?>items/scripts/NotificationAjax.js"></script>
<!---page Win loss--->

 <script src="<?php echo base_url(); ?>items/template/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>

        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#FromTime').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#ToTime').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>