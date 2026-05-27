<?php
/**
 * Application Constants
 */

define('APP_NAME', 'Web Ban Hang Chuoi Ngoc');

// Tự động xác định đường dẫn gốc của ứng dụng (APP_URL)
$giao_thuc = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$may_chu = $_SERVER['HTTP_HOST'] ?? 'localhost';
$duong_dan_goc = dirname($_SERVER['SCRIPT_NAME']);

$duong_dan_goc = str_replace('\\', '/', $duong_dan_goc);
$duong_dan_goc = preg_replace('/\/public$/i', '', $duong_dan_goc); // Bỏ /public khỏi APP_URL
define('APP_URL', rtrim($giao_thuc . "://" . $may_chu . $duong_dan_goc, '/'));


define('QUYEN_QUAN_TRI', 1);
define('QUYEN_NGUOI_DUNG', 2);

