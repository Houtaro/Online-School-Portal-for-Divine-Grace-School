<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.3.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Home</title>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /> 
</head>
<style type="text/css">
  h2#page-title{
    font-size: 2.4em;
    font-weight: 400;
    color: #fff;
    margin-top: 100px;
    margin-bottom:20px;
    text-align: center;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
  }
  /*BANNER*/ 
  #main { padding-left: 0px; transition: padding-left 0.8s linear 0s, padding 0.3s linear 0s; }
  #head { padding-top: 20px; width: 100%; height: auto; background: #1187b6; color: #fafafa; -webkit-font-smoothing: antialiased; background-size: 100% 100%;  overflow: hidden; } 
  #head .h-head h2 { font-size: 30px; font-weight: 200; letter-spacing: 2px; font-family: 'Quicksand', sans-serif;}
  #head .h-head h2 span { font-weight: 600; } 
  #head .h-head h3 {margin-top: 10px; font-size: 18px; font-weight: 300; letter-spacing: 2px; font-family: 'Quicksand', sans-serif; } 
</style>
<?php 
include "conn.php";
session_start();
if(!empty($_SESSION['username']))
{
  if (isset($_SESSION['username'])) 
  {
    $username = $_SESSION['username'];
  } else {
    header("Location: index.php");
  }
  $query = "SELECT * FROM usertbl WHERE username = '$username'";
  $result = mysqli_query($con, $query)or die(mysqli_error($con));
  $row = mysqli_fetch_array($result);
  $userType = $row["usertype"];
  if($userType === "admin") {
    header("LOCATION: admin_dashboard.php");
  } else if($userType === "teacher") {
    header("LOCATION: teacher_dashboard.php");
  } else if($userType === "student") {
    header("LOCATION: student_dashboard.php");
  }
}
?>
<body>
  <section id="ext_menu-3" data-rv-view="0">
    <nav style="background-color:#00a65a;" class="navbar navbar-dropdown navbar-fixed-top">
      <div class="container">
        <div class="mbr-table">
          <div class="mbr-table-cell">
            <div class="navbar-brand">
              <a href="https://mobirise.com" class="navbar-logo"><img src="assets/images/logo-128x128.png" alt="Mobirise"></a>
              <a class="navbar-caption" href="index.php">Divine Grace School Portal</a>
            </div>
          </div>
          <div class="mbr-table-cell">
            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              <div class="hamburger-icon"></div>
            </button>
            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
              <li class="nav-item"><a style="color:orange;" class="nav-link link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link link" href="about.php">About</a></li>
              <li class="nav-item dropdown"><a class="nav-link link" href="contact_us.php">Contact</a></li>
              <li class="nav-item"><a class="nav-link link" data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
            </ul>
            <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              <div class="close-icon"></div>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </section>

  <section class="engine"><a href="https://mobirise.co">Mobirise</a></section><section class="mbr-slider mbr-section mbr-section__container carousel slide mbr-section-nopadding mbr-after-navbar" data-ride="carousel" data-keyboard="false" data-wrap="true" data-pause="false" data-interval="5000" id="slider3-g" data-rv-view="29" style="background-color: rgb(255, 255, 255);">
  <main id="main">
    <div id="head">
      <div class="h-head">
        <h2 id="page-title">Welcome to Divine Grace School Online Portal</h2>
        <!-- START OF CAROUSEL REMINDER -->
        <div style="overflow:hidden; width:100%;">
          <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
              <?php
              $query = mysqli_query($con, "SELECT * from slide_tbl")or die(mysqli_error($con));
              $counter = 0;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <img src="<?php echo 'images/'.$row['image']; ?>" data-thumb="<?php echo 'images/'.$row['image']; ?>">
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- END OF CAROUSEL REMINDER -->
        </div>
      </div>
    </main>
  </div>
</section>

<?php include "loginmodal.php"; ?>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-a" data-rv-view="2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
  <div class="container text-xs-center">
    <p>Copyright © 2018 Online School Portal.</p>
  </div>
</footer>

<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/smooth-scroll.js"></script>
<script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js"></script>
<script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/mobirise-slider-video/script.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(window).load(function() {
      $('#slider').nivoSlider();
    });
  });
</script>
<input name="animation" type="hidden">
</body>
</html>