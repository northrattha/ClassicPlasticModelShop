<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" sizes="192x192" href="{{ asset('img/unicorn.png') }}">

    <title>Classic Plastic Model Shop</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" type='text/css' />


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
                        $productScales = App\Products::groupBy('productScale')->get();

                        foreach ($productScales as $productScale) {
                            ?>
                            <form class="form-horizontal" method="GET" action="{{ route('admin-shopping') }}">
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


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @foreach($details as $customer)
                <nav class="navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div style="padding: 0.75rem 0.5rem">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                Edit CustomerNumber : {{$customer->customerNumber}}
                            </div>
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
                @endforeach
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Products -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form class="user" action="{{ route('admin-member-edit',$customer->customerNumber)}}" method="POST">
                                <div class="p-3 ">
                                    @if(session('success'))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{session('success')}}
                                    </div>
                                    @endif
                                    <table class="table-bordless " cellpadding="8" width="100%">
                                        {{csrf_field()}}
                                        @foreach($details as $custumer)

                                        <tr>
                                            <th width="50%"><label>Company</label><input type="text" class="form-control form-control-user" id="exampleInputcompany" placeholder="Company" name="customerName" value="{{$custumer->customerName}}"></th>
                                            <th><label>Phone</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="Phone" name="phone" value="{{$custumer->phone}}"></th>
                                        </tr>
                                        <tr>
                                            <th><label>FirstName</label><input type="text" class="form-control form-control-user" id="exampleInputfirstName" placeholder="First name" name="contactFirstName" value="{{$custumer->contactFirstName}}"></th>
                                            <th><label>LastName</label><input type="text" class="form-control form-control-user" id="exampleInputlastName" placeholder="Last name" name="contactLastName" value="{{$custumer->contactLastName}}"></th>
                                        </tr>
                                        <tr>
                                            <th><label>salesRepEmployeeNumber</label><input type="text" class="form-control form-control-user" id="exampleInputaddressline1" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" value="{{$custumer->salesRepEmployeeNumber}}"></th>
                                            <th><label> creditLimit</label><input type="text" class="form-control form-control-user" id="exampleInputaddressline2" placeholder="creditLimit" name="creditLimit" value="{{$custumer->creditLimit}}"></th>
                                        </tr>
                                        <tr>
                                            <th><br>
                                                <h5 class="modal-title" id="exampleModalLabel">Main Address<a class="btn" style="collor" data-toggle="modal" data-target="#MultiAddressModal"><i class="fas fa-plus-circle" href="#"></i><span> Add Address</span></a>
                                                    <!-- </div> -->
                                                </h5>
                                            </th>
                                            <th></th>
                                        </tr><br>
                                        <tr>
                                            <th><label>AddessLine1</label><input type="text" class="form-control form-control-user" id="exampleInputaddressline1" placeholder="Address1" name="addressLine1" value="{{$custumer->addressLine1}}"></th>
                                            <th><label>AddressLine2</label><input type="text" class="form-control form-control-user" id="exampleInputaddressline2" placeholder="Address2" name="addressLine2" value="{{$custumer->addressLine2}}"></th>
                                        </tr>
                                        <tr>
                                            <th><label>City</label><input type="text" class="form-control form-control-user" id="exampleInputcity" placeholder="City" name="city" value="{{$custumer->city}}"></th>
                                            <th><label>State</label><input type="text" class="form-control form-control-user" id="exampleInputstate" placeholder="State" name="state" value="{{$custumer->state}}"></th>
                                        </tr>
                                        <tr>
                                            <th><label>PostalCode</label><input type="text" class="form-control form-control-user" id="exampleInputpostalCode" placeholder="PostalCode" name="postalCode" value="{{$custumer->postalCode}}"></th>
                                            <th><label>Country</label><input type="text" class="form-control form-control-user" id="exampleInputcountry" placeholder="Country" name="country" value="{{$custumer->country}}"></th>
                                        </tr>
                                        @endforeach
                                    </table><br><br>
                                    <div class="modal-footer"><button class="btn btn-primary" type="submit">SAVE</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Multi Address -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @if(session('successMulti'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{session('successMulti')}}
                            </div>
                            @endif
                            @foreach($multiAdds as $multiAdd)
                            <form class="user" method="POST">
                                <div class="p-3 ">
                                    <table class="table table-borderless" cellpadding="8" width="100%">
                                        {{csrf_field()}}
                                        <tr>
                                            <th width="50%">
                                                <h4> Address {{$i}}
                                                    <div class="btn-group" role="group" aria-label="Third Button Group">
                                                        <button type="submit" class="btn btn-primary" formaction="{{ route('admin-member-AddAddress-update',$multiAdd->addressNo)}}" method="POST"><i class="fas fa-cog"></i> SAVE</button>
                                                        <button type="submit" class="btn btn-primary" formaction="{{ route('admin-member-AddAddress-delete',$multiAdd->addressNo)}}" method="POST">DELETE</button>
                                                        <button type="submit" class="btn btn-primary" formaction="{{ route('admin-member-AddAddress-select',$multiAdd->addressNo)}}" method="POST">SELECT to Main</button>
                                                    </div>
                                                </h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th><label>AddressLine1</label><input type="text" class="form-control form-control-user" id="exampleInputusernameid" placeholder="AddressLine1" name="addressLine1" value="{{$multiAdd->addressLine1}}"> </th>
                                            <th><label>AddressLine2</label><input type="text" class="form-control form-control-user" id="exampleInputcompany" placeholder="AddressLine2" name="addressLine2" value="{{$multiAdd->addressLine2}}"></th>
                                        </tr>
                                        <tr>
                                            <th><label>City</label><input type="text" class="form-control form-control-user" id="exampleInputfirstName" placeholder="City" name="city" value="{{$multiAdd->city}}"></th>
                                            <th><label>State</label><input type="text" class="form-control form-control-user" id="exampleInputlastName" placeholder="State" name="state" value="{{$multiAdd->state}}"></th>
                                        </tr>
                                        <tr>
                                            <th><label>PostalCode</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="PostalCode" name="postalCode" value="{{$multiAdd->postalCode}}"><br></th>
                                            <th><label>Country</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="Country" name="country" value="{{$multiAdd->country}}"><br></th>
                                        </tr>

                                        <?php $i++; ?>
                                    </table>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- MultiAddress Modal-->
                <div class="modal fade bd-example-modal-lg" id="MultiAddressModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="{{ route('admin-member-AddAddress',$customer->customerNumber)}}" method="POST">
                                    <div class="p-3 ">
                                        <table class="table table-borderless" cellpadding="8" width="100%">
                                            {{csrf_field()}}
                                            <tr>
                                                <th><label>AddressLine1</label><input type="text" class="form-control form-control-user" id="exampleInputusernameid" placeholder="AddressLine1" name="addressLine1" onKeyUp="IsNumeric(this.value,this)"> </th>
                                                <th><label>AddressLine2</label><input type="text" class="form-control form-control-user" id="exampleInputcompany" placeholder="AddressLine2" name="addressLine2"></th>
                                            </tr>
                                            <tr>
                                                <th><label>City</label><input type="text" class="form-control form-control-user" id="exampleInputfirstName" placeholder="City" name="city"></th>
                                                <th><label>State</label><input type="text" class="form-control form-control-user" id="exampleInputlastName" placeholder="State" name="state"></th>
                                            </tr>
                                            <tr>
                                                <th><label>PostalCode</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="PostalCode" name="postalCode"><br></th>
                                                <th><label>Country</label><input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="Country" name="country"><br></th>
                                            </tr>
                                        </table>
                                    </div>

                                    <div width="70%">
                                        <input type="submit" name="Add" class="btn btn-primary btn-user btn-block" value="Add">
                                        <hr>
                                        <a href="{{ route('admin-member') }}" class="btn btn-user btn-block">BACK</a>
                                    </div>
                                </form>
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
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


</html>