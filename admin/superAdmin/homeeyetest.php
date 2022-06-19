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
                                            <th>Address</th>
                                            <th>Visited</th>
                                            <th>tester</th>
                                        </tr>
                                    </thead>

<?php
            $sql = "SELECT * FROM eye_test";

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
                    $address = $row['address'];
                    $visited = $row['visited'];
                    $tester_id = $row['tester'];
                    $sql2 = "SELECT * FROM subadmin WHERE id='$tester_id'";
                    $res2 = mysqli_query($conn,$sql2);
                    $count2 = mysqli_num_rows($res2);
                    if($count2>0){
                        $row2 = mysqli_fetch_assoc($res2);
                        $tester = $row2['username'];
                    }else{
                        $tester = 'No Tester Alloted';
                    }
?>

                <tbody>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $contact; ?></td>
                        <td><?php echo $whatsapp_contact; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $visited; ?></td>
                        <td><?php echo $tester; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/updateHomeEyeTest.php?id=<?php echo $id; ?>" class="btn-secondary"><button class="updatebtn">
  <span class="label">Update</span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </span>
</button></a>
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