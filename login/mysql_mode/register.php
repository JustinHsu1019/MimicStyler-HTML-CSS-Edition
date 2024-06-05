<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Error: Passwords do not match.';
        header('Location: index.php');
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['error'] = 'Error: Username already exists.';
        header('Location: index.php');
        exit;
    }

    $salt = bin2hex(random_bytes(32));
    $hash = hash('sha256', $password . $salt);

    $stmt = $pdo->prepare("INSERT INTO users (fullname, username, password, salt) VALUES (?, ?, ?, ?)");
    $stmt->execute([$fullname, $username, $hash, $salt]);

    $_SESSION['success'] = 'User registered successfully.';
    header('Location: index.php');
    exit;
}
?>
