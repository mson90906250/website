<?php 
	header("Access-Control-Allow-Origin:*");//使所有使用者可以取得echo裡的資料
	
	require_once("dbtools.inc.php");
	$link = create_connection();
	$sql = "SELECT*FROM product";
	$result = execute_sql($link,"demoDB",$sql);
	if(mysqli_num_rows($result)>0){
					
			/*//echo $row["book_id"].$row["image_name"].$row["description"];
			//將資料轉成json格式
			//處理單筆資料寫法
			$row = mysqli_fetch_assoc($result);
			//echo json_encode(array("book_id" => $row["book_id"],"image_name" => $row["image_name"],"description" => $row["description"]));
			echo json_encode($row);*/
			
			//處理多筆資料
			//$myarray = array();可寫可不寫
			while ($row = mysqli_fetch_assoc($result)) {
				$myarray[] = $row;
			}
			echo json_encode($myarray);


			
		
	}else{
		echo "無資料";
	}

 ?>