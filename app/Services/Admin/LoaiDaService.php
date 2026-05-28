<?php
namespace App\Services\Admin;

use App\Models\LoaiDaModel;
use Exception;

class LoaiDaService
{
    private $loaiDaModel;

    public function __construct()
    {
        $this->loaiDaModel = new LoaiDaModel();
    }

    public function getAdminStoneData($filters = [], $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        
        $totalItems = $this->loaiDaModel->demDanhSach($filters);
        $totalPages = ceil($totalItems / $limit);
        
        $stones = $this->loaiDaModel->layDanhSach($filters, $limit, $offset);

        // Format data
        foreach ($stones as &$stone) {
            $stone['trang_thai'] = $stone['trang_thai'] == 1 ? 'Đang hiển thị' : 'Đang ẩn';
            $stone['mau_sac'] = [
                'ten' => $stone['mau_sac_ten'] ?: 'Chưa cập nhật',
                'hex' => $stone['mau_sac_hex'] ?: '#e5e7eb'
            ];
            if (!empty($stone['hinh_anh'])) {
                $stone['hinh_anh_url'] = APP_URL . '/public/uploads/loai_da/' . $stone['hinh_anh'];
            } else {
                $stone['hinh_anh_url'] = null;
            }
            
            // Format ngày
            if (!empty($stone['ngay_cap_nhat'])) {
                $stone['ngay_cap_nhat_format'] = date('d/m/Y H:i', strtotime($stone['ngay_cap_nhat']));
            }
        }

        return [
            'list' => $stones,
            'pagination' => [
                'total_items' => $totalItems,
                'total_pages' => $totalPages,
                'page' => $page,
                'limit' => $limit
            ]
        ];
    }

    public function layThongKe()
    {
        $allStones = $this->loaiDaModel->layDanhSach([], 1000, 0);
        $total = count($allStones);
        $hienThi = count(array_filter($allStones, fn($s) => $s['trang_thai'] === 'Đang hiển thị'));
        $dangAn = count(array_filter($allStones, fn($s) => $s['trang_thai'] === 'Đang ẩn'));
        $coSp = count(array_filter($allStones, fn($s) => $s['so_san_pham'] > 0));
        $chuaCoSp = count(array_filter($allStones, fn($s) => $s['so_san_pham'] == 0));
        
        // Find most used stone
        $mostUsed = 'N/A';
        $maxSp = -1;
        foreach ($allStones as $s) {
            if ($s['so_san_pham'] > $maxSp) {
                $maxSp = $s['so_san_pham'];
                $mostUsed = $s['ten_loai_da'];
            }
        }

        return [
            'tong_loai' => $total,
            'dang_hien_thi' => $hienThi,
            'dang_an' => $dangAn,
            'co_san_pham' => $coSp,
            'chua_co_sp' => $chuaCoSp,
            'dung_nhieu_nhat' => $maxSp > 0 ? $mostUsed : 'Chưa có'
        ];
    }

    public function saveStone($data, $file = null)
    {
        $isEdit = !empty($data['id']);
        
        if (!$isEdit) {
            $data['id'] = $this->generateUUID();
        }

        if (empty($data['slug']) && !empty($data['ten_loai_da'])) {
            $data['slug'] = $this->createSlug($data['ten_loai_da']);
        }
        
        if (empty($data['ma_loai_da'])) {
            $data['ma_loai_da'] = strtoupper(substr(md5($data['id']), 0, 8));
        }

        // Handle File Upload
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/loai_da/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filename = uniqid() . '_' . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                $data['hinh_anh'] = $filename;
            }
        }

        if ($isEdit) {
            return $this->loaiDaModel->capNhat($data['id'], $data);
        } else {
            return $this->loaiDaModel->themMoi($data);
        }
    }

    public function deleteStone($id)
    {
        return $this->loaiDaModel->xoaMem($id);
    }

    public function doiTrangThai($id)
    {
        return $this->loaiDaModel->doiTrangThai($id);
    }

    public function getStoneById($id)
    {
        return $this->loaiDaModel->timTheoId($id);
    }

    public function getFormDependencies()
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT id, ten_menh, mau_sac_hop FROM menh_phong_thuy ORDER BY ten_menh ASC");
        return [
            'menh_list' => $stmt->fetchAll(\PDO::FETCH_ASSOC)
        ];
    }

    private function generateUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    private function createSlug($string) {
        $string = $this->removeAccents($string);
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9\-]/', '-', $string);
        $string = preg_replace('/-+/', '-', $string);
        return trim($string, '-');
    }

    private function removeAccents($string) {
        $utf8 = [
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        ];
        foreach ($utf8 as $ascii => $uni) {
            $string = preg_replace("/($uni)/i", $ascii, $string);
        }
        return $string;
    }
}
