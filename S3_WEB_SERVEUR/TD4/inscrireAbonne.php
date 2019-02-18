<?php

// //connexionBDD
// require '../TD3/ConnexionBDD.php';



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Incription Abonné</title>
</head>
<body>

  <?php //showError() ?>
</body>
</html>

<?php

  //Recuperation et protection des donnees
  if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login'])
  && isset($_POST['password'])) {
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $login = htmlspecialchars($_POST['login']);
      $pass = htmlspecialchars($_POST['password']);
      doQuery($nom, $prenom, $login, $pass);
  } else {
    showError();
  }


/*
Renvoie faux si il y a une erreur dans le formulaire
*/
function isFormCorrect($nom, $prenom, $login, $pass)
{
  if (strlen($nom) >=3 && strlen($prenom) >=3
  && strlen($login) >= 4 && strlen($pass) >= 5) {
    return true;
  } else {
    return false;
  }
}

function doQuery($nom, $prenom, $login, $pass) {
  if (isFormCorrect($nom, $prenom, $login, $pass)) {
    insertData($nom, $prenom, $login, $pass);
  } else {
    showError();
  }
}

function insertData($nom, $prenom, $login, $pass) {
  //Connexion à la base
  $dsn = "sqlsrv:Server=info-dormeur;Database=Classique_Web";
  $user = 'ETD';
  $password = 'ETD';
  $pdo = new PDO($dsn, $user, $password);
  //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Hashage du MDP par sécurité
  $passHash = password_hash($pass, PASSWORD_DEFAULT);
  $sql = "INSERT INTO Abonné (Nom_Abonné, Prénom_Abonné, Login, Password) ";
  $sql .= "VALUES (:nom, :prenom, :login, :pass)";
  $req = $pdo->prepare($sql);
  // $req -> bindParam(1, $nom);
  // $req -> bindParam(2, $prenom);
  // $req -> bindParam(3, $login);
  // $req -> bindParam(4, $passHash);
  $req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'login' => $login,
    'pass' => $passHash
  ));
  echo "Abonné ajouté";
}


function showError() {
  echo "
  <div style=\"background-color: red;\">
    <h3>Erreur</h3>
    <p>Il manque quelquechose</p>
  </div> ";
}

?>
