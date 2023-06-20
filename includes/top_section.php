<?php
session_start();
require __DIR__ . '/header.php';
 if (isset($_SESSION['login']))
 {?>

<style>
    <?php require __DIR__. '/css/style.css';?>
</style>

 <div class="container">
    <div class="row two-sections">
        <div class="col-sm-12 col-md-6 col-lg-6 login-nav-left">
            <ul class="d-flex flex-row" style="list-style-type:none;">
                <li><a href="index.html"><i class="fa-light fa-house"></i></a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="change-password.php">Change Password</a></li>
                <li><a href="tour-history.php">My tour history</a></li>
                <li><a href="tickets-issue.php">Ticket Issues</a></li>
            </ul>

        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 login-nav-right">
            <ul class="d-flex flex-row ms-5" style="list-style-type:none;">
                <li>Welcome :</li>
                <li><?php echo htmlentities($_SESSION['login'], ENT_QUOTES);?></li>
                <li><a href="logout.php">/ logout</a></li>
            </ul>
            
        </div>
    </div>
 </div>
 
   <!-- if someone is not logged in -->
<?php } else {?>
  <section class="admin-toll">
    <div class="container">
        <div class="row admin_toll_row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <ul class="list-items">
                  <li><i class="fa-regular fa-house"></i></li>
                  <li><a href="admin/index.php" class="link-remove font-6 admin-link">Admin Login</a></li>
                </ul>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
              <ul class="list-items">
                  <?php
                  require "signUp.php";
                  require "logIn.php";
                  ?> 
              </ul>
            </div>
        </div>

    </div>
    </section>
    
<?php } ?>
<!-- <section class="title">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="index.php" class="link-remove headings font-6 heading">Tourism Management System</a>
         </div>
    </div>
</div>
</section> -->

<section class="navbar-styling">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item pe-3">
            <a class="nav-link active font-6" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link font-6" href="page.php?type=aboutus">About</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link font-6" href="package-list.php">Tour Packages</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link font-6" href="page.php?type=privacy">Privacy Policy</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link font-6" href="page.php?type=terms">Terms of use</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link font-6" href="page.php?type=contact">Contact Us</a>
          </li>

          <?php if(isset($_SESSION['login'])){ ?>
              <li>Need Help <a href="#" data-bs-toggle="modal" data-bs-target="#myModal3"></a></li>
              <?php } else{ ?>
                  <li class="nav-item pe-3 mt-2"><a href="enquiry.php" class="link-remove enquiry-link font-6">Enquiry</a></li>
                  <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
            </section>
            <?php require __DIR__ . '/footer.php'; ?>
            