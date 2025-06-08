<?php

namespace App\Models;

require_once __DIR__ . '/../../config/db.php';

class Post
{
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create(string $title, string $content, int $userId): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)');
        return $stmt->execute([$title, $content, $userId]);
    }

    public function all(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public function getByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
