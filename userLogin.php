<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include ('config/conn.php');
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['contact'] = $contact;
                    $_SESSION['address'] = $address;
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>index.php';</script>
                    <?php
                }
                else{
                    echo 'Incorrect Password';
                }
            }
        }else{
            echo 'no account';
        }
    }
?>