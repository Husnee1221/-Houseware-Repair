<?php
session_start();
if($_SESSION['id']==""){

echo "Please Login!";
exit(); 
} 
  $sessionlifetime = 30; //กำหนดเป็นนาที
  if(isset($_SESSION["timeLasetdActive"])){
    $seclogin = (time()-$_SESSION["timeLasetdActive"])/60;
    //หากไม่ได้ Active ในเวลาที่กำหนด
    if($seclogin>$sessionlifetime){
      //goto logout page
      header("location:logout.php");
      exit;
    }else{
      $_SESSION["timeLasetdActive"] = time();
    }
  }else{
    $_SESSION["timeLasetdActive"] = time();
  }
  //
  //*** Get User Login
  require '../db/connect.php';

  mysql_connect("localhost","root","");
  mysql_select_db("hwrp");
 $strSQL = "SELECT * FROM customers WHERE cusID = '".$_SESSION['id']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery); 
?>

<!DOCTYPE html>



<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Housewares Repairing | Customer Home</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="cus_home.php"> Housewares Repairing </a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
          aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
      <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle active" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $objResult["cusName"]; ?></span> 
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">โปรไฟล์ของฉัน</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
        </div>
        </li>
        </ul>
        </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="cus_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>&nbsp;หน้าแรก</span>
        </a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" href="inform_repair.php">
        <i class="fas fa-fw fa-clock"></i>
          <span>แจ้งซ่อม</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="informhistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>&nbsp;ประวัติการแจ้งซ่อม</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="payment.php">
          <i class="fas fa-fw fa-clone"></i>
          <span>&nbsp;การชำระเงิน</span></a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>&nbsp;โปรไฟล์ของฉัน</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>&nbsp;การตั้งค่า</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">หน้าจอเข้าสู่ระบบ:</h6>
          <a class="dropdown-item" href="customer/login.php">เข้าสู่ระบบ</a>
          <a class="dropdown-item" href="#">ลืมรหัสผ่าน</a>
          <div class="dropdown-divider"></div>
          </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="review.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>&nbsp; รีวิว</span></a>
          </li> -->
          <li class="nav-item">
          <a class="nav-link" href="logout.php" class="dropdown-item" href="#" data-toggle="modal"data-target="#logoutModal">
          <i class="fas fa-fw fa-times "></i>
          <span>&nbsp;ออกจากระบบ</span></a>
          </li>
          </ul>
          </nav>
          <div id="content-wrapper">
          <div class="container-fluid">
<!-- Breadcrumbs-->
          <br>
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="cus_home.php">Payment</a>
          </li>
          <li class="breadcrumb-item active">การชำระเงิน</li>
          </ol>
  <!-- /#wrapper -->
                      <?php
                      include('../db/connect.php');
                      $strSQL = "SELECT * FROM report_tech WHERE id_re='".$_SESSION["id"]."'"; 
                      $objQuery = mysql_query($strSQL);
                      $objResult = mysql_fetch_array($objQuery);
                      ?>
                        <div id="wrapper">
                        <div id="content-wrapper">
                        <div class="container-fluid">
                        <div class="card mb-3">
                        <div class="card-header">
                        <i class="fas fa-table"></i> &nbsp; ข้อมูลของฉัน </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr style="font-weight:bold; color:#41403E; text-align:center; background:#F3F2EE;">
                        <th>
                        <div align="center">ลำดับ</div>
                        </th>
                        <th>
                        <div align="center">วันที่ส่งงาน</div>
                        </th>
                        <th>
                        <div align="center">รายละเอียดการซ่อม</div>
                        </th>
                        <th>
                        <div align="center">ราคาทั้งหมด</div>
                        </th>
                        <th>
                        <div align="center">สถานะ<div>
                        </th>
                        </tr>
                        </thead>
                        <?php
                        while($objResult = mysql_fetch_array($objQuery))
                        {
                        ?>
                        </thead>
                        </div>
                        <tr>
                        <td><div align="center"><?php echo $objResult["id_re"];?></td>
                        <td align="center"><?php echo $objResult["date_re"];?></td>
                        <td align="center"><?php echo $objResult["detail_re"];?></td>
                        <td align="center"><?php echo $objResult["price_re"];?></td>
                        <td align="center"><?php echo $objResult["status"];?></td>
                        </td>
                        </div>
                        </div>
                        </div>
                        </td>
                        </tr>
                        <?php       
                          }
                        ?>   
                      </tbody>
                      </table>
                      </td>
                      </div>
                      </div>
                      </div>
                      <!-- <div id="content-wrapper">
                      <h5><i class="fa fa-plus-circle" aria-hidden="true"> การชำระเงิน </i> <br><br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงินที่ต้องจ่าย  . . . . . . . .  บาท</h5>
                      </div>
             -->
             <div id="wrapper">
             <div id="content-wrapper">
             <div class="container-fluid">
             <div class="card mb-3">
             <div class="card-header">
             <div class="container">
             <div class="row">
             <div class="well col-xs-20 col-sm-20 col-md-12 col-xs-offset-2 col-sm-offset-2 col-md-offset-6">
             <div class="row">
             <div class="col-xs-10 col-sm-10 col-md-10">
             
             </div>
                <div class="col-xs-20col-sm-20 col-md-20 text-right">
                    <p> 
                    <p>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h3>รอการชำระเงิน</h3><p>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>สินค้า</th>
                            <th class="text-center"></th>
                            <th class="text-center">ทั้งหมด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">เปลี่ยนเพดานบ้านทั้งหลัง</td>
                            <td class="col-md-1 text-center"> </td>
                            <td class="col-md-1 text-center">1200 บาท</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">ซ่อมแซมท่อประปา</td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">65 บาท</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td class="text-right"><strong>ราคา: </strong></td>
                            <td class="text-center text-danger"><strong>12,065 บาท</strong></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                       <p><button type="submit" name="submit" class="btn btn-success"> ชำระเงินตอนนี้</button></p>
                       <button type="submit" name="submit" class="btn btn-warning"> เพิ่มการแจ้งซ่อม</button>
         
                
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
            <!-- <center><img src="../images/logo1.png">&nbsp;&nbsp;
            <img src="../images/logo1.png">&nbsp;&nbsp;
            <img src="../images/logo1.png">&nbsp;&nbsp;
            <img src="../images/logo1.png">&nbsp;&nbsp; -->

          
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> 

  <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="exampleModalLabel">คุณพร้อมที่จะออกจากระบบ?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      </div>
      <div class="modal-body">เลือก "ออกจากระบบ" ข้างล่าง หากต้องการออกจากเซสชั่นนี้.</div>
      <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      <a class="btn btn-primary" href="logout.php">ออกจากระบบ</a>
      </div>
      </div>
      </div>
      </div>
      <!-- Login Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>


</body>

</html>