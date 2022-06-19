<?php include_once('../../config/conn.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Home Eye Test</h1>

        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM eye_test WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $wcontact = $row['whatsapp_contact'];
                    $address = $row['address'];
                    $visited = $row['visited'];
                    $current_tester = $row['tester'];
                }
                else
                {
                    $_SESSION['no-coupon-found'] = "<div class='error'>Data not Found.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/homeeyetest.php'</script>;
                    <?php
                }
 
            }
            else
            {
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/homeeyetest.php'</script>;
                <?php
            }
        
        ?>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Username: </td>
                    <td>
                        <p><?php echo $username ?></p>
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <p><?php echo $email ?></p>
                    </td>
                </tr>
                <tr>
                <td>Contact</td>
                    <td>
                        <p><?php echo $contact ?></p>
                    </td>
                </tr>
                <tr>
                    <td>Whatsapp Contact: </td>
                    <td>
                        <p><?php echo $wcontact ?></p>
                    </td>
                </tr>

                <tr>
                    <td>Address: </td>
                    <td>
                        <p><?php echo $address ?></p>
                    </td>
                </tr>

                <tr>
                <td>Visited: </td>
                <td>
                    <input <?php if($visited=="Yes") {echo "checked";} ?> type="radio" name="visited" value="Yes"> Yes 
                    <input <?php if($visited=="No") {echo "checked";} ?> type="radio" name="visited" value="No"> No 
                </td>
                </tr>

                <tr>
                    <td>Tester: </td>
                    <td>
                        <select name="tester">
                        <?php 
                                $sql3 = "SELECT * FROM subadmin";
                                $res3 = mysqli_query($conn, $sql3);
                                $count3 = mysqli_num_rows($res3);

                                if($count3>0)
                                {
                                    while($row3=mysqli_fetch_assoc($res3))
                                    {
                                        $id2 = $row3['id'];
                                        $title = $row3['username'];

                                        ?>

                                        <option <?php if($current_tester==$id2){echo "selected";} ?> value="<?php echo $id2; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Sub-Admin Found</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Add Product" class="addButton">
                    </td>
                </tr>

            </table>

            </form>
    

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $tester = $_POST['tester'];
                $visited = $_POST['visited'];

                $sql2 = "UPDATE eye_test SET 
                    visited = '$visited',
                    tester = '$tester'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Homeeyetest.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Homeeyetest.php'</script>;
                    <?php
                }

            }
        
        ?>

    </div>
</div>