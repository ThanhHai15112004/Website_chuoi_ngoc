<?php

namespace App\Core;

class MailHelper
{
    /**
     * Gửi OTP qua email (SMTP từ .env)
     */
    public static function guiOTP(string $email, string $otp, string $purpose = 'register'): bool
    {
        $subjects = [
            'register' => 'Mã xác nhận đăng ký - Chuỗi Ngọc Phong Thủy',
            'forgot'   => 'Mã đặt lại mật khẩu - Chuỗi Ngọc Phong Thủy',
        ];

        $titles = [
            'register' => 'Xác nhận đăng ký tài khoản',
            'forgot'   => 'Đặt lại mật khẩu',
        ];

        $descriptions = [
            'register' => 'Bạn vừa đăng ký tài khoản tại Chuỗi Ngọc Phong Thủy. Vui lòng sử dụng mã OTP bên dưới để hoàn tất:',
            'forgot'   => 'Bạn vừa yêu cầu đặt lại mật khẩu. Vui lòng sử dụng mã OTP bên dưới để tiếp tục:',
        ];

        $subject = $subjects[$purpose] ?? $subjects['register'];
        $title   = $titles[$purpose] ?? $titles['register'];
        $desc    = $descriptions[$purpose] ?? $descriptions['register'];
        $body    = self::buildTemplate($title, $desc, $otp);

        return self::sendSmtp($email, $subject, $body);
    }

    /**
     * Gửi email HTML tùy ý (public wrapper cho sendSmtp)
     */
    public static function sendGeneral(string $email, string $subject, string $htmlBody): bool
    {
        return self::sendSmtp($email, $subject, $htmlBody);
    }

    /**
     * Tạo mã OTP 6 chữ số
     */
    public static function taoOTP(): string
    {
        return str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Gửi email qua SMTP (đọc config từ .env)
     */
    private static function sendSmtp(string $to, string $subject, string $htmlBody): bool
    {
        $host = $_ENV['EMAIL_HOST'] ?? 'smtp.gmail.com';
        $port = (int)($_ENV['EMAIL_PORT'] ?? 587);
        $user = $_ENV['EMAIL_USER'] ?? '';
        $pass = $_ENV['EMAIL_PASS'] ?? '';
        $from = $_ENV['EMAIL_FROM'] ?? $user;

        if (empty($user) || empty($pass)) {
            error_log('[MailHelper] EMAIL_USER hoặc EMAIL_PASS chưa cấu hình trong .env');
            return false;
        }

        try {
            // Kết nối socket
            $socket = @fsockopen($host, $port, $errno, $errstr, 10);
            if (!$socket) {
                error_log("[MailHelper] Không thể kết nối SMTP: $errstr ($errno)");
                return false;
            }

            // Đọc greeting
            self::readResponse($socket);

            // EHLO
            self::sendCmd($socket, "EHLO localhost");

            // STARTTLS (port 587)
            if ($port === 587) {
                self::sendCmd($socket, "STARTTLS");
                // Bật TLS trên socket
                $cryptoMethod = STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT;
                if (!stream_socket_enable_crypto($socket, true, $cryptoMethod)) {
                    // Fallback TLS 1.0
                    stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
                }
                // EHLO lại sau STARTTLS
                self::sendCmd($socket, "EHLO localhost");
            }

            // AUTH LOGIN
            self::sendCmd($socket, "AUTH LOGIN");
            self::sendCmd($socket, base64_encode($user));
            self::sendCmd($socket, base64_encode($pass));

            // MAIL FROM
            self::sendCmd($socket, "MAIL FROM:<{$from}>");

            // RCPT TO
            self::sendCmd($socket, "RCPT TO:<{$to}>");

            // DATA
            self::sendCmd($socket, "DATA");

            // Headers + Body
            $message  = "From: =?UTF-8?B?" . base64_encode('Chuỗi Ngọc Phong Thủy') . "?= <{$from}>\r\n";
            $message .= "To: <{$to}>\r\n";
            $message .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
            $message .= "MIME-Version: 1.0\r\n";
            $message .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "\r\n";
            $message .= chunk_split(base64_encode($htmlBody));

            // Kết thúc DATA bằng dấu chấm
            self::sendCmd($socket, $message . "\r\n.");

            // QUIT
            fwrite($socket, "QUIT\r\n");
            fclose($socket);

            return true;

        } catch (\Exception $e) {
            error_log("[MailHelper] SMTP Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Gửi lệnh SMTP và đọc response
     */
    private static function sendCmd($socket, string $cmd): string
    {
        fwrite($socket, $cmd . "\r\n");
        return self::readResponse($socket);
    }

    /**
     * Đọc response từ SMTP server
     */
    private static function readResponse($socket): string
    {
        $response = '';
        while ($line = @fgets($socket, 512)) {
            $response .= $line;
            // Dòng cuối: "250 OK" (ký tự thứ 4 là dấu cách, không phải '-')
            if (isset($line[3]) && $line[3] !== '-') {
                break;
            }
        }
        return $response;
    }

    /**
     * Template HTML cho email OTP
     */
    private static function buildTemplate(string $title, string $desc, string $otp): string
    {
        $digits = str_split($otp);
        $otpHtml = '';
        foreach ($digits as $d) {
            $otpHtml .= '<span style="display:inline-block;width:42px;height:48px;line-height:48px;text-align:center;font-size:24px;font-weight:bold;color:#8b0000;background:#fdf2f2;border:2px solid #e8c4c4;border-radius:10px;margin:0 3px;font-family:monospace;">' . $d . '</span>';
        }

        return '
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body style="margin:0;padding:0;background:#f5f3f0;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f3f0;padding:40px 0;">
<tr><td align="center">
<table width="480" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.08);overflow:hidden;">
    <!-- Header -->
    <tr>
        <td style="background:linear-gradient(135deg,#8b0000,#6b0d18);padding:32px 40px;text-align:center;">
            <h1 style="color:#fff;font-size:20px;margin:0;font-weight:700;letter-spacing:1px;">&#128142; Chuỗi Ngọc Phong Thủy</h1>
            <p style="color:rgba(255,255,255,0.8);font-size:11px;margin:6px 0 0;letter-spacing:2px;text-transform:uppercase;">Hệ thống trang sức cao cấp</p>
        </td>
    </tr>
    <!-- Body -->
    <tr>
        <td style="padding:36px 40px 20px;">
            <h2 style="color:#333;font-size:18px;margin:0 0 12px;font-weight:600;">' . htmlspecialchars($title) . '</h2>
            <p style="color:#666;font-size:14px;line-height:1.6;margin:0 0 28px;">' . htmlspecialchars($desc) . '</p>
            
            <!-- OTP Code -->
            <div style="text-align:center;padding:24px 0;">
                ' . $otpHtml . '
            </div>
            
            <p style="color:#999;font-size:12px;text-align:center;margin:20px 0 0;">
                &#9201; Mã có hiệu lực trong <strong style="color:#8b0000;">5 phút</strong>. Không chia sẻ mã này với bất kỳ ai.
            </p>
        </td>
    </tr>
    <!-- Footer -->
    <tr>
        <td style="padding:20px 40px 28px;border-top:1px solid #f0eded;">
            <p style="color:#aaa;font-size:11px;text-align:center;margin:0;line-height:1.5;">
                Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email.<br>
                &copy; ' . date('Y') . ' Chuỗi Ngọc Phong Thủy
            </p>
        </td>
    </tr>
</table>
</td></tr>
</table>
</body>
</html>';
    }
}
