<?php
// Bật hiển thị lỗi để hiển thị chi tiết khi debug trên hosting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
/**
 * Entry Point
 */

// Load basic configuration
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';

// Load Environment variables
loadEnv(__DIR__ . '/../.env');

// Simple Autoloader
spl_autoload_register(function ($class) {
    // Convert namespace 'App\Core\Router' to 'app/Core/Router.php'
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

// Initialize Router
use App\Core\Router;
$router = new Router();

require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/admin.php';

// Dispatch
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = $_SERVER['SCRIPT_NAME'];

$base_path = str_replace('\\', '/', dirname($script_name));
if ($base_path === '/') {
    $base_path = '';
}

// Determine project path by removing '/public' from basePath if it exists
$project_dir = preg_replace('/\/public$/i', '', $base_path);

// Remove projectPath from URI
if ($project_dir !== '' && strpos($uri, $project_dir) === 0) {
    $uri = substr($uri, strlen($project_dir));
}

// Redirect URL containing /public or /pulbic to clean URL
if (preg_match('/^\/pu(bl|lb)ic(\/.*)?$/i', $uri, $matches)) {
    $new_uri = isset($matches[2]) && $matches[2] !== '/' ? $matches[2] : '/';
    header("Location: " . APP_URL . $new_uri, true, 301);
    exit;
}

if ($uri === '' || $uri === false) {
    $uri = '/';
}

$method = $_SERVER['REQUEST_METHOD'];
$router->dispatch($uri, $method);
