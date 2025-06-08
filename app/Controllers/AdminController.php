<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
use App\Core\View;
use App\Core\Middleware;

class AdminController
{
    public function dashboard(): void
    {
        Middleware::requireAdmin();
        View::render('admin/dashboard', [], 'app');
    }
}
