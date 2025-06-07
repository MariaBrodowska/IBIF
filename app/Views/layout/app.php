<?php

namespace App\Views;

require_once __DIR__ . '/../../Core/Auth.php';
use App\Core\Auth;

$userEmail = $_SESSION['user']['email'] ?? 'user@gmail.com';
$isAdmin = Auth::isAdmin();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/IBIF/public/', '', $uri);
$uri = trim($uri, '/');
$currentPage = $uri ?: 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'IBIF' ?></title>
    <link href="/IBIF/public/assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">IBIF</h1>
            <div class="space-x-4">

                <?php if ($isAdmin): ?>
                    <a href="/IBIF/public/admin/dashboard"
                        class="px-3 py-2 rounded <?= $currentPage === 'admin/dashboard' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-500 transition-colors' ?>">
                        Admin Dashboard
                    </a>
                <?php else: ?>                   
                    <a href="/IBIF/public/user/dashboard"
                        class="px-3 py-2 rounded <?= $currentPage === 'user/dashboard' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-500 transition-colors' ?>">
                        Dashboard
                    </a>
                <?php endif; ?>

                <a href="/IBIF/public/contact"
                    class="px-3 py-2 rounded <?= $currentPage === 'contact' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-500 transition-colors' ?>">
                    Contact
                </a>
                <a href="" 
                    class="px-3 py-2 rounded hover:bg-blue-500 transition-colors">
                    Add Content
                </a>

                <a href="/IBIF/public/logout"
                class="px-3 py-2 rounded bg-red-600 hover:bg-red-700 transition-colors">
                    Logout
                </a>
            </div>
        </div>
    </nav> 
    <main class="container mx-auto p-6">
        <?= $content ?>
    </main>
</body>
</html>