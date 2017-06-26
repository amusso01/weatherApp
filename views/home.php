<?php
$template=file_get_contents('template/index.html');

$loadedCity=new cityWeather($yourCityApi->name,$yourCityApi->dt,$yourCityApi->sys->country,$yourCityApi->weather[0]->main,$yourCityApi->weather[0]->icon);


$template=str_replace('{{cityName}}',$loadedCity->getCity(),$template);
$template=str_replace('{{country}}',$loadedCity->getCountry(),$template);
$template=str_replace('{{time}}',$loadedCity->getDate(),$template);
$template=str_replace('{{mainWeather}}',$loadedCity->getWeather(),$template);
$template=str_replace('{{iconPath}}',$loadedCity->getIcon(),$template);
$template=str_replace('{{map}}',$map,$template);

echo  $template;