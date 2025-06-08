<?php

namespace App\Core;

class Lang
{
    private static array $translations = [];

    public static function load(string $lang = 'en'): void
    {
        $path = __DIR__ . '/../../lang/' . $lang . '.php';
        if (!file_exists($path)) {
            $path = __DIR__ . '/../../lang/en.php';
        }
        self::$translations = require $path;
    }

    public static function get(string $key): string
    {
        return self::$translations[$key] ?? $key;
    }
}
