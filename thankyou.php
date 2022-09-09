<?php 'require includes/top_section.php'?>
<div class="container">
    <div class="row">
    <h3>Confirmation</h3>
    <div class="wow animate__animated animate__fadeInUp" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
        <h4><?php echo htmlentities($_SESSION['msg']);?></h4>
    </div>
    <div class="clearfix"></div>
    </div>
    
</div>

<?php 'require includes/bottom_section.php'?>