<?php
session_start();
include 'includes/config.php';
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
}
else {?>
<style>
    <?php include 'css/style.css';?>
</style>

<div class="containers">
    <!-- the sidebar and top section are enclosed in divs to become children of containers grid -->
<div class="sidebar-container">
<?php include 'includes/sidebar-menu.php';?>
</div>

<div class="top-container">
<?php include 'includes/top-section.php';?>
</div> 
<!-- the grids section begins here -->
<div class="container grids-section">
    <div class="row">

    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
        <div class="col-sm-12 col-md-3">
            <div class="icon-user">
                <div class="icon">
                <i class="fa-solid fa-user"></i>
                </div>
                <!-- The user class below fetches the number of users from the database and shows it below the user text -->
                <div class="user">
                    <h3>User</h3>
                    <?php $sql ="SELECT id FROM tblusers";
                    $query=$dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=$query->rowCount(); 
                    ?>

                    <h4><?php echo htmlentities($cnt);?></h4>

                </div>
            </div>
        </div>
        <!-- users grid ends here  -->

        <div class="col-sm-12 col-md-3">
            <div class="icon-bookings">
                <div class="icon">
                <i class="fa-solid fa-list"></i>
             </div>

             <div class="bookings">
                <h3>Bookings</h3>
                <?php $sql1="SELECT BookingId FROM tblbooking";
                $query1=$dbh->prepare($sql1);
                $query1->execute();
                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                $cnt1=$query1->rowCount();

                ?>
                <h4><?php echo htmlentities($cnt1);?></h4>
             </div>
            </div>

        </div>
        <!-- Bookings grid ends here  -->


        <div class="col-sm-12 col-md-3">
            <div class="icon-enquiries">
                <div class="icon">
                <i class="fa-solid fa-folder-open"></i>
             </div>

             <div class="enquiries">
                <h3>Enquiries</h3>
                <?php $sql2="SELECT id FROM tblenquiry";
                $query2=$dbh->prepare($sql2);
                $query2->execute();
                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                $cnt2=$query2->rowCount();

                ?>
                <h4><?php echo htmlentities($cnt2);?></h4>
             </div>
            </div>

        </div>
        <!-- Enquiries grid ends here -->


        <div class="col-sm-12 col-md-3">
            <div class="icon-packages">
                <div class="icon">
                <i class="fa-solid fa-briefcase"></i>
             </div>

             <div class="packages">
                <h3>Packages</h3>
                <?php $sql3="SELECT PackageId FROM tourpackages";
                $query3=$dbh->prepare($sql3);
                $query3->execute();
                $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                $cnt3=$query3->rowCount();

                ?>
                <h4><?php echo htmlentities($cnt3);?></h4>
             </div>
            </div>

        </div>
        <!-- Total Packages grid ends here -->


        <div class="col-sm-12 col-md-3">
            <div class="icon-issues">
                <div class="icon">
                <i class="fa-solid fa-folder-open"></i>
             </div>

             <div class="issues-raised">
                <h3>Issues Raised</h3>
                <?php $sql4="SELECT id FROM tblissues";
                $query4=$dbh->prepare($sql4);
                $query4->execute();
                $results4=$query4->fetchAll(PDO::FETCH_OBJ);
                $cnt4=$query4->rowCount();

                ?>
                <h4><?php echo htmlentities($cnt4);?></h4>
             </div>
            </div>

        </div>
        <!-- Issues raised grid ends here -->



    
       
    </div>
</div>
<!-- the grids section ends here -->


<div class="footer-container">
<?php include 'includes/bottom-section.php';?>
</div>

</div>   
<?php }?>
