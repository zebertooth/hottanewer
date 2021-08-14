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
 <div class="form-inline">
						<form class="f1 form-inline" method="post">
<input type="hidden" id="company" value="<?php echo $this->uri->segment(3);?>">
						<div class="input-group col-md-3">
<span class="input-group-addon">Begin Time</span>
                                    <input type="text" class="form-control" id="FromTime" placeholder="yyyy-mm-dd">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
						  </div>
						<div class="input-group col-md-3">
<span class="input-group-addon">End Time</span>
                                    <input type="text" class="form-control" id="ToTime" placeholder="yyyy-mm-dd">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
						  </div>
						  <div class="btn col-md-1">
							 <button type="button" class="btn btn-default btn-search"><i class="glyphicon glyphicon-search"></i>Search</button>
						  </div>
						<input name="Yesterday" value="เมื่อวาน" class="btn btn-primary mr-1 btn-yesterday" type="button">
						<input name="Today" value="วันนี้" class="btn btn-primary mr-1 btn-today" type="button">
						<input name="Thisweek" value="สัปดาห์นี้" class="btn btn-primary mr-1 btn-thisweek" type="button">
						<input name="ThisMonth" value="สัปดาห์ที่ผ่านมา" class="btn btn-primary mr-1 btn-thismounth" type="button">
						</form>
					</div>
					<hr>  
   
<div class="table-responsive" id="report">

</div>
<p class="text-danger">การค้นหาโปรดระบุช่วงระยะเวลา 7 วัน</p>
</div></div></div>
<script>
       $('.btn-thisweek').on('click', function() { 
	   		var company = $("#company").val();
			var thisweek = 1;
$.ajax({
   			url: site_url+'/report/users/'+ company,
   			type: 'POST',
			enctype: 'multipart/form-data',
   			cache: false,
			data: {  company: company, thisweek:thisweek},
   			success: function (data) {
//alert(company);
$('#report').html(data);

    	}
   		});

   	});
       $('.btn-thismounth').on('click', function() { 
	   		var company = $("#company").val();
			var thismounth = 1;
$.ajax({
   			url: site_url+'/report/users/'+ company,
   			type: 'POST',
			enctype: 'multipart/form-data',
   			cache: false,
			data: {  company: company, thismounth:thismounth },
   			success: function (data) {
//alert(company);
$('#report').html(data);

    	}
   		});

   	});
       $('.btn-today').on('click', function() { 
	   		var company = $("#company").val();
			var today = 1;
$.ajax({
   			url: site_url+'/report/users/'+ company,
   			type: 'POST',
			enctype: 'multipart/form-data',
   			cache: false,
			data: {  company: company, today:today },
   			success: function (data) {
//alert(company);
$('#report').html(data);

    	}
   		});

   	});
       $('.btn-yesterday').on('click', function() { 
	   		var company = $("#company").val();
			var yesterday = 1;
$.ajax({
   			url: site_url+'/report/users/'+ company,
   			type: 'POST',
			enctype: 'multipart/form-data',
   			cache: false,
			data: {  company: company, yesterday:yesterday },
   			success: function (data) {
//alert(company);
$('#report').html(data);

    	}
   		});

   	});
       $('.btn-search').on('click', function() { 
	   		var company = $("#company").val();
            var FromTime = $("#FromTime").val();
            var ToTime = $("#ToTime").val();
   			$.ajax({
   			url: site_url+'/report/users/'+ company,
   			type: 'POST',
			enctype: 'multipart/form-data',
   			cache: false,
			data: {  company: company, FromTime: FromTime, ToTime: ToTime },
   			success: function (data) {
//alert(FromTime);

$('#report').html(data);
//$(".box-detail").load(site_url+"payment/cancle_success");
    	}
   		});

   	});
    // submit
$('#report').load(site_url+"/report/users/<?php echo $this->uri->segment(3);?>");
</script>