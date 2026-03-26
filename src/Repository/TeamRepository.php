<?php

namespace App\Repository;

class TeamRepository
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM teams");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
