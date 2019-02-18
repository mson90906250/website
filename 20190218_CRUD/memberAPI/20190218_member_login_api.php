<?php 

	$Username = $_POST["username"];
	$Password = $_POST["password"];
	
	require_once "../dbtools.inc.php";

	$link = create_connection();
	$sql = "SELECT * FROM member WHERE username = '$Username' AND password = '$Password'";

	$Result = execute_sql($link,"demoDB",$sql);

	if(mysqli_num_rows($Result) == 1){
		echo "login success";
	}else{
		echo "login fail";
	}

	$link->close();


 ?>