<?php 
header("Access-Control-Allow-Origin:*");//使所有使用者可以取得echo裡的資料
//建立連線
$servername = "localhost";
$username = "user_for_demoDB";
$password = "123456";
$dbname = "demoDB";



//建立連線
$link = mysqli_connect($servername,$username,$password,$dbname) or die("connect error".mysqli_connect_error());
//處理中文亂碼
mysqli_query($link,"SET NAMES UTF8");

//模擬從前台接收資料
$img = $_POST["img"];//將接收到的圖片名稱資料放進$img裡
$des = $_POST["des"];//將接收到的圖片敘述資料放進$des裡


//執行sql語法
$sql = "INSERT INTO product (book_id,image_name,description) 
		VALUES ('','$img','$des')";

if(mysqli_query($link,$sql)){
	echo "新增成功";
}else{
	echo "新增失敗";
}

 ?>

 