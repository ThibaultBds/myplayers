<?php

namespace App\Repository;

class PlayerRepository
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM players");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
