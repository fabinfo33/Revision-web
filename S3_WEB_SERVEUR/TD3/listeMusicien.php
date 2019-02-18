<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Liste des musiciens</title>
</head>
<body>
  <a href="indexTD3.php">Retour aux TD</a>
    <h1>Liste des musiciens</h1>
  <?php
  $dsn = "sqlsrv:Server=info-dormeur;Database=Classique_Web";
  $user = 'ETD';
  $password = 'ETD';
  $pdo = new PDO($dsn, $user, $password);

  $sql = "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien like 'B%'";
  $query = $pdo->query($sql);
    echo "<ul>";


    foreach ($query as $row) {
      echo "<li>".$row['Nom_Musicien']."</li>";
    }


  echo "</ul>";
  ?>
</body>
</html>
