CREATE TABLE IF NOT EXISTS `binh_luan_bai_viet` (
  `id` varchar(36) NOT NULL,
  `id_bai_viet` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) DEFAULT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `noi_dung` text NOT NULL,
  `id_phan_hoi` varchar(36) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hợp lệ, 0: Ẩn',
  `ngay_tao` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_bl_bv` (`id_bai_viet`),
  KEY `fk_bl_nd` (`id_nguoi_dung`),
  KEY `fk_bl_ph` (`id_phan_hoi`),
  CONSTRAINT `fk_bl_bv` FOREIGN KEY (`id_bai_viet`) REFERENCES `bai_viet` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_bl_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_bl_ph` FOREIGN KEY (`id_phan_hoi`) REFERENCES `binh_luan_bai_viet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert some dummy data for an existing article if it exists, but we can't be sure of article IDs. Let's just create the table.
