<div class="col-md-12">
	<form name="customers_transfer" id="customers_transfer" method="post" class="form-horizontal" role="form">
    
    	<input type="hidden" name="action" value="1">
        <input type="hidden" name="id" value="<?php echo $r->id; ?>">
		<fieldset>
        	<legend>เพิ่มรายการแจ้งโอนเงิน</legend>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">รหัสสมาชิก</label>
                <div class="col-sm-2">
                    <p class="form-control-static"><?php echo $r->id; ?></p>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
                <div class="col-sm-2">
                    <p class="form-control-static"><?php echo $r->name; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">จำนวนเงิน</label>
                <div class="col-sm-2">
                    <input type="text" id="credit" class="form-control required number" name="money" onfocus="showRef()" />
                </div>
				<label class="col-sm-2 control-label">หมายเหตุ</label>
				<div id="ref" class="col-sm-2">
                    <input type="text" class="form-control" name="reference" readonly />
                </div>
            </div>
            
		</fieldset>
        <hr>
        <div id="action_massage"></div>
        
        <div class="form-group">
			<div class="col-sm-offset-3 col-sm-3">
            	<button type="submit" class="btn btn-primary">บันทึก</button> 
            	<button type="button" class="btn btn-default" onClick="close_action();">ปิด</button>
			</div>
		</div>
        
    </form>
</div>
<script>
$(function(){
	$('#customers_transfer').validate({
		submitHandler:function(form){
			$.ajax({type:'POST',url:site_url+'/customers/transfer',data:$(form).serialize(),success:function(data){
				if(data=='1'){
					$('#action_massage').html('<div class="alert alert-success">บันทึกข้อมูลเรียนร้อยแล้ว</div>');
				}else{
					$('#action_massage').html('<div class="alert alert-danger">ไม่สามารถบันทึกข้อมูลได้</div>');
				}
			}});
		}
	});	
});
function showRef() {
	document.getElementById('ref').innerHTML = '<input type="text" id="reference" class="form-control" name="reference" onfocus="chkCredit()"/>';
}
function chkCredit() {
	var x = document.getElementById('credit');
	if(x.value == ""){
		alert('กรุณาใส่จำนวนเครดิตด้วยค่ะ');
		document.getElementById('credit').focus();
	}
}
</script>