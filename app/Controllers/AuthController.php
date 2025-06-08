<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Core/Auth.php';
require_once __DIR__ . '/../Core/Middleware.php';

use App\Core\View;
use App\Models\User;
use App\Core\Auth;
use App\Core\Middleware;

class AuthController
{
    private User $userModel;
    
    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function login(): void
    {
        Middleware::requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleLogin();
            return;
        } else {
            View::render('auth/login');
        }        
    }

    public function register(): void
    {
        Middleware::requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleRegister();
        } else {
            View::render('auth/register');
        }
    }

    private function handleLogin(): void
    {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            View::render('auth/login', ['error' => 'Invalid email address']);
            exit;
        }

        $user = $this->userModel->findByEmail($email);
        if ($user && password_verify($password, $user['password_hash'])) {
            Auth::login([
            'email' => $user['email'],
            'role' => $user['role'],
            ]);
            if ($user['role'] === 'admin') {
                $_SESSION['lang'] = 'en';
                header('Location: /IBIF/public/admin/dashboard');
            } 
            else {
                header('Location: /IBIF/public/user/dashboard');
            }
            exit;
        } 
        else {
            View::render('auth/login', [
                'error' => 'Invalid email or password',
                'email' => $email,
            ]);
            exit;
        }
    }
    
    private function handleRegister(): void
    {
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        $error = "";
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email address';
        }
        else if ($password !== $confirm) {
            $error = 'Passwords do not match';
        }
        else if (strlen($password) < 6) {
            $error = 'Password should be at least 6 characters long';
        }
        else if ($this->userModel->findByEmail($email)) {
            $error = 'Email already exists';
        }

        if($error){
            View::render('auth/register', [
                'error' => $error, 
                'email' => $email
            ]);
            exit;
        }
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->userModel->create($email, $passwordHash);

        Auth::login([
            'email' => $email,
            'role' => 'user',
        ]);

        header('Location: /IBIF/public/user/dashboard');
        exit;
    }

    public function logout(): void
    {
        Auth::logout();
        header('Location: /IBIF/public/login');
        exit;
    }
}
