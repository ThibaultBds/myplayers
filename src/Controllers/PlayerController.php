<?php

namespace App\Controllers;

use App\Core\Database;

class PlayerController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index()
    {
        require_once __DIR__ . '/../Views/players/index.php';
    }
}
