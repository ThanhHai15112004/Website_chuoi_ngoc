<?php
require 'config/constants.php';
require 'app/Core/Helpers.php';
loadEnv('.env');
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});
$db = \App\Core\Database::getInstance()->getConnection();
$db->exec("UPDATE voucher SET da_dung = 0");
echo "Reset all da_dung to 0.\n";
