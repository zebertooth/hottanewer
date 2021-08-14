<? include('../../system/config.inc.php');?>
<?
$img=$_POST['filename'];
$sql="DELETE FROM images2 WHERE img='$img' ";
mysql_query($sql);

echo $root_path.$dir_uploads_article.$img;

@unlink($root_path.$dir_uploads_article.$img);
@unlink($root_path.$dir_uploads_article.'_thumbs/'.$img);
?>