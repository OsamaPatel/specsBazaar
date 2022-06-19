<?php
    include('../../config/conn.php');
    include('partials/subLoginCheck.php');
    $fullUrl = basename($_SERVER['PHP_SELF']);
    $url = explode('.',$fullUrl);
    $subAdmin = $_SESSION['subAdmin'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>SpecsBazaar
    </title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="../../css/mycss.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/logo/logo.jpeg">


    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>




    <div class="wrapper">


        <div class="body-overlay"></div>

        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../../images/logo/logo.jpeg" class="img-fluid" /><span>Specs Bazaar</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>

                <li>
                    <a href="category.php"><i class="material-icons">category</i><span>Category</span></a>
                </li>

                

                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">inventory</i><span>Products</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li>
                            <a href="products.php">Products</a>
                        </li>
                        <li>
                            <a href="manageProducts.php">Manage Products</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="orders.php"><i class="material-icons">list_alt</i><span>Orders</span></a>
                </li>
    
                <li>
                    <a href="homeTryOn.php"><i class="material-icons">home_repair_service</i><span>Home Try On</span></a>
                </li>
                <li>
                    <a href="homeeyetest.php"><i class="material-icons">visibility</i><span>Home Eye Test</span></a>
                </li>
                <li>
                    <a href="adminLogout.php"><i class="material-icons">logout</i><span>Log Out</span></a>
                </li>
            </ul>


        </nav>
        <div id="content">

            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>

                        <a class="navbar-brand" href="#"> <?php echo $url[0]; ?> </a>


                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
                        </div>
                    </div>
                </nav>
            </div>
            