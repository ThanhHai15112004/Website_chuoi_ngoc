<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\SanPhamService;
use App\Models\Admin\SanPhamModel;
use App\Models\Admin\DanhMucModel;

class SanPhamController extends Controller {
    private $sanPhamService;
    private $sanPhamModel;
    private $danhMucModel;

    public function __construct() {
        $this->sanPhamService = new SanPhamService();
        $this->sanPhamModel = new SanPhamModel();
        $this->danhMucModel = new DanhMucModel();
    }

    public function index() {
        // Thu thập query params
        $filters = [];
        if (!empty($_GET['q'])) $filters['q'] = trim($_GET['q']);
        if (!empty($_GET['danh_muc'])) $filters['danh_muc'] = trim($_GET['danh_muc']);
        if (!empty($_GET['sap_xep'])) $filters['sap_xep'] = trim($_GET['sap_xep']);
        
        // Mảng
        if (!empty($_GET['loai_da'])) {
            $filters['loai_da'] = is_array($_GET['loai_da']) ? $_GET['loai_da'] : [$_GET['loai_da']];
        }
        if (!empty($_GET['menh'])) {
            $filters['menh'] = is_array($_GET['menh']) ? $_GET['menh'] : [$_GET['menh']];
        }

        // Giá
        if (!empty($_GET['gia_range'])) {
            // value dạng: under_300k, 300k_700k, 700k_1500k, over_1500k
            switch ($_GET['gia_range']) {
                case 'under_300k':
                    $filters['gia_max'] = 300000;
                    break;
                case '300k_700k':
                    $filters['gia_min'] = 300000;
                    $filters['gia_max'] = 700000;
                    break;
                case '700k_1500k':
                    $filters['gia_min'] = 700000;
                    $filters['gia_max'] = 1500000;
                    break;
                case 'over_1500k':
                    $filters['gia_min'] = 1500000;
                    break;
            }
        }

        $page = isset($_GET['trang']) ? max(1, (int)$_GET['trang']) : 1;
        $perPage = 12;

        $result = $this->sanPhamService->getProductList($filters, $page, $perPage);

        // Sidebar Data
        // Danh mục list
        $danh_muc_raw = $this->danhMucModel->layTatCa(['trang_thai' => 1]);
        $danh_muc_list = [];
        foreach ($danh_muc_raw as $dm) {
            if ($dm['so_san_pham'] > 0) {
                $danh_muc_list[] = [
                    'ten' => $dm['ten_danh_muc'],
                    'slug' => $dm['slug'],
                    'count' => $dm['so_san_pham']
                ];
            }
        }
        
        // Loại đá & Mệnh
        $loai_da_list = $this->sanPhamModel->layDanhSachLoaiDa();
        $menh_list = $this->sanPhamModel->layDanhSachMenh();

        $data = [
            'tieu_de' => 'Sản phẩm - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'san_pham',
            
            // Dữ liệu sản phẩm
            'danh_sach_san_pham' => $result['data'],
            'tong_san_pham' => $result['total'],
            'trang_hien_tai_phan_trang' => $page,
            'tong_trang' => $result['total_pages'],
            
            // Dữ liệu sidebar
            'filters' => $filters,
            'danh_muc_list' => $danh_muc_list,
            'loai_da_list' => $loai_da_list,
            'menh_list' => $menh_list
        ];

        $this->view('san_pham', $data);
    }

    public function detail() {
        $id = isset($_GET['id']) ? trim($_GET['id']) : null;
        
        $service = new \App\Services\Admin\SanPhamService();
        $san_pham_db = $service->getProductById($id);

        if (!$san_pham_db) {
            // Chuyển hướng về trang sản phẩm nếu không tìm thấy
            header("Location: " . APP_URL . "/san-pham");
            exit;
        }

        // Tăng lượt xem
        $this->sanPhamModel->tangLuotXem($id);
        $san_pham_db['luot_xem'] += 1; // Update local count for display

        // Models for additional data
        $danhGiaModel = new \App\Models\Admin\DanhGiaModel();
        $voucherModel = new \App\Models\Admin\VoucherModel();
        $baiVietModel = new \App\Models\Admin\BaiVietModel();

        // 1. Thống kê và danh sách đánh giá
        $thong_ke_danh_gia = $danhGiaModel->getStatsByProductId($id);
        $danh_gia_list = $danhGiaModel->getByProductId($id, 5, 0);

        // 2. Lấy Voucher phù hợp (Giới hạn tối đa 3)
        $vouchers = $voucherModel->getApplicableVouchers($id, $san_pham_db['id_danh_muc']);
        $vouchers = array_slice($vouchers, 0, 3);

        $saved_vouchers = [];
        if (isset($_SESSION['user']['id'])) {
            $khuyenMaiService = new \App\Services\User\KhuyenMaiService();
            $saved_vouchers = $khuyenMaiService->getSavedVoucherIds($_SESSION['user']['id']);
        }

        // 3. Chính sách đổi trả từ bài viết
        $bai_viet_chinh_sach = $baiVietModel->timTheoSlug('chinh-sach-doi-tra');
        $chinh_sach_doi_tra = $bai_viet_chinh_sach ? $bai_viet_chinh_sach['noi_dung'] : '<p>Vui lòng liên hệ để biết thêm chi tiết về chính sách đổi trả.</p>';

        // 4. Sản phẩm liên quan (cùng danh mục, loại trừ SP hiện tại)
        $related_raw = $this->sanPhamModel->layDanhSachUser([
            'danh_muc' => $san_pham_db['danh_muc_slug'] ?? '',
            'exclude_id' => $id
        ], 'sp.ngay_tao', 'DESC', 8, 0);

        // Fallback: Nếu không có sản phẩm cùng danh mục, lấy sản phẩm mới nhất
        if (empty($related_raw)) {
            $related_raw = $this->sanPhamModel->layDanhSachUser([
                'exclude_id' => $id
            ], 'sp.ngay_tao', 'DESC', 8, 0);
        }

        $san_pham_lien_quan = [];
        foreach ($related_raw as $r) {
            $san_pham_lien_quan[] = [
                'id' => $r['id'],
                'ten' => $r['ten_sp'],
                'gia' => $r['gia_khuyen_mai'] ?: $r['gia_ban'],
                'gia_cu' => $r['gia_khuyen_mai'] ? $r['gia_ban'] : null,
                'danh_gia' => 5.0, // Mock for now if we don't fetch stats per product
                'da_ban' => $r['luot_xem'], // proxy for popular
                'nhan' => null,
                'menh' => $r['ten_menh'],
                'hinh_anh' => strpos($r['hinh_anh_chinh'], 'http') === 0 ? $r['hinh_anh_chinh'] : APP_URL . '/' . ltrim($r['hinh_anh_chinh'], '/')
            ];
        }

        // 5. Sản phẩm đã xem (Lưu trữ và lấy từ Session)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['san_pham_da_xem'])) {
            $_SESSION['san_pham_da_xem'] = [];
        }
        
        $da_xem_ids = $_SESSION['san_pham_da_xem'];
        $san_pham_da_xem = [];
        if (!empty($da_xem_ids)) {
            // Lọc bỏ ID hiện tại nếu có để ko hiển thị SP đang xem trong list "đã xem"
            $da_xem_ids_display = array_diff($da_xem_ids, [$id]);
            
            if (!empty($da_xem_ids_display)) {
                // Fetch basic info for these IDs
                foreach ($da_xem_ids_display as $dx_id) {
                    $dx_info = $this->sanPhamModel->timTheoId($dx_id);
                    if ($dx_info) {
                        $san_pham_da_xem[] = [
                            'id' => $dx_info['id'],
                            'ten' => $dx_info['ten_sp'],
                            'gia' => $dx_info['gia_khuyen_mai'] ?: $dx_info['gia_ban'],
                            'gia_cu' => $dx_info['gia_khuyen_mai'] ? $dx_info['gia_ban'] : null,
                            'danh_gia' => 5.0,
                            'da_ban' => $dx_info['luot_xem'],
                            'nhan' => null,
                            'menh' => $dx_info['ten_menh'],
                            'hinh_anh' => strpos($dx_info['hinh_anh_chinh'], 'http') === 0 ? $dx_info['hinh_anh_chinh'] : APP_URL . '/' . ltrim($dx_info['hinh_anh_chinh'], '/')
                        ];
                    }
                }
            }
        }

        // Cập nhật session (đưa ID hiện tại lên đầu mảng, giới hạn 10 SP)
        $new_da_xem = array_unique(array_merge([$id], $_SESSION['san_pham_da_xem']));
        $_SESSION['san_pham_da_xem'] = array_slice($new_da_xem, 0, 10);


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

        // Handle Huong dan bao quan default if null
        $huong_dan_bao_quan = $san_pham_db['huong_dan_bao_quan'] ?? "Tránh va đập mạnh hoặc làm rơi rớt.\nTránh tiếp xúc lâu với hóa chất.\nTháo ra khi tắm, giặt hoặc làm việc nhà.\nVệ sinh định kỳ bằng vải mềm và nước sạch.";
        $huong_dan_list = array_filter(array_map('trim', explode("\n", $huong_dan_bao_quan)));

        $san_pham = [
            'id' => $san_pham_db['id'],
            'ma_sp' => $san_pham_db['ma_sp'],
            'ten' => $san_pham_db['ten_sp'],
            'mo_ta_ngan' => $san_pham_db['mo_ta_ngan'],
            'gia' => $gia_hien_tai,
            'gia_cu' => $gia_cu,
            'phan_tram_giam' => $phan_tram_giam,
            'danh_gia' => $thong_ke_danh_gia['diem_trung_binh'],
            'tong_danh_gia' => $thong_ke_danh_gia['tong_danh_gia'],
            'da_ban' => $san_pham_db['luot_xem'], // proxy
            'danh_muc' => $san_pham_db['ten_danh_muc'] ?? 'Không rõ',
            'danh_muc_slug' => $san_pham_db['danh_muc_slug'] ?? '',
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
            'anh_chinh' => strpos($san_pham_db['hinh_anh_chinh'], 'http') === 0 ? $san_pham_db['hinh_anh_chinh'] : APP_URL . '/' . ltrim($san_pham_db['hinh_anh_chinh'], '/'),
            'danh_sach_anh' => [],
            
            // Tabs Info
            'mo_ta_chi_tiet' => $san_pham_db['mo_ta_chi_tiet'],
            'y_nghia_phong_thuy' => $san_pham_db['y_nghia_phong_thuy_chi_tiet'] ?: ($san_pham_db['y_nghia_phong_thuy'] ?: '<p>Sản phẩm mang lại năng lượng tích cực và may mắn.</p>'),
            'chinh_sach_doi_tra' => $chinh_sach_doi_tra,
            'thong_so_ky_thuat' => [
                'Chất liệu' => ($san_pham_db['ten_loai_da'] ?? 'Đá') . ' tự nhiên',
                'Xuất xứ' => 'Tự nhiên',
                'Kiểu dáng' => 'Vòng tay',
                'Mệnh' => implode(', ', $san_pham_db['menh'] ?? [])
            ],
            'huong_dan_bao_quan' => $huong_dan_list
        ];

        $san_pham['danh_sach_anh'][] = $san_pham['anh_chinh'];
        if (!empty($san_pham_db['anh_phu'])) {
            foreach ($san_pham_db['anh_phu'] as $path) {
                $san_pham['danh_sach_anh'][] = strpos($path, 'http') === 0 ? $path : APP_URL . '/' . ltrim($path, '/');
            }
        }

        $data = [
            'tieu_de' => $san_pham['ten'] . ' - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'chi_tiet_san_pham',
            'san_pham' => $san_pham,
            'san_pham_lien_quan' => $san_pham_lien_quan,
            'san_pham_da_xem' => $san_pham_da_xem,
            'danh_gia_list' => $danh_gia_list,
            'thong_ke_danh_gia' => $thong_ke_danh_gia,
            'vouchers' => $vouchers,
            'saved_vouchers' => $saved_vouchers
        ];

        $this->view('chi_tiet_san_pham', $data);
    }
}
