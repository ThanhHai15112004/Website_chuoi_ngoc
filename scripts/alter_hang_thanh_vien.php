<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});
$db = \App\Core\Database::getInstance()->getConnection();

try {
    // 1. Alter table
    $sqlAlter = "ALTER TABLE hang_thanh_vien 
                 ADD COLUMN mo_ta VARCHAR(255) DEFAULT NULL,
                 ADD COLUMN dac_quyen TEXT DEFAULT NULL,
                 ADD COLUMN mau_sac VARCHAR(100) DEFAULT NULL,
                 ADD COLUMN trang_thai TINYINT(1) DEFAULT 1,
                 ADD COLUMN danh_sach_voucher TEXT DEFAULT NULL;";
    
    // Ignore error if columns already exist
    try {
        $db->exec($sqlAlter);
        echo "Columns added.\n";
    } catch (Exception $e) {
        echo "Columns might already exist: " . $e->getMessage() . "\n";
    }

    // 2. Update seed data
    $seedData = [
        [
            'id' => 'rank_1', // Đồng / Silver
            'mo_ta' => 'Hạng cơ bản cho khách hàng mới',
            'dac_quyen' => json_encode(['Voucher cơ bản', 'Ưu đãi sinh nhật', 'Theo dõi đơn hàng'], JSON_UNESCAPED_UNICODE),
            'mau_sac' => 'bg-gray-100 text-gray-700 border-gray-200',
            'danh_sach_voucher' => json_encode(['SILVER2'], JSON_UNESCAPED_UNICODE)
        ],
        [
            'id' => 'rank_2', // Bạc / Gold
            'mo_ta' => 'Hạng thân thiết dành cho khách mua thường xuyên',
            'dac_quyen' => json_encode(['Giảm giá cao hơn', 'Freeship định kỳ', 'Nhận ưu đãi sớm'], JSON_UNESCAPED_UNICODE),
            'mau_sac' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'danh_sach_voucher' => json_encode(['GOLD5'], JSON_UNESCAPED_UNICODE)
        ],
        [
            'id' => 'rank_3', // Vàng / Diamond
            'mo_ta' => 'Hạng cao cấp dành cho khách hàng VIP',
            'dac_quyen' => json_encode(['Giảm giá cao nhất', 'Quà tặng đặc biệt', 'Ưu tiên hỗ trợ', 'Tư vấn chọn vòng riêng'], JSON_UNESCAPED_UNICODE),
            'mau_sac' => 'bg-red-100 text-[#6B0D18] border-red-200 shadow-sm',
            'danh_sach_voucher' => json_encode(['DIAMOND10', 'FREESHIPVIP'], JSON_UNESCAPED_UNICODE)
        ]
    ];

    foreach ($seedData as $data) {
        $stmt = $db->prepare("UPDATE hang_thanh_vien SET mo_ta = ?, dac_quyen = ?, mau_sac = ?, danh_sach_voucher = ? WHERE id = ?");
        $stmt->execute([
            $data['mo_ta'],
            $data['dac_quyen'],
            $data['mau_sac'],
            $data['danh_sach_voucher'],
            $data['id']
        ]);
    }

    echo "Data seeded successfully.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
