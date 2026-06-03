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

    // =============================================
    // BẢNG NẠP ÂM LỤC THẬP HOA GIÁP (30 cặp = 60 năm)
    // Mỗi mục tương ứng 2 năm liên tiếp trong chu kỳ 60 năm
    // =============================================
    private const NAP_AM_TABLE = [
        'Hải Trung Kim',    // 0:  Giáp Tý, Ất Sửu
        'Lư Trung Hỏa',    // 1:  Bính Dần, Đinh Mão
        'Đại Lâm Mộc',     // 2:  Mậu Thìn, Kỷ Tỵ
        'Lộ Bàng Thổ',     // 3:  Canh Ngọ, Tân Mùi
        'Kiếm Phong Kim',  // 4:  Nhâm Thân, Quý Dậu
        'Sơn Đầu Hỏa',    // 5:  Giáp Tuất, Ất Hợi
        'Giản Hạ Thủy',    // 6:  Bính Tý, Đinh Sửu
        'Thành Đầu Thổ',   // 7:  Mậu Dần, Kỷ Mão
        'Bạch Lạp Kim',    // 8:  Canh Thìn, Tân Tỵ
        'Dương Liễu Mộc',  // 9:  Nhâm Ngọ, Quý Mùi
        'Tuyền Trung Thủy',// 10: Giáp Thân, Ất Dậu
        'Ốc Thượng Thổ',   // 11: Bính Tuất, Đinh Hợi
        'Tích Lịch Hỏa',   // 12: Mậu Tý, Kỷ Sửu
        'Tùng Bách Mộc',   // 13: Canh Dần, Tân Mão
        'Trường Lưu Thủy', // 14: Nhâm Thìn, Quý Tỵ
        'Sa Trung Kim',    // 15: Giáp Ngọ, Ất Mùi
        'Sơn Hạ Hỏa',     // 16: Bính Thân, Đinh Dậu
        'Bình Địa Mộc',    // 17: Mậu Tuất, Kỷ Hợi
        'Bích Thượng Thổ', // 18: Canh Tý, Tân Sửu
        'Kim Bạch Kim',    // 19: Nhâm Dần, Quý Mão
        'Phú Đăng Hỏa',   // 20: Giáp Thìn, Ất Tỵ
        'Thiên Hà Thủy',   // 21: Bính Ngọ, Đinh Mùi
        'Đại Trạch Thổ',   // 22: Mậu Thân, Kỷ Dậu
        'Thoa Xuyến Kim',  // 23: Canh Tuất, Tân Hợi
        'Tang Đố Mộc',     // 24: Nhâm Tý, Quý Sửu
        'Đại Khê Thủy',    // 25: Giáp Dần, Ất Mão
        'Sa Trung Thổ',    // 26: Bính Thìn, Đinh Tỵ
        'Thiên Thượng Hỏa',// 27: Mậu Ngọ, Kỷ Mùi
        'Thạch Lựu Mộc',   // 28: Canh Thân, Tân Dậu
        'Đại Hải Thủy',    // 29: Nhâm Tuất, Quý Hợi
    ];

    // Giá trị Nạp Âm của Thiên Can (theo index: year % 10)
    // 0=Canh→4, 1=Tân→4, 2=Nhâm→5, 3=Quý→5, 4=Giáp→1, 5=Ất→1, 6=Bính→2, 7=Đinh→2, 8=Mậu→3, 9=Kỷ→3
    private const CAN_NAP_AM_VALUE = [4, 4, 5, 5, 1, 1, 2, 2, 3, 3];

    // Giá trị Nạp Âm của Địa Chi (theo index: (year-4) % 12)
    // Tý/Sửu=0, Dần/Mão=1, Thìn/Tỵ=2, Ngọ/Mùi=0, Thân/Dậu=1, Tuất/Hợi=2
    private const CHI_NAP_AM_VALUE = [0, 0, 1, 1, 2, 2, 0, 0, 1, 1, 2, 2];

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
                'mo_ta' => 'Người mệnh Kim mang đặc tính của kim loại – sắc bén, quyết đoán, có tư duy logic và khả năng quản lý vượt trội. Trong Ngũ Hành, Kim được Thổ sinh ra (Thổ sinh Kim) và bị Hỏa khắc chế (Hỏa khắc Kim). Hiểu rõ quy luật này giúp bạn chọn đúng hướng đi để phát triển sự nghiệp và gia tăng tài lộc.',
                'noi_dung' => [
                    '🧭 **Hướng tốt cho sự nghiệp:** Người mệnh Kim thuộc Tây Tứ Mệnh, hướng vượng nhất là **Tây** và **Tây Bắc** (hành Kim – củng cố bản mệnh). Các hướng **Tây Nam** và **Đông Bắc** (hành Thổ – Thổ sinh Kim) cũng rất tốt để đặt bàn làm việc, mở cửa hàng hoặc bố trí két sắt. Nên **tránh hướng Nam** (hành Hỏa khắc Kim) vì dễ gây hao tổn tài vận.',
                    '💼 **Nghề nghiệp phù hợp:** Người mệnh Kim phát huy tốt nhất trong các lĩnh vực đòi hỏi sự chính xác và tư duy chiến lược: **tài chính, ngân hàng, kế toán, kiểm toán, chứng khoán** (nhóm quản lý tài chính); **cơ khí, kim khí, công nghệ thông tin, thiết kế đồ họa** (nhóm kỹ thuật); **luật sư, chuyên viên pháp lý** (nhóm pháp lý); hoặc **kinh doanh vàng bạc đá quý, vật liệu xây dựng**.',
                    '💰 **Vật phẩm chiêu tài:** Đặt **Tỳ Hưu** hoặc **Thiềm Thừ** (Cóc 3 chân) bằng đồng/kim loại trên bàn làm việc hướng Tây Nam. Vòng tay **Thạch Anh Vàng** (Citrine – Thổ sinh Kim) hoặc **Mắt Hổ Vàng** giúp thu hút tài lộc và tăng sự tự tin. **Tháp Văn Xương** đặc biệt tốt nếu bạn cầu công danh, học vấn.',
                    '🌈 **Màu sắc may mắn trong công việc:** Ưu tiên **trắng, xám bạc, ánh kim** (màu bản mệnh Kim) và **vàng, nâu đất** (màu Thổ sinh Kim) khi mặc đồ đi họp, đàm phán hoặc trang trí văn phòng. **Tránh** sử dụng quá nhiều **đỏ, cam, hồng, tím** (thuộc Hỏa khắc Kim) vì dễ gây bất ổn và hao hụt năng lượng.',
                    '📅 **Thời điểm thuận lợi:** Các ngày có Thiên Can **Canh, Tân** (Can Kim) là ngày bản mệnh, rất phù hợp để ký hợp đồng, khởi nghiệp hoặc đề xuất dự án. Mùa Thu (tháng 7-9 âm lịch) là thời kỳ năng lượng Kim vượng nhất – lý tưởng để mở rộng kinh doanh.',
                    '🔮 **Phong thủy văn phòng:** Bàn làm việc nên bằng kim loại hoặc kính. Đặt **quả cầu Thạch Anh Trắng** hoặc **đá Mắt Hổ** ở góc Tây bàn làm việc. Nên để một **bình hoa tươi màu vàng hoặc trắng** trên bàn. Tuyệt đối không đặt gương đối diện cửa ra vào và không ngồi lưng quay ra cửa.',
                ],
            ],
            'Mộc' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Mộc',
                'mo_ta' => 'Người mệnh Mộc tượng trưng cho sự sinh trưởng, phát triển và sáng tạo không ngừng – như cây xanh vươn lên mạnh mẽ. Trong Ngũ Hành, Mộc được Thủy nuôi dưỡng (Thủy sinh Mộc) và bị Kim khắc chế (Kim khắc Mộc). Tận dụng nguyên tắc tương sinh này sẽ giúp bạn hanh thông trên con đường công danh sự nghiệp.',
                'noi_dung' => [
                    '🧭 **Hướng tốt cho sự nghiệp:** Hướng **Đông** và **Đông Nam** (hành Mộc – tương hợp bản mệnh) là hai hướng vượng nhất. Hướng **Bắc** (hành Thủy – Thủy sinh Mộc) cũng rất tốt để đặt bàn làm việc hoặc mở cửa hàng. Nên **tránh hướng Tây và Tây Bắc** (hành Kim khắc Mộc) vì dễ gây trắc trở trong công việc.',
                    '💼 **Nghề nghiệp phù hợp:** Người mệnh Mộc phát huy tốt trong các lĩnh vực liên quan đến sự phát triển và sáng tạo: **giáo dục, đào tạo, y dược** (tính chất nuôi dưỡng của Mộc); **thiết kế nội thất, kiến trúc, hội họa, biên kịch** (nhóm sáng tạo); **nông lâm nghiệp, kinh doanh hoa cảnh, nội thất gỗ, giấy, vải** (nhóm hành Mộc); hoặc **mỹ phẩm, trà, nước giải khát** (nhóm Thủy sinh Mộc).',
                    '💰 **Vật phẩm chiêu tài:** Đặt **cây phong thủy** như Cây Kim Tiền, Trúc Phú Quý hoặc cây Ngọc Bích trên bàn làm việc ở góc Đông. Vòng tay **đá Aquamarine** (Thủy sinh Mộc) hoặc **Ngọc Bích** (cùng hành Mộc) giúp thu hút tài lộc và bảo vệ bản mệnh. **Tỳ Hưu** bằng ngọc xanh hoặc **tượng Cá Chép hóa Rồng** tượng trưng cho công danh thăng tiến.',
                    '🌈 **Màu sắc may mắn trong công việc:** Ưu tiên **xanh lá cây, xanh lục** (màu bản mệnh Mộc) và **đen, xanh dương, xanh nước biển** (màu Thủy sinh Mộc) trong trang phục và nội thất văn phòng. **Tránh** sử dụng quá nhiều **trắng, xám, ánh kim** (thuộc Kim khắc Mộc).',
                    '📅 **Thời điểm thuận lợi:** Các ngày có Thiên Can **Giáp, Ất** (Can Mộc) là ngày bản mệnh, tốt để ký hợp đồng và khởi sự. Ngày **Nhâm, Quý** (Can Thủy) cũng thuận lợi vì Thủy sinh Mộc. Mùa Xuân (tháng 1-3 âm lịch) là thời kỳ năng lượng Mộc vượng nhất trong năm.',
                    '🔮 **Phong thủy văn phòng:** Bàn làm việc nên bằng **gỗ tự nhiên** để tăng cường năng lượng hành Mộc. Đặt **quả cầu đá Thạch Anh Xanh** hoặc **Obsidian Đen** ở góc Đông bàn làm việc. Nên đặt bàn ở vị trí vững chãi, hướng ra cửa nhưng không đối diện trực tiếp cửa ra vào.',
                ],
            ],
            'Thủy' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Thủy',
                'mo_ta' => 'Người mệnh Thủy mang đặc tính của nước – linh hoạt, khéo léo, thông minh và có khả năng thích nghi phi thường. Trong Ngũ Hành, Thủy được Kim sinh ra (Kim sinh Thủy) và bị Thổ khắc chế (Thổ khắc Thủy). Sự nhạy bén và năng khiếu giao tiếp bẩm sinh chính là vũ khí mạnh nhất của bạn trên thương trường.',
                'noi_dung' => [
                    '🧭 **Hướng tốt cho sự nghiệp:** Hướng **Bắc** (hành Thủy – hướng bản mệnh) giúp củng cố sự nghiệp và mang lại ổn định. Hướng **Tây** và **Tây Bắc** (hành Kim – Kim sinh Thủy) rất tốt để thu hút tài lộc và gặp quý nhân phù trợ. Nên **tránh hướng Tây Nam và Đông Bắc** (hành Thổ khắc Thủy).',
                    '💼 **Nghề nghiệp phù hợp:** Người mệnh Thủy tỏa sáng trong các lĩnh vực yêu cầu sự giao tiếp và linh hoạt: **vận tải, logistics, thủy hải sản, du lịch, spa, chăm sóc sắc đẹp** (nhóm hành Thủy); **tài chính, ngân hàng, kế toán, công nghệ thông tin, truyền thông, marketing** (nhóm Kim sinh Thủy); hoặc **thương mại quốc tế, ngoại giao, nghệ thuật, kinh doanh dịch vụ**.',
                    '💰 **Vật phẩm chiêu tài:** Đặt **bể cá phong thủy** nhỏ (hội tụ hành Thủy mạnh) hoặc **đài phun nước mini** trong phòng làm việc. Vòng tay **Thạch Anh Trắng** (Kim sinh Thủy) hoặc **đá Aquamarine, Sapphire Xanh** giúp tăng trí tuệ và thu hút cơ hội. **Thiềm Thừ** hoặc **Tỳ Hưu** bằng pha lê trắng/trong đặt ở hướng Bắc bàn làm việc.',
                    '🌈 **Màu sắc may mắn trong công việc:** Ưu tiên **đen, xanh dương, xanh nước biển** (màu bản mệnh Thủy) và **trắng, xám, ghi, bạc** (màu Kim sinh Thủy). **Tránh** sử dụng quá nhiều **vàng, nâu đất, cam** (thuộc Thổ khắc Thủy) trong trang phục và nội thất.',
                    '📅 **Thời điểm thuận lợi:** Các ngày có Thiên Can **Nhâm, Quý** (Can Thủy) là ngày bản mệnh. Ngày **Canh, Tân** (Can Kim) cũng rất thuận lợi vì Kim sinh Thủy. Mùa Đông (tháng 10-12 âm lịch) là thời kỳ năng lượng Thủy mạnh nhất – lý tưởng để triển khai kế hoạch lớn.',
                    '🔮 **Phong thủy văn phòng:** Bàn làm việc nên đặt hướng Bắc hoặc Tây Bắc. Đặt **quả cầu phong thủy** màu xanh hoặc đen trên bàn. Một **chậu hồ lô vàng** hoặc **mặt dây chuyền hình giọt nước** giúp kích hoạt sự suôn sẻ trong công việc. Trang trí văn phòng với tông màu xanh dương nhạt hoặc trắng sáng.',
                ],
            ],
            'Hỏa' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Hỏa',
                'mo_ta' => 'Người mệnh Hỏa mang trong mình ngọn lửa đam mê – nhiệt huyết, sáng tạo, quyết đoán và có sức hút tự nhiên. Trong Ngũ Hành, Hỏa được Mộc nuôi dưỡng (Mộc sinh Hỏa) và bị Thủy khắc chế (Thủy khắc Hỏa). Khả năng truyền cảm hứng và sự nhạy bén chính là vũ khí giúp bạn chinh phục mọi đỉnh cao sự nghiệp.',
                'noi_dung' => [
                    '🧭 **Hướng tốt cho sự nghiệp:** Hướng **Nam** (hành Hỏa – hướng bản mệnh) giúp tăng cường năng lượng và danh tiếng. Hướng **Đông** và **Đông Nam** (hành Mộc – Mộc sinh Hỏa) rất tốt để thu hút tài lộc và cơ hội phát triển. Nên **tránh hướng Bắc** (hành Thủy khắc Hỏa) và **hướng Tây, Tây Bắc** (hành Kim) vì dễ gây trở ngại.',
                    '💼 **Nghề nghiệp phù hợp:** Người mệnh Hỏa phát huy tốt nhất trong các lĩnh vực đòi hỏi sự sáng tạo và lãnh đạo: **đầu bếp, ẩm thực, diễn viên, nghệ thuật, nhiếp ảnh** (nhóm hành Hỏa); **marketing, truyền thông, giải trí, bán hàng, chính trị** (nhóm cần sức hút và thuyết phục); **công nghệ thông tin, kinh doanh bất động sản** (Hỏa sinh Thổ); hoặc **giáo dục, thiết kế, kinh doanh ánh sáng, điện**.',
                    '💰 **Vật phẩm chiêu tài:** Đặt **chậu cây xanh** (Cây Phát Tài, Cây Kim Tiền – Mộc sinh Hỏa) ở góc Đông văn phòng. Vòng tay **Ngọc Bích Xanh** hoặc **Mã Não Xanh Lá** (Mộc sinh Hỏa) giúp nuôi dưỡng tài vận liên tục. **Tỳ Hưu** bằng đá đỏ hoặc **Ấn Rồng** giúp củng cố quyền lực và con đường công danh.',
                    '🌈 **Màu sắc may mắn trong công việc:** Ưu tiên **đỏ, hồng, cam, tím** (màu bản mệnh Hỏa) và **xanh lá cây** (màu Mộc sinh Hỏa). Đặc biệt màu đỏ đậm rất phù hợp khi cần thể hiện quyền uy trong đàm phán. **Tránh** sử dụng quá nhiều **đen, xanh dương đậm** (thuộc Thủy khắc Hỏa).',
                    '📅 **Thời điểm thuận lợi:** Các ngày có Thiên Can **Bính, Đinh** (Can Hỏa) là ngày bản mệnh. Ngày **Giáp, Ất** (Can Mộc) cũng rất thuận lợi vì Mộc sinh Hỏa. Mùa Hè (tháng 4-6 âm lịch) là thời kỳ năng lượng Hỏa ở đỉnh cao – lý tưởng để ra mắt sản phẩm, mở rộng kinh doanh.',
                    '🔮 **Phong thủy văn phòng:** Đặt bàn làm việc quay mặt hướng Nam hoặc Đông Nam. Đặt **quả cầu Mã Não Đỏ** hoặc **Thạch Anh Đỏ** ở góc Nam bàn làm việc. Trang trí văn phòng với cây xanh tươi tốt để duy trì nguồn năng lượng Mộc sinh Hỏa. Nên có đèn sáng ấm (ánh vàng/cam) thay vì đèn lạnh trắng xanh.',
                ],
            ],
            'Thổ' => [
                'tieu_de' => 'Tài Lộc & Công Danh cho Người Mệnh Thổ',
                'mo_ta' => 'Người mệnh Thổ mang đặc tính của đất – vững chãi, kiên định, đáng tin cậy và có khả năng nuôi dưỡng vạn vật. Trong Ngũ Hành, Thổ được Hỏa sinh ra (Hỏa sinh Thổ) và bị Mộc khắc chế (Mộc khắc Thổ). Sự bền bỉ, tinh thần trách nhiệm và khả năng quản trị chính là chìa khóa thành công của bạn.',
                'noi_dung' => [
                    '🧭 **Hướng tốt cho sự nghiệp:** Hướng **Tây Nam** và **Đông Bắc** (hành Thổ – hướng bản mệnh) giúp củng cố địa vị và tài lộc lâu dài. Hướng **Nam** (hành Hỏa – Hỏa sinh Thổ) rất tốt cho sự nghiệp và danh tiếng. Nên **tránh hướng Đông và Đông Nam** (hành Mộc khắc Thổ) vì dễ gây bất ổn nền tảng.',
                    '💼 **Nghề nghiệp phù hợp:** Người mệnh Thổ phát huy tốt trong các lĩnh vực ổn định và tích lũy dài hạn: **bất động sản, xây dựng, vật liệu xây dựng** (lĩnh vực \"thuận\" nhất với Thổ); **nông nghiệp, kinh doanh cây cảnh, khai thác khoáng sản, gốm sứ** (nhóm hành Thổ); **quản trị, nhân sự, kế toán, tài chính, đầu tư** (nhờ tính cách cẩn trọng); hoặc **đầu bếp, kỹ sư nhiệt điện, truyền thông** (nhóm Hỏa sinh Thổ).',
                    '💰 **Vật phẩm chiêu tài:** Đặt **Tỳ Hưu** hoặc **Thiềm Thừ** bằng gốm/đất nung ở góc Tây Nam bàn làm việc. Vòng tay **Thạch Anh Vàng** (Citrine – cùng hành Thổ) hoặc **Thạch Anh Tóc Đỏ** (Hỏa sinh Thổ) giúp thu hút tài lộc mạnh mẽ. **Quả cầu phong thủy** bằng thạch anh vàng/nâu đặt trên bàn giúp tăng sự sáng suốt.',
                    '🌈 **Màu sắc may mắn trong công việc:** Ưu tiên **vàng, nâu đất, be** (màu bản mệnh Thổ) và **đỏ, hồng, tím, cam** (màu Hỏa sinh Thổ). **Tránh** sử dụng quá nhiều **xanh lá cây, xanh đậm** (thuộc Mộc khắc Thổ) trong trang phục và trang trí văn phòng.',
                    '📅 **Thời điểm thuận lợi:** Các ngày có Thiên Can **Mậu, Kỷ** (Can Thổ) là ngày bản mệnh. Ngày **Bính, Đinh** (Can Hỏa) cũng rất thuận lợi vì Hỏa sinh Thổ. Các **thời điểm chuyển mùa** (tháng 3, 6, 9, 12 âm lịch) là khi năng lượng Thổ mạnh nhất – lý tưởng để đưa ra quyết định kinh doanh quan trọng.',
                    '🔮 **Phong thủy văn phòng:** Trang trí văn phòng với vật liệu tự nhiên (gốm, đá, gỗ). Đặt **đèn bàn tông vàng ấm** ở góc Nam phòng để kích hoạt Hỏa sinh Thổ. **Gậy Như Ý** bằng đá quý tượng trưng cho quyền uy và may mắn. Ưu tiên nội thất có tông màu vàng đất, nâu ấm tạo cảm giác vững chắc và an toàn.',
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

        // 2. Tính Thiên Can (để lấy tên Can: Giáp, Ất, ...)
        $canChi = $this->tinhThienCan($namAmLich);

        // 3. Tính Địa Chi
        $diaChi = $this->tinhDiaChi($namAmLich);
        $conGiap = self::CON_GIAP[$diaChi] ?? '?';

        // 4. Tính Nạp Âm → Ngũ Hành Bản Mệnh (Lục Thập Hoa Giáp)
        $napAm = $this->tinhNapAm($namAmLich);

        // 5. Tính Cung Phi
        $cungPhi = $this->tinhCungPhi($namAmLich, $gender);
        $cungInfo = self::CUNG_PHI_INFO[$cungPhi];

        // 6. Nhóm mệnh Đông/Tây
        $nhomMenh = $cungInfo['nhom'] === 'dong' ? 'Đông Tứ Mệnh' : 'Tây Tứ Mệnh';
        $huong = $cungInfo['nhom'] === 'dong' ? self::HUONG_DONG_TU : self::HUONG_TAY_TU;

        // 7. Ngũ Hành thông tin chi tiết (dùng Nạp Âm, KHÔNG phải Thiên Can)
        $nguHanh = $napAm['hanh'];
        $tenNapAm = $napAm['ten_nap_am'];
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
                'nap_am' => $tenNapAm,
                'icon' => $nguHanhInfo['icon'],
                'color' => $nguHanhInfo['color'],
                'gradient' => $nguHanhInfo['gradient'],
                'thien_can' => $canChi['can'],
                'hanh_thien_can' => $canChi['hanh'],
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
     * LƯU Ý: Hành của Thiên Can KHÁC với Hành Bản Mệnh (Nạp Âm)
     */
    private function tinhThienCan(int $namAmLich): array
    {
        $index = $namAmLich % 10;
        return self::THIEN_CAN[$index];
    }

    /**
     * Tính Ngũ Hành Bản Mệnh theo Nạp Âm Lục Thập Hoa Giáp
     * Đây là thuật toán CHUẨN để xác định mệnh phong thủy
     *
     * Công thức:
     *   Can value: Giáp/Ất=1, Bính/Đinh=2, Mậu/Kỷ=3, Canh/Tân=4, Nhâm/Quý=5
     *   Chi value: Tý/Sửu & Ngọ/Mùi=0, Dần/Mão & Thân/Dậu=1, Thìn/Tỵ & Tuất/Hợi=2
     *   Sum = Can + Chi (nếu > 5 thì trừ 5)
     *   1=Kim, 2=Thủy, 3=Hỏa, 4=Thổ, 5=Mộc
     */
    private function tinhNapAm(int $namAmLich): array
    {
        $canIndex = $namAmLich % 10;
        $chiIndex = ($namAmLich - 4) % 12;
        if ($chiIndex < 0) $chiIndex += 12;

        // Tính Ngũ Hành bằng công thức Nạp Âm
        $canValue = self::CAN_NAP_AM_VALUE[$canIndex];
        $chiValue = self::CHI_NAP_AM_VALUE[$chiIndex];
        $sum = $canValue + $chiValue;
        if ($sum > 5) $sum -= 5;

        $hanhMap = [1 => 'Kim', 2 => 'Thủy', 3 => 'Hỏa', 4 => 'Thổ', 5 => 'Mộc'];
        $hanh = $hanhMap[$sum];

        // Tên Nạp Âm chi tiết (VD: Hải Trung Kim, Tuyền Trung Thủy, ...)
        $cyclePos = ($namAmLich - 4) % 60;
        if ($cyclePos < 0) $cyclePos += 60;
        $napAmIndex = intdiv($cyclePos, 2);
        $tenNapAm = self::NAP_AM_TABLE[$napAmIndex];

        return [
            'hanh' => $hanh,
            'ten_nap_am' => $tenNapAm,
        ];
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
