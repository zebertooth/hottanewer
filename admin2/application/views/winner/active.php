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
  <h1>ข้อมูลลูกค้า <small>จัดการข้อมูลลูกค้า</small></h1>
</div>
<div id="customers_list" class="row">
	<div class="col-md-12">
    	<!--<form name="company_search" class="form-inline" method="post" role="form">
            <input type="text" name="search_id" id="search_id" class="form-control" placeholder="รหัสสมาชิก" />
            <input type="text" name="search_url" id="search_url" class="form-control" placeholder="ชื่อเข้าใช้" />
            <input type="text" name="search_name" id="search_name" class="form-control" placeholder="ชื่อสมาชิก" />
            <input type="text" name="search_telephone" id="search_telephone" class="form-control" placeholder="โทรศัพท์" />
            <?php echo selectbox(
                $this->db->select('province_id,province_name')->order_by('province_name','ASC')->get('system_province'),
                'search_province','',false,'class="form-control"'); ?>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
		</form>
        <form id="history" name="history" method="post" action="<?php echo site_url('payment/history'); ?>" role="form">
			<input type="hidden" name="id" id="id" value="" />
		</form>
    	<hr>-->
		<h4>วันที่ <?php echo $new[2]."/".$new[1]."/".$new[0];; ?></h4>
		<div id="comp"><!--on mobile-->
			<div class="row">
				<div class="col-lg-3" style="text-align:left"><h3>จำนวนผู้เข้ามาสมัคร </h3></div>
				<div class="col-lg-2" style="text-align:center"><h3><?php echo $this->usr_total; ?> </h3></div>
				<div class="col-lg-1" style="text-align:left"><h3>คน</h3></div>
				<div class="col-lg-3" style="text-align:left"><h3>Package <font color="#aaa";>Member</font></h3></div>
				<div class="col-lg-2" style="text-align:center"><h3><?php echo $this->member; ?> </h3></div>
				<div class="col-lg-1" style="text-align:left"><h3>รหัส</h3></div>
			</div>
			<div class="row">
				<div class="col-lg-3" style="text-align:left"><h3>จำนวนผู้แอคทีฟแล้ว </h3></div>
				<div class="col-lg-2" style="text-align:center"><h3><?php echo $this->ac_total; ?> </h3></div>
				<div class="col-lg-1" style="text-align:left"><h3>คน</h3></div>
				<div class="col-lg-3" style="text-align:left"><h3>Package <font color="green";>Leader</font></h3></div>
				<div class="col-lg-2" style="text-align:center"><h3><?php echo $this->leader; ?> </h3></div>
				<div class="col-lg-1" style="text-align:left"><h3>รหัส</h3></div>
			</div>
		</div>
		<div id="mobi"><!--on mobile-->
			<div class="row">
				<div class="col-lg-12" style="text-align:center"><h3>จำนวนผู้เข้ามาสมัคร  <?php echo $this->usr_total; ?> คน</h3></div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="text-align:center"><h3>จำนวนผู้แอคทีฟแล้ว  <?php echo $this->ac_total; ?> คน</h3></div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="text-align:center"><h3>Package <font color="#aaa";>Member </font><?php echo $this->member; ?> รหัส</h3></div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="text-align:center"><h3>Package <font color="green";>Leader </font><?php echo $this->leader; ?> รหัส</h3></div>
			</div>
		</div> 
		<hr>
		<h3>ตารางไอดี active แต่ละเดือน</h3>
		<div class="row">
			<div class="col-lg-2" style="text-align:center"><h4>มกราคม <p> <?php echo $this->usr_jan; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>กุมภาพันธ์  <p> <?php echo $this->usr_feb; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>มีนาคม  <p> <?php echo $this->usr_mar; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>เมษายน  <p> <?php echo $this->usr_api; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>พฤษภาคม  <p> <?php echo $this->usr_may; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>มิถุนายน  <p> <?php echo $this->usr_jun; ?> </p></h4></div>
		</div> 
		<div class="row">
			<div class="col-lg-2" style="text-align:center"><h4>กรกฏาคม <p> <?php echo $this->usr_jul; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>สิงหาคม  <p> <?php echo $this->usr_aug; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>กันยายน  <p> <?php echo $this->usr_seb; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>ตุลาคม  <p> <?php echo $this->usr_oct; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>พฤศจิกายน  <p> <?php echo $this->usr_nov; ?> </p></h4></div>
			<div class="col-lg-2" style="text-align:center"><h4>ธันวาคม  <p> <?php echo $this->usr_dec; ?> </p></h4></div>
		</div>
		<br>		
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr>
			<th style="text-align:center">ลำดับ</th>
			<th style="text-align:center">username</th>	
			<th style="text-align:center">business name</th>			
			<th style="text-align:center">ชื่อ-นามสกุล</th>
			<th style="text-align:center">เวลาสมัคร</th>	
			<th style="text-align:center">สถานะ</th>			
			<th style="text-align:center">เวลาที่ active</th>
			</tr>
		</thead>
		<tbody>
        <?php
		$i = 1;
		foreach($q->result() as $r){
			echo '<tr>
			<td align="center">'.$i.'</td>
			<td align="center">'.$r->username.'</td>
			<td align="center">'.$r->bu_username.'</td>
			<td align="center">'.$r->name.'</td>
			<td align="center">'.$r->ac_time.'</td>
			<td align="center">'.active_abo($r->active_abo).'</td>
			<td align="center">'.$r->active_time.'</td>';
			$i++;
		}
		?>
        </tbody>
        </table>
        <?php //echo $pagination; ?>
    </div>
</div>
<div id="customers_action" class="row" style="display:none;"></div>
<script>
$(function(){
	
});
$(function(){
	$('#datepicker').change(function (){
		var x = document.getElementById('datepicker').value;
		var result = x.split('/');
		var x = result[2]+"-"+result[0]+"-"+result[1];//new order date from datepicker
		 location.replace(site_url+'/customers/active/'+x);
	});	
});
</script>