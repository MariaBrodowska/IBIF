<?php

namespace App\Controllers;

class AdminController
{
    public function dashboard(): void
    {
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }
}
