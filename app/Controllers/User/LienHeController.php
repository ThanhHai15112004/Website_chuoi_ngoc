<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\ThuDienTuService;
use App\Services\ThongBaoService;

class LienHeController extends Controller
{
    public function index()
    {
        $lienHeService = new \App\Services\User\LienHeService();
        $cau_hinh = $lienHeService->getThongTinCuaHang();

        $data = [
            'tieu_de' => 'Liên Hệ - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'lien_he',
            'cau_hinh' => $cau_hinh
        ];
        
        $this->view('lien_he', $data);
    }

    /**
     * Xử lý form liên hệ (POST)
     */
    public function submit()
    {
        header('Content-Type: application/json');

        // Note: JS fetch is going to send JSON data instead of form data, so we should decode it
        // Or if it's form data, we check $_POST. Let's support both.
        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

        $ho_ten = trim($input['name'] ?? '');
        $email = trim($input['email'] ?? '');
        $so_dien_thoai = trim($input['phone'] ?? '');
        $tieu_de = trim($input['subject'] ?? 'Liên hệ mới');
        $noi_dung = trim($input['message'] ?? '');
        $menh_nam_sinh = trim($input['destiny_year'] ?? '');
        $preferences = $input['preferences'] ?? [];

        if (empty($ho_ten) || empty($so_dien_thoai) || empty($noi_dung)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin bắt buộc.']);
            return;
        }

        $contactData = [
            'ho_ten' => $ho_ten,
            'email' => $email,
            'so_dien_thoai' => $so_dien_thoai,
            'chu_de' => $tieu_de,
            'noi_dung' => $noi_dung,
            'menh_nam_sinh' => $menh_nam_sinh,
            'kenh_lien_he' => $preferences
        ];

        try {
            $lienHeService = new \App\Services\User\LienHeService();
            $lienHeService->guiLienHe($contactData);

            // Gửi thông báo cho admin
            $notif = new ThongBaoService();
            $notif->contactReceived($ho_ten, $tieu_de);

            // Gửi email cho admin
            $adminEmail = $_ENV['EMAIL_FROM'] ?? '';
            if (!empty($adminEmail)) {
                ThuDienTuService::sendContactReceived($adminEmail, $contactData);
            }

            echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.']);
        } catch (\Exception $e) {
            error_log('[Contact] Lỗi: ' . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Đã xảy ra lỗi hệ thống, vui lòng thử lại sau.']);
        }
    }
}
