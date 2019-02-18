<?php 
	require_once "dbtools.inc.php" ;

	$link = create_connection();
	$sql = "SELECT * FROM member ORDER BY id ASC";

	$result = execute_sql($link,"demoDB",$sql);

?>