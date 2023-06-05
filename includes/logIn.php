<?php
if (isset($_POST['submit3'])) 
{
    $email = $_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email
    and Password=:password";
    $query =$dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results= $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) 
    {
       $_SESSION['login']=$_POST['email'];
       echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
    }
    else {
      echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<?php require 'header.php';?>
<!-- Button trigger modal -->
<button type="button" style="margin-left:10px;"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Login
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div class="login">

<form method="POST">
  <h3>login with your account</h3>

      <div class="mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="">
      </div>

      <div class="mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
      </div>

      <button type="submit" name="submit3" class="btn btn-primary">Login</button>
      </form>
      </div>
      <p>By logging in you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.type?type=privacy">privacy policy</a> </p>
       
      </div>

    </div>
  </div>
</div>
<?php include 'includes/footer.php'?>

