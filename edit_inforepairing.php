<?php

error_reporting(E_ALL ^ E_WARNING); 
error_reporting(0);
	session_start();
  require_once("connect.php");
  
  //mysql_connect("localhost","root","");
	//mysql_select_db("mydatabase");

	if(!isset($_SESSION['id']))
	{
    header ("location: technicianlogin.php");
		exit();
  }
	
	//*** Update Last Stay in Login Systemgn
	//$sql = "UPDATE member SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ";
	//$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM technicain WHERE id_tech = '".$_SESSION['id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
  // $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  //include('Config.php');
?>

<?
include('connect.php');
$sql = "SELECT * FROM infor_repairing";
$query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    echo $result["infor_repairing"];
}
?>
<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>housewares_repairing</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->

</head>

<body id="page-top">


  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Warehouse Repairing</a>

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

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
      /
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">ตั้งค่า</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">ออกจากระะบบ</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
      
        <a class="nav-link" href="home_admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          
   
        <!-- <i class="fas fa-pencil-square-o"></i>-->
      

          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
              
        <i class="fas fa-edit"></i>
          <span>Edit Repair Voice</span></a> 
     
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
   
        <div class="card mb-3">
          <div class="card-header">

<form action="save_editinforepair.php?id_infor=<?php echo $_GET["id_infor"];?>" name="add" method="post">
              
            <i class="fas fa-table"></i>
            Edit Bill Invoice</div>
          <div class="card-body">
            <div class="table-responsive" >


<?php
error_reporting(E_ALL ^ E_WARNING); 
error_reporting(0);


$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("housewares_repairing");
$strSQL = "SELECT * FROM infor_repairing WHERE id_infor= '".$_GET["id_infor"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found ".$_GET["id_infor"];
}
else{
}
?>
              <table width="400" border="1" style="width: 400px">
              <tbody>
      <tr>
        <td width="125"> &nbsp;Username</td>
        <td width="180">
          <input name="txtName" type="text" id="txtName" size="20" value="<?php echo $objResult["name"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Equipment</td>
        <td><input name="txtEquipment" type="text" value="<?php echo $objResult["equipment"];?>">
        </td>
        </tr>
      <tr>
        <td> &nbsp;Damage</td>
        <td><input name="txtDamage" type="text" value="<?php echo $objResult["damage"];?>">
        </td>
      </tr>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td><input name="txtStatus" type="text" value="<?php echo $objResult["status"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Pick up Equipment</td>
        <td><input name="txtPickupEquipment" type="text" value="<?php echo $objResult["pick_up_equipment"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;remand</td>
        <td><input name="txtRemand" type="text" value="<?php echo $objResult["remand"];?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;Technician</td>
        <td><input name="txtTeachnician" type="text" value="<?php echo $objResult["teachnician"];?>"></td>
      </tr>
       </td>
      </tr>
      <tr>
        <td> &nbsp;Description</td>
        <td><input name="txtDescription" type="text" id="txtDescription"value="<?php echo $objResult["description"];?>">
        </td>
      </tr>
      </tr>
      <tr>
        <td> &nbsp;Price</td>
        <td><input name="txtPrice" type="text" id="txtPrice"value="<?php echo $objResult["price"];?>">
        </td>
      </tr>
    </tbody>
  </table>

  <br>
 
<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Update </button>
        <input type="hidden" name="hid" value="<?php echo $objResult["id_infor"]; ?>">
              
    </div>
  </div>
  <div class="card-footer small text-muted"></div>
  </div>
  </div>
  </form>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Housewares Repairing, Create by Sunee & Ilham.</span>
      </div>
    </div>
  </footer>

  </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">คุณพร้อมที่จะออกจากระบบ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">เลือก "ออกจากระบบ" ข้างล่าง หากต้องการออกจากเซสชั่นนี้.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-primary" href="logouttechnician.php">ออกจากระบบ</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>
</html>