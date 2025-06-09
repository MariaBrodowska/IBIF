<?php 
namespace App\Views\Admin;
$userEmail = $_SESSION['user']['email'] ?? 'user@gmail.com';
$title = 'Admin Dashboard';
?>

<h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
<p class="mb-4">Welcome <strong><?= htmlspecialchars($userEmail) ?></strong>!</p>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3">System Information</h2>
        <ul class="list-disc pl-5 text-gray-700">
            <li><strong>Total users:</strong> <?= $userCount ?></li>
            <li><strong>Time:</strong> <?= date('Y-m-d H:i') ?></li>
        </ul>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3">Recent Users</h2>
        <ul class="space-y-2 text-gray-700">
            <?php foreach ($recentUsers as $user): ?>
                <li><?= htmlspecialchars($user['email']) ?> 
                    <span class="text-sm text-gray-500">(<?= $user['created_at'] ?>)</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

