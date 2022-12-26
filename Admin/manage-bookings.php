<?php
session_start();
include 'includes/config.php';
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
}

else {
  
  //code for cancelling booking begins here
  if (isset($_REQUEST['bkid'])) {
    $bid=intval($_GET['bkid']);
    $status=2;
    $cancelby='a';
    $sql="UPDATE tblbooking SET status=:status, CancelledBy=:cancelby WHERE BookingId=:bid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':cancelby', $cancelby, PDO::PARAM_STR);
    $query->bindParam(':bid', $bid, PDO::PARAM_STR);
    $query->execute();

    $msg="Booking cancelled successfully";
  }

  if (isset($_REQUEST['bckid'])) {
    
    $bid=intval($_GET['bckid']);
    $status=1;
    $cancelby='a';
    $sql="UPDATE tblbooking SET status=:status, WHERE BookingId=:bcid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':bcid', $bcid, PDO::PARAM_STR);
    $query->execute();

    $msg="Booking confirmed successfully";
  }
}
?>
<style>
  <?php include 'css/style.css';?>
		</style>

<div class="containers">

<div class="sidebar-container">
<?php include('includes/sidebar-menu.php');?>	
</div>

 <div class="top-container">
  <?php require 'includes/top-section.php';?>
  </div>

<div class="container grids-section">
  <div class="row">
  <!-- error and success messages begin here -->
  <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error and success messages end here -->
        <!-- bootstrap breadcrumb for navigating to diff pages starts here -->
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Bookings</li>
  </ol>
</nav>
<!-- bootstrap breadcrumb for navigating to diff pages ends here -->
          <h3>Manage Bookings</h3>
          <div class="table-info">
            <table id="table">
              <thead>
                <tr>
                  <th>Booking Id</th>
                  <th>Name</th>
                  <th>Mobile No</th>
                  <th>Email Id</th>
                  <th>Reg Date</th>
                  <th>From / to</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql="SELECT tblbooking.BookingId as bookid,
                tblusers.FullName as fname,
                tblusers.MobileNumber as mnumber,
                tblusers.EmailId as email,
                tbltourpackages.PackageName as pckname,
                tblbooking.PackageId as pid,
                tblbooking.FromDate as fdate,
                tblbooking.ToDate as tdate,
                tblbooking.Comment as comment,
                tblbooking.status as status,
                tblbooking.CancelledBy as cancelby,
                tblbooking.UpdationDate as upddate 
                from tblusers join tblbooking on tblbooking.UserEmail=tblusers.EmailId
                join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId";

                $query7=$dbh->prepare($sql);
                $query7->execute();
                $results=$query7->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;

                if ($query7->rowCount() >0) {
                  foreach ($results as $result) {?>
                    <tr>
                      <td>#BK-<?php echo htmlentities($result->bookid);?></td>
                      <td><?php echo htmlentities($result->fname);?></td>
                      <td><?php echo htmlentities($result->mnumber);?></td>
                      <td><?php echo htmlentities($result->email);?></td>
                      <td><a href="update-package.php?pid=<?php echo htmlentities($result->pid);?>"><?php echo htmlentities($result->pckname);?></a></td>
                      <td><?php echo htmlentities($result->fdate);?> To <?php echo htmlentities($result->tdate);?></td>
                      <td><?php echo htmlentities($result->comment);?></td>
                      <td><?php if($result->status==0)
                      {
                        echo "Pending";
                      }
                      if ($result->status==1) {
                        echo "confirmed";
                      }
                      if ($result->status==2 and $result->cancelby=='a') {
                        echo "Cancelled by you at " .$result->upddate;
                      }
                      if ($result->status==2 and $result->cancelby=='u') {
                        echo "Cancelled by user at " .$result->upddate;
                      }
                      ?></td>

                      <?php if ($result->status==2) {?>
                        <td>Cancelled</td>
                      <?php } else{ ?>
                        <td><a href="manage-bookings.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a>
                         / <a href="manage-bookings.php?bckid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Booking has been confirmed')">Confirm</a></td>
                      <?php }?>
                    </tr>
                  
               <?php $cnt=$cnt+1; } }?>
                

              </tbody>
            </table>
          </div>
</div>
</div>

<div class="footer-container">
<?php include 'includes/bottom-section.php';?>
</div>
							</div> 






















