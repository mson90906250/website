<?php

$id=$_POST["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$usertype=$_POST["usertype"];
$email=$_POST["email"];

	require_once("../dbtools.inc.php");
	$link=create_connection();
	if(isset($_POST["usertype"])){
		$sql = "UPDATE member_test SET username='$username', password='$password', usertype= '$usertype', email = '$email' WHERE id='$id'";
	}else{
		$usertype = "n";
		$sql = "UPDATE member_test SET username='$username', password='$password', usertype= '$usertype' ,email = '$email' WHERE id='$id'";
	}
	

	if(execute_sql($link, "demoDB", $sql)){
		
		echo "1";//成功
	}else{
		echo "0";
	}



?>