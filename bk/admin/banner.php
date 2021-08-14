<?php
require_once ('authorized/admin_authorize.inc.php');
require_once ('../connections/mall.php');
require_once ("../class/SplitPage.php");
require_once ("../class/SQLManager.php");

$split = new SplitPage ();
$split->field = "id, banner, banner_en, link, show_web";
$split->table = "banner";
$split->condition = "ORDER BY id DESC";
$rs = $split->startRow ();

$arrIncScript = array("banner" => "j/banner.js");




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
<h1 class="h3 mb-2 text-gray-800">Banner</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Banner</h6>
        <a href="banner_add.php" class="btn btn-primary">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Banner</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Picture</th>
                        <th>Link</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Picture</th>
                        <th>Link</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                   
                    <?php
                    if ($split->numrow) :
                        while ( $row = mysqli_fetch_object ( $rs ) ) :
                        ?>
                        <tr rid="<?php echo $row->id; ?>">
                            <td align="center" nowrap="nowrap"><?php echo $split->num++; ?></td>
                            <td align="center" valign="top" nowrap="nowrap" width="40%">
                                <img src="../upload/banner/<?php echo $row->banner; ?>" width="100%"  />
                            </td>
                            <td align="left" valign="top" width="20%"><?php echo $row->link; ?></td>
                        
                          
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

<script src="js/banner.js"></script>