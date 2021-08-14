<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">รายการ ฝาก-ถอน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายการ ฝาก-ถอน</li>
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
 <div class="row"><div class="col-md-6" id="showData"></div><div class="col-md-6" id="showData2"></div></div>
 <div class="row">
 <div class="col-md-6">
    <div class="card">
                            <div class="card-body">
<h4>ฝากล่าสุด</h4>
 <div class="table-responsive mt-3"  id="deposite">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ตัวเลือก</th>
								<th>วันที่</th>
								<th>ฝากเข้า</th>
								<th>จำนวนเงิน</th>
								<th>จาก User</th>
							  </tr>
							</thead>
		<tbody>
       

        </tbody>
        </table>
		</div>
	
    </div>
</div></div>
 <div class="card col-md-6">
   <div class="card">
                             <div class="card-body">
<h4>ถอนล่าสุด</h4>
 <div class="table-responsive mt-3" id="withdraw">
    	
</div></div></div></div>

</div>
</div>

<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:site_url+"/credit/realtime",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },3000);    
});
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:site_url+"/credit/realcheck",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showData2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },3000);    
});
</script>
