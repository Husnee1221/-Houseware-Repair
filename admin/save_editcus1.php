<?php

require '../db/connect.php';

if(isset($_POST['member_fullname']) && isset($_POST['member_phone'])){
    
	$member_id = $_GET['id'];
	$member_idcard = $_POST['member_idcard'];
	$member_username = $_POST['member_username'];
	$member_fullname = $_POST['member_fullname'];
	$member_phone = $_POST['member_phone'];
	$member_email = $_POST['member_email'];



    $sql = "UPDATE member SET   member_idcard = '$member_idcard', 
                                member_username = '$member_username',
                                member_fullname = '$member_fullname', 
                                member_phone = '$member_phone', 
                                member_email = '$member_email'

	        WHERE member_id = '$member_id'";


	if($db->query($sql)){
		$db->close();
		header("Location: ../index.php?page=edit_member&id=".$member_id."&success=1");

	}else{
		echo $db->error;
		$db->close();
	}
}
?>