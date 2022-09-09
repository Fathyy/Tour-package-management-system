<?php
session_start();
include 'header.php';
 if (isset($_SESSION['login']))
 {?>
 <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <ul>
                <li><a href="index.html" class="font-5"><i class="fa-light fa-house"></i></a></li>
                <li><a href="profile.php" class="font-5">My Profile</a></li>
                <li><a href="change-password.php" class="font-5">Change Password</a></li>
                <li><a href="tour-history.php" class="font-5">My tour history</a></li>
                <li><a href="issuetickets.php" class="font-5">Ticket Issues</a></li>
            </ul>

        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <ul>
                <li>Welcome :</li>
                <li><?php echo htmlentities($_SESSION['login'], ENT_QUOTES);?></li>
                <li><a href="logout.php">/ logout</a></li>
            </ul>
            
        </div>
    </div>
 </div>
 
   
<?php } else {?>
  <section style="background-color:aqua;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <ul class="d-flex flex-row" style="list-style-type:none;">
                <li style="list-style-type:none;"><a href="index.html"><i class="fa-regular fa-house"></i></a></li>
                    <li><a href="admin/index.php" class="link-remove font-6">Admin Login</a></li>
                </ul>

            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="d-flex flex-row" style="list-style-type:none;">
                <li class="pe-3 font-6">Toll Number : 123-4568790</li>
                <li class="pe-3"><a href="#" data-toggle="modal" data-target="#myModal" class="link-remove font-6">Sign Up</a></li>
                <li class="pe-3"><a href="#" data-toggle="modal" data-target="#myModal4" class="link-remove font-6">Log In</a></li>
            </ul>
            </div>
        </div>

    </div>
    </section>
    
<?php } ?>
<section style='background-color: burlywood;'>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <a href="index.php" class="link-remove headings font-6">Tourism Management System</a>
         </div>

         <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="d-flex flex-row" style="list-style-type:none;">
                <li class="pe-3"><i class="fa-regular fa-lock"></i></li>
                <li class="pe-3 font-6">Safe and Secure</li>
            </ul>
         </div>
    </div>
</div>
</section>

<section style="background-color: darkslategray;">
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
            <?php require 'includes/footer.php'; ?>