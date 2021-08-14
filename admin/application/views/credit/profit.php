<div class="table-responsive mt-3">
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>

								<th>ประจำเดือน</th>
								<th>ยอดฝาก</th>
								<th>โบนัสกงล้อ</th>
								<th>ยอดถอน+ถอนล่าสุด</th>
								<th>คงเหลือในเว็บ</th>
								<th>Balance</th>
							  </tr>
							</thead>
		<tbody>

        <?php

			
			echo '<tr>
			<td>'.date('m/Y').'</td>
			<td bgcolor="#66cc99">'.number_format($this->getDeposit,2).'</td>
			<td bgcolor="#66cc99">'.number_format($this->wheel,2).'</td>
			<td>'.number_format($this->Totalamount,2).'</td>
			<td>'.number_format($this->balance,2).'</td>
			<td>'.number_format($this->Total,2).'</td>
			</tr>';

		?>


        </tbody>
        </table>
		</div>