<?php
session_start();

$users_file = __DIR__ . '/users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file_get_contents($users_file);
    $user_array = explode("\n", $users);
    foreach ($user_array as $user) {
        $user_data = explode(':', $user);
        if (isset($user_data[0]) && isset($user_data[1]) && isset($user_data[2]) && $user_data[0] === $username) {
            $hash = hash('sha256', $password . $user_data[2]);
            if ($user_data[1] === $hash) {
                $_SESSION['success'] = 'Login successful.';
                header('Location: index.php');
                exit;
            }
        }
    }

    $_SESSION['error'] = 'Error: Invalid username or password.';
    header('Location: index.php');
    exit;
}
?>