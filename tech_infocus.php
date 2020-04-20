<?php
include('menu2.php');

$results = mysqli_query($con, "SELECT * FROM users WHERE status='customer'");
?>


<!DOCTYPE html>
<html>

<head>
  <div id="wrapper">

    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="tech_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="tech_infocus.php">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>ข้อมูลลูกค้า</span></a>
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
          <li class="breadcrumb-item active">Table Customer</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ข้อมูลลูกค้า </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                <thead>
                  <tr>
                    <th>
                      <div name="txtCustomerID" align="center"> ที่ </div>
                    </th>
                    <th>
                      <div name="txtName" align="center">Username</div>
                    </th>
                    <th>
                      <div align="center">ดูข้อมูล</div>
                    </th>
                    <th>
                      <div align="center">แก้ไข</div>
                    </th>
                  </tr>
                </thead>
               <?php while ($row = mysqli_fetch_array($results)) 
               { ?>
          </div>
          </td>
                <tr>
                  <td align="center"><?php echo $row["UsersID"];?></div></td>
                  <td> <?php echo $row["Username"];?></td>
          
            </div>
            </td>
            <td align="center"><a href="JavaScript:if(confirm('Confirm Open?')==true)
          {window.location='tech_view.php?UsersID=<?php echo $row["UsersID"];?>';}">ดูข้อมูล</a></td>
         

            </tr>
            <?php } ?>
            </table>
            <?php
mysqli_close($con);
?>

            <div class="card-footer small text-muted"></div>
          </div>
        </div>
        </body>

</html>