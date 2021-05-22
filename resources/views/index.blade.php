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
                <div class="sidebar-brand-text mx-3">Classic Plastic Model Shop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Shopping
            </div>

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
                        $productVendors = App\Products::groupBy('productVendor')->get();

                        foreach ($productVendors as $productVendor) {
                            ?>
                            <form class="form-horizontal" method="GET" action="{{ route('index') }}">
                                <tr>
                                    <button style="font-size:small; text-align:left" class="form-control bg-light border-0 " name="txt_keyword" style="" type="submit" value="<?php echo $productVendor->productVendor; ?>"><?php echo $productVendor->productVendor; ?></button>
                                </tr>
                            </form>
                        <?php
                        }
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
                        $productScales = App\Products::groupBy('productScale')->get();

                        foreach ($productScales as $productScale) {
                            ?>
                            <form class="form-horizontal" method="GET" action="{{ route('index') }}">
                                <tr>
                                    <button style="font-size:small; text-align:left" class="form-control bg-light border-0 small" name="txt_keyword" type="submit" value="<?php echo $productScale->productScale; ?>"><?php echo $productScale->productScale; ?></button>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

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
                            <div class="p-2 flex-grow-1 bd-highlight"></div>
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
                                        <input type="text" class="form-control bg-light border-0 small" name="txt_keyword" placeholder="Search... Product Vendor or Scale" aria-label="Search" aria-describedby="basic-addon2">
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

                    <!-- Show Promotions -->
                    <?php
                    $checkPromotions = App\Promotions::get()->count();
                    $Promotions = App\Promotions::first();
                    date_default_timezone_set('Asia/Bangkok');
                    $Today = date('Y-m-d');
                    // echo $checkPromotions;
                    // echo $Today;
                    if ($checkPromotions != 0) {
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <div class="d-flex bd-highlight">
                                                <div class="p-2 flex-grow-1 bd-highlight">
                                                    <!-- <a class="btn" href="{{ route('admin-marketing') }}"> -->
                                                    <i class="fas fa-bullhorn"></i>
                                                    <span>Promotions: Buy 1 Get 1</span>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                            <hr>
                                            <tr align="center">
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Scale</th>
                                                <th>Vendor</th>
                                                <th width="40%">Description</th>
                                                <th>List Price</th>
                                                <th>Expiry Date</th>
                                                <!-- <th><i class="fas fa-bullhorn"></i></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $promotionss = App\Promotions::select('*')->get();
                                                foreach ($promotionss as $promotions) {
                                                    $productss = App\Products::Where('productCode', '=', $promotions->productCode)
                                                        ->get();
                                                    foreach ($productss as $products) {
                                                        if ($promotions->expiryDate >= $Today) {
                                                            ?>
                                                        <tr>
                                                            <td align="center"><?php echo $products->productCode; ?></td>
                                                            <td align="center"><?php echo $products->productName; ?></td>
                                                            <td align="center"><?php echo $products->productScale; ?></td>
                                                            <td align="center"><?php echo $products->productVendor; ?></td>
                                                            <td><?php echo $products->productDescription; ?></td>
                                                            <td align="center"><?php echo $products->MSRP; ?></td>
                                                            <td align="center"><?php echo $promotions->expiryDate; ?></td>

                                                            <!-- <td align="center"><a class="btn" href=""><i class="fas fa-times"></i></a></td> -->

                                                        </tr>
                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>Product Name</th>
                                            <th>Scale</th>
                                            <th>Vendor</th>
                                            <th width="40%">Description</th>
                                            <th>List Price</th>
                                            <!-- <th>Quantity</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $products = App\Products::where('productVendor', 'like', '%' . $search_text . '%')
                                            ->orWhere('productScale', 'like', '%' . $search_text . '%')
                                            ->get();
                                        foreach ($products as $product) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $product->productName; ?></td>
                                                <td align="center"><?php echo $product->productScale; ?></td>
                                                <td align="center"><?php echo $product->productVendor; ?></td>
                                                <td><?php echo $product->productDescription; ?></td>
                                                <td align="center"><?php echo $product->MSRP; ?></td>
                                                <!-- <td align="center"><?php echo $product->quantityInStock; ?></td> -->
                                            </tr>
                                        <?php
                                        }
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