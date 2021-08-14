<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Affiliate</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ยอดจ่ายปัจจุบัน</li>
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
  <table id="memListTable" class="display table" style="width:100%">
   <thead>
       <tr><th>รหัส</th>
            <th>รหัสสมาชิก</th>
            <th>Username</th>
            <th>วันจ่าย</th>
            <th>Rolling</th>
            <th>% จ่าย</th>
            <th>ยอด</th>
            <th>สถานะ</th>
        </tr>
    </thead>
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
            "url": "<?php echo base_url('index.php/affiliate/getHistory'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
</script>

 