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

 <div class="row">
 <div class="col-md-6">
    <div class="card">
<div class="card-body">
<div id="showData"></div>
</div>
</div>
</div>

<div class="col-md-6">
    <div class="card">
<div class="card-body">
<h4>ธนาคารอื่น</h4>
<div id="showData2"></div>
<hr>
<h4>ไทยภานิชย์</h4>
<div id="scb"></div>
<div id="scb2"></div>
</div>
</div>
</div>


</div>
</div>

<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:site_url+"/monitor/realtime",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1000);    
});
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:site_url+"/monitor/realcheck",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#showData2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1000);    
});
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:site_url+"/monitor/realcheck_scb",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#scb").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1000);    
});
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:site_url+"/monitor/realcheck_scb2",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("div#scb2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1000);    
});
</script>
