<?php

namespace App\Services\User;

/**
 * BanMenhService - Dịch vụ Phân Tích Bản Mệnh Phong Thủy
 * 
 * Tích hợp các thuật toán:
 * 1. Thiên Can → Ngũ Hành Bản Mệnh (chuẩn Can Chi)
 * 2. Địa Chi → Con Giáp
 * 3. Cung Phi (Lạc Thư) → Đông/Tây Tứ Mệnh
 * 4. Ngũ Hành Tương Sinh – Tương Khắc
 * 5. Đá Quý Hợp Mệnh
 * 6. Điểm Vận Khí theo Mong Muốn
 * 7. Xử lý Âm lịch dựa vào ngày/tháng sinh
 */
class BanMenhService
{
    // =============================================
    // BẢNG DỮ LIỆU PHONG THỦY
    // =============================================

    private const THIEN_CAN = [
        0 => ['can' => 'Canh', 'hanh' => 'Kim'],
        1 => ['can' => 'Tân',  'hanh' => 'Kim'],
        2 => ['can' => 'Nhâm', 'hanh' => 'Thủy'],
        3 => ['can' => 'Quý',  'hanh' => 'Thủy'],
        4 => ['can' => 'Giáp', 'hanh' => 'Mộc'],
        5 => ['can' => 'Ất',   'hanh' => 'Mộc'],
        6 => ['can' => 'Bính', 'hanh' => 'Hỏa'],
        7 => ['can' => 'Đinh', 'hanh' => 'Hỏa'],
        8 => ['can' => 'Mậu',  'hanh' => 'Thổ'],
        9 => ['can' => 'Kỷ',   'hanh' => 'Thổ'],
    ];

    private const DIA_CHI = [
        0 => 'Thân', 1 => 'Dậu', 2 => 'Tuất', 3 => 'Hợi',
        4 => 'Tý',   5 => 'Sửu', 6 => 'Dần',  7 => 'Mão',
        8 => 'Thìn', 9 => 'Tỵ',  10 => 'Ngọ', 11 => 'Mùi',
    ];

    // (year - 4) % 12 → index trong mảng
    private const DIA_CHI_ORDERED = [
        'Tý', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất', 'Hợi'
    ];

    // Con giáp tương ứng Địa Chi
    private const CON_GIAP = [
        'Tý' => 'Chuột', 'Sửu' => 'Trâu', 'Dần' => 'Hổ', 'Mão' => 'Mèo',
        'Thìn' => 'Rồng', 'Tỵ' => 'Rắn', 'Ngọ' => 'Ngựa', 'Mùi' => 'Dê',
        'Thân' => 'Khỉ', 'Dậu' => 'Gà', 'Tuất' => 'Chó', 'Hợi' => 'Lợn',
    ];

    private const CUNG_PHI_INFO = [
        1 => ['ten' => 'Khảm', 'hanh' => 'Thủy', 'phuong' => 'Bắc',  'nhom' => 'dong'],
        2 => ['ten' => 'Khôn', 'hanh' => 'Thổ',  'phuong' => 'Tây Nam', 'nhom' => 'tay'],
        3 => ['ten' => 'Chấn', 'hanh' => 'Mộc',  'phuong' => 'Đông', 'nhom' => 'dong'],
        4 => ['ten' => 'Tốn',  'hanh' => 'Mộc',  'phuong' => 'Đông Nam', 'nhom' => 'dong'],
        5 => ['ten' => 'Trung Cung', 'hanh' => 'Thổ', 'phuong' => 'Trung tâm', 'nhom' => 'tay'],
        6 => ['ten' => 'Càn',  'hanh' => 'Kim',  'phuong' => 'Tây Bắc', 'nhom' => 'tay'],
        7 => ['ten' => 'Đoài', 'hanh' => 'Kim',  'phuong' => 'Tây',  'nhom' => 'tay'],
        8 => ['ten' => 'Cấn',  'hanh' => 'Thổ',  'phuong' => 'Đông Bắc', 'nhom' => 'tay'],
        9 => ['ten' => 'Ly',   'hanh' => 'Hỏa',  'phuong' => 'Nam',  'nhom' => 'dong'],
    ];

    // Hướng tốt/xấu theo nhóm
    private const HUONG_DONG_TU = [
        'tot' => ['Đông', 'Đông Nam', 'Bắc', 'Nam'],
        'xau' => ['Tây', 'Tây Bắc', 'Tây Nam', 'Đông Bắc'],
    ];
    private const HUONG_TAY_TU = [
        'tot' => ['Tây', 'Tây Bắc', 'Tây Nam', 'Đông Bắc'],
        'xau' => ['Đông', 'Đông Nam', 'Bắc', 'Nam'],
    ];

    // Ngũ Hành: Tương sinh & Tương khắc
    private const NGU_HANH = [
        'Kim'  => ['tuong_sinh_boi' => 'Thổ', 'sinh_ra' => 'Thủy', 'tuong_khac_boi' => 'Hỏa', 'khac_ra' => 'Mộc', 'icon' => '⚙️', 'color' => '#C0C0C0', 'gradient' => 'from-gray-300 to-gray-500'],
        'Mộc'  => ['tuong_sinh_boi' => 'Thủy', 'sinh_ra' => 'Hỏa', 'tuong_khac_boi' => 'Kim', 'khac_ra' => 'Thổ', 'icon' => '🌿', 'color' => '#228B22', 'gradient' => 'from-green-600 to-green-800'],
        'Thủy' => ['tuong_sinh_boi' => 'Kim', 'sinh_ra' => 'Mộc', 'tuong_khac_boi' => 'Thổ', 'khac_ra' => 'Hỏa', 'icon' => '💧', 'color' => '#1C3A5E', 'gradient' => 'from-blue-700 to-blue-900'],
        'Hỏa'  => ['tuong_sinh_boi' => 'Mộc', 'sinh_ra' => 'Thổ', 'tuong_khac_boi' => 'Thủy', 'khac_ra' => 'Kim', 'icon' => '🔥', 'color' => '#8B0000', 'gradient' => 'from-red-700 to-red-900'],
        'Thổ'  => ['tuong_sinh_boi' => 'Hỏa', 'sinh_ra' => 'Kim', 'tuong_khac_boi' => 'Mộc', 'khac_ra' => 'Thủy', 'icon' => '🏔️', 'color' => '#8B4513', 'gradient' => 'from-yellow-700 to-yellow-900'],
    ];

    // Màu sắc theo ngũ hành
    private const MAU_SAC = [
        'Kim' => [
            'cat' => [
                ['ten' => 'Trắng', 'hex' => '#F5F5F5', 'y_nghia' => 'Màu chủ của hành Kim, tượng trưng cho sự trong sáng, tinh khiết và khởi đầu mới'],
                ['ten' => 'Xám Bạc', 'hex' => '#C0C0C0', 'y_nghia' => 'Màu bạc thu hút tài lộc, thăng tiến và nhận được sự hỗ trợ từ quý nhân'],
                ['ten' => 'Vàng Kim', 'hex' => '#D4AF37', 'y_nghia' => 'Màu vàng đến từ hành Thổ sinh Kim, kích hoạt vượng khí tài lộc'],
                ['ten' => 'Nâu Đất', 'hex' => '#8B6914', 'y_nghia' => 'Màu đất ổn định tài vận, bảo vệ sức khỏe và tăng cường sự kiên định'],
            ],
            'hung' => [
                ['ten' => 'Đỏ', 'hex' => '#8B0000', 'ly_do' => 'Hỏa khắc Kim – mang lại bất hòa, tổn thất tài chính, dễ phạm tiểu nhân'],
                ['ten' => 'Cam', 'hex' => '#FF6B35', 'ly_do' => 'Cùng thuộc hành Hỏa, làm suy yếu năng lượng Kim mệnh'],
                ['ten' => 'Tím', 'hex' => '#800080', 'ly_do' => 'Tím thuộc Hỏa, tương tác tiêu cực với người mệnh Kim'],
            ],
        ],
        'Mộc' => [
            'cat' => [
                ['ten' => 'Xanh Lá', 'hex' => '#228B22', 'y_nghia' => 'Màu chủ của hành Mộc, tượng trưng cho sự phát triển, sinh sôi và tràn đầy sinh khí'],
                ['ten' => 'Xanh Đậm', 'hex' => '#006400', 'y_nghia' => 'Tăng cường năng lượng Mộc, giúp tập trung, sáng suốt trong quyết định'],
                ['ten' => 'Đen', 'hex' => '#1C1C1C', 'y_nghia' => 'Màu của hành Thủy sinh Mộc, mang lại trí tuệ và sự bảo vệ'],
                ['ten' => 'Xanh Nước', 'hex' => '#1C3A5E', 'y_nghia' => 'Thủy sinh Mộc, kích thích sáng tạo và mở rộng cơ hội'],
            ],
            'hung' => [
                ['ten' => 'Trắng', 'hex' => '#F5F5F5', 'ly_do' => 'Kim khắc Mộc – làm suy yếu bản mệnh, tổn hại sức khỏe'],
                ['ten' => 'Xám', 'hex' => '#808080', 'ly_do' => 'Xám thuộc Kim, tương tác tiêu cực với người mệnh Mộc'],
            ],
        ],
        'Thủy' => [
            'cat' => [
                ['ten' => 'Đen', 'hex' => '#1C1C1C', 'y_nghia' => 'Màu chủ của hành Thủy, tượng trưng cho trí tuệ sâu sắc và sự linh hoạt'],
                ['ten' => 'Xanh Nước', 'hex' => '#1C3A5E', 'y_nghia' => 'Tăng cường năng lượng Thủy, hỗ trợ tư duy và sự nhạy cảm'],
                ['ten' => 'Trắng', 'hex' => '#F5F5F5', 'y_nghia' => 'Kim sinh Thủy – màu trắng bổ sung năng lượng tích cực cho mệnh Thủy'],
                ['ten' => 'Xám Bạc', 'hex' => '#C0C0C0', 'y_nghia' => 'Bạc thuộc Kim, sinh trợ Thủy mệnh, mang lại sự ổn định và tài lộc'],
            ],
            'hung' => [
                ['ten' => 'Vàng', 'hex' => '#D4AF37', 'ly_do' => 'Thổ khắc Thủy – cản trở dòng chảy năng lượng, tổn hại sức khỏe'],
                ['ten' => 'Nâu', 'hex' => '#8B4513', 'ly_do' => 'Nâu thuộc Thổ, kìm hãm phát triển của người mệnh Thủy'],
            ],
        ],
        'Hỏa' => [
            'cat' => [
                ['ten' => 'Đỏ', 'hex' => '#8B0000', 'y_nghia' => 'Màu chủ của hành Hỏa, tượng trưng cho nhiệt huyết, đam mê và quyền lực'],
                ['ten' => 'Hồng', 'hex' => '#FF69B4', 'y_nghia' => 'Tăng cường duyên số, mang lại may mắn trong tình cảm và quan hệ'],
                ['ten' => 'Tím', 'hex' => '#800080', 'y_nghia' => 'Kết hợp năng lượng Hỏa và quyền quý, thu hút địa vị và danh tiếng'],
                ['ten' => 'Xanh Lá', 'hex' => '#228B22', 'y_nghia' => 'Mộc sinh Hỏa – màu xanh hỗ trợ sức khỏe và tạo đà phát triển'],
            ],
            'hung' => [
                ['ten' => 'Đen', 'hex' => '#1C1C1C', 'ly_do' => 'Thủy khắc Hỏa – dập tắt năng lượng, gây mệt mỏi và trì trệ'],
                ['ten' => 'Xanh Nước', 'hex' => '#1C3A5E', 'ly_do' => 'Thủy hành làm suy yếu mệnh Hỏa, dễ bị tổn thương cảm xúc'],
            ],
        ],
        'Thổ' => [
            'cat' => [
                ['ten' => 'Vàng Kim', 'hex' => '#D4AF37', 'y_nghia' => 'Màu chủ của hành Thổ, tượng trưng cho sự ổn định, thịnh vượng và tiếp đất'],
                ['ten' => 'Nâu Đất', 'hex' => '#8B4513', 'y_nghia' => 'Tăng cường năng lượng Thổ, mang lại bền bỉ và sức chịu đựng'],
                ['ten' => 'Đỏ', 'hex' => '#8B0000', 'y_nghia' => 'Hỏa sinh Thổ – đỏ mang đến may mắn, thăng tiến và tài lộc'],
                ['ten' => 'Hồng', 'hex' => '#FF69B4', 'y_nghia' => 'Hỏa hành hỗ trợ Thổ mệnh, cải thiện duyên số và quan hệ'],
            ],
            'hung' => [
                ['ten' => 'Xanh Lá', 'hex' => '#228B22', 'ly_do' => 'Mộc khắc Thổ – làm bất ổn nền tảng, gây thất bại trong dự án'],
                ['ten' => 'Xanh Đậm', 'hex' => '#006400', 'ly_do' => 'Mộc hành xung đột trực tiếp với Thổ mệnh'],
            ],
        ],
    ];

    // Đá quý hợp mệnh (chi tiết)
    private const DA_QUY = [
        'Kim' => [
            'tot_nhat' => [
                ['ten' => 'Thạch Anh Vàng (Citrine)', 'y_nghia' => 'Đá Thổ sinh Kim, mang nguồn năng lượng Thổ mạnh mẽ nuôi dưỡng bản mệnh, thu hút tài lộc và sự thịnh vượng. Citrine được mệnh danh là "đá của thương nhân" vì khả năng thu hút tiền bạc và cơ hội kinh doanh.', 'mau_hex' => '#D4AF37'],
                ['ten' => 'Mắt Hổ Vàng', 'y_nghia' => 'Đá Thổ sinh Kim, mang lại sự tự tin, quyết đoán và năng lượng bảo vệ mạnh mẽ. Mắt Hổ giúp người mệnh Kim định hướng rõ ràng và tránh bị lừa dối trong các giao dịch.', 'mau_hex' => '#C8860A'],
            ],
            'phu_hop' => [
                ['ten' => 'Thạch Anh Trắng', 'y_nghia' => 'Đá cùng hành Kim, khuếch đại năng lượng và thanh lọc tiêu cực. Giúp người mệnh Kim tư duy sắc bén và duy trì tâm trạng bình tĩnh.', 'mau_hex' => '#F0F0F0'],
                ['ten' => 'Bạch Ngọc (White Jade)', 'y_nghia' => 'Ngọc trắng thuần khiết thuộc Kim hành, mang lại sự bình an nội tâm và bảo vệ khỏi năng lượng xấu.', 'mau_hex' => '#F5F5F0'],
            ],
            'can_tranh' => ['Thạch Anh Đỏ', 'Garnet', 'Ruby', 'Đá Đỏ Huyết (Bloodstone)'],
        ],
        'Mộc' => [
            'tot_nhat' => [
                ['ten' => 'Aquamarine (Thạch Anh Xanh Biển)', 'y_nghia' => 'Đá Thủy sinh Mộc, mang dòng năng lượng Thủy trong trẻo nuôi dưỡng hành Mộc bản mệnh. Aquamarine giúp người mệnh Mộc tăng trực giác, khả năng giao tiếp và cảm xúc ổn định. Đặc biệt phù hợp cho người làm nghề sáng tạo và nghệ thuật.', 'mau_hex' => '#7FFFD4'],
                ['ten' => 'Thạch Anh Đen (Black Obsidian)', 'y_nghia' => 'Đá Thủy hành, bảo vệ bản mệnh khỏi năng lượng âm tính và ma xui quỷ khiến. Obsidian còn giúp người mệnh Mộc giải phóng những cảm xúc tiêu cực và tìm lại sự bình tâm.', 'mau_hex' => '#1C1C1C'],
            ],
            'phu_hop' => [
                ['ten' => 'Ngọc Bích (Nephrite Jade)', 'y_nghia' => 'Đá cùng hành Mộc, khuếch đại sức sống, sự thịnh vượng và may mắn. Ngọc Bích là linh vật trường tồn trong phong thủy, mang lại sự bảo vệ toàn diện.', 'mau_hex' => '#3CB371'],
                ['ten' => 'Mã Não Xanh Lá', 'y_nghia' => 'Đá Mộc hành giúp cân bằng cảm xúc, tăng cường sức bền và khả năng chịu đựng áp lực.', 'mau_hex' => '#2E8B57'],
            ],
            'can_tranh' => ['Thạch Anh Trắng', 'Thạch Anh Vàng', 'Đá Mắt Hổ Vàng', 'Chalcedony Trắng'],
        ],
        'Thủy' => [
            'tot_nhat' => [
                ['ten' => 'Thạch Anh Trắng (Clear Quartz)', 'y_nghia' => 'Đá Kim sinh Thủy, là nguồn năng lượng Kim trong sáng nhất nuôi dưỡng bản mệnh. Clear Quartz khuếch đại mọi ý định tích cực, tăng cường trí tuệ và khả năng tập trung vượt trội. Người mệnh Thủy đeo đá này sẽ cảm nhận sự rõ ràng trong tư duy.', 'mau_hex' => '#F0F0FF'],
                ['ten' => 'Thạch Anh Mặt Trăng (Moonstone)', 'y_nghia' => 'Đá Kim hành, liên kết với năng lượng Mặt Trăng và Thủy triều, cộng hưởng mạnh mẽ với mệnh Thủy. Giúp tăng cường trực giác, khả năng empathy và cảm xúc sâu sắc.', 'mau_hex' => '#E8E8FF'],
            ],
            'phu_hop' => [
                ['ten' => 'Obsidian Đen', 'y_nghia' => 'Cùng hành Thủy, bảo vệ mạnh mẽ khỏi tiêu cực, giải phóng sợ hãi và chữa lành vết thương tâm lý.', 'mau_hex' => '#1C1C1C'],
                ['ten' => 'Sapphire Xanh', 'y_nghia' => 'Đá Thủy hành quý hiếm, thu hút sự tôn trọng, trí tuệ và khả năng lãnh đạo vượt trội.', 'mau_hex' => '#082567'],
            ],
            'can_tranh' => ['Citrine Vàng', 'Jasper Vàng-Nâu', 'Đá Mắt Hổ', 'Tiger Eye Nâu'],
        ],
        'Hỏa' => [
            'tot_nhat' => [
                ['ten' => 'Ngọc Bích Xanh (Emerald Jade)', 'y_nghia' => 'Đá Mộc sinh Hỏa, mang nguồn năng lượng sinh mệnh mạnh mẽ nuôi dưỡng bản mệnh. Emerald là đá của sự phát triển, thịnh vượng và tình yêu thương. Người mệnh Hỏa đeo Ngọc Bích sẽ được hỗ trợ mạnh trong sự nghiệp và hôn nhân.', 'mau_hex' => '#50C878'],
                ['ten' => 'Mã Não Xanh Lá', 'y_nghia' => 'Đá Mộc hành, mang lại sức sống, may mắn trong công việc và bảo vệ khỏi năng lượng xấu. Đặc biệt phù hợp cho người mệnh Hỏa cần sự cân bằng và ổn định.', 'mau_hex' => '#2E8B57'],
            ],
            'phu_hop' => [
                ['ten' => 'Ruby (Đá Đỏ)', 'y_nghia' => 'Cùng hành Hỏa, khuếch đại đam mê, quyền lực và khả năng lãnh đạo. Ruby là đá của các vị vua và anh hùng.', 'mau_hex' => '#9B111E'],
                ['ten' => 'Garnet Đỏ', 'y_nghia' => 'Hỏa hành, tăng cường sinh lực, tình yêu và sự kiên quyết trong việc theo đuổi mục tiêu.', 'mau_hex' => '#6E0C10'],
            ],
            'can_tranh' => ['Aquamarine', 'Obsidian Đen', 'Sapphire Xanh', 'Topaz Xanh'],
        ],
        'Thổ' => [
            'tot_nhat' => [
                ['ten' => 'Thạch Anh Tóc Đỏ (Red Rutilated Quartz)', 'y_nghia' => 'Đá Hỏa sinh Thổ, mang năng lượng Hỏa mạnh mẽ nuôi dưỡng bản mệnh. Thạch Anh Tóc Đỏ thu hút tài lộc phi thường, kích hoạt quyền uy và khả năng chinh phục mục tiêu. Đây là một trong những loại đá phong thủy được ưa chuộng nhất cho người làm kinh doanh.', 'mau_hex' => '#8B0000'],
                ['ten' => 'Carnelian (Mã Não Cam-Đỏ)', 'y_nghia' => 'Đá Hỏa hành, mang lại sự tự tin, nhiệt huyết và khả năng hành động quyết đoán. Carnelian kích thích sáng tạo và giúp người mệnh Thổ vượt qua trì hoãn.', 'mau_hex' => '#B94335'],
            ],
            'phu_hop' => [
                ['ten' => 'Thạch Anh Vàng (Citrine)', 'y_nghia' => 'Cùng hành Thổ, khuếch đại sự thịnh vượng, niềm vui và lạc quan. Citrine mang lại năng lượng tích cực trong môi trường làm việc.', 'mau_hex' => '#D4AF37'],
                ['ten' => 'Mắt Hổ Vàng', 'y_nghia' => 'Thổ hành, bảo vệ tài sản, tăng cường sự kiên định và khả năng phân tích thực tế.', 'mau_hex' => '#C8860A'],
            ],
            'can_tranh' => ['Ngọc Bích Xanh', 'Aventurine Xanh', 'Emerald', 'Malachite'],
        ],
    ];

    // Lời khuyên theo mong muốn và ngũ hành
    private const LOI_KHUYEN = [
        'tai_loc' => [
            'Kim' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Kim',
                'mo_ta' => 'Mệnh Kim trong phong thủy đại diện cho sự sắc bén, quyết đoán và khả năng tổ chức xuất sắc. Người mệnh Kim thiên về lý trí, có tư duy chiến lược và khả năng phân tích vấn đề sâu sắc. Đây là những phẩm chất vàng ngọc trong kinh doanh và sự nghiệp.',
                'noi_dung' => [
                    '🎯 **Hướng đặt bàn làm việc tốt nhất:** Ngồi quay mặt về hướng Tây hoặc Tây Bắc để đón nhận luồng khí tài vận mạnh nhất theo Tây Tứ Mệnh của bạn. Tránh ngồi lưng hướng cửa ra vào hoặc cửa sổ lớn.',
                    '💰 **Vật phẩm phong thủy chiêu tài:** Đặt Thạch Anh Vàng (Citrine) hoặc Mắt Hổ Vàng ở góc Tây Nam của bàn làm việc. Đây là hướng của Tài Tinh trong năm Ất Tỵ 2025, đặc biệt hiệu quả.',
                    '🌈 **Màu sắc trong công việc:** Mặc đồ màu vàng kim hoặc nâu đất khi gặp gỡ đối tác, ký kết hợp đồng quan trọng. Tránh mặc đồ đỏ trong các cuộc họp vì Hỏa khắc Kim.',
                    '📅 **Ngày tốt để ra quyết định:** Các ngày Canh, Tân (Can Kim) trong tuần là ngày bản mệnh, rất phù hợp để khởi nghiệp, ký hợp đồng hoặc đề xuất dự án.',
                    '🔮 **Phong thủy văn phòng:** Không đặt gương ở phía trước bàn làm việc. Nên để một bình hoa tươi màu vàng hoặc trắng để thu hút sinh khí tài vận.',
                ],
            ],
            'Mộc' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Mộc',
                'mo_ta' => 'Người mệnh Mộc như cây xanh vươn lên mạnh mẽ, đại diện cho sự phát triển không ngừng, tư duy sáng tạo và tinh thần tiên phong. Trong kinh doanh, người mệnh Mộc thường là người đi đầu, khai phá những lĩnh vực mới và có tầm nhìn xa trông rộng.',
                'noi_dung' => [
                    '🎯 **Hướng đặt bàn làm việc tốt nhất:** Ngồi quay về hướng Đông hoặc Đông Nam – đây là hai hướng thuộc Đông Tứ Mệnh, cộng hưởng mạnh mẽ với năng lượng Mộc bản mệnh của bạn.',
                    '💰 **Vật phẩm phong thủy chiêu tài:** Đặt một cây xanh nhỏ (trầu bà, may mắn) ở góc Đông của bàn làm việc. Bên cạnh đó, đeo vòng tay Aquamarine (Thủy sinh Mộc) sẽ kích hoạt dòng năng lượng tài vận mạnh mẽ.',
                    '🌈 **Màu sắc trong công việc:** Xanh lá cây và đen là màu chủ đạo giúp tăng cường may mắn. Mặc áo sơ-mi xanh khi đi họp, đàm phán sẽ tạo ấn tượng tốt và mang lại kết quả thuận lợi.',
                    '📅 **Ngày tốt để ra quyết định:** Ngày Giáp, Ất (Can Mộc) trong tuần là ngày bản mệnh. Ngoài ra, ngày Nhâm, Quý (Can Thủy) cũng rất thuận lợi vì Thủy sinh Mộc.',
                    '🔮 **Chiến lược tài vận:** Người mệnh Mộc nên đầu tư dài hạn thay vì lướt sóng ngắn hạn. Như cây lớn cần thời gian, tài sản của bạn sẽ tích lũy bền vững và mạnh mẽ theo thời gian.',
                ],
            ],
            'Thủy' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Thủy',
                'mo_ta' => 'Mệnh Thủy mềm mại mà kiên cường, linh hoạt mà sâu sắc. Người mệnh Thủy có trí tuệ vượt trội, khả năng thích nghi phi thường và năng khiếu giao tiếp bẩm sinh. Đây là những lợi thế khổng lồ trong môi trường kinh doanh hiện đại, đặc biệt trong lĩnh vực ngoại giao, tư vấn và thương mại.',
                'noi_dung' => [
                    '🎯 **Hướng làm việc và kinh doanh:** Hướng Bắc là hướng của hành Thủy, rất phù hợp để đặt bàn làm việc hoặc mở cửa hàng. Hướng Nam cũng tốt vì nằm trong Đông Tứ Mệnh.',
                    '💰 **Chiêu tài bằng năng lượng Kim:** Đặt vật phẩm bằng kim loại (tượng Thạch Anh Trắng, bạch ngọc) ở góc Tây hoặc Tây Bắc của phòng làm việc để kích hoạt nguồn năng lượng Kim sinh Thủy.',
                    '🌈 **Màu sắc chiêu tài:** Đen và xanh nước biển là màu tài vận của bạn. Nhưng đừng bỏ qua màu trắng và xám bạc – đây là màu Kim sinh Thủy, mang lại những cơ hội bất ngờ.',
                    '📅 **Thời điểm vàng:** Các tháng mùa Đông (tháng 10-12 âm lịch) là thời kỳ năng lượng Thủy mạnh nhất trong năm – lý tưởng để triển khai kế hoạch lớn.',
                    '🔮 **Lĩnh vực phù hợp:** Người mệnh Thủy tỏa sáng trong lĩnh vực dịch vụ tài chính, thương mại quốc tế, du lịch, nghệ thuật và truyền thông.',
                ],
            ],
            'Hỏa' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Hỏa',
                'mo_ta' => 'Người mệnh Hỏa như ngọn lửa bùng cháy – nhiệt huyết, đam mê và luôn tỏa ra ánh sáng thu hút người khác. Sức charisma tự nhiên của người mệnh Hỏa là tài sản vô giá trong kinh doanh, chính trị và các lĩnh vực đòi hỏi khả năng thuyết phục.',
                'noi_dung' => [
                    '🎯 **Hướng phát tài:** Nam và Đông Nam là hai hướng vượng khí nhất của người Đông Tứ Mệnh mệnh Hỏa. Đặt bàn làm việc hoặc két tiền hướng về phía Nam để kích hoạt tài vận.',
                    '💰 **Chiêu tài bằng Mộc:** Đặt chậu cây xanh (đặc biệt là Cây Phát Tài, Cây Kim Tiền) ở góc Đông của văn phòng. Mộc sinh Hỏa sẽ không ngừng cung cấp năng lượng tích cực.',
                    '🌈 **Màu sắc quyền lực:** Đỏ, hồng và tím là màu may mắn chủ đạo. Đặc biệt màu đỏ đậm rất phù hợp khi bạn cần thể hiện quyền uy và sự tự tin trong các cuộc đàm phán quan trọng.',
                    '📅 **Mùa phát triển:** Mùa Hè (tháng 4-6 âm lịch) là thời điểm năng lượng Hỏa ở đỉnh cao. Đây là lúc lý tưởng để tung ra sản phẩm mới, mở rộng kinh doanh hoặc thăng chức.',
                    '🔮 **Lĩnh vực vượng:** Truyền thông, giải trí, chính trị, bán hàng, marketing và các nghề đứng trên sân khấu đều cực kỳ phù hợp với người mệnh Hỏa.',
                ],
            ],
            'Thổ' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Thổ',
                'mo_ta' => 'Người mệnh Thổ như đại địa kiên cố – ổn định, đáng tin cậy và có khả năng chịu đựng phi thường. Đây là nền tảng của mọi sự thành công dài hạn. Người mệnh Thổ thường xây dựng được tài sản vững chắc qua thời gian và được mọi người tin tưởng, kính trọng.',
                'noi_dung' => [
                    '🎯 **Hướng an toàn cho tài sản:** Tây Nam và Tây Bắc là hướng tốt nhất của Tây Tứ Mệnh mệnh Thổ. Đặt két sắt hoặc tủ tài liệu quan trọng ở hướng này để bảo vệ tài sản.',
                    '💰 **Chiêu tài bằng Hỏa:** Đặt đèn đỏ hoặc nến đỏ ở góc Nam của phòng để kích hoạt Hỏa sinh Thổ. Tượng Thạch Anh Tóc Đỏ là vật phẩm phong thủy lý tưởng nhất.',
                    '🌈 **Màu sắc thịnh vượng:** Vàng kim và nâu đất là màu vượng tài của bạn. Kết hợp thêm màu đỏ đất (terra cotta) trong trang phục để kích hoạt năng lượng Hỏa sinh Thổ.',
                    '📅 **Thời điểm chuyển mình:** Các thời điểm chuyển mùa (giữa các quý) là thời gian năng lượng Thổ mạnh nhất – lý tưởng để đưa ra các quyết định kinh doanh quan trọng.',
                    '🔮 **Lĩnh vực phù hợp:** Bất động sản, xây dựng, nông nghiệp, tài chính-ngân hàng và các ngành nghề đòi hỏi sự kiên nhẫn và bền bỉ đều rất phù hợp với người mệnh Thổ.',
                ],
            ],
        ],
        'binh_an' => [
            'Kim' => [
                'tieu_de' => 'Bình An & Sức Khỏe cho Người Mệnh Kim',
                'mo_ta' => 'Người mệnh Kim thường có cơ thể mạnh mẽ nhưng dễ bị ảnh hưởng bởi căng thẳng tinh thần do bản tính cầu toàn và đòi hỏi cao. Phổi và đường hô hấp là bộ phận cần chú ý nhất theo y học cổ truyền khi nói về người mệnh Kim.',
                'noi_dung' => [
                    '🏠 **Phong thủy phòng ngủ:** Đặt giường ngủ hướng Tây – đây là hướng ngủ tốt nhất của Tây Tứ Mệnh, giúp giấc ngủ sâu và phục hồi năng lượng nhanh chóng. Tránh ngủ đầu hướng Nam vì Hỏa khắc Kim.',
                    '🌿 **Chăm sóc sức khỏe:** Tập thể dục buổi sáng ở không gian thoáng đãng phía Tây hoặc Tây Bắc. Khí công, thái cực quyền hoặc yoga đặc biệt phù hợp với người mệnh Kim.',
                    '💎 **Vật phẩm hộ mệnh:** Đeo Thạch Anh Trắng hoặc Thạch Anh Vàng bên cạnh để thanh lọc trường năng lượng, xua đuổi tiêu cực và bảo vệ sức khỏe.',
                    '🍃 **Chế độ ăn uống hài hòa:** Các thực phẩm màu trắng (gạo, củ cải, bí ngô) rất tốt cho người mệnh Kim. Ăn nhiều thực phẩm có vị cay (bạc hà, gừng) để kích hoạt phổi theo y học cổ truyền.',
                    '🧘 **Thiền định:** Thực hành thiền định hàng ngày với đá Thạch Anh Trắng hoặc Selenite đặt trước mặt để cân bằng luân xa tim và tăng cường năng lượng nội tâm.',
                ],
            ],
            'Mộc' => [
                'tieu_de' => 'Bình An & Sức Khỏe cho Người Mệnh Mộc',
                'mo_ta' => 'Người mệnh Mộc có sức sống dồi dào và tinh thần lạc quan tự nhiên. Tuy nhiên, gan và mật là hai bộ phận cần được chú ý nhất theo y học phong thủy truyền thống. Căng thẳng và áp lực dễ tác động tiêu cực lên hệ tiêu hóa của người mệnh Mộc.',
                'noi_dung' => [
                    '🏠 **Hướng ngủ hồi phục:** Đặt đầu giường hướng Đông hoặc Nam, hai hướng tốt nhất của Đông Tứ Mệnh. Phòng ngủ nên có cửa sổ đón ánh sáng buổi sáng – nguồn dưỡng khí tốt nhất cho mệnh Mộc.',
                    '🌿 **Thiên nhiên chữa lành:** Người mệnh Mộc cần gần gũi với thiên nhiên. Đi dạo trong rừng, công viên hoặc làm vườn mỗi tuần ít nhất 2-3 lần để nạp lại năng lượng Mộc và giảm căng thẳng.',
                    '💎 **Vật phẩm hộ mệnh:** Vòng tay Aquamarine hoặc Thạch Anh Đen là lựa chọn lý tưởng. Aquamarine giúp làm dịu cảm xúc và bảo vệ khỏi năng lượng xấu, còn Obsidian xua đuổi tiêu cực mạnh mẽ.',
                    '🍃 **Thực phẩm tốt:** Rau xanh, trà xanh, dưa chuột và các loại đậu xanh đặc biệt tốt cho mệnh Mộc. Giảm thiểu thực phẩm cay nồng (thuộc Kim) để tránh xung khắc bản mệnh.',
                    '🧘 **Tập luyện lý tưởng:** Yoga, tai chi hoặc đi bộ trong không gian xanh. Tránh các môn thể thao quá cạnh tranh và quyết liệt – đây không phải thế mạnh của năng lượng Mộc.',
                ],
            ],
            'Thủy' => [
                'tieu_de' => 'Bình An & Sức Khỏe cho Người Mệnh Thủy',
                'mo_ta' => 'Người mệnh Thủy sâu sắc và nhạy cảm – đây vừa là điểm mạnh vừa là thách thức với sức khỏe. Thận và bàng quang là hai bộ phận liên quan mật thiết đến hành Thủy cần được bảo vệ. Người mệnh Thủy dễ bị ảnh hưởng bởi độ lạnh và độ ẩm.',
                'noi_dung' => [
                    '🏠 **Không gian sống lý tưởng:** Phòng ngủ nên có tông màu xanh nhẹ hoặc trắng tinh. Đặt một bể cá nhỏ hoặc đài phun nước nhỏ trong phòng khách để tăng cường năng lượng Thủy và tạo sự thư giãn.',
                    '🌿 **Bảo vệ sức khỏe:** Giữ ấm cơ thể, đặc biệt vùng thắt lưng và bàn chân. Uống đủ nước mỗi ngày (2-2.5 lít) để nuôi dưỡng cơ quan Thủy hành. Tránh để cơ thể quá lạnh.',
                    '💎 **Vật phẩm hộ mệnh:** Vòng tay Thạch Anh Trắng (Clear Quartz) hoặc Moonstone rất phù hợp. Đeo tay trái để năng lượng đá thấm vào cơ thể qua huyệt vị.',
                    '🍃 **Thực phẩm tăng cường:** Hải sản, đậu đen, óc chó và các thực phẩm màu đen là tốt nhất cho mệnh Thủy. Uống trà đen hoặc cà phê đen (không đường) buổi sáng giúp kích hoạt năng lượng.',
                    '🧘 **Cân bằng cảm xúc:** Người mệnh Thủy cần học cách quản lý cảm xúc sâu sắc. Thực hành viết nhật ký cảm xúc, meditation hàng ngày và âm nhạc trị liệu rất hiệu quả.',
                ],
            ],
            'Hỏa' => [
                'tieu_de' => 'Bình An & Sức Khỏe cho Người Mệnh Hỏa',
                'mo_ta' => 'Người mệnh Hỏa nhiệt huyết và năng động, nhưng cũng dễ bị kiệt sức và bùng phát cảm xúc. Tim mạch và hệ thần kinh là hai hệ thống cần được chú trọng nhất. Việc duy trì sự cân bằng là chìa khóa sức khỏe của người mệnh Hỏa.',
                'noi_dung' => [
                    '🏠 **Phong thủy phòng ngủ:** Phòng ngủ nên có màu sắc nhẹ nhàng (xanh nhạt, trắng) để tạo sự bình tĩnh. Tránh sử dụng quá nhiều màu đỏ trong phòng ngủ dù đây là màu may mắn của bạn.',
                    '🌿 **Làm mát năng lượng:** Tập bơi lội là lý tưởng nhất cho người mệnh Hỏa. Nước là yếu tố cân bằng năng lượng hoàn hảo, giúp làm mát nhiệt Hỏa quá mức.',
                    '💎 **Vật phẩm hộ mệnh:** Đeo vòng tay Ngọc Bích Xanh hoặc Mã Não Xanh – đây là đá Mộc sinh Hỏa, vừa nuôi dưỡng bản mệnh vừa giúp ổn định cảm xúc và giảm thiểu bốc hỏa.',
                    '🍃 **Chế độ ăn uống:** Ưu tiên thực phẩm mát (dưa hấu, rau ngót, đậu xanh). Hạn chế thức ăn cay nóng. Uống trà xanh và nước dừa để thanh nhiệt, bảo vệ tim mạch.',
                    '🧘 **Quản lý cảm xúc:** Học cách hít thở sâu khi tức giận. Thiền định buổi tối với nến hồng nhạt (không phải đỏ rực) giúp bình tâm và cải thiện chất lượng giấc ngủ đáng kể.',
                ],
            ],
            'Thổ' => [
                'tieu_de' => 'Bình An & Sức Khỏe cho Người Mệnh Thổ',
                'mo_ta' => 'Người mệnh Thổ như đại địa – vững chắc, bền bỉ nhưng đôi khi quá cứng nhắc và khó thích nghi với thay đổi. Tỳ vị và hệ tiêu hóa là cơ quan cần được chú trọng nhất. Sức khỏe tinh thần của người mệnh Thổ thường liên quan mật thiết đến cảm giác an toàn và ổn định.',
                'noi_dung' => [
                    '🏠 **Môi trường sống vững chắc:** Trang trí nhà với vật liệu tự nhiên (gỗ, đá, gốm). Màu vàng đất, nâu và cam ấm áp trong phòng khách tạo cảm giác an toàn và nuôi dưỡng năng lượng Thổ.',
                    '🌿 **Vận động phù hợp:** Đi bộ chân trần trên cỏ hoặc đất (earthing/grounding) là hoạt động tốt nhất cho người mệnh Thổ. Kết nối với đất đai giúp ổn định năng lượng và giảm lo âu.',
                    '💎 **Vật phẩm hộ mệnh:** Vòng tay Thạch Anh Tóc Đỏ hoặc Carnelian từ hành Hỏa sinh Thổ giúp tăng sinh lực, bảo vệ sức khỏe và mang lại sự lạc quan.',
                    '🍃 **Ăn uống theo mệnh:** Khoai lang, khoai tây, cà rốt và các loại rễ củ màu vàng cam rất tốt cho mệnh Thổ. Thực phẩm lên men (kim chi, sữa chua) hỗ trợ sức khỏe đường ruột – cơ quan thuộc Thổ.',
                    '🧘 **Ổn định tâm trí:** Người mệnh Thổ cần tránh lo lắng quá mức. Thiền định tập trung vào hơi thở và cảm nhận đất dưới chân (grounding meditation) giúp giải phóng căng thẳng hiệu quả.',
                ],
            ],
        ],
        'tinh_duyen' => [
            'Kim' => [
                'tieu_de' => 'Tình Duyên & Gia Đạo cho Người Mệnh Kim',
                'mo_ta' => 'Người mệnh Kim trong tình yêu là người trung thành, nghiêm túc và luôn đặt ra tiêu chuẩn cao. Đôi khi sự cầu toàn và cứng nhắc có thể tạo ra khoảng cách trong các mối quan hệ. Phong thủy giúp người mệnh Kim mềm mại hơn và thu hút được người tâm giao.',
                'noi_dung' => [
                    '💑 **Người bạn đời lý tưởng:** Người mệnh Thổ (Kỷ, Mậu) là đối tác hoàn hảo nhất vì Thổ sinh Kim, tạo sự hài hòa và bổ sung cho nhau. Người mệnh Kim cũng tương hợp với người mệnh Kim khác nhờ sự đồng điệu.',
                    '🏠 **Phong thủy phòng ngủ:** Đặt đầu giường hướng Tây hoặc Tây Bắc. Thêm cặp Mandarin Duck (Uyên Ương Đá) bằng Thạch Anh Hồng ở góc Tây Nam phòng ngủ để kích hoạt Đào Hoa Cung.',
                    '💎 **Đá thu hút duyên:** Thạch Anh Hồng (Rose Quartz) kết hợp với Thạch Anh Trắng (Kim hành) đặt trên bàn trang điểm để thu hút năng lượng tình yêu.',
                    '🌹 **Nghi thức tăng duyên:** Vào ngày mùng 7 âm lịch hàng tháng, thắp 2 nến màu trắng và đặt hoa hồng trắng hoặc vàng trước bàn thờ Ông Tơ Bà Nguyệt.',
                    '🔮 **Hướng tốt cho hẹn hò:** Đặt địa điểm hẹn hò ở phía Tây hoặc Tây Bắc nhà bạn. Chọn ngày Canh, Tân để gặp gỡ người quan trọng.',
                ],
            ],
            'Mộc' => [
                'tieu_de' => 'Tình Duyên & Gia Đạo cho Người Mệnh Mộc',
                'mo_ta' => 'Người mệnh Mộc trong tình yêu là người lãng mạn, sáng tạo và luôn hướng đến sự phát triển trong mối quan hệ. Họ yêu chân thành và sâu sắc, nhưng cũng cần được trao cho không gian tự do để phát triển. Phong thủy giúp người mệnh Mộc tìm được người bạn đời biết trân trọng bản thân họ.',
                'noi_dung' => [
                    '💑 **Người bạn đời lý tưởng:** Người mệnh Thủy (Nhâm, Quý) là đối tác hoàn hảo vì Thủy sinh Mộc. Người mệnh Mộc khác cũng rất tương hợp nhờ hiểu nhau sâu sắc.',
                    '🏠 **Góc Đào Hoa:** Đặt cặp Uyên Ương Bằng Ngọc Bích ở góc Đông phòng ngủ – đây là Đào Hoa Cung của người Đông Tứ Mệnh mệnh Mộc. Thêm hoa tươi màu hồng hoặc đỏ để kích hoạt.',
                    '💎 **Đá tình yêu:** Cặp vòng tay Ngọc Bích Xanh và Thạch Anh Hồng đặt cùng nhau trong phòng ngủ tạo ra trường năng lượng tình yêu mạnh mẽ và lâu bền.',
                    '🌹 **Nghi thức:** Mỗi sáng thứ 2, đặt 2 bông hoa sen hồng trong bình nước ở góc Đông nhà để thu hút duyên lành. Hoa sen là linh vật của tình yêu thuần khiết.',
                    '🔮 **Thời điểm duyên tốt:** Mùa Xuân (tháng 1-3 âm lịch) và tháng Dần, Mão là thời điểm Đào Hoa mạnh nhất cho người mệnh Mộc.',
                ],
            ],
            'Thủy' => [
                'tieu_de' => 'Tình Duyên & Gia Đạo cho Người Mệnh Thủy',
                'mo_ta' => 'Người mệnh Thủy trong tình yêu là bản thể của cảm xúc và sự gắn kết sâu sắc. Họ nhạy cảm, đồng cảm cao và có khả năng yêu thương vô điều kiện. Thách thức là người mệnh Thủy đôi khi quá chìm đắm vào cảm xúc và dễ bị tổn thương. Phong thủy giúp cân bằng và bảo vệ cái tôi trong tình yêu.',
                'noi_dung' => [
                    '💑 **Bạn đời tương sinh:** Người mệnh Kim (Canh, Tân) là đối tác lý tưởng nhất – Kim sinh Thủy, sự bảo vệ và tình yêu của người mệnh Kim bao bọc người mệnh Thủy an toàn.',
                    '🏠 **Phong thủy tình cảm:** Trong phòng ngủ, đặt cặp đèn ngủ hình trái tim màu hồng ở góc Tây Nam. Tránh đặt gương đối diện giường – nó phản chiếu năng lượng và phá vỡ sự gắn kết cặp đôi.',
                    '💎 **Bộ đôi đá tình yêu:** Thạch Anh Trắng (Kim sinh Thủy) kết hợp Thạch Anh Hồng (Rose Quartz) là combo hoàn hảo để mở trái tim và thu hút tình yêu chân thành.',
                    '🌹 **Kích hoạt Đào Hoa:** Đặt bình hoa hồng đỏ ở góc Bắc phòng ngủ (hướng Thủy) mỗi tuần. Nước trong bình nên được thay mỗi 3 ngày để duy trì năng lượng tươi mới.',
                    '🔮 **Bảo vệ tình cảm:** Người mệnh Thủy cần đeo Obsidian Đen để bảo vệ khỏi những kẻ có tâm địa xấu và những mối quan hệ không lành mạnh.',
                ],
            ],
            'Hỏa' => [
                'tieu_de' => 'Tình Duyên & Gia Đạo cho Người Mệnh Hỏa',
                'mo_ta' => 'Người mệnh Hỏa trong tình yêu là một ngọn lửa đam mê không thể dập tắt. Họ yêu nồng nhiệt, hào phóng và tràn đầy năng lượng. Thách thức là sự nóng nảy và bốc đồng có thể gây ra những tranh cãi không đáng có. Phong thủy giúp người mệnh Hỏa duy trì ngọn lửa tình yêu bền vững.',
                'noi_dung' => [
                    '💑 **Người tâm giao:** Người mệnh Mộc (Giáp, Ất) là đối tác hoàn hảo – Mộc sinh Hỏa, họ sẽ không ngừng nuôi dưỡng nhiệt huyết và đam mê của bạn. Người mệnh Hỏa cũng rất hòa hợp với nhau.',
                    '🏠 **Phong thủy lửa tình:** Đặt 2 ngọn nến đỏ hình trái tim ở góc Nam phòng ngủ. Thắp nến trong các dịp đặc biệt để kích hoạt năng lượng tình yêu Hỏa mệnh.',
                    '💎 **Đá của đam mê:** Ruby hoặc Garnet Đỏ là đá tình yêu đặc biệt phù hợp với mệnh Hỏa. Đeo cặp vòng tay ruby cho hai người yêu nhau để tăng cường sự gắn kết.',
                    '🌹 **Nghi thức tình yêu:** Vào mỗi tối thứ 6, đặt 9 bông hồng đỏ trong bình và đặt ở góc Nam hoặc Đông Nam phòng ngủ. 9 là số của hành Hỏa và Ly Cung, rất mạnh trong việc thu hút Đào Hoa.',
                    '🔮 **Quản lý xung đột:** Người mệnh Hỏa cần học cách "hạ nhiệt" trong tranh luận. Đặt Aquamarine hoặc Thạch Anh Xanh ở giữa phòng ngủ để tạo sự hài hòa và dịu bớt Hỏa khí.',
                ],
            ],
            'Thổ' => [
                'tieu_de' => 'Tình Duyên & Gia Đạo cho Người Mệnh Thổ',
                'mo_ta' => 'Người mệnh Thổ trong tình yêu là bức tường vững chắc của cả gia đình. Họ trung thành tuyệt đối, trách nhiệm cao và luôn đặt gia đình lên hàng đầu. Thách thức là đôi khi quá bảo thủ và khó biểu lộ cảm xúc. Phong thủy giúp người mệnh Thổ mở lòng và xây dựng cuộc hôn nhân hạnh phúc, viên mãn.',
                'noi_dung' => [
                    '💑 **Đối tác tâm giao:** Người mệnh Hỏa (Bính, Đinh) là bạn đời lý tưởng – Hỏa sinh Thổ, nhiệt huyết và đam mê của người mệnh Hỏa làm ấm áp và thắp sáng cuộc đời người mệnh Thổ.',
                    '🏠 **Tổ ấm hạnh phúc:** Đặt cặp Mandarin Duck bằng đất nung hoặc gốm ở góc Tây Nam phòng ngủ (Khôn Cung – Đào Hoa của Tây Tứ Mệnh). Đây là bùa hộ hôn nhân mạnh mẽ nhất.',
                    '💎 **Đá duyên phận:** Thạch Anh Tóc Đỏ hoặc Carnelian mang năng lượng Hỏa sinh Thổ, giúp mở lòng và thu hút người có duyên với bạn.',
                    '🌹 **Xây dựng mái ấm:** Người mệnh Thổ nên trang trí nhà theo hướng Tây Nam – đây là Cung Khôn đại diện cho người vợ/người mẹ và hôn nhân trong Bát Quái. Đặt đèn vàng ấm ở góc này.',
                    '🔮 **Thể hiện tình cảm:** Người mệnh Thổ thường khó nói lời yêu thương trực tiếp – hãy thể hiện qua hành động thực tế (nấu ăn, chăm sóc) và tặng những món quà ý nghĩa bằng đá quý hợp mệnh.',
                ],
            ],
        ],
        'ho_menh' => [
            'Kim' => [
                'tieu_de' => 'Hộ Mệnh & Chống Tà Khí cho Người Mệnh Kim',
                'mo_ta' => 'Mệnh Kim trong phong thủy đặc biệt nhạy cảm với năng lượng âm từ phương Nam (Hỏa khắc Kim). Người mệnh Kim cần một lá chắn phong thủy mạnh mẽ để bảo vệ khỏi tiểu nhân, tai ương và những vận hạn không mong muốn.',
                'noi_dung' => [
                    '🛡️ **Vật phẩm hộ mệnh số 1:** Vòng tay Thạch Anh Đen (Black Obsidian) hoặc Thạch Anh Khói là lựa chọn tốt nhất. Đeo tay trái để nhận năng lượng bảo vệ, tay phải để xả năng lượng xấu ra ngoài.',
                    '🔱 **Linh vật bảo vệ:** Tượng Kim Thiền (Cóc Vàng 3 chân) đặt ở cửa ra vào nhà, quay đầu vào trong để giữ tài lộc và ngăn tiểu nhân xâm phạm.',
                    '⚡ **Thanh tẩy năng lượng:** Mỗi tháng âm lịch, dùng muối biển pha nước ấm để tắm thanh tẩy năng lượng xấu bám vào người. Sau đó đốt nhang trầm hương để làm sạch không gian.',
                    '🌙 **Nghi thức bảo vệ hàng tháng:** Vào ngày rằm (15 âm lịch), đặt vật phẩm phong thủy của bạn dưới ánh trăng từ 10 giờ tối đến 6 giờ sáng hôm sau để nạp lại năng lượng Mặt Trăng.',
                    '🏠 **Bảo vệ nhà cửa:** Treo Lục Diệu Tinh (ngôi sao 6 cánh bằng kim loại) ở cửa chính và cửa sổ lớn để ngăn âm khí và tà khí xâm nhập vào không gian sống.',
                ],
            ],
            'Mộc' => [
                'tieu_de' => 'Hộ Mệnh & Chống Tà Khí cho Người Mệnh Mộc',
                'mo_ta' => 'Người mệnh Mộc đặc biệt dễ bị ảnh hưởng bởi năng lượng Kim khắc. Những vùng đất có nhiều kim loại, công trường xây dựng hoặc khu công nghiệp gần nhà đều có thể ảnh hưởng tiêu cực. Cần thiết lập hàng rào năng lượng Thủy – Mộc để bảo vệ.',
                'noi_dung' => [
                    '🛡️ **Khiên bảo vệ Thủy-Mộc:** Kết hợp vòng tay Aquamarine (Thủy) và Ngọc Bích (Mộc) tạo thành cặp hộ mệnh hoàn hảo. Thủy sinh Mộc, tạo nguồn năng lượng bảo vệ liên tục.',
                    '🔱 **Linh vật hộ trì:** Tượng Quan Âm Bồ Tát bằng Ngọc Bích Xanh – đây là linh vật bảo hộ mạnh mẽ nhất cho người mệnh Mộc, mang lại từ bi và che chở khỏi tai ương.',
                    '⚡ **Xua đuổi tiêu cực:** Đặt cây Trúc Phát Tài trong nhà – đây vừa là vật phẩm hút tài lộc vừa là linh vật chống tiểu nhân. Số lượng nên là 8 hoặc 9 cây.',
                    '🌙 **Thanh tẩy định kỳ:** Dùng nhang gỗ đàn hương (thuộc Mộc hành) đốt trong nhà mỗi tuần một lần để thanh lọc không gian. Khói nhang đàn hương mang năng lượng Mộc thuần khiết.',
                    '🏠 **Bùa hộ mệnh cá nhân:** Khắc tên và năm sinh lên một viên Ngọc Bích nhỏ và mang theo bên mình như một bùa bảo vệ cá nhân. Đây là phương pháp truyền thống của người xưa.',
                ],
            ],
            'Thủy' => [
                'tieu_de' => 'Hộ Mệnh & Chống Tà Khí cho Người Mệnh Thủy',
                'mo_ta' => 'Người mệnh Thủy nhạy cảm và dễ bị ảnh hưởng bởi năng lượng xung quanh hơn bất kỳ mệnh nào khác. Năng lượng Thổ khắc Thủy từ các vùng đất cao, địa hình gồ ghề hoặc nhà ở gần núi có thể gây ảnh hưởng tiêu cực. Cần xây dựng lá chắn Kim-Thủy vững chắc.',
                'noi_dung' => [
                    '🛡️ **Vòng tay hộ mệnh:** Thạch Anh Trắng (Clear Quartz) kết hợp với Shungite Đen là combo bảo vệ mạnh mẽ nhất cho mệnh Thủy. Shungite có khả năng hấp thụ điện từ trường và năng lượng độc hại.',
                    '🔱 **Linh vật Kim sinh Thủy:** Tượng Hạc Trắng bằng kim loại (đồng hoặc bạc) đặt ở góc Tây phòng khách – Hạc là biểu tượng của sự trường thọ và bảo vệ trong văn hóa phong thủy.',
                    '⚡ **Bảo vệ khỏi tiểu nhân:** Đặt vòng dây muối biển quanh nhà vào đầu tháng âm lịch, sau 3 ngày đổ muối ra ngoài để mang theo tiêu cực đã hấp thụ.',
                    '🌙 **Nạp năng lượng Mặt Trăng:** Người mệnh Thủy nên thực hành nạp năng lượng Moonstone dưới ánh trăng tròn hàng tháng. Đây là nghi thức cộng hưởng mạnh nhất với mệnh Thủy.',
                    '🏠 **Không gian bảo vệ:** Không đặt cây xương rồng (Thổ hành) trong nhà người mệnh Thủy. Thay vào đó, đặt bể cá Kim Ngư nhỏ ở cửa vào để tạo trường bảo vệ Thủy tự nhiên.',
                ],
            ],
            'Hỏa' => [
                'tieu_de' => 'Hộ Mệnh & Chống Tà Khí cho Người Mệnh Hỏa',
                'mo_ta' => 'Người mệnh Hỏa năng lượng mạnh mẽ nhưng Thủy khắc Hỏa là mối nguy lớn nhất. Những nơi ẩm thấp, gần sông hồ lớn hoặc nhà hướng Bắc (hướng Thủy) có thể làm suy yếu bản mệnh. Cần dùng linh vật Mộc-Hỏa để bảo vệ.',
                'noi_dung' => [
                    '🛡️ **Hộ mệnh Mộc sinh Hỏa:** Vòng tay Ngọc Bích Xanh hoặc Mã Não Xanh tạo nguồn Mộc nuôi dưỡng và bảo vệ Hỏa mệnh. Đây là linh vật hộ mệnh mạnh nhất cho người mệnh Hỏa.',
                    '🔱 **Linh vật phượng hoàng:** Tượng Phượng Hoàng (linh vật Hỏa) bằng gỗ đỏ hoặc ngọc đỏ đặt ở góc Nam phòng khách – kích hoạt vượng khí Hỏa và xua đuổi âm khí.',
                    '⚡ **Bảo vệ khỏi Thủy khí:** Tránh đặt bể cá, đài phun nước hoặc tranh phong cảnh sông suối trong phòng ngủ. Những vật phẩm này mang Thủy khí có hại cho mệnh Hỏa.',
                    '🌙 **Nghi thức hàng tháng:** Vào ngày mùng 1 âm lịch, thắp 3 nén nhang đỏ và khấn Thần Linh Bảo Hộ để gia cố lá chắn năng lượng trong tháng mới.',
                    '🏠 **Trường bảo vệ Hỏa khí:** Đặt 9 viên Thạch Anh Đỏ xung quanh nhà (mỗi góc 1 viên, cửa chính 1 viên) để tạo trường năng lượng Hỏa bảo vệ cả gia đình.',
                ],
            ],
            'Thổ' => [
                'tieu_de' => 'Hộ Mệnh & Chống Tà Khí cho Người Mệnh Thổ',
                'mo_ta' => 'Người mệnh Thổ vững chắc như núi nhưng Mộc khắc Thổ là điểm yếu cần cảnh giác. Những ngôi nhà bao quanh bởi cây cối um tùm, rừng rậm hoặc đối diện với công viên lớn có thể mang Mộc khí quá mức. Cần xây dựng lá chắn Hỏa-Thổ để bảo vệ.',
                'noi_dung' => [
                    '🛡️ **Hộ mệnh Hỏa sinh Thổ:** Vòng tay Thạch Anh Tóc Đỏ hoặc Carnelian là lựa chọn số 1 để bảo vệ mệnh Thổ. Đeo tay trái mọi lúc mọi nơi để kích hoạt trường bảo vệ liên tục.',
                    '🔱 **Linh vật Kỳ Lân Đất:** Tượng Kỳ Lân bằng đất nung hoặc gốm đặt ở cửa chính – Kỳ Lân là linh vật bảo vệ mạnh nhất trong văn hóa phong thủy, đặc biệt hợp với người mệnh Thổ.',
                    '⚡ **Giảm thiểu Mộc khí:** Không trồng quá nhiều cây lớn trong khuôn viên nhà, đặc biệt tránh trồng cây trực tiếp trước cửa chính. Nếu đã trồng, hãy đặt thêm Thạch Anh Tóc Đỏ dưới gốc cây.',
                    '🌙 **Thanh tẩy Thổ mệnh:** Dùng muối đá và đất sét (Thổ hành) để làm lễ thanh tẩy nhà vào đầu năm âm lịch. Rải muối đá quanh nhà theo chiều kim đồng hồ để bảo vệ gia đình.',
                    '🏠 **Bảo vệ tài sản:** Đặt 5 đồng xu tiền cổ (ngũ đế tiền) buộc bằng chỉ đỏ trong ví hoặc trong két sắt để bảo vệ tài sản và ngăn tiểu nhân dòm ngó.',
                ],
            ],
        ],
    ];

    // =============================================
    // PHƯƠNG THỨC CÔNG KHAI
    // =============================================

    /**
     * Phân tích bản mệnh phong thủy đầy đủ
     */
    public function phanTich(
        int $day,
        int $month,
        int $year,
        string $gender,
        string $desire = '',
        string $lichType = 'duong'
    ): array {
        // 1. Xác định năm âm lịch thực sự
        $namAmLich = $this->xacDinhNamAmLich($day, $month, $year, $lichType);

        // 2. Tính Thiên Can → Ngũ Hành
        $canChi = $this->tinhThienCan($namAmLich);

        // 3. Tính Địa Chi
        $diaChi = $this->tinhDiaChi($namAmLich);
        $conGiap = self::CON_GIAP[$diaChi] ?? '?';

        // 4. Tính Cung Phi
        $cungPhi = $this->tinhCungPhi($namAmLich, $gender);
        $cungInfo = self::CUNG_PHI_INFO[$cungPhi];

        // 5. Nhóm mệnh Đông/Tây
        $nhomMenh = $cungInfo['nhom'] === 'dong' ? 'Đông Tứ Mệnh' : 'Tây Tứ Mệnh';
        $huong = $cungInfo['nhom'] === 'dong' ? self::HUONG_DONG_TU : self::HUONG_TAY_TU;

        // 6. Ngũ Hành thông tin chi tiết
        $nguHanh = $canChi['hanh'];
        $nguHanhInfo = self::NGU_HANH[$nguHanh];
        $mauSac = self::MAU_SAC[$nguHanh];
        $daQuy = self::DA_QUY[$nguHanh];

        // 7. Điểm vận khí
        $diemVanKhi = $this->tinhDiemVanKhi($nguHanh, $namAmLich, $gender);

        // 8. Lời khuyên theo mong muốn
        $loiKhuyen = null;
        if (!empty($desire) && isset(self::LOI_KHUYEN[$desire][$nguHanh])) {
            $loiKhuyen = self::LOI_KHUYEN[$desire][$nguHanh];
        }

        // 9. Thông tin cung phi mở rộng
        $huongTot = $cungInfo['nhom'] === 'dong' ? self::HUONG_DONG_TU['tot'] : self::HUONG_TAY_TU['tot'];
        $huongXau = $cungInfo['nhom'] === 'dong' ? self::HUONG_DONG_TU['xau'] : self::HUONG_TAY_TU['xau'];

        return [
            'thong_tin_co_ban' => [
                'nam_sinh_duong' => $year,
                'nam_sinh_am' => $namAmLich,
                'ngay_thang' => sprintf('%02d/%02d', $day, $month),
                'loai_lich' => $lichType,
                'gioi_tinh' => $gender,
                'gioi_tinh_ten' => $gender === 'male' ? 'Nam' : 'Nữ',
                'mong_muon' => $desire,
            ],
            'ngu_hanh' => [
                'ten' => $nguHanh,
                'icon' => $nguHanhInfo['icon'],
                'color' => $nguHanhInfo['color'],
                'gradient' => $nguHanhInfo['gradient'],
                'thien_can' => $canChi['can'],
                'dia_chi' => $diaChi,
                'con_giap' => $conGiap,
                'tuong_sinh_boi' => $nguHanhInfo['tuong_sinh_boi'],
                'sinh_ra' => $nguHanhInfo['sinh_ra'],
                'tuong_khac_boi' => $nguHanhInfo['tuong_khac_boi'],
                'khac_ra' => $nguHanhInfo['khac_ra'],
            ],
            'mau_sac' => $mauSac,
            'cung_phi' => [
                'so' => $cungPhi,
                'ten' => $cungInfo['ten'],
                'hanh' => $cungInfo['hanh'],
                'phuong_chinh' => $cungInfo['phuong'],
                'nhom_menh' => $nhomMenh,
                'huong_tot' => $huongTot,
                'huong_xau' => $huongXau,
            ],
            'da_quy' => $daQuy,
            'diem_van_khi' => $diemVanKhi,
            'loi_khuyen' => $loiKhuyen,
            // Data để lưu vào DB
            '_cache' => [
                'ten_menh' => $nguHanh,
                'thien_can' => $canChi['can'],
                'dia_chi' => $diaChi,
                'cung_phi' => $cungPhi,
                'ten_cung' => $cungInfo['ten'],
                'nhom_menh' => $nhomMenh,
            ],
        ];
    }

    // =============================================
    // THUẬT TOÁN NỘI BỘ
    // =============================================

    /**
     * Xác định năm âm lịch thực sự
     * Nếu DL và sinh trước ngày Tết Nguyên Đán, năm âm lịch = năm DL - 1
     */
    private function xacDinhNamAmLich(int $day, int $month, int $year, string $lichType): int
    {
        if ($lichType === 'am') {
            return $year; // Người dùng nhập thẳng năm âm lịch
        }

        // Nếu dương lịch: kiểm tra có trước Tết không
        // Tết Nguyên Đán thường rơi vào tháng 1-2 DL
        // Tra bảng đơn giản: nếu tháng 1-2 và ngày trước ngày Tết thì năm âm = năm DL - 1
        $ngayTet = $this->tinhNgayTetKhamPha($year);

        $ngaySinhDL = mktime(0, 0, 0, $month, $day, $year);

        if ($ngaySinhDL < $ngayTet) {
            return $year - 1;
        }
        return $year;
    }

    /**
     * Tính ngày Tết Nguyên Đán theo năm (xấp xỉ)
     * Dùng bảng lookup cho độ chính xác
     */
    private function tinhNgayTetKhamPha(int $year): int
    {
        // Bảng ngày Tết Nguyên Đán (tháng-ngày dương lịch) cho một số năm
        $bangTet = [
            1980 => [2, 16], 1981 => [2, 5],  1982 => [1, 25], 1983 => [2, 13],
            1984 => [2, 2],  1985 => [2, 20], 1986 => [2, 9],  1987 => [1, 29],
            1988 => [2, 17], 1989 => [2, 6],  1990 => [1, 27], 1991 => [2, 15],
            1992 => [2, 4],  1993 => [1, 23], 1994 => [2, 10], 1995 => [1, 31],
            1996 => [2, 19], 1997 => [2, 7],  1998 => [1, 28], 1999 => [2, 16],
            2000 => [2, 5],  2001 => [1, 24], 2002 => [2, 12], 2003 => [2, 1],
            2004 => [1, 22], 2005 => [2, 9],  2006 => [1, 29], 2007 => [2, 18],
            2008 => [2, 7],  2009 => [1, 26], 2010 => [2, 14], 2011 => [2, 3],
            2012 => [1, 23], 2013 => [2, 10], 2014 => [1, 31], 2015 => [2, 19],
            2016 => [2, 8],  2017 => [1, 28], 2018 => [2, 16], 2019 => [2, 5],
            2020 => [1, 25], 2021 => [2, 12], 2022 => [2, 1],  2023 => [1, 22],
            2024 => [2, 10], 2025 => [1, 29], 2026 => [2, 17], 2027 => [2, 6],
            2028 => [1, 26], 2029 => [2, 13], 2030 => [2, 3],
        ];

        if (isset($bangTet[$year])) {
            [$thang, $ngay] = $bangTet[$year];
            return mktime(0, 0, 0, $thang, $ngay, $year);
        }

        // Fallback: giả định ngày 15/02 nếu không có trong bảng
        return mktime(0, 0, 0, 2, 15, $year);
    }

    /**
     * Tính Thiên Can và Ngũ Hành từ năm âm lịch
     * Dựa trên chữ số cuối của năm mod 10
     */
    private function tinhThienCan(int $namAmLich): array
    {
        $index = $namAmLich % 10;
        return self::THIEN_CAN[$index];
    }

    /**
     * Tính Địa Chi (Con Giáp) từ năm âm lịch
     */
    private function tinhDiaChi(int $namAmLich): string
    {
        $index = ($namAmLich - 4) % 12;
        if ($index < 0) $index += 12;
        return self::DIA_CHI_ORDERED[$index];
    }

    /**
     * Tính Cung Phi (Số Lạc Thư) theo năm và giới tính
     */
    private function tinhCungPhi(int $namAmLich, string $gender): int
    {
        // Tính tổng chữ số năm đến khi còn 1 chữ số
        $sum = $this->tongChuSo($namAmLich);

        if ($gender === 'male') {
            $cung = (100 - $sum) % 9;
        } else {
            $cung = ($sum + 5) % 9;
        }

        return $cung === 0 ? 9 : $cung;
    }

    /**
     * Tính tổng chữ số đến khi còn 1 chữ số
     */
    private function tongChuSo(int $n): int
    {
        while ($n >= 10) {
            $sum = 0;
            while ($n > 0) {
                $sum += $n % 10;
                $n = intdiv($n, 10);
            }
            $n = $sum;
        }
        return $n;
    }

    /**
     * Tính điểm vận khí cho 4 lĩnh vực
     * Dựa trên mệnh, năm sinh và giới tính
     */
    private function tinhDiemVanKhi(string $nguHanh, int $namAmLich, string $gender): array
    {
        // Ma trận điểm cơ bản theo mệnh
        $bangDiem = [
            'Kim'  => ['tai_loc' => 85, 'binh_an' => 75, 'tinh_duyen' => 68, 'ho_menh' => 80],
            'Mộc'  => ['tai_loc' => 78, 'binh_an' => 80, 'tinh_duyen' => 82, 'ho_menh' => 72],
            'Thủy' => ['tai_loc' => 80, 'binh_an' => 70, 'tinh_duyen' => 76, 'ho_menh' => 78],
            'Hỏa'  => ['tai_loc' => 88, 'binh_an' => 65, 'tinh_duyen' => 85, 'ho_menh' => 70],
            'Thổ'  => ['tai_loc' => 75, 'binh_an' => 88, 'tinh_duyen' => 72, 'ho_menh' => 85],
        ];

        $diem = $bangDiem[$nguHanh] ?? ['tai_loc' => 75, 'binh_an' => 75, 'tinh_duyen' => 75, 'ho_menh' => 75];

        // Điều chỉnh theo năm (±3 điểm dựa trên can năm hiện tại)
        $namHienTai = (int)date('Y');
        $canNamNay = $this->tinhThienCan($namHienTai);
        $hanhNamNay = $canNamNay['hanh'];
        $nguHanhInfo = self::NGU_HANH[$nguHanh];

        // Năm tương sinh: +3 điểm tài lộc
        if ($nguHanhInfo['tuong_sinh_boi'] === $hanhNamNay) {
            $diem['tai_loc'] = min(99, $diem['tai_loc'] + 3);
            $diem['binh_an'] = min(99, $diem['binh_an'] + 2);
        }
        // Năm tương khắc: -3 điểm
        if ($nguHanhInfo['tuong_khac_boi'] === $hanhNamNay) {
            $diem['tai_loc'] = max(50, $diem['tai_loc'] - 3);
            $diem['ho_menh'] = min(99, $diem['ho_menh'] + 5); // Nhưng cần hộ mệnh hơn
        }

        // Tính tổng vận khí
        $tong = (int)(($diem['tai_loc'] + $diem['binh_an'] + $diem['tinh_duyen'] + $diem['ho_menh']) / 4);

        return [
            'tai_loc' => $diem['tai_loc'],
            'binh_an' => $diem['binh_an'],
            'tinh_duyen' => $diem['tinh_duyen'],
            'ho_menh' => $diem['ho_menh'],
            'tong_van_khi' => $tong,
            'nam_van' => $this->xepHangNamVan($tong),
        ];
    }

    private function xepHangNamVan(int $diem): string
    {
        if ($diem >= 85) return 'Đại Cát';
        if ($diem >= 75) return 'Cát';
        if ($diem >= 65) return 'Bình';
        return 'Cần Chú Ý';
    }
}
