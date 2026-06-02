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

    public function chiTiet($id) {
        $model = new \App\Models\Admin\ThongBaoModel();
        $model->markAsRead($id);
        
        $base = defined('APP_URL') ? APP_URL : '';
        header("Location: " . $base . "/admin/notification?open_id=" . urlencode($id));
        exit;
    }

    public function taoMoi() {
        // Load dữ liệu động cho form
        $userModel = new \App\Models\Admin\KhachHangModel();
        $tongKH = $userModel->demTongKhachHang();

        // Load danh sách hạng thành viên từ DB
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmtRank = $db->prepare("SELECT id, ten_hang FROM hang_thanh_vien WHERE trang_thai = 1 ORDER BY chi_tieu_toi_thieu ASC");
        $stmtRank->execute();
        $ranks = $stmtRank->fetchAll(\PDO::FETCH_ASSOC);

        $data = [
            'tieu_de' => 'Tạo thông báo mới - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'hop_thu',
            'is_edit' => false,
            'tong_khach_hang' => $tongKH,
            'ranks' => $ranks,
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
        $link = $input['link'] ?? null;

        try {
            if ($targetType === 'internal') {
                // Admin notification
                $model->themMoi([
                    'id_nguoi_dung' => null,
                    'tieu_de' => $input['tieu_de'],
                    'noi_dung' => $input['noi_dung'],
                    'loai_thong_bao' => $input['loai_thong_bao'],
                    'link' => $link
                ]);
            } else {
                $userModel = new \App\Models\Admin\KhachHangModel();
                $userIds = [];

                if ($targetType === 'all') {
                    $users = $userModel->layTatCa();
                    $userIds = array_column($users, 'id');
                } elseif ($targetType === 'specific') {
                    $userIds = $input['specific_users'] ?? [];
                } elseif ($targetType === 'group') {
                    // Lọc theo hạng thành viên
                    $hangIds = $input['group_ranks'] ?? [];
                    if (!empty($hangIds)) {
                        $users = $userModel->layTheoHang($hangIds);
                        $userIds = array_column($users, 'id');
                    }
                }

                if (empty($userIds)) {
                    echo json_encode(['success' => false, 'message' => 'Không tìm thấy người dùng mục tiêu']);
                    return;
                }

                $model->insertMultiple($userIds, [
                    'tieu_de' => $input['tieu_de'],
                    'noi_dung' => $input['noi_dung'],
                    'loai_thong_bao' => $input['loai_thong_bao'],
                    'link' => $link
                ]);

                $soNguoi = count($userIds);
            }

            echo json_encode(['success' => true, 'message' => 'Gửi thông báo thành công' . (isset($soNguoi) ? " cho {$soNguoi} người" : '')]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    /**
     * API search khách hàng cho form thông báo (Khách cụ thể)
     */
    public function apiSearchKhachHang() {
        header('Content-Type: application/json');
        $keyword = $_GET['keyword'] ?? '';
        if (mb_strlen($keyword) < 2) {
            echo json_encode(['success' => true, 'data' => []]);
            return;
        }

        $userModel = new \App\Models\Admin\KhachHangModel();
        $results = $userModel->timKiemNhanh($keyword, 15);

        $data = array_map(function($u) {
            return [
                'id' => $u['id'],
                'ho_ten' => $u['ho_ten'],
                'sdt' => $u['sdt'] ?? '',
                'email' => $u['email'] ?? '',
                'hang' => $u['ten_hang'] ?? 'Đồng',
            ];
        }, $results);

        echo json_encode(['success' => true, 'data' => $data]);
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

    /**
     * #14: Gửi nhắc nhở voucher sắp hết hạn (Button trên admin)
     */
    public function guiNhacVoucher() {
        header('Content-Type: application/json');

        try {
            $db = \App\Core\Database::getInstance()->getConnection();

            // Tìm voucher hết hạn trong 3 ngày tới
            $stmt = $db->prepare("SELECT v.*, 
                                         DATEDIFF(v.ngay_ket_thuc, NOW()) as so_ngay_con_lai
                                  FROM voucher v 
                                  WHERE v.trang_thai = 1 
                                    AND v.ngay_ket_thuc >= NOW() 
                                    AND DATEDIFF(v.ngay_ket_thuc, NOW()) <= 3
                                  ORDER BY v.ngay_ket_thuc ASC");
            $stmt->execute();
            $vouchers = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (empty($vouchers)) {
                echo json_encode(['success' => true, 'message' => 'Không có voucher nào sắp hết hạn.', 'count' => 0]);
                return;
            }

            // Lấy tất cả khách hàng 
            $userModel = new \App\Models\Admin\KhachHangModel();
            $users = $userModel->layTatCa();

            $notif = new \App\Services\NotificationService();
            $sentCount = 0;

            foreach ($vouchers as $v) {
                $giaTriText = '';
                if ($v['loai_giam'] == 1) $giaTriText = 'Giảm ' . $v['gia_tri'] . '%';
                elseif ($v['loai_giam'] == 2) $giaTriText = 'Giảm ' . number_format($v['gia_tri'], 0, ',', '.') . 'đ';
                else $giaTriText = 'Ưu đãi';

                $voucherData = [
                    'ma_voucher' => $v['ma_voucher'],
                    'gia_tri_text' => $giaTriText,
                    'han_dung' => date('d/m/Y', strtotime($v['ngay_ket_thuc'])),
                    'so_ngay_con_lai' => $v['so_ngay_con_lai']
                ];

                foreach ($users as $u) {
                    $notif->notifyUser(
                        $u['id'],
                        "⏰ Voucher {$v['ma_voucher']} sẽ hết hạn sau {$v['so_ngay_con_lai']} ngày",
                        "Voucher {$v['ma_voucher']} ({$giaTriText}) sắp hết hạn ngày " . date('d/m/Y', strtotime($v['ngay_ket_thuc'])) . ". Dùng ngay!",
                        'khuyen_mai'
                    );

                    if (!empty($u['email'])) {
                        \App\Services\MailService::sendVoucherExpiry($u['email'], $u['ho_ten'], $voucherData);
                    }
                    $sentCount++;
                }
            }

            echo json_encode([
                'success' => true, 
                'message' => "Đã gửi nhắc nhở {$sentCount} lượt cho " . count($vouchers) . " voucher sắp hết hạn.",
                'count' => $sentCount
            ]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    /**
     * #18: Gửi nhắc đánh giá cho đơn hàng đã hoàn thành (Button trên admin)
     */
    public function guiNhacDanhGia() {
        header('Content-Type: application/json');

        try {
            $db = \App\Core\Database::getInstance()->getConnection();

            // Tìm đơn hàng hoàn thành 3-5 ngày trước mà chưa có đánh giá
            $stmt = $db->prepare("SELECT dh.id, dh.ma_don_hang, dh.id_nguoi_dung, 
                                         nd.ho_ten, nd.email
                                  FROM don_hang dh
                                  JOIN nguoi_dung nd ON dh.id_nguoi_dung = nd.id
                                  WHERE dh.trang_thai_don_hang = 3
                                    AND DATEDIFF(NOW(), dh.ngay_tao) BETWEEN 3 AND 7
                                    AND dh.id_nguoi_dung IS NOT NULL
                                    AND NOT EXISTS (
                                        SELECT 1 FROM danh_gia dg 
                                        WHERE dg.id_don_hang = dh.id
                                    )
                                  ORDER BY dh.ngay_tao DESC");
            $stmt->execute();
            $orders = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (empty($orders)) {
                echo json_encode(['success' => true, 'message' => 'Không có đơn hàng nào cần nhắc đánh giá.', 'count' => 0]);
                return;
            }

            $notif = new \App\Services\NotificationService();
            $sentCount = 0;

            foreach ($orders as $o) {
                $notif->reviewReminder($o['id_nguoi_dung'], $o['ma_don_hang']);

                if (!empty($o['email'])) {
                    \App\Services\MailService::sendReviewReminder($o['email'], $o['ho_ten'], $o);
                }
                $sentCount++;
            }

            echo json_encode([
                'success' => true,
                'message' => "Đã gửi nhắc đánh giá cho {$sentCount} đơn hàng.",
                'count' => $sentCount
            ]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }
}
