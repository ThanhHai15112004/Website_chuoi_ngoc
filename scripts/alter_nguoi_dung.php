<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});
$db = \App\Core\Database::getInstance()->getConnection();

try {
    $sql = "ALTER TABLE nguoi_dung 
            ADD COLUMN gioi_tinh VARCHAR(20) DEFAULT NULL AFTER ho_ten,
            ADD COLUMN nam_sinh INT DEFAULT NULL AFTER gioi_tinh,
            ADD COLUMN id_menh VARCHAR(36) DEFAULT NULL AFTER nam_sinh,
            ADD COLUMN ghi_chu_vip TEXT DEFAULT NULL AFTER anh_dai_dien;
            
            ALTER TABLE nguoi_dung
            ADD CONSTRAINT fk_nd_menh FOREIGN KEY (id_menh) REFERENCES menh_phong_thuy(id) ON DELETE SET NULL;";
    
    $db->exec($sql);
    echo "Columns added successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
