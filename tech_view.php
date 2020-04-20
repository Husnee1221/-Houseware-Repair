<?php
include('menu2.php');


?><!DOCTYPE html>
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
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Edit</span></a>
      </li>
      </ul>
</nav>
      <div id="content-wrapper">
      <div class="container-fluid">
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin_home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Edit information</li>
        </ol>

<form action="save_editcus.php?UsersID=<?php echo $_GET["UsersID"];?>" name="add" method="post">
<?php
error_reporting(E_ALL ^ E_WARNING); 
error_reporting(0);
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("housewares_repairing");
$strSQL = "SELECT * FROM users WHERE UsersID = '".$_GET["UsersID"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found".$_GET["UsersID"];
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
        <?php echo $objResult["UsersID"];?>
        </td>
        </tr>
        <td width="125"> &nbsp;Username</td>
        <td width="180">
       <?php echo $objResult["Username"];?>
        </td>
        <tr>
        <td width="125"> &nbsp;Name</td>
        <td width="180">
        <?php echo $objResult["Name"];?>
        </td>
        </tr>
        <tr>
        <td width="125"> &nbsp;Email</td>
        <td width="180">
        <?php echo $objResult["email"];?>
        </td>
        </tr>
        <tr>
        <td width="125"> &nbsp;Address</td>
        <td width="180">
         <?php echo $objResult["address"];?>
        </td>
        </tr>
        <tr>
        <td width="125"> &nbsp;Phone</td>
        <td width="180">
        <?php echo $objResult["phone"];?>
        </td>
        </tr>
  </table>
 
        <input type="hidden" name="hid" value="<?php echo $objResult["UsersID"]; ?>">
  <?php
  }
  mysql_close($objConnect);
  ?>
  </form>
</body>
</html>