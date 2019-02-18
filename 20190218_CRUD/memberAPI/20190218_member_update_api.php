<?php 
	
	$ID = $_POST["id"];
	$Username = $_POST["username"];
	$Password = $_POST["password"];
	$Bday = $_POST["bday"];
	$Sex = $_POST["sex"];

	require_once "../dbtools.inc.php";
	$link = create_connection();

	//判斷帳號是否已被使用
	$sql = "SELECT * FROM member WHERE id = '$ID'";
	$result = execute_sql($link,"demoDB",$sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0&& $Username!= $row['username']) {
		
		echo false;

	}else{

		$sql = "UPDATE member SET username = '$Username',password = '$Password',bday = '$Bday',sex = '$Sex' WHERE id = '$ID'";

		$result = execute_sql($link,"demoDB",$sql);

		echo $result;
	}



	
	

	$link->close();


 ?>