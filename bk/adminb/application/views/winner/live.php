<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">การตลาด</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Marketing</li>
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



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
เพิ่มข้อมมูล
</button>
 <div class="table-responsive mt-3">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ID</th>
								<th>Username</th>
								<th>ชื่อ</th>
								<th>โทรศัพท์</th>
								<th>วันที่สร้าง</th>
							    <th>เครดิต</th>
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
			<td>'.$r->name.'</td>
			<td>'.$r->telephone.'</td>
			<td>'.$r->regis_date.'</td>
			<td>'.$r->cash_online.'</td>
			<td>'.$r->active.'</td>
			<td><button type="button" class="btn btn-cyan btn-sm view_info" bid="'.$r->id.'">เเก้ไขข้อมูล</button><button type="button" class="btn btn-success btn-sm view_data" name="view" value="view" id="'.$r->id.'">รหัสผ่าน</button></td>
</tr>';
		}
		?>


        </tbody>
        </table>
		</div>
    </div>
</div>
</div>
<!----register ------->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">สมัครสมาชิก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div id="resultre" class="col-12"></div>
      <!---signup---->
<form id="Addmembers">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="เบอร์โทรศัพท์">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">รหัสผ่าน</label>
      <input type="text" class="form-control" id="password2" name="password2" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">เครดิต</label>
    <input type="text" class="form-control" id="cash_online" name="cash_online" placeholder="ค่ากำหนดเครดิต">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">ชื่อ-สกุล</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="กรอก ชื่อ-สกุล">
  </div>
</div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputAddress">ธนาคาร</label>
    <input type="text" class="form-control" id="bank" name="bank" placeholder="ค่ากำหนดเครดิต">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">เลขบัญชี</label>
    <input type="text" class="form-control" id="account" name="account" placeholder="ระบุเลขบัญชี">
  </div>
    <div class="form-group col-md-4">
    <label for="inputAddress2">ชื่อบัญชี</label>
    <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="กรอก ชื่อ-สกุล">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">สถานะ</label>
      <select id="agent" name="agent" class="form-control">
        <option value="1" selected>ยืนยัน</option>
        <option value="0">รอยืนยัน</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="active">ออนไลน์</label>
      <select id="active" name="active" class="form-control">
        <option value="1" selected>ออนไลน์</option>
        <option value="0">ระงับ</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="mClass">ระดับ</label>
        <select id="mClass" name="mClass" class="form-control">
        <option value="1" selected>การตลาด</option>
        <option value="0">สมาชิก</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
      <label class="form-check-label" for="gridCheck">
        เพิ่มข้อมูล
      </label>
    </div>
  </div>
</form>
	  <!---ENd--->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary BtnSubmit" id="Btnliveinfo">บันทึกข้อมูล</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
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
 $('#password').val(response); 
                        }

}); 
});         
// เรียก Modal
$( "table" ).delegate( ".view_data", "click", function() {
          var company_id = $(this).attr("id");  
 $.ajax({
                        url: site_url+'/customers/pwedit',
                        type: 'post',
                        data:{company_id:company_id},  
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
// เรียก Modal ข้อมูลสมาชิก
$( "table" ).delegate( ".view_info", "click", function() {
          var company_id = $(this).attr("bid");  
 $.ajax({
                        url: site_url+'/customers/liveinfo',
                        type: 'post',
                        data:{company_id:company_id},  
                        success: function(data){ 
// alert("The paragraph was clicked.");
                    $('#employee_detail').html(data);  
                    $('#ModalPass').modal("show");  
                        }

}); 
}); 
// เเก้ไขข้อมูลส่วนตัว
$(document).on("click", "#Btnliveinfo", function() {
        // Get form
        var form = $('#Editmembers')[0];

		// Create an FormData object 
        var data = new FormData(form);
 $.ajax({
                        url: site_url+'/customers/livesuccess',
                        type: 'post',
                         data: data,
						processData: false,
						contentType: false,
						cache: false,
						timeout: 600000,
                        success: function(data){ 
   $('#result').html(data);  
  $("#Btninfo").attr("disabled", true);
                        }

	}); 
}); 
// เพิ่มข้อมูลสมาชิก Live
$(document).on("click", ".BtnSubmit", function() {
        // Get form
        var form = $('#Addmembers')[0];

		// Create an FormData object 
        var data = new FormData(form);
 $.ajax({
                        url: site_url+'/customers/addmembers',
                        type: 'post',
                         data: data,
						processData: false,
						contentType: false,
						cache: false,
						timeout: 600000,
                        success: function(data){ 
   $('#resultre').html(data);  
  $("#Btninfo").attr("disabled", true);
                        }

	}); 
}); 
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("password");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("คัดลอกรหัสเรียบร้อย: " + copyText.value);
} 
</script>

 