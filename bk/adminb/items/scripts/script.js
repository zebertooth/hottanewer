// JavaScript Document

var ShowBoxAll=false;
var InsertCK=false;
var StatusCover = false;
var StatusCover2 = false;
var StatusCover3 = false;
var StatusCover4 = false;
var StatusCover5 = false;
var OrgPath="";
var RootPath="";
function OpenBoxImage(){
	ShowBoxAll=true;
$("body").css("overflow", "hidden");
	jQuery("#MainUpImg").show();
	$("#MainUpImg").load(base_url+"index.php/content/main", function(e) {
	$(".spin").show();
	$('.spin').delay(2000).fadeOut(); 
	setTimeout(function(){
     $("#MainUpImgAll").load(base_url+"index.php/content/list_img");
    }, 800);
        SetOverLay();
		SetOption();
    });
}
function CloseBoxImage(){
	ShowBoxAll=false;
	InsertCK=false;
	StatusCover=false;
	StatusCover2=false;
	StatusCover3=false;
	StatusCover4=false;
	StatusCover5=false;
	OrgPath='';
	$("#MainUpImg").hide();
	$("#overlay").hide();
	$("div#MainUpImgAll" ).html("");
	$("body").css("overflow", "auto");
$(ShowBoxAll).val('');
}

function SetOverLay(){
	var docHeight = $(window).height();
	var docWidth = $(window).width();
	
	$("#overlay").height(docHeight)
	$("#overlay").show();
	
	$("#MainUpImg").height(docHeight-100);
	$("#MainUpImg").width(docWidth-100);
}
function doSomething() {
  alert("hello")
}
 //-----function hover Bottom
$( "a .More" ).hover(
  function() {
    $( this ).append( $( "<i class='fas fa-minus btnclose'></i>" ) );
  }, function() {
    $( this ).find( "span:last" ).remove();
  }
);
//----- END  Hover Function
function SetOption(){
	if(OrgPath != ""){
	var tmpImg = new Image();
	tmpImg.src=OrgPath;
	$(tmpImg).on('load',function(){
	  orgWidth = tmpImg.width;
	  orgHeight = tmpImg.height;
	  $("#TmpSize").text(orgWidth +'คูณ ' + orgHeight+'พิกเซล ');
	});
		
		var fileNameIndex = OrgPath.lastIndexOf("/") +1 ;
		var Driname = RootPath;
		var Imgshowbox = RootPath +'/uploads/article/'+ OrgPath;
		var Filename = OrgPath.substr(fileNameIndex);
		$("#ShowTmpImg").attr("src",Driname+"/uploads/article/_thumbs/"+Filename);

		$("#TmpName").text(Filename);
		  $('#TmpDel2').append('<option value='+Filename+'>อัพโหลดไปที่เรื่องนี้</option>');
		  $("#IDimg").val(Filename);
		   $("#Tmname").val(Imgshowbox);
		$(".txtOption").show();
	//	$("#MainUpImgAll").load("../../content/list_img");
		//Post Data เพื่อขอเเสดงผลรูปภาพ
		$("#DetailImg").load(base_url+"index.php/content/show_box", {'t1':Filename});
		// สิ้นสุดรายการ
	}
}

$( window ).resize(function() {
	if(ShowBoxAll==true)SetOverLay();
});
//================================READY=========================
		$(document).ready(function() {
//================================READY=========================
$('body').append('<div id="root_path"></div>');
$("#root_path").hide();
$("#root_path").load(base_url+"index.php/content/get_root", function(e) {
	RootPath=$("#root_path").text();
});
$("#AddMainImg").click(function(e) {
	StatusCover = true;
	OpenBoxImage();
	OrgPath=$("#ImgMain").val();
	if(OrgPath!="")OrgPath=OrgPath;
});
$("#AddCoverImg").click(function(e) {
	StatusCover2 = true;
	OpenBoxImage();
	OrgPath=$("#ImgCover").val();
	if(OrgPath!="")OrgPath=OrgPath;
});
$("#Addpic1").click(function(e) {
	StatusCover3 = true;
	OpenBoxImage();
	OrgPath=$("#pic1").val();
	if(OrgPath!="")OrgPath=OrgPath;
});
$("#Addpic2").click(function(e) {
	StatusCover4 = true;
	OpenBoxImage();
	OrgPath=$("#pic2").val();
	if(OrgPath!="")OrgPath=OrgPath;
});
$("#Addpic3").click(function(e) {
	StatusCover5 = true;
	OpenBoxImage();
	OrgPath=$("#pic3").val();
	if(OrgPath!="")OrgPath=OrgPath;
});
$("#AddImgCk").click(function(e) {
	InsertCK=true;
	OpenBoxImage();
	//$("button#btnSelect").val("ใส่ไฟล์ลงในเรื่อง");
});

//================================END_READY=========================
		});
//================================END_READY=========================
$( ".btnClose" ).live( "click", function() {//กดปุ่ม ลบ
	CloseBoxImage();	
});

$( "#overlay" ).live( "click", function() {//กดปุ่ม ลบ
	CloseBoxImage();	
});
//----- ระบบshow togle
$('#addClass').click(function (){

$('.green-block').addClass('blue-block');

});

$('#removeClass').click(function (){

$('.green-block').removeClass('blue-block');

});
//-------END----
$( ".ShowImg" ).live( "click", function() {//กดปุ่ม ลบ
	srcSelect=$(this).attr("src");
	srcName=$(this).attr("name");
	//var Ld= $("#IdImg").val();
//	post_id= $("#post_id").val();
	OrgPath=$(this).attr("path_org");
	 $('.txtselect').prop("disabled", false);
	var tmpImg = new Image();
	tmpImg.src=OrgPath;
	$(tmpImg).on('load',function(){
	  orgWidth = tmpImg.width;
	  orgHeight = tmpImg.height;
	  $("#TmpSize").text(orgWidth +'คูณ ' + orgHeight+'พิกเซล ');
	});
		var fileNameIndex = OrgPath.lastIndexOf("/") +1 ;
		var Driname = RootPath;
		var Filename = OrgPath.substr(fileNameIndex);
		var Imgshowbox = RootPath +'/uploads/article/'+ Filename;
	$("#DetailImg").load(base_url+"index.php/content/show_box", {'t1':Filename});
	$("#ShowTmpImg").attr("src",srcSelect);
	$("#TmpName").text(Filename);
	$("#Tmname").val(Imgshowbox);
	$(".txtOption").show();
	$( ".ShowImg").removeClass("SelectImg");
	$(this).addClass("SelectImg");
     var Id = $('.SelectImg').attr('id');
	 if (Id) {
	 $( ".showT" ).empty();
     $( '#showT'+Id).prepend( "<a class='More' id='"+Id+"'><i class='fas fa-check-square btnclose' id='tick'></i></a>");
	 }
});
/*$( ".More" ).live( "click", function() {//กดปุ่ม ลบ
	if(confirm('คุณกำลังเลือกออก')){
		}
});*/
$( "#TmpDel" ).live( "click", function() {//กดปุ่ม ลบ
	if(confirm('คุณกำลังจะลบรายการนี้อย่างถาวร เมื่อลบแล้ว จะไม่สามารถกู้ข้อมูลคืนได้ คลิก ยกเลิก เพื่อยกเลิกการลบ ตกลง เพื่อยืนยันการลบ')){
		file_org=OrgPath;
		file_tmp=$("#ShowTmpImg").attr("src");
		$.post(base_url+"index.php/content/del_img",{file_org:file_org , file_tmp:file_tmp})
		.done(function( data ) {
			$("#MainUpImgAll").load(base_url+"index.php/content/list_img");
			$("#ShowTmpImg").attr("src",RootPath +"/uploads/no.png");
			$(".txtOption").hide();
			$('.txtselect').prop("disabled", true);
		});	
	}
});
//----------------------------------
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
  clearTimeout (timer);
  timer = setTimeout(callback, ms);
 };
})();
$('body').bind('keydown','#Altimg', function() {
altimg= $("#Altimg").val();
post_id= $("#post_id").val();
delay(function(){
	$.post(base_url+"index.php/content/autoalt",{Altimg: altimg , postId:post_id})
	.done(function( data ) {
//key value
//$('#autoSave').text("อัพเดทเรียบร้อย"); 
	$(".spinA").show();
	$('.spinA').delay(2000).fadeOut(); 
		});	
  }, 1000 );
});
// auto save description
$('body').bind('keydown','#post_description', function() {
post_description= $("#post_description").val();
post_id= $("#post_id").val();
altimg= $("#Altimg").val();
delay(function(){
	$.post(base_url+"index.php/content/autosave",{Desc: post_description , postId:post_id,Altimg: altimg})
	.done(function( data ) {
//key value
//$('#autoSave').text("อัพเดทเรียบร้อย"); 
	$(".spinA").show();
	$('.spinA').delay(2000).fadeOut(); 
		});	
  }, 1000 );
});
$('body').on('change','#TmpDel2', function() {
// txt=1;
  txt = $("#TmpDel2").val();
	//	 alert(value); 
	$.post(base_url+"index.php/content/list_img",{fileType: txt})
	.done(function( data ) {
 $( "#MainUpImgAll" ).html( data );
		});	
//	}
});

//------------------------------------
$( "#btnSelect" ).live( "click", function() {//กดปุ่ม ลบ
	 if( StatusCover2 == true){
	var imgIndex = OrgPath.lastIndexOf("/") +1 ;
		var imgName = OrgPath.substr(imgIndex);
		$("#ImgCover").val(imgName);
		$(".ImgCover").attr("src",OrgPath);
	}
		 if( StatusCover3 == true){
	var imgIndex = OrgPath.lastIndexOf("/") +1 ;
		var imgName = OrgPath.substr(imgIndex);
		$("#pic1").val(imgName);
		$(".pic1").attr("src",OrgPath);
	}
		 if( StatusCover4 == true){
	var imgIndex = OrgPath.lastIndexOf("/") +1 ;
		var imgName = OrgPath.substr(imgIndex);
		$("#pic2").val(imgName);
		$(".pic2").attr("src",OrgPath);
	}
			 if( StatusCover5 == true){
	var imgIndex = OrgPath.lastIndexOf("/") +1 ;
		var imgName = OrgPath.substr(imgIndex);
		$("#pic3").val(imgName);
		$(".pic3").attr("src",OrgPath);
	}
	if(InsertCK==true){
		html='<img src="'+OrgPath+'" class="img-fluid">';
		CKEDITOR.instances.detail.insertHtml(html);
	}	 if(StatusCover == true){
		
		var imgIndex = OrgPath.lastIndexOf("/") +1 ;
		var imgName = OrgPath.substr(imgIndex);
		$("#ImgMain").val(imgName);
		$(".ImgMain").attr("src",OrgPath);
	}
	CloseBoxImage();
});

/*
$( ".btnNomPage" ).live( "click", function() {//กดปุ่ม ลบ
	noPage=$(this).attr("href");
	$("div#MainUpImgAll" ).load("ajax/list_img.php?no="+noPage, function(e) {
		$('div#MainUpImgAll').animate({
			scrollTop: 0
		}, 800);
    });
	return false;
});
*/
