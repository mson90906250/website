<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">

</head>

<body>
	<!-- Home -->
	<div data-role="page" id="home">
		
		<div data-role="header" data-position="fixed" data-theme="b">
			<h1>來去台北住一晚</h1>
		</div>
		<!-- header end -->
		
		<div role="main" class="ui-content" >
			<div style="text-align: center;"><img src="image/dog04.jpg"  alt=""></div>
			<ul data-role="listview" data-inset="true" data-filter="true" id="output">
				<li><a href="#show">654654</a> <span class="ui-li-count"> 25 </span></li>
			</ul>
			
		</div>
		<!-- main end -->
		
		<div data-role="footer" data-position="fixed" data-theme="b">
		</div>
		<!-- footer end -->
	</div>
	<!-- Home end -->
	<!-- show -->
		<div data-role="page" id="show">
			
			<div data-role="header" data-position="fixed" data-theme="b">
				<a href="#" data-rel="back" data-theme="a">back</a>
				<h1></h1>
			</div>
			<!-- header end -->
			
			<div role="main" class="ui-content">
				<div style="text-align: center;"><img src="image/dog04.jpg"  alt=""></div>
				<ul data-role="listview" data-inset="true" id="output">
				<li><a href="#" >654654</a></li>
				
			</ul>
				
			</div>
			<!-- main end -->
			
			<div data-role="footer" data-position="fixed" data-theme="b">
				<h3>footer</h3>
			</div>
			<!-- footer end -->
		</div>
		<!-- show end -->


    <!-- javascript -->
	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
	<script>
		var regionData = [];
		var regionTitle = [];
		var counter = [];

		$(function(){
			$.ajax({
				type:"GET",
				url:"20190128_hoteldata_api.php",
				dataType:"json",
				success:showData,
				error:function(){
					alert("no connection");
				}
			});
		});
		function showData(data){
			//substring(a,b) = 從第a個字開始抓到第b個字前的所有字(不包含第b個字)
			//indexOf("X",y) = 從第y個字來找出"X"的index值
			/*console.log(data[99]["display_addr"].substring(0,data[99]["display_addr"].indexOf("區",0)+1));
			console.log(data.length);*/

			//開始建立資料結構
			for(var i=0; i<data.length; i++){
				//從每筆資料中抓出區名
				var getRegion = data[i]["display_addr"].substring(0,data[i]["display_addr"].indexOf("區",0)+1);
				//判斷該區是否在counter陣列中有值
				if(counter[getRegion]==undefined){

					counter[getRegion] = regionData.length;
					regionData.push(new Array());
					regionTitle[counter[getRegion]] = getRegion;

				}

				regionData[counter[getRegion]].push(data[i]);
			}

			makeList();

		}

		//做listview
		function makeList(){
			$("#output").empty();
			
			for(var i=0; i<regionTitle.length; i++){

				var hotel_name = "";
				var hotel_addr = "";
				var hotel_tel = "";

				//將需要傳遞的信息放入變數裡
				for(var j=0; j<regionData[i].length; j++){
					hotel_name+= regionData[i][j]["name"]+"|";
					hotel_addr+= regionData[i][j]["display_addr"]+"|";
					hotel_tel+= regionData[i][j]["tel"]+"|";
				}
				// console.log(hotel_name);
				// console.log(hotel_addr);
				// console.log(hotel_tel);


				var str = '<li data-icon="star"><a href="#show" regionTitle="'+regionTitle[i]+'" hotel_name="'+hotel_name+'" hotel_addr="'+hotel_addr+'" hotel_tel="'+hotel_tel+'">'+regionTitle[i]+'旅館資料</a> <span class="ui-li-count">'+regionData[i].length+'</span></li>';
				$("#output").append(str);
			}

			//設定監聽
			$("a",$("#output")).on("click",function(){
				getItem($(this).attr("regionTitle"),$(this).attr("hotel_name"),$(this).attr("hotel_addr"),$(this).attr("hotel_tel"));
			})
			//jqm傾向使用暫存來建立元素,下面方法可重新讀取listview的程式碼
			$("#output").listview("refresh");
		}

		function getItem(regionTitle,hotel_name,hotel_addr,hotel_tel){
			console.log(regionTitle);
			console.log(hotel_name);
			console.log(hotel_addr);
			console.log(hotel_tel);
		}

	</script>
	
</body>
</html>