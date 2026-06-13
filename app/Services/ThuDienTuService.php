<?php

namespace App\Services;

use App\Core\MailHelper;

class ThuDienTuService
{
    /**
     * Render template email chung với dữ liệu truyền vào
     */
    private static function renderTemplate(array $data): string
    {
        // Extract biến để template dùng
        extract($data);

        ob_start();
        $templatePath = __DIR__ . '/../../views/emails/base_template.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }

    /**
     * Gửi email bằng template chung
     */
    private static function send(string $to, string $subject, array $templateData): bool
    {
        try {
            $html = self::renderTemplate($templateData);
            return MailHelper::sendGeneral($to, $subject, $html);
        } catch (\Exception $e) {
            error_log("[ThuDienTuService] Lỗi gửi email: " . $e->getMessage());
            return false;
        }
    }

    // =============================================
    // #1: ĐƠN HÀNG MỚI — XÁC NHẬN ĐẶT HÀNG
    // =============================================
    public static function sendOrderConfirmation(array $order, array $items = []): bool
    {
        $email = $order['email'] ?? '';
        if (empty($email)) return false;

        $ma = $order['ma_don_hang'] ?? '';
        $ten = $order['ten_nguoi_nhan'] ?? '';
        $base = defined('APP_URL') ? APP_URL : '';

        // Bảng sản phẩm
        $tableRows = [];
        foreach ($items as $item) {
            $tenSP = $item['ten_sp'] ?? $item['product_name'] ?? 'Sản phẩm';
            $sl = $item['so_luong'] ?? $item['quantity'] ?? 1;
            $gia = number_format($item['don_gia'] ?? $item['price'] ?? 0, 0, ',', '.') . 'đ';
            $tableRows[] = [$tenSP, "x{$sl}", $gia];
        }

        // Tóm tắt thanh toán
        $summary = [];
        if (isset($order['tong_tien'])) {
            $summary['Tạm tính'] = number_format($order['tong_tien'], 0, ',', '.') . 'đ';
        }
        if (isset($order['phi_ship']) && $order['phi_ship'] > 0) {
            $summary['Phí vận chuyển'] = number_format($order['phi_ship'], 0, ',', '.') . 'đ';
        }
        if (isset($order['tien_giam_gia']) && $order['tien_giam_gia'] > 0) {
            $summary['Giảm giá'] = '-' . number_format($order['tien_giam_gia'], 0, ',', '.') . 'đ';
        }
        $summary['Tổng thanh toán'] = number_format($order['thanh_tien'] ?? 0, 0, ',', '.') . 'đ';

        return self::send($email, "Xác nhận đơn hàng #{$ma} - Chuỗi Ngọc Phong Thủy", [
            'title' => 'Xác nhận đơn hàng',
            'greeting' => "Chào {$ten},",
            'content' => "Cảm ơn bạn đã đặt hàng tại <strong>Chuỗi Ngọc Phong Thủy</strong>! Đơn hàng của bạn đã được tiếp nhận và đang chờ xử lý.",
            'highlight' => $ma,
            'highlight_label' => 'Mã đơn hàng',
            'table_data' => [
                'headers' => ['Sản phẩm', 'SL', 'Giá'],
                'rows' => $tableRows
            ],
            'summary_data' => $summary,
            'status_badge' => ['text' => '📦 Chờ xử lý', 'color' => '#f59e0b'],
            'cta_text' => 'Xem chi tiết đơn hàng',
            'cta_url' => $base . "/chi-tiet-don-hang?id={$ma}",
            'footer_note' => "Địa chỉ giao: " . ($order['dia_chi_giao_hang'] ?? '') . "<br>PT thanh toán: " . ($order['pt_thanh_toan'] ?? '')
        ]);
    }

    // =============================================
    // #2-4: CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG
    // =============================================
    public static function sendOrderStatusUpdate(array $order, int $newStatus, string $reason = ''): bool
    {
        $email = $order['email'] ?? '';
        if (empty($email)) return false;

        $ma = $order['ma_don_hang'] ?? '';
        $ten = $order['ten_nguoi_nhan'] ?? '';
        $base = defined('APP_URL') ? APP_URL : '';

        $statusConfig = [
            1 => [
                'subject' => "Đơn hàng #{$ma} đã được xác nhận",
                'title' => 'Đơn hàng đã xác nhận',
                'content' => "Đơn hàng <strong>#{$ma}</strong> đã được xác nhận và chúng tôi đang chuẩn bị hàng cho bạn. Dự kiến giao trong 2-3 ngày làm việc.",
                'badge' => ['text' => '✅ Đã xác nhận', 'color' => '#3b82f6'],
            ],
            2 => [
                'subject' => "Đơn hàng #{$ma} đang giao đến bạn",
                'title' => 'Đơn hàng đang vận chuyển',
                'content' => "Đơn hàng <strong>#{$ma}</strong> đã được giao cho đơn vị vận chuyển. Vui lòng giữ điện thoại để nhận hàng nhé!",
                'badge' => ['text' => '🚚 Đang giao hàng', 'color' => '#8b5cf6'],
            ],
            3 => [
                'subject' => "Đơn hàng #{$ma} đã giao thành công",
                'title' => 'Giao hàng thành công!',
                'content' => "Đơn hàng <strong>#{$ma}</strong> đã được giao thành công. Cảm ơn bạn đã mua sắm tại Chuỗi Ngọc Phong Thủy! 💎<br><br>Hãy dành ít phút để đánh giá sản phẩm, giúp chúng tôi phục vụ bạn tốt hơn.",
                'badge' => ['text' => '🎉 Hoàn thành', 'color' => '#10b981'],
            ],
        ];

        $config = $statusConfig[$newStatus] ?? null;
        if (!$config) return false;

        return self::send($email, $config['subject'] . ' - Chuỗi Ngọc', [
            'title' => $config['title'],
            'greeting' => "Chào {$ten},",
            'content' => $config['content'],
            'highlight' => $ma,
            'highlight_label' => 'Mã đơn hàng',
            'status_badge' => $config['badge'],
            'cta_text' => $newStatus === 3 ? 'Đánh giá sản phẩm' : 'Xem chi tiết đơn hàng',
            'cta_url' => $base . "/chi-tiet-don-hang?id={$ma}",
        ]);
    }

    // =============================================
    // #5: HỦY ĐƠN HÀNG
    // =============================================
    public static function sendOrderCancelled(array $order, string $reason = ''): bool
    {
        $email = $order['email'] ?? '';
        if (empty($email)) return false;

        $ma = $order['ma_don_hang'] ?? '';
        $ten = $order['ten_nguoi_nhan'] ?? '';
        $base = defined('APP_URL') ? APP_URL : '';
        $tien = number_format($order['thanh_tien'] ?? 0, 0, ',', '.') . 'đ';

        $contentParts = "Đơn hàng <strong>#{$ma}</strong> đã bị hủy.";
        if (!empty($reason)) {
            $contentParts .= "<br><br><strong>Lý do:</strong> " . htmlspecialchars($reason);
        }
        if (isset($order['trang_thai_thanh_toan']) && $order['trang_thai_thanh_toan'] == 1) {
            $contentParts .= "<br><br>💰 Số tiền <strong>{$tien}</strong> sẽ được hoàn trả trong 3-5 ngày làm việc.";
        }
        $contentParts .= "<br><br>Nếu bạn cần hỗ trợ, đừng ngại liên hệ với chúng tôi.";

        return self::send($email, "Đơn hàng #{$ma} đã bị hủy - Chuỗi Ngọc", [
            'title' => 'Đơn hàng đã hủy',
            'greeting' => "Chào {$ten},",
            'content' => $contentParts,
            'highlight' => $ma,
            'highlight_label' => 'Mã đơn hàng',
            'status_badge' => ['text' => '❌ Đã hủy', 'color' => '#ef4444'],
            'cta_text' => 'Tiếp tục mua sắm',
            'cta_url' => $base,
        ]);
    }

    // =============================================
    // #6: THANH TOÁN THÀNH CÔNG
    // =============================================
    public static function sendPaymentConfirmed(array $order): bool
    {
        $email = $order['email'] ?? '';
        if (empty($email)) return false;

        $ma = $order['ma_don_hang'] ?? '';
        $ten = $order['ten_nguoi_nhan'] ?? '';
        $tien = number_format($order['thanh_tien'] ?? 0, 0, ',', '.') . 'đ';
        $base = defined('APP_URL') ? APP_URL : '';

        return self::send($email, "Xác nhận thanh toán đơn #{$ma} - Chuỗi Ngọc", [
            'title' => 'Xác nhận thanh toán',
            'greeting' => "Chào {$ten},",
            'content' => "Chúng tôi đã nhận được thanh toán cho đơn hàng <strong>#{$ma}</strong>.",
            'highlight' => $tien,
            'highlight_label' => 'Số tiền thanh toán',
            'status_badge' => ['text' => '💳 Đã thanh toán', 'color' => '#10b981'],
            'summary_data' => [
                'Mã đơn hàng' => $ma,
                'Phương thức' => $order['pt_thanh_toan'] ?? 'N/A',
                'Thời gian' => date('H:i d/m/Y'),
                'Tổng thanh toán' => $tien
            ],
            'cta_text' => 'Xem đơn hàng',
            'cta_url' => $base . "/chi-tiet-don-hang?id={$ma}",
        ]);
    }

    // =============================================
    // #9: WELCOME — CHÀO MỪNG THÀNH VIÊN MỚI
    // =============================================
    public static function sendWelcome(array $user): bool
    {
        $email = $user['email'] ?? '';
        if (empty($email)) return false;

        $ten = $user['ho_ten'] ?? '';
        $maND = $user['ma_nd'] ?? '';
        $base = defined('APP_URL') ? APP_URL : '';

        return self::send($email, "Chào mừng bạn đến với Chuỗi Ngọc Phong Thủy! 💎", [
            'title' => 'Chào mừng thành viên mới!',
            'greeting' => "Chào {$ten},",
            'content' => "Chào mừng bạn đã gia nhập gia đình <strong>Chuỗi Ngọc Phong Thủy</strong>! 🎉<br><br>"
                       . "Tài khoản của bạn đã được tạo thành công. Bạn có thể bắt đầu khám phá bộ sưu tập trang sức phong thủy cao cấp và tận hưởng nhiều ưu đãi dành riêng cho thành viên.",
            'highlight' => $maND,
            'highlight_label' => 'Mã thành viên',
            'status_badge' => ['text' => '🌟 Hạng Đồng', 'color' => '#d97706'],
            'cta_text' => 'Khám phá ngay',
            'cta_url' => $base,
            'footer_note' => 'Mua sắm nhiều hơn để nâng hạng thành viên và nhận ưu đãi lớn hơn!'
        ]);
    }

    // =============================================
    // #10: RESET MẬT KHẨU BỞI ADMIN
    // =============================================
    public static function sendPasswordReset(string $email, string $hoTen, string $newPassword = '123456'): bool
    {
        if (empty($email)) return false;

        return self::send($email, "Mật khẩu tài khoản đã được đặt lại - Chuỗi Ngọc", [
            'title' => 'Mật khẩu đã được đặt lại',
            'greeting' => "Chào {$hoTen},",
            'content' => "Mật khẩu tài khoản của bạn tại <strong>Chuỗi Ngọc Phong Thủy</strong> đã được đặt lại bởi quản trị viên.<br><br>"
                       . "Vui lòng đăng nhập bằng mật khẩu mới bên dưới và <strong>đổi mật khẩu ngay</strong> sau khi đăng nhập.",
            'highlight' => $newPassword,
            'highlight_label' => 'Mật khẩu mới',
            'cta_text' => 'Đăng nhập ngay',
            'cta_url' => (defined('APP_URL') ? APP_URL : '') . '/dang-nhap',
            'footer_note' => '⚠️ Vì lý do bảo mật, hãy đổi mật khẩu ngay sau khi đăng nhập.'
        ]);
    }

    // =============================================
    // #11: TÀI KHOẢN BỊ KHÓA / MỞ KHÓA
    // =============================================
    public static function sendAccountLocked(string $email, string $hoTen, bool $isLocked): bool
    {
        if (empty($email)) return false;
        $base = defined('APP_URL') ? APP_URL : '';

        if ($isLocked) {
            return self::send($email, "Tài khoản của bạn đã bị tạm khóa - Chuỗi Ngọc", [
                'title' => 'Tài khoản bị tạm khóa',
                'greeting' => "Chào {$hoTen},",
                'content' => "Tài khoản của bạn tại <strong>Chuỗi Ngọc Phong Thủy</strong> đã bị tạm khóa bởi quản trị viên.<br><br>"
                           . "Bạn sẽ không thể đăng nhập cho đến khi tài khoản được mở lại. Nếu bạn cho rằng đây là nhầm lẫn, vui lòng liên hệ bộ phận CSKH.",
                'status_badge' => ['text' => '🔒 Tài khoản bị khóa', 'color' => '#ef4444'],
                'footer_note' => 'Liên hệ CSKH qua email hoặc hotline để được hỗ trợ.'
            ]);
        } else {
            return self::send($email, "Tài khoản của bạn đã được mở khóa - Chuỗi Ngọc", [
                'title' => 'Tài khoản đã được kích hoạt',
                'greeting' => "Chào {$hoTen},",
                'content' => "Tài khoản của bạn tại <strong>Chuỗi Ngọc Phong Thủy</strong> đã được kích hoạt trở lại.<br><br>"
                           . "Bạn có thể đăng nhập và tiếp tục mua sắm bình thường. Chúc bạn có trải nghiệm tuyệt vời!",
                'status_badge' => ['text' => '🔓 Tài khoản đã mở', 'color' => '#10b981'],
                'cta_text' => 'Đăng nhập ngay',
                'cta_url' => $base . '/dang-nhap',
            ]);
        }
    }

    // =============================================
    // #12: NÂNG HẠNG THÀNH VIÊN
    // =============================================
    public static function sendRankUpgrade(string $email, string $hoTen, string $oldRank, string $newRank, float $discount): bool
    {
        if (empty($email)) return false;
        $base = defined('APP_URL') ? APP_URL : '';

        $colorMap = ['Đồng' => '#d97706', 'Bạc' => '#6b7280', 'Vàng' => '#eab308', 'Kim Cương' => '#06b6d4'];
        $badgeColor = $colorMap[$newRank] ?? '#8b0000';

        return self::send($email, "Chúc mừng! Bạn đã lên hạng {$newRank} 🎉 - Chuỗi Ngọc", [
            'title' => "Chúc mừng nâng hạng thành viên!",
            'greeting' => "Chào {$hoTen},",
            'content' => "Bạn đã được nâng từ hạng <strong>{$oldRank}</strong> lên hạng <strong>{$newRank}</strong> tại Chuỗi Ngọc Phong Thủy! 🎉<br><br>"
                       . "Từ bây giờ, bạn sẽ được hưởng ưu đãi <strong>giảm {$discount}%</strong> cho mọi đơn hàng cùng nhiều quyền lợi đặc biệt khác.",
            'highlight' => $newRank,
            'highlight_label' => 'Hạng thành viên mới',
            'status_badge' => ['text' => "🏆 {$newRank}", 'color' => $badgeColor],
            'summary_data' => [
                'Hạng cũ' => $oldRank,
                'Hạng mới' => $newRank,
                'Ưu đãi giảm giá' => $discount . '%'
            ],
            'cta_text' => 'Mua sắm ngay',
            'cta_url' => $base,
            'footer_note' => 'Tiếp tục mua sắm để duy trì và nâng cấp hạng thành viên của bạn!'
        ]);
    }

    // =============================================
    // #13: TẶNG VOUCHER
    // =============================================
    public static function sendVoucherGift(string $email, string $hoTen, array $vouchers): bool
    {
        if (empty($email)) return false;
        $base = defined('APP_URL') ? APP_URL : '';

        $voucherList = '';
        foreach ($vouchers as $v) {
            $ma = $v['ma_voucher'] ?? '';
            $giaTri = $v['gia_tri_text'] ?? '';
            $hanDung = $v['han_dung'] ?? '';
            $voucherList .= "• <strong>{$ma}</strong> — {$giaTri}" . ($hanDung ? " (HSD: {$hanDung})" : '') . "<br>";
        }

        return self::send($email, "Bạn nhận được voucher mới! 🎁 - Chuỗi Ngọc", [
            'title' => 'Voucher mới dành cho bạn!',
            'greeting' => "Chào {$hoTen},",
            'content' => "Bạn vừa nhận được voucher ưu đãi từ <strong>Chuỗi Ngọc Phong Thủy</strong>:<br><br>" . $voucherList
                       . "<br>Áp dụng ngay khi thanh toán để nhận ưu đãi!",
            'status_badge' => ['text' => '🎁 Voucher mới', 'color' => '#ec4899'],
            'cta_text' => 'Mua sắm ngay',
            'cta_url' => $base,
        ]);
    }

    // =============================================
    // #14: VOUCHER SẮP HẾT HẠN
    // =============================================
    public static function sendVoucherExpiry(string $email, string $hoTen, array $voucher): bool
    {
        if (empty($email)) return false;
        $base = defined('APP_URL') ? APP_URL : '';

        $ma = $voucher['ma_voucher'] ?? '';
        $giaTri = $voucher['gia_tri_text'] ?? '';
        $hanDung = $voucher['han_dung'] ?? '';
        $soNgay = $voucher['so_ngay_con_lai'] ?? 0;

        return self::send($email, "Voucher {$ma} sắp hết hạn! ⏰ - Chuỗi Ngọc", [
            'title' => 'Voucher sắp hết hạn!',
            'greeting' => "Chào {$hoTen},",
            'content' => "Voucher <strong>{$ma}</strong> ({$giaTri}) của bạn sẽ <strong>hết hạn sau {$soNgay} ngày</strong> (ngày {$hanDung}).<br><br>"
                       . "Đừng để bỏ lỡ ưu đãi này! Sử dụng ngay khi mua sắm tại Chuỗi Ngọc.",
            'highlight' => $ma,
            'highlight_label' => 'Mã voucher',
            'status_badge' => ['text' => "⏰ Còn {$soNgay} ngày", 'color' => '#f59e0b'],
            'cta_text' => 'Dùng voucher ngay',
            'cta_url' => $base,
        ]);
    }

    // =============================================
    // #15: KHUYẾN MÃI MỚI
    // =============================================
    public static function sendPromotionAlert(string $email, string $hoTen, array $promotion): bool
    {
        if (empty($email)) return false;
        $base = defined('APP_URL') ? APP_URL : '';

        $tenCT = $promotion['ten_chuong_trinh'] ?? '';
        $giaTri = $promotion['gia_tri_giam'] ?? '';
        $kieuGiam = $promotion['kieu_giam'] ?? '';
        $ngayBD = $promotion['ngay_bat_dau'] ?? '';
        $ngayKT = $promotion['ngay_ket_thuc'] ?? '';

        $mucGiam = '';
        if ($kieuGiam === 'phan_tram') $mucGiam = "Giảm {$giaTri}%";
        elseif ($kieuGiam === 'so_tien') $mucGiam = "Giảm " . number_format($giaTri, 0, ',', '.') . 'đ';
        else $mucGiam = "Giá chỉ " . number_format($giaTri, 0, ',', '.') . 'đ';

        return self::send($email, "🔥 {$tenCT} — Ưu đãi đặc biệt! - Chuỗi Ngọc", [
            'title' => $tenCT,
            'greeting' => "Chào {$hoTen},",
            'content' => "Chương trình khuyến mãi <strong>{$tenCT}</strong> đang diễn ra tại Chuỗi Ngọc Phong Thủy!<br><br>"
                       . "🔥 <strong>{$mucGiam}</strong> cho các sản phẩm áp dụng.<br>"
                       . "📅 Thời gian: {$ngayBD} — {$ngayKT}<br><br>"
                       . "Nhanh tay mua sắm trước khi hết hạn!",
            'status_badge' => ['text' => '🔥 Khuyến mãi', 'color' => '#ef4444'],
            'cta_text' => 'Xem ngay',
            'cta_url' => $base,
        ]);
    }

    // =============================================
    // #16: CẢNH BÁO TỒN KHO THẤP → ADMIN
    // =============================================
    public static function sendLowStockAlert(string $adminEmail, array $products): bool
    {
        if (empty($adminEmail) || empty($products)) return false;

        $tableRows = [];
        foreach ($products as $p) {
            $tableRows[] = [
                htmlspecialchars($p['ten_sp'] ?? ''),
                htmlspecialchars($p['bien_the'] ?? ''),
                '<strong style="color:#ef4444;">' . ($p['ton_kho'] ?? 0) . '</strong>',
                $p['nguong'] ?? 5
            ];
        }

        return self::send($adminEmail, "⚠️ Cảnh báo tồn kho thấp - Chuỗi Ngọc", [
            'title' => 'Cảnh báo tồn kho thấp',
            'content' => "Các sản phẩm sau đang có tồn kho dưới ngưỡng cảnh báo. Vui lòng kiểm tra và đặt hàng nhập kho kịp thời.",
            'status_badge' => ['text' => '⚠️ Cảnh báo', 'color' => '#f59e0b'],
            'table_data' => [
                'headers' => ['Sản phẩm', 'Biến thể', 'Tồn kho', 'Ngưỡng'],
                'rows' => $tableRows
            ],
            'cta_text' => 'Quản lý tồn kho',
            'cta_url' => (defined('APP_URL') ? APP_URL : '') . '/admin/ton-kho',
        ]);
    }

    // =============================================
    // #17: PHIẾU NHẬP KHO HOÀN THÀNH → ADMIN
    // =============================================
    public static function sendImportCompleted(string $adminEmail, array $phieu): bool
    {
        if (empty($adminEmail)) return false;

        $maPhieu = $phieu['ma_phieu'] ?? '';
        $ncc = $phieu['ten_ncc'] ?? '';
        $tongTien = number_format($phieu['tong_tien'] ?? 0, 0, ',', '.') . 'đ';

        return self::send($adminEmail, "Phiếu nhập #{$maPhieu} hoàn thành - Chuỗi Ngọc", [
            'title' => 'Phiếu nhập kho hoàn thành',
            'content' => "Phiếu nhập kho <strong>#{$maPhieu}</strong> đã được duyệt và hoàn thành.",
            'highlight' => $maPhieu,
            'highlight_label' => 'Mã phiếu nhập',
            'status_badge' => ['text' => '✅ Hoàn thành', 'color' => '#10b981'],
            'summary_data' => [
                'Nhà cung cấp' => $ncc,
                'Tổng giá trị' => $tongTien,
                'Thời gian' => date('H:i d/m/Y')
            ],
            'cta_text' => 'Xem chi tiết',
            'cta_url' => (defined('APP_URL') ? APP_URL : '') . '/admin/nhap-kho',
        ]);
    }

    // =============================================
    // #18: NHẮC ĐÁNH GIÁ SAU MUA
    // =============================================
    public static function sendReviewReminder(string $email, string $hoTen, array $order): bool
    {
        if (empty($email)) return false;
        $base = defined('APP_URL') ? APP_URL : '';
        $ma = $order['ma_don_hang'] ?? '';

        return self::send($email, "Bạn nghĩ sao về đơn hàng #{$ma}? ⭐ - Chuỗi Ngọc", [
            'title' => 'Chia sẻ đánh giá của bạn',
            'greeting' => "Chào {$hoTen},",
            'content' => "Bạn đã nhận đơn hàng <strong>#{$ma}</strong> được vài ngày rồi.<br><br>"
                       . "Bạn có hài lòng với sản phẩm không? Hãy dành ít phút chia sẻ đánh giá — điều này giúp ích rất nhiều cho cộng đồng yêu trang sức phong thủy! ⭐",
            'status_badge' => ['text' => '⭐ Đánh giá', 'color' => '#f59e0b'],
            'cta_text' => 'Đánh giá ngay',
            'cta_url' => $base . "/chi-tiet-don-hang?id={$ma}",
            'footer_note' => 'Mỗi đánh giá của bạn là động lực để chúng tôi phục vụ tốt hơn!'
        ]);
    }

    // =============================================
    // #19: LIÊN HỆ MỚI → ADMIN
    // =============================================
    public static function sendContactReceived(string $adminEmail, array $contact): bool
    {
        if (empty($adminEmail)) return false;

        $tenKhach = $contact['ho_ten'] ?? 'Khách hàng';
        $emailKhach = $contact['email'] ?? '';
        $sdt = $contact['so_dien_thoai'] ?? '';
        $noiDung = $contact['noi_dung'] ?? '';
        $tieuDe = $contact['tieu_de'] ?? 'Liên hệ mới';

        return self::send($adminEmail, "Tin nhắn mới từ {$tenKhach} - Chuỗi Ngọc", [
            'title' => 'Liên hệ mới từ khách hàng',
            'content' => "Bạn nhận được tin nhắn mới từ form liên hệ trên website.",
            'status_badge' => ['text' => '📩 Liên hệ mới', 'color' => '#6366f1'],
            'summary_data' => [
                'Họ tên' => $tenKhach,
                'Email' => $emailKhach,
                'SĐT' => $sdt,
                'Tiêu đề' => $tieuDe,
            ],
            'table_data' => [
                'headers' => ['Nội dung tin nhắn'],
                'rows' => [[nl2br(htmlspecialchars($noiDung))]]
            ],
            'footer_note' => 'Vui lòng phản hồi khách hàng sớm nhất có thể.'
        ]);
    }
}
