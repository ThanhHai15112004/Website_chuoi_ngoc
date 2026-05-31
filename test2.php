<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/app/Core/Helpers.php';
loadEnv(__DIR__ . '/.env');

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

try {
    $model = new \App\Models\KhachHangModel();
    $results = $model->timKiemNhanh("Dương");
    print_r($results);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
