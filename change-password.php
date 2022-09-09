<?php
session_start();
require 'includes/config.php';
if (strlen($_SESSION['login']) ==0) 
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
            $chngpwd=$dbh->prepare($con);
            $chngpwd->bindParam(':email', $email, PDO::PARAM_STR);
            $chngpwd->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd->execute();
            $msg="your password was changed";
        }
        else {
            $error="your current password is wrong";
        }
    
}
}
?>
<?php include('includes/top_section.php');?>