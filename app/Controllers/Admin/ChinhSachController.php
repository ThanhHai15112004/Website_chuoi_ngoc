<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\ChinhSachModel;
use Exception;

class ChinhSachController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ChinhSachModel();
    }

    /**
     * Trang danh sách chính sách
     * GET /admin/chinh-sach
     * Params: tab, loai, vi_tri, search, page
     */
    public function index()
    {
        $tab    = $_GET['tab'] ?? 'all';
        $loai   = $_GET['loai'] ?? '';
        $viTri  = $_GET['vi_tri'] ?? '';
        $search = $_GET['search'] ?? '';
        $page   = max(1, (int)($_GET['page'] ?? 1));
        $limit  = 10;
        $offset = ($page - 1) * $limit;

        // Lấy danh sách với filter
        $result = $this->model->layDanhSach([
            'tab'    => $tab,
            'loai'   => $loai,
            'vi_tri' => $viTri,
            'search' => $search,
        ], $limit, $offset);

        $policies   = $result['data'];
        $total      = $result['total'];
        $totalPages = max(1, ceil($total / $limit));

        // Thống kê cho stats cards
        $stats = $this->model->thongKe();

        $this->view('admin_chinh_sach', [
            'title'        => 'Chính sách cửa hàng',
            'current_page' => 'chinh_sach',
            'policies'     => $policies,
            'stats'        => $stats,
            'total'        => $total,
            'page'         => $page,
            'totalPages'   => $totalPages,
            'limit'        => $limit,
            'tab'          => $tab,
            'loai'         => $loai,
            'vi_tri'       => $viTri,
            'search'       => $search,
        ], 'admin');
    }

    /**
     * Trang thêm mới chính sách
     * GET /admin/chinh-sach/them
     */
    public function taoMoi()
    {
        $this->view('admin_chinh_sach_form', [
            'title'        => 'Thêm chính sách',
            'current_page' => 'chinh_sach',
            'policy'       => null,
            'mode'         => 'create',
        ], 'admin');
    }

    /**
     * Trang chỉnh sửa chính sách
     * GET /admin/chinh-sach/sua/{id}
     */
    public function trangCapNhat($id)
    {
        $policy = $this->model->layChiTiet($id);
        if (!$policy) {
            header('Location: ' . APP_URL . '/admin/chinh-sach');
            exit;
        }

        $this->view('admin_chinh_sach_form', [
            'title'        => 'Sửa chính sách',
            'current_page' => 'chinh_sach',
            'policy'       => $policy,
            'mode'         => 'edit',
            'id'           => $id,
        ], 'admin');
    }

    /**
     * API Lưu chính sách (thêm mới / cập nhật)
     * POST /admin/chinh-sach/api/luu
     */
    public function apiLuu()
    {
        header('Content-Type: application/json');
        try {
            $id         = $_POST['id'] ?? '';
            $isEdit     = !empty($id);
            $ten        = trim($_POST['ten'] ?? '');
            $loai       = $_POST['loai'] ?? '';
            $slug       = trim($_POST['slug'] ?? '');
            $moTaNgan   = trim($_POST['mo_ta_ngan'] ?? '');
            $noiDung    = $_POST['noi_dung'] ?? '';
            $viTri      = $_POST['vi_tri'] ?? [];
            $trangThai  = $_POST['trang_thai'] ?? 'ban_nhap';
            $seoTitle   = trim($_POST['seo_title'] ?? '');
            $seoDesc    = trim($_POST['seo_description'] ?? '');

            // Validate bắt buộc
            if (empty($ten)) {
                throw new Exception('Vui lòng nhập tên chính sách.');
            }
            if (empty($loai)) {
                throw new Exception('Vui lòng chọn loại chính sách.');
            }

            // Auto-generate slug nếu rỗng
            if (empty($slug)) {
                $slug = $this->taoSlug($ten);
            }

            // Kiểm tra slug unique
            $excludeId = $isEdit ? $id : null;
            if ($this->model->kiemTraSlug($slug, $excludeId)) {
                throw new Exception('Slug "' . $slug . '" đã tồn tại. Vui lòng chọn slug khác.');
            }

            // Ensure vi_tri is array
            if (!is_array($viTri)) {
                $viTri = [$viTri];
            }

            $nguoiThucHien = $_SESSION['admin_name'] ?? 'Admin';

            $data = [
                'ten'             => $ten,
                'loai'            => $loai,
                'slug'            => $slug,
                'mo_ta_ngan'      => $moTaNgan,
                'noi_dung'        => $noiDung,
                'vi_tri_hien_thi' => $viTri,
                'trang_thai'      => $trangThai,
                'seo_title'       => $seoTitle,
                'seo_description' => $seoDesc,
                'nguoi_cap_nhat'  => $nguoiThucHien,
            ];

            if ($isEdit) {
                $this->model->capNhat($id, $data);

                // Ghi lịch sử
                $this->model->themLichSu([
                    'id_chinh_sach'   => $id,
                    'hanh_dong'       => 'Cập nhật chính sách',
                    'mo_ta'           => 'Cập nhật nội dung chính sách "' . $ten . '"',
                    'nguoi_thuc_hien' => $nguoiThucHien,
                ]);

                echo json_encode(['success' => true, 'message' => 'Cập nhật chính sách thành công!', 'id' => $id]);
            } else {
                $data['nguoi_tao'] = $nguoiThucHien;
                $newId = $this->model->themMoi($data);

                // Ghi lịch sử
                $this->model->themLichSu([
                    'id_chinh_sach'   => $newId,
                    'hanh_dong'       => 'Khởi tạo chính sách',
                    'mo_ta'           => 'Tạo mới chính sách "' . $ten . '"',
                    'nguoi_thuc_hien' => $nguoiThucHien,
                ]);

                echo json_encode(['success' => true, 'message' => 'Thêm chính sách thành công!', 'id' => $newId]);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Xóa 1 chính sách
     * POST /admin/chinh-sach/api/xoa
     */
    public function apiXoa()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            if (!$id) throw new Exception("Không tìm thấy ID chính sách.");

            $this->model->xoa($id);
            echo json_encode(['success' => true, 'message' => 'Xóa chính sách thành công.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Xóa nhiều chính sách
     * POST /admin/chinh-sach/api/xoa-nhieu
     */
    public function apiXoaNhieu()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $ids = $input['ids'] ?? [];
            if (empty($ids)) throw new Exception("Chưa chọn chính sách nào.");

            $this->model->xoaNhieu($ids);
            echo json_encode(['success' => true, 'message' => 'Đã xóa ' . count($ids) . ' chính sách.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Toggle trạng thái 1 chính sách
     * POST /admin/chinh-sach/api/trang-thai
     */
    public function apiTrangThai()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            $trangThai = $input['trang_thai'] ?? '';
            if (!$id || !$trangThai) throw new Exception("Dữ liệu không hợp lệ.");

            $this->model->doiTrangThai($id, $trangThai);

            // Ghi lịch sử
            $nguoi = $_SESSION['admin_name'] ?? 'Admin';
            $tenTT = ChinhSachModel::tenTrangThai($trangThai);
            $this->model->themLichSu([
                'id_chinh_sach'   => $id,
                'hanh_dong'       => 'Đổi trạng thái → ' . $tenTT,
                'mo_ta'           => 'Chuyển trạng thái sang "' . $tenTT . '"',
                'nguoi_thuc_hien' => $nguoi,
            ]);

            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Toggle trạng thái nhiều chính sách
     * POST /admin/chinh-sach/api/trang-thai-nhieu
     */
    public function apiTrangThaiNhieu()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $ids = $input['ids'] ?? [];
            $trangThai = $input['trang_thai'] ?? '';
            if (empty($ids) || !$trangThai) throw new Exception("Dữ liệu không hợp lệ.");

            $this->model->doiTrangThaiNhieu($ids, $trangThai);
            $tenTT = ChinhSachModel::tenTrangThai($trangThai);
            echo json_encode(['success' => true, 'message' => 'Đã cập nhật ' . count($ids) . ' chính sách → ' . $tenTT]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Nhân bản chính sách
     * POST /admin/chinh-sach/api/nhan-ban
     */
    public function apiNhanBan()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            if (!$id) throw new Exception("Không tìm thấy ID chính sách.");

            $newId = $this->model->nhanBan($id);
            if (!$newId) throw new Exception("Nhân bản thất bại.");

            // Ghi lịch sử
            $nguoi = $_SESSION['admin_name'] ?? 'Admin';
            $this->model->themLichSu([
                'id_chinh_sach'   => $newId,
                'hanh_dong'       => 'Nhân bản từ chính sách #' . $id,
                'mo_ta'           => 'Nhân bản từ chính sách gốc ID=' . $id,
                'nguoi_thuc_hien' => $nguoi,
            ]);

            echo json_encode(['success' => true, 'message' => 'Nhân bản thành công!', 'id' => $newId]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Lấy chi tiết (cho quick view drawer)
     * GET /admin/chinh-sach/api/chi-tiet/{id}
     */
    public function apiChiTiet($id)
    {
        header('Content-Type: application/json');
        try {
            $policy = $this->model->layChiTiet($id);
            if (!$policy) throw new Exception("Không tìm thấy chính sách.");

            $lichSu = $this->model->layLichSu($id);

            echo json_encode([
                'success'  => true,
                'policy'   => $policy,
                'lich_su'  => $lichSu,
                'trang_thai_text' => ChinhSachModel::tenTrangThai($policy['trang_thai']),
            ], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Helper: Tạo slug từ tiếng Việt
     */
    private function taoSlug($str)
    {
        $str = mb_strtolower($str, 'UTF-8');
        // Chuyển đổi tiếng Việt
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/u", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/u", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/u", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/u", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/u", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/u", 'y', $str);
        $str = preg_replace("/(đ)/u", 'd', $str);
        $str = preg_replace('/[^a-z0-9\s]/', '', $str);
        $str = preg_replace('/\s+/', '-', trim($str));
        return $str;
    }
}
