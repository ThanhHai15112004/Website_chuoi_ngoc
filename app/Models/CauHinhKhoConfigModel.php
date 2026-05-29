<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class CauHinhKhoConfigModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy toàn bộ cấu hình dạng key => value
     */
    public function layTatCa()
    {
        $stmt = $this->db->query("SELECT config_key, config_value FROM cau_hinh_kho");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[$row['config_key']] = $row['config_value'];
        }
        return $result;
    }

    /**
     * Lấy 1 giá trị cấu hình
     */
    public function layGiaTri($key, $default = null)
    {
        $stmt = $this->db->prepare("SELECT config_value FROM cau_hinh_kho WHERE config_key = :key");
        $stmt->execute(['key' => $key]);
        $val = $stmt->fetchColumn();
        return $val !== false ? $val : $default;
    }

    /**
     * Upsert 1 cấu hình
     */
    public function luuCauHinh($key, $value)
    {
        $sql = "INSERT INTO cau_hinh_kho (config_key, config_value) 
                VALUES (:key, :value) 
                ON DUPLICATE KEY UPDATE config_value = :value2";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'key' => $key,
            'value' => $value,
            'value2' => $value
        ]);
    }

    /**
     * Upsert nhiều cấu hình cùng lúc
     */
    public function luuNhieu($data)
    {
        try {
            $this->db->beginTransaction();
            foreach ($data as $key => $value) {
                $this->luuCauHinh($key, $value);
            }
            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi lưu cấu hình: " . $e->getMessage());
            return false;
        }
    }
}
