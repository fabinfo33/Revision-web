<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Morceaux</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php include('inc\header.php'); ?>

    <div class="w3-container w3-center">
      <h1>Mes morceaux</h1>
    </div>

    <!-- tableau de tous les morceaux du groupe  -->
    <div class="w3-container">
      <h2>Vue d'ensemble des mes morceaux</h2>
      <p>Vous pouvez effectuer une recherche</p>

      <input class="w3-input w3-border w3-padding" type="text" placeholder="recherche par nom..." id="myInput" onkeyup="myFunction()">

      <table class="w3-table-all w3-margin-top" id="myTable">
        <tr>
          <th style="width:50%;">Nom</th>
          <th style="width:30%;">Artiste</th>
          <th style="width:10%;">Etat</th>
          <th style="width:10%">Note</th>
        </tr>
        <tr>
          <td>Symphony of destruction</td>
          <td>Megadeth</td>
          <td> <i class="fa fa-check" style="color: green;"></i> </td>
          <td> <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span></td>
          </tr>
          <tr>
            <td>Welcome to the jungle</td>
            <td>GnR</td>
            <td><i class="fa fa-circle-o-notch fa-spin" style="color: orange;"></i></td>
            <td> <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span></td>
            </tr>
            <tr>
              <td>Cochise</td>
              <td>Audioslave</td>
              <td> <i class="	fa fa-remove" style="color: red;"></i> </td>
              <td> <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span></td>
              </tr>
              <tr>
                <td>Anastasia</td>
                <td>Slash</td>
                <td> <i class="fa fa-check" style="color: green;"></i> </td>
                <td> <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span></td>
                </tr>
                <tr>
                  <td>Highway to hell</td>
                  <td>AC/DC</td>
                  <td> <i class="fa fa-check" style="color: green;"></i> </td>
                  <td> <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span></td>
                  </tr>
                  <tr>
                    <td>Hail to the king</td>
                    <td>Avenged Sevenfold</td>
                    <td><i class="fa fa-circle-o-notch fa-spin" style="color: orange;"></i></td>
                    <td> <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span></td>
                    </tr>
                  </table>
                </div>

                <!-- Mettre a jour status d'un morceaux -->
                <div class="w3-row-padding w3-margin-top w3-margin-bottom">
                  <div class="w3-half">
                    <div class="w3-card-2">
                      <header class="w3-container w3-flat-wet-asphalt">
                        <h3>Mettre à jour le status d'un morceaux</h3>
                      </header>
                      <form class="w3-container" action="index.html" method="post">
                        <label>Morceaux</label>
                        <select class="w3-select w3-border" name="option">
                          <option value="" disabled selected>Choisissez un morceaux depuis la liste</option>
                          <option value="1">Avenged Sevenfold - Hail to the king</option>
                          <option value="2">Megadeth - Symphony of destruction</option>
                          <option value="3">GnR - Welcome to the jungle</option>
                        </select>
                        <p>Veuillez selectionner le status</p>
                        <input class="w3-radio" type="radio" name="status" value="Maitrisé" checked>
                        <label>Maitrisé</label>
                        <input class="w3-radio" type="radio" name="status" value="En cours d'apprentissage">
                        <label>En cours d'apprentissage</label>
                        <input class="w3-radio w3-margin-bottom" type="radio" name="status" value="Non appris">
                        <label>Non appris</label>
                        <button type="submit" name="submit" class="w3-btn w3-green">Valider</button>
                      </form>
                    </div>
                  </div>
                </div>




              </div>

              <!-- JavaScript -->
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

              function myFunction() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0];
                  if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }
                }
              }
            </script>
          </body>
          </html>
