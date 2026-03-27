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
}
