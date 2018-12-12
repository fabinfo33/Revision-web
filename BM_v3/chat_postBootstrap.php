<?php

session_start();
// Connexion à la base
include('inc\connectionBDD.php');

//préparation de la requete
$req = $bdd->prepare('INSERT INTO chat(message, user_id) VALUES(:message, :user_id)');

//traitement des informations
$message = htmlspecialchars($_POST['chat']);

//excution de la requete
$req->execute(array('message' => $message,
                    'user_id' => $_SESSION['user_id']
 ));

 header('Location: chatBootstrap.php'); //message envoyé



 ?>
