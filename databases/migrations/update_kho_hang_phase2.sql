-- Migration cho Phase 2: Phân Quyền Kho & Lịch Kiểm Kê Tự Động

-- 1. Bảng phân quyền kho cho từng nhân viên
CREATE TABLE IF NOT EXISTS `phan_quyen_kho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kho` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nguoi_dung` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  
  -- Các quyền chi tiết
  `quyen_xem` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_nhap` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_xuat` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_dieu_chinh` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_kiem_ke` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_chuyen` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_duyet` tinyint(1) NOT NULL DEFAULT 0,
  
  `ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_phan_quyen` (`id_kho`, `id_nguoi_dung`),
  CONSTRAINT `fk_quyen_kho` FOREIGN KEY (`id_kho`) REFERENCES `kho_hang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_quyen_nguoi_dung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Bảng lịch kiểm kê định kỳ
CREATE TABLE IF NOT EXISTS `lich_kiem_ke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_lich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kho` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pham_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'toan_kho hoặc chuỗi json chứa id nhóm',
  `chu_ky` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'hang_ngay, hang_tuan, hang_thang',
  `thoi_gian_tao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tạo vào thứ mấy hoặc ngày nào',
  `nhac_truoc_ngay` int(11) NOT NULL DEFAULT 1,
  `id_nguoi_thuc_hien` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Kích hoạt, 0: Tắt',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_lich_kho` FOREIGN KEY (`id_kho`) REFERENCES `kho_hang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_lich_nguoi_dung` FOREIGN KEY (`id_nguoi_thuc_hien`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Cập nhật cấu hình SKU mặc định nếu chưa có
INSERT IGNORE INTO `cau_hinh_kho` (`config_key`, `config_value`) VALUES
('sku_prefix', 'SP'),
('sku_length', '6'),
('barcode_type', 'code128'),
('barcode_print_size', '35x22'),
('barcode_print_name', '1'),
('barcode_print_price', '1');
