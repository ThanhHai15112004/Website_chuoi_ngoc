<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class SanPhamController extends Controller {
    public function index() {
        $service = new \App\Services\Admin\SanPhamService();
        $filters = $_GET;
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 10;

        $data = $service->getAdminProductData($filters, $page, $limit);
        $data['tieu_de'] = 'Quản lý sản phẩm - Chuỗi Ngọc Phong Thủy';
        $data['current_page'] = 'san_pham';

        $this->view('admin_san_pham', $data, 'admin');
    }

    public function show($id) {
        $service = new \App\Services\Admin\SanPhamService();
        $product = $service->getProductById($id);
        
        if (!$product) {
            header('Location: ' . APP_URL . '/admin/san-pham');
            exit;
        }

        $formattedProduct = [
            'id' => $product['id'],
            'ma_sp' => $product['ma_sp'],
            'ten_sp' => $product['ten_sp'],
            'trang_thai' => $product['trang_thai'] == 1 ? 'Đang hiển thị' : 'Đang ẩn',
            'danh_muc' => $product['ten_danh_muc'] ?? 'Không rõ',
            'loai_da' => $product['ten_loai_da'] ?? 'Không rõ',
            'menh' => $product['ten_menh'] ? [$product['ten_menh']] : [],
            'gia_ban' => (float)$product['gia_ban'],
            'gia_khuyen_mai' => $product['gia_khuyen_mai'] ? (float)$product['gia_khuyen_mai'] : null,
            'ton_kho' => (int)$product['tong_ton_kho'],
            'da_ban' => 0,
            'doanh_thu' => 0,
            'ngay_tao' => $product['ngay_tao'],
            'ngay_cap_nhat' => date('d/m/Y H:i', strtotime($product['ngay_tao'])),
            'anh_chinh' => strpos($product['hinh_anh_chinh'], 'http') === 0 ? $product['hinh_anh_chinh'] : APP_URL . '/public' . $product['hinh_anh_chinh'],
            'anh_phu' => array_map(function($path) {
                return strpos($path, 'http') === 0 ? $path : APP_URL . '/public' . $path;
            }, $product['anh_phu'] ?? []),
            'mo_ta_ngan' => $product['mo_ta_ngan'] ?? '',
            'mo_ta_chi_tiet' => $product['mo_ta_chi_tiet'] ?? '',
            'bien_the' => []
        ];

        $data = [
            'tieu_de' => 'Chi tiết sản phẩm - ' . $product['ten_sp'],
            'current_page' => 'chi_tiet_san_pham',
            'san_pham' => $formattedProduct,
            'danh_gia' => [],
            'lich_su_kho' => []
        ];

        $this->view('admin_san_pham_chi_tiet', $data, 'admin');
    }

    public function create() {
        $service = new \App\Services\Admin\SanPhamService();
        $formData = $service->getFormData();
        
        $data = [
            'tieu_de' => 'Thêm sản phẩm mới',
            'current_page' => 'them_san_pham',
            'is_edit' => false,
            'danh_muc_list' => $formData['danh_muc_list'],
            'loai_da_list' => $formData['loai_da_list'],
            'menh_list' => $formData['menh_list'],
            'san_pham' => null
        ];
        $this->view('admin_san_pham_form', $data, 'admin');
    }

    public function edit($id) {
        $service = new \App\Services\Admin\SanPhamService();
        $product = $service->getProductById($id);
        
        if (!$product) {
            header('Location: ' . APP_URL . '/admin/san-pham');
            exit;
        }

        $formData = $service->getFormData();
        
        $sp_view = $product;
        $sp_view['danh_muc'] = $product['id_danh_muc'];
        $sp_view['loai_da'] = $product['id_loai_da'];
        $sp_view['menh'] = [$product['id_menh_phong_thuy']];
        $sp_view['ton_kho'] = $product['tong_ton_kho'];
        $sp_view['anh_chinh'] = strpos($product['hinh_anh_chinh'], 'http') === 0 ? $product['hinh_anh_chinh'] : APP_URL . '/public' . $product['hinh_anh_chinh'];
        $sp_view['anh_phu'] = array_map(function($path) {
            return strpos($path, 'http') === 0 ? $path : APP_URL . '/public' . $path;
        }, $product['anh_phu'] ?? []);

        $data = [
            'tieu_de' => 'Chỉnh sửa sản phẩm',
            'current_page' => 'san_pham',
            'is_edit' => true,
            'danh_muc_list' => $formData['danh_muc_list'],
            'loai_da_list' => $formData['loai_da_list'],
            'menh_list' => $formData['menh_list'],
            'san_pham' => $sp_view
        ];
        $this->view('admin_san_pham_form', $data, 'admin');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\SanPhamService();
            $service->saveProduct($_POST, $_FILES);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/san-pham');
            header("Location: $referer");
            exit;
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\SanPhamService();
            $service->saveProduct($_POST, $_FILES, $id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/san-pham');
            header("Location: $referer");
            exit;
        }
    }

    public function toggleStatus($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\SanPhamService();
            $service->toggleProductStatus($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/san-pham');
            header("Location: $referer");
            exit;
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\SanPhamService();
            $service->deleteProduct($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/san-pham');
            header("Location: $referer");
            exit;
        }
    }

    public function duplicate($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\SanPhamService();
            $service->duplicateProduct($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/san-pham');
            header("Location: $referer");
            exit;
        }
    }
}
