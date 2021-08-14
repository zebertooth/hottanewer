<script>
$(function(){
	check_online();
});
function check_online(){
	var count=0,saa,ass;
	var	text='';
	//var	text='<tr><td></td><td width="240"></td><td></td><td></td><td></td><td></td><td></td></tr>';
	$.ajax({type:'GET',url:site_url+'/server/get_online',success:function(data){
		ass = data.split('+');															  
		for(var usr in ass){
			if(ass[usr]){
				saa = ass[usr].split('|');
				text += '<tr><td>'+saa[0]+'</td><td>'+saa[1]+'</td><td>'+saa[2]+'</td><td width="350"><small>'+saa[3]+'</small></td><td><small>'+saa[4]+'</small></td><td><small>'+saa[5]+'</small></td><td align="right"><small>'+saa[6]+'</small></td></tr>';
				count++;
			}
		}
		$('#header').html(count+' สมาชิกกำลังใช้งาน');
		$('#tag_online').html(text);
	}});
	delete saa,ass,text,count;
	setTimeout('check_online();',30000);
}
</script>
<div class="page-header">
	<h1>สมาชิกกำลังใช้งาน <small id="header"></small></h1>
</div>
<table id="tag_online" class="table table-striped table-bordered table-hover table-condensed"></table>