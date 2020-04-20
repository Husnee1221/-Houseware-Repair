<?php
require '../db/connect.php';
mysql_connect($hostname, $username, $password)or die("Can't connect DB") ;
mysql_select_db($dbname) or die ("Can't connect DB"); 
mysql_db_query($dbname,"SET NAMES UTF8");


$descrip=$_POST['descrip'];
$hdate=$_POST['hdate'];
$cusID=$_POST['cusID'];
$ntime=$_POST['ntime'];

$main=$_POST['main'];
$sub=$_POST['sub'];


$sql="INSERT INTO  infor_inform (main, sub, descrip, hdate, cusID, ntime)
		VALUES ('$main', '$sub', '$descrip', '$hdate', '$cusID', '$ntime')";


mysql_query($sql) or die ("ข้อมูลผิดพลาด".mysql_error());

echo "<script>alert('เพิ่มข้อมูลแจ้งซ่อมสำเร็จ');</script>";
echo "<script>window.open('inform_repair.php','_self')</script>";


?>