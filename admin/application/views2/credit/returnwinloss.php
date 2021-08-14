<p class="mb-2">Report Date = <?php echo $start.' - '.$last; ?></p>
		<div class="box-body table-responsive no-padding">
		<table class="table table-striped table-bordered responsive table-hover">
               <thead>
							  <tr>
								<th>User</th>
								<th>Bet Number</th>
								<th>Bet Amount</th>
									<th>RollingAmount</th>
								<th width="10%">Winloss</th>
							  </tr>
               </thead>
               <tbody>
	        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td><a href="'.site_url('report/user/'.$r->user.'').'" target="_blank">'.$r->user.'</a></td>
			<td>'.$r->Count.'</td>
			<td>'.$r->TotalBet.'</td>
			<td>'.$r->RollingAmount.'</td>
			<td>'.$r->Winlost.'</td>
			</tr>';

		}
		?>	 
							<!---<tr>
								<td><a href="betdetail-Masurinoza.html" target="_blank">Masurinoza</a></td>
								<td>0</td>
								<td>0.00</td>
								<td>0.00</td>
								
								<td class="text-bold"><b><font color="green">0.00</font></b></td>
								<td>0.00</td>
								<td class="text-bold"><b><font color="green">0.00</font></b></td>
								
								
								<td class="text-bold"><b><font color="">0.00</font></b></td>
							</tr>-->
							               </tbody>
			</table>
			</div>
	