<?php
include('../db/connection.php');
if (isset($_GET['del'])) {
	$cusID = $_GET['del'];
	mysqli_query($con, "DELETE FROM customers WHERE cusID=$cusID");
	$_SESSION['message'] = "ลบ!"; 
	echo "<script>alert('ลบข้อมูลสำเร็จ');window.history.back();</script>";
}
?>