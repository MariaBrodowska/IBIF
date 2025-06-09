<?php 
namespace App\Views;

require_once __DIR__ . '/../../Core/Lang.php';
use App\Core\Lang;
$title = Lang::get('welcome_title');
?>

<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-7 text-center"><?= Lang::get('welcome') ?></h1>
    <div class="space-y-7 text-gray-600">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi justo, malesuada quis tellus eu, faucibus malesuada neque. Etiam at viverra purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut volutpat eget erat eu accumsan. Maecenas id vehicula mauris, id congue nisl. Integer rhoncus lacinia nunc. Nulla facilisi. Sed id mauris sit amet dui porttitor finibus at in justo.
        </p>
        <p>
            Suspendisse potenti. Aliquam ac dictum quam. Aliquam erat volutpat. Nulla felis orci, pretium a magna non, rhoncus viverra ante. Pellentesque varius pellentesque ligula nec dapibus. Vivamus nec ex tempus, consequat odio vel, dictum nisl. Morbi id arcu sed elit ultricies scelerisque et eu mauris. Aenean laoreet est eu lacus ornare, sed venenatis dolor tincidunt.
        </p>
        <p >
            Maecenas at felis quis metus convallis ultricies. Nullam fermentum vestibulum placerat. Morbi efficitur cursus nibh, eget accumsan dui placerat at. Vestibulum eu neque sed justo ultricies varius. Duis elementum ultricies augue, porta congue nisl gravida a. Curabitur et ultricies sem, vitae lobortis lorem. Sed ac metus ante. Sed quam eros, tempor id interdum sit amet, pulvinar id lectus. Cras ut purus tellus. In dictum, nisl ultrices accumsan egestas, quam nisl dignissim mauris, at condimentum ipsum sapien condimentum tortor.
        </p>
    </div>
    <div class="mt-6 text-center">
        <a href="/IBIF/public/register" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            <?= Lang::get('create_account') ?>
        </a>
    </div>
</div>
