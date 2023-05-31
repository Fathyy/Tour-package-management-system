<?php
require 'config.php';
if (isset($_POST['submit']))
 {
    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO tblusers(FullName,MobileNumber,EmailId,Password)
    VALUES(:fname,:mnumber,:email,:password)";
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

<!--Javascript for check email availabilty-->
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<!-- The signup modal begins here -->
<?php require 'header.php';?>
<style>
  .modal-background {
   background-color: transparent;
}
</style>

<!-- Button trigger modal -->
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Signup
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div class="signup">

<form method="POST" name="signup">
  <h3>Create your account</h3>
<div class="mb-3">
  <input type="text" class="form-control" name ="fname" placeholder="Full Name">
</div>

<div class="mb-3">
  <input type="phone" class="form-control" name="mobilenumber" autocomplete="off" placeholder="Mobile Number">
</div>

<div class="mb-3">
  <input type="email" class="form-control" placeholder="Email" name="email" id="email">
</div>

<div class="mb-3">
  <input type="password" class="form-control" placeholder="Password" name="password">
</div>

<button type="submit" name="submit" class="btn btn-primary">Create Account</button>
</form>
</div>
<p>By logging in you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.type?type=privacy">Privacy Policy</a> </p>
      </div>
      
    </div>
  </div>
</div>

<?php require 'footer.php';?>  

<!-- The signup modal ends here -->
  