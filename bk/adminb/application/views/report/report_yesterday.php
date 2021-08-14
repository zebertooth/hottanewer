<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">win loss Report</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">report</li>
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
 <div class="card">
<div class="card-body">
<div class="col-12 mb-2">
<a href="<?php echo site_url('report/report_yesterday'); ?>"  class="btn btn-info">เมื่อวานนี้</a>
<a href="<?php echo site_url('report/report_total'); ?>"  class="btn btn-info">วันนี้</a>
<a href="<?php echo site_url('report/report_week'); ?>"  class="btn btn-info">สัปดาห์นี้</a>
<a href="<?php echo site_url('report/report_mounth'); ?>"  class="btn btn-info">เดือนนี้</a>
 </div>  
<table  class="table table-striped table-bordered table-hover table-condensed mt-3" id="zero_config">
     <thead>
                  <tr class="text-center">
                     <th rowspan="2" class="text-center" nowrap="">User</th>
                     <th rowspan="2" nowrap="">Bet Number</th>
                     <th rowspan="2" nowrap="">Bet Amount</th>
                     <th rowspan="2" nowrap="">RollingAmount</th>
                     <th colspan="3" class="text-center" nowrap="">Member</th>
                     <th rowspan="2" class="text-center" nowrap="">Company</th>
                  </tr>
                  <tr class="text-center">
                     <!--Member-->
                     <th nowrap="">Winloss</th>
                     <th nowrap="">Commision</th>
                     <th nowrap="">Total</th>
                  </tr>
               </thead>
    <tbody id="search">
	<?php
	$suml_winloss=0;
	$suml_AviliableBet=0;
	$suml_BetAmount=0;
	$suml_BetNumber=0;
	foreach($q->result() as $r){
		$suml_winloss+=$r->total_winloss;
		$suml_AviliableBet+=$r->AviliableBet;
		$suml_BetAmount+=$r->total_bet;
		$suml_BetNumber+=$r->total_BetNumber;
		
		
		if($r->total_winloss>=0){
			$total_winloss = '<span class="green bold">'.number_format($r->total_winloss,2,'.',',').'</span>';
		}else{
			$total_winloss = '<span class="red bold">'.number_format($r->total_winloss,2,'.',',').'</span>';
		}
				$i1= $r->total_winloss;
		if($i1>=0){
			$i1='<span class="red bold">'.$i1.'</span>';
		}else{
$str = preg_replace("/[\-|!|\(|\)|&|%|\$|#|@|<|>|\?|\+|\/]/", "", $i1);
           $i1='<span class="green bold">'.$str.'</span>';
		
		}
		echo sprintf('<tr><td><a href="'.site_url('report/user/'.$r->user.'').'" target="_blank">%s</a></td><td>%s</td><td>%s</td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td></tr>',$r->user,$r->total_BetNumber,$r->total_bet,$r->AviliableBet,$total_winloss,number_format($r->total_balance,2,'.',','),$total_winloss,$i1);
	}
	echo'</tbody>';
	echo sprintf('<tfoot><tr><td>%s</td><td>%s</td><td>%s</td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td><td><span class="pull-right">%s</span></td><td></td></tr></tfoot>','Total',$suml_BetNumber,number_format($suml_BetAmount,2,'.',','),number_format($suml_AviliableBet,2,'.',','),number_format($suml_winloss,2,'.',','),number_format($suml_balance,2,'.',','),number_format($suml_winloss,2,'.',','));
	?>		

</table>
</div></div></div>
<script>
       $('.yesterday').on('click', function() { 
			var yesterday = 1;
$.ajax({
   			url: site_url+'/report/report_total',
   			type: 'POST',
			enctype: 'multipart/form-data',
   			cache: false,
			data: {  yesterday:yesterday},
   			success: function (data) {
//alert('ffffff');
$('#search').html(data);

    	}
   		});

   	});
	</script>