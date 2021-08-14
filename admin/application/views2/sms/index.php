       <div class="container-fluid">
<div class="row">
	<div class="col-12">
                        <div class="card">
                            <div class="card-body">
<a class="btn btn-primary" href="<?php echo base_url(); ?>sms">เครดิต sms อัตโนมัติ</a>
<a class="btn btn-secondary" href="<?php echo base_url(); ?>sms/smsdata">ข้อความเข้า</a>
 <div class="table-responsive mt-3">
  <table id="memListTable" class="display table" style="width:100%">
   <thead>
       <tr><th>id</th>

            <th>ข้อความ</th>
            <th width="15%">รหัสบัญชีอัตโนมัติ</th>
            <th>เวลา</th>
            <th>จำนวน</th>
            <th>จาก</th>
            <th>ถึง</th>
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
            "url": "<?php echo base_url('index.php/sms/getLists'); ?>",
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

 