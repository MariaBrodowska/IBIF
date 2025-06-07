<?php

namespace App\Controllers;

class ContactController
{
    public function form(): void
    {
        require_once __DIR__ . '/../Views/contact/contact.php';
    }
}
