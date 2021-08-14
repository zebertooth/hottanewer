<?php
require_once ('authorized/admin_authorize.inc.php');
require_once ('../connections/mall.php');
require_once ("../class/SplitPage.php");
require_once ("../class/SQLManager.php");

 if($_GET['type']=="") $_GET['type']="trend";


$sql = new SQLManager ();
$sql->field = "id, thumb, title, view, show_web, date_post, type";
$sql->table = "news";

$sql->condition = "WHERE type=" . GetSQLValueString($_GET['type'], "text")." ORDER BY id DESC";

$rs = $sql->select();

$sql->field = "id";

$rsCount = $sql->countRow ();

$arrIncScript = array("news" => "js/information.js");

$count = 1;


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
<h1 class="h2 mb-2 text-primary"><?php echo ucfirst($_GET['type']); ?></h2>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary d-none">DataTables <?php echo $_GET['type']; ?></h6>
        <a href="information_add.php?type=<?php echo $_GET['type']; ?>" class="btn btn-primary">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Information</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>View</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>View</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                   
                    <?php
                    if ($rsCount > 0) :
                        while ( $row = mysqli_fetch_object ( $rs ) ) :
                        ?>
                        <tr rid="<?php echo $row->id; ?>">
                            <td align="center" nowrap="nowrap"><?php echo $count++; ?></td>
                            <td align="center" valign="top" nowrap="nowrap" width="40%">
                                <img src="../upload/news/thumbs/<?php echo $row->thumb; ?>" width="100%"  />
                            </td>
                            <td align="left" valign="top"><?php echo $row->title; ?></td>
                        
                            <td align="center" nowrap="nowrap"><?php echo number_format($row->view); ?></td>
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

<script src="js/information.js"></script>