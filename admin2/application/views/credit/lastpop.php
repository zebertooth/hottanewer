
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

	