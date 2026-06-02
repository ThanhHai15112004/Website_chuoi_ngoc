<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\BaoCaoSanPhamModel;
use App\Models\Admin\DanhMucModel;
use App\Models\Admin\LoaiDaModel;
use App\Models\Admin\MenhPhongThuyModel;

class BaoCaoSanPhamController extends Controller
{
    private $baoCaoModel;
    private $danhMucModel;
    private $loaiDaModel;
    private $menhModel;

    public function __construct()
    {
        $this->baoCaoModel = new BaoCaoSanPhamModel();
        // Cần thêm các Model này nếu chưa có trong __construct
        $this->danhMucModel = new DanhMucModel();
        $this->loaiDaModel = new LoaiDaModel();
        $this->menhModel = new MenhPhongThuyModel();
    }

    private function parseTimeParams()
    {
        $thoiGian = $_GET['thoiGian'] ?? 'thang_nay';
        $tuNgay = $_GET['tuNgay'] ?? '';
        $denNgay = $_GET['denNgay'] ?? '';

        if ($thoiGian !== 'tuy_chon') {
            switch ($thoiGian) {
                case 'hom_nay':
                    $tuNgay = date('Y-m-d');
                    $denNgay = date('Y-m-d');
                    break;
                case '7_ngay':
                    $tuNgay = date('Y-m-d', strtotime('-7 days'));
                    $denNgay = date('Y-m-d');
                    break;
                case '30_ngay':
                    $tuNgay = date('Y-m-d', strtotime('-30 days'));
                    $denNgay = date('Y-m-d');
                    break;
                case 'thang_truoc':
                    $tuNgay = date('Y-m-d', strtotime('first day of last month'));
                    $denNgay = date('Y-m-d', strtotime('last day of last month'));
                    break;
                case 'thang_nay':
                default:
                    $tuNgay = date('Y-m-01');
                    $denNgay = date('Y-m-t');
                    $thoiGian = 'thang_nay';
                    break;
            }
        } else {
            if (empty($tuNgay)) $tuNgay = date('Y-m-01');
            if (empty($denNgay)) $denNgay = date('Y-m-t');
            
            if (strtotime($tuNgay) > strtotime($denNgay)) {
                $temp = $tuNgay;
                $tuNgay = $denNgay;
                $denNgay = $temp;
            }
        }

        return [
            'thoiGian' => $thoiGian,
            'tuNgay' => $tuNgay,
            'denNgay' => $denNgay
        ];
    }

    public function index()
    {
        $timeParams = $this->parseTimeParams();
        $tuNgay = $timeParams['tuNgay'];
        $denNgay = $timeParams['denNgay'];

        // Pagination & Filters for allProducts table
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'danh_muc' => $_GET['danh_muc'] ?? '',
            'loai_da' => $_GET['loai_da'] ?? '',
            'menh' => $_GET['menh'] ?? '',
            'hieu_qua' => $_GET['hieu_qua'] ?? ''
        ];

        // 1. Chỉ số tổng quan
        $overviewData = $this->baoCaoModel->tongQuan($tuNgay, $denNgay);
        $overview = [
            'san_pham_da_ban' => [
                'gia_tri' => $overviewData['san_pham_da_ban'],
                'tang_truong' => 0, // Mock, needs previous period calculation
                'xu_huong' => 'tang'
            ],
            'doanh_thu_san_pham' => [
                'gia_tri' => $overviewData['doanh_thu_san_pham'],
                'tang_truong' => 0,
                'xu_huong' => 'tang'
            ],
            'sp_ban_chay_nhat' => [
                'ten' => $overviewData['sp_ban_chay_nhat']['ten'] ?? 'Chưa có',
                'da_ban' => $overviewData['sp_ban_chay_nhat']['da_ban'] ?? 0,
                'hinh_anh' => $overviewData['sp_ban_chay_nhat']['hinh_anh'] ? APP_URL . '/public' . $overviewData['sp_ban_chay_nhat']['hinh_anh'] : APP_URL . '/public/assets/images/placeholder.png'
            ],
            'sp_ban_cham' => [
                'so_luong' => $overviewData['sp_ban_cham'],
                'hanh_dong' => 'Cần tối ưu'
            ],
            'sap_het_hang' => [
                'so_luong' => $overviewData['sap_het_hang'],
                'hanh_dong' => 'Cần nhập thêm'
            ],
            'ton_kho_cao' => [
                'so_luong' => $overviewData['ton_kho_cao'],
                'hanh_dong' => 'Nên khuyến mãi'
            ]
        ];

        // 2 & 3. Biểu đồ
        $chartTopProducts = $this->baoCaoModel->topSanPham($tuNgay, $denNgay, 5);
        $chartCategories = $this->baoCaoModel->doanhThuTheoDanhMuc($tuNgay, $denNgay);

        // 4 & 5. Phân tích thuộc tính
        $stoneReport = $this->baoCaoModel->hieuQuaTheoLoaiDa($tuNgay, $denNgay);
        $destinyReport = $this->baoCaoModel->hieuQuaTheoMenh($tuNgay, $denNgay);

        // 6, 7, 8. Bảng phân tích
        $inventoryWarnings = $this->baoCaoModel->canhBaoTonKho($tuNgay, $denNgay);
        $slowProducts = $this->baoCaoModel->sanPhamBanCham($tuNgay, $denNgay, 10);
        $promoEfficiency = $this->baoCaoModel->hieuQuaKhuyenMai($tuNgay, $denNgay);

        // 10. Bảng tất cả sản phẩm
        $allProducts = $this->baoCaoModel->danhSachSanPham($tuNgay, $denNgay, $limit, $offset, $filters);
        $totalProducts = $this->baoCaoModel->demDanhSachSanPham($tuNgay, $denNgay, $filters);
        $totalPages = ceil($totalProducts / $limit);

        // Lấy danh sách để lọc
        $danhMucs = $this->danhMucModel->layTatCa() ?? [];
        $loaiDas = $this->loaiDaModel->layTatCa() ?? [];
        $menhs = $this->menhModel->layTatCa() ?? [];

        // 9. Gợi ý hành động sinh tự động
        $actionSuggestions = [];
        
        if ($overviewData['sap_het_hang'] > 0) {
            $actionSuggestions[] = [
                'title' => $overviewData['sap_het_hang'] . ' sản phẩm sắp hết hàng',
                'desc' => 'Nên kiểm tra và nhập thêm để tránh mất đơn bán hàng.',
                'icon' => 'mdi:alert-circle-outline',
                'color' => 'yellow',
                'btn_text' => 'Xem sản phẩm',
                'btn_class' => 'border-yellow-600 text-yellow-700 hover:bg-yellow-50',
                'link' => APP_URL . '/admin/ton-kho'
            ];
        }

        if ($overviewData['sp_ban_cham'] > 0) {
            $actionSuggestions[] = [
                'title' => $overviewData['sp_ban_cham'] . ' sản phẩm bán chậm',
                'desc' => 'Có thể tạo khuyến mãi giảm giá hoặc đưa vào banner trang chủ để đẩy hàng.',
                'icon' => 'mdi:trending-down',
                'color' => 'orange',
                'btn_text' => 'Tạo khuyến mãi',
                'btn_class' => 'border-orange-600 text-orange-700 hover:bg-orange-50',
                'link' => APP_URL . '/admin/khuyen-mai/them'
            ];
        }

        if (!empty($stoneReport)) {
            $topStone = $stoneReport[0];
            if ($topStone['ty_trong'] > 30) {
                $actionSuggestions[] = [
                    'title' => $topStone['ten'] . ' chiếm ' . $topStone['ty_trong'] . '% doanh thu',
                    'desc' => 'Nên ưu tiên nhập thêm đa dạng mẫu mã hoặc tạo bộ sưu tập nổi bật riêng.',
                    'icon' => 'mdi:diamond-stone',
                    'color' => 'red',
                    'btn_text' => 'Nhập thêm ' . $topStone['ten'],
                    'btn_class' => 'bg-[#6B0D18] text-white hover:bg-red-900 border-transparent',
                    'link' => APP_URL . '/admin/nhap-kho/them'
                ];
            }
        }

        if (!empty($destinyReport)) {
            $topDestiny = $destinyReport[0];
            if ($topDestiny['da_ban'] > 0) {
                $actionSuggestions[] = [
                    'title' => $topDestiny['ten'] . ' đang mua sắm nhiều',
                    'desc' => 'Có thể viết bài blog tư vấn hoặc tạo banner ưu đãi riêng cho người ' . $topDestiny['ten'] . '.',
                    'icon' => 'mdi:leaf',
                    'color' => 'green',
                    'btn_text' => 'Tạo bài viết mới',
                    'btn_class' => 'border-green-600 text-green-700 hover:bg-green-50',
                    'link' => APP_URL . '/admin/post/them'
                ];
            }
        }
        
        // Bổ sung nếu chưa đủ 4 suggestions
        if (count($actionSuggestions) < 4 && $overviewData['ton_kho_cao'] > 0) {
            $actionSuggestions[] = [
                'title' => $overviewData['ton_kho_cao'] . ' sản phẩm tồn kho cao',
                'desc' => 'Có thể thanh lý hoặc bán combo để đẩy nhanh hàng tồn.',
                'icon' => 'mdi:warehouse',
                'color' => 'blue',
                'btn_text' => 'Xem chi tiết',
                'btn_class' => 'border-blue-600 text-blue-700 hover:bg-blue-50',
                'link' => APP_URL . '/admin/ton-kho'
            ];
        }

        $this->view('admin_bao_cao_san_pham', [
            'tieu_de' => 'Báo cáo sản phẩm',
            'current_page' => 'bao_cao_san_pham',
            'params' => $timeParams,
            'filters' => $filters,
            'overview' => $overview,
            'chartTopProducts' => $chartTopProducts,
            'chartCategories' => $chartCategories,
            'stoneReport' => $stoneReport,
            'destinyReport' => $destinyReport,
            'inventoryWarnings' => $inventoryWarnings,
            'slowProducts' => $slowProducts,
            'promoEfficiency' => $promoEfficiency,
            'actionSuggestions' => $actionSuggestions,
            'allProducts' => $allProducts,
            'page' => $page,
            'totalPages' => $totalPages,
            'totalProducts' => $totalProducts,
            'limit' => $limit,
            'offset' => $offset,
            'danhMucs' => $danhMucs,
            'loaiDas' => $loaiDas,
            'menhs' => $menhs
        ], 'admin');
    }
}
