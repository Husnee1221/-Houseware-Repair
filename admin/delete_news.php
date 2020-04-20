<?php
include('../db/connection.php');
if (isset($_GET['del'])) {
	$id_news = $_GET['del'];
	mysqli_query($con, "DELETE FROM news WHERE id_news=$id_news");
	$_SESSION['message'] = "ลบ!"; 
	echo "<script>alert('ลบข้อมูลสำเร็จ');window.history.back();</script>";
}
?>