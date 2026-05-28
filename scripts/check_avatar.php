<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});
$db = \App\Core\Database::getInstance()->getConnection();
$stmt = $db->query('SELECT ma_nd, ho_ten, anh_dai_dien FROM nguoi_dung');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
