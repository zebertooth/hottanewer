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
        <section class="page-banner -trend">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 page-title pt-lg-5 pt-0">
                        <div class="banner-brand d-flex align-items-center align-items-lg-end justify-content-center justify-content-lg-start flex-lg-row flex-column">
                            <img src="./img/fusion-logo.svg" alt="" />
                            <h2 class="mb-0 text-white line-height-30 mt-3">TREND</h2>
                        </div>
                        <h3 class="mb-0 text-white font-weight-300 text-center text-lg-left ">
                            ฟิวชั่นเทรนด์ 
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
                            <a href="https://www.youtube.com/channel/UCCvoNxlK0a_jLNcWw4uVyHA" target="_blank" class="social-item">
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
        <!-- Blog Hero -->
          <section class="py-5 px-2 bg-grey">
            <div class="container-lg">
                <div class="row">
                    <div class="col">
                        <div class="swiper-container swiper-blog-hero">
                            <div class="swiper-wrapper">
  <?php
  $sql = "SELECT * FROM news ORDER BY id DESC limit 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 echo'             <div class="swiper-slide bg-grey">
                                    <article class="card -hero">
                                        <a href="content.php?id='.$row["id"].'" class="d-flex flex-column">
                                            <div class="pic">
                                                 <img src="./items/uploads/news/'.$row["thumb"].'" alt="" />
                                            </div>
                                            <div class="blog-content">
                                                <h3 class="topic">
                                                    '.$row["title"].'
                                                </h3>
                                                <p class="sub-topic">
                                                    '.$row["description"].'
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
            <div class="row mb-5">
                <div class="col">
                    <div class="category-filter">
                        <label for="" class="filter-label">
                            หมวดหมู่ :
                        </label>
                        <div class="dropdown filter-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                NEWS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">VIDEO</a>
                              <a class="dropdown-item" href="#">ACTIVITY</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="container-lg">

                <div class="grid -d3">
<?php
 $perpage = 6;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;
 
 $sql = "select * from news limit {$start} , {$perpage} ";
 $query = mysqli_query($conn, $sql);
while ($result = mysqli_fetch_assoc($query)) { ?>
                    <article class="card -blog">
                        <a href="content.php?id=<?php echo $result['id']; ?>" class="d-flex flex-column  h-100">
                            <div class="pic">
                                <picture>
                                 <!---<source srcset="./img/blog1.webp" type="image/webp">-->
                                    <img src="./items/uploads/news/<?php echo $result['thumb']; ?>" alt="" />
                                </picture>
                            </div>
                            <div class="d-flex flex-fill flex-column justify-content-between"> 
                                <div class="blog-content">
                                    <div class="category">
                                        <span class="category-item">TREND</span>
                                    </div>
                                    <h3 class="topic">
                                     <?php echo $result['title']; ?>
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
 <?php } ?>

                </div>
 <?php
 $sql2 = "select * from news ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
                <ul class="pagination">
                    <li class="prev -disabled">
                        <a class="page-link" href="news.php?page=1">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
  <li class="page-item"><a href="news.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>

                    <li class="next">
                        <a class="page-link" href="news.php?page=<?php echo $total_page;?>">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </main>
    <!-- End:: Content -->
<?php include("template/footer.php");?>