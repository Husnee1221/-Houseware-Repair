<?php
session_start();
if($_SESSION['id']==""){

echo "Please Login!";
exit(); } 
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Housewares Repairing | admin home</title>
  <!-- Custom fonts for this template-->
  <script type="text/javascript" src="../dist/ckeditor/ckeditor.js"></script>

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
   <!-- Font styles for this template-->
  <!-- <link href="css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
</head>

<body id="page-top">
   
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="admin_home.php">HOUSEWARE REPAIRING </a>
    <a class="navbar-brand" href="index2.php">

    </a>
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
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item  ">
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
      <li class="nav-item  ">
        <a class="nav-link " href="informhistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>&nbsp;ประวัติการแจ้งซ่อม</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report_tech.php">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>&nbsp;รายงานการซ่อมช่าง</span></a>
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
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">หน้าจอเข้าสู่ระบบ<h6>
            <a class="dropdown-item" href="admin_login.php">เปลี่ยนรหัส</a>
            <a class="dropdown-item" href="#">ดูโปรไฟล์</a>
            <div class="dropdown-divider"></div>
      </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-edit"></i>
          <span>&nbsp;การจัดการข้อมูล</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">เอกสาร:</h6>
          <a class="dropdown-item" href="addnews.php">ข่าวสาร</a>
          <a class="dropdown-item" href="workrepair">งานการซ่อม</a>
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
        <?php
        include('../db/connect.php');
        $sql = "SELECT * FROM news WHERE id_news";
        $objQuery = mysql_query($sql) or die("Error Query[".$sql."]");
        $i = 1;
        $count =1;
        ?> 
        <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <br>
            <ol class="breadcrumb">  
            <li class="breadcrumb-item">
            <a href="admin_home.php">หน้าแรก</a>
            </li>
            <li class="breadcrumb-item active">เพิ่มข่าวสาร</li>
            </ol>
            <a data-toggle="modal" data-target="#addd">
            <button class="btn btn-warning">เพิ่มข่าวสาร</button></a>
            <!-- Modal -->
            <br><br>
            <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>
            ข่าวและการประชาสัมพันธ์</div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr style="font-weight:bold; color:#040404; text-align:center; background:#f7f8f8;">
                    <th>
                      <div>ลำดับ</div>
                    </th>
                    <th>
                      <div>วันที่อัพเดท</div>
                    </th>
                    <th>
                      <div>หัวข้อ</div>
                    </th>
                    <th>
                      <div>รายละเอียด</div>
                    </th>
                    <th>
                      <div>การจัดการ<div>
                    </th>
                  </tr>
                </thead>
           <?php
           while ($row = mysql_fetch_array($objQuery))
           {
          ?>
          <tr>
          <td align="center"> <?php echo $count++;?></td>
          <td align="center"> <?php echo $row["date_n"];?></td>
          <td> <?php echo $row["topic_n"];?></td>
          <td> <?php echo $row["info_n"];?></td>
        
          </td>
          <td align="center">
            
          <button class="btn btn-info" data-toggle="modal" data-target="#rrr<?php echo $i;?>"
          style="cursor:pointer;">อัพเดท</a>&nbsp;</button>

          <a href="JavaScript:if(confirm('Confirm Delete?')==true)
          {window.location='delete_news.php?del=<?php echo $row["id_news"];?>';}" class="btn btn-danger">ลบ</a></td>
        
          
          <!-----///////////////////------>
                      <div class="modal fade" id="rrr<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                      <form action="updnews.php"  name="add" method="post">
                      <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                       <h5 class="modal-title" id="myModalLabel">อัพเดทข่าว</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                       <div class="form-group">
                       <label for="id_news">รหัส</label>
                       <input type="text" name="id_news" id="id_news"  class="form-control"  readonly
                       value="<?php echo $row["id_news"];?>">
                       </div>
                       <div class="modal-body">
                       <div class="form-group row">
                       <label for="topic_n">หัวข้อ</label>
                       <input type="text" name="topic_n" id="topic_n" class="form-control" value="<?php echo $row["topic_n"];?>"
                       autocomplete="off">
                       </div>
                       <div class="form-group row">
                       <label for="info_n">รายละเอียด</label>
                       <textarea rows="10" width="40" class="form-control" id="info_n" name="info_n"  placeholder="Description"> <?php echo $row["info_n"];?> </textarea>
                       </div>
                       <div class="modal-footer">
                       <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>ยกเลิก</button>
                       </div>
                       </form>
                       </td>
                     
                       </div>
                       </td>
                       <?php
                       $i++;
                       } 
                       ?>
                       <!-- /.card-body -->
                       </div>  </table>
                       <!-- /.card -->
                       <div class="modal fade" id="addd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                       <form method="post" action="savenews.php" name="add" >
                       <div class="modal-dialog">
                       <div class="modal-content">
                       <div class="modal-header">
                       <h5 class="modal-title" id="myModalLabel">เพิ่มข่าวสาร</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                       <div class="form-group row">
                       <div class="col-md-12">
                       <label for="topic">หัวข้อ</label>
                       <input type="text" name="topic_n" id="topic_n" class="form-control" autofocus
                       autocomplete="off">
                       </div>
                       </div>
                       <div class="form-group">
                       <label for="">เพิ่ม</label>
                       <textarea rows="10" width="40" class="form-control" id="info_n" name="info_n"
                       placeholder="Description"></textarea>
                       </div>
                       <div class="modal-footer">
                       <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> บันทึก</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>ยกเลิก</button>
                       </div>
                       
                      <?php
                      include('../db/connect.php');
                      $strSQL = "SELECT adminID  FROM admin WHERE adminID ='".$_SESSION['id']."'";
                      $objQuery = mysql_query($strSQL);
                      $objResult = mysql_fetch_array($objQuery);
                      ?>
                      <input type="text" name="adminID" id="adminID" class="form-control" hidden
                      value="<?php echo $objResult["adminID"];?>" class="form-control">
                
            
                      <?php 
                      mysql_close();
                      ?>
                       </form>
                      <!-- /.modal-content -->
                      </div>
                      </form>
                      <!-- /.modal-dialog -->
                    
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