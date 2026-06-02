<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use PDOException;

class NhaCungCapModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSach($filters = [], $limit = 50, $offset = 0)
    {
        $sql = "SELECT ncc.*, 
                       COUNT(DISTINCT pk.id) as tong_phieu,
                       SUM(CASE WHEN pk.trang_thai != 4 THEN pk.tong_tien ELSE 0 END) as tong_gia_tri,
                       SUM(CASE WHEN pk.trang_thai != 4 THEN (pk.tong_tien - pk.tien_da_tra) ELSE 0 END) as cong_no
                FROM nha_cung_cap ncc
                LEFT JOIN phieu_kho pk ON ncc.id = pk.id_nha_cung_cap AND pk.loai_phieu = 1
                WHERE 1=1";
                
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (ncc.ten_ncc LIKE :keyword OR ncc.ma_ncc LIKE :keyword OR ncc.sdt LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND ncc.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        $sql .= " GROUP BY ncc.id ORDER BY ncc.ten_ncc ASC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function demDanhSach($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM nha_cung_cap ncc WHERE 1=1";
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (ncc.ten_ncc LIKE :keyword OR ncc.ma_ncc LIKE :keyword OR ncc.sdt LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND ncc.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['total'] : 0;
    }

    public function layChiTiet($id)
    {
        $sql = "SELECT ncc.*, 
                       COUNT(DISTINCT pk.id) as tong_phieu,
                       SUM(CASE WHEN pk.trang_thai != 4 THEN pk.tong_tien ELSE 0 END) as tong_gia_tri,
                       SUM(CASE WHEN pk.trang_thai != 4 THEN (pk.tong_tien - pk.tien_da_tra) ELSE 0 END) as cong_no,
                       MAX(pk.ngay_tao) as lan_nhap_gan_nhat
                FROM nha_cung_cap ncc
                LEFT JOIN phieu_kho pk ON ncc.id = pk.id_nha_cung_cap AND pk.loai_phieu = 1
                WHERE ncc.id = :id
                GROUP BY ncc.id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function kiemTraMaTonTai($ma_ncc, $id_ngoai_tru = null)
    {
        $sql = "SELECT COUNT(*) FROM nha_cung_cap WHERE ma_ncc = :ma";
        $params = ['ma' => $ma_ncc];
        
        if ($id_ngoai_tru) {
            $sql .= " AND id != :id";
            $params['id'] = $id_ngoai_tru;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }

    public function themNhaCungCap($data)
    {
        $sql = "INSERT INTO nha_cung_cap (id, ma_ncc, ten_ncc, nguoi_lien_he, sdt, email, dia_chi, trang_thai)
                VALUES (:id, :ma_ncc, :ten_ncc, :nguoi_lien_he, :sdt, :email, :dia_chi, :trang_thai)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $data['id'],
            'ma_ncc' => $data['ma_ncc'],
            'ten_ncc' => $data['ten_ncc'],
            'nguoi_lien_he' => $data['nguoi_lien_he'] ?? null,
            'sdt' => $data['sdt'] ?? null,
            'email' => $data['email'] ?? null,
            'dia_chi' => $data['dia_chi'] ?? null,
            'trang_thai' => $data['trang_thai'] ?? 1
        ]);
    }

    public function capNhatNhaCungCap($id, $data)
    {
        $sql = "UPDATE nha_cung_cap 
                SET ma_ncc = :ma_ncc, 
                    ten_ncc = :ten_ncc, 
                    nguoi_lien_he = :nguoi_lien_he, 
                    sdt = :sdt, 
                    email = :email, 
                    dia_chi = :dia_chi, 
                    trang_thai = :trang_thai
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'ma_ncc' => $data['ma_ncc'],
            'ten_ncc' => $data['ten_ncc'],
            'nguoi_lien_he' => $data['nguoi_lien_he'] ?? null,
            'sdt' => $data['sdt'] ?? null,
            'email' => $data['email'] ?? null,
            'dia_chi' => $data['dia_chi'] ?? null,
            'trang_thai' => $data['trang_thai'] ?? 1
        ]);
    }

    public function capNhatTrangThai($id, $trang_thai)
    {
        $sql = "UPDATE nha_cung_cap SET trang_thai = :trang_thai WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'trang_thai' => $trang_thai
        ]);
    }

    public function thongKe()
    {
        // 1 = Đang hợp tác, 2 = Tạm ngừng, 0 = Ngừng hợp tác
        $sql = "SELECT 
                    COUNT(*) as tong,
                    SUM(CASE WHEN trang_thai = 1 THEN 1 ELSE 0 END) as dang_hop_tac,
                    SUM(CASE WHEN trang_thai = 2 THEN 1 ELSE 0 END) as tam_ngung,
                    SUM(CASE WHEN trang_thai = 0 THEN 1 ELSE 0 END) as ngung_hop_tac
                FROM nha_cung_cap";
        $stmt = $this->db->query($sql);
        $thongKeNCC = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlGiaTri = "SELECT 
                        SUM(CASE WHEN trang_thai != 4 THEN tong_tien ELSE 0 END) as tong_gia_tri,
                        COUNT(DISTINCT id_nha_cung_cap) as ncc_co_don
                      FROM phieu_kho WHERE loai_phieu = 1";
        $stmtGiaTri = $this->db->query($sqlGiaTri);
        $thongKeGiaTri = $stmtGiaTri->fetch(PDO::FETCH_ASSOC);

        $sqlCongNo = "SELECT COUNT(DISTINCT id_nha_cung_cap) as co_cong_no
                      FROM phieu_kho 
                      WHERE loai_phieu = 1 AND trang_thai != 4 AND (tong_tien - tien_da_tra) > 0";
        $stmtCongNo = $this->db->query($sqlCongNo);
        $thongKeCongNo = $stmtCongNo->fetch(PDO::FETCH_ASSOC);

        return [
            'tong' => $thongKeNCC['tong'] ?? 0,
            'dang_hop_tac' => $thongKeNCC['dang_hop_tac'] ?? 0,
            'tam_ngung' => $thongKeNCC['tam_ngung'] ?? 0,
            'ngung_hop_tac' => $thongKeNCC['ngung_hop_tac'] ?? 0,
            'tong_gia_tri' => $thongKeGiaTri['tong_gia_tri'] ?? 0,
            'co_cong_no' => $thongKeCongNo['co_cong_no'] ?? 0,
            'danh_gia_tot' => $thongKeGiaTri['ncc_co_don'] ?? 0 // Mock cho giờ
        ];
    }
}
