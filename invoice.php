<?php
    include 'config/conn.php';
    if(isset($_SESSION['coupon_id'])){
        $coupon_id = $_SESSION['coupon_id'];
        $coupon_code = $_SESSION['coupon_code'];
        $coupon_value = $_SESSION['coupon_value'];
    }else{
        $coupon_id ='';
        $coupon_code = '';
        $coupon_value = '';
        $final_price = '';
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="css/invoice.css">
    <link rel="icon" href="images/logo/logo.jpeg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <title>SpecsBazaar Invoice</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="images/logo/logo.jpeg" alt="" class="img-fluid">
                    <img src="images/invoice/invoice.png" alt="" >
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span><?php echo $_SESSION['invoice_no'];?></span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2>SpecsBazaar</h2>
                            <p class="address"> Marol, <br> Marol, <br>Marol </p>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                        <div class="col-5">
                            <p>Client,</p>
                            <h2><?php echo $_SESSION['username'] ?></h2>
                            <p class="address"> <?php echo $_SESSION['address'] ?> </p>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Razorpay</span></p>
                            <p>Order Number: <span>#868</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($_SESSION['product'] as $values){
                            if(isset($_SESSION['coupon_id'])){
                                $product_total = $coupon_value;
                                $product_quantity_total = $product_total*$values['quantity'];
                            }else{
                                $product_total = $values['price'];
                                $product_quantity_total = $product_total*$values['quantity'];
                            }
                        ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <img class="mr-3 img-fluid" src="<?php echo SITEURL ?>images/products/<?php echo $values['image_name'] ?>" alt="Product 01">
                                    <div class="media-body">
                                        <p class="mt-0 title"><?php echo $values['product_name']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>&#8377; <?php echo $product_total; ?></td>
                            <td><?php echo $values['quantity']; ?></td>
                            <td>&#8377; <?php echo $product_quantity_total; ?></td>
                        </tr>
                        <?php 
                        $status="ordered";
                        date_default_timezone_set("Asia/Kolkata");
                        $order_date = date("Y-m-d h:i:s");
                        $customer_email = $_SESSION['email'];
                            $consumer_address=$_POST['address'];
                            $consumer_contact=$_POST['contact'];
                            $consumer_wcontact=$_POST['wcontact'];
                            $product_name = $values['product_name'];
                            $product_category = $values['category'];
                            $product_brand = $values['brand'];
                            $product_image_name = $values['image_name'];
                            $product_color = $values['color'];
                            $product_quantity = $values['quantity'];
                            $product_total = $_SESSION['total_price'];;
                            $product_publisher = $values['publisher'];
                            $invoice_no = $_SESSION['invoice_no'];
                            $name = $_SESSION['username'];

                            $sql2 = "INSERT into orders SET
                            product_name = '$product_name',
                            category = '$product_category',
                            brand = '$product_brand',
                            image_name = '$product_image_name',
                            color = '$product_color',
                            price = $product_price,
                            quantity = $product_quantity,
                            total = $product_total,
                            order_date = '$order_date',
                            status = '$status',
                            publisher = '$product_publisher',
                            customer_name = '$name',
                            invoice_no = '',
                            coupon_id = '$coupon_id',
                            coupon_code = '$coupon_code',
                            coupon_value = '$coupon_value',
                            customer_contact = $consumer_wcontact,
                            customer_email = '$customer_email',
                            customer_address = '$consumer_address'
            
                            ";
                            $res2 = mysqli_query($conn,$sql2);
                            
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Note.</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td>&#8377; <?php echo $product_quantity_total; ?></td>
                            </tr>
                            <tr>
                                <td>Shipping Charge:</td>
                                <td>&#8377; 50</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td>&#8377; <?php echo $product_quantity_total+50; ?></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> Owners Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <img src="cart.jpg" class="img-fluid cart-bg" alt="">

            <footer>
                <hr>
                <br>
                <div class="social pt-3">
                    <span class="pr-2">
                    <a href="" style="color:black;"><i class="fas fa-mobile-alt"></i>
                        <span>0123456789</span></a>
                    </span>
                    <span class="pr-2">
                    <a href="" style="color:black;"><i class="fas fa-envelope"></i>
                        <span>SpecsBazaar@gmail.com</span></a>
                    </span>
                    <span class="pr-2">
                    <a href="" style="color:black;"><i class="fab fa-facebook-f"></i>
                        <span>/javed</span></a>
                    </span>
                    <span class="pr-2">
                        <a href="" style="color:black;"><i class="fab fa-instagram"></i>
                        <span>/SpecsBazaar</span></a>
                    </span>
                    <a href="https://www.google.co.in/maps/place/Specs+Bazaar/@19.1196214,72.88335,17z/data=!3m1!4b1!4m5!3m4!1s0x3be7c9560e3b794d:0xeaeea358ad63b114!8m2!3d19.1196214!4d72.8855387" style="color:black;"><span class="pr-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>/SpecsBazaar</span></a>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>

<script>
window.onload=(function(){
    window.print();
    window.onafterprint = function(event) {
    window.location.href = 'index.php'
};

})

</script>