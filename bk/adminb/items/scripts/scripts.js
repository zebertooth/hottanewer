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
	$("#p_id").val('');
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
	p_id=$("#p_id").val();
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
	q_search="p_id="+p_id+"&j_id="+j_id+"&c_id="+c_id+"&v_id="+v_id+"&g_id="+g_id+"&b_id="+b_id+"&price="+price;
	$("#BoxRes").load("aj_search.php?num_page="+num_page+"&" +q_search , function(e) {
		getTotalPage();
    });
	
	$("#BoxVersion").load('aj_select_version.php?b_id=0');
});




/*$(document).scroll(function(){
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
});*/

//================================END_READY=========================
		});
//================================END_READY=========================

