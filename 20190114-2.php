<?php 
require_once("dbtools.inc.php");
$link = create_connection();

mysqli_query($link,"SET NAMES UTF8");

$sql = "INSERT INTO product (book_id,image_name,description) 
		VALUES ('8','cat02.jpg','各位本地下載在此用來一路奇怪，爭取外觀轉貼但是紛紛他就怎麼樣老婆一點場所面議報告寬頻對，遠程北方幻。')";
$dbname = "demoDB";
if (execute_sql($link,$dbname,$sql)) {
	echo "success";
}else{
	echo "fail";
}


 ?>

 <!--  -->
 <!-- image_name	description
 各位本地下載在此用來一路奇怪，爭取外觀轉貼但是紛紛他就怎麼樣老婆一點場所面議報告寬頻對，遠程北方幻。 -->