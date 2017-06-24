<?php
//read the files in the $pathDir and return an array of those in this
//directory to pass to this function is 'request/city'
function dataFile($pathDir){
    $dirFile=array();
    if (file_exists($pathDir)) {
        $dir= opendir($pathDir);
        while (false !== ($file=readdir($dir))){//store the name of the read file in $file and read the content off all the dir
            if (($file == ".") || ($file == "..")){//skip the . and .. file
                continue;
            }else{
                $dirFile[]=$file;
            }
        }
        closedir($dir);
        return $dirFile;
    }else {
        echo "<p>Error! Directory does not exist</p>";
    }
}
//@parameter the array of the json files in the $pathDir
// @parameter the path of the files
//@return the associative array of the city id => city name
function cityIdArray($directoryArray,$pathDir){
    $cityArray=array();
    foreach ($directoryArray as $key =>$value){
        $json = file_get_contents($pathDir.$value);
        $jsonParse = json_decode($json);
        foreach ($jsonParse as $id=>$item){
            $cityArray[$jsonParse[$id]->id]=$jsonParse[$id]->name;
        }
    }
    return $cityArray;
}
//@$id the name of the view to render
//@return the url to include in index.php
//function url($id){
//    switch ($id) {
//        case 'home':
//            return 'views/home.php';
//            break;
//        case 'search':
//            return 'views/search.php';
//            break;
//        default:
//            return 'views/404.php';
//            break;
//    }
//}
//source of this code http://www.apphp.com/index.php?snippet=php-get-country-by-ip
//return an associative array of the country and the city base on the IP address
function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryCode;
        $result['city'] = $ip_data->geoplugin_city;
    }
    return $result;
}