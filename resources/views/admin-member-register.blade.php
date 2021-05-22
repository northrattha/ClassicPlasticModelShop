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
            <form class="user" action="/admin-member-register/addMember" method="POST">
              {{csrf_field()}}
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Member</h1>
                  @if(session('success'))
                  <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('success')}}
                  </div>
                  @endif
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="customerNumber" placeholder="Customer Number" name="customerNumber"><br>
                  @if(session('successCustomerNumber'))
                  <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('successCustomerNumber')}}
                  </div>
                  @endif
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="customerName" placeholder="Company Name" name="customerName"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="contactFirstName" placeholder="First name" name="contactFirstName"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="contactLastName" placeholder="Last name" name="contactLastName"><br>
                </div>
                <div>
                  <input type="tel" class="form-control form-control-user" id="phone" placeholder="Phone" name="phone"><br>
                </div>
                <div>
                  <?php $id = Auth::user()->id; ?>
                  <input type="text" class="form-control form-control-user" id="salesRepEmployeeNumber" placeholder="Sales Rep" name="salesRepEmployeeNumber" value="<?php echo $id ?>"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="creditLimit" placeholder="Credit Limit" name="creditLimit"><br>
                </div>
                <p>ADDRESS</p>
                <hr>
                <div>
                  <input type="text" class="form-control form-control-user" id="addressLine1" placeholder="Address1" name="addressLine1"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="addressLine2" placeholder="Address2" name="addressLine2"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="city" placeholder="City" name="city"><br>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="state" placeholder="State" name="state"><br>
                  <div>
                    <input type="text" class="form-control form-control-user" id="country" placeholder="Country" name="country"><br>
                  </div>
                  <div>
                    <input type="text" class="form-control form-control-user" id="postalCode" placeholder="PostalCode" name="postalCode"><br>
                  </div>
                </div>
                <hr>
                <div>
                  <input type="submit" name="Add" class="btn btn-primary btn-user btn-block" value="SING UP">
                </div>
                <hr>

                <a href="{{ route('admin-member') }}" class="btn btn btn-user btn-block">BACK</a>

              </div>
            </form>

            <!-- <script>
              ///// onKeyUp="IsNumeric(this.value,this)"  /////
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
            </script> -->

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