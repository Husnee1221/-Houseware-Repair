<?php
include('../db/connect.php');

$cusUsername=$_POST['cusUsername'];
$cusPassword=$_POST['cusPassword'];
$cusName=$_POST['cusName'];
$cusStatus=$_POST['cusStatus'];
$cusPhone=$_POST['cusPhone'];
$cusEmail=$_POST['cusEmail'];
$cusAddress=$_POST['cusAddress'];



$sql="INSERT INTO customers (cusUsername,cusPassword,cusName,cusStatus,cusPhone,cusEmail,cusAddress)
		VALUES ('$cusUsername','$cusPassword','$cusName','$cusStatus','$cusPhone','$cusEmail','$cusAddress')";

                       


 
if(mysql_query($sql)){
	
		 echo "<script>alert('You are member Now, Please Login!' )</script>";

				echo "<script>window.open('login.php','_self')</script>";
	}
	else{
	 echo "<script>alert('MAY YOUR Email Or ID are USED Please! Try Again')</script>";
	  echo "<script>window.open('','_self')</script>";
	 
	}

?>