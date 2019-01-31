<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" type="text/css">
	<style>
		.google_map_div{
			margin:0 auto 0 auto;
			border: solid 1px;
			width: 75vw;
			height: 75vh;
		}
	</style>

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
				<h1 id="hotel_title"></h1>
			</div>
			<!-- header end -->
			
			<div role="main" class="ui-content">
				<div class="google_map_div" id="map_diva"></div>
				<ul data-role="listview" data-inset="true" id="hotel_output">
					<li data-icon="star">
						<p>飯店名稱</p>
						<p>地址</p>
						<p>電話</p>
					</li>
				
				</ul>
				<div id="hotel_map"></div>

				
			</div>
			<!-- main end -->
	
			<div data-role="footer" data-position="fixed" data-theme="b">
				<h3>footer</h3>
			</div>
			<!-- footer end -->
		</div>
		<!-- show end -->
	

    <!-- javascript -->
    <!-- 載入google map api -->
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSnyMTQAIeclcmF-1y1ufEj3mzZb6sPx4" type="text/javascript"></script>
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

					//處理沒有區名的地址
					if(getRegion==""){
						regionTitle[counter[getRegion]] = "其他區域";
					}else{
						regionTitle[counter[getRegion]] = getRegion;
					}

				}

				regionData[counter[getRegion]].push(data[i]);
			}

			makeList();

		}

		//做listview
		function makeList(){
			$("#output").empty();
			
			for(var i=0; i<regionTitle.length; i++){

				var hotel_name = "";//飯店名稱
				var hotel_addr = "";//地址
				var hotel_tel = "";//電話
				var hotel_X = "";//經度
				var hotel_Y = "";//緯度

				//將需要傳遞的信息放入變數裡,並以"|"作區隔
				for(var j=0; j<regionData[i].length; j++){
					hotel_name+= regionData[i][j]["name"]+"|";
					hotel_addr+= regionData[i][j]["display_addr"]+"|";
					hotel_tel+= regionData[i][j]["tel"]+"|";
					hotel_X+= regionData[i][j]["X"]+"|";
					hotel_Y+= regionData[i][j]["Y"]+"|";


				}
				// console.log(hotel_name);
				// console.log(hotel_addr);
				// console.log(hotel_tel);


				var str = '<li data-icon="star"><a href="#show" regionTitle="'+regionTitle[i]+'" hotel_name="'+hotel_name+'" hotel_addr="'+hotel_addr+'" hotel_tel="'+hotel_tel+'" hotel_X="'+hotel_X+'" hotel_Y="'+hotel_Y+'">'+regionTitle[i]+'旅館資料</a> <span class="ui-li-count">'+regionData[i].length+'</span></li>';
				$("#output").append(str);
			}

			//設定監聽
			$("a",$("#output")).on("click",function(){
				getItem($(this).attr("regionTitle"),$(this).attr("hotel_name"),$(this).attr("hotel_addr"),$(this).attr("hotel_tel"),$(this).attr("hotel_X"),$(this).attr("hotel_Y"));
			})
			//jqm傾向使用暫存來建立元素,下面方法可重新讀取listview的程式碼
			$("#output").listview("refresh");
		}

		function getItem(regionTitle,hotel_name,hotel_addr,hotel_tel,hotel_X,hotel_Y){
			
			//debbug用的
			// console.log(regionTitle);
			// console.log(hotel_name);
			// console.log(hotel_addr);
			// console.log(hotel_tel);
			// console.log(hotel_X);
			// console.log(hotel_Y);

			//設定title
			$("#hotel_title").html(regionTitle+"飯店");
			//將得到的資料丟如陣列
			var hotel_namearr = hotel_name.split("|");
			var hotel_addrarr = hotel_addr.split("|");
			var hotel_telarr = hotel_tel.split("|");
			var hotel_Xarr = hotel_X.split("|");
			var hotel_Yarr = hotel_Y.split("|");

			//利用pop()方法將最後一個元素("")去掉
			hotel_namearr.pop();
			hotel_addrarr.pop();
			hotel_telarr.pop();
			hotel_Xarr.pop();
			hotel_Yarr.pop();

		//製作listview

			//先將listview的内容清空
			$("#hotel_output").empty();

			//講的到的資料丟入	
			for(var i=0; i<hotel_namearr.length; i++){
				var str = '<li data-icon="star"><a href="#a0'+i+'" data-rel="popup" addr="'+hotel_addrarr[i]+'"><h3>'+hotel_namearr[i]+'</h3><p>'+hotel_addrarr[i]+'</p><p>'+hotel_telarr[i]+'</p></a></li>';	
				$("#hotel_output").append(str);

				//如果該popup已存在,將其内容清空
				if($("#a0"+i).length){
					$("#a0"+i).empty();
				}
				

				//若要完整的呈現popup請在append一個popup框架後再加.trigger("create");
				$("#hotel_map").append("<div data-role='popup' id='a0"+i+"'  style='background-color:white;'><a href='#' data-role='button' data-rel='back' data-icon='delete' data-iconpos='notext' class='ui-btn-right' >關閉</a></div>").trigger("create");
				$("#a0"+i).append('<div class="google_map_div" id="map_div0'+i+'"></div>');
				$("#a0"+i).append("<div><p>飯店名稱:"+hotel_namearr[i]+"</p></div>");

				//製作地圖
				createMap("map_div0"+i,hotel_Xarr[i],hotel_Yarr[i],hotel_namearr[i],hotel_addrarr[i],hotel_telarr[i]);


				
			}
			makeMap(hotel_Xarr,hotel_Yarr,hotel_namearr,hotel_addrarr,hotel_telarr);
			//重新讀取listview
			$("#hotel_output").listview("refresh");
			

		}

		function makeMap(hotel_Xarr,hotel_Yarr,hotel_namearr,hotel_addrarr,hotel_telarr){
			console.log("hotel_namearr="+hotel_namearr);
			var infowindow = new google.maps.InfoWindow();
			
			//設定地圖的中心點
			var map_div = document.getElementById("map_diva");
			//取得經緯度
			var lat = hotel_Yarr[0];
			var lng = hotel_Xarr[0];

			//方法會將坐標轉成複雜的數字
			var latlng = new google.maps.LatLng(lat,lng);


			var gmap = new google.maps.Map(map_div,{//選擇要呈現地圖的框架
				zoom:14,//放大的倍率(8倍大約可以將整個台灣顯示出來)
				center:latlng,//設置地圖的中心點
				mapTypeId:google.maps.MapTypeId.ROADMAP//設置地圖種類
			});

		// //建立標記記錄指定的地點
		// 	var marker = new google.maps.Marker({
		// 		position:latlng,
		// 		icon:"image/icon/flag.png",
		// 		map:gmap,
		// 		title:"Somewhere!!!"
		// 	});

		// //給與標記一個訊息視窗
		// 	google.maps.event.addListener(marker,"click",function(event){
		// 		var infowindow = new google.maps.InfoWindow({
		// 			content:"<div class='infowindow_div'><div class='info'><a href='#info_img_popup' data-rel='popup' data-position-to='window'><img class='info_img' src='image/tcnr.jpg' alt=''></a></div><p>勞動部勞動力發展署中彰投分署（臺中職訓局）</p>	<p>地址： 407台中市西屯區工業區一路100號</p><p>官網:<a href='https://tcnr.wda.gov.tw/'>https://tcnr.wda.gov.tw/</a></p>	</div>",
		// 		});
		// 		infowindow.open(gmap,marker);//設定訊息視窗出現的位置
		// 	});

			//設置多個地標
			var marker = [];
	
			for(var i = 0; i<hotel_namearr.length; i++){


			latlng = new google.maps.LatLng(hotel_Yarr[i],hotel_Xarr[i]);

			//建立標記記錄指定的地點
				marker[i] = new google.maps.Marker({
				position:latlng,
				icon:"image/icon/flag.png",
				map:gmap,
				title: hotel_namearr[i],
			});

				//給與標記一個訊息視窗
				google.maps.event.addListener(marker[i],"click",function(event){
					infowindow.close();
					
					//取得在地圖上觸發點擊的坐標
					var lat = event.latLng.lat();//取緯度
					var lng = event.latLng.lng();//取經度

					//算出與各地標距離,並從中選取最短且符合設定的距離
					for(var j=0; j<hotel_namearr.length; j++){

						
						//取得距離
						var dist = getDistance(lat,lng,hotel_Yarr[j],hotel_Xarr[j]);
						
						//若距離符合設定則顯示訊息視窗
						if (dist<0.05) {
							// var infowindow = new google.maps.InfoWindow({
							// 	content: "<div><p>Name= "+opendata[j].parkName+"</p><p>剩餘車位= "+opendata[j].surplusSpace+"</p></div>",
							// });

							infowindow.setContent("<div id='infowindow_info'><p>Name= "+hotel_namearr[j]+"</p><a href='javascript:forSearch(\""+hotel_addrarr[j]+"\")'><p>"+hotel_addrarr[j]+"</p></a><a href='tel:"+hotel_telarr[j]+"'><p>"+hotel_telarr[j]+"</p></a></div>");

							/*//設置監聽
							$("#a_openmap",$("#infowindow_info")).on("click",function(){
								console.log($("a",$("#infowindow_info")).attr("addr"));
								forSearch($("a",$("#infowindow_info")).attr("addr"));
							});*/

							infowindow.open(gmap,marker[j]);//設定訊息視窗出現的位置
						}//if					
					}//for
					
				});

			}//for
			
			
		}

		function createMap(mapdiv,X,Y,hotel_name,hotel_addr,hotel_tel){
			
			//設定infowindow為共用變數可避免在同一地圖上出現多個infowindow
			var infowindow = new google.maps.InfoWindow();
			
			//設定地圖的中心點
			var map_div = document.getElementById(mapdiv);
			//取得經緯度
			var lat = Y;
			var lng = X;

			//方法會將坐標轉成複雜的數字
			var latlng = new google.maps.LatLng(lat,lng);


			var gmap = new google.maps.Map(map_div,{//選擇要呈現地圖的框架
				zoom:15,//放大的倍率(8倍大約可以將整個台灣顯示出來)
				center:latlng,//設置地圖的中心點
				mapTypeId:google.maps.MapTypeId.ROADMAP//設置地圖種類
			});

		//建立標記記錄指定的地點
			var marker = new google.maps.Marker({
				position:latlng,
				icon:"image/icon/flag.png",
				map:gmap,
				title: hotel_name
			});

		//給與標記一個訊息視窗
			google.maps.event.addListener(marker,"click",function(event){
				infowindow.setContent("<div class='infowindow_div'><h2>"+hotel_name+"</h2><p>"+hotel_addr+"</p><a href='tel:"+hotel_tel+"'><p>"+hotel_tel+"</p></a></div>");
				infowindow.open(gmap,marker);//設定訊息視窗出現的位置
			});
		}

		function forSearch(addr){
			window.open("http://maps.google.com/maps?hl=zh-TW&q="+addr);
		}

		//算出距離的公式
		function getDistance(Lat1, Long1, Lat2, Long2){
			ConvertDegreeToRadians=function(degrees){
				return (Math.PI/180)*degrees;
			}
			var Lat1r = ConvertDegreeToRadians(Lat1);
			var Lat2r = ConvertDegreeToRadians(Lat2);
			var Long1r = ConvertDegreeToRadians(Long1);
			var Long2r = ConvertDegreeToRadians(Long2);

			var R = 6371; // 地球半徑(km)
			var d = Math.acos(Math.sin(Lat1r) * Math.sin(Lat2r) +
			 Math.cos(Lat1r) * Math.cos(Lat2r) * Math.cos(Long2r-Long1r)) * R;
			return d; // 兩點的距離 (KM)
		}

	</script>
	
</body>
</html>