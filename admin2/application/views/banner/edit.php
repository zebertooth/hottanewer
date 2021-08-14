<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('banner');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
if ($row->type==2):
$return = 'fusion';
else:
$return = 'slice';
endif;
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
                        <h4 class="page-title">เเก้ไข</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">เเบนเนอร์</li>
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
                                    <label class="col-md-3" for="disabledTextInput">Banner Thai</label>
                                    <div class="col-md-9">
<div class="col-md-2 mb-2"><img src="../../../../items/uploads/banner/'.$row->banner.'" alt="'.$row->name.'" class="img-fluid img-thumbnail"></div>
 <input type="file"  name ="picture" id="picture">
  <input type="hidden"  name ="picture2" id="picture2" value='.$row->banner.'>
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Banner ENG</label>
                                    <div class="col-md-9">
<div class="col-md-2 mb-2"><img src="../../../../items/uploads/banner/'.$row->banner_en.'" alt="'.$row->name.'" class="img-fluid img-thumbnail"></div>
 <input type="file"  name ="banner_eng" id="banner_eng">
  <input type="hidden"  name ="banner_eng2" id="banner_eng2" value='.$row->banner_en.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อ</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="name"   name="name" rows="4" cols="50">'.$row->name.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ตำเเหน่ง</label>
                                    <div class="col-md-3">
 <input class="form-control" type="text" id="type"   name="type" value="'.$row->type.'">
 <p class="mt-2"> 1 คือบSlide head / 2 คือ Fusion Time</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ลำดับ</label>
                                    <div class="col-md-3">
 <input class="form-control" type="text" id="orderindex"   name="orderindex" value="'.$row->orderindex.'">
 <p class="mt-2"> ลำดับตำเเหน่งเเบนเนอร์</p>
                                    </div>
                                </div>
      <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Link</label>
                                    <div class="col-md-6">
 <input class="form-control" type="text" id="link"   name="link" value="'.$row->link.'">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Video</label>
                                    <div class="col-md-6">
 <input class="form-control" type="text" id="video"   name="video" value="'.$row->video.'">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">เเสดงผล</label>
                                    <div class="col-md-3">
 <input class="form-control" type="text" id="show"   name="show" value="'.$row->show.'">
 <p class="mt-2">1 เเสดงภาพ / 2 วิดีโอ </p>
                                    </div>
                                </div>
 <div class="form-group row">
<label class="col-md-3" for="disabledTextInput">สถานะ</label>
                                    <div class="col-md-6">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1"';
 if($row->status == '1') echo 'checked';
echo'
 >
  <label class="form-check-label" for="inlineRadio1">ออนไลน์ <span class="badge badge-success">Online</span></label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0"';
  if($row->status == '0') echo 'checked';
echo'
  >
  <label class="form-check-label" for="inlineRadio2">ปิดชั่วคราว <span class="badge badge-danger">Ofline</span></label>
</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"></label>
                                    <div class="col-md-9">
    <input type="hidden" name="process" value="1" />
   <input type="hidden" name="id" id="id" value="'.$row->id.'" />
   	 <input class="form-control" type="hidden" id="return"   name="return" value="'.$return.'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
                    
                       <div class="card">
                            <div class="card-body">


                                    <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>
   