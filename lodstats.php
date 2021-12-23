<?php

$file = file_get_contents("https://lod-cloud.net/lod-data.json");
//$object = json_decode($file);
$array = json_decode(json_encode($file), true);
$result = array_search('cultural', $array);
/*
$eagle = "eagle-i-jsu";
echo $json->$eagle->website;
*/
echo "<pre>";
echo var_dump($result);
echo "</pre>";

/*
$contents_harvard = fopen("https://lod-cloud.net/lod-data.json", 'r');
$json_harvard = stream_get_contents($contents_harvard);
fclose($contents_harvard);
print($json_harvard);
 // For display purposes, <hr> are added several times in this file
/*
print '<hr>';
$data_harvard = json_decode($json_harvard);
print '<hr>';
*/
?>
