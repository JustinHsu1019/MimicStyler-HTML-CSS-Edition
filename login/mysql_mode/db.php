<?php
// # 安裝 MySQL
// sudo apt update
// sudo apt install mysql-server
// sudo mysql_secure_installation

// # 安裝 phpMyAdmin
// sudo apt install phpmyadmin php-mbstring php-zip php-gd php-json php-curl

// # 啟用所需的 PHP 擴展
// sudo phpenmod mbstring
// sudo systemctl restart apache2

// # 初始化 MySQL 資料庫和表
// # # 進入 MySQL
// sudo mysql -u root -p

// # # 創建資料庫和使用者
// CREATE DATABASE userdb;
// CREATE USER 'USERNAME'@'localhost' IDENTIFIED BY 'PASSWORD';
// GRANT ALL PRIVILEGES ON userdb.* TO 'USERNAME'@'localhost';
// FLUSH PRIVILEGES;
// EXIT;

// # # 進入 MySQL Shell 來初始化資料庫表
// mysql -u USERNAME -p userdb

// # # 建立資料表
// CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     fullname VARCHAR(255) NOT NULL,
//     username VARCHAR(255) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL,
//     salt VARCHAR(64) NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

# 補充：PHPMyAdmin Install Error Fix (先建立使用者及資料庫即可)
// CREATE USER 'phpmyadmin'@'localhost' IDENTIFIED WITH 'caching_sha2_password' BY 'Phpmy@dm1n';
// GRANT ALL PRIVILEGES ON phpmyadmin.* TO 'phpmyadmin'@'localhost' WITH GRANT OPTION;
// CREATE DATABASE phpmyadmin;

$host = 'localhost';
$db = 'userdb';
$user = 'USERNAME';
$pass = 'PASSWORD';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
