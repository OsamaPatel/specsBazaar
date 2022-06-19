<?php
    include_once('partials/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Add Sub Admin</h2>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        ?>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
        
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Sub-Admin" class="addButton">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php 
if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO subadmin SET
            full_name= '$full_name',
            username= '$username',
            password= '$password'
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
            <?php
        }  
        
        else
        {
            $_SESSION['add'] = "Failed to insert data";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
            <?php
        }
    }
?>
        <div class="row ">
                    <div class="col-lg-12 col-md-15">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Sub Admins</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
            <tbody>
        <?php

            $sql = "SELECT * FROM subadmin";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $FullName = $row['full_name'];
                    $UserName = $row['username'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $FullName; ?></td>
                    <td><?php echo $UserName; ?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/superAdmin/changeSubAdminPassword.php?id=<?php echo $id; ?>"><button>Change Password</button></a>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/updateSubAdmin.php?id=<?php echo $id; ?>" class="btn-secondary"><button class="updatebtn">
  <span class="label">Update</span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </span>
</button></a>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/deleteSubAdmin.php?id=<?php echo $id;?>" class="btn-danger">
<button class="deletebtn"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">

</path></svg></span></button></a>
                    </td>
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
                        <div class="error">No Sub-Admins Added.</div>
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