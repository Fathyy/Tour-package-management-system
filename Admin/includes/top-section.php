<?php require 'includes/header.php';?>
<div class="header-section">
<div class="poster">
    <h2><a href="dashboard.php" class="dashboard-text">Tourism Management System</a></2>
</div>
<div class="admin-image-name">
    <div class="admin-image">
    <span class="imgg"><i class="fa-solid fa-user"></i></span>
    </div>

    <div class="admin-welcome">
        <p>Welcome<span>Administrator</span></p>
    </div>

    <!-- <div class="dropdown">
        <a href="#" class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
         <ul class="dropdown-menu">
            <li><a href="change-password.php"><i class="fa-solid fa-lock"></i></a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    </ul> 
</div> -->
<div class="dropdown">
    <!-- <button class="drop-btn"></button> -->
    <i class="fa-solid fa-angle-down drop-btn"></i>
    <div class="dropdown-content">
        <a href="change-password.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </div>
</div>
</div>
</div>
<?php require 'includes/footer.php';?>