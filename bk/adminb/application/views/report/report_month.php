<?php
	$text1 = '';
	$sum_transfer = 0;
	$sum_member = 0;
	$sum_refill = 0;
	$sum_balance = 0;
	$chk_balance = 0;
	
	foreach($q->result() as $r){
		
		$this->db->select('SUM(money) as sum_money');
		$this->db->where('status',1);
		$this->db->where('company_id',$r->id);
		$this->db->order_by('regis_date','DESC');
		$this->db->where('DATE_FORMAT(`regis_date`,\'%Y-%m\')','\''.$month.'\'',false);
		$q3 = $this->db->get($this->config->item('topup_bank_transfer'));
		$r3 = $q3->row();
		
		$sum_transfer += $r3->sum_money;
		$sum_refill += $r->total_cash;
		$sum_balance += $r->total_balance;
		
		if($r->total_cash > 0){
			
			$by_net='';
			$by_network=array(0,0,0);
			
			$this->db->select('`network`,sum(`cash`) as cash',false);
			$this->db->where('send_ok',1);
			$this->db->where('cancel_ok',0);
			$this->db->where('DATE_FORMAT(`regis_date`,\'%Y-%m\')=\''.$month.'\'','',false);
			$this->db->where('company_id',$r->id);
			$this->db->where('network BETWEEN 1 AND 3','',false);
			$this->db->group_by('network');
			$q4=$this->db->get($this->config->item('topup_truncate'));
			foreach($q4->result() as $r4){
				$by_network[$r4->network-1]=$r4->cash;
			}
			foreach($by_network as $gg){
				$by_net.='<td><span class="pull-right"><b>'.number_format($gg,2,'.',',').'</b></span></td>';
			}
			
			unset($by_network);
		
			$text1 .= '<tr><td>'.$r->id.'</td>
			<td>'.$r->username.'</td>
			<td>'.$r->name.'</td>
			<td><span class="pull-right">'.number_format($r3->sum_money,2,'.',',').'</span></td>
			<td><span class="pull-right">'.number_format($r->cash_online,2,'.',',').'</span></td>
			<td><span class="pull-right">'.number_format($r->total_cash,2,'.',',').'</span></td>
			<td><span class="pull-right">'.number_format($r->total_balance,2,'.',',').'</span></td>
			'.$by_net.'
			</tr>';
		}
	}
?>	
<div class="page-header">
	<form id="form_report_month" method="post" class="pull-right"><p><?php echo selectbox_array($month_array,'month',$month,false,'class="form-control"'); ?></p></form>
	<h1>รายงานยอดเติมประจำเดือน <small><?php echo $month; ?></small> </h1> 
</div>

<div class="row">
	<div class="col-md-6">
    
	<table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<td>ยอดเงินโอนเข้ารวมทั้งหมด</td><td><b class="pull-right"><?php echo number_format($sum_transfer,2,'.',','); ?></b></td>
		</tr>
		<tr>
			<td>ยอดเงินรวมทั้งหมดของลูกค้า</td><td><b class="pull-right"><?php echo number_format($sum_member,2,'.',','); ?></b></td>
		</tr>
		<tr>
			<td>ยอดเติมทั้งหมด</td><td><b class="pull-right"><?php echo number_format($sum_refill,2,'.',','); ?></b></td>
		</tr>
		<tr>
			<td>ยอดหักทั้งหมด</td><td><b class="pull-right"><?php echo number_format($sum_balance,2,'.',','); ?></b></td>
		</tr>
        <tr>
        <?php 
		if(isset($sum_network2[1])){
			$ais1 = $sum_network1[1];
			$ais2 = $sum_network2[1] - ($sum_network1[1]-($sum_network1[1]*3.5/100));
		}else{
			$ais1 = 0;
			$ais2 = 0;
		}
		?>
			<td>ยอดรวม AIS <b class="pull-right"><?php echo number_format($ais2,2,'.',','); ?></b></td>
            <td><b class="pull-right"><?php echo number_format($ais1,2,'.',','); ?></b></td>
		</tr>
        <tr>
        <?php 
		if(isset($sum_network2[1])){
			$dtac1 = $sum_network1[2];
			$dtac2 = $sum_network2[2] - ($sum_network1[2]-($sum_network1[2]*3.5/100));
		}else{
			$dtac1 = 0;
			$dtac2 = 0;
		}
		?>
			<td>ยอดรวม DTAC <b class="pull-right"><?php echo number_format($dtac2,2,'.',','); ?></b></td>
            <td><b class="pull-right"><?php echo number_format($dtac1,2,'.',','); ?></b></td>
		</tr>
        <tr>
        <?php 
		if(isset($sum_network2[3])){
			$true1 = $sum_network1[3];
			$true2 = $sum_network2[3] - ($sum_network1[3]-($sum_network1[3]*8/100));
		}else{
			$true1 = 0;
			$true2 = 0;
		}
		?>
			<td>ยอดรวม TRUE H <b class="pull-right"><?php echo number_format($true2,2,'.',','); ?></b></td>
            <td><b class="pull-right"><?php echo number_format($true1,2,'.',','); ?></b></td>
		</tr>
		<tr>
			<td>ส่วนต่างกำไรลูกค้า</td><td><b class="pull-right"><?php echo number_format($sum_refill-$sum_balance,2,'.',','); ?></b></td>
		</tr>
		<tr>
			<td>ส่วนต่างกำไร Topup <b class="pull-right"><?php echo number_format($ais2+$dtac2+$true2,2,'.',','); ?></b></td>
            <td><b class="pull-right"><?php echo number_format($sum_refill * 0.005,2,'.',','); ?></b></td>
		</tr>
	</table>
	</div>
    <div class="col-md-6">
    	<div id="chart_container" style="width:520px; height:300px;"></div>
    </div>
</div>

<div id="chart2_container" style="width:1100px; height:250px;"></div>
<div id="chart3_container" style="width:1100px; height:250px;"></div>

	<table class="table table-striped table-bordered table-hover table-condensed">
	<thead><tr><th>รหัส</th><th>ชื่อร้าน</th><th>ชื่อเข้าใช้</th><th>รวมยอดโอน</th><th>เหลือ</th><th>ยอดขาย</th><th>ยอดหัก</th> <th>AIS</th><th>DTAC</th><th>TRUE H</th></tr></thead>
	<tbody><?php echo $text1; ?></tbody>
	</table>

<script>
$(function(){
	$('#month').change(function(){
		$('#form_report_month').submit();							
	});
	
	var chart =  new dhtmlXChart({
		view:"bar",
		container:"chart_container",
		value:"#sales#",
		color:function(obj){
			if(obj.year=="AIS"){
				return'#9CE62E';
			}else if(obj.year=="DTAC"){
				return'#2ECDE6';
			}else if(obj.year=="TRUE H"){
				return '#F5AE16';
			}else if(obj.year=="Cards"){
				return'#006699';
			}else if(obj.year=="Public Utility"){
				return'#14AD1C';
			}else{
				return'#CCCCCC';
			}
		},
		label: function(obj){ return obj.year+' '+(parseFloat(obj.sales)/chart.sum("#sales#")*100).toFixed(1)+'%'; }
	});
	chart.parse(<?php echo $json_network; ?>,'json');
	
	var chart2=new dhtmlXChart({
		view:"bar",
		container:"chart2_container",
		value:"#sales#",
		label:"#sales#",
		xAxis:{title:'Day',
		template:"#year#"},
		yAxis:{title:'Sales',
		template:"{obj}"},
		gradient:function(gradient){
			gradient.addColorStop(0.0,"#FF0000");
			gradient.addColorStop(0.5,"#FFFF00");
			gradient.addColorStop(0.9,"#00FF22");
		}
	});
	chart2.parse(<?php echo $json_day; ?>,"json");
	
	var chart3=new dhtmlXChart({
		view:"bar",
		container:"chart3_container",
		value:"#sales#",
		label:"#sales#",
		xAxis:{title:'Day',
		template:"#year#"},
		yAxis:{title:'Sales',
		template:"{obj}"},
		gradient:function(gradient){
			gradient.addColorStop(0.0,"#FF0000");
			gradient.addColorStop(0.5,"#FFFF00");
			gradient.addColorStop(0.9,"#00FF22");
		}
	});
	chart3.parse(<?php echo $json_bank; ?>,"json");
});
</script>