<link href="<?php echo base_url(); ?>items/code/jquery1.11.4/jquery-ui.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>items/code/jquery1.11.4/external/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>items/code/jquery1.11.4/jquery-ui.js"></script>
<div class="page-header">
	<div class="pull-right" style="width:220px;">
    <?php
	$date_now=($this->uri->segment(3)?$this->uri->segment(3):date('Y-m-d'));
	$new = explode("-",$date_now);
	$new_date = $new[2]."-".$new[1]."-".$new[0];
	echo "<div>Date: <input type=\"text\" id=\"datepicker\" value=\"".$new_date."\"></div>";
	//$date_now=($this->uri->segment(3)?$this->uri->segment(3):date('Y-m-d'));
	//echo selectbox_array($day,'date',$date_now,false,'class="form-control"');
	?>
    </div>
	<h1>รายการเติมเงินย้อนหลังประจำวัน</h1>
    
</div>

<div class="row">
	<div class="col-md-12">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th>วัน/เวลา</th>
			<th>ชื่อร้าน</th>
			<th>เครือข่าย</th>
            <th>หมายเลข</th>
			<th>ยอดเติม</th>
            <th>ยอดหัก</th>
			<th>ส่งแล้ว</th>
			<th>เวลาส่ง</th>
            <th>สำเร็จ</th>
			<th>เวลาสำเร็จ</th>
            <th>รหัสเติม</th>
            <th>ยกเลิก</th>
			<th width="24">&nbsp;</th>
			<th width="24">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$k=0;
	$sum_cash=0;
	$sum_balance=0;
	$sum_register=0;
	foreach($q->result() as $k => $r){
		
		echo '<tr>
			<td>'.date('d/H:i:s',strtotime($r->regis)).'</td>
			<td>'.$r->name.'</td>
			<td>'.$this->network[$r->network].'</td>
			<td>'.$r->number.'</td>
			<td>'.$r->cash.'</td>
			<td>'.$r->balance.'</td>';
			
		if($r->network==0){
			if($r->number=='REGISTER'){
				$sum_register+=400;
				echo '<td colspan="9">ค่าสมัครสมาชิก</td></tr>';
			}else{
				echo '<td colspan="9">ปรับยอดเงินสมดุล</td></tr>';
			}
		}else if($r->network==9){
			
			$this->db->where('A.tc_id',$r->tc_id);
			$this->db->join($this->config->item('topup_bills').' B','A.tc_type=B.id');
			$q2=$this->db->get($this->config->item('topup_service').' A');
			if($q2->num_rows()>0){
				$r2=$q2->row();
				echo '<td colspan="7"><strong>'.$r2->name.'</strong> TaxID:'.$r2->txid.'</td><td><a href="javascript:bills_cancel(\''.$r->tc_id.'\');"><span class="glyphicon glyphicon-remove-circle"></span></a></td></tr>';
			}else{
				echo '<td colspan="8">ERROR '.$r->tc_id.'</td></tr>';
			}
			
		}else if($r->network==8){
			
			$this->db->where('A.tc_id',$r->tc_id);
			$this->db->join($this->config->item('topup_cards_group').' B','A.tc_type=B.id');
			$q2=$this->db->get($this->config->item('topup_service').' A');
			if($q2->num_rows()>0){
				$r2=$q2->row();
				echo '<td colspan="8"><strong>'.$r2->name.'</strong> TaxID:'.$r2->txid.'</td></tr>';
			}else{
				echo '<td colspan="8">ERROR '.$r->tc_id.'</td></tr>';
			}
			
		}else if($r->network==80){
			echo '<td colspan="9">ตัวแทนโอนเงินให้สมาชิก</td></tr>';
		}else if($r->network==81){
			echo '<td colspan="9">สมาชิกขอถอนเงินออกจากระบบ</td></tr>';				
		}else{
			
		echo '<td>'.$r->send_wait.'</td>
			<td>'.date('H:i:s',strtotime($r->send_wait_time)).'</td>
			<td>'.$r->send_ok.'</td>
			<td>'.date('H:i:s',strtotime($r->send_ok_time)).'</td>
			<td>'.$r->send_ok_ref.'</td>
			<td>'.$r->cancel_list.'</td>
			<td><a href="javascript:refill_refresh(\''.$r->shop.'\',\''.$r->tc_id.'\');" class="big"><span class="glyphicon glyphicon-refresh"></span></td>
			<td><a href="javascript:refill_cancel(\''.$r->shop.'\',\''.$r->tc_id.'\');" class="big"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
			</tr>';
			
		}
		
		if($r->send_ok && $r->network<80){
			$sum_cash+=$r->cash;
			$sum_balance+=$r->balance;
		}
	}
	?>
    <tr><th colspan="4"><?php echo ($k+1); ?> รายการ</th><th><?php echo $sum_cash; ?></th><th><?php echo number_format($sum_balance,2,'.',','); ?></th><th colspan="8">กำไรระบบเติมเงิน <?php echo number_format($sum_cash-$sum_balance,2,'.',','); ?> | กำไรค่าสมัครสมาชิก <?php echo $sum_register; ?></th></tr>
	</tbody>
</table>
    </div>
</div>
<script>
$(function(){
	$('#datepicker').change(function (){
		var x = document.getElementById('datepicker').value;
		var result = x.split('/');
		var x = result[2]+"-"+result[0]+"-"+result[1];//new order date from datepicker
		 location.replace(site_url+'/topup/truncate/'+x);
	});	
});
function refill_refresh(com_id,id){
	if(confirm('Do you want to refresh ?')){
		$.ajax({type:'POST',url:site_url+'/topup/refill_refresh',data:'id1='+com_id+'&id2='+id,success:function(data){
			if(data=='1'){location.reload();}else{alert(data);}
		}});
	}
}
function refill_cancel(com_id,id){
	if(confirm('Do you want to cancel '+id+' ?')){
		$.ajax({type:'POST',url:site_url+'/topup/refill_cancel',data:'id1='+com_id+'&id2='+id,success:function(data){
			if(data=='1'){location.reload();}else{alert(data);}
		}});
	}
}
function bills_cancel(id){
	if(confirm('Do you want to cancel '+id+' ?')){
		$.ajax({type:'POST',url:site_url+'/topup/bills_cancel',data:'id='+id,success:function(data){
			if(data=='1'){location.reload();}else{alert(data);}
		}});
	}
}
function reDate(dateOld) {
	var x = dateOld.split('-');
	var result = x[2]+"-"+x[1]+"-"+x[0];
	return result;
}
</script>
