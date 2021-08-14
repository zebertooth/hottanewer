   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เเกลลอรี่</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
<div class="row">
<div class="col-md-3">
<select name="category" id="category" class="form-control" onchange="if (this.value) window.location.href=this.value"><option value="">เลือก</option><option value="1" selected>งานของใจกระทิง</option><option value="2">โครงการด้านการศึกษา</option><option value="3">โครงการด้านสาธารณสุข</option><option value="4">โครงการด้านสิ่งแวดล้อม</option></select>
</div>
<div class="col-md-3">&nbsp;<a href="<?php echo site_url('gallery/add'); ?>" class="btn btn-outline-info btn-sm">เพิ่มข้อมูล</a>
</div>
</div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div id="reload" class="row el-element-overlay mt-3">
	<?php 
		if($row > 0 ) {
foreach($q->result() as $r){
                   echo' <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').'_thumbs/'.$r->pic.'" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="'.$this->config->item('imgurl').''.$this->config->item('dir_uploads_article').''.$r->pic.'"><i class="mdi mdi-magnify-plus"></i> ดู</a></li>
<li class="el-item"><a class="btn default btn-outline el-link" href="'.site_url('gallery/edit/'.$r->id.'').'"  ><i class=" fas fa-pencil-alt"></i> เเก้ไข</a></li>
<li class="el-item"><a class="btn default btn-outline el-link" href="'.site_url('gallery/delete/'.$r->id.'').'"><i class="fas fa-prescription-bottle"></i> ลบ</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                  <span class="text-muted">'.$r->topic.'</span>
                                </div>
                            </div>
                        </div>
                    </div>';
}
}else{
echo'<div class="col-md-12 mt-5"><center>ไม่มีข้อมูลในหมวด</center></div> ';
}
?>

                   <!-- END-->
                </div>
 <?php echo''.$pagination; ?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

 


