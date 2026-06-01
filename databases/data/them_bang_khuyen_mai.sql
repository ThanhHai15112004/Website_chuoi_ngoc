-- ==========================================
-- BỔ SUNG BẢNG CHƯƠNG TRÌNH KHUYẾN MÃI
-- ==========================================

-- Bảng Chương trình khuyến mãi
CREATE TABLE IF NOT EXISTS `chuong_trinh_khuyen_mai` (
  `id` varchar(36) NOT NULL,
  `ma_km` varchar(50) NOT NULL UNIQUE,
  `ten_chuong_trinh` varchar(255) NOT NULL,
  `loai_km` varchar(50) NOT NULL COMMENT 'percent, flash, clearance, bundle',
  `kieu_giam` varchar(50) NOT NULL COMMENT 'phan_tram, so_tien, gia_co_dinh',
  `gia_tri_giam` decimal(15,0) NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `gioi_han_tong` int(11) NOT NULL DEFAULT -1 COMMENT '-1: Không giới hạn',
  `gioi_han_khach` int(11) NOT NULL DEFAULT -1 COMMENT '-1: Không giới hạn',
  `da_su_dung` int(11) NOT NULL DEFAULT 0,
  `hien_thi_badge` tinyint(1) NOT NULL DEFAULT 1,
  `hien_thi_countdown` tinyint(1) NOT NULL DEFAULT 0,
  `hien_thi_progress` tinyint(1) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: Nháp/Tạm dừng, 1: Hoạt động, 2: Kết thúc',
  `nguoi_tao` varchar(36) DEFAULT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ctkm_nguoidung` FOREIGN KEY (`nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng Chi tiết Chương trình khuyến mãi - Sản phẩm
CREATE TABLE IF NOT EXISTS `chuong_trinh_khuyen_mai_san_pham` (
  `id` varchar(36) NOT NULL,
  `id_khuyen_mai` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `gia_tri_giam_tuy_chinh` decimal(15,0) DEFAULT NULL COMMENT 'NULL nếu theo giảm giá gốc của chương trình',
  `so_luong_gioi_han` int(11) NOT NULL DEFAULT -1,
  `so_luong_da_ban` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_km_sp_chuongtrinh` FOREIGN KEY (`id_khuyen_mai`) REFERENCES `chuong_trinh_khuyen_mai` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_km_sp_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
