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

    <link rel="stylesheet" href="css/app.css">
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
            <li class="nav-item">
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

            <?php
            }
            ?>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin-ERM') }}">
                    <i class="fas fa-address-book"></i>
                    <span>ERM</span>
                </a>
            </li>

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
                                <?php echo $employee->employeeNumber; ?>
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
                    <!-- DataTales Products -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <button class="btn btn-primary" style="collor" data-toggle="modal" data-target="#AddEmployeeModal">
                                            <i class="fas fa-plus-circle"></i><span> Add Employee</span>
                                        </button>
                                        <hr>
                                        @if(session('success'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            {{session('success')}}
                                        </div>
                                        @endif
                                        <tr align="center">
                                            <th>Employee Number</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Extension</th>
                                            <th>Email</th>
                                            <th>Office Code</th>
                                            <th>Job Title</th>
                                            <th>Edit</th>
                                            <th><i class="fas fa-user-minus"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $employee = App\Employees::where('reportsTo', $id)->get();
                                        $user = App\Employees::where('employeeNumber', '=', $id)->first();
                                        $offices = App\Offices::all();
                                        foreach ($employee as $employees) {
                                            ?>
                                            <tr align="center">
                                                <form class="user" action="{{ route('admin-ERM-editjob',$employees->employeeNumber) }}" method="GET">
                                                    <td>{{$employees->employeeNumber}}</td>
                                                    <td>{{$employees->firstName}}</td>
                                                    <td>{{$employees->lastName}}</td>
                                                    <td>{{$employees->extension}}</td>
                                                    <td>{{$employees->email}}</td>
                                                    <td>{{$employees->officeCode}}</td>
                                                    <td>{{$employees->jobTitle}} <br>

                                                        <select required id="change" name="jobTitle" class="form-control input-sm user">
                                                            <option class="text-center" selected disabled value="">
                                                                <h6>-- Select jobTitle --</h6>
                                                            </option>
                                                            @if($user->jobTitle =='President')
                                                            <option class="text-center" name="jobTitle" value="President">President</option>
                                                            <option class="text-center" name="jobTitle" value="VP Sales">VP Sales</option>
                                                            <option class="text-center" name="jobTitle" value="VP Marketing">VP Marketing</option>
                                                            @elseif($user->jobTitle =='VP Sales')
                                                            <option class="text-center" name="jobTitle" value="VP Sales">
                                                                <h6>VP Sales</h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="Sales Manager (NA)">
                                                                <h6>Sales Manager (NA)</h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="Sale Manager (EMEA)">
                                                                <h6>Sale Manager (EMEA)</h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="President">
                                                                <h6>Sales Manager (APAC) </h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                                <h6>Sales Rep</h6>
                                                            </option>
                                                            @elseif($user->jobTitle =='Sales Manager (APAC)')
                                                            <option class="text-center" name="jobTitle" value="Sales Manager (APAC)">
                                                                <h6>Sales Manager (APAC)</h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                                <h6>Sales Rep</h6>
                                                            </option>
                                                            @elseif($user->jobTitle =='Sale Manager (EMEA)')
                                                            <option class="text-center" name="jobTitle" value="Sale Manager (EMEA)">
                                                                <h6>Sale Manager (EMEA)</h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                                <h6>Sales Rep</h6>
                                                            </option>
                                                            @elseif($user->jobTitle =='Sales Manager (NA)')
                                                            <option class="text-center" name="jobTitle" value="Sales Manager (NA)">
                                                                <h6>Sales Manager (NA)</h6>
                                                            </option>
                                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                                <h6>Sales Rep</h6>
                                                            </option>
                                                            @else
                                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                                <h6>Sales Rep</h6>
                                                            </option>
                                                            @endif
                                                        </select>
                                                        <!-- </div> -->
                                                    </td>
                                                    <td><button class="btn " type="submit"><i class="fas fa-user-edit"></a></button></td>
                                                </form>
                                                <td><a class="btn" href="{{ route('admin-ERM-delete',$employees->employeeNumber)}}"><i class="fas fa-user-minus"></i></a></td>

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

    <!-- AddEmployee Modal-->
    <?php
    $employee = App\Employees::where('reportsTo', $id)->get();
    $user = App\Employees::where('employeeNumber', '=', $id)->first();
    $offices = App\Offices::all();

    ?>
    <div class="modal fade bd-example-modal-lg" id="AddEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                </div>
                <div class="modal-body">
                    <form class="user" action="{{ route('admin-ERM-addEmployee')}}" method="POST">
                        <div class="p-3 ">
                            <table class="table table-borderless" cellpadding="8" width="100%">
                                {{csrf_field()}}
                                <tr>
                                    <th><label>employeeNumber</label><input type="text" class="form-control form-control-user" id="exampleInputusernameid" placeholder="employeeNumber" name="employeeNumber" onKeyUp="IsNumeric(this.value,this)"> </th>
                                    <th><label>jobTitle</label>
                                        <select required id="jobtitle" name="jobTitle" class="form-control input-sm user">
                                            <option class="text-center" selected disabled value="">
                                                <h6>-- Select jobTitle --</h6>
                                            </option>
                                            @if($user->jobTitle =='President')
                                            <option class="text-center" name="jobTitle" value="President">President</option>
                                            <option class="text-center" name="jobTitle" value="VP Sales">VP Sales</option>
                                            <option class="text-center" name="jobTitle" value="VP Marketing">VP Marketing</option>
                                            @elseif($user->jobTitle =='VP Sales')
                                            <option class="text-center" name="jobTitle" value="VP Sales">
                                                <h6>VP Sales</h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="Sales Manager (NA)">
                                                <h6>Sales Manager (NA)</h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="Sale Manager (EMEA)">
                                                <h6>Sale Manager (EMEA)</h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="President">
                                                <h6>Sales Manager (APAC) </h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                <h6>Sales Rep</h6>
                                            </option>
                                            @elseif($user->jobTitle =='Sales Manager (APAC)')
                                            <option class="text-center" name="jobTitle" value="Sales Manager (APAC)">
                                                <h6>Sales Manager (APAC)</h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                <h6>Sales Rep</h6>
                                            </option>
                                            @elseif($user->jobTitle =='Sale Manager (EMEA)')
                                            <option class="text-center" name="jobTitle" value="Sale Manager (EMEA)">
                                                <h6>Sale Manager (EMEA)</h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                <h6>Sales Rep</h6>
                                            </option>
                                            @elseif($user->jobTitle =='Sales Manager (NA)')
                                            <option class="text-center" name="jobTitle" value="Sales Manager (NA)">
                                                <h6>Sales Manager (NA)</h6>
                                            </option>
                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                <h6>Sales Rep</h6>
                                            </option>
                                            @else
                                            <option class="text-center" name="jobTitle" value="Sales Rep">
                                                <h6>Sales Rep</h6>
                                            </option>
                                            @endif
                                        </select>

                                    </th>
                                </tr>
                                <tr>
                                    <th><label>firstName</label><input type="text" class="form-control form-control-user" id="exampleInputfirstName" placeholder="firstName" name="firstName"></th>
                                    <th><label>lastName</label><input type="text" class="form-control form-control-user" id="exampleInputlastName" placeholder="lastName" name="lastName"></th>
                                </tr>
                                <tr>
                                    <th><label>email</label><input type="text" class="form-control form-control-user" id="exampleInputfirstName" placeholder="email" name="email"></th>
                                    <th><label>officeCode</label>
                                        <select required id="ddlcolors" name="officeCode" class="form-control input-sm user">
                                            <option class="text-success" selected disabled value="">
                                                <h6>-- Select OfficeCode --</h6>
                                            </option>
                                            @foreach($offices as $office)
                                            <option class="text-center" name="officeCode" value="{{$office->officeCode}}">{{$office->officeCode}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th><label>reportsTo</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="reportsTo" name="reportsTo" value="{{$user->employeeNumber}}"><br></th>
                                    <th><label>extension</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="extension" name="extension"><br></th>
                                </tr>
                            </table>
                        </div>
                        <div width="70%">
                            <input type="submit" name="Add" class="btn btn-primary btn-user btn-block" value="Add">
                            <hr>
                            <a href="{{ route('admin-ERM') }}" class="btn btn-user btn-block">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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

    <script src="js/ERM.js"></script>

</html>