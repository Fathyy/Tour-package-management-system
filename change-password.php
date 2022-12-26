<?php
require 'includes/config.php';
if (strlen($_SESSION['login']) == 0) 
{
    header('location:index.php');
}
else {
    if (isset($_POST['submit5'])) {
        $password=md5($_POST['password']);
        $newpassword=md5($_POST['newpassword']);
        $email=$_SESSION['login'];
        $sql="SELECT Password FROM tblusers WHERE 
        EmaidId=:email and Password=:password";
        $query=$dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results=query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            $con='UPDATE tblusers SET password=:newpassword WHERE
            EmailId=:email';
            $chngpwd2=$dbh->prepare($con);
            $chngpwd2->bindParam(':email', $email, PDO::PARAM_STR);
            $chngpwd2->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd2->execute();
            $msg="your password was changed";
        }
        else {
            $error="your current password is wrong";
        }
    
}
}
include ('includes/top_section.php');
?>
  <?php include 'css/style.css';?>
		</style>
<div class="container">
    <div class="row">
        <div class="change-passoword">
        <form method="post">
          <div class="mb-3 col-md-2">
            <label for="Cpassword" class="form-label">Current Password</label>
            <input type="password" class="form-control" name="password">
            </div>

          <div class="mb-3 col-md-2">
            <label for="Npassword" class="form-label"> New Password</label>
            <input type="password" class="form-control" name="newpassword" id="newpassword" >
          </div>

           <div class="col-sm-8">
          <button type="submit" class="btn btn-primary" name="submit5">submit</button>
          </div>

        </form>
        </div>
    </div>
</div>


