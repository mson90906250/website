<?php 

	$Username = $_POST["username"];
	$Password = $_POST["password"];
	$Bday = $_POST["bday"];
	$Sex = $_POST["sex"];

	require_once("../dbtools.inc.php");

	$link = create_connection();

	$sql = "INSERT INTO member(username,password,bday,sex) VALUES ('$Username','$Password','$Bday','$Sex')";

	if(execute_sql($link,"demoDB",$sql)){
		echo "login success";
	}else{
		echo "login fail";
	}

	$link->close();


 ?>