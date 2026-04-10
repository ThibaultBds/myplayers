<?php

namespace App\Repository;

class GameRepository
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->pdo->prepare("
        SELECT games.*, players.first_name, players.last_name
        FROM games
        JOIN players ON games.player_id = players.id
        ORDER BY games.date DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("
        SELECT * 
        FROM games
        WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function create($player_id, $home_team_id, $away_team_id, $date, $score_team, $score_opponent, $points, $rebounds, $assists, $minute_played)
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO games
        (player_id, home_team_id, away_team_id, date, score_team, score_opponent, points, rebounds, assists, minute_played)
        VALUES
        (:player_id, :home_team_id, :away_team_id, :date, :score_team, :score_opponent, :points, :rebounds, :assists, :minute_played)");
        $stmt->execute([
            ':player_id'      => $player_id,
            ':home_team_id'   => $home_team_id,
            ':away_team_id'   => $away_team_id,
            ':date'           => $date,
            ':score_team'     => $score_team,
            ':score_opponent' => $score_opponent,
            ':points'         => $points,
            ':rebounds'       => $rebounds,
            ':assists'        => $assists,
            ':minute_played'  => $minute_played
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
        DELETE FROM games
        WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function update($id, $player_id, $home_team_id, $away_team_id, $date, $score_team, $score_opponent, $points, $rebounds, $assists, $minute_played)
    {
        $stmt = $this->pdo->prepare("
        UPDATE games
        SET player_id      = :player_id,
            home_team_id   = :home_team_id,
            away_team_id   = :away_team_id,
            date           = :date,
            score_team     = :score_team,
            score_opponent = :score_opponent,
            points         = :points,
            rebounds       = :rebounds,
            assists        = :assists,
            minute_played  = :minute_played
        WHERE id = :id");
        $stmt->execute([
            ':id'             => $id,
            ':player_id'      => $player_id,
            ':home_team_id'   => $home_team_id,
            ':away_team_id'   => $away_team_id,
            ':date'           => $date,
            ':score_team'     => $score_team,
            ':score_opponent' => $score_opponent,
            ':points'         => $points,
            ':rebounds'       => $rebounds,
            ':assists'        => $assists,
            ':minute_played'  => $minute_played
        ]);
    }

    public function findByPlayerId($id)
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM games
        WHERE player_id = :player_id
        ORDER BY date DESC");
        $stmt->execute([':player_id' => $id]);
        return $stmt->fetchAll();
    }

    public function getTopScorers($limit = 5)
    {
        $stmt = $this->pdo->prepare("
        SELECT p.id, p.first_name, p.last_name, p.position, p.jersey_number,
               ROUND(AVG(g.points), 1) as ppg,
               ROUND(AVG(g.rebounds), 1) as rpg,
               ROUND(AVG(g.assists), 1) as apg,
               COUNT(g.id) as games_played
        FROM games g
        JOIN players p ON g.player_id = p.id
        GROUP BY p.id
        ORDER BY ppg DESC
        LIMIT :limit");
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countAll()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM games");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }
}
