<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Liste des oeuvres et musiciens et pagination</title>
</head>
<body>
  <a href="indexTD3.php">Retour aux TD</a>
  <h1>Liste des musiciens</h1>
  <?php

  include 'Musicien.php';
  include 'ConnexionBDD.php';

  if(isset($_GET['p']))
  {
    $page = $_GET['p'];
  } else {
    $page = 0;
  }


    $sql = "SELECT code_musicien, nom_musicien, prénom_musicien FROM Musicien ";
    $sql .= "ORDER BY Nom_Musicien OFFSET ". $page . " ROWS FETCH NEXT 20 ROWS ONLY";


  // Création des instances de musicien
  $sth = $pdo->query($sql);
  $sth->setFetchMode(PDO::FETCH_CLASS, 'Musicien');
  $results = $sth->fetchAll();
  echo "<ul>";
  foreach ($results as $musicien) {
    echo "<li>";
    //$musicien->presenterMusicien();
    echo $musicien->creerLienMusicien();
    echo "</li>";
  }
  echo "</ul>";

  ?>

  <div class="">
    <a href="pagination.php?p=<?php if ($page >=0 && ($page - 20) >=0) { echo $page - 20; } else {echo 0;}?>">Précedent</a>
    <a href="pagination.php?p=<?php if ($page >=0) { echo $page + 20; }?>">Suivant</a>
  </div>
</body>
</html>
