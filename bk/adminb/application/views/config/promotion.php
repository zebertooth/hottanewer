   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">โปรโมชั่น</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">โปรโมชั่น</li>
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
<i>โปรโมชั่น</i>

                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                <thead class="thead-light">
		<tr>
			<th>รหัสโปรโมชั่น</th>
			<th>โปรโมชั่น</th>
			<th>ปรับปรุง</th>
		</tr>
	</thead>
	<tbody>
	<?php 
foreach($q->result() as $r){
echo'<tr>
<td>'.$r->id.'</td>
<td>'.$r->name.'</td>
<td width="10%"><a href="'.site_url('page/pro_edit/'.$r->id.'').'" class="label label-primary white" data-toggle="tooltip" data-placement="top" title="เเก้ไข">
                                                <i class="mdi mdi-check">EDIT</i>
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

 


