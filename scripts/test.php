<?php
$lines = file('app/Controllers/Admin/KhachHangController.php');
foreach($lines as $k => $v) {
    if (stripos($v, 'function chiTiet') !== false) {
        echo ($k+1) . "\n";
    }
}
