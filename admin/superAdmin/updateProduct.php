<?php include_once('partials/header.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM products WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $discounted_price = $row2['discounted_price'];
        $brand = $row2['brand'];
        $color = $row2['color'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $popular = $row2['popular'];
        $active = $row2['active'];
        $recommend = $row2['recommend'];
        $new_arrival = $row2['new_arrival'];

    }
    else
    {
        ?>
        <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/manageProducts.php';</script>
        <?php
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Clothes</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>
            <tr>
                <td>Brand: </td>
                <td>
                    <input type="text" name="brand" value="<?php echo $brand; ?>">
                </td>
            </tr>
            <tr>
                <td>Color: </td>
                <td>
                    <input type="text" name="color" value="<?php echo $color; ?>">
                </td>
            </tr>

            <tr>
                <td>Discounted Price: </td>
                <td>
                    <input type="number" name="discounted_price" value="<?php echo $discounted_price; ?>">
                </td>
            </tr>
            <tr>
                <td>Discount: </td>
                <td>
                    <input type="number" name="discount" value="<?php echo $discount; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/products/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                        <?php 
                            $sql = "SELECT * FROM category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>
            
            <tr>
                <td>New Arrival: </td>
                <td>
                    <input <?php if($new_arrival=="Yes") {echo "checked";} ?> type="radio" name="new_arrival" value="Yes"> Yes 
                    <input <?php if($new_arrival=="No") {echo "checked";} ?> type="radio" name="new_arrival" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 
                    <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Popular: </td>
                <td>
                    <input <?php if($popular=="Yes") {echo "checked";} ?> type="radio" name="popular" value="Yes"> Yes 
                    <input <?php if($popular=="No") {echo "checked";} ?> type="radio" name="popular" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Recommend: </td>
                <td>
                    <input <?php if($recommend=="Yes") {echo "checked";} ?> type="radio" name="recommend" value="Yes"> Yes 
                    <input <?php if($recommend=="No") {echo "checked";} ?> type="radio" name="recommend" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $discounted_price = $_POST['discounted_price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $popular = $_POST['popular'];
                $active = $_POST['active'];
                $recommend = $_POST['recommend'];
                $new_arrival = $_POST['new_arrival'];
                $discount = $_POST['discount'];
                $brand = $_POST['brand'];
                $color = $_POST['color'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name!=""){
                        $ext = end(explode('.', $image_name));
                        $image_name = "Product-".rand(0000, 9999).'.'.$ext; 
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../../images/product/".$image_name; 
                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/manageProducts.php';</script>
                            <?php
                            die();
                        }
                        if($current_image!="")
                        {
                            $remove_path = "../../images/products/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove==false)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                                ?>
                                <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/manageProducts.php';</script>
                                <?php
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; 
                    }
                }
                else
                {
                    $image_name = $current_image; 
                }
                $sql3 = "UPDATE products SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    discounted_price = '$discounted_price',
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    popular = '$popular',
                    active = '$active',
                    brand = '$brand',
                    color = '$color',
                    recommend = '$recommend',
                    new_arrival = '$new_arrival',
                    discount = $discount
                    WHERE id=$id
                ";
                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>product Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/manageProducts.php';</script>
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update product.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/manageProducts.php';</script>
                    <?php
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>

















