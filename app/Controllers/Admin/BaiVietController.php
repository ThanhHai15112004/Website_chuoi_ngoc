<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\BaiVietModel;
use App\Models\Admin\SanPhamModel;
use App\Helpers\StringHelper;
use App\Core\Database;
use Exception;

class BaiVietController extends Controller {
    private $baiVietModel;

    public function __construct() {
        $this->baiVietModel = new BaiVietModel();
    }

    public function index() {
        $params = $_GET;
        $limit = isset($params['limit']) ? (int)$params['limit'] : 10;
        $page = isset($params['page']) ? (int)$params['page'] : 1;
        $offset = ($page - 1) * $limit;

        $result = $this->baiVietModel->layDanhSach($params, $limit, $offset);
        $thongKe = $this->baiVietModel->thongKeTrangThai();
        $danhMucs = $this->baiVietModel->layTatCaDanhMuc();

        $data = [
            'tieu_de' => 'Quản lý bài viết - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'bai_viet',
            'bai_viet_list' => $result['data'],
            'thong_ke' => $thongKe,
            'danh_mucs' => $danhMucs,
            'pagination' => [
                'total' => $result['total'],
                'limit' => $limit,
                'page' => $page,
                'total_pages' => ceil($result['total'] / $limit)
            ]
        ];
        $this->view('admin_bai_viet', $data, 'admin');
    }

    public function taoMoi() {
        $danhMucs = $this->baiVietModel->layTatCaDanhMuc();
        
        $data = [
            'tieu_de' => 'Thêm bài viết mới - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'bai_viet',
            'is_edit' => false,
            'danh_mucs' => $danhMucs,
            'bai_viet' => null
        ];
        $this->view('admin_bai_viet_form', $data, 'admin');
    }

    public function trangCapNhat($id) {
        $baiViet = $this->baiVietModel->layChiTiet($id);
        if (!$baiViet) {
            $_SESSION['error'] = 'Không tìm thấy bài viết';
            header('Location: ' . APP_URL . '/admin/post');
            exit;
        }

        // Get related products details if they exist
        $san_pham_lien_quan_list = [];
        if (!empty($baiViet['san_pham_lien_quan'])) {
            $sp_ids = json_decode($baiViet['san_pham_lien_quan'], true);
            if (is_array($sp_ids) && count($sp_ids) > 0) {
                $db = Database::getInstance()->getConnection();
                $placeholders = implode(',', array_fill(0, count($sp_ids), '?'));
                $stmt = $db->prepare("SELECT id, ten_sp, hinh_anh_chinh as hinh_anh, gia_ban FROM san_pham WHERE id IN ($placeholders)");
                $stmt->execute($sp_ids);
                $san_pham_lien_quan_list = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
                foreach ($san_pham_lien_quan_list as &$sp) {
                    if (!empty($sp['hinh_anh']) && strpos($sp['hinh_anh'], 'http') !== 0) {
                        $sp['hinh_anh'] = APP_URL . '/public' . $sp['hinh_anh'];
                    }
                }
            }
        }

        $danhMucs = $this->baiVietModel->layTatCaDanhMuc();
        
        $data = [
            'tieu_de' => 'Chỉnh sửa bài viết - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'bai_viet',
            'is_edit' => true,
            'danh_mucs' => $danhMucs,
            'bai_viet' => $baiViet,
            'san_pham_lien_quan_list' => $san_pham_lien_quan_list
        ];
        $this->view('admin_bai_viet_form', $data, 'admin');
    }

    // --- API ENDPOINTS ---

    public function apiLuuBaiViet() {
        header('Content-Type: application/json');
        
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $id = $input['id'] ?? null;
            $tieu_de = trim($input['tieu_de'] ?? '');
            
            if (empty($tieu_de)) {
                echo json_encode(['success' => false, 'message' => 'Tiêu đề bài viết không được để trống.']);
                return;
            }

            $slug = trim($input['slug'] ?? '');
            if (empty($slug)) {
                $slug = StringHelper::toSlug($tieu_de);
            }
            
            // Check slug unique
            if ($this->baiVietModel->kiemTraSlugTonTai($slug, $id)) {
                $slug = $slug . '-' . time();
            }

            $data = [
                'tieu_de' => $tieu_de,
                'slug' => $slug,
                'tom_tat' => $input['tom_tat'] ?? null,
                'noi_dung' => $input['noi_dung'] ?? '',
                'hinh_anh' => $input['hinh_anh'] ?? null,
                'id_danh_muc' => $input['id_danh_muc'] ?: null,
                'tags' => $input['tags'] ?? [],
                'san_pham_lien_quan' => $input['san_pham_lien_quan'] ?? [],
                'seo_title' => $input['seo_title'] ?? null,
                'seo_description' => $input['seo_description'] ?? null,
                'trang_thai' => isset($input['trang_thai']) ? (int)$input['trang_thai'] : 0,
                'ngay_xuat_ban' => $input['ngay_xuat_ban'] ?? null
            ];

            if (empty($id)) {
                $data['id'] = uniqid('bv_');
                // Temporarily assign creator as null if no session
                $data['id_nguoi_tao'] = $_SESSION['user']['id'] ?? null; 
                $result = $this->baiVietModel->themMoi($data);
            } else {
                $result = $this->baiVietModel->capNhat($id, $data);
            }

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Lưu bài viết thành công!', 'id' => $id ?? $data['id']]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Đã có lỗi xảy ra khi lưu bài viết.']);
            }

        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function apiXoa() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;
        
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID bài viết không hợp lệ']);
            return;
        }

        try {
            $result = $this->baiVietModel->xoa($id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Đã xóa bài viết thành công']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể xóa bài viết']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    public function apiThayDoiTrangThai() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;
        $trang_thai = $input['trang_thai'] ?? null;

        if (!$id || $trang_thai === null) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            return;
        }

        try {
            $result = $this->baiVietModel->capNhat($id, ['trang_thai' => (int)$trang_thai]);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Đã cập nhật trạng thái']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể cập nhật']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    public function apiNhanBan() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID bài viết không hợp lệ']);
            return;
        }

        try {
            $baiViet = $this->baiVietModel->layChiTiet($id);
            if (!$baiViet) {
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy bài viết']);
                return;
            }

            $baiViet['id'] = uniqid('bv_');
            $baiViet['tieu_de'] = $baiViet['tieu_de'] . ' (Bản sao)';
            $baiViet['slug'] = $baiViet['slug'] . '-copy-' . time();
            $baiViet['trang_thai'] = 0; // Luôn tạo bản nháp
            $baiViet['tags'] = json_decode($baiViet['tags'], true);
            $baiViet['san_pham_lien_quan'] = json_decode($baiViet['san_pham_lien_quan'], true);
            
            $result = $this->baiVietModel->themMoi($baiViet);
            
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Đã nhân bản bài viết']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể nhân bản']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    public function apiTimKiemSanPham() {
        header('Content-Type: application/json');
        $q = $_GET['q'] ?? '';
        
        if (strlen($q) < 2) {
            echo json_encode(['success' => true, 'data' => []]);
            return;
        }

        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT id, ten_sp, hinh_anh_chinh as hinh_anh, gia_ban FROM san_pham WHERE ten_sp LIKE ? LIMIT 10");
            $stmt->execute(["%$q%"]);
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            foreach ($results as &$sp) {
                if (!empty($sp['hinh_anh']) && strpos($sp['hinh_anh'], 'http') !== 0) {
                    $sp['hinh_anh'] = APP_URL . '/public' . $sp['hinh_anh'];
                }
            }
            
            echo json_encode(['success' => true, 'data' => $results]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function apiUploadImage() {
        header('Content-Type: application/json');
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/posts/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            
            $fileInfo = pathinfo($_FILES['image']['name']);
            $ext = strtolower($fileInfo['extension']);
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (in_array($ext, $allowed)) {
                $fileName = time() . '_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $fileName)) {
                    $url = APP_URL . '/public/uploads/posts/' . $fileName;
                    echo json_encode(['success' => true, 'url' => $url]);
                    return;
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Định dạng ảnh không hợp lệ']);
                return;
            }
        }
        echo json_encode(['success' => false, 'message' => 'Tải ảnh thất bại']);
    }
}
