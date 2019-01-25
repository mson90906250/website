<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
	<style>
		
	</style>
	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
	<script>
		$(function(){
			$.ajax({
				type: "GET",
				url:"http://192.168.60.101/website/getphoto.php",
				dataType:"Json",
				success: show,
				error: function(){
					alert("接收不到資料");
				}
			});
		});
		function show(data){
			var blk = "a";
			var num = 0;


			for (var i = 0; i<data.length; i++) {
				num = i%3;
				switch(num){
					case 0:
						blk = "a";
						break;	

					case 1:
						blk = "b";
						break;	

					case 2:
						blk = "c";
						break;			
				}


				//$("#msg").append(data[i].book_id+data[i].image_name+data[i].description+"<br>");
				// $("#bbb").append("<div data-role='popup' id='a0"+i+"' data-dismissible='false'><a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a></div>");
				// $("#a0"+i).append("<img src='image/"+data[i].img+"' width='100%' alt=''>");
				// $("#a0"+i).append("<p>品名:"+data[i].Title+"</p>");
				// $("#a0"+i).append("<p>價格:"+data[i].price+"</p>");
				// $("#a0"+i).append("<p>描述:"+data[i].description+"</p>");
				
				$("#aaa").append("<div class='ui-block-"+blk+"'><a href='#a0"+i+"' data-rel='popup' data-position-to='window'><img src='image/"+data[i].img+"' alt='' style='width:20vw'></a></div>");
				

			}

			
		}

	</script>
	<style>
		img{
			text-align: center;
		}
	</style>
</head>
<!-- <div class='ui-block-a'><li><a href='#popop01' data-rel='popup' data-position-to='window'><img src='image/dog02.jpg' alt=''></a></li></div>
<body>
	<li><a href='#popop01' data-rel='popup' data-position-to='window'><img src='image/dog02.jpg' alt=''></a></li>
				
			<div data-role='popup' id='popup0"+i+"' data-dismissible='false'>
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
				<img src='image/"+data[i].img+"' width='100%' alt=''>
				<p>品名:"+data[i].Title+"</p>
				<p>價格:"+data[i].price+"</p>
				<p>描述:"+data[i].description+"</p>
			</div> -->
	<!-- Home -->
	<div data-role="page" id="home">
		
		<div data-role="header" data-position="fixed" data-theme="b">
			<h1>照片集</h1>
		</div>
		<!-- header end -->
		
		<div role="main" class="ui-content" >


			<div class="ui-grid-b"  id="aaa">
				<?php
					require_once("dbtools.inc.php");
					$link = create_connection();
					$sql = "SELECT * FROM exam";
					$num = 0;

					$result = execute_sql($link,"test",$sql);
					if (mysqli_num_rows($result)>0) {
						while($row = mysqli_fetch_assoc($result)){
							echo "<div data-role='popup' id='a0".$num."' data-dismissible='false'>";
							echo "<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>";
							echo "<img src='image/".$row['img']."' width='100%' alt=''>";
							echo "<p>品名:".$row['Title']."</p>";
							echo "<p>價格:".$row['price']."</p>";
							echo "<p>價格:".$row['description']."</p>";
							$num++;
						}
					}else{
						echo "no data";
					}

				?>
			</div>
			<!-- <div data-role="popup" id="a00" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a01" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a02" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a03" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a04" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a05" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a06" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a07" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a08" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a09" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a010" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div>
			<div data-role="popup" id="a011" data-dismissible="false">
				<a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a>
			</div> -->
			<div id="bbb"></div>
			
			
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