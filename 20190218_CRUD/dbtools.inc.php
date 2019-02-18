<?php 

function create_connection(){
	
	//建立連線,但尚未選擇哪一個資料庫
	$link = mysqli_connect("localhost","admin","123456") or die("無法連線".mysqli_connect_error());//or 跟 if的用法很像

	//解決中文亂碼
	mysqli_query($link,"SET NAMES UTF8");

	return $link;
}
//執行sql語法
function execute_sql($link,$dbname,$sql){
	//選擇資料庫
	mysqli_select_db($link,$dbname) or die("無法與資料庫建立連線".mysqli_connect_error());
	//執行sql語法
	$result = mysqli_query($link,$sql);
	
	return $result;
}


 ?>