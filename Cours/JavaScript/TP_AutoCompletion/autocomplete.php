<?php

$towns = file_get_contents('towns.txt');
$townsTab = unserialize($towns);
$villesTrouvees = array();

if (isset($_GET['recherche'])) {


  $userInput = $_GET['recherche'];

  for($i=0; $i<count($townsTab); $i++) {
    if (stripos($townsTab[$i], $userInput) !== FALSE) {
      array_push($villesTrouvees, $townsTab[$i]);
    }
  }

  sort($villesTrouvees, SORT_STRING);
  foreach ($villesTrouvees as $v) {
    echo $v."|";
  }
}
?>
