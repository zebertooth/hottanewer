   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">หมวดหมู่</h4>  &nbsp;&nbsp;
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">หมวดหมู่</li>
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
		<th scope="col">หมวด</th>
			<th scope="col">ปรับปรุง</th>
		</tr>
	</thead>
	<tbody class="customtable">
	<?php 
foreach($q->result() as $r){
echo'<tr>
<td>'.$r->name.'</td>
<td width="20%">  <a href="'.site_url('content/category_edit/'.$r->id.'').'" class="label label-primary white"  data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">EDIT</i>
                                            </a>&nbsp;&nbsp;
                                               <a href="#" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" class="label label-info white">
                                                </i><i class="mdi mdi-close">DELETE</i>
                                            </a>     </td>
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

 


