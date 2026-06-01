<?php

namespace App\Services\Admin;

use App\Models\CauHinhModel;
use Exception;

class CuaHangService
{
    private $cauHinhModel;

    /**
     * Danh sách tất cả config keys liên quan đến cửa hàng
     */
    private $storeKeys = [
        // Thông tin cơ bản
        'ten_cua_hang', 'thuong_hieu', 'slogan', 'mo_ta',
        'hotline_chinh', 'sdt_cskh', 'email', 'gio_lam_viec',
        // Logo & Branding
        'logo_chinh', 'logo_toi', 'favicon', 'mau_thuong_hieu',
        // Địa chỉ
        'chi_ban_online', 'tinh_thanh', 'quan_huyen', 'phuong_xa',
        'dia_chi_chi_tiet', 'google_map_iframe',
        // Mạng xã hội
        'zalo', 'zalo_active',
        'facebook', 'facebook_active',
        'tiktok', 'tiktok_active',
        'shopee', 'shopee_active',
        'youtube', 'youtube_active',
        // SEO
        'meta_title', 'meta_description', 'keywords', 'social_share_image',
        // Pháp lý
        'ten_doanh_nghiep', 'ma_so_thue', 'dia_chi_dkkd', 'hien_thi_phap_ly'
    ];

    /**
     * Keys được phép lưu (whitelist để tránh inject key lạ)
     */
    private $allowedKeys = [
        'ten_cua_hang', 'thuong_hieu', 'slogan', 'mo_ta',
        'hotline_chinh', 'sdt_cskh', 'email', 'gio_lam_viec',
        'logo_chinh', 'logo_toi', 'favicon', 'mau_thuong_hieu',
        'chi_ban_online', 'tinh_thanh', 'quan_huyen', 'phuong_xa',
        'dia_chi_chi_tiet', 'google_map_iframe',
        'zalo', 'zalo_active',
        'facebook', 'facebook_active',
        'tiktok', 'tiktok_active',
        'shopee', 'shopee_active',
        'youtube', 'youtube_active',
        'meta_title', 'meta_description', 'keywords', 'social_share_image',
        'ten_doanh_nghiep', 'ma_so_thue', 'dia_chi_dkkd', 'hien_thi_phap_ly'
    ];

    public function __construct()
    {
        $this->cauHinhModel = new CauHinhModel();
    }

    /**
     * Lấy toàn bộ cấu hình cửa hàng
     * @return array Associative array [key => value]
     */
    public function getStoreConfig(): array
    {
        $allConfig = $this->cauHinhModel->getAll();
        $storeConfig = [];

        foreach ($this->storeKeys as $key) {
            $storeConfig[$key] = $allConfig[$key] ?? '';
        }

        return $storeConfig;
    }

    /**
     * Lưu hàng loạt cấu hình cửa hàng
     * @param array $data Associative array [key => value]
     * @return array Kết quả lưu: ['success' => bool, 'saved' => int, 'errors' => array]
     */
    public function saveStoreConfig(array $data): array
    {
        $errors = $this->validateConfig($data);
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors, 'saved' => 0];
        }

        $saved = 0;
        $saveErrors = [];

        foreach ($data as $key => $value) {
            // Chỉ lưu key hợp lệ
            if (!in_array($key, $this->allowedKeys)) {
                continue;
            }

            try {
                // Sanitize giá trị
                $value = $this->sanitizeValue($key, $value);
                $this->cauHinhModel->set($key, $value);
                $saved++;
            } catch (Exception $e) {
                $saveErrors[] = "Lỗi lưu '$key': " . $e->getMessage();
            }
        }

        return [
            'success' => empty($saveErrors),
            'saved' => $saved,
            'errors' => $saveErrors
        ];
    }

    /**
     * Validate dữ liệu đầu vào
     * @param array $data
     * @return array Danh sách lỗi (rỗng = hợp lệ)
     */
    public function validateConfig(array $data): array
    {
        $errors = [];

        // Bắt buộc: Tên cửa hàng
        if (isset($data['ten_cua_hang']) && empty(trim($data['ten_cua_hang']))) {
            $errors[] = 'Tên cửa hàng không được để trống.';
        }

        // Bắt buộc: Hotline
        if (isset($data['hotline_chinh']) && empty(trim($data['hotline_chinh']))) {
            $errors[] = 'Hotline chính không được để trống.';
        }

        // Bắt buộc: Email
        if (isset($data['email'])) {
            $email = trim($data['email']);
            if (empty($email)) {
                $errors[] = 'Email hỗ trợ không được để trống.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email hỗ trợ không đúng định dạng.';
            }
        }

        // Validate hotline format (chỉ chứa số, dấu +, dấu cách)
        if (!empty($data['hotline_chinh']) && !preg_match('/^[\d\s\+\-\.]+$/', $data['hotline_chinh'])) {
            $errors[] = 'Hotline chỉ được chứa số, dấu +, dấu -, dấu cách.';
        }

        if (!empty($data['sdt_cskh']) && !preg_match('/^[\d\s\+\-\.]+$/', $data['sdt_cskh'])) {
            $errors[] = 'SĐT CSKH chỉ được chứa số, dấu +, dấu -, dấu cách.';
        }

        // Validate meta_title length
        if (!empty($data['meta_title']) && mb_strlen($data['meta_title']) > 70) {
            $errors[] = 'Meta Title nên dưới 70 ký tự (hiện tại: ' . mb_strlen($data['meta_title']) . ' ký tự).';
        }

        // Validate meta_description length
        if (!empty($data['meta_description']) && mb_strlen($data['meta_description']) > 170) {
            $errors[] = 'Meta Description nên dưới 170 ký tự (hiện tại: ' . mb_strlen($data['meta_description']) . ' ký tự).';
        }

        // Validate mã màu HEX
        if (!empty($data['mau_thuong_hieu']) && !preg_match('/^#[0-9A-Fa-f]{6}$/', $data['mau_thuong_hieu'])) {
            $errors[] = 'Mã màu thương hiệu phải đúng định dạng HEX (ví dụ: #6B0D18).';
        }

        // Validate URL cho mạng xã hội
        $urlFields = ['facebook', 'tiktok', 'shopee', 'youtube'];
        foreach ($urlFields as $field) {
            if (!empty($data[$field]) && !filter_var($data[$field], FILTER_VALIDATE_URL)) {
                $labels = [
                    'facebook' => 'Facebook',
                    'tiktok' => 'TikTok',
                    'shopee' => 'Shopee',
                    'youtube' => 'YouTube'
                ];
                $errors[] = "Link {$labels[$field]} không đúng định dạng URL.";
            }
        }

        return $errors;
    }

    /**
     * Sanitize giá trị trước khi lưu
     */
    private function sanitizeValue(string $key, $value): string
    {
        $value = is_string($value) ? trim($value) : (string) $value;

        // Các trường boolean (0/1)
        $booleanKeys = ['chi_ban_online', 'hien_thi_phap_ly', 'zalo_active', 'facebook_active', 'tiktok_active', 'shopee_active', 'youtube_active'];
        if (in_array($key, $booleanKeys)) {
            return $value ? '1' : '0';
        }

        // XSS protection cho các trường text
        $htmlAllowedKeys = ['google_map_iframe']; // Cho phép HTML cho iframe
        if (!in_array($key, $htmlAllowedKeys)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        return $value;
    }

    /**
     * Upload ảnh cho cửa hàng (logo, favicon, social share)
     * @param array $file $_FILES element
     * @param string $type Loại ảnh: 'logo_chinh', 'logo_toi', 'favicon', 'social_share_image'
     * @return string URL ảnh đã upload
     * @throws Exception
     */
    public function uploadImage(array $file, string $type): string
    {
        // Validate type
        $allowedTypes = ['logo_chinh', 'logo_toi', 'favicon', 'social_share_image'];
        if (!in_array($type, $allowedTypes)) {
            throw new Exception('Loại ảnh không hợp lệ.');
        }

        // Validate file upload error
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => 'File vượt quá giới hạn upload_max_filesize.',
                UPLOAD_ERR_FORM_SIZE => 'File vượt quá giới hạn MAX_FILE_SIZE.',
                UPLOAD_ERR_PARTIAL => 'File chỉ được upload một phần.',
                UPLOAD_ERR_NO_FILE => 'Không có file nào được chọn.',
                UPLOAD_ERR_NO_TMP_DIR => 'Thiếu thư mục tạm.',
                UPLOAD_ERR_CANT_WRITE => 'Không thể ghi file.',
            ];
            throw new Exception($errorMessages[$file['error']] ?? 'Lỗi upload file không xác định.');
        }

        // Validate file type
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml', 'image/x-icon', 'image/vnd.microsoft.icon'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $allowedMimes)) {
            throw new Exception('Định dạng file không hỗ trợ. Chấp nhận: JPG, PNG, GIF, WebP, SVG, ICO.');
        }

        // Validate file size (tối đa 5MB)
        $maxSize = 5 * 1024 * 1024;
        if ($file['size'] > $maxSize) {
            throw new Exception('File không được vượt quá 5MB.');
        }

        // Tạo thư mục upload
        $uploadDir = __DIR__ . '/../../../public/uploads/store/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Xóa ảnh cũ nếu có
        $oldUrl = $this->cauHinhModel->get($type, '');
        if (!empty($oldUrl)) {
            $this->deleteOldImage($oldUrl);
        }

        // Tạo tên file unique
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION) ?: 'png';
        $filename = $type . '_' . time() . '_' . uniqid() . '.' . strtolower($ext);

        // Upload file
        $destination = $uploadDir . $filename;
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new Exception('Không thể lưu file. Kiểm tra quyền thư mục uploads.');
        }

        // Trả về URL
        $url = APP_URL . '/public/uploads/store/' . $filename;

        // Lưu URL vào cấu hình
        $this->cauHinhModel->set($type, $url);

        return $url;
    }

    /**
     * Xóa ảnh đã upload khi bị thay thế
     */
    public function deleteOldImage(string $url): void
    {
        if (empty($url)) return;

        // Trích xuất đường dẫn file từ URL
        $baseUrl = APP_URL . '/public/uploads/store/';
        if (strpos($url, $baseUrl) !== 0) return;

        $filename = str_replace($baseUrl, '', $url);
        $filepath = __DIR__ . '/../../../public/uploads/store/' . $filename;

        if (file_exists($filepath) && is_file($filepath)) {
            unlink($filepath);
        }
    }

    /**
     * Xóa ảnh theo type (key cấu hình) và xóa giá trị trong DB
     */
    public function removeImage(string $type): bool
    {
        $allowedTypes = ['logo_chinh', 'logo_toi', 'favicon', 'social_share_image'];
        if (!in_array($type, $allowedTypes)) {
            return false;
        }

        $oldUrl = $this->cauHinhModel->get($type, '');
        if (!empty($oldUrl)) {
            $this->deleteOldImage($oldUrl);
        }

        $this->cauHinhModel->set($type, '');
        return true;
    }

    /**
     * Tính phần trăm hoàn thiện hồ sơ cửa hàng
     * @param array $config Associative array config
     * @return array ['percent' => int, 'completed' => [...], 'missing' => [...]]
     */
    public function calculateCompletionStatus(array $config): array
    {
        $groups = [
            'basic' => [
                'label' => 'Thông tin cơ bản',
                'icon' => 'mdi:store-edit-outline',
                'check' => !empty($config['ten_cua_hang']) && !empty($config['hotline_chinh']) && !empty($config['email'])
            ],
            'branding' => [
                'label' => 'Logo & Thương hiệu',
                'icon' => 'mdi:image-outline',
                'check' => !empty($config['logo_chinh'])
            ],
            'address' => [
                'label' => 'Địa chỉ cửa hàng',
                'icon' => 'mdi:map-marker-outline',
                'check' => ($config['chi_ban_online'] ?? '0') === '1'
                    || (!empty($config['tinh_thanh']) && !empty($config['dia_chi_chi_tiet']))
            ],
            'social' => [
                'label' => 'Kênh liên hệ',
                'icon' => 'mdi:share-variant-outline',
                'check' => (($config['zalo_active'] ?? '0') === '1' && !empty($config['zalo']))
                    || (($config['facebook_active'] ?? '0') === '1' && !empty($config['facebook']))
                    || (($config['tiktok_active'] ?? '0') === '1' && !empty($config['tiktok']))
                    || (($config['shopee_active'] ?? '0') === '1' && !empty($config['shopee']))
                    || (($config['youtube_active'] ?? '0') === '1' && !empty($config['youtube']))
            ],
            'seo' => [
                'label' => 'Thông tin SEO',
                'icon' => 'mdi:google',
                'check' => !empty($config['meta_title']) && !empty($config['meta_description'])
            ],
            'map' => [
                'label' => 'Bản đồ Google',
                'icon' => 'mdi:map',
                'check' => ($config['chi_ban_online'] ?? '0') === '1'
                    || !empty($config['google_map_iframe'])
            ],
        ];

        $completed = [];
        $missing = [];

        foreach ($groups as $key => $group) {
            $item = [
                'key' => $key,
                'label' => $group['label'],
                'icon' => $group['icon'],
                'done' => $group['check']
            ];

            if ($group['check']) {
                $completed[] = $item;
            } else {
                $missing[] = $item;
            }
        }

        $total = count($groups);
        $completedCount = count($completed);
        $percent = $total > 0 ? round(($completedCount / $total) * 100) : 0;

        return [
            'percent' => $percent,
            'total' => $total,
            'completed_count' => $completedCount,
            'completed' => $completed,
            'missing' => $missing,
            'all' => array_merge($completed, $missing)
        ];
    }
}
