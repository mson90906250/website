<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		$Username = $_SESSION['username'];
	}

	$query_type = $_GET['query_type'];

	require_once "../dbtools.inc.php";

	$link = create_connection();
	//$sql = "SELECT * FROM member ORDER BY id ASC";

	switch ($query_type) {
		case 'member':
			//抓一筆資料
			$sql = "SELECT * FROM member_test WHERE username = '$Username' ";
			$result = execute_sql($link,"demoDB",$sql);

			//確認有無資料
			if(mysqli_num_rows($result) > 0){
				$output = mysqli_fetch_assoc($result);
				switch ($output['usertype']) {
					case 'n':
						$_SESSION['usertype'] = $output['usertype'];
						$data[] = $output;
						echo json_encode($data);
						break;
					case 'a':
						$_SESSION['usertype'] = $output['usertype'];
						$sql = "SELECT * FROM member_test ORDER BY id ASC";
						$result = execute_sql($link,"demoDB",$sql);
						while($output = mysqli_fetch_assoc($result)){
							$data[] = $output;
						}
						echo json_encode($data);
						break;
					
				}
			}else{
				echo "沒有資料";
			}
			break;
		
		case "login":
			$Username = $_POST["username"];
			$Password = $_POST["password"];

			//測試帳號密碼是否正確
			//$sql = "SELECT * FROM members_test WHERE username = 'owner01' AND password = '1234567890' ";
			$sql = "SELECT * FROM member_test WHERE username = BINARY '$Username' AND password = BINARY '$Password' ";

			$result=execute_sql($link, "demoDB", $sql);
			if(mysqli_num_rows($result) ==1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['usertype'] =$row['usertype']; 
				$_SESSION["username"] =$Username;
				echo"1";//成功
			}else{
				echo "0";
			}
			break;

		case 'delete':
			$ID = $_GET['id'];

			require_once "../dbtools.inc.php";
			$link = create_connection();
			$sql = "DELETE FROM member_test WHERE id = '$ID'";
				
			execute_sql($link,"demoDB",$sql);
			header("Location: ../tcnr_member01.php");
			break;	

		case 'update':
			$id=$_POST["id"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			
			// if(isset($_SESSION['usertype'])){
			// 	echo "<script> console.log(".$_SESSION['usertype'].") </script>"
			// 	$usertype=$_SESSION['usertype'];
			// }
			
			$email=$_POST["email"];

			require_once("../dbtools.inc.php");
			$link=create_connection();
			if(isset($_POST["usertype"])){
				$usertype = $_POST["usertype"];
				$sql = "UPDATE member_test SET username='$username', password='$password', usertype= '$usertype', email = '$email' WHERE id='$id'";
			}else{
				$usertype = "n";
				$sql = "UPDATE member_test SET username='$username', password='$password', usertype= '$usertype' ,email = '$email' WHERE id='$id'";
			}
	

			if(execute_sql($link, "demoDB", $sql)){
				
				echo "1";//成功
			}else{
				echo "0";
			}
			break;

		case "register":
			$Username = $_POST["username"];
			$Password = $_POST["password"];
			$Email = $_POST["email"];

			require_once("../dbtools.inc.php");
			$link = create_connection();

			//check if member already existed
			//BINARY 可避免大小寫和空白的問題
			$sql = "SELECT * FROM member_test WHERE username = BINARY '$Username'";
			$result = execute_sql($link,"demoDB",$sql);
			if(mysqli_num_rows($result)>0){
				echo "此帳號已存在! 請更換";
				break;
			}


			$sql = "INSERT INTO member_test (id, username, password, usertype, email) 
				Values('', BINARY '$Username', '$Password', 'n', '$Email')";
			if(execute_sql($link, "demoDB", $sql)){
				echo "reg sucess";
			}else{
				echo "reg fail";
			}
			break;	

		case "logout":
			session_destroy();
			header("Location: ../tcnr_login.php");
			break;	
	}

	

	$link->close();
 ?>