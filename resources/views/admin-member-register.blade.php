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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <form class="user" action="{{ route('admin-member-register') }}" method="GET">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Member</h1>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputusernameid" placeholder="User ID" name="customerNumber" onKeyUp="IsNumeric(this.value,this)"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputcompany" placeholder="Company" name="customerName"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputfirstName" placeholder="First name" name="contactFirstName"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputlastName" placeholder="Last name" name="contactLastName"><br>
                </div>
                <div>
                  <input type="tel" class="form-control form-control-user" id="exampleInputphone" placeholder="Phone" name="phone"><br>
                </div>
                <!-- <div> -->
                <!-- <input type="text" class="form-control form-control-user" id="exampleInputsaleRep" placeholder="Sales Rep" name="salesRepEmployeeNumber" onKeyUp="IsNumeric(this.value,this)"><br> -->
                <!-- </div> -->
                <p>ADDRESS</p>
                <hr>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputaddressline1" placeholder="Address1" name="addressLine1"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputaddressline2" placeholder="Address2" name="addressLine2"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputcity" placeholder="City" name="city"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputstate" placeholder="State" name="state"><br>
                  <div>
                    <input type="text" class="form-control form-control-user" id="exampleInputcountry" placeholder="Country" name="country"><br>
                  </div>
                  <div>
                    <input type="text" class="form-control form-control-user" id="exampleInputpostalCode" placeholder="PostalCode" name="postalCode"><br>
                  </div>
                </div>
                <hr>
                <div>
                  <input type="submit" name="Add" href="{{ route('admin-member-register') }}" class="btn btn-primary btn-user btn-block" value="SING UP">
                </div>
                <hr>

                <a href="{{ route('admin-member') }}" class="btn btn btn-user btn-block">BACK</a>

              </div>
            </form>

            <script>
              function IsNumeric(sText, obj) {
                var ValidChars = "0123456789";
                var IsNumber = true;
                var Char;
                for (i = 0; i < sText.length && IsNumber == true; i++) {
                  Char = sText.charAt(i);
                  if (ValidChars.indexOf(Char) == -1) {
                    IsNumber = false;
                  }
                }
                if (IsNumber == false) {
                  alert("Only numberic value");
                  obj.value = sText.substr(0, sText.length - 1);
                }
              }
            </script>

            <?php
            $id = Auth::user()->id;
            $data = [
              'customerNumber' => isset($_GET['customerNumber']) ? $_GET['customerNumber'] : '',
              'customerName' =>   isset($_GET['customerName']) ? $_GET['customerName'] : '',
              'contactLastName' =>  isset($_GET['contactLastName']) ? $_GET['contactLastName'] : '',
              'contactFirstName' =>  isset($_GET['contactFirstName']) ? $_GET['contactFirstName'] : '',
              'phone' =>  isset($_GET['phone']) ? $_GET['phone'] : '',
              'addressLine1' =>  isset($_GET['addressLine1']) ? $_GET['addressLine1'] : '',
              'addressLine2' =>  isset($_GET['addressLine2']) ? $_GET['addressLine2'] : '',
              'city' =>  isset($_GET['city']) ? $_GET['city'] : '',
              'state' =>  isset($_GET['state']) ? $_GET['state'] : '',
              'postalCode' =>  isset($_GET['postalCode']) ? $_GET['postalCode'] : '',
              'country' =>  isset($_GET['country']) ? $_GET['country'] : '',
              'salesRepEmployeeNumber' =>  $id,
              'creditLimit' => 0.0,
            ];
            if (
              $data['customerNumber'] != ''
              // $data['customerName'] != '' &&
              // $data['contactLastName'] != '' &&
              // $data['contactFirstName'] != '' &&
              // $data['phone'] != '' &&
              // $data['addressLine1'] != '' &&
              // $data['city'] != '' &&
              // $data['postalCode'] != '' &&
              // $data['country'] != ''
            ) {
              $customers = App\Customers::insert($data);
            }
            ?>

          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="{{ route('admin-member') }}">Logout</a>
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

</body>

</html>