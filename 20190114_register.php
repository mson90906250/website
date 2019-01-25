<?php 
$servername = "localhost";
$username = "user_for_demoDB";
$password = "123456";
$dbname = "demoDB";

//建立連線
$link = mysqli_connect($servername,$username,$password,$dbname) or die("無法建立連線".mysqli_connect_error());
//處理中文亂碼
mysqli_query($link,"SET NAMES UTF8");

//接收前臺的資料
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

//執行sql語法
$sql = "INSERT INTO userdata (Username,Password,Email) VALUES ('$username','$pwd','$email')";

if(mysqli_query($link,$sql)){
	echo "新增成功";
}else{
	echo "新增失敗";
}

mysqli_close($link);

 ?>