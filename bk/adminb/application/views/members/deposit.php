<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">รายงานฝากเงิน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายงานฝากเงิน</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
<div class="row">
<?php
/*
$month = date('m');
$year = date('Y');

$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);

$end_time = strtotime("+1 month", $start_time);

for($i=$start_time; $i<$end_time; $i+=86400)
{
   $list[] = date('Y-m-d', $i);
}

print_r($list);*/
?>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><?php echo number_format($this->total_ew,2); ?></h1>
                                <h6 class="text-white">Deposit</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><?php echo number_format($this->total_withdraw,2); ?></h1>
                                <h6 class="text-white">Withdraw</h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><?php echo number_format($this->income,2); ?></h1>
                                <h6 class="text-white">income</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
                </div>
<div class="row">
	<div class="col-12">
                        <div class="card">
                            <div class="card-body">
<div class="col-12 mb-2">
    <a href="<?php echo site_url('credit/deposit/yesterday'); ?>" class="btn btn-info">เมื่อวานนี้</a>
  <a href="<?php echo site_url('credit/deposit/today'); ?>" class="btn btn-info">วันนี้</a>
  <a href="<?php echo site_url('credit/deposit/week'); ?>" class="btn btn-info">สัปดาห์นี้</a>
  <a href="<?php echo site_url('credit/deposit/mounth'); ?>" class="btn btn-info">เดือนนี้</a>
 </div>
 <div class="table-responsive">
  <table id="memListTable" class="display table table-striped table-bordered table-hover table-condensed" style="width:100%">
   <thead>
       <tr>
	   <th>id</th>
            <th>วันที่</th>
            <th>ชื่อ</th>
            <th>ธนาคาร</th>
            <th>จำนวน</th>
            <th>user</th>
             <th>สถานะ</th>           
        </tr>
    </thead>
<tfoot>
      <tr>
       <th colspan="4">Total</th>
       <th id="total_order"></th>
	    <th></th>  <th></th> 
      </tr>
     </tfoot>
</table></div></div>
		</div>

    </div>
</div>
</div>

		
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Loading Content
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->		
<script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        pageLength: 25,
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('index.php/credit/getLists/'.$this->uri->segment(3).''); ?>",
            "type": "POST"
        },
    drawCallback:function(settings)
    {
     $('#total_order').html(settings.json.total);
    },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
</script>

 