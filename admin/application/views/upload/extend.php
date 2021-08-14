<?
session_start();
include "../../system/config.inc.php";
include "../../system/function.php";
include('../../system/session-admin.php');
$select = "SELECT expire_date,status FROM tb_prakad WHERE car_id='".$_GET['id']."'";
$result = mysql_query($select);
$data = mysql_fetch_array($result);
$expire=$data['expire_date'];
$now=date('Y-m-d');
$endtime=DateDiff("$now","$expire");
if($endtime<='1'):
?>
<form class="form-horizontal" method="POST" id="validation-form" action="extend-complete.php?id=<?=$_GET[id];?>" enctype="multipart/form-data">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">เลือกวันต่ออายุ</label>  
  <div class="col-md-6">
  <select name="select_day" id="select_day" class="form-control input-md">
					<option value="0">กรุณาเลือก</option>
					<option value="7">7</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
				</select> วัน
<span class="formNote">ต่ออายุถึง <span id="off_date_str"></span></span>
<script type="text/javascript">
	$(function(){
		$('#select_day').change(function() {
			if($('#select_day').val()!=0)
			{
				var now = new Date();
				now.setDate(now.getDate() + (parseInt($('#select_day').val())));
				var fullmonth = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
				$('#off_date_str').html(now.getDate()+" "+fullmonth[now.getMonth()]+' '+(parseInt(now.getFullYear())+543));
			}
		});
	});
	</script>                                                     
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
 <input type="hidden" name="action" value="save" />
<button type="submit" class="btn btn-primary btn-sm" name="Submit">ต่ออายุประกาศ</button>
  </div>
</div>

</fieldset>
</form>
<?
endif;
?>