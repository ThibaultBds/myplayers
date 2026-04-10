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
        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $position = trim($_POST['position'] ?? '');
        $jersey_number = $_POST['jersey_number'] ?? '';
        $team_id = $_POST['team_id'] ?? null;

        if (!$first_name || !$last_name || !$position || $jersey_number === '') {
            header('Location: /admin/players/create');
            exit;
        }

        $playerRepository = new PlayerRepository($this->db);
        $playerRepository->create($first_name, $last_name, $position, (int)$jersey_number, $team_id);
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

    public function teams()
    {
        $this->checkAuth();
        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();
        require_once __DIR__ . '/../Views/admin/teams.php';
    }

    public function createTeam()
    {
        $this->checkAuth();
        require_once __DIR__ . '/../Views/admin/create-team.php';
    }

    public function storeTeam()
    {
        $this->checkAuth();
        $name = trim($_POST['name'] ?? '');
        $conference = trim($_POST['conference'] ?? '');
        $logo = trim($_POST['logo'] ?? '');

        if (!$name || !in_array($conference, ['East', 'West'])) {
            header('Location: /admin/teams/create');
            exit;
        }

        $teamRepository = new TeamRepository($this->db);
        $teamRepository->create($name, $conference, $logo);
        header('Location: /admin/teams');
        exit;
    }

    public function editTeam($id)
    {
        $this->checkAuth();
        $teamRepository = new TeamRepository($this->db);
        $team = $teamRepository->findById($id);
        require_once __DIR__ . '/../Views/admin/edit-team.php';
    }

    public function updateTeam($id)
    {
        $this->checkAuth();
        $name = $_POST['name'] ?? '';
        $conference = $_POST['conference'] ?? '';
        $logo = $_POST['logo'] ?? '';

        $teamRepository = new TeamRepository($this->db);
        $teamRepository->update($id, $name, $conference, $logo);
        header('Location: /admin/teams');
        exit;
    }

    public function deleteTeam($id)
    {
        $this->checkAuth();
        $teamRepository = new TeamRepository($this->db);
        $teamRepository->delete($id);
        header('Location: /admin/teams');
        exit;
    }
}
