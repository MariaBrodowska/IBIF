<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
use App\Core\View;

class ContactController
{
    public function form(): void
    {
        View::render('contact/contact', [], 'app');
        // require_once __DIR__ . '/../Views/contact/contact.php';
    }
}
