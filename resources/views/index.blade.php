<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" sizes="192x192" href="img/unicorn.png">

    <title>Classic Plastic Model Shop</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
                <!-- <div class="sidebar-brand-icon rotate-n">
                    <i class="fas fa-user-circle"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Classic Plastic Model Shop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Shopping</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="collapse" data-target="#collapseVendor" aria-expanded="true" aria-controls="collapseVendor">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Vendor</span>
                </a>
                <div id="collapseVendor" class="collapse" aria-labelledby="headingVendor" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        // $mysqli = new mysqli("localhost", "root", "", "classicmodels");

                        // $strSQL = "SELECT DISTINCT productVendor FROM products";
                        // $objQuery = mysqli_query(DB, $strSQL);

                        $productVendors = DB::table('products')
                            ->select('productVendor')
                            ->distinct()
                            ->pluck('productVendor');

                        foreach ($productVendors as $productVendor) {
                            ?>
                            <tr>
                                <a class="collapse-item" href="#"><?php echo $productVendor; ?></a>
                            </tr>
                        <?php
                        }
                        // mysqli_close($mysqli);
                        ?>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="collapse" data-target="#collapseScale" aria-expanded="true" aria-controls="collapseScale">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Scale</span>
                </a>
                <div id="collapseScale" class="collapse" aria-labelledby="headingScale" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        // $productScales = DB::table('products')
                        //     ->select('productScale')
                        //     ->distinct()
                        //     ->pluck('productScale');

                        //$flights = App\Flight::all();
                        $flights = App\Flight::orderBy('productScale')->distinct()->get();
                        foreach ($flights as $flight) {
                            ?>
                            <tr>
                                <a class="collapse-item" href="#"><?php echo $flight->productScale; ?></a>
                            </tr>
                        <?php
                        }
                        ?>
                        <?php
                        // foreach ($productScales as $productScale) {
                        ?>
                        <!-- <tr>
                                <a class="collapse-item" href="#"><?php //echo $productScale; 
                                                                    ?></a>
                            </tr> -->
                        <?php
                        //}
                        ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div style="padding: 0.75rem 0.5rem">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">Point 1300</div>
                            <div class="p-2 bd-highlight">Classic Plastic Model Shop</div>
                        </div>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Search -->
                    <div class="card shadow mb-4">
                        <div class="card-body" style="margin: -0.25rem;">
                            <div class="table-responsive">
                                <form class="form-horizontal" method="GET" action="{{ route('index') }}">
                                    <div class="input-group-append">
                                        <input type="text" class="form-control bg-light border-0 small" name="txt_keyword" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php $search_text = isset($_GET['txt_keyword']) ? $_GET['txt_keyword'] : ''; ?>

                    <!-- DataTales Products -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>Product Name</th>
                                            <th>Scale</th>
                                            <th>Vendor</th>
                                            <th>Description</th>
                                            <th>List Price</th>
                                            <th>Quantity</th>
                                            <th><i class="fas fa-shopping-cart"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $mysqli = new mysqli("localhost", "root", "", "classicmodels");

                                        // $strSQL = "SELECT productName, productScale, productVendor, productDescription, buyPrice, quantityInStock 
                                        //     FROM products
                                        //     WHERE (productVendor LIKE '%$search_text%') OR (productScale LIKE '%$search_text%')";
                                        // $objQuery = mysqli_query($mysqli, $strSQL);

                                        $productss = DB::table('products')
                                            ->where('productVendor', 'like', '%' . $search_text . '%')
                                            ->orWhere('productScale', 'like', '%' . $search_text . '%')
                                            ->get();
                                        foreach ($productss as $products) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $products->productName; ?></td>
                                                <td align="center"><?php echo $products->productScale; ?></td>
                                                <td align="center"><?php echo $products->productVendor; ?></td>
                                                <td><?php echo $products->productDescription; ?></td>
                                                <td align="center"><?php echo $products->buyPrice; ?></td>
                                                <td align="center"><?php echo $products->quantityInStock; ?></td>
                                                <td align="center"><i class="fas fa-shopping-cart"></td>
                                            </tr>
                                        <?php
                                        }
                                        // mysqli_close($mysqli);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Classic Plastic Model Shop 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</html>