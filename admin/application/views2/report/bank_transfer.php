<link href="<?php echo base_url(); ?>items/code/jquery1.11.4/jquery-ui.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>items/code/jquery1.11.4/external/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>items/code/jquery1.11.4/jquery-ui.js"></script>
<div class="page-header">
	<div class="pull-right" style="width:220px;">
    <?php
	$date_now=($this->uri->segment(3)?$this->uri->segment(3):date('Y-m-d'));
	$new = explode("-",$date_now);
	$new_date = $new[2]."-".$new[1]."-".$new[0];
	//$date_now = (2016 04 15:date('Y-m-d'));
	//echo selectbox_array($day,'date',$date_now,false,'class="form-control"');
	echo "<div>Date: <input type=\"text\" id=\"datepicker\" value=\"".$new_date."\"></div>";
	?>
    </div>
	
	<h1>แจ้งเงินโอนเข้าระบบ</h1>
	<div class="row">
				<div class="col-lg-12" style="text-align:center"><h3>ยอดโอนเข้า e-wllet รวมทั้งหมด  <?php echo number_format($this->total_ew,2); ?> บาท</h3></div>
			</div>
</div>

<div id="div_edit"></div>

<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th>วัน/เวลา</th>
			<th>ชื่อร้าน</th>
			<th>ชื่อเข้าใช้</th>
			<th>จำนวนเงิน</th>
            <th>เวลา</th>
			<th>เข้า</th>
			<th>จาก</th>
			<th width="24">&nbsp;</th>
			<th width="24">&nbsp;</th>
			<th width="24">&nbsp;</th>
			<th width="24">&nbsp;</th>
            <th width="24">&nbsp;</th>
            <th width="24">&nbsp;</th>
			<th>หมายเหตุ</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i=1;
	foreach($q->result() as $r){
		if($r->check==1 && $r->status==1){
			$chk = '';
		}else{
			$chk = '<a href="javascript:transfer_check(\''.$r->id.'\')"><img src="'.base_url().'items/icon/refresh16.png" width="20" height="20" /></a>';
		}
		if($r->ref == ''){
			$log_transfer = "";
		}else{
			$log_transfer = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal'.$i.'">ดูหมายเหตุ</button>';
		}
		
		echo '<tr>
			<td>'.date('d/H:i:s',strtotime($r->regis_date)).'</td>
			<td>'.$r->username.'</td>
			<td>'.$r->name.'</td>
			<td><span class="pull-right">'.number_format($r->money,2,'.',',').'</span></td>
			<td>'.$r->time.'</td>
			<td>'.$this->bank[$r->to_bank].'</td>
			<td>'.$this->bank[$r->from_bank].'</td>
			<td>'.$r->from_type.'</td>
			<td>'.($r->check==1?'<span class="label label-success">'.$r->check.'</span>':'<span class="label label-danger">'.$r->check.'</span>').'</td>
			<td>'.($r->status==1?'<span class="label label-success">'.$r->status.'</span>':'<span class="label label-danger">'.$r->status.'</span>').'</td>
			<td>'.$chk.'</td>
			<td><a href="javascript:transfer_copy(\''.$r->id.'\')"><img src="'.base_url().'items/icon/copy.png" width="20" height="20" /></a></td>
			<td><a href="javascript:transfer_del(\''.$r->id.'\')"><img src="'.base_url().'items/icon/delete.png" width="20" height="20" /></a></td>
			<td>'.$log_transfer.'</td>
			</tr>';
			
		echo '<div class="modal fade" id="myModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">หมายเหตุ</h4>
				  </div>
				  <div class="modal-body">'.$r->ref.'</div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>';
			$i++;
	}
	?>		
	</tbody>
</table>

<script>
$(function(){
	$('#datepicker').change(function (){
		var x = document.getElementById('datepicker').value;
		var result = x.split('/');
		var x = result[2]+"-"+result[0]+"-"+result[1];//new order date from datepicker
		 location.replace(site_url+'/topup/bank_transfer/'+x);
	});	
});
$(function(){
	
});
function transfer_check(id){
	$.ajax({type:'GET',url:site_url+'/topup/bank_transfer_check/'+id,data:'',success:function(data){
		$('#div_edit').html(data);
	}});
}
function transfer_copy(id){
	$.ajax({type:'GET',url:site_url+'/topup/bank_transfer_copy/'+id,data:'',success:function(data){
		$('#div_edit').html(data);
	}});
}
function transfer_del(id){
	$.ajax({type:'GET',url:site_url+'/topup/bank_transfer_delete/'+id,data:'',success:function(data){
		location.reload(true);
	}});
}
</script>