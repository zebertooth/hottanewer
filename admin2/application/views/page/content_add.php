<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เพิ่มข้อมูล</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่ม</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="container-fluid">
<?php
echo'
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../page/contentadd_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                              <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ภาพประกอบ</label>
                                    <div class="col-md-9">
 <input type="file"  name ="picture" id="picture">
                                    </div>
                                </div>
<p>หัวข้อ</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-success">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="title"   name="title" rows="4" cols="50"></textarea>
                                    </div>
                                </div>

<hr>
<p>คีย์เวิสด์</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-success">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="keyword"   name="keyword" rows="4" cols="50"></textarea>
                                    </div>
                                </div>

<hr>
<p>รายละเอียดย่อ</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-success">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50"></textarea>
                                    </div>
                                </div>

<hr>
<p>รายละเอียด</p>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-danger">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail"   name="detail" rows="4" cols="50" class="ckeditor"></textarea>';
?>
<script>
         CKEDITOR.replace('detail' ,{
		filebrowserImageBrowseUrl : '<?php echo $this->config->item('pathuploader');?>'
	});

</script>
<?php 
echo' </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"></label>
                                    <div class="col-md-9">
    <input type="hidden" name="process" value="1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
 <div class="card">
        <div class="card-body">
    <div class="form-group col-md-4">
      <label for="inputState">หมวดหมู่</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">ย่อย</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
                                    <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>
   