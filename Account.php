<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>帳號登入</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
	<script>
		$(function(){
			//給每個頁面做panel
			$( document ).on( "swipeleft swiperight", "#Account", function( e ) {
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
			//Account部分
			$("#Account_btn_login").on("click",Account_check);
			
		});

		//確認帳號,密碼
		function Account_check(){
			if ($("#Account_username").val()=="admin"&&$("#Account_pwd").val()=="123456") {
				alert("登入成功");
			}else{
				alert("帳號或密碼有誤");
			}
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
	<!-- Account -->
	<div data-role="page" id="Account">
		
		<div data-role="panel" id="left-panel" data-theme="b" >
			  
		</div><!-- /panel -->
		<div data-role="panel" id="right-panel" data-display="push" data-position="right" data-theme="c">
		 					
		</div><!-- /panel -->
		
		<div data-role="header" data-position="fixed" data-theme="b">
			<h1>帳號登入</h1>
			<a href="#left-panel" data-theme="d" data-icon="arrow-r" data-iconpos="notext" datashadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open left panel</a>
			 <a href="#right-panel" data-theme="d" data-icon="arrow-l" data-iconpos="notext" datashadow="false" data-iconshadow="false" class="ui-icon-nodisc">Open right panel</a>
		</div>
		<!-- header end -->
		
		<div role="main" class="ui-content">
			
 			<div data-role="fieldcontain">
				<label for="Account_username">帳號:</label>
				<input type="text" name="Account_username" id="Account_username">
			</div>

			<div data-role="fieldcontain">
				<label for="Account_pwd">密碼:</label>
				<input type="password" name="Account_pwd" id="Account_pwd">
			</div>
			<div id="Account_msg_pwd"></div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" id="Account_btn_login" data-theme="b">登入</a>
				</div>
				<div class="ui-block-b">
					<a href="Register.php" data-role="button" id="Account_btn_reg" data-theme="b" data-ajax="false">註冊</a>
				</div>
			</div>
	 		
		</div>
		<!-- main end -->
		
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h3>footer</h3>
		</div>
		<!-- footer end -->
	</div>
	<!-- Account end -->

	

	
	
	
</body>
</html>