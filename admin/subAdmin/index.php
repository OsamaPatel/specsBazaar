<?php
    include_once('partials/header.php');
    $user = $_SESSION['subAdmin'];    
    $user_id = $_SESSION['user_id'];
?>
            <div class="main-content">
                <div class="row row-cols-2">
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">category</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Categories</strong></p>
                                <?php 
                                    $sql3 = "SELECT * FROM category WHERE active='YES'";
                                    $res3 = mysqli_query($conn,$sql3);
                                    $count3 = mysqli_num_rows($res3);
                                ?>
                                <h3 class="card-title"><?php echo $count3; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">info</i>
                                    <a href="<?php echo SITEURL ?>admin/subAdmin/category.php">See Category Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">inventory</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Products</strong></p>
                                <?php
                                    $sql4 = "SELECT * FROM products WHERE active='YES' AND publisher='$user'";
                                    $res4 = mysqli_query($conn,$sql4);
                                    $count4 = mysqli_num_rows($res4);
                                ?>
                                <h3 class="card-title"><?php echo $count4; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">info</i>
                                    <a href="<?php echo SITEURL ?>admin/subAdmin/products.php">See Product Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">shopping_cart</span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Orders</strong></p>
                                <?php
                                    $sql5 = "SELECT * FROM orders WHERE publisher='$user'";
                                    $res5 = mysqli_query($conn,$sql5);
                                    $count5 = mysqli_num_rows($res5);
                                ?>
                                <h3 class="card-title"><?php echo $count5; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> <a href="<?php echo SITEURL ?>admin/subAdmin/orders.php">Product-wise sales</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">
                                        attach_money
                                    </span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Revenue</strong></p>
                                <?php
                                    $sql6 = "SELECT SUM(total) AS Total FROM orders WHERE status='ordered' AND publisher='$user'";
                                    $res6 = mysqli_query($conn,$sql6);
                                    $row6 = mysqli_fetch_assoc($res6);
                                    $total_revenue = $row6['Total'];
                                    $zero = 0;
                                ?>
                                <h3 class="card-title">&#8377;<?php echo $zero+$total_revenue?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Weekly sales
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">

                                    <span class="material-icons">
                                    add_home_work
                                    </span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Home Try On</strong></p>
                                <?php
                                    $sql7 = "SELECT * FROM home_try_on WHERE tester='$user_id'";
                                    $res7 = mysqli_query($conn,$sql7);
                                    $count7 = mysqli_num_rows($res7);
                                ?>
                                <h3 class="card-title"><?php echo $count7; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> <a href="<?php echo SITEURL ?>admin/subAdmin/homeTryOn.php">See Home Try On Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">
                                    visibility
                                    </span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Home Eye Test</strong></p>
                                <?php
                                    $sql8 = "SELECT * FROM eye_test WHERE tester='$user_id'";
                                    $res8 = mysqli_query($conn,$sql8);
                                    $count8 = mysqli_num_rows($res8);
                                ?>
                                <h3 class="card-title"><?php echo $count8; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> <a href="<?php echo SITEURL ?>admin/subAdmin/homeeyetest.php">See Home Eye Test Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include_once('partials/footer.php');
                ?>
            </div>



        </div>
    </div>