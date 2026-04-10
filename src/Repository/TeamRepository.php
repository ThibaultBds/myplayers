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

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM teams
        WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function findByTeamId($team_id)
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM players
        WHERE team_id = :team_id");
        $stmt->execute([':team_id' => $team_id]);
        return $stmt->fetchAll();
    }

    public function create($name, $conference, $logo)
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO teams
        (name, conference, logo)
        VALUES 
        (:name, :conference, :logo)");
        $stmt->execute([
            ':name' => $name,
            ':conference' => $conference,
            ':logo' => $logo
        ]);
    }

    public function update($id, $name, $conference, $logo)
    {
        $stmt = $this->pdo->prepare("
        UPDATE teams 
        SET name = :name,
            conference = :conference,
            logo = :logo
        WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':conference' => $conference,
            ':logo' => $logo
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
        DELETE FROM teams
        WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
