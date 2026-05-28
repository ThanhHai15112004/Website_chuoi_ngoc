<?php
require 'config/constants.php';
require 'app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
require 'app/Core/Database.php';

$db = App\Core\Database::getInstance()->getConnection();

echo "--- don_hang ---\n";
$stmt = $db->query("DESCRIBE don_hang");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

echo "--- voucher ---\n";
$stmt = $db->query("DESCRIBE voucher");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
