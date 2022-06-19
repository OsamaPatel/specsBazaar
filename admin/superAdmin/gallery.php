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
            
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
<a href="<?php echo SITEURL; ?>admin/superAdmin/addImage.php"><button class="addButton">Add Image</button></a>
<br><br><br>
<div class="row">
                    <div class="col-lg-12 col-md-17">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Images</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

            <tbody>

        <?php

            $sql = "SELECT * FROM gallery";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $image_name = $row['image_name'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td>
                        <?php  
                        if($image_name!="")
                        {
                            ?>

                            <img src="<?php echo SITEURL; ?>images/gallery/<?php echo $image_name; ?>" width="100px">
                            
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>Image Not Added</div>";
                        }

                        ?>
                    </td>
                    <td>
                    <a href="<?php echo SITEURL; ?>admin/superAdmin/deleteImage.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">
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
                        <div class="error">No Images Added.</div>
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