<?php
require 'db/connect.php';
session_start();
session_destroy();
?>

<?php

$error = 0;
if(isset($_GET['error'])){
  $error = $_GET['error'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Houseware Repairing | Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-white">
<br>
<br>
<br>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
    <div class="card-header"><center><img src="images/logo1.png"></div>
      <div class="card-body">
           <?php if($error == 1): ?>
        <div class="alert alert-danger" role="alert">
          <i class="glyphicon glyphicon-alert"></i> รอการอนุมัติจากผู้ดูแลระบบ!
        </div>
        <?php endif; ?>
        <form method="post" action="check_log.php">
        <br>
          <div class="form-gr  oup">
            <div class="form-label-group">
              <input type="text" name="Username" id="Username" class="form-control" placeholder="Username" required="required"  >
              <label for="Username">ชื่อผู้ใช้</label>
            </div>
          </div>
          <br>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="Password" id="Password" class="form-control" placeholder="Password" required="required">
              <label for="Password">รหัสผ่าน</label>
            </div>
          </div>
          <br>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
             จำรหัสผ่าน
              </label>
            </div>
          </div>
          <button type="submit" name="submit" value="login" class="btn btn-warning btn-block">เข้าสู่ระบบ</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="#">สมัครสมาชิก</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
                      <a class="d-block small" href="index.php">หน้าแรก</a>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
