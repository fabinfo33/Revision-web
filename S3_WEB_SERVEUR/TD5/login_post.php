<?php
/**
 * Created by PhpStorm.
 * User: falevy
 * Date: 12/10/2018
 * Time: 14:39
 */



if (isset($_POST['login']) && isset($_POST['password'])) {
    //protection
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['password']);

    doConnection($login, $pass);
}



function doConnection($login, $pass) {
    $dsn = "sqlsrv:Server=info-dormeur;Database=Classique_Web";
    $user = 'ETD';
    $password = 'ETD';
    $pdo = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM Abonné WHERE Login = :login";
    $req = $pdo->prepare($sql);
    $req->execute(['login' => $login]);

    if ($result = $req->fetch()) {
        $passHashe = $result['Password'];
        if (password_verify($pass, $passHashe)) {
            //on se connecte
            session_start();
            $_SESSION['Nom_Abonné'] = $result['Nom_Abonné'];
            $_SESSION['Login'] = $result['Login'];
            $_SESSION['Code_Abonné'] = $result['Code_Abonné'];

            header('location: espaceAbonne.php');
        } else {
            echo "mdp invalide";
        }
    } else {
        echo "Non trouvé";
    }
}