<?php
namespace App\Services\Admin;

use App\Models\DanhGiaModel;

class BinhLuanService
{
    private $danhGiaModel;

    public function __construct()
    {
        $this->danhGiaModel = new DanhGiaModel();
    }

    public function getAdminReviewsData($filters = [], $page = 1, $limit = 10)
    {
        $danhGiaList = $this->danhGiaModel->layTatCa($filters, $page, $limit);
        $total = $this->danhGiaModel->countAll($filters);
        $stats = $this->danhGiaModel->layThongKe();

        $reviews = [];
        foreach ($danhGiaList as $dg) {
            // Determine status string for view
            $statusStr = 'cho_duyet';
            if ($dg['trang_thai'] == 1) $statusStr = 'da_duyet';
            if ($dg['trang_thai'] == 2) $statusStr = 'da_an';

            // Process images
            $images = [];
            if (!empty($dg['hinh_anh'])) {
                $images = explode(',', $dg['hinh_anh']);
            }

            // Calculate time ago
            $timeAgo = $this->timeAgo($dg['ngay_tao']);

            $phan_hoi = null;
            if (!empty($dg['phan_hoi_noi_dung'])) {
                $phan_hoi = [
                    'nhan_vien' => $dg['ten_nhan_vien'] ?? 'Admin',
                    'thoi_gian' => $this->timeAgo($dg['phan_hoi_ngay']),
                    'noi_dung' => $dg['phan_hoi_noi_dung']
                ];
            }

            $reviews[] = [
                'id' => $dg['id'],
                'loai' => 'danh_gia',
                'ten_khach' => $dg['ten_khach'],
                'hang_thanh_vien' => $dg['hang_thanh_vien'] ?? 'New',
                'da_mua' => !empty($dg['id_don_hang']),
                'san_pham' => $dg['ten_sp'],
                'ma_sp' => $dg['ma_sp'],
                'anh_sp' => $dg['hinh_anh_chinh'],
                'sao' => $dg['so_sao'],
                'noi_dung' => $dg['noi_dung'],
                'anh_dinh_kem' => $images,
                'trang_thai' => $statusStr,
                'thoi_gian' => $timeAgo,
                'phan_hoi' => $phan_hoi
            ];
        }

        return [
            'thong_ke' => $stats,
            'reviews' => $reviews,
            'pagination' => [
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'total_pages' => ceil($total / $limit)
            ]
        ];
    }

    public function doiTrangThai($id, $action)
    {
        return $this->danhGiaModel->updateStatus($id, $action);
    }

    public function getDetail($id)
    {
        $review = $this->danhGiaModel->getById($id);
        if (!$review) return null;

        $review['ngay_tao_ago'] = $this->timeAgo($review['ngay_tao']);
        
        if (!empty($review['phan_hoi_ngay'])) {
            $review['phan_hoi_ngay_ago'] = $this->timeAgo($review['phan_hoi_ngay']);
        }
        
        if (!empty($review['sdt_khach'])) {
            // Mask phone number: 090123xxxx
            $review['sdt_khach_masked'] = substr($review['sdt_khach'], 0, 6) . 'xxxx';
        } else {
            $review['sdt_khach_masked'] = 'N/A';
        }

        $review['chu_cai_dau'] = mb_substr($review['ten_khach'] ?? '?', 0, 1, 'UTF-8');

        return $review;
    }

    public function reply($id, $content, $adminId)
    {
        return $this->danhGiaModel->updateReply($id, $content, $adminId);
    }

    public function xoa($id)
    {
        return $this->danhGiaModel->xoa($id);
    }

    public function getSettings()
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT gia_tri FROM cau_hinh WHERE ma_cau_hinh = 'review_settings'");
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        $defaultSettings = [
            'auto_approve_stars' => 1,
            'hold_with_image' => 1,
            'blocked_keywords' => 'đồ giả,lừa đảo,kém chất lượng'
        ];

        if ($result && !empty($result['gia_tri'])) {
            $settings = json_decode($result['gia_tri'], true);
            return is_array($settings) ? array_merge($defaultSettings, $settings) : $defaultSettings;
        }
        
        return $defaultSettings;
    }

    public function saveSettings($data)
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        
        $settings = [
            'auto_approve_stars' => isset($data['auto_approve_stars']) ? 1 : 0,
            'hold_with_image' => isset($data['hold_with_image']) ? 1 : 0,
            'blocked_keywords' => $data['blocked_keywords'] ?? ''
        ];
        
        $json = json_encode($settings, JSON_UNESCAPED_UNICODE);
        
        $stmt = $db->prepare("SELECT id FROM cau_hinh WHERE ma_cau_hinh = 'review_settings'");
        $stmt->execute();
        $exists = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($exists) {
            $stmt = $db->prepare("UPDATE cau_hinh SET gia_tri = :val WHERE ma_cau_hinh = 'review_settings'");
            return $stmt->execute(['val' => $json]);
        } else {
            $stmt = $db->prepare("INSERT INTO cau_hinh (id, ma_cau_hinh, ten_cau_hinh, gia_tri, mo_ta) VALUES (:id, 'review_settings', 'Cài đặt đánh giá', :val, 'Cấu hình duyệt tự động và chặn từ khóa')");
            return $stmt->execute(['id' => uniqid('ch_'), 'val' => $json]);
        }
    }

    private function timeAgo($datetime, $full = false) 
    {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'năm',
            'm' => 'tháng',
            'w' => 'tuần',
            'd' => 'ngày',
            'h' => 'giờ',
            'i' => 'phút',
            's' => 'giây',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v;
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
    }
}
