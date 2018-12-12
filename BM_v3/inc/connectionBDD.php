<?php
// Connexion à la base
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=bm;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
?>
