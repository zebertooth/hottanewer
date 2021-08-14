<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">รายงานถอนเงิน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายงานถอนเงิน</li>
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
 <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><?php echo number_format($this->total_ew,2); ?></h1>
                                <h6 class="text-white">Deposit</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><?php echo number_format($this->total_withdraw,2); ?></h1>
                                <h6 class="text-white">Withdraw</h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><?php echo number_format($this->income,2); ?></h1>
                                <h6 class="text-white">income</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
                </div>
 <div class="card">
                            <div class="card-body">


                                    <h5 class="card-title">สรุปยอดถอนเงิน  <?php echo number_format($this->total_withdraw,2); ?> บาท</h5>
    <input name="Yesterday" value="เมื่อวานนี้"  type="submit" class="btn btn-info">
 <button name="Today" value="Today" type="button" class="btn btn-info">วันนี้</button>
 <button name="Thisweek" value="Thisweek" type="button" class="btn btn-info">สัปดาห์นี้</button>
 <button type="button" class="btn btn-info">เดือนนี้</button>

 <div class="table-responsive mt-3">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ID</th>
								<th>วันที่</th>
								<th>ชื่อ</th>
								<th>ถอนออก</th>
								<th>จำนวนเงิน</th>
								<th>จาก User</th>
								<th>สถานะ</th>
								<th>ผู้อนุมัติ</th>
							  </tr>
							</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>'.$r->with_id.'</td>
			<td>'.$r->date_tran.'</td>
			<td>'.$r->name_with.'</td>
			<td>'.$r->bank_deposit.'</td>
			<td>'.$r->money.'</td>
			<td>'.$r->user.'</td>
			<td>'.$status[$r->status].'</td>
			<td>'.$r->approve.'</td>

			</tr>';
if ($r->status == '2'){
			echo'<tr>			<td colspan="8">'.$r->comment.'</td></tr>';
}
		}
		?>


        </tbody>
        </table>
		</div>
        <?php echo $pagination; ?>
    </div>
</div>
</div>

		
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Loading Content
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->		
<script type='text/javascript'>
            $(document).ready(function(){

                $('.userinfo').click(function(){
                    var id = this.id;
                    var splitid = id.split('_');
                    var userid = splitid[1];

                    // AJAX request
                    $.ajax({
                        url: site_url+'/customers/edit',
                        type: 'post',
                        data: {id: userid},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#Modal2').modal('show'); 

                        }

                    });
                });
            });



            </script>

 