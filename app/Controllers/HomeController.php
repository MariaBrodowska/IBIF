<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
use App\Core\View;

class HomeController
{
    public function index(): void
    {
        View::render('home/home');
    }
}
