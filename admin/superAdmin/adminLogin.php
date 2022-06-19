<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include ('../../config/conn.php');
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);

        $sql = "SELECT * FROM superadmin WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $_SESSION['superAdmin'] = $username;
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/index.php';</script>
                    <?php
                }
            }
        }else{
            echo 'no account';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo/logo.jpeg">
    <title>Login Page</title>
</head>
<body>
    
    <div class="container">
        <h1>Login Page</h1>
        <form method="post" action="adminLogin.php">
            <input type="text" name="username" autocomplete="off"><br>
            <input type="password" name="password"><br>
            <input type="submit" name="submit"><br>
        </form>
    </div>

</body>
</html>