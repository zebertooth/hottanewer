   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">หน้า</h4> &nbsp; &nbsp; <a href="<?php echo site_url('banner/add/1'); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="เพิ่ม">เพิ่มข้อมูล</a>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">banner</li>
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
<i>จัดการเเบนเนอร์</i>

                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                <thead class="thead-light">
		<tr>
			<th>ลำดับ</th>
			<th>ภาพ</th>
			<th>ชื่อ</th>
			<th>ตำแหน่ง</th>
			<th>ลำดับ</th>
			<th>ปรับปรุง</th>
		</tr>
	</thead>
	<tbody>
	<?php 
#

foreach($q->result() as $r){
echo'<tr>
<td width="5%">'.$r->id.'</td>
<td width="150px">
<img src="../../../items/uploads/banner/'.$r->banner.'" alt="'.$r->name.'" class="img-fluid img-thumbnail"></td>
<td>'.$r->name.'</td>
<td>'.$r->type.'</td>
<td>'.$r->orderindex.'</td>
<td width="10%"><a href="'.site_url('banner/edit/'.$r->id.'').'" class="label label-primary white" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">EDIT</i>
                                            </a>&nbsp;&nbsp;
<a href="'.site_url('banner/del/'.$r->id.'').'" class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="ลบ">
                                                <i class="mdi mdi-check">ลบ</i>
                                            </a>
                                               </td>
</tr>';
		}
		?>
	</tbody>
</table>
     <div class="col-md-12">


                                              
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

 


