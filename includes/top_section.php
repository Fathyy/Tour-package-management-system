<?php
session_start();
include 'header.php';
 if (isset($_SESSION['login']))
 {?>
 <div class="container">
    <div class="row login-nav-main">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="d-flex flex-row login-nav-left" style="list-style-type:none;">
                <li><a href="index.html"><i class="fa-light fa-house"></i></a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="change-password.php">Change Password</a></li>
                <li><a href="tour-history.php">My tour history</a></li>
                <li><a href="tickets-issue.php">Ticket Issues</a></li>
            </ul>

        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="d-flex flex-row login-nav-right" style="list-style-type:none;">
                <li>Welcome :</li>
                <li><?php echo htmlentities($_SESSION['login'], ENT_QUOTES);?></li>
                <li><a href="logout.php">/ logout</a></li>
            </ul>
            
        </div>
    </div>
 </div>
 
   
<?php } else {?>
  <section class="admin-toll">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <ul class="d-flex flex-row" style="list-style-type:none;">
                <li style="list-style-type:none;"><a href="index.html"><i class="fa-regular fa-house"></i></a></li>
                    <li><a href="admin/index.php" class="link-remove font-6 admin-link">Admin Login</a></li>
                </ul>

            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="d-flex flex-row" style="list-style-type:none;">
                <li class="pe-3 font-6 admin-link">Toll Number : 123-4568790</li>
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
<section class="title">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="index.php" class="link-remove headings font-6 heading">Tourism Management System</a>
         </div>

         <!-- <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="d-flex flex-row" style="list-style-type:none;">
                <li class="pe-3"><i class="fa-regular fa-lock"></i></li>
                <li class="pe-3 font-6">Safe and Secure</li>
            </ul>
         </div> -->
    </div>
</div>
</section>

<section class="navbar-styling">
<div class="container">
  <div class="row">
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
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
                <div class="clearfix"></div>

      </ul>
    </div>
  </div>
</nav>
</div>
</div>
            </section>
            <?php require 'footer.php'; ?>
            