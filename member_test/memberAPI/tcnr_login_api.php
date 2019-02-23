<?php
session_start();
	if (isset($_SESSION['username'])){
		$Username = $_SESSION['username'];
	}else{
		echo "123";
	}
$query_type = $_GET['query_type'];

$Username = $_POST["username"];
$Password = $_POST["password"];

require_once "../dbtools.inc.php";
$link = create_connection();

//測試帳號密碼是否正確
//$sql = "SELECT * FROM members_test WHERE username = 'owner01' AND password = '1234567890' ";
$sql = "SELECT * FROM member_test WHERE username = '$Username' AND password = '$Password' ";


	$result=execute_sql($link, "demoDB", $sql);
	if(mysqli_num_rows($result) ==1){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['usertype'] =$row['usertype']; 
		$_SESSION["username"] =$Username;
		echo"1";//成功
	}else{
		echo "0";
	}

	$link->close();
?>