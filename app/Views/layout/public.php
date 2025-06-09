<?php

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/IBIF/public/', '', $uri);
$uri = trim($uri, '/');
$currentPage = $uri ?: 'home';
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
                <a href="/IBIF/public/" 
                   class="px-3 py-2 rounded <?= $currentPage === 'home' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                   <?= Lang::get('home') ?>
                </a>
                <a href="/IBIF/public/login" 
                   class="px-3 py-2 rounded <?= $currentPage === 'login' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                   <?= Lang::get('login') ?>
                </a>
                <a href="/IBIF/public/register" 
                   class="px-3 py-2 rounded <?= $currentPage === 'register' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                   <?= Lang::get('register') ?>
                </a>
                <a href="/IBIF/public/contact" 
                   class="px-3 py-2 rounded <?= $currentPage === 'contact' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                   <?= Lang::get('contact') ?>
                </a>
                <form method="POST" action="/IBIF/public/set-language" class="inline text-sm">
                    <select name="language" onchange="this.form.submit()" class="text-black px-2 py-1 rounded">
                        <option value="en" <?= ($_SESSION['lang'] ?? 'en') === 'en' ? 'selected' : '' ?>>English</option>
                        <option value="pl" <?= ($_SESSION['lang'] ?? 'en') === 'pl' ? 'selected' : '' ?>>Polski</option>
                    </select>
                </form>
            </div>
        </div>
    </nav> 
    <main class="container mx-auto p-6">
        <?= $content ?>
    </main>
</body>
</html>