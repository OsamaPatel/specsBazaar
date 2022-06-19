<?php
    include 'config/conn.php';
    $sql = "SELECT * FROM coupon WHERE active='YES'
    ORDER BY RAND()
    LIMIT 1";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count>0){
        while($row = mysqli_fetch_assoc($res)){
            echo $row['coupon_code'];
        }
    }
    else{
        echo 'No Coupons at the moment';
    }
?>