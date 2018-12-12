<?php

/*
Création d'un mot de passe hashé

*/

//récupération des informations
if (isset($_POST['pass'])) {
  //traitement anti-XSS
  $pass = htmlspecialchars($_POST['pass']);
  //hashage du mdp
  $pass_hashe = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  //affichage
  session_start();
  $_SESSION['pass'] = $pass; //non hashé
  $_SESSION['pass_hash'] = $pass_hashe; //hashé
  header('Location: createPassword.php');
} else {
  echo 'invalide';
}
?>
