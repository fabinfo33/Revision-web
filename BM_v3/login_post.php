<?php

//Verification des informations
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
  //traitement anti-XSS
  $login = htmlspecialchars($_POST['login']);
  $pass = htmlspecialchars($_POST['pass']);

  //Connection à la base
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=bm;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
  //Préparation de la requete
  $req = $bdd->prepare('SELECT user_id, login, password FROM users WHERE login = :login');

  //execution de la requete
  $req->execute(array(
    'login' => $login
  ));
  //recuperation des informations
  $resultat = $req->fetch();

  if (!$resultat) {
    session_start();
    $_SESSION['error'] = 'Login introuvable';
    header('Location: login.php');

  } else {
    //verification du mdp
    if (password_verify($pass, $resultat['password'])) {
      session_start();
      $_SESSION['user_id'] = $resultat['user_id'];
      $_SESSION['login'] = $resultat['login'];
      header('Location: interface.php'); //utilisateur connecté

    } else {
      //mdp invalide
      session_start();
      $_SESSION['error'] = 'Mot de passe invalide';
      header('Location: login.php');
    }

  }

} else {
  session_start();
  $_SESSION['error'] = 'Champs vides';
  header('Location: login.php');
}

$req->closeCursor();

?>
