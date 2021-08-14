   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">บทความ</h4>&nbsp; &nbsp; <a href="<?php echo site_url('page/content_add'); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="เพิ่ม">เพิ่มข้อมูล</a>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">บทความ</li>
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
<i>จัดการบทความ</i>

                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                <thead class="thead-light">
		<tr>
			<th>รหัส</th>
			<th>หัวเรื่อง</th>
			<th>ประเภท</th>
			<th>sub Type</th>
			<th>ปรับปรุง/ลบ</th>
		</tr>
	</thead>
	<tbody>
	<?php 
foreach($q->result() as $r){
echo'<tr>
<td>'.$r->id.'</td>
<td>'.$r->title.'</td>
<td>'.$r->type.'</td>
<td>'.$r->subtype.'</td>
<td width="20%"><a href="'.site_url('page/content_edit/'.$r->id.'').'" class="badge badge-pill badge-primary" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">เเก้ไข TH</i>
                                            </a>
<a href="'.site_url('page/contenten_edit/'.$r->id.'').'" class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">เเก้ไข EN</i>
                                            </a>
&nbsp;&nbsp;<a href="'.site_url('page/del/'.$r->id.'').'" class="badge badge-danger white" data-toggle="tooltip" data-placement="top" title="ลบ"><i class="mdi mdi-check">ลบ</i></a>

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

 


