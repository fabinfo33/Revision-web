<?php
/**
 * Created by PhpStorm.
 * User: Fabien
 * Date: 12/12/2018
 * Time: 23:36
 */

namespace BM\model;
require_once ('Manager.php');

class UserManager extends Manager
{
    public function getUsers() {
        $db = $this->dbConnect();
        $req = $db->query("SELECT * FROM users");
        return $req;
    }
}