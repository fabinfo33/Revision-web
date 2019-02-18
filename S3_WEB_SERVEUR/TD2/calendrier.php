<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <title>Calendrier</title>
</head>
<body>
  <?php
  $jours = array('', 'Lun', 'Mar', 'Mer', 'Jeu',
  'Ven', 'Sam', 'Dim');
  $joursEN = array('', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' );
  $mois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
  'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
  $moisEN = array('', 'Jan', 'Fev', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sept', 'oct', 'nov', 'dec');

  $mois = 'sept';
  $annee = 2018;
  $jourDuPremierDuMois = date("D", strtotime("first day of ".$mois." ".$annee));
  $NbreDeJourDansLeMois = date("t", strtotime("".$mois. " ".$annee));

  if (isset(_GET['m']) && isset([_GET['y'])) {
    //Remplacer le mois et annee
  }
  ?>


  <table id="calendrier">
    <thead>
      <tr>
        <th>
          <div style="display: inline; float:left;">
            <a href="#"><i class="fas fa-angle-left"></i></a>Mois<a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
          <div style="display: inline; float: right;">
            <a href="#"><i class="fas fa-angle-left"></i></a>Années<a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr class="joursSemaine">
        <?php
          for ($i=0; $i < count($jours) ; $i++) {
            echo "<th>".$jours[$i]."</th>";
          }
         ?>
      </tr>
      <tr class="numSemaine jours">
        <th><?php echo date("W",strtotime("$mois")); ?></th>
        <?php for ($i=1; $i < count($jours) ; $i++) {
          if ($jourDuPremierDuMois != 'mon') // A REVOIR
           echo "<td>".date("D", strtotime("first day of ".$mois." ".$annee))."</td>";
          // echo "<td>".date("D", strtotime("first day of sept 2018"))."</td>";

        } ?>

      </tr>
      <tr class="numSemaine jours">
        <th><?php echo date("W",strtotime($mois." +1week")); ?></th>
        <td><?php echo date("d",strtotime("monday")); ?></td>
        <td><?php echo date("d",strtotime("tuesday")); ?></td>
        <td><?php echo date("d",strtotime("wednesday")); ?></td>
        <td><?php echo date("d",strtotime("thursday")); ?></td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr class="numSemaine jours">
        <th><?php echo date("W",strtotime($mois." +2week")); ?></th>
        <td><?php echo date("d",strtotime("monday")); ?></td>
        <td><?php echo date("d",strtotime("tuesday")); ?></td>
        <td><?php echo date("d",strtotime("wednesday")); ?></td>
        <td><?php echo date("d",strtotime("thursday")); ?></td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr class="numSemaine jours">
        <th><?php echo date("W",strtotime($mois."+3week")); ?></th>
        <td><?php echo date("d",strtotime("monday")); ?></td>
        <td><?php echo date("d",strtotime("tuesday")); ?></td>
        <td><?php echo date("d",strtotime("wednesday")); ?></td>
        <td><?php echo date("d",strtotime("thursday")); ?></td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr class="numSemaine jours">
        <th><?php echo date("W",strtotime($mois."+4week")); ?></th>
        <td><?php echo date("d",strtotime("monday")); ?></td>
        <td><?php echo date("d",strtotime("tuesday")); ?></td>
        <td><?php echo date("d",strtotime("wednesday")); ?></td>
        <td><?php echo date("d",strtotime("thursday")); ?></td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr class="numSemaine jours">
        <th><?php echo date("W",strtotime($mois."+5week")); ?></th>
        <td><?php echo date("d",strtotime("monday")); ?></td>
        <td><?php echo date("d",strtotime("tuesday")); ?></td>
        <td><?php echo date("d",strtotime("wednesday")); ?></td>
        <td><?php echo date("d",strtotime("thursday")); ?></td>
        <td><?php echo date("d",strtotime("friday")); ?></td>
        <td><?php echo date("d",strtotime("saturday")); ?></td>
        <td><?php echo date("d",strtotime("sunday")); ?></td>
      </tr>
    </tbody>
  </table>



  <!-- PROTOTYPE -->
  <!-- <table id="calendrier">
    <thead>
      <tr>
        <th style="width: 100%">
          <div style="display: inline; float:left;">
            <a href="#"><i class="fas fa-angle-left"></i></a>Mois<a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
          <div style="display: inline; float: right;">
            <a href="#"><i class="fas fa-angle-left"></i></a>Années<a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </th>
      </tr>
    </thead>
    <tbody style="display: block; clear: both">
      <tr class="joursSemaine">
        <td>...</td>
        <td>Lun</td>
        <td>Lun</td>
        <td>Lun</td>
        <td>Lun</td>
        <td>Lun</td>
        <td>Lun</td>
        <td>Lun</td>
      </tr>
      <tr class="numSemaine jours">
        <th>31</th>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr class="numSemaine jours">
        <th>31</th>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr class="numSemaine jours">
        <th>31</th>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
    </tbody>
  </table> -->
</body>
</html>
