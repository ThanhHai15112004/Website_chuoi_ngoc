<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=shop_chuoi_ngoc;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = [
        'menh_1' => [ // Kim
            'mo_ta' => 'Sự cứng rắn, sắc bén, độc đoán',
            'tuong_sinh' => 'Thổ',
            'tuong_khac' => 'Hỏa',
            'mau_sac_hop' => 'Trắng, Xám, Ghi, Vàng, Nâu Đất',
            'mau_ky' => 'Đỏ, Hồng, Tím, Cam',
            'mau_dai_dien_hex' => '#9CA3AF', // Gray/Silver
            'mo_ta_chi_tiet' => 'Mệnh Kim tượng trưng cho kim loại, kim khí trong đất trời. Người mệnh Kim thường có tính cách độc lập, quyết đoán, mạnh mẽ và có óc tổ chức. Sử dụng đá phong thủy có màu tương sinh (Thổ sinh Kim: Vàng, Nâu) hoặc tương hợp (Trắng, Xám, Ghi) sẽ giúp mang lại may mắn, thuận lợi trong công việc và cuộc sống.',
            'nam_sinh' => json_encode([
                ['nam' => '1992', 'can_chi' => 'Nhâm Thân'],
                ['nam' => '1993', 'can_chi' => 'Quý Dậu'],
                ['nam' => '2000', 'can_chi' => 'Canh Thìn'],
                ['nam' => '2001', 'can_chi' => 'Tân Tỵ'],
                ['nam' => '1984', 'can_chi' => 'Giáp Tý'],
                ['nam' => '1985', 'can_chi' => 'Ất Sửu']
            ], JSON_UNESCAPED_UNICODE),
            'nhu_cau' => json_encode(['Công danh', 'Tài lộc', 'Sự nghiệp'], JSON_UNESCAPED_UNICODE)
        ],
        'menh_2' => [ // Mộc
            'mo_ta' => 'Sự sinh sôi, phát triển, mềm dẻo',
            'tuong_sinh' => 'Thủy',
            'tuong_khac' => 'Kim',
            'mau_sac_hop' => 'Xanh Lá Cây, Đen, Xanh Nước Biển',
            'mau_ky' => 'Trắng, Xám, Ghi, Bạc',
            'mau_dai_dien_hex' => '#10B981', // Emerald
            'mo_ta_chi_tiet' => 'Mệnh Mộc tượng trưng cho mùa xuân, sự sinh sôi nảy nở của cây cỏ. Người mệnh Mộc thường có tính cách thân thiện, chu đáo, tận tâm và hòa đồng. Việc sử dụng các loại đá phong thủy màu xanh lá hoặc đen/xanh dương (Thủy sinh Mộc) sẽ giúp tăng cường năng lượng tích cực, sức sống và sự may mắn.',
            'nam_sinh' => json_encode([
                ['nam' => '1988', 'can_chi' => 'Mậu Thìn'],
                ['nam' => '1989', 'can_chi' => 'Kỷ Tỵ'],
                ['nam' => '2002', 'can_chi' => 'Nhâm Ngọ'],
                ['nam' => '2003', 'can_chi' => 'Quý Mùi'],
                ['nam' => '1980', 'can_chi' => 'Canh Thân'],
                ['nam' => '1981', 'can_chi' => 'Tân Dậu']
            ], JSON_UNESCAPED_UNICODE),
            'nhu_cau' => json_encode(['Sức khỏe', 'Bình an', 'Tình duyên'], JSON_UNESCAPED_UNICODE)
        ],
        'menh_3' => [ // Thủy
            'mo_ta' => 'Sự mềm mại, uyển chuyển, linh hoạt',
            'tuong_sinh' => 'Kim',
            'tuong_khac' => 'Thổ',
            'mau_sac_hop' => 'Đen, Xanh Nước Biển, Trắng, Xám, Ghi',
            'mau_ky' => 'Vàng, Nâu Đất, Đỏ',
            'mau_dai_dien_hex' => '#3B82F6', // Blue
            'mo_ta_chi_tiet' => 'Mệnh Thủy tượng trưng cho nước, là yếu tố không thể thiếu của sự sống. Người mệnh Thủy thường thông minh, khéo léo trong giao tiếp và có khả năng thích nghi cao. Mang bên mình những viên đá màu đen, xanh nước biển hoặc trắng/xám (Kim sinh Thủy) sẽ giúp tâm trí sáng suốt, công việc hanh thông.',
            'nam_sinh' => json_encode([
                ['nam' => '1996', 'can_chi' => 'Bính Tý'],
                ['nam' => '1997', 'can_chi' => 'Đinh Sửu'],
                ['nam' => '2004', 'can_chi' => 'Giáp Thân'],
                ['nam' => '2005', 'can_chi' => 'Ất Dậu'],
                ['nam' => '1982', 'can_chi' => 'Nhâm Tuất'],
                ['nam' => '1983', 'can_chi' => 'Quý Hợi']
            ], JSON_UNESCAPED_UNICODE),
            'nhu_cau' => json_encode(['Giao tiếp', 'Tài lộc', 'Sự nghiệp'], JSON_UNESCAPED_UNICODE)
        ],
        'menh_4' => [ // Hỏa
            'mo_ta' => 'Sự nhiệt huyết, năng lượng, bùng nổ',
            'tuong_sinh' => 'Mộc',
            'tuong_khac' => 'Thủy',
            'mau_sac_hop' => 'Đỏ, Hồng, Tím, Xanh Lá Cây',
            'mau_ky' => 'Đen, Xanh Nước Biển',
            'mau_dai_dien_hex' => '#EF4444', // Red
            'mo_ta_chi_tiet' => 'Mệnh Hỏa tượng trưng cho ngọn lửa ấm áp và ánh sáng. Người mệnh Hỏa thường tràn đầy nhiệt huyết, năng động, sáng tạo và có tư duy nhạy bén. Chọn đá phong thủy màu đỏ, hồng, tím hoặc xanh lá (Mộc sinh Hỏa) giúp thăng hoa trong cảm xúc, khơi dậy đam mê và đạt được nhiều thành tựu.',
            'nam_sinh' => json_encode([
                ['nam' => '1986', 'can_chi' => 'Bính Dần'],
                ['nam' => '1987', 'can_chi' => 'Đinh Mão'],
                ['nam' => '1994', 'can_chi' => 'Giáp Tuất'],
                ['nam' => '1995', 'can_chi' => 'Ất Hợi'],
                ['nam' => '2008', 'can_chi' => 'Mậu Tý'],
                ['nam' => '2009', 'can_chi' => 'Kỷ Sửu']
            ], JSON_UNESCAPED_UNICODE),
            'nhu_cau' => json_encode(['Tình duyên', 'Sáng tạo', 'May mắn'], JSON_UNESCAPED_UNICODE)
        ],
        'menh_5' => [ // Thổ
            'mo_ta' => 'Sự vững chắc, bao dung, kiên nhẫn',
            'tuong_sinh' => 'Hỏa',
            'tuong_khac' => 'Mộc',
            'mau_sac_hop' => 'Vàng, Nâu Đất, Đỏ, Hồng, Tím',
            'mau_ky' => 'Xanh Lá Cây, Xanh Lục',
            'mau_dai_dien_hex' => '#D97706', // Yellow/Amber
            'mo_ta_chi_tiet' => 'Mệnh Thổ tượng trưng cho đất, nơi nuôi dưỡng muôn loài. Người mệnh Thổ thường có bản tính ôn hòa, chân thành, kiên nhẫn và rất đáng tin cậy. Khi mang đá phong thủy màu vàng, nâu hoặc đỏ/hồng (Hỏa sinh Thổ), người mệnh Thổ sẽ càng thêm vững vàng, cuộc sống bình an, phú quý.',
            'nam_sinh' => json_encode([
                ['nam' => '1990', 'can_chi' => 'Canh Ngọ'],
                ['nam' => '1991', 'can_chi' => 'Tân Mùi'],
                ['nam' => '1998', 'can_chi' => 'Mậu Dần'],
                ['nam' => '1999', 'can_chi' => 'Kỷ Mão'],
                ['nam' => '2006', 'can_chi' => 'Bính Tuất'],
                ['nam' => '2007', 'can_chi' => 'Đinh Hợi']
            ], JSON_UNESCAPED_UNICODE),
            'nhu_cau' => json_encode(['Bình an', 'Gia đạo', 'Sức khỏe'], JSON_UNESCAPED_UNICODE)
        ]
    ];

    $sql = "UPDATE menh_phong_thuy SET 
                mo_ta = :mo_ta, 
                tuong_sinh = :tuong_sinh, 
                tuong_khac = :tuong_khac, 
                mau_sac_hop = :mau_sac_hop, 
                mau_ky = :mau_ky, 
                mau_dai_dien_hex = :mau_dai_dien_hex, 
                mo_ta_chi_tiet = :mo_ta_chi_tiet, 
                nam_sinh = :nam_sinh, 
                nhu_cau = :nhu_cau 
            WHERE id = :id";
            
    $stmt = $db->prepare($sql);
    
    foreach ($data as $id => $item) {
        $item['id'] = $id;
        $stmt->execute($item);
    }
    
    echo "Seed data completed successfully!";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
