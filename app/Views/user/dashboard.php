<?php 
namespace App\Views\User;
$userEmail = $_SESSION['user']['email'] ?? 'user@gmail.com';
?>

<h1 class="text-2xl font-bold mb-4">User Dashboard</h1>
<p class="mb-4">Welcome, <strong><?= htmlspecialchars($userEmail) ?></strong>!</p>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3">Account Information</h2>
        <ul class="text-gray-700">
            <li><strong>Email:</strong> <?= htmlspecialchars($userEmail) ?></li>
            <li><strong>Role:</strong> <?= $_SESSION['user']['role'] ?></li>
            <li><strong>Registration date:</strong> <?= htmlspecialchars($registrationDate) ?></li>
        </ul>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-3">Your Content</h2>
        <p class="text-gray-600">You don't have any content yet.</p>
    </div>
</div>
