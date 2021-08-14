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

<body class="home">
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
        <section class="container-fluid">
            <div class="row">
                <div class="col px-0">
                    <div class="swiper-container -main-banner swiper-homepage">
                        <div class="swiper-wrapper">
  <?php
  $sql = "SELECT * FROM banner where type='1' ORDER BY orderindex ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo'
                            <div class="swiper-slide">
                                <img src="./items/uploads/banner/'.$row["banner"].'" alt="" class="_desktop" />
                           
                            </div>
';
  }
} else {
  echo "0 results";
}
?>

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
                                <span>ชอบความทันสมัยใส่ใจดูแลตัวเอง</span>
                            </div>
                            <div class="swiper-slide iam-animate wow fadeInUp" data-wow-delay="1000ms">
                                <img src="img/iam-fresh.png" alt="">
                                <h3> สดชื่นสดใส</h3>
                                <span>สนุกกับการใช้ชีวิตพร้อมเติมพลังบวก</span>
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
            <div class="triangle-down"><div></div></div>
        </section>
        <!-- Reason To Drink -->
        <section class="reason-fusion">
            <div class="container">
                <div class="row" style="margin-left: -30px; margin-right: -30px;">
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
                            <img src="img/feature-image-logo.svg" class="w-100 px-5" alt="">
                            <h3 class="text-white text-center line-height-30 mt-3">
                                เครื่องดื่มสไตล์ใหม่ดื่มได้ทุกเวลา
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
<!-----=   <div class="swiper-slide -center">
                                <div class="product-container">
                                    <a href="content-product2.php" class="product-link">
                                        <div class="product-image">
                                           
                                            <img src="./img/FUSION-MATCHA-box.png" alt="" class="product-cold" />
                                            <img src="./img/FUSION MATCHA-hot@2x.png" alt="" class="product-hot" />
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
                                            ฮอทต้า ฟิวชั่น
                                        </h4>
                                        <h1 class="text-white mb-0 line-height-25">
                                            มัทฉะผสมขิง
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide -right">
                                <div class="product-container">
                                    <a href="content-product3.php" class="product-link">
                                        <div class="product-image">
                                            <img src="./img/FUSION-MATCHA_LATTE-box.png" alt="" class="product-cold" />
                                            <img src="./img/FUSION MATCHA_LATTE-hot@2x.png" alt="" class="product-hot" />
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
                                            ฮอทต้า ฟิวชั่น
                                        </h4>
                                        <h1 class="text-white mb-0 line-height-25">
                                            มัทฉะลาเต้ผสมขิง
                                        </h1>
                                    </div>
                                </div>
                            </div>--->
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
                                        <img src="./img/homefreshmart.svg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-inner">
                                        <img src="./img/centralfoodhall.svg" alt="">
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
        <section class="fusion-time py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <img src="img/fusion-time-logo.svg" alt="" class="mw-100" />
                        <h3 class="text-white line-height-30 mt-4 text-center">
                            สนุกได้ ทุกเวลา กับ ฮอทต้า ฟิวชั่น
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="ig-header">
                        <img src="img/ig-header.svg" alt="" />
                    </div>
                    <!-- Slick Slider -->
                    <div class="slick-center col-12">
          <!----   <div class="slide" data-caption="ดื่มได้ทุกที่ ทุกเวลา">
                            <div class="slide-inner -video">
                                <video class="video-ig">
                                    <source src="./img/example.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>----->
        <?php
  $sql = "SELECT * FROM banner where type='2' ORDER BY orderindex ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo'                        <div class="slide" data-caption="ดื่มได้ทุกที่ ทุกเวลา ดื่มได้ดื่มดี ดื่มทุกที่">
                            <div class="slide-inner">
                                <img src="./items/uploads/banner/'.$row['banner'].'" alt=""/>
                            </div>
                        </div>';
	  }
} else {
  echo "0 ค้นหา";
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
                           
   <?php
  $sql = "SELECT * FROM news ORDER BY id DESC limit 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 echo' <div class="swiper-slide"> <article class="card -blog">
                                    <a href="content.php?id='.$row["id"].'" class="d-flex flex-column  h-100">
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
<?php include("template/footer.php");?>
<?php $conn->close();?>