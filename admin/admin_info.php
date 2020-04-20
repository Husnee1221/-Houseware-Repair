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
        <?php
     if($result = $con->query($strSQL)){
     while($objResult = $result->fetch_object()){
        ?>
<!DOCTYPE html>
<html>
<head>
<div id="wrapper">

      <div id="content-wrapper">
      <div class="container-fluid">

     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin_home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
  
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ข้อมูลช่างซ่อม </div>
          <div class="card-body">
            <div class="table-responsive" >
              <table class="table table-bordered" id="dataTable" width="10%" cellspacing="10">
                <thead>
                  <tr style="font-weight:bold; color:#FFF; text-align:center; background:#0E1441;">
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
    
          <tr style="font-weight:sharp; color:#000; text-align:center; ">
          <td>
            <div align="center"><?php echo $objResult->adminID;?></td>
          <td><?php echo $objResult->adminUsername;?></td>
          <td><?php echo $objResult->adminName;?></td>
          <td align="center"><?php echo $objResult->adminStatus;?></td>
		  </td>
        <?php
}}
?>
        
       </table> 
     
       
  <div class="card-footer small text-muted"></div>
  </div>
  </div>
   </body>

</html>

