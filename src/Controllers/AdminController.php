<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\PlayerRepository;

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
}
