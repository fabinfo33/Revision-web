<?php
/**
 * Created by PhpStorm.
 * User: Fabien
 * Date: 12/12/2018
 * Time: 23:49
 */

namespace BM\controller;
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/model/UserManager.php');
use BM\model\UserManager;


function index() {
    $userM  = new UserManager();
    $users = $userM->getUsers();
    require (__ROOT__.'/view/frontend/UserView.php');
}
