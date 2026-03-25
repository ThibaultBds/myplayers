<?php

namespace App\Repository;
use PDO;

class PlayerRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM players ")
    }
}
