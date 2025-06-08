<?php

namespace App\Views\User;

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;

?>

<div class="max-w-3xl mx-auto bg-white rounded shadow p-6">
    <h1 class="text-2xl font-bold mb-4"><?= htmlspecialchars($post['title']) ?></h1>
    <p class="text-gray-600 mb-2">
        <?= Lang::get('added_date') ?>: <?= date('Y-m-d H:i', strtotime($post['created_at'])) ?>
    </p>
    <div class="bg-gray-100 p-4 rounded mb-6">
        <?= $post['content'] ?>
    </div>
    <a href="/IBIF/public/user/dashboard" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 my-10 rounded-md transition-colors">
        <?= Lang::get('back_to_dashboard') ?>
    </a>
</div>
