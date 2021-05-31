<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "https://www.weblocks.com" || $http_origin == "https://weblocks.flywheelstaging.com" || $http_origin == "https://weblocks.local")
{  
    header("Access-Control-Allow-Origin: $http_origin");
}

function fwrite_stream($fp, $string) {
    for ($written = 0; $written < strlen($string); $written += $fwrite) {
        $fwrite = fwrite($fp, substr($string, $written));
        if ($fwrite === false) {
            return $written;
        }
    }
    return $written;
}


$code = $_POST['code'];
$xml = $_POST['xml'];

$id = $_POST['id'];
$userID = $_POST['userID'];
$url = $_POST['url'];


$script = 'script-'.$userID.'-'.$id.'.js';
$xml_file =  'xml-'.$userID.'-'.$id.'.xml';

$myfile = fopen($script, "w") or die("Unable to open file!");
$myfilexml = fopen($xml_file, "w") or die("Unable to open file!");

fwrite_stream($myfile, $code);
fwrite_stream($myfilexml, $xml);

fclose($myfile);
fclose($myfilexml);


?>
