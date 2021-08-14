<?php
require_once ('authorized/admin_authorize.inc.php');
require_once ('../connections/mall.php');
require_once ("../class/SplitPage.php");
require_once ("../class/SQLManager.php");

$split = new SplitPage ();
$split->field = "id, banner, banner_en, type, caption, link, show_web";
$split->table = "banner_carousel";
$split->condition = "ORDER BY id DESC";
$rs = $split->startRow ();

$arrIncScript = array("banner" => "j/carousel.js");



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
<h1 class="h3 mb-2 text-gray-800">Fusion Time</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary d-none"> Banner</h6>
            <a href="carousel_add.php" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Fusion Time</span>
            </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Picture/Video</th>
                        <th>Type</th>
                        <th>Caption</th>
                        <th>Show</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th width="40%">Picture/Video</th>
                        <th>Type</th>
                        <th>Caption</th>
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

                            <?php if ($row->type=="picture"){ ?>
                           
                                <img src="../upload/carousel/picture/<?php echo $row->banner; ?>" width="40%"  />
                           

                            <?php } ?>


                            <?php if ($row->type=="video"){ ?>
                            
                                <video controls muted loop playsinline
                                    src="../upload/carousel/video/<?php echo $row->banner; ?>" width="40%">
                                </video>

                           
                            <?php } ?>



                        </td>
                        <td align="left" valign="top"><?php echo $row->type; ?></td>
                        <td align="left" valign="top"><?php echo $row->caption; ?></td>


                        <td align="center" nowrap="nowrap">
                            <i class="
                                    <?php echo ($row->show_web==1)? "fa fa-check":"fa fa-times"; ?>" "></i>
                            </td>
                            <td align=" center" nowrap="nowrap">
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

<script src="js/carousel.js"></script>