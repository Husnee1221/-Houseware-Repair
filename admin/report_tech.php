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
  $strSQL = "SELECT * FROM admin WHERE adminID = '".$_SESSION['id']."' ";
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
  <title>Housewares Repairing | Admin Home </title>

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
          <a class="dropdown-item" href="#">โปรไฟล์ของฉัน</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>&nbsp;หน้าแรก</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="admin_approve.php">
          <i class="fas fa-fw fa-check-circle"></i>
          <span>&nbsp;รอการอนุมัติ</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="informhistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>&nbsp;ประวัติการแจ้งซ่อม</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="report_tech.php">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>&nbsp;รายงานการซ่อม</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-user"></i>
          <span>&nbsp;การจัดการโปรไฟล์</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">โปรไฟล์:</h6>
          <a class="dropdown-item" href="admin_infocus.php">โปรไฟล์ลูกค้า</a>
          <a class="dropdown-item" href="admin_infotech.php">โปรไฟล์ช่างซ่อม</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fas fa-edit"></i>
          <span>&nbsp;การจัดการข้อมูล</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="addnews.php">ข่าวสาร</a>
          <a class="dropdown-item" href="admin_service.php">งานบริการ</a>
        </div>
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
        <br>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin_home.php">หน้าแรก</a>
          </li>
          <li class="breadcrumb-item active">ติดตามสถานะ</li>
        </ol>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

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

  <?php
  include('../db/connect.php');
  $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
  $objDB = mysql_select_db("hwrp");

  $strSQL = "SELECT infor_inform.*, customers.cusID,customers.cusName,customers.cusPhone,customers.cusAddress
    ,infor_inform.descrip,infor_inform.hdate,infor_inform.ntime,infor_inform.sub,infor_inform.main,
    infor_inform.cusID,infor_inform.id,technicain.techID,technicain.techName FROM infor_inform
    
    LEFT JOIN customers ON customers.cusID = infor_inform.cusID 
    LEFT JOIN technicain ON technicain.techID = infor_inform.techID 
  
    WHERE  technicain.techID  AND infor_inform.status = 'ซ่อมเสร็จ'  ";
  
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
 
  ?>
      <div id="wrapper">
        <div id="content-wrapper">
          <div class="container-fluid">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i> &nbsp; ข้อมูลลูกค้า </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="">
                    <thead>
                      <tr style="font-weight:bold; color:#040404; text-align:center; background:#f7f8f8;">
       <th>
                                <div>เลขที่</div>
                              </th>
                              <th>
                                <div>ชื่อ</div>
                              </th>
                              <th>
                                <div>ประเภท</div>
                              </th>
                              <th>
                                <div>รายการที่ส่งซ่อม</div>
                              </th>
                              <th>
                                <div>วันที่สะดวก</div>
                              </th>
                              <th>
                                <div >เวลาที่สะดวก</div>
                              </th>
                              <th>
                                <div>สถานะ<div>
                              </th>
                              <th>
                                <div>การจัดการ<div>
                              </th>
                            </tr>
                          </thead>
                          <?php
                          $i = 1;
                          $count =1;
                         while($objResult = mysql_fetch_array($objQuery))
                          {
                          ?>
                          </thead>
                      </div>
                      <tr>
                        <td>
                          <div align="center"><?php echo $count++;?>
                        </td>
                        <td><?php echo $objResult["cusName"];?></td>
                        <td><?php echo $objResult["main"];?></td>
                        <td><?php echo $objResult["sub"];?></td>
                        <td><?php echo $objResult["hdate"];?></td>
                        <td><?php echo $objResult["ntime"];?></td>

                        <td align="center">
                        <span class="btn btn-info"><?php echo $objResult["status"];?></span></td>
                        <td align="center"><button class="btn btn-success" data-toggle="modal" data-target="#uuu<?php echo $i;?>"
                         style="cursor:pointer;">รีวิวจากลูกค้า</a></button>&nbsp;
                         <a class="btn btn-warning" href="approve_success.php ?id=<?php echo $row['techID']; ?>" title="กดเพื่อยอมรับ"
                        onclick="return confirm_accept('<?php echo $row['techName']; ?>')">สำเร็จ</a> &nbsp;
                         <a class="btn btn-primary" href="approve_cus.php?id=<?php echo $row['cusID']; ?>" title="ทำการโอนเงินแก่ช่าง"
                        onclick="return confirm_accept('<?php echo $row['cusName']; ?>')">โอนค่าจ้าง</a> &nbsp;</td>
                           </button>&nbsp;                       
                           </td></td>
                           </div>
                           </div>
                           </div>
                           </td>
                           </tr>
             
                   <div class="modal fade" id="uuu<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                   aria-hidden="true">
                   <form action="save_report.php" name="add" method="post">
                   <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">ส่งงานซ่อม</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="techUsername">รหัสรายงาน</label>
                          <input type="" class="form-control" name="techID"  autofocus value="<?php echo $objResult["techID"];?>"
                            readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="techName">ชื่อผู้รายงานซ่อม</label>
                          <input type="" class="form-control" name="" value="<?php echo $objResult["techName"];?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="card_customer_name">ชื่อลูกค้า</label>
                          <input type="text" name="cusName" id="cusName" class="form-control" readonly
                            value="<?php echo $objResult["cusName"];?>">
                  
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <div class="techPhone">ที่อยู่ลูกค้า</div>&nbsp;
                          <div class="input-group">
                            <textarea name="cusAddress" id="cusAddress" class="form-control"  readonly ><?php echo $objResult["cusAddress"];?> </textarea>
                          </div>
                        </div>
                      </div>
                        <div class="form-group row">
                        <div class="col-md-6">
                          <label for="">รายการที่เสีย</label>
                          <input type="" class="form-control" autofocus value="<?php echo $objResult["sub"];?>"
                            readonly>
                        </div>
                        <div class="col-md-6">
                          <label for="">วันที่รับงาน</label>
                          <input type="date" name="date_re" id="date_re" class="form-control" value="<?php echo $objResult["date_re"];?>" autofocus required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="">รายละเอียดการซ่อม</label>
                          <textarea name="detail_re" id="detail_re" class="form-control" required
                            value="<?php echo $objResult["detail_re"];?>"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="">ราคา</label>
                          <input type="text" name="price_re" id="price_re" class="form-control" required></textarea>
                          <input type="hidden" name="cusID" value="  <?php echo $objResult['cusID'] ?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="glyphicon glyphicon-remove"></i>ยกเลิก</button>
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>
                          บันทึก</button>
                      </div>
                 </form>
                 </div>
                 </div>
                 <?php    
                 $i++;   
                 }
                 ?>
                 
                  </tbody>
                  </table>
                  

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

</html