<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) ==0) {
  header('location:index.php');
}
else {?>
<style>
    <?php include 'css/style.css';?>
</style>

<div class="containers">
  <!-- both sidebar-container, top-container, grids-section and footer-container are children of the containers grid -->

  <div class="sidebar-container">
  <?php include('includes/sidebar-menu.php');?>
  </div>

  <div class="top-container">
  <?php include 'includes/top-section.php';?>
  </div>


  <div class="grids-section">
    <!-- bootstrap breadcrumb for navigating to diff pages starts here -->
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
  </ol>
</nav>
<!-- bootstrap breadcrumb for navigating to diff pages starts here -->
<div class="agile-grids">
  <div class="agile-tables">
    <div class="table-info">
      <table id="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile number</th>
            <th>Email Id</th>
            <th>Reg date</th>
            <th>Updation date</th>
          </tr>
        </thead>
        <tbody>
          <?php $sql = "SELECT * FROM tblusers";
          $query=$dbh->prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if ($query->rowCount() >0) {
            foreach ($results as $result) {?>
            <tr>
              <td><?php echo htmlentities($cnt);?></td>
              <td><?php echo htmlentities($result->FullName);?></td>
              <td><?php echo htmlentities($result->MobileNumber);?></td>
              <td><?php echo htmlentities($result->EmailId);?></td>
              <td><?php echo htmlentities($result->RegDate);?></td>
              <td><?php echo htmlentities($result->UpdationDate);?></td>
            </tr>
            
          <?php $cnt=$cnt+1; } }?>
        </tbody>
      </table>
    </div>
  </div>
  
</div>
</div>

 <div class="footer-container">   
<?php include('includes/footer.php');?>
</div>
  
</div>
  
<?php } ?>





















