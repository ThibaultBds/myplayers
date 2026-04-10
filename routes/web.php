<?php

// --- Public ---
$router->addRoute('GET', '/', 'App\Controllers\PlayerController', 'index');
$router->addRoute('GET', '/players', 'App\Controllers\PlayerController', 'list');
$router->addRoute('GET', '/players/{id}', 'App\Controllers\PlayerController', 'show');
$router->addRoute('GET', '/teams', 'App\Controllers\TeamController', 'index');
$router->addRoute('GET', '/teams/{id}', 'App\Controllers\TeamController', 'show');

// --- Auth ---
$router->addRoute('GET', '/login', 'App\Controllers\AuthController', 'loginForm');
$router->addRoute('POST', '/login', 'App\Controllers\AuthController', 'login');
$router->addRoute('GET', '/logout', 'App\Controllers\AuthController', 'logout');

// --- Admin : Players ---
$router->addRoute('GET', '/admin', 'App\Controllers\AdminController', 'index');
$router->addRoute('GET', '/admin/players', 'App\Controllers\AdminController', 'players');
$router->addRoute('GET', '/admin/players/create', 'App\Controllers\AdminController', 'createPlayer');
$router->addRoute('POST', '/admin/players/create', 'App\Controllers\AdminController', 'storePlayer');
$router->addRoute('GET', '/admin/players/{id}/edit', 'App\Controllers\AdminController', 'editPlayer');
$router->addRoute('POST', '/admin/players/{id}/edit', 'App\Controllers\AdminController', 'updatePlayer');
$router->addRoute('POST', '/admin/players/{id}/delete', 'App\Controllers\AdminController', 'deletePlayer');

// --- Admin : Teams ---
$router->addRoute('GET', '/admin/teams', 'App\Controllers\AdminController', 'teams');
$router->addRoute('GET', '/admin/teams/create', 'App\Controllers\AdminController', 'createTeam');
$router->addRoute('POST', '/admin/teams/create', 'App\Controllers\AdminController', 'storeTeam');
$router->addRoute('GET', '/admin/teams/{id}/edit', 'App\Controllers\AdminController', 'editTeam');
$router->addRoute('POST', '/admin/teams/{id}/edit', 'App\Controllers\AdminController', 'updateTeam');
$router->addRoute('POST', '/admin/teams/{id}/delete', 'App\Controllers\AdminController', 'deleteTeam');

// --- Admin : Games ---
$router->addRoute('GET', '/admin/games', 'App\Controllers\GameController', 'index');
$router->addRoute('GET', '/admin/games/create', 'App\Controllers\GameController', 'createGame');
$router->addRoute('POST', '/admin/games/create', 'App\Controllers\GameController', 'storeGame');
$router->addRoute('GET', '/admin/games/{id}/edit', 'App\Controllers\GameController', 'editGame');
$router->addRoute('POST', '/admin/games/{id}/edit', 'App\Controllers\GameController', 'updateGame');
$router->addRoute('POST', '/admin/games/{id}/delete', 'App\Controllers\GameController', 'deleteGame');
