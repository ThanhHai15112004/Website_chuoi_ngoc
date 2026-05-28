<?php

namespace App\Services\Admin;

use App\Models\SanPhamModel;
use App\Models\DanhMucModel;
use App\Models\LoaiDaModel;
use App\Models\MenhPhongThuyModel;

class SanPhamService
{
    private $sanPhamModel;
    private $danhMucModel;
    private $loaiDaModel;
    private $menhModel;

    public function __construct()
    {
        $this->sanPhamModel = new SanPhamModel();
        $this->danhMucModel = new DanhMucModel();
        $this->loaiDaModel = new LoaiDaModel();
        $this->menhModel = new MenhPhongThuyModel();
    }

    public function getAdminProductData($filters, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        // 1. Get statistics
        $stats = $this->sanPhamModel->getStats();
        // Cung cấp các gán default nếu db rỗng
        $thong_ke = [
            'tong_san_pham' => $stats['tong_san_pham'] ?? 0,
            'dang_hien_thi' => $stats['dang_hien_thi'] ?? 0,
            'sap_het_hang' => $stats['sap_het_hang'] ?? 0,
            'het_hang' => $stats['het_hang'] ?? 0,
            'dang_giam_gia' => $stats['dang_giam_gia'] ?? 0,
            'dang_an' => $stats['dang_an'] ?? 0,
        ];

        // 2. Get Filter Lists
        $danh_muc_db = $this->danhMucModel->getAll();
        $danh_muc_list = array_column($danh_muc_db, 'ten_danh_muc');

        $loai_da_db = $this->loaiDaModel->getAll();
        $loai_da_list = array_column($loai_da_db, 'ten_loai_da');

        $menh_db = $this->menhModel->getAll();
        $menh_list = array_column($menh_db, 'ten_menh');

        // 3. Get Products
        $productsRaw = $this->sanPhamModel->getList($filters, $limit, $offset);
        $totalProducts = $this->sanPhamModel->countList($filters);

        $san_pham_list = [];
        foreach ($productsRaw as $sp) {
            $gia_ban = (float)$sp['gia_ban'];
            $gia_khuyen_mai = $sp['gia_khuyen_mai'] ? (float)$sp['gia_khuyen_mai'] : null;
            $ton_kho = (int)$sp['tong_ton_kho'];

            // Tính trạng thái tồn kho
            $tkStatus = \App\Constants\SanPhamConstants::TXT_TON_KHO_CON_HANG;
            if ($ton_kho == 0) {
                $tkStatus = \App\Constants\SanPhamConstants::TXT_TON_KHO_HET_HANG;
            } else {
                $nguong = \App\Constants\SanPhamConstants::NGUONG_SAP_HET_MAC_DINH;
                if ($gia_ban >= \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP) $nguong = \App\Constants\SanPhamConstants::NGUONG_SAP_HET_CAO_CAP;
                elseif ($gia_ban < \App\Constants\SanPhamConstants::MUC_GIA_RE) $nguong = \App\Constants\SanPhamConstants::NGUONG_SAP_HET_GIA_RE;
                
                if ($ton_kho <= $nguong) {
                    $tkStatus = \App\Constants\SanPhamConstants::TXT_TON_KHO_SAP_HET;
                }
            }

            // Tính nhãn
            $nhan = [];
            if ($gia_khuyen_mai > 0) $nhan[] = 'Giảm giá';
            if ($sp['luot_xem'] > 50) $nhan[] = 'Bán chạy';
            if (strtotime($sp['ngay_tao']) > strtotime('-30 days')) $nhan[] = 'Mới';
            if ($gia_ban >= \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP) $nhan[] = 'Cao cấp';

            // Định dạng lại array trả về giống cấu trúc mock
            $san_pham_list[] = [
                'id' => $sp['id'],
                'ma_sp' => $sp['ma_sp'],
                'ten_sp' => $sp['ten_sp'],
                'mo_ta_ngan' => $sp['mo_ta_ngan'] ?? 'Chưa có mô tả',
                'anh' => strpos($sp['hinh_anh_chinh'], 'http') === 0 ? $sp['hinh_anh_chinh'] : APP_URL . '/public' . $sp['hinh_anh_chinh'],
                'danh_muc' => $sp['ten_danh_muc'] ?? 'Không rõ',
                'loai_da' => $sp['ten_loai_da'] ?? 'Không rõ',
                'menh' => $sp['ten_menh'] ? [$sp['ten_menh']] : [], 
                'gia_ban' => $gia_ban,
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'ton_kho' => $ton_kho,
                'trang_thai_ton_kho' => $tkStatus,
                'da_ban' => 0, 
                'trang_thai' => $sp['trang_thai'] == \App\Constants\SanPhamConstants::TRANG_THAI_HIEN_THI ? \App\Constants\SanPhamConstants::TXT_TRANG_THAI_HIEN_THI : \App\Constants\SanPhamConstants::TXT_TRANG_THAI_AN,
                'nhan' => $nhan,
                'ngay_cap_nhat' => date('d/m/Y H:i', strtotime($sp['ngay_tao']))
            ];
        }

        return [
            'thong_ke' => $thong_ke,
            'danh_muc_list' => $danh_muc_list,
            'loai_da_list' => $loai_da_list,
            'menh_list' => $menh_list,
            'san_pham_list' => $san_pham_list,
            'pagination' => [
                'total' => $totalProducts,
                'page' => $page,
                'limit' => $limit,
                'total_pages' => ceil($totalProducts / $limit)
            ]
        ];
    }

    public function getFormData()
    {
        return [
            'danh_muc_list' => $this->danhMucModel->getAll(),
            'loai_da_list' => $this->loaiDaModel->getAll(),
            'menh_list' => $this->menhModel->getAll(),
        ];
    }

    public function getProductById($id)
    {
        $product = $this->sanPhamModel->findById($id);
        if ($product) {
            $product['anh_phu'] = $this->sanPhamModel->getProductImages($id);
            if (!empty($product['id_menh_phong_thuy'])) {
                $product['menh'] = explode(',', $product['id_menh_phong_thuy']);
            } else {
                $product['menh'] = [];
            }
            $product['bien_the_thuc_te'] = $this->sanPhamModel->getBienTheByProductId($id);
        }
        return $product;
    }

    public function saveProduct($data, $files, $id = null)
    {
        $productData = [
            'ten_sp' => $data['ten_sp'],
            'ma_sp' => $data['ma_sp'] ?: ('SP' . time()),
            'id_danh_muc' => $data['danh_muc'],
            'id_loai_da' => $data['loai_da'],
            'id_menh_phong_thuy' => !empty($data['menh']) && is_array($data['menh']) ? implode(',', $data['menh']) : null, 
            'gia_ban' => (float)$data['gia_ban'],
            'mo_ta_ngan' => $data['mo_ta_ngan'] ?? '',
            'mo_ta_chi_tiet' => $data['mo_ta_chi_tiet'] ?? '',
            'trang_thai' => isset($data['trang_thai']) ? 1 : 0
        ];

        if (isset($data['gia_khuyen_mai'])) {
            $productData['gia_khuyen_mai'] = !empty($data['gia_khuyen_mai']) ? (float)$data['gia_khuyen_mai'] : null;
        }
        
        if (isset($data['ton_kho'])) {
            $productData['tong_ton_kho'] = (int)$data['ton_kho'];
        }

        if (!$id) {
            $productData['id'] = 'sp_' . uniqid();
            $productData['slug'] = $this->createSlug($productData['ten_sp']) . '-' . time();
            $productData['ngay_tao'] = date('Y-m-d H:i:s');
            $productData['luot_xem'] = 0;
            $productData['da_xoa'] = 0;
            if (!isset($productData['tong_ton_kho'])) $productData['tong_ton_kho'] = 0;
            if (!isset($productData['gia_khuyen_mai'])) $productData['gia_khuyen_mai'] = null;
        }

        // Xử lý upload ảnh chính (nếu có)
        if (isset($files['anh_chinh']) && $files['anh_chinh']['error'] === 0) {
            $uploadDir = __DIR__ . '/../../../public/uploads/san_pham/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileName = time() . '_' . basename($files['anh_chinh']['name']);
            if (move_uploaded_file($files['anh_chinh']['tmp_name'], $uploadDir . $fileName)) {
                $productData['hinh_anh_chinh'] = '/uploads/san_pham/' . $fileName;
            }
        } elseif (!$id) {
            $productData['hinh_anh_chinh'] = 'https://ui-avatars.com/api/?name=' . urlencode(substr($productData['ten_sp'], 0, 2)) . '&background=random';
        }

        if ($id) {
            $success = $this->sanPhamModel->update($id, $productData);
            $productId = $id;
        } else {
            $success = $this->sanPhamModel->insert($productData);
            $productId = $productData['id'];
        }

        // Xử lý upload ảnh phụ (nếu có)
        if ($success && isset($files['anh_phu']) && !empty($files['anh_phu']['name'][0])) {
            $this->sanPhamModel->deleteProductImages($productId); // Xóa ảnh cũ
            $uploadDir = __DIR__ . '/../../../public/uploads/san_pham/';
            
            foreach ($files['anh_phu']['tmp_name'] as $key => $tmpName) {
                if ($files['anh_phu']['error'][$key] === 0) {
                    $fileName = time() . '_' . $key . '_' . basename($files['anh_phu']['name'][$key]);
                    if (move_uploaded_file($tmpName, $uploadDir . $fileName)) {
                        $path = '/uploads/san_pham/' . $fileName;
                        $this->sanPhamModel->insertProductImage($productId, $path);
                    }
                }
            }
        }

        // Xử lý Biến thể (Kích thước / Màu sắc)
        if ($success) {
            $this->sanPhamModel->deleteBienThe($productId);
            
            $tongTonKhoBienThe = 0;
            if (!empty($data['bien_the']['thuoc_tinh'])) {
                $thuoc_tinh_arr = $data['bien_the']['thuoc_tinh'];
                $gia_cong_them_arr = $data['bien_the']['gia_cong_them'];
                $so_luong_ton_arr = $data['bien_the']['so_luong_ton'];
                
                foreach ($thuoc_tinh_arr as $i => $thuoc_tinh) {
                    $thuoc_tinh = trim($thuoc_tinh);
                    if ($thuoc_tinh !== '') {
                        $so_luong = (int)($so_luong_ton_arr[$i] ?? 0);
                        $gia_cong = (float)($gia_cong_them_arr[$i] ?? 0);
                        
                        $this->sanPhamModel->insertBienThe($productId, $thuoc_tinh, $so_luong, $gia_cong);
                        $tongTonKhoBienThe += $so_luong;
                    }
                }
            }
            
            // Cập nhật lại tổng tồn kho nếu có biến thể
            if ($tongTonKhoBienThe > 0 || !empty($data['bien_the']['thuoc_tinh'])) {
                $this->sanPhamModel->update($productId, ['tong_ton_kho' => $tongTonKhoBienThe]);
            }
        }

        return $success;
    }

    public function toggleProductStatus($id)
    {
        $product = $this->sanPhamModel->findById($id);
        if ($product) {
            $newStatus = $product['trang_thai'] == 1 ? 0 : 1;
            return $this->sanPhamModel->updateStatus($id, $newStatus);
        }
        return false;
    }

    public function deleteProduct($id)
    {
        return $this->sanPhamModel->softDelete($id);
    }

    private function createSlug($string)
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
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a', 'e', 'i', 'o', 'u', 'y', 'd',
            'A', 'E', 'I', 'O', 'U', 'Y', 'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return trim($string, '-');
    }

    public function duplicateProduct($id)
    {
        $product = $this->sanPhamModel->findById($id);
        if (!$product) {
            return false;
        }

        $newId = 'sp_' . uniqid();
        $newName = $product['ten_sp'] . ' - Copy';
        
        $newProductData = [
            'id' => $newId,
            'ma_sp' => 'SP' . time(),
            'ten_sp' => $newName,
            'slug' => $this->createSlug($newName) . '-' . time(),
            'id_danh_muc' => $product['id_danh_muc'],
            'id_loai_da' => $product['id_loai_da'],
            'id_menh_phong_thuy' => $product['id_menh_phong_thuy'],
            'gia_nhap' => $product['gia_nhap'],
            'gia_ban' => $product['gia_ban'],
            'gia_khuyen_mai' => $product['gia_khuyen_mai'],
            'mo_ta_ngan' => $product['mo_ta_ngan'],
            'mo_ta_chi_tiet' => $product['mo_ta_chi_tiet'],
            'hinh_anh_chinh' => $product['hinh_anh_chinh'],
            'tong_ton_kho' => $product['tong_ton_kho'],
            'luot_xem' => 0,
            'trang_thai' => 0, // Mặc định ẩn để admin chỉnh sửa trước khi hiện
            'ngay_tao' => date('Y-m-d H:i:s'),
            'da_xoa' => 0
        ];

        $success = $this->sanPhamModel->insert($newProductData);

        if ($success) {
            $images = $this->sanPhamModel->getProductImages($id);
            foreach ($images as $img) {
                // $img đang là đường dẫn chuỗi
                $this->sanPhamModel->insertProductImage($newId, $img);
            }
            return true;
        }

        return false;
    }
}
