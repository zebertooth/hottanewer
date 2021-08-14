   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เเกลลอรี่</h4> &nbsp;<a href="<?php echo site_url('gallery/add'); ?>" class="btn btn-outline-info btn-sm">เพิ่มข้อมูล</a>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
<i>เพิ่มภาพกิจกรรม</i>

                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                <thead class="thead-light">
		<tr>
			<th>ID</th>
			<th>ภาพ</th>
			<th>หัวข้อ</th>
			<th>สถานะ</th>
			<th>ปรับปรุง</th>
			<th>ลบ</th>
		</tr>
	</thead>
	<tbody>
	<?php 
foreach($q->result() as $r){
echo'<tr><td>'.$r->id.'</td>';
if ($r->pic == '') {
echo'<td><img src="'.base_url().'items/template/assets/images/no-pic.png" alt="ภาพว่าง" class="img-thumb" /></td>';
}else{
echo'<td><img src="../../uploads/article/_thumbs/'.$r->pic.'" class="img-thumb"/></td>';
}
echo'<td>'.$r->topic.'</td>
<td >'.$status[$r->status].'</td>
<td ><a href="'.site_url('gallery/edit/'.$r->id.'').'" class="label label-primary white" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">EDIT</i>
                                            </a>
                                               </td>
<td >  <a href="'.site_url('gallery/delete/'.$r->id.'').'" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" class="label label-info white">
                                                </i><i class="mdi mdi-close">DELETE</i>
                                            </a></td>
</tr>';
		}
		?>
	</tbody>
</table>
     <div class="col-md-12">

 <?php echo''.$pagination; ?>
                                              
                                        </div>

                                </div>

                            </div>
                        </div>
                    </div>
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

 


