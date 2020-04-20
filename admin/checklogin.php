<?php
session_start();
require '../db/connect.php';
	mysql_connect("localhost","root","");
	mysql_select_db("hwrp");
	
	$Username = $_POST['Username'];
    $Password = $_POST['Password'];

	$strSQL = "SELECT * FROM admin where adminUsername='$Username' and adminPassword='$Password'";

	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult)
	{
			header("location:index.php?Username_or_Password_not_match");
	}
	
	else
	{
		   
			$_SESSION["id"] = $objResult["adminID"];
		    $_SESSION["username"] = $objResult["adminUsername"];
			$_SESSION["password"] = $objResult["adminPassword"];
			$_SESSION["status"] = $objResult["adminStatus"];
			

			session_write_close();
	
			
			if($objResult["adminStatus"] == "Admin")
			{
				
			
				header("location:admin_home.php");
				exit();
			}
	}
	mysql_close();
	
?>
	

