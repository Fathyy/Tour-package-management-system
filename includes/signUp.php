<?php
require 'config.php';
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO tblusers(FullName, MobileNumber, EmailId, Password)
    VALUES(:fname, :mnumber, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname',$fname, PDO::PARAM_STR);
    $query->bindParam(':mnumber',$mnumber, PDO::PARAM_STR);
    $query->bindParam(':email',$email, PDO::PARAM_STR);
    $query->bindParam(':password',$password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $_SESSION['msg'] = "You have successfully registered. Now you can login";
        header('location:thankyou.php');
    }
    else {
        $_SESSION['msg'] = "Something went wrong try again";
        header('location:thankyou.php');
    }

}
?>

<!-- The signup modal begins here -->
<?php require 'header.php';?>

<div class="modal" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="signup">

  <form method="POST">
        <div class="mb-3">
          <input type="text" class="form-control" name ="fname" placeholder="Full Name">
        </div>

        <div class="mb-3">
          <input type="phone" class="form-control" name="mobilenumber" autocomplete="off">
        </div>

        <div class="mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
        </form>
        </div>
        <div class="clearfix"></div>
        <p>By logging in you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.type?type=privacy">privacy policy</a> </p>
      </div>
      
    </div>
  </div>
</div>

<?php require 'footer.php';?>    
    
<!-- The signup modal ends here -->
