       <div class="container-fluid">
<div id="customers_list" class="row">
	<div class="col-md-12">
<form action="" class="form-inline" method="post">
						<div class="input-group col-md-2">
							 <span class="input-group-addon">Begin Time</span><input type="text" class="form-control" name="date_begin" id="date_begin" placeholder="yyyy-MM-dd HH:mm:ss" value="2019-09-21 00:00:00" >              
						  </div>
						  <div class="input-group col-md-2">
							 <span class="input-group-addon">End Time</span><input type="text" class="form-control" name="date_end" id="date_end" placeholder="yyyy-MM-dd HH:mm:ss" value="2019-09-21 23:59:59" >               
						  </div>
						  <p class="btn" align="right">
							 <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>Search</button>
						  </p>
						<input name="Yesterday" value="Yesterday" class="btn btn-primary" type="submit">
						<input name="Today" value="Today" class="btn btn-primary" type="submit">
						<input name="Lastweek" value="Lastweek" class="btn btn-primary" type="submit">
						<input name="Thisweek" value="Thisweek" class="btn btn-primary" type="submit">
						<input name="LastMonth" value="LastMonth" class="btn btn-primary" type="submit">
						<input name="ThisMonth" value="ThisMonth" class="btn btn-primary" type="submit">
						</form>
 <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr><th>User</th><th>Bet Time</th>
			
			<th>Payout Time</th>
			<th>Type</th>		
			<th>Game ID</th>	
			<th>Bet ID</th><th>Bet Type</th><th>Bet Amount</th><th>Win/Loss</th>
			<th>Rolling Amount</th><th>Balance</th><th>Result</th>
			</tr>
		</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>'.$r->User.'</td>
			<td>'.$r->BetTime.'</td>
			<td>'.$r->PayoutTime.'</td>
			<td>'.$r->Type.'</td>
			<td>'.$r->GameID.'</td>
			<td>'.$r->BetID.'</td>
			<td>'.$r->BetType .'</td>
			<td>'.$r->BetAmount.'</td>
			<td class="text-right">'.$r->WinLoss.'</td>
			<td align="center">'.$r->RollingAmount.'</td>
			<td>'.$r->Balance.'</td>
			<td align="center">'.$r->Result.'</td>

			</tr>
			';
		}
		?>


        </tbody>
        </table>
		</div>
        <?php echo $pagination; ?>
    </div>
</div>
</div>

		
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">??????????????????</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Loading Content
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->		
<script type='text/javascript'>
            $(document).ready(function(){

                $('.userinfo').click(function(){
                    var id = this.id;
                    var splitid = id.split('_');
                    var userid = splitid[1];

                    // AJAX request
                    $.ajax({
                        url: site_url+'/customers/edit',
                        type: 'post',
                        data: {id: userid},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#Modal2').modal('show'); 

                        }

                    });
                });
            });



            </script>

 