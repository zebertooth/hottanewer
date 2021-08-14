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
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
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
 <div class="card">
                            <div class="card-body">

<?php
$aff_date = date("Y-m", strtotime("first day of previous month"));
echo $aff_date;
?>
 <div class="table-responsive">
 <form method="post" id="update_form">
<input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info mb-3" value="ทำรายการ" />
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
                 <th>เลือก</th>
            <th>Username</th>
            <th>ชื่อ</th>
            <th>TotalBet</th>
            <th>Winlost</th>
            <th>Rolling</th>
            <th>Pay</th>
            <th>Total</th>
               </thead>
		<tbody>



        </tbody>
        </table>
		</form>
		<div id="result"></div>
        <?php //echo $pagination; ?>
		</div>
        
    </div>
</div>
</div>
<script>  
$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
           
		url:site_url+"/affiliate/getData",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><label class="customcheckbox"><input type="checkbox" id="'+data[count].id+'" data-username="'+data[count].username+'" data-name="'+data[count].name+'" data-totalbet="'+data[count].totalbet+'" data-winlost="'+data[count].winlost+'" data-rolling="'+data[count].rolling+'" data-affpay="'+data[count].affpay+'" data-payment="'+data[count].payment+'" class="check_box listCheckbox"  /><span class="checkmark"></span></label></td>';
                    html += '<td>'+data[count].username+'</td>';
                    html += '<td>'+data[count].name+'</td>';
                    html += '<td>'+data[count].totalbet+'</td>';
                    html += '<td>'+data[count].winlost+'</td>';
					html += '<td>'+data[count].rolling+'</td>';
					 html += '<td>'+data[count].affpay+'</td>';
                    html += '<td>'+data[count].payment+'</td></tr>';
                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {
            html = '<td><label class="customcheckbox"><input type="checkbox" id="'+$(this).attr('id')+'" data-username="'+$(this).data('username')+'" data-name="'+$(this).data('name')+'" data-totalbet="'+$(this).data('totalbet')+'" data-winlost="'+$(this).data('winlost')+'" data-rolling="'+$(this).data('rolling')+'" data-affpay="'+$(this).data('affpay')+'" data-payment="'+$(this).data('payment')+'" class="check_box" checked /><span class="checkmark"></span></label></td>';
            html += '<td><input type="text" name="username[]" class="form-control" value="'+$(this).data("username")+'" /></td>';
            html += '<td>'+$(this).data("name")+'</td>';
            html += '<td><input type="text" name="totalbet[]" class="form-control" value="'+$(this).data("totalbet")+'" /></td>';
            html += '<td><input type="text" name="winlost[]" class="form-control" value="'+$(this).data("winlost")+'" /></td>';
            html += '<td><input type="text" name="rolling[]" class="form-control" value="'+$(this).data("rolling")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
           html += '<td><input type="text" name="affpay[]" class="form-control" value="'+$(this).data("affpay")+'" /></td>';
	       html += '<td><input type="text" name="payment[]" class="form-control" value="'+$(this).data("payment")+'" /></td>';	 
        }
        else
        {
            html = '<td><label class="customcheckbox"><input type="checkbox" id="'+$(this).attr('id')+'" data-username="'+$(this).data('username')+'" data-name="'+$(this).data('name')+'" data-totalbet="'+$(this).data('totalbet')+'" data-winlost="'+$(this).data('winlost')+'" data-rolling="'+$(this).data('rolling')+'" data-affpay="'+$(this).data('affpay')+'" data-payment="'+$(this).data('payment')+'" class="check_box" /><span class="checkmark"></span></label></td>';
            html += '<td>'+$(this).data('username')+'</td>';
            html += '<td>'+$(this).data('name')+'</td>';
            html += '<td>'+$(this).data('totalbet')+'</td>';
            html += '<td>'+$(this).data('winlost')+'</td>';
            html += '<td>'+$(this).data('rolling')+'</td>';  
	        html += '<td>'+$(this).data('affpay')+'</td>';
            html += '<td>'+$(this).data('payment')+'</td>'; 
        }
        $(this).closest('tr').html(html);
        $('#gender_'+$(this).attr('id')+'').val($(this).data('gender'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
               url:site_url+"/affiliate/payment",
                method:"POST",
                data:$(this).serialize(),
success: function (data) {
//alert(company);
$('#result').html(data);
				  // $('#result').html(data);
                    alert('Data Updated');
                    //fetch_data();
					location.reload(); 
                }
            })
        }
    });

});  

$(function(){

	// add multiple select / deselect functionality
	$("#selectall").click(function () {
		  $('.check_box').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectall checkbox
	// and viceversa
	$(".check_box").click(function(){

		if($(".check_box").length == $(".check_box:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});
});                

</script>
