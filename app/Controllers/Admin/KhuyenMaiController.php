<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\KhuyenMaiModel;

class KhuyenMaiController extends Controller {
    private $khuyenMaiModel;

    public function __construct() {
        $this->khuyenMaiModel = new KhuyenMaiModel();
        // Cập nhật giá luôn khi vào controller này để dữ liệu luôn chính xác
        $this->khuyenMaiModel->syncPromotionPrices();
    }

    public function index() {
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $offset = ($page - 1) * $limit;
        
        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'loai_km' => $_GET['loai_km'] ?? '',
            'danh_muc' => $_GET['danh_muc'] ?? '',
            'tab' => $_GET['tab'] ?? 'tat_ca'
        ];
        
        $danh_sach = $this->khuyenMaiModel->getAll($filters, $limit, $offset);
        $total = $this->khuyenMaiModel->countAll($filters);
        
        $now = time();
        $thong_ke = $this->khuyenMaiModel->getThongKe();
        
        // Fetch categories for the filter
        $danhMucService = new \App\Services\Admin\DanhMucService();
        $danh_muc_list = $danhMucService->getAllCategories();

        // Format lại dữ liệu cho view
        $formatted_list = [];
        foreach ($danh_sach as $km) {
            $trang_thai_text = 'Đã tắt';
            $trang_thai_class = 'text-gray-400';
            
            if ($km['trang_thai'] == 1) {
                $bd = strtotime($km['ngay_bat_dau']);
                $kt = strtotime($km['ngay_ket_thuc']);
                if ($now < $bd) {
                    $trang_thai_text = 'Sắp bắt đầu';
                    $trang_thai_class = 'text-blue-500';
                } elseif ($now > $kt) {
                    $trang_thai_text = 'Đã kết thúc';
                    $trang_thai_class = 'text-gray-400';
                } else {
                    $trang_thai_text = 'Đang diễn ra';
                    $trang_thai_class = 'text-emerald-600';
                }
            } else if ($km['trang_thai'] == 2) {
                $trang_thai_text = 'Đã kết thúc';
                $trang_thai_class = 'text-gray-400';
            }

            $muc_giam_text = $km['gia_tri_giam'];
            if ($km['kieu_giam'] == 'phan_tram') $muc_giam_text = '-' . $km['gia_tri_giam'] . '%';
            else if ($km['kieu_giam'] == 'so_tien') $muc_giam_text = '-' . number_format($km['gia_tri_giam']) . 'đ';
            else $muc_giam_text = number_format($km['gia_tri_giam']) . 'đ';

            $loai_km_text = 'Flash Sale';
            if ($km['loai_km'] == 'percent') $loai_km_text = 'Giảm thông thường';
            if ($km['loai_km'] == 'clearance') $loai_km_text = 'Xả kho';
            if ($km['loai_km'] == 'bundle') $loai_km_text = 'Combo';

            $sp_hien_thi = [];
            if ($km['so_luong_san_pham'] > 1) {
                $sp_hien_thi = [
                    'nhieu_sp' => true,
                    'so_luong' => $km['so_luong_san_pham'],
                    'loai' => 'Nhiều sản phẩm'
                ];
            } else if ($km['san_pham_demo']) {
                $hinh_anh = $km['san_pham_demo']['hinh_anh_chinh'];
                if (strpos($hinh_anh, 'http') === false) {
                    $hinh_anh = APP_URL . '/' . $hinh_anh;
                }
                $sp_hien_thi = [
                    'hinh_anh' => $hinh_anh,
                    'ten_sp' => $km['san_pham_demo']['ten_sp'],
                    'ma_sp' => $km['san_pham_demo']['ma_sp']
                ];
            } else {
                 $sp_hien_thi = [
                    'nhieu_sp' => true,
                    'so_luong' => 0,
                    'loai' => 'Chưa có sản phẩm'
                ];
            }

            $formatted_list[] = [
                'id' => $km['id'],
                'ma_km' => $km['ma_km'],
                'ten_chuong_trinh' => $km['ten_chuong_trinh'],
                'loai_km' => $loai_km_text,
                'san_pham' => $sp_hien_thi,
                'muc_giam' => [
                    'kieu' => $km['kieu_giam'],
                    'gia_tri' => $muc_giam_text,
                    'gia_goc' => $km['san_pham_demo'] ? number_format($km['san_pham_demo']['gia_ban']) . 'đ' : null,
                    'gia_sale' => null 
                ],
                'thoi_gian' => [
                    'chi_tiet' => date('d/m/Y', strtotime($km['ngay_bat_dau'])) . ' - ' . date('d/m/Y', strtotime($km['ngay_ket_thuc'])),
                    'trang_thai' => $trang_thai_text,
                    'class' => $trang_thai_class
                ],
                'so_luong' => [
                    'tong' => $km['gioi_han_tong'],
                    'da_ban' => $km['da_su_dung']
                ],
                'doanh_thu' => '0đ',
                'trang_thai' => $trang_thai_text,
                'nguoi_tao' => $km['nguoi_tao_ten'] ?? 'Hệ thống',
                'ngay_tao' => date('d/m/Y', strtotime($km['ngay_tao']))
            ];
        }

        $data = [
            'tieu_de' => 'Khuyến mãi sản phẩm - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'khuyen_mai',
            'thong_ke' => $thong_ke,
            'danh_sach' => $formatted_list,
            'danh_muc_list' => $danh_muc_list,
            'filters' => $filters,
            'pagination' => [
                'current' => $page,
                'limit' => $limit,
                'total_records' => $total,
                'total_pages' => max(1, ceil($total / $limit))
            ]
        ];

        $this->view('admin_khuyen_mai', $data, 'admin');
    }

    public function taoMoi() {
        $data = [
            'tieu_de' => 'Thêm khuyến mãi - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'khuyen_mai',
            'is_edit' => false
        ];
        $this->view('admin_khuyen_mai_form', $data, 'admin');
    }

    public function luu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'ten_chuong_trinh' => $_POST['ten_chuong_trinh'] ?? '',
                    'ma_km' => !empty($_POST['ma_km']) ? $_POST['ma_km'] : null,
                    'loai_km' => $_POST['loai_km'] ?? 'percent',
                    'kieu_giam' => $_POST['kieu_giam'] ?? 'phan_tram',
                    'gia_tri_giam' => str_replace(',', '', $_POST['gia_tri_giam'] ?? 0),
                    'ngay_bat_dau' => $_POST['ngay_bat_dau'] ?? '',
                    'ngay_ket_thuc' => $_POST['ngay_ket_thuc'] ?? '',
                    'gioi_han_tong' => !empty($_POST['gioi_han_tong']) ? $_POST['gioi_han_tong'] : -1,
                    'gioi_han_khach' => !empty($_POST['gioi_han_khach']) ? $_POST['gioi_han_khach'] : -1,
                    'hien_thi_badge' => isset($_POST['hien_thi_badge']) ? 1 : 0,
                    'hien_thi_countdown' => isset($_POST['hien_thi_countdown']) ? 1 : 0,
                    'hien_thi_progress' => isset($_POST['hien_thi_progress']) ? 1 : 0,
                    'trang_thai' => isset($_POST['draft']) ? 0 : 1,
                    'nguoi_tao' => $_SESSION['user']['id'] ?? null
                ];

                $products = json_decode($_POST['products'] ?? '[]', true);

                $this->khuyenMaiModel->create($data, $products);

                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                    echo json_encode(['success' => true, 'message' => 'Thêm thành công']);
                    exit;
                }

                $_SESSION['flash_message'] = "Thêm chương trình khuyến mãi thành công!";
                $_SESSION['flash_type'] = "success";
                
                header("Location: " . APP_URL . "/admin/khuyen-mai");
                exit;
            } catch (\Exception $e) {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                    exit;
                }
                $_SESSION['flash_message'] = "Lỗi: " . $e->getMessage();
                $_SESSION['flash_type'] = "error";
                header("Location: " . APP_URL . "/admin/khuyen-mai/them");
                exit;
            }
        }
    }

    public function trangCapNhat($id) {
        $promo = $this->khuyenMaiModel->getById($id);
        if (!$promo) {
            header("Location: " . APP_URL . "/admin/khuyen-mai");
            exit;
        }

        $data = [
            'tieu_de' => 'Sửa khuyến mãi - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'khuyen_mai',
            'is_edit' => true,
            'mock_data' => $promo
        ];
        $this->view('admin_khuyen_mai_form', $data, 'admin');
    }

    public function capNhat($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'ten_chuong_trinh' => $_POST['ten_chuong_trinh'],
                    'loai_km' => $_POST['loai_km'],
                    'kieu_giam' => $_POST['kieu_giam'],
                    'gia_tri_giam' => str_replace(',', '', $_POST['gia_tri_giam']),
                    'ngay_bat_dau' => $_POST['ngay_bat_dau'],
                    'ngay_ket_thuc' => $_POST['ngay_ket_thuc'],
                    'gioi_han_tong' => !empty($_POST['gioi_han_tong']) ? $_POST['gioi_han_tong'] : -1,
                    'gioi_han_khach' => !empty($_POST['gioi_han_khach']) ? $_POST['gioi_han_khach'] : -1,
                    'hien_thi_badge' => isset($_POST['hien_thi_badge']) ? 1 : 0,
                    'hien_thi_countdown' => isset($_POST['hien_thi_countdown']) ? 1 : 0,
                    'hien_thi_progress' => isset($_POST['hien_thi_progress']) ? 1 : 0,
                    'trang_thai' => isset($_POST['draft']) ? 0 : 1,
                ];

                $products = isset($_POST['products']) ? json_decode($_POST['products'], true) : null;

                $this->khuyenMaiModel->update($id, $data, $products);

                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                    echo json_encode(['success' => true, 'message' => 'Cập nhật thành công']);
                    exit;
                }

                $_SESSION['flash_message'] = "Cập nhật chương trình khuyến mãi thành công!";
                $_SESSION['flash_type'] = "success";
                
                header("Location: " . APP_URL . "/admin/khuyen-mai");
                exit;
            } catch (\Exception $e) {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                    exit;
                }
                $_SESSION['flash_message'] = "Lỗi: " . $e->getMessage();
                $_SESSION['flash_type'] = "error";
                header("Location: " . APP_URL . "/admin/khuyen-mai/sua/" . $id);
                exit;
            }
        }
    }

    public function xoa($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->khuyenMaiModel->delete($id);
            echo json_encode(['success' => true]);
        }
    }

    public function thayDoiTrangThai($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get raw POST body
            $input = json_decode(file_get_contents('php://input'), true);
            $status = $input['status'] ?? ($_POST['status'] ?? 0);
            $this->khuyenMaiModel->updateStatus($id, $status);
            echo json_encode(['success' => true]);
        }
    }

    public function nhanBan($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $promo = $this->khuyenMaiModel->getById($id);
                if (!$promo) throw new \Exception("Không tìm thấy chương trình");
                
                $data = [
                    'ten_chuong_trinh' => $promo['ten_chuong_trinh'] . ' (Bản sao)',
                    'ma_km' => $promo['ma_km'] . '_' . time(),
                    'loai_km' => $promo['loai_km'],
                    'kieu_giam' => $promo['kieu_giam'],
                    'gia_tri_giam' => $promo['gia_tri_giam'],
                    'ngay_bat_dau' => $promo['ngay_bat_dau'],
                    'ngay_ket_thuc' => $promo['ngay_ket_thuc'],
                    'gioi_han_tong' => $promo['gioi_han_tong'],
                    'gioi_han_khach' => $promo['gioi_han_khach'],
                    'hien_thi_badge' => $promo['hien_thi_badge'],
                    'hien_thi_countdown' => $promo['hien_thi_countdown'],
                    'hien_thi_progress' => $promo['hien_thi_progress'],
                    'trang_thai' => 0, // Nháp
                    'nguoi_tao' => $_SESSION['user']['id'] ?? null
                ];
                
                $products = [];
                if (!empty($promo['san_pham_ap_dung'])) {
                    foreach ($promo['san_pham_ap_dung'] as $sp) {
                        $products[] = $sp['id'];
                    }
                }

                $this->khuyenMaiModel->create($data, $products);
                echo json_encode(['success' => true]);
            } catch (\Exception $e) {
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
        }
    }

    // API search product for the modal
    public function searchProducts() {
        $keyword = $_GET['q'] ?? '';
        $db = \App\Core\Database::getInstance()->getConnection();
        
        $sql = "SELECT id, ma_sp, ten_sp, gia_ban, hinh_anh_chinh, tong_ton_kho 
                FROM san_pham 
                WHERE (ten_sp LIKE :keyword1 OR ma_sp LIKE :keyword2) AND trang_thai = 1 
                LIMIT 20";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':keyword1' => "%$keyword%",
            ':keyword2' => "%$keyword%"
        ]);
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($products as $sp) {
            $result[] = [
                'id' => $sp['id'],
                'ma_sp' => $sp['ma_sp'],
                'ten_sp' => $sp['ten_sp'],
                'gia_ban' => $sp['gia_ban'],
                'hinh_anh_chinh' => APP_URL . '/' . $sp['hinh_anh_chinh'],
                'tong_ton_kho' => $sp['tong_ton_kho']
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    public function apiChiTiet($id) {
        $promo = $this->khuyenMaiModel->getById($id);
        if (!$promo) {
            header('Content-Type: application/json');
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy']);
            exit;
        }

        // Tính toán thống kê doanh thu, số lượng đã bán
        $so_luong_da_ban = 0;
        $doanh_thu = 0;
        $tong_tien_da_giam = 0;

        foreach ($promo['san_pham_ap_dung'] as &$sp) {
            $da_ban = (int)($sp['so_luong_da_ban'] ?? 0);
            $so_luong_da_ban += $da_ban;
            
            $gia_goc = (float)$sp['gia_ban'];
            $muc_giam = (float)$promo['gia_tri_giam'];
            $gia_sale = $gia_goc;
            
            if ($promo['kieu_giam'] == 'phan_tram') {
                $gia_sale = $gia_goc - ($gia_goc * $muc_giam / 100);
            } else if ($promo['kieu_giam'] == 'so_tien') {
                $gia_sale = max(0, $gia_goc - $muc_giam);
            } else {
                $gia_sale = $muc_giam;
            }

            $sp['gia_sau_giam'] = $gia_sale;
            $sp['hinh_anh_chinh'] = (strpos($sp['hinh_anh_chinh'], 'http') === 0) ? $sp['hinh_anh_chinh'] : APP_URL . '/' . $sp['hinh_anh_chinh'];

            if ($da_ban > 0) {
                $doanh_thu += $gia_sale * $da_ban;
                $tong_tien_da_giam += ($gia_goc - $gia_sale) * $da_ban;
            }
        }

        $now = time();
        $bd = strtotime($promo['ngay_bat_dau']);
        $kt = strtotime($promo['ngay_ket_thuc']);
        
        if ($promo['trang_thai'] == 0) {
            $trang_thai_text = 'Bản nháp';
            $trang_thai_class = 'bg-gray-100 text-gray-600 border-gray-200';
        } else if ($promo['trang_thai'] == 1) {
            if ($now < $bd) {
                $trang_thai_text = 'Sắp bắt đầu';
                $trang_thai_class = 'bg-blue-50 text-blue-700 border-blue-200';
            } elseif ($now > $kt) {
                $trang_thai_text = 'Đã kết thúc';
                $trang_thai_class = 'bg-gray-50 text-gray-600 border-gray-200';
            } else {
                $trang_thai_text = 'Đang diễn ra';
                $trang_thai_class = 'bg-emerald-50 text-emerald-700 border-emerald-200';
            }
        } else {
            $trang_thai_text = 'Đã kết thúc';
            $trang_thai_class = 'bg-gray-50 text-gray-600 border-gray-200';
        }

        $loai_km_text = 'Flash Sale';
        if ($promo['loai_km'] == 'percent') $loai_km_text = 'Giảm thông thường';
        if ($promo['loai_km'] == 'clearance') $loai_km_text = 'Xả kho';
        if ($promo['loai_km'] == 'bundle') $loai_km_text = 'Combo';

        $data = [
            'id' => $promo['id'],
            'ma_km' => $promo['ma_km'],
            'ten_chuong_trinh' => $promo['ten_chuong_trinh'],
            'loai_km' => $loai_km_text,
            'thoi_gian' => date('d/m/Y', $bd) . ' - ' . date('d/m/Y', $kt),
            'trang_thai_text' => $trang_thai_text,
            'trang_thai_class' => $trang_thai_class,
            'so_luong_da_ban' => $so_luong_da_ban,
            'gioi_han_tong' => $promo['gioi_han_tong'],
            'doanh_thu' => number_format($doanh_thu) . 'đ',
            'tong_tien_da_giam' => number_format($tong_tien_da_giam) . 'đ',
            'nguoi_tao' => $promo['nguoi_tao_ten'] ?? 'Hệ thống',
            'ngay_tao' => date('d/m/Y H:i', strtotime($promo['ngay_tao'])),
            'san_pham' => $promo['san_pham_ap_dung']
        ];

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $data]);
        exit;
    }
}
