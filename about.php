<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>About Us</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
  <section id="ext_menu-0" data-rv-view="0">
    <nav style="background-color:#00a65a;" class="navbar navbar-dropdown navbar-fixed-top">
      <div class="container">
        <div class="mbr-table">
          <div class="mbr-table-cell">
            <div class="navbar-brand">
              <?php
              include "conn.php";
              $q = mysqli_query($con, "SELECT * FROM logotbl limit 1");
              $row = mysqli_fetch_array($q);
              ?>
              <a href="https://mobirise.com" class="navbar-logo"><img src="images/<?php echo $row['logo']; ?>" alt="Mobirise"></a>
              <a class="navbar-caption" href="index.php" style="color:#fff;"> Divine Grace School Portal</a>
            </div>
          </div>
          <div class="mbr-table-cell">
            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              <div class="hamburger-icon"></div>
            </button>
            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
              <li class="nav-item"><a class="nav-link link" style="color:#fff;" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link link" style="color:orange;" href="about.php">About</a></li>
              <li class="nav-item"><a class="nav-link link" style="color:#fff;" href="contact_us.php">Contact</a></li>
              <li class="nav-item"><a class="nav-link link" style="color:#fff;" data-toggle="modal" data-target="#loginmodal" href="#">Login</a></li>
            </ul>
            <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              <div class="close-icon"></div>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </section>

  <section class="engine"><a href="https://mobirise.co">Mobirise</a></section><section class="mbr-section mbr-after-navbar" id="testimonials2-1" data-rv-view="2" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 80px;">

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-xs-center">
            <h3 class="mbr-section-title display-2">About Us</h3>

          </div>
        </div>
      </div>
    </div>


    <div class="mbr-section mbr-section-nopadding">
      <div class="container">
        <div class="row">

          <div class="col-xs-12">

            <div class="mbr-testimonial card">
              <div class="card-block">
                <?php
                $q = mysqli_query($con, "SELECT * FROM aboutus limit 1");
                $row = mysqli_fetch_array($q);
                echo $row['mission'];
                ?></div>
                <div class="mbr-author card-footer">

                  <div class="mbr-author-name">Mission</div>

                </div>
              </div><div class="mbr-testimonial card">
                <div class="card-block"><?php echo $row['vision']; ?></div>
                <div class="mbr-author card-footer">

                  <div class="mbr-author-name">Vision</div>

                </div>
              </div><div class="mbr-testimonial card">
                <div class="card-block"><?php echo $row['goal']; ?></div>
                <div class="mbr-author card-footer">
                  <div class="mbr-author-name">Goals</div>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </section>

    <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" data-rv-view="12" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
      <div class="container text-xs-center">
        <p>Copyright © 2018 Online School Portal.</p>
      </div>
    </footer>

    <?php include "loginmodal.php"; ?>

    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>


    <input name="animation" type="hidden">
  </body>
  </html>