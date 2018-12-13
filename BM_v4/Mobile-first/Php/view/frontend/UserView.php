<?php
/**
 * Created by PhpStorm.
 * User: Fabien
 * Date: 12/12/2018
 * Time: 23:43
 */

namespace BM\view;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de utilisateurs</title>
</head>
<body>
    <ul>
        <?php
        if ($users != null) {
            foreach($users as $user) {
                echo '<li>'.$user['login'].'</li>';
            }
        } else {
            echo 'ERREUR';
        }

        ?>
    </ul>
</body>
</html>
