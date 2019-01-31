<?php 

	 header("Access-Control-Allow-Origin:*");
	 //若參數有"$",需使用下面的方法
	 $url ="http://opendata.epa.gov.tw/webapi/Data/REWIQA/?"."$"."orderby=SiteName&"."$"."skip=0&"."$"."top=1000&format=json";
	 /*$url = "https://opendata.epa.gov.tw/webapi/api/rest/datastore/355000000I-000259?filters=County%20eq%20%27%E8%87%BA%E4%B8%AD%E5%B8%82%27%20and%20SiteName%20eq%20%27%E5%BF%A0%E6%98%8E%27&sort=SiteName&offset=0&limit=1000";*/
	 $content = file_get_contents($url);
	 echo $content;


 ?>