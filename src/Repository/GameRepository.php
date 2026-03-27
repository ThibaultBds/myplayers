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
}
