<?php
session_status();
require 'includes/config.php';
if (isset($_POST['submit2'])) 
{
    $pid=intval($_GET['pkgid']);
    $useremail=(isset($_SESSION['login']));
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $comment=$_POST['comment'];
    $status=0;
    $sql='INSERT INTO tblbooking(PackageId, UserEmail, FromDate, ToDate, Comment, status)
    VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)';
    $query=$dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
    $query->bindParam(':comment', $comment, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId=$dbh->lastInsertId();
    if ($lastInsertId)
     {
        $msg="Booked successfully";
    }
    else{
        $error="something went wrong! Please try again";
    }

} ?>

<style>
<?php include 'css/style.css';?>
</style>

<?php include 'includes/top_section.php';?>
<div class="container">
    <!-- error handling code -->
    <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
       else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error handling code -->
    <?php
    $pid=intval($_GET['pkgid']);
    $sql='SELECT *from tbltourpackages WHERE PackageId=:pid';
    $query=$dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) 
        {?>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images\<?php echo htmlentities($result->PackageImage);?>" class="package-details-image" alt="no image">
                    </div>
                    <div class="col-md-8">
                        <h2><?php echo htmlentities($result->PackageName);?></h2>
                        <p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p>
                        <p><b>Package Type :</b><?php echo htmlentities($result->PackageType);?></p>
                        <p><b>Package Location :</b><?php echo htmlentities($result->PackageLocation);?></p>
                        <p><b>Features :</b><?php echo htmlentities($result->PackageFetures);?></p>

                        <div class="ban-bottom">
                            <div class="bnr-right">
                                <label class="inputLabel">From</label>
				                <input type="date" placeholder="dd-mm-yyyy"  name="fromdate" required="">
                            </div>
                            <div class="bnr-right">
                                <label class="inputLabel">To</label>
				                <input type="date" placeholder="dd-mm-yyyy"  name="todate" required="">

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="grand">
                            <p>Grand Total</p>
                            <h3>USD. 800</h3>
                        </div>
                    </div>

                    <h3>Package Details</h3>
                    <p><?php echo htmlentities($result->PackageDetails);?></p>
                </div>


                <div class="top-section">
                    <h2>Travels</h2>
                    <div class="top-section-2 wow animate__animated animate__fadeInUp" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
                        <ul style="list-style-type:none;" >
                            <li class="spe">
                                <label>Comment</label>
                                <input type="text" name="comment" required="">
                            </li>
                            <?php 
                            if (isset($_SESSION['login']) ) {?>
                                <li align="center">
                                    <button type="submit" name="submit2" class="view">Book</button>
                                </li>
                            <?php } else {?>
                                <li class="sigi" align="center">
                                    <a href="#" data-toggle="modal" data-target="#myModal" class="view">Book</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </form>
        
    <?php } } ?>
    
</div>

<?php require 'includes/bottom_section.php'; ?>
