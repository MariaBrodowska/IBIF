<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
use App\Core\View;

class UserController
{
    public function dashboard(): void
    {
        View::render('user/dashboard', [], 'app');
    }
}
