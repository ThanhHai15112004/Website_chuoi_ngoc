<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});
$db = \App\Core\Database::getInstance()->getConnection();

try {
    $sql = "ALTER TABLE nguoi_dung ADD COLUMN ngay_sinh DATE DEFAULT NULL AFTER gioi_tinh;";
    $db->exec($sql);
    echo "Added ngay_sinh successfully!\n";
} catch (Exception $e) {
    if (strpos($e->getMessage(), 'Duplicate column name') !== false) {
        echo "Column ngay_sinh already exists.\n";
    } else {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
