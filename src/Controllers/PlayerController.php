<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\PlayerRepository;
use App\Repository\GameRepository;
use App\Repository\TeamRepository;

class PlayerController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index()
    {
        $playerRepository = new PlayerRepository($this->db);
        $players = $playerRepository->findAll();
        $totalPlayers = $playerRepository->countAll();

        $gameRepository = new GameRepository($this->db);
        $totalGames = $gameRepository->countAll();
        $topScorers = $gameRepository->getTopScorers(5);

        $teamRepository = new TeamRepository($this->db);
        $totalTeams = count($teamRepository->findAll());

        require_once __DIR__ . '/../Views/players/index.php';
    }

    public function list()
    {
        $q = trim($_GET['q'] ?? '');
        $position = $_GET['position'] ?? '';
        $team_id = (int)($_GET['team_id'] ?? 0);

        $playerRepository = new PlayerRepository($this->db);
        $players = $playerRepository->search($q, $position, $team_id);

        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();

        require_once __DIR__ . '/../Views/players/list.php';
    }

    public function show($id)
    {
        $playerRepository = new PlayerRepository($this->db);
        $player = $playerRepository->findById($id);
        $gameRepository = new GameRepository($this->db);
        $games = $gameRepository->findByPlayerId($id);
        require_once __DIR__ . '/../Views/players/show.php';
    }
}
