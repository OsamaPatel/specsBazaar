<?php
    include_once('partials/header.php');
?>
<div class="main-content">
    <div class="wrapper">

<?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if(isset($_SESSION['failed-remove']))
        {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }        

?>
            <div class="row ">
                    <div class="col-lg-12 col-md-16">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Manage Products</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>New Arrival</th>
                                            <th>Featured</th>
                                            <th>Popular</th>
                                            <th>Recommend</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

<?php
            $sql = "SELECT * FROM products WHERE publisher='$subAdmin'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $popular = $row['popular'];
                    $active = $row['active'];
                    $recommend = $row['recommend'];
                    $new_arrival = $row['new_arrival'];
?>

                <tbody>
                    <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>

                    <td>
<?php  
                        if($image_name!="")
                        {
?>

                            <img src="<?php echo SITEURL; ?>images/products/<?php echo $image_name; ?>" width="100px">
                            
<?php
                        }
                        else
                        {
                            echo "<div class='error'>Image Not Added</div>";
                        }

?>
                    </td>
                    <td><?php echo $new_arrival;?></td>    
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $popular; ?></td>
                    <td><?php echo $recommend; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/subAdmin/updateProduct.php?id=<?php echo $id; ?>" class="btn-secondary"><button class="updatebtn">
  <span class="label">Update</span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </span>
</button></a>
                        <a href="<?php echo SITEURL; ?>admin/subAdmin/deleteProduct.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">
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
                        <div class="error">No Products Added.</div>
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