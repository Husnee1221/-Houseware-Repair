<?php
if(empty($submit))
{

require '../db/connect.php';

$cusID=$_POST['cusID'];
$cusUsername=$_POST['cusUsername'];
$cusName=$_POST['cusName'];
$cusEmail=$_POST['cusEmail'];
$cusAddress=$_POST['cusAddress'];
$cusPhone=$_POST['cusPhone'];
$cusPassword=$_POST['cusPassword'];



$sql = "UPDATE  customers SET cusID = '$cusID', cusUsername = '$cusUsername',cusName  = '$cusName',
cusEmail = '$cusEmail',cusAddress = '$cusAddress' ,cusPhone = '$cusPhone',cusPassword = '$cusPassword' 


WHERE cusID = '$cusID'";

 
if(mysql_query($sql)){
	
    echo "<script>window.open('profile.php','_self')</script>";
}
else{
echo "<script>alert('fail')</script>";
echo "<script>window.open('','_self')</script>";

}
}
?>