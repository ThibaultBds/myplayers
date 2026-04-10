<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\TeamRepository;

class TeamController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index()
    {
        $teamRepository = new TeamRepository($this->db);
        $teams = $teamRepository->findAll();
        require_once __DIR__ . '/../Views/teams/index.php';
    }

    public function show($id)
    {
        $teamRepository = new TeamRepository($this->db);
        $team = $teamRepository->findById($id);
        $players = $teamRepository->findByTeamId($id);
        require_once __DIR__ . '/../Views/teams/show.php';
    }
}
