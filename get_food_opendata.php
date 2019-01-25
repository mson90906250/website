<?php
$url ='http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvTravelFood.aspx';
$content = file_get_contents($url);
echo $content;

?>