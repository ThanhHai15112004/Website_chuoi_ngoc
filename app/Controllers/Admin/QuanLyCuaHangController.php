<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\CuaHangService;
use Exception;

class QuanLyCuaHangController extends Controller
{
    private $cuaHangService;

    public function __construct()
    {
        $this->cuaHangService = new CuaHangService();
    }

    /**
     * GET /admin/quan-ly-cua-hang
     * Hiển thị trang thông tin cửa hàng
     */
    public function index()
    {
        $storeConfig = $this->cuaHangService->getStoreConfig();
        $completionStatus = $this->cuaHangService->calculateCompletionStatus($storeConfig);

        // Tính danh sách cảnh báo thiếu thông tin
        $warnings = [];
        foreach ($completionStatus['missing'] as $item) {
            $warnings[] = $item['label'];
        }

        $this->view('admin_quan_ly_cua_hang', [
            'title' => 'Thông tin cửa hàng',
            'current_page' => 'thong_tin_cua_hang',
            'storeConfig' => $storeConfig,
            'completionStatus' => $completionStatus,
            'warnings' => $warnings
        ], 'admin');
    }

    /**
     * POST /admin/quan-ly-cua-hang/api/luu
     * API lưu toàn bộ cấu hình cửa hàng
     */
    public function apiLuu()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            // Thu thập dữ liệu từ POST
            $data = [];
            $configKeys = [
                'ten_cua_hang', 'thuong_hieu', 'slogan', 'mo_ta',
                'hotline_chinh', 'sdt_cskh', 'email', 'gio_lam_viec',
                'mau_thuong_hieu',
                'chi_ban_online', 'tinh_thanh', 'quan_huyen', 'phuong_xa',
                'dia_chi_chi_tiet', 'google_map_iframe',
                'zalo', 'zalo_active',
                'facebook', 'facebook_active',
                'tiktok', 'tiktok_active',
                'shopee', 'shopee_active',
                'youtube', 'youtube_active',
                'meta_title', 'meta_description', 'keywords',
                'ten_doanh_nghiep', 'ma_so_thue', 'dia_chi_dkkd', 'hien_thi_phap_ly'
            ];

            foreach ($configKeys as $key) {
                if (isset($_POST[$key])) {
                    $data[$key] = $_POST[$key];
                }
            }

            // Xử lý checkbox/toggle — nếu không có trong POST thì = 0
            $toggleKeys = [
                'chi_ban_online', 'hien_thi_phap_ly',
                'zalo_active', 'facebook_active', 'tiktok_active',
                'shopee_active', 'youtube_active'
            ];
            foreach ($toggleKeys as $tk) {
                if (!isset($_POST[$tk])) {
                    $data[$tk] = '0';
                }
            }

            // Lưu qua service
            $result = $this->cuaHangService->saveStoreConfig($data);

            if (!empty($result['errors'])) {
                echo json_encode([
                    'success' => false,
                    'message' => implode(' | ', $result['errors']),
                    'errors' => $result['errors']
                ], JSON_UNESCAPED_UNICODE);
                return;
            }

            // Lấy config mới sau khi lưu để trả về
            $newConfig = $this->cuaHangService->getStoreConfig();
            $newCompletion = $this->cuaHangService->calculateCompletionStatus($newConfig);

            echo json_encode([
                'success' => true,
                'message' => 'Đã cập nhật thông tin cửa hàng thành công!',
                'saved' => $result['saved'],
                'config' => $newConfig,
                'completion' => $newCompletion
            ], JSON_UNESCAPED_UNICODE);

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi hệ thống: ' . $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * POST /admin/quan-ly-cua-hang/api/upload-image
     * API upload ảnh (logo, favicon, social share)
     */
    public function apiUploadImage()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $type = $_POST['type'] ?? '';
            if (empty($type)) {
                throw new Exception('Thiếu tham số type (loại ảnh).');
            }

            // Kiểm tra có file không
            if (!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
                throw new Exception('Không có file nào được chọn.');
            }

            $url = $this->cuaHangService->uploadImage($_FILES['image'], $type);

            echo json_encode([
                'success' => true,
                'message' => 'Upload ảnh thành công!',
                'url' => $url,
                'type' => $type
            ], JSON_UNESCAPED_UNICODE);

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * POST /admin/quan-ly-cua-hang/api/remove-image
     * API xóa ảnh
     */
    public function apiRemoveImage()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $type = $input['type'] ?? '';

            if (empty($type)) {
                throw new Exception('Thiếu tham số type (loại ảnh).');
            }

            $result = $this->cuaHangService->removeImage($type);

            if ($result) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Đã xóa ảnh thành công!',
                    'type' => $type
                ], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception('Loại ảnh không hợp lệ.');
            }

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * GET /admin/quan-ly-cua-hang/api/load
     * API load toàn bộ cấu hình (dùng cho JS reload)
     */
    public function apiLoad()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $config = $this->cuaHangService->getStoreConfig();
            $completion = $this->cuaHangService->calculateCompletionStatus($config);

            echo json_encode([
                'success' => true,
                'config' => $config,
                'completion' => $completion
            ], JSON_UNESCAPED_UNICODE);

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi tải cấu hình: ' . $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }
}
