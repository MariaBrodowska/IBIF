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
    
    public function findByEmail(string $email): array|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function getRegistrationDate(string $email): string|false
    {
        $stmt = $this->pdo->prepare("SELECT created_at FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn();
    }

    public function countAll(): int {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users");
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }    

    public function getRecentUsers(int $limit = 5): array{
        $stmt = $this->pdo->prepare("SELECT email, created_at FROM users ORDER BY created_at DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateLanguage(string $email, string $lang): void
    {
        $stmt = $this->pdo->prepare("UPDATE users SET language = :lang WHERE email = :email");
        $stmt->execute([
            ':lang' => $lang,
            ':email' => $email,
        ]);
    }
}
