<?php

namespace App\Services\User;

use App\Models\Admin\VoucherModel;
use App\Models\Admin\SanPhamModel;
use App\Models\Admin\HangThanhVienModel;
use App\Models\Admin\QuyTacFreeshipModel;
use App\Models\Admin\KhuyenMaiModel;

class KhuyenMaiService
{
    private $voucherModel;
    private $sanPhamModel;
    private $hangThanhVienModel;
    private $quyTacFreeshipModel;
    private $khuyenMaiModel;

    public function __construct()
    {
        $this->voucherModel = new VoucherModel();
        $this->sanPhamModel = new SanPhamModel();
        $this->hangThanhVienModel = new HangThanhVienModel();
        $this->quyTacFreeshipModel = new QuyTacFreeshipModel();
        $this->khuyenMaiModel = new KhuyenMaiModel();
    }

    public function getVouchersForDisplay($limit = 8)
    {
        $vouchers = $this->voucherModel->getActiveVouchers();
        
        // Sắp xếp ưu tiên các voucher có % giảm hoặc số tiền lớn, còn lượt sử dụng
        usort($vouchers, function($a, $b) {
            // Ưu tiên theo loại giảm: 3 (Freeship), 1 (%), 2 (tiền), 4 (quà)
            return $a['loai_giam'] <=> $b['loai_giam'];
        });

        // Chọn các voucher hiển thị tốt
        $displayVouchers = [];
        $count = 0;
        foreach ($vouchers as $v) {
            if ($v['so_luong'] != -1 && $v['da_dung'] >= $v['so_luong']) {
                continue; // Hết số lượng
            }
            if ($v['loai_giam'] == 1) {
                $v['type'] = 'percent';
                $v['title'] = 'GIẢM ' . $v['gia_tri'] . '%';
            } elseif ($v['loai_giam'] == 2) {
                $v['type'] = 'fixed';
                $v['title'] = 'GIẢM ' . number_format($v['gia_tri'] / 1000, 0) . 'K';
            } elseif ($v['loai_giam'] == 3) {
                $v['type'] = 'shipping';
                $v['title'] = 'FREESHIP';
            } else {
                $v['type'] = 'gift';
                $v['title'] = 'QUÀ TẶNG';
            }
            
            $v['desc'] = $v['ten_chuong_trinh'];
            if ($v['don_toi_thieu'] > 0) {
                $v['desc'] .= ' (Đơn từ ' . number_format($v['don_toi_thieu']/1000, 0) . 'K)';
            }
            $v['date'] = 'HSD: ' . date('d/m/Y', strtotime($v['ngay_ket_thuc']));
            $v['code'] = $v['ma_voucher'];
            
            $displayVouchers[] = $v;
            $count++;
            if ($count >= $limit) break;
        }

        return $displayVouchers;
    }

    public function getFlashSaleProducts($limit = 4)
    {
        $flashSaleData = $this->khuyenMaiModel->getActiveFlashSale();
        if (!$flashSaleData || empty($flashSaleData['san_pham_ap_dung'])) {
            return [];
        }

        $flashSale = [];
        foreach ($flashSaleData['san_pham_ap_dung'] as $sp) {
            $phanTramGiam = 0;
            $gia_khuyen_mai = $sp['gia_ban'];
            
            if ($flashSaleData['kieu_giam'] == 'phan_tram') {
                $gia_khuyen_mai = $sp['gia_ban'] - ($sp['gia_ban'] * $flashSaleData['gia_tri_giam'] / 100);
                $phanTramGiam = $flashSaleData['gia_tri_giam'];
            } elseif ($flashSaleData['kieu_giam'] == 'so_tien') {
                $gia_khuyen_mai = max(0, $sp['gia_ban'] - $flashSaleData['gia_tri_giam']);
                $phanTramGiam = round((($sp['gia_ban'] - $gia_khuyen_mai) / $sp['gia_ban']) * 100);
            } else {
                $gia_khuyen_mai = $flashSaleData['gia_tri_giam'];
                $phanTramGiam = round((($sp['gia_ban'] - $gia_khuyen_mai) / $sp['gia_ban']) * 100);
            }

            // Fake data for flash sale progress
            $da_ban = $sp['so_luong_da_ban'] ?? rand(10, 50);
            $tong_so = max(100, $da_ban + $sp['tong_ton_kho']);

            $flashSale[] = [
                'id' => $sp['id'],
                'ten' => $sp['ten_sp'],
                'hinh_anh' => APP_URL . '/' . ltrim($sp['hinh_anh_chinh'], '/'),
                'gia_cu' => $sp['gia_ban'],
                'gia' => $gia_khuyen_mai,
                'phan_tram_giam' => $phanTramGiam,
                'da_ban' => $da_ban,
                'tong_so' => $tong_so
            ];
        }

        // Sort by phan_tram_giam DESC
        usort($flashSale, function($a, $b) {
            return $b['phan_tram_giam'] <=> $a['phan_tram_giam'];
        });

        return array_slice($flashSale, 0, $limit);
    }

    public function getDiscountedProducts($limit = 8)
    {
        $products = $this->sanPhamModel->layDanhSach([], 100, 0);
        $discounted = [];

        foreach ($products as $sp) {
            if (!empty($sp['gia_khuyen_mai']) && $sp['gia_khuyen_mai'] > 0) {
                $phanTramGiam = round((($sp['gia_ban'] - $sp['gia_khuyen_mai']) / $sp['gia_ban']) * 100);
                
                $discounted[] = [
                    'id' => $sp['id'],
                    'name' => $sp['ten_sp'],
                    'stone' => $sp['ten_loai_da'] ?? 'Đá tự nhiên',
                    'element' => $sp['ten_menh'] ?? 'Tất cả',
                    'rating' => 4.9,
                    'sold' => $sp['luot_xem'] ?? rand(10, 100),
                    'price_old' => $sp['gia_ban'],
                    'price_new' => $sp['gia_khuyen_mai'],
                    'discount' => $phanTramGiam,
                    'image' => APP_URL . '/' . ltrim($sp['hinh_anh_chinh'], '/'),
                    'badge' => ($sp['tong_ton_kho'] < 10) ? 'Sắp hết' : null
                ];
            }
        }

        return array_slice($discounted, 0, $limit);
    }

    public function getMembershipTiers()
    {
        $tiers = $this->hangThanhVienModel->layTatCa();
        $formattedTiers = [];
        
        foreach ($tiers as $tier) {
            $dacQuyen = json_decode($tier['dac_quyen'], true) ?: [];
            
            // Xử lý icon/color theo tên hạng nếu db ko có chuẩn
            $themeBg = 'bg-gray-50';
            $themeText = 'text-gray-600';
            $themeBorder = 'border-gray-200';
            $btnClass = 'border-gray-300 text-gray-600 hover:bg-gray-500 hover:text-white';
            $icon = 'ph:medal-light';
            
            if (strpos(strtolower($tier['ten_hang']), 'đồng') !== false) {
                $icon = 'ph:medal-light';
                $themeBg = 'bg-orange-50';
                $themeText = 'text-orange-700';
                $themeBorder = 'border-orange-200';
                $btnClass = 'border-orange-300 text-orange-700 hover:bg-orange-600 hover:text-white hover:border-orange-600';
            } elseif (strpos(strtolower($tier['ten_hang']), 'bạc') !== false) {
                $icon = 'ph:medal-light';
                $themeBg = 'bg-slate-50';
                $themeText = 'text-slate-500';
                $themeBorder = 'border-slate-200';
                $btnClass = 'border-slate-300 text-slate-600 hover:bg-slate-500 hover:text-white hover:border-slate-500';
            } elseif (strpos(strtolower($tier['ten_hang']), 'vàng') !== false) {
                $icon = 'ph:crown-simple-light';
                $themeBg = 'bg-[#D4AF37]/10';
                $themeText = 'text-[#D4AF37]';
                $themeBorder = 'border-[#D4AF37]/30';
                $btnClass = 'border-[#D4AF37] text-[#B8860B] hover:bg-[#D4AF37] hover:text-white hover:border-[#D4AF37]';
            } elseif (strpos(strtolower($tier['ten_hang']), 'kim cương') !== false) {
                $icon = 'ph:diamond-light';
                $themeBg = 'bg-cyan-50';
                $themeText = 'text-cyan-600';
                $themeBorder = 'border-cyan-200';
                $btnClass = 'border-cyan-300 text-cyan-700 hover:bg-cyan-600 hover:text-white hover:border-cyan-600';
            }
            
            $formattedTiers[] = [
                'name' => strtoupper($tier['ten_hang']),
                'subtitle' => 'Hội Viên ' . $tier['ten_hang'],
                'icon' => $icon,
                'theme_text' => $themeText,
                'theme_bg' => $themeBg,
                'theme_border' => $themeBorder,
                'btn_class' => $btnClass,
                'req' => 'Chi tiêu từ ' . number_format($tier['chi_tieu_toi_thieu']/1000000, 0) . 'tr',
                'benefits' => $dacQuyen,
                'is_popular' => (strpos(strtolower($tier['ten_hang']), 'vàng') !== false)
            ];
        }
        
        return $formattedTiers;
    }

    public function getFreeshipRules()
    {
        $rules = $this->quyTacFreeshipModel->getAll();
        $activeRules = array_filter($rules, function($r) {
            return $r['trang_thai'] == 1;
        });
        return $activeRules;
    }

    public function getGiftCombos($limit = 3)
    {
        // Giả lập combo quà tặng, kết hợp các voucher loại 4 (quà tặng)
        $combos = [
            [
                'title' => 'Vòng ngọc + hộp quà cao cấp',
                'desc' => 'Tặng kèm hộp nhung đỏ sang trọng và thẻ bảo hành mạ vàng.',
                'save' => '50.000đ',
                'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg'
            ],
            [
                'title' => 'Chuỗi đá + túi gấm + thiệp',
                'desc' => 'Phù hợp làm quà tặng người thân, đối tác nhân dịp đặc biệt.',
                'save' => '30.000đ',
                'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg'
            ],
            [
                'title' => 'Cặp vòng bình an',
                'desc' => 'Ưu đãi đặc biệt cho đơn mua 2 sản phẩm vòng tay bất kỳ.',
                'save' => '15%',
                'image' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'
            ]
        ];
        return array_slice($combos, 0, $limit);
    }

    public function getPromotionEndDate()
    {
        // Lấy promotion đang active kết thúc sớm nhất
        $activePromos = $this->khuyenMaiModel->getAll(['tab' => 'dang_dien_ra']);
        if (!empty($activePromos)) {
            return $activePromos[0]['ngay_ket_thuc'];
        }
        // Fallback: 3 ngày sau
        return date('Y-m-d H:i:s', strtotime('+3 days'));
    }

    public function saveUserVoucher($userId, $voucherId)
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        
        // Check if voucher exists
        $stmt = $db->prepare("SELECT * FROM voucher WHERE id = ?");
        $stmt->execute([$voucherId]);
        $voucher = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$voucher) {
            return ['success' => false, 'message' => 'Voucher không tồn tại.'];
        }

        // Check if user already saved it
        $stmt = $db->prepare("SELECT id FROM nguoi_dung_voucher WHERE id_nguoi_dung = ? AND id_voucher = ?");
        $stmt->execute([$userId, $voucherId]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => 'Bạn đã lưu mã ưu đãi này rồi.'];
        }

        // Generate UUID
        $id = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );

        // Save voucher
        $stmt = $db->prepare("INSERT INTO nguoi_dung_voucher (id, id_nguoi_dung, id_voucher, trang_thai) VALUES (?, ?, ?, 0)");
        $result = $stmt->execute([$id, $userId, $voucherId]);

        if ($result) {
            return ['success' => true, 'message' => 'Lưu mã ưu đãi thành công.'];
        }
        
        return ['success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'];
    }

    public function getSavedVoucherIds($userId)
    {
        if (empty($userId)) return [];
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id_voucher FROM nguoi_dung_voucher WHERE id_nguoi_dung = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
}
