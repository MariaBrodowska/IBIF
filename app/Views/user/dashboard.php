<?php 

namespace App\Views\User;

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;

$userEmail = $_SESSION['user']['email'] ?? 'user@gmail.com';
$title = Lang::get('user_dashboard_title');
?>

<h1 class="text-2xl font-bold mb-4"><?= Lang::get('user_dashboard_title') ?></h1>
<p class="mb-4"><?= Lang::get('welcome') ?>, <strong><?= htmlspecialchars($userEmail) ?></strong>!</p>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3"><?= Lang::get('account_info') ?></h2>
        <ul class="text-gray-700">
            <li><strong><?= Lang::get('email') ?>:</strong> <?= htmlspecialchars($userEmail) ?></li>
            <li><strong><?= Lang::get('role') ?>:</strong> <?= $_SESSION['user']['role'] ?></li>
            <li><strong><?= Lang::get('registration_date') ?>:</strong> <?= date('Y-m-d H:i', strtotime($registrationDate)) ?></li>
        </ul>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3"><?= Lang::get('your_content') ?></h2>
        <?php if (!empty($posts)): ?>
            <div class="space-y-4">
                <?php foreach ($posts as $post): ?>
                    <div class="border-b pb-2">
                        <h3 class="text-lg font-semibold">
                            <a href="/IBIF/public/post/show/<?= $post['id'] ?>" class="text-blue-600 hover:underline">
                                <?= htmlspecialchars($post['title']) ?>
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500">
                            <?= date('Y-m-d H:i', strtotime($post['created_at'])) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($totalPages > 1): ?>
                <div class="mt-4 flex justify-center space-x-2">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="px-3 py-1 rounded 
                            <?= $i === $currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p class="text-gray-600"><?= Lang::get('no_content') ?></p>
        <?php endif; ?>
    </div>
</div>
