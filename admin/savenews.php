<?php
session_start();
include('../db/connect.php');

$topic_n=$_POST['topic_n'];
$info_n=$_POST['info_n'];
$adminID=$_POST['adminID'];

$sql="INSERT INTO news (topic_n,info_n,adminID)
		VALUES ('$topic_n','$info_n','$adminID')";

 
if(mysql_query($sql)){
	
				echo "<script>window.open('addnews.php,'_self')</script>";
	}
	else{
	 echo "<script>alert('fail')</script>";
	  echo "<script>window.open('','_self')</script>";
	 
	}

?>