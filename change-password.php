<?php
session_start();
require 'includes/config.php';

    if (isset($_POST['submit5'])) {
        $password=md5($_POST['Cpassword']);
        $newpassword=md5($_POST['newpassword']);
        $email=$_SESSION['login'];
        $sql="SELECT Password, EmailId FROM tblusers WHERE 
        EmailId=:email and Password=:password";
        $query=$dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            $con='UPDATE tblusers SET password=:newpassword WHERE
            EmailId=:email';
            $chngpwd2=$dbh->prepare($con);
            $chngpwd2->bindParam(':email', $email, PDO::PARAM_STR);
            $chngpwd2->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd2->execute();
            $results=$chngpwd2->fetchAll(PDO::FETCH_OBJ);
            if ($chngpwd2->rowCount() >0) {
              echo "your password was changed";
            }
            
        }
        else {
            echo "your current password is wrong";
        }
    
}?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <title>Tourism Management System</title>
    <script src="https://kit.fontawesome.com/ed20622ed8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>
  <body>

<style>
  <?php include 'css/style.css';?>
		</style>

<div class="container">
    <div class="row">
        <div class="change-passoword">
        <form method="post">
          <div class="mb-3 col-md-2">
            <label for="Cpassword" class="form-label">Current Password</label>
            <input type="password" class="form-control" name="Cpassword">
            </div>

          <div class="mb-3 col-md-2">
            <label for="Npassword" class="form-label"> New Password</label>
            <input type="password" class="form-control" name="newpassword" id="Npassword" >
          </div>

           <div class="col-sm-8">
          <button type="submit" class="btn btn-primary" name="submit5">Change Password</button>
          </div>

        </form>
        </div>
    </div>
</div>


<script src="js/wow.min.js"></script>
<script> new WOW().init(); </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>