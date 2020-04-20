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
      header("location:../logout.php");
      exit;
    }else{
      $_SESSION["timeLasetdActive"] = time();
    }
  }else{
    $_SESSION["timeLasetdActive"] = time();
  }
  //
  //*** Get User Login
  mysql_connect("localhost","root","");
  mysql_select_db("hwrp");
  $strSQL = "SELECT * FROM admin WHERE adminID = '".$_SESSION['id']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery); 
?>
<!DOCTYPE html>
<html>
<head>


  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Housewares Repairing</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="admin_home.php">HOUSEWARE REPAIRING </a>
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
          aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $objResult["adminName"]; ?></span>  
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">ตั้งค่า</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">ออกจากระะบบ</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>&nbsp;หน้าแรก</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="admin_approve.php">
        <i class="fas fa-fw fa-check-circle"></i>
          <span>&nbsp;รอการอนุมัติ</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="informhistory.php">
        <i class="fas fa-fw fa-table"></i>
          <span>&nbsp;ประวัติการแจ้งซ่อม</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report_tech.php">
        <i class="fas fa-fw fa-file-alt"></i>
          <span>&nbsp;รายงานการซ่อมช่าง</span></a>
      </li>
          <li class="nav-item dropdown active">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <i class="nav-icon fas fa-user"></i>
      <span>&nbsp;โปรไฟล์</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <h6 class="dropdown-header">โปรไฟล์:</h6>
      <a class="dropdown-item" href="admin_infocus.php">โปรไฟล์ลูกค้า</a>
      <a class="dropdown-item" href="admin_infotech.php">โปรไฟล์ช่างซ่อม</a>
      </div>
  </li>
  <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-wrench"></i>
          <span>&nbsp;การตั้งค่า</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">หน้าจอเข้าสู่ระบบ<h6>
          <a class="dropdown-item" href="admin_login.php">เปลี่ยนรหัส</a>
          <a class="dropdown-item" href="#">ดูโปรไฟล์</a>
          <div class="dropdown-divider"></div>
          </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="addnews.php">
        <i class="fas fa-fw fa-edit"></i>
          <span>&nbsp;ข่าวสาร</span></a>
          <a class="dropdown-item" href="admin_service.php">งานบริการ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php" class="dropdown-item" href="#" data-toggle="modal"
          data-target="#logoutModal">
          <i class="fas fa-fw fa-times "></i>
          <span>&nbsp;ออกจากระบบ</span></a>
      </li>
    </ul>
    </nav>
      <div id="content-wrapper">
      <div class="container-fluid">
<!-- Breadcrumbs-->


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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

<div id="wrapper">

      <div id="content-wrapper">
      <div class="container-fluid">
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin_home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Edit information</li>
        </ol>

<form action="save_editcus.php?cusID=<?php echo $_GET["cusID"];?>" name="add" method="post">
<?php
error_reporting(E_ALL ^ E_WARNING); 
error_reporting(0);
include('../db/connect.php');
$strSQL = "SELECT * FROM customers WHERE cusID = '".$_GET["cusID"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found".$_GET["cusID"];
}
else
{
?>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ข้อมูลช่าง </div>
          <div class="card-body">
            <div class="table-responsive" >
              <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                   
        <td > &nbsp;ID</td>
        <td width="180">
        <?php echo $objResult["cusID"];?>
        </td>
        </tr>
        <td width="125"> &nbsp;Username</td>
        <td width="180">
       <?php echo $objResult["cusUsername"];?>
        </td>
        <tr>
        <td width="125"> &nbsp;Name</td>
        <td width="180">
        <?php echo $objResult["cusName"];?>
        </td>
        </tr>
        <tr>
        <td width="125"> &nbsp;Email</td>
        <td width="180">
        <?php echo $objResult["cusEmail"];?>
        </td>
        </tr>
        <tr>
        <td width="125"> &nbsp;Address</td>
        <td width="180">
         <?php echo $objResult["cusAddress"];?>
        </td>
        </tr>
        <tr>
        <td width="125"> &nbsp;Phone</td>
        <td width="180">
        <?php echo $objResult["cusPhone"];?>
        </td>
        </tr>
  </table>
 
        <input type="hidden" name="hid" value="<?php echo $objResult["cusID"]; ?>">
  <?php
  }
  mysql_close($objConnect);
  ?>
   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-bar-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  </form>
</body>
</html>