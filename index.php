<?php
session_status();
require 'includes/config.php';
?>
<style>
    <?php include 'css/style.css';?>
</style>

<!-- rupes section begins here -->
<?php include ('includes/top_section.php');?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 wow animate__animated animate__fadeInDown" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
            <div class="rup-left">
                <a href="offers.html"><i class="fa-solid fa-dollar-sign"></i></a>

            </div>
            <div class="rup-right">
                <h3>UP TO USD 5O OFF</h3>
                <h4><a href="offers.html" class="link-remove">TRAVEL SMART</a></h4>
                
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 wow animate__animated animate__fadeInDown" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
            <div class="rup-left">
            <a href="offers.html"><i class="fa-solid fa-square-h"></i></a>

            </div>
            <div class="rup-right">
                <h3>UP TO 70% OFF</h3>
				<h4><a href="offers.html" class="link-remove">ON HOTELS ACROSS WORLD</a></h4>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="col-md-4 wow animate__animated animate__fadeInDown" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
            <div class="rup-left">
                <a href="offers.html" ><i class="fa-regular fa-mobile"></i></a>

            </div>
            <div class="rup-right">
                <h3>FLAT USD. 50 OFF</h3>
				<h4><a href="offers.html" class="link-remove">US APP OFFER</a></h4>

            </div>
            
        </div>
        
    </div>
</div>
<!-- rupes section ends here -->


<!-- packages section begins here -->

<div class="container">
    <div class="row">
        <h3 class="headings">Package List</h3>
        <?php
        $sql="SELECT * FROM tbltourpackages order by rand() limit 4";
        $query=$dbh->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        while ($r=$query->fetch()) {?>
        <div class="col-md-3 wow animate__animated animate__fadeInLeft" data-wow-delay=".5s">
        <img src="images\<?php echo sprintf($r['PackageImage']);?>" class='package-image' alt='no image' >
        </div>
        <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
        <h4>Package Name: <?php echo sprintf($r['PackageName']);?> </h4>
        <h6><h4>Package Type: <?php echo sprintf($r['PackageType']);?></h4></h6>
        <p><b>Package Location:</b><?php  echo sprintf($r['PackageLocation']);?></p>
        <p><b>Features</b><?php echo sprintf($r['PackageFetures']);?></p>
        </div>

        <div class="col-md-3 wow animate__animated animate__fadeInRight" data-wow-delay=".5s">
        <h5>USD <?php echo sprintf($r['PackagePrice']);?></h5>
        <a href="package-details.php?pkgid=<?php echo sprintf($r['PackageId']);?>" class="view">Details</a>
            </div>
       <?php } ?>
        
        
    </div>
</div>
<!-- packages section ends here -->

<!-- routes section begins here -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 wow animate__animated animate__fadeInLeft" data-wow-delay=".5s">
            <div class="rou-left">
                <a href="#"><i class="fa-regular fa-question"></i></a>
            </div>
            <div class="rou-right">
                <h3>80000</h3>
				<p>Enquiries</p>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 wow animate__animated animate__fadeInDown" data-wow-delay=".5s">
            <div class="rou-left">
                <a href="#"><i class="fa-solid fa-user"></i></a>
            </div>
            <div class="rou-right">
               <h3>1900</h3>
				<p>Registered users</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 wow animate__animated animate__fadeInRight" data-wow-delay=".5s">
            <div class="rou-left">
                <a href="#"><i class="fa-regular fa-ticket"></i></a>
            </div>
            <div class="rou-right">
               <h3>7,00,00,000+</h3>
				<p>Booking</p>

            </div>
        </div>
    </div>
</div>
<!-- routes section ends here -->
<?php require ('includes/bottom_section.php'); ?>

