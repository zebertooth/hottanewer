
<div class="col-12">
   <form class="contact" action="" name="edit" id="edit" method="post">
	
 <div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Login ระบบ</label>
      <input type="text" class="form-control"  value="<?php echo $r->telephone; ?>" readonly>
    </div>
	    <div class="form-group col-md-6">
    <label for="inputAddress2">รหัสผ่าน</label>
    <input type="text" class="form-control" value="<?php echo $r->password; ?>" readonly>
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">ชื่อ-สกุล</label>
      <input type="text" class="form-control" name="nameM" id="nameM" value="<?php echo $r->name; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="telephone">เบอร์โทรศัพท์</label>
      <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $r->telephone; ?>">
    </div>
	  <div class="form-group col-md-6">
    <label for="inputAddress2">ชื่อบัญชี</label>
    <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="บัญชี" value="<?php echo $r->acc_name; ?>">
  </div>
	  <div class="form-group col-md-6">
    <label for="inputAddress">ธนาคาร</label>
 <?php echo selectbox_array(array(
	'1'=>'ธนาคารไทยพาณิชย์่',
	'2'=>'ธนาคารกรุงเทพ',
	'3'=>'ธนาคารกสิกรไทย',
	'4'=>'ธนาคารกรุงไทย',
	'5'=>'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร',
	'6'=>'ธนาคารทหารไทย',
	'7'=>'ธนาคาร ซีไอเอ็มบี ไทย',
	'8'=>'ธนาคารยูโอบี จำกัด',
	'9'=>'ธนาคารกรุงศรีอยุธยา',
	'10'=>'ธนาคารออมสิน',
	'11'=>'ธนาคารแลนด์ แอนด์ เฮ้าส์ ',
	'12'=>'ธนาคารธนชาต',
	'13'=>'ธนาคารทิสโก้',
	'14'=>'ธนาคารเกียรตินาคิน'
 
 ),'bank',$r->bank,false,'class="form-control"'); ?>
  </div>
  
  <div class="form-group col-md-6">
    <label for="inputAddress2">เลขบัญชี</label>
    <input type="text" class="form-control" id="account" name="account" placeholder="เลขบัญชีธนาคาร" value="<?php echo $r->account; ?>">
  </div>
      <div class="form-group col-md-6">
    <label for="inputAddress2">limit Group</label>
    <input type="text" class="form-control" id="limitgroup" name="limitgroup">
  </div>
        <div class="form-group col-md-12">
    <label for="inputAddress2">Win limit</label>
    <input type="text" class="form-control" id="winlimit" name="winlimit">
  </div>
     <div class="form-group col-md-6">
      <label for="name">สมัครเมื่อ</label>
   <?php echo date('d-m-Y H:i:s',strtotime($r->regis_date)); ?>
    </div>
   <div class="form-group col-md-6">
      <label for="name">เครดิตคงเหลือ</label>
    <?php echo $r->cash_online; ?>
    </div>

   <div class="form-group col-md-6">
      <label for="name">ยืนยัน</label>
   <?php echo selectbox_array(array('1'=>'ใช่','0'=>'ไม่'),'agent',$r->agent,false,'class="form-control" id ="agent"'); ?>
    </div>

   <div class="form-group col-md-6">
      <label for="name">ใช้งาน</label>
  <?php echo selectbox_array(array('1'=>'ใช่','0'=>'ไม่'),'active',$r->active,false,'class="form-control" id="active"'); ?>
    </div>

  </div>
     
    
  </div>
 


    	<input type="hidden" name="action" id="action" value="1">
        <input type="hidden" name="userID" id="userID" value="<?php echo $r->id; ?>">
        	<h4>เปลี่ยนรหัสผ่าน</h4>
 <div class="form-row">
   <div class="form-group col-md-6">
      <label for="name">รหัสผ่าน</label>
  <input type="password" class="form-control" name="password1" id="password1" minlength="6">
    </div>
   <div class="form-group col-md-6">
      <label for="name">ยืนยัน รหัสผ่าน</label>
 <input type="password" class="form-control" name="password2" id="password2">
    </div>

		</div>
        <div id="action_massage"></div>
<!--foot-->
 <div class="modal-footer">
 <button type="submit" class="btn btn-primary" id="submit">บันทึกการเปลื่อนเเปลง</button>                        
												
<button type="submit" class="btn btn-secondary" data-dismiss="modal" id="closeModal">ปิดหน้าต่าง</button>
                                               
                                            </div>
<!--end foot-->

        
    </form>
</div>
<?php if($this->uri->segment(1)=='customers'){ ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#submit").click(function(){

			$.post(site_url+'/customers/edit', { 
            userID: $("#userID").val(), 
			action: $("#action").val(), 
            bank: $("#bank").val(),
            account: $("#account").val(),
            acc_name: $("#acc_name").val(),
            telephone: $("#telephone").val(),
            agent: $("#agent").val(),
            active: $("#active").val(),
			nameM: $("#nameM").val()}, 
				function(result){
					$("#action_massage").html(result);
$('#closeModal').click(function(){

 window.location.reload(true);
    })
				}
			);

		});
	});
</script>

<?php } ?>
