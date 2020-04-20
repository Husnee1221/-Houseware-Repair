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
  //*** Get User Login
  require '../db/connect.php';
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style type="text/css">
  body{
  background:#f8f8f8
  }
</style>
</head>
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href=""> Housewares Repairing </a>
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
          <i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $objResult["cusName"]; ?></span></a>
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
      <li class="nav-item active">
        <a class="nav-link" href="cus_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>&nbsp;หน้าแรก</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inform_repair.php">
          <i class="fas fa-fw fa-clock"></i>
          <span>แจ้งซ่อม</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>&nbsp;ประวัติการแจ้งซ่อม</span></a>
      </li>
      <li class="nav-item ">
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
          <a class="dropdown-item" href="admin_login.php">เข้าสู่ระบบ</a>
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
        <a class="nav-link" href="../logout.php" class="dropdown-item" href="#" data-toggle="modal"
          data-target="#logoutModal">
          <i class="fas fa-fw fa-times "></i>
          <span>&nbsp;ออกจากระบบ</span></a>
      </li>
     </ul>
    </nav>
    <div id="content-wrapper">
      <div class="container-fluid">
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
                <a class="btn btn-primary" href="../logout.php">ออกจากระบบ</a>
              </div>
            </div>
          </div>
        </div>
        </ul>
        </nav>
        <!-- Breadcrumbs-->
        <br>
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="cus_home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">โปรไฟล์ของฉัน</li>
          </ol>
          <br>
         <?php
  include('../db/connect.php');
  $strSQL = "SELECT * FROM customers WHERE cusID='".$_SESSION["id"]."'"; 
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
         ?>        
                 
                  <body id="page-top">
                  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                  <div class="container">
                  <div class="row flex-lg-nowrap">
                  <div class="col-7 col-lg-auto mb-10" style="width:300px;"> 
                  <legend>รายละเอียดเกี่ยวกับลูกค้า</legend> <br>
                </div>
                </div>
                  <form class="form-horizontal" enctype="multipart/form-data" method="post" action="save_profile.php.php">
                  <div class="row"> 
                    <div class="col-12 col-sm-auto mb-3">
                    <div class="mx-auto" style="width: 140px;">
                      <div class="d-flex justify-content-center align-items-center rounded"
                        style="height: 140px; background-color: rgb(233, 236, 239);">
                        <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                      </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $objResult["cusName"];?></h4>
                      <p class="mb-0">@<?php echo $objResult["cusUsername"];?></p>
                      <div class="text-muted"><small><?php echo $objResult["cusStatus"];?></small></div>
                      <div class="mt-2">
                        <button class="btn btn-primary" type="button">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Change Photo</span>
                        </button>
                      </div>
                    </div>
                    <div class="text-center text-sm-right">
                    <a data-toggle="modal" data-target="#rrr">
                    <span class="badge badge-secondary">Edit Profile</span></a>
                      <!-- <div class="text-muted"><small>Joined 09 Dec 2017</small></div> -->
                    </div>
                  </div>
                </div>
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="" class="active nav-link">Information</a></li>
                </ul>
                <div class="tab-content pt-3">
                  <div class="tab-pane active">
                    <form class="form" novalidate="">
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>ชื่อ-สกุล</label>
                                <input type="text" class="form-control"value="<?php echo $objResult["cusName"];?>" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" value="<?php echo $objResult["cusUsername"];?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>อีเมลล์</label>
                                <input class="form-control" type="text" value="<?php echo $objResult["cusEmail"];?>" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>เบอร์ติดต่อ</label>
                                <input type="text" class="form-control" value="<?php echo $objResult["cusPhone"];?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col mb-3">
                              <div class="form-group">
                                <label>ที่อยู่</label>
                                <textarea class="form-control" rows="5"placeholder="<?php echo $objResult["cusAddress"];?>" disabled></textarea>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                             <div class="mb-2"><b>Change Password</b></div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Current Password</label>
                                    <input class="form-control" type="password" placeholder="••••••">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" placeholder="••••••">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                    <input class="form-control" type="password" placeholder="••••••"></div>
                                </div>
                              </div>
                            </div>
                        </form>
                     </div> -->
                     
                  <div class="modal fade" id="rrr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                  <form action="save_profile.php"  name="add" method="post">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                  <div class="form-group row">
                  <div class="col-md-6">
                  <label for="cusUsername">ชื่อผู้ใช้</label>
                  <input type="text" name="cusUsername" id="cusUsername" class="form-control" autofocus  autocomplete="off" value="<?php echo $objResult["cusUsername"];?>">
                  <input type="text" name="cusID" id="cusID" class="form-control" autofocus  autocomplete="off" value="<?php echo $objResult["cusID"];?>"hidden >
                  </div>
                  <div class="col-md-6">
                  <label for="cusName">ชื่อ-นามสกุล</label>
                  <input type="text" name="cusName" id="cusName" class="form-control"  autocomplete="off" value="<?php echo $objResult["cusName"];?>">
                  </div>
                  </div>
                  <div class="form-group row">
                  <div class="col-md-12">
                  <div class="cusAddress">ที่อยู่</div>&nbsp;
                  <input  type="text" class="form-control"name="cusAddress" id="cusAddress" value="<?php echo $objResult["cusAddress"];?>">
                  </div>
                  </div>
                  <div class="form-group row">
                  <div class="col-md-12">
                  <div class="cusEmail">อีเมล</div>&nbsp; 
                  <input  type="email" name="cusEmail" id="cusEmail" class="form-control" value="<?php echo $objResult["cusEmail"];?>">
                  </div>
                  </div>         
                  <div class="form-group row">
                  <div class="col-md-12">
                  <div class="cusPhone">เบอร์โทรศัพท์</div>&nbsp;
                  <div class="input-group">
                  <input  type="text" name="cusPhone"  id="cusPhone" value="<?php echo $objResult["cusPhone"];?>" class="form-control" minlength="10" maxlength="10" Required>
                  </div>
                  </div>
                  </div>
                  <!-- <div class="form-group row">
                  <div class="col-md-12">
                  <div class="cusPassword">รหัสผ่าน</div>&nbsp;
                  <div class="input-group">
                  <input  type="text" name="cusPassword" id="cusPassword" class="form-control" value="">
                  </div> 
                  </div> 
                  </div>-->
                  <select class="form-control" name="cusStatus" id="cusStatus" hidden>
                  <option value="customer"><?php echo $objResult["cusStatus"];?></option>
                  </select>
                  </div>
                  <div class="modal-footer">
                  <button type="submit" value="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>ยกเลิก</button>
                  </div>

            <!-- /.modal-dialog -->
            </div>
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
            <script src="..8js/demo/datatables-demo.js"></script>
            <script src="../js/demo/chart-area-demo.js"></script>
            <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script type="text/javascript">
            </script>
</body>

</html>
