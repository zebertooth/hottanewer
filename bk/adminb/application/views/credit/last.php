<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">รายการ ฝาก-ถอน</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายการ ฝาก-ถอน</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
<div class="container-fluid">
 <div class="row"><div class="col-md-6" id="showData"></div><div class="col-md-6" id="showData2"></div></div>
 <div class="row">
 <div class="col-md-6">
    <div class="card">
                            <div class="card-body">
<h4>ฝากล่าสุด</h4>
 <div class="table-responsive mt-3"  id="deposite">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ตัวเลือก</th>
								<th>วันที่</th>
								<th>ฝากเข้า</th>
								<th>จำนวนเงิน</th>
								<th>จาก User</th>
							  </tr>
							</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>';?>
			<a onclick="ModelDepo('<?php echo $r->id;?>','<?php echo $this->md5crypt->encryptIt($r->id);?>','<?php echo $r->name;?>','<?php echo $r->money ;?>','<?php echo $r->user ;?>','<?php echo $r->bank_deposit ;?>','<?php echo $r->date_tran;?>','<?php echo $r->slip;?>','<?php echo $r->userID ;?>')" class="btn btn-warning btn-sm margin-5 text-white userinfo">ทำรายการ</a>

			<?php echo'</td><td>'.$r->date_tran.'</td>
			<td>'.$r->bank_deposit.'</td>
			<td>'.$r->money.'</td>
			<td>'.$r->user.'</td>
			</tr>
			';
		}
		?>

        </tbody>
        </table>
		</div>
	
    </div>
</div></div>
 <div class="card col-md-6">
   <div class="card">
                             <div class="card-body">
<h4>ถอนล่าสุด</h4>
 <div class="table-responsive mt-3" id="withdraw">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>ตัวเลือก</th>
								<th>วันที่</th>
								<th>User</th>
								<th>ธนาคาร</th>
								<th>จำนวน</th>
							  </tr>
							</thead>
		<tbody>
<?php
$query = $this->db->query("SELECT * FROM system_withdraw where status = 0 ORDER BY with_id DESC");
foreach ($query->result() as $b){
echo '<tr>
			<td>';?>
			<a onclick="ModelWith('<?php echo $b->with_id;?>','<?php echo $this->md5crypt->encryptIt($b->with_id);?>','<?php echo $b->name_with;?>','<?php echo $b->money ;?>','<?php echo $b->user ;?>','<?php echo $b->bank_deposit ;?>','<?php echo $b->date_tran;?>','<?php echo $b->userID ;?>')" class="btn btn-warning btn-sm margin-5 text-white userinfo">ทำรายการ</a>

			<?php echo'</td><td>'.$b->date_tran.'</td>
			<td>'.$b->user.'</td>
			<td>'.$b->bank_deposit.'</td>
			<td>'.$b->money.'</td>
			</tr>';
} 
?>
        </tbody>
        </table>
</div></div></div></div>

</div>
</div>

	
 <!-- Modal -->
<div class="modal fade" id="myModalDepo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">รายการฝากเงิน :: <span id="fullname"></span></h4>
			 <button type="button" onclick="javascript:window.location.reload()" class="btn btn-sm btn-default" data-dismiss="modal">ปิดหน้ารายการนี้</button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <div id="message-deposit">
                     ชื่อ  : <span id="de_name"></span> <br>
                     จำนวนเงิน  : <span id="de_amount"></span> บาท<br>
                     User  : <span id="user_play"></span> <br>
                     Bank  : <span id="bank"></span> <br>
                     Time  : <span id="time"></span> <br>
                     <hr>
                     <span id="imgslip"></span>
                  </div>
               </div>
               <div class="col-md-6">
				  <input type="hidden" id="userid" name="userid" />
       <button id="history-deposit" onclick="depHisDeposit();" type="button" class="btn btn-sm btn-warning">ประวัติฝากเงิน</button>
                  <button id="history-withdraw" onclick="depHisWithdraw();" type="button" class="btn btn-sm btn-warning">ประวัติถอนเงิน</button>
                  <div class="form-group">
				    <span id="dep-history-view"></span>
                     <span id="member_bank_list"></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
		
                  <hr>
                  <input type="hidden" id="de_id" name="de_id" />
                  <input type="hidden" id="de_user" name="id" />
				  <input type="hidden" id="de_crypt" name="de_crypt" />
                  <button id="save" onclick="ConfirmDepo();" type="button" class="btn btn-lg btn-primary">ยืนยันการฝาก</button>
                 
                  <hr>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-addon">Reject</div>
                        <select id="message-error-deposit" class="form-control">
                           <option value="ฝากเงินสำเร็จแล้ว (รายการไม่บันทึก)">ฝากเงินสำเร็จแล้ว (รายการไม่บันทึก)</option>
                           <option value="แจ้งฝากซ้ำ">แจ้งฝากซ้ำ</option>
                           <option value="ไม่พบยอด">ไม่พบยอด</option>
                           <option value="ไม่แนบสลิป">ไม่แนบสลิป</option>
                           <option value="แจ้งฝากไม่ตรงกับธนาคารที่ฝากเข้า">แจ้งฝากไม่ตรงกับธนาคารที่ฝากเข้า</option>
                           <option value="แจ้งวันที่/เวลาไม่ตรง">แจ้งวันที่/เวลาไม่ตรง</option>
                           <option value="เลขบัญชีไม่ตรงกับที่ลงทะเบียน">เลขบัญชีไม่ตรงกับที่ลงทะเบียน</option>
                        </select>
                        <span class="input-group-btn">
                        <a class="btn btn-danger" href="javascript:;" onclick="RejectNewDepo();"><span class="glyphicon glyphicon-off"></span> Reject Deposit</a>
                        </span>
                     </div>
                  </div>
 
           
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!--withdraw-->
<div class="modal fade" id="myModalWith" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">รายการถอนเงิน :: <span id="with_fullname"></h4>
<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()">ปิดหน้ารายการนี้</button>
         </div>
         <div class="modal-body">
            <div id="message-with">
      <div class="row">
		 <div class="col-md-6">
			    ชื่อ  : <b id="with_name"></b> <br>
               User  : <span id="with_play"></span> <br>
               Bank  : <span id="with_bank"></span> <br>
               Time  : <span id="with_time"></span> <br>
<hr>
<span>จำนวนที่ถอน</span><br/>
<span id="with_amount" class="font-weight-bold text-success f20"></span> 
		 </div> 
		 <div class="col-md-6">
			  <span id="user-info"></span>

		 </div>
           </div>
               <hr>
               <span id="user-check-info"></span>
               <hr>
               <input type="hidden" id="with_id" name="with_id" />
               <input type="hidden" id="with_user" name="with_user" />
			    <input type="hidden" id="memberid" name="memberid" />
               <input type="hidden" id="wit_crypt" name="wit_crypt" />
			    <input type="hidden" id="wit_amount" name="wit_amount" />
               <button id="saveWith" onclick="ConfirmWith();" type="button" class="btn btn-primary btn-lg">ยืนยันการถอนเงิน ( สำเร็จ )</button>
               <hr>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-addon">Reject</div>
                     <select id="message-error-withdraw" class="form-control">
                        <option value="ยอดเงินถอนยังไม่ถึง 1000 บาท, 1000 ถอนได้ 100">ยอดเงินถอนยังไม่ถึง 1000 บาท</option>
                        <option value="ยอดเทิร์นโอเวอร์ไม่ถึง 2 เท่า (Happy Hour)">ยอดเทิร์นโอเวอร์ไม่ถึง 2 เท่า (Happy Hour)</option>
                        <option value="เลขบัญชีถอนไม่ถูกต้อง (ยกเลิกการถอน)">เลขบัญชีถอนไม่ถูกต้อง (ยกเลิกการถอน)</option>
                        <option value="ธนาคารปรับปรุง (ยกเลิกการถอน)">ธนาคารปรับปรุง (ยกเลิกการถอน)</option>
                        <option value="ชื่อบัญชีไม่ตรงกับที่ลงทะเบียน (ยกเลิกการถอน)">ชื่อบัญชีไม่ตรงกับที่ลงทะเบียน (ยกเลิกการถอน)</option>
                        <option value="ไม่มีรายการเล่น (ยกเลิกการถอน)">ไม่มีรายการเล่น (ยกเลิกการถอน)</option>
                     </select>
                     <span class="input-group-btn">
                     <a class="btn btn-danger" href="javascript:;" onclick="RefundNewWith();"><span class="glyphicon glyphicon-off"></span> Reject Withdraw</a>
                     </span>
                  </div>
               </div>
 <hr>
               <button onclick="withHisDeposit();" type="button" class="btn btn-sm btn-warning">ประวัติฝากเงิน</button>
               <button onclick="withHisWithdraw();" type="button" class="btn btn-sm btn-warning">ประวัติถอนเงิน</button>
               <hr>
  <div class="form-group">
	
                   <span id="wih-history-view"></span>               
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
//Deposit Credit
 	function ModelDepo(id,decrypt,name,amount,user,bank,time,slip,userid){
   		$("#de_user").val(user);
   		$("#de_id").val(id);
   		$("#de_name").html(name);
   		$("#de_amount").html(amount);
   		$("#user_play").html(user);
   		$("#bank").html(bank);
   		$("#time").html(time);
   		$("#fullname").html(name);
		$("#userid").val(userid);
		$("#de_crypt").val(decrypt);
   		$("#dep-history-view").load(site_url+"/credit/dep_user/" + userid);
   		//$("#member_bank_list").load("ajax/ajax_membank.php?user=" + user);
   		if(slip !== ""){
   			$("#imgslip").html('<img class="img-fluid" src="https://www.sagame911.com/items/uploads/slip/'+ slip +'">');
   		}else{
   			$("#imgslip").html('<img class="img-fluid" src="https://www.sagame911.com/items/uploads/noimg.gif">');
   		}
   		$('#myModalDepo').modal({
   			backdrop: 'static',
   			keyboard: false  // to prevent closing with Esc button (if you want this too)
   		});
   		
   		
   	}
   
//Confirm deposit
function ConfirmDepo(){
   		var deid = $("#de_id").val();
   		var de_crypt = $("#de_crypt").val();
   		$("#save").prop('disabled', true);
   			$.ajax({
   			url: site_url+'/credit/deposit_manual/' + deid,
   			type: 'POST',
   			cache: false,
			data: { de_crypt:de_crypt },
   			success: function (data) {
   		if (data == 'success') {
/*  $.growl.error({ message: "The kitten is attacking!" });
  $.growl.notice({ message: "The kitten is cute!" });
  $.growl.warning({ message: "The kitten is ugly!" });*/
		// $('#cand').html(data);
   					$.growl.notice({ title: "ผลการทำรายการ", message: "ระบบบันทึกรายการเรียบร้อยแล้ว" });
   					$("#save").prop('disabled', false);
   					$("#myModalDepo").modal("hide");
   					updateDepositList();
   				}else{
   					$.growl.error({ message: "รายการนี้มีการทำรายการไปแล้ว หรือ ไม่มีอยู่ในระบบ" });
   					$("#myModalDepo").modal("hide");
   					$("#save").prop('disabled', false);
   				    updateDepositList();
   				}
   				
   				$("#de_id").val("");
   				$("#de_name").html("");
   				$("#de_amount").html("");
   				$("#user_play").html("");
   				$("#bank").html("");
   				$("#time").html("");
   				$("#fullname").html("");
				$("#de_crypt").val("");
   			}
   		});
   	}
/*==== Reject depo===*/
	function RejectNewDepo(){
   		var deid = $("#de_id").val();
		var status = 2;
		var de_crypt = $("#de_crypt").val();
   		var msg = $("#message-error-deposit option:selected").val();
   		$.ajax({
   			url: site_url+'/credit/RejectNewDepo/' + deid,
   			type: 'POST',
   			cache: false,
	        data: { de_crypt:de_crypt,comment:msg },
   			success: function (data) {
   			   		if (data == 'success') {
   					$("#save").prop('disabled', false);
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบปรับเป็น" + msg + "เรียบร้อยแล้ว" });
   					updateDepositList();
   					$("#myModalDepo").modal("hide");
   				}else{
   					$("#save").prop('disabled', false);
   					$.growl.error({ message: "ระบบไม่สามารถปรัยบอดได้  หรือ รายการนี้ถูกยกเลิกไปแล้ว" });
   					$("#myModalDepo").modal("hide");
   				}
   				$("#de_id").val("");
   			}
   		});
   	}
/*==Update deposite list==*/
	function updateDepositList(){
		//$("#deposite").load("ajax/ajax_deposit.php?bank=" + $("#bankdepositselect option:selected").val() + "&bankcat=" + $("#bankcatdepositselect option:selected").val());
		//$("#deposite").load("ajax/ajax_deposit.php?bank=&bankcat=" + $("#bankcatdepositselect option:selected").val());
		$("#deposite").load(site_url+"/credit/lastpop");
	}
   	//var myVarDep = setInterval(function(){ $("#deposite").load("ajax/ajax_deposit.php?bank=" + $("#bankdepositselect option:selected").val() + "&bankcat=" + $("#bankcatdepositselect option:selected").val()) }, 15000);
	//var myVarDep = setInterval(function(){ $("#deposite").load(site_url+"/credit/lastpop") }, 15000);
   	var myVarWith = setInterval(function(){ $("#withdraw").load(site_url+"/credit/withpop") }, 15000);
/*====ถอน====*/
   	function ModelWith(id,wit_crypt,name,amount,user,bank,time,memberid){
   		$("#with_user").val(user);
   		$("#with_id").val(id);
   		$("#with_name").html(name);
   		$("#with_amount").html(amount);
   		$("#with_play").html(user);
   		$("#with_bank").html(bank);
   		$("#with_time").html(time);
   		$("#with_fullname").html(name);
   		$("#user").val(user);
		 $("#memberid").val(memberid);
		$("#wit_crypt").val(wit_crypt);
		$("#wit_amount").val(amount);
		$("#user-info").load(site_url+"/credit/bank_tranfer/" + memberid);
	    $("#wih-history-view").load(site_url+"/credit/wit_user/" + memberid);
   		$('#myModalWith').modal({
   			backdrop: 'static',
   			keyboard: false  // to prevent closing with Esc button (if you want this too)
   		});
   		$('#user-check-info').load(site_url+"/credit/returnwinloss/" + user);
   	}
	function depHisDeposit(){
   		var deeid = $("#userid").val();
   		$("#dep-history-view").load(site_url+"/credit/dep_user/"+deeid);
   	}
   function depHisWithdraw(){
   	var deeid = $("#userid").val();

   	$("#dep-history-view").load(site_url+"/credit/wit_user/"+deeid);
   
   }
   function withHisDeposit(){
   	var deeid = $("#memberid").val();
   	$("#wih-history-view").load(site_url+"/credit/dep_user/"+deeid);
   }
   function withHisWithdraw(){
  	var deeid = $("#memberid").val();
   	$("#wih-history-view").load(site_url+"/credit/wit_user/"+deeid);
   
   }
  /*===ส่งค่ารายการถอน====*/
function ConfirmWith(){
   		var witid = $("#with_id").val();
		var wit_crypt = $("#wit_crypt").val();
   		$("#saveWith").prop('disabled', true);
   		$.ajax({
   			url: site_url+'/credit/ConfirmWith/' + witid,
   			type: 'POST',
   			cache: false,
			data: { wit_crypt:wit_crypt },
   			success: function (data) {
			if (data == 'success') {

   					$.growl({ title: "ผลการทำรายการ", message: "ระบบบันทึกรายการเรียบร้อยแล้ว" });
   					$("#saveWith").prop('disabled', false);
   					$("#myModalWith").modal("hide");
   					$("#withdraw").load(site_url+"/credit/withpop");
   				}else{
   					$.growl.error({ message: "รายการนี้มีการทำรายการไปแล้ว หรือ ไม่มีอยู่ในระบบ" });
   					$("#saveWith").prop('disabled', false);
   					//$("#myModalWith").modal("hide");
   				}
   				$("#with_id").val("");
   				$("#with_name").html("");
   				$("#with_amount").html("");
   				$("#with_play").html("");
   				$("#with_bank").html("");
   				$("#with_time").html("");
   				$("#with_fullname").html("");
   			}
   		});
   	}
/*===ยกเลิกการถอน===*/
function RefundNewWith(){
   		var deid = $("#with_id").val();
   		var msg = $("#message-error-withdraw option:selected").val();
		var wit_crypt = $("#wit_crypt").val();
   		$("#saveWith").prop('disabled', true);
   		$.ajax({
   			url: site_url+'/credit/RefundNewWith/' + deid,
   			type: 'POST',
   			cache: false,
            data: { msg:msg,wit_crypt:wit_crypt},
   			success: function (data) {
				if (data == 'success') {
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบบันทึก " + msg + " เรียบร้อยแล้ว" });
   					$("#saveWith").prop('disabled', false);
   					$("#myModalWith").modal("hide");
   				//	$("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val());
					$("#withdraw").load(site_url+"/credit/withpop");
   				}else{
   					$.growl.error({ message: "รายการนี้มีการทำรายการไปแล้ว หรือ ไม่มีอยู่ในระบบ" });
   					$("#saveWith").prop('disabled', false);
   					$("#myModalWith").modal("hide");
   				}
   				$("#with_id").val("");
   				$("#with_name").html("");
   				$("#with_amount").html("");
   				$("#with_play").html("");
   				$("#with_bank").html("");
   				$("#with_time").html("");
   				$("#with_fullname").html("");
   			}
   		});
   	}
</script>
