<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <nav class="w3-bar w3-flat-midnight-blue">
    <a class="w3-bar-item w3-green w3-button w3-hover-orange" href="index.html">Accueil</a>
  </nav>

  <!-- Formulaire de login -->
  <div class="w3-container">
    <div id="login">
      <div class="w3-card-4 w3-mobile">
        <header class="w3-flat-midnight-blue w3-container">
          <h2>Login membre</h2>
        </header>
        <div class="w3-container">
          <form class="w3-margin-top w3-margin-bottom" action="login_post.php" method="post">
            <label>Login</label>
            <input type="text" name="login" class="w3-input" required>
            <label>Mot de passe</label>
            <input class="w3-input " type="password" name="pass" required>
            <button class="w3-button w3-green w3-hover-orange w3-margin-top" type="submit" name="submit">Se connecter</button>
          </form>

          <?php //Affichage des erreurs
            if (isset($_SESSION['error'])) { ?>
              <div class="w3-pannel w3-red">
                <p>Erreur : <?php echo $_SESSION['error'];  unset($_SESSION['error']); ?></p>
              </div>
          <?php } ?>

        </div>
        <footer class="w3-container w3-flat-midnight-blue">
          <p>Blue Motion</p>
        </footer>
      </div>
    </div>
  </div>
</body>
</html>
