<?php
//we can simulate a slow server with sleep function

//sleep(2);
include './config/config.php';

function isAjaxRequest(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] =='XMLHttpRequest';
}
if (!isAjaxRequest()){
    exit;
}
$location = isset($_GET['location']) ? $_GET['location']:'';

