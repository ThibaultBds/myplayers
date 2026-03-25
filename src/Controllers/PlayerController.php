<?php

namespace App\Controllers;

class PlayerController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        require_once __DIR__ . '/../Views/players/index.php';
    }
}
