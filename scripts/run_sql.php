<?php
$dsn = "mysql:host=127.0.0.1;port=3307;dbname=shop_chuoi_ngoc;charset=utf8mb4";
$user = "root";
$pass = "";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = file_get_contents(__DIR__ . '/update_db.sql');
    $pdo->exec($sql);
    echo "SQL executed successfully.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
