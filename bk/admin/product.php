<?php
require_once ('authorized/admin_authorize.inc.php');
require_once ('../connections/mall.php');

require_once ("../class/SQLManager.php");


$sql = new SQLManager ();

if(!empty($_GET['keyword'])) {
	$topic .= " (โดยค้นหาคำว่า '".$_GET['keyword']."')";
 	$condition .= sprintf(" AND (product.oid = %s OR product.productname LIKE %s OR product.productnameen LIKE %s)",
 					GetSQLValueString($_GET['keyword'], "int"),
 					GetSQLValueString("%".$_GET['keyword']."%", "text"),
 					GetSQLValueString("%".$_GET['keyword']."%", "text"));
}

$sql->field = "*";
					
$sql->table = "tbl_product AS product
					LEFT JOIN product AS mall_product ON product.OID = mall_product.id";

$sql->condition .= " 
					ORDER BY IF(product.productname IS NULL, 0 ,1) DESC,
					product.productname ASC";
$rsIndustry = $sql->select ();

$rsIndustryCount = $sql->countRow();

$count = 0;

$sql->field = "COUNT(DISTINCT product.OID) AS totalProduct,
					COUNT(DISTINCT (CASE WHEN  mall_product.show_web = 'Y' THEN product.OID END)) AS totalMall
					
					";
$sql->table = "tbl_product AS product
					LEFT JOIN product AS mall_product ON product.OID = mall_product.id
                    ";

$sql->condition .= " ";
$rsPostGroup = $sql->select();




// Spacial Day


$arrIncScript = array(
				
					"product" => "js/product.js"
				);


/* $arrIncScript = array("datatabledemo" => "js/demo/datatables-demo.js");
$arrIncScript = array("datatablejq" => "vendor/datatables/jquery.dataTables.min.js");
$arrIncScript = array("datatablebootstrap" => "vendor/datatables/dataTables.bootstrap4.min.js"); */

?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



<!-- Header -->
<?php
    include('./header.php');
?>
<!-- End of Header -->


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Products</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"></h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <a href="product_add.php" class="btn btn-primary">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Product</span>
        </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Link</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Link</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                   
                    <?php
                    if ($rsIndustryCount > 0) :
                        while ( $row = mysqli_fetch_object ( $rsIndustry ) ) :
                            $count = $count+1
                        ?>
                       
                        <tr rid="<?php echo $row->id; ?>">
                            <td align="center" nowrap="nowrap"><?php echo $count; ?></td>
                            <td align="center" nowrap="nowrap" width="20%"><?php echo $row->productname; ?></td>
                            <td align="center" valign="top" nowrap="nowrap" width="20%">
                                <img src="..<?php echo $row->thumbnailimage; ?>" width="100%" />
                            </td>
                            <td align="left" valign="top"><?php echo $row->id; ?></td>
                        
                          
                            <td align="center" nowrap="nowrap">
                               <i class="
                                    <?php echo ($row->show_web==1)? "fa fa-check":"fa fa-times"; ?>"
                                "></i>
                            </td>
                            <td align="center" nowrap="nowrap">
                               <a class="btnEdit"> <i class="fa fa-edit "></i> </a>| 
                               <a class="btnDel"><i class="fa fa-times "></i> </a>
                            </td>
                        </tr>
                    <?php
                        endwhile;
                        else :
                    ?>
                    <tr>
                        <td colspan="6" align="center" class="remark"><strong>No Record</strong></td>
                    </tr>

                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Footer -->
<?php
    include('./footer.php');
?>
<!-- End of Footer -->


<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<script src="js/product.js"></script>