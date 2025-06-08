<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
require_once __DIR__ . '/../Models/User.php';
use App\Models\User;
use App\Core\View;
use App\Core\Middleware;

class LanguageController
{
    private User $user;
    public function __construct($pdo)
    {
        $this->user = new User($pdo);
    }
    public function setLanguage(): void
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lang = $_POST['language'] ?? 'en';
            $_SESSION['lang'] = $lang;
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user']['email'];
                $this->user->updateLanguage($email, $lang);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
