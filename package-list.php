<?php
session_status();
require 'includes/config.php';
include 'includes/top_section.php';
?>

<div class="container">
    <div class="row">
        <div class="rock-bottom">
            <h3>Package List</h3>
            <?php $sql = "SELECT * FROM tbltourpackages";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if ($query->rowCount() >0) {
                foreach ($results as $result) {?>
                    <div class="col-md-3 wow animate__animated animate__fadeInLeft" data-wow-delay=".5s">
                        <img src="Admin/images/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="no image">
                        </div>
                    <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <h4>Package Name: <?php echo htmlentities($result->PackageName);?></h4>
                        <h6>Package Type : <?php echo htmlentities($result->PackageType);?></h6>
                        <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
                        <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>

                    </div>
                    <div class="col-md-3 wow animate__animated animate__fadeInRight">
                    <h5>USD <?php echo htmlentities($result->PackagePrice);?></h5>
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>
                    </div>
                    <div class="clearfix"></div>
                
            <?php } } ?>

            
        </div>
        
    </div>
</div>
<?php require 'includes/bottom_section.php'; ?>
