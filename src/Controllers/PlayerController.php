<?php

namespace App\Controllers;

class PlayerController
{

    public function __construct()
    {
        require_once __DIR__ . '/../Views/players/index.php';
    }

    public function index() {}
}
