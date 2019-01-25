<?php 
	$servername = "localhost";
	$username = "user_for_demoDB";
	$password = "123456";
	$database = "demoDB";

	$conn = mysqli_connect($servername, $username, $password, $database)
			or die("連線失敗".mysqli_connect_error());

	mysqli_query($conn,"SET NAMES UTF8");

	$u_name = $_POST["username"];
	$u_pwd = $_POST["pwd"];
	$u_email = $_POST["email"];


	//判斷資料庫中是否有相同的帳號********
	$to_sql = "SELECT Username FROM userdata
	WHERE Username = '$u_name' ";

	$result = mysqli_query($conn, $to_sql);

	if(mysqli_num_rows($result) > 0){
		echo "此帳號有重複";
	}else{
		$sql = "INSERT INTO userdata (ID, Username, Password, Email)
			VALUES ('', '$u_name', '$u_pwd','$u_email')";

		if(mysqli_query($conn, $sql)){
			echo "創建帳號成功";
		}else{
			echo "創建帳號失敗";
		}
	//-------------------------------
		
	mysqli_close($conn);
	}







	


 ?>