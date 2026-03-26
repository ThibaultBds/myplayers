<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\PlayerRepository;

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
        require_once __DIR__ . '/../Views/players/index.php';
    }

    public function show($id)
    {
        $playerRepository = new PlayerRepository($this->db);
        $player = $playerRepository->findById($id);
        require_once __DIR__ . '/../Views/players/show.php';
    }
}
