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
	$("#title").val('');
	$("#main_category").val('');
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



$("#btnOK").click(function(e) {
	title=$("#title").val();
	main_category=$("#main_category").val();
	scrollBotton=false;
	num_page=1;
	$("#BoxRes").html(data_load);
    CloseOverLay();
	q_search="title="+title+"&main_category="+main_category;
	$("#BoxRes").load("aj_article.php?num_page="+num_page+"&" +q_search , function(e) {
		getTotalPage();
    });
	
	//$("#BoxVersion").load('aj_select_version.php?b_id=0');
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
					url: "aj_article.php?num_page="+num_page+"&" +q_search,
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

