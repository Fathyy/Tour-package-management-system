<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else {
    if (isset($_REQUEST['bkid'])) {
        $bid=intval($_GET['bkid']);
        $email=$_SESSION['login'];
	    $sql ="SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':bid', $bid, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0)
{
        foreach($results as $result)
        {
            $fdate=$result->FromDate;

            $a=explode("/",$fdate);
            $val=array_reverse($a);
            $mydate =implode("/",$val);
            $cdate=date('Y/m/d');
            $date1=date_create("$cdate");
            $date2=date_create("$fdate");
        $diff=date_diff($date1,$date2);
        echo $df=$diff->format("%a");
        if($df>1)
        {
        $status=2;
        $cancelby='u';
        $sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':status',$status, PDO::PARAM_STR);
        $query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
        $query-> bindParam(':email',$email, PDO::PARAM_STR);
        $query-> bindParam(':bid',$bid, PDO::PARAM_STR);
        $query -> execute();

        $msg="Booking Cancelled successfully";
        }
        else
        {
        $error="You can't cancel booking before 24 hours";
        }
        }
        }
            }
}
?>

<?php require 'includes/top_section.php'?>
<div class="container">
    <div class="row">
        <h3>My tour history</h3>
        <form action="" method="post">
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                <table border="1" width="100%">
                <tr align="center">
                    <th>#</th>
                    <th>Booking Id</th>
                    <th>Package Name</th>	
                    <th>From</th>
                    <th>To</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Booking Date</th>
                    <th>Action</th>
                    </tr>
                    <?php

                    
$uemail=$_SESSION['login'];;
$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.
PackageId as pkgid,
tbltourpackages.PackageName as packagename,
tblbooking.FromDate as fromdate,
tblbooking.ToDate as todate,tblbooking.
Comment as comment,tblbooking.status as status,
tblbooking.RegDate as regdate,tblbooking.
CancelledBy as cancelby,tblbooking.
UpdationDate as upddate from tblbooking join 
tbltourpackages on tbltourpackages.PackageId=tblbooking.
PackageId where UserEmail=:uemail";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

foreach ($results as $result) 
{?>
    <tr align='center'>
        <td><?php echo htmlentities($cnt);?></td>
        <td>#BK<?php echo htmlentities($result->bookid);?></td>
        <td><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a></td>
        <td><?php echo htmlentities($result->fromdate);?></td>
        <td><?php echo htmlentities($result->todate);?></td>
        <td><?php echo htmlentities($result->comment);?></td>
        <td><?php if ($result->status==0) {
            echo "Pending";
        }
        if ($result->status==1) {
            echo "Confirmed";
        }
        if ($result->status==2 and  $result->cancelby=='u') {
            echo "Canceled by you at " .$result->upddate;
        }
        if ($result->status==2 and $result->cancelby=='a') {
            echo "Canceled by admin at " .$result->upddate;
        }?></td>

        <td><?php echo htmlentities($result->regdate);?></td>
        <?php if ($result->status==2) {
            ?> <td>Cancelled</td>

       <?php } else {?>
        <td><a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking ')">Cancel</a></td>
       <?php }?>

    </tr>
<?php $cnt=$cnt+1; } ?>

                   

                </table>

        </form>
    </div>
</div>

<?php require 'includes/bottom_section.php'?>