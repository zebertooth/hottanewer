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
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูล</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../admin/complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">';

             echo' 
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อ-สกุล</label>
                                    <div class="col-md-9">
 <input type="text" id="name" name="name" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ที่อยู่</label>
                                    <div class="col-md-9">
 <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">เบอร์โทรศัพท์</label>
                                    <div class="col-md-9">
 <input type="text" id="telephone" name="telephone" class="required form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">อีเมล์</label>
                                    <div class="col-md-9">
 <input type="text" id="email" name="email" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ตำเเหน่ง</label>
                                    <div class="col-md-9">
 <input type="text" id="position" name="position" class="required form-control">
                                    </div>
                                </div>
<hr>
<p>ข้อมุลรหัสเข้าใช้งาน</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Usernane</label>
                                    <div class="col-md-9">
 <input type="text" id="username" name="username" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Password</label>
                                    <div class="col-md-9">
 <input type="text" id="password" name="password" class="required form-control">
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col-md-9">
 ';
?>

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


                                    <button type="submit"  class="btn btn-primary">เพิ่มข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>
   