<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - SA Gaming</title>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="css/jquery.growl.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="js/theme/default/laydate.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin - SA Gaming</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> ภาพรวมระบบ</a>
                        </li>
                        <li>
                            <a href="winloss.html"><i class="fa fa-dashboard fa-fw"></i> WinLoss Report</a>
                        </li>
						<li>
                            <a href="tranferlist.html"><i class="fa fa-files-o fa-fw"></i> รายการ ฝาก-ถอน</a>
                        </li>
						<li>
                            <a href="javascript:void();"><i class="fa fa-list-alt fa-fw"></i> สรุปยอดฝากถอน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="report-deposit.html">สรุปรายการฝากเงิน</a>
                                </li>
                                <li>
                                    <a href="report-withdraw.html">สรุปรายการถอนเงิน</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="bank.html"><i class="fa fa-university fa-fw"></i> เพิ่ม-แก้ไข บัญชีธนาคาร</a>
                        </li>
						<li>
                            <a href="allmember.html"><i class="fa fa-users fa-fw"></i> รายชื่อสมาชิกทั้งหมด</a>
                        </li>
						<li>
                            <a href="payaffiliate.html"><i class="fa fa-money fa-fw"></i> การจ่ายเงินพันธมิตร</a>
                        </li>
						<li>
                            <a href="viewaffiliate.html"><i class="fa fa-money fa-fw"></i> ดูยอดเล่นพันธมิตรเดือนปัจจุบัน</a>
                        </li>
						<li>
                            <a href="historypay.html"><i class="fa fa-money fa-fw"></i> รายการจ่ายเงินพันธมิตรย้อนหลัง</a>
						</li>
						<li>
                            <a href="promotion.html"><i class="fa fa-money fa-fw"></i> ระบบ เพิ่ม/แก้ไข/ลบ โปรโมชั่น</a>
						</li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
			<div class="container-fluid">
                <div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">รายการ ฝาก-ถอน</h1>
   </div>
   <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
      <div class="panel panel-default">
         <div class="panel-heading">
            รายการฝาก
         </div>
         <div class="panel-body">
            <div class="row">
			<div class="col-lg-6">
					<form role="form">
						<div class="form-group">
							<label>เลือกกลุ่มธนาคารที่ต้องการแสดงผล</label>
							<select id="bankcatdepositselect" onchange="updateDepositList()" class="form-control">
								<option value="" selected>แสดงผลทั้งหมด</option>
																	<option value="A1">A1</option>
																	<option value="A2">A2</option>
																	<option value="A3">A3</option>
																	<option value="A4">A4</option>
															</select>
						</div>
					</form>
               	</div>
               <!--<div class="col-lg-6">
                  <form role="form">
                     <div class="form-group">
                        <label>เลือกธนาคารที่ต้องการแสดงผล</label>
                        <select id="bankdepositselect" onchange="updateDepositList()" class="form-control">
                           <option value="" selected>แสดงผลทั้งหมด</option>
                           <option value="SCB">ธนาคาร ไทยพาณิชย์</option>
                           <option value="KTB">ธนาคาร กรุงไทย</option>
                           <option value="KBANK">ธนาคาร กสิกรไทย</option>
                        </select>
                     </div>
                  </form>
               </div>-->
            </div>
         </div>
         <div  class="table-responsive" id="deposite">
            <table class="table table-bordered">
               <tr>
                  <th>ตัวเลือก</th>
                  <th>ชื่อผู้ใช้</th>
                  <th>ธนาคาร</th>
                  <th>จำนวนเงิน</th>
                  <th>วันที่ - เวลา</th>
                  <th>โปร</th>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948519','ธนพร เลิศชนะวงษ์','380.00','Tanapol20','กสิกรไทย 289-243-9896','2019-09-21 - 14:31','1569072652.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">Tanapol20</td>
                  <td valign="middle">กสิกรไทย 289-243-9896</td>
                  <td valign="middle">380.00</td>
                  <td valign="middle">2019-09-21 - 14:31</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948528','สาวิตรี   แสงนาค','200.00','Aunka81','กสิกรไทย 289-243-9896','2019-09-21 - 20:30','1569072733.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">Aunka81</td>
                  <td valign="middle">กสิกรไทย 289-243-9896</td>
                  <td valign="middle">200.00</td>
                  <td valign="middle">2019-09-21 - 20:30</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948537','สุรเทพ เจริญลาภ','300.00','sukung1212','ไทยพาณิชย์ 4068877241','2019-09-21 - 20:31','1569072842.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">sukung1212</td>
                  <td valign="middle">ไทยพาณิชย์ 4068877241</td>
                  <td valign="middle">300.00</td>
                  <td valign="middle">2019-09-21 - 20:31</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948555','วิชัย กิตติยะอำพล','17,300.00','zvu888p8833','ไทยพาณิชย์ 4068877241','2019-09-21 - 20:36','1569073077.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">zvu888p8833</td>
                  <td valign="middle">ไทยพาณิชย์ 4068877241</td>
                  <td valign="middle">17,300.00</td>
                  <td valign="middle">2019-09-21 - 20:36</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948559','สุนิสา​ เพ็ญสว่าง','300.00','Champ0889342054','ไทยพาณิชย์ 4068877241','2019-09-21 - 14:33','1569073091.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">Champ0889342054</td>
                  <td valign="middle">ไทยพาณิชย์ 4068877241</td>
                  <td valign="middle">300.00</td>
                  <td valign="middle">2019-09-21 - 14:33</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948563','สุมาพร อยู่ยืน','4,475.00','akiraaui2','กสิกรไทย 0558781653','2019-09-21 - 20:29','1569073147.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">akiraaui2</td>
                  <td valign="middle">กสิกรไทย 0558781653</td>
                  <td valign="middle">4,475.00</td>
                  <td valign="middle">2019-09-21 - 20:29</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948564','รัศมี ขะยูง','300.00','meeru','กสิกรไทย 0601642964','2019-09-21 - 20:38','1569073148.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">meeru</td>
                  <td valign="middle">กสิกรไทย 0601642964</td>
                  <td valign="middle">300.00</td>
                  <td valign="middle">2019-09-21 - 20:38</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948565','Tam chuenchom','700.00','Tam2479','ไทยพาณิชย์ 405-238-4941','2019-09-21 - 20:38','1569073152.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">Tam2479</td>
                  <td valign="middle">ไทยพาณิชย์ 405-238-4941</td>
                  <td valign="middle">700.00</td>
                  <td valign="middle">2019-09-21 - 20:38</td>
                  <td></td>
               </tr>
                              <tr>
                  <td valign="middle"><a onclick="ModelDepo('948566','เอกพัฒน์ สินชัยศรี','648.00','tot0926301016','ไทยพาณิชย์ 405-238-4941','2019-09-21 - 20:04','1569073195.jpg')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
                  <td valign="middle">tot0926301016</td>
                  <td valign="middle">ไทยพาณิชย์ 405-238-4941</td>
                  <td valign="middle">648.00</td>
                  <td valign="middle">2019-09-21 - 20:04</td>
                  <td></td>
               </tr>
                           </table>
         </div>
      </div>
   </div>
		<div class="col-md-6">
		<div class="panel panel-default">
         <div class="panel-heading">
            รายการถอน
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-6">
                  <form role="form">
                     <div class="form-group">
                     <label>เลือกยอดเงินที่ต้องการแสดงผล</label>
                     <select id="bankwithdrawselect" onchange="updatewithdrawList()" class="form-control">
                        <option value="" selected>แสดงผลทั้งหมด</option>
                        <option value="1">500-999</option>
                        <option value="2">1,000-3,000</option>
                        <option value="3">3,001 ขึ้นไป</option>
                     </select>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <div  class="table-responsive" id="withdraw">
			 <table class="table table-bordered">
				<tr>
				   <th>ตัวเลือก</th>
				   <th>ชื่อผู้ใช้</th>
				   <th>ธนาคาร</th>
				   <th>จำนวนเงิน</th>
				   <th>ยอดคงเหลือหลังถอน</th>
				   <th>วันที่ - เวลา</th>
				</tr>
								<tr>
				   <td valign="middle"><a onclick="ModelWith('366798','นฤดล คะชา','33,380.00','kapookpui','กรุงไทย-6781572660','2019-09-21 20:35:09')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
				   <td valign="middle">kapookpui</td>
				   <td valign="middle">กรุงไทย-6781572660</td>
				   <td valign="middle">33,380.00</td>
				   <td valign="middle">0.00</td>
				   <td valign="middle">2019-09-21 20:35:09</td>
				</tr>
								<tr>
				   <td valign="middle"><a onclick="ModelWith('366806','Kunyanut Suankaew ','7,000.00','puyFai27','กสิกรไทย-0338289618','2019-09-21 20:37:50')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
				   <td valign="middle">puyFai27</td>
				   <td valign="middle">กสิกรไทย-0338289618</td>
				   <td valign="middle">7,000.00</td>
				   <td valign="middle">176.75</td>
				   <td valign="middle">2019-09-21 20:37:50</td>
				</tr>
								<tr>
				   <td valign="middle"><a onclick="ModelWith('366807','ชลธิชา ฉิมยินดี','500.00','chanachaiza','กสิกรไทย-0243251753','2019-09-21 20:38:02')" class="btn btn-primary btn-xs">ทำรายการ</a></td>
				   <td valign="middle">chanachaiza</td>
				   <td valign="middle">กสิกรไทย-0243251753</td>
				   <td valign="middle">500.00</td>
				   <td valign="middle">100.85</td>
				   <td valign="middle">2019-09-21 20:38:02</td>
				</tr>
							 </table>
		  </div>
      </div>
		</div>
	</div>
</div>
 
<div class="col-md-12">
   <div class="panel panel-default">
      <div class="panel-heading">
         เช็คยอดเงินธนาคาร
      </div>
      <div class="panel-body">
         				 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank2.php');" title="เช็คบัญชี">เช็คยอด PHYTHAINA ROEURN - กสิกรไทย 0558781653 PHYTHAINA</a>
								 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank4.php');" title="เช็คบัญชี">เช็คยอด SREY LEAK PHANN - กสิกรไทย 289-243-9896</a>
								 <a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-scb5.php?id=5');" title="เช็คบัญชี">เช็คยอด SREY LEAK PHANN - ไทยพาณิชย์ 405-238-4941</a>
				 				 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank6.php');" title="เช็คบัญชี">เช็คยอด RATNA CHOEUR - กสิกรไทย 0541184481 RATNA</a>
								 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank7.php');" title="เช็คบัญชี">เช็คยอด ทดสอบแก้ไขบัญชีจากระบบ - กสิกรไทย 12345678902</a>
								 <a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-bbl8.php?id=8');" title="เช็คบัญชี">เช็คยอด asd - กรุงเทพ 122222222</a>
				 				 <a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-scb9.php?id=9');" title="เช็คบัญชี">เช็คยอด โรซี่ - ไทยพาณิชย์ 4068877241</a>
				 				 <a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-scb10.php?id=10');" title="เช็คบัญชี">เช็คยอด รอม จำเริญ - ไทยพาณิชย์ 8192641257</a>
				 				 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank11.php');" title="เช็คบัญชี">เช็คยอด ROM CHAMREUN - กสิกรไทย 0601640570</a>
								 <a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-scb12.php?id=12');" title="เช็คบัญชี">เช็คยอด กิมสาน ฮอน - ไทยพาณิชย์ 8192669946</a>
				 				 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank13.php');" title="เช็คบัญชี">เช็คยอด KIMSAN HON - กสิกรไทย 0601642964</a>
								 		<a class="btn btn-info" href="javascript:void();" onclick="checkbank('json-kbank14.php');" title="เช็คบัญชี">เช็คยอด PHYTHAINA ROEURN - กสิกรไทย 0558781653</a>
				         <hr>
         <div  class="table-responsive" id="bankcheckdiv">
            <span id="data-bank"></span>
         </div>
      </div>
   </div>
   <script>
      function checkbank(bank){
      	$('#data-bank').html('<center><img src="ajax-loader.gif"></center>');
      	$('#data-bank').load('bank/' + bank);
      }
   </script>				
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModalDepo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">รายการฝากเงิน :: <b id="fullname"></h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <div id="message-deposit">
                     ชื่อ  : <b id="de_name"></b> <br>
                     จำนวนเงิน  : <b id="de_amount"></b> บาท<br>
                     User  : <b id="user_play"></b> <br>
                     Bank  : <b id="bank"></b> <br>
                     Time  : <b id="time"></b> <br>
                     <hr>
                     <span id="imgslip"></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <span id="member_bank_list"></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <span id="dep-history-view"></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <hr>
                  <input type="hidden" id="de_id" name="id" />
                  <input type="hidden" id="de_user" name="id" />
                  <button id="save" onclick="ConfirmDepo();" type="button" class="btn btn-sm btn-primary">ยืนยันการฝาก</button>
                  <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">ปิดหน้ารายการนี้</button>
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
                           <option value="ส่งหลักฐานการโอนทางLine@">ส่งหลักฐานการโอนทาง<template class="__cf_email__" data-cfemail="b6fadfd8d3f6">[email&#160;protected]</template></option>
                           <option value="ฝากเงินขั้นต่ำ100 (ติดต่อทางLine@)">ฝากเงินขั้นต่ำ100 (ติดต่อทาง<template class="__cf_email__" data-cfemail="377b5e595277">[email&#160;protected]</template>)</option>
                        </select>
                        <span class="input-group-btn">
                        <a class="btn btn-danger" href="javascript:;" onclick="RejectNewDepo();"><span class="glyphicon glyphicon-off"></span> Reject Deposit</a>
                        </span>
                     </div>
                  </div>
                  <hr>
                  <button id="history-deposit" onclick="depHisDeposit();" type="button" class="btn btn-sm btn-warning">ประวัติผากเงิน</button>
                  <button id="history-withdraw" onclick="depHisWithdraw();" type="button" class="btn btn-sm btn-warning">ประวัติถอนเงิน</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="myModalWith" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">รายการถอนเงิน :: <b id="with_fullname"></h4>
         </div>
         <div class="modal-body">
            <div id="message-with">
               ชื่อ  : <b id="with_name"></b> <br>
               User  : <b id="with_play"></b> <br>
               จำนวนเงิน  : <b id="with_amount"></b> บาท<br>
               Bank  : <b id="with_bank"></b> <br>
               Time  : <b id="with_time"></b> <br>
               <hr>
               <span id="user-check-info"></span>
               <hr>
               <input type="hidden" id="with_id" name="id" />
               <input type="hidden" id="with_user" name="with_user" />
               <button id="saveWith" onclick="ConfirmWith();" type="button" class="btn btn-primary">ยืนยันการถอนเงิน ( สำเร็จ )</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้ารายการนี้</button>
               <hr>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-addon">Reject</div>
                     <select id="message-error-withdraw" class="form-control">
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
               <button onclick="withHisDeposit();" type="button" class="btn btn-sm btn-warning">ประวัติผากเงิน</button>
               <button onclick="withHisWithdraw();" type="button" class="btn btn-sm btn-warning">ประวัติถอนเงิน</button>
               <hr>
               <span id="wih-history-view"></span>
            </div>
         </div>
      </div>
   </div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
   	function depHisDeposit(){
   		var deid = $("#de_user").val();
   		$("#dep-history-view").load("ajax/ajax_his_deposit.php?id=" + deid);
   	}
   function depHisWithdraw(){
   	var deid = $("#de_user").val();
   	$("#dep-history-view").load("ajax/ajax_his_withdraw.php?id=" + deid);
   
   }
   function withHisDeposit(){
   	var deid = $("#with_user").val();
   	$("#wih-history-view").load("ajax/ajax_his_deposit.php?id=" + deid);
   }
   function withHisWithdraw(){
   	var deid = $("#with_user").val();
   	$("#wih-history-view").load("ajax/ajax_his_withdraw.php?id=" + deid);
   
   }
   	function updatewithdrawList(){
   		$("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val());
   	}
   	function updateDepositList(){
		//$("#deposite").load("ajax/ajax_deposit.php?bank=" + $("#bankdepositselect option:selected").val() + "&bankcat=" + $("#bankcatdepositselect option:selected").val());
		$("#deposite").load("ajax/ajax_deposit.php?bank=&bankcat=" + $("#bankcatdepositselect option:selected").val());
	}
   	//var myVarDep = setInterval(function(){ $("#deposite").load("ajax/ajax_deposit.php?bank=" + $("#bankdepositselect option:selected").val() + "&bankcat=" + $("#bankcatdepositselect option:selected").val()) }, 15000);
	var myVarDep = setInterval(function(){ $("#deposite").load("ajax/ajax_deposit.php?bank=&bankcat=" + $("#bankcatdepositselect option:selected").val()) }, 15000);
   	var myVarWith = setInterval(function(){ $("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val()) }, 15000);
   	function ModelDepo(id,name,amount,user,bank,time,slip){
   		$("#de_user").val(user);
   		$("#de_id").val(id);
   		$("#de_name").html(name);
   		$("#de_amount").html(amount);
   		$("#user_play").html(user);
   		$("#bank").html(bank);
   		$("#time").html(time);
   		$("#fullname").html(name);
   		$("#dep-history-view").load("ajax/ajax_his_deposit.php?id=" + user);
   		$("#member_bank_list").load("ajax/ajax_membank.php?user=" + user);
   		if(slip !== ""){
   			$("#imgslip").html('<img class="img-responsive" src="https://www.sa-th.com/bankslip/'+ slip +'">');
   		}else{
   			$("#imgslip").html('<img class="img-responsive" src="https://www.sa-th.com/bankslip/noimg.gif">');
   		}
   		$('#myModalDepo').modal({
   			backdrop: 'static',
   			keyboard: false  // to prevent closing with Esc button (if you want this too)
   		});
   		
   		
   	}
   	function ModelWith(id,name,amount,user,bank,time,memberid){
   		$("#with_user").val(user);
   		$("#with_id").val(id);
   		$("#with_name").html(name);
   		$("#with_amount").html(amount);
   		$("#with_play").html(user);
   		$("#with_bank").html(bank);
   		$("#with_time").html(time);
   		$("#with_fullname").html(name);
   		$("#user").val(user);
   		$("#wih-history-view").load("ajax/ajax_his_deposit.php?id=" + user);
   		$('#myModalWith').modal({
   			backdrop: 'static',
   			keyboard: false  // to prevent closing with Esc button (if you want this too)
   		});
   		$('#user-check-info').load("ajax/check_return.php?id=" + id);
   	}
   	function ModelWithBonus(id,name,bonus,play,total,user,bank,time,memberid){
   		$("#with_bo_id").val(id);
   		$("#with_bo_fullname").html(name);
   		$("#with_bo_amount_bonus").html(bonus);
   		$("#with_bo_amount_play").html(play);
   		$("#with_bo_amount_total").html(total);
   		$("#with_bo_time").html(time);
   		$("#with_bo_bank").html(bank);
   		$("#with_bo_play").html(user);
   		$("#with_bo_name").html(name);
   		$('#myModalWithBonus').modal({
   			backdrop: 'static',
   			keyboard: false  // to prevent closing with Esc button (if you want this too)
   		});
   		$('#user-check-info-bo').load("ajax/check_return_bo.php?id=" + id);
   	}
   	function ConfirmDepo(){
   		var deid = $("#de_id").val();
   		$("#save").prop('disabled', true);
   			$.ajax({
   			url: 'ajax/deposit-accept1.php?id=' + deid,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบบันทึกรายการเรียบร้อยแล้ว" });
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
   			}
   		});
   	}
   	function ConfirmWith(){
   		var deid = $("#with_id").val();
   		$("#saveWith").prop('disabled', true);
   		$.ajax({
   			url: 'ajax/withdraw-accept.php?id=' + deid,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบบันทึกรายการเรียบร้อยแล้ว" });
   					$("#saveWith").prop('disabled', false);
   					$("#myModalWith").modal("hide");
   					$("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val());
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
   	function RefundNewWith(){
   		var deid = $("#with_id").val();
   		var msg = $("#message-error-withdraw option:selected").val();
   		$("#saveWith").prop('disabled', true);
   		$.ajax({
   			url: 'ajax/withdraw-newrefund.php?id=' + deid + '&msg=' + msg,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบบันทึก " + msg + " เรียบร้อยแล้ว" });
   					$("#saveWith").prop('disabled', false);
   					$("#myModalWith").modal("hide");
   					$("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val());
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
   	
   	function RejectNewDepo(){
   		var deid = $("#de_id").val();
   		var msg = $("#message-error-deposit option:selected").val();
   		$.ajax({
   			url: 'ajax/deposit-newreject.php?id=' + deid + '&msg=' + msg ,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
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
   	function RejectWith(){
   		var deid = $("#with_id").val();
   		$.ajax({
   			url: 'ajax/withdraw-reject.php?id=' + deid,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบบันทึกรายการเรียบร้อยแล้ว" });
   					$("#saveWith").prop('disabled', false);
   					$("#myModalWith").modal("hide");
   					$("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val());
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
   	function NotfoundDepo(){
   		var deid = $("#de_id").val();
   		$.ajax({
   			url: 'ajax/deposit-not.php?id=' + deid,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
   					$("#save").prop('disabled', false);
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบปรับเป็นไม่พบยอดเรียบร้อยแล้ว" });
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
   	function NotfoundWith(){
   		var deid = $("#with_id").val();
   		$.ajax({
   			url: 'ajax/withdraw-not.php?id=' + deid,
   			type: 'GET',
   			cache: false,
   			success: function (data) {
   				var json = jQuery.parseJSON(data);
   				if(json.msg == "success"){
   					$("#saveWith").prop('disabled', false);
   					$.growl({ title: "ผลการทำรายการ", message: "ระบบปรับเป็นไม่ยอดไม่ตรงเรียบร้อยแล้ว" });
   					$("#withdraw").load("ajax/ajax_withdraw.php?bank=" + $("#bankwithdrawselect option:selected").val());
   					$("#myModalWith").modal("hide");
   				}else{
   					$("#saveWith").prop('disabled', false);
   					$.growl.error({ message: "รายการนี้ถูกยกเลิกไปแล้ว" });
   					$("#myModalWith").modal("hide");
   				}
   				$("#with_id").val("");
   			}
   		});
   	}
</script>			</div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
	<div class="modal fade" id="myModalLineDP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">สมาชิกทำรายการผ่าน <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="95d9fcfbf0d5">[email&#160;protected]</a></h4>
				</div>
				<div class="modal-body">
					<button onclick="$('#lineatmsg').load('ajax/ajax_deposit_line.php');" type="button" class="btn btn-success">ฝากเงิน</button> <button onclick="$('#lineatmsg').load('ajax/ajax_withdraw_line.php');" type="button" class="btn btn-danger">ถอนเงิน</button> <button type="button" onclick="$('#lineatmsg').html('');" class="btn btn-default" data-dismiss="modal">ปิดหน้ารายการนี้</button>
					<hr>	
					<div id="lineatmsg"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="myModalPayAff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">ระบบจ่ายเงินพันธมิตร</h4>
				</div>
				<div class="modal-body">
					<div id="affdetail"></div>
				</div>
			</div>
		</div>
	</div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/jquery/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/jquery.growl.js"></script>
	<script src="ion.sound/ion.sound.js"></script>
	<script src="js/canvasjs.min.js"></script>
	<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
	<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="laydate2/laydate.js"></script>
	<script src="js/jquery.jeditable.js"></script>
		
	<script src="js/jeditable/jquery.jeditable.autogrow.js"></script>
	<script src="js/jeditable/jquery.jeditable.charcounter.js"></script>
	<script src="js/jeditable/jquery.jeditable.checkbox.js"></script>
	<script src="js/jeditable/jquery.jeditable.datepicker.js"></script>
	<script src="js/jeditable/jquery.jeditable.masked.js"></script>
	<script src="js/jeditable/jquery.jeditable.time.js"></script>

	<script src="js/jquery.autogrowtextarea.js"></script>
	<script src="js/jquery.charcounter.js"></script>
	<script src="js/jquery.maskedinput.js"></script>


	<script>
	function AddDepositLine(){
		var userid = $("#line_depo_user").val();
		var amount = $("#line_depo_amount").val();
		var day = $("#line_depo_day").val();
		var hour = $("#line_depo_hour").val();
		var minute = $("#line_depo_minute").val();
		var bank = $("#line_depo_bank").val();
		var url="ajax/add_deposit_line.php";
		var dataSet={id: userid,amount:amount,day:day,hour:hour,minute:minute,bank:bank};
		$.post(url,dataSet,function(data){
			var json = jQuery.parseJSON(data);
			if(json.status === "200"){
				$("#lineatmsg").html('<center><b>' + json.msg + '</b></center>');
			}else{
				$("#lineatmsg").html('<center><b>' + json.msg + '</b></center>');
			}
		});
	}
	function AddWithdrawLine(){
		var userid = $("#line_with_user").val();
		var amount = $("#line_with_amount").val();
		var bank = $("#line_with_bank").val();
		var url="ajax/add_withdraw_line.php";
		var dataSet={id:userid,amount:amount,bank:bank};
		$.post(url,dataSet,function(data){
			var json = jQuery.parseJSON(data);
			if(json.status === "200"){
				$("#lineatmsg").html('<center><b>' + json.msg + '</b></center>');
			}else{
				$("#lineatmsg").html('<center><b>' + json.msg + '</b></center>');
			}
		});
	}
	
	if ($('#myTable').length){
		$('#myTable').DataTable( {
			"ajax": 'ajax/json_member.php',
			'responsive': true,
			'destroy': true,
			"initComplete": function() {
				LoadEditable();
			},
			"drawCallback": function(settings){
				LoadEditable();
			}
		});
	}
	if ($('#myTableHistoryAff').length){
		$('#myTableHistoryAff').DataTable( {
			"ajax": 'ajax/json_historypay.php',
			'responsive': true,
			'destroy': true,
		});
	}
	if ($('#myTableAff').length){
		$('#myTableAff').DataTable( {
			"ajax": 'ajax/json_member_aff.php',
			'responsive': true,
			'destroy': true,
		});
	}
	if ($('#myTableAffPay').length){
		$('#myTableAffPay').DataTable( {
			"ajax": 'ajax/json_member_aff_pay_last.php',
			'responsive': true,
			'destroy': true,
		});
	}
	if ($('#myTableAffPayView').length){
		$('#myTableAffPayView').DataTable( {
			"ajax": 'ajax/json_member_aff_pay_view.php',
			'responsive': true,
			'destroy': true,
		});
	}
	if ($('#banklist').length){
		reloadbanklist();
	}
	if ($('#bankcheck').length){
		$('#bankcheck').DataTable( {
			'responsive': true,
			'destroy': true,
		});
	}
	function reloadbanklist(){
		$('#banklist').DataTable( {
			"ajax": 'ajax/banklist.php',
			'responsive': true,
			'destroy': true,
			"initComplete": function() {
				LoadEditable();
			},
			"drawCallback": function(settings){
				LoadEditable();
			}
		});
	}
	function reloadaffpay(){
		$('#myTableAffPay').DataTable( {
			"ajax": 'ajax/json_member_aff_pay_last.php',
			'responsive': true,
			'destroy': true,
		});
	}
	function ModelPayAffMember(id,day){
		$("#affdetail").html("");
		$("#affdetail").load("ajax/load_aff_pay.php?id=" + id + "&day=" + day);
		$('#myModalPayAff').modal({
			backdrop: 'static',
			keyboard: false  // to prevent closing with Esc button (if you want this too)
		});

	}
	function AddBalance(id,oldbalance,newbalance,total,day){
		var url="ajax/add_balance_aff.php";
		var dataSet={id:id,oldbalance:oldbalance,newbalance:newbalance,total:total,day:day};
		$.post(url,dataSet,function(json){
			if(json.status === "200"){
				$("#affdetail").html('<center><b>' + json.msg + '</b><br><button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button></center>');
			}else{
				$("#affdetail").html('<center><b>' + json.msg + '</b><br><button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button></center>');
			}
		},'json');
		reloadaffpay();
	}
	function AddTranfer(id,oldbalance,newbalance,total,day){
		var url="ajax/add_tranfer_aff.php";
		var dataSet={id:id,oldbalance:oldbalance,newbalance:newbalance,total:total,day:day};
		$.post(url,dataSet,function(json){
			if(json.status === "200"){
				$("#affdetail").html('<center><b>' + json.msg + '</b><br><button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button></center>');
			}else{
				$("#affdetail").html('<center><b>' + json.msg + '</b><br><button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button></center>');
			}
		},'json');
		reloadaffpay();
	}
	function LoadEditable(){
		$(document).ready(function() {

			$(".editableData").editableAriaShim();

			$(".editable-text-full").editable("ajax/save_bankcat.php", {
				type : "text",
				cancel : 'Cancel',
				cssclass : 'custom-class',
				cancelcssclass : 'btn btn-danger',
				submitcssclass : 'btn btn-success',
				maxlength : 200,
				select : true,
				showfn : function(elem) { elem.fadeIn('slow') },
				submit : 'Save',
				width : 160,
			});

			$('.editable-select').editable('ajax/save_member_bankcat.php', {
				loadurl    : 'ajax/bankcatlist.php',
				type   : 'select',
				submit : 'OK',
				//text   : '<p class="btn btn-info btn-xs">Click to edit</p>'
			});
		});
	}
	</script>
	<script>
		$(function() {
			ion.sound({sounds: [{name: "new",preload: false}],path: "sounds/",preload: true,multiplay: true});
			function CheckAlert(){
				$.get("alert.php",function(data){
					var json = jQuery.parseJSON(data);
					if(json.status === "200"){
						if(json.openuser >= 1){
							$.growl.notice({ message: "มีลูกค้าขอเปิด User จำนวน " + json.openuser + " คน<br><a class='btn btn-info btn-lg btn-block' href='newregister.html'>ไปหน้าเปิด User</a>" });
						}
						if(json.deposite >= 1){
							$.growl.notice({ message: "มีลูกค้าฝากเงิน จำนวน " + json.deposite + " รายการ<br><a class='btn btn-info btn-lg btn-block' href='tranferlist.html'>ไปหน้าฝากถอน</a>" });
						}
						if(json.withdraw >= 1){
							$.growl.notice({ message: "มีลูกค้าถอนเงิน จำนวน " + json.withdraw + " รายการ<br><a class='btn btn-info btn-lg btn-block' href='tranferlist.html'>ไปหน้าฝากถอน User</a>" });
						}
						if(json.alert != "no"){
							ion.sound.play("new");
						}
					}
				});
			}
			//var myVar = setInterval(function(){ CheckAlert() }, 15000);
	
			if ($('#editor1').length){
				CKEDITOR.replace('editor1');
			}
		});
	
	</script>
<script>
if ($('#container-new').length){
	Highcharts.chart('container-new', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'สรุปยอดทั้งปี'
		},
		subtitle: {
			text: 'sa-th.com'
		},
		xAxis: {
			categories: [
				'มกราคม',
				'กุมภาพันธ์ ',
				'มีนาคม',
				'เมษายน',
				'พฤษภาคม',
				'มิถุนายน',
				'กรกฎาคม',
				'สิงหาคม',
				'กันยายน',
				'ตุลาคม',
				'พฤศจิกายน',
				'ธันวาคม'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'บาท'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} บาท</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'ฝากเงิน',
			data: []

		}, {
			name: 'ถอนเงิน',
			data: []

		}]
	});
}
</script>
<script>
   laydate.render({
     elem: '#date_begin'
     ,type: 'datetime'
     ,lang: 'en'
   });
   laydate.render({
     elem: '#date_end'
     ,type: 'datetime'
     ,lang: 'en'
   });
</script>
</body>

</html>