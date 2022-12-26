<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
  }
  else {
    $pid=intval($_GET['pid']);
    if (isset($_POST['submit'])) {
      $pname=$_POST['packagename'];
      $ptype=$_POST['packagetype'];
      $plocation=$_POST['packagelocation'];
      $pprice=$_POST['packageprice'];
      $pfeatures=$_POST['packagefeatures'];
      $pdetails=$_POST['packagedetails'];
      $pimage=$_FILES['packageimage']["name"];
      $sql="UPDATE tbltourpackages SET PackageName=:pname,PackageType=:ptype,
      PackageLocation=:plocation,PackagePrice=:pprice,PackageFetures=:pfeatures,
      PackageDetails=:pdetails WHERE PackageId=:pid";
      $query=$dbh->prepare($sql);
      $query->bindParam(":pname", $pname, PDO::PARAM_STR);
      $query->bindParam(":ptype", $ptype, PDO::PARAM_STR);
      $query->bindParam(":plocation", $plocation, PDO::PARAM_STR);
      $query->bindParam(":pprice", $pname, PDO::PARAM_STR);
      $query->bindParam(":pfeatures", $pname, PDO::PARAM_STR);
      $query->bindParam(":pdetails", $pdetails, PDO::PARAM_STR);
      $query->bindParam(":pid", $pid, PDO::PARAM_STR);
      $query->exceute();
      $msg="Package updated successfully";
    }
    ?>
      <style>
  <?php include 'css/style.css';?>
		</style>

    <div class="containers">
        <div class="sidebar-container">
    <?php include('includes/sidebar-menu.php');?>	
    </div>

    <div class="top-container">
      <?php require 'includes/top-section.php';?>
      </div>

      <div class="container grids-section">
        <div class="row">
      <!-- bootstrap breadcrumb for navigating to diff pages starts here -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Update Package</li>
          </ol>
        </nav>
<!-- bootstrap breadcrumb for navigating to diff pages ends here -->

<div class="update-package">
  <h3>Update Packages</h3>
  <!-- error and success messages begin here -->
  <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error and success messages end here -->
        
        <div class="tab-content">
          <?php
          $pid=intval($_GET['pid']);
          $sql="SELECT * FROM tbltourpackages WHERE PackageId=:pid";
          $query=$dbh->prepare($sql);
          $query->bindParam(":pid", $pid, PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {?>
            <form action="" class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                <div class="col-sm-8">
                  <input type="text" name="packagename" id="packagename" placeholder="Create Package" value="<?php echo htmlentities($result->PackageName);?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
                <div class="col-sm-8">
                  <input type="text" name="packagetype" id="packagetype" placeholder="Package type" value="<?php echo htmlentities($result->PackageType);?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                <div class="col-sm-8">
                  <input type="text" name="packagelocation" id="packagelocation" placeholder="Package Location" value="<?php echo htmlentities($result->PackageLocation);?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
                <div class="col-sm-8">
                  <input type="text" name="packageprice" id="packageprice" placeholder="Package Price" value="<?php echo htmlentities($result->PackagePrice);?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
                <div class="col-sm-8">
                  <input type="text" name="packagefeatures" id="packagefeatures" placeholder="Package features" value="<?php echo htmlentities($result->PackageFetures);?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
                <div class="col-sm-8">
                  <input type="text" name="packagedetails" id="packagedetails" placeholder="Package details" value="<?php echo htmlentities($result->PackageDetails);?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                <div class="col-sm-8">
                <textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required><?php echo htmlentities($result->PackageDetails);?></textarea> 
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package image</label>
                <div class="col-sm-8">
                <img src="pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image.php?imgid=<?php echo htmlentities($result->PackageId);?>">Change Image</a>
                </div>
              </div>

              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Last Updation Date</label>
                <div class="col-sm-8">
                 <?php echo htmlentities($result->UpdationDate);?> 
                </div>
              </div>
              <?php } }?>

              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <button type="submit" name="submit">Update</button>
                </div>
              </div>

            </form> 
        </div>
</div>  
</div>
</div>

<div class="footer-container">
<?php include 'includes/bottom-section.php';?>
</div> 
 <?php }?>













