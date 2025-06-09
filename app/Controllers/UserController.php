<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
require_once __DIR__. '/../Models/User.php';
require_once __DIR__. '/../Models/Post.php';
use App\Models\Post;
use App\Core\View;
use App\Core\Middleware;
use App\Models\User;

class UserController
{
    private User $user;
    private Post $postModel;

    public function __construct($pdo)
    {
        $this->user = new User($pdo);
        $this->postModel = new Post($pdo);
    }
    public function dashboard(): void
    {
        Middleware::requireUser();
        $email = $_SESSION['user']['email'] ?? '';
        $userId = $_SESSION['user']['id'] ?? null;
        
        if ($userId === null) {
            header('Location: /IBIF/public/logout');
            exit;
        }
        
        $posts = $this->postModel->getByUser($userId);

        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage = 5;
        $totalPosts = count($posts);
        $totalPages = ceil($totalPosts / $perPage);
        $slicedPosts = array_slice($posts, ($page - 1) * $perPage, $perPage);

        $registrationDate = $this->user->getRegistrationDate($email);
        View::render('user/dashboard', [
            'registrationDate' => $registrationDate,
            'posts' => $slicedPosts,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ], 'app');
    }
}
