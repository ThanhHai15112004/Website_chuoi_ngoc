<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});
$db = \App\Core\Database::getInstance()->getConnection();
$stmt = $db->query('SELECT hinh_anh FROM loai_da LIMIT 5');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
