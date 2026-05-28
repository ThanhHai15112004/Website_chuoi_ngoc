<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});

try {
    $db = \App\Core\Database::getInstance()->getConnection();
    
    // Lấy danh sách sản phẩm
    $stmtSp = $db->query("SELECT id FROM san_pham");
    $san_phams = $stmtSp->fetchAll(PDO::FETCH_ASSOC);
    
    // Lấy danh sách đá và mệnh liên kết
    $stmtDaMenh = $db->query("SELECT id_loai_da, id_menh FROM loai_da_menh");
    $links = $stmtDaMenh->fetchAll(PDO::FETCH_ASSOC);
    
    $da_menh_map = [];
    foreach ($links as $l) {
        $da_menh_map[$l['id_loai_da']][] = $l['id_menh'];
    }
    
    $loai_da_ids = array_keys($da_menh_map);
    
    $updateStmt = $db->prepare("UPDATE san_pham SET id_loai_da = ?, id_menh_phong_thuy = ? WHERE id = ?");
    
    $count = 0;
    foreach ($san_phams as $sp) {
        // Chọn random 1 loại đá
        $id_loai_da = $loai_da_ids[array_rand($loai_da_ids)];
        
        // Chọn random 1 mệnh thuộc loại đá đó
        $menhs = $da_menh_map[$id_loai_da];
        $id_menh = $menhs[array_rand($menhs)];
        
        $updateStmt->execute([$id_loai_da, $id_menh, $sp['id']]);
        $count++;
    }
    
    echo "Đã cập nhật Loại Đá và Mệnh Phong Thủy cho $count sản phẩm!\n";
    
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage() . "\n";
}
