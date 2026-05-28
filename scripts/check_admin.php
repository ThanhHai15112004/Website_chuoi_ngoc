<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});
$db = \App\Core\Database::getInstance()->getConnection();
$stmt = $db->query("SELECT id, ho_ten FROM nguoi_dung WHERE id_vai_tro IS NOT NULL");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
