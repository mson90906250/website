<?php require_once "memberAPI/20190218_getmember_api.php" ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>會員列表</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    	.mt10{
    		margin-top: 10px;
    	}
    	.mr5{
    		margin-right: 5px;
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<h1 class="text-center">會員列表</h1>
  			<div class="col-sm-8 col-sm-offset-2">
			    <table class="table mt10">
			    	<thead>
			    		<tr>
			    			<th>id</th>
			    			<th>username</th>
			    			<th>password</th>
			    			<th>bday</th>
			    			<th>sex</th>
			    			<th>create_time</th>
			    			<th>#</th>
			    		</tr>
			    	</thead>
			    	<tbody id="mTbody">
			    		<!--<?php while ($output = $result->fetch_assoc()) : ?>
				    		<tr>
				    			<td><?php echo $output['id']; ?></td>
				    			<td><?php echo $output['username']; ?></td>
				    			<td><?php echo $output['password']; ?></td>
				    			<td><?php echo $output['bday']; ?></td>
				    			<td><?php echo $output['sex']; ?></td>
				    			<td><?php echo $output['create_time']; ?></td>
				    			<td>
				    				<a href="20190218_member_update.php" class="btn btn-primary mr5">更新</a>
				    				<a href="#" class="btn btn-danger mr5">刪除</a>
				    			</td>
				    		</tr>
			    		<?php endwhile; ?>--> 
			    	</tbody>
		    	</table>
  			</div>
  		</div>
  	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(function(){
			$.ajax({
				type:"GET",
				url:"./memberAPI/20190218_member_read_api.php",
				dataType:"json",
				success:showData,
				error:function(){
					alert("20190218_member_read_api.php回傳失敗");
				}
			})
		});

		function showData(data){
			$("mTbody").empty();
			for(var i=0 ; i<data.length ; i++){
				$("#mTbody").append("<tr><td>"+data[i].id+"</td><td>"+data[i].username+"</td><td>"+data[i].password+"</td><td>"+data[i].bday+"</td><td>"+data[i].sex+"</td><td>"+data[i].create_time+"</td><td><a id='update0"+data[i].id+"' href='20190218_member_update.php?id="+data[i].id+"' class='btn btn-primary mr5'>更新</a><a href='#'  data-id='"+data[i].id+"' class='btn btn-danger' onclick='deleteData(this)'>刪除</a></td></tr>");
				//另一種寫法 <a  href='memberAPI/20190221_member_delete_api.php?id="+data[i].id+"'  class='btn btn-danger' onclick='confirm(\"確定要刪除嗎?\")'>刪除</a>
			}
		}

		function deleteData(btn){
			var db_id = $(btn).data('id');
			if(confirm("確定要刪除嗎?")){
				 location.href = "memberAPI/20190221_member_delete_api.php?id="+db_id;
			}
		}
	</script>
	
  </body>
</html>