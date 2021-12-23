<?php

$keyword = 'Berl';
$dbpedia_lookUp = fopen('http://lookup.dbpedia.org/api/search/PrefixSearch?QueryClass=&MaxHits=5&QueryString='.$keyword, 'r');
//header('Content-Type: application/json');
$stream_dbpedia_lookUp = stream_get_contents($dbpedia_lookUp);
fclose($dbpedia_lookUp);
$xml = simplexml_load_string($stream_dbpedia_lookUp);
$json = json_encode($xml);
//print $json;
//echo '<hr>';

$php = json_decode($json);
$list = array();
foreach($php->Result as $item){
  $list[] = $item->URI;
}
json_encode($list);
var_dump($list);

?>
