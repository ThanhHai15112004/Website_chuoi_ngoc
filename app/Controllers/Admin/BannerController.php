<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\BannerModel;
use Exception;

class BannerController extends Controller
{
    private $bannerModel;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
    }

    /**
     * Hiển thị danh sách banner
     */
    public function index()
    {
        $vi_tri = $_GET['vi_tri'] ?? 'all';
        $trang_thai = $_GET['trang_thai'] ?? 'all';
        $search = $_GET['search'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;

        $allBanners = $this->bannerModel->getAll();

        $stats = [
            'total' => count($allBanners),
            'dang_hien_thi' => 0,
            'nhap' => 0,
            'sap_hien_thi' => 0,
            'het_han' => 0,
            'thieu_cau_hinh' => 0,
            'vi_tri' => [
                'slider_chinh' => 0,
                'banner_phu' => 0,
                'khuyen_mai' => 0,
                'san_pham' => 0,
                'chi_tiet_sp' => 0,
                'bai_viet' => 0,
                'vong_sinh_menh' => 0,
                'footer' => 0,
            ]
        ];

        $filteredBanners = [];

        foreach ($allBanners as &$b) {
            // Xác định trạng thái thực tế
            $real_status = 'nhap';
            if ($b['trang_thai'] === 'dang_hien_thi') {
                $now = date('Y-m-d H:i:s');
                if (!$b['khong_gioi_han']) {
                    if ($b['bat_dau'] && $now < $b['bat_dau']) {
                        $real_status = 'sap_hien_thi';
                    } elseif ($b['ket_thuc'] && $now > $b['ket_thuc']) {
                        $real_status = 'het_han';
                    } else {
                        $real_status = 'dang_hien_thi';
                    }
                } else {
                    $real_status = 'dang_hien_thi';
                }
                
                // Bổ sung trạng thái thiếu cấu hình
                if (empty($b['anh_desktop']) || empty($b['link'])) {
                    $real_status = 'thieu_cau_hinh';
                }
            }
            
            $b['trang_thai_hien_thi'] = $real_status;
            
            // Tính stats
            if (isset($stats[$real_status])) $stats[$real_status]++;
            if (isset($stats['vi_tri'][$b['vi_tri']])) $stats['vi_tri'][$b['vi_tri']]++;
            
            // Filter Logic
            $matchViTri = ($vi_tri === 'all' || $b['vi_tri'] === $vi_tri);
            $matchTrangThai = ($trang_thai === 'all' || $real_status === $trang_thai);
            $matchSearch = empty($search) || (stripos($b['ten'], $search) !== false) || (stripos($b['link'], $search) !== false);
            
            if ($matchViTri && $matchTrangThai && $matchSearch) {
                $filteredBanners[] = $b;
            }
        }

        $totalFiltered = count($filteredBanners);
        $totalPages = ceil($totalFiltered / $limit);
        $offset = ($page - 1) * $limit;
        $paginatedBanners = array_slice($filteredBanners, $offset, $limit);

        $this->view('admin_banner', [
            'banners' => $paginatedBanners,
            'stats' => $stats,
            'total_filtered' => $totalFiltered,
            'current_page_num' => $page,
            'total_pages' => $totalPages,
            'limit' => $limit,
            'tieu_de' => 'Quản lý banner',
            'current_page' => 'banner',
            'vi_tri' => $vi_tri,
            'trang_thai' => $trang_thai,
            'search' => $search
        ], 'admin');
    }

    /**
     * Hiển thị form thêm mới banner
     */
    public function taoMoi()
    {
        $this->view('admin_banner_form', [
            'mode' => 'create',
            'banner' => null,
            'tieu_de' => 'Thêm banner mới',
            'current_page' => 'them_banner'
        ], 'admin');
    }

    /**
     * Hiển thị form sửa banner
     */
    public function trangCapNhat($id)
    {
        $banner = $this->bannerModel->getById($id);
        if (!$banner) {
            header('Location: ' . APP_URL . '/admin/banner');
            exit;
        }

        // Tách ngày và giờ cho form HTML
        if ($banner['bat_dau']) {
            $banner['gio_bat_dau'] = date('H:i', strtotime($banner['bat_dau']));
            $banner['bat_dau'] = date('Y-m-d', strtotime($banner['bat_dau']));
        }
        if ($banner['ket_thuc']) {
            $banner['gio_ket_thuc'] = date('H:i', strtotime($banner['ket_thuc']));
            $banner['ket_thuc'] = date('Y-m-d', strtotime($banner['ket_thuc']));
        }

        $this->view('admin_banner_form', [
            'mode' => 'edit',
            'banner' => $banner,
            'tieu_de' => 'Chỉnh sửa banner',
            'current_page' => 'sua_banner'
        ], 'admin');
    }

    /**
     * API Xử lý lưu (Thêm mới/Cập nhật)
     */
    public function apiLuuBanner()
    {
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'] ?? '';
            $isEdit = !empty($id);
            
            $ten = $_POST['ten'] ?? '';
            $tieu_de_hien_thi = $_POST['tieu_de_hien_thi'] ?? '';
            $cta = $_POST['cta'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $vi_tri = $_POST['vi_tri'] ?? '';
            $thiet_bi = $_POST['thiet_bi'] ?? 'desktop_mobile';
            $loai_link = $_POST['loai_link'] ?? '';
            $link = $_POST['link'] ?? '';
            $thu_tu = $_POST['thu_tu'] ?? 1;
            $trang_thai = $_POST['trang_thai'] ?? 'nhap';
            $khong_gioi_han = isset($_POST['khong_gioi_han']) ? 1 : 0;
            
            $bat_dau = null;
            if (!$khong_gioi_han && !empty($_POST['bat_dau'])) {
                $bat_dau = $_POST['bat_dau'] . ' ' . ($_POST['gio_bat_dau'] ?? '00:00') . ':00';
            }
            
            $ket_thuc = null;
            if (!$khong_gioi_han && !empty($_POST['ket_thuc'])) {
                $ket_thuc = $_POST['ket_thuc'] . ' ' . ($_POST['gio_ket_thuc'] ?? '23:59') . ':59';
            }

            if (empty($ten) || empty($vi_tri) || empty($link)) {
                throw new Exception('Vui lòng điền đủ thông tin bắt buộc.');
            }

            // Xử lý upload ảnh
            $uploadDir = __DIR__ . '/../../../../public/uploads/banners/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            
            $anh_desktop = $_POST['old_anh_desktop'] ?? '';
            if (isset($_FILES['anh_desktop']) && $_FILES['anh_desktop']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['anh_desktop']['name'], PATHINFO_EXTENSION);
                $filename = 'desktop_' . time() . '_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES['anh_desktop']['tmp_name'], $uploadDir . $filename)) {
                    $anh_desktop = APP_URL . '/public/uploads/banners/' . $filename;
                }
            }

            $anh_mobile = $_POST['old_anh_mobile'] ?? '';
            if (isset($_FILES['anh_mobile']) && $_FILES['anh_mobile']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['anh_mobile']['name'], PATHINFO_EXTENSION);
                $filename = 'mobile_' . time() . '_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES['anh_mobile']['tmp_name'], $uploadDir . $filename)) {
                    $anh_mobile = APP_URL . '/public/uploads/banners/' . $filename;
                }
            }

            if (!$isEdit && empty($anh_desktop)) {
                throw new Exception('Ảnh Desktop là bắt buộc.');
            }

            $data = [
                'ten' => $ten,
                'tieu_de_hien_thi' => $tieu_de_hien_thi,
                'cta' => $cta,
                'mo_ta' => $mo_ta,
                'anh_desktop' => $anh_desktop,
                'anh_mobile' => $anh_mobile,
                'vi_tri' => $vi_tri,
                'thiet_bi' => $thiet_bi,
                'loai_link' => $loai_link,
                'link' => $link,
                'thu_tu' => $thu_tu,
                'trang_thai' => $trang_thai,
                'khong_gioi_han' => $khong_gioi_han,
                'bat_dau' => $bat_dau,
                'ket_thuc' => $ket_thuc,
                'ngay_cap_nhat' => date('Y-m-d H:i:s')
            ];

            if ($isEdit) {
                $this->bannerModel->update($id, $data);
                echo json_encode(['success' => true, 'message' => 'Cập nhật banner thành công!']);
            } else {
                $data['id'] = uniqid('bn_');
                $data['ngay_tao'] = date('Y-m-d H:i:s');
                $this->bannerModel->create($data);
                echo json_encode(['success' => true, 'message' => 'Thêm banner mới thành công!']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Xóa banner
     */
    public function apiXoa()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            if (!$id) throw new Exception("Không tìm thấy ID banner");
            
            $this->bannerModel->delete($id);
            echo json_encode(['success' => true, 'message' => 'Xóa banner thành công']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Cập nhật trạng thái
     */
    public function apiTrangThai()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            $status = $input['trang_thai'] ?? '';
            if (!$id || !$status) throw new Exception("Dữ liệu không hợp lệ");
            
            $this->bannerModel->updateStatus($id, $status);
            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
