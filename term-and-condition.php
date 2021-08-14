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
                            <a href="index.html">
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
                                <a href="https://lin.ee/lCoY7FM" target="_blank" class="social-item">
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
                            <a class="nav-link" href="about.html">
                                <img src="./img/menu-icon-iam.svg" alt="" class="icon">
                             I am fusion
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./products.html">
                                <img src="./img/menu-icon-drink.svg" alt="" class="icon">
                                Fusion Drink
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="find.html">
                                <img src="./img/menu-icon-find.svg" alt="" class="icon">
                            Find Fusion
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="trend.html">
                                <img src="./img/menu-icon-trend.svg" alt="" class="icon">
                                FUSION TREND
                            </a>
                            
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a class="nav-link" href="news.html">
                                <img src="./img/menu-icon-news.svg" alt="" class="icon">
                                FUSION NEWS
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="video.html" class="menu-item">VIDEO</a>
                                </li>
                                <li class="nav-item">
                                    <a href="news.html" class="menu-item">NEWS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="activity.html" class="menu-item">ACTIVITY</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  nav-item-has-children">
                            <a class="nav-link" href="contact.html">
                                <img src="./img/menu-icon-contact.svg" alt="" class="icon">
                                CONTACT FUSION
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="contact.html" class="menu-item">CONTACT FORM</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faqs.html" class="menu-item">FAQS</a>
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
        <a class="navbar-brand" href="index.html">
        <img src="./img/logo.svg" alt="Hotta Fusion Logo" width="100px"/>
        </a>
        <div class="site-toggle">
            <b></b>
        </div>
        <div id="site-nav-m" class="site-nav-m _mobile">
            <ul class="navbar-nav menu">
                <li class="nav-item ">
                    <a class="nav-link" href="about.html">
                        <img src="./img/menu-icon-iam.svg" alt="" class="icon">
                        I am Fusion
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="products.html">
                        <img src="./img/menu-icon-drink.svg" alt="" class="icon">
                        Fusion Drink 
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="find.html">
                        <img src="./img/menu-icon-find.svg" alt="" class="icon">
                        Find Fusion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trend.html">
                        <img src="./img/menu-icon-trend.svg" alt="" class="icon">
                        Fusion Trend
                    </a>
                    
                </li>
                <li class="nav-item nav-item-has-children">
                    <a class="nav-link" href="news.html">
                        <img src="./img/menu-icon-news.svg" alt="" class="icon">
                        Fusion News
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="video.html" class="menu-item">VIDEO</a>
                        </li>
                        <li class="nav-item">
                            <a href="news.html" class="menu-item">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a href="activity.html" class="menu-item">ACTIVITY</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                    <a class="nav-link" href="contact.html">
                        <img src="./img/menu-icon-contact.svg" alt="" class="icon">
                        Contact fusion
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="contact.html" class="menu-item">CONTACT FORM</a>
                        </li>
                        <li class="nav-item">
                            <a href="faqs.html" class="menu-item">FAQS</a>
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
                    <a href="https://lin.ee/lCoY7FM" target="_blank" class="social-item">
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
    <main>
        <section class="privacy-policy">
            <div class="container py-5">
                <h1 class="text-center text-primary-2">
                    Term & Conditions
                </h1>
                <p>
                    บริษัท นิวคอนเซพท์ โปรดัคท์ จำกัด ขอขอบคุณที่เข้ามาเยี่ยมชมเว็บไซต์ของเรา 
                    เราเคารพสิทธิความเป็นส่วนตัวของท่านที่เข้าเยี่ยมชมเว็บไซต์นี้ ดังนั้น เราจึงขอชี้แจ้งให้ท่านทราบเกี่ยวกับการใช้ข้อมูลส่วนบุคคล เราขอแนะนำให้ท่านอ่านนโยบายคุ้มครองข้อมูลส่วนบุคคลฉบับนี้ เพื่อจะได้เรียนรู้และเข้าใจหลักปฏิบัติที่เรายึดถือในการใช้ข้อมูลส่วนตัวของท่าน
                </p>
                <p>
                    เราตระหนักถึงความรับผิดชอบในการเก็บรักษาข้อมูลส่วนตัวของท่าน ซึ่งเป็นข้อมูลที่ท่านได้ให้ไว้กับเราโดยสมัครใจ และข้อมูลทั้งหมดที่ท่านให้มาจะถูกจัดเก็บ ใช้ และเปิดเผยภายใต้เงื่อนไขของนโยบายความเป็นส่วนตัวนี้ ถ้าท่านไม่ต้องการให้เราจัดเก็บ ใช้ และเปิดเผยข้อมูลตามที่ระบุไว้นี้ กรุณางดการเข้าใช้งานเว็บไซต์ของเรา และขอให้ท่านระงับการให้ข้อมูลของท่านแก่เรา
                </p>
                <p>
                    เราขอสงวนสิทธิ์ในการเปลี่ยนแปลง หรือแก้ไขข้อความในนโยบายความเป็นส่วนตัวฉบับนี้ได้โดยมิต้องแจ้งให้ทราบล่วงหน้า เราขอแนะนำให้ท่านอ่านประกาศนโยบายความเป็นส่วนตัวอยู่เสมอเพื่อท่านจะได้มั่นใจว่าท่านรับทราบข้อเปลี่ยนแปลงหรือแก้ไข และการรับทราบการนำข้อมูลส่วนตัวของท่านไปใช้งาน
                </p>
                <p>บริษัท นิวคอนเซพท์ โปรดัคท์ จำกัด เก็บรวบรวมข้อมูลอย่างไร
                    เราจะรวบรวมและเก็บข้อมูลเมื่อท่านได้เข้ามาใช้เว็บไซต์ หรือให้รายละเอียดแก่เราตามช่องทางต่างๆ ดังนี้
                </p>
                <ul>
                    <li>
                        <p>
                        การติดต่อผ่านช่องทางออฟไลน์
                        </p>
                    </li>
                    <li>
                        <p>
                        การติดต่อผ่านช่องทางออนไลน์ และสื่ออิเล็กทรอนิกส์ ได้แก่ เว็บไซต์ของบริษัทฯ ทั้งหมด, แอพพลิเคชั่นทางโทรศัพท์มือถือ, ระบบการส่งข้อความทางโทรศัพท์มือถือ และ/หรือสื่อออนไลน์ของบริษัทฯ
                        </p>
                    </li>
                </ul>
                <p>
                    ทำไม บริษัท นิวคอนเซพท์ โปรดัคท์ จำกัด ต้องเก็บรวบรวมข้อมูลส่วนบุคคลของท่านและนำไปใช้อย่างไร 
                </p>
                <ul>
                    <li>
                        <p>
                            เพื่อตอบข้อซักถามหรือรับฟังข้อคิดเห็นเกี่ยวกับผลิตภัณฑ์และบริการ
                        </p>
                    </li>
                    <li>
                        <p>
                        เพื่อให้บริการข้อมูลข่าวสารด้านผลิตภัณฑ์ ด้านสุขภาพ และด้านบริการ
                        </p>
                    </li>
                    <li>
                        <p>
                        เพื่อให้ท่านได้รับข้อมูลผลิตภัณฑ์และบริการที่ตรงตามความประสงค์ของท่าน
                        </p>
                    </li>
                    <li>
                        <p>
                        เพื่อติดต่อท่านเกี่ยวกับกิจกรรมทางการตลาด โปรโมชั่น ส่วนลด กิจกรรมงานประชาสัมพันธ์ ข้อเสนอพิเศษ และผลิตภัณฑ์หรือบริการใหม่
                        </p>
                    </li>
                    <li>
                        <p>
                        เพื่อติดต่อท่านเกี่ยวกับกิจกรรมทางการตลาด โปรโมชั่น ส่วนลด กิจกรรมงานประชาสัมพันธ์ ข้อเสนอพิเศษ และผลิตภัณฑ์หรือบริการใหม่
                        </p>
                    </li>
                    <li>
                        <p>
                        เพื่อสร้างสรรค์ผลิตภัณฑ์หรือบริการที่จะตอบสนองความต้องการของท่านได้
                        </p>
                    </li>
                    <li>
                        <p>
                        เพื่อวิเคราะห์และพัฒนาการใช้งานเว็บไซต์ 
                        </p>
                    </li>
                </ul>
                <p>
                    หรือถ้าท่านไม่ต้องการให้เราใช้ข้อมูลในการติดต่อกับท่าน โปรดติดต่อเราที่ 
                </p>
                <p>
                    หมายเลขโทรศัพท์ : <span class="text-success">0-2731-1029</span> (จันทร์-ศุกร์ : 8.30-17.30 น.) <br/>
                    หมายเลขโทรสาร : <span class="text-success">0-2378-1295</span><br/>
                    เว็บไซต์ : <a class="text-success" target="_blank" href="https://www.ncp.co.th">www.ncp.co.th</a><br/>
                    อีเมล : <a class="text-success" href="mailto:contact@ncp.co.th">contact@ncp.co.th</a><br/>
                    ที่อยู่ : 156 ซอยลาดพร้าว 107 ถนนลาดพร้าว แขวงคลองจั่น เขตบางกะปิ กรุงเทพฯ 10330
                </p>
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