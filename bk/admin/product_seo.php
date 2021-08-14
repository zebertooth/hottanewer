<?php
require_once ('authorized/admin_authorize.inc.php');
require_once ('../connections/thaitechno.php');
require_once ('../class/SQLManager.php');

$sql = new SQLManager ();
$sql->field = "OID AS id, SHORTDESC AS description, KEYSEARCH AS keyword";
$sql->table = "tbl_product";
$sql->condition = "WHERE OID = ".GetSQLValueString($_GET['id'], "int");
$row = mysql_fetch_assoc($sql->select());

?>
<?php include 'header.php'; ?>
	<h1>
		<img src="images/icon_slide.png" align="absmiddle" /> Product SEO
	</h1>
	<form action="controllers/product_controller.php" method="post" name="form_seo" id="form_seo">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="26%" height="30" align="right" valign="top"
					nowrap="nowrap">&nbsp;</td>
				<td width="2%" height="30">&nbsp;</td>
				<td width="72%" height="30">&nbsp;</td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong> คำค้นหา </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="keyword" type="text" id="keyword" size="40" value="<?php echo $row['keyword']; ?>" /></td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong> รายละเอียด </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="description" type="text" id="description" size="40" value="<?php echo $row['description']; ?>" /></td>
			</tr>
			<tr>
				<td nowrap="nowrap">&nbsp;</td>
				<td>&nbsp;</td>
				<td height="30"><input type="submit" name="btn_seo" id="btn_seo"
					value="  บันทึก  " /> <input type="reset" name="btn_reset"
					id="btn_reset" value="  ยกเลิก  " /> <input name="id" type="hidden"
					id="id" value="<?php echo $row['id']; ?>" /></td>
			</tr>
		</table>
	</form>
<?php include 'footer.php'; ?>