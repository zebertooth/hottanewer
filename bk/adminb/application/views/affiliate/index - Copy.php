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


 <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
                 <th>id</th>
            <th>Username</th>
            <th>ชื่อ</th>
            <th>TotalBet</th>
            <th>Winlost</th>
            <th>Rolling</th>
            <th>Pay</th>
            <th>Total</th>
            <th>ทำรายการ</th>
               </thead>
		<tbody>
        <?php

		foreach($q->result() as $r){
		$suml_AviliableBet+=$r->AviliableBet;
		$pay_percent = $r->AviliableBet*$r->aff_pay/100;
		$sum_percent+=$r->AviliableBet*$r->aff_pay/100;

			echo '<tr>
			<td><input type="checkbox" class="check_box">'.$r->id.'</td>
			<td>'.$r->username.'</td>
			<td>'.$r->name.'</td>
			<td>'.$r->SumTotalBet.'</td>
			<td>'.$r->SumWinlost.'</td>
			<td>'.$r->AviliableBet.'</td>
			<td>'.$r->aff_pay.'</td>
			<td>'.$pay_percent.'</td>
	<td><button type="button" class="btn btn-primary btn-sm">จ่าย</button></td>
			</tr>
			';
		}
		?>


        </tbody>
<tfoot>
      <tr>
       <th colspan="7">พันธมิตรในระบบ <?php echo $nums; ?> user</th>
    <th id="total_order"><?php echo $sum_percent;?></th> 
  <th></th> 
      </tr>
     </tfoot>
        </table>
        <?php echo $pagination; ?>
		</div>
        
    </div>
</div>
</div>
<script>  
$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
            url:"http://localhost/sagame911/manager/index.php/affiliate",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+data[count].id+'" data-name="'+data[count].name+'" data-address="'+data[count].address+'" data-gender="'+data[count].gender+'" data-designation="'+data[count].designation+'" data-age="'+data[count].age+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].name+'</td>';
                    html += '<td>'+data[count].address+'</td>';
                    html += '<td>'+data[count].gender+'</td>';
                    html += '<td>'+data[count].designation+'</td>';
                    html += '<td>'+data[count].age+'</td></tr>';
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
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-name="'+$(this).data('name')+'" data-address="'+$(this).data('address')+'" data-gender="'+$(this).data('gender')+'" data-designation="'+$(this).data('designation')+'" data-age="'+$(this).data('age')+'" class="check_box" checked /></td>';
            html += '<td><input type="text" name="name[]" class="form-control" value="'+$(this).data("name")+'" /></td>';
            html += '<td><input type="text" name="address[]" class="form-control" value="'+$(this).data("address")+'" /></td>';
            html += '<td><select name="gender[]" id="gender_'+$(this).attr('id')+'" class="form-control"><option value="Male">Male</option><option value="Female">Female</option></select></td>';
            html += '<td><input type="text" name="designation[]" class="form-control" value="'+$(this).data("designation")+'" /></td>';
            html += '<td><input type="text" name="age[]" class="form-control" value="'+$(this).data("age")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
           html += '<td><input type="text" name="age[]" class="form-control" value="'+$(this).data("age")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
		   html += '<td></td>';
		    html += '<td></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-name="'+$(this).data('name')+'" data-address="'+$(this).data('address')+'" data-gender="'+$(this).data('gender')+'" data-designation="'+$(this).data('designation')+'" data-age="'+$(this).data('age')+'" class="check_box" /></td>';
            html += '<td>'+$(this).data('name')+'</td>';
            html += '<td>'+$(this).data('address')+'</td>';
            html += '<td>'+$(this).data('gender')+'</td>';
            html += '<td>'+$(this).data('designation')+'</td>';
            html += '<td>'+$(this).data('age')+'</td>';  
	        html += '<td>'+$(this).data('designation')+'</td>';
            html += '<td>'+$(this).data('age')+'</td>'; 
            html += '<td>'+$(this).data('age')+'</td>'; 
        }
        $(this).closest('tr').html(html);
        $('#gender_'+$(this).attr('id')+'').val($(this).data('gender'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"multiple_update.php",
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Data Updated');
                    fetch_data();
                }
            })
        }
    });

});  
</script>
