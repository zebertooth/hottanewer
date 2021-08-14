// JavaScript Document
var q_search="";
var num_page=1;
var total_page=1;
var scrollBotton=false;
var data_load='<div id="LoadListImg"><img src="images/loader.gif"></div>';
function SetOverLay(){
	var docHeight = $(window).height();
	var docWidth = $(window).width();
	
	$("#overlay").height(docHeight)
	$("#overlay").show();
	
	var set_t=(docHeight-$("#BoxSearch").height())/2;
	var set_l=(docWidth-$("#BoxSearch").width())/2;
	
	$("#BoxSearch").css('top', set_t + "px");
	$("#BoxSearch").css('left', set_l + "px");
	$("#BoxSearch").show();
}

function CloseOverLay(){
	
	$("#j_id").val('');
	$("#c_id").val('');
	$("#v_id").val('');
	$("#g_id").val('');
	$("#b_id").val('');
	$("#price").val('');

	$("#BoxSearch").hide();
	$("#overlay").hide();
}

function getTotalPage(){
	$.post( "aj_get_num_page.php?num_page="+num_page+"&" +q_search,{})
	.done(function( data ) {
		total_page=data;
	});	
}

//================================READY=========================
		$(document).ready(function() {
//================================READY=========================
getTotalPage();

$("#BtnSearch").click(function(e) {
    SetOverLay();
});

$("#overlay").click(function(e) {
    CloseOverLay();
});

$(".BtnClose").click(function(e) {
    CloseOverLay();
});

$("#b_id").change(function(e) {
	bid=$(this).val();
    $("#BoxVersion").load('aj_select_version.php?b_id='+bid);
});
$("#province_id").change(function(e) {
	provinceid=$(this).val();
    $("#BoxDistrict").load('aj_select_province.php?province_id='+provinceid);
});

$("#btnOK").click(function(e) {
	j_id=$("#j_id").val();
	c_id=$("#c_id").val();
	v_id=$("#v_id").val();
	g_id=$("#g_id").val();
	b_id=$("#b_id").val();
	price=$("#price").val();
	scrollBotton=false;
	num_page=1;
	$("#BoxRes").html(data_load);
    CloseOverLay();
	q_search="j_id="+j_id+"&c_id="+c_id+"&v_id="+v_id+"&g_id="+g_id+"&b_id="+b_id+"&price="+price;
	$("#BoxRes").load("aj_search.php?num_page="+num_page+"&" +q_search , function(e) {
		getTotalPage();
    });
	
	$("#BoxVersion").load('aj_select_version.php?b_id=0');
});




$(document).scroll(function(){
	if($(this).height() - $(this).scrollTop() <= $(this).height())
	{
		if(scrollBotton==false){
			if($("#LoadListImg").length>0)$("#LoadListImg").remove();
			scrollBotton=true;
			total_page=parseInt(total_page);
			if(num_page<=total_page){
				
				$("#BoxRes").append(data_load);
				num_page=num_page+1;
				$("#LoadListImg").show();
				$.ajax({
					url: "aj_search.php?num_page="+num_page+"&" +q_search,
					type:'POST',
					data: "", 
					success: function(data){
						$("#LoadListImg").remove();
						$("#BoxRes").append(data);
						scrollBotton=false;
					}
				});
			}
		}
	}
});

//================================END_READY=========================
		});
//================================END_READY=========================

// Function image
function AllowUpload(){
	var numImg = $(".btnDelImg").length;
	var maxImg=$("#maxImg").val();
	if(numImg>=maxImg){
		$("#SelectImg").hide();
	}else{
		$("#SelectImg").show();
	}

	if($("input:radio[name=id_cover]").length>0){
		if($("input:radio[name=id_cover]").is(":checked")){
		  //Code to append goes here
		}else{
			$("input:radio[name=id_cover]:first").attr('checked', true);
		}
	}

}

//=======================================================================================================
	$(document).ready(function(e) {
//=======================================================================================================
var F_HTML='<div id="overlay"></div>';
F_HTML+='<div id="DialogSelectCat"></div>';
F_HTML+='<div id="DialogSelectCatSub"></div>';

F_HTML+='<form action="ajax/upload-image.php" method="post" enctype="multipart/form-data" id="FromUpload" class="hid">';
F_HTML+='<input type="file" id="filesMulti" name="files[]" multiple accept="image/jpg,image/jpeg,image/gif,image/png,image/bmp">';
F_HTML+='<input name="SubmitFromUpload" type="submit" id="SubmitFromUpload" value="Upload!">';
F_HTML+='<input name="ssid" type="hidden" id="ssid" value=""><input name="time" type="hidden" id="time" value="">';
F_HTML+='<input name="numImg" type="hidden" id="numImg" value="0">';
F_HTML+='<input name="maxImg" type="hidden" id="maxImg" value="0">';
F_HTML+='</form>';

$( "body" ).append(F_HTML);

$("#ssid").val($("#p_ssid").val());
$("#time").val($("#p_time").val());
$("#maxImg").val($("#p_maxImg").val());
$("#SelectImg").click(function(e) {
    
});
//=======================================================================================================
	});
//=======================================================================================================

$( ".btnDelImg" ).live( "click", function() {//°¥ªÿË¡ ≈∫
		filename=$(this).attr("imgName");
		imgID=$(this).attr("imgID");
		$.post( "ajax/del_imgs.php",{filename:filename})
		.done(function( data ) {
			//alert(data);
			$("#Div"+imgID).remove();
			AllowUpload();
		});	
});