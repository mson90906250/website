<?php 
	header("Access-Control-Allow-Origin:*");//使所有使用者可以取得echo裡的資料
	echo "從PHP傳來: ".$_POST[username];
 ?>