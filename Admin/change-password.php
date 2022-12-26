<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
  }
  else {
    //code for changing password
    if (isset($_POST['submit'])) {
      $password=md5($_POST['password']);
      $newpassword=md5($_POST['newpassword']);
      $username=$_SESSION['login'];
      $sql='SELECT Password from admin WHERE UserName=:username and Password=:password';
      $query=$dbh->prepare($sql);
      $query->bindParam(':username', $username, PDO::PARAM_STR);
      $query->bindParam(':password', $password, PDO::PARAM_STR);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount()>0) {
        $con= "UPDATE admin set Password=:newpassword WHERE UserName=:username"; 
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
        $chngpwd1->bindParam(':newpassword', $password, PDO::PARAM_STR);
        $chngpwd1->execute();
        $msg="Your password is successfully changed";
      }
      else {
        $error="Your current password is wrong";
      }

    }
    ?>
    <!-- js code to check if the new password and the confirmed password matches -->
    <script>
      function valid{
        if (document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value) {
          alert("New password and Confirm password field do not match!");
          document.chngpwd.confirmpassword.focus();
          return false;
        }
        return true;
      }
    </script>

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
                  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
              </nav>
           <!-- bootstrap breadcrumb for navigating to diff pages starts here -->

           <!-- error and success messages begin here -->
  <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error and success messages end here -->

        <div class="changepwd-form">
        <form method="post" onSubmit="return valid();">
          <div class="mb-3 col-md-2">
            <label for="Cpassword" class="form-label">Current Password</label>
            <input type="password" class="form-control" name="password">
            </div>

          <div class="mb-3 col-md-2">
            <label for="Npassword" class="form-label"> New Password</label>
            <input type="password" class="form-control" name="newpassword" id="newpassword" >
          </div>

          <div class="mb-3 col-md-2">
            <label for="Npassword" class="form-label"> Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" >
          </div>

           <div class="col-sm-8">
          <button type="submit" class="btn btn-primary" name="submit">submit</button>
          <button type="reset" class="btn btn-primary">Reset</button>
          </div>

        </form>
        </div>
        </div>
        </div>

    </div>

    <div class="footer-container">
      <?php include 'includes/bottom-section.php';?>
      </div>
    </div>
    <?php } ?>














