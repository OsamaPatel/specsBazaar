<?php    
    include ('../../config/conn.php');
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
?>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Coupon Code: </td>
                    <td>
                        <input type="text" name="coupon_code" placeholder="Coupon Code">
                    </td>
                </tr>

                <tr>
                    <td>Coupon Value: </td>
                    <td>
                        <input type="number" name="coupon_value" placeholder="Coupon Value">
                    </td>
                </tr>
                <tr>
                <td>Coupon Type</td>
                <td>
                    <input type="radio" name="coupon_type" value="Percentage"> Percentage
                    <input type="radio" name="coupon_type" value="Rupee"> Rupee
                </td>
                </tr>
                <tr>
                    <td>Coupon Minimum Value: </td>
                    <td>
                        <input type="number" name="min_value" placeholder="Coupon Minimum Value">
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
                    <td colspan="2">
                        <input type="submit" name="submit" class="addButton" value="Add Coupon" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

<?php 
            if(isset($_POST['submit']))
            {
                $coupon_code = $_POST['coupon_code'];
                $coupon_value = $_POST['coupon_value'];
                $min_value = $_POST['min_value'];
                if(isset($_POST['coupon_type']))
                {
                    $coupon_type = $_POST['coupon_type'];
                }
                else
                {
                    $coupon_type = "rupee";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                

                $sql = "INSERT INTO coupon SET 
                    coupon_code='$coupon_code',
                    coupon_value=$coupon_value,
                    coupon_type='$coupon_type',
                    min_value = '$min_value',
                    active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                
                if($res==true)
                {
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/coupon.php'</script>;
                    <?php
                }
                else
                {
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/coupon.php'</script>;
                    <?php
                }
            }
        
?>