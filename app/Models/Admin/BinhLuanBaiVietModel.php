<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class BinhLuanBaiVietModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layBinhLuanTheoBaiViet($id_bai_viet) {
        // Only valid comments
        $sql = "SELECT bl.*, nd.anh_dai_dien, nd.id_vai_tro 
                FROM binh_luan_bai_viet bl
                LEFT JOIN nguoi_dung nd ON bl.id_nguoi_dung = nd.id
                WHERE bl.id_bai_viet = ? AND bl.trang_thai = 1
                ORDER BY bl.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_bai_viet]);
        $allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Group into parents and children
        $parents = [];
        $children = [];
        foreach ($allComments as $comment) {
            if (empty($comment['id_phan_hoi'])) {
                $comment['replies'] = [];
                $parents[$comment['id']] = $comment;
            } else {
                $children[] = $comment;
            }
        }
        
        // Assign children to parents (reverse order for older first or keep descending)
        foreach ($children as $child) {
            $parentId = $child['id_phan_hoi'];
            if (isset($parents[$parentId])) {
                $parents[$parentId]['replies'][] = $child;
            }
        }

        // Return values (main comments)
        return array_values($parents);
    }

    public function themBinhLuan($data) {
        $sql = "INSERT INTO binh_luan_bai_viet 
                (id, id_bai_viet, id_nguoi_dung, ho_ten, email, noi_dung, id_phan_hoi, trang_thai, ngay_tao) 
                VALUES (?, ?, ?, ?, ?, ?, ?, 1, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['id'],
            $data['id_bai_viet'],
            $data['id_nguoi_dung'] ?? null,
            $data['ho_ten'],
            $data['email'] ?? null,
            $data['noi_dung'],
            $data['id_phan_hoi'] ?? null
        ]);
    }
}
