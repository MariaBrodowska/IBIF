<?php 

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;

$title = Lang::get('login_title');
?>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-center mb-6"><?= Lang::get('login_title') ?></h1>
    <?php if (!empty($error)): ?>
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded text-center mb-4 shadow-sm text-sm">
            <?= Lang::get(htmlspecialchars($error)) ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="/IBIF/public/login" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700"><?= Lang::get('email_label') ?></label>
            <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : "" ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700"><?= Lang::get('password_label') ?></label>
            <input type="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div> 
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
            <?= Lang::get('login') ?>
        </button>
    </form>
    <div class="text-center mt-4">
        <p class="text-sm text-gray-600">
            <?= Lang::get('no_account') ?>
            <a href="/IBIF/public/register" class="text-blue-600 hover:text-blue-500">
                <?= Lang::get('register') ?>
            </a>
        </p>
    </div>
</div>