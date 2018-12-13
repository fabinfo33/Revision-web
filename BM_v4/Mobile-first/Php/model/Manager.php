<?php
/**
 * Created by PhpStorm.
 * User: Fabien
 * Date: 12/12/2018
 * Time: 23:31
 */

namespace BM\model;

use PDO;

class Manager
{
    protected function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=bm;charset=utf8', 'root', '');
        return $db;
    }
}