<?php

namespace App\Models;

require_once __DIR__ . '/../../config/db.php';

class User
{
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function create(string $email,string $passwordHash, string $role = 'user'): bool{
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password_hash, role) VALUES (:email, :password_hash, :role)");
        return $stmt->execute([
            'email' => $email,
            'password_hash' => $passwordHash,
            'role' => $role
        ]);
    }
    
    public function findByEmail(string $email): bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
}
