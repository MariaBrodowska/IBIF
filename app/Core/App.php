<?php

namespace App\Core;
require_once __DIR__ . '/Auth.php';
require_once __DIR__ . '/../../config/db.php';
use App\Core\Auth;

class App
{
    private \PDO $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }
    public function run(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('/IBIF/public/', '', $uri);
        $uri = trim($uri, '/');

        switch ($uri) {
            case '':
                require_once __DIR__ . '/../Controllers/HomeController.php';
                $controller = new \App\Controllers\HomeController();
                $controller->index();
                break;
            case 'login':
                if (Auth::check()) {
                    header('Location: /IBIF/public/user/dashboard');
                    exit;
                }
                require_once __DIR__ . '/../Controllers/AuthController.php';
                $controller = new \App\Controllers\AuthController($this->pdo);
                $controller->login();
                break;
            case 'register':
                if (Auth::check()) {
                    header('Location: /IBIF/public/user/dashboard');
                    exit;
                }
                require_once __DIR__ . '/../Controllers/AuthController.php';
                $controller = new \App\Controllers\AuthController($this->pdo);
                $controller->register();
                break;
            case 'admin/dashboard':
                if (!Auth::isAdmin()) {
                    header('Location: /IBIF/public/login');
                    exit;
                }
                require_once __DIR__ . '/../Controllers/AdminController.php';
                $controller = new \App\Controllers\AdminController();
                $controller->dashboard();
                break;
            case 'user/dashboard':
                if (!Auth::check()) {
                    header('Location: /IBIF/public/login');
                    exit;
                }
                require_once __DIR__ . '/../Controllers/UserController.php';
                $controller = new \App\Controllers\UserController();
                $controller->dashboard();
                break;
            case 'contact':
                require_once __DIR__ . '/../Controllers/ContactController.php';
                $controller = new \App\Controllers\ContactController();
                $controller->form();
                break;

            default:
                http_response_code(404);
                echo '404 - Not Found';
        }
    }
}
