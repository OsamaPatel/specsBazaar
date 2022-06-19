<?php
    include ('../../config/conn.php');
    session_destroy();
    $_SESSION['subAdmin'] = '';
    header('location:'.SITEURL.'admin/subAdmin/adminLogin.php');
?>