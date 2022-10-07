<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else {
  if (isset($_POST['submit'])) {
    $pname=$_POST['packagename'];
    $ptype=$_POST['packagetype'];
    $plocation=$_POST['packagelocation'];
    $pprice=$_POST['packageprice'];
    $pfeatures=$_POST['packagefeatures'];
    $pdetails=$_POST['packagedetails'];
    $pimage=$_FILES['packageimage']["name"];
    move_uploaded_file($_FILES["packageimage"]["tmp_name"], "packageimages/".$_FILES["packageimage"]["name"]);
    $sql="INSERT INTO tbltourpackages(PackageName,PackageType,PackageLocation,
    PackagePrice, Packagefetures,PackageDetails,PackageImage) VALUES
    (:pname,:ptype,:plocation,:pprice,:pfeatures,pdetails,pimage)";
    $query=$dbh->prepare($sql);
    $query->bindParam(":pname", $pname, PDO::PARAM_STR);
    $query->bindParam(":ptype", $ptype, PDO::PARAM_STR);
    $query->bindParam(":plocation", $plocation, PDO::PARAM_STR);
    $query->bindParam(":pprice", $pprice, PDO::PARAM_STR);
    $query->bindParam(":pfeatures", $pfeatures, PDO::PARAM_STR);
    $query->bindParam(":pdetails", $pdetails, PDO::PARAM_STR);
    $query->bindParam(":pimage", $pimage, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId=$dbh->lastInsertId();
    if ($lastInsertId) {
      $msg="Package created successfully";
    }
    else {
      $error="Something went wrong try again";
    }
 } ?>

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

     <div class="grids-section">
      <h2>Create Package</h2>
      <!-- error handling code -->
      <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error handling code -->
        <div class="tab-content">
          <div class="tab-pane active" id="horizontal-form">
            <form name="package" class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
              <div class="col-sm-8">
                <input type="text" name="packagename" class="form-control" id="" placeholder="Create Package" required>
              </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
              <div class="col-sm-8">
                <input type="text" name="packagetype" id="packagetype" class="form-control" id="" placeholder=" Package Type eg- Family Package / Couple Package" required>
              </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
              <div class="col-sm-8">
                <input type="text" name="packagelocation" class="form-control" id="packagelocation" placeholder=" Package Location" required>
              </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package price</label>
              <div class="col-sm-8">
                <input type="text" name="packageprice" class="form-control" id="packageprice" placeholder=" Package Price" required>
              </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
              <div class="col-sm-8">
                <input type="text" name="packagefeatures" class="form-control" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" required>
              </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
              <div class="col-sm-8">
                <textarea name="packagedetails" id="packagedetails" class="form-control" id="" cols="50" rows="5" placeholder="Package Details" required></textarea>
              </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package image</label>
              <div class="col-sm-8">
                <input type="file" name="packageimage" class="form-control" id="packageimage" required>
              </div>
              </div>

              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <button type="submit" name="submit">Create</button>
                  <button type="reset">Reset</button>
                </div>

              </div>

            </form>

          </div>
        </div>
      
     </div>
     <div class="footer-container">
        <?php include 'includes/bottom-section.php';?>
        </div>
      </div>
<?php }?>
























