<?php
// Quick test for BanMenhService algorithms
spl_autoload_register(function($class) {
    $base = dirname(__DIR__);
    $file = $base . '/' . str_replace(['App\\', '\\'], ['app/', '/'], $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});


use App\Services\User\BanMenhService;

$svc = new BanMenhService();

$testCases = [
    ['day' => 15, 'month' => 6, 'year' => 1995, 'gender' => 'male',   'label' => 'Nam 1995'],
    ['day' => 1,  'month' => 1, 'year' => 1990, 'gender' => 'female', 'label' => 'Nữ 1990'],
    ['day' => 20, 'month' => 2, 'year' => 2000, 'gender' => 'male',   'label' => 'Nam 2000'],
    ['day' => 5,  'month' => 1, 'year' => 1985, 'gender' => 'female', 'label' => 'Nữ 1985 (trước Tết)'],
];

foreach ($testCases as $tc) {
    $r = $svc->phanTich($tc['day'], $tc['month'], $tc['year'], $tc['gender'], 'tai_loc', 'duong');
    $cache = $r['_cache'];
    echo sprintf("[%s] Mệnh: %s | %s %s | Cung %d (%s) | %s | Điểm: %d\n",
        $tc['label'],
        $cache['ten_menh'],
        $cache['thien_can'],
        $cache['dia_chi'],
        $cache['cung_phi'],
        $cache['ten_cung'],
        $cache['nhom_menh'],
        $r['diem_van_khi']['tong_van_khi']
    );
}
echo "\nALL TESTS PASSED\n";
