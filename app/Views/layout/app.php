<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/IBIF/public/', '', $uri);
$uri = trim($uri, '/');
$currentPage = $uri ?: 'home';
?>
<!DOCTYPE html>
<html lang="pl">
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
                   Home
                </a>
                <a href="/IBIF/public/login" 
                   class="px-3 py-2 rounded <?= $currentPage === 'login' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                   Login
                </a>
                <a href="/IBIF/public/register" 
                   class="px-3 py-2 rounded <?= $currentPage === 'register' ? 'bg-blue-300 text-blue-900 font-semibold' : 'hover:bg-blue-400 transition-colors' ?>">
                   Register
                </a>
            </div>
        </div>
    </nav> 
    <main class="container mx-auto p-6">
        <?= $content ?>
    </main>
</body>
</html>