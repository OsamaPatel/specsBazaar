<?php
    include 'config/conn.php';
    session_destroy();
    ?>
    <script>window.location.href='<?php echo SITEURL?>index.php';</script>
    <?php
?>