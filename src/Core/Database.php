<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        try {
            $host = getenv('DB_HOST') ?: 'db';
            $port = getenv('DB_PORT') ?: '3306';
            $db = getenv('DB_DATABASE') ?: 'myplayers';
            $user = getenv('DB_USERNAME') ?: 'myplayers_user';
            $pass = getenv('DB_PASSWORD') ?: 'myplayers_password';

            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

            $this->pdo = new PDO($dsn, $user, $pass);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new \RuntimeException("Erreur de connexio à la base de données : " . $e->getMessage(), 0, $e);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
