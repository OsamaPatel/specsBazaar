<?php
    include 'config/conn.php';
    if(isset($_SESSION['coupon_id'])){
        unset($_SESSION['coupon_id']);
        unset($_SESSION['coupon_code']);
        unset($_SESSION['coupon_value']);
        unset($_SESSION['final_price']);
    }
    $name = $_SESSION['username'];
    $email = $_SESSION['email'];
    if(isset($_POST['coupon_code'])){
        $coupon_str = $_POST['coupon_code'];
        $sql = "SELECT * FROM coupon WHERE active='YES' AND coupon_code='$coupon_str'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        $jsonArr = array();
        if($count>0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $coupon_code = $row['coupon_code'];
                    $coupon_value = $row['coupon_value'];
                    $coupon_type = $row['coupon_type'];
                    $min_value = $row['min_value'];
                }

                $sql2 = "SELECT SUM(total) AS Total FROM cart WHERE customer_name='$name' AND customer_email='$email'";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $total_price = $row2['Total'];
                // echo $total_revenue+50;
                if($min_value>$total_price){
                    // echo 'Not Found';
                    $jsonArr = array('is_error'=>'yes','result'=>'Coupon not applicable for this price');
                }else{
                    if($coupon_type=='Rupee'){
                        $final_price = $total_price - $coupon_value;
                    }else{
                        $final_price = $total_price-(($total_price*$coupon_value)/100);
                    }
                    $_SESSION['coupon_id']=$id;
                    $_SESSION['coupon_code']=$coupon_code;
                    $_SESSION['coupon_value']=$final_price;
                    // echo $final_price;
                    $jsonArr = array('is_error'=>'no','result'=>$final_price);
                }
										
            }
            else{
                // echo 'not found';
                $jsonArr = array('is_error'=>'yes','result'=>'Invalid Coupon');
            }
            echo json_encode($jsonArr);
        }
?>