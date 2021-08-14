<div class="table-responsive mt-3">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>

								<th>วันที่</th>
								<th>ยอดถอน</th>
								<th>ถอนออก</th>
								<th>สถานะ</th>
							  </tr>
							</thead>
		<tbody>

        <?php
		foreach($q->result() as $r){
			
			echo '<tr>
			<td>'.$r->date_tran.'</td>
			<td>'.$r->money.'</td>
			<td>'.$r->bank_deposit.'</td>
			<td>'.$status[$r->status].'</td>
			</tr>';
if ($r->status == '2'){
			echo'<tr>			<td colspan="4">'.$r->comment.'</td></tr>';
}

		}
		?>


        </tbody>
        </table>
		</div>