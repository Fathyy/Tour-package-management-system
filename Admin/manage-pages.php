<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login'])==0) {
  header('location:index.php');
}
else {
  if(isset($_POST['submit'])) {
    $pagetype=$_GET['type'];
    $pagedetails=$_POST['pgedetails'];
    $sql="UPDATE tblpages SET detail=:pagedetails WHERE type=:pagetype";
    $query=$dbh->prepare($sql);
    $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
    $query->bindParam(':pagedetails', $pagedetails, PDO::PARAM_STR);
    $query->execute();
    $msg="Page data updated successfully";
  }
?>

<style>
		<?php include 'css/style.css';?>
</style>

<script type="text/JavaScript">
function MM_findObj(n, d) {  //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<div class="containers">

<div class="sidebar-container">
      <?php include('includes/sidebar-menu.php');?>	
      </div>

      <div class="top-container">
      <?php require 'includes/top-section.php';?>
      </div>

<div class="grids-section">
  <h3>Update page data</h3>
  <!-- error and success messages begin here -->
  <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- error and success messages end here -->
        <!-- bootstrap breadcrumb for navigating to diff pages starts here -->
              <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage Pages</li>
            </ol>
          </nav>
<!-- bootstrap breadcrumb for navigating to diff pages ends here -->

        <div class="tab-content">
          <div class="tab-pane active">
            <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Select Page</label>
                <div class="col-sm-8">
                  <select name="menu1" onchange="MM_jumpMenu('parent', this, 0)">
                  <option value="" selected="selected" class="form-control">Select one</option>
                  <option value="manage-pages.php?type=terms">Terms and conditions</option>
                  <option value="manage-pages.php?type=privacy">Privacy Policy</option>
                  <option value="manage-pages.php?type=aboutus">About us</option>
                  <option value="manage-pages.php?type=contact">Contact us</option>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Selected page</label>
                <div class="col-sm-8">
                  <?php
                  switch (isset(($_GET['type']))) {
                    case 'terms':
                      echo "Terms and conditions";
                      break;
                    case 'privacy':
                      echo "Privacy and policy";
                      break;
                    case 'aboutus':
                      echo "About us";
                      break;
                    case 'software':
                      echo "Offers";
                      break;
                    case 'aspnet':
                      echo "Vision and mission";
                      break;
                    case 'objectives':
                      echo "Objectives";
                      break;
                    case 'Disclaimer':
                      echo "Disclaimer";
                      break;
                    case 'vbnet':
                      echo "Partner with us";
                      break;
                    case 'candc':
                      echo "Super Brand";
                      break;
                    case 'Contact':
                      echo "Contact Us";
                      break;
                    
                    default:
                      echo "";
                      break;
                  }
                  
                  ?>
                </div>
              </div>

              <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
              <div class="col-sm-8">
                <textarea name="pgedetails" id="pgedetails" cols="50" rows="5" placeholder="package details" required>
                  <?php
                  $pagetype=(isset($_GET['type']));
                  $sql="SELECT detail from tblpages WHERE type=:pagetype";
                  $query=$dbh->prepare($sql);
                  $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if ($query->rowCount()>0) {
                    foreach ($results as $result) {
                      echo htmlentities($result->detail);
                    }
                  }
                  ?>

                </textarea>

              </div>
              </div>
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <button type="submit" name="submit" value="Update" id="submit" class="btn btn-primary">Update</button>
                </div>
              </div>


            </form>
          </div>
        </div>
</div>

     <div class="footer-container">
          <?php include 'includes/bottom-section.php';?>
          </div>	
							</div>
  </div>
</div>
<?php } ?>














