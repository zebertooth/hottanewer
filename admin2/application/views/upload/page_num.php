<?
if($num):
	if($num>$pagesize):
		$p=1;
		echo "<div class='NumPage'>Page ";
		for($p=1;$p<=$totalpage;$p++):
			if($p==$no):
				echo " <span>$p</span> ";
			else:
				echo " <a href='$p' class='btnNomPage'>$p</a> ";
			endif;
		endfor;
		echo "</div>";
	endif;
endif;
?>
