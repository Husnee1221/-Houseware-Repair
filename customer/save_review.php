<?php
include('../db/connect.php');


$detail_review=$_POST['detail_review'];
$cusID=$_POST['cusID'];


$sql="INSERT INTO  review (detail_review,cusID)
		VALUES ('$detail_review','$cusID')";




 
if(mysql_query($sql)){
	
		 echo "<script>alert('Save done!' )</script>";
				echo "<script>window.open('review.php','_self')</script>";

	}

	else{
	 echo "<script>alert('MAY YOUR Email Or ID are USED Please! Try Again')</script>";
	  echo "<script>window.open('','_self')</script>";
	 
	}

?>