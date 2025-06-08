<?php 

namespace App\Views\User;

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;

$userEmail = $_SESSION['user']['email'] ?? 'user@gmail.com';
?>

<h1 class="text-2xl font-bold mb-4"><?= Lang::get('user_dashboard_title') ?></h1>
<p class="mb-4"><?= Lang::get('welcome') ?>, <strong><?= htmlspecialchars($userEmail) ?></strong>!</p>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3"><?= Lang::get('account_info') ?></h2>
        <ul class="text-gray-700">
            <li><strong><?= Lang::get('email') ?>:</strong> <?= htmlspecialchars($userEmail) ?></li>
            <li><strong><?= Lang::get('role') ?>:</strong> <?= $_SESSION['user']['role'] ?></li>
            <li><strong><?= Lang::get('registration_date') ?>:</strong> <?= htmlspecialchars($registrationDate) ?></li>
        </ul>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3"><?= Lang::get('your_content') ?></h2>
        <p class="text-gray-600"><?= Lang::get('no_content') ?></p>
    </div>
</div>
