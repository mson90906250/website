<?php
session_start();

//$_SESSION["username"] = $_POST["username"];
	header('Access-Control-Allow-Origin:*');

$Username = $_POST["username"];
$Password = $_POST["password"];
$Email = $_POST["email"];

require_once("../dbtools.inc.php");
$link = create_connection();

$sql = "INSERT INTO member_test (id, username, password, usertype, email) 
	Values('', '$Username', '$Password', 'n', '$Email')";
if(execute_sql($link, "demoDB", $sql)){
	echo "reg sucess";
}else{
	echo "reg fail";
}

?>