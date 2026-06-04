-- Migration: Tạo bảng giỏ hàng cho user đã đăng nhập
-- Chạy trên database: shop_chuoi_ngoc

CREATE TABLE IF NOT EXISTS `gio_hang` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 1,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_user_variant` (`id_nguoi_dung`, `id_san_pham`, `id_bien_the`),
  CONSTRAINT `fk_gh_nguoidung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_gh_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_gh_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
