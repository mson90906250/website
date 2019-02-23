<?php 
	
	$query_type = $_GET['query_type'];
	$ID = $_GET['id'];

	require_once "../dbtools.inc.php";
	$link = create_connection();
	
	switch ($query_type) {
		case "delete":
			$sql = "DELETE FROM member_test WHERE id = '$ID'";
			break;
	}
	

	execute_sql($link,"demoDB",$sql);
	header("Location: ../tcnr_member01.php");

	mysqli_close($link);


 ?>