<?php
/**
 * Created by PhpStorm.
 * User: falevy
 * Date: 12/10/2018
 * Time: 15:28
 */

session_start();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace Abonné</title>
</head>
<body>
 <?php
    if (isset($_SESSION['Nom_Abonné'])) {
        echo "<h1>Bienvenue " . $_SESSION['Nom_Abonné'] . "</h1>";
        echo "<h3> Votre ID : " . $_SESSION['Code_Abonné'] . "</h3>";
    } else {
        header('location: indexTD5.php');
    }

    ?>
</body>
</html>
