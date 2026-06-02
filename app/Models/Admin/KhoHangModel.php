<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use PDOException;

class KhoHangModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSach($filters = [])
    {
        $sql = "SELECT kh.*, 
                       nd.ho_ten as nguoi_phu_trach,
                       (SELECT COUNT(*) FROM khu_vuc_kho kv WHERE kv.id_kho = kh.id AND kv.cap_do = 'khu') as so_khu_vuc,
                       (SELECT COUNT(*) FROM khu_vuc_kho kv WHERE kv.id_kho = kh.id AND kv.cap_do IN ('ke','ngan')) as so_ke,
                       (SELECT COUNT(DISTINCT spbt.id_san_pham) FROM san_pham_bien_the spbt WHERE spbt.so_luong_ton > 0) as so_san_pham,
                       (SELECT SUM(spbt.so_luong_ton) FROM san_pham_bien_the spbt WHERE spbt.so_luong_ton > 0) as tong_ton
                FROM kho_hang kh
                LEFT JOIN nguoi_dung nd ON kh.id_nguoi_phu_trach = nd.id
                WHERE 1=1";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (kh.ten_kho LIKE :keyword OR kh.ma_kho LIKE :keyword OR nd.ho_ten LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (!empty($filters['loai_kho'])) {
            $sql .= " AND kh.loai_kho = :loai_kho";
            $params['loai_kho'] = $filters['loai_kho'];
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND kh.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        $sql .= " ORDER BY kh.mac_dinh DESC, kh.ngay_tao ASC";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layChiTiet($id)
    {
        $sql = "SELECT kh.*, 
                       nd.ho_ten as nguoi_phu_trach,
                       nd.id as npt_id,
                       (SELECT COUNT(*) FROM khu_vuc_kho kv WHERE kv.id_kho = kh.id AND kv.cap_do = 'khu') as so_khu_vuc,
                       (SELECT COUNT(*) FROM khu_vuc_kho kv WHERE kv.id_kho = kh.id AND kv.cap_do IN ('ke','ngan')) as so_ke
                FROM kho_hang kh
                LEFT JOIN nguoi_dung nd ON kh.id_nguoi_phu_trach = nd.id
                WHERE kh.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function themKho($data)
    {
        try {
            $stmt = $this->db->prepare("SELECT UUID() as uuid");
            $stmt->execute();
            $id = $stmt->fetchColumn();

            $sql = "INSERT INTO kho_hang (id, ma_kho, ten_kho, loai_kho, mo_ta, dia_chi, tinh_thanh, quan_huyen, phuong_xa,
                                          id_nguoi_phu_trach, mac_dinh, cho_phep_ban, cho_phep_chuyen, cho_phep_kiem_ke, trang_thai)
                    VALUES (:id, :ma_kho, :ten_kho, :loai_kho, :mo_ta, :dia_chi, :tinh_thanh, :quan_huyen, :phuong_xa,
                            :id_nguoi_phu_trach, :mac_dinh, :cho_phep_ban, :cho_phep_chuyen, :cho_phep_kiem_ke, :trang_thai)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'id' => $id,
                'ma_kho' => $data['ma_kho'],
                'ten_kho' => $data['ten_kho'],
                'loai_kho' => $data['loai_kho'] ?? 'tong',
                'mo_ta' => $data['mo_ta'] ?? null,
                'dia_chi' => $data['dia_chi'] ?? null,
                'tinh_thanh' => $data['tinh_thanh'] ?? null,
                'quan_huyen' => $data['quan_huyen'] ?? null,
                'phuong_xa' => $data['phuong_xa'] ?? null,
                'id_nguoi_phu_trach' => !empty($data['id_nguoi_phu_trach']) ? $data['id_nguoi_phu_trach'] : null,
                'mac_dinh' => $data['mac_dinh'] ?? 0,
                'cho_phep_ban' => $data['cho_phep_ban'] ?? 1,
                'cho_phep_chuyen' => $data['cho_phep_chuyen'] ?? 1,
                'cho_phep_kiem_ke' => $data['cho_phep_kiem_ke'] ?? 1,
                'trang_thai' => $data['trang_thai'] ?? 1
            ]);

            return $id;
        } catch (PDOException $e) {
            error_log("Lỗi thêm kho: " . $e->getMessage());
            return false;
        }
    }

    public function capNhatKho($id, $data)
    {
        $sql = "UPDATE kho_hang SET 
                    ma_kho = :ma_kho, ten_kho = :ten_kho, loai_kho = :loai_kho, mo_ta = :mo_ta,
                    dia_chi = :dia_chi, tinh_thanh = :tinh_thanh, quan_huyen = :quan_huyen, phuong_xa = :phuong_xa,
                    id_nguoi_phu_trach = :id_nguoi_phu_trach,
                    cho_phep_ban = :cho_phep_ban, cho_phep_chuyen = :cho_phep_chuyen, cho_phep_kiem_ke = :cho_phep_kiem_ke,
                    trang_thai = :trang_thai
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'ma_kho' => $data['ma_kho'],
            'ten_kho' => $data['ten_kho'],
            'loai_kho' => $data['loai_kho'] ?? 'tong',
            'mo_ta' => $data['mo_ta'] ?? null,
            'dia_chi' => $data['dia_chi'] ?? null,
            'tinh_thanh' => $data['tinh_thanh'] ?? null,
            'quan_huyen' => $data['quan_huyen'] ?? null,
            'phuong_xa' => $data['phuong_xa'] ?? null,
            'id_nguoi_phu_trach' => !empty($data['id_nguoi_phu_trach']) ? $data['id_nguoi_phu_trach'] : null,
            'cho_phep_ban' => $data['cho_phep_ban'] ?? 1,
            'cho_phep_chuyen' => $data['cho_phep_chuyen'] ?? 1,
            'cho_phep_kiem_ke' => $data['cho_phep_kiem_ke'] ?? 1,
            'trang_thai' => $data['trang_thai'] ?? 1
        ]);
    }

    public function capNhatTrangThai($id, $trangThai)
    {
        $stmt = $this->db->prepare("UPDATE kho_hang SET trang_thai = :trang_thai WHERE id = :id");
        return $stmt->execute(['id' => $id, 'trang_thai' => $trangThai]);
    }

    public function datMacDinh($id)
    {
        try {
            $this->db->beginTransaction();
            // Reset tất cả
            $this->db->exec("UPDATE kho_hang SET mac_dinh = 0");
            // Set kho được chọn
            $stmt = $this->db->prepare("UPDATE kho_hang SET mac_dinh = 1 WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("Lỗi đặt mặc định: " . $e->getMessage());
            return false;
        }
    }

    public function kiemTraMaTonTai($maKho, $idNgoaiTru = null)
    {
        $sql = "SELECT COUNT(*) FROM kho_hang WHERE ma_kho = :ma_kho";
        $params = ['ma_kho' => $maKho];
        if ($idNgoaiTru) {
            $sql .= " AND id != :id";
            $params['id'] = $idNgoaiTru;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }

    public function thongKe()
    {
        $sql = "SELECT 
                    COUNT(*) as tong_kho,
                    SUM(CASE WHEN trang_thai = 1 THEN 1 ELSE 0 END) as dang_hoat_dong,
                    SUM(CASE WHEN trang_thai = 2 THEN 1 ELSE 0 END) as tam_ngung,
                    SUM(CASE WHEN trang_thai = 0 THEN 1 ELSE 0 END) as ngung_dung
                FROM kho_hang";
        $stmt = $this->db->query($sql);
        $khoStats = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlKv = "SELECT 
                    COUNT(CASE WHEN cap_do = 'khu' THEN 1 END) as khu_vuc,
                    COUNT(CASE WHEN cap_do IN ('ke','ngan') THEN 1 END) as vi_tri
                  FROM khu_vuc_kho";
        $stmtKv = $this->db->query($sqlKv);
        $kvStats = $stmtKv->fetch(PDO::FETCH_ASSOC);

        // Kho mặc định
        $stmtMd = $this->db->query("SELECT ten_kho FROM kho_hang WHERE mac_dinh = 1 LIMIT 1");
        $khoMacDinh = $stmtMd->fetchColumn();

        return [
            'tong_kho' => $khoStats['tong_kho'] ?? 0,
            'dang_hoat_dong' => $khoStats['dang_hoat_dong'] ?? 0,
            'khu_vuc' => $kvStats['khu_vuc'] ?? 0,
            'vi_tri' => $kvStats['vi_tri'] ?? 0,
            'chua_gan_vi_tri' => 0,
            'can_kiem_tra' => ($khoStats['tam_ngung'] ?? 0) + ($khoStats['ngung_dung'] ?? 0),
            'kho_mac_dinh' => $khoMacDinh ?: 'Chưa đặt'
        ];
    }

    public function layDanhSachChoSelect()
    {
        $stmt = $this->db->query("SELECT id, ma_kho, ten_kho, mac_dinh FROM kho_hang WHERE trang_thai = 1 ORDER BY mac_dinh DESC, ten_kho ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layNhanVien()
    {
        $stmt = $this->db->query("SELECT id, ho_ten FROM nguoi_dung WHERE id_vai_tro IS NOT NULL AND trang_thai = 1 ORDER BY ho_ten ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
