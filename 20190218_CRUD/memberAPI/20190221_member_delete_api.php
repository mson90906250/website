<?php 
	$ID = $_GET['id'];


	require_once "../dbtools.inc.php";
	$link = create_connection();
	$sql = "DELETE FROM member WHERE id = $ID"; 

	if(execute_sql($link,"demoDB",$sql)){
		echo '<script>location.href = "../20190218_member_read.php"</script>';//刪除成功 並返回20190218_member_read.php
	}else{
		echo 0;//刪除失敗
	}


 ?>