<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Interface de gestion v0.2</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include('inc\header.php'); ?>

    <div class="w3-container w3-margin w3-flat-peter-river">
      <h1>Bienvenue sur l'interface de gestion</h1>
    </div>

    <!-- PART 1 -->
    <div class="w3-row-padding">
      <div class="w3-third">
        <div class="w3-card">
          <header class="w3-container w3-flat-midnight-blue">
            <h2>Mes prochains concerts</h2>
          </header>
          <div class="w3-container">
            <ul class="w3-ul">
              <li>01/07/2018 Vertheuil</li>
              <li>07/07/2018 Pauillac</li>
              <li>09/07/2018 Cissac</li>
            </ul>
          </div>
          <footer class="w3-container w3-flat-midnight-blue"><p>Date : XX/XX/XX à XXhXX</p></footer>
        </div>
      </div>
      <div class="w3-third">
        <div class="w3-card">
          <header class="w3-container w3-flat-midnight-blue">
            <h2>Mes morceaux à apprendre</h2>
            </header>
            <div class="w3-container">
              <ul class="w3-ul">
                <li>Megadeth - Symphony of destruction</li>
                <li>GnR - Welcome to the jungle</li>
                <li>Audioslave - Cochise</li>
                <li>Slash - Anastasia</li>
                <li>AC/DC - Highway to hell</li>
                <li>Avenged Sevenfold - Hail to the king</li>
              </ul>
            </div>
            <footer class="w3-container w3-flat-midnight-blue"><p>Date : XX/XX/XX à XXhXX</p></footer>
          </div>
        </div>
        <div class="w3-third">
          <div class="w3-card">
            <header class="w3-container w3-flat-midnight-blue">
              <h2>Mes messages</h2>
            </header>
            <div class="w3-container">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <footer class="w3-container w3-flat-midnight-blue"><p>Date : XX/XX/XX à XXhXX</p></footer>
          </div>
        </div>
      </div>

      <!-- PART 2  -->
      <div class="w3-row-padding w3-margin-top">
        <div class="w3-third">
          <div class="w3-card">
            <header class="w3-container w3-flat-midnight-blue">
              <h2 class="w3-left">Aperçu du chat</h2>
              <p class="w3-right"><a href="chat.php">CHAT</a></p>
            </header>
            <div class="w3-container">
              <?php
              //Lecture des informations de la base
              include('inc\connectionBDD.php'); //connection à la base

              //préparation de la requête
              $req = $bdd->prepare('SELECT login, message FROM chat
                                     INNER JOIN users ON chat.user_id = users.user_id
                                     ORDER BY message_id DESC LIMIT 0,5'); //on récupère le nom associé aux messages + limitation

              $req->execute();
              while ($resultats = $req->fetch()) { ?>
                <p><strong><?php echo $resultats['login'] ?> :</strong> <?php echo $resultats['message'] ?></p>
              <?php }
              $req->closeCursor();
               ?>
            </div>
            <footer class="w3-container w3-flat-midnight-blue"> <span>v0.1</span> </footer>
          </div>
        </div>
      </div>

    </div>
    <script>
    function w3_open() {
      document.getElementById("main").style.marginLeft = "25%";
      document.getElementById("sidebar").style.width = "25%";
      document.getElementById("sidebar").style.display = "block";
      document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
      document.getElementById("main").style.marginLeft = "0%";
      document.getElementById("sidebar").style.display = "none";
      document.getElementById("openNav").style.display = "inline-block";
    }
    function myAccFunc() {
      var x = document.getElementById("demoAcc");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-flat-midnight-blue";
      } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-flat-midnight-blue", "");
      }
    }
    </script>
  </body>
  </html>
