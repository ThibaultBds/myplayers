<?php

$router->addRoute('GET', '/', 'App\Controllers\PlayerController', 'index');
$router->addRoute('GET', '/players/{id}', 'App\Controllers\PlayerController', 'show');
$router->addRoute('GET', '/login', 'App\Controllers\AuthController', 'loginForm');
$router->addRoute('POST', '/login', 'App\Controllers\AuthController', 'login');
$router->addRoute('GET', '/logout', 'App\Controllers\AuthController', 'logout');
$router->addRoute('GET', '/admin', 'App\Controllers\AdminController', 'index');
$router->addRoute('GET', '/admin/players', 'App\Controllers\AdminController', 'players');
