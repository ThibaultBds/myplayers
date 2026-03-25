<?php

namespace App\Core;

use PDO;


class Database
{
    private $pdo;

    public function __construct($host, $dbname, $user, $password)
    {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
