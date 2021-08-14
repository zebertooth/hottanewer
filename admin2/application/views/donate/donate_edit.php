<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('system_donate');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
if ($row->cover ==''){
$cover =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgMain img-fluid">';
}else{
$cover = '<img src="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').''.$row->cover.'" height="150px" width="150px"class="ImgMain img-fluid">';
}
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
                        <h4 class="page-title">Edit Donate</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เเก้ไขข้อมูล</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../donatedit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ช่องทาง</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="name" class="required form-control" value='.$row->name.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">ภาพ Background</label>
                                    <div class="col-md-3">
                                         
<p>ภาพที่เหมาะสมควรมีขนาด </p>
<img id="imgAvatar" class="img-responsive">

  <div class="text-center"><a id="AddMainImg" style="cursor: pointer;">'.$cover.'ตั้งค่าภาพหน้าปก</a></div>
<div> <input name="ImgMain" type="hidden" id="ImgMain" size="50"  value="'.$row->cover.'"></div>
<div class=clear></div>
                                         
                                    </div>
                                </div>
                    
 <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียด</label>
 <div class="col-sm-9">
<button type="button" class="btn btn-success" id="AddImgCk"><i class=" fas fa-camera"></i> เพิ่มภาพ ไฟล์สื่อ</button>
                                            <textarea class="form-control"  id="detail"   name="detail" class="ckeditor" rows="4" cols="50">
'.$row->detail.'</textarea>
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
   