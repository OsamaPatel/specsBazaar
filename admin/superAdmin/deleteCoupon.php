<?php
    include ('../../config/conn.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
        $sql = "DELETE FROM coupon WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['delete'] = "<div class='success'>Coupon Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/superAdmin/manageCoupon.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Coupon.</div>";
            header('location:'.SITEURL.'admin/superAdmin/manageCoupon.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/superAdmin/manageCoupon.php');
    }


?>