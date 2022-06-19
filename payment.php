<?php
    include 'config/conn.php';
    $api_key="rzp_test_IGb9bbYNSDleYx";
    $num = 'order'.rand(10,1000).'SB';
    $_SESSION['invoice_no'] = $num;
    $_SESSION['total_price'] = $_POST['total'];
    if(isset($_SESSION['coupon_id'])){
        $total_price = $_SESSION['coupon_value']+50;
    }else{
        $total_price = $_SESSION['total_price'];
    }
?>
<form action="invoice.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js"    
    data-key="<?php echo $api_key ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys    
    data-amount="<?php echo $total_price*100 ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.    
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account    
    data-id="<?php echo $num?>"// Replace with the order_id generated by you in the backend.    
    data-buttontext="Pay with Razorpay"    
    data-name="SpecsBazaar"    
    data-description="One Stop Eyewear Solution"    
    data-image="https://example.com/your_logo.jpg"    
    data-prefill.name="<?php echo $_SESSION['username'] ?>"    
    data-prefill.email="<?php echo $_SESSION['email'] ?>"    
    data-theme.color="#F37254">
</script><input type="hidden" name="address" value="<?php echo $_POST['customer_address']?>">
<input type="hidden" name="contact" value="<?php echo $_POST['customer_contact']?>">
<input type="hidden" name="wcontact" value="<?php echo $_POST['customer_wcontact']?>">
</form>