
<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เเก้ไข</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">เเบนเนอร์</li>
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
if ($this->uri->segment(3)==2):
$return = 'fusion';
else:
$return = 'slice';
endif;
echo'
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                              <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Banner Thai</label>
                                    <div class="col-md-9">

 <input type="file"  name ="picture" id="picture">

                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Banner ENG</label>
                                    <div class="col-md-9">

 <input type="file"  name ="banner_eng" id="banner_eng">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อ</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="name"   name="name" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ตำเเหน่ง</label>
                                    <div class="col-md-3">
 <input class="form-control" type="text" id="type"   name="type" value="'.$this->uri->segment(3).'">
 <p class="mt-2"> 1 คือ <span class="badge badge-success">Slide head</span> / 2 คือ <span class="badge badge-primary">Fusion Time</span></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ลำดับ</label>
                                    <div class="col-md-3">
 <input class="form-control" type="text" id="orderindex"   name="orderindex">
 <p class="mt-2"> ลำดับตำเเหน่งเเบนเนอร์</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Link</label>
                                    <div class="col-md-6">
 <input class="form-control" type="text" id="link"   name="link">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Video</label>
                                    <div class="col-md-6">
 <input class="form-control" type="text" id="video"   name="video">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">เเสดงผล</label>
                                    <div class="col-md-3">
 <input class="form-control" type="text" id="show"   name="show">
 <p class="mt-2">1 เเสดงภาพ / 2 วิดีโอ </p>
                                    </div>
                                </div>
 <div class="form-group row">
<label class="col-md-3" for="disabledTextInput">สถานะ</label>
                                    <div class="col-md-6">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">

  <label class="form-check-label" for="inlineRadio1">ออนไลน์ <span class="badge badge-success">Online</span></label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
  <label class="form-check-label" for="inlineRadio2">ปิดชั่วคราว <span class="badge badge-danger">Ofline</span></label>
</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"></label>
                                    <div class="col-md-9">
    <input type="hidden" name="process" value="1" />
	 <input class="form-control" type="hidden" id="return"   name="return" value="'.$return.'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
                    
                       <div class="card">
                            <div class="card-body">


                                    <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>
   