<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\PlayerRepository;
use App\Repository\TeamRepository;

class AdminController
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
        require_once __DIR__ . '/../Views/admin/index.php';
    }

    public function players()
    {
        $this->checkAuth();
        $playerRepository = new PlayerRepository($this->db);
        $players = $playerRepository->findAll();
        require_once __DIR__ . '/../Views/admin/players.php';
    }

    public function createPlayer()
    {
        $this->checkAuth();
        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();
        require_once __DIR__ . '/../Views/admin/create-player.php';
    }

    public function storePlayer()
    {
        $this->checkAuth();
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $position = $_POST['position'] ?? '';
        $jersey_number = $_POST['jersey_number'] ?? '';
        $team_id = $_POST['team_id'] ?? null;

        $playerRepository = new PlayerRepository($this->db);
        $playerRepository->create($first_name, $last_name, $position, $jersey_number, $team_id);
        header('Location: /admin/players');
        exit;
    }

    public function deletePlayer($id)
    {
        $this->checkAuth();
        $playerRepository = new PlayerRepository($this->db);
        $playerRepository->delete($id);
        header('Location: /admin/players');
        exit;
    }

    public function editPlayer($id)
    {
        $this->checkAuth();
        $playerRepository = new PlayerRepository($this->db);
        $player = $playerRepository->findById($id);
        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();
        require_once __DIR__ . '/../Views/admin/edit-player.php';
    }

    public function updatePlayer($id)
    {
        $this->checkAuth();
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $position = $_POST['position'] ?? '';
        $jersey_number = $_POST['jersey_number'] ?? '';
        $team_id = $_POST['team_id'] ?? null;

        $playerRepository = new PlayerRepository($this->db);
        $playerRepository->update($id, $first_name, $last_name, $position, $jersey_number, $team_id);
        header('Location: /admin/players');
        exit;
    }
}
