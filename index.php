<?php
include 'config/config.php';
include 'include/function.php';
include 'lang/en.php';
include 'request/curl.php';
include 'include/header.php';

$ipLocation=getLocationInfoByIp();
$apiCoord='api.openweathermap.org/data/2.5/weather?lat='.$ipLocation['lat'].'&lon='.$ipLocation['lon'].'&units=metric&APPID='.$apiKey;
$jsonText=cURL($apiCoord);
$yourCityApi=json_decode($jsonText);
echo '<pre>';
print_r($yourCityApi);
echo '</pre>';






include 'include/footer.php';
