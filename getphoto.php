<?php 
header("Access-Control-Allow-Origin:*");//使所有使用者可以取得echo裡的資料
	require_once("dbtools.inc.php");
	$link = create_connection();
	$sql = "SELECT * FROM exam";

	$result = execute_sql($link,"test",$sql);
	if (mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){
			$myarray[] = $row;
		}
		echo json_encode($myarray);
	}else{
		echo "no data";
	}
 ?>