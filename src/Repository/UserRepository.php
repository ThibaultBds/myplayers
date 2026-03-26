<?php

namespace App\Repository;

class UserRepository
{
    private $pdo;

    public function __construct($db)
    {
        $this->pdo = $db->getConnection();
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->pdo->prepare("
        SELECT * 
        FROM users
        WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }
}
