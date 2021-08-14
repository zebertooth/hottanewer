<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('system_category');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
if ($row->status =='1'){
$checked = 'checked';
} if ($row->status =='2'){
$checked2 = 'checked';
}
if ($row->cover ==''){
$cover =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgCover img-fluid">';
}else{
$cover = '<img src="'.$this->config->item('siteurl').'/uploads/article/'.$row->cover.'" height="150" class="ImgCover img-fluid">';
}
if ($row->thumb ==''){
$thumb =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgMain img-fluid">';
}else{
$thumb = '<img src="'.$this->config->item('siteurl').'/uploads/article/'.$row->thumb.'" height="150" class="ImgMain img-fluid">';
}
if ($query->num_rows() < 1){

    header("Location: ".site_url()."article");
    exit(0);
}
?>
<script language="JavaScript">
	function showPreview(ele)
	{
			$('#imgAvatar').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {
			
                var reader = new FileReader();
				
                reader.onload = function (e) {
                    $('#imgAvatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(ele.files[0]);
            }
	}
</script>

<div id="overlay"></div>
<div id="MainUpImg"></div>
   <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เเก้ไข หมวด</h4>  &nbsp;<a href="<?php echo site_url('content/article_add'); ?>" class="btn btn-outline-info btn-sm">สร้างหมวดใหม่</a>

                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เเก้ไขหมวด</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../categoryedit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
  <div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">หมวด</label>
                                    <div class="col-md-12">
                                        <input type="text" id="name" name="name" class="required form-control" value="'.$row->name.'">
                                    </div>
                                </div>

                        <div class="card">
                            <div class="card-body">    
   <div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">หัวข้อ</label>
                                    <div class="col-md-12">
                                        <input type="text" id="topic" name="topic" class="required form-control" value="'.$row->topic.'">
                                    </div>
                                </div>               
<div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">รายละเอียดย่อ<br/>
<small class="text-muted"> รายละเอียดสั้นความยาวไม่เกิน 250 ตัวอักษร</small>
</label>
 <div class="col-sm-12">
<textarea class="form-control"  id="short_detail"   name="short_detail" rows="4" cols="50">'.$row->short_detail.'</textarea>
                                        </div>
                                    </div>


                              
                            </div>
                        </div>
                        <div class="card">

<textarea class="form-control ckeditor"  id="detail"   name="detail" rows="2">'.$row->text_cover.'</textarea>     

                        </div>
                        <div class="card">
                            <div class="card-body">
<h3>ตั้งค่า SEO </h3>
  <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="title" name="title" class="required form-control" value="'.$row->title.'">
                                    </div>
                                </div>
                                     <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Keyword</label>
                                    <div class="col-md-9">
                                        <input type="text" id="keyword" name="keyword" class="required form-control" value="'.$row->keyword.'">
                                    </div>
                                </div>
                                     <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Description</label>
                                    <div class="col-md-9">
<textarea class="form-control"  id="description"   name="description" rows="4" cols="50">'.$row->description.'</textarea>     
        </div>
</div>
</div>
                        </div>


                    </div>
<!--------------------RIGHT------------------->
 <div class="col-md-3">
                            <div class="card">

  <a class="card-header link" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-1" aria-expanded="true" aria-controls="Toggle-1">


                                    <label>อัพเดท เผยเเพร่</label> <i class="fas fa-chevron-circle-down right" aria-hidden="true"></i>
                                </a>
 <div id="Toggle-1" class="collapse show multi-collapse">

                                    <div class="card-body widget-content">
       <div class="form-group">
                                    <label>ภาพปก Cover<small class="text-muted"> ภาพปกเเสดงบนหัวเว็บ</small></label>
<img id="imgAvatar" class="img-responsive">
  <div class="text-center"><a id="AddCoverImg" style="cursor: pointer;">'.$cover.'</a></div>
<div> <input name="ImgCover" type="hidden" id="ImgCover" size="50" value="'.$row->cover.'"></div>
<div class=clear></div>
<p>ภาพที่เหมาะสมควรมีขนาด '.$this->config->item('sizecover').' </p>
</div>        
  <div class="form-group row">
                                    <label class="col-md-3">สถานะ</label>
                                    <div class="col-md-9">';
?>
                                        <div class="custom-control custom-radio">
 <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="1" <?php  if ($row->status =='1'){ echo'checked'; } ?>>
                                            <label class="custom-control-label" for="customControlValidation1">ออนไลน์</label>
                                        </div>
                                         <div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="2" <?php  if ($row->status =='2'){ echo'checked'; } ?>>
                                            <label class="custom-control-label" for="customControlValidation2">ฉบับร่าง</label>
                                        </div>
                                         
        <?php                         echo'   </div>
                                </div>

                                    </div>

                                </div>

                                
<div class="card-footer"><a href="&id=8&action=trash">ย้ายไปถังขยะ </a> <button type="submit"  class="btn btn-info btn-sm float-right">อัพเดท</button></div>
</div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ภาพประกอบ<small class="text-muted"> ภาพประกอบตามส่วนเว็บ</small></label>
<img id="imgAvatar" class="img-responsive">

  <div class="text-center"><a id="AddMainImg" style="cursor: pointer;">'.$thumb.'ตั้งค่ารูปประจำเรื่อง</a></div>
<div> <input name="ImgMain" type="hidden" id="ImgMain" size="50" value="'.$row->thumb.'"></div>
<div class=clear></div>
</div>


                                        </div>           
                                </div>
                             
     <div class="border-top">
                                <div class="card-body">
    <input type="hidden" name="process" value="1" />
   <input type="hidden" name="id" id="id" value="'.$row->id.'" />
                                </div>


                            </div>
                            </div>
                        </div>
<!--END-->

</form>';
?>

</div>

   