<?php

namespace App\Controllers\User;

use App\Core\Controller;

class KhuyenMaiController extends Controller {
    public function index() {
        $khuyenMaiService = new \App\Services\User\KhuyenMaiService();

        $data = [
            'tieu_de' => 'Khuyến Mãi - Săn Ưu Đãi Trang Sức Phong Thuỷ',
            'trang_hien_tai' => 'khuyen_mai',
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Khuyến mãi', 'url' => APP_URL . '/khuyen-mai']
            ],
            // Dynamic data
            'vouchers_noi_bat' => $khuyenMaiService->getVouchersForDisplay(8),
            'flash_sale' => $khuyenMaiService->getFlashSaleProducts(4),
            'san_pham_giam_gia' => $khuyenMaiService->getDiscountedProducts(8),
            'hang_thanh_vien' => $khuyenMaiService->getMembershipTiers(),
            'quy_tac_freeship' => $khuyenMaiService->getFreeshipRules(),
            'combo_qua_tang' => $khuyenMaiService->getGiftCombos(3),
            'km_end_date' => $khuyenMaiService->getPromotionEndDate(),
            'saved_vouchers' => !empty($_SESSION['user_id']) ? $khuyenMaiService->getSavedVoucherIds($_SESSION['user_id']) : [],
        ];
        
        $this->view('khuyen_mai', $data);
    }

    public function saveVoucher() {
        header('Content-Type: application/json');
        
        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để lưu mã ưu đãi.']);
            return;
        }

        $userId = $_SESSION['user_id'];
        $voucherId = $_POST['voucher_id'] ?? '';

        if (empty($voucherId)) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
            return;
        }

        $khuyenMaiService = new \App\Services\User\KhuyenMaiService();
        $result = $khuyenMaiService->saveUserVoucher($userId, $voucherId);

        echo json_encode($result);
    }
}

