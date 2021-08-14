$(document).ready(function(){
	
	$('.statusShow').css("cursor", "pointer");
	
	$('.btnDel').click(function(){
		if(confirm("คุณต้องการลบข้อมูลนี้ใช่หรือไม่")) {
			window.location = "controllers/carousel_controller.php?Delete="+$(this).parent().parent().attr("rid");
		}
	});
	
	$('.btnEdit').click(function(){
		window.location = "carousel_edit.php?id="+$(this).parent().parent().attr("rid");
	});
	
	
	$('.statusShow').click(function() {
		var $element = $(this);
		var id = $element.closest("tr").attr("rid");
		$.ajax({
			url: "controllers/carousel_controller.php",
			data: {
				statusShow : 1,
				id : id
			},
			success : function(data) {
				if(data=="1") {
					$element.attr("src","images/icon_ok.png");
				} else if(data=="0") {
					$element.attr("src","images/icon_cancel.png");
				} else {
					alert('เกิดข้อผิดพลาด กรุณาตรวจสอบ');
				}
			}
		});
	});
	
});