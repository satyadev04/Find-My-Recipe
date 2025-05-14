<?php
$host = 'localhost';
$db = 'recipes_db';
$user = 'root'; // Adjust according to your MySQL user
$pass = '';     // Adjust according to your MySQL password

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
