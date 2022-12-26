<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) ==0) {
  header('location:index.php');
}
else {
  if (isset($_REQUEST['eid'])) {
    $eid=intval($_GET['eid']);
    $status=1;

    $sql="UPDATE tblenquiry SET Status=:status WHERE id=eid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $msg="Enquiry successfully read";
  }
  ?>

<style>
		<?php include 'css/style.css';?>
</style>

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
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

        <div class="table-info">
          <h2>Manage Issues</h2>
          <table id="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Email Id</th>
                <th>Issues</th>
                <th>Description</th>
                <th>Posting Date</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sql="SELECT tblissues.id as id,
              tblusers.FullName as fname,
              tblusers.MobileNumber as mnumber,
              tblusers.EmailId as email,
              tblissues.Issue as issue,
              tblissues.Description as Description,
              tblissues.PostingDate as PostingDate from tblissues
              join tblusers on tblusers.EmailId=tblissues.UserEmail";
              $query=$dbh->prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);

              if ($query->rowCount() >0) {
                foreach ($results as $result) {?>
                <tr>
                  <td width="120">#00<?php echo htmlentities($result->id);?></td>
                  <td width="50"><?php echo htmlentities($result->fname);?></td>
                  <td width="50"><?php echo htmlentities($result->mnumber);?></td>
                  <td width="50"><?php echo htmlentities($result->email);?></td>
                  <td width="200"><?php echo htmlentities($result->issue);?></td>
                  <td width="400"><?php echo htmlentities($result->Description);?></td>
                  <td width="50"><?php echo htmlentities($result->PostingDate);?></td>
                  <td><a href="javascript:void(0);" onclick="popUpWindow('updateissue.php?iid=<?php echo($result->id);?>');">View</a></td>

                </tr>
                  
                
              <?php } }?>
              
              
            </tbody>
          </table>
        </div>
<!-- bootstrap breadcrumb for navigating to diff pages ends here -->

      </div>

      <div class="footer-container">
          <?php include 'includes/bottom-section.php';?>
          </div>
</div>

<?php } ?>
