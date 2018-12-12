<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Chat</title>
</head>
<body>
  <?php include 'inc\header.php'; ?>
  <h2>Chat</h2>
  <div id="mainContainer" class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
        <a href="#" class="navbar-brand">Blue motion chat</a>
        <span class="navbar-text badge badge-secondary ml-auto">V.0.1</span>
        <span class="navbar-text badge badge-danger ml-auto">WORK IN PROGRESS</span>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 bg-info">

        <?php
        //Lecture des informations de la base
        include('inc\connectionBDD.php'); //connection à la base

        //préparation de la requête
        $req = $bdd->prepare('SELECT login, message FROM chat
                               INNER JOIN users ON chat.user_id = users.user_id
                               ORDER BY message_id ASC LIMIT 0,40'); //on récupère le nom associé aux messages

        $req->execute();
        while ($resultats = $req->fetch()) { ?>
          <div class="container-fluid">
            <div class="row mt-2">
              <div class="col-lg-2 col-sm-4 col-5 bg-dark text-white mb-2">
                <p> <strong><?php echo $resultats['login']; ?></strong> <span class="badge badge-danger">ADMIN</span> </p>
              </div>
              <div class="col-lg-10 col-sm-8 col-7 bg-light text-dark mb-2">
                <p><?php echo $resultats['message']; ?></p>
              </div>
            </div>
          </div>
        <?php }
        $req->closeCursor();
         ?>


        <div class="container-fluid">
          <div class="row mt-2">
            <div class="col-lg-2 col-sm-4 col-5 bg-dark text-white mb-2">
              <p> <strong>Fabien</strong> <span class="badge badge-danger">ADMIN</span> </p>
            </div>
            <div class="col-lg-10 col-sm-8 col-7 bg-light text-dark mb-2">
              <p>Je suis entrain de développer le chat du groupe et y'a encore du boulot !</p>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row mt-2">
            <div class="col-lg-10 col-sm-8 col-7 bg-light text-dark mb-2">
              <p>La baterie est réparée je l'accorde et c'est parti !</p>
            </div>
            <div class="col-lg-2 col-sm-4 col-5 bg-dark text-white mb-2">
              <p><strong>Romain</strong> <span class="badge badge-success">Membre</span> </p>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row mt-2">
            <div class="col-lg-2 col-sm-4 col-5 bg-dark text-white mb-2">
              <p> <strong>Fabien</strong> <span class="badge badge-danger">ADMIN</span> </p>
            </div>
            <div class="col-lg-10 col-sm-8 col-7 bg-light text-dark mb-2">
              <p>J'ai besoin de toi pour installer le matériel Dimanche à 12h30</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form class="" action="chat_postBootstrap.php" method="post">
      <input class="form-control" type="text" name="chat" placeholder="écrivez ici">
    </form>
  </div>

<!-- script de w3 -->
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
  <!-- Script de bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
