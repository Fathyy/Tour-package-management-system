<?php 
include 'includes/config.php';
include 'includes/top_section.php';?>
    <?php
    // $pageid=intval($_GET['pageid']);
    $pagetype=(isset($_GET['type']));
    $pagedetails=(isset($_POST['pagedetails']));
    $sql="SELECT type,detail FROM tblpages WHERE type=:pagetype AND detail=:pagedetails";
    $query=$dbh->prepare($sql); 
    $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
    $query->bindParam(':pagedetails', $pagedetails, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if ($query->rowCount() >0) {
       foreach ($results as $result) {?>

       <div class="container">
       <h3><?php echo $_GET['type']?></h3>
       <p><?php echo $_POST[$result->detail]; ?></p>

       <?php } }?>
   
    
</div>


