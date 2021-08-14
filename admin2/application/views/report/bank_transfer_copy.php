<form method="POST" action="<?php echo site_url('topup/bank_transfer_copy'); ?>" class="form-horizontal" role="form">

	<input  type="hidden" name="id" value="new" />
	<input  type="hidden" name="company_id" value="<?php echo $r->company_id; ?>" />
    <input  type="hidden" name="to_bank2" value="<?php echo $r->to_bank; ?>" />
    <input  type="hidden" name="from_bank" value="<?php echo $r->from_bank; ?>" />
    <input  type="hidden" name="from_type" value="<?php echo $r->from_type; ?>" />
    
	<fieldset>
    <legend>คัดลอกรายการโอนเงิน</legend>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">ชื่อร้าน</label>
        <div class="col-sm-2">
        	<p class="form-control-static"><?php echo $r->name; ?></p>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">จำนวนเงิน</label>
        <div class="col-sm-2">
			<input type="text" class="form-control" name="money" value="<?php echo $r->money; ?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">เวลา</label>
        <div class="col-sm-2">
			<input type="text" class="form-control" name="time" value="<?php echo $r->time; ?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">จากธนาคาร</label>
        <div class="col-sm-2">
			<?php echo selectbox_array($this->bank,'to_bank',$r->to_bank,false,'class="form-control"'); ?>
        </div>
    </div>
    
    <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
        	<button type="submit" class="btn btn-primary">บันทึก</button>  
            <button type="button" class="btn btn-default" onClick="$('#div_edit').html('');">ปิด</button>
        </div>
	</div>
    <hr> 
    </fieldset>
    
</form>