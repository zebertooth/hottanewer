<?php


require_once('./connections/mall.php');

require_once("./class/SQLManager.php");


$sql = new SQLManager();

$sql->field = "id, banner, banner_en, link, show_web";

$sql->table = "banner";

$sql->condition = "";

$rsBanner = $sql->select();

$sql->field = "id";

$rsBannerCount = $sql->countRow();



$sql->field = "id, banner, banner_en, type, caption, link, show_web";

$sql->table = "banner_carousel";

$sql->condition = "";

$rsCarousel = $sql->select();

$sql->field = "id";

$rsCarouselCount = $sql->countRow();



$sql->field = "mall_product.id, productname, productnameen, brandname, brandnameen, model, shortdesc, shortdescen, description, description1, description2,
description3, description4, lastupdated, view, item, users_oid, thumbnailimage, fullimage, fullimage1, fullimage2, fullimage3, fullimage4,
product.show_web, new_product, recommend_product, best_selling";

$sql->table = "tbl_product AS product
LEFT JOIN product AS mall_product ON product.OID = mall_product.id";

$sql->condition = "where product.show_web = 1  order by productname ASC limit 3";

$rsProduct = $sql->select();

$sql->field = "id";

$rsProductCount = $sql->countRow();

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
    <section class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="swiper-container -main-banner swiper-homepage">
                    <div class="swiper-wrapper">
                        <?php
                        if ($rsBannerCount > 0) :
                            while ($row = mysqli_fetch_object($rsBanner)) :
                                $count = $count + 1
                        ?>

                                <div class="swiper-slide">
                                    <img src="./upload/banner/<?php echo $row->banner; ?>" alt="" class="_desktop" />
                                    <img src="./upload/banner/<?php echo $row->banner_en; ?>" alt="" class="_mobile" />
                                </div>


                            <?php
                            endwhile;
                        else :
                            ?>


                        <?php endif; ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ready To Fusion Video -->
    <section class="ready-to-fusion">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-lg-5 ready-to-fusion--content">
                        <img src="./img/fusion-dude.svg" class="w-100" alt="" />
                        <button class="btn-video pulse animate" data-toggle="modal" data-target="#siteVideo">
                            <i class="bi bi-play-fill"></i>
                            <span>
                                START
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <!-- I AM FUSION -->
    <section class="iam-fusion pt-5 pb-3 position-relative">
        <div class="container px-30">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="img/i-am-fusion.svg" alt="" class="mw-100" />
                    <h3 class="text-grey">
                        คนฟิวชั่น เป็นแบบไหน
                    </h3>
                </div>
                <div class="swiper-container swiper-iam-mobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide iam-animate wow fadeInUp" data-wow-delay="500ms">
                            <img src="img/iam-trendy.png" alt="">
                            <h3> ทันสมัย</h3>
                            <span>ต้องเป็นคนทันสมัยใส่ใจตัวเอง</span>
                        </div>
                        <div class="swiper-slide iam-animate wow fadeInUp" data-wow-delay="1000ms">
                            <img src="img/iam-fresh.png" alt="">
                            <h3> สดชื่นสดใส</h3>
                            <span>มีความสดใสพร้อมเติมพลังบวก</span>
                        </div>
                        <div class="swiper-slide iam-animate wow fadeInUp" data-wow-delay="1500ms">
                            <img src="img/iam-different.png" alt="">
                            <h3>ชอบความแตกต่าง</h3>
                            <span>มองหาสิ่งใหม่ๆให้กับตัวเองอยู่เสมอ</span>
                        </div>
                    </div>
                    <div class="swiper-pagination dark-theme"></div>
                </div>
                <div class="col-lg-12 text-center mt-3 mt-lg-0">
                    <a href="about.php" class="btn btn-outline-primary">
                        รู้จักเราเพิ่มเติม <i class="bi bi-chevron-right ml-2 _mobile"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="triangle-down">
            <div></div>
        </div>
    </section>
    <!-- Reason To Drink -->
    <section class="reason-fusion">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="img/reason-logo.svg" class="mw-100" alt="">
                        <h3 class="text-white">
                            เหตุผลที่ควรดื่มฮอทต้า ฟิวชั่น
                        </h3>
                    </div>
                    <div class="swiper-container swiper-reason-mobile">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide -left">
                                <div class="item-container">
                                    <div class="reason-img">
                                        <!-- <img src="img/right.gif" class="wow fadeInLeft arrow-right" alt="" /> -->
                                        <div id="arrow-right" class="lottie-animated img-loader wow fadeInLeft arrow-right"></div>
                                        <img src="img/reason-to-img1.png" alt="">
                                    </div>
                                    <div class="reason-content">
                                        <h3> ดีต่อร่างกาย</h3>
                                        <span>ดีต่อใจทุกแก้วที่ชง</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide -center">
                                <img src="./img/reason-circle.svg" class="arrow-circle" alt="">
                                <div class="item-container">
                                    <img src="img/hotta-fusion-cup.png" alt="">
                                </div>

                                <div id="arrow-down" class="lottie-animated img-loader wow fadeInDown arrow-down _desktop"></div>
                                <!-- <img src="img/down.gif" class="wow fadeInDown arrow-down" alt="" /> -->
                            </div>
                            <div class="swiper-slide -right">
                                <div class="item-container">
                                    <div class="reason-img">
                                        <div id="arrow-left" class="lottie-animated img-loader wow fadeInRight arrow-left"></div>
                                        <!-- <img src="img/left.gif" class="wow fadeInRight arrow-left" alt="" /> -->
                                        <img src="img/reason-to-img3.png" alt="">
                                    </div>
                                    <div class="reason-content">
                                        <h3> รสชาติเซอร์ไพรส์</h3>
                                        <span>มันดีกว่าที่คิด</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section>
    <!-- Feature Products -->
    <section class="feature-product">
        <div class="container-fluid">
            <div class="row">
                <div class="swiper-container swiper-feature-product">
                    <div class="slide-header">
                        <img src="img/feature-image-logo.svg" class="mw-100 px-5" alt="">
                        <h3 class="text-white text-center line-height-30 mt-3">
                            ฮอทต้า ฟิวชั่น สไตล์ใหม่ ดื่มได้ทุกเวลา
                        </h3>
                    </div>
                    <div class="swiper-wrapper">
                        <?php

                        $count = 0;

                        if ($rsProductCount > 0) :
                            while ($row = mysqli_fetch_object($rsProduct)) :
                                $count = $count + 1
                        ?>
                                <div class="swiper-slide <?php if ($count == 1) : echo "-left";
                                                            elseif ($count == 2) : echo "-center";
                                                            elseif ($count = 3) : echo "-right";
                                                            endif ?> ">

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
    <!-- Find Hotta -->
    <section class="find-fusion">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center bg-primary-1 py-lg-5 flex-column find-fusion-1">
                        <img src="img/find-logo.svg" alt="" class="mw-100 px-3" />
                        <h3 class="text-white w-100 line-height-30 mt-4 text-center">
                            หาซื้อได้ที่ไหน
                        </h3>
                        <img src="./img/triangle-down.png" width="100%" alt="" class="brand-triangle-down _mobile" />
                        <img src="./img/triangle-right.png" width="100%" alt="" class="brand-triangle-right _desktop" />
                    </div>
                    <div class="col-12 col-lg-9 find-fusion-2">
                        <div class="swiper-container swiper-brand">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/bigC.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/tesco.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/top.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/maxvalu.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/gourmet.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/makro.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/foodland.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/Live_fit.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/shopee.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/lazada.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination dark-theme"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="fusion-time py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <img src="img/fusion-time-logo.svg" alt="" class="mw-100" />
                    <h3 class="text-white line-height-30 mt-4 text-center">
                        สนุกได้ ทุกเวลา กับ ฮอทต้า ฟิวชั่น
                    </h3>
                </div>
            </div>
            <div class="row py-5">
                <div class="ig-header mt-4">
                    <img src="img/ig-header.svg" alt="" />
                </div>
                <!-- Slick Slider -->
                <div class="slick-center col-12">


                    <?php
                    if ($rsCarouselCount > 0) {
                        while ($row = mysqli_fetch_object($rsCarousel)) {
                            $count = $count + 1;

                            if ($row->type == "video") {

                    ?>

                                <div class="slide" data-caption="<?php echo $row->caption; ?>">
                                    <div class="slide-inner -video">
                                        <video class="video-ig">
                                            <source src="./upload/carousel/<?php echo $row->type; ?>/<?php echo $row->banner; ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>

                            <?php
                            } elseif ($row->type == "picture") {
                            ?>

                                <div class="slide" data-caption="<?php echo $row->caption; ?>">
                                    <div class="slide-inner">
                                        <img src="./upload/carousel/<?php echo $row->type; ?>/<?php echo $row->banner; ?>" alt="" />
                                    </div>
                                </div>

                    <?php
                            }
                        }
                    }
                    ?>

                </div>
                <div class="ig-footer">
                    <img src="img/ig-footer.svg" alt="" />
                    <div class="ig-meta">
                        <p class="ig-caption">
                            <span class="title">
                                HOTTA FUSION
                            </span>
                            <span class="caption" id="ig_caption">
                                ดื่มได้ทุกที่ ทุกเวลา
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fusion-blog py-5">
            <div class="container-fluid max-1400">
                <div class="row">
                    <div class="col text-center">
                        <img src="img/fusion-trend-logo.svg" alt="" class="mw-100" />
                        <h3 class="text-grey line-height-30 mt-4 text-center">
                            ฟิวชั่นเทรนด์ มันดีกว่าที่คิด
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="swiper-container swiper-trend-blog">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="content-product.php" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog1.webp" type="image/webp">
                                                <img src="./img/blog1.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">TREND</span>
                                                </div>
                                                <h3 class="topic">
                                                    ฮอทต้า ฟิวชั่น 3 รสชาติ
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="trend.php" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog2.webp" type="image/webp">
                                                <img src="./img/blog2.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">TREND</span>
                                                </div>
                                                <h3 class="topic">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel nisi viverra, aliquet velit vitae, vehicula justo. Nunc eget hendrerit mi, sit amet commodo leo.
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="trend.php" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog3.webp" type="image/webp">
                                                <img src="./img/blog3.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">FOODS</span>
                                                </div>
                                                <h3 class="topic">
                                                    7 วิธีรีแลคชิค ๆ ให้ชีวิตผ่อนคลาย
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="trend.php" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog4.webp" type="image/webp">
                                                <img src="./img/blog4.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">DRINK</span>
                                                </div>
                                                <h3 class="topic">
                                                    สมุนไพรลดความดันโลหิตสูง
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="trend.php" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog1.webp" type="image/webp">
                                                <img src="./img/blog1.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">TREND</span>
                                                </div>
                                                <h3 class="topic">
                                                    ฮอทต้า ฟิวชั่น 3 รสชาติ
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="content-product.html" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog2.webp" type="image/webp">
                                                <img src="./img/blog2.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">TREND</span>
                                                </div>
                                                <h3 class="topic">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel nisi viverra, aliquet velit vitae, vehicula justo. Nunc eget hendrerit mi, sit amet commodo leo.
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="content-product.html" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog3.webp" type="image/webp">
                                                <img src="./img/blog3.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">FOODS</span>
                                                </div>
                                                <h3 class="topic">
                                                    7 วิธีรีแลคชิค ๆ ให้ชีวิตผ่อนคลาย
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="content-product.html" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./img/blog4.webp" type="image/webp">
                                                <img src="./img/blog4.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">DRINK</span>
                                                </div>
                                                <h3 class="topic">
                                                    สมุนไพรลดความดันโลหิตสูง
                                                </h3>
                                            </div>
                                            <div class="blog-link">
                                                <button>
                                                    <div class="icon">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </div>
                                                    <span class="text">อ่านเพิ่มเติม</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div class="row pt-5 pt-lg-2 pb-4 px-3">
                    <div class="col text-center">
                        <a href="trend.php" class="btn btn-outline-primary">
                            ดูทั้งหมด <i class="bi bi-chevron-right ml-2 _mobile"></i>
                        </a>
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