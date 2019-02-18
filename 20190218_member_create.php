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
				<input type="text" name="username" id="username">
			</div>
			<div id="msg_username"></div>

			<div data-role="fieldcontain">
				<label for="password">密碼:</label>
				<input type="password" name="password" id="password">
			</div>
			<div id="msg_password"></div>

			<div data-role="fieldcontain">
				<label for="bday">生日:</label>
				<input type="date" name="bday" id="bday">
			</div>
			<div data-role="fieldcontain">
				<label for="sex">性別:</label>
				<select name="sex" id="sex" data-role="slider">
					<option value="female">女</option>
					<option value="male">男</option>
				</select>
			</div>

			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b" id="cancel">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="reg_ok">註冊</a>
				</div>
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
		var flag_user,flag_pwd;

		$(function(){

			$("#username").on("input propertychange",function(){
				if ($("#username").val().length < 5) {
					$("#msg_username").html("帳號不得少於5個字");
					$("#msg_username").css({"background-color":"red","color":"white"});
					flag_user = false;
				}else{
					$("#msg_username").html("");
					flag_user = true;
				}
			});

			$("#password").on("input propertychange",function(){
				if ($("#password").val().length < 10) {
					$("#msg_password").html("帳號不得少於10個字");
					$("#msg_password").css({"background-color":"red","color":"white"});
					flag_pwd = false;
				}else{
					$("#msg_password").html("");
					flag_pwd = true;
				}
			})

			$("#reg_ok").on("click",reg);
			$("#cancel").on("click",function(){
				flag_user = false;
				flag_pwd = false;
				$("#username").val("");
				$("#password").val("");
				$("#msg_username").html("");
				$("#msg_password").html("");
			})

		});

		function reg(){
			if (flag_pwd&&flag_user) {
				$.ajax({
					type:"POST",
					url:"memberAPI/20190218_member_create_api.php",
					data:{username: $("#username").val(),password: $("#password").val(),bday: $("#bday").val(),sex: $("#sex").val()},
					success:changePage,
					error:function(){
						alert("20190218_member_create_api.php 回傳失敗");
					}
				});
			}else{
				alert("帳號或密碼不符合規定");
			}
		}

		function changePage(data){
			if(data == "login success"){
				location.href = "./20190218-member-read.php";
			}else{
				alert("註冊失敗!");
			}
		}
	</script>
	
</body>
</html>