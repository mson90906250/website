<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
	<script>
		
		$(function(){
			$("#username").bind("input propertychange",checkUser);
			$("#pwd").bind("input propertychange",checkPwd);
			$("#confirm").bind("input propertychange",checkCon);
			$("#email").bind("input propertychange",checkEmail);
			$("#btn_send").bind("click",send);
		})

		function checkUser(){
			if ($("#username").val().length>5) {
				$("#msg_username").text("");
				return true;
			}else{
				$("#msg_username").css("color","red");
				$("#msg_username").text("需大於5個字!!!");
				return false;
			}
		}
		function checkPwd(){
			if ($("#pwd").val().length>8) {
				$("#msg_pwd").text("");
				return true;
			}else{
				$("#msg_pwd").css("color","red");
				$("#msg_pwd").text("需大於8個字!!!");
				return false;
			}
		}
		function checkCon(){
			if ($("#confirm").val()==$("#pwd").val()) {
				$("#msg_confirm").text("");
				return true;
			}else{
				$("#msg_confirm").css("color","red");
				$("#msg_confirm").text("與密碼不吻合!!");
				return false;
			}
		}
		function checkEmail(){
			if ($("#email").val().length>10) {
				$("#msg_email").text("");
				return true;
			}else{
				$("#msg_email").css("color","red");
				$("#msg_email").text("需大於10個字!!!");
				return false;
			}
		}
		function send(){
			//確認所有欄位是否皆符合規定
			if (checkUser()&&checkPwd()&&checkCon()&&checkEmail()) {
				//double check
					if (confirm("確定要送出????")) {
						$.ajax({
							type: "POST",
							url: "http://192.168.60.101/website/register.php",//
							data: {username:$("#username").val(),pwd:$("#pwd").val(),email:$("#email").val()},
							success: show,
							error: function(){
								alert("儲存失敗");
							}
						})
					}	
				
					
				
			}else{
				alert("所有欄位皆要符合規定!!!!");
			}
			
		}
		function show(data){
			alert(data);
		}
		/*function getUserdata(){
			$.ajax({
				type:"GET",
				url:"http://192.168.60.101/website/20190114_get_userdata.php",
				dataType:"Json",
				success: check,
				error: function(){
					alert("無法取得比對用的資料");
				}
			});
		}
		function check(data){
			for(i = 0; i<data.length; i++){
				if($("#username").val()==data[i].Username){
					flag = 1;
					return;
				}else{
					flag = 0;
				}
			}
		}*/
	</script>
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
			<div id="msg_username02"></div>

			<div data-role="fieldcontain">
				<label for="pwd">密碼:</label>
				<input type="password" name="pwd" id="pwd">
			</div>
			<div id="msg_pwd"></div>

			<div data-role="fieldcontain">
				<label for="confirm">確認密碼:</label>
				<input type="password" name="confirm" id="confirm">
			</div>
			<div id="msg_confirm"></div>

			<div data-role="fieldcontain">
				<label for="email">信箱:</label>
				<input type="email" name="email" id="email">
			</div>
			<div id="msg_email"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" id="btn_cancel" data-theme="b">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" id="btn_send" data-theme="b">送出</a>
				</div>
			</div>
			<div id="msg"></div>
			
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