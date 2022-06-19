<?php
    include_once('partials/header.php');
?>
<div class="main-content">
    <div class="wrapper">
<a href="<?php echo SITEURL; ?>admin/subAdmin/addProduct.php"><button class="addButton">Add Product</button></a>
<br><br><br>
<div class="row">
                    <div class="col-lg-12 col-md-17">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Products</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Discounted Price</th>
                                            <th>New Arrival</th>
                                            <th>Featured</th>
                                            <th>Recommend</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>

            <tbody>

        <?php

            $sql = "SELECT * FROM products WHERE publisher='$subAdmin'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $price = $row['price'];
                    $discounted_price = $row['discounted_price'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    $recommend = $row['recommend'];
                    $new_arrival = $row['new_arrival'];

                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>

                    <td>
                        <?php  
                        if($image_name!="")
                        {
                            ?>

                            <img src="<?php echo SITEURL; ?>images/products/<?php echo $image_name; ?>" width="100px">
                            
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>Image Not Added</div>";
                        }

                        ?>
                    </td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $discounted_price; ?></td>
                    <td><?php echo $new_arrival; ?></td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $recommend; ?></td>
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
                        <div class="error">No Product Added.</div>
                    </td>
                </tr>

                <?php
            }

            ?>


        </table>
    </div>
</div>

<?php
    include_once('partials/footer.php');
?>