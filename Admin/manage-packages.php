<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else { ?>
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
  <div class="table-info">
    <h2>Manage Packages</h2>
    <table id="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Type</th>
          <th>Location</th>
          <th>Price</th>
          <th>Creation Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql="SELECT * from tbltourpackages";
        $query=$dbh->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if ($query->rowCount() >0) {
          foreach ($results as $result) { ?>
            <tr>
              <td><?php echo htmlentities($cnt);?></td>
              <td><?php echo htmlentities($result->PackageName);?></td>
              <td><?php echo htmlentities($result->PackageType);?></td>
              <td><?php echo htmlentities($result->PackageLocation);?></td>
              <td><?php echo htmlentities($result->PackagePrice);?></td>
              <td><?php echo htmlentities($result->PackageName);?></td>
              <td><?php echo htmlentities($result->Creationdate);?></td>
              <td><a href="update-package.php?pid=<?php echo htmlentities($result->PackageId);?>">
              <button type="button">View details</button></a></td>
            </tr>
          
       <?php $cnt=$cnt+1; } } ?>

        
       
      </tbody>
    </table>
  </div>
</div>

<div class="footer-container">
<?php include 'includes/bottom-section.php';?>
</div>
  </div>
<?php }?>


















