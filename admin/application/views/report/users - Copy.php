<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">win loss Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">report</li>
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
 <div class="card">
<div class="card-body">
<?php
date_default_timezone_set("Asia/Bangkok");
$day = date('w');
$week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
$week_end = date('Y-m-d H:i:s', strtotime('+'.(6-$day).' days'));
echo $week_start;
echo $week_end;
?>
 <div class="form-inline">
						<form action="" class="form-inline" method="post">
						<div class="input-group col-md-3">
<span class="input-group-addon">Begin Time</span>
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy/mm/dd">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
						  </div>
						<div class="input-group col-md-3">
<span class="input-group-addon">End Time</span>
                                    <input type="text" class="form-control" id="datepicker-autoclose2" placeholder="yyyy/mm/dd">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
						  </div>
						  <div class="btn col-md-1">
							 <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>Search</button>
						  </div>
						<input name="Yesterday" value="Yesterday" class="btn btn-primary mr-1" type="submit">
						<input name="Today" value="Today" class="btn btn-primary mr-1" type="submit">
						<input name="Thisweek" value="Thisweek" class="btn btn-primary mr-1" type="submit">
						<input name="ThisMonth" value="ThisMonth" class="btn btn-primary mr-1" type="submit">
						</form>
					</div>
					<hr>  
   
<div class="table-responsive" id="report">

</div>

</div></div></div>
<script>
$('#report').load(site_url+"/report/users/0934245259");
</script>