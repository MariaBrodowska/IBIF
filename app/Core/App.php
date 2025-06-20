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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        global $pdo;
        $this->pdo = $pdo;
    }
    public function run(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('/IBIF/public/', '', $uri);
        $uri = trim($uri, '/');

        if (preg_match('/^post\/show\/(\d+)$/', $uri, $matches)) {
            $_GET['id'] = $matches[1];
            $this->handleRequest('PostController', 'show');
            return;
        }

        switch ($uri) {
            case '':
                $this->handleRequest('HomeController', 'index');
                break;
            case 'login':
                $this->handleRequest('AuthController', 'login');
                break;
            case 'register':
                $this->handleRequest('AuthController', 'register');
                break;
            case 'logout':
                $this->handleRequest('AuthController', 'logout');
                break;
            case 'admin/dashboard':
                $this->handleRequest('AdminController', 'dashboard');
                break;
            case 'user/dashboard':
                $this->handleRequest('UserController', 'dashboard');
                break;
            case 'contact':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->handleRequest('ContactController', 'submit');
                } else {
                    $this->handleRequest('ContactController', 'form');
                }
                break;
            case 'set-language':
                $this->handleRequest('LanguageController', 'setLanguage');
                break;
            case 'post':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->handleRequest('PostController', 'store');
                } else {
                    $this->handleRequest('PostController', 'create');
                }
                break;    
            default:
                http_response_code(404);
                echo '404 - Not Found';
        }
    }

    private function handleRequest(string $controller, string $method): void
    {
        $controllerFile = __DIR__ . "/../Controllers/{$controller}.php";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controllerClass = "\\App\\Controllers\\{$controller}";
            if (class_exists($controllerClass)) {
                if (!in_array($controller, ['ContactController', 'HomeController'])) {
                    $ctrl = new $controllerClass($this->pdo);
                } else {
                    $ctrl = new $controllerClass();
                }
                if (method_exists($ctrl, $method)) {
                    $ctrl->$method();
                    return;
                }
            }
        }
        http_response_code(404);
        echo '404 - Not Found';
    }
}
