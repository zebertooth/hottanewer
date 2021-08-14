<?php

require_once('./connections/mall.php');

require_once("./class/SQLManager.php");

error_reporting(0);

$id = $_GET['id'];

$sql = new SQLManager();

$sql->field = "id, title, intro, thumb, pic1, pic2, pic3, pic4, pic5, detail1, detail2, detail3, detail4, detail5,
name_attach1, name_attach2, name_attach3, attach1, attach2, attach3, date_start, date_end,
date_post, view, show_web, type";

$sql->table = "news";

$sql->condition = "where show_web = 1 and id = " . $id . " order by id DESC limit 1";

if ($id == "") {

    $sql->condition = "where show_web = 1 order by id DESC limit 1";
}

$rowNews = mysqli_fetch_object($sql->select());

$sql->field = "id";

$rsNewsCount = $sql->countRow();

$sql->field = "id, title, intro, thumb, pic1, pic2, pic3, pic4, pic5, detail1, detail2, detail3, detail4, detail5,
name_attach1, name_attach2, name_attach3, attach1, attach2, attach3, date_start, date_end,
date_post, view, show_web, type";

$sql->condition = "where show_web = 1 order by id DESC limit 4";

$rsNews4 = $sql->select();

$sql->field = "id";

$rsNews4Count = $sql->countRow();

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
    <!-- Blog Hero -->
    <section class="py-5 px-2">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <article class="card -hero">
                        <a href="#" class="d-flex flex-column">
                            <div class="pic">
                                <img src="./upload/news/thumbs/<?php echo $rowNews->thumb; ?>" alt="" />
                            </div>
                            <div class="blog-content">
                                <h3 class="topic text-left text-lg-center">
                                    <?php echo $rowNews->title; ?>
                                </h3>
                                <div class="blog-meta justify-content-start justify-content-lg-center">
                                    <span class="time"><?php echo $rowNews->date_post; ?></span>
                                    <div class="category">
                                        <span class="category-item"><?php echo $rowNews->type; ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <div class="entry-content">
                        <p>
                            <?php echo $rowNews->intro; ?>
                        </p>
                        <img src="./upload/news/thumbs/<?php echo $rowNews->thumb; ?>" alt="" class="w-100" />
                        <p>
                            <?php echo htmlspecialchars_decode(stripslashes($rowNews->detail1)); ?>
                        </p>
                    </div>
                    <div class="entry-footer">
                        <div class="text-center">
                            <a href="<?php if ($rowNews->type == "news") echo "news.php";
                                                                                else echo "trend.php";  ?>" class="btn btn-outline-primary">
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
        <div class="container-fluid px-30 pb-5">
            <h2 class="text-center">
                บทความอื่นๆที่แนะนำ
            </h2>
            <div class="swiper-container swiper-relate-content">
                <div class="swiper-wrapper">


                    <?php
                    if ($rsNews4Count > 0) :
                        while ($row = mysqli_fetch_object($rsNews4)) :
                            $count = $count + 1
                    ?>
                            <div class="swiper-slide">
                                <article class="card -blog">
                                    <a href="content.php?id=<?php echo $row->id; ?>" class="d-flex flex-column  h-100">
                                        <div class="pic">
                                            <picture>
                                                <source srcset="./upload/news/thumbs/<?php echo $row->thumb; ?>" type="image/webp">
                                                <img src="./img/blog1.png" alt="" />
                                            </picture>
                                        </div>
                                        <div class="d-flex flex-fill flex-column justify-content-between">
                                            <div class="blog-content">
                                                <div class="category">
                                                    <span class="category-item"><?php if ($row->type == "news") echo "News";
                                                                                else echo "Trend";  ?></span>
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



                        <?php
                        endwhile;
                    else :
                        ?>


                    <?php endif; ?>



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