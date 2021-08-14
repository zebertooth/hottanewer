   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ผู้ใช้</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ผู้ใช้</li>
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
<i>จัดการผู้ใช้</i>

                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                <thead class="thead-light">
		<tr>
			<th>ลำดับ</th>
			<th>User</th>
			<th>ชื่อ</th>
			<th>สถานะ</th>
			<th>ปรับปรุง</th>
		</tr>
	</thead>
	<tbody>
	<?php 
foreach($q->result() as $r){
echo'<tr>
<td width="10%">'.$r->id.'</td>
<td>'.$r->username.'</td>
<td>'.$r->name.'</td>
<td width="30%">'.$r->user_private.'</td>
<td width="10%"><a href="'.site_url('organize/org_edit/'.$r->id.'').'" class="label label-primary white" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">EDIT</i>
                                            </a>
                                               </td>
</tr>';
		}
		?>
	</tbody>
</table>
     <div class="col-md-12">

 <?php //echo''.$pagination; ?>
                                              
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

 


