<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Auth.php';
use App\Core\View;
use App\Core\Auth;

class ContactController
{
    public function form(): void
    {
        if (Auth::isLoggedIn()) {
            View::render('/../Views/contact/form', [
                'email' => $_SESSION['user']['email'],
            ], 'app');
            return;
        }
        View::render('/../Views/contact/form', [], 'public');
    }
    public function submit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /IBIF/public/contact');
            exit;
        }

        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';
        if (empty($email) || empty($message)) {
            View::render('/../Views/contact/form', [
                'error' => 'enter_fields',
                'email' => $email,
                'message' => $message
            ], Auth::isLoggedIn() ? 'app' : 'public');
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            View::render('/../Views/contact/form', [
                'error' => 'invalid_email',
                'email' => $email,
                'message' => $message
            ], Auth::isLoggedIn() ? 'app' : 'public');
            return;
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';
            $mail->setFrom($email, 'Contact');
            $mail->addAddress($_ENV['SMTP_MAILTO']);
            $mail->addReplyTo($email);

            $mail->isHTML(true);
            $mail->Subject = 'Message from contact form';
            $mail->Body = $message;

            $mail->send();
                    
            View::render('/../Views/contact/form', [
                'success' => 'message_sent'
            ], Auth::isLoggedIn() ? 'app' : 'public');
            exit;

        } catch (Exception $e) {
            View::render('/../Views/contact/form', [
                'error' => 'message_not_sent',
                'email' => $email ?? '',
                'message' => $message ?? ''
            ], Auth::isLoggedIn() ? 'app' : 'public');
            exit;
        }
    }
}
