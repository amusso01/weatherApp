<?php

$ROOT_PATH='';

$MEDIA=$ROOT_PATH.'media';
$INCLUDE=$ROOT_PATH.'include';

//json file to parse
$json=file_get_contents('./request/city/city.list1.json');
$jsonParse = json_decode($json);

