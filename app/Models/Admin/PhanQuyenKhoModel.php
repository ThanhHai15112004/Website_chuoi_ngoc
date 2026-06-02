<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use PDOException;

class PhanQuyenKhoModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy ma trận quyền của một kho cụ thể
     */
    public function layQuyenTheoKho($idKho)
    {
        $sql = "SELECT pq.*, nd.ho_ten, vt.ten_vai_tro, nd.anh_dai_dien 
                FROM phan_quyen_kho pq
                JOIN nguoi_dung nd ON pq.id_nguoi_dung = nd.id
                LEFT JOIN vai_tro vt ON nd.id_vai_tro = vt.id
                WHERE pq.id_kho = :id_kho
                ORDER BY nd.ho_ten ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_kho' => $idKho]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lưu (Upsert) quyền cho 1 nhân viên trong 1 kho
     */
    public function luuQuyen($idKho, $idNhanVien, $quyen)
    {
        $sql = "INSERT INTO phan_quyen_kho 
                (id_kho, id_nguoi_dung, quyen_xem, quyen_nhap, quyen_xuat, quyen_dieu_chinh, quyen_kiem_ke, quyen_chuyen, quyen_duyet)
                VALUES (:id_kho, :id_nd, :xem, :nhap, :xuat, :dc, :kk, :chuyen, :duyet)
                ON DUPLICATE KEY UPDATE 
                quyen_xem = VALUES(quyen_xem), quyen_nhap = VALUES(quyen_nhap), quyen_xuat = VALUES(quyen_xuat),
                quyen_dieu_chinh = VALUES(quyen_dieu_chinh), quyen_kiem_ke = VALUES(quyen_kiem_ke),
                quyen_chuyen = VALUES(quyen_chuyen), quyen_duyet = VALUES(quyen_duyet)";
                
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_kho' => $idKho,
            'id_nd' => $idNhanVien,
            'xem' => isset($quyen['quyen_xem']) ? 1 : 0,
            'nhap' => isset($quyen['quyen_nhap']) ? 1 : 0,
            'xuat' => isset($quyen['quyen_xuat']) ? 1 : 0,
            'dc' => isset($quyen['quyen_dieu_chinh']) ? 1 : 0,
            'kk' => isset($quyen['quyen_kiem_ke']) ? 1 : 0,
            'chuyen' => isset($quyen['quyen_chuyen']) ? 1 : 0,
            'duyet' => isset($quyen['quyen_duyet']) ? 1 : 0
        ]);
    }
    
    /**
     * Lấy danh sách nhân viên chưa được phân quyền trong kho này
     */
    public function layNhanVienChuaPhanQuyen($idKho)
    {
        $sql = "SELECT nd.id, nd.ho_ten, vt.ten_vai_tro 
                FROM nguoi_dung nd
                LEFT JOIN vai_tro vt ON nd.id_vai_tro = vt.id
                WHERE nd.id_vai_tro IS NOT NULL 
                  AND nd.trang_thai = 1 
                  AND nd.id NOT IN (SELECT id_nguoi_dung FROM phan_quyen_kho WHERE id_kho = :id_kho)
                ORDER BY nd.ho_ten ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_kho' => $idKho]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
