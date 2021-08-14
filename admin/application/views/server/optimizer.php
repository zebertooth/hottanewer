<script>
var run = 0;
function server_CHECK(){
	var row = $('#row'+run).find('td').eq(0).html();
	if( row ){
		$.ajax({type:'POST',url:site_url+'/server/check',data:'table='+$('#row'+run).find('td').eq(0).html(),success:function(data){
			$('#row'+run).find('td').eq(2).html('<img src="'+base_url+'items/icon/1.png" width="20" height="20" />');
			server_OPTIMIZE();
		}});
	}
}
function server_OPTIMIZE(){
	$.ajax({type:'POST',url:site_url+'/server/optimize',data:'table='+$('#row'+run).find('td').eq(0).html(),success:function(data){
		$('#row'+run).find('td').eq(3).html('<img src="'+base_url+'items/icon/1.png" width="20" height="20" />');
		server_REPAIR();
	}});
}
function server_REPAIR(){
	$.ajax({type:'POST',url:site_url+'/server/repair',data:'table='+$('#row'+run).find('td').eq(0).html(),success:function(data){
		$('#row'+run).find('td').eq(4).html('<img src="'+base_url+'items/icon/1.png" width="20" height="20" />');
		server_ANALYZE();
	}});
}
function server_ANALYZE(){
	$.ajax({type:'POST',url:site_url+'/server/analyze',data:'table='+$('#row'+run).find('td').eq(0).html(),success:function(data){
		$('#row'+run).find('td').eq(5).html('<img src="'+base_url+'items/icon/1.png" width="20" height="20" />');
		run++;
		server_CHECK();
	}});
}
</script>
<div class="page-header">
	<h1>ปรับปรุงระบบฐานข้อมูล <small>ทำการ ตรวจสอบ, เพิ่มประสิทธิภาพ, ซ่อมแซม, วิเคราห์</small></h1>
</div>

<p><button type="button" class="btn btn-default" onclick="server_CHECK();">เริ่มการปรับปรุง</button></p>

<table class="table table-striped table-bordered table-hover table-condensed">
<tr>
	<th>ชื่อตาราง</th><th width="120">จำนวนข้อมูล</th><th width="80">CHECK</th><th width="80">OPTIMIZE</th><th width="80">REPAIR</th><th width="80">ANALYZE</th>
</tr>
<?php
foreach($table as $k=>$t){
	echo '<tr id="row'.$k.'">
		<td>'.$t.'</td>
		<td align="right">'.number_format($this->db->count_all($t),0,'.',',').'</td>
		<td><img src="'.base_url().'items/icon/0.png" width="20" height="20" /></td>
		<td><img src="'.base_url().'items/icon/0.png" width="20" height="20" /></td>
		<td><img src="'.base_url().'items/icon/0.png" width="20" height="20" /></td>
		<td><img src="'.base_url().'items/icon/0.png" width="20" height="20" /></td>
	</tr>';
}
?>
</table>