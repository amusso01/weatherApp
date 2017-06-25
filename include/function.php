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
        $result['lat']=$ip_data->geoplugin_latitude;
        $result['lon']=$ip_data->geoplugin_longitude;
    }
    return $result;
}

//This function compare the city searched or initial with the associative array of city and Id from cityIdArray function
//return associative array id and searched city name or exit and return message
//@parameter city name to search
function findCityId($searchedCity,$cityDatabase){
    $nameIdCityArray=array();
    foreach ($cityDatabase as $key=>$value){
        if($searchedCity==$value){
            $nameIdCityArray[$key]=$value;
            return $nameIdCityArray;
        }
    }
}

function cURL($url){
    // Get cURL resource
    $curl = curl_init();
// Set some options
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
));$resp = curl_exec($curl);
// Close request to clear up resources
    curl_close($curl);
    return $resp;
}
