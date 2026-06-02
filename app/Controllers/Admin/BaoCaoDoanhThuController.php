<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\BaoCaoDoanhThuModel;

class BaoCaoDoanhThuController extends Controller
{
    private $baoCaoModel;

    public function __construct()
    {
        $this->baoCaoModel = new BaoCaoDoanhThuModel();
    }

    /**
     * Parse tham số thời gian từ request GET
     */
    private function parseTimeParams()
    {
        $thoiGian = $_GET['thoi_gian'] ?? '30days';
        $tuNgay = $_GET['tu_ngay'] ?? '';
        $denNgay = $_GET['den_ngay'] ?? '';

        $now = new \DateTime();
        
        switch ($thoiGian) {
            case '7days':
                $start = (new \DateTime())->modify('-6 days');
                $end = new \DateTime();
                
                $kyTruocEnd = clone $start;
                $kyTruocEnd->modify('-1 day');
                $kyTruocStart = clone $kyTruocEnd;
                $kyTruocStart->modify('-6 days');
                break;
            case '30days':
                $start = (new \DateTime())->modify('-29 days');
                $end = new \DateTime();
                
                $kyTruocEnd = clone $start;
                $kyTruocEnd->modify('-1 day');
                $kyTruocStart = clone $kyTruocEnd;
                $kyTruocStart->modify('-29 days');
                break;
            case 'thang_nay':
                $start = new \DateTime('first day of this month');
                $end = new \DateTime('last day of this month');
                
                $kyTruocStart = new \DateTime('first day of last month');
                $kyTruocEnd = new \DateTime('last day of last month');
                break;
            case 'quy_nay':
                $currentMonth = (int)$now->format('n');
                $quarter = ceil($currentMonth / 3);
                $startMonth = ($quarter - 1) * 3 + 1;
                $start = new \DateTime($now->format('Y') . "-$startMonth-01");
                $end = clone $start;
                $end->modify('+2 months')->modify('last day of this month');
                
                // Kỳ trước
                $kyTruocStart = clone $start;
                $kyTruocStart->modify('-3 months');
                $kyTruocEnd = clone $kyTruocStart;
                $kyTruocEnd->modify('+2 months')->modify('last day of this month');
                break;
            case 'nam_nay':
                $start = new \DateTime($now->format('Y') . "-01-01");
                $end = new \DateTime($now->format('Y') . "-12-31");
                
                $kyTruocStart = new \DateTime((int)$now->format('Y') - 1 . "-01-01");
                $kyTruocEnd = new \DateTime((int)$now->format('Y') - 1 . "-12-31");
                break;
            case 'custom':
                if (!empty($tuNgay)) {
                    $start = new \DateTime($tuNgay);
                } else {
                    $start = (new \DateTime())->modify('-29 days');
                }
                
                if (!empty($denNgay)) {
                    $end = new \DateTime($denNgay);
                } else {
                    $end = new \DateTime();
                }
                
                // Tính kỳ trước cùng khoảng thời gian
                $diff = $start->diff($end)->days;
                $kyTruocEnd = clone $start;
                $kyTruocEnd->modify('-1 day');
                $kyTruocStart = clone $kyTruocEnd;
                $kyTruocStart->modify("-{$diff} days");
                break;
            default: // 30days
                $start = (new \DateTime())->modify('-29 days');
                $end = new \DateTime();
                
                $kyTruocEnd = clone $start;
                $kyTruocEnd->modify('-1 day');
                $kyTruocStart = clone $kyTruocEnd;
                $kyTruocStart->modify('-29 days');
                break;
        }

        return [
            'thoiGian' => $thoiGian,
            'tuNgay' => $start->format('Y-m-d'),
            'denNgay' => $end->format('Y-m-d'),
            'kyTruocTu' => $kyTruocStart->format('Y-m-d'),
            'kyTruocDen' => $kyTruocEnd->format('Y-m-d')
        ];
    }

    /**
     * Hiển thị trang báo cáo doanh thu
     */
    public function index()
    {
        $params = $this->parseTimeParams();
        
        $tu = $params['tuNgay'];
        $den = $params['denNgay'];
        $ktTu = $params['kyTruocTu'];
        $ktDen = $params['kyTruocDen'];

        // 1. Chỉ số tổng quan (KPIs)
        $overviewKyNay = $this->baoCaoModel->tongQuan($tu, $den);
        $overviewKyTruoc = $this->baoCaoModel->tongQuan($ktTu, $ktDen);
        
        $overview = [];
        $keys = ['tong_doanh_thu', 'don_thanh_cong', 'gia_tri_trung_binh', 'san_pham_da_ban', 'tong_giam_gia', 'doanh_thu_thuc_nhan'];
        foreach($keys as $key) {
            $gtNay = (float)($overviewKyNay[$key] ?? 0);
            $gtTruoc = (float)($overviewKyTruoc[$key] ?? 0);
            
            $tangTruong = 0;
            if ($gtTruoc > 0) {
                $tangTruong = round((($gtNay - $gtTruoc) / $gtTruoc) * 100, 1);
            } else if ($gtNay > 0) {
                $tangTruong = 100;
            }
            
            $xuHuong = $tangTruong >= 0 ? 'tang' : 'giam';
            if ($tangTruong == 0) $xuHuong = 'bang';
            
            $overview[$key] = [
                'gia_tri' => $gtNay,
                'tang_truong' => abs($tangTruong),
                'xu_huong' => $xuHuong
            ];
        }

        // 2. Các dữ liệu khác
        $chartRevenue = $this->baoCaoModel->bieuDoDoanhThu($tu, $den, $ktTu, $ktDen);
        $chartOrderStatus = $this->baoCaoModel->bieuDoTrangThaiDon($tu, $den);
        $tableTime = $this->baoCaoModel->bangTheoNgay($tu, $den);
        $topProducts = $this->baoCaoModel->topSanPham($tu, $den, 5);
        $slowProducts = $this->baoCaoModel->sanPhamBanCham(5);
        $revenueByCategory = $this->baoCaoModel->doanhThuTheoDanhMuc($tu, $den);
        $revenueByStone = $this->baoCaoModel->doanhThuTheoLoaiDa($tu, $den);
        $revenueByDestiny = $this->baoCaoModel->doanhThuTheoMenh($tu, $den);
        $marketingReport = $this->baoCaoModel->baoCaoVoucher($tu, $den);
        $paymentMethods = $this->baoCaoModel->doanhThuTheoPTTT($tu, $den);
        $customerRanks = $this->baoCaoModel->doanhThuTheoHangTV($tu, $den);
        
        // Paginaton for orders
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        
        $recentOrders = $this->baoCaoModel->danhSachDonHang($tu, $den, $limit, $offset, $keyword);
        $totalOrders = $this->baoCaoModel->demDanhSachDonHang($tu, $den, $keyword);
        $totalPages = ceil($totalOrders / $limit);

        $this->view('admin_bao_cao_doanh_thu', [
            'tieu_de' => 'Báo cáo doanh thu',
            'current_page' => 'bao_cao_doanh_thu',
            'params' => $params,
            'overview' => $overview,
            'chartRevenue' => $chartRevenue,
            'chartOrderStatus' => $chartOrderStatus,
            'tableTime' => $tableTime,
            'topProducts' => $topProducts,
            'slowProducts' => $slowProducts,
            'revenueByCategory' => $revenueByCategory,
            'revenueByStone' => $revenueByStone,
            'revenueByDestiny' => $revenueByDestiny,
            'marketingReport' => $marketingReport,
            'paymentMethods' => $paymentMethods,
            'customerRanks' => $customerRanks,
            'recentOrders' => $recentOrders,
            'orderPage' => $page,
            'orderTotalPages' => $totalPages,
            'orderTotalItems' => $totalOrders,
            'orderKeyword' => $keyword
        ], 'admin');
    }

    /**
     * API trả về data cho biểu đồ (nếu cần update bằng Ajax sau này)
     */
    public function apiChartData()
    {
        $params = $this->parseTimeParams();
        
        $tu = $params['tuNgay'];
        $den = $params['denNgay'];
        $ktTu = $params['kyTruocTu'];
        $ktDen = $params['kyTruocDen'];
        
        $chartRevenue = $this->baoCaoModel->bieuDoDoanhThu($tu, $den, $ktTu, $ktDen);
        $chartOrderStatus = $this->baoCaoModel->bieuDoTrangThaiDon($tu, $den);
        
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'data' => [
                'revenue' => $chartRevenue,
                'status' => $chartOrderStatus
            ]
        ]);
        exit;
    }
}
