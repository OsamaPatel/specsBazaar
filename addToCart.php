<?php
    include 'config/conn.php';
    if(!isset($_SESSION['username'])){
        ?>
        <script>window.location.href='<?php echo SITEURL ?>index.php'</script>
        <?php
    }
    else{
        $id = $_GET['id'];
        $quantity = $_GET['quantity'];
        $sql2 = "SELECT * FROM products WHERE id=$id";
        $res2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $discounted_price = $row2['discounted_price'];
        $current_image = $row2['image_name'];
        $brand = $row2['brand'];
        $color = $row2['color'];
        $current_category = $row2['category_id'];
        $publisher = $row2['publisher'];
        $discount = $row2['discount'];    
    

    $sql3 = "SELECT * FROM category WHERE id=$current_category";
    $res3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($res3);

    $category = $row3['title'];
    date_default_timezone_set("Asia/Kolkata");
    $order_date = date("Y-m-d h:i:s");
    $total = $discounted_price*$quantity;
    $username = $_SESSION['username'];
    $contact = $_SESSION['contact'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];

    $sql = "INSERT INTO cart SET
        product_name = '$title',
        image_name = '$current_image',
        price = $discounted_price,
        category = '$category',
        quantity = $quantity,
        total=$total,
        brand = '$brand',
        color = '$color',
        order_date = '$order_date',
        publisher = '$publisher',
        customer_name = '$username',
        customer_contact = $contact,
        customer_email = '$email',
        customer_address = '$address'
        ";
        $res = mysqli_query($conn,$sql);
        if($res==TRUE){
            ?>
            <script>window.location.href='<?php echo SITEURL ?>preCart.php'</script>
            <?php
        }else{
            ?>
            <script>location.reload();</script>
            <?php
        }
    }
        ?>