<?php
include("system/connect.php");
$sql = "SELECT * FROM news where id=".$_GET['id']."";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title'];?></title>

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
        <!-- Blog Hero -->
        <section class="py-5 px-2">
            <div class="container-lg">
                <div class="row">
                    <div class="col">
                        <article class="card -hero">
                            <a href="#" class="d-flex flex-column">
                                <div class="pic">
                                    <img src="./items/uploads/news/<?php echo $row["thumb"];?>" alt="" />
                                </div>
                                <div class="blog-content">
                                    <h3 class="topic text-left text-lg-center">
                                        <?php echo $row["intro"];?>
                                    </h3>
                                    <div class="blog-meta justify-content-start justify-content-lg-center">
                                        <span class="time">10 ธ.ค. 2021</span>
                                        <div class="category">
                                            <span class="category-item">TREND</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                </div>
            </div>
            <div class="container max-1000">
                <div class="row">
                    <div class="col p-0">
                        <div class="entry-content">
                            <?php echo $row['detail'];?>
                        </div>
                        <div class="entry-footer">
                            <div class="text-center">
                                <a href="javascript:history.back()" class="btn btn-outline-primary">
                                    ย้อนกลับ
                                </a>
                            </div>
                            <div class="share-container pt-5 pb-3">
                                <h5 class="font-weight-300"> แชร์บทความนี้</h5>
                                <div class="social-share-icon"></div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </section>
        <section class="related pb-5">
            <div class="container-fluid max-1400 px-30 pb-5">
                <h2 class="text-center">
                    บทความอื่นๆที่แนะนำ
                </h2>
                <div class="swiper-container swiper-relate-content">
                    <div class="swiper-wrapper">
  <?php
  $sql = "SELECT * FROM news ORDER BY id DESC limit 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo'
                        <div class="swiper-slide">
                            <article class="card -blog">
                                <a href="content.html" class="d-flex flex-column  h-100">
                                    <div class="pic">
                                        <picture>
                                   <source srcset="./items/uploads/news/'.$row["thumb"].'" type="image/webp">
                                                <img src="./items/uploads/news/'.$row["thumb"].'" alt="" />
                                        </picture>
                                    </div>
                                    <div class="d-flex flex-fill flex-column justify-content-between"> 
                                        <div class="blog-content">
                                            <div class="category">
                                                <span class="category-item">TREND</span>
                                            </div>
                                            <h3 class="topic">
                                            '.$row["title"].'
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
                        </div>';
  }
} else {
  echo "0 results";
}
?>
                       
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