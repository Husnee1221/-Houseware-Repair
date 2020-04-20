<?php
session_start();
require '../db/connect.php';
	mysql_connect("localhost","root","");
	mysql_select_db("hwrp");
	
	$Username = $_POST['Username'];
    $Password = $_POST['Password'];

	$strSQL = "SELECT * FROM customers where cusUsername='$Username' and cusPassword='$Password' AND adminID != '0'";



	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult)
	{

	header("Location: ../customer/login.php?error=1");

	}
	
	else
	{
		   
			$_SESSION["id"] = $objResult["cusID"];
		    $_SESSION["username"] = $objResult["cusUsername"];
			$_SESSION["password"] = $objResult["cusPassword"];
			$_SESSION["status"] = $objResult["cusStatus"];
			

			session_write_close();
	
			
			if($objResult["cusStatus"] == "customer")
			{
				
			
				header("location:cus_home.php");
				exit();
			}
	}
	mysql_close();
	
?>
	

