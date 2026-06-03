<?php

namespace App\Services\User;

use App\Models\Admin\SanPhamModel;

class SanPhamService
{
    private $sanPhamModel;

    public function __construct()
    {
        $this->sanPhamModel = new SanPhamModel();
    }

    public function getProductList($filters, $page, $perPage = 12)
    {
        $offset = ($page - 1) * $perPage;
        
        $sortBy = 'sp.ngay_tao';
        $sortDir = 'DESC';
        $smartSort = false;

        // Xử lý sắp xếp
        if (!empty($filters['sap_xep'])) {
            switch ($filters['sap_xep']) {
                case 'moi_nhat':
                    $sortBy = 'sp.ngay_tao';
                    $sortDir = 'DESC';
                    break;
                case 'gia_tang':
                    $sortBy = 'sp.gia_ban';
                    $sortDir = 'ASC';
                    break;
                case 'gia_giam':
                    $sortBy = 'sp.gia_ban';
                    $sortDir = 'DESC';
                    break;
                case 'ban_chay':
                    $sortBy = 'sp.luot_xem'; // Dùng tạm luot_xem thay cho da_ban do CSDL chưa có cột này trong san_pham
                    $sortDir = 'DESC';
                    break;
                case 'khuyen_mai':
                    // Xử lý khuyến mãi bằng cách filter những sp có giá KM và sort
                    $filters['is_khuyen_mai'] = true; // Ta sẽ xử lý phần này sau, tạm thời ta sẽ sort theo % giảm
                    $sortBy = '((sp.gia_ban - sp.gia_khuyen_mai) / sp.gia_ban)';
                    $sortDir = 'DESC';
                    break;
                default:
                    $smartSort = true;
                    break;
            }
        } else {
            $smartSort = true;
        }

        // Lấy dữ liệu từ DB (nếu smart sort thì không lấy limit trong query mà sort bằng PHP, lấy all rồi cắt)
        if ($smartSort) {
            $allProducts = $this->sanPhamModel->layDanhSachUser($filters, 'sp.ngay_tao', 'DESC', 0, 0); // Lấy tất cả thỏa mãn filter
            $products = $this->applySmartSort($allProducts);
            $total = count($products);
            $pagedProducts = array_slice($products, $offset, $perPage);
        } else {
            if (isset($filters['is_khuyen_mai'])) {
                // Ta cheat một chút, model layDanhSachUser không có filter is_khuyen_mai, ta sort bằng PHP luôn
                $allProducts = $this->sanPhamModel->layDanhSachUser($filters, 'sp.ngay_tao', 'DESC', 0, 0);
                // Lọc những sản phẩm có KM
                $kmProducts = array_filter($allProducts, function($sp) {
                    return !empty($sp['gia_khuyen_mai']);
                });
                // Sort theo % giảm
                usort($kmProducts, function($a, $b) {
                    $pctA = ($a['gia_ban'] - $a['gia_khuyen_mai']) / $a['gia_ban'];
                    $pctB = ($b['gia_ban'] - $b['gia_khuyen_mai']) / $b['gia_ban'];
                    return $pctB <=> $pctA;
                });
                $total = count($kmProducts);
                $pagedProducts = array_slice($kmProducts, $offset, $perPage);
            } else {
                $pagedProducts = $this->sanPhamModel->layDanhSachUser($filters, $sortBy, $sortDir, $perPage, $offset);
                $total = $this->sanPhamModel->demDanhSachUser($filters);
            }
        }

        // Format data
        foreach ($pagedProducts as &$sp) {
            $sp['ten'] = $sp['ten_sp'];
            $sp['hinh_anh'] = APP_URL . '/' . ltrim($sp['hinh_anh_chinh'], '/');
            $sp['gia'] = $sp['gia_khuyen_mai'] ? (float)$sp['gia_khuyen_mai'] : (float)$sp['gia_ban'];
            $sp['gia_cu'] = $sp['gia_khuyen_mai'] ? (float)$sp['gia_ban'] : null;
            $sp['danh_gia'] = 5.0; // Mock data
            $sp['da_ban'] = rand(10, 500); // Mock data since not in DB
            $sp['tinh_trang'] = $sp['tong_ton_kho'] > 0 ? 'con_hang' : 'het_hang';
            
            // Generate labels
            $sp['nhan'] = null;
            if ($sp['gia_cu']) {
                $pct = round((($sp['gia_cu'] - $sp['gia']) / $sp['gia_cu']) * 100);
                $sp['nhan'] = '-' . $pct . '%';
            } elseif (strtotime($sp['ngay_tao']) > strtotime('-14 days')) {
                $sp['nhan'] = 'Mới';
            } elseif ($sp['gia_ban'] > \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP) {
                $sp['nhan'] = 'Cao cấp';
            }
        }

        return [
            'data' => $pagedProducts,
            'total' => $total,
            'total_pages' => ceil($total / $perPage)
        ];
    }

    private function applySmartSort($products)
    {
        // Thuật toán: Điểm ưu tiên = (W1 × Điểm bán) + (W2 × Điểm lượt xem) + (W3 × Điểm mới) + (W4 × Điểm khuyến mãi) + (W5 × Điểm tồn kho)
        // W1 = 0.3, W2 = 0.2, W3 = 0.2, W4 = 0.15, W5 = 0.15
        
        // Find max luot_xem for normalization
        $maxLuotXem = 1;
        foreach ($products as $sp) {
            if ($sp['luot_xem'] > $maxLuotXem) {
                $maxLuotXem = $sp['luot_xem'];
            }
        }

        $now = time();

        foreach ($products as &$sp) {
            // Điểm bán (mock) & lượt xem (normalize 0-100)
            $diemBan = ($sp['luot_xem'] / $maxLuotXem) * 100; // Fake da_ban = luot_xem
            $diemLuotXem = ($sp['luot_xem'] / $maxLuotXem) * 100;

            // Điểm mới
            $ngayTaoTime = strtotime($sp['ngay_tao']);
            $daysOld = ($now - $ngayTaoTime) / (60 * 60 * 24);
            $diemMoi = 20;
            if ($daysOld < 14) $diemMoi = 100;
            elseif ($daysOld < 30) $diemMoi = 60;

            // Điểm KM
            $diemKM = (!empty($sp['gia_khuyen_mai'])) ? 100 : 0;

            // Điểm tồn kho
            $diemTonKho = ($sp['tong_ton_kho'] > 0) ? 100 : -50; // Phạt nặng hàng hết

            // Tổng điểm
            $sp['smart_score'] = (0.30 * $diemBan) + (0.20 * $diemLuotXem) + (0.20 * $diemMoi) + (0.15 * $diemKM) + (0.15 * $diemTonKho);
        }

        // Sort by smart_score DESC
        usort($products, function($a, $b) {
            return $b['smart_score'] <=> $a['smart_score'];
        });

        return $products;
    }
}
