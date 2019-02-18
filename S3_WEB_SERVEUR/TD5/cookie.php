<?php
/**
 * Created by PhpStorm.
 * User: falevy
 * Date: 12/10/2018
 * Time: 14:15
 */

if (isset($_COOKIE['visites'])) {
    $valueCookie = $_COOKIE['visites'];
    echo "Nombre de visites : " . $_COOKIE['visites'];
    setcookie("visites", $valueCookie+1);
} else {
    echo "Première fois, bienvenue ! ";
    setcookie("visites", 0);
}