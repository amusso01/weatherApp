<?php
include 'config/config.php';
include 'include/function.php';
include 'lang/en.php';
include 'include/header.php';
//

//$databaseNameIdCity=cityIdArray(dataFile('request/city'),'request/city/'); //Array city in json

$ipLocation=getLocationInfoByIp();
$apiCoord='api.openweathermap.org/data/2.5/weather?lat='.$ipLocation['lat'].'&lon='.$ipLocation['lon'].'&units=metric&APPID='.$apiKey;
$jsonText=cURL($apiCoord);
$json=json_decode($jsonText);
echo '<pre>';
print_r($json);
echo '</pre>';
include 'include/footer.php'
?>