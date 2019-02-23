<?php 
	session_start();
	if (isset($_SESSION['username']) {
		$Username = $_SESSION['username'];
	}

	require_once "../dbtools.inc.php";

	$link = create_connection();
	//$sql = "SELECT * FROM member ORDER BY id ASC";

	//抓一筆資料
	$sql = "SELECT * FROM member WHERE username = '$Username'";
	$result = execute_sql($link,"demoDB",$sql);

	//確認有無資料
	if(mysqli_num_rows($result) > 0){
		$output = mysqli_fetch_assoc($result);
		switch ($output['usertype']) {
			case 'n':
				$data[] = $output;
				echo json_encode($data);
				break;
			case 'a':
				$sql = "SELECT * FROM member";
				$result = execute_sql($link,"demoDB",$sql);
				while($output = mysqli_fetch_assoc($result)){
					$data[] = $output;
				}
				echo json_encode($data);
				break;
			
		}
	}else{
		echo "沒有資料";
	}

	$link->close();
 ?>