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
                            <a class="nav-link" href="news.html">
                                <img src="./img/menu-icon-news.svg" alt="" class="icon">
                                FUSION NEWS
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="/news.php?subtype=video" class="menu-item">VIDEO</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/news.php?subtype=news" class="menu-item">NEWS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/news.php?subtype=activity" class="menu-item">ACTIVITY</a>
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
                            <a href="/news.php?subtype=video" class="menu-item">VIDEO</a>
                        </li>
                        <li class="nav-item">
                            <a href="/news.php?subtype=news" class="menu-item">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a href="/news.php?subtype=activity" class="menu-item">ACTIVITY</a>
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