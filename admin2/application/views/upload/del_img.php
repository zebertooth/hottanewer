<? include('../../system/config.inc.php');?>
<?
$img=basename($_POST['file_org']);
$sql="DELETE FROM images2 WHERE img='$img' ";
mysql_query($sql);

$file_org=$_POST['file_org'];
$file_tmp=$_POST['file_tmp'];
@unlink($root_path.$file_org);
@unlink($root_path.$file_tmp);
?>