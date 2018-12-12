<?php
session_start();
 ?>


<!-- header et menu à remplacer par du php  -->
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="sidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Fermer &times;</button>
  <a href="profil.php" class="w3-bar-item w3-button">Mon profil</a>
  <a href="morceaux.php" class="w3-bar-item w3-button">Mes morceaux</a>
  <a href="#" class="w3-bar-item w3-button">Mes messages</a>
  <a href="#" class="w3-bar-item w3-button">Mes concerts</a>
  <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
    Articles <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc" class="w3-hide w3-white w3-card">
    <a href="#" class="w3-bar-item w3-button">Créer</a>
    <a href="#" class="w3-bar-item w3-button">Modifier</a>
    <a href="#" class="w3-bar-item w3-button">Supprimer</a>
  </div>
  <a class="w3-bar-item w3-button" href="#">Vote</a>
  <a class="w3-bar-item w3-button" href="chat.php">Chat</a>
  <a class="w3-bar-item w3-button w3-red" href="logout.php">Déconnexion</a>
</div>

<div id="main">
  <div class="w3-flat-midnight-blue">
    <button id="openNav" class="w3-button w3-flat-midnight-blue w3-large" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
      <h3 class="w3-left"><a href="interface.php" style="text-decoration: none;">Interface de gestion membres v0.3 + PHP</a></h3>
      <h3 class="w3-right">
        <!-- personnalisation de l'utilisateur -->
        <?php if(isset($_SESSION['login'])){
          echo $_SESSION['login'];
        }else {
          echo 'inconnu';
        } ?>
      </h3>
    </div>
  </div>
  <!-- fin du menu et du header  -->
