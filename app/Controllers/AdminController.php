<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
require_once __DIR__. '/../Models/User.php';
use App\Core\View;
use App\Core\Middleware;
use App\Models\User;

class AdminController
{
    private User $user;
    public function __construct($pdo)
    {
        $this->user = new User($pdo);
    }
    public function dashboard(): void
    {
        Middleware::requireAdmin();
        $userCount = $this->user->countAll();
        $recentUsers = $this->user->getRecentUsers(5);
        
        View::render('admin/dashboard', [
            'userCount' => $userCount,
            'recentUsers' => $recentUsers
        ], 'app');
    }
}
