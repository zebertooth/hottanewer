<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('system_gallery');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
if ($row->pic ==''){
$thumb =  '<img src="'.base_url().'items/icon/cover.png" height="150" class="ImgMain img-fluid">';
}else{
$thumb = '<img src="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').'_thumbs/'.$row->pic.'" height="150" class="ImgMain img-fluid">';
}
if ($query->num_rows() < 1){

    header("Location: ".site_url()."page");
    exit(0);
}
?>
<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
 <h4 class="page-title">เเก้ไข Gallery</h4>&nbsp;<a href="<?php echo site_url('gallery/add'); ?>" class="btn btn-outline-info btn-sm">เพิ่มเเกลลอรี่ใหม่</a>&nbsp;<a href="<?php echo site_url('gallery/category/all'); ?>" class="btn btn-outline-info btn-sm">รายการทั้งหมด</a>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">เเก้ไขหน้าต่าง</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../edit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">หน้า</label>
                                    <div class="col-md-9">
                                        <input type="text" id="topic" name="topic" class="required form-control" value='.$row->topic.'>
                                    </div>
                                </div>
                              <div class="form-group row">

                                    <label class="col-md-3">เเสดงผลบน</label>
                                    <div class="col-md-9">';
$str = $row->category;
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
   <input type="hidden" name="id" id="id" value="'.$row->id.'" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
                       <div class="card">
                            <div class="card-body">

  <div class="form-group">
                                    <label>ภาพหน้าปก<small class="text-muted"> </small></label>
<p>ภาพที่เหมาะสมควรมีขนาด</p>
<img id="imgAvatar" class="img-responsive">

  <div class="text-center"><a id="AddMainImg" style="cursor: pointer;">'.$thumb.'ตั้งค่าภาพหน้าปก</a></div>
<div> <input name="ImgMain" type="hidden" id="ImgMain" size="50"  value="'.$row->pic.'"></div>
<div class=clear></div>
</div>


</div></div>
                       <div class="card">
                            <div class="card-body">


                                    <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>

                    </div>
   