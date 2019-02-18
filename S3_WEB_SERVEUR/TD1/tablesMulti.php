<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Table de multiplication</title>
  </head>
  <body>
    <table>
        <tr>
          <?php for ($i=1; $i < 10; $i++) {
            echo "<th>".$i."</th>";
          } ?>
        </tr>
          <?php for ($j=2; $j <10 ; $j++) {
            echo "<tr><th>".$j."</th>";
            for ($k=2; $k < 10; $k++) {
              echo "<td>".$j*$k."</td>";
            }
            echo "</tr>";
          } ?>
    </table>
  </body>
</html>
