<div class="page-header">
	<h1>ตั้งค่าบริการ</h1>
</div>

<form method="POST" action="<?php echo site_url('service/save'); ?>" class="form-horizontal" role="form">
<?php foreach($q->result() as $r){ ?>
        <div class="row">
        	<div class="col-md-8">
            	<h4><?php echo $r->name; ?></h4>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-sm-6 control-label">ค่าบริการ</label>
                    <div class="col-sm-6"><input type="text" class="form-control" name="<?php echo $r->id; ?>[1]" value="<?php echo $r->service; ?>"></div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-sm-6 control-label">ส่วนลด</label>
                    <div class="col-sm-6"><input type="text" class="form-control" name="<?php echo $r->id; ?>[2]" value="<?php echo $r->discount; ?>"></div>
                </div>
            </div>
        </div>
        <hr>
<?php } ?>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8"><button type="submit" class="btn btn-default">บันทึก</button></div>
</div>
</form>

