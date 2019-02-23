<?php
$id=$_POST["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$usertype="n";

	require_once("../dbtools.inc.php");
	$link=create_connection();
	$sql = "UPDATE member_test SET username='$username', password='$password', email = '$email', usertype= '$usertype' WHERE id='$id'";

	if(execute_sql($link, "demoDB", $sql)){
		echo "1";//成功
	}else{
		echo "0";
	}


?>