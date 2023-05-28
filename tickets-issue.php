<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
}
else {?>
    <?php include ('includes/top_section.php'); ?>
    <div class="container">
        <h3>Tickets issue</h3>
        <form action="" method="post" onSubmit="return valid();">
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        
        <p>
            <table>
                <tr>
                    <th>#</th>
                    <th>Ticket Id</th>
                    <th>Issue</th>
                    <th>Description</th>
                    <th>Admin Remark</th>
                    <th>Reg Date</th>
                    <th>Remark Date</th>
                </tr>

                <?php
                $uemail=$_SESSION['login'];
                $sql="SELECT * FROM tblissues WHERE UserEmail=:uemail";
                $query=$dbh->prepare($sql);
                $query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if ($query->rowCount() > 0 ) {
                    foreach ($results as $results) {?>

                    <tr align="center">
                        <td><?php echo htmlentities($cnt);?></td>
                        <td width="100">#TKT-<?php echo htmlentities($result->id);?></td>
                        <td><?php echo htmlentities($result->Issue);?></td>
                        <td width="300"><?php echo htmlentities($result->Description);?></td>
                        <td><?php echo htmlentities($result->AdminRemark);?></td>
                        <td width="100"><?php echo htmlentities($result->PostingDate);?></td>
                        <td width="100"><?php echo htmlentities($result->AdminRemarkDate);?></td>
                    </tr>
                <?php $cnt=$cnt+1; } } ?>

                

            </table>
        </p>
        </form>

    </div>
    <?php include('includes/bottom_section.php');?> 
<? }?>