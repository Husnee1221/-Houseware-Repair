<?php
session_start();
require 'db/connection.php';

if(isset($_POST['Username']) && isset($_POST['Password'])){

	$Username = $_POST['Username'];
    $Password = $_POST['Password'];
    
	$sql_cus= "SELECT cusID, cusName  FROM customers WHERE cusUsername = '$Username' AND cusPassword= '$Password' AND adminID != '0'";
	if($result_cus = $con->query($sql_cus)){
		if($result_cus->num_rows > 0){
			while($row = $result_cus->fetch_object()){
				$_SESSION['id'] = $row->cusID;
				$_SESSION['name'] = $row->cusName;
				$_SESSION['status'] = "customer";	 
			        }
			    $result_cus->free();
                header("Location: customer/cus_home.php");
    
                }else{

	        $sql = "SELECT techID, techUsername, techStatus   FROM technicain WHERE techUsername = '$Username' AND techPassword = '$Password' AND adminID != '0'";
			if($result= $con->query($sql)){
				if($result->num_rows > 0){
					while($row = $result->fetch_object()){
                $_SESSION['id'] = $row->techID;
				$_SESSION['name'] = $row->techUsername;
				$_SESSION['status'] = $row->techStatus;
			        }
			
					$result->free();
	
                    if($_SESSION['status'] == "technician")
                    {
                        header("Location: technicain/tech_home.php");
                    exit();
                    }
                   
                    }
                    else{ 
                        header("Location: login.php?error=1");
                    }
                    }
                    }
                    $con->close();
                    }else{
                    echo $con->error;
                    $con->close();
                    }
                    }else{
                    header("Location: ../index.php");
                    }
        
        ?>