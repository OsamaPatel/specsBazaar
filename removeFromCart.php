<?php
    include 'config/conn.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM cart WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Product Removed From Cart Successfully.</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>cart.php'</script>;
            <?php
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Remove Product From Cart.</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>cart.php'</script>;
            <?php
        }
    }
?>