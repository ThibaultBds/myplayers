<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/database.php';

use App\Core\Router;
use App\Core\Database;

$db = new Database($config['host'], $config['dbname'], $config['user'], $config['password']);
$router = new Router($db);


require_once __DIR__ . '/../routes/web.php';

$router->dispatch();
