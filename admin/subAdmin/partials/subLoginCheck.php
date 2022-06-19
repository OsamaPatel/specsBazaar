<?php
if(!isset($_SESSION['subAdmin'])){
        ?>
        <script>window.location.href='<?php echo SITEURL?>admin/subAdmin/adminLogin.php';</script>
        <?php
    }
?>