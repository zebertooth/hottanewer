<?php


require_once('./connections/mall.php');

require_once("./class/SQLManager.php");


$sql = new SQLManager();

$sql->field = "id, productname, productnameen, brandname, model, shortdesc, shortdescen, description, description1, description2,
description3, description4, lastupdated, view, item, users_oid, thumbnailimage, fullimage, fullimage1, fullimage2, fullimage3, fullimage4,
product.show_web, new_product, recommend_product, best_selling, url";

$sql->table = "tbl_product AS product
LEFT JOIN product AS mall_product ON product.OID = mall_product.id";

$sql->condition = "where product.show_web = 1 order by productname ASC ";

$rsProduct = $sql->select();

$sql->field = "id";

$rsProductCount = $sql->countRow();

// $sql->field = "id, title, intro, thumb, pic1, pic2, pic3, pic4, pic5, detail1, detail2, detail3, detail4, detail5,
// name_attach1, name_attach2, name_attach3, attach1, attach2, attach3, date_start, date_end,
// date_post, view, product.show_web, type";

// $sql->condition = "where product.show_web = 1 order by id DESC limit 6";

// $rsNews6 = $sql->select();

// $sql->field = "id";

// $rsNews6Count = $sql->countRow();

$count = 0;





?>



<!-- Header -->
<?php
include('./header.php');
?>
<!-- End of Header -->


<!-- Start:: Content -->
<main>
    <!-- Banner -->
    <section class="page-banner -products">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 page-title pt-5">
                    <div class="banner-brand d-flex align-items-center align-items-lg-end justify-content-center justify-content-lg-start flex-lg-row flex-column">
                        <img src="./img/fusion-logo.svg" alt="" />
                        <h2 class="mb-0 text-white line-height-30 mt-3">PRODUCTS</h2>
                    </div>
                    <h3 class="mb-0 text-white font-weight-300 text-center text-lg-left ">
                        ฮอทต้า ฟิวชั่น สไตล์ใหม่ ดื่มได้ทุกเวลา
                    </h3>
                </div>
                <div class="col-12 col-lg-6 page-social p-5 align-items-center align-items-lg-end">
                    <h4 class="text-white">ติดตามเรื่องราวของเราได้ที่</h4>
                    <div class="social">
                        <a href="#" class="social-item">
                            <img src="./img/icon-facebook.svg" alt="icon facebook" />
                        </a>
                        <a href="#" class="social-item">
                            <img src="./img/icon-instagram.svg" alt="icon facebook" />
                        </a>
                        <a href="#" class="social-item">
                            <img src="./img/icon-youtube.svg" alt="icon facebook" />
                        </a>
                        <a href="#" class="social-item">
                            <img src="./img/icon-line.svg" alt="icon facebook" />
                        </a>
                        <a href="#" class="social-item">
                            <img src="./img/icon-twitter.svg" alt="icon facebook" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-5 px-0 px-lg-5 bg-grey">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <div class="category-filter">
                        <label for="" class="filter-label">
                            หมวดหมู่ :
                        </label>
                        <div class="dropdown filter-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ทั้งหมด
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Instant</a>
                                <a class="dropdown-item" href="#">Ready to drink</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <?php
                if ($rsProductCount > 0) :
                    while ($row = mysqli_fetch_object($rsProduct)) :
                        $count = $count + 1
                ?>


                        <div class="col-6 col-md-4 px-2 px-lg-30">
                            <article class="card -lg">
                                <a href="content-product.php?id=<?php echo $row->id; ?>">
                                    <div class="pic bg-lightgreen">
                                        <picture class="product-cold">
                                            <source srcset="" type="image/webp">
                                            <img src=".<?php echo $row->thumbnailimage; ?>" alt="" />
                                        </picture>
                                        <picture class="product-hot">
                                            <source srcset="./img/FUSION LIME-hot@2x.webp" type="image/webp">
                                            <img src=".<?php echo $row->fullimage1; ?>" alt="" />
                                        </picture>
                                        <div class="btn-viewmore-hover">
                                            <i class="bi bi-plus text-white"></i>
                                            <span>
                                                ดูสินค้า
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="topic">
                                            <?php echo $row->productname; ?>
                                        </h3>
                                        <p class="sub-topic">
                                            <?php echo $row->description; ?>
                                        </p>
                                    </div>
                                </a>
                            </article>
                        </div>




                    <?php
                    endwhile;
                else :
                    ?>


                <?php endif; ?>

                
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