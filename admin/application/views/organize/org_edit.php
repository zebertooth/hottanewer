<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('system_org');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
if ($row->pic1 ==''){
$pic1 =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="pic1">';
}else{
$pic1= '<img src="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').''.$row->pic1.'" height="150" class="pic1">';
}
if ($row->pic3 ==''){
$pic3 =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="pic3">';
}else{
$pic3= '<img src="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').''.$row->pic3.'" height="150" class="pic3">';
}
if ($row->pic2 ==''){
$pic2 =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="pic2">';
}else{
$pic2= '<img src="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').''.$row->pic2.'" height="150" class="pic2">';
}
if ($query->num_rows() < 1){

    header("Location: ".site_url()."organize");
    exit(0);
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
                        <h4 class="page-title">Edit Organize</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เเก้ไขข้อมูลบุคคล</li>
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
                                    <label class="col-md-3" for="disabledTextInput">ลำดับ</label>
                                    <div class="col-md-3">
                                        <input type="text" id="orderID" name="orderID" class="required form-control" value='.$row->orderID.'>
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
<div class="form-group">
<h4>บุคคลที่ 1</h4>
<div class="row">
                                    <label class="col-md-2">ภาพประจำตัว</label>
<div class="col-md-4">
<img id="imgAvatar" class="img-responsive">
  <div class="text-center"><a id="Addpic1" style="cursor: pointer;">'.$pic1.'</a></div>
<div> <input name="pic1" type="hidden" id="pic1" size="50" value="'.$row->pic1.'"></div>
<br/>
</div>
</div>
<div class="row">
                   <label class="col-md-3">ชื่อ-สกุล</label><div class="col-md-8">
                                        <input type="text" id="name" name="name" class="required form-control" value="'.$row->name.'">

                                    </div>
</div>
<br/>
<div class="row">
                   <label class="col-md-3">ตำเเหน่ง</label><div class="col-md-8">
                               <input type="text" id="position" name="position" class="required form-control" value='.$row->position.'>
<br/>
                               <input type="text" id="show1" name="show1" class="required form-control" value='.$row->show1.'>
<p><font color=red>เเสดง 1 ไม่เเสดงผล 0</font></p>

                                    </div>
</div>
</div>                     
<hr>
  <div class="form-group">
<h4>บุคคลที่ 2( ถ้ามี)</h4>
<div class="row">
                                    <label class="col-md-2">ภาพประจำตัว</label>
<div class="col-md-4">
<img id="imgAvatar" class="img-responsive">
  <div class="text-center"><a id="Addpic2" style="cursor: pointer;">'.$pic2.'</a></div>
<div> <input name="pic2" type="hidden" id="pic2" size="50" value="'.$row->pic2.'"></div>
<br/>
</div>
</div>
<div class="row">
                   <label class="col-md-3">ชื่อ-สกุล</label><div class="col-md-8">
                                        <input type="text" id="name2" name="name2" class="required form-control" value="'.$row->name2.'">
                                    </div>
</div>
<br/>
<div class="row">
                   <label class="col-md-3">ตำเเหน่ง</label><div class="col-md-8">
                               <input type="text" id="position2" name="position2" class="required form-control" value='.$row->position2.'>
<br/>
                               <input type="text" id="show2" name="show2" class="required form-control" value='.$row->show2.'>
<p><font color=red>เเสดง 1 ไม่เเสดงผล 0</font></p>

                                    </div>
</div>
</div>                
<hr>
  <div class="form-group">
<h4>บุคคลที่ 3( ถ้ามี)</h4>
<div class="row">
                                    <label class="col-md-2">ภาพประจำตัว</label>
<div class="col-md-4">
<img id="imgAvatar" class="img-responsive">
  <div class="text-center"><a id="Addpic3" style="cursor: pointer;">'.$pic3.'</a></div>
<div> <input name="pic3" type="hidden" id="pic3" size="50" value="'.$row->pic3.'"></div>
<br/>
</div>
</div>
<div class="row">
                   <label class="col-md-3">ชื่อ-สกุล</label><div class="col-md-8">
                                        <input type="text" id="name3" name="name3" class="required form-control" value="'.$row->name3.'">
                                    </div>
</div>
<br/>
<div class="row">
                   <label class="col-md-3">ตำเเหน่ง</label><div class="col-md-8">
                               <input type="text" id="position3" name="position3" class="required form-control" value='.$row->position3.'>
<br/>
                               <input type="text" id="show3" name="show3" class="required form-control" value='.$row->show3.'>
<p><font color=red>เเสดง 1 ไม่เเสดงผล 0</font></p>
                                    </div>
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
   