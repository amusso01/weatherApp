<?php
include 'config/config.php';
include $INCLUDE.'\function.php';
include 'lang/en.php';
include $INCLUDE.'\header.php';
//
//if(isset($_GET["location"])&&(trim($_GET['location'])!=='')){
//    $view='search';
//}else{
//    $view='home';
//}

$ipLocation=getLocationInfoByIp();
var_dump($ipLocation);


include 'include/footer.php'
?>