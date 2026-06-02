<?php
/**
 * Template email chung - Chuỗi Ngọc Phong Thủy
 * 
 * Biến truyền vào:
 * - $title       : Tiêu đề trong email (VD: "Xác nhận đơn hàng")
 * - $greeting     : Lời chào (VD: "Chào Nguyễn Văn A,")
 * - $content      : Nội dung chính (HTML string)
 * - $highlight    : (optional) Nội dung nổi bật (VD: mã đơn hàng, voucher code)
 * - $highlight_label : (optional) Label cho highlight
 * - $table_data   : (optional) Mảng ['headers' => [...], 'rows' => [[...]]] để hiển thị bảng
 * - $summary_data : (optional) Mảng ['label' => 'value'] hiển thị tóm tắt (tổng tiền, phí ship...)
 * - $cta_text     : (optional) Text nút CTA
 * - $cta_url      : (optional) URL nút CTA
 * - $footer_note  : (optional) Ghi chú cuối email
 * - $status_badge : (optional) ['text' => '...', 'color' => '#hex'] badge trạng thái
 */

$year = date('Y');
$base_url = defined('APP_URL') ? APP_URL : '';
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body style="margin:0;padding:0;background:#f5f3f0;font-family:'Segoe UI',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f3f0;padding:40px 0;">
<tr><td align="center">
<table width="560" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.08);overflow:hidden;max-width:560px;">
    <!-- Header -->
    <tr>
        <td style="background:linear-gradient(135deg,#8b0000,#6b0d18);padding:28px 40px;text-align:center;">
            <h1 style="color:#fff;font-size:20px;margin:0;font-weight:700;letter-spacing:1px;">&#128142; Chuỗi Ngọc Phong Thủy</h1>
            <p style="color:rgba(255,255,255,0.8);font-size:11px;margin:6px 0 0;letter-spacing:2px;text-transform:uppercase;">Hệ thống trang sức cao cấp</p>
        </td>
    </tr>

    <!-- Status Badge (nếu có) -->
    <?php if (!empty($status_badge)): ?>
    <tr>
        <td style="padding:20px 40px 0;text-align:center;">
            <span style="display:inline-block;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:600;color:#fff;background:<?= $status_badge['color'] ?? '#8b0000' ?>;">
                <?= htmlspecialchars($status_badge['text']) ?>
            </span>
        </td>
    </tr>
    <?php endif; ?>

    <!-- Title + Content -->
    <tr>
        <td style="padding:28px 40px 10px;">
            <h2 style="color:#333;font-size:18px;margin:0 0 8px;font-weight:600;"><?= htmlspecialchars($title ?? '') ?></h2>
            
            <?php if (!empty($greeting)): ?>
            <p style="color:#555;font-size:14px;margin:0 0 14px;"><?= htmlspecialchars($greeting) ?></p>
            <?php endif; ?>
            
            <div style="color:#555;font-size:14px;line-height:1.7;">
                <?= $content ?? '' ?>
            </div>
        </td>
    </tr>

    <!-- Highlight Box (mã đơn, voucher code...) -->
    <?php if (!empty($highlight)): ?>
    <tr>
        <td style="padding:8px 40px 8px;">
            <div style="background:#fdf2f2;border:2px solid #e8c4c4;border-radius:12px;padding:16px 20px;text-align:center;">
                <?php if (!empty($highlight_label)): ?>
                <p style="margin:0 0 4px;font-size:12px;color:#999;text-transform:uppercase;letter-spacing:1px;"><?= htmlspecialchars($highlight_label) ?></p>
                <?php endif; ?>
                <p style="margin:0;font-size:22px;font-weight:bold;color:#8b0000;font-family:monospace;letter-spacing:2px;"><?= htmlspecialchars($highlight) ?></p>
            </div>
        </td>
    </tr>
    <?php endif; ?>

    <!-- Table (danh sách sản phẩm, v.v.) -->
    <?php if (!empty($table_data) && !empty($table_data['rows'])): ?>
    <tr>
        <td style="padding:12px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                <?php if (!empty($table_data['headers'])): ?>
                <tr>
                    <?php foreach ($table_data['headers'] as $header): ?>
                    <td style="padding:8px 10px;font-size:12px;font-weight:600;color:#999;text-transform:uppercase;border-bottom:2px solid #f0eded;"><?= htmlspecialchars($header) ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endif; ?>
                <?php foreach ($table_data['rows'] as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                    <td style="padding:10px;font-size:13px;color:#333;border-bottom:1px solid #f5f5f5;"><?= $cell ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </table>
        </td>
    </tr>
    <?php endif; ?>

    <!-- Summary (tổng tiền, phí ship...) -->
    <?php if (!empty($summary_data)): ?>
    <tr>
        <td style="padding:8px 40px 8px;">
            <div style="background:#fafafa;border-radius:10px;padding:14px 18px;">
                <?php foreach ($summary_data as $label => $value): ?>
                <?php 
                    $isTotal = (stripos($label, 'Tổng') !== false || stripos($label, 'Thanh toán') !== false);
                    $borderStyle = $isTotal ? 'border-top:2px solid #e0e0e0;padding-top:10px;margin-top:4px;' : '';
                    $fontStyle = $isTotal ? 'font-weight:700;color:#8b0000;font-size:15px;' : 'font-size:13px;color:#555;';
                ?>
                <div style="display:flex;justify-content:space-between;padding:4px 0;<?= $borderStyle ?>">
                    <table width="100%"><tr>
                        <td style="<?= $fontStyle ?>"><?= htmlspecialchars($label) ?></td>
                        <td style="text-align:right;<?= $fontStyle ?>"><?= htmlspecialchars($value) ?></td>
                    </tr></table>
                </div>
                <?php endforeach; ?>
            </div>
        </td>
    </tr>
    <?php endif; ?>

    <!-- CTA Button -->
    <?php if (!empty($cta_text) && !empty($cta_url)): ?>
    <tr>
        <td style="padding:16px 40px;text-align:center;">
            <a href="<?= htmlspecialchars($cta_url) ?>" style="display:inline-block;background:linear-gradient(135deg,#8b0000,#a01020);color:#fff;text-decoration:none;padding:12px 32px;border-radius:8px;font-size:14px;font-weight:600;letter-spacing:0.5px;">
                <?= htmlspecialchars($cta_text) ?>
            </a>
        </td>
    </tr>
    <?php endif; ?>

    <!-- Footer Note -->
    <?php if (!empty($footer_note)): ?>
    <tr>
        <td style="padding:8px 40px;">
            <p style="color:#999;font-size:12px;text-align:center;margin:0;line-height:1.5;font-style:italic;">
                <?= $footer_note ?>
            </p>
        </td>
    </tr>
    <?php endif; ?>

    <!-- Footer -->
    <tr>
        <td style="padding:18px 40px 24px;border-top:1px solid #f0eded;">
            <p style="color:#aaa;font-size:11px;text-align:center;margin:0;line-height:1.5;">
                Nếu bạn cần hỗ trợ, vui lòng liên hệ CSKH qua email hoặc hotline.<br>
                &copy; <?= $year ?> Chuỗi Ngọc Phong Thủy — Trang sức phong thủy cao cấp
            </p>
        </td>
    </tr>
</table>
</td></tr>
</table>
</body>
</html>
