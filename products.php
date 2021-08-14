<?php
include("system/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTTA Fusion</title>

    <link rel="shortcut icon" href="ico/favicon.png">
    <link href="css/vendor.css" rel="stylesheet">
    <link href="css/style-custom.css" rel="stylesheet">
</head>

<body>
    <!-- Start:: PreLoader -->
    <div class="preloader">
        <div id="loading-logo" class="lottie-animated img-loader"></div>
    </div>
    <!-- End:: PreLoader -->
       <!-- Start:: Navbar -->
   <?php include("template/header.php");?>
    <!-- Start:: Fullscreen Nav  -->
      <?php include("template/fullscreen.php");?>
    <!-- End:: Fullscreen Nav -->
    <!-- Start:: Mobile Menu -->
         <?php include("template/mobile.php");?>
    <!-- End:: Mobile Menu -->
    <!-- End:: Navbar -->
    <div class="site-header-space "></div>
    <!-- Start:: Content -->
    <main>
        <!-- Banner -->
        <section class="page-banner -products">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 page-title pt-0 pt-lg-5">
                        <div class="banner-brand d-flex align-items-center align-items-lg-end justify-content-center justify-content-lg-start flex-lg-row flex-column">
                            <img src="./img/fusion-logo.svg" alt="" />
                            <h2 class="mb-0 text-white line-height-30 mt-3">PRODUCTS</h2>
                        </div>
                        <h3 class="mb-0 mt-4 text-white font-weight-300 text-center text-lg-left line-height-1">
                            ฮอทต้า ฟิวชั่น เครื่องดื่มสไตล์ใหม่ ดื่มได้ทุกเวลา
                        </h3>
                    </div>
                    <div class="col-12 _desktop col-lg-6 page-social p-5 align-items-center align-items-lg-end">
                        <h4 class="text-white">ติดตามเรื่องราวของเราได้ที่</h4>
                        <div class="social">
                            <a href="https://www.facebook.com/HOTTAFusionThailand/" target="_blank" class="social-item">
                                <img src="./img/icon-facebook.svg" alt="icon facebook" />
                            </a>
                            <a href="https://www.instagram.com/hottafusion/" target="_blank" class="social-item">
                                <img src="./img/icon-instagram.svg" alt="icon facebook" />
                            </a>
                            <a  href="https://www.youtube.com/channel/UCCvoNxlK0a_jLNcWw4uVyHA" target="_blank" class="social-item">
                                <img src="./img/icon-youtube.svg" alt="icon facebook" />
                            </a>
                            <a href="https://lin.ee/lCoY7FM" target="_blank" class="social-item">
                                <img src="./img/icon-line.svg" alt="icon facebook" />
                            </a>
                            <a  href="https://twitter.com/hottafusion" target="_blank" class="social-item">
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
                                  <a class="dropdown-item" href="#">INSTANT</a>
                                  <a class="dropdown-item" href="#">READY TO DRINK</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="row">
  <?php
  $sql = "SELECT * FROM tbl_product ORDER BY oid DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo'<div class="col-6 col-md-4 px-2 px-lg-30">
                        <article class="card -lg">
                            <a href="content-product.php?id='.$row["oid"].'">
                                <div class="pic bg-lightgreen">
                                    <picture class="product-cold">
                                        <source srcset="./img/FUSION LIME-box.webp" type="image/webp">
                                        <img src="./img/FUSION LIME-box.png" alt="" />
                                    </picture>
                                    <picture class="product-hot">
                                        <source srcset="./img/FUSION LIME-hot@2x.webp" type="image/webp">
                                        <img src="./img/FUSION LIME-hot@2x.png" alt="" />
                                    </picture>
                                    <div class="btn-viewmore-hover">
                                        <i class="bi bi-plus text-white"></i>
                                        <span>
                                            ดูสินค้า
                                        </span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h3 class="topic mb-0">
                                      '.$row["shortth_name"].'
                                    </h3>
                                    <h5 class="font-weight-300 text-center line-height-30">
                                      '.$row["shortth_name"].'
                                    </h5>
                                    <p class="sub-topic">
                                    '.$row["short_descriptionTH"].'
                                    </p>
                                </div>
                            </a>
                        </article>
                    </div>';
	  }
} else {
  echo "0 results";
}
?>

                    <!-- <div class="col-6 col-md-4 px-2 px-lg-30">
                        <article class="card -lg">
                            <a href="content-product.html">
                                <div class="pic bg-lightgreen">
                                    <picture class="product-cold">
                                        <source srcset="./img/FUSION LIME-box.webp" type="image/webp">
                                        <img src="./img/FUSION LIME-box.png" alt="" />
                                    </picture>
                                    <picture class="product-hot">
                                        <source srcset="./img/FUSION LIME-hot@2x.webp" type="image/webp">
                                        <img src="./img/FUSION LIME-hot@2x.png" alt="" />
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
                                        ฮอทต้า ฟิวชั่น 3 รสชาติ
                                    </h3>
                                    <p class="sub-topic">
                                        LOREM IPSUM DOLOR SIT AMET, CONSETETUR SADIPSCING ELITR
                                    </p>
                                </div>
                            </a>
                        </article>
                    </div>
                    <div class="col-6 col-md-4 px-2 px-lg-30">
                        <article class="card -lg">
                            <a href="content-product.html">
                                <div class="pic bg-green">
                                    <picture class="product-cold">
                                        <source srcset="./img/FUSION-MATCHA_LATTE-box.webp" type="image/webp">
                                        <img src="./img/FUSION-MATCHA_LATTE-box.png" alt="" />
                                    </picture>
                                    <picture class="product-hot">
                                        <source srcset="./img/FUSION MATCHA_LATTE-hot@2x.webp" type="image/webp">
                                        <img src="./img/FUSION MATCHA_LATTE-hot@2x.png" alt="" />
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
                                        ฮอทต้า ฟิวชั่น 3 รสชาติ
                                    </h3>
                                    <p class="sub-topic">
                                        LOREM IPSUM DOLOR SIT AMET, CONSETETUR SADIPSCING ELITR
                                    </p>
                                </div>
                            </a>
                        </article>
                    </div>
                    <div class="col-6 col-md-4 px-2 px-lg-30">
                        <article class="card -lg">
                            <a href="content-product.html">
                                <div class="pic bg-darkgreen">
                                    <picture class="product-cold">
                                        <source srcset="./img/FUSION-MATCHA-box.webp" type="image/webp">
                                        <img src="./img/FUSION-MATCHA-box.png" alt="" />
                                    </picture>
                                    <picture class="product-hot">
                                        <source srcset="./img/FUSION MATCHA-hot@2x.webp" type="image/webp">
                                        <img src="./img/FUSION MATCHA-hot@2x.png" alt="" />
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
                                        ฮอทต้า ฟิวชั่น 3 รสชาติ
                                    </h3>
                                    <p class="sub-topic">
                                        LOREM IPSUM DOLOR SIT AMET, CONSETETUR SADIPSCING ELITR
                                    </p>
                                </div>
                            </a>
                        </article>
                    </div> -->
                </div>
            </div>
        </section>
    </main>
    <!-- End:: Content -->
    <!-- Start:: Footer -->
    <!-- <div class="site-footer-space"></div> -->
    <footer class="site-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-1 d-flex align-items-center p-0">
                    <div class="footer-logo">
                        <img src="./img/logo.svg" alt="" class="w-100" />
                    </div>
                    <div class="footer-headline bg-primary-2 d-flex w-100 align-items-center justify-content-end h-100 _mobile">
                        <h4 class="m-0 text-white font-weight-900 w-100 text-center line-height-25">
                            สไตล์ใหม่ ดื่มได้ทุกเวลา
                        </h4>
                    </div>
                </div>
                <div class="col-12 col-lg-5 d-flex footer-social align-items-center justify-content-center py-4 px-4 py-lg-0 px-lg-2">
                    <div class="footer-headline bg-primary-2 d-flex align-items-center justify-content-end h-100 _desktop">
                        <h4 class="m-0 text-white font-weight-900 line-height-25">
                            สไตล์ใหม่ ดื่มได้ทุกเวลา
                        </h4>
                    </div>
                    <div class="social mx-2 mt-3 mt-lg-0">
                        <a href="https://www.facebook.com/HOTTAFusionThailand/" target="_blank" class="social-item">
                            <img src="./img/icon-facebook.svg" alt="icon facebook" />
                        </a>
                        <a href="https://www.instagram.com/hottafusion/" target="_blank" class="social-item">
                            <img src="./img/icon-instagram.svg" alt="icon facebook" />
                        </a>
                        <a href="https://www.youtube.com/channel/UCCvoNxlK0a_jLNcWw4uVyHA" target="_blank" class="social-item">
                            <img src="./img/icon-youtube.svg" alt="icon facebook" />
                        </a>
                        <a href="https://lin.ee/lCoY7FM" target="_blank" class="social-item">
                            <img src="./img/icon-line.svg" alt="icon facebook" />
                        </a>
                        <a href="https://twitter.com/hottafusion" target="_blank" class="social-item">
                            <img src="./img/icon-twitter.svg" alt="icon facebook" />
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-3 d-flex bg-primary-1 flex-wrap align-items-center justify-content-center px-4">
                   <div class="footer-link">
                        <a href="privacy-policy.html" class="link">
                            Privacy Policy
                        </a>
                        <a href="term-and-condition.html" class="link">
                            Term & Conditions
                        </a>
                   </div>
                </div>
                <div class="col-12 col-lg-3 d-flex bg-primary-1 flex-wrap align-items-center justify-content-center p-4 footer-copyright">
                    <a href="https://www.ncp.co.th" target="_blank">
                        <img src="./img/footer-brand.svg" alt="" class="mw-100">
                        <span>
                            © 2021 New Concept Product Co.,Ltd.
                        </span>
                    </a>
                </div>
                
            </div>
        </div>
    </footer>
    <!-- End:: Footer -->
    <div class="sticky-menu -hide" id="stickyMenu"> 
        <button class="btn-toggle" onclick="sticky.toggle()">
            <div id="toggle_text">
                แสดง <i class="bi bi-chevron-up"></i>
            </div>
        </button>
        <div class="sticky-menu--container">
            <a href="products.html" class="sticky-menu--item">
                <div class="inner">
                    <img src="./img/icon-sticky1.svg" alt="">
                    สินค้า
                </div>
            </a>
            <a href="https://www.liveandfit.com/th/%E0%B8%AE%E0%B8%AD%E0%B8%97%E0%B8%95%E0%B9%89%E0%B8%B2/%E0%B8%AE%E0%B8%AD%E0%B8%97%E0%B8%95%E0%B9%89%E0%B8%B2-%E0%B8%9F%E0%B8%B4%E0%B8%A7%E0%B8%8A%E0%B8%B1%E0%B9%88%E0%B8%99/13/47/153/" target="_blank" class="sticky-menu--item">
                <div class="inner">
                    <img src="./img/icon-sticky2.svg" alt="">
                    โปรโมชัน
                </div>
            </a>
        </div>
        <button class="btn-gotop" onclick="sticky.toTop()">
            <i class="bi bi-chevron-double-up"></i>
        </div>
    </div>
    <!-- Start:: Search Modal -->
    <div class="modal search-modal fade" id="siteSearch" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="siteSearchLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
                </div>

                <div class="modal-body">
                    <form role="search" method="get" class="search-form" action="#">
                        <div class="input-group input-group-custom mb-3">
                            <input type="text" class="form-control" placeholder="ค้นหา">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: Search Modal -->
</body>

<!-- Vendor -->
<script src="js/vendor/jquery.min.js"></script> 
<script src="js/vendor/popper.min.js"></script> 
<script src="js/vendor/bootstrap.min.js"></script> 
<script src="js/vendor/lottie.min.js"></script> 
<script src="js/vendor/swiper-bundle.js"></script> 
<script src="js/vendor/wow.js"></script> 
<script src="js/vendor/magnific-popup.min.js"></script> 
<script src="js/vendor/slick.min.js"></script> 
<!-- Javascript Custom --> 
<script src="js/script-custom.js"></script> 

</html>