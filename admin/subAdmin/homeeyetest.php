<?php
    include_once('partials/header.php');
?>
<div class="main-content">
    <div class="wrapper">
            <div class="row ">
                    <div class="col-lg-12 col-md-16">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Home Eye Test</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>username</th>
                                            <th>email</th>
                                            <th>contact</th>
                                            <th>whatsapp contact</th>
                                            <th>Visited</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>

<?php
            $user = $_SESSION['subAdmin'];
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM eye_test WHERE tester=$user_id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $whatsapp_contact = $row['whatsapp_contact'];
                    $visited = $row['visited'];
                    $address = $row['address'];
?>

                <tbody>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $contact; ?></td>
                        <td><?php echo $whatsapp_contact; ?></td>
                        <td><?php echo $visited; ?></td>
                        <td><?php echo $address; ?></td>
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
                        <div class="error">No Home Eye Test requests at the moment.</div>
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