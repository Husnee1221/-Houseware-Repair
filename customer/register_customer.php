<?php
include('../db/connect.php');
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Houseware Repairing | Login</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-white">
<br>
<div class="card-heading">
  <div class="container">
    <div class="card card-register mx-auto mt-15">
    <div class="card-header"><center><img src="../images/logo1.png"></div>
      <div class="card-body">
    
        <form method="post" action="checkregister_cus.php">
        <br>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="cusUsername">ชื่อผู้ใช้</label>
                  <input type="text" name="cusUsername" id="cusUsername" class="form-control" onblur="checkText();" autofocus  autocomplete="off">
                  </div>
                  <div class="col-md-6">
                  <label for="cusName">ชื่อ-นามสกุล</label>
                  <input type="text" name="cusName" id="cusName" class="form-control"  autocomplete="off">
                  </div>
                 </div>
                 <div class="form-group row">
                 <div class="col-md-12">
                 <div class="cusAddress">ที่อยู่</div>
                 <input  type="text" class="form-control"name="cusAddress" id="cusAddress" Required>
                 </div>
                </div>
                <div class="form-group row">
                 <div class="col-md-12">
                <div class="cusEmail">อีเมล</div> 
                <input  type="email" name="cusEmail" id="cusEmail" class="form-control" Required>
                </div>
                </div>         
                <div class="form-group row">
                <div class="col-md-12">
                <div class="cusPhone">เบอร์โทรศัพท์</div>
                <div class="input-group">
                <input  type="text" name="cusPhone"  id="cusPhone" value="" class="form-control" minlength="10" maxlength="10" Required>
                </div>
                </div>
                </div>
                <div class="form-group row">
                 <div class="col-md-12">
                  <div class="cusPassword">รหัสผ่าน</div>
                  <div class="input-group">
                  <input  type="password" name="cusPassword" id="cusPassword" class="form-control"  minlength="6" maxlength="10" Required>
                  </div>
                  </div> 
                  </div>
                  <select class="form-control" name="cusStatus" id="cusStatus" hidden>
                  <option value="customer">Customer</option>
                  </select>
          <br>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" >
                จำรหัสผ่าน
              </label>
            </div>
         
          <button  type="submit" name="submit" class="btn btn-block btn-warning ">สมัครสมาชิก</button>
        </form>
        <div class="text-center" >
          <a class="d-block  small mt-3" href="../login.php">เข้าสู่ระบบ</a>
          <!-- <a class="d-block small" href="forgot-password.html">ลืมรหัส?</a> -->
            <a class="d-block small" href="../index.php">หน้าแรก</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/global.js"></script>


  <script type="text/javascript">
  function checkText()
	{
	var elem = document.getElementById('cusUsername').value;
	if(!elem.match(/^([a-z0-9\_])+$/i))
  {
	alert("กรอกได้เฉพาะ A-Z, 0-9 และ ( _ )underscore");
	document.getElementById('cusUsername').value = "";
	}
	}
  </script>                                    

</body>

</html>