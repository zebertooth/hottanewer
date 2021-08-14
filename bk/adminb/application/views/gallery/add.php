<?php
$cover =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgMain img-fluid">';
?>
<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เพิ่ม Gallery</h4>&nbsp;<a href="<?php echo site_url('gallery/category/all'); ?>" class="btn btn-outline-info btn-sm">รายการทั้งหมด</a>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="./Addcomplete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">หัวข้อ</label>
                                    <div class="col-md-9">
                                        <input type="text" id="topic" name="topic" class="required form-control" >
                                    </div>
                                </div>
 <div class="form-group row">

                                    <label class="col-md-3">หมวดหมู่</label>
                                    <div class="col-md-9">';
$str = '';
$orderId5 = explode(',',$str); 
$query = $this->db->query("select * from gallery_category");

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

  <div class="form-group">
                                    <label>ภาพ<small class="text-muted"> </small></label>
<img id="imgAvatar" class="img-responsive">

  <div class="text-center"><a id="AddMainImg" style="cursor: pointer;">'.$cover.'อัพภาพเเกลลอรี่</a></div>
<div> <input name="ImgMain" type="hidden" id="ImgMain" size="50"></div>
<div class=clear></div>
</div>


</div></div>
                       <div class="card">
                            <div class="card-body">


                                    <button type="submit"  class="btn btn-primary">เผยเเพร่</button>

</div></div>
</div>
                           </div>
</form>';
?>

                    </div>
   