<?php
include 'config/conn.php';
include 'partials/header.php';
if(!isset($_SESSION['user'])){
        ?>
        <script>
            window.location.href='<?php echo SITEURL?>index.php';
        </script>
        <script src="js/script.js"></script>
        <?php
    }
    else{
        ?>
        <script>formBtn.style.display="none";</script>
    <?php
    }
    include 'partials/footer.php';
?>
