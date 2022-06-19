<?php
    include_once('partials/header.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM subadmin WHERE id= $id ";
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
        ?>
        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
        <?php
    }
    
    else
    {
        $_SESSION['delete'] = " <div class='error'>Failed to delete Admin. Try again later</div>";
        ?>
        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
        <?php
    }
?>