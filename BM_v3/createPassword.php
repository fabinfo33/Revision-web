<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Générateur de password hashé</title>
  </head>
  <body>
    <h1>Création d'un mot de passé hashé</h1>
    <form action="createPassword_post.php" method="post">
      <input type="text" name="pass" placeholder="Entrez votre mot de passe">
      <button type="submit" name="submit">Valider</button>
    </form>
    <?php if(isset($_SESSION['pass']) && isset($_SESSION['pass_hash'])) { ?>
    <p>Vous avez entré : <?php echo $_SESSION['pass']; ?></p>
    <p>Le mot de passe hashé est : <?php echo $_SESSION['pass_hash']; ?> </p>
    <?php  $_SESSION = array(); session_destroy(); } ?>
  </body>
</html>
