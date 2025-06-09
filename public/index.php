<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../app/Core/App.php';
require_once __DIR__ . '/../app/Core/Lang.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;
use App\Core\Lang;

session_start();
$selectedLang = $_SESSION['lang'] ?? 'en';
Lang::load($selectedLang);

$app = new App();
$app->run();
?>
