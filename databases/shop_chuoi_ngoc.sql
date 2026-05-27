SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

-- ==========================================
-- THIẾT KẾ CƠ SỞ DỮ LIỆU: CHUỖI NGỌC
-- ==========================================

-- ==========================================
-- PHẦN 1: NGƯỜI DÙNG & PHÂN QUYỀN
-- ==========================================

-- 1. Bảng Vai trò (Roles)
CREATE TABLE `vai_tro` (
  `id` varchar(36) NOT NULL,
  `ten_vai_tro` varchar(100) NOT NULL,
  `ma_vai_tro` varchar(50) NOT NULL UNIQUE,
  `quyen_han` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'JSON chứa mảng các quyền',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Bảng Hạng thành viên (Ranks)
CREATE TABLE `hang_thanh_vien` (
  `id` varchar(36) NOT NULL,
  `ten_hang` varchar(100) NOT NULL,
  `chi_tieu_toi_thieu` decimal(15,0) NOT NULL DEFAULT 0,
  `phan_tram_giam` decimal(5,2) NOT NULL DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Bảng Người dùng (Users & Staffs)
CREATE TABLE `nguoi_dung` (
  `id` varchar(36) NOT NULL,
  `id_vai_tro` varchar(36) DEFAULT NULL COMMENT 'Nếu NULL -> Là khách hàng',
  `id_hang_thanh_vien` varchar(36) DEFAULT NULL,
  `ma_nd` varchar(50) DEFAULT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `tong_chi_tieu` decimal(15,0) NOT NULL DEFAULT 0,
  `diem_thuong` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hoạt động, 0: Khóa',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_nd_vaitro` FOREIGN KEY (`id_vai_tro`) REFERENCES `vai_tro` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_nd_hang` FOREIGN KEY (`id_hang_thanh_vien`) REFERENCES `hang_thanh_vien` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ==========================================
-- PHẦN 2: SẢN PHẨM & THUỘC TÍNH
-- ==========================================

-- 4. Bảng Danh mục
CREATE TABLE `danh_muc` (
  `id` varchar(36) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `mo_ta` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Bảng Loại Đá
CREATE TABLE `loai_da` (
  `id` varchar(36) NOT NULL,
  `ten_loai_da` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `y_nghia` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Bảng Mệnh Phong Thủy
CREATE TABLE `menh_phong_thuy` (
  `id` varchar(36) NOT NULL,
  `ten_menh` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL UNIQUE,
  `mo_ta` text DEFAULT NULL,
  `tuong_sinh` varchar(50) DEFAULT NULL,
  `tuong_khac` varchar(50) DEFAULT NULL,
  `mau_sac_hop` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Bảng Sản Phẩm
CREATE TABLE `san_pham` (
  `id` varchar(36) NOT NULL,
  `ma_sp` varchar(50) NOT NULL UNIQUE,
  `ten_sp` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `id_danh_muc` varchar(36) DEFAULT NULL,
  `id_loai_da` varchar(36) DEFAULT NULL,
  `id_menh_phong_thuy` varchar(36) DEFAULT NULL,
  `gia_nhap` decimal(15,0) DEFAULT NULL,
  `gia_ban` decimal(15,0) NOT NULL,
  `gia_khuyen_mai` decimal(15,0) DEFAULT NULL,
  `mo_ta_ngan` text DEFAULT NULL,
  `mo_ta_chi_tiet` longtext DEFAULT NULL,
  `hinh_anh_chinh` varchar(255) DEFAULT NULL,
  `tong_ton_kho` int(11) NOT NULL DEFAULT 0 COMMENT 'Tính tổng từ các biến thể',
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Đang bán, 0: Ngừng',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_sp_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_sp_loaida` FOREIGN KEY (`id_loai_da`) REFERENCES `loai_da` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_sp_menh` FOREIGN KEY (`id_menh_phong_thuy`) REFERENCES `menh_phong_thuy` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Bảng Biến thể Sản phẩm (VD: Size 10mm, 12mm)
CREATE TABLE `san_pham_bien_the` (
  `id` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `thuoc_tinh` varchar(100) NOT NULL COMMENT 'VD: Size 10mm',
  `so_luong_ton` int(11) NOT NULL DEFAULT 0,
  `gia_cong_them` decimal(15,0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_bienthe_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Bảng Hình ảnh Phụ
CREATE TABLE `san_pham_hinh_anh` (
  `id` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `duong_dan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_hinhanh_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ==========================================
-- PHẦN 3: BÁN HÀNG & CHĂM SÓC KHÁCH HÀNG
-- ==========================================

-- 10. Bảng Voucher
CREATE TABLE `voucher` (
  `id` varchar(36) NOT NULL,
  `ma_voucher` varchar(50) NOT NULL UNIQUE,
  `loai_giam` tinyint(1) NOT NULL COMMENT '1: Phầm trăm (%), 2: Tiền mặt',
  `gia_tri` decimal(15,0) NOT NULL,
  `don_toi_thieu` decimal(15,0) DEFAULT 0,
  `giam_toi_da` decimal(15,0) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `da_dung` int(11) NOT NULL DEFAULT 0,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Bảng Đơn Hàng
CREATE TABLE `don_hang` (
  `id` varchar(36) NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL UNIQUE,
  `id_nguoi_dung` varchar(36) DEFAULT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(20) NOT NULL,
  `dia_chi_giao_hang` text NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tong_tien` decimal(15,0) NOT NULL COMMENT 'Tổng tiền hàng',
  `phi_ship` decimal(15,0) NOT NULL DEFAULT 0,
  `id_voucher` varchar(36) DEFAULT NULL,
  `tien_giam_gia` decimal(15,0) NOT NULL DEFAULT 0,
  `thanh_tien` decimal(15,0) NOT NULL COMMENT 'Số tiền khách thực trả',
  `pt_thanh_toan` varchar(50) NOT NULL COMMENT 'COD, VNPAY, MOMO...',
  `trang_thai_thanh_toan` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chưa TT, 1: Đã TT',
  `trang_thai_don_hang` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chờ xử lý, 1: Đang chuẩn bị, 2: Đang giao, 3: Hoàn thành, 4: Đã hủy',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_donhang_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_donhang_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Bảng Chi tiết Đơn hàng
CREATE TABLE `chi_tiet_don_hang` (
  `id` varchar(36) NOT NULL,
  `id_don_hang` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(15,0) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ctdh_donhang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ctdh_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 13. Bảng Đánh Giá (Review)
CREATE TABLE `danh_gia` (
  `id` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) NOT NULL,
  `id_don_hang` varchar(36) DEFAULT NULL,
  `so_sao` tinyint(1) NOT NULL DEFAULT 5,
  `noi_dung` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hiển thị, 0: Ẩn',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_danhgia_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_danhgia_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_danhgia_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Bảng Sản phẩm Yêu Thích (Wishlist)
CREATE TABLE `san_pham_yeu_thich` (
  `id_nguoi_dung` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  PRIMARY KEY (`id_nguoi_dung`, `id_san_pham`),
  CONSTRAINT `fk_yt_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_yt_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ==========================================
-- PHẦN 4: KHO HÀNG & ĐỐI TÁC
-- ==========================================

-- 15. Bảng Nhà Cung Cấp
CREATE TABLE `nha_cung_cap` (
  `id` varchar(36) NOT NULL,
  `ma_ncc` varchar(50) NOT NULL UNIQUE,
  `ten_ncc` varchar(255) NOT NULL,
  `nguoi_lien_he` varchar(100) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 16. Bảng Phiếu Kho (Gộp chung Nhập, Xuất, Kiểm kê, Chuyển)
CREATE TABLE `phieu_kho` (
  `id` varchar(36) NOT NULL,
  `ma_phieu` varchar(50) NOT NULL UNIQUE,
  `loai_phieu` tinyint(1) NOT NULL COMMENT '1: Nhập kho, 2: Xuất kho, 3: Thuyên chuyển, 4: Kiểm kê',
  `id_nguoi_tao` varchar(36) DEFAULT NULL,
  `id_nha_cung_cap` varchar(36) DEFAULT NULL COMMENT 'Dùng khi Nhập kho',
  `tong_tien` decimal(15,0) DEFAULT 0 COMMENT 'Dùng cho Phiếu nhập/xuất',
  `ly_do` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Bản nháp, 1: Hoàn thành, 2: Đã hủy',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_phieu_nd` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_phieu_ncc` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 17. Bảng Chi Tiết Phiếu Kho
CREATE TABLE `chi_tiet_phieu_kho` (
  `id` varchar(36) NOT NULL,
  `id_phieu_kho` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(15,0) DEFAULT 0,
  `ghi_chu_ct` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ctpk_phieu` FOREIGN KEY (`id_phieu_kho`) REFERENCES `phieu_kho` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ctpk_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ==========================================
-- PHẦN 5: NỘI DUNG & HỆ THỐNG
-- ==========================================

-- 18. Bảng Bài Viết (Blog)
CREATE TABLE `bai_viet` (
  `id` varchar(36) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `tom_tat` text DEFAULT NULL,
  `noi_dung` longtext NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `id_nguoi_tao` varchar(36) DEFAULT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Xuất bản, 0: Bản nháp',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_bv_nd` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 19. Bảng Cấu Hình (Settings) (Gộp Info, Payment, Shipping, Policy)
CREATE TABLE `cau_hinh` (
  `id` varchar(36) NOT NULL,
  `ma_cau_hinh` varchar(100) NOT NULL UNIQUE COMMENT 'VD: thong_tin_shop, phuong_thuc_thanh_toan...',
  `ten_cau_hinh` varchar(255) NOT NULL,
  `gia_tri` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'JSON',
  `mo_ta` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 20. Bảng Nhật Ký Hoạt Động (Activity Logs)
CREATE TABLE `nhat_ky_hoat_dong` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) DEFAULT NULL,
  `hanh_dong` varchar(100) NOT NULL COMMENT 'Đăng nhập, Tạo, Cập nhật, Xóa...',
  `module` varchar(100) NOT NULL COMMENT 'Sản phẩm, Đơn hàng, Kho...',
  `doi_tuong_id` varchar(50) DEFAULT NULL,
  `gia_tri_cu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `gia_tri_moi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `thiet_bi` varchar(255) DEFAULT NULL,
  `muc_do` enum('Bình thường', 'Quan trọng', 'Nguy hiểm', 'Bảo mật') NOT NULL DEFAULT 'Bình thường',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_log_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 21. Bảng Thông Báo (Notifications)
CREATE TABLE `thong_bao` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) DEFAULT NULL COMMENT 'Nếu NULL -> Gửi tất cả',
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `loai_thong_bao` varchar(50) NOT NULL COMMENT 'DonHang, HeThong, KhuyenMai...',
  `link` varchar(255) DEFAULT NULL,
  `da_doc` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ==========================================
-- PHẦN 6: SEED DATA (DỮ LIỆU MẪU)
-- ==========================================

-- Seed Vai Trò
INSERT INTO `vai_tro` (`id`, `ten_vai_tro`, `ma_vai_tro`, `quyen_han`) VALUES
('role_1', 'Super Admin', 'super_admin', '["all"]'),
('role_2', 'Quản lý Kho', 'quan_ly_kho', '["view_kho", "add_kho", "edit_kho"]'),
('role_3', 'Chăm sóc khách hàng', 'cskh', '["view_don_hang", "edit_don_hang", "view_khach_hang"]');

-- Seed Hạng Thành Viên
INSERT INTO `hang_thanh_vien` (`id`, `ten_hang`, `chi_tieu_toi_thieu`, `phan_tram_giam`, `icon`) VALUES
('rank_1', 'Đồng', 0, 0, 'mdi:medal-outline'),
('rank_2', 'Bạc', 5000000, 5, 'mdi:medal'),
('rank_3', 'Vàng', 15000000, 10, 'mdi:star-circle'),
('rank_4', 'Kim Cương', 50000000, 15, 'mdi:diamond');

-- Seed Người Dùng
INSERT INTO `nguoi_dung` (`id`, `id_vai_tro`, `ma_nd`, `ho_ten`, `email`, `mat_khau`, `trang_thai`) VALUES
('user_1', 'role_1', 'NV001', 'Hải Admin', 'admin@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1),
('user_2', 'role_2', 'NV002', 'Tuấn Kho', 'kho@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1),
('user_3', NULL, 'KH001', 'Khách hàng A', 'khachhang@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1);

-- Seed Mệnh Phong Thủy
INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `tuong_sinh`, `tuong_khac`, `mau_sac_hop`) VALUES
('menh_1', 'Kim', 'kim', 'Thổ', 'Hỏa', 'Trắng, Xám, Ghi, Vàng, Nâu Đất'),
('menh_2', 'Mộc', 'moc', 'Thủy', 'Kim', 'Xanh Lá Cây, Đen, Xanh Nước Biển'),
('menh_3', 'Thủy', 'thuy', 'Kim', 'Thổ', 'Đen, Xanh Nước Biển, Trắng, Xám, Ghi'),
('menh_4', 'Hỏa', 'hoa', 'Mộc', 'Thủy', 'Đỏ, Hồng, Tím, Xanh Lá Cây'),
('menh_5', 'Thổ', 'tho', 'Hỏa', 'Mộc', 'Vàng, Nâu Đất, Đỏ, Hồng, Tím');

-- Seed Danh Mục & Loại Đá
INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `slug`) VALUES 
('cat_1', 'Vòng tay nam', 'vong-tay-nam'), 
('cat_2', 'Vòng tay nữ', 'vong-tay-nu'), 
('cat_3', 'Dây chuyền', 'day-chuyen');

INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`) VALUES 
('stone_1', 'Ngọc Bích', 'ngoc-bich'), 
('stone_2', 'Thạch Anh', 'thach-anh'), 
('stone_3', 'Mắt Hổ', 'mat-ho');

-- Seed Cấu Hình
INSERT INTO `cau_hinh` (`id`, `ma_cau_hinh`, `ten_cau_hinh`, `gia_tri`) VALUES
('config_1', 'thong_tin_shop', 'Thông tin cửa hàng', '{"ten_shop": "Chuỗi Ngọc", "sdt": "0987654321", "dia_chi": "123 Đường X, Hà Nội", "email": "contact@chuoingoc.com"}'),
('config_2', 'phuong_thuc_thanh_toan', 'Phương thức thanh toán', '[{"id": "cod", "ten": "Thanh toán khi nhận hàng", "trang_thai": true}, {"id": "vnpay", "ten": "Chuyển khoản VNPay", "trang_thai": true}]'),
('config_3', 'phuong_thuc_van_chuyen', 'Phương thức vận chuyển', '[{"id": "ghtk", "ten": "Giao Hàng Tiết Kiệm", "phi": 30000, "trang_thai": true}]');

COMMIT;
