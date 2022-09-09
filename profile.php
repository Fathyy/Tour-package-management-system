<?php
session_start();
include "inludes/config.php";
if (strlen($_SESSION['login']) ==0) 
{
    header ('Location:index.php');
}
else {
    if(isset($_POST['submit6'])){
        $name=$_POST['name'];
        $mobileno=$_POST['mobileno'];
        $email=$_SESSION['login'];

        $sql="UPDATE tblusers set FullName=:name, MobileNumber=:mobileno
        WHERE Emailid=:email";
        $query=$dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $msg="Profile updated successfully";
    }
    
}
?>

<?php 'require top_section.php'; ?>

<div class="container">
    <div class="row">
        <form action="" method="post">
        <!-- error handling goes here -->
               <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <?php
        $useremail=$_SESSION['login'];
        $sql="SELECT * FROM tblusers WHERE EmailId=:useremail";
        $query=$dbh->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {?>
            <input type="text" name="name" placeholder="" class="form-control" value="<?php echo htmlentities($result->FullName);?>">
            <input type="text" name="mobileno" placeholder="" class="form-control" value="<?php echo htmlentities($result->MobileNumber);?>">
            <input type="email" name="email" placeholder="" class="form-control" value="<?php echo htmlentities($result->EmailId);?>">

            <b>Last Insertion Date :</b>
            <?php echo htmlentities($result->UpdationDate);?>

            <b>Reg Date :</b>
            <?php echo htmlentities($result->RegDate);?>

            <button type="submit" name="submit6" class="btn btn-primary">Update</button>
               
            <?php } } ?>
        
        </form>

    </div>
</div>

<?php include('includes/bottom_section.php');?>