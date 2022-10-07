<?php require 'includes/header.php';?>
<style>
  <?php include 'css/sidebar.css';?>
		</style>

<div class="side-bar">
    <header class="logo-name-button">
        <div class="logo-name">
        <a href="#" class="sidebar-icon"><span><i class="fa-solid fa-bars"></i></span></a>
        <span class="admin-textt">Admin Menu</span>
        </div>

        <button class="logo-button">
                <i class="fa-solid fa-right-to-bracket logo-name-icon" id="logo-name-icon"></i>
            </button>
    </header>
    <div class="menu">
        <ul id="menu">
            <li class="menu-items"><a href="dashboard.php"><i class="fa-solid fa-gauge menu-icon"></i><span>Dashboard</span></a></li>

              <div class="dropdown menu-items">
                <i class="fa-solid fa-list menu-icon"></i><span>Tour Packages<i class="fa-solid fa-angle-down drop-btn"></i></span>
                <div class="dropdown-content">
                    <a href="create-package.php">Create</a>
                    <a href="manage-packages.php">Manage</a>
                </div>
                    </div>
             
            <li class="menu-items" id="manage-users"><a href="manage-users.php"><i class="fa-solid fa-user menu-icon"></i><span>Manage Users</span></a></li>
            <li class="menu-items"><a href="manage-bookings.php"><i class="fa-solid fa-list menu-icon"></i> <span>Manage Bookings</span></a></li>
            <li class="menu-items"><a href="manage-issues.php"><i class="fa-solid fa-table menu-icon"></i> <span>Manage Issues</span></a></li>
            <li class="menu-items"><a href="manage-enquiries.php"><i class="fa-solid fa-file-lines menu-icon"></i> <span>Manage Enquiries</span></a></li>
            <li class="menu-items"><a href="manage-pages.php"><i class="fa-solid fa-file-lines menu-icon"></i> <span>Manage Pages</span></a></li>
        </ul>
    </div>
</div>
<?php require 'includes/footer.php';?>

<!-- <script>
    let sideBar = document.querySelector('.side-bar');
    let arrowCollapse=document.querySelector('#logo-name-icon');
    sideBar.onclick=()=>{
        sideBar.classList.toggle('collapse');
        arrowCollapse.classList.toggle('collapse');
        if (arrowCollapse.classList.contains('collapse')) {
            arrowCollapse.classList='fa-solid fa-right-to-bracket logo-name-icon collapse';
            
        }
        else{
            arrowCollapse.classList='fa-solid fa-right-to-bracket logo-name-icon';
        }
    };
</script> -->