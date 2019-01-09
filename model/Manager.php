<?php
namespace zylkaôme\Projet_OC\Projet5\model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=OC_Projet5;charset=utf8', 'root', '');
        return $db;
    }
}
