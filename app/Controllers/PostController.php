<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
require_once __DIR__. '/../Models/Post.php';
use App\Core\View;
use App\Core\Middleware;
use App\Models\Post;

class PostController
{
    private Post $postModel;
    public function __construct($pdo)
    {
        $this->postModel = new Post($pdo);
    }

    public function create(): void
    {
        Middleware::requireUser();
        View::render('user/add_content', [], 'app');
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $userId = $_SESSION['user']['id'];

            if ($title && $content && $userId) {
                $this->postModel->create($title, $content, $userId);
                View::render('user/add_content', ['success' => 'content_added'], 'app');
                exit;
            }
            View::render('user/add_content', [
                'error' => 'fields_required',
                'title_input' => $title,
                'content' => $content
            ], 'app');
        }
    }

    public function show(): void
    {
        Middleware::requireUser();
        $id = (int)$_GET['id'];   
        $post = $this->postModel->getById($id);
        
        if ($post) {
            View::render('user/show_post', ['post' => $post], 'app');
        }
    }
}
