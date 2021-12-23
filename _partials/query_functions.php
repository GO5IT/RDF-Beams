<?php
//require '../vendor/autoload.php';
require 'vendor/autoload.php';

echo '<h1>Traversal Results</h1><br>';

// Function for API spider calls
function apicall($inputArray, $format){
  $outputArray = array();
  $traverseCount = $inputArray['traversecount'];
    echo $traverseCount.'is the count';
    echo '<h2>'.$inputArray['uri'].'</h2>';

  // If EasyRdf_Graph does not work, return an empty array
  try {
    //old syntax
    //$graph = EasyRdf_Graph::newAndLoad($inputArray['uri'], $format);
    //new syntax
    $graph = \EasyRdf\Graph::newAndLoad($inputArray['uri'], $format);
  } catch (Exception $error) {
    $error->getMessage();
    return array('<p>No match!!!</p>');
  }

  // Code section for the properties with hyperlinks (do traversing)
  // Search a property (skos:exactMatch in graphs/resources and identify the graph/resource to explore (ie http://babelnet.org/rdf/s02145878n))

  $skosLinks = [];
  $match = $graph->resourcesMatching('skos:exactMatch');
  if (isset($match) == true && count($match) > 0){
    $graphuris = $match[0]->all('skos:exactMatch');
    echo '<b>skos:exactMatch Links: </b><br>';
    foreach ($graphuris as $uris) {
      $skosLinks[] = array('uri' => (string)$uris,
                    'traversecount' => $traverseCount);
      $outputArray[] = array('uri' => $uris->__toString(),
                    'traversecount' => $traverseCount);
      echo '<a href="'.$uris.'" target="_blank">'.$uris.'</a><br>';
    }
  }
  else {
    echo '<p>No skos:exactMatch found</p>';
  }
  $rdfsLinks = [];
  $match2 = $graph->resourcesMatching('rdfs:seeAlso');
  if (isset($match2) == true && count($match2) > 0){
    $graphuris2 = $match2[0]->all('rdfs:seeAlso');
    echo '<b>rdfs:seeAlso Links: </b><br>';
    foreach ($graphuris2 as $uris2) {
      $rdfsLinks[] = array('uri' => (string)$uris2,
                    'traversecount' => $traverseCount);
      $outputArray[] = array('uri' => $uris2->__toString(),
                    'traversecount' => $traverseCount);
      echo '<a href="'.$uris2.'" target="_blank">'.$uris2.'</a><br>';
    }
  }
  else{
    echo '<p>No rdfs:seeAlso found</p><br>';
  }

  $owlLinks = [];
  $match3 = $graph->resourcesMatching('owl:sameAs');
  if(isset($match3) && count($match3) > 0) {
    $graphuris3 = $match3[0]->all('owl:sameAs');
    echo '<b>owl:sameAs Links: </b><br>';
    foreach ($graphuris3 as $uris3) {
      $owlLinks[] = array('uri' => (string)$uris3,
                    'traversecount' => $traverseCount);

      $outputArray[] = array('uri' => $uris3->__toString(),
                    'traversecount' => $traverseCount);
      echo '<a href="'.$uris3.'" target="_blank">'.$uris3.'</a><br>';
    }
  }
  else{
    echo '<p>No owl:sameAs found</p><br>';
  }

  $schemaLinks = [];
  $match4 = $graph->resourcesMatching('schema:sameAs');
  if(isset($match4) && count($match4) > 0) {
    $graphuris4 = $match4[0]->all('schema:sameAs');
    echo '<b>schema:sameAs Links: </b><br>';
    foreach ($graphuris4 as $uris4) {
      $schemaLinks[] = array('uri' => (string)$uris4,
                    'traversecount' => $traverseCount);

      $outputArray[] = array('uri' => $uris4->__toString(),
                    'traversecount' => $traverseCount);
      echo '<a href="'.$uris4.'" target="_blank">'.$uris4.'</a><br>';
    }
  }
  else{
    echo '<p>No schema:sameAs found</p><br>';
  }
  // How to only get primaryTopic or so? (same for other $match cases)
  $match5 = $graph->resourcesMatching('rdfs:label');
  if(isset($match5) && count($match5) > 0) {
    $graphuris5 = $match5[0]->all('rdfs:label');
    echo '<b>rdfs:labels: </b><br>';
    foreach ($graphuris5 as $uris5) {
      echo '<p>'.$uris5.'</p><br>';
    }
  }
  else{
    echo '<p>No rdfs:label found</p><br>';
  }

  $match6 = $graph->resourcesMatching('rdf:type');
  if(isset($match6) && count($match6) > 0) {
    $graphuris6 = $match6[0]->all('rdf:type');
    echo '<b>rdf:type: </b><br>';
    foreach ($graphuris6 as $uris6) {
      echo '<p>'.$uris6.'</p><br>';
    }
  }
  else{
    echo '<p>No rdf:type found</p><br>';
  }

  $match7 = $graph->resourcesMatching('skos:prefLabel');
  if(isset($match7) && count($match7) > 0) {
    $graphuris7 = $match7[0]->all('skos:prefLabel');
    echo '<b>skos:prefLabel: </b><br>';
    foreach ($graphuris7 as $uris7) {
      echo '<p>'.$uris7.'</p><br>';
    }
  }
  else{
    echo '<p>No skos:prefLabel found</p><br>';
  }

  $match8 = $graph->resourcesMatching('skos:altLabel');
  if(isset($match8) && count($match8) > 0) {
    $graphuris8 = $match8[0]->all('skos:altLabel');
    echo '<b>skos:altLabel: </b><br>';
    foreach ($graphuris8 as $uris8) {
      echo '<p>'.$uris8.'</p><br>';
    }
  }
  else{
    echo '<p>No skos:altLabel found</p><br>';
  }

//foreach ($outputArray as $n){
//  $n['traversecount'] += 1;
//}
/*
echo "<hr>";
var_dump($outputArray);
echo "<hr>";
*/
/*
  // If not URIs are found, return a message
  else {
    $outputArray[] = '<p>No external links!</p>';
    echo $outputArray;
    //$graphdump = $graph->dump();
    //echo $graphdump;
  }
*/

/*
  if(count($outputArray) > 0){
    foreach($outputArray as $l) {
      echo $l;
      $a = apicall($l, $format);
      var_dump($a);
    }

  }
*/

/*
  $format = 'application/rdf+xml';

  if(count($skosLinks) > 0){
    echo count($skosLinks).'---------skoooooos';
    while (count($skosLinks) <= $traverseCount){
      var_dump($skosLinks);
      apicall($skosLinks, $format);
      echo "<p>---SKOS---<p><br><hr>";
    }
  }
  if(count($rdfsLinks) > 0){
    echo count($rdfsLinks).'---------rdfsssssss';
    while (count($rdfsLinks) <= $traverseCount){
      var_dump($rdfsLinks);
      apicall($rdfsLinks, $format);
      echo "<p>---RDFS---<p><br><hr>";

    }
  }
  if(count($owlLinks) > 0){
    while (count($owlLinks) <= $traverseCount){
      var_dump($owlLinks);
      apicall($owlLinks, $format);
      echo "<p>---OWL---<p><br><hr>";
    }
  }
  if(count($schemaLinks) > 0){
    while (count($schemaLinks) <= $traverseCount){
      var_dump($schemaLinks);
      apicall($schemaLinks, $format);
      echo "<p>---SCHEMA---<p><br><hr>";
    }
  }
  else{
  }
*/

/*
  $format = 'application/rdf+xml';

  if(count($skosLinks) > 0){
    echo count($skosLinks).'---------skoooooos';
    foreach($skosLinks as $val){
      var_dump($val);
      if($val['uri']){
        apicall($val, $format);
        echo "<p>---SKOS---<p><br><hr>";
      }

    }
  }
  if(count($rdfsLinks) > 0){
    echo count($rdfsLinks).'---------rdfsssssss';
    foreach($rdfsLinks as $val){
      var_dump($val);
      if($val['uri']){
        apicall($val, $format);
        echo "<p>---RDFS---<p><br><hr>";
      }

    }
  }
  if(count($owlLinks) > 0){
    foreach($owlLinks as $val){
      var_dump($val);
      if($val['uri']){
        apicall($val, $format);
        echo "<p>---OWL---<p><br><hr>";
      }

    }
  }

  if(count($schemaLinks) > 0){
    foreach($schemaLinks as $val){
      //var_dump($val);
      if($val['uri']){
        apicall($val, $format);
        echo "<p>---SCHEMA---<p><br><hr>";
      }

    }
  }
*/
  return $outputArray;
}

// Please specify the starting RDF/XML API.
// The URI syntax and content negotiation is shaky to work with EasyRDF.
// Sometimes we need to put .rdf or rdf.xml extension etc, which cannot be easily predictable in advance
// Siena
//$url = 'http://babelnet.org/rdf/data/s02145878n';
// The following does not work, but http://sws.geonames.org/6541466/about.rdf works
// How to identify the exact URL?
//$url = 'http://sws.geonames.org/6541466';
// The DBpedia works with .rdf extension, but does not work well without it
//$url = 'http://dbpedia.org/resource/Siena.rdf';
//$url = 'http://experimental.worldcat.org/fast/1204409/';
//$url = 'http://id.worldcat.org/fast/1204409';
//$url = 'https://viaf.org/viaf/239842096/rdf.xml';
//$url = 'http://id.loc.gov/authorities/names/n79013822.rdf';
// Klimt
//$url = 'http://experimental.worldcat.org/fast/33628/';
//VIAF works relatively well (the best so far)
//$url = 'https://viaf.org/viaf/7399081/rdf.xml';
// This VIAF does not work
//$url = 'https://viaf.org/viaf/7399081/rdf.xml';
//$url = 'http://id.loc.gov/authorities/names/n79013822.rdf';

//var_dump($query);
$url = $query;

//Create an empty array which will contain the URIs for next calls
$traverseCount = 2;
$firstArray[] = array('uri' => $url,
              'traversecount' => $traverseCount);
var_dump($firstArray);
// Format can be chosen from below. Only RDF/XML works at the moment
$format = 'application/rdf+xml';
//$format = 'application/x-turtle';
//$format = 'text/rdf+n3';
//$format = 'text/plain';

//var_dump($firstArray[0]);
$nextArray = apicall($firstArray[0], $format);
var_dump($nextArray);


/*
// Legacy attempts for loop
// Loop API calls for each obtained URIs
foreach($nextArray as $next) {
  echo "next2";
  $nextlist2 = apicall($next, $format);
  var_dump($nextlist2);
}

foreach($nextlist2 as $next2) {
  echo "next3";
  $nextlist3 = apicall($next2, $format);
  var_dump($nextlist3);
}
foreach($nextlist2 as $next2) {
  $nextlist3 = apicall($next2, $format);
  var_dump($nextlist3);
}
*/

?>
