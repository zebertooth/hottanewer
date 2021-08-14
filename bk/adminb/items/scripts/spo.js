// JavaScript Document
/*
	$(function() {
		var percent = $('#Progressbar');
		$('#FromUpload').ajaxForm({
			beforeSend: function() {
				var percentVal = '0%';
				percent.show();
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				percent.html(percentVal);
			},
			complete: function(xhr) {
				percent.hide();
			}
		});
	}); 
*/

function SetFromUpload(){
		var percent = $('#Progressbar');
		$('#FromUpload').ajaxForm({
			beforeSend: function() {
				var duration = 5000; // it should finish in 5 seconds !
				var percentVal = '0%';
				percent.show();
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				percent.html(percentVal);
        $('div.progress-bar').width(percentVal);
			},
			complete: function(xhr) {
				percent.hide();
		$('div.progress-bar').css('width', '');
				var msg=xhr.responseText;
				if(msg!="") alert(msg);
    $('ul.nav-tabs a').removeClass('active');
	$('#upload').removeClass('active');
	$(".spin").show();
    $('ul.nav-tabs li.nav-item2 a').addClass('active');
	$("#MainUpImgAll").load(base_url+"index.php/content/list_img");
	//	$(".spin").fadeOut(500);
$('.spin').css('display','none');
	    $('#listimg').addClass('active');
			}
		});
}
//========================================================

$( "#filesMulti" ).live( "change", function() {
	SetFromUpload();
	$('#SubmitFromUpload').click();
});

$( "#btnUpload" ).live( "click", function() {
	$('#filesMulti').trigger('click'); 
	return false;
});
