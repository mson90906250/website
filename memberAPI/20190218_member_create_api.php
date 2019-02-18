<?php 

	$Username = $_POST["username"];
	$Password = $_POST["password"];
	$Bday = $_POST["bday"];
	$Sex = $_POST["sex"];

	require_once("../dbtools.inc.php");

	$link = create_connection();

	//判別帳號是否已被註冊
	$sql = "SELECT * FROM member WHERE username = '$Username'";
	$Result = execute_sql($link,"demoDB",$sql);

	if(mysqli_num_rows($Result) >= 1){
		echo "此帳號已被使用,請更換";
	}else{
		$sql = "INSERT INTO member(username,password,bday,sex) VALUES ('$Username','$Password','$Bday','$Sex')";

		if(execute_sql($link,"demoDB",$sql)){
			echo "register success";
		}else{
			echo "register fail";
		}
	}

	
	$link->close();


 ?>