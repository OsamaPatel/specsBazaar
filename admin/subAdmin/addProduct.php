<?php
    include ('../../config/conn.php');
?>
<div class="main-content">
    <div class="wrapper">
        <br>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Product">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Product."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Discounted Price: </td>
                    <td>
                        <input type="number" name="discounted_price">
                    </td>
                </tr>
                <tr>
                    <td>Discount: </td>
                    <td>
                        <input type="number" name="discount">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Brand: </td>
                    <td>
                        <input type="text" name="brand" placeholder="Brand of the Product">
                    </td>
                </tr>
                <tr>
                    <td>Color: </td>
                    <td>
                        <input type="text" name="color" placeholder="Color of the Product">
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
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>New Arrival: </td>
                    <td>
                        <input type="radio" name="new_arrival" value="Yes"> Yes 
                        <input type="radio" name="new_arrival" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Popular: </td>
                    <td>
                        <input type="radio" name="popular" value="Yes"> Yes 
                        <input type="radio" name="popular" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Recommend: </td>
                    <td>
                        <input type="radio" name="recommend" value="Yes"> Yes 
                        <input type="radio" name="recommend" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="addButton">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $discounted_price = $_POST['discounted_price'];
                $discount = $_POST['discount'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $color = $_POST['color'];

                if(isset($_POST['new_arrival']))
                {
                    $new_arrival = $_POST['new_arrival'];
                }
                else
                {
                    $new_arrival = "No"; 
                }
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; 
                }
                if(isset($_POST['recommend']))
                {
                    $recommend = $_POST['recommend'];
                }
                else
                {
                    $recommend = "No"; 
                }
                if(isset($_POST['popular']))
                {
                    $popular = $_POST['popular'];
                }
                else
                {
                    $popular = "No"; 
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; 
                }

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $tmp =explode('.', $image_name);
                        $ext = end($tmp);

                        $image_name = "Product-".rand(0000,9999).".".$ext;
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../../images/products/".$image_name;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/addProduct.php'</script>;
                            <?php
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }

                $sql2 = "INSERT INTO products SET 
                    title = '$title',
                    publisher = '$publisher',
                    description = '$description',
                    price = $price,
                    discounted_price = $discounted_price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    brand = '$brand',
                    color = '$color',
                    active = '$active',
                    brand = '$brand',
                    color = '$color',
                    popular = '$popular',
                    new_arrival = '$new_arrival',
                    discount = $discount
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/products.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Product.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/addProduct.php'</script>;
                    <?php
                }
            }
        ?>
    </div>
</div>