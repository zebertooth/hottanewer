<?php

$thumb =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgMain img-fluid">';
$cover =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgCover">';

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
                        <h4 class="page-title">เพิ่มเรื่อง</h4> 

                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เรื่อง</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="./article_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
  <div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">หัวข้อ</label>
                                    <div class="col-md-12">
                                        <input type="text" id="topic" name="topic" class="required form-control">
                                    </div>
                                </div>
  <div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">Link ภายนอก</label>
                                    <div class="col-md-12">
                                        <input type="text" id="link" name="link" class="form-control">
<br/>
                                        <input type="text" id="link_out" name="link_out" class="form-control" value="0">
<p>1 เเสดงผล 0 ปกติ</p>
                                    </div>
                                </div>
      <div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">รายละเอียด</label>
 <div class="col-sm-12">
<button type="button" class="btn btn-outline-success m-b-10" id="AddImgCk"><i class=" fas fa-camera"></i> เพิ่มภาพ ไฟล์สื่อ</button>
<textarea class="form-control"  id="detail"   name="detail" class="ckeditor" rows="20" cols="50"></textarea>
                                        </div>
                                    </div>
                        <div class="card">
                            <div class="card-body">
                              
<div class="form-group row">
                                    <label class="col-md-12" for="disabledTextInput">รายละเอียดย่อ<br/>
<small class="text-muted"> เเสดงรายละเอียดย่อหน้าเว็บ</small>
</label>
 <div class="col-sm-12">
<textarea class="form-control"  id="short_detail"   name="short_detail" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>



                              
                            </div>
                        </div>
  <!-- Tabs -->
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#cover" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Cover ปกหัวเรื่อง</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#seo" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">SEO</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="cover" role="tabpanel">
                                    <div class="p-20">
     <div class="form-group">
                                    <label>ภาพปก Cover<small class="text-muted"> ภาพปกเเสดงบนหัวเว็บ</small></label>
<img id="imgAvatar" class="img-responsive">
  <div class="text-center"><a id="AddCoverImg" style="cursor: pointer;">'.$cover.'</a></div>
<div> <input name="ImgCover" type="hidden" id="ImgCover" size="50"></div>
<div class=clear></div>
<p>ภาพที่เหมาะสมควรมีขนาด '.$this->config->item('sizecover').' </p>
</div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="seo" role="tabpanel">
                                    <div class="p-20">
                                     <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="title" name="title" class="required form-control">
                                    </div>
                                </div>
                                     <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Keyword</label>
                                    <div class="col-md-9">
                                        <input type="text" id="keyword1" name="keyword1" class="required form-control">
                                    </div>
                                </div>
                                     <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Description</label>
                                    <div class="col-md-9">
<textarea class="form-control"  id="description"   name="description" rows="4" cols="50"></textarea>     
</div>
                                </div>
<!--END-->    
                                    </div>
                                </div>
                            </div>
                        </div>
                          <!-- Card -->

                    </div>
<!--------------------RIGHT------------------->
 <div class="col-md-3">
                            <div class="card">

  <a class="card-header link" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-1" aria-expanded="true" aria-controls="Toggle-1">

                                    <label>อัพเดท เผยเเพร่</label> <i class="fas fa-chevron-circle-down right" aria-hidden="true"></i>
                                </a>
 <div id="Toggle-1" class="collapse show multi-collapse">
                                    <div class="card-body widget-content">
  <div class="form-group row">
                                    <label class="col-md-3">สถานะ</label>
                                    <div class="col-md-9">';
?>
                                        <div class="custom-control custom-radio">
 <input type="radio" class="custom-control-input" id="customControlValidation1" name="status" value="1" checked>
                                            <label class="custom-control-label" for="customControlValidation1">ออนไลน์</label>
                                        </div>
                                         <div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" id="customControlValidation2" name="status" value="2">
                                            <label class="custom-control-label" for="customControlValidation2">ฉบับร่าง</label>
                                        </div>
                                         
        <?php                         echo'   </div>
                                </div>
  <ul class="list-style-none">
 
</ul>
                                    </div>
                                </div>
<div class="card-footer"> <button type="submit"  class="btn btn-info btn-sm float-right">เผยเเพร่ข้อมูล</button></div>
                                

</div>
                        <div class="card">
                            <div class="card-body">
  <div class="form-group row">

                                    <label class="col-md-12">หมวดหมู่</label>
                                    <div class="col-md-12">';
$str = '';
$orderId5 = explode(',',$str); 
$query = $this->db->query("select * from system_category");

foreach ($query->result() as $Crow){
        $id = $Crow->id;
        $name = $Crow->name;



		if(in_array($id, $orderId5))
		{
		  echo ' <div class="custom-control custom-checkbox mr-sm-2">

                                            <input type="checkbox" class="custom-control-input"   id="customControlAutosizing'.$id.'" name="category[]" value="'.$id.'" checked>
<label class="custom-control-label" for="customControlAutosizing'.$id.'"><p class="normal">'.$name.'</p></label>

                                        </div>

';
		 }else
		 {
		  echo' <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing'.$id.'" name="category[]" value="'.$id.'">
<label class="custom-control-label" for="customControlAutosizing'.$id.'"> <p class="normal">'.$name.' </p></label></div>


';
		 }// end if

	}//end while
echo'

                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ป้ายกำกับ <small class="text-muted">เช่น xx,xxx,xxxx</small></label>
			<input id="form-tags-2" name="keyword" type="text" class="form-control">
           
                                </div>
                                <div class="form-group">
                                    <label>ภาพประกอบ<small class="text-muted"> ภาพประกอบตามส่วนเว็บ</small></label>
<p>ภาพที่เหมาะสมควรมีขนาด '.$this->config->item('thumbnail').'</p>
<img id="imgAvatar" class="img-responsive">

  <div class="text-center"><a id="AddMainImg" style="cursor: pointer;">'.$thumb.'</a></div>
<div> <input name="ImgMain" type="hidden" id="ImgMain" size="50"></div>
<div class=clear></div>
</div>


                                        </div>           
                                </div>
                             
     <div class="border-top">
                                <div class="card-body">
    <input type="hidden" name="process" value="1" />
                                </div>


                            </div>
                            </div>
                        </div>
<!--END-->

</form>';
?>

</div>

   