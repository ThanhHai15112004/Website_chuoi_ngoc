<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class ThongBaoController extends Controller {
    public function index() {
        $model = new \App\Models\Admin\ThongBaoModel();
        $rawNotifications = $model->getAdminNotifications();

        $notifications = [];
        foreach ($rawNotifications as $raw) {
            $icon = 'mdi:bell-outline';
            $colorClass = 'bg-gray-100 text-gray-600';
            
            // Map icon and color based on loai_thong_bao
            switch ($raw['loai_thong_bao']) {
                case 'don_hang':
                    $icon = 'mdi:receipt-text-outline';
                    $colorClass = 'bg-blue-100 text-blue-600';
                    break;
                case 'he_thong':
                    $icon = 'mdi:shield-alert-outline';
                    $colorClass = 'bg-red-100 text-red-600';
                    break;
                case 'danh_gia':
                    $icon = 'mdi:star-circle-outline';
                    $colorClass = 'bg-amber-100 text-amber-600';
                    break;
                case 'tai_khoan':
                    $icon = 'mdi:account-plus-outline';
                    $colorClass = 'bg-emerald-100 text-emerald-600';
                    break;
                case 'kho':
                    $icon = 'mdi:package-variant-closed';
                    $colorClass = 'bg-orange-100 text-orange-600';
                    break;
            }

            $notifications[] = [
                'id' => $raw['id'],
                'tieu_de' => $raw['tieu_de'],
                'noi_dung' => $raw['noi_dung'],
                'loai' => $raw['loai_thong_bao'],
                'nguoi_gui' => 'Hệ thống', // or fetch from user if it's from a user
                'thoi_gian' => date('H:i d/m/Y', strtotime($raw['ngay_tao'])),
                'da_doc' => (bool)$raw['da_doc'],
                'icon' => $icon,
                'color_class' => $colorClass,
                'link' => $raw['link'] ?? '#'
            ];
        }

        $data = [
            'tieu_de' => 'Hộp thư & Thông báo',
            'current_page' => 'hop_thu',
            'notifications' => $notifications
        ];
        $this->view('admin_thong_bao', $data, 'admin');
    }

    public function taoMoi() {
        $data = [
            'tieu_de' => 'Tạo thông báo mới - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'hop_thu',
            'is_edit' => false,
        ];
        $this->view('admin_thong_bao_form', $data, 'admin');
    }

    public function luuMoi() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input || empty($input['tieu_de']) || empty($input['noi_dung']) || empty($input['loai_thong_bao'])) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            return;
        }

        $model = new \App\Models\Admin\ThongBaoModel();
        $targetType = $input['target_type'] ?? 'all';

        try {
            if ($targetType === 'internal') {
                // Admin notification
                $model->themMoi([
                    'id_nguoi_dung' => null,
                    'tieu_de' => $input['tieu_de'],
                    'noi_dung' => $input['noi_dung'],
                    'loai_thong_bao' => $input['loai_thong_bao'],
                    'link' => $input['link'] ?? null
                ]);
            } else {
                // Fetch users based on target type
                $userModel = new \App\Models\Admin\KhachHangModel();
                $userIds = [];

                if ($targetType === 'all') {
                    $users = $userModel->layTatCa();
                    $userIds = array_column($users, 'id');
                } elseif ($targetType === 'specific') {
                    $userIds = $input['specific_users'] ?? [];
                } elseif ($targetType === 'group') {
                    // Logic to fetch users by group/rank... omitted for brevity, assuming specific_users holds them
                    $userIds = $input['specific_users'] ?? []; 
                }

                if (empty($userIds)) {
                    echo json_encode(['success' => false, 'message' => 'Không tìm thấy người dùng mục tiêu']);
                    return;
                }

                $model->insertMultiple($userIds, [
                    'tieu_de' => $input['tieu_de'],
                    'noi_dung' => $input['noi_dung'],
                    'loai_thong_bao' => $input['loai_thong_bao'],
                    'link' => $input['link'] ?? null
                ]);
            }

            echo json_encode(['success' => true, 'message' => 'Gửi thông báo thành công']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    public function markAsRead() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $ids = $input['ids'] ?? [];
        $status = $input['status'] ?? 1; // 1 = read, 0 = unread

        if (empty($ids)) {
            echo json_encode(['success' => false, 'message' => 'Chưa chọn thông báo']);
            return;
        }

        $model = new \App\Models\Admin\ThongBaoModel();
        foreach ($ids as $id) {
            if ($status == 1) {
                $model->markAsRead($id);
            } else {
                $model->markAsUnread($id);
            }
        }
        
        echo json_encode(['success' => true]);
    }

    public function markAllAsRead() {
        header('Content-Type: application/json');
        $model = new \App\Models\Admin\ThongBaoModel();
        $model->markAllAsRead(true); // true = admin inbox
        echo json_encode(['success' => true]);
    }

    public function xoa() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $ids = $input['ids'] ?? [];

        if (empty($ids)) {
            echo json_encode(['success' => false, 'message' => 'Chưa chọn thông báo']);
            return;
        }

        $model = new \App\Models\Admin\ThongBaoModel();
        foreach ($ids as $id) {
            $model->xoa($id);
        }
        
        echo json_encode(['success' => true]);
    }
}
