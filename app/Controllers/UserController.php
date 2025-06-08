<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
require_once __DIR__. '/../Models/User.php';
use App\Core\View;
use App\Core\Middleware;
use App\Models\User;

class UserController
{
    private User $user;
    public function __construct($pdo)
    {
        $this->user = new User($pdo);
    }
    public function dashboard(): void
    {
        Middleware::requireUser();
        $email = $_SESSION['user']['email'] ?? '';
        $registrationDate = $this->user->getRegistrationDate($email);
        View::render('user/dashboard', [
            'registrationDate' => $registrationDate
        ], 'app');
    }
}
