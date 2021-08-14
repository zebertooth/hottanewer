

        <?php
 $query = $this->db->query("SELECT * FROM images2 $name ORDER BY id DESC");
 include('data.php');
 ?>

<script type="text/javascript">
var scrollBotton=false;
var _init_img_load = 28; // กำหนดจำนวนเริ่มต้นที่ต้องการแสดง
$(".ListImg").hide(); // ซ่อนทั้งหมดก่อน
$(".ListImg:lt("+_init_img_load+")").show(); // แสดงเฉพาะจำนวนที่เรากำหนด
$(".ListImg:lt("+_init_img_load+") img").each(function(i,k){ // วนลูปในรูปที่เรากำหนด
    var img_fsrc = $(k).data("fsrc"); // ดึงค่า path ของไฟล์ของรูป
    $(k).attr("src",img_fsrc); // แสดงรูป
//  $(k).css("background-image", "url("+img_fsrc+")"); // แสดงรูป
});
 
// ตรวจสอบ event การ scroll 
 $("#MainUpImgAll").scroll(function(){  
    // ถ้า scroll ลงมาล่างสุด
	if($(this)[0].scrollHeight - $(this).scrollTop() <= $(this).outerHeight()){
  //  if($(window).scrollTop() + $(window).height() == $(document).height()) {
          _init_img_load+=28; // ให้แสดงรูปภาพอีก 15 รูป
            $(".ListImg:lt("+_init_img_load+")").show();// แสดงเฉพาะจำนวนที่เรากำหนด
            $(".ListImg:lt("+_init_img_load+") img").each(function(i,k){// วนลูปในรูปที่เรากำหนด
		    $(".spin").show();// แสดงเฉพาะจำนวนที่เรากำหนด
			$('.spin').delay(2000).fadeOut(); 
// $('#MainUpImgAll').append('<span id="load">LOADING...</span>');
                var img_fsrc = $(k).data("fsrc"); // ดึงค่า path ของไฟล์ของรูป
               $(k).attr("src",img_fsrc); // แสดงรูป
          // $(k).css("background-image", "url("+img_fsrc+")"); // แสดงรูป
            });   
    }        
 });
</script>