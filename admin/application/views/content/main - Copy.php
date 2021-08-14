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
					url: "list_img.php?no="+noPage,
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

	<div id="MainUpImgTopBar" >
<div class="row">

<div class="col-md-12">
<a class="btnClose"><i class="fas fa-times"></i></a>
<div class="head"><h3>คลังภาพ</h3></div>

  <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">อัพโหลดไฟล์</span></a> </li>
                                <li class="nav-item2"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">คลังไฟล์สื่อ</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane" id="home" role="tabpanel">
<div class="text-center bupload">
<button type="button" id="btnUpload" class="btn btn-secondary btn-lg"><i class="fas fa-images"></i>  เลือกไฟล์ภาพ</button>
<p>ขนาดไฟล์อัปโหลดใหญ่สุด: 32 MB.</p> </div>
<div class="col-md-4 text-center"><div id="Progressbar"></div></div>
<div class="cb"></div>
        <form action="<?php echo base_url();?>/index.php/content/upload" method="post" enctype="multipart/form-data" id="FromUpload">
        <input type="file" id="filesMulti" name="files[]" multiple accept="image/jpg,image/jpeg,image/gif,image/png,image/bmp" />
        <input name="SubmitFromUpload" type="submit" id="SubmitFromUpload" value="Upload!" />
        </form>
        
<!---- end ----->
                                </div>
                                <div class="tab-pane  p-20 active" id="profile" role="tabpanel">
<div class="row">
<div class="col-md-9">
<!-- sTART  --->
    <div id="MainUpImgAll" class="todo-widget scrollable">
    	<!--div class="ListImg"><img src="images/no_img.png" class="ShowImg SelectImg"></div>
    	<div class="ListImg"><img src="images/no_img.png" class="ShowImg"></div>
    	<div class="ListImg"><img src="images/no_img.png" class="ShowImg"></div-->
<?php include('list_img.php');?>
    </div>
<!-- end--->
</div>
 <div class="col-md-3 right">
    <div id="MainUpImgOption">

    	<!--img src="images/sp.gif" id="TmpImgOrg" class="Hid"-->
    	<div id="TmpImg">
<p class="txtfile">รายละเอียดไฟล์</p>
<img src="" id="ShowTmpImg"></div>
<p id="TmpName" class="txtOption"></p>
    	<div id="TmpSize" class="txtOption"></div>
        <div id="TmpDel" class="txtOption">ลบรูปภาพนี้</div>
    	<div id="btnSelect" class="btn btn-primary btn-sm txtOption">เลือกรูปประจำเรื่อง</div>
    </div>
</div>
<div></div>
                                </div>
                            </div>
                        </div>
                          <!-- Card -->
</div>


        
    </div>

</div>