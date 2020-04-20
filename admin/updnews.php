<?php

session_start();

if(empty($submit))
{

require '../db/connect.php';

$id_news=$_POST['id_news'];
$topic_n=$_POST['topic_n'];
$info_n=$_POST['info_n'];

$sql = "UPDATE  news SET  id_news = '$id_news',
                          topic_n = '$topic_n',
                          info_n  = '$info_n'
                          WHERE id_news  = '$id_news'";

if(mysql_query($sql)){
	
echo "<script>window.open('addnews.php','_self')</script>";
}
else{
echo "<script>alert('fail')</script>";
echo "<script>window.open('','_self')</script>";

}
}
?>