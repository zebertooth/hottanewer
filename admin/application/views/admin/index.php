<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><i class=" fas fa-arrow-down"></i> ผู้ดูเเลระบบ</h4>
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


<div id="addUser">
<a href="<?php echo site_url('admin/add'); ?>" class="btn btn-secondary btn-sm ">เพิ่มข้อมูล</a> </div>

 <div class="table-responsive mt-3">

    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ID</th>
								<th>Username</th>
								<th>ชื่อ-สกุล</th>
								<th>โทรศัพท์</th>
								<th>ระดับ</th>
								<th>สถานะ</th>
								<th width="15%">ทำรายการ</th>
							  </tr>
							</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>'.$r->id.'</td>
			<td>'.$r->username.'</td>
			<td>'.$r->name.'</td>
			<td>'.$r->telephone.'</td>
			<td>'.$class[$r->user_private].'</td>
			<td>'.$active[$r->active].'</td>
			<td><button type="button" class="btn btn-secondary btn-sm view_user" name="view" value="view" id="'.$r->id.'">เเก้ไข</button> <button type="button" class="btn  btn-primary btn-sm view_data" name="view" value="view" id="'.$r->id.'">เเก้รหัสผ่าน</button>
			 <a href="'.site_url("admin/del/".$r->id."").'" class="btn btn-danger btn-sm">ลบข้อมูล</a>	
			</td>
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
//เพิ่มข้อมูลผู้ดูเเล
$( "#addUser" ).delegate( ".add_user", "click", function() {
          var users_id = $(this).attr("id");  
 $.ajax({
                        url: site_url+'/admin/add_user',
                        type: 'post',
                        data:{users_id:users_id},  
                        success: function(data){ 
// alert("The paragraph was clicked.");
                    $('#employee_detail').html(data);  
                    $('#ModalPass').modal("show");  
                        }

}); 
}); 
//เเก้ไขผู้ดูเเล
$( "table" ).delegate( ".view_user", "click", function() {
          var users_id = $(this).attr("id");  
 $.ajax({
                        url: site_url+'/admin/useredit',
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
// บันทึกข้อมูลสมาชิก
$(document).on("click", "#BtnSubmit2", function() {
	      var users_id = $("#users_id").val();
          var email = $("#email").val();
          var username = $("#username").val();
          var name = $("#name").val();
          var telephone = $("#telephone").val();
 $.ajax({
                        url: site_url+'/admin/usereditsave',
                        type: 'post',
                        data: {users_id: users_id, name: name, email: email, username: username, telephone: telephone},
                        success: function(response){ 
   $('#success').html(response);  
  $("#BtnSubmit2").attr("disabled", true);
                        }

	}); 
});   
// บันทึกข้อมูลสมาชิก
$(document).on("click", "#BtnSubmitSave", function() {
	      var users_id = $("#users_id").val();
          var email = $("#email").val();
          var password = $("#password").val();
          var username = $("#username").val();
          var name = $("#name").val();
          var telephone = $("#telephone").val();
 $.ajax({
                        url: site_url+'/admin/usersave',
                        type: 'post',
                        data: {users_id: users_id, name: name, email: email, username: username, telephone: telephone, password: password},
                        success: function(response){ 
   $('#success').html(response);  
  $("#BtnSubmitSave").attr("disabled", true);
                        }

	}); 
});   
</script>
