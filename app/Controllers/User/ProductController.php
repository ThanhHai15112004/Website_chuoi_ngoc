<?php

namespace App\Controllers\User;

use App\Core\Controller;

class ProductController extends Controller {
    public function index() {
        // Dữ liệu mẫu sản phẩm (sẽ thay bằng Model khi có database)
        $danh_sach_san_pham = [
            [
                'id' => 1,
                'ten' => 'Ngọc Tụ Nham Vân Mây',
                'mo_ta_ngan' => 'Hợp mệnh Mộc, Hỏa · Đá tự nhiên',
                'gia' => 850000,
                'gia_cu' => 1000000,
                'danh_gia' => 4.9,
                'da_ban' => 126,
                'nhan' => 'Bán chạy',
                'danh_muc' => 'Vòng ngọc',
                'menh' => 'Mộc',
                'loai_da' => 'Ngọc bích',
                'nhu_cau' => 'Cầu tài lộc',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg'
            ],
            [
                'id' => 2,
                'ten' => 'Hồng Anh Đào Ngọc Nương Tử',
                'mo_ta_ngan' => 'Hợp mệnh Hỏa, Thổ · Cầu bình an',
                'gia' => 1200000,
                'gia_cu' => null,
                'danh_gia' => 5.0,
                'da_ban' => 89,
                'nhan' => 'Cao cấp',
                'danh_muc' => 'Vòng ngọc',
                'menh' => 'Hỏa',
                'loai_da' => 'Ngọc bích',
                'nhu_cau' => 'Cầu bình an',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg'
            ],
            [
                'id' => 3,
                'ten' => 'Vòng Thời Trang Xinh Yêu',
                'mo_ta_ngan' => 'Hợp mệnh Kim, Thủy · Đá tự nhiên',
                'gia' => 550000,
                'gia_cu' => null,
                'danh_gia' => 4.8,
                'da_ban' => 210,
                'nhan' => 'Mới',
                'danh_muc' => 'Tràng hạt',
                'menh' => 'Kim',
                'loai_da' => 'Thạch anh',
                'nhu_cau' => 'Cầu may mắn',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg'
            ],
            [
                'id' => 4,
                'ten' => 'Nhang Trầm Hương Thanh Tịnh',
                'mo_ta_ngan' => 'Tịnh tâm, an thần · Trầm tự nhiên',
                'gia' => 250000,
                'gia_cu' => 300000,
                'danh_gia' => 5.0,
                'da_ban' => 340,
                'nhan' => '-17%',
                'danh_muc' => 'Trầm hương',
                'menh' => 'Thổ',
                'loai_da' => 'Trầm hương',
                'nhu_cau' => 'Cầu bình an',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'
            ],
            [
                'id' => 5,
                'ten' => 'Mã Não Anh Đào Phú Quý',
                'mo_ta_ngan' => 'Hợp mệnh Thủy, Mộc · Mã não tự nhiên',
                'gia' => 680000,
                'gia_cu' => 850000,
                'danh_gia' => 4.7,
                'da_ban' => 95,
                'nhan' => '-20%',
                'danh_muc' => 'Vòng ngọc',
                'menh' => 'Thủy',
                'loai_da' => 'Mã não',
                'nhu_cau' => 'Cầu tài lộc',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg'
            ],
            [
                'id' => 6,
                'ten' => 'Ngọc Hòa Điền Tân Cương',
                'mo_ta_ngan' => 'Hợp mệnh Thổ, Kim · Ngọc cao cấp',
                'gia' => 1850000,
                'gia_cu' => null,
                'danh_gia' => 4.9,
                'da_ban' => 45,
                'nhan' => 'Cao cấp',
                'danh_muc' => 'Tràng hạt',
                'menh' => 'Thổ',
                'loai_da' => 'Ngọc bích',
                'nhu_cau' => 'Quà tặng người thân',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-1.jpg'
            ],
            [
                'id' => 7,
                'ten' => 'Bột Xông Nhà Tịnh Tâm',
                'mo_ta_ngan' => 'Thanh lọc không gian · 100% tự nhiên',
                'gia' => 180000,
                'gia_cu' => null,
                'danh_gia' => 4.6,
                'da_ban' => 580,
                'nhan' => 'Bán chạy',
                'danh_muc' => 'Trầm hương',
                'menh' => 'Thổ',
                'loai_da' => 'Trầm hương',
                'nhu_cau' => 'Cầu bình an',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg'
            ],
            [
                'id' => 8,
                'ten' => 'Vòng Ngọc Tụ Nham Vân Mây',
                'mo_ta_ngan' => 'Hợp mệnh Mộc · Cầu tài lộc bình an',
                'gia' => 950000,
                'gia_cu' => null,
                'danh_gia' => 4.8,
                'da_ban' => 67,
                'nhan' => null,
                'danh_muc' => 'Vòng ngọc',
                'menh' => 'Mộc',
                'loai_da' => 'Ngọc bích',
                'nhu_cau' => 'Cầu tài lộc',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-4.jpg'
            ],
            [
                'id' => 9,
                'ten' => 'Trầm Hương Miếng Cao Cấp',
                'mo_ta_ngan' => 'Hương thơm tự nhiên · Trầm lâu năm',
                'gia' => 450000,
                'gia_cu' => 520000,
                'danh_gia' => 4.9,
                'da_ban' => 156,
                'nhan' => '-13%',
                'danh_muc' => 'Trầm hương',
                'menh' => 'Hỏa',
                'loai_da' => 'Trầm hương',
                'nhu_cau' => 'Hỗ trợ công việc',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-3.jpg'
            ],
            [
                'id' => 10,
                'ten' => 'Hồng Đào Điểm Son Quý Phái',
                'mo_ta_ngan' => 'Hợp mệnh Hỏa · Cầu tình duyên',
                'gia' => 1350000,
                'gia_cu' => null,
                'danh_gia' => 5.0,
                'da_ban' => 32,
                'nhan' => 'Mới',
                'danh_muc' => 'Vòng ngọc',
                'menh' => 'Hỏa',
                'loai_da' => 'Ngọc bích',
                'nhu_cau' => 'Cầu tình duyên',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-2.jpg'
            ],
            [
                'id' => 11,
                'ten' => 'Mã Não Anh Đào Điểm Hoa',
                'mo_ta_ngan' => 'Hợp mệnh Thủy · Có vảy rồng tự nhiên',
                'gia' => 780000,
                'gia_cu' => null,
                'danh_gia' => 4.7,
                'da_ban' => 78,
                'nhan' => null,
                'danh_muc' => 'Vòng ngọc',
                'menh' => 'Thủy',
                'loai_da' => 'Mã não',
                'nhu_cau' => 'Cầu may mắn',
                'tinh_trang' => 'con_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-2.jpg'
            ],
            [
                'id' => 12,
                'ten' => 'Nhang Trầm Vòng Xoắn Thiền',
                'mo_ta_ngan' => 'Thiền định · Hương trầm nguyên chất',
                'gia' => 320000,
                'gia_cu' => 400000,
                'danh_gia' => 4.8,
                'da_ban' => 245,
                'nhan' => '-20%',
                'danh_muc' => 'Trầm hương',
                'menh' => 'Kim',
                'loai_da' => 'Trầm hương',
                'nhu_cau' => 'Cầu bình an',
                'tinh_trang' => 'het_hang',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg'
            ],
        ];

        $data = [
            'tieu_de' => 'Sản phẩm - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'san_pham',
            'danh_sach_san_pham' => $danh_sach_san_pham,
            'tong_san_pham' => count($danh_sach_san_pham),
            'trang_hien_tai_phan_trang' => 1,
            'tong_trang' => 8,
        ];

        $this->view('san_pham', $data);
    }

    public function detail() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
        
        // Mock data for a single product with full details
        $san_pham = [
            'id' => 1,
            'ma_sp' => 'NB-TL-001',
            'ten' => 'Vòng Ngọc Bích Tài Lộc',
            'mo_ta_ngan' => 'Hợp mệnh Mộc, Hỏa · Đá tự nhiên',
            'gia' => 680000,
            'gia_cu' => 850000,
            'phan_tram_giam' => 20,
            'danh_gia' => 4.9,
            'tong_danh_gia' => 126,
            'da_ban' => 320,
            'danh_muc' => 'Vòng ngọc',
            'tinh_trang' => 'con_hang', // con_hang, sap_het, het_hang
            'so_luong_con' => 25,
            
            // Attributes
            'thuoc_tinh' => [
                'Loại đá' => 'Ngọc bích tự nhiên',
                'Mệnh phù hợp' => 'Mộc, Hỏa',
                'Nhu cầu' => 'Tài lộc, bình an',
                'Kích thước hạt' => '8mm',
                'Tình trạng' => 'Còn hàng',
            ],
            
            // Variants
            'bien_the' => [
                'kich_thuoc_hat' => ['6mm', '8mm', '10mm', '12mm'],
                'size_vong' => ['14cm', '15cm', '16cm', '17cm', '18cm'],
            ],
            
            // Images
            'anh_chinh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg',
            'danh_sach_anh' => [
                APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg',
                APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg',
                APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (2).jpg',
                APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-4.jpg',
            ],
            
            // Tabs Info
            'mo_ta_chi_tiet' => 'Vòng Ngọc Bích Tài Lộc được thiết kế từ các hạt ngọc bích chọn lọc, màu sắc hài hòa, phù hợp với người yêu thích phong cách thanh lịch và mong muốn mang theo biểu tượng may mắn, bình an trong cuộc sống hằng ngày. Sản phẩm được chế tác thủ công tinh xảo, mỗi hạt ngọc đều được mài giũa cẩn thận để giữ trọn vẹn vẻ đẹp tự nhiên và năng lượng phong thủy.',
            
            'thong_so_ky_thuat' => [
                'Chất liệu' => 'Ngọc bích tự nhiên 100%',
                'Kích thước hạt' => '8mm (Có thể chọn size khác)',
                'Size vòng' => '16cm (Phù hợp cổ tay nữ trung bình)',
                'Mệnh phù hợp' => 'Mộc, Hỏa',
                'Màu sắc' => 'Xanh ngọc',
                'Xuất xứ' => 'Việt Nam / Nhập khẩu',
                'Phụ kiện đi kèm' => 'Hộp đựng sang trọng, túi quà, dây xỏ dự phòng'
            ],
            
            'y_nghia_phong_thuy' => 'Ngọc bích thường được xem là biểu tượng của sự bình an, tài lộc và cân bằng. Sắc xanh của ngọc bích thuộc hành Mộc, rất phù hợp với người mệnh Mộc (tương hợp) và mệnh Hỏa (tương sinh). Đeo vòng ngọc bích giúp mang lại cảm giác thư thái, tĩnh tâm, đồng thời thu hút vượng khí, may mắn trong công việc và cuộc sống. Sản phẩm đặc biệt thích hợp làm quà tặng bình an cho người thân.',
            
            'huong_dan_bao_quan' => [
                'Tránh va đập mạnh hoặc làm rơi rớt.',
                'Tránh tiếp xúc lâu với hóa chất, xà phòng, chất tẩy rửa.',
                'Lau nhẹ bằng khăn mềm ẩm khi cần vệ sinh.',
                'Cất trong hộp kín có đệm lót khi không sử dụng.',
                'Không nên ngâm nước quá lâu hoặc đeo khi tắm hơi.'
            ],
            
            'chinh_sach_doi_tra' => 'Hỗ trợ đổi trả miễn phí trong vòng 7 ngày nếu có lỗi từ nhà sản xuất. Sản phẩm đổi trả phải còn nguyên vẹn, không có dấu hiệu đã qua sử dụng và đầy đủ phụ kiện, hộp đựng đi kèm. Quý khách vui lòng quay video khi mở hàng để được hỗ trợ tốt nhất.'
        ];

        // Mock related products
        $san_pham_lien_quan = [
            [
                'id' => 2,
                'ten' => 'Hồng Anh Đào Ngọc Nương Tử',
                'gia' => 1200000,
                'gia_cu' => null,
                'danh_gia' => 5.0,
                'da_ban' => 89,
                'nhan' => 'Cao cấp',
                'menh' => 'Hỏa',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg'
            ],
            [
                'id' => 5,
                'ten' => 'Mã Não Anh Đào Phú Quý',
                'gia' => 680000,
                'gia_cu' => 850000,
                'danh_gia' => 4.7,
                'da_ban' => 95,
                'nhan' => '-20%',
                'menh' => 'Thủy',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg'
            ],
            [
                'id' => 8,
                'ten' => 'Vòng Ngọc Tụ Nham Vân Mây',
                'gia' => 950000,
                'gia_cu' => null,
                'danh_gia' => 4.8,
                'da_ban' => 67,
                'nhan' => null,
                'menh' => 'Mộc',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-4.jpg'
            ],
            [
                'id' => 11,
                'ten' => 'Mã Não Anh Đào Điểm Hoa',
                'gia' => 780000,
                'gia_cu' => null,
                'danh_gia' => 4.7,
                'da_ban' => 78,
                'nhan' => null,
                'menh' => 'Thủy',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-2.jpg'
            ]
        ];

        // Mock recent products
        $san_pham_da_xem = [
            [
                'id' => 3,
                'ten' => 'Vòng Thời Trang Xinh Yêu',
                'gia' => 550000,
                'gia_cu' => null,
                'danh_gia' => 4.8,
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg'
            ],
            [
                'id' => 4,
                'ten' => 'Nhang Trầm Hương Thanh Tịnh',
                'gia' => 250000,
                'gia_cu' => 300000,
                'danh_gia' => 5.0,
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'
            ],
            [
                'id' => 7,
                'ten' => 'Bột Xông Nhà Tịnh Tâm',
                'gia' => 180000,
                'gia_cu' => null,
                'danh_gia' => 4.6,
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg'
            ],
            [
                'id' => 9,
                'ten' => 'Trầm Hương Miếng Cao Cấp',
                'gia' => 450000,
                'gia_cu' => 520000,
                'danh_gia' => 4.9,
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-3.jpg'
            ]
        ];

        $data = [
            'tieu_de' => $san_pham['ten'] . ' - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'chi_tiet_san_pham',
            'san_pham' => $san_pham,
            'san_pham_lien_quan' => $san_pham_lien_quan,
            'san_pham_da_xem' => $san_pham_da_xem
        ];

        $this->view('chi_tiet_san_pham', $data);
    }
}
