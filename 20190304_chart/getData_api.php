<?php 
	
	$link = mysqli_connect("localhost","admin","123456","demoDB") or die("無法連線 ".mysqli_connect_error());
	$link->query("SET NAMES UTF8");
	
	//$result = $link->query("SELECT * FROM profit");
	$result = $link->query("SELECT COUNT(addr) AS region,addr FROM profit GROUP BY addr");

	$output = array();

	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$output[] = $row;
		}
	}else{

		$link->close();
		die("No Data in $result");
	}

	//var_dump($output);

	echo json_encode($output);
	$link->close();

 ?>