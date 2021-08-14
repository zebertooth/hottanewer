<?php
include("system/connect.php");
$sql = "SELECT * FROM tbl_product where oid =".$_GET['id']."";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['shortth_name'];?></title>

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
        <section class="product-banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="swiper-product">
                            <div class="">
                                <div class="">
                                    <div class="container">
                                        <div class="grid -d2">
                                            <!-- Image Desktop -->
                                            <div class="product-image  pt-5 pt-lg-0 _desktop">
                                                <img src="./img/Ginger-lime-5pcs@2x.png" data-image-value="5" class="product-image-value" alt="" />
                                                <img src="./img/Ginger-lime-10pcs@2x.png" data-image-value="10" class="product-image-value" style="display: none;" alt="" />
                                            </div>
                                            <div class="product-detail order-1 order-lg-2">
                                                <h5 class="product-cat">
                                                   <?php echo $row['type_name'];?>
                                                </h5>
                                                <h1 class="product-title">
                                                    <?php echo $row['shorten_name'];?>
                                                </h1>
                                                <h3 class="line-height-30 mt-3 mb-4">
                                                    <?php echo $row['shortth_name'];?>
                                                </h3>
                                                <span class="product-description">
                                                <?php echo $row['short_descriptionTH'];?>
                                                     
                                                </span>
                                                <!-- Image Mobile -->
                                                <div class="product-image pt-5 pt-lg-0 _mobile">
                                                    <img src="./img/Ginger-lime-5pcs@2x.png" data-image-value="5" class="product-image-value" alt="" />
                                                    <img src="./img/Ginger-lime-10pcs@2x.png" data-image-value="10" class="product-image-value" style="display: none;" alt="" />
                                                </div>
                                                <div class="product-size--selector">
                                                    <span class="label">ไซส์ :</span>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="sizeS" name="product-size" value="5" checked>
                                                        <label for="sizeS">
                                                            5 ซอง
                                                        </label>
                                                    
                                                        <input type="radio" id="sizeL" name="product-size" value="10">
                                                        <label for="sizeL">
                                                            10 ซอง
                                                        </label> 
                                                    </div>
                                                </div>
                                                <a href=" <?php echo $row['urllink'];?>" class="btn btn-light btn-checkout" target="_blank">
                                                    <i class="bi bi-cart3"></i>
                                                    ซื้อสินค้า
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="swiper-button-next" href="#"></a>
                            <a class="swiper-button-prev" href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Benefit destop-->
        <section class="py-5 benefit">
<?php echo $row['detail'];?>  
        </section>
        <section class="howto-drink-m _mobile -hot" id="product_howto_drink">
            <h2 class="text-white text-center mb-0">ดื่มอร่อยได้ง่ายๆ</h2>
            <h3 class="text-white text-center font-weight-300 line-height-30"> ทั้งชงดื่มร้อนและเย็น</h3>
            <div class="tab-content pt-3 pb-5" id="nav-tabContent">
                <nav class="drink-tab">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active howto-drink--tab -hot-tab" id="nav-hot-tab" data-toggle="tab" href="#nav-hot" role="tab" aria-controls="nav-hot" aria-selected="true">
                            <span>
                                ดื่มร้อน
                            </span>
                      </a>
                      <a class="nav-item nav-link howto-drink--tab -cold-tab" id="nav-cold-tab" data-toggle="tab" href="#nav-cold" role="tab" aria-controls="nav-cold" aria-selected="false">
                            <span>
                                ดื่มเย็น
                            </span>
                      </a>
                    </div>
                </nav>

                <div class="tab-pane fade show active" id="nav-hot" role="tabpanel" aria-labelledby="nav-hot-tab">
                    <div class="swiper-container swiper-hot-drink">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="./img/hot-1.png" class="w-100" alt="" />
                                <span class="caption">ใช้ ฮอทต้า ฟิวชั่น 1 ซอง </span>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/hot-2.png" class="w-100" alt="" />
                                <span class="caption">เติมน้ำร้อน 150 มล.</span>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/hot-3.png" class="w-100" alt="" />
                                <span class="caption">คนให้เข้ากันดื่มได้ทันที</span>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-cold" role="tabpanel" aria-labelledby="nav-cold-tab">
                    <div class="swiper-container swiper-cold-drink">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="./img/cold-1.png" class="w-100" alt="" />
                                <span class="caption">ใช้ ฮอทต้า ฟิวชั่น 1 ซอง </span>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/cold-2.png" class="w-100" alt="" />
                                <span class="caption">เติมน้ำร้อน 100 มล.</span>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/cold-3.png" class="w-100" alt="" />
                                <span class="caption">คนให้เข้ากัน เติมน้ำแข็งลงไป</span>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
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
                            <h1 class="text-white text-center">สินค้าที่เราแนะนำ</h1>
                            <h3 class="text-white text-center line-height-30 mt-3">
                                ฮอทต้า ฟิวชั่น สไตล์ใหม่ ดื่มได้ทุกเวลา
                            </h3>
                        </div>
                        <div class="swiper-wrapper">
  <?php
  $sql = "SELECT * FROM tbl_product ORDER BY oid DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo' <div class="swiper-slide -left">
                               
                                <div class="product-container">
                                    <a href="content-product.php?id='.$row["oid"].'" class="product-link">
                                        <div class="product-image">
                                            <img src="./img/FUSION LIME-box.png" alt="" class="product-cold" />
                                            <img src="./img/FUSION LIME-hot@2x.png" alt="" class="product-hot" />
                                        </div>
                                        <div class="btn-viewmore-hover">
                                            <i class="bi bi-plus text-white"></i>
                                            <span>
                                                ดูสินค้า
                                            </span>
                                        </div>
                                    </a>
                                    <div class="product-title">
                                        <h4 class="font-weight-300 text-white mb-0">
                                       '.$row["brand_TH"].'
                                        </h4>
                                        <h1 class="text-white mb-0 line-height-25">
                                            '.$row["shortth_name"].'
                                        </h1>
                                    </div>
                                </div>
                            </div>';
		  }
} else {
  echo "0 results";
}
?>
                        </div>
                        <div class="swiper-pagination pagination-feature"></div>
                        <div class="slide-button">
                            <a href="products.html" class="btn btn-outline-light">
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
                        <a href="https://lin.ee/nWwUafZ" target="_blank" class="social-item">
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