<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\UserRepository;

class AuthController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userRepository = new UserRepository($this->db);
        $admin = $userRepository->findByEmail($email);
        var_dump($admin);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['role'] = $admin['role'];
            header('Location :/admin');
            exit;
        } else {
            $error = 'Email ou mot de passe incorrect';
            require_once __DIR__ . '/../Views/auth/login.php';
        }
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: /');
        exit;
    }

    public function loginForm()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }
}
