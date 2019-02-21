<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
</head>

<body>
	<!-- Home -->
	<div data-role="page" id="home">
		
		<div data-role="header" data-position="fixed" data-theme="b">
			<h1>Home</h1>
		</div>
		<!-- header end -->
		
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="username">帳號:</label>
				<input type="text" name="username" id="username" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}  ?>">
			</div>
			<div id="msg_username"></div>

			<div data-role="fieldcontain">
				<label for="password">密碼:</label>
				<input type="password" name="password" id="password">
			</div>
		</div>

		<div class="ui-grid-a">
			<div class="ui-block-a">
				<a href="#" data-role="button" data-theme="b" id="cancel">取消</a>
			</div>
			<div class="ui-block-b">
				<a href="#" data-role="button" data-theme="b" id="login_ok">登入</a>
			</div>
		</div>
		<!-- main end -->
		
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h3>footer</h3>
		</div>
		<!-- footer end -->
	</div>
	<!-- Home end -->
	
	<script>
		$(function(){
			$("#login_ok").on("click",function(){
				$.ajax({
					type:"POST",
					url:"memberAPI/20190218_member_login_api.php",
					data:{username:$("#username").val() ,password:$("#password").val()},
					success:goToConsole,
					error:function(){
						alert("20190218_member_login_api.php回傳失敗");
					}
				})
			})
		});

		function goToConsole(data){
			if(data == "login success"){
				location.href = "20190218_main.php";
			}else{
				alert(data);
			}
		}
	</script>
</body>
</html>