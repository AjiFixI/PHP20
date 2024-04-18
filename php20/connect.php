<?php
$host = 'localhost';
$db   = 'primer_user_admin';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {

$pdo = new PDO($dsn, $user, $pass,$opt);

} catch (PDOException $e) {
die('Подключение не удалось: ' . $e->getMessage());
}

?>