<?php
    include ('../../config/conn.php');
    session_destroy();
    $_SESSION['username'] = '';
    header('location:'.SITEURL.'admin/superAdmin/adminLogin.php');
?>