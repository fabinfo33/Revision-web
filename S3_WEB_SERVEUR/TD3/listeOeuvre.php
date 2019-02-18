<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des oeuvres et musiciens</title>
  </head>
  <body>
    <a href="indexTD3.php">Retour aux TD</a>
    <h1>Liste des musiciens</h1>
    <?php

      include 'Musicien.php';
      include 'ConnexionBDD.php';


      $sql = "SELECT code_musicien, nom_musicien, prénom_musicien FROM Musicien";

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
  </body>
</html>
