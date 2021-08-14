 <script type="text/javascript" src="<?php echo base_url(); ?>items/ckeditor/ckeditor.js"></script>
    <section class="content-header">
      <h1>
	EDIT  PAGE
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li class="active"><?php echo $r->header; ?></li>
      </ol>
    </section>
    <section class="content">
<div class="row">
	<div class="col-md-12">
  <div class="box">
        <div class="box-body">
    
<form method="post" role="form">
	<input type="hidden" name="page" value="<?php echo $r->page; ?>">
	<div class="form-group">
		<label>หัวข้อ</label>
		<input type="text" class="form-control" id="header" name="header" value="<?php echo $r->header; ?>">
	</div>
	<div class="form-group">
		<label>รายละเอียด</label>
		<textarea class="form-control ckeditor" id="content" name="content" rows="20"><?php echo $r->content; ?></textarea>
	</div>

	<button type="submit" class="btn btn-default">SAVE</button>
</form>

    </div>
</div>    </div>
</div></section>