<?php

namespace App\Core;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'public'): void
    {   
        extract($data);     
        ob_start();
        require_once __DIR__ . "/../Views/{$view}.php";
        $content = ob_get_clean();
        require_once __DIR__ . "/../Views/layout/{$layout}.php";
    }
}