<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Contact Us</title>
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
  <section id="ext_menu-3" data-rv-view="18">
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
              <a href="index.php" class="navbar-logo"><img src="images/<?php echo $row['logo']; ?>" alt="Mobirise"></a>
              <a class="navbar-caption" href="index.php">Divine Grace School Portal</a>
            </div>
          </div>
          <div class="mbr-table-cell">
            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              <div class="hamburger-icon"></div>
            </button>
            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
              <li class="nav-item"><a class="nav-link link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link link" href="about.php">About</a></li>
              <li class="nav-item dropdown"><a class="nav-link link" style="color:orange;" href="contact_us.php">Contact</a></li>
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

  <section class="engine"><a href="https://mobirise.co/m">bootstrap table</a></section><section class="mbr-section mbr-section-nopadding mbr-after-navbar" id="map1-9" data-rv-view="44">
    <iframe style="margin:-20px 0px -20px 0px;" width="100%" height="700" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d123472.1457698874!2d120.99119048000654!3d14.740580365772846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3397b06b85e64e2f%3A0x7741f2488d14a02d!2sdivine+grace+school!3m2!1d14.740590899999999!2d121.06123099999999!5e0!3m2!1sen!2sph!4v1509592787177" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>

  <section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-7" data-rv-view="33" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

    <div class="container">
      <div class="row">
        <div class="mbr-footer-content col-xs-12 col-md-3">
          <div><img src="assets/images/logo-128x128.png"></div>
        </div>
        <div class="mbr-footer-content col-xs-12 col-md-3">
          <?php
          $q = mysqli_query($con, "SELECT * FROM contactus limit 1");
          $row = mysqli_fetch_array($q);
          ?>
          <p><strong>Address</strong><br>
            <?php echo $row['address']; ?></p>
          </div>
          <div class="mbr-footer-content col-xs-12 col-md-3">
            <p><strong>Contacts</strong><br>
              Email: <?php echo $row['email']; ?><br>
              Telephone: <?php echo $row['telephone']; ?><br>
              Phone: <?php echo $row['phone']; ?> </p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
              <p><strong>Links</strong><br>
                <?php
                $q = mysqli_query($con, "SELECT * FROM links order by id desc");
                while($row = mysqli_fetch_array($q)){
                  ?>
                  <a class="text-primary" target="_blank" href="<?php echo $row['link']; ?>"><?php echo $row['link']; ?></a>
                  <?php } ?>
                </div>

              </div>
            </div>
          </section>

          <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-a" data-rv-view="14" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
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