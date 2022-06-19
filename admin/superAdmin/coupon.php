<?php
    include_once('partials/header.php');
?>
<div class="main-content">
    <div class="wrapper">

        <?php
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if(isset($_SESSION['failed-remove']))
        {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }        

        ?>
         <a href="<?php echo SITEURL; ?>admin/superAdmin/addCoupon.php"><button class="addButton">Add Coupon</button></a>

        <br /> <br /> <br />

        <div class="row ">
                    <div class="col-lg-12 col-md-15">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Coupons</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Value</th>
                                            <th>Coupon Type</th>
                                            <th>Minimum Value</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>

            <tbody>

        <?php

            $sql = "SELECT * FROM coupon";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $code = $row['coupon_code'];
                    $value = $row['coupon_value'];
                    $type = $row['coupon_type'];
                    $min_value = $row['min_value'];
                    $active = $row['active'];

                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $code; ?></td>

                    <td><?php echo $value; ?></td>
                    <td><?php echo $type; ?></td>

                    <td><?php echo $min_value; ?></td>
                    <td><?php echo $active; ?></td>
                </tr>                    
                    </tbody>
                    <?php
                }
            }
            else
            {
                ?>

                <tr>
                    <td colspan="6">
                        <div class="error">No Coupon Added.</div>
                    </td>
                </tr>

                <?php
            }

            ?>


        </table>
    </div>
</div>


<?php
    include_once('partials/footer.php')
?>