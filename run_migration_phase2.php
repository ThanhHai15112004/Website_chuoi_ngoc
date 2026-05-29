<?php
require_once 'C:/xampp/htdocs/shopbanhangchuoingoc/app/Core/Helpers.php';
require_once 'C:/xampp/htdocs/shopbanhangchuoingoc/app/Core/Database.php';

use App\Core\Database;

try {
    // Load .env explicitly
    loadEnv('C:/xampp/htdocs/shopbanhangchuoingoc/.env');
    
    $db = Database::getInstance()->getConnection();
    $sql = file_get_contents('C:/xampp/htdocs/shopbanhangchuoingoc/databases/migrations/update_kho_hang_phase2.sql');
    $db->exec($sql);
    echo "Migration Phase 2 chay thanh cong!\n";
} catch (Exception $e) {
    echo "Loi Migration: " . $e->getMessage() . "\n";
}
