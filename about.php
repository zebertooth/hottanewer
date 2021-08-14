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
    <!-- JS Vendor Inside Header (Only This Page) -->
    <script src="js/vendor/jquery.min.js"></script> 
    <script src="js/vendor/scrollMagic.min.js"></script> 
    <script src="js/vendor/debug.addIndicators.min.js"></script> 
</head>

<body>
    <!-- Start:: PreLoader -->
    <div class="preloader">
        <div id="loading-logo" class="lottie-animated img-loader"></div>
    </div>
    <!-- End:: PreLoader -->
    <!-- Start:: Navbar -->
    <header id="masthead" class="site-header">
        <div class="navbar navbar-expand-lg p-0">
            <div class="container-fluid">
                <!-- Start:: Desktop Menu -->
                <div id="site-nav-d" class="site-nav-d _desktop w-100">
                    <div class="row">
                        <div class="col-7 text-right">
                            <div class="menu-toggle"  onclick="openFullScreenNav()">
                                <b></b>
                            </div> 
                            <a href="index.php">
                                <img src="./img/logo.svg" class="navbar-brand" alt="Hotta Fusion Logo" />
                            </a>
                        </div>
                        <div class="col-5 d-flex justify-content-end align-items-center flex-wrap">
                            <div class="social mx-2">
                                <a href="https://www.facebook.com/HOTTAFusionThailand/" target="_blank" class="social-item">
                                    <img src="./img/icon-facebook-white.svg" alt="icon facebook" />
                                </a>
                                <a href="https://www.instagram.com/hottafusion/" target="_blank" class="social-item">
                                    <img src="./img/icon-instagram-white.svg" alt="icon instagram" />
                                </a>
                                <a href="https://www.youtube.com/channel/UCCvoNxlK0a_jLNcWw4uVyHA" target="_blank" class="social-item">
                                    <img src="./img/icon-youtube-white.svg" alt="icon youtube" />
                                </a>
                                <a href="https://lin.ee/nWwUafZ" target="_blank" class="social-item">
                                    <img src="./img/icon-line-white.svg" alt="icon line" />
                                </a>
                                <a href="https://twitter.com/hottafusion" target="_blank" class="social-item">
                                    <img src="./img/icon-twitter-white.svg" alt="icon twitter" />
                                </a>
                            </div>
                            <div class="hotta-dropdown dropdown mx-2">
                                <a class="btn btn-outline dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    TH
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">EN</a>
                                </div>
                            </div>
                            <div class="hotta-dropdown -shop dropdown mx-2">
                                <a class="btn btn-outline dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-cart3 mr-2"></i>
                                    ONLINE SHOP
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="https://www.liveandfit.com/th/" target="_blank">
                                        <img src="./img/liveandfit-square.png" alt="" />
                                        LIVE & FIT
                                    </a>
                                    <a class="dropdown-item" href="https://www.lazada.co.th/shop/hotta/?spm=a2o4m.pdp_revamp.seller.1.231955ed7NYv4C&itemId=1772586175&channelSource=pdp" target="_blank">
                                        <img src="./img/lazada-logo.png" alt="" />
                                        LAZADA
                                    </a>
                                    <a class="dropdown-item" href="https://shopee.co.th/liveandfit" target="_blank">
                                        <img src="./img/shopee-logo.svg" alt="" />
                                        SHOPEE
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: Desktop Menu -->
            </div>
        </div>
    </header>
    <!-- Start:: Fullscreen Nav  -->
    <div id="fullScreenNav" class="fullscreen-nav">
        <div class="side-bg" id="sideBgNav"></div>
        <a href="javascript:void(0)" class="btn-close" onclick="closeFullScreenNav()">&times;</a>
        <div class="fullscreen-nav--menu">
            <div class="text-center">
                <img src="./img/logo.svg" width="150px" alt="">
            </div>
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
            <div class="row">
                <div class="col-6">
                    <ul class="nav-menu">
                        <li class="nav-item ">
                            <a class="nav-link" href="about.php">
                                <img src="./img/menu-icon-iam.svg" alt="" class="icon">
                             I am fusion
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./products.php">
                                <img src="./img/menu-icon-drink.svg" alt="" class="icon">
                                Fusion Drink
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="find.php">
                                <img src="./img/menu-icon-find.svg" alt="" class="icon">
                            Find Fusion
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="trend.php">
                                <img src="./img/menu-icon-trend.svg" alt="" class="icon">
                                FUSION TREND
                            </a>
                            
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a class="nav-link" href="news.php">
                                <img src="./img/menu-icon-news.svg" alt="" class="icon">
                                FUSION NEWS
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="video.php" class="menu-item">VIDEO</a>
                                </li>
                                <li class="nav-item">
                                    <a href="news.php" class="menu-item">NEWS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="activity.php" class="menu-item">ACTIVITY</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  nav-item-has-children">
                            <a class="nav-link" href="contact.php">
                                <img src="./img/menu-icon-contact.svg" alt="" class="icon">
                                CONTACT FUSION
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="contact.php" class="menu-item">CONTACT FORM</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faqs.php" class="menu-item">FAQS</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: Fullscreen Nav -->
    <!-- Start:: Mobile Menu -->
    <div class="navbar-m _mobile">
        <a class="search-modal-trigger"  data-toggle="modal" data-target="#siteSearch" onclick="return false;">
            <i class="bi bi-search"></i>
        </a>
        <a class="navbar-brand" href="index.php">
        <img src="./img/logo.svg" alt="Hotta Fusion Logo" width="100px"/>
        </a>
        <div class="site-toggle">
            <b></b>
        </div>
        <div id="site-nav-m" class="site-nav-m _mobile">
            <ul class="navbar-nav menu">
                <li class="nav-item ">
                    <a class="nav-link" href="about.php">
                        <img src="./img/menu-icon-iam.svg" alt="" class="icon">
                        I am Fusion
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="products.php">
                        <img src="./img/menu-icon-drink.svg" alt="" class="icon">
                        Fusion Drink 
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="find.php">
                        <img src="./img/menu-icon-find.svg" alt="" class="icon">
                        Find Fusion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trend.php">
                        <img src="./img/menu-icon-trend.svg" alt="" class="icon">
                        Fusion Trend
                    </a>
                    
                </li>
                <li class="nav-item nav-item-has-children">
                    <a class="nav-link" href="news.php">
                        <img src="./img/menu-icon-news.svg" alt="" class="icon">
                        Fusion News
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="video.php" class="menu-item">VIDEO</a>
                        </li>
                        <li class="nav-item">
                            <a href="news.php" class="menu-item">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a href="activity.php" class="menu-item">ACTIVITY</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                    <a class="nav-link" href="contact.php">
                        <img src="./img/menu-icon-contact.svg" alt="" class="icon">
                        Contact fusion
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="contact.php" class="menu-item">CONTACT FORM</a>
                        </li>
                        <li class="nav-item">
                            <a href="faqs.php" class="menu-item">FAQS</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                    <a class="nav-link" href="#">
                        <img src="./img/menu-icon-cart.svg" alt="" class="icon">
                        Online Shop
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a  href="https://www.liveandfit.com/th/" target="_blank" class="menu-item">
                                <img src="./img/liveandfit-square.png" alt="" />
                                LIVE & FIT
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="https://www.lazada.co.th/shop/hotta/?spm=a2o4m.pdp_revamp.seller.1.231955ed7NYv4C&itemId=1772586175&channelSource=pdp" target="_blank" class="menu-item"> 
                                <img src="./img/lazada-logo.png" alt="" />
                                LAZADA
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://shopee.co.th/liveandfit" target="_blank" class="menu-item"> 
                                <img src="./img/shopee-logo.svg" alt="" />
                                SHOPEE
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="mt-5">
                <div class="language-switcher">
                    <div class="btn-group" role="group">
                    <a href="#" class="btn active">TH</a>
                    <a href="#" class="btn">EN</a>
                    </div>
                </div>
                <div class="social  mx-2">
                    <a href="https://www.facebook.com/HOTTAFusionThailand/" target="_blank" class="social-item">
                        <img src="./img/icon-facebook-white.svg" alt="icon facebook" />
                    </a>
                    <a href="https://www.instagram.com/hottafusion/" target="_blank" class="social-item">
                        <img src="./img/icon-instagram-white.svg" alt="icon facebook" />
                    </a>
                    <a href="https://www.youtube.com/channel/UCCvoNxlK0a_jLNcWw4uVyHA" target="_blank" class="social-item">
                        <img src="./img/icon-youtube-white.svg" alt="icon facebook" />
                    </a>
                    <a href="https://lin.ee/nWwUafZ" target="_blank" class="social-item">
                        <img src="./img/icon-line-white.svg" alt="icon line" />
                    </a>
                    <a href="https://twitter.com/hottafusion" target="_blank" class="social-item">
                        <img src="./img/icon-twitter-white.svg" alt="icon facebook" />
                    </a>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End:: Mobile Menu -->
    <!-- End:: Navbar -->
    <div class="site-header-space "></div>
    <!-- Start:: Content -->
    <main class="about-us">
        <section class="about-1">
            <div class="container-fluid max-1400">
                <div class="row">
                    <div class="col-12">
                        <div class="hotta-story">
                            <img src="./img/hotta-story.svg" alt="" class="w-100">
                        </div>
                    </div>
                    <div id="trigger1" class="spacer s0"></div>
                    <div class="col-12 text-center position-relative">
                        <img src="./img/NewCup 350x350px@2x.png" alt="" class="w-100 _desktop hover-cup" id="pin1">
                        <img src="./img/cup-shadow2.png" alt="" class="w-100 _mobile cup-mobile">
                    </div>
                </div>
                <div class="triangle-down"><div></div></div>
            </div>
            <div class="scrolldown-m ">
                <span>SCROLL DOWN</span>
                <i class="bi bi-chevron-down"></i>
            </div>
        </section>
        <!-- Ingredient -->
        <section class="ingredient">
            <!-- <div class="scrolldown-d _desktop">
                <span>SCROLL DOWN</span>
                <i class="bi bi-chevron-down"></i>
            </div> -->
            <img src="./img/ingredient-2x.png" class="ingredient-animate wow fadeIn _desktop"  data-wow-offset="500"  alt="">
            <div class="container-fluid">
                <!-- DESKTOP -->
                <div class="row _desktop">
                    <div class="col-4 p-5 ingredient-left">
                        <img src="./img/ginger@2x.png" alt="" >
                        <h1>
                            คัดสรร
                        </h1>
                        <h2>
                            ส่วนที่ดีที่สุดของขิง
                        </h2>
                        <h4 class="text-center">
                            ขิงจัดเป็นสมุนไพรชนิดหนึ่งที่มีประโยชน์ต่อร่างกายในหลาย ๆ ด้าน เพราะอุดมไปด้วยวิตามินและแร่ธาตุที่มีความสำคัญอย่างมากต่อร่างกายของเรา
                        </h4>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4 p-5 ingredient-right">
                        <img src="./img/green tea - lime@2x.png" alt="">
                        <h1 class="text-center">
                            ผสานอีกคุณค่าสมุนไพร
                        </h1>
                        <h2>
                            เกิดรสชาติใหม่ที่ลงตัว
                        </h2>
                        <h4 class="text-center">
                            จับคู่มะนาวเปรี้ยวสดชื่น ดื่มง่าย หรือจะจับคู่ “มัทฉะ” ชาเขียวชั้นดีที่นิยมใช้ในพิธีชงชาของชนชั้นสูงในญี่ปุ่น ที่คนทั่วโลกนิยมดื่มกัน
                        </h4>
                    </div>
                </div>
                <div class="row _mobile">
                    <div class="col-12 ingredient-top">
                        <img src="./img/ingredient@2x.png" class="wow fadeIn ingredient-animate-m"  data-wow-offset="0"  alt="">
                        <img src="./img/vitamin-m.png" alt="" class="w-100 -m" />
                    </div>
                    <div class="col-12 ingredient-down">
                        <h1 class="">
                            คัดสรรขิงที่ดีที่สุด
                        </h1>
                        <h2>
                            เลือกส่วนผสมเพื่อรสชาติที่ลงตัว
                        </h2>
                        <h4>
                            ขิงจัดเป็นสมุนไพรชนิดหนึ่งที่มีประโยชน์ต่อร่างกายในหลาย ๆ ด้าน และจับคู่มะนาวเปรี้ยวสดชื่น ดื่มง่าย หรือจะจับคู่ “มัทฉะ” ชาเขียวชั้นดีที่นิยมใช้ในพิธีชงชาของชนชั้นสูงในญี่ปุ่น 
                        </h4>
                    </div>
                </div>
            </div>
            <div class="ingredient-divider">
                <img src="./img/divider-triangle.svg" alt="" class="w-100">
            </div>
        </section>
        <!-- Vitamin -->
        <section class="vitamin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 py-5">
                        <!-- <img src="img/Comp-1_1.gif" alt="" class="w-100" /> -->
                        <div id="vitamin" class="lottie-animated lottie-vitamin"></div>
                    </div>
                    <div class="col-4 text-center position-relative _desktop">
                        <img src="./img/water@2x.png" class="spin wow fadeIn" data-wow-delay="300ms" data-wow-offset="500"  alt="">
                    </div>
                    <div class="col-12 col-lg-4 py-5 vitamin-right">
                        <h1>
                            High Gingerol
                        </h1>
                        <h2>
                            มีส่วนช่วยเสริมภูมิคุ้มให้ร่างกาย
                        </h2>
                        <h4>
                            ด้วยสารจินเจอร์รอลในขิงแก่ ที่คัดสรรเฉพาะ อายุขิง 11-12 เดือน ช่วงที่ให้สารจินเจอร์รอลสูงที่สุด
                        </h4>
                    </div>
                    <!-- <img src="./img/about-section1.svg" alt="" class="vitamin-right-bg" /> -->
                </div>
            </div>
            <div class="vitamin-divider">
                <img src="./img/vitamin-divi.svg" alt="" class="w-100">
            </div>
        </section>
        <!-- Model -->
        <section class="model">
            <div class="model-divider">
                <img src="./img/bg-footer-model.svg" alt="" class="w-100">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 model-left pl-3 pl-lg-5">
                        <h1>
                            รสชาติใหม่สุดเซอร์ไพรส์
                        </h1>
                        <h2>
                            ดื่มอร่อยได้ประโยชน์
                        </h2>
                        <h4 class="pt-3 pt-lg-0">
                            เหมาะกับผู้ที่ต้องการดูแลสุขภาพจากขิงไม่ว่าเด็กหรือผู้ใหญ่ ทุกเพศทุกวัย ที่อร่อย ดื่มง่าย ลองแล้วจะติดใจ
                        </h4>
                    </div>
                    <div class="col-12 col-lg-4 pt-5"></div>
                    <div class="col-12 col-lg-4 model-right">
                        <img src="./img/model.png" class="w-100" alt="">
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
                        <a href="privacy-policy.php" class="link">
                            Privacy Policy
                        </a>
                        <a href="term-and-condition.php" class="link">
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
            <a href="products.php" class="sticky-menu--item">
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
<script src="js/vendor/popper.min.js"></script> 
<script src="js/vendor/bootstrap.min.js"></script> 
<script src="js/vendor/lottie.min.js"></script> 
<script src="js/vendor/swiper-bundle.js"></script> 
<script src="js/vendor/wow.js"></script> 
<script src="js/vendor/magnific-popup.min.js"></script> 
<script src="js/vendor/slick.min.js"></script> 
<!-- Javascript Custom --> 
<script src="js/script-custom.js"></script> 

<script>
    window.addEventListener("load", function () {
        var docHeight = $(document).height();
        var controller = new ScrollMagic.Controller();

        $(function () { 
            var screenHeight =  $(window).height();
            var duration = docHeight - (390 + 90);
            console.log(duration);
            var scene = new ScrollMagic.Scene({
                // triggerElement: "#trigger1", 
                duration: duration,
                // offset: 00
            })
            .setPin("#pin1")
            // .addIndicators({name: "1 (duration: 300)"}) // add indicators (requi
            .addTo(controller);
            console.log(scene.offset())
        });
    });
    
</script>

</html>