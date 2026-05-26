SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

--
-- Cơ sở dữ liệu: `shop_chuoi_ngoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--
CREATE TABLE IF NOT EXISTS `nguoi_dung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `vai_tro` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1: Admin, 2: Khách hàng',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hoạt động, 0: Khóa',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--
CREATE TABLE IF NOT EXISTS `danh_muc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hiển thị, 0: Ẩn',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_da`
--
CREATE TABLE IF NOT EXISTS `loai_da` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai_da` varchar(255) NOT NULL,
  `y_nghia` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menh_phong_thuy`
--
CREATE TABLE IF NOT EXISTS `menh_phong_thuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_menh` varchar(50) NOT NULL COMMENT 'Kim, Mộc, Thủy, Hỏa, Thổ',
  `mo_ta` text DEFAULT NULL,
  `tuong_sinh` varchar(50) DEFAULT NULL,
  `tuong_khac` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_danh_muc` int(11) DEFAULT NULL,
  `id_loai_da` int(11) DEFAULT NULL,
  `id_menh_phong_thuy` int(11) DEFAULT NULL,
  `ma_san_pham` varchar(50) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_ban` decimal(10,0) NOT NULL,
  `gia_nhap` decimal(10,0) DEFAULT NULL,
  `so_luong_ton` int(11) NOT NULL DEFAULT 0,
  `mo_ta_chi_tiet` text DEFAULT NULL,
  `hinh_anh_chinh` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Đang bán, 0: Ngừng kinh doanh',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_san_pham` (`ma_san_pham`),
  KEY `id_danh_muc` (`id_danh_muc`),
  KEY `id_loai_da` (`id_loai_da`),
  KEY `id_menh_phong_thuy` (`id_menh_phong_thuy`),
  CONSTRAINT `fk_sp_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_sp_loaida` FOREIGN KEY (`id_loai_da`) REFERENCES `loai_da` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_sp_menh` FOREIGN KEY (`id_menh_phong_thuy`) REFERENCES `menh_phong_thuy` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_pham`
--
CREATE TABLE IF NOT EXISTS `hinh_anh_san_pham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_san_pham` int(11) NOT NULL,
  `duong_dan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_san_pham` (`id_san_pham`),
  CONSTRAINT `fk_hinhanh_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--
CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_voucher` varchar(50) NOT NULL,
  `loai_giam_gia` tinyint(1) NOT NULL COMMENT '1: %, 2: Tiền mặt',
  `gia_tri_giam` decimal(10,0) NOT NULL,
  `don_hang_toi_thieu` decimal(10,0) DEFAULT 0,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hoạt động, 0: Tạm dừng',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_voucher` (`ma_voucher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--
CREATE TABLE IF NOT EXISTS `khuyen_mai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_san_pham` int(11) NOT NULL,
  `phan_tram_giam` int(11) NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_san_pham` (`id_san_pham`),
  CONSTRAINT `fk_km_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--
CREATE TABLE IF NOT EXISTS `don_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nguoi_dung` int(11) DEFAULT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(20) NOT NULL,
  `dia_chi_giao_hang` text NOT NULL,
  `tong_tien` decimal(10,0) NOT NULL,
  `phi_van_chuyen` decimal(10,0) NOT NULL DEFAULT 0,
  `id_voucher` int(11) DEFAULT NULL,
  `thanh_tien` decimal(10,0) NOT NULL,
  `phuong_thuc_thanh_toan` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: COD, 2: Chuyển khoản',
  `trang_thai_thanh_toan` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chưa thanh toán, 1: Đã thanh toán',
  `trang_thai_don_hang` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chờ xử lý, 1: Đang xử lý, 2: Đang giao, 3: Hoàn thành, 4: Đã hủy',
  `ghi_chu` text DEFAULT NULL,
  `ngay_dat` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_nguoi_dung` (`id_nguoi_dung`),
  KEY `id_voucher` (`id_voucher`),
  CONSTRAINT `fk_donhang_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_donhang_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--
CREATE TABLE IF NOT EXISTS `chi_tiet_don_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_don_hang` int(11) NOT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_don_hang` (`id_don_hang`),
  KEY `id_san_pham` (`id_san_pham`),
  CONSTRAINT `fk_ctdh_donhang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ctdh_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--
CREATE TABLE IF NOT EXISTS `danh_gia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_san_pham` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `so_sao` tinyint(1) NOT NULL DEFAULT 5,
  `noi_dung` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hiển thị, 0: Ẩn',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_san_pham` (`id_san_pham`),
  KEY `id_nguoi_dung` (`id_nguoi_dung`),
  CONSTRAINT `fk_danhgia_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_danhgia_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--
CREATE TABLE IF NOT EXISTS `bai_viet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieu_de` varchar(255) NOT NULL,
  `tom_tat` text DEFAULT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `id_nguoi_dung` int(11) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hiển thị, 0: Ẩn',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_nguoi_dung` (`id_nguoi_dung`),
  CONSTRAINT `fk_baiviet_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dữ liệu mẫu ban đầu (Seed Data)
--

INSERT INTO `nguoi_dung` (`ho_ten`, `email`, `mat_khau`, `vai_tro`, `trang_thai`) VALUES
('Quản trị viên', 'admin@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1);
-- Mật khẩu mẫu: password

INSERT INTO `menh_phong_thuy` (`ten_menh`, `mo_ta`, `tuong_sinh`, `tuong_khac`) VALUES
('Kim', 'Mệnh Kim tượng trưng cho kim loại, kim khí.', 'Thổ', 'Hỏa'),
('Mộc', 'Mệnh Mộc tượng trưng cho cây cối, sự sống.', 'Thủy', 'Kim'),
('Thủy', 'Mệnh Thủy tượng trưng cho nước.', 'Kim', 'Thổ'),
('Hỏa', 'Mệnh Hỏa tượng trưng cho lửa.', 'Mộc', 'Thủy'),
('Thổ', 'Mệnh Thổ tượng trưng cho đất.', 'Hỏa', 'Mộc');

INSERT INTO `loai_da` (`ten_loai_da`, `y_nghia`) VALUES
('Cẩm thạch', 'Mang lại bình an, sức khỏe và may mắn'),
('Thạch anh tím', 'Tăng cường trí nhớ, giảm căng thẳng, giúp ngủ ngon'),
('Mắt hổ', 'Mang lại sự mạnh mẽ, tự tin và thu hút tài lộc'),
('Mã não', 'Bảo vệ, xua đuổi tà khí, mang lại bình an');

INSERT INTO `danh_muc` (`ten_danh_muc`, `mo_ta`) VALUES
('Vòng tay nam', 'Các mẫu vòng tay phong thủy dành cho nam'),
('Vòng tay nữ', 'Các mẫu vòng tay phong thủy dành cho nữ'),
('Vòng cổ', 'Các mẫu dây chuyền, mặt đá phong thủy'),
('Nhẫn phong thủy', 'Các mẫu nhẫn đính đá phong thủy');

COMMIT;