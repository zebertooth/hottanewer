   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ผู้บริหาร</h4>  &nbsp;&nbsp;<a href="<?php echo site_url('organize/add'); ?>" class="btn btn-outline-info btn-sm">เพิ่มข้อมูล</a>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ผู้บริหาร</li>
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
                                <div class="table-responsive">
                                    <table class="table">
                <thead class="thead-light">
		<tr>
			<th>ลำดับ</th>
			<th>ชื่อ</th>
			<th>ตำเเหน่ง</th>
			<th>ปรับปรุง</th>
		</tr>
	</thead>
	<tbody>
	<?php 
foreach($q->result() as $r){
echo'<tr>
<td width="10%">'.$r->orderID.'</td>
<td>'.$r->name.'</td>
<td width="30%">'.$r->position.'</td>
<td width="15%"><a href="'.site_url('organize/org_edit/'.$r->id.'').'" class="label label-primary white" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">EDIT</i>
                                            </a>
&nbsp;&nbsp;
                                               <a href="'.site_url('organize/delete/'.$r->id.'').'" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" class="label label-info white">
                                                </i><i class="mdi mdi-close">DELETE</i>
                                            </a>     
                                               </td>
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

 


