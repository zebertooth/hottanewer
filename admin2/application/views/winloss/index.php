       <div class="container-fluid">
 <div class="card">
                            <div class="card-body">

<form action="" class="form-inline" method="post">
						<div class="input-group col-md-2">
							 <span class="input-group-addon">Begin Time</span><input type="text" class="form-control" name="date_begin" id="date_begin" placeholder="yyyy-MM-dd HH:mm:ss" value="2019-09-21 00:00:00" >              
						  </div>
						  <div class="input-group col-md-2">
							 <span class="input-group-addon">End Time</span><input type="text" class="form-control" name="date_end" id="date_end" placeholder="yyyy-MM-dd HH:mm:ss" value="2019-09-21 23:59:59" >               
						  </div>
						<div class="input-group col-md-2">
							 <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>Search</button>
						  </div>
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
                  <tr class="text-center">
                     <th rowspan="2" class="text-center" nowrap="">User</th>
                     <th rowspan="2" nowrap="">Bet Number</th>
                     <th rowspan="2" nowrap="">Bet Amount</th>
                     <th rowspan="2" nowrap="">Aviliable Bet</th>
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
                                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล</h5>
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

 