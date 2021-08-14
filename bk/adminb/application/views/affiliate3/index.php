<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Affiliate ประจำเดือน <?php echo date('Y-m-d');?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">พันธมิตร</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
<div class="container-fluid">
<div class="row">
	<div class="col-12">
                        <div class="card">
                            <div class="card-body">
 <div class="table-responsive">
  <table id="memListTable" class="display table table-striped table-bordered table-hover table-condensed" style="width:100%">
   <thead>
       <tr>
	   <th>id</th>
            <th>Username</th>
            <th>ชื่อ</th>
            <th>TotalBet</th>
            <th>Winlost</th>
            <th>Rolling</th>
            <th>Pay</th>
            <th>Total</th>
            <th>ทำรายการ</th>
        </tr>
    </thead>
<tfoot>
      <tr>
       <th colspan="7">Total</th>
  <th></th> 
    <th id="total_order"></th> 
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
        pageLength: 10,
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('index.php/affiliate/getLists'); ?>",
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

 