<?php
require '../vendor/autoload.php';

// Set the traversecount counter from 0
$_SESSION['traverseCount'] = 0;
$traverseCount = $_SESSION['traverseCount'];
echo $traverseCount;
echo '<h1>Traversal Results</h1><br>';

// Function for API spider calls
function apicall($inputArray, $format, $allArray){
  $traverseCount++;
  $outputArray = array();
  // Increment the counter for each traversal
  //$traverseCount = $inputArray['traversecount']+1;
  //echo $traverseCount;

    echo '<h2>inputArray: '.$inputArray['uri'].'</h2>';
    echo '<h2>allArray: '.var_dump($allArray).'</h2>';
/*
// Ref: https://stackoverflow.com/questions/4128323/in-array-and-multidimensional-array
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }
*/
if ($traverseCount >= 2)
{
echo '<h2>$traverseCount is more than 2</h2>';
/*
  // Here try to exclude the duplicate URLs from inputArray and execute the main function below for the rest of URLs
  // Ref: https://stackoverflow.com/questions/41157216/php-compare-multidimensional-array-values-in-single-dimensional-array
$arrayA = $inputArray;
$arrayB = $allArray;
  $arrayC = array_filter($arrayB, function($arrayBItem) use ($arrayA) {
      return ! in_array($arrayBItem['uri'], $arrayA);
  });
  echo '<h2>arrayC: '.var_dump($arrayC).'</h2>';
  echo 'Duplicate found!!';
*/
}
else {

  //echo in_array_r($inputArray['uri'], $allArray) ? 'duplicate found' : 'duplicate not found';

  // If EasyRdf_Graph does not work, return an empty array
  try {
    $graph = EasyRdf_Graph::newAndLoad($inputArray['uri'], $format);

  } catch (Exception $error) {
    $error->getMessage();
    return array('<p>No match!!!</p>');
  }

  //The following to set a default namespace is unneeded
  //$namespace = EasyRdf_Namespace::setDefault('skos');

  // Search a property (skos:exactMatch in graphs/resources and identify the graph/resource to explore (ie http://babelnet.org/rdf/s02145878n))
  // primaryTopic(); becomes unneeded
  //  $graph1 = $graph->primaryTopic();
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
/*
foreach ($outputArray as $n){
  //$n['traversecount'] += 1;
  $n = $n['traversecount']+1;
}
*/
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
  $format = 'application/rdf+xml';

  if(count($skosLinks) > 0){
    foreach($skosLinks as $val){
      var_dump($val);
      if($val['uri']){
        apicall($val, $format);
        echo "<p>---SKOS---<p><br><hr>";
      }

    }
  }
  if(count($rdfsLinks) > 0){
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
  //echo var_dump($rdfsLinks);
  //echo var_dump($owlLinks);
  //echo var_dump($outputArray);

  //return $outputArray;

  foreach ($outputArray as $next){
    do {
      echo '<h2>$next'.var_dump($next).'</h2>';
      apicall($next['uri'], $format, $next);
      // Increment $traverseCount
      $traverseCount++;
      echo '<p>$traverseCount: '.$traverseCount.'</p>';
    } while ($traverseCount <= 3);
  }


}
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

$url = $query;

//Create an empty array which will contain the URIs for next calls
//$traverseCount = 1;

$firstArray[] = array('uri' => $url, 'traversecount' => $_SESSION['traverseCount']);
echo "<p>firstArray:<p>";
echo var_dump($firstArray);

// Format can be chosen from below. Only RDF/XML works at the moment
$format = 'application/rdf+xml';
//$format = 'application/x-turtle';
//$format = 'text/rdf+n3';
//$format = 'text/plain';

// Originally (working)
//$nextArray = apicall($firstArray[0], $format, $firstArray);
// 2nd version (working)
//$nextArray = apicall($firstArray[$traverseCount], $format, $firstArray);
//echo "<p>nextArray<p>";
//echo var_dump($nextArray);
// 2nd version (working)
//$nextArray2 = apicall($nextArray[$traverseCount], $format, $nextArray);

//Loop attempt
$nextArray = apicall($firstArray[0], $format, $firstArray);

/*
foreach ($nextArray as $next){
  do {
    echo '<h2>$next'.var_dump($next).'</h2>';
    apicall($next['traversecount']['uri'], $format, $nextArray);
    $traverseCount = $next['traversecount']+1;
    echo '<p>$traverseCount'.$traverseCount.'</p>';
  } while ($next['traversecount'] == 3);
}
*/

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
