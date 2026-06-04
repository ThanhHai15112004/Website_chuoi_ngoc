<?php
namespace App\Models\User;

use App\Core\Database;
use PDO;
use Exception;

class SoDiaChiModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    /**
     * Lấy tất cả địa chỉ của một user, sắp xếp mặc định lên đầu
     */
    public function getAllByUserId($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM so_dia_chi WHERE id_nguoi_dung = ? ORDER BY la_mac_dinh DESC, ngay_tao DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy 1 địa chỉ theo id
     */
    public function getById($id, $userId)
    {
        $sql = "SELECT * FROM so_dia_chi WHERE id = ? AND id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Thêm địa chỉ mới
     */
    public function add($data)
    {
        // Nếu đây là địa chỉ đầu tiên hoặc được set là mặc định, reset các mặc định khác
        if (!empty($data['la_mac_dinh'])) {
            $this->resetDefault($data['id_nguoi_dung']);
        } else {
            // Kiểm tra xem đã có địa chỉ nào chưa, nếu chưa có thì ép mặc định = 1
            $check = $this->getAllByUserId($data['id_nguoi_dung']);
            if (empty($check)) {
                $data['la_mac_dinh'] = 1;
            } else {
                $data['la_mac_dinh'] = 0;
            }
        }

        $stmtUuid = $this->db->query("SELECT UUID() as uuid");
        $id = $stmtUuid->fetch(PDO::FETCH_ASSOC)['uuid'];

        $sql = "INSERT INTO so_dia_chi (id, id_nguoi_dung, ho_ten, so_dien_thoai, tinh_thanh, quan_huyen, phuong_xa, dia_chi_cu_the, la_mac_dinh) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([
            $id,
            $data['id_nguoi_dung'],
            $data['ho_ten'],
            $data['so_dien_thoai'],
            $data['tinh_thanh'],
            $data['quan_huyen'],
            $data['phuong_xa'],
            $data['dia_chi_cu_the'],
            $data['la_mac_dinh']
        ]);

        return $success ? $id : false;
    }

    /**
     * Cập nhật địa chỉ
     */
    public function update($id, $userId, $data)
    {
        if (!empty($data['la_mac_dinh'])) {
            $this->resetDefault($userId);
        }

        $sql = "UPDATE so_dia_chi 
                SET ho_ten = ?, so_dien_thoai = ?, tinh_thanh = ?, quan_huyen = ?, phuong_xa = ?, dia_chi_cu_the = ?, la_mac_dinh = ?
                WHERE id = ? AND id_nguoi_dung = ?";
                
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['ho_ten'],
            $data['so_dien_thoai'],
            $data['tinh_thanh'],
            $data['quan_huyen'],
            $data['phuong_xa'],
            $data['dia_chi_cu_the'],
            $data['la_mac_dinh'] ?? 0,
            $id,
            $userId
        ]);
    }

    /**
     * Đặt địa chỉ làm mặc định
     */
    public function setDefault($id, $userId)
    {
        $this->resetDefault($userId);
        
        $sql = "UPDATE so_dia_chi SET la_mac_dinh = 1 WHERE id = ? AND id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id, $userId]);
    }

    /**
     * Bỏ mặc định tất cả địa chỉ của user này
     */
    private function resetDefault($userId)
    {
        $sql = "UPDATE so_dia_chi SET la_mac_dinh = 0 WHERE id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
    }

    /**
     * Xóa địa chỉ
     */
    public function delete($id, $userId)
    {
        // Không cho xóa nếu là mặc định?
        // Ở đây cứ cho xóa, nếu xóa xong mà hết mặc định thì lấy cái đầu tiên làm mặc định
        $sql = "DELETE FROM so_dia_chi WHERE id = ? AND id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([$id, $userId]);

        if ($success) {
            $this->ensureOneDefault($userId);
        }
        return $success;
    }

    /**
     * Đảm bảo luôn có 1 địa chỉ mặc định nếu có địa chỉ
     */
    private function ensureOneDefault($userId)
    {
        $sql = "SELECT id FROM so_dia_chi WHERE id_nguoi_dung = ? AND la_mac_dinh = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        $hasDefault = $stmt->fetch();

        if (!$hasDefault) {
            // Lấy cái mới nhất làm mặc định
            $sql = "UPDATE so_dia_chi SET la_mac_dinh = 1 WHERE id_nguoi_dung = ? ORDER BY ngay_tao DESC LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
        }
    }
}
