<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class MenhPhongThuyController extends Controller
{
    public function index()
    {
        $destinies = [
            [
                'id' => 1,
                'ten' => 'Mệnh Kim',
                'mo_ta' => 'Kim loại, sự bền vững, sáng rõ',
                'mau_dai_dien' => '#E5E7EB', // Bạc/Trắng
                'ten_mau_dai_dien' => 'Trắng, bạc',
                'mau_hop' => ['Trắng', 'Bạc', 'Vàng nhạt', 'Nâu đất'],
                'mau_ky' => ['Đỏ', 'Hồng', 'Tím'],
                'da_hop' => ['Thạch anh trắng', 'Mặt trăng', 'Hổ phách'],
                'da_hop_count' => 8,
                'nhu_cau' => ['Bình an', 'Tài lộc', 'Công việc'],
                'so_san_pham' => 34,
                'so_nam_sinh' => 16,
                'trang_thai' => 1,
                'ngay_cap_nhat' => '18/05/2026 09:30',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 2,
                'ten' => 'Mệnh Mộc',
                'mo_ta' => 'Sự sinh sôi, phát triển, mềm dẻo',
                'mau_dai_dien' => '#10B981', // Xanh lá
                'ten_mau_dai_dien' => 'Xanh lá',
                'mau_hop' => ['Xanh lá', 'Xanh ngọc', 'Xanh dương', 'Đen'],
                'mau_ky' => ['Trắng', 'Bạc'],
                'da_hop' => ['Ngọc bích', 'Thạch anh xanh', 'Aquamarine'],
                'da_hop_count' => 12,
                'nhu_cau' => ['Bình an', 'Sức khỏe tinh thần', 'May mắn'],
                'so_san_pham' => 42,
                'so_nam_sinh' => 16,
                'trang_thai' => 1,
                'ngay_cap_nhat' => '17/05/2026 14:20',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 3,
                'ten' => 'Mệnh Thủy',
                'mo_ta' => 'Sự linh hoạt, trí tuệ, sâu sắc',
                'mau_dai_dien' => '#3B82F6', // Xanh dương
                'ten_mau_dai_dien' => 'Xanh dương, đen',
                'mau_hop' => ['Đen', 'Xanh dương', 'Trắng', 'Bạc'],
                'mau_ky' => ['Vàng đất', 'Nâu'],
                'da_hop' => ['Aquamarine', 'Lapis Lazuli', 'Thạch anh đen'],
                'da_hop_count' => 9,
                'nhu_cau' => ['Tình duyên', 'Công việc', 'Tài lộc'],
                'so_san_pham' => 28,
                'so_nam_sinh' => 16,
                'trang_thai' => 1,
                'ngay_cap_nhat' => '16/05/2026 10:15',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 4,
                'ten' => 'Mệnh Hỏa',
                'mo_ta' => 'Nhiệt huyết, danh vọng, bùng nổ',
                'mau_dai_dien' => '#EF4444', // Đỏ
                'ten_mau_dai_dien' => 'Đỏ, hồng, tím',
                'mau_hop' => ['Đỏ', 'Hồng', 'Tím', 'Xanh lá'],
                'mau_ky' => ['Đen', 'Xanh dương'],
                'da_hop' => ['Mã não đỏ', 'Thạch anh hồng', 'Ruby', 'Garnet'],
                'da_hop_count' => 15,
                'nhu_cau' => ['Tình duyên', 'May mắn', 'Tài lộc'],
                'so_san_pham' => 56,
                'so_nam_sinh' => 16,
                'trang_thai' => 1,
                'ngay_cap_nhat' => '15/05/2026 16:45',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 5,
                'ten' => 'Mệnh Thổ',
                'mo_ta' => 'Sự vững chãi, nuôi dưỡng, an toàn',
                'mau_dai_dien' => '#F59E0B', // Vàng đất
                'ten_mau_dai_dien' => 'Vàng đất, nâu',
                'mau_hop' => ['Vàng đất', 'Nâu', 'Đỏ', 'Hồng', 'Tím'],
                'mau_ky' => ['Xanh lá'],
                'da_hop' => ['Mắt hổ vàng', 'Thạch anh tóc vàng', 'Citrine'],
                'da_hop_count' => 10,
                'nhu_cau' => ['Bình an', 'Công việc', 'Tài lộc'],
                'so_san_pham' => 26,
                'so_nam_sinh' => 16,
                'trang_thai' => 2, // 2: Cần bổ sung
                'ngay_cap_nhat' => '14/05/2026 08:30',
                'nguoi_cap_nhat' => 'Hải Admin'
            ]
        ];

        $data = [
            'destinies' => $destinies,
            'current_page' => 'menh_phong_thuy',
            'tieu_de' => 'Mệnh Phong Thủy - Admin'
        ];
        $this->view('admin_menh_phong_thuy', $data, 'admin');
    }

    public function edit()
    {
        $mock_destiny = [
            'id' => 2,
            'ten' => 'Mệnh Mộc',
            'mo_ta_ngan' => 'Mệnh Mộc thường gắn với sự phát triển, mềm dẻo và sức sống.',
            'mo_ta_chi_tiet' => 'Mệnh Mộc tượng trưng cho mùa xuân, sự sinh sôi nảy nở. Người mệnh Mộc thường có tính cách thân thiện, chu đáo, tận tâm và hòa đồng. Việc sử dụng các loại đá phong thủy màu xanh lá hoặc đen/xanh dương (Thủy sinh Mộc) sẽ giúp tăng cường năng lượng tích cực.',
            'mau_dai_dien' => ['#10B981'],
            'mau_hop' => ['Xanh lá', 'Xanh ngọc', 'Xanh dương', 'Đen'],
            'mau_ky' => ['Trắng', 'Bạc'],
            'da_hop' => [
                ['id' => 1, 'ten' => 'Ngọc bích', 'mau' => 'Xanh ngọc', 'nhom' => 'Ngọc'],
                ['id' => 2, 'ten' => 'Thạch anh xanh', 'mau' => 'Xanh lá', 'nhom' => 'Tự nhiên'],
                ['id' => 3, 'ten' => 'Aquamarine', 'mau' => 'Xanh dương', 'nhom' => 'Bán quý'],
            ],
            'nhu_cau' => ['Bình an', 'Tài lộc', 'Sức khỏe tinh thần', 'May mắn'],
            'nam_sinh' => [
                ['nam' => 1988, 'can_chi' => 'Mậu Thìn'],
                ['nam' => 1989, 'can_chi' => 'Kỷ Tỵ'],
                ['nam' => 2002, 'can_chi' => 'Nhâm Ngọ'],
                ['nam' => 2003, 'can_chi' => 'Quý Mùi'],
                ['nam' => 2010, 'can_chi' => 'Canh Dần'],
            ],
            'san_pham' => [
                ['id' => 1, 'ten' => 'Vòng Ngọc Bích Tự Nhiên', 'gia' => 1250000, 'da' => 'Ngọc Bích', 'ton' => 12],
                ['id' => 2, 'ten' => 'Chuỗi Thạch Anh Xanh 8ly', 'gia' => 450000, 'da' => 'Thạch Anh Xanh', 'ton' => 45],
            ],
            'seo_tieu_de' => 'Vòng phong thủy dành cho người mệnh Mộc',
            'seo_mo_ta' => 'Người mệnh Mộc thường phù hợp với các sắc xanh, đen và xanh dương. Các mẫu vòng ngọc bích, thạch anh xanh hoặc đá tự nhiên màu xanh thường được gợi ý để tham khảo.',
            'trang_thai' => 1
        ];

        $data = [
            'mock' => $mock_destiny,
            'current_page' => 'menh_phong_thuy',
            'tieu_de' => 'Chỉnh sửa Mệnh Mộc - Admin'
        ];
        $this->view('admin_menh_phong_thuy_form', $data, 'admin');
    }
}
