<?php 
	require_once("dbtools.inc.php");
	$link = create_connection();
	$sql = "SELECT Username FROM userdata";

	$result = execute_sql($link,"demoDB",$sql);
	if (mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){
			$myarray[] = $row;
		}
		echo json_encode($myarray);
	}else{
		echo "no data";
	}
 ?>