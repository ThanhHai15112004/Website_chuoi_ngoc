<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;
use App\Models\Admin\NhatKyHoatDongModel;

class DonHangModel
{
    private $db;
    private $logger;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->logger = new NhatKyHoatDongModel();
    }

    public function layDanhSach($filters = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT dh.*, 
                       nd.ho_ten as ten_khach_hang_nd, nd.anh_dai_dien,
                       (SELECT COUNT(*) FROM chi_tiet_don_hang WHERE id_don_hang = dh.id) as tong_so_luong_sp,
                       (SELECT ten_sp FROM chi_tiet_don_hang ct JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id JOIN san_pham sp ON bt.id_san_pham = sp.id WHERE ct.id_don_hang = dh.id LIMIT 1) as san_pham_chinh,
                       (SELECT hinh_anh_chinh FROM chi_tiet_don_hang ct JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id JOIN san_pham sp ON bt.id_san_pham = sp.id WHERE ct.id_don_hang = dh.id LIMIT 1) as hinh_anh_chinh
                FROM don_hang dh
                LEFT JOIN nguoi_dung nd ON dh.id_nguoi_dung = nd.id
                WHERE 1=1";
        
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (dh.ma_don_hang LIKE ? OR dh.ten_nguoi_nhan LIKE ? OR dh.sdt_nguoi_nhan LIKE ?)";
            $keyword = "%{$filters['keyword']}%";
            $params[] = $keyword;
            $params[] = $keyword;
            $params[] = $keyword;
        }

        if (isset($filters['trang_thai_don_hang']) && $filters['trang_thai_don_hang'] !== '') {
            $sql .= " AND dh.trang_thai_don_hang = ?";
            $params[] = $filters['trang_thai_don_hang'];
        }

        if (isset($filters['thanh_toan']) && $filters['thanh_toan'] !== '') {
            $sql .= " AND dh.trang_thai_thanh_toan = ?";
            $params[] = $filters['thanh_toan'];
        }

        if (!empty($filters['hinh_thuc'])) {
            $ht = $filters['hinh_thuc'];
            if ($ht === 'cod') {
                $sql .= " AND (dh.pt_thanh_toan LIKE '%COD%' OR dh.pt_thanh_toan LIKE '%Tiền mặt%' OR dh.pt_thanh_toan LIKE '%Thanh toán khi nhận hàng%')";
            } elseif ($ht === 'ck') {
                $sql .= " AND (dh.pt_thanh_toan LIKE '%Chuyển khoản%' OR dh.pt_thanh_toan LIKE '%CK%')";
            } elseif ($ht === 'vnpay') {
                $sql .= " AND dh.pt_thanh_toan LIKE '%VNPay%'";
            }
        }

        if (!empty($filters['thoi_gian'])) {
            $tg = $filters['thoi_gian'];
            if ($tg === 'today') {
                $sql .= " AND DATE(dh.ngay_tao) = CURDATE()";
            } elseif ($tg === '7days') {
                $sql .= " AND DATE(dh.ngay_tao) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            } elseif ($tg === '30days') {
                $sql .= " AND DATE(dh.ngay_tao) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
            } elseif ($tg === 'month') {
                $sql .= " AND MONTH(dh.ngay_tao) = MONTH(CURDATE()) AND YEAR(dh.ngay_tao) = YEAR(CURDATE())";
            }
        }

        $sql .= " ORDER BY dh.ngay_tao DESC LIMIT ? OFFSET ?";
        
        $stmt = $this->db->prepare($sql);
        
        // Bind parameters manually due to mixed types
        foreach ($params as $key => $val) {
            $stmt->bindValue($key + 1, $val);
        }
        $stmt->bindValue(count($params) + 1, (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(count($params) + 2, (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function demDanhSach($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM don_hang dh WHERE 1=1";
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (dh.ma_don_hang LIKE ? OR dh.ten_nguoi_nhan LIKE ? OR dh.sdt_nguoi_nhan LIKE ?)";
            $keyword = "%{$filters['keyword']}%";
            $params[] = $keyword;
            $params[] = $keyword;
            $params[] = $keyword;
        }

        if (isset($filters['trang_thai_don_hang']) && $filters['trang_thai_don_hang'] !== '') {
            $sql .= " AND dh.trang_thai_don_hang = ?";
            $params[] = $filters['trang_thai_don_hang'];
        }

        if (isset($filters['thanh_toan']) && $filters['thanh_toan'] !== '') {
            $sql .= " AND dh.trang_thai_thanh_toan = ?";
            $params[] = $filters['thanh_toan'];
        }

        if (!empty($filters['hinh_thuc'])) {
            $ht = $filters['hinh_thuc'];
            if ($ht === 'cod') {
                $sql .= " AND (dh.pt_thanh_toan LIKE '%COD%' OR dh.pt_thanh_toan LIKE '%Tiền mặt%' OR dh.pt_thanh_toan LIKE '%Thanh toán khi nhận hàng%')";
            } elseif ($ht === 'ck') {
                $sql .= " AND (dh.pt_thanh_toan LIKE '%Chuyển khoản%' OR dh.pt_thanh_toan LIKE '%CK%')";
            } elseif ($ht === 'vnpay') {
                $sql .= " AND dh.pt_thanh_toan LIKE '%VNPay%'";
            }
        }

        if (!empty($filters['thoi_gian'])) {
            $tg = $filters['thoi_gian'];
            if ($tg === 'today') {
                $sql .= " AND DATE(dh.ngay_tao) = CURDATE()";
            } elseif ($tg === '7days') {
                $sql .= " AND DATE(dh.ngay_tao) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            } elseif ($tg === '30days') {
                $sql .= " AND DATE(dh.ngay_tao) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
            } elseif ($tg === 'month') {
                $sql .= " AND MONTH(dh.ngay_tao) = MONTH(CURDATE()) AND YEAR(dh.ngay_tao) = YEAR(CURDATE())";
            }
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['total'] : 0;
    }

    public function layThongKe()
    {
        $sql = "SELECT 
                    COUNT(*) as tong_don,
                    SUM(CASE WHEN trang_thai_don_hang = 0 THEN 1 ELSE 0 END) as cho_xac_nhan,
                    SUM(CASE WHEN trang_thai_don_hang = 1 THEN 1 ELSE 0 END) as dang_chuan_bi,
                    SUM(CASE WHEN trang_thai_don_hang = 2 THEN 1 ELSE 0 END) as dang_giao,
                    SUM(CASE WHEN trang_thai_don_hang = 3 THEN 1 ELSE 0 END) as thanh_cong,
                    SUM(CASE WHEN trang_thai_don_hang = 4 THEN 1 ELSE 0 END) as da_huy,
                    SUM(CASE WHEN trang_thai_don_hang = 3 THEN thanh_tien ELSE 0 END) as doanh_thu
                FROM don_hang";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return [
            'tong_don' => (int)($row['tong_don'] ?? 0),
            'cho_xac_nhan' => (int)($row['cho_xac_nhan'] ?? 0),
            'dang_chuan_bi' => (int)($row['dang_chuan_bi'] ?? 0),
            'dang_giao' => (int)($row['dang_giao'] ?? 0),
            'thanh_cong' => (int)($row['thanh_cong'] ?? 0),
            'da_huy' => (int)($row['da_huy'] ?? 0),
            'doanh_thu' => (float)($row['doanh_thu'] ?? 0)
        ];
    }

    public function layChiTiet($id)
    {
        $sql = "SELECT dh.*, 
                       nd.ma_nd, nd.ho_ten, nd.email, nd.tong_chi_tieu, nd.trang_thai as trang_thai_tk,
                       htv.ten_hang,
                       v.ma_voucher
                FROM don_hang dh
                LEFT JOIN nguoi_dung nd ON dh.id_nguoi_dung = nd.id
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                LEFT JOIN voucher v ON dh.id_voucher = v.id
                WHERE dh.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function laySanPhamDonHang($id_don_hang)
    {
        $sql = "SELECT ct.*, 
                       bt.thuoc_tinh as variant_name, bt.so_luong_ton, bt.so_luong_tam_giu,
                       sp.id as id_san_pham, sp.ten_sp, sp.ma_sp, sp.hinh_anh_chinh as image
                FROM chi_tiet_don_hang ct
                LEFT JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                LEFT JOIN san_pham sp ON bt.id_san_pham = sp.id
                WHERE ct.id_don_hang = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_don_hang]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layLichSuDonHang($id_don_hang)
    {
        $sql = "SELECT nk.*, nd.ho_ten as ten_nhan_vien
                FROM nhat_ky_hoat_dong nk
                LEFT JOIN nguoi_dung nd ON nk.id_nguoi_dung = nd.id
                WHERE nk.module = 'Đơn hàng' AND nk.doi_tuong_id = ?
                ORDER BY nk.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_don_hang]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function capNhatTrangThai($id, $trangThai, $lyDo = '')
    {
        try {
            $this->db->beginTransaction();

            $dh = $this->layChiTiet($id);
            if (!$dh) {
                throw new Exception("Không tìm thấy đơn hàng");
            }

            $oldStatus = (int)$dh['trang_thai_don_hang'];
            $newStatus = (int)$trangThai;

            if ($oldStatus == $newStatus) {
                $this->db->rollBack();
                return true;
            }

            // Cập nhật trạng thái
            $stmt = $this->db->prepare("UPDATE don_hang SET trang_thai_don_hang = ? WHERE id = ?");
            $stmt->execute([$newStatus, $id]);

            $items = $this->laySanPhamDonHang($id);

            // LOGIC KHO HÀNG
            // 0: Chờ xử lý (lúc này đã giữ kho: so_luong_tam_giu += số lượng)
            // 1: Đang chuẩn bị (Trừ kho thật)
            if ($oldStatus == 0 && $newStatus >= 1 && $newStatus <= 3) {
                $lowStockProducts = [];
                foreach ($items as $item) {
                    if ($item['id_bien_the']) {
                        $upd = $this->db->prepare("UPDATE san_pham_bien_the 
                                                   SET so_luong_ton = so_luong_ton - ?, 
                                                       so_luong_tam_giu = GREATEST(0, so_luong_tam_giu - ?) 
                                                   WHERE id = ?");
                        $upd->execute([$item['so_luong'], $item['so_luong'], $item['id_bien_the']]);

                        // Kiểm tra tồn kho thấp
                        $checkStmt = $this->db->prepare("SELECT bt.so_luong_ton, bt.nguong_canh_bao, bt.thuoc_tinh, sp.ten_sp 
                                                         FROM san_pham_bien_the bt 
                                                         JOIN san_pham sp ON bt.id_san_pham = sp.id 
                                                         WHERE bt.id = ? AND bt.so_luong_ton <= bt.nguong_canh_bao");
                        $checkStmt->execute([$item['id_bien_the']]);
                        $lowStock = $checkStmt->fetch(PDO::FETCH_ASSOC);
                        if ($lowStock) {
                            $lowStockProducts[] = [
                                'ten_sp' => $lowStock['ten_sp'],
                                'bien_the' => $lowStock['thuoc_tinh'],
                                'ton_kho' => $lowStock['so_luong_ton'],
                                'nguong' => $lowStock['nguong_canh_bao']
                            ];
                        }
                    }
                }

                // Gửi cảnh báo tồn kho thấp
                if (!empty($lowStockProducts)) {
                    try {
                        $notif = new \App\Services\NotificationService();
                        foreach ($lowStockProducts as $lsp) {
                            $notif->lowStockWarning($lsp['ten_sp'], $lsp['bien_the'], $lsp['ton_kho']);
                        }
                        $adminEmail = $_ENV['EMAIL_FROM'] ?? '';
                        if (!empty($adminEmail)) {
                            \App\Services\MailService::sendLowStockAlert($adminEmail, $lowStockProducts);
                        }
                    } catch (\Exception $ex) {
                        error_log('[DonHang] Lỗi gửi cảnh báo tồn kho: ' . $ex->getMessage());
                    }
                }
            }

            // Hủy đơn
            if ($newStatus == 4) {
                if ($oldStatus == 0) {
                    // Trả lại tạm giữ
                    foreach ($items as $item) {
                        if ($item['id_bien_the']) {
                            $upd = $this->db->prepare("UPDATE san_pham_bien_the 
                                                       SET so_luong_tam_giu = GREATEST(0, so_luong_tam_giu - ?) 
                                                       WHERE id = ?");
                            $upd->execute([$item['so_luong'], $item['id_bien_the']]);
                        }
                    }
                } elseif ($oldStatus >= 1 && $oldStatus <= 3) {
                    // Trả lại kho thật
                    foreach ($items as $item) {
                        if ($item['id_bien_the']) {
                            $upd = $this->db->prepare("UPDATE san_pham_bien_the 
                                                       SET so_luong_ton = so_luong_ton + ? 
                                                       WHERE id = ?");
                            $upd->execute([$item['so_luong'], $item['id_bien_the']]);
                        }
                    }
                }
                
                // Trả lại lượt dùng voucher
                if ($dh['id_voucher']) {
                    $updVc = $this->db->prepare("UPDATE voucher SET da_dung = GREATEST(0, da_dung - 1) WHERE id = ?");
                    $updVc->execute([$dh['id_voucher']]);
                }
            }

            // LOGIC TÍCH ĐIỂM
            if ($newStatus == 3 && $oldStatus != 3 && $dh['id_nguoi_dung']) {
                $thanhTien = $dh['thanh_tien'];
                $diem = floor($thanhTien / 10000); // 10,000đ = 1 điểm
                
                $updUser = $this->db->prepare("UPDATE nguoi_dung 
                                               SET tong_chi_tieu = tong_chi_tieu + ?, 
                                                   diem_tich_luy = diem_tich_luy + ? 
                                               WHERE id = ?");
                $updUser->execute([$thanhTien, $diem, $dh['id_nguoi_dung']]);
                
                $this->kiemTraVaCapNhatHangThanhVien($dh['id_nguoi_dung']);
            }

            // Hoàn điểm nếu đơn từ Thành công -> Hủy
            if ($oldStatus == 3 && $newStatus == 4 && $dh['id_nguoi_dung']) {
                $thanhTien = $dh['thanh_tien'];
                $diem = floor($thanhTien / 10000);
                
                $updUser = $this->db->prepare("UPDATE nguoi_dung 
                                               SET tong_chi_tieu = GREATEST(0, tong_chi_tieu - ?), 
                                                   diem_tich_luy = GREATEST(0, diem_tich_luy - ?) 
                                               WHERE id = ?");
                $updUser->execute([$thanhTien, $diem, $dh['id_nguoi_dung']]);
            }

            // Lịch sử
            $trangThaiStr = $this->getTrangThaiText($newStatus);
            $msg = "Cập nhật trạng thái thành: " . $trangThaiStr;
            if ($lyDo) $msg .= " (Lý do: $lyDo)";
            $this->logger->log("Cập nhật đơn hàng", "Đơn hàng", $id, $msg);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function capNhatThanhToan($id, $trangThai)
    {
        $stmt = $this->db->prepare("UPDATE don_hang SET trang_thai_thanh_toan = ? WHERE id = ?");
        $success = $stmt->execute([$trangThai, $id]);
        
        if ($success) {
            $ttStr = $trangThai == 1 ? "Đã thanh toán" : "Chưa thanh toán";
            $this->logger->log("Cập nhật thanh toán", "Đơn hàng", $id, "Trạng thái TT: " . $ttStr);
        }
        
        return $success;
    }

    private function kiemTraVaCapNhatHangThanhVien($id_nguoi_dung)
    {
        // Lấy thông tin user
        $stmt = $this->db->prepare("SELECT ho_ten, email, tong_chi_tieu, id_hang_thanh_vien FROM nguoi_dung WHERE id = ?");
        $stmt->execute([$id_nguoi_dung]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) return;
        
        $chiTieu = $user['tong_chi_tieu'];
        
        // Lấy tất cả hạng từ thấp đến cao
        $stmtRank = $this->db->prepare("SELECT * FROM hang_thanh_vien ORDER BY chi_tieu_toi_thieu DESC");
        $stmtRank->execute();
        $ranks = $stmtRank->fetchAll(PDO::FETCH_ASSOC);
        
        $newRankId = null;
        $newRankName = '';
        $newRankDiscount = 0;
        foreach ($ranks as $rank) {
            if ($chiTieu >= $rank['chi_tieu_toi_thieu']) {
                $newRankId = $rank['id'];
                $newRankName = $rank['ten_hang'];
                $newRankDiscount = $rank['phan_tram_giam'] ?? 0;
                break;
            }
        }
        
        if ($newRankId && $newRankId != $user['id_hang_thanh_vien']) {
            // Lấy tên hạng cũ
            $oldRankName = 'Đồng';
            if ($user['id_hang_thanh_vien']) {
                $stmtOld = $this->db->prepare("SELECT ten_hang FROM hang_thanh_vien WHERE id = ?");
                $stmtOld->execute([$user['id_hang_thanh_vien']]);
                $oldRank = $stmtOld->fetch(PDO::FETCH_ASSOC);
                if ($oldRank) $oldRankName = $oldRank['ten_hang'];
            }

            $upd = $this->db->prepare("UPDATE nguoi_dung SET id_hang_thanh_vien = ? WHERE id = ?");
            $upd->execute([$newRankId, $id_nguoi_dung]);
            
            $this->logger->log("Nâng hạng", "Khách hàng", $id_nguoi_dung, "Lên hạng: " . $newRankName);

            // Gửi email + thông báo nâng hạng
            try {
                $notif = new \App\Services\NotificationService();
                $notif->rankUpgraded($id_nguoi_dung, $user['ho_ten'], $newRankName, $newRankDiscount);

                if (!empty($user['email'])) {
                    \App\Services\MailService::sendRankUpgrade($user['email'], $user['ho_ten'], $oldRankName, $newRankName, $newRankDiscount);
                }
            } catch (\Exception $ex) {
                error_log('[DonHang] Lỗi gửi mail nâng hạng: ' . $ex->getMessage());
            }
        }
    }

    public function getTrangThaiText($status)
    {
        switch ($status) {
            case 0: return "Chờ xử lý";
            case 1: return "Đang chuẩn bị";
            case 2: return "Đang giao";
            case 3: return "Thành công";
            case 4: return "Đã hủy";
            default: return "Không xác định";
        }
    }

    public function taoDonHang($data)
    {
        try {
            $this->db->beginTransaction();

            $id_don_hang = uniqid('dh_');
            $ma_don_hang = 'DH' . strtoupper(substr(uniqid(), -6));
            
            // Lấy thông tin KH
            $stmtKH = $this->db->prepare("SELECT ho_ten, so_dien_thoai, email FROM nguoi_dung WHERE id = ?");
            $stmtKH->execute([$data['id_khach_hang']]);
            $kh = $stmtKH->fetch(PDO::FETCH_ASSOC);

            if (!$kh) {
                throw new Exception("Không tìm thấy khách hàng");
            }

            // Kích hoạt voucher nếu có
            $id_voucher = $data['id_voucher'] ?? null;
            if ($id_voucher) {
                // Kiểm tra voucher hợp lệ
                $stmtVc = $this->db->prepare("SELECT id, so_luong, da_dung FROM voucher WHERE id = ? AND trang_thai = 1");
                $stmtVc->execute([$id_voucher]);
                $vc = $stmtVc->fetch(PDO::FETCH_ASSOC);
                
                if (!$vc) {
                    throw new Exception("Voucher không hợp lệ hoặc đã bị tắt");
                }
                
                if ($vc['so_luong'] != -1 && $vc['da_dung'] >= $vc['so_luong']) {
                    throw new Exception("Voucher đã hết lượt sử dụng");
                }
            }

            // Insert don_hang
            $sqlDH = "INSERT INTO don_hang (id, ma_don_hang, id_nguoi_dung, ten_nguoi_nhan, sdt_nguoi_nhan, dia_chi_giao_hang, pt_thanh_toan, tong_tien, thanh_tien, tien_giam_gia, phi_ship, id_voucher, ghi_chu, trang_thai_don_hang, trang_thai_thanh_toan, ngay_tao)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?, NOW())";
            $stmtDH = $this->db->prepare($sqlDH);
            
            $tongTienHang = $data['tong_tien_hang'] ?? 0;
            
            $stmtDH->execute([
                $id_don_hang,
                $ma_don_hang,
                $data['id_khach_hang'],
                $data['ten_nguoi_nhan'] ?? $kh['ho_ten'],
                $data['sdt_nguoi_nhan'] ?? $kh['so_dien_thoai'],
                $data['dia_chi_giao_hang'] ?? '',
                $data['phuong_thuc_thanh_toan'] ?? 'Tiền mặt',
                $tongTienHang,
                $data['tong_tien'],
                $data['giam_gia'] ?? 0,
                $data['phi_van_chuyen'] ?? 0,
                $id_voucher,
                $data['ghi_chu'] ?? '',
                $data['trang_thai_thanh_toan'] ?? 0
            ]);

            // Cập nhật lượt dùng voucher
            if ($id_voucher) {
                $updVc = $this->db->prepare("UPDATE voucher SET da_dung = da_dung + 1 WHERE id = ?");
                $updVc->execute([$id_voucher]);
            }

            // Insert chi_tiet_don_hang & Cập nhật số lượng tạm giữ
            $sqlCT = "INSERT INTO chi_tiet_don_hang (id, id_don_hang, id_bien_the, so_luong, don_gia) VALUES (?, ?, ?, ?, ?)";
            $stmtCT = $this->db->prepare($sqlCT);
            
            $updKho = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_tam_giu = so_luong_tam_giu + ? WHERE id = ?");

            foreach ($data['products'] as $p) {
                $id_ct = uniqid('ctdh_');
                $stmtCT->execute([
                    $id_ct,
                    $id_don_hang,
                    $p['id'],
                    $p['quantity'],
                    $p['price']
                ]);
                $updKho->execute([$p['quantity'], $p['id']]);
            }

            // Ghi Log (Tạm ẩn vì NhatKyHoatDongModel không có hàm log và Frontend không có id_nhan_vien)
            // $this->logger->log("Tạo đơn hàng", "Đơn hàng", $id_don_hang, "Tạo đơn hàng POS cho " . $kh['ho_ten']);

            // Nếu thanh toán ngay (trạng thái thanh toán = 1), capNhatThanhToan (sẽ log)
            if (isset($data['trang_thai_thanh_toan']) && $data['trang_thai_thanh_toan'] == 1) {
                // $this->logger->log("Cập nhật thanh toán", "Đơn hàng", $id_don_hang, "Trạng thái TT: Đã thanh toán");
            }
            
            // Xử lý status = 3 (thành công) ngay lập tức nếu cần (POS thu tiền liền)
            if (isset($data['hoan_thanh_ngay']) && $data['hoan_thanh_ngay']) {
                $this->db->commit();
                $this->capNhatTrangThai($id_don_hang, 3, "Tạo đơn POS hoàn thành ngay");
                return ['success' => true, 'id_don_hang' => $id_don_hang];
            }

            $this->db->commit();
            return ['success' => true, 'id_don_hang' => $id_don_hang];
            
        } catch (Exception $e) {
            $this->db->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
