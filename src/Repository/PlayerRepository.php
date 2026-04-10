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

    public function countAll()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM players");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function search(string $q = '', string $position = '', int $team_id = 0)
    {
        $sql = "SELECT players.*, teams.name as team_name FROM players LEFT JOIN teams ON players.team_id = teams.id WHERE 1=1";
        $params = [];

        if ($q) {
            $sql .= " AND (first_name LIKE :q OR last_name LIKE :q)";
            $params[':q'] = '%' . $q . '%';
        }
        if ($position) {
            $sql .= " AND position = :position";
            $params[':position'] = $position;
        }
        if ($team_id) {
            $sql .= " AND players.team_id = :team_id";
            $params[':team_id'] = $team_id;
        }

        $sql .= " ORDER BY last_name ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
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

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
        DELETE FROM players
        WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function update($id, $first_name, $last_name, $position, $jersey_number, $team_id)
    {
        $stmt = $this->pdo->prepare("
        UPDATE players
        SET first_name = :first_name,
            last_name = :last_name,
            position = :position,
            jersey_number = :jersey_number,
            team_id = :team_id
        WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':position' => $position,
            ':jersey_number' => $jersey_number,
            ':team_id' => $team_id
        ]);
    }
}
