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
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ]);
            $socket = @stream_socket_client(
                "tcp://{$host}:{$port}",
                $errno, $errstr, 15,
                STREAM_CLIENT_CONNECT,
                $context
            );
            if (!$socket) {
                error_log("[MailHelper] Không thể kết nối SMTP {$host}:{$port} - {$errstr} ({$errno})");
                return false;
            }

            // Đọc greeting
            $greeting = self::readResponse($socket);
            if (!self::isResponseOk($greeting, 220)) {
                error_log("[MailHelper] SMTP greeting lỗi: $greeting");
                fclose($socket);
                return false;
            }

            // EHLO
            $resp = self::sendCmd($socket, "EHLO localhost");
            if (!self::isResponseOk($resp, 250)) {
                error_log("[MailHelper] EHLO lỗi: $resp");
                fclose($socket);
                return false;
            }

            // STARTTLS (port 587)
            if ($port === 587) {
                $resp = self::sendCmd($socket, "STARTTLS");
                if (!self::isResponseOk($resp, 220)) {
                    error_log("[MailHelper] STARTTLS lỗi: $resp");
                    fclose($socket);
                    return false;
                }

                // Bật TLS trên socket - thử nhiều phiên bản
                $tlsSuccess = @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT);
                if (!$tlsSuccess) {
                    $tlsSuccess = @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT | STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT);
                }
                if (!$tlsSuccess) {
                    $tlsSuccess = @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
                }
                if (!$tlsSuccess) {
                    error_log('[MailHelper] Không thể bật TLS encryption. Kiểm tra OpenSSL extension.');
                    fclose($socket);
                    return false;
                }

                // EHLO lại sau STARTTLS
                $resp = self::sendCmd($socket, "EHLO localhost");
                if (!self::isResponseOk($resp, 250)) {
                    error_log("[MailHelper] EHLO sau STARTTLS lỗi: $resp");
                    fclose($socket);
                    return false;
                }
            }

            // AUTH LOGIN
            $resp = self::sendCmd($socket, "AUTH LOGIN");
            if (!self::isResponseOk($resp, 334)) {
                error_log("[MailHelper] AUTH LOGIN lỗi: $resp");
                fclose($socket);
                return false;
            }

            $resp = self::sendCmd($socket, base64_encode($user));
            if (!self::isResponseOk($resp, 334)) {
                error_log("[MailHelper] AUTH username lỗi: $resp");
                fclose($socket);
                return false;
            }

            $resp = self::sendCmd($socket, base64_encode($pass));
            if (!self::isResponseOk($resp, 235)) {
                error_log("[MailHelper] AUTH password lỗi (sai mật khẩu ứng dụng?): $resp");
                fclose($socket);
                return false;
            }

            // MAIL FROM
            $resp = self::sendCmd($socket, "MAIL FROM:<{$from}>");
            if (!self::isResponseOk($resp, 250)) {
                error_log("[MailHelper] MAIL FROM lỗi: $resp");
                fclose($socket);
                return false;
            }

            // RCPT TO
            $resp = self::sendCmd($socket, "RCPT TO:<{$to}>");
            if (!self::isResponseOk($resp, 250)) {
                error_log("[MailHelper] RCPT TO lỗi (email người nhận không hợp lệ?): $resp");
                fclose($socket);
                return false;
            }

            // DATA
            $resp = self::sendCmd($socket, "DATA");
            if (!self::isResponseOk($resp, 354)) {
                error_log("[MailHelper] DATA lỗi: $resp");
                fclose($socket);
                return false;
            }

            // Headers + Body (RFC 5322 compliant)
            $messageId = '<' . bin2hex(random_bytes(16)) . '@' . gethostname() . '>';
            $date = date('r'); // RFC 2822 format: Mon, 16 Jun 2025 09:30:00 +0700

            $message  = "From: =?UTF-8?B?" . base64_encode('Chuỗi Ngọc Phong Thủy') . "?= <{$from}>\r\n";
            $message .= "To: <{$to}>\r\n";
            $message .= "Reply-To: <{$from}>\r\n";
            $message .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
            $message .= "Date: {$date}\r\n";
            $message .= "Message-ID: {$messageId}\r\n";
            $message .= "MIME-Version: 1.0\r\n";
            $message .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "\r\n";
            $message .= chunk_split(base64_encode($htmlBody));

            // Kết thúc DATA bằng dấu chấm
            $resp = self::sendCmd($socket, $message . "\r\n.");
            if (!self::isResponseOk($resp, 250)) {
                error_log("[MailHelper] Gửi email thất bại: $resp");
                fclose($socket);
                return false;
            }

            // QUIT
            fwrite($socket, "QUIT\r\n");
            fclose($socket);

            error_log("[MailHelper] Gửi email thành công tới: {$to}");
            return true;

        } catch (\Exception $e) {
            error_log("[MailHelper] SMTP Exception: " . $e->getMessage());
            if (isset($socket) && is_resource($socket)) {
                fclose($socket);
            }
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
        // Timeout 15 giây cho response
        stream_set_timeout($socket, 15);
        while ($line = @fgets($socket, 512)) {
            $response .= $line;
            // Dòng cuối: "250 OK" (ký tự thứ 4 là dấu cách, không phải '-')
            if (isset($line[3]) && $line[3] !== '-') {
                break;
            }
        }
        $info = stream_get_meta_data($socket);
        if (!empty($info['timed_out'])) {
            error_log('[MailHelper] SMTP response timeout');
        }
        return $response;
    }

    /**
     * Kiểm tra response code SMTP
     */
    private static function isResponseOk(string $response, int $expectedCode): bool
    {
        $code = (int)substr(trim($response), 0, 3);
        return $code === $expectedCode;
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
