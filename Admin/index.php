<?php
session_start();
include 'includes/config.php';
if (isset($_POST['login'])) {
    $uname=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="SELECT UserName, Password FROM admin 
    WHERE UserName=:uname and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['username'];
        header('location:dashboard.php');
    }
    else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<?php require 'includes/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
    <div class="form-center d-flex justify-content-center align-items-center">
    <form action="" method="post">
    <h2 class="mt-5">Sign In</h2>
        <div class="username mb-3">
            <input type="text" class="form-control" name="username" value="Username">
        </div>

        <div class="pass mb-3">
            <input type="password" class="form-control" name="password" value="Your Password">
        </div>

        <div class="sign-in mb-3">
            <input type="submit" name="login" value="Sign In">
        </div>

        <div class="back mb-3">
        <a href="../index.php">Back to home </a>
    </div>

    </form>
    </div>
</div>
</div>
    </div>

<?php require 'includes/footer.php';?>