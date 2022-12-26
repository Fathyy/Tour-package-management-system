<?php
require 'includes/config.php';
if (isset($_POST['submit1'])) 
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobileno'];
    $subject=$_POST['subject'];
    $description=$_POST['description'];
    $sql='INSERT INTO tblenquiry(FullName, EmailId, MobileNumber, Subject, Description)
    VALUES(:fname, :email, :mobile, :subject, :description)';
    $query=$dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId=$dbh->lastInsertId();
    if ($lastInserId) {
        $msg="Enquiry successfully submitted";
    }
    else {
        $error="something went wrong!";
    }
}
require 'includes/top_section.php'
?>

<style>
<?php include 'css/style.css';?>
</style>

<div class="container">
    <div class="row">
        <div class="col sm 8">
        <form action="" method="post">
            <input type="text" class="form-control enquiry" name="fname"placeholder="Full Name">
            <input type="email" class="form-control enquiry" name="email"placeholder="Your email">
            <input type="text" class="form-control enquiry" name="mobileno"placeholder="Mobile Number">
            <input type="text" class="form-control enquiry" name="subject"placeholder="Subject">
            <textarea name="description" id="" cols="30" rows="10" class="form-control enquiry"placeholder="Description"></textarea>
            <button type="submit" name="submit1" class="btn-primary btn enquiry">Submit</button>
        </form>
        </div>
    </div>
</div>
<?php 'require bottom_section.php' ?>