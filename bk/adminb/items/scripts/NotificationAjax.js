$(document).ready(function(e) {
	increaseNotify();
	increaseScb();
	increaseWit();
	increaseIncome();
    setInterval(increaseNotify, 3000);
    setInterval(increaseScb, 3000);
    setInterval(increaseWit, 3000);
   setInterval(increaseIncome, 5000);
});
function increaseNotify(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
	$.ajax({
		url: site_url+"/sms/check",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".badge_number").text(obj.badge_number);
		}
	});
}
function increaseScb(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
	$.ajax({
		url: site_url+"/sms/checkscb",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".badge_scb").text(obj.badge_scb);
		}
	});
}
function increaseWit(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
	$.ajax({
		url: site_url+"/sms/checkwit",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".badge_wit").text(obj.badge_wit);
		}
	});
}
function increaseIncome(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
	$.ajax({
		url: site_url+"/sms/checkincome",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".badge_income").text(obj.badge_income);
		}
	});
}