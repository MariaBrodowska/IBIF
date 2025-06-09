<?php

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;
$title = Lang::get('contact');
?>

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-4"><?= Lang::get('contact') ?></h1>

    <?php if (!empty($success)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= Lang::get(htmlspecialchars($success)) ?></div>
    <?php elseif (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= Lang::get(htmlspecialchars($error)) ?></div>
    <?php endif; ?>
 
    <form action="/IBIF/public/contact" method="POST" class="space-y-4" t>
        <div>
            <label class="block mb-1 font-medium"><?= Lang::get('email') ?>:</label>
            <input type="email" name="email" placeholder="<?= Lang::get('enter_your_email') ?>" value="<?= isset($email) ? htmlspecialchars($email) : "" ?>"required class="w-full border rounded px-3 py-2" maxlength="100"/>
            <small class="text-gray-500"><?= Lang::get('max_characters') ?>: 100</small>
        </div>
        <div>
            <label class="block mb-1 font-medium"><?= Lang::get('message') ?>:</label>
            <textarea name="message" rows="6" required placeholder="<?= Lang::get('enter_your_message') ?>" class="w-full border rounded px-3 py-2" maxlength="1000" oninput="document.getElementById('char-count').innerText = this.value.length + '/1000';"></textarea>
            <div class="flex justify-between text-gray-500"> <small><?= Lang::get('max_characters') ?>: 1000</small> <small id="char-count">0/1000</small>
            </div>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            <?= Lang::get('send') ?>
        </button>
    </form>
</div>
