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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin-shopping') }}">
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
                <a class="nav-link" href="{{ route('admin-shopping') }}">
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
                            <form class="form-horizontal" method="GET" action="{{ route('admin-shopping') }}">
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
                        $Products = App\Products::groupBy('productScale')->get();

                        foreach ($Products as $Product) {
                            ?>
                            <form class="form-horizontal" method="GET" action="{{ route('admin-shopping') }}">
                                <tr>
                                    <button style="font-size:small; text-align:left" class="form-control bg-light border-0 small" name="txt_keyword" type="submit" value="<?php echo $Product->productScale; ?>"><?php echo $Product->productScale; ?></button>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>
            <?php
            $id = Auth::user()->id;
            $employee = App\Employees::where('employeeNumber', '=', $id)->first();

            if ($employee->jobTitle == 'Sales Manager (NA)' || $employee->jobTitle == 'Sale Manager (EMEA)' || $employee->jobTitle == 'Sales Manager (APAC)' || $employee->jobTitle == 'Sales Rep' || strpos($employee->jobTitle, 'Sales') || $employee->jobTitle == 'President') {
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-stock') }}">
                        <i class="fas fa-archive"></i>
                        <span>Stock</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-order') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Order</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-payments') }}">
                        <i class="fas fa-credit-card"></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-member') }}">
                        <i class="fas fa-user-circle"></i>
                        <span>Member</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-ERM') }}">
                        <i class="fas fa-address-book"></i>
                        <span>ERM</span>
                    </a>
                </li>

            <?php
            }
            ?>

            <?php
            if (strpos($employee->jobTitle, 'Marketing') || $employee->jobTitle == 'President') {
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-marketing') }}">
                        <i class="fas fa-bullhorn"></i>
                        <span>Marketing</span>
                    </a>
                </li>

            <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
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
                            <div class="p-2 bd-highlight">
                                <?php
                                $id = Auth::user()->id;
                                $employee = App\Employees::where('employeeNumber', '=', $id)->first();
                                ?>
                                <?php echo $id; ?>
                                <?php echo $employee->firstName; ?>
                                <?php echo $employee->lastName; ?>
                                - <?php echo $employee->jobTitle; ?>
                            </div>
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
                                <form class="form-horizontal" method="GET" action="{{ route('admin-stock') }}">
                                    <div class="input-group-append">
                                        <input type="text" class="form-control bg-light border-0 small" name="txt_keyword" placeholder="Search... Product Code, Vendor or Scale" aria-label="Search" aria-describedby="basic-addon2">
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
                                        <div class="d-flex bd-highlight">
                                            <div class="flex-grow-1 bd-highlight">
                                                <a class="btn" href="{{ route('admin-stock-add') }}">
                                                    <i class="fas fa-archive"></i>
                                                    <span>Add Product</span>
                                                </a>
                                            </div>
                                            <!-- Show Status -->
                                            <div class="bd-highlight">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <a class="btn" href="{{ route('admin-stock-edit') }}">
                                                        <i class="fas fa-cog"></i>
                                                        <span>Edit Product</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @if(session('success'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{session('success')}}
                                        </div>
                                        @endif
                                        <tr align="center">
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Product Line</th>
                                            <th>Scale</th>
                                            <th>Vendor</th>
                                            <th width="40%">Description</th>
                                            <th>Quantity</th>
                                            <th>Buy Price</th>
                                            <th>MSRP</th>
                                            <th width="8%">Date</th>
                                            <th><i class="fas fa-archive"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $productss = App\Products::Where('productCode', 'like', '%' . $search_text . '%')
                                            ->orwhere('productVendor', 'like', '%' . $search_text . '%')
                                            ->orWhere('productScale', 'like', '%' . $search_text . '%')
                                            ->get();
                                        foreach ($productss as $products) {
                                            ?>
                                            <tr>
                                                <form action="/admin-stock-add/updateProducts" method="POST">
                                                    {{csrf_field()}}
                                                    <td align="center">
                                                        <?php echo $products->productCode; ?>
                                                        <input type="hidden" class="form-control bg-light border-0 small" id="productCode" placeholder="Product Code" name="productCode" value="<?php echo $products->productCode; ?>"><br>
                                                    </td>
                                                    <td align="center"><?php echo $products->productName; ?></td>
                                                    <td align="center"><?php echo $products->productLine; ?></td>
                                                    <td align="center"><?php echo $products->productScale; ?></td>
                                                    <td align="center"><?php echo $products->productVendor; ?></td>
                                                    <td><?php echo $products->productDescription; ?></td>
                                                    <td align="center">
                                                        <?php echo $products->quantityInStock; ?>
                                                        <input type="text" class="form-control bg-light border-0 small" id="quantityInStock" placeholder="" name="quantityInStock"><br>
                                                    </td>
                                                    <td align="center"><?php echo $products->buyPrice; ?></td>
                                                    <td align="center"><?php echo $products->MSRP; ?></td>
                                                    <td align="center"><?php echo $products->productDate; ?></td>
                                                    <td align="center">
                                                        <button class="btn" type="submit">
                                                            <i class="far fa-clipboard"></i>
                                                        </button>
                                                    </td>
                                                </form>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('index') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</html>