

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width,initial-scale=1">
 	<title>Document</title>
 	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
 	<link rel="stylesheet" href="css/listview-grid.css" type="text/css">
 	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
 	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
 </head>
 <style>
 	.pop{
 		margin: 0 auto 0 auto;
 		text-align: center;
 	}
 </style>
 
 <body>
 	<!-- Home -->
 	<div data-role="page" id="home" class="my-page">
 		
 		<div data-role="header" data-position="fixed" data-theme="b">
 			<h1>Home</h1>
 		</div>
 		<!-- header end -->
 		
 		<div role="main" class="ui-content">
			<?php 

			$servername = "localhost";
			$username = "user_for_demoDB";
			$password = "123456";
			$dbname = "demoDB";


			//make connect
			 $conn = mysqli_connect($servername,$username,$password,$dbname);
			//使中文不亂碼
			 mysqli_query($conn,"SET NAMES UTF8");
			//check connect
			 if(!$conn){
			 	die("無法連線".mysqli_connect_error());
			 }else{
			 	$sql = "SELECT book_id,image_name,description FROM product";
			 	$result = mysqli_query($conn,$sql);
			 	//check 有無data
			 	if(mysqli_num_rows($result)>0){
			 		echo '<ul data-role="listview" data-inset="true">';
			 		while ($row = mysqli_fetch_assoc($result) ){
			 			
			 			
			 			echo '<li><a href="#'.$row["book_id"].'" data-rel="popup" data-position-to="window"><img src="image/'.$row["image_name"].'" width="500px" height="400px" class="ui-li-thumb"><h2 style="text-shadow:none;color:orange">編號: '.$row["book_id"].'</h2><p class="ui-li-aside" style="text-shadow:none">編號: '.$row["book_id"].'</p></a></li><div  id="'.$row["book_id"].'" data-role="popup" data-dismissible="false"><a href="#" data-rel="back" data-role="button" data-icon="delete" data-iconpos="notext" class="ui-btn-right" >back</a>	<div class="pop"><img class="popup_img" src="image/'.$row["image_name"].'" alt=""></div><p>編號: '.$row["book_id"].'</p><p>描述: '.$row["description"].'</p></div>';


			 			/*echo '<a href="#'.$row["book_id"].'" data-rel="popup" data-position-to="window"><img src="image/'.$row["image_name"].'" alt="" width="49%"></a><div id="'.$row["book_id"].'" data-role="popup" data-dismissible="false"><a href="#" data-rel="back" data-role="button" data-icon="delete" data-iconpos="notext" class="ui-btn-right" >back</a>	<img src="image/'.$row["image_name"].'" alt=""><p>編號: '.$row["book_id"].'</p><p>描述: '.$row["description"].'</p></div>';*/


			 			/*echo '<div><img src="image/'.$row["image_name"].'" alt="" width="50%"><br>ID: '.$row["book_id"].'<br>描述: '.$row["description"].'<br></div>';*/
			 			//echo "ID: ".$row["book_id"]." 圖片: ".$row["image_name"]." 描述: ".$row["description"]."<br>";
			 		}	
			 		echo '</ul>';
			 	}else{
			 		echo "no data";
			 	}
			 }

			 ?> 			
 		</div>
 		<!-- main end -->
 		
 		<div data-role="footer" data-position="fixed" data-theme="b">
 			<h3>footer</h3>
 		</div>
 		<!-- footer end -->
 	</div>
 	<!-- Home end -->
 	
 </body>
 </html>

 <!-- <div>
 	<ul data-role="listview" data-inset="true">
 		<li><a href="#">
 		 <img src="image/AEN003400.jpg">
 		 <h2>編號: id</h2>
 		 <p>描述: desc</p>
 		 <p class="ui-li-aside">編號: id</p>
 		 </a></li>
 	</ul>
 </div> -->
 
<!-- <div>
	<a href="#" data-rel="popup" data-position-to="window">
		<img src="image/ACL037300.jpg" alt="" width="49%">
	</a>
	<div id="pop_1" data-role="popup" data-dismissible="false">
		<a href="#" data-rel="back" data-icon="delete" data-iconpos="notext" class="ui-btn-right" >back</a>
		<img src="image/AEB003100.jpg" alt="">
		<p>編號: id</p>
		<p>描述: desc</p>
	</div>

</div>

<ul data-role="listview">
	<li><a href="#pop_1"><img src="image/AEB003100.jpg" alt=""><h3>編號: id</h3></a></li>
</ul> -->


 <!-- <div>
 	<a href="#pop_1" data-rel="popup" data-position-to="window"> 
 		<img src="image/AEB002800.jpg" alt="" width="49%">
 	</a>
 	<div id="pop_1" data-role="popup" data-dismissible="false">
 		<a href="#" data-rel="back" data-role="button" data-icon="delete" data-iconpos="notext" class="ui-btn-right"></a>
 		<img src="image/AEB002800.jpg" alt="">
 		<p>編號: ID</p>
 		<p>描述: desc</p>
 	</div>
 	
 </div> -->


<!-- <?php 

	$servername = "localhost";
	$username = "user_for_demoDB";
	$password = "123456";
	$dbname = "demoDB";

	//make connect
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	//check connect
	if(!$conn){
		die("Connection error".mysqli_connect_error());
	}else{
		$sql = "SELECT ID,Username,Age FROM userdata";
		$result = mysqli_query($conn,$sql);
		//check 有無data
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				echo "ID: ".$row["ID"]." Username: ".$row["Username"]." Age: ".$row["Age"]."<br>";
			}
		}else{
			echo "no data";
		}
	}

 ?> -->


<!-- <?php 

	$servername = "localhost";
	$username = "user_for_demoDB";
	$password = "123456";
	$dbname = "demoDB";

	//建立連線
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	//check 連線是否建立
	if(!$conn){
		die("無法建立連線".mysqli_connect_error());
	}else{
		//從userdata的資料表中取出ID,Username,Age的欄位
		$sql = "SELECT ID,Username,Age FROM userdata";//此時尚未執行sql語法
		$result = mysqli_query($conn,$sql);//執行sql語法;
		//確認$resuslt是否有資料
		if(mysqli_num_rows($result)>0){
			//從$result中抓取一筆資料,並給$row接收
			while($row = mysqli_fetch_assoc($result)){
				echo "ID: ".$row["ID"]." Username: ".$row["Username"]." Age: ".$row["Age"]."<br>";
			}
				
		}else{
			echo "無資料接收";
		}
	}

 ?> -->