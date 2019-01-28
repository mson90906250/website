<?php 

	 header("Access-Control-Allow-Origin:*");
	 //若參數有"$",需使用下面的方法
	 $url ="http://opendata.epa.gov.tw/webapi/Data/REWIQA/?"."$"."orderby=SiteName&"."$"."skip=0&"."$"."top=1000&format=json";
	 $content = file_get_contents($url);
	 echo $content;


 ?>