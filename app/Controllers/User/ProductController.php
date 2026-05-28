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
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        // Nếu truyền slug, id có dạng string. Tạm thời lấy bằng findById nếu truyền đúng id thực tế
        $service = new \App\Services\Admin\SanPhamService();
        $san_pham_db = $service->getProductById($id);

        if (!$san_pham_db) {
            // Lấy sản phẩm đầu tiên nếu không có ID (fallback để không bị lỗi)
            $sanPhamModel = new \App\Models\SanPhamModel();
            $list = $sanPhamModel->layDanhSach([], 1);
            if (!empty($list)) {
                $san_pham_db = $service->getProductById($list[0]['id']);
            } else {
                echo "Không tìm thấy sản phẩm.";
                exit;
            }
        }

        // Map DB data to view variables
        $gia_ban = (float)$san_pham_db['gia_ban'];
        $gia_cu = $san_pham_db['gia_khuyen_mai'] ? $gia_ban : null;
        $gia_hien_tai = $san_pham_db['gia_khuyen_mai'] ? (float)$san_pham_db['gia_khuyen_mai'] : $gia_ban;
        $phan_tram_giam = 0;
        if ($gia_cu) {
            $phan_tram_giam = round((($gia_cu - $gia_hien_tai) / $gia_cu) * 100);
        }

        $tinh_trang = 'con_hang';
        if ($san_pham_db['tong_ton_kho'] <= 0) {
            $tinh_trang = 'het_hang';
        }

        $san_pham = [
            'id' => $san_pham_db['id'],
            'ma_sp' => $san_pham_db['ma_sp'],
            'ten' => $san_pham_db['ten_sp'],
            'mo_ta_ngan' => $san_pham_db['mo_ta_ngan'],
            'gia' => $gia_hien_tai,
            'gia_cu' => $gia_cu,
            'phan_tram_giam' => $phan_tram_giam,
            'danh_gia' => 5.0,
            'tong_danh_gia' => rand(10, 100),
            'da_ban' => rand(10, 500),
            'danh_muc' => $san_pham_db['ten_danh_muc'] ?? 'Không rõ',
            'tinh_trang' => $tinh_trang,
            'so_luong_con' => (int)$san_pham_db['tong_ton_kho'],
            
            // Attributes
            'thuoc_tinh' => [
                'Loại đá' => $san_pham_db['ten_loai_da'] ?? 'Không rõ',
                'Mệnh phù hợp' => implode(', ', $san_pham_db['menh'] ?? []),
                'Tình trạng' => $tinh_trang === 'het_hang' ? 'Hết hàng' : 'Còn hàng',
            ],
            
            // Variants
            'bien_the_thuc_te' => $san_pham_db['bien_the_thuc_te'] ?? [],
            
            // Images
            'anh_chinh' => strpos($san_pham_db['hinh_anh_chinh'], 'http') === 0 ? $san_pham_db['hinh_anh_chinh'] : APP_URL . '/public' . $san_pham_db['hinh_anh_chinh'],
            'danh_sach_anh' => [],
            
            // Tabs Info
            'mo_ta_chi_tiet' => $san_pham_db['mo_ta_chi_tiet'],
            'thong_so_ky_thuat' => [
                'Chất liệu' => ($san_pham_db['ten_loai_da'] ?? 'Đá') . ' tự nhiên',
                'Xuất xứ' => 'Tự nhiên',
            ],
            'huong_dan_bao_quan' => [
                'Tránh va đập mạnh hoặc làm rơi rớt.',
                'Tránh tiếp xúc lâu với hóa chất.',
            ]
        ];

        $san_pham['danh_sach_anh'][] = $san_pham['anh_chinh'];
        if (!empty($san_pham_db['anh_phu'])) {
            foreach ($san_pham_db['anh_phu'] as $path) {
                $san_pham['danh_sach_anh'][] = strpos($path, 'http') === 0 ? $path : APP_URL . '/public' . $path;
            }
        }

        // Mock related products
        $sanPhamModel = new \App\Models\SanPhamModel();
        $related = $sanPhamModel->layDanhSach([], 4);
        $san_pham_lien_quan = [];
        foreach ($related as $r) {
            $san_pham_lien_quan[] = [
                'id' => $r['id'],
                'ten' => $r['ten_sp'],
                'gia' => $r['gia_khuyen_mai'] ?: $r['gia_ban'],
                'gia_cu' => $r['gia_khuyen_mai'] ? $r['gia_ban'] : null,
                'danh_gia' => 5.0,
                'da_ban' => rand(10, 100),
                'nhan' => null,
                'menh' => $r['ten_menh'],
                'hinh_anh' => strpos($r['hinh_anh_chinh'], 'http') === 0 ? $r['hinh_anh_chinh'] : APP_URL . '/public' . $r['hinh_anh_chinh']
            ];
        }

        $san_pham_da_xem = $san_pham_lien_quan;

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
