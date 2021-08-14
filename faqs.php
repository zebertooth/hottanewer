<?php
$servername = "localhost";
$username = "teedhottaaa";
$password = "sNCxKGFKEJGiLddA";
$dbname = "teedhottaaa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  $sql = "SELECT * FROM system_page where id=4";
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
        <!-- Banner -->
        <section class="page-faq pt-5">
    <?php echo $row['detail'];?>

        </section>
    </main>
    <!-- End:: Content -->
<?php include("template/footer.php");?>