<?php
    include_once('partials/header.php');
    if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
?>
<div class="main-content">
    <div class="wrapper">
<div class="row">
                    <div class="col-lg-12 col-md-17">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Orders</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Order Date & Time</th>
                                            <th>Publisher</th>
                                            <th>Customer Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

            <tbody>

            <?php
            $sql = "SELECT * FROM orders";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['product_name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $total = $row['total'];
                    $orderTime = $row['order_date'];
                    $publisher = $row['publisher'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $orderTime;?></td>
                    <td><?php echo $publisher; ?></td>
                    <td><?php echo $status; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/updateOrder.php?id=<?php echo $id; ?>" class="btn-secondary"><button class="updatebtn">
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
                        <div class="error">No Orders at the moment.</div>
                    </td>
                </tr>

                <?php
            }

            ?>


        </table>
    </div>
</div>
<?php
    include_once 'partials/footer.php';
?>
<script>
const triggers = document.querySelectorAll("[data-modeltrigger]");
const dialogs = document.querySelectorAll("dialog");
const mainWrapper = document.getElementById("main-wrapper");

triggers.forEach(function (el) {
  el.addEventListener("click", () => {
    const getTarget = el.getAttribute("data-target");
    const target = document.querySelector(`[data-name="${getTarget}"]`);
    if (target.hasAttribute("open")) {
      target.close();
      mainWrapper.removeAttribute("inert");
    } else {
      target.showModal();
      mainWrapper.setAttribute("inert", "true");
    }
  });
});

/* Check for click in backdrop */
dialogs.forEach(function (el) {
  el.addEventListener("click", ({ target: dialog }) => {
    if (dialog.nodeName === "DIALOG") {
      dialog.close("dismiss");
      mainWrapper.removeAttribute("inert");
    }
  });
});
</script>