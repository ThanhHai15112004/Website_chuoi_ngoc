<?php
require 'config/constants.php';
require 'app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
require 'app/Core/Database.php';

$db = App\Core\Database::getInstance()->getConnection();
echo "--- thong_bao ---\n";
$stmt = $db->query("DESCRIBE thong_bao");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
