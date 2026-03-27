<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\GameRepository;
use App\Repository\PlayerRepository;

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
        require_once __DIR__ . '/./Views/admin/games.php';
    }

    public function createGame()
    {
        $this->checkAuth();
        $gameRepository = new GameRepository($this->db);
        $games = $gameRepository->findAll();
        require_once __DIR__ . '/../Views/admin/create-games.php';
    }
}
