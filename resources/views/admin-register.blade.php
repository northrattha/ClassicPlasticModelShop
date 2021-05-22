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
            <form class="user" action="/login/addEmp" method="POST">
              {{csrf_field()}}
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Admin Register</h1>
                </div>
                <div>
                  <input type="text" class="form-control form-control-user" id="exampleInputusernameid" placeholder="Employee Number" name="id" onKeyUp="IsNumeric(this.value,this)"><br>
                  @if(session('success'))
                  <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('success')}}
                  </div>
                  @endif
                </div>
                <div>
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password"><br>
                  @if(session('successPassword'))
                  <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('successPassword')}}
                  </div>
                  @endif
                </div>
                <div>
                  <input type="submit" name="Add" class="btn btn-primary btn-user btn-block" value="SING UP">
                </div>
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

          </div>
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