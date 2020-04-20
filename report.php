<?php
  include('menu2.php');
?>


<!DOCTYPE html>
<html>

<head>
  <div id="wrapper">

    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-users"></i>
          <span>ส่งซ่อมสินค้า</span></a>
      </li>
    </ul>
    </nav>
    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin_home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">รายการการส่งซ่อม</li>
        </ol>
  <?php      
include('connect.php');
$sql = "SELECT * FROM infor_repairing";
$query = mysqli_query($con,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    echo $result["UsersID"];
} 

ini_set('display_errors', 1);
error_reporting(~0);
$serverName = "localhost";
$userName = "root";
$Password = "";
$dbName = "housewares_repairing";
$con= mysqli_connect($serverName,$username,$password,$dbName);
$sql = "SELECT * FROM technician";
$query = mysqli_query($con,$sql); 
?>
&nbsp;&nbsp; 

    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav">
   <li><a data-toggle="modal" data-target="#myModal" style="cursor:pointer;"><i class="fa fa-plus"></i> เพิ่มใบส่งซ่อม/เคลม</a></li>
       </ul>
      
  <form class="navbar-form from-group navbar-right" role="search" method="get" action="?p=search">
 
    <input type="text" class="form-control" name="q" placeholder="ระบุชื่อ/หมายเลขโทรศัพท์หรือรหัสส่งซ่อม/เคลม เพื่อค้นหา" size="50" autofocus  autocomplete="off">
    <input type="hidden" name="p" id="p" value="search" >
 
</form>
</div>
  <div class="card mb-1">
          <div class="card-header">
            <i class="fas fa-table"></i>
            รายการการแจ้งซ่อม </div>
          <div class="card-body">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                </div>
    <div class="table-responsive">
  	<table width="80%" border="" class="table table-bordered">
    <thead>
  <tr style="font-weight:bold; color:white; text-align:center; background:#060B31;">
    <td width="12%">#</td>
    <td width="16%">วันที่</td>
    <td width="22%">ชื่อผู้ส่งซ่อม</td>
    <td width="13%">หมายเลขโทรศัพท์</td>
    <td width="16%">สถานะ</td>
    <td width="15%">จัดการ</td>
</tr>

            <tr>
              <td><?php echo $result["Name"];?></td>
              <td><?php echo $result["equipment"];?></td>
              <td><?php echo $result["damage"];?></td>
              <td><?php echo $result["date"];?></td>
              <td><?php echo $result["time"];?></td>
              <td><?php echo $result["status"];?> </td>
            </tr>
            </thead>
            </table>
          </div>
            <?php
mysqli_close($con);
?>
       
       
                 <div class="card-footer small text-muted"></div>
                  </div>
                        </div>
                  </body>
                  </html>