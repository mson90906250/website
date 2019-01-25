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
			$( document ).on( "swipeleft swiperight", "#Register", function( e ) {
			 // We check if there is no open panel on the page because otherwise
			 // a swipe to close the left panel would also open the right panel (and v.v.).
			 // We do this by checking the data that the framework stores on the page element (panel: open).
				 if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
					 if ( e.type === "swipeleft" ) {
					 	$( "#right-panel" ).panel( "open" );
					 } else if ( e.type === "swiperight" ) {
					 	$( "#left-panel" ).panel( "open" );
					 }
				 }
			 });
			//Register部分
			$("#Register_username").bind("input propertychange",Register_checkUser);
			$("#Register_pwd").bind("input propertychange",Register_checkPwd);
			$("#Register_confirm").bind("input propertychange",Register_checkCon);
			$("#Register_email").bind("input propertychange",Register_checkEmail);
			$("#Register_btn_send").bind("click",Register_send);
			$("#Register_btn_cancel").on("click",function(){
				window.history.back(-1);
			});
		});

		function Register_checkUser(){
			if ($("#Register_username").val().length>5) {
				$("#Register_msg_username").text("");
				return true;
			}else{
				$("#Register_msg_username").css("color","red");
				$("#Register_msg_username").text("需大於5個字!!!");
				return false;
			}
		}
		function Register_checkPwd(){
			if ($("#Register_pwd").val().length>8) {
				$("#Register_msg_pwd").text("");
				return true;
			}else{
				$("#Register_msg_pwd").css("color","red");
				$("#Register_msg_pwd").text("需大於8個字!!!");
				return false;
			}
		}
		function Register_checkCon(){
			if ($("#Register_confirm").val()==$("#pwd").val()) {
				$("#Register_msg_confirm").text("");
				return true;
			}else{
				$("#Register_msg_confirm").css("color","red");
				$("#Register_msg_confirm").text("與密碼不吻合!!");
				return false;
			}
		}
		function Register_checkEmail(){
			if ($("#Register_email").val().length>10) {
				$("#Register_msg_email").text("");
				return true;
			}else{
				$("#Register_msg_email").css("color","red");
				$("#Register_msg_email").text("需大於10個字!!!");
				return false;
			}
		}
		function Register_send(){
			//確認所有欄位是否皆符合規定
			if (Register_checkUser()&&Register_checkPwd()&&Register_checkCon()&&Register_checkEmail()) {
				//double check
				if (confirm("確定要送出????")) {
					alert("登入成功");
					// $.ajax({
					// 	type: "POST",
					// 	url: "http://192.168.60.101/website/20190114_register.php",
					// 	data: {username:$("#username").val(),pwd:$("#pwd").val(),email:$("#email").val()},
					// 	success: Register_show,
					// 	error: function(){
					// 		alert("儲存失敗");
					// 	}
					// })
				}	
			}else{
				alert("所有欄位皆要符合規定!!!!");
			}
			
		}
		function Register_show(data){
			alert(data);
		}

		/*//panel
		function swipe(e){
			 // We check if there is no open panel on the page because otherwise
			 // a swipe to close the left panel would also open the right panel (and v.v.).
			 // We do this by checking the data that the framework stores on the page element (panel: open).
			 if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
			 if ( e.type === "swipeleft" ) {
			 $( "#right-panel" ).panel( "open" );
			 } else if ( e.type === "swiperight" ) {
			 $( "#left-panel" ).panel( "open" );
			 }
			 }
			 
		}*/

	</script>
</head>

<body>
	<!-- Register -->
	<div data-role="page" id="Register">

		<div data-role="panel" id="left-panel" data-theme="b" >
			  
		</div><!-- /panel -->
		<div data-role="panel" id="right-panel" data-display="push" data-position="right" data-theme="c">
		 					
		</div><!-- /panel -->
	
		<div data-role="header" data-position="fixed" data-theme="b">
			<h1>會員註冊</h1>
			<a href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" datashadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>
			 <a href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" datashadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>
		</div>
		<!-- header end -->
		
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="Register_username">帳號:</label>
				<input type="text" name="Register_username" id="Register_username">
			</div>
			<div id="Register_msg_username"></div>

			<div data-role="fieldcontain">
				<label for="Register_pwd">密碼:</label>
				<input type="password" name="Register_pwd" id="Register_pwd">
			</div>
			<div id="Register_msg_pwd"></div>

			<div data-role="fieldcontain">
				<label for="Register_confirm">確認密碼:</label>
				<input type="password" name="Register_confirm" id="Register_confirm">
			</div>
			<div id="Register_msg_confirm"></div>

			<div data-role="fieldcontain">
				<label for="Register_email">信箱:</label>
				<input type="email" name="Register_email" id="Register_email">
			</div>
			<div id="Register_msg_email"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="Account.php" data-role="button" id="Register_btn_cancel" data-theme="b">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" id="Register_btn_send" data-theme="b">送出</a>
				</div>
			</div>
			<div id="msg"></div>
			
			
		</div>
		<!-- main end -->
		
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h3></h3>
		</div>
		<!-- footer end -->
	</div>
	<!-- Register end -->
	
	
</body>
</html>