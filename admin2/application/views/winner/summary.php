
          <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายงานย้อนหลัง</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
             <div class="row dashboard">
 <!-- Column 1 -->
<?php
 for ($i=0; $i<3; $i++)
{
$deposit = $this->topup_model->SumDeposit(date("Y-m-d", strtotime($i." days ago")));
$withdraw = $this->topup_model->SumWithdraw(date("Y-m-d", strtotime($i." days ago")));
$wheel = $this->topup_model->wheel_indate(date("Y-m-d", strtotime($i." days ago")));
$free = $this->topup_model->promotion(date("Y-m-d", strtotime($i." days ago")));
$revenue = $deposit-$withdraw;
$Newregister = $this->topup_model->getPerson_regis(date("Y-m-d", strtotime($i." days ago")));
echo'<div class="col-md-4 col-lg-4 col-xlg-4 col-12 mb-2">
 <ul class="list-group">
<li class="list-group-item active">สรุปประจำวัน '.date("Y-m-d", strtotime($i." days ago")).'</li>
  <li class="list-group-item">ยอดฝาก <span class="badge badge-pill badge-primary float-right">'.number_format($deposit,2).'</span></li>
  <li class="list-group-item">ยอดถอน <span class="badge badge-pill badge-danger float-right">'.number_format($withdraw,2).'</span></li>
  <li class="list-group-item">รายได้ <span class="badge badge-pill badge-success float-right">'.number_format($revenue,2).'</span></li>
  <li class="list-group-item">สมัครใหม่ <span class="badge badge-pill badge-info float-right">'.$Newregister.'</span></li>
  <li class="list-group-item">กงล้อ <span class="badge badge-pill badge-warning float-right">'.number_format($wheel,2).'</span></li>
  <li class="list-group-item">เครดิตฟรี <span class="badge badge-pill badge-secondary float-right">'.number_format($free,2).'</span></li>

</ul> 
</div>';
}
?>
 <!-- Column 1 -->
</div>
<div class="row mt-3">
	<div class="col-12">
                        <div class="card">
                            <div class="card-body">

<div class="col-12 mb-2">
<h4>เลือกช่วงเวลา</h4>
 <form  method="post" action="<?php echo site_url('winner/summary/search'); ?>"  id="searchform"> 
<select name="year">
<option value="">เลือกปี</option>
<?php
for ($year = 2019; $year <= 2030; $year++) {
$selected = (isset($getYear) && $getYear == $year) ? 'selected' : '';
echo "<option value=$year $selected>$year</option>";
}
?>
</select>
<?php
$MonthArray = array(
"01" => "ม.ค", "02" => "ก.พ", "03" => "มี.ค", "04" => "เม.ย",
"05" => "พ.ค", "06" => "มิ.ย", "07" => "ก.ค", "08" => "ส.ค",
"09" => "ก.ย.", "10" => "ต.ค", "11" => "พ.ย", "12" => "ธ.ค",
);
?>
<select name="month">
<option value="">เลือกเดือน</option>
<?php
foreach ($MonthArray as $monthNum=>$month) {
$selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';
//Uncomment line below if you want to prefix the month number with leading 0 'Zero'
//$monthNum = str_pad($monthNum, 2, "0", STR_PAD_LEFT);
echo '<option ' . $selected . ' value="' . $monthNum . '">' . $month . '</option>';
}
?>
</select>
<button type="submit" class="btn btn-info">ดูรายงาน</button>
</form>
 </div> 
 <div class="table-responsive">

  <table class="table table-bordered" style="width:100%">
   <thead>
       <tr>
            <th>วันที่</th>
            <th>สมัครสมาชิก</th>
            <th>ฝาก</th>
            <th>ถอน</th>
            <th>โบนัสกงล้อ</th>
            <th>Bonus พิเศษ</th>
            <th>รายได้</th>
        </tr>
    </thead>
<?php 		foreach($period as $date){
$credit = $this->topup_model->SumDeposit($date->format('Y-m-d'));
$withdraw = $this->topup_model->SumWithdraw($date->format('Y-m-d'));
$revenue = $credit-$this->topup_model->SumWithdraw($date->format('Y-m-d'));
$wheel=$this->topup_model->wheel_indate($date->format('Y-m-d'));
if($revenue > 0){
$show ='<p class="text-success">'.$revenue.'</p>';
}else{
$show ='<p class="text-danger">'.$revenue.'</p>';
}
$sum+= $revenue;
$sumdeposit+= $credit;
$sumwithdraw+= $withdraw;
$sumwheel+= $wheel;
	echo' <tr>
    <td>'.$date->format('Y-m-d').'</td>
  <td>-</td>   
      <td>'.$this->topup_model->SumDeposit($date->format('Y-m-d')).'</td>
      <td>'.$this->topup_model->SumWithdraw($date->format('Y-m-d')).'</td>
      <td>'.$this->topup_model->wheel_indate($date->format('Y-m-d')).'</td>
      <td>'.$this->topup_model->promotion($date->format('Y-m-d')).'</td>   
      <td>'.$show.'</td>   
    </tr>';
	   }
echo'<tfoot>
      <tr>
	  <th>total</th>
	  <th>-</th>
	  <th>'.$sumdeposit.'</th>
	  <th>'.$sumwithdraw.'</th>
	  <th>'.$sumwheel.'</th>
	  <th>-</th>
       <th>'.$sum.'</th>
      </tr>
     </tfoot>';
	   ?>

</table>
</div>
</div>
		</div>

    </div>
</div>
</div>

								
       <div class="modal fade" id="ModalPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
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
<script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        pageLength: 10,
        // Processing indicator
        "processing": true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="loadindData">กำลังเเสดงข้อมูล</div>'
        },  
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('index.php/winner/getLists'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
// เเก้ไขข้อมูลส่วนตัว
$(document).on("click", "#Btninfo", function() {
        // Get form
        var form = $('#info')[0];

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
//เเก้ไขสมาชิก BtnUpdateuser
$(document).on("click", "#BtnUpdateuser", function() {
        // Get form
        var form = $('#Editmembers')[0];

		// Create an FormData object 
        var data = new FormData(form);
 $.ajax({
                        url: site_url+'/customers/update_success',
                        type: 'post',
                         data: data,
						processData: false,
						contentType: false,
						cache: false,
						timeout: 600000,
                        success: function(data){ 
   $('#result').html(data);  
  $("#BtnUpdateuser").attr("disabled", true);
                        }

	}); 
}); 
// สร้างรหัสผ่าน
$(document).on("click", "#BtnSubmit", function() {
	      var company_id = $("#company_id").val();
          var password = $("#password").val();
 $.ajax({
                        url: site_url+'/customers/pwsave',
                        type: 'post',
                        data: {company_id: company_id, password: password},
                        success: function(response){ 
   $('#success').html(response);  
  $("#BtnSubmit").attr("disabled", true);
                        }

	}); 
});   
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
// เรียก Modal เพื่อ เรียกการเพิ่มเครดิตสมาชิก
$( "table" ).delegate( ".view_addcredit", "click", function() {
          var company_id = $(this).attr("id");  
 $.ajax({
                        url: site_url+'/customers/creditAdd',
                        type: 'post',
                        data:{company_id:company_id},  
                        success: function(data){ 
// alert("The paragraph was clicked.");
                    $('#employee_detail').html(data); 
	    $("#last_transaction").load(site_url+"/credit/dep_user/"+company_id);
                    $('#ModalPass').modal("show");  
                        }

}); 
}); 
//เเก้ไขสมาชิก BtnUpdateuser
$(document).on("click", "#BtnAddcredit", function() {
        // Get form
        var form2 = $('#Addcredit')[0];
        var deeid = $("#company_id").val();
		// Create an FormData object 
        var data2 = new FormData(form2);
 $.ajax({
                        url: site_url+'/customers/addcredit_success',
                        type: 'post',
                         data: data2,
						processData: false,
						contentType: false,
						cache: false,
						timeout: 600000,
                        success: function(data){ 
   $('#result').html(data);  
  $("#BtnAddcredit").attr("disabled", true);
	$("#amounts").load(site_url+"/customers/creditRefresh/"+deeid);
    $("#last_transaction").load(site_url+"/credit/dep_user/"+deeid);

                        }

	}); 
}); 
// เรียก Modal ข้อมูลสมาชิกเพื่อเเก้ไข
$( "table" ).delegate( ".view_info", "click", function() {
          var company_id = $(this).attr("id");  
 $.ajax({
                        url: site_url+'/customers/useredit',
                        type: 'post',
                        data:{company_id:company_id},  
                        success: function(data){ 
// alert("The paragraph was clicked.");
                    $('#employee_detail').html(data);  
                    $('#ModalPass').modal("show");  
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

 