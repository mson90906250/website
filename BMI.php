<?php 
header("Access-Control-Allow-Origin:*");//使所有使用者可以取得echo裡的資料

$name = $_POST[name];
$weight = $_POST[kg];
$height = $_POST[cm]/100;
$BMI = $weight/($height*$height);

echo $name."你好<br>你的BMI為: ".round($BMI,2)."<br>屬於:";
if ($BMI>25) {
	echo "過重";
}elseif ($BMI<18) {
	echo "過輕";
}else{
	echo "正常";
}


 ?>