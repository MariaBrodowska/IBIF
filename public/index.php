<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../app/Core/App.php';
// require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

session_start();

$app = new App();
$app->run();
?>
