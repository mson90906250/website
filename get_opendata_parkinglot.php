<?php
	 header("Access-Control-Allow-Origin:*");
	 $url = "路外停車資訊.json";
	 $content = file_get_contents($url);
	 echo $content;
?>