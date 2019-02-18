<?php 
	$member_id = $_GET['id'];
	require_once "dbtools.inc.php";
	$link = create_connection();

	$sql = "SELECT * FROM member WHERE id = $member_id";
	$result = execute_sql($link,"demoDB",$sql);

	if(mysqli_num_rows($result) == 1){
		$row = $result->fetch_assoc();
	}else{
		echo "無此帳號";
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>會員更新</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
</head>

<body>
	<!-- Home -->
	<div data-role="page" id="home">
		
		<div data-role="header" data-position="fixed" data-theme="b">
			<h1>會員更新</h1>
		</div>
		<!-- header end -->
		
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="username">帳號:</label>
				<input type="text" name="username" id="username" value="<?php echo $row['username'] ?>">
			</div>
			<div id="msg_username"></div>

			<div data-role="fieldcontain">
				<label for="password">密碼:</label>
				<input type="password" name="password" id="password" value="<?php echo $row['password'] ?>">
			</div>
			<div id="msg_password"></div>

			<div data-role="fieldcontain">
				<label for="bday">生日:</label>
				<input type="date" name="bday" id="bday" value="<?php echo $row['bday'] ?>">
			</div>
			<div data-role="fieldcontain">
				<label for="sex">性別:</label>
				<select name="sex" id="sex" data-role="slider" >
					<option value="female">女</option>
					<option value="male">男</option>
				</select>
			</div>

			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b" id="cancel">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="update_ok">更新</a>
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
		$(function(){
			//根據$row['sex']的值來做開關的切換
			$("#sex").val("<?php echo $row['sex'] ?>").slider("refresh");
			$("#update_ok").on("click",update);
		});

		function update(){
			if($("#username").val().length<5||$("#password").val().length<10){
				alert("帳號或密碼不符合規定");
			}else{
				$.ajax({
					type:"POST",
					url:"memberAPI/20190218_member_update_api.php",
					data:{id:<?php echo $row['id'] ?>,username:$("#username").val(),password:$("#password").val(),bday:$("#bday").val(),sex:$("#sex").val()},
					success:showData,
					error:function(){
						alert("20190218_member_update_api.php回傳失敗");
					}
				});
			}
			
		}

		function showData(data){
			if(data){
				location.href = "20190218_member_read.php";
			}else{
				alert("帳號已被使用請更換");
			}
		}
	</script>
	
</body>
</html>