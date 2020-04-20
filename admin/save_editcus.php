<?php
if(empty($submit))
{
                    session_start();
   
                    include("../db/connection.php");

                    $cusID = $_POST['cusID'];
                    $cusUsername=$_POST['cusUsername'];
                    $cusName=$_POST['cusName'];
                    $cusEmail=$_POST['cusEmail'];
                    $cusAddress=$_POST['cusAddress'];
                    $cusPhone=$_POST['cusPhone'];
                    $cusPassword=$_POST['cusPassword'];
                    $cusStatus=$_POST['cusStatus'];


                    $sql = "UPDATE  customers 


                    SET          cusID = '$cusID'
                                ,cusUsername = '$cusUsername'
                                ,cusName  = '$cusName'
                                ,cusEmail = '$cusEmail'
                                ,cusAddress = '$cusAddress' 
                                ,cusPhone = '$cusPhone'
                                ,cusPassword = '$cusPassword' 
                                ,cusStatus = '$cusStatus' 
                            
            

                    WHERE       cusID = '".$_GET["cusID"]."'"; 

                  

                    if(mysql_query($sql)){
                    
                    echo "<script>window.open('addnews.php','_self')</script>";
                    }
                    else{
                    echo "<script>alert('fail')</script>";
                    echo "<script>window.open('','_self')</script>";
                    
                    }
                    }
                    ?>
<!----admin_infocus.php