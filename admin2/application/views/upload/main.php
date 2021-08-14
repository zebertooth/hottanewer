<script type="text/javascript">
$(document).ready(function(e) {
//=================================================================================================
var scrollBotton=false
$("#MainUpImgAll").scroll(function(){
	if($(this)[0].scrollHeight - $(this).scrollTop() <= $(this).outerHeight())
	{
		if(scrollBotton==false){
			scrollBotton=true;
			var noPage = parseInt($("#LoadListImg").attr("rel"))+1;
			var totalPage=parseInt($("#LoadListImg").attr("totalpage"));
			if(noPage<=totalPage){
				$("#LoadListImg").show();
				$.ajax({
					url: "ajax/list_img.php?no="+noPage,
					type:'POST',
					data: "", 
					success: function(html){
						$("#LoadListImg").remove();
						$("#MainUpImgAll").append(html);
					}
				});
			}
			scrollBotton=false;
		}
	}
});
//=================================================================================================
});
</script>

	<img src="images/del_drg.png" class="btnClose">
	<div id="MainUpImgTopBar">
        <div id="btnUpload" class="btn btn-primary btn-sm">เพิ่มไฟล์ภาพ</div>
<div class="col-md-4"><div id="Progressbar"></div></div>
        <div class="cb"></div>
        <form action="ajax/upload.php" method="post" enctype="multipart/form-data" id="FromUpload">
        <input type="file" id="filesMulti" name="files[]" multiple accept="image/jpg,image/jpeg,image/gif,image/png,image/bmp" />
        <input name="SubmitFromUpload" type="submit" id="SubmitFromUpload" value="Upload!" />
        </form>
        
    </div>
    <div id="MainUpImgAll">
    	<!--div class="ListImg"><img src="images/no_img.png" class="ShowImg SelectImg"></div>
    	<div class="ListImg"><img src="images/no_img.png" class="ShowImg"></div>
    	<div class="ListImg"><img src="images/no_img.png" class="ShowImg"></div-->
<? include('list_img.php');?>
    </div>
    <div id="MainUpImgOption">
    	<!--img src="images/sp.gif" id="TmpImgOrg" class="Hid"-->
        <div id="TmpDel" class="txtOption">ลบรูปภาพนี้</div>
    	<div id="TmpImg"><img src="images/sp.gif" id="ShowTmpImg"></div>
    	<div id="TmpName" class="txtOption"></div>
    	<div id="TmpSize" class="txtOption"></div>
    	<div id="btnSelect" class="btn btn-primary btn-sm txtOption">เลือกรูปนี้</div>
    </div>
