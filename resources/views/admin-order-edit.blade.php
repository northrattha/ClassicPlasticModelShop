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
                    <!-- <div class="card shadow mb-4">
                        <div class="card-body" style="margin: -0.25rem;">
                            <div class="table-responsive">
                                <form class="form-horizontal" method="GET" action="{{ route('admin-order') }}">
                                    <div class="input-group-append">
                                        <input type="text" class="form-control bg-light border-0 small" name="txt_keyword" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->

                    <?php $search_text = isset($_GET['txt_keyword']) ? $_GET['txt_keyword'] : ''; ?>

                    <!-- DataTales Products -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <div class="d-flex bd-highlight">
                                            <div class="p-2 flex-grow-1 bd-highlight">
                                                <!-- <a class="btn" href="{{ route('admin-order') }}"> -->
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>Order Number - <?php echo $search_text; ?></span>
                                                <!-- </a> -->
                                            </div>
                                            <!-- Show Total -->
                                            <?php
                                            date_default_timezone_set('Asia/Bangkok');
                                            $totals = App\Ordersdetails::where('orderNumber', 'like', '%' . $search_text . '%')->get();
                                            $Promotions = App\Promotions::get();
                                            $sumTotal = 0;
                                            foreach ($totals as $total) {
                                                $sumTotal += $total->quantityOrdered * $total->priceEach;
                                                foreach ($Promotions as $Promotion) {
                                                    if ($Promotion->productCode == $total->productCode && $Promotion->expiryDate >= date('Y-m-d')) {
                                                        $sumTotal -= $total->priceEach;
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <div class="p-2 bd-highlight">Total <?php echo $sumTotal; ?></div>
                                        </div>
                                        <hr>
                                        <tr align="center">
                                            <th>Order Number</th>
                                            <th>Order Date</th>
                                            <th>Required Date</th>
                                            <th>Shipped Date</th>
                                            <th>Status</th>
                                            <th>Comments</th>
                                            <th>Customer Number</th>
                                            <th><i class="fas fa-file-alt"></i></th>
                                        </tr>
                                        @if(session('success'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{session('success')}}
                                        </div>
                                        @endif
                                    </thead>
                                    <tbody>
                                        <form action="/admin-order-edit/editOrder" method="POST">
                                            {{csrf_field()}}
                                            <?php
                                            $Orderss = App\Orders::where('orderNumber', 'like', '%' . $search_text . '%')->get();
                                            foreach ($Orderss as $Orders) {
                                                ?>
                                                <tr>
                                                    <td align="center"><?php echo $Orders->orderNumber; ?>
                                                        <div>
                                                            <input type="hidden" class="form-control bg-light border-0 small" id="orderNumber" placeholder="Order Number" name="orderNumber" value="<?php echo $Orders->orderNumber; ?>"><br>
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $Orders->orderDate; ?>
                                                        <input type="hidden" class="form-control bg-light border-0 small" id="orderDate" placeholder="Order Date" name="orderDate" value="<?php echo $Orders->orderDate; ?>"><br>
                                                    </td>
                                                    <td align="center"><?php echo $Orders->requiredDate; ?></td>

                                                    <?php if ($Orders->status != 'Cancelled' && $Orders->status != 'Resolved') { ?>
                                                        <td align="center">
                                                            <div>
                                                                <input type="text" class="form-control bg-light border-0 small" id="shippedDate" placeholder="Shipped Date (Y-m-d)" name="shippedDate" value="<?php echo $Orders->shippedDate; ?>"><br>
                                                            </div>
                                                        </td>
                                                    <?php
                                                        } else { ?>
                                                        <td align="center"><?php echo $Orders->shippedDate; ?></td>
                                                    <?php
                                                        }
                                                        ?>

                                                    <?php if ($Orders->status != 'Cancelled' && $Orders->status != 'Resolved') { ?>
                                                        <td align="center">
                                                            <select id="selectStatus" class="selectpicker form-control bg-light border-0 small" data-live-search="true" title="Status" name="selectStatus" OnChange="bind()">

                                                                <option value="<?php echo $Orders->status; ?>"><?php echo $Orders->status; ?></option>

                                                                <option value="Cancelled">Cancelled</option>

                                                                <?php if ($Orders->status != 'Disputed' && $Orders->status != 'On Hold' && $Orders->status != 'In Process') { ?>
                                                                    <option value="Disputed">Disputed</option>
                                                                <?php
                                                                        }
                                                                        ?>
                                                                <?php if ($Orders->status != 'On Hold' && $Orders->status != 'Disputed' && $Orders->status != 'Shipped') { ?>
                                                                    <option value="On Hold">On Hold</option>
                                                                <?php
                                                                        }
                                                                        ?>
                                                                <?php if ($Orders->status != 'Resolved' && $Orders->status != 'In Process' && $Orders->status != 'On Hold' && $Orders->status != 'Shipped') { ?>
                                                                    <option value="Resolved">Resolved</option>
                                                                <?php
                                                                        }
                                                                        ?>
                                                                <?php if ($Orders->status != 'Shipped' && $Orders->status != 'Disputed') { ?>
                                                                    <option value="Shipped">Shipped</option>
                                                                <?php
                                                                        }
                                                                        ?>

                                                            </select>

                                                            <script language="javascript">
                                                                function bind() {
                                                                    document.getElementById("status").value = document.getElementById("selectStatus").value;
                                                                }
                                                            </script>

                                                            <input type="hidden" class="form-control bg-light border-0 small" id="status" placeholder="Status" name="status"><br>

                                                        </td>

                                                    <?php
                                                        } else { ?>
                                                        <td align="center"><?php echo $Orders->status; ?></td>
                                                    <?php
                                                        }
                                                        ?>

                                                    <?php if ($Orders->status != 'Cancelled' && $Orders->status != 'Resolved') { ?>
                                                        <td align="center">
                                                            <div>
                                                                <input type="text" class="form-control bg-light border-0 small" id="comments" placeholder="Comments" name="comments" value="<?php echo $Orders->comments; ?>"><br>
                                                            </div>
                                                        </td>

                                                    <?php
                                                        } else { ?>
                                                        <td align="center"><?php echo $Orders->comments; ?></td>
                                                    <?php
                                                        }
                                                        ?>

                                                    <td align="center">
                                                        <?php echo $Orders->customerNumber; ?>
                                                        <input type="hidden" class="form-control bg-light border-0 small" id="customerNumber" placeholder="Customer Number" name="customerNumber" value="<?php echo $Orders->customerNumber; ?>"><br>

                                                        <!-- Show Points -->
                                                        <?php
                                                            $Orders = App\Orders::where('orderNumber', 'like', '%' . $search_text . '%')->first();
                                                            $Points = App\Ordersdetails::where('orderNumber', 'like', '%' . $search_text . '%')->get();
                                                            $sumPoint = 0;
                                                            foreach ($Points as $Point) {
                                                                $sumPoint += $Point->quantityOrdered * $Point->priceEach;
                                                            }
                                                            $sumPoint *= 0.03;
                                                            ?>
                                                        <input type="hidden" class="form-control bg-light border-0 small" id="points" placeholder="Points" name="points" value="<?php echo intval($sumPoint); ?>"><br>
                                                    </td>

                                                    <?php if ($Orders->status != 'Cancelled' && $Orders->status != 'Resolved') { ?>

                                                        <td align="center">
                                                            <button class="btn" type="submit">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </td>

                                                    <?php
                                                        } else { ?>
                                                        <td align="center"></td>
                                                    <?php
                                                        }
                                                        ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <div class="p-1 d-flex bd-highlight">
                                        <div class="flex-grow-1 bd-highlight">
                                            <i class="fas fa-truck"></i>
                                            <span>Shipping Address -
                                                <?php
                                                $Orders = App\Orders::where('orderNumber', 'like', '%' . $search_text . '%')->first();
                                                echo $Orders->shippingAddress;
                                                ?></span>
                                        </div>
                                    </div>
                                    <div class="p-1 d-flex bd-highlight">
                                        <div class="flex-grow-1 bd-highlight">
                                            <i class="fas fa-money-check-alt"></i>
                                            <span>Billing Address -
                                                <?php
                                                $Orders = App\Orders::where('orderNumber', 'like', '%' . $search_text . '%')->first();
                                                echo $Orders->billingAddress;
                                                ?></span>
                                        </div>
                                    </div>
                                    <thead>
                                        <hr>
                                        <tr align="center">
                                            <th>Order Number</th>
                                            <th>Product Code</th>
                                            <th>Quantity Ordered</th>
                                            <th>Price Each</th>
                                            <th>Order Line Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Ordersdetailss = App\Ordersdetails::where('orderNumber', 'like', '%' . $search_text . '%')
                                            ->orderBy('orderLineNumber')
                                            ->get();
                                        foreach ($Ordersdetailss as $Ordersdetails) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $Ordersdetails->orderNumber; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->productCode; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->quantityOrdered; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->priceEach; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->orderLineNumber; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight"></div>
                                    <!-- Show Points -->
                                    <?php
                                    $Orders = App\Orders::where('orderNumber', 'like', '%' . $search_text . '%')->first();
                                    if (($Orders->status != 'Cancelled' || $Orders->shippedDate != '') && $Orders->status != 'In Process' && $Orders->status != 'On Hold' && $Orders->orderDate >= '2019-12-10') {
                                        $Points = App\Ordersdetails::where('orderNumber', 'like', '%' . $search_text . '%')->get();
                                        $sumPoint = 0;
                                        foreach ($Points as $Point) {
                                            $sumPoint += $Point->quantityOrdered * $Point->priceEach;
                                        }
                                        $sumPoint *= 0.03;
                                        ?>
                                        <div class="p-2 bd-highlight">Points <?php echo intval($sumPoint); ?></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight"></div>
                                    <!-- Show Total Points -->
                                    <?php
                                    $Orders = App\Orders::where('orderNumber', 'like', '%' . $search_text . '%')->first();
                                    $Customers = App\Customers::where('customerNumber', 'like', $Orders->customerNumber)->first();
                                    if ($Customers->points == NULL) $Points = 0;
                                    else $Points = $Customers->points;
                                    if (($Orders->status != 'Cancelled' || $Orders->shippedDate != '') && $Orders->status != 'In Process' && $Orders->status != 'On Hold' && $Orders->orderDate >= '2019-12-10') {
                                        ?>
                                        <div class="p-2 bd-highlight"><?php echo $Orders->customerNumber; ?> Total Points <?php echo $Points; ?></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
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