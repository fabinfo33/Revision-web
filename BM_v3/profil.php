<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Profil</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include('inc\header.php'); ?>

    <div class="w3-container w3-margin">
      <h1 class="w3-center">Mon profil</h1>
    </div>

    <div class="w3-row">
      <div class="w3-half w3-flat-clouds">
        <header class="w3-container w3-flat-midnight-blue">
          <h2>Vue d'ensemble de mon profil</h2>
        </header>
        <div class="w3-center">
          <img src="img\profile1.jpeg" alt="profile1" width="50%">
        </div>
        <div class="w3-container w3-center">
          <h3><b>John Doe</b></h3>
          <p>Guitariste</p>
        </div>
      </div>
      <div class="w3-half w3-flat-clouds">
        <header class="w3-container w3-flat-orange">
          <h2>Modification de mes informations</h2>
        </header>
        <form class="w3-container w3-border-left w3-border-bottom" action="index.html" method="post">
          <label for="prenom">Prénom</label>
          <input class="w3-input" type="text" name="prenom" value="John">
          <label for="nom">Nom</label>
          <input class="w3-input" type="text" name="nom" value="Doe">
          <label for="fonction">Fonction</label>
          <input class="w3-input" type="text" name="fonction" value="Guitariste">
          <button class="w3-button w3-green w3-margin w3-hover-orange" type="submit" name="submit">Modifier</button>
        </form>
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
