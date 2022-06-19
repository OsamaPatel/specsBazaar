<?php 
    include_once('partials/header.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../../images/products/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/manageProducts.php'</script>;
                <?php
                die();
            }

        }

        $sql = "DELETE FROM products WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Product Deleted Successfully.</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/manageProducts.php'</script>;
            <?php
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Product.</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/manageProducts.php'</script>;
            <?php
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        ?>
        <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/manageProducts.php'</script>;
        <?php
    }

?>










