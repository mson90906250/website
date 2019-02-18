<?php 

	require_once "../dbtools.inc.php";

	$link = create_connection();
	$sql = "SELECT * FROM member ORDER BY id ASC";

	$result = execute_sql($link,"demoDB",$sql);

	//確認有無資料
	if(mysqli_num_rows($result) > 0){
		while ($output = mysqli_fetch_assoc($result)) {
			$data[] = $output;
		}
		echo json_encode($data);
	}else{
		echo "沒有資料";
	}

	$link->close();
 ?>