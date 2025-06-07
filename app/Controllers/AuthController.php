<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Core/Auth.php';

use App\Core\View;
use App\Models\User;
use App\Core\Auth;

class AuthController
{
    private User $userModel;
    
    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function login(): void
    {
        session_start();
        View::render('auth/login');
        
    }

    public function register(): void
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleRegister();
        } else {
            View::render('auth/register');
        }
    }
    
    private function handleRegister(): void
    {
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            View::render('auth/register', ['error' => 'Invalid email address']);
            exit;
        }

        if ($password !== $confirm) {
            View::render('auth/register', ['error' => 'Passwords do not match']);
            exit;
        }

        if (strlen($password) < 6) {
            View::render('auth/register', ['error' => 'Password too short']);
            exit;
        }

        if ($this->userModel->findByEmail($email)) {
            View::render('auth/register', ['error' => 'Email already exists']);
            exit;
        }
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->create($email, $passwordHash);

        Auth::login([
            'username' => $email,
            'role' => 'user',
        ]);

        header('Location: /IBIF/public/user/dashboard');
        exit;
    }
}
