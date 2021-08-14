<div class="page-header">
	<h1>ประวัติการเข้าใช้งาน</h1>
</div>
<div class="row">
	<div class="col-md-12">   
    
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">วันที่</label>
			<div class="col-sm-3"><?php echo selectbox_array($date,'date',$now,false,' class="form-control"'); ?></div>
		</div>
	</form>
    
    <table class="table table-striped table-bordered table-hover table-condensed">
    <?php
    $do = array('0'=>'System','1'=>'Member','2'=>'Open Page','9'=>'RoBot');
    $member = array(NULL=>'','1'=>'Login','2'=>'Logout','3'=>'Login Fail');
    foreach($log->result() as $r){
        echo '<tr><td>'.substr($r->add_date,11,20).'</td><td>'.$r->username.'</td><td>'.$do[$r->doing].'</td><td>'.$member[$r->working].'</td><td>'.$r->target.'</td></tr>';
    }
    ?>
    </table>
    </div>
</div>
<script>
$(function(){
	$('#date').change(function(){location.href=site_url+'/server/logs/'+$(this).val();});	
});
</script>