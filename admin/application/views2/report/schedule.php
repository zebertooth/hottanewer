<div class="page-header">
	<h1>รายการเติมอัตโนมัติ</h1>
</div>

<div class="row">

	<div class="col-md-12">
		<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr>
				<th>ลำดับ</th><th>ร้านค้า</th><th>การทำงาน</th><th>เครือข่าย</th><th>หมายเลข</th><th>ยอดเงิน</th><th>รอบทำงาน</th><th>สถานะ</th>
			</tr>
		</thead>
		<tbody>
<?php 
$text = '';
$sc_today_total=0;
$sc_today_num=0;
$sc_week_num=0;
$sc_month_num=0;
$sc_today_balance=0;

$company_name=array();
$company_air_topup=array();

foreach($q->result() as $k => $r){
	
	if(!isset($company_name[$r->company_id])){
		$this->db->where('com_id',$r->company_id);
		$q2=$this->db->get($this->config->item('system_company'));
		$r2=$q2->row();
		
		if($r2->air_topup && ($r2->air_topup >= date('Y-m-d'))){
			$company_name[$r->company_id]=$r2->name.' [VIP]';
			$company_air_topup[$r->company_id]=$this->config->item('topup_agent');
		}else{
			$company_name[$r->company_id]=$r2->name;
			$company_air_topup[$r->company_id]=$this->config->item('topup_ratio');
		}		
	}
			
	if($r->active){
		if($r->worktype==1){
			
			$sc_today_num++;
			$sc_today_total++;
			$sc_today_balance+=($r->cash-($r->cash*$company_air_topup[$r->company_id][$r->network]/100));
			
		}else{
			
			if(date('Y-m-d',strtotime('+1 day'))==$r->up_date){
				
				if($r->worktype==2){
					$sc_week_num++;
				}else{
					$sc_month_num++;
				}
				$sc_today_total++;
				$sc_today_balance += ($r->cash-($r->cash*$company_air_topup[$r->company_id][$r->network]/100));
				
			}					
		}		
	}
	
	echo '<tr>
		<td>'.($k+1).'</td>
		<td>'.$company_name[$r->company_id].'</td>
		<td>'.$worktype[$r->worktype].'</td>
		<td>'.$network[$r->network].'</td>
		<td>'.$r->number.'</td>
		<td>'.$r->cash.'</td>
		<td>'.date('d/m/Y',strtotime($r->up_date)).'</td>
		<td><img src="'.base_url().'assets/images/'.$r->active.'.png" /> '.$status[$r->active].'</td>
	</tr>';
}
?>
		</tbody>
		</table>
	</div>
    
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover table-condensed">
        	<tr>
            	<td>จำนวนหมายเลขที่เติมในคืนนี้ </td><td><span class="pull-right"><?php echo $sc_today_total; ?></span></td>
            </tr>
            <tr>
            	<td>- จากรายการประจำวัน</td><td><span class="pull-right"><?php echo $sc_today_num; ?></span></td>
            </tr>
            <tr>
            	<td>- จากรายการประจำสัปดาห์</td><td><span class="pull-right"><?php echo $sc_week_num; ?></span></td>
            </tr>
            <tr>
            	<td>- จากรายการประจำเดือน</td><td><span class="pull-right"><?php echo $sc_month_num; ?></span></td>
            </tr>
            <tr>
                <td>จำนวนเงินที่ต้องใช้เติมในคืนนี้</td>
                <td><span class="pull-right"><?php echo number_format($sc_today_balance,2,'.',','); ?></span></td>
            </tr>
        </table>    
	</div>
    
</div>  