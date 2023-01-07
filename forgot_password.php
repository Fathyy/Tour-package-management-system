<?php
session_start();
require 'includes/config.php';
if (strlen($_SESSION['login']) == 0) 
{
    header('location:index.php');
}
else {
    
    if (isset($_POST['submit50'])) {
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $newpassword=md5($_POST['newpassword']);
        $sql='SELECT EmailId FROM tblusers WHERE EmailId=:email
        and MobileNumber=:mobile';
        $query=$dbh->prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query -> rowCount() > 0)
        {
        $con="UPDATE tblusers set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();
        $msg="Your Password succesfully changed";
        }
        else {
        $error="Email id or Mobile no is invalid";	
        }
    }
}

?>

<?php require 'includes/top_section.php';?>

<div class="container">
    <h3></h3>
    <form action="" method="post">
    <?php if($error){?>
    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
		  else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">

    <input type="email" name="email" placeholder="Email" class="form-control">
    <input type="text" name="mobile" placeholder="Mobile Number" class="form-control">
    <input type="text" name="newpassword" placeholder="New Password" class="form-control">
    <input type="text" name="confirmpassword" placeholder="Confirm Password" class="form-control">
    <button type="submit" name="submit50">Change Password</button>
    </form>

</div>

<?php require 'includes/bottom_section.php';?>
