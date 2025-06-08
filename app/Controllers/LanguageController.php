<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Middleware.php';
use App\Core\View;
use App\Core\Middleware;

class LanguageController
{
    public function setLanguage(): void
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lang = $_POST['language'] ?? 'en';
            $_SESSION['lang'] = $lang;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
