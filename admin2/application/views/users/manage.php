<?php
$name = $this->session->userdata('id');
$condition = "id =" . "'" . $name . "'";
$this->db->select('*');
$this->db->from('system_users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
?>
<div id="overlay"></div>
<div id="MainUpImg"></div>
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
                        <h4 class="page-title">เเก้ไขรหัสผ่าน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เเก้ไขรหัสผ่าน</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
<?php
echo'
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../orgedit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รหัสผ่านเดิม</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="name" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รหัสผ่านใหม่</label>
                                    <div class="col-md-9">
                                        <input type="text" id="position" name="position" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ยืนยันรหัสผ่าน</label>
                                    <div class="col-md-9">
                                        <input type="text" id="position" name="position" class="required form-control">
                                    </div>
                                </div>                     
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"></label>
                                    <div class="col-md-9">
    <input type="hidden" name="process" value="1" />
   <input type="hidden" name="id" id="id" value="'.$row->id.'" />
                                    <button type="submit"  class="btn btn-primary">เเก้ไขข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                           </div>
</form>';
?>

                    </div>
   