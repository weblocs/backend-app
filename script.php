<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "https://www.weblocks.com" || $http_origin == "https://weblocks.flywheelstaging.com" || $http_origin == "https://weblocks.local")
{  
    header("Access-Control-Allow-Origin: $http_origin");
}

$code = $_POST['code'];
$xml = $_POST['xml'];
$id = $_POST['id'];
$userID = $_POST['userID'];


$code_url = 'script-'.$userID.'-'.$id.'.js';
$xml_url =  'xml-'.$userID.'-'.$id.'.xml';

$code_file = fopen($code_url, "w") or die("Unable to open file!");
$xml_file = fopen($xml_url, "w") or die("Unable to open file!");

fwrite($code_file, $code);
fwrite($xml_file, $xml);

fclose($code_file);
fclose($xml_file);
?>
