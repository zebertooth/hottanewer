<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ผู้ดูเเลระบบ</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ผูดูเเลระบบ</li>
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
 <div class="card">
                            <div class="card-body">


                                    <h5 class="card-title">ผู้ดูเเลระบบ</h5>

 <div class="table-responsive mt-3">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ID</th>
								<th>Username</th>
								<th>โทรศัพท์</th>
								<th>ระดับ</th>
								<th>สถานะ</th>
								<th>ตัวเลือก</th>
							  </tr>
							</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>'.$r->id.'</td>
			<td>'.$r->username.'</td>
			<td>'.$r->telephone.'</td>
			<td>'.$class[$r->user_private].'</td>
			<td>'.$active[$r->active].'</td>
			<td><button type="button" class="btn btn-success btn-sm view_data" name="view" value="view" id="'.$r->id.'">เเก้รหัสผ่าน</button></td>
</tr>';
		}
		?>


        </tbody>
        </table>
		</div>
    </div>
</div>
</div>

							
       <div class="modal fade" id="ModalPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="employee_detail">
                                             <!----->

											 <!----->
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->			
<script type='text/javascript'>
// เเก้ไขรหัสผ่านสมาชิก
$(document).on("click", ".pwgenerate", function() {
var id = 1;
 $.ajax({
                        url: site_url+'/customers/generate',
                        type: 'post',
                        data: {id: id},
                        success: function(response){ 
 //alert("The paragraph was clicked.");
 $('#password').val(response); 
                        }

}); 
});           
// เรียก Modal
$( "table" ).delegate( ".view_data", "click", function() {
          var users_id = $(this).attr("id");  
 $.ajax({
                        url: site_url+'/admin/pwedit',
                        type: 'post',
                        data:{users_id:users_id},  
                        success: function(data){ 
// alert("The paragraph was clicked.");
                    $('#employee_detail').html(data);  
                    $('#ModalPass').modal("show");  
                        }

}); 
}); 
// สร้างรหัสผ่าน
$(document).on("click", "#BtnSubmit", function() {
	      var users_id = $("#users_id").val();
          var password = $("#password").val();
 $.ajax({
                        url: site_url+'/admin/pwsave',
                        type: 'post',
                        data: {users_id: users_id, password: password},
                        success: function(response){ 
   $('#success').html(response);  
  $("#BtnSubmit").attr("disabled", true);
                        }

	}); 
});   
</script>
