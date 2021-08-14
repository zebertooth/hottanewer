<?php

require_once('./connections/mall.php');

require_once("./class/SQLManager.php");

error_reporting(0);

$id = $_GET['id'];

$sql = new SQLManager();

$sql->field = "productname, productnameen, brandname, model, shortdesc, shortdescen, description, description1, description2,
description3, description4, lastupdated, view, item, users_oid, thumbnailimage, fullimage, fullimage1, fullimage2, fullimage3, fullimage4,
product.show_web, new_product, recommend_product, best_selling, url, id";

$sql->table = "tbl_product AS product
LEFT JOIN product AS mall_product ON product.OID = mall_product.id";

$sql->condition = "where product.show_web = 1 and id = " . $id . " order by id DESC limit 1";

if ($id == "") {

    $sql->condition = "where product.show_web = 1 order by id DESC limit 1";
}

$rowProduct = mysqli_fetch_object($sql->select());




$sql->field = "productname, productnameen, brandname, model, shortdesc, shortdescen, description, description1, description2,
description3, description4, lastupdated, view, item, users_oid, thumbnailimage, fullimage, fullimage1, fullimage2, fullimage3, fullimage4,
product.show_web, new_product, recommend_product, best_selling, url, id";

$sql->table = "tbl_product AS product
LEFT JOIN product AS mall_product ON product.OID = mall_product.id";

$sql->condition = "where product.show_web = 1 order by id DESC limit 3";

$rsProduct3 = $sql->select();

$sql->field = "id";

$rsProduct3Count = $sql->countRow();

$count = 0;

?>




<!-- Header -->
<?php
include('./header.php');
?>
<!-- End of Header -->

<div class="site-header-space "></div>
<!-- Start:: Content -->
<main>
    <!-- Banner -->
    <section class="product-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="swiper-container swiper-product">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="container">
                                    <div class="grid -d2">
                                        <!-- Image Desktop -->
                                        <div class="product-image  pt-5 pt-lg-0 _desktop">
                                            <img src=".<?php echo $rowProduct->fullimage; ?>" alt="" />
                                        </div>
                                        <div class="product-detail order-1 order-lg-2">
                                            <h5 class="product-cat">
                                                <?php echo $rowProduct->model; ?>
                                            </h5>
                                            <h1 class="product-title">
                                                <?php echo $rowProduct->productnameen; ?>
                                            </h1>
                                            <h3 class="line-height-30 mt-3 mb-4">
                                                <?php echo $rowProduct->productname; ?>
                                            </h3>
                                            <span class="product-description">
                                                <?php echo $rowProduct->description; ?>
                                            </span>
                                            <!-- Image Mobile -->
                                            <div class="product-image pt-5 pt-lg-0 _mobile">
                                                <img src=".<?php echo $rowProduct->thumbnailimage; ?>" alt="" />
                                            </div>
                                            <div class="product-size--selector">
                                                <span class="label">ไซส์ :</span>
                                                <div class="radio-toolbar">
                                                    <input type="radio" id="sizeS" name="product-size" value="4" checked>
                                                    <label for="sizeS">
                                                        4 ซอง
                                                    </label>

                                                    <input type="radio" id="sizeM" name="product-size" value="6">
                                                    <label for="sizeM">
                                                        6 ซอง
                                                    </label>

                                                    <input type="radio" id="sizeL" name="product-size" value="10">
                                                    <label for="sizeL">
                                                        10 ซอง
                                                    </label>
                                                </div>
                                            </div>
                                            <a href="<?php echo $rowProduct->url; ?>" class="btn btn-light btn-checkout">
                                                <i class="bi bi-cart3"></i>
                                                ซื้อสินค้า
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefit -->
    <section class="py-5 benefit">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img src=".<?php echo $rowProduct->fullimage2; ?>" class="w-100 animated fadeInLeft" alt="">
                </div>
                <div class="col-12 col-lg-6 d-flex benefit-detail py-4">
                    <div class="px-0 px-lg-5 d-flex flex-column justify-content-center animated fadeInRight">
                        <?php echo html_entity_decode($rowProduct->description1); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex benefit-detail order-2 order-lg-1">
                    <div class="px-0 px-lg-5 d-flex flex-column justify-content-center animated fadeInLeft">
                        <?php echo html_entity_decode($rowProduct->description2); ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-1 order-lg-2">
                    <img src=".<?php echo $rowProduct->fullimage3; ?>" class="w-100 animated fadeInRight" alt="">
                </div>
            </div>
        </div>
    </section>

    <?php
    include('./template/product/product-block_01.php');
    ?>

    <!-- Feature Products -->
    <section class="feature-product">
        <div class="container-fluid">
            <div class="row">
                <div class="swiper-container swiper-feature-product">
                    <div class="slide-header">
                        <h1 class="text-white text-center">สินค้าที่เราแนะนำ</h1>
                        <h3 class="text-white text-center line-height-30 mt-3">
                            ฮอทต้า ฟิวชั่น สไตล์ใหม่ ดื่มได้ทุกเวลา
                        </h3>
                    </div>
                    <div class="swiper-wrapper">

                        <?php
                        if ($rsProduct3Count > 0) :
                            while ($row = mysqli_fetch_object($rsProduct3)) :
                                $count = $count + 1;
                                if($count == 1){
                                    $class = '-left';
                                }
                                if($count == 2){
                                    $class = '-center';
                                }
                                if($count == 3){
                                    $class = '-right';
                                } 
                        ?>
                                <div class="swiper-slide <?php echo $class; ?>">
                                    <div class="product-container">
                                        <a href="content-product.php?id=<?php echo $row->id; ?>" class="product-link">
                                            <div class="product-image">
                                                <img src=".<?php echo $row->thumbnailimage; ?>" alt="" class="product-cold" />
                                                <img src=".<?php echo $row->fullimage1; ?>" alt="" class="product-hot" />
                                            </div>
                                            <div class="btn-viewmore-hover">
                                                <i class="bi bi-plus text-white"></i>
                                                <span>
                                                    ดูสินค้า
                                                </span>
                                            </div>
                                        </a>
                                        <div class="product-title">
                                            <h4 class="font-weight-300 text-white mt-5 mb-0">
                                                <?php echo $row->brandname; ?>
                                            </h4>
                                            <h2 class="text-white mb-0 line-height-25">
                                                <?php echo $row->productname; ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            endwhile;
                        else :
                            ?>


                        <?php endif; ?>

                    </div>
                    <div class="swiper-pagination pagination-feature"></div>
                    <div class="slide-button">
                        <a href="products.php" class="btn btn-outline-light">
                            ดูสินค้าทั้งหมด
                            <i class="bi bi-chevron-right ml-2 _mobile"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End:: Content -->



<!-- Footer -->
<?php
include('./footer.php');
?>
<!-- End of Footer -->