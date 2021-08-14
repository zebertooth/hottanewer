

<!-- Including Header PHP -->
<?php include "header.php"; ?>
<?php
require_once ('connections/mall.php');
require_once ("class/SplitPage.php");
require_once ("class/SQLManager.php");
?>
        <section class="fusion-blog py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <img src="img/fusion-trend-logo.svg" alt="" class="mw-100" />
                        <h3 class="text-grey line-height-30 mt-4 text-center">
                            ฟิวชั่นยังไง ให้ได้มากกว่าที่คิด
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="swiper-container swiper-trend-blog">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="content.php" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                               <!-- <source srcset="./img/blog1.webp" type="image/webp">-->
                                                <img src="../upload/news/thumbs/<?php echo $thumb; ?>" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between"> 
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item">TREND</span>
                                                </div>
                                                <h3 class="topic">
                                                <?php echo $row->title; ?>
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
                        <a href="#" class="btn btn-outline-primary">
                            ดูทั้งหมด <i class="bi bi-chevron-right ml-2 _mobile"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>



<?php include "footer.php"; ?>