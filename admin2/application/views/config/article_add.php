            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Article</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มบทความ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <form id="form_order" method="POST" class="form-horizontal" role="form" action="./article_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-8 col-xs-8 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">หัวข้อ</label>
                                    <div class="col-md-9">
                                        <input type="text" id="topic" name="topic" class="required form-control" placeholder="ไม่ควรยาวเกินไป">
                                    </div>
                                </div>
<div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียดย่อ</label>
 <div class="col-sm-9">
<textarea class="form-control"  id="description"   name="description"></textarea>
                                        </div>
                                    </div>

                           
                                
                                <div class="form-group row">
                                    <label class="col-md-3">สถานะ</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="1" checked>
                                            <label class="custom-control-label" for="customControlValidation1">ออนไลน์</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="2" required>
                                            <label class="custom-control-label" for="customControlValidation2">ฉบับร่าง</label>
                                        </div>
                                         
                                    </div>
                                </div>
                    
                                <div class="form-group row">
                                    <label class="col-md-3">ภาพประกอบ</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์ภาพ</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
 <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียด</label>
 <div class="col-sm-9">
                                            <textarea class="form-control"  id="detail"   name="detail" class="ckeditor" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียด</label>
                                    <div class="col-md-9">
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--------------------RIGHT------------------->
 <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
     <div class="form-group row">
                                    <label class="col-md-3 m-t-15">หมวดหมู่</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control custom-select" name="category_id" style="width: 100%; height:36px;">
                                            <option>เลือก</option>
                                          
                                                <option value="1">บทความ</option>
                                                <option value="2">กิจกรรม</option>
                                                <option value="3">โครงการ</option>
                             
                                        </select>
                                    </div>
                                </div>
  <div class="form-group row">
                                    <label class="col-md-3">หมวดหมู่</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                            <label class="custom-control-label" for="customControlAutosizing1">First One</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                            <label class="custom-control-label" for="customControlAutosizing2">Second One</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing3">
                                            <label class="custom-control-label" for="customControlAutosizing3">Third One</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ป้ายกำกับ <small class="text-muted">โครงการ</small></label>
                                    <input type="text" name="keyword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>ภาพประกอบ<small class="text-muted"> ภาพประกอบตามส่วนเว็บ</small></label>
                                 
                                </div>
                             
     <div class="border-top">
                                <div class="card-body">
    <input type="hidden" name="process" value="1" />
                                    <button type="submit"  class="btn btn-primary">เพิ่มข้อมูล</button>
                                </div>


                            </div>
                            </div>
                        </div>
<!-----------------------END-------------------------------->
                           </div>
</form>
                    </div>
   