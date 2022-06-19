<?php
    if(!isset($_SESSION['superAdmin'])){
        ?>
        <script>window.location.href='<?php echo SITEURL?>admin/superAdmin/adminLogin.php';</script>
        <?php
    }
?>