<?php 

namespace App\Views\User;

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;

$title = Lang::get('add_content');
$lang = $_SESSION['lang'] ?? 'en';
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-4"><?= Lang::get('add_content') ?></h1>
    <?php if (!empty($success)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= Lang::get(htmlspecialchars($success)) ?></div>
    <?php elseif (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= Lang::get(htmlspecialchars($error)) ?></div>
    <?php endif; ?>
    <form action="/IBIF/public/post/store" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <?= Lang::get('title') ?>:
            </label>
            <input type="text" name="title" value="<?= isset($title_input) ? htmlspecialchars($title_input) : "" ?>" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <?= Lang::get('content') ?>:
            </label>
            <textarea id="content" name="content" value="<?= isset($content) ? htmlspecialchars($content) : "" ?>" rows="10" class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
        </div>
        
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition-colors">
            <?= Lang::get('save') ?>
        </button>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/7kfqxqwgrqcs7qs93ojpsqc5cnjn2ufnv9920e0lt0l5pnqd/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#content',
    language: '<?= $lang ?>',
    plugins: [
    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
    'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'mentions', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
    ],   
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    image_upload_url: '/IBIF/public/store',
    automatic_uploads: true,
  });
</script>