<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\MailService;
use App\Services\NotificationService;

class ContactController extends Controller
{
    public function index()
    {
        // For now, no dynamic data from DB is strictly required just to show the UI
        $data = [
            'tieu_de' => 'Liên Hệ - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'lien_he'
        ];
        
        $this->view('lien_he', $data);
    }

    /**
     * Xử lý form liên hệ (POST)
     */
    public function submit()
    {
        header('Content-Type: application/json');

        $ho_ten = trim($_POST['ho_ten'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $so_dien_thoai = trim($_POST['so_dien_thoai'] ?? '');
        $tieu_de = trim($_POST['tieu_de'] ?? 'Liên hệ mới');
        $noi_dung = trim($_POST['noi_dung'] ?? '');

        if (empty($ho_ten) || empty($email) || empty($noi_dung)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin.']);
            return;
        }

        $contactData = [
            'ho_ten' => $ho_ten,
            'email' => $email,
            'so_dien_thoai' => $so_dien_thoai,
            'tieu_de' => $tieu_de,
            'noi_dung' => $noi_dung
        ];

        try {
            // Gửi thông báo cho admin
            $notif = new NotificationService();
            $notif->contactReceived($ho_ten, $tieu_de);

            // Gửi email cho admin
            $adminEmail = $_ENV['EMAIL_FROM'] ?? '';
            if (!empty($adminEmail)) {
                MailService::sendContactReceived($adminEmail, $contactData);
            }

            echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.']);
        } catch (\Exception $e) {
            error_log('[Contact] Lỗi: ' . $e->getMessage());
            echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.']);
        }
    }
}
