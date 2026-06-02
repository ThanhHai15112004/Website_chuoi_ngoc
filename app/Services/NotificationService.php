<?php

namespace App\Services;

use App\Models\Admin\ThongBaoModel;

class NotificationService
{
    private $model;

    public function __construct()
    {
        $this->model = new ThongBaoModel();
    }

    /**
     * Gửi thông báo cho 1 user
     */
    public function notifyUser(string $userId, string $title, string $content, string $type, ?string $link = null): void
    {
        $this->model->themMoi([
            'id_nguoi_dung' => $userId,
            'tieu_de' => $title,
            'noi_dung' => $content,
            'loai_thong_bao' => $type,
            'link' => $link
        ]);
    }

    /**
     * Gửi thông báo cho admin (id_nguoi_dung = NULL)
     */
    public function notifyAdmin(string $title, string $content, string $type, ?string $link = null): void
    {
        $this->model->themMoi([
            'id_nguoi_dung' => null,
            'tieu_de' => $title,
            'noi_dung' => $content,
            'loai_thong_bao' => $type,
            'link' => $link
        ]);
    }

    /**
     * Gửi thông báo cho nhiều user
     */
    public function notifyMultipleUsers(array $userIds, string $title, string $content, string $type, ?string $link = null): void
    {
        if (empty($userIds)) return;
        $this->model->insertMultiple($userIds, [
            'tieu_de' => $title,
            'noi_dung' => $content,
            'loai_thong_bao' => $type,
            'link' => $link
        ]);
    }

    // =============================================
    // HELPER METHODS — ĐƠN HÀNG
    // =============================================

    /**
     * #1: Đơn hàng mới được tạo
     */
    public function orderCreated(array $order): void
    {
        $ma = $order['ma_don_hang'] ?? '';
        $tien = number_format($order['thanh_tien'] ?? 0, 0, ',', '.') . 'đ';
        $userId = $order['id_nguoi_dung'] ?? null;
        $tenKH = $order['ten_nguoi_nhan'] ?? 'Khách hàng';
        $base = defined('APP_URL') ? APP_URL : '';

        // Thông báo cho User
        if ($userId) {
            $this->notifyUser(
                $userId,
                "Đơn hàng {$ma} đã được đặt thành công",
                "Đơn hàng {$ma} đã được đặt thành công. Tổng thanh toán: {$tien}. Chúng tôi sẽ xử lý đơn hàng sớm nhất.",
                'don_hang',
                $base . "/chi-tiet-don-hang?id={$ma}"
            );
        }

        // Thông báo cho Admin
        $this->notifyAdmin(
            "Đơn hàng mới #{$ma}",
            "Đơn hàng mới #{$ma} từ {$tenKH} — {$tien}",
            'don_hang',
            $base . "/admin/don-hang/chi-tiet/{$order['id']}"
        );
    }

    /**
     * #2-5: Cập nhật trạng thái đơn hàng
     */
    public function orderStatusChanged(array $order, int $newStatus, string $reason = ''): void
    {
        $ma = $order['ma_don_hang'] ?? '';
        $userId = $order['id_nguoi_dung'] ?? null;
        $tenKH = $order['ten_nguoi_nhan'] ?? 'Khách hàng';
        $base = defined('APP_URL') ? APP_URL : '';

        $statusMessages = [
            1 => [
                'title' => "Đơn hàng #{$ma} đã được xác nhận",
                'content' => "Đơn hàng #{$ma} đã được xác nhận. Chúng tôi đang chuẩn bị hàng cho bạn!",
            ],
            2 => [
                'title' => "Đơn hàng #{$ma} đang giao đến bạn",
                'content' => "Đơn hàng #{$ma} đang trên đường giao đến bạn 🚚. Vui lòng giữ điện thoại để nhận hàng.",
            ],
            3 => [
                'title' => "Đơn hàng #{$ma} đã giao thành công",
                'content' => "Đơn hàng #{$ma} đã giao thành công! Cảm ơn bạn đã mua sắm tại Chuỗi Ngọc 💎",
            ],
            4 => [
                'title' => "Đơn hàng #{$ma} đã bị hủy",
                'content' => "Đơn hàng #{$ma} đã bị hủy." . ($reason ? " Lý do: {$reason}" : ''),
            ]
        ];

        $msg = $statusMessages[$newStatus] ?? null;
        if (!$msg) return;

        // Thông báo cho User
        if ($userId) {
            $this->notifyUser($userId, $msg['title'], $msg['content'], 'don_hang', $base . "/chi-tiet-don-hang?id={$ma}");
        }

        // Đơn hủy → thông báo admin nếu user tự hủy
        if ($newStatus === 4) {
            $this->notifyAdmin(
                "Đơn hàng #{$ma} đã bị hủy",
                "Khách hàng {$tenKH} đã hủy đơn #{$ma}." . ($reason ? " Lý do: {$reason}" : ''),
                'don_hang',
                $base . "/admin/don-hang/chi-tiet/{$order['id']}"
            );
        }
    }

    /**
     * #6: Thanh toán thành công
     */
    public function paymentConfirmed(array $order): void
    {
        $ma = $order['ma_don_hang'] ?? '';
        $tien = number_format($order['thanh_tien'] ?? 0, 0, ',', '.') . 'đ';
        $userId = $order['id_nguoi_dung'] ?? null;
        $base = defined('APP_URL') ? APP_URL : '';

        if ($userId) {
            $this->notifyUser(
                $userId,
                "Thanh toán {$tien} cho đơn #{$ma} đã được xác nhận ✅",
                "Thanh toán {$tien} cho đơn hàng #{$ma} đã được xác nhận thành công.",
                'don_hang',
                $base . "/chi-tiet-don-hang?id={$ma}"
            );
        }

        $this->notifyAdmin(
            "Đơn #{$ma} đã thanh toán",
            "Đơn #{$ma} đã được thanh toán — {$tien}",
            'don_hang',
            $base . "/admin/don-hang/chi-tiet/{$order['id']}"
        );
    }

    // =============================================
    // HELPER METHODS — TÀI KHOẢN
    // =============================================

    /**
     * #9: Thành viên mới đăng ký
     */
    public function newUserRegistered(array $user): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $ten = $user['ho_ten'] ?? '';
        $email = $user['email'] ?? '';

        $this->notifyUser(
            $user['id'],
            "Chào mừng bạn đến với Chuỗi Ngọc Phong Thủy!",
            "Chào mừng {$ten}! Khám phá bộ sưu tập trang sức phong thủy cao cấp và tận hưởng ưu đãi dành cho thành viên mới 💎",
            'tai_khoan',
            $base
        );

        $this->notifyAdmin(
            "Thành viên mới: {$ten}",
            "Thành viên mới: {$ten} ({$email}) vừa đăng ký tài khoản",
            'tai_khoan',
            $base . "/admin/khach-hang"
        );
    }

    /**
     * #11: Tài khoản bị khóa/mở khóa
     */
    public function accountStatusChanged(string $userId, string $userName, bool $isLocked): void
    {
        $action = $isLocked ? 'bị tạm khóa' : 'đã được kích hoạt lại';
        $this->notifyUser(
            $userId,
            "Tài khoản của bạn {$action}",
            $isLocked
                ? "Tài khoản của bạn tại Chuỗi Ngọc đã bị tạm khóa. Vui lòng liên hệ CSKH để biết thêm chi tiết."
                : "Tài khoản của bạn đã được kích hoạt lại. Bạn có thể đăng nhập và mua sắm bình thường.",
            'tai_khoan'
        );
    }

    /**
     * #12: Nâng hạng thành viên
     */
    public function rankUpgraded(string $userId, string $userName, string $newRank, float $discount): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $this->notifyUser(
            $userId,
            "Chúc mừng! Bạn đã lên hạng {$newRank} 🏆",
            "Chúc mừng {$userName}! Bạn đã được nâng lên hạng {$newRank} với ưu đãi giảm {$discount}% cho mọi đơn hàng!",
            'tai_khoan',
            $base . "/tai-khoan"
        );
    }

    // =============================================
    // HELPER METHODS — KHUYẾN MÃI & VOUCHER
    // =============================================

    /**
     * #13: Gán voucher cho user
     */
    public function voucherAssigned(string $userId, array $voucherInfo): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $ma = $voucherInfo['ma_voucher'] ?? '';
        $giaTriText = $voucherInfo['gia_tri_text'] ?? '';
        $this->notifyUser(
            $userId,
            "Bạn vừa nhận được voucher {$ma} 🎉",
            "Bạn vừa nhận được voucher {$ma} — {$giaTriText}! Áp dụng ngay khi mua sắm tại Chuỗi Ngọc.",
            'khuyen_mai',
            $base
        );
    }

    /**
     * #15: Khuyến mãi mới
     */
    public function promotionCreated(array $userIds, array $promotion): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $ten = $promotion['ten_chuong_trinh'] ?? '';
        $giaTriGiam = $promotion['gia_tri_giam'] ?? '';
        $this->notifyMultipleUsers(
            $userIds,
            "🔥 {$ten} — Ưu đãi đặc biệt!",
            "Chương trình {$ten} đang diễn ra. Giảm đến {$giaTriGiam}! Xem ngay tại Chuỗi Ngọc.",
            'khuyen_mai',
            $base
        );
    }

    // =============================================
    // HELPER METHODS — KHO & VẬN HÀNH
    // =============================================

    /**
     * #16: Tồn kho thấp → Admin
     */
    public function lowStockWarning(string $productName, string $variant, int $currentStock): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $this->notifyAdmin(
            "⚠️ Tồn kho thấp: {$productName}",
            "Sản phẩm {$productName} ({$variant}) chỉ còn {$currentStock} sản phẩm — dưới ngưỡng cảnh báo!",
            'kho',
            $base . "/admin/ton-kho"
        );
    }

    /**
     * #17: Phiếu nhập hoàn thành
     */
    public function importCompleted(string $maPhieu, string $ncc, string $tongGiaTri): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $this->notifyAdmin(
            "Phiếu nhập #{$maPhieu} đã hoàn thành",
            "Phiếu nhập #{$maPhieu} từ {$ncc} đã hoàn thành — tổng {$tongGiaTri}",
            'kho',
            $base . "/admin/nhap-kho"
        );
    }

    // =============================================
    // HELPER METHODS — ĐÁNH GIÁ & HỆ THỐNG
    // =============================================

    /**
     * #18: Nhắc đánh giá
     */
    public function reviewReminder(string $userId, string $maDon): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $this->notifyUser(
            $userId,
            "Bạn hài lòng với đơn hàng #{$maDon}?",
            "Hãy chia sẻ đánh giá về sản phẩm bạn đã mua để giúp cộng đồng Chuỗi Ngọc ⭐",
            'danh_gia',
            $base . "/chi-tiet-don-hang?id={$maDon}"
        );
    }

    /**
     * #19: Liên hệ mới từ khách
     */
    public function contactReceived(string $tenKhach, string $tieuDe): void
    {
        $base = defined('APP_URL') ? APP_URL : '';
        $this->notifyAdmin(
            "Tin nhắn mới từ {$tenKhach}",
            "Khách hàng {$tenKhach} đã gửi liên hệ: {$tieuDe}",
            'he_thong',
            $base . "/admin/notification"
        );
    }
}
