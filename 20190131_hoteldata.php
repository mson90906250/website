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
				<label for="hotelname">飯店名稱:</label>
				<input type="text" name="hotelname" id="hotelname">
			</div>
			<div id="msg_hotelname"></div>

			<div data-role="fieldcontain">
				<label for="category">種類</label>
				<select name="category" id="category">
					<option value="汽車旅館">汽車旅館</option>
					<option value="休閒農場">休閒農場</option>
					<option value="民宿">民宿</option>
					<option value="飯店">飯店</option>
					<option value="酒店">酒店</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="addr">地址:</label>
				<input type="text" name="addr" id="addr">
			</div>
			<div id="msg_addr"></div>

			<div data-role="fieldcontain">
				<label for="tel">電話:</label>
				<input type="text" name="tel" id="tel">
			</div>
			<div id="msg_tel"></div>

			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="send">送出</a>
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
	<!-- javascript -->
	<script>
		var flag_name,flag_addr,flag_tel;

		$(function(){


			$("#send").on("click",function(){
				if(flag_name&&flag_addr&&flag_tel){
					$.ajax({
						type:"POST",
						url:"hotel_api_c.php",
						data:{hotelname:$("#hotelname").val(),category:$("#category").val(),addr:$("#addr").val(),tel:$("#tel").val()},
						success:function(){
							alert("新增成功");
						},
						error:function(){
							alert("新增失敗");
						}

					});
				}else{
					alert("所有欄位需符合規定!!!");
				}
			});

			$("#hotelname").on("input propertychange",function(){
				if($("#hotelname").val().length<4){
					$("#msg_hotelname").html("名稱不得少於4個字");
					$("#msg_hotelname").css({"color":"white","background-color":"red"});
					flag_name = false;
				}else{
					$("#msg_hotelname").html("");
					flag_name = true;
				}
			});

			$("#addr").on("input propertychange",function(){
				if($("#addr").val().length<10){
					$("#msg_addr").html("地址不得少於10個字");
					$("#msg_addr").css({"color":"white","background-color":"red"});
					flag_addr = false;
				}else{
					$("#msg_addr").html("");
					flag_addr = true;
				}
			});

			$("#tel").on("input propertychange",function(){
				if($("#tel").val().length<10){
					$("#msg_tel").html("電話不得少於10個字");
					$("#msg_tel").css({"color":"white","background-color":"red"});
					flag_tel = false;
				}else{
					$("#msg_tel").html("");
					flag_tel = true;
				}
			});
		})
	</script>
	
</body>
</html>