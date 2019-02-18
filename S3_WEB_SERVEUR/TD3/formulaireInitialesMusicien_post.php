 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Resultats</title>
   </head>
   <body>
     <?php
         $dsn = "sqlsrv:Server=info-dormeur;Database=Classique_Web";
         $user = 'ETD';
         $password = 'ETD';
         $pdo = new PDO($dsn, $user, $password);
         if (isset($_GET['ini'])) {
           $initiale = $_GET['ini']."%";
         }

         $sql = "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE :nom";
         $query = $pdo->prepare($sql);

           echo "<ul>";
           $query->execute(['nom' => $initiale]);
           foreach ($query as $row) {
             echo "<li>".$row['Nom_Musicien']."</li>";
           }
           echo "</ul>";

      ?>
   </body>
 </html>
