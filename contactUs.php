<?php
include 'config/conn.php';
$email = $_POST['email'];
$username = $_POST['username'];
$contact = $_POST['contact'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$sql = "INSERT INTO contact SET
    email= '$email',
    username= '$username',
    contact= $contact,
    subject= '$subject',
    message= '$message'
";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($res==TRUE)
{
    ?>
    <script>window.location.href='<?php echo SITEURL;?>index.php'
	function wantMail(){
		if(window.confirm("Do You want a mail sent to your email")){
			alert("yes");
		}
		else{
			alert("No");
		}
	}
    wantMail();
    </script>;
    <?php
}  

else
{
    ?>
    <script>window.location.href='<?php echo SITEURL;?>index.php'</script>;
    <?php
}
?>