<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
spl_autoload_register(function($c){if(strpos($c,'App\\')===0) require __DIR__ . '/../app/'.str_replace('\\','/',substr($c,4)).'.php';});

try {
    $db = \App\Core\Database::getInstance()->getConnection();
    
    $data = [
        'kim' => '[{"nam":"1992","can_chi":"Nhâm Thân"},{"nam":"1993","can_chi":"Quý Dậu"},{"nam":"2000","can_chi":"Canh Thìn"},{"nam":"2001","can_chi":"Tân Tỵ"},{"nam":"1984","can_chi":"Giáp Tý"},{"nam":"1985","can_chi":"Ất Sửu"}]',
        'moc' => '[{"nam":"1988","can_chi":"Mậu Thìn"},{"nam":"1989","can_chi":"Kỷ Tỵ"},{"nam":"2002","can_chi":"Nhâm Ngọ"},{"nam":"2003","can_chi":"Quý Mùi"},{"nam":"1980","can_chi":"Canh Thân"},{"nam":"1981","can_chi":"Tân Dậu"}]',
        'thuy' => '[{"nam":"1996","can_chi":"Bính Tý"},{"nam":"1997","can_chi":"Đinh Sửu"},{"nam":"2004","can_chi":"Giáp Thân"},{"nam":"2005","can_chi":"Ất Dậu"},{"nam":"1982","can_chi":"Nhâm Tuất"},{"nam":"1983","can_chi":"Quý Hợi"}]',
        'hoa' => '[{"nam":"1986","can_chi":"Bính Dần"},{"nam":"1987","can_chi":"Đinh Mão"},{"nam":"1994","can_chi":"Giáp Tuất"},{"nam":"1995","can_chi":"Ất Hợi"},{"nam":"2008","can_chi":"Mậu Tý"},{"nam":"2009","can_chi":"Kỷ Sửu"}]',
        'tho' => '[{"nam":"1990","can_chi":"Canh Ngọ"},{"nam":"1991","can_chi":"Tân Mùi"},{"nam":"1998","can_chi":"Mậu Dần"},{"nam":"1999","can_chi":"Kỷ Mão"},{"nam":"2006","can_chi":"Bính Tuất"},{"nam":"2007","can_chi":"Đinh Hợi"}]',
    ];
    
    $stmt = $db->prepare("UPDATE menh_phong_thuy SET nam_sinh = ? WHERE slug = ?");
    
    foreach ($data as $slug => $json) {
        $stmt->execute([$json, $slug]);
    }
    
    echo "Đã cập nhật năm sinh cho các Mệnh Phong Thủy!\n";
    
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage() . "\n";
}
