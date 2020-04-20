<?php
include('menu2.php');

  $strSQL = "SELECT * FROM users  WHERE UsersID='".$_SESSION["id"]."'";      
    
     if($result = $con->query($strSQL)){
     while($objResult = $result->fetch_object()){
            
	//*** Update Last Stay in Login System
	//$sql = "UPDATE member SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ";
	//$query = mysqli_query($con,$sql);
    $conn = mysqli_connect($serverName,$username,$password,$dbName);
	$sql = "SELECT * FROM technician";
	$query = mysqli_query($conn,$sql);
	//*** Get User Login
//	$strSQL = "SELECT * FROM technicain  WHERE id_tech = '".$_SESSION['id']."' ";
	//$objQuery = mysqli_query($con,$strSQL);
  // $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC); 
?> 
<!DOCTYPE html>
<html>
<head>
<div id="wrapper">

<ul class="sidebar navbar-nav">
       <li class="nav-item active">
        <a class="nav-link" href="tech_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="tech_info.php">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>ข้อมูลช่างซ่อม</span></a>
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
          <li class="breadcrumb-item active">Table Technicain</li>
        </ol>
  
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ข้อมูลช่างซ่อม </div>
          <div class="card-body">
            <div class="table-responsive" >
              <table class="table table-bordered" id="dataTable" width="10%" cellspacing="10">
                <thead>
                  <tr>
                    <th>
                      <div align="center" name="">ที่ </div>
                    </th>
                    <th>
                      <div align="center" name="">Username </div>
                    </th>
                    <th>
                      <div align="center" name="">Name</div>
                    </th>
                    <th>
                      <div align="center" name="">Status</div>
                    </th>
                  </tr>
                  </thead>
                </div> 
    
          <tr>
          <td>
            <div align="center"><?php echo $objResult->UsersID;?></td>
          <td><?php echo $objResult->Username;?></td>
          <td><?php echo $objResult->Name;?></td>
          <td align="center"><?php echo $objResult->status;?></td>
		  </td>
        <?php
}}
?>
        
       </table> 
       <?php
mysqli_close($con);
?>
       
  <div class="card-footer small text-muted"></div>
  </div>
  </div>
   </body>

</html>

