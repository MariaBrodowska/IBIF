<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
use App\Core\View;

class AdminController
{
    public function dashboard(): void
    {
        View::render('admin/dashboard', [], 'app');
    }
}
