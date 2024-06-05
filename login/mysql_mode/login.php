<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password, salt FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        $hash = hash('sha256', $password . $user['salt']);
        if ($user['password'] === $hash) {
            $_SESSION['success'] = 'Login successful.';
            header('Location: index.php');
            exit;
        }
    }

    $_SESSION['error'] = 'Error: Invalid username or password.';
    header('Location: index.php');
    exit;
}
?>
