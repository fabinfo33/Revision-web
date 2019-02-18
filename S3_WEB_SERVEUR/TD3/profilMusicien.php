<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Oeuvre du musicien</title>
  </head>
  <body>
    <a href="listeOeuvre.php">Retour à la liste</a>
    <h1>Liste des oeuvres</h1>
    <?php
    $id = $_GET['id'];

    include 'connexionBDD.php';

    $sql = "SELECT Titre_Oeuvre FROM Oeuvre ";
    $sql .= "INNER JOIN Composer ON Oeuvre.Code_Oeuvre = Composer.Code_Oeuvre ";
    $sql .= "INNER JOIN Musicien ON Composer.Code_Musicien = Musicien.Code_Musicien ";
    $sql .= "WHERE Musicien.Code_Musicien='$id'";

    $query = $pdo->query($sql);
    echo "<ul>";
    foreach ($query as $oeuvre) {
      echo "<li>" . $oeuvre['Titre_Oeuvre'] . "</li>";
    }
    echo "</ul>";

     ?>
  </body>
</html>
