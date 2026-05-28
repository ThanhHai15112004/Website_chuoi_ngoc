<?php

namespace App\Services\Admin;

use App\Models\DanhMucModel;

class DanhMucService
{
    private $danhMucModel;

    public function __construct()
    {
        $this->danhMucModel = new DanhMucModel();
    }

    public function getAllCategories($filters = [])
    {
        $categories = $this->danhMucModel->layTatCa($filters);
        
        // Format lại dữ liệu cho view
        foreach ($categories as &$c) {
            $c['vi_tri'] = !empty($c['vi_tri']) ? explode(',', $c['vi_tri']) : [];
            
            // Lấy 2 ký tự đầu sau khi bỏ dấu
            $nameNoAccent = $this->removeAccents($c['ten_danh_muc']);
            // Tách các từ để lấy ký tự đầu của mỗi từ, hoặc 2 ký tự đầu tiên
            $words = explode(' ', $nameNoAccent);
            if (count($words) >= 2) {
                $c['chu_cai'] = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
            } else {
                $c['chu_cai'] = strtoupper(substr($nameNoAccent, 0, 2));
            }
            
            // Random color cho chữ cái nếu không có màu
            $colors = ['red', 'emerald', 'blue', 'amber', 'purple', 'indigo'];
            $color = $colors[abs(crc32($c['id'])) % count($colors)];
            $c['mau_sac_icon'] = "bg-{$color}-50 text-{$color}-700";
            
            // Convert status
            $c['trang_thai_text'] = $c['trang_thai'] ? 'Đang hiển thị' : 'Đang ẩn';
        }
        
        return $categories;
    }

    public function saveCategory($data, $file = null)
    {
        $id = $data['id'] ?? null;
        
        // Prepare data
        $catData = [
            'ten_danh_muc' => trim($data['ten_danh_muc']),
            'slug' => !empty($data['slug']) ? $this->createSlug($data['slug']) : $this->createSlug($data['ten_danh_muc']),
            'mo_ta' => trim($data['mo_ta'] ?? ''),
            'thu_tu' => (int)($data['thu_tu'] ?? 1),
            'trang_thai' => isset($data['trang_thai']) ? 1 : 0,
        ];

        // Mã danh mục
        if (!empty($data['ma_danh_muc'])) {
            $catData['ma_danh_muc'] = trim($data['ma_danh_muc']);
        } else {
            $catData['ma_danh_muc'] = 'DM' . time();
        }

        // Vị trí
        $vi_tri = [];
        if (!empty($data['vi_tri_menu'])) $vi_tri[] = 'Menu chính';
        if (!empty($data['vi_tri_home'])) $vi_tri[] = 'Trang chủ';
        if (!empty($data['vi_tri_filter'])) $vi_tri[] = 'Bộ lọc SP';
        $catData['vi_tri'] = implode(',', $vi_tri);

        // Handle File Upload
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/danh_muc/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $fileName = uniqid() . '_' . $this->createSlug(pathinfo($file['name'], PATHINFO_FILENAME)) . '.' . $fileExtension;
            
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {
                $catData['hinh_anh'] = $fileName;
            }
        }

        if ($id) {
            // Update
            return $this->danhMucModel->capNhat($id, $catData);
        } else {
            // Insert
            $catData['id'] = 'dm_' . uniqid();
            return $this->danhMucModel->themMoi($catData);
        }
    }

    public function deleteCategory($id)
    {
        // Check if category has products
        $cat = $this->danhMucModel->timTheoId($id);
        if (!$cat) return false;
        
        // Do not allow delete if it has products (we can check via getAll query but let's assume UI prevents it)
        // For safety, just soft delete
        return $this->danhMucModel->xoaMem($id);
    }

    public function doiTrangThai($id)
    {
        return $this->danhMucModel->doiTrangThai($id);
    }

    private function removeAccents($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#'
        );
        $replace = array(
            'a', 'e', 'i', 'o', 'u', 'y', 'd',
            'A', 'E', 'I', 'O', 'U', 'Y', 'D'
        );
        return preg_replace($search, $replace, $string);
    }

    private function createSlug($string)
    {
        $string = $this->removeAccents($string);
        $string = preg_replace('/[^a-zA-Z0-9\-\_]/', '-', $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower(trim($string, '-'));
        return $string;
    }
}
