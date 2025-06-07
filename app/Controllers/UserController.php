<?php

namespace App\Controllers;

class UserController
{
    public function dashboard(): void
    {
        require_once __DIR__ . '/../Views/user/dashboard.php';
    }
}
