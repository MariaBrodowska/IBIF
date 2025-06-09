<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Auth.php';
use App\Core\View;
use App\Core\Auth;

class ContactController
{
    public function form(): void
    {
        if (Auth::isLoggedIn()) {
            View::render('/../Views/contact/form', [
                'email' => $_SESSION['user']['email'],
            ], 'app');
        }
        View::render('/../Views/contact/form', [], 'public');
    }
}
