<? include('../../system/config.inc.php');?>
<?
$sql="SELECT * FROM images2 ORDER BY id DESC ";
$re=mysql_query($sql);
$num=mysql_num_rows($re);
if($num>0):
	include("page.php"); 
	if($no<=$totalpage):
		for($i=$start;$i<$end;$i++):
			mysql_data_seek($re,$i);
			$rs=mysql_fetch_array($re);
			$img=$rs['img'];
			$file_tmp = $dir_uploads_article.'_thumbs/'.$img;
			$file_org = $dir_uploads_article.$img;
			if(!file_exists($root_path.$file_tmp))$file_tmp=$file_org;
	
			echo '<div class="ListImg"><img src="'.$file_tmp.'" class="ShowImg" path_org="'.$file_org.'" name="'.$filename.'"></div>';
		endfor;
	endif;
	echo '<div id="LoadListImg" rel="'.$no.'" totalpage="'.$totalpage.'"><img src="images/loader.gif"></div>';
	//include('page_num.php');
else:
	echo '<h1 class="TitleNoPic">ยังไม่มีรูปภาพในระบบ</h1>';
endif;
?>