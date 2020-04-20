<?php
session_start();
$admin = $_SESSION['id'];
include('../db/connect.php');

$id = $_GET['id'];

$sql = "UPDATE technicain SET adminID = '$admin' WHERE techID = '$id'";


if(mysql_query($sql)){
	
	echo "<script>alert('Confirm By Admin!' )</script>";

		   echo "<script>window.open('admin_home.php','_self') </script>";
		   
}
else{
echo "<script>alert('MAY YOUR Email Or ID are USED Please! Try Again')</script>";
 echo "<script>window.open('','_self')</script>";

}

?>