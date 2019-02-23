<?php
  session_start();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>會員列表</title>

    <!-- Bootstrap -->
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
  			<h1 class="text-center">會員資料</h1>
  			<div class="col-sm-8 col-sm-offset-2">
				    <table class="table mt10" id="t_table">
				    	
				    		<!-- <thead><tr><th>id:</th><th></th></tr></thead>
				    		<thead><tr><th>username:</th><th></th></tr></thead>
				    		<thead><tr><th>password:</th><th></th></tr></thead>
				    		<thead><tr><th>Email:</th><th></th></tr></thead> -->
				    		<tr class="ui-grid-a">
                  <td class="ui-block-a">刪除</td>
                  <td class="ui-block-b">home</td>
                </tr>
				    	<tbody id="member_list">
				    		
				    	</tbody>
				    </table>  				
  			</div>
  		</div>
  	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    	$(function(){
    		$.ajax({
    			type: "GET",
    			url: "./memberAPI/tcnr_member_api.php?query_type=member",
    			dataType: "json",
    			success: showMember,
    			error:function(){
						alert("會員列表api回傳失敗");
					}
    		});
    	});

    	function showMember(data){
    		for(i=0; i<data.length; i++){
    			strHTML = "";
    			strHTML = '<thead><tr><th>id:</th><th>'+data[i].id+'</th></tr></thead><thead><tr><th>username:</th><th>'+data[i].username+'</th></tr></thead><thead><tr><th>password:</th><th>'+data[i].password+'</th></tr></thead><thead><tr><th>Email:</th><th>'+data[i].email+'</th></tr></thead>';
    			$("#t_table").append(strHTML);
    		}
    		
    		
    	}
    	
    </script>    
  </body>
</html>
