<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use App\Repository\TeamRepository;

class GameController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    private function checkAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    public function index()
    {
        $this->checkAuth();
        $gameRepository = new GameRepository($this->db);
        $games = $gameRepository->findAll();
        require_once __DIR__ . '/../Views/admin/games.php';
    }

    public function createGame()
    {
        $this->checkAuth();
        $playerRepository = new PlayerRepository($this->db);
        $players = $playerRepository->findAll();
        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();
        require_once __DIR__ . '/../Views/admin/create-game.php';
    }

    public function storeGame()
    {
        $this->checkAuth();
        $player_id = $_POST['player_id'] ?? '';
        $home_team_id = $_POST['home_team_id'] ?? '';
        $away_team_id = $_POST['away_team_id'] ?? '';
        $date = $_POST['date'] ?? '';
        $score_team = $_POST['score_team'] ?? '';
        $score_opponent = $_POST['score_opponent'] ?? '';
        $points = $_POST['points'] ?? '';
        $rebounds = $_POST['rebounds'] ?? '';
        $assists = $_POST['assists'] ?? '';
        $minute_played = $_POST['minute_played'] ?? '';

        $gameRepository = new GameRepository($this->db);
        $gameRepository->create($player_id, $home_team_id, $away_team_id, $date, $score_team, $score_opponent, $points, $rebounds, $assists, $minute_played);
        header('Location: /admin/games');
        exit;
    }

    public function editGame($id)
    {
        $this->checkAuth();
        $gameRepository = new GameRepository($this->db);
        $game = $gameRepository->findById($id);
        $playerRepository = new PlayerRepository($this->db);
        $players = $playerRepository->findAll();
        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();
        require_once __DIR__ . '/../Views/admin/edit-game.php';
    }

    public function updateGame($id)
    {
        $this->checkAuth();
        $player_id = $_POST['player_id'] ?? '';
        $home_team_id = $_POST['home_team_id'] ?? '';
        $away_team_id = $_POST['away_team_id'] ?? '';
        $date = $_POST['date'] ?? '';
        $score_team = $_POST['score_team'] ?? '';
        $score_opponent = $_POST['score_opponent'] ?? '';
        $points = $_POST['points'] ?? '';
        $rebounds = $_POST['rebounds'] ?? '';
        $assists = $_POST['assists'] ?? '';
        $minute_played = $_POST['minute_played'] ?? '';

        $gameRepository = new GameRepository($this->db);
        $gameRepository->update($id, $player_id, $home_team_id, $away_team_id, $date, $score_team, $score_opponent, $points, $rebounds, $assists, $minute_played);
        header('Location: /admin/games');
        exit;
    }

    public function deleteGame($id)
    {
        $this->checkAuth();
        $gameRepository = new GameRepository($this->db);
        $gameRepository->delete($id);
        header('Location: /admin/games');
        exit;
    }
}
