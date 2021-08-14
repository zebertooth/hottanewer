<?php
$name = $this->session->userdata('id');
$condition = "id =" . "'1'";
$this->db->select('*');
$this->db->from('system_config');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
?>
 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ตั้งค่าเว็บ</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ตั้งค่าเว็บ</li>
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
    <div id="form-container" class="col-md-12"></div>
<?php
echo'
            <form method="post" id="signup-form" autocomplete="off">
    <div class="row">

                                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
    <div id="form-container">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Facebook</label>
                                    <div class="col-md-9">
                                        <input type="text" id="facebook" name="facebook" class="required form-control" value="'.$row->facebook.'" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">โทร</label>
                                    <div class="col-md-9">
                                        <input type="text" id="tel" name="tel" class="required form-control" value="'.$row->tel.'" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">อีเมลหลัก</label>
                                    <div class="col-md-9">
                                        <input type="text" id="email1" name="email1" class="form-control" value="'.$row->email1.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ที่ตั้ง(ลติจูด)</label>
                                    <div class="col-md-9">
                                        <input type="text" id="latitude" name="latitude" class="form-control" value="'.$row->latitude.'">
                                    </div>
                                </div>     
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ที่ตั้ง(ลองจิจูด longitude)</label>
                                    <div class="col-md-9">
                                        <input type="text" id="lontitude" name="lontitude" class="form-control" value="'.$row->lontitude.'">
                                    </div>
                                </div>      
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">API Google Map</label>
                                    <div class="col-md-9">
                                        <input type="text" id="api_key" name="api_key" class="form-control" value="'.$row->api_key.'">
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
                        </div>               </div>
                    </div>
                           </div>
</form>';
?>

                    </div>
