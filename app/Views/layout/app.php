<?php

namespace App\Views;

require_once __DIR__ . '/../../Core/Auth.php';
require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Auth;
use App\Core\Lang;

$isAdmin = Auth::isAdmin();
$isUser = Auth::isUser();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/IBIF/public/', '', $uri);
$uri = trim($uri, '/');
$currentPage = $uri ?: 'dashboard';
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'en' ?>">
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
                        class="px-3 py-2 rounded <?= $currentPage === 'admin/dashboard' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                        Dashboard
                    </a>
                <?php else: ?>                   
                    <a href="/IBIF/public/user/dashboard"
                        class="px-3 py-2 rounded <?= $currentPage === 'user/dashboard' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                        <?= Lang::get('dashboard') ?>
                    </a>
                <?php endif; ?>

                <a href="/IBIF/public/contact"
                    class="px-3 py-2 rounded <?= $currentPage === 'contact' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                    <?= Lang::get('contact') ?>
                </a>
                
                <?php if ($isUser): ?>
                <a href="/IBIF/public/post" 
                    class="px-3 py-2 rounded <?= $currentPage === 'post' ?  'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                    <?= Lang::get('add_content') ?>
                </a>
                <?php endif; ?>

                <a href="/IBIF/public/logout"
                    class="px-3 py-2 rounded bg-red-600 hover:bg-red-700 transition-colors">
                    <?= Lang::get('logout') ?>
                </a>
                <?php if ($isUser): ?>
                <form method="POST" action="/IBIF/public/set-language" class="inline text-sm">
                    <select name="language" onchange="this.form.submit()" class="text-black px-2 py-1 rounded">
                        <option value="en" <?= ($_SESSION['lang'] ?? 'en') === 'en' ? 'selected' : '' ?>>English</option>
                        <option value="pl" <?= ($_SESSION['lang'] ?? 'en') === 'pl' ? 'selected' : '' ?>>Polski</option>
                    </select>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </nav> 
    <main class="container mx-auto p-6">
        <?= $content ?>
    </main>
</body>
</html>