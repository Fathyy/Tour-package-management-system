<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else {
  if (isset($_REQUEST['eid'])) {
    $eid=intval($_GET['eid']);
    $status=1;

    $sql="UPDATE tblenquiry SET Status=:status WHERE id=:eid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();

    $msg="Enquiry successfully read";
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
  

<div class="grids-section">
  <!-- error and success messages begin here -->
<?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error and success messages end here -->
        <!-- bootstrap breadcrumb for navigating to diff pages starts here -->
            <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Issues</li>
          </ol>
        </nav>
<!-- bootstrap breadcrumb for navigating to diff pages ends here -->
          <div class="table-info">
            <h2>Manage Enquiries</h2>
            <table id="table">
              <thead>
                <tr>
                  <th>Ticket Id</th>
                  <th>Name</th>
                  <th>Mobile no/ Email</th>
                  <th>Subject</th>
                  <th>Description</th>
                  <th>Posting date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql="SELECT * from tblenquiry";
                $query=$dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() >0) {
                  foreach ($results as $result) {?>
                    <tr>
                      <td width="120">#TCKT-<?php echo htmlentities($result->id);?></td>
                      <td width="50"><?php echo htmlentities($result->FullName);?></td>
                      <td width="50"><?php echo htmlentities($result->MobileNumber);?>
                      /</br > <?php echo $result->EmailId;?>
                    </td>
                      <td width="200"><?php echo htmlentities($result->Subject);?></td>
                      <td width="400"><?php echo htmlentities($result->Description);?></td>
                      <td width="50"><?php echo htmlentities($result->PostingDate);?></td>
                      <?php
                      if ($result->Status==1) {?>
                        <td>Read</td>
                     <?php } else {?>
                      <td><a href="manage-enquiries.php?eid=<?php echo htmlentitites($result->id);?>" onclick="return confirm('Do you really want to read')">Pending</a></td>
                     <?php } ?>
                    </tr>
                  
               <?php } }?>
              </tbody>
            </table>
          </div>
        </div>
        
        <div class="footer-container">
          <?php include 'includes/bottom-section.php';?>
          </div>
					
							
      </div>
    </div>














