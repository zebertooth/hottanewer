<?php


require_once('./connections/mall.php');
require_once ("./class/SplitPage.php");
require_once("./class/SQLManager.php");

error_reporting(0);

$sql = new SQLManager();

$sql->field = "id, title, intro, thumb, pic1, pic2, pic3, pic4, pic5, detail1, detail2, detail3, detail4, detail5,
name_attach1, name_attach2, name_attach3, attach1, attach2, attach3, date_start, date_end,
date_post, view, show_web, type, subtype";

$sql->table = "news";

if (!empty($_GET["subtype"])){
  $subtype = "and subtype='" .$_GET["subtype"]."'";
}

$sql->condition = " where show_web = 1 and type = 'trend' " . $subtype . " order by id DESC limit 3" ;


$rsNews = $sql->select();

$sql->field = "id";

$rsNewsCount = $sql->countRow();

$sql->field = "id, title, intro, thumb, pic1, pic2, pic3, pic4, pic5, detail1, detail2, detail3, detail4, detail5,
name_attach1, name_attach2, name_attach3, attach1, attach2, attach3, date_start, date_end,
date_post, view, show_web, type, subtype";

$sql->condition = "where show_web = 1 and type = 'trend' " . $subtype . " order by id DESC limit 6";

$rsNews6 = $sql->select();

$sql->field = "id";

$rsNews6Count = $sql->countRow();

$count = 0;


$split = new SplitPage ();
$split->field = "id, thumb, title, view, show_web, date_post, type, subtype";
$split->table = "news";
$split->condition = "WHERE type='trend' " . $subtype . "  ORDER BY id DESC";
$rs = $split->startRow ();

?>

<!-- Header -->
<?php
include('./header.php');
?>
<!-- End of Header -->


<!-- Header -->
<?php
include('./header.php');
?>
<!-- End of Header -->



<div class="site-header-space "></div>
<!-- Start:: Content -->
<main>
    <!-- Banner -->
    <section class="page-banner -trend">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 page-title pt-5">
                    <div class="banner-brand d-flex align-items-center align-items-lg-end justify-content-center justify-content-lg-start flex-lg-row flex-column">
                        <img src="./img/fusion-logo.svg" alt="" />
                        <h2 class="mb-0 text-white line-height-30 mt-3">TREND</h2>
                    </div>
                    <h3 class="mb-0 text-white font-weight-300 text-center text-lg-left ">
                        ฟิวชั่นเทรนด์ 
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
    <!-- Blog Hero -->
    <section class="py-5 px-2 bg-grey">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <div class="swiper-container swiper-blog-hero">
                        <div class="swiper-wrapper">


                            <?php
                            if ($rsNewsCount > 0) :
                                while ($row = mysqli_fetch_object($rsNews)) :
                                    $count = $count + 1
                            ?>

                                    <div class="swiper-slide bg-grey">
                                        <article class="card -hero">
                                            <a href="content.php?" class="d-flex flex-column">
                                                <div class="pic">
                                                    <img src="./upload/news/thumbs/<?php echo $row->thumb; ?>" alt="" />
                                                </div>
                                                <div class="blog-content">
                                                    <h3 class="topic">
                                                        <?php echo $row->title; ?>
                                                    </h3>
                                                    <p class="sub-topic">
                                                        <?php echo $row->intro; ?>
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
                        <div class="swiper-pagination dark-theme"></div>
                    </div>
                    <div class="swiper-button-next  d-none d-xl-flex"></div>
                    <div class="swiper-button-prev  d-none d-xl-flex"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-3 px-2 bg-grey page-fusion-trend">
        <div class="container-lg">
        <div class="row mb-5">
                    <div class="col">
                        <div class="category-filter">
                            <label for="" class="filter-label">
                                หมวดหมู่ :
                            </label>
                            <div class="dropdown filter-dropdown">
                                <a class="dropdown-toggle" href="trend.php" role="button" id="dropdownMenuLink" name="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if(!empty($_GET["subtype"])){echo strtoupper($_GET["subtype"]);}else{echo "ทั้งหมด";}?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="trend.php" >ทั้งหมด</a>
                                  <a class="dropdown-item" href="trend.php?subtype=food" >FOOD</a>
                                  <a class="dropdown-item" href="trend.php?subtype=drink">DRINK</a>
                                  <a class="dropdown-item" href="trend.php?subtype=trend" >TREND</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            <div class="grid -d3">

            <?php
              	if ($split->numrow) :
                    while ( $row = mysqli_fetch_object ( $rs ) ) :
                ?>

                        <article class="card -blog">
                            <a href="content.php?id=<?php echo $row->id; ?>" class="d-flex flex-column  h-100">
                                <div class="pic">
                                    <picture>
                                        <source srcset="./upload/news/thumbs/<?php echo $row->thumb; ?>" type="image/webp">
                                        <img src="./upload/news/thumbs/<?php echo $row->thumb; ?>" alt="" />
                                    </picture>
                                </div>
                                <div class="d-flex flex-fill flex-column justify-content-between">
                                    <div class="blog-content">
                                        <div class="category">
                                            <span class="category-item"><?php echo $row->subtype ; ?></span>
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

                    <?php
                    endwhile;
                else :
                    ?>


                <?php endif; ?>

            </div>
            
            <?php $split->showSelectPage(); ?>

            <ul class="pagination d-none">
                <li class="prev -disabled">
                    <a class="page-link" href="#">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item dots">
                    <span class="page-link">...</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">12</a>
                </li>
                <li class="next">
                    <a class="page-link" href="#">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
</main>
<!-- End:: Content -->


<!-- Footer -->
<?php
include('./footer.php');
?>
<!-- End of Footer -->