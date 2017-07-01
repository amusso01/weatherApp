<?php
include 'config/config.php';
include 'include/function.php';
include 'request/curl.php';
include 'include/header.php';
//get location info
$ipLocation=getLocationInfoByIp();
$apiCoord='api.openweathermap.org/data/2.5/weather?lat='.$ipLocation['lat'].'&lon='.$ipLocation['lon'].'&units=metric&APPID='.$apiKey;
//get your weather location info from server
$jsonText=cURL($apiCoord);
$yourCityApi=json_decode($jsonText);
//get map of your location;
$mapUrl='http://tile.openweathermap.org/map/precipitation_new/5/'.$ipLocation['lat'].'/.'.$ipLocation['lon'].'.png?appid='.$apiKey;
$map=cURL($mapUrl);
//echo '<pre>';
//var_dump();
//echo '</pre>';
$geoJson=json_decode($map);

include 'views/home.php';


include 'include/footer.php';
