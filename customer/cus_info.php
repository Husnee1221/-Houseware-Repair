<?php
require '../db/connect.php';
  $strSQL = "SELECT * FROM users  WHERE UsersID='".$_SESSION["id"]."'";      
        ?>
        <?php
     if($result = $con->query($strSQL)){
     while($objResult = $result->fetch_object()){
      $conn = mysqli_connect($serverName,$username,$password,$dbName);
      $sql = "SELECT * FROM customer";
      $query = mysqli_query($conn,$sql);
            ?>
      
<!DOCTYPE html>
<html>
<head>
<div id="wrapper">
<ul class="sidebar navbar-nav">
       <li class="nav-item active">
        <a class="nav-link" href="cus_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
 <li class="nav-item">
        <a class="nav-link">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>ข้อมูลของฉัน</span></a>
      </li>
        </a>
      </li>
      </ul>
</nav>
      <div id="content-wrapper">
      <div class="container-fluid">
     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="cus_home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ข้อมูลของฉัน </div>
          <div class="card-body">
            <div class="table-responsive" >
              <table class="table table-bordered" id="dataTable" width="10%" cellspacing="10">
                <thead>
                  <tr>
                    <th>
                      <div align="center" name="txtID">ที่ </div>
                    </th>
                    <th>
                      <div align="center" name="txtUsername">Username </div>
                    </th>
                    <th>
                      <div align="center" name="txtEmail">อีเมลล์</div>
                    </th>
                    <th>
                      <div align="center" name="txtAddress">ที่อยู่</div>
                    </th>
                    <th>
                      <div align="center" name="txtPhone">Phone</div>
                    </th>
                  </tr>
                  </thead>
                </div> 
          <tr>
          <td>

            <div align="center"><?php echo $objResult->UsersID;?></td>
          <td><?php echo $objResult->Username;?></td>
          <td><?php echo $objResult->email;?></td>
          <td><?php echo $objResult->address;?></td>
          <td><?php echo $objResult->phone;?></td>
		      </td>
          
		  </td>
          <?php
}
}
?>
       </table>     
  <div class="card-footer small text-muted"></div>
  </div>
  </div>
   </body>

</html>