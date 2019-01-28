<?php 

require_once('dbtools.inc.php');

$link = create_connection();

if (!$link) {
	die("connection error".mysqli_connect_error());
}

$sql = 'SELECT * FROM hoteldata';

$result = execute_sql($link,'hotel',$sql);

$arr = array();

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}
}else{
	echo "no data";
}


echo json_encode($arr);

mysqli_close($link);


?>