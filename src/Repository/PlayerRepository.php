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

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM players WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function create($first_name, $last_name, $position, $jersey_number, $team_id)
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO players 
        (first_name, last_name, position, jersey_number, team_id) 
        VALUES 
        (:first_name, :last_name, :position, :jersey_number, :team_id)");
        $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':position' => $position,
            ':jersey_number' => $jersey_number,
            ':team_id' => $team_id
        ]);
    }
}
