<?php
$db_hostname = "localhost";
$db_database = "sembilan";
$db_username = "sembilan";
$db_password = "sembilan";
$db_charset = "utf8mb4";
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
);

$pdo;

try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
} catch(PDOException $e) {
    exit("Can't connect to database: " . $e->getMessage());
}