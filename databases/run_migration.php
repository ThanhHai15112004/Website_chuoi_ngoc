<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=shop_chuoi_ngoc;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `ket_qua_ban_menh` (
      `id` varchar(36) NOT NULL,
      `id_nguoi_dung` varchar(36) DEFAULT NULL COMMENT 'NULL neu khach vang lai',
      `slug_ket_qua` varchar(36) NOT NULL,
      `loai_lich` enum('duong','am') NOT NULL DEFAULT 'duong',
      `ngay_sinh` tinyint(2) DEFAULT NULL,
      `thang_sinh` tinyint(2) DEFAULT NULL,
      `nam_sinh` smallint(4) NOT NULL,
      `gioi_tinh` enum('male','female') NOT NULL,
      `mong_muon` varchar(50) DEFAULT NULL,
      `ten_menh` varchar(20) NOT NULL,
      `thien_can` varchar(10) NOT NULL,
      `dia_chi` varchar(10) NOT NULL,
      `cung_phi` tinyint(2) NOT NULL,
      `ten_cung` varchar(20) NOT NULL,
      `nhom_menh` varchar(30) NOT NULL,
      `ket_qua_json` longtext NOT NULL,
      `ngay_tra` datetime NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`),
      UNIQUE KEY `slug_ket_qua` (`slug_ket_qua`),
      KEY `idx_kqbm_user` (`id_nguoi_dung`),
      CONSTRAINT `fk_kqbm_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    $pdo->exec($sql);
    $stmt = $pdo->query("SHOW TABLES LIKE 'ket_qua_ban_menh'");
    if ($stmt->rowCount() > 0) {
        echo "SUCCESS: Table ket_qua_ban_menh created.\n";
    } else {
        echo "ERROR: Table not found after creation.\n";
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
