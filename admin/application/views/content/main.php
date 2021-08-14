<div id="MainUpImgTopBar">
<div>
<div class="col-12">
  <!-- 3 DIV on -->
<a class="btnClose"><i class="fas fa-times"></i></a>
  <!-- HEAD --><div class="head"><h3>คลังภาพ</h3></div>  <!-- HEAD -->

  <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#upload" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">อัพโหลดไฟล์</span></a> </li>
                                <li class="nav-item nav-item2"> <a class="nav-link active" data-toggle="tab" href="#listimg" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">คลังไฟล์สื่อ</span></a> </li>
                            </ul>
  <!-- Nav tabs -->
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
<!-- START tab-pane ID : UPLOAD-->
                                <div class="tab-pane" id="upload" role="tabpanel">
<!-- start col-md-6-->
<div class="col-md-6 text-center mt-5 auto">
  <!--progressbar -->
<div class="progress m-t-15">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"  style="display:none"></div>
 </div>  
<!-- progressbar -->
<div id="Progressbar"></div>
<!-- progressbar show -->
</div>
<!--end col-md-6-->
<!--start BU UPLOAD--><div class="text-center bupload">
<p>เลือกไฟล์เดี่ยวหรือหลายไฟล์ </p>
<button type="button" id="btnUpload" class="btn btn-outline-secondary btn-lg"><i class="fas fa-images"></i>  เลือกไฟล์ภาพ</button>

<p>ขนาดไฟล์อัปโหลดใหญ่สุด: <?php echo $this->config->item('file_size');?> MB.</p> </div>
<div class="cb"></div>
        <form action="<?php echo base_url();?>/index.php/content/upload" method="post" enctype="multipart/form-data" id="FromUpload">
        <input type="file" id="filesMulti" name="files[]" multiple accept="image/jpg,image/jpeg,image/gif,image/png,image/bmp" />
		<input type="hidden" name="id" value="" id="IDimg">
        <input name="SubmitFromUpload" type="submit" id="SubmitFromUpload" value="Upload!" />
        </form><!---- end BUUPLOAD----->
        
                                </div><!-- END tab-pane ID : UPLOAD-->
<!-- START tab-pane ID :LISTIMG--> <div class="tab-pane active pa-10" id="listimg" role="tabpanel">
<div class="row">
<!--Start col-md-9-->
<div class="col-md-9">
<!--Start topbar-->
<div id="topbar"> 

<?php 
echo
'<li>
<select class="form-control form-control-sm" id="TmpDel2">
  <option value="all">ไฟล์รูปภาพ</option>
  <option  value="">ภาพของฉัน</option>
</select>
</li>  
<li>
 <li class="spinblock">
<div class="spin"><img src="'.base_url().'items/icon/spinner.gif" alt=""></div>
</li>  

';

?>

</div>
<!--End topbar-->
<!-- sTART  --->
    <div id="MainUpImgAll"></div>
<!-- end--->
</div>
<!--END col-md-9-->
<!--Start col-md-3-->
 <div class="bndetail col-md-3 right">
    <div id="MainUpImgOption" class="scrollable">
<!--START-->
<div id="TmpImg">
<p class="txtfile txtOption">รายละเอียดไฟล์</p>
<img src="" id="ShowTmpImg" style="">
</div>
<p id="TmpName" class="txtOption"></p>
    	<div id="TmpSize" class="txtOption"></div>
    	<div id="TmpSizeB" class="txtOption"></div>
        <div id="TmpDel" class="txtOption">ลบรูปภาพนี้</div>
<hr class="txtOption">
<div id="link" class="txtOption"><div class="row">
<div id="DetailImg" class="card-body">





</div>
 </div> </div>

<!--End-->
</div>
<div>
<!--END col-md-3-->
</div> <!--END ROW-->
</div>
<!-- end tab-pane ID :LISTIMG-->

                            </div>
                  <!-- footbox-->
 <div class="footBox col-md-12"><div class="divbox col-md-2"><button id="btnSelect" type="button" class="btn btn-info btn-sm txtselect right" disabled>ตั้งเป็นรูปประจำเรื่อง</button></div></div>  
  <!-- footbox-->
                        </div>
                  <!-- Card -->
</div>


        
    </div>

</div>

<script>
function myFunction() {
  var copyText = document.getElementById("Tmname");
  copyText.select();
  document.execCommand("copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "คัดลอก: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "คัดลอกนำไปวาง";
}
</script>