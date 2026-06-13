<?php

namespace App\Services\Admin;

use App\Models\Admin\HangThanhVienModel;
use App\Core\Database;
use PDO;
use App\Constants\HeThongConstants;

class HangThanhVienService
{
    private $model;
    private $db;

    public function __construct()
    {
        $this->model = new HangThanhVienModel();
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDuLieuHang()
    {
        $ranks = $this->model->layTatCa();
        $formattedRanks = [];

        foreach ($ranks as $r) {
            $formattedRanks[] = [
                'id' => $r['id'],
                'name' => $r['ten_hang'],
                'badge' => $r['mau_sac'] ?? 'bg-gray-100 text-gray-700',
                'desc' => $r['mo_ta'] ?? '',
                'condition_spend' => (int)$r['chi_tieu_toi_thieu'],
                'discount' => (float)$r['phan_tram_giam'],
                'benefits' => $r['dac_quyen'] ? json_decode($r['dac_quyen'], true) : [],
                'customer_count' => (int)$r['customer_count'],
                'vouchers' => $r['danh_sach_voucher'] ? json_decode($r['danh_sach_voucher'], true) : [],
                'status' => $r['trang_thai'] == HeThongConstants::STATUS_ACTIVE ? 'active' : 'inactive'
            ];
        }

        return $formattedRanks;
    }

    public function layLichSuHang()
    {
        $sql = "SELECT nd.ho_ten as nguoi_tao, log.ngay_tao as thoi_gian, 
                       CONCAT(log.hanh_dong, ' - ', log.module) as noi_dung
                FROM nhat_ky_hoat_dong log
                LEFT JOIN nguoi_dung nd ON log.id_nguoi_dung = nd.id
                WHERE log.module = 'Hạng thành viên'
                ORDER BY log.ngay_tao DESC
                LIMIT 20";
        
        $stmt = $this->db->query($sql);
        $history = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Format thời gian
        foreach ($history as &$h) {
            $h['thoi_gian'] = date('d/m/Y, H:i', strtotime($h['thoi_gian']));
            $h['nguoi_tao'] = $h['nguoi_tao'] ?? 'Hệ thống';
        }

        return $history;
    }

    public function layNguoiDungGanLenHang()
    {
        // Thuật toán: Lấy tổng chi tiêu của từng khách, tìm hạng tiếp theo của khách đó,
        // Nếu số tiền còn thiếu (hạng tiếp - tổng chi tiêu) < 1.000.000đ thì lấy
        
        $ranks = $this->model->layTatCa();
        
        $sql = "SELECT nd.id, nd.ho_ten, nd.tong_chi_tieu, htv.ten_hang as current_rank
                FROM nguoi_dung nd
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                WHERE nd.id_vai_tro IS NULL AND nd.trang_thai = " . HeThongConstants::STATUS_ACTIVE;
        
        $stmt = $this->db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];

        foreach ($customers as $c) {
            $tongChiTieu = (int)$c['tong_chi_tieu'];
            $nextRank = null;
            
            // Ranks đã được sort ASC theo chi_tieu_toi_thieu trong model
            foreach ($ranks as $r) {
                $mucTieu = (int)$r['chi_tieu_toi_thieu'];
                if ($mucTieu > $tongChiTieu) {
                    $nextRank = $r;
                    break;
                }
            }

            if ($nextRank) {
                $conThieu = (int)$nextRank['chi_tieu_toi_thieu'] - $tongChiTieu;
                
                // Nếu còn thiếu dưới 1.000.000đ
                if ($conThieu <= 1000000 && $conThieu > 0) {
                    $result[] = [
                        'id' => $c['id'],
                        'ten' => $c['ho_ten'],
                        'current_rank' => $c['current_rank'] ?? 'Chưa có hạng',
                        'next_rank' => $nextRank['ten_hang'],
                        'con_thieu' => $conThieu
                    ];
                }
            }
        }
        
        // Sắp xếp người gần lên hạng nhất lên đầu (con thiếu ít nhất)
        usort($result, function($a, $b) {
            return $a['con_thieu'] <=> $b['con_thieu'];
        });

        // Chỉ lấy top 10
        return array_slice($result, 0, 10);
    }

    public function capNhatHangTatCaKhachHang()
    {
        $ranks = $this->model->layTatCa();
        // Sắp xếp rank giảm dần theo chi tiêu (ví dụ: Kim cương -> Vàng -> Bạc -> Đồng)
        usort($ranks, function($a, $b) {
            return (int)$b['chi_tieu_toi_thieu'] <=> (int)$a['chi_tieu_toi_thieu'];
        });

        $sql = "SELECT id, tong_chi_tieu, id_hang_thanh_vien FROM nguoi_dung WHERE id_vai_tro IS NULL AND trang_thai = " . HeThongConstants::STATUS_ACTIVE;
        $stmt = $this->db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $updateStmt = $this->db->prepare("UPDATE nguoi_dung SET id_hang_thanh_vien = ? WHERE id = ?");

        $updatedCount = 0;
        foreach ($customers as $c) {
            $tongChiTieu = (int)$c['tong_chi_tieu'];
            $newRankId = null;

            foreach ($ranks as $r) {
                if ($tongChiTieu >= (int)$r['chi_tieu_toi_thieu']) {
                    $newRankId = $r['id'];
                    break;
                }
            }

            if ($newRankId !== null && $newRankId != $c['id_hang_thanh_vien']) {
                $updateStmt->execute([$newRankId, $c['id']]);
                $updatedCount++;
                
                // Ghi log
                $logId = uniqid('nk_');
                $logStmt = $this->db->prepare("INSERT INTO nhat_ky_hoat_dong (id, id_nguoi_dung, hanh_dong, module, gia_tri_cu, gia_tri_moi, ngay_tao) VALUES (?, ?, ?, ?, ?, ?, NOW())");
                $logStmt->execute([$logId, $c['id'], 'Thăng hạng tự động', 'Hạng thành viên', $c['id_hang_thanh_vien'], $newRankId]);
            }
        }
        return $updatedCount;
    }
}
