<?php
namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class SanPhamViTriModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy danh sách sản phẩm tại 1 vị trí cụ thể (kệ hoặc ngăn)
     */
    public function layDanhSachSanPhamTaiViTri($idViTri)
    {
        $sql = "SELECT spvt.*, 
                       sp.ten_sp, sp.ma_sp, sp.hinh_anh_chinh,
                       bt.thuoc_tinh as bien_the_ten
                FROM san_pham_vi_tri spvt
                JOIN san_pham_bien_the bt ON spvt.id_bien_the = bt.id
                JOIN san_pham sp ON bt.id_san_pham = sp.id
                WHERE spvt.id_vi_tri = :id_vi_tri AND spvt.so_luong > 0
                ORDER BY spvt.ngay_cap_nhat DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_vi_tri' => $idViTri]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy tổng số lượng sản phẩm đang chứa tại 1 vị trí
     */
    public function laySoLuongHienTai($idViTri)
    {
        $sql = "SELECT COALESCE(SUM(so_luong), 0) FROM san_pham_vi_tri WHERE id_vi_tri = :id_vi_tri";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_vi_tri' => $idViTri]);
        return (int)$stmt->fetchColumn();
    }

    /**
     * Lấy tổng đệ quy: tổng SL SP ở vị trí + tất cả vị trí con cháu
     */
    public function laySoLuongDeQuy($idViTri)
    {
        // Vì MySQL có thể không hỗ trợ CTE dễ dàng ở bản cũ, 
        // ở mức ứng dụng có thể lấy qua PHP. Nhưng ở đây ta sẽ dùng hàm đệ quy PHP
        // Hàm này sẽ lấy toàn bộ cây con của idViTri và sum
        $allChildrenIds = $this->getAllChildrenIds($idViTri);
        $allChildrenIds[] = $idViTri;

        $inQuery = implode(',', array_fill(0, count($allChildrenIds), '?'));
        $sql = "SELECT COALESCE(SUM(so_luong), 0) FROM san_pham_vi_tri WHERE id_vi_tri IN ($inQuery)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($allChildrenIds);
        return (int)$stmt->fetchColumn();
    }

    private function getAllChildrenIds($parentId)
    {
        $ids = [];
        $stmt = $this->db->prepare("SELECT id FROM khu_vuc_kho WHERE id_cha = ?");
        $stmt->execute([$parentId]);
        $children = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        foreach ($children as $childId) {
            $ids[] = $childId;
            $ids = array_merge($ids, $this->getAllChildrenIds($childId));
        }
        return $ids;
    }

    /**
     * Kiểm tra có vượt sức chứa không trước khi nhập
     * Trả về true nếu có thể chứa (hoặc không giới hạn), false nếu vượt quá
     */
    public function kiemTraSucChua($idViTri, $soLuongThem)
    {
        $stmt = $this->db->prepare("SELECT suc_chua FROM khu_vuc_kho WHERE id = :id");
        $stmt->execute(['id' => $idViTri]);
        $sucChua = $stmt->fetchColumn();

        // NULL nghĩa là không giới hạn
        if ($sucChua === null) {
            return true;
        }

        $hienTai = $this->laySoLuongHienTai($idViTri);
        if (($hienTai + $soLuongThem) > $sucChua) {
            return false;
        }
        return true;
    }

    /**
     * Cộng số lượng SP vào vị trí (khi nhập kho)
     */
    public function congSoLuong($idViTri, $idBienThe, $soLuong)
    {
        if ($soLuong <= 0) return true;

        $stmtCheck = $this->db->prepare("SELECT id FROM san_pham_vi_tri WHERE id_vi_tri = :v AND id_bien_the = :b");
        $stmtCheck->execute(['v' => $idViTri, 'b' => $idBienThe]);
        $idSpvt = $stmtCheck->fetchColumn();

        if ($idSpvt) {
            $stmt = $this->db->prepare("UPDATE san_pham_vi_tri SET so_luong = so_luong + :sl WHERE id = :id");
            return $stmt->execute(['sl' => $soLuong, 'id' => $idSpvt]);
        } else {
            $stmtId = $this->db->prepare("SELECT UUID()");
            $stmtId->execute();
            $newId = $stmtId->fetchColumn();

            $stmt = $this->db->prepare("INSERT INTO san_pham_vi_tri (id, id_vi_tri, id_bien_the, so_luong) VALUES (:id, :v, :b, :sl)");
            return $stmt->execute([
                'id' => $newId,
                'v' => $idViTri,
                'b' => $idBienThe,
                'sl' => $soLuong
            ]);
        }
    }

    /**
     * Trừ số lượng SP khỏi vị trí (khi xuất kho)
     */
    public function truSoLuong($idViTri, $idBienThe, $soLuong)
    {
        if ($soLuong <= 0) return true;

        $stmt = $this->db->prepare("UPDATE san_pham_vi_tri SET so_luong = so_luong - :sl WHERE id_vi_tri = :v AND id_bien_the = :b");
        $stmt->execute(['sl' => $soLuong, 'v' => $idViTri, 'b' => $idBienThe]);
        
        // Dọn dẹp dòng có số lượng <= 0
        $stmtCleanup = $this->db->prepare("DELETE FROM san_pham_vi_tri WHERE so_luong <= 0");
        $stmtCleanup->execute();
        
        return true;
    }

    /**
     * Lấy tất cả vị trí đang chứa 1 biến thể cụ thể
     */
    public function layViTriCuaBienThe($idBienThe)
    {
        $sql = "SELECT spvt.*, kv.ten_vi_tri, kv.ma_vi_tri, kv.cap_do, k.ten_kho 
                FROM san_pham_vi_tri spvt
                JOIN khu_vuc_kho kv ON spvt.id_vi_tri = kv.id
                JOIN kho_hang k ON kv.id_kho = k.id
                WHERE spvt.id_bien_the = :id_bien_the AND spvt.so_luong > 0
                ORDER BY k.ten_kho, kv.ten_vi_tri";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_bien_the' => $idBienThe]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
