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

    <!-- bootstrap-select -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

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
                                                <?php
                                                $Orders = App\Orders::orderBy('orderNumber', 'desc')->first();

                                                $orderNumberNew = $Orders->orderNumber;
                                                ?>
                                                <span>Order Number - <?php echo $Orders->orderNumber; ?></span>
                                                <!-- </a> -->
                                            </div>
                                        </div>
                                        <hr>
                                        <tr align="center">
                                            <th>Order Number</th>
                                            <th>Order Date</th>
                                            <th>Required Date</th>
                                            <!-- <th>Shipped Date</th> -->
                                            <th>Status</th>
                                            <th>Comments</th>
                                            <th>Customer Number</th>
                                            <!-- <th><i class="fas fa-file-alt"></i></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Orderss = App\Orders::where('orderNumber', 'like', '%' . $Orders->orderNumber . '%')
                                            ->get();
                                        foreach ($Orderss as $Orders) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $Orders->orderNumber; ?></td>
                                                <td align="center"><?php echo $Orders->orderDate; ?></td>
                                                <td align="center"><?php echo $Orders->requiredDate; ?></td>
                                                <!-- <td align="center"><?php echo $Orders->shippedDate; ?></td> -->
                                                <td align="center"><?php echo $Orders->status; ?></td>
                                                <td align="center"><?php echo $Orders->comments; ?></td>
                                                <td align="center"><?php echo $Orders->customerNumber; ?></td>
                                                <!-- <td align="center">
                                                    <form class="form-horizontal" method="GET" action="{{ route('admin-order-detail') }}">
                                                        <button style="text-align:center" class="btn" name="txt_keyword" type="submit" value="<?php echo $Orders->orderNumber; ?>"><i class="fas fa-edit"></i></button>
                                                    </form>
                                                </td> -->
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <div class="p-1 d-flex bd-highlight">
                                            <div class="flex-grow-1 bd-highlight">
                                                <i class="fas fa-truck"></i>
                                                <span>Shipping Address -
                                                    <?php
                                                    $Orders = App\Orders::where('orderNumber', 'like', '%' . $orderNumberNew . '%')->first();
                                                    if ($Orders->shippingAddress != '') {
                                                        echo $Orders->shippingAddress;
                                                    } else {
                                                        echo 'Please select your address.';
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form action="/admin-order-detail-add/addShippingAddress" method="POST">
                                                {{csrf_field()}}
                                                <td align="center">
                                                    <?php
                                                    $Orders = App\Orders::where('orderNumber', 'like', '%' . $orderNumberNew . '%')->first();
                                                    $customerNumberID = $Orders->customerNumber;
                                                    ?>
                                                    <select id="selectShippingAddress" class="selectpicker form-control bg-light border-0 small" data-live-search="false" title="Address" name="selectShippingAddress" OnChange="bindShippingAddress()">
                                                        <?php
                                                        $addressCustomers = App\Customers::where('customerNumber', 'like', '%' . $customerNumberID . '%')->first();
                                                        $show =  $addressCustomers->addressLine1 . ' ' . $addressCustomers->addressLine2 . ' ' . $addressCustomers->city . ' ' . $addressCustomers->state . ' ' . $addressCustomers->postalCode . ' ' . $addressCustomers->country;
                                                        ?>
                                                        <option value="<?php echo $show; ?>"><?php echo $show; ?></option>
                                                        <?php
                                                        $multipleAddressCustomers = App\MultipleAddress::where('customerNumber', 'like', '%' . $customerNumberID . '%')->get();
                                                        foreach ($multipleAddressCustomers as $multipleAddressCustomer) {
                                                            $shows =  $multipleAddressCustomer->addressLine1 . ' ' . $multipleAddressCustomer->addressLine2 . ' ' . $multipleAddressCustomer->city . ' ' . $multipleAddressCustomer->state . ' ' . $multipleAddressCustomer->postalCode . ' ' . $multipleAddressCustomer->country;
                                                            ?>
                                                            <option value="<?php echo $shows; ?>"><?php echo $shows; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                    <script language="javascript">
                                                        function bindShippingAddress() {
                                                            document.getElementById("shippingAddress").value = document.getElementById("selectShippingAddress").value;
                                                        }
                                                    </script>

                                                    <input type="hidden" class="form-control bg-light border-0 small" id="orderNumber" placeholder="Order Number" name="orderNumber" value="<?php echo $orderNumberNew; ?>"><br>
                                                    <input type="hidden" class="form-control bg-light border-0 small" id="shippingAddress" placeholder="Shipping Address" name="shippingAddress"><br>

                                                </td>
                                                <td width="1%">
                                                    <button class="btn" type="submit">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <div class="p-1 d-flex bd-highlight">
                                            <div class="flex-grow-1 bd-highlight">
                                                <i class="fas fa-money-check-alt"></i>
                                                <span>Billing Address -
                                                    <?php
                                                    $Orders = App\Orders::where('orderNumber', 'like', '%' . $orderNumberNew . '%')->first();
                                                    if ($Orders->billingAddress != '') {
                                                        echo $Orders->billingAddress;
                                                    } else {
                                                        echo 'Please select your address.';
                                                    }
                                                    ?></span>
                                            </div>
                                        </div>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form action="/admin-order-detail-add/addBillingAddress" method="POST">
                                                {{csrf_field()}}
                                                <td align="center">
                                                    <?php
                                                    $Orders = App\Orders::where('orderNumber', 'like', '%' . $orderNumberNew . '%')->first();
                                                    $customerNumberID = $Orders->customerNumber;
                                                    ?>
                                                    <select id="selectBillingAddress" class="selectpicker form-control bg-light border-0 small" data-live-search="false" title="Address" name="selectBillingAddress" OnChange="bindBillingAddress()">
                                                        <?php
                                                        $addressCustomers = App\Customers::where('customerNumber', 'like', '%' . $customerNumberID . '%')->first();
                                                        $show =  $addressCustomers->addressLine1 . ' ' . $addressCustomers->addressLine2 . ' ' . $addressCustomers->city . ' ' . $addressCustomers->state . ' ' . $addressCustomers->postalCode . ' ' . $addressCustomers->country;
                                                        ?>
                                                        <option value="<?php echo $show; ?>"><?php echo $show; ?></option>
                                                        <?php
                                                        $multipleAddressCustomers = App\MultipleAddress::where('customerNumber', 'like', '%' . $customerNumberID . '%')->get();
                                                        foreach ($multipleAddressCustomers as $multipleAddressCustomer) {
                                                            $shows =  $multipleAddressCustomer->addressLine1 . ' ' . $multipleAddressCustomer->addressLine2 . ' ' . $multipleAddressCustomer->city . ' ' . $multipleAddressCustomer->state . ' ' . $multipleAddressCustomer->postalCode . ' ' . $multipleAddressCustomer->country;
                                                            ?>
                                                            <option value="<?php echo $shows; ?>"><?php echo $shows; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                    <script language="javascript">
                                                        function bindBillingAddress() {
                                                            document.getElementById("billingAddress").value = document.getElementById("selectBillingAddress").value;
                                                        }
                                                    </script>

                                                    <input type="hidden" class="form-control bg-light border-0 small" id="orderNumber" placeholder="Order Number" name="orderNumber" value="<?php echo $orderNumberNew; ?>"><br>
                                                    <input type="hidden" class="form-control bg-light border-0 small" id="billingAddress" placeholder="Billing Address" name="billingAddress"><br>

                                                </td>
                                                <td width="1%">
                                                    <button class="btn" type="submit">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <div class="d-flex bd-highlight">
                                            <div class="p-2 flex-grow-1 bd-highlight">
                                                <!-- <a class="btn" href="{{ route('admin-order-add') }}"> -->
                                                <i class="fas fa-cart-plus"></i>
                                                <span>Add Orders Detail</span>
                                                <!-- </a> -->
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
                                            <th width="10%">Order Line Number</th>
                                            <th>Product Code</th>
                                            <th>Quantity Ordered</th>
                                            <th width="10%">Price Each</th>
                                            <th width="1%">Confirm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Ordersdetailss = App\Ordersdetails::where('orderNumber', 'like', '%' . $Orders->orderNumber . '%')
                                            ->orderBy('orderLineNumber')
                                            ->get();
                                        foreach ($Ordersdetailss as $Ordersdetails) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $Ordersdetails->orderLineNumber; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->productCode; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->quantityOrdered; ?></td>
                                                <td align="center"><?php echo $Ordersdetails->priceEach; ?></td>
                                                <td align="center"></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <form action="/admin-order-detail-add/addOrderdetails" method="POST">
                                            {{csrf_field()}}
                                            <td align="center">
                                                <?php
                                                $Ordersdetails = App\Ordersdetails::where('orderNumber', 'like', '%' . $orderNumberNew . '%')
                                                    ->orderBy('orderLineNumber', 'desc')->first();
                                                if ($Ordersdetails != NULL) $orderLineNumber = $Ordersdetails->orderLineNumber + 1;
                                                else $orderLineNumber = 1;
                                                echo $orderLineNumber;
                                                ?>
                                                <div>
                                                    <input type="hidden" class="form-control bg-light border-0 small" id="orderNumber" placeholder="Order Number" name="orderNumber" value="<?php echo $orderNumberNew; ?>"><br>
                                                </div>
                                                <div>
                                                    <input type="hidden" class="form-control bg-light border-0 small" id="orderLineNumber" placeholder="Order Line Number" name="orderLineNumber" value="<?php echo $orderLineNumber; ?>"><br>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <!-- <form method="POST" action=""> -->
                                                <select id="selectProductCode" class="selectpicker form-control bg-light border-0 small" data-live-search="true" title="Product Code" name="selectProductCode" OnChange="bind()">
                                                    <?php
                                                    $productss = App\Products::get();
                                                    foreach ($productss as $products) {
                                                        ?>
                                                        <option value="<?php echo $products->productCode; ?>"><?php echo $products->productCode; ?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                                <script language="javascript">
                                                    function bind() {
                                                        document.getElementById("productCode").value = document.getElementById("selectProductCode").value;
                                                    }
                                                </script>

                                                <input type="hidden" class="form-control bg-light border-0 small" id="productCode" placeholder="Product Code" name="productCode"><br>
                                                <!-- </form> -->
                                            </td>
                                            <td align="center">
                                                <div>
                                                    <input type="text" class="form-control bg-light border-0 small" id="quantityOrdered" placeholder="Quantity Ordered (Integer Only)" name="quantityOrdered"><br>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div>
                                                    <input type="text" class="form-control bg-light border-0 small" id="priceEach" placeholder="Price Each" name="priceEach"><br>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <button class="btn" type="submit">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </td>
                                        </form>
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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- bootstrap-select -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-select.js"></script>

</html>