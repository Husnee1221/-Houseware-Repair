<?php
include ("../db/connection.php");
if (isset($_GET['del'])) {
	$techID= $_GET['del'];
	mysqli_query($con, "DELETE FROM technicain WHERE techID=$techID");
	$_SESSION['message'] = "ลบ!"; 
	echo "<script>alert('ลบข้อมูลสำเร็จ');window.history.back();</script>";
}
?>