<form method="POST" action="<?php echo site_url('topup/bank_transfer_check'); ?>" class="form-horizontal" role="form">

	<input  type="hidden" name="id" value="<?php echo $r->transfer_id; ?>" />
	<input  type="hidden" name="company_id" value="<?php echo $r->company_id; ?>" />
	<input  type="hidden" name="money" value="<?php echo $r->money; ?>" />
    <input  type="hidden" name="old_status" value="<?php echo $r->status; ?>" />
    
    <fieldset>
    <legend>ตรวจสอบรายการโอนเงิน</legend>
    
	<div class="form-group">
    	<label class="col-sm-2 control-label">ชื่อร้าน : </label>
        <div class="col-sm-2">
        	<p class="form-control-static"><?php echo $r->name; ?></p>
        </div>
    </div>
    <div class="form-group">
    	<label class="col-sm-2 control-label">จำนวนเงิน : </label>
        <div class="col-sm-2">
        	<p class="form-control-static"><?php echo $r->money; ?></p>
        </div>
	</div>
    <div class="form-group">
    	<label class="col-sm-2 control-label">โอนเข้า : </label>
        <div class="col-sm-2">
        	<p class="form-control-static"><?php echo $this->bank[$r->to_bank]; ?></p>
        </div>
	</div>
    <div class="form-group">
    	<label class="col-sm-2 control-label">Check OK : </label>
        <div class="col-sm-2">
			<?php echo selectbox_array(array('0'=>'0 ไม่สำเร็จ','1'=>'1 สำเร็จ'),'check',$r->check,false,'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
    	<label class="col-sm-2 control-label">Check Status : </label>
        <div class="col-sm-2">
			<?php echo selectbox_array(array('0'=>'0 ไม่สำเร็จ','1'=>'1 สำเร็จ'),'status',$r->status,false,'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">บันทึก</button>  
            <button type="button" class="btn btn-default" onClick="$('#div_edit').html('');">ปิด</button>
        </div>
    </div>
    <hr>
</form>