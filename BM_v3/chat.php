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

  <div class="w3-container">
    <h2>Chat</h2>
  </div>
  <div class="w3-container">
    <div id="chatContainer" class="w3-container w3-flat-clouds" style="height: 300px; overflow : auto;">
      <?php
      //Lecture des informations de la base
      include('inc\connectionBDD.php'); //connection à la base

      //préparation de la requête
      $req = $bdd->prepare('SELECT login, message FROM chat
        INNER JOIN users ON chat.user_id = users.user_id
        ORDER BY message_id ASC LIMIT 0,40'); //on récupère le nom associé aux messages

        $req->execute();
        while ($resultats = $req->fetch()) { ?>
          <p><strong><?php echo $resultats['login'] ?> :</strong> <?php echo $resultats['message'] ?></p>
        <?php }
        $req->closeCursor();
        ?>

      </div>
      <form class="" action="chat_post.php" method="post">
        <input class="w3-input w3-border" type="text" name="chat" placeholder="écrivez ici" id="envoi">
      </form>
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
    <!-- JQuery -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
    <!-- Dev en cours -->
    <script>
      $("#envoi").keyPressed(function(e) {
        e.preventDefault();
        var message = encodeURIComponent($("#envoi").val()); //sécu
        $.ajax({
          url : "chat_post.php",
          type : "POST",
          data : "chat=" + message //envoi des données
        });
      });
    </script>
  </body>
  </html>
