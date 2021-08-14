
    	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
							  <tr>
								<th>User</th>
								<th>ยอด</th>
								<th>วันที่</th>
									<th>ผู้ถอน</th>
								<th width="10%">จำนวน</th>
							  </tr>
							</thead>
		<tbody>
        <?php
		foreach($q->result() as $r){
echo '<tr>
			<td>'.$r->user.'</td>
			<td>'.$r->money.'</td>
			<td>'.$r->date_tran.'</td>
			<td>'.$r->name_with.'</td><td>';?>
			<a onclick="ModelWith('<?php echo $r->with_id;?>','<?php echo $this->md5crypt->encryptIt($r->with_id);?>','<?php echo $r->name_with;?>','<?php echo $r->money ;?>','<?php echo $r->user ;?>','<?php echo $r->bank_deposit ;?>','<?php echo $r->date_tran;?>','<?php echo $r->userID ;?>')" class="btn btn-danger btn-sm margin-5 text-white userinfo"><i class=" fas fa-chevron-left"></i> ทำรายการ</a>

			<?php echo'</td>
			</tr>';
} 
?>

        </tbody>
        </table>

	