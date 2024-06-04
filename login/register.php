<?php
session_start();

$users_file = __DIR__ . '/users.txt';
$userdata_file = __DIR__ . '/userdata.txt';

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

    $users = file_get_contents($users_file);
    $user_array = explode("\n", $users);
    foreach ($user_array as $user) {
        $user_data = explode(':', $user);
        if (isset($user_data[0]) && $user_data[0] === $username) {
            $_SESSION['error'] = 'Error: Username already exists.';
            header('Location: index.php');
            exit;
        }
    }

    $salt = bin2hex(random_bytes(32));
    $hash = hash('sha256', $password . $salt);
    $user_info = $username . ":" . $hash . ":" . $salt . "\n";
    file_put_contents($users_file, $user_info, FILE_APPEND);
    $user_data = $fullname . "\n";
    file_put_contents($userdata_file, $user_data, FILE_APPEND);

    $_SESSION['success'] = 'User registered successfully.';
    header('Location: index.php');
    exit;
}
?>