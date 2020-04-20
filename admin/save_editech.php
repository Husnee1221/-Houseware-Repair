<html>
<body>
        <?php

            error_reporting(E_ALL ^ E_WARNING); 
            error_reporting(0);
             
            
            $id_tech = $_POST['id_tech'];
    

        $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
        $objDB = mysql_select_db("housewares_repairing");
        $strSQL = "UPDATE technicain SET ";
        $strSQL .="id_tech = '".$_POST["txtTechID"]."' ";
        $strSQL .=",username_tech = '".$_POST["txtUsername"]."' ";
        $strSQL .=",address_tech = '".$_POST["txtAddress"]."' ";
        $strSQL .=",phone_tech = '".$_POST["txtNumphone"]."' ";
        $strSQL .=",email_tech = '".$_POST["txtEmail"]."' ";
        $strSQL .=",password_tech = '".$_POST["txtPassword"]."' ";
       
       
$strSQL .="WHERE id_tech = '".$_GET["id_tech"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{      
    echo "<script>alert('ข้อมูลได้บันทึกเรียบร้อย' )</script>";
	echo "<script>window.open('admin_infotech.php','_self')</script>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>
