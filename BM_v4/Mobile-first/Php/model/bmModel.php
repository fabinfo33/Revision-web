<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=bm;charset=utf8', 'root', '');
        return $db;
    }
}
