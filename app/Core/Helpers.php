<?php

if (!function_exists('component')) {
    /**
     * Render a common UI component.
     *
     * @param string $name Component name (e.g., 'button', 'input_text')
     * @param array $data Data to extract and pass to the component
     * @return void
     */
    function component($name, $data = []) {
        // Resolve path BEFORE extract() to avoid $name being overwritten
        $__componentPath = __DIR__ . '/../../views/components/common/' . $name . '.php';
        if (file_exists($__componentPath)) {
            extract($data);
            include $__componentPath;
        } else {
            echo "<!-- Component '$name' not found at '$__componentPath' -->";
        }
    }
}

if (!function_exists('loadEnv')) {
    function loadEnv($path) {
        if (!file_exists($path)) {
            return;
        }
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv(sprintf('%s=%s', $name, $value));
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}

if (!function_exists('format_currency_short')) {
    function format_currency_short($amount) {
        $amount = (float)$amount;
        $isNegative = $amount < 0;
        $absAmount = abs($amount);
        
        if ($absAmount >= 1000000000) {
            $formatted = rtrim(rtrim(number_format($absAmount / 1000000000, 2, ',', '.'), '0'), ',') . ' tỷ';
        } elseif ($absAmount >= 1000000) {
            $formatted = rtrim(rtrim(number_format($absAmount / 1000000, 2, ',', '.'), '0'), ',') . 'tr';
        } elseif ($absAmount >= 1000) {
            $formatted = rtrim(rtrim(number_format($absAmount / 1000, 2, ',', '.'), '0'), ',') . 'k';
        } else {
            $formatted = number_format($absAmount, 0, ',', '.') . 'đ';
        }
        
        return ($isNegative ? '-' : '') . $formatted;
    }
}

if (!function_exists('get_image_url')) {
    /**
     * Trả về URL ảnh đúng cho cả 3 trường hợp:
     * - URL bên ngoài (https://...) → giữ nguyên
     * - Đường dẫn local (public/images/...) → thêm APP_URL
     * - Rỗng/null → trả ảnh placeholder
     *
     * @param string|null $path Đường dẫn ảnh từ DB
     * @param string $placeholder Ảnh mặc định nếu rỗng
     * @return string URL ảnh hoàn chỉnh
     */
    function get_image_url($path, $placeholder = '') {
        if (empty(trim($path ?? ''))) {
            // Nếu rỗng, dùng ảnh placeholder
            return $placeholder ?: APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg';
        }

        // Nếu là URL bên ngoài (http:// hoặc https://) → giữ nguyên
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Đường dẫn local → thêm APP_URL
        return APP_URL . '/' . ltrim($path, '/');
    }
}

if (!function_exists('format_phone_number')) {
    /**
     * Format số điện thoại cho dễ đọc
     * VD: 0123456789 -> 0123 456 789
     */
    function format_phone_number($phone) {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($phone) == 10) {
            return preg_replace('/(\d{4})(\d{3})(\d{3})/', '$1 $2 $3', $phone);
        }
        return $phone;
    }
}
