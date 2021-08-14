<div class="page-header">
  <h1>ข้อมูลลูกค้า <small>จัดการข้อมูลลูกค้า</small><p style="float:right;font-size:20px;top:15px;position:relative;">รวมค่าคอมในระบบ <?php echo number_format($this->Allcom,2); ?>  บาท</p></h1>
</div>
<div id="customers_list" class="row">
	<div class="col-md-12">
    	<form id="company_search" name="company_search" class="form-inline" method="post" role="form">
			<input type="hidden" name="action" value="1">
			<input type="hidden" id="id" name="id" value="">
			<input type="hidden" id="commiss" name="commiss" value="">
            <input type="text" name="search_id" id="search_id" class="form-control" placeholder="รหัสสมาชิก" />
            <input type="text" name="search_url" id="search_url" class="form-control" placeholder="ชื่อเข้าใช้" />
            <input type="text" name="search_name" id="search_name" class="form-control" placeholder="ชื่อสมาชิก" />
            <input type="text" name="search_telephone" id="search_telephone" class="form-control" placeholder="โทรศัพท์" />
            <?php echo selectbox(
                $this->db->select('province_id,province_name')->order_by('province_name','ASC')->get('system_province'),
                'search_province','',false,'class="form-control"'); ?>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    	<hr>
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr><th>รหัส</th><th>ชื่อเข้าใช้</th><th>Business name</th><th>ชื่อ - นามสกุล</th><th>อีเมลล์</th><th>โทรศัพท์</th>
			<th>จังหวัด</th>			
			<th>ยอด</th><th>ค่าคอม</th><th></th></tr>
		</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>'.$r->id.'</td>
			<td>'.$r->username.'</td>
			<td>'.$r->bu_username.'</td>
			<td>'.$r->name.'</td>
			<td>'.$r->email.'</td>
			<td>'.$r->telephone.'</td>
			<td>'.$r->province_name.'</td>
			<td class="text-right">'.$r->cash_online.'</td>
			<td id="com'.$r->id.'" align="right">'.$r->commission.'</td>
			<td><img src="'.base_url().'items/icon/edit_action.png" width="16" height="16" style="cursor:pointer" onclick="chkEdit('.$r->id.','.$r->commission.');"></td>
			</tr>';
		}
		?>
        </tbody>
        </table>
        <?php echo $pagination; ?>
    </div>
</div>
<div id="customers_action" class="row" style="display:none;"></div>
<script>
$(function(){
	
});
function chkEdit(id,com) {
	var x = document.getElementById('com'+id);
	var y = document.getElementById('id');
	x.innerHTML = "<input id='ed' name='ed' type='text' value="+com+" style='width:70px;' onblur='autoCommission("+id+","+com+")' >";
	document.getElementById('ed').focus();
	y.value = id;
}
function autoCommission(id,com) {
	var getCom = document.getElementById('ed');
	var setCom = document.getElementById('commiss');
	setCom.value = getCom.value;
	var com1 = parseInt(com);
	var com2 = parseInt(setCom.value);
	if(com1 != com2){
		if(confirm('ยืนยันการเเก้ไข')){
			document.company_search.submit();
		}else{
			document.getElementById('ed').style.display = 'none';
			document.getElementById('com'+id).innerHTML = com;
		}
	}else{
		document.getElementById('ed').style.display = 'none';
		document.getElementById('com'+id).innerHTML = com;
	}
}
function edit(id){
	$('#customers_list').hide();
	$('#customers_action').show();
	$('#customers_action').html('<div class="col-md-12 text-center"><img src="'+base_url+'items/icon/ajax-loader.gif"></div>');
	$.ajax({type:'POST',url:site_url+'/customers/edit',data:'id='+id,success:function(data){
		$('#customers_action').html(data);
	}});
}
function transfer(id){
	$('#customers_list').hide();
	$('#customers_action').show();
	$('#customers_action').html('<div class="col-md-12 text-center"><img src="'+base_url+'items/icon/ajax-loader.gif"></div>');
	$.ajax({type:'POST',url:site_url+'/customers/transfer',data:'id='+id,success:function(data){
		$('#customers_action').html(data);
	}});
}
function close_action(){
	$('#customers_action').hide();
	$('#customers_list').show();
}
</script>