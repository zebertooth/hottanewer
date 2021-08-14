<div class="page-header">
	<h1>แจ้งถอนเงินออกจากระบบ</h1>
</div>

<div id="div_edit"></div>

<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th>วัน/เวลา</th>
			<th>รหัส</th>
			<th>ชื่อ-นามสกุล</th>
			<th>จำนวนเงิน</th>
            <th>บัญชี</th>
            <th>ธนาคาร</th>
            <th>เลขบัญชี</th>
            <th width="24">&nbsp;</th>
            <th width="24">&nbsp;</th>
			<th width="24">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php
 function bank($sp){
	switch( $sp ){
case '1':
 $show='ธนาคารกรุงไทย';
 return $show;
 break;
 case '2':
 $show='ธนาคารไทยพาณิชย์';
 return $show;
break;
case '3':
 $show='ธนาคารกรุงเทพ';
 return $show;
break;
case '4':
 $show='ธนาคารกสิกรไทย';
 return $show;
break;
case '5':
 $show='ธนาคารทหารไทย';
 return $show;
break;
case '6':
 $show='ธนาคารกรุงศรี';
 return $show;
break;
case '7':
 $show='ธนาคารธนชาต';
 return $show;
break;
case '8':
 $show='ธนาคารออมสิน';
 return $show;
break;
   }
}
	foreach($q->result() as $r){
		
		if($r->check==1 && $r->status==1){
			$chk = '';
		}else{
			$chk = '<a href="javascript:drawing_check(\''.$r->draw_id.'\')"><img src="'.base_url().'items/icon/refresh16.png" width="20" height="20" /></a>';
		}
		
		echo '<tr>
			<td>'.$r->regis_date.'</td>
			<td>'.$r->id.'</td>
			<td>'.$r->name.'</td>
			<td><span class="pull-right">'.number_format($r->money,2,'.',',').'</span></td>
			<td>'.$r->acc_name.'</td>
			<td>'.bank($r->bank).'</td>
			<td>'.$r->account.'</td>
			<td>'.($r->check==1?'<span class="label label-success">'.$r->check.'</span>':'<span class="label label-danger">'.$r->check.'</span>').'</td>
			<td>'.($r->status==1?'<span class="label label-success">'.$r->status.'</span>':'<span class="label label-danger">'.$r->status.'</span>').'</td>
			<td>'.$chk.'</td>
			</tr>';
	}
	?>		
	</tbody>
</table>

<script>
$(function(){
	
});
function drawing_check(id){
	$.ajax({type:'GET',url:site_url+'/topup/bank_drawing_check/'+id,data:'',success:function(data){
		$('#div_edit').html(data);
	}});
}
</script>