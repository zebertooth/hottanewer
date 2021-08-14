       <div class="container-fluid">
<div class="row">
	<div class="col-12">
                        <div class="card">
                            <div class="card-body">
 <div class="table-responsive">
  <table id="memListTable" class="display table" style="width:100%">
   <thead>
       <tr>
            <th>OPTION</th>
            <th>Username</th>
            <th>ชื่อ</th>
            <th>ฝาก</th>
            <th>ถอน</th>
            <th>balance</th>
            <th>Winloss</th>
            <th>g_id</th>
        </tr>
    </thead>
</table></div></div>
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

 