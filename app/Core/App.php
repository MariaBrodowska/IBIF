<?php

namespace App\Core;

class App
{
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
                require_once __DIR__ . '/../Controllers/AuthController.php';
                $controller = new \App\Controllers\AuthController();
                $controller->login();
                break;
            case 'register':
                require_once __DIR__ . '/../Controllers/AuthController.php';
                $controller = new \App\Controllers\AuthController();
                $controller->register();
                break;
            case 'admin/dashboard':
                require_once __DIR__ . '/../Controllers/AdminController.php';
                $controller = new \App\Controllers\AdminController();
                $controller->dashboard();
                break;
            case 'user/dashboard':
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
