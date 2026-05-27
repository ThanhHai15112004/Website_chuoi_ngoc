
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Cơ sở dữ liệu: `shop_chuoi_ngoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id` varchar(36) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tom_tat` text DEFAULT NULL,
  `noi_dung` longtext NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `id_nguoi_tao` varchar(36) DEFAULT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Xuất bản, 0: Bản nháp',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cau_hinh`
--

CREATE TABLE `cau_hinh` (
  `id` varchar(36) NOT NULL,
  `ma_cau_hinh` varchar(100) NOT NULL COMMENT 'VD: thong_tin_shop, phuong_thuc_thanh_toan...',
  `ten_cau_hinh` varchar(255) NOT NULL,
  `gia_tri` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'JSON',
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cau_hinh`
--

INSERT INTO `cau_hinh` (`id`, `ma_cau_hinh`, `ten_cau_hinh`, `gia_tri`, `mo_ta`) VALUES
('ch_6a16d928f266b', 'review_settings', 'Cài đặt đánh giá', '{\"auto_approve_stars\":0,\"hold_with_image\":0,\"blocked_keywords\":\"\"}', 'Cấu hình duyệt tự động và chặn từ khóa'),
('config_1', 'thong_tin_shop', 'Thông tin cửa hàng', '{\"ten_shop\": \"Chuỗi Ngọc\", \"sdt\": \"0987654321\", \"dia_chi\": \"123 Đường X, Hà Nội\", \"email\": \"contact@chuoingoc.com\"}', NULL),
('config_2', 'phuong_thuc_thanh_toan', 'Phương thức thanh toán', '[{\"id\": \"cod\", \"ten\": \"Thanh toán khi nhận hàng\", \"trang_thai\": true}, {\"id\": \"vnpay\", \"ten\": \"Chuyển khoản VNPay\", \"trang_thai\": true}]', NULL),
('config_3', 'phuong_thuc_van_chuyen', 'Phương thức vận chuyển', '[{\"id\": \"ghtk\", \"ten\": \"Giao Hàng Tiết Kiệm\", \"phi\": 30000, \"trang_thai\": true}]', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` varchar(36) NOT NULL,
  `id_don_hang` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_kho`
--

CREATE TABLE `chi_tiet_phieu_kho` (
  `id` varchar(36) NOT NULL,
  `id_phieu_kho` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(15,0) DEFAULT 0,
  `ghi_chu_ct` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

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
  `phan_hoi_noi_dung` text DEFAULT NULL,
  `phan_hoi_ngay` datetime DEFAULT NULL,
  `phan_hoi_boi` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `id_san_pham`, `id_nguoi_dung`, `id_don_hang`, `so_sao`, `noi_dung`, `hinh_anh`, `trang_thai`, `ngay_tao`, `phan_hoi_noi_dung`, `phan_hoi_ngay`, `phan_hoi_boi`) VALUES
('dg_6a16d801c1a25', 'sp_004', 'user_1', NULL, 5, 'Vòng đẹp, màu ngọc sáng nhẹ nhàng, đóng gói cực kỳ cẩn thận. Mình mua làm quà tặng mẹ, mẹ mình rất ưng ý. Sẽ ủng hộ shop thêm nhiều lần nữa!', '', 1, '2026-05-27 11:39:45', 'Cảm ơn bạn đã tin tưởng và lựa chọn sản phẩm của Chuỗi Ngọc. Chúc bạn luôn vui vẻ và gặp nhiều may mắn! Nếu cần hỗ trợ thêm gì hãy nhắn tin cho shop nhé.', '2026-05-27 18:52:50', NULL),
('dg_6a16d801c1a5c', 'sp_005', 'user_2', NULL, 2, 'Màu đá hơi tối so với ảnh trên web. Mình tay nhỏ đeo dây này cảm giác hơi lỏng lẻo, shop có nhận đổi size dây không ạ?', '', 1, '2026-05-26 13:39:45', 'Chào bạn, Chuỗi Ngọc xin ghi nhận phản hồi của bạn. Các mẫu Obsidian tự nhiên sẽ có tông đen đặc trưng. Về phần dây rộng, nhân viên CSKH sẽ liên hệ qua SĐT để hỗ trợ bạn đổi size miễn phí nhé ạ!', '2026-05-26 17:39:45', 'admin_id_here'),
('dg_6a16d801c1a65', 'sp_007', 'user_1', NULL, 4, 'Sản phẩm khá tốt, đáng tiền.', '', 1, '2026-05-24 13:39:45', 'Chào bạn, Chuỗi Ngọc xin lỗi vì trải nghiệm không tốt của bạn. Nhân viên CSKH sẽ liên hệ với bạn qua số điện thoại để hỗ trợ đổi trả hoặc giải quyết vấn đề ngay ạ.', '2026-05-27 18:53:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` varchar(36) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `ma_danh_muc` varchar(50) DEFAULT NULL,
  `thu_tu` int(11) NOT NULL DEFAULT 1,
  `vi_tri` varchar(255) DEFAULT 'Menu chính',
  `da_xoa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `slug`, `mo_ta`, `hinh_anh`, `trang_thai`, `ma_danh_muc`, `thu_tu`, `vi_tri`, `da_xoa`) VALUES
('cat_1', 'Vòng tay nam', 'vong-tay-nam', '', '6a16c95de3350_pngtree-bracelet-line-icon-png-image_9028713.png', 1, 'DM1779873937', 1, 'Menu chính', 0),
('cat_2', 'Vòng tay nữ', 'vong-tay-nu', '', '6a16c97c38b16_pngtree-bracelet-line-icon-vector-png-image_6638184.png', 1, 'DM1779873940', 1, 'Menu chính', 0),
('cat_3', 'Dây chuyền', 'day-chuyen', '', '6a16c93ebad19_pngtree-necklace-line-icon-png-image_9061008.png', 1, 'DM1779873934', 1, 'Menu chính', 0),
('dm_6a16b7cd23f24', 'test', 'test', 'test', NULL, 0, 'DM1779873741', 1, 'Menu chính,Trang chủ,Bộ lọc SP', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` varchar(36) NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
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
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_thanh_vien`
--

CREATE TABLE `hang_thanh_vien` (
  `id` varchar(36) NOT NULL,
  `ten_hang` varchar(100) NOT NULL,
  `chi_tieu_toi_thieu` decimal(15,0) NOT NULL DEFAULT 0,
  `phan_tram_giam` decimal(5,2) NOT NULL DEFAULT 0.00,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_thanh_vien`
--

INSERT INTO `hang_thanh_vien` (`id`, `ten_hang`, `chi_tieu_toi_thieu`, `phan_tram_giam`, `icon`) VALUES
('rank_1', 'Đồng', 0, 0.00, 'mdi:medal-outline'),
('rank_2', 'Bạc', 5000000, 5.00, 'mdi:medal'),
('rank_3', 'Vàng', 15000000, 10.00, 'mdi:star-circle'),
('rank_4', 'Kim Cương', 50000000, 15.00, 'mdi:diamond');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_da`
--

CREATE TABLE `loai_da` (
  `id` varchar(36) NOT NULL,
  `ma_loai_da` varchar(50) DEFAULT NULL,
  `ten_loai_da` varchar(255) NOT NULL,
  `ten_tieng_anh` varchar(150) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `nhom` varchar(50) DEFAULT NULL,
  `mau_sac_ten` varchar(100) DEFAULT NULL,
  `mau_sac_hex` varchar(20) DEFAULT NULL,
  `y_nghia` text DEFAULT NULL,
  `nhu_cau` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nhu_cau`)),
  `hinh_anh` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 1,
  `da_xoa` tinyint(1) DEFAULT 0,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_da`
--

INSERT INTO `loai_da` (`id`, `ma_loai_da`, `ten_loai_da`, `ten_tieng_anh`, `slug`, `nhom`, `mau_sac_ten`, `mau_sac_hex`, `y_nghia`, `nhu_cau`, `hinh_anh`, `trang_thai`, `da_xoa`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('d266fe6d-0390-4127-899d-6f8a82ba47f8', 'EFF8CB3B', 'test', '', 'test', 'Khác', '', '#E5E7EB', '', '[\"\"]', NULL, 1, 1, '2026-05-27 17:06:10', '2026-05-27 17:06:17'),
('stone_1', 'DA26ABF7', 'Ngọc Bích', '', 'ngoc-bich', 'Ngọc', 'Xanh Ngọc', '#10B981', '', '[\"Bình An\"]', '6a16c1d71c237_pngtree-polished-green-jade-bangle-on-white-background-png-image_18500273.webp', 1, 0, '2026-05-27 16:47:16', '2026-05-27 17:05:11'),
('stone_2', '2C3B5227', 'Thạch Anh', '', 'thach-anh', 'Đá tự nhiên', 'Trắng', '#FFFFFF', '', '[\"May Mắn\"]', NULL, 1, 0, '2026-05-27 16:47:16', '2026-05-27 17:24:05'),
('stone_3', '4FF5CE01', 'Mắt Hổ', '', 'mat-ho', 'Đá bán quý', 'Nâu nhạt', '#F59E0B', '', '[\"Sức Khỏe\"]', '6a16c1c7e19fc_da-mat-ho-la-gi-cong-dung-cua-da-mat-ho-voi-suc-khoe-va-phong-thuy-202112162217111194.jpg', 1, 0, '2026-05-27 16:47:16', '2026-05-27 17:04:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_da_menh`
--

CREATE TABLE `loai_da_menh` (
  `id_loai_da` varchar(36) NOT NULL,
  `id_menh` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_da_menh`
--

INSERT INTO `loai_da_menh` (`id_loai_da`, `id_menh`) VALUES
('stone_1', 'menh_2'),
('stone_1', 'menh_5'),
('stone_2', 'menh_1'),
('stone_3', 'menh_1'),
('stone_3', 'menh_2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menh_phong_thuy`
--

CREATE TABLE `menh_phong_thuy` (
  `id` varchar(36) NOT NULL,
  `ten_menh` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `tuong_sinh` varchar(50) DEFAULT NULL,
  `tuong_khac` varchar(50) DEFAULT NULL,
  `mau_sac_hop` varchar(255) DEFAULT NULL,
  `mo_ta_chi_tiet` text DEFAULT NULL,
  `mau_dai_dien_hex` varchar(50) DEFAULT NULL,
  `mau_ky` varchar(255) DEFAULT NULL,
  `nam_sinh` text DEFAULT NULL,
  `nhu_cau` text DEFAULT NULL,
  `seo_tieu_de` varchar(255) DEFAULT NULL,
  `seo_mo_ta` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nguoi_cap_nhat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menh_phong_thuy`
--

INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `mo_ta`, `tuong_sinh`, `tuong_khac`, `mau_sac_hop`, `mo_ta_chi_tiet`, `mau_dai_dien_hex`, `mau_ky`, `nam_sinh`, `nhu_cau`, `seo_tieu_de`, `seo_mo_ta`, `trang_thai`, `ngay_cap_nhat`, `nguoi_cap_nhat`) VALUES
('menh_1', 'Kim', 'kim', 'Sự cứng rắn, sắc bén, độc đoán', 'Thổ', 'Hỏa', 'Trắng, Xám, Ghi, Vàng, Nâu Đất', 'Mệnh Kim tượng trưng cho kim loại, kim khí trong đất trời. Người mệnh Kim thường có tính cách độc lập, quyết đoán, mạnh mẽ và có óc tổ chức. Sử dụng đá phong thủy có màu tương sinh (Thổ sinh Kim: Vàng, Nâu) hoặc tương hợp (Trắng, Xám, Ghi) sẽ giúp mang lại may mắn, thuận lợi trong công việc và cuộc sống.', '#9CA3AF', 'Đỏ, Hồng, Tím, Cam', '[{\"nam\":\"1992\",\"can_chi\":\"Nhâm Thân\"},{\"nam\":\"1993\",\"can_chi\":\"Quý Dậu\"},{\"nam\":\"2000\",\"can_chi\":\"Canh Thìn\"},{\"nam\":\"2001\",\"can_chi\":\"Tân Tỵ\"},{\"nam\":\"1984\",\"can_chi\":\"Giáp Tý\"},{\"nam\":\"1985\",\"can_chi\":\"Ất Sửu\"}]', '[\"Công danh\",\"Tài lộc\",\"Sự nghiệp\"]', NULL, NULL, 1, '2026-05-27 18:08:32', NULL),
('menh_2', 'Mộc', 'moc', 'Sự sinh sôi, phát triển, mềm dẻo', 'Thủy', 'Kim', 'Xanh Lá Cây, Đen, Xanh Nước Biển', 'Mệnh Mộc tượng trưng cho mùa xuân, sự sinh sôi nảy nở của cây cỏ. Người mệnh Mộc thường có tính cách thân thiện, chu đáo, tận tâm và hòa đồng. Việc sử dụng các loại đá phong thủy màu xanh lá hoặc đen/xanh dương (Thủy sinh Mộc) sẽ giúp tăng cường năng lượng tích cực, sức sống và sự may mắn.', '#10B981', 'Trắng, Xám, Ghi, Bạc', '[{\"nam\":\"1988\",\"can_chi\":\"Mậu Thìn\"},{\"nam\":\"1989\",\"can_chi\":\"Kỷ Tỵ\"},{\"nam\":\"2002\",\"can_chi\":\"Nhâm Ngọ\"},{\"nam\":\"2003\",\"can_chi\":\"Quý Mùi\"},{\"nam\":\"1980\",\"can_chi\":\"Canh Thân\"},{\"nam\":\"1981\",\"can_chi\":\"Tân Dậu\"}]', '[\"Sức khỏe\",\"Bình an\",\"Tình duyên\"]', NULL, NULL, 1, '2026-05-27 18:08:32', NULL),
('menh_3', 'Thủy', 'thuy', 'Sự mềm mại, uyển chuyển, linh hoạt', 'Kim', 'Thổ', 'Đen, Xanh Nước Biển, Trắng, Xám, Ghi', 'Mệnh Thủy tượng trưng cho nước, là yếu tố không thể thiếu của sự sống. Người mệnh Thủy thường thông minh, khéo léo trong giao tiếp và có khả năng thích nghi cao. Mang bên mình những viên đá màu đen, xanh nước biển hoặc trắng/xám (Kim sinh Thủy) sẽ giúp tâm trí sáng suốt, công việc hanh thông.', '#3B82F6', 'Vàng, Nâu Đất, Đỏ', '[{\"nam\":\"1996\",\"can_chi\":\"Bính Tý\"},{\"nam\":\"1997\",\"can_chi\":\"Đinh Sửu\"},{\"nam\":\"2004\",\"can_chi\":\"Giáp Thân\"},{\"nam\":\"2005\",\"can_chi\":\"Ất Dậu\"},{\"nam\":\"1982\",\"can_chi\":\"Nhâm Tuất\"},{\"nam\":\"1983\",\"can_chi\":\"Quý Hợi\"}]', '[\"Giao tiếp\",\"Tài lộc\",\"Sự nghiệp\"]', NULL, NULL, 1, '2026-05-27 18:08:32', NULL),
('menh_4', 'Hỏa', 'hoa', 'Sự nhiệt huyết, năng lượng, bùng nổ', 'Mộc', 'Thủy', 'Đỏ, Hồng, Tím, Xanh Lá Cây', 'Mệnh Hỏa tượng trưng cho ngọn lửa ấm áp và ánh sáng. Người mệnh Hỏa thường tràn đầy nhiệt huyết, năng động, sáng tạo và có tư duy nhạy bén. Chọn đá phong thủy màu đỏ, hồng, tím hoặc xanh lá (Mộc sinh Hỏa) giúp thăng hoa trong cảm xúc, khơi dậy đam mê và đạt được nhiều thành tựu.', '#EF4444', 'Đen, Xanh Nước Biển', '[{\"nam\":\"1986\",\"can_chi\":\"Bính Dần\"},{\"nam\":\"1987\",\"can_chi\":\"Đinh Mão\"},{\"nam\":\"1994\",\"can_chi\":\"Giáp Tuất\"},{\"nam\":\"1995\",\"can_chi\":\"Ất Hợi\"},{\"nam\":\"2008\",\"can_chi\":\"Mậu Tý\"},{\"nam\":\"2009\",\"can_chi\":\"Kỷ Sửu\"}]', '[\"Tình duyên\",\"Sáng tạo\",\"May mắn\"]', NULL, NULL, 1, '2026-05-27 18:08:32', NULL),
('menh_5', 'Thổ', 'tho', 'Sự vững chắc, bao dung, kiên nhẫn', 'Hỏa', 'Mộc', 'Vàng, Nâu Đất, Đỏ, Hồng, Tím', 'Mệnh Thổ tượng trưng cho đất, nơi nuôi dưỡng muôn loài. Người mệnh Thổ thường có bản tính ôn hòa, chân thành, kiên nhẫn và rất đáng tin cậy. Khi mang đá phong thủy màu vàng, nâu hoặc đỏ/hồng (Hỏa sinh Thổ), người mệnh Thổ sẽ càng thêm vững vàng, cuộc sống bình an, phú quý.', '#D97706', 'Xanh Lá Cây, Xanh Lục', '[{\"nam\":\"1990\",\"can_chi\":\"Canh Ngọ\"},{\"nam\":\"1991\",\"can_chi\":\"Tân Mùi\"},{\"nam\":\"1998\",\"can_chi\":\"Mậu Dần\"},{\"nam\":\"1999\",\"can_chi\":\"Kỷ Mão\"},{\"nam\":\"2006\",\"can_chi\":\"Bính Tuất\"},{\"nam\":\"2007\",\"can_chi\":\"Đinh Hợi\"}]', '[\"Bình an\",\"Gia đạo\",\"Sức khỏe\"]', NULL, NULL, 1, '2026-05-27 18:08:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` varchar(36) NOT NULL,
  `id_vai_tro` varchar(36) DEFAULT NULL COMMENT 'Nếu NULL -> Là khách hàng',
  `id_hang_thanh_vien` varchar(36) DEFAULT NULL,
  `ma_nd` varchar(50) DEFAULT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `tong_chi_tieu` decimal(15,0) NOT NULL DEFAULT 0,
  `diem_thuong` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hoạt động, 0: Khóa',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `id_vai_tro`, `id_hang_thanh_vien`, `ma_nd`, `ho_ten`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`, `tong_chi_tieu`, `diem_thuong`, `trang_thai`, `ngay_tao`) VALUES
('user_1', 'role_1', NULL, 'NV001', 'Hải Admin', 'admin@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26'),
('user_2', 'role_2', NULL, 'NV002', 'Tuấn Kho', 'kho@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26'),
('user_3', NULL, NULL, 'KH001', 'Khách hàng A', 'khachhang@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhat_ky_hoat_dong`
--

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
  `muc_do` enum('Bình thường','Quan trọng','Nguy hiểm','Bảo mật') NOT NULL DEFAULT 'Bình thường',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` varchar(36) NOT NULL,
  `ma_ncc` varchar(50) NOT NULL,
  `ten_ncc` varchar(255) NOT NULL,
  `nguoi_lien_he` varchar(100) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_kho`
--

CREATE TABLE `phieu_kho` (
  `id` varchar(36) NOT NULL,
  `ma_phieu` varchar(50) NOT NULL,
  `loai_phieu` tinyint(1) NOT NULL COMMENT '1: Nhập kho, 2: Xuất kho, 3: Thuyên chuyển, 4: Kiểm kê',
  `id_nguoi_tao` varchar(36) DEFAULT NULL,
  `id_nha_cung_cap` varchar(36) DEFAULT NULL COMMENT 'Dùng khi Nhập kho',
  `tong_tien` decimal(15,0) DEFAULT 0 COMMENT 'Dùng cho Phiếu nhập/xuất',
  `ly_do` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Bản nháp, 1: Hoàn thành, 2: Đã hủy',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` varchar(36) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
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
  `da_xoa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `tong_ton_kho`, `luot_xem`, `trang_thai`, `ngay_tao`, `da_xoa`) VALUES
('sp_001', 'SP00001', 'Vòng tay Mã Não Đẳng Cấp', 'vong-tay-ma-nao-dang-cap-1', 'cat_3', 'stone_2', 'menh_1', 280000, 1250000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được ch<span style=\"color: rgb(230, 0, 0);\">ế tác thủ công từ đá tự nhiên 100%.</span></p>', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9HvcHyxAeTyNvtjCuyGlOpQZK9z1m_1YNKQ&s', 26, 77, 1, '2026-05-27 15:12:46', 0),
('sp_002', 'SP00002', 'Chuỗi hạt Ruby Tài Lộc', 'chuoi-hat-ruby-tai-loc-2', 'cat_3', 'stone_1', 'menh_3', 110000, 640000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 16, 448, 1, '2026-05-27 15:12:46', 0),
('sp_003', 'SP00003', 'Chuỗi hạt Ngọc Bích Bình An', 'chuoi-hat-ngoc-bich-binh-an-3', 'cat_3', 'stone_1', 'menh_3', 920000, 1870000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 14, 655, 1, '2026-05-27 15:12:46', 0),
('sp_004', 'SP00004', 'Dây chuyền Gỗ Sưa Đẳng Cấp', 'day-chuyen-go-sua-dang-cap-4', 'cat_1', 'stone_1', 'menh_5', 1000000, 1510000, 1420000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 4, 120, 1, '2026-05-27 15:12:46', 0),
('sp_005', 'SP00005', 'Nhẫn Thạch Anh Cao Cấp', 'nhan-thach-anh-cao-cap-5', 'cat_1', 'stone_1', 'menh_4', 370000, 700000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NT&background=E4D5C3&color=6B0D18', 39, 423, 1, '2026-05-27 15:12:46', 0),
('sp_006', 'SP00006', 'Chuỗi hạt Ngọc Bích Bình An', 'chuoi-hat-ngoc-bich-binh-an-6', 'cat_2', 'stone_1', 'menh_2', 340000, 550000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 19, 636, 1, '2026-05-27 15:12:46', 0),
('sp_007', 'SP00007', 'Lắc tay Ngọc Bích Tài Lộc', 'lac-tay-ngoc-bich-tai-loc-7', 'cat_1', 'stone_1', 'menh_4', 250000, 530000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 23, 275, 0, '2026-05-27 15:12:46', 0),
('sp_008', 'SP00008', 'Dây chuyền Gỗ Sưa Phong Thủy', 'day-chuyen-go-sua-phong-thuy-8', 'cat_1', 'stone_1', 'menh_4', 650000, 1160000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 22, 391, 1, '2026-05-27 15:12:46', 0),
('sp_009', 'SP00009', 'Vòng tay Cẩm Thạch Bình An', 'vong-tay-cam-thach-binh-an-9', 'cat_1', 'stone_3', 'menh_2', 330000, 1160000, 1090000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 11, 951, 1, '2026-05-27 15:12:46', 0),
('sp_010', 'SP00010', 'Vòng tay Mắt Hổ Đẳng Cấp', 'vong-tay-mat-ho-dang-cap-10', 'cat_1', 'stone_2', 'menh_5', 630000, 970000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 45, 670, 1, '2026-05-27 15:12:46', 0),
('sp_011', 'SP00011', 'Dây chuyền Mã Não Tự Nhiên', 'day-chuyen-ma-nao-tu-nhien-11', 'cat_1', 'stone_1', 'menh_3', 880000, 1740000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 26, 949, 1, '2026-05-27 15:12:46', 0),
('sp_012', 'SP00012', 'Chuỗi hạt Mắt Hổ Trừ Tà', 'chuoi-hat-mat-ho-tru-ta-12', 'cat_1', 'stone_3', 'menh_3', 130000, 430000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 25, 656, 1, '2026-05-27 15:12:46', 0),
('sp_013', 'SP00013', 'Chuỗi hạt Thạch Anh Tự Nhiên', 'chuoi-hat-thach-anh-tu-nhien-13', 'cat_3', 'stone_2', 'menh_3', 500000, 1150000, 970000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 4, 52, 0, '2026-05-27 15:12:46', 0),
('sp_014', 'SP00014', 'Nhẫn Mắt Hổ Phong Thủy', 'nhan-mat-ho-phong-thuy-14', 'cat_2', 'stone_2', 'menh_2', 120000, 330000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NM&background=E4D5C3&color=6B0D18', 31, 894, 1, '2026-05-27 15:12:46', 0),
('sp_015', 'SP00015', 'Dây chuyền Ruby Trừ Tà', 'day-chuyen-ruby-tru-ta-15', 'cat_3', 'stone_3', 'menh_3', 520000, 1240000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 17, 563, 1, '2026-05-27 15:12:46', 0),
('sp_016', 'SP00016', 'Vòng tay Mắt Hổ Tài Lộc', 'vong-tay-mat-ho-tai-loc-16', 'cat_1', 'stone_1', 'menh_4', 810000, 1180000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 18, 165, 1, '2026-05-27 15:12:46', 0),
('sp_017', 'SP00017', 'Vòng tay Thạch Anh Bình An', 'vong-tay-thach-anh-binh-an-17', 'cat_3', 'stone_3', 'menh_3', 130000, 700000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 34, 406, 1, '2026-05-27 15:12:46', 0),
('sp_018', 'SP00018', 'Nhẫn Mắt Hổ Phong Thủy', 'nhan-mat-ho-phong-thuy-18', 'cat_1', 'stone_1', 'menh_1', 940000, 1420000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NM&background=E4D5C3&color=6B0D18', 29, 497, 0, '2026-05-27 15:12:46', 0),
('sp_019', 'SP00019', 'Lắc tay Cẩm Thạch May Mắn', 'lac-tay-cam-thach-may-man-19', 'cat_3', 'stone_2', 'menh_5', 300000, 1230000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 4, 90, 1, '2026-05-27 15:12:46', 0),
('sp_020', 'SP00020', 'Vòng tay Cẩm Thạch Trừ Tà', 'vong-tay-cam-thach-tru-ta-20', 'cat_2', 'stone_1', 'menh_2', 310000, 510000, 410000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 15, 228, 1, '2026-05-27 15:12:46', 0),
('sp_021', 'SP00021', 'Lắc tay Mã Não Tài Lộc', 'lac-tay-ma-nao-tai-loc-21', 'cat_2', 'stone_1', 'menh_5', 940000, 1510000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 16, 691, 1, '2026-05-27 15:12:46', 0),
('sp_022', 'SP00022', 'Lắc tay Thạch Anh Bình An', 'lac-tay-thach-anh-binh-an-22', 'cat_3', 'stone_3', 'menh_1', 120000, 980000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 38, 132, 1, '2026-05-27 15:12:46', 0),
('sp_023', 'SP00023', 'Chuỗi hạt Obsidian Trừ Tà', 'chuoi-hat-obsidian-tru-ta-23', 'cat_2', 'stone_1', 'menh_3', 760000, 1260000, 1210000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 29, 296, 1, '2026-05-27 15:12:46', 0),
('sp_024', 'SP00024', 'Lắc tay Cẩm Thạch May Mắn', 'lac-tay-cam-thach-may-man-24', 'cat_1', 'stone_2', 'menh_1', 450000, 780000, 630000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 18, 804, 1, '2026-05-27 15:12:46', 0),
('sp_025', 'SP00025', 'Vòng tay Gỗ Sưa Tài Lộc', 'vong-tay-go-sua-tai-loc-25', 'cat_3', 'stone_1', 'menh_3', 690000, 1290000, 1190000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 27, 891, 1, '2026-05-27 15:12:46', 0),
('sp_026', 'SP00026', 'Chuỗi hạt Mã Não Cao Cấp', 'chuoi-hat-ma-nao-cao-cap-26', 'cat_2', 'stone_1', 'menh_1', 450000, 1410000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 13, 551, 1, '2026-05-27 15:12:46', 0),
('sp_027', 'SP00027', 'Dây chuyền Cẩm Thạch Bình An', 'day-chuyen-cam-thach-binh-an-27', 'cat_1', 'stone_1', 'menh_1', 540000, 1210000, 1160000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 35, 443, 1, '2026-05-27 15:12:46', 0),
('sp_028', 'SP00028', 'Vòng tay Gỗ Sưa Phong Thủy', 'vong-tay-go-sua-phong-thuy-28', 'cat_1', 'stone_2', 'menh_3', 850000, 1710000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 40, 186, 1, '2026-05-27 15:12:46', 0),
('sp_029', 'SP00029', 'Lắc tay Mã Não Bình An', 'lac-tay-ma-nao-binh-an-29', 'cat_3', 'stone_2', 'menh_2', 550000, 1260000, 1140000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 9, 513, 1, '2026-05-27 15:12:46', 0),
('sp_030', 'SP00030', 'Dây chuyền Gỗ Sưa Trừ Tà', 'day-chuyen-go-sua-tru-ta-30', 'cat_1', 'stone_3', 'menh_2', 130000, 540000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 21, 466, 1, '2026-05-27 15:12:46', 0),
('sp_031', 'SP00031', 'Nhẫn Gỗ Sưa Phong Thủy', 'nhan-go-sua-phong-thuy-31', 'cat_1', 'stone_3', 'menh_1', 680000, 1220000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NG&background=E4D5C3&color=6B0D18', 31, 823, 1, '2026-05-27 15:12:46', 0),
('sp_032', 'SP00032', 'Lắc tay Cẩm Thạch May Mắn', 'lac-tay-cam-thach-may-man-32', 'cat_3', 'stone_3', 'menh_4', 230000, 540000, 380000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 15, 403, 1, '2026-05-27 15:12:46', 0),
('sp_033', 'SP00033', 'Nhẫn Thạch Anh Phong Thủy', 'nhan-thach-anh-phong-thuy-33', 'cat_2', 'stone_2', 'menh_3', 190000, 420000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NT&background=E4D5C3&color=6B0D18', 46, 890, 1, '2026-05-27 15:12:46', 0),
('sp_034', 'SP00034', 'Chuỗi hạt Mã Não Bình An', 'chuoi-hat-ma-nao-binh-an-34', 'cat_2', 'stone_2', 'menh_1', 220000, 600000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 50, 462, 1, '2026-05-27 15:12:46', 0),
('sp_035', 'SP00035', 'Lắc tay Mã Não Đẳng Cấp', 'lac-tay-ma-nao-dang-cap-35', 'cat_3', 'stone_3', 'menh_4', 890000, 1800000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 24, 27, 1, '2026-05-27 15:12:46', 0),
('sp_036', 'SP00036', 'Lắc tay Gỗ Sưa Phong Thủy', 'lac-tay-go-sua-phong-thuy-36', 'cat_3', 'stone_2', 'menh_2', 990000, 1490000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 7, 232, 1, '2026-05-27 15:12:46', 0),
('sp_037', 'SP00037', 'Dây chuyền Mã Não Cao Cấp', 'day-chuyen-ma-nao-cao-cap-37', 'cat_1', 'stone_1', 'menh_5', 150000, 1110000, 930000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 18, 452, 1, '2026-05-27 15:12:46', 0),
('sp_038', 'SP00038', 'Chuỗi hạt Mắt Hổ Tự Nhiên', 'chuoi-hat-mat-ho-tu-nhien-38', 'cat_3', 'stone_1', 'menh_4', 510000, 750000, 550000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 13, 707, 0, '2026-05-27 15:12:46', 0),
('sp_039', 'SP00039', 'Nhẫn Obsidian Trừ Tà', 'nhan-obsidian-tru-ta-39', 'cat_3', 'stone_1', 'menh_2', 460000, 980000, 810000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NO&background=E4D5C3&color=6B0D18', 0, 252, 1, '2026-05-27 15:12:46', 0),
('sp_040', 'SP00040', 'Chuỗi hạt Gỗ Sưa Đẳng Cấp', 'chuoi-hat-go-sua-dang-cap-40', 'cat_1', 'stone_2', 'menh_3', 880000, 1230000, 1040000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 17, 733, 1, '2026-05-27 15:12:46', 0),
('sp_041', 'SP00041', 'Dây chuyền Cẩm Thạch May Mắn', 'day-chuyen-cam-thach-may-man-41', 'cat_2', 'stone_3', 'menh_3', 810000, 1790000, 1650000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 28, 179, 0, '2026-05-27 15:12:46', 0),
('sp_042', 'SP00042', 'Vòng tay Mắt Hổ Bình An', 'vong-tay-mat-ho-binh-an-42', 'cat_3', 'stone_2', 'menh_5', 630000, 1080000, 920000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 29, 319, 1, '2026-05-27 15:12:46', 0),
('sp_043', 'SP00043', 'Vòng tay Gỗ Sưa Tự Nhiên', 'vong-tay-go-sua-tu-nhien-43', 'cat_3', 'stone_3', 'menh_4', 750000, 1010000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 15, 439, 1, '2026-05-27 15:12:46', 0),
('sp_044', 'SP00044', 'Nhẫn Ngọc Bích May Mắn', 'nhan-ngoc-bich-may-man-44', 'cat_3', 'stone_1', 'menh_4', 940000, 1260000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 50, 156, 1, '2026-05-27 15:12:46', 0),
('sp_045', 'SP00045', 'Chuỗi hạt Thạch Anh Cao Cấp', 'chuoi-hat-thach-anh-cao-cap-45', 'cat_3', 'stone_3', 'menh_5', 400000, 680000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 44, 505, 1, '2026-05-27 15:12:46', 0),
('sp_046', 'SP00046', 'Chuỗi hạt Thạch Anh Tự Nhiên', 'chuoi-hat-thach-anh-tu-nhien-46', 'cat_3', 'stone_1', 'menh_5', 800000, 1600000, 1440000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 35, 512, 1, '2026-05-27 15:12:46', 0),
('sp_047', 'SP00047', 'Dây chuyền Obsidian May Mắn', 'day-chuyen-obsidian-may-man-47', 'cat_2', 'stone_2', 'menh_4', 400000, 1050000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 33, 298, 1, '2026-05-27 15:12:46', 0),
('sp_048', 'SP00048', 'Vòng tay Thạch Anh Phong Thủy', 'vong-tay-thach-anh-phong-thuy-48', 'cat_3', 'stone_1', 'menh_5', 560000, 890000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 47, 432, 1, '2026-05-27 15:12:46', 0),
('sp_049', 'SP00049', 'Chuỗi hạt Obsidian Đẳng Cấp', 'chuoi-hat-obsidian-dang-cap-49', 'cat_3', 'stone_3', 'menh_1', 670000, 1090000, 1000000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 42, 453, 1, '2026-05-27 15:12:46', 0),
('sp_050', 'SP00050', 'Dây chuyền Obsidian Tự Nhiên', 'day-chuyen-obsidian-tu-nhien-50', 'cat_1', 'stone_1', 'menh_3', 250000, 410000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 25, 898, 1, '2026-05-27 15:12:46', 0),
('sp_051', 'SP00051', 'Lắc tay Mã Não Phong Thủy', 'lac-tay-ma-nao-phong-thuy-51', 'cat_2', 'stone_1', 'menh_5', 740000, 1000000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 31, 254, 1, '2026-05-27 15:12:46', 0),
('sp_052', 'SP00052', 'Vòng tay Ruby Trừ Tà', 'vong-tay-ruby-tru-ta-52', 'cat_2', 'stone_1', 'menh_1', 190000, 370000, 260000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 47, 707, 1, '2026-05-27 15:12:46', 0),
('sp_053', 'SP00053', 'Nhẫn Cẩm Thạch Tài Lộc', 'nhan-cam-thach-tai-loc-53', 'cat_3', 'stone_3', 'menh_4', 380000, 1340000, 1200000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 28, 756, 1, '2026-05-27 15:12:46', 0),
('sp_054', 'SP00054', 'Nhẫn Cẩm Thạch Phong Thủy', 'nhan-cam-thach-phong-thuy-54', 'cat_2', 'stone_1', 'menh_5', 470000, 710000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 25, 887, 1, '2026-05-27 15:12:46', 0),
('sp_055', 'SP00055', 'Vòng tay Ngọc Bích Tài Lộc', 'vong-tay-ngoc-bich-tai-loc-55', 'cat_3', 'stone_1', 'menh_3', 550000, 1410000, 1350000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 13, 273, 1, '2026-05-27 15:12:46', 0),
('sp_056', 'SP00056', 'Lắc tay Mã Não Tài Lộc', 'lac-tay-ma-nao-tai-loc-56', 'cat_2', 'stone_2', 'menh_1', 990000, 1520000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 35, 835, 1, '2026-05-27 15:12:46', 0),
('sp_057', 'SP00057', 'Chuỗi hạt Cẩm Thạch May Mắn', 'chuoi-hat-cam-thach-may-man-57', 'cat_2', 'stone_2', 'menh_5', 250000, 1150000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 26, 900, 1, '2026-05-27 15:12:46', 0),
('sp_058', 'SP00058', 'Nhẫn Thạch Anh Tài Lộc', 'nhan-thach-anh-tai-loc-58', 'cat_1', 'stone_2', 'menh_5', 210000, 1030000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NT&background=E4D5C3&color=6B0D18', 39, 934, 1, '2026-05-27 15:12:46', 0),
('sp_059', 'SP00059', 'Dây chuyền Mắt Hổ Bình An', 'day-chuyen-mat-ho-binh-an-59', 'cat_1', 'stone_3', 'menh_5', 980000, 1660000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 11, 761, 1, '2026-05-27 15:12:46', 0),
('sp_060', 'SP00060', 'Vòng tay Mắt Hổ Phong Thủy', 'vong-tay-mat-ho-phong-thuy-60', 'cat_2', 'stone_2', 'menh_5', 620000, 1290000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 10, 800, 1, '2026-05-27 15:12:46', 0),
('sp_061', 'SP00061', 'Nhẫn Cẩm Thạch Trừ Tà', 'nhan-cam-thach-tru-ta-61', 'cat_1', 'stone_2', 'menh_3', 400000, 850000, 660000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 41, 659, 0, '2026-05-27 15:12:46', 0),
('sp_062', 'SP00062', 'Lắc tay Ruby Trừ Tà', 'lac-tay-ruby-tru-ta-62', 'cat_1', 'stone_1', 'menh_4', 630000, 1380000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 27, 174, 1, '2026-05-27 15:12:46', 0),
('sp_063', 'SP00063', 'Nhẫn Obsidian Tài Lộc', 'nhan-obsidian-tai-loc-63', 'cat_3', 'stone_1', 'menh_2', 430000, 1180000, 1070000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NO&background=E4D5C3&color=6B0D18', 31, 671, 0, '2026-05-27 15:12:46', 0),
('sp_064', 'SP00064', 'Chuỗi hạt Mã Não Phong Thủy', 'chuoi-hat-ma-nao-phong-thuy-64', 'cat_3', 'stone_1', 'menh_4', 360000, 730000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 28, 481, 1, '2026-05-27 15:12:46', 0),
('sp_065', 'SP00065', 'Vòng tay Obsidian Đẳng Cấp', 'vong-tay-obsidian-dang-cap-65', 'cat_3', 'stone_1', 'menh_3', 400000, 1280000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 34, 238, 0, '2026-05-27 15:12:46', 0),
('sp_066', 'SP00066', 'Lắc tay Mã Não Cao Cấp', 'lac-tay-ma-nao-cao-cap-66', 'cat_3', 'stone_2', 'menh_3', 630000, 1050000, 850000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 11, 393, 1, '2026-05-27 15:12:46', 0),
('sp_067', 'SP00067', 'Vòng tay Thạch Anh Cao Cấp', 'vong-tay-thach-anh-cao-cap-67', 'cat_1', 'stone_2', 'menh_4', 210000, 790000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 10, 648, 1, '2026-05-27 15:12:46', 0),
('sp_068', 'SP00068', 'Chuỗi hạt Obsidian Trừ Tà', 'chuoi-hat-obsidian-tru-ta-68', 'cat_3', 'stone_2', 'menh_2', 270000, 840000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 1, 326, 1, '2026-05-27 15:12:46', 0),
('sp_069', 'SP00069', 'Vòng tay Ngọc Bích Tự Nhiên', 'vong-tay-ngoc-bich-tu-nhien-69', 'cat_1', 'stone_3', 'menh_5', 620000, 1360000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 29, 837, 1, '2026-05-27 15:12:46', 0),
('sp_070', 'SP00070', 'Nhẫn Cẩm Thạch Tự Nhiên', 'nhan-cam-thach-tu-nhien-70', 'cat_2', 'stone_3', 'menh_3', 190000, 390000, 230000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 29, 795, 1, '2026-05-27 15:12:46', 0),
('sp_071', 'SP00071', 'Nhẫn Ngọc Bích Trừ Tà', 'nhan-ngoc-bich-tru-ta-71', 'cat_3', 'stone_3', 'menh_2', 390000, 770000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 10, 670, 1, '2026-05-27 15:12:46', 0),
('sp_072', 'SP00072', 'Chuỗi hạt Obsidian Bình An', 'chuoi-hat-obsidian-binh-an-72', 'cat_1', 'stone_3', 'menh_3', 910000, 1880000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 1, 231, 1, '2026-05-27 15:12:46', 0),
('sp_073', 'SP00073', 'Chuỗi hạt Ngọc Bích May Mắn', 'chuoi-hat-ngoc-bich-may-man-73', 'cat_2', 'stone_1', 'menh_2', 180000, 350000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 2, 77, 1, '2026-05-27 15:12:46', 0),
('sp_074', 'SP00074', 'Lắc tay Cẩm Thạch May Mắn', 'lac-tay-cam-thach-may-man-74', 'cat_1', 'stone_1', 'menh_5', 620000, 1340000, 1180000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 12, 331, 1, '2026-05-27 15:12:46', 0),
('sp_075', 'SP00075', 'Vòng tay Thạch Anh Bình An', 'vong-tay-thach-anh-binh-an-75', 'cat_1', 'stone_1', 'menh_4', 560000, 1450000, 1340000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 27, 607, 1, '2026-05-27 15:12:46', 0),
('sp_076', 'SP00076', 'Vòng tay Ruby Đẳng Cấp', 'vong-tay-ruby-dang-cap-76', 'cat_3', 'stone_3', 'menh_3', 550000, 910000, 820000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 48, 322, 0, '2026-05-27 15:12:46', 0),
('sp_077', 'SP00077', 'Dây chuyền Mắt Hổ Phong Thủy', 'day-chuyen-mat-ho-phong-thuy-77', 'cat_1', 'stone_3', 'menh_1', 900000, 1570000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 47, 396, 1, '2026-05-27 15:12:46', 0),
('sp_078', 'SP00078', 'Dây chuyền Obsidian Đẳng Cấp', 'day-chuyen-obsidian-dang-cap-78', 'cat_3', 'stone_2', 'menh_2', 750000, 1510000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 45, 508, 1, '2026-05-27 15:12:46', 0),
('sp_079', 'SP00079', 'Dây chuyền Ngọc Bích Tài Lộc', 'day-chuyen-ngoc-bich-tai-loc-79', 'cat_3', 'stone_3', 'menh_1', 220000, 650000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 29, 314, 1, '2026-05-27 15:12:46', 0),
('sp_080', 'SP00080', 'Dây chuyền Ruby Tự Nhiên', 'day-chuyen-ruby-tu-nhien-80', 'cat_3', 'stone_3', 'menh_1', 210000, 1050000, 930000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 46, 394, 1, '2026-05-27 15:12:46', 0),
('sp_081', 'SP00081', 'Nhẫn Ruby Phong Thủy', 'nhan-ruby-phong-thuy-81', 'cat_1', 'stone_2', 'menh_1', 930000, 1750000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NR&background=E4D5C3&color=6B0D18', 22, 362, 1, '2026-05-27 15:12:46', 0),
('sp_082', 'SP00082', 'Nhẫn Gỗ Sưa Cao Cấp', 'nhan-go-sua-cao-cap-82', 'cat_1', 'stone_1', 'menh_5', 540000, 1160000, 1070000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NG&background=E4D5C3&color=6B0D18', 3, 513, 1, '2026-05-27 15:12:46', 0),
('sp_083', 'SP00083', 'Nhẫn Mắt Hổ Phong Thủy', 'nhan-mat-ho-phong-thuy-83', 'cat_3', 'stone_2', 'menh_4', 240000, 650000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NM&background=E4D5C3&color=6B0D18', 9, 547, 1, '2026-05-27 15:12:46', 0),
('sp_084', 'SP00084', 'Chuỗi hạt Gỗ Sưa Phong Thủy', 'chuoi-hat-go-sua-phong-thuy-84', 'cat_3', 'stone_3', 'menh_1', 300000, 1260000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 40, 388, 1, '2026-05-27 15:12:46', 0),
('sp_085', 'SP00085', 'Lắc tay Mắt Hổ Tự Nhiên', 'lac-tay-mat-ho-tu-nhien-85', 'cat_3', 'stone_2', 'menh_4', 710000, 1370000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 2, 983, 1, '2026-05-27 15:12:46', 0),
('sp_086', 'SP00086', 'Vòng tay Ngọc Bích Cao Cấp', 'vong-tay-ngoc-bich-cao-cap-86', 'cat_2', 'stone_2', 'menh_3', 600000, 890000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 34, 861, 1, '2026-05-27 15:12:46', 0),
('sp_087', 'SP00087', 'Nhẫn Ruby May Mắn', 'nhan-ruby-may-man-87', 'cat_3', 'stone_3', 'menh_2', 890000, 1070000, 910000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NR&background=E4D5C3&color=6B0D18', 31, 773, 1, '2026-05-27 15:12:46', 0),
('sp_088', 'SP00088', 'Dây chuyền Mã Não May Mắn', 'day-chuyen-ma-nao-may-man-88', 'cat_3', 'stone_3', 'menh_3', 840000, 1610000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 8, 104, 1, '2026-05-27 15:12:46', 0),
('sp_089', 'SP00089', 'Nhẫn Cẩm Thạch Phong Thủy', 'nhan-cam-thach-phong-thuy-89', 'cat_2', 'stone_3', 'menh_5', 730000, 1460000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 12, 785, 1, '2026-05-27 15:12:46', 0),
('sp_090', 'SP00090', 'Nhẫn Cẩm Thạch May Mắn', 'nhan-cam-thach-may-man-90', 'cat_3', 'stone_2', 'menh_5', 640000, 930000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 26, 1, 1, '2026-05-27 15:12:46', 0),
('sp_091', 'SP00091', 'Vòng tay Obsidian Cao Cấp', 'vong-tay-obsidian-cao-cap-91', 'cat_1', 'stone_2', 'menh_3', 980000, 1230000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 9, 824, 1, '2026-05-27 15:12:46', 0),
('sp_092', 'SP00092', 'Nhẫn Mắt Hổ Bình An', 'nhan-mat-ho-binh-an-92', 'cat_3', 'stone_1', 'menh_2', 440000, 540000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NM&background=E4D5C3&color=6B0D18', 41, 834, 1, '2026-05-27 15:12:46', 0),
('sp_093', 'SP00093', 'Dây chuyền Cẩm Thạch Trừ Tà', 'day-chuyen-cam-thach-tru-ta-93', 'cat_1', 'stone_1', 'menh_3', 490000, 1210000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 34, 510, 1, '2026-05-27 15:12:46', 0),
('sp_094', 'SP00094', 'Nhẫn Cẩm Thạch Tự Nhiên', 'nhan-cam-thach-tu-nhien-94', 'cat_3', 'stone_1', 'menh_4', 690000, 1240000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NC&background=E4D5C3&color=6B0D18', 12, 680, 0, '2026-05-27 15:12:46', 0),
('sp_095', 'SP00095', 'Dây chuyền Gỗ Sưa Trừ Tà', 'day-chuyen-go-sua-tru-ta-95', 'cat_3', 'stone_2', 'menh_3', 650000, 1520000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 8, 842, 1, '2026-05-27 15:12:46', 0),
('sp_096', 'SP00096', 'Vòng tay Thạch Anh Tự Nhiên', 'vong-tay-thach-anh-tu-nhien-96', 'cat_1', 'stone_3', 'menh_3', 390000, 880000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 45, 294, 1, '2026-05-27 15:12:46', 0),
('sp_097', 'SP00097', 'Nhẫn Ruby Bình An', 'nhan-ruby-binh-an-97', 'cat_3', 'stone_2', 'menh_4', 650000, 1320000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NR&background=E4D5C3&color=6B0D18', 5, 865, 1, '2026-05-27 15:12:46', 0),
('sp_098', 'SP00098', 'Nhẫn Ngọc Bích Bình An', 'nhan-ngoc-bich-binh-an-98', 'cat_2', 'stone_2', 'menh_4', 560000, 970000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 21, 88, 1, '2026-05-27 15:12:46', 0),
('sp_099', 'SP00099', 'Lắc tay Obsidian Bình An', 'lac-tay-obsidian-binh-an-99', 'cat_3', 'stone_3', 'menh_2', 610000, 1020000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 38, 340, 1, '2026-05-27 15:12:46', 0),
('sp_100', 'SP00100', 'Lắc tay Mắt Hổ Bình An', 'lac-tay-mat-ho-binh-an-100', 'cat_2', 'stone_3', 'menh_2', 570000, 1240000, 1180000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 15, 967, 1, '2026-05-27 15:12:46', 0),
('sp_101', 'SP00101', 'Chuỗi hạt Mã Não Tài Lộc', 'chuoi-hat-ma-nao-tai-loc-101', 'cat_2', 'stone_2', 'menh_3', 110000, 890000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 50, 394, 1, '2026-05-27 15:12:46', 0),
('sp_102', 'SP00102', 'Lắc tay Mắt Hổ Bình An', 'lac-tay-mat-ho-binh-an-102', 'cat_2', 'stone_3', 'menh_5', 850000, 1630000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 41, 228, 1, '2026-05-27 15:12:46', 0),
('sp_103', 'SP00103', 'Nhẫn Mắt Hổ Phong Thủy', 'nhan-mat-ho-phong-thuy-103', 'cat_1', 'stone_1', 'menh_2', 600000, 1250000, 1150000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NM&background=E4D5C3&color=6B0D18', 5, 100, 1, '2026-05-27 15:12:46', 0),
('sp_104', 'SP00104', 'Dây chuyền Mắt Hổ Đẳng Cấp', 'day-chuyen-mat-ho-dang-cap-104', 'cat_3', 'stone_3', 'menh_2', 1000000, 1520000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 42, 945, 1, '2026-05-27 15:12:46', 0),
('sp_105', 'SP00105', 'Chuỗi hạt Mã Não Tự Nhiên', 'chuoi-hat-ma-nao-tu-nhien-105', 'cat_2', 'stone_3', 'menh_2', 900000, 1520000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 32, 837, 1, '2026-05-27 15:12:46', 0),
('sp_106', 'SP00106', 'Vòng tay Mắt Hổ Tài Lộc', 'vong-tay-mat-ho-tai-loc-106', 'cat_1', 'stone_2', 'menh_3', 360000, 840000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 9, 729, 1, '2026-05-27 15:12:46', 0),
('sp_107', 'SP00107', 'Vòng tay Cẩm Thạch Phong Thủy', 'vong-tay-cam-thach-phong-thuy-107', 'cat_1', 'stone_1', 'menh_5', 930000, 1420000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 1, 349, 1, '2026-05-27 15:12:46', 0),
('sp_108', 'SP00108', 'Chuỗi hạt Obsidian Bình An', 'chuoi-hat-obsidian-binh-an-108', 'cat_2', 'stone_2', 'menh_1', 910000, 1130000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 33, 582, 0, '2026-05-27 15:12:46', 0),
('sp_109', 'SP00109', 'Nhẫn Ngọc Bích Cao Cấp', 'nhan-ngoc-bich-cao-cap-109', 'cat_3', 'stone_3', 'menh_5', 120000, 1090000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 32, 626, 1, '2026-05-27 15:12:46', 0),
('sp_110', 'SP00110', 'Lắc tay Cẩm Thạch Đẳng Cấp', 'lac-tay-cam-thach-dang-cap-110', 'cat_1', 'stone_1', 'menh_5', 330000, 910000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 46, 482, 1, '2026-05-27 15:12:46', 0),
('sp_111', 'SP00111', 'Nhẫn Ruby Phong Thủy', 'nhan-ruby-phong-thuy-111', 'cat_2', 'stone_3', 'menh_2', 820000, 1390000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NR&background=E4D5C3&color=6B0D18', 20, 685, 1, '2026-05-27 15:12:46', 0),
('sp_112', 'SP00112', 'Vòng tay Gỗ Sưa Đẳng Cấp', 'vong-tay-go-sua-dang-cap-112', 'cat_2', 'stone_3', 'menh_2', 910000, 1130000, 1040000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 40, 429, 1, '2026-05-27 15:12:46', 0),
('sp_113', 'SP00113', 'Chuỗi hạt Ngọc Bích Tài Lộc', 'chuoi-hat-ngoc-bich-tai-loc-113', 'cat_3', 'stone_2', 'menh_1', 870000, 1600000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 15, 77, 0, '2026-05-27 15:12:46', 0),
('sp_114', 'SP00114', 'Chuỗi hạt Ngọc Bích Tự Nhiên', 'chuoi-hat-ngoc-bich-tu-nhien-114', 'cat_1', 'stone_3', 'menh_5', 730000, 1510000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 33, 561, 0, '2026-05-27 15:12:46', 0),
('sp_115', 'SP00115', 'Lắc tay Ruby Cao Cấp', 'lac-tay-ruby-cao-cap-115', 'cat_3', 'stone_2', 'menh_5', 920000, 1410000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 47, 736, 0, '2026-05-27 15:12:46', 0),
('sp_116', 'SP00116', 'Dây chuyền Cẩm Thạch Tài Lộc', 'day-chuyen-cam-thach-tai-loc-116', 'cat_2', 'stone_3', 'menh_5', 140000, 1120000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 31, 494, 1, '2026-05-27 15:12:46', 0),
('sp_117', 'SP00117', 'Nhẫn Thạch Anh May Mắn', 'nhan-thach-anh-may-man-117', 'cat_2', 'stone_3', 'menh_2', 450000, 1390000, 1250000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NT&background=E4D5C3&color=6B0D18', 22, 573, 1, '2026-05-27 15:12:46', 0),
('sp_118', 'SP00118', 'Nhẫn Mắt Hổ Tài Lộc', 'nhan-mat-ho-tai-loc-118', 'cat_1', 'stone_3', 'menh_5', 320000, 1130000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NM&background=E4D5C3&color=6B0D18', 12, 190, 1, '2026-05-27 15:12:46', 0),
('sp_119', 'SP00119', 'Nhẫn Ngọc Bích Bình An', 'nhan-ngoc-bich-binh-an-119', 'cat_1', 'stone_3', 'menh_4', 580000, 920000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 1, 51, 1, '2026-05-27 15:12:46', 0),
('sp_120', 'SP00120', 'Dây chuyền Ngọc Bích Đẳng Cấp', 'day-chuyen-ngoc-bich-dang-cap-120', 'cat_3', 'stone_3', 'menh_3', 410000, 1180000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 17, 168, 0, '2026-05-27 15:12:46', 0),
('sp_121', 'SP00121', 'Chuỗi hạt Ngọc Bích Cao Cấp', 'chuoi-hat-ngoc-bich-cao-cap-121', 'cat_3', 'stone_2', 'menh_3', 400000, 850000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 35, 499, 1, '2026-05-27 15:12:46', 0),
('sp_122', 'SP00122', 'Lắc tay Gỗ Sưa May Mắn', 'lac-tay-go-sua-may-man-122', 'cat_3', 'stone_3', 'menh_4', 330000, 1050000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 24, 260, 1, '2026-05-27 15:12:46', 0),
('sp_123', 'SP00123', 'Vòng tay Mã Não Cao Cấp', 'vong-tay-ma-nao-cao-cap-123', 'cat_2', 'stone_3', 'menh_3', 870000, 1610000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 11, 224, 1, '2026-05-27 15:12:46', 0),
('sp_124', 'SP00124', 'Lắc tay Ruby Tài Lộc', 'lac-tay-ruby-tai-loc-124', 'cat_1', 'stone_1', 'menh_3', 550000, 1290000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 28, 302, 1, '2026-05-27 15:12:46', 0),
('sp_125', 'SP00125', 'Dây chuyền Thạch Anh Tài Lộc', 'day-chuyen-thach-anh-tai-loc-125', 'cat_3', 'stone_2', 'menh_4', 840000, 1680000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 40, 894, 0, '2026-05-27 15:12:46', 0),
('sp_126', 'SP00126', 'Dây chuyền Cẩm Thạch Tự Nhiên', 'day-chuyen-cam-thach-tu-nhien-126', 'cat_2', 'stone_2', 'menh_2', 420000, 710000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 48, 229, 1, '2026-05-27 15:12:46', 0),
('sp_127', 'SP00127', 'Lắc tay Gỗ Sưa May Mắn', 'lac-tay-go-sua-may-man-127', 'cat_3', 'stone_1', 'menh_5', 630000, 1560000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 31, 504, 1, '2026-05-27 15:12:46', 0),
('sp_128', 'SP00128', 'Dây chuyền Gỗ Sưa Trừ Tà', 'day-chuyen-go-sua-tru-ta-128', 'cat_2', 'stone_2', 'menh_1', 590000, 1030000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 37, 149, 1, '2026-05-27 15:12:46', 0),
('sp_129', 'SP00129', 'Chuỗi hạt Ngọc Bích Tài Lộc', 'chuoi-hat-ngoc-bich-tai-loc-129', 'cat_3', 'stone_1', 'menh_5', 310000, 410000, 220000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 45, 863, 1, '2026-05-27 15:12:46', 0),
('sp_130', 'SP00130', 'Vòng tay Thạch Anh Tự Nhiên', 'vong-tay-thach-anh-tu-nhien-130', 'cat_3', 'stone_1', 'menh_2', 610000, 1070000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 5, 929, 0, '2026-05-27 15:12:46', 0),
('sp_131', 'SP00131', 'Nhẫn Ngọc Bích Bình An', 'nhan-ngoc-bich-binh-an-131', 'cat_2', 'stone_1', 'menh_5', 680000, 1630000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 0, 328, 1, '2026-05-27 15:12:46', 0),
('sp_132', 'SP00132', 'Nhẫn Gỗ Sưa Tự Nhiên', 'nhan-go-sua-tu-nhien-132', 'cat_3', 'stone_3', 'menh_5', 280000, 400000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NG&background=E4D5C3&color=6B0D18', 43, 396, 1, '2026-05-27 15:12:46', 0),
('sp_133', 'SP00133', 'Dây chuyền Ruby May Mắn', 'day-chuyen-ruby-may-man-133', 'cat_2', 'stone_2', 'menh_2', 100000, 730000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 49, 492, 0, '2026-05-27 15:12:46', 0),
('sp_134', 'SP00134', 'Vòng tay Gỗ Sưa Trừ Tà', 'vong-tay-go-sua-tru-ta-134', 'cat_3', 'stone_3', 'menh_3', 530000, 1490000, 1420000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 11, 425, 1, '2026-05-27 15:12:46', 0),
('sp_135', 'SP00135', 'Lắc tay Ruby Đẳng Cấp', 'lac-tay-ruby-dang-cap-135', 'cat_1', 'stone_3', 'menh_4', 430000, 640000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 13, 628, 1, '2026-05-27 15:12:46', 0),
('sp_136', 'SP00136', 'Chuỗi hạt Gỗ Sưa Đẳng Cấp', 'chuoi-hat-go-sua-dang-cap-136', 'cat_3', 'stone_2', 'menh_2', 800000, 1020000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 29, 793, 1, '2026-05-27 15:12:46', 0),
('sp_137', 'SP00137', 'Vòng tay Gỗ Sưa Bình An', 'vong-tay-go-sua-binh-an-137', 'cat_2', 'stone_3', 'menh_5', 150000, 330000, 280000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 20, 407, 1, '2026-05-27 15:12:46', 0),
('sp_138', 'SP00138', 'Lắc tay Cẩm Thạch Tài Lộc', 'lac-tay-cam-thach-tai-loc-138', 'cat_2', 'stone_1', 'menh_1', 390000, 1380000, 1260000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 40, 91, 1, '2026-05-27 15:12:46', 0),
('sp_139', 'SP00139', 'Vòng tay Thạch Anh May Mắn', 'vong-tay-thach-anh-may-man-139', 'cat_3', 'stone_2', 'menh_1', 760000, 1650000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 14, 995, 1, '2026-05-27 15:12:46', 0),
('sp_140', 'SP00140', 'Lắc tay Thạch Anh Đẳng Cấp', 'lac-tay-thach-anh-dang-cap-140', 'cat_1', 'stone_3', 'menh_4', 710000, 1300000, 1170000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Lt&background=E4D5C3&color=6B0D18', 39, 735, 1, '2026-05-27 15:12:46', 0),
('sp_141', 'SP00141', 'Chuỗi hạt Mắt Hổ May Mắn', 'chuoi-hat-mat-ho-may-man-141', 'cat_1', 'stone_2', 'menh_1', 680000, 1380000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Ch&background=E4D5C3&color=6B0D18', 32, 786, 1, '2026-05-27 15:12:46', 0);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `tong_ton_kho`, `luot_xem`, `trang_thai`, `ngay_tao`, `da_xoa`) VALUES
('sp_142', 'SP00142', 'Nhẫn Ngọc Bích Đẳng Cấp', 'nhan-ngoc-bich-dang-cap-142', 'cat_3', 'stone_2', 'menh_5', 550000, 1000000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=NN&background=E4D5C3&color=6B0D18', 48, 470, 1, '2026-05-27 15:12:46', 0),
('sp_143', 'SP00143', 'Dây chuyền Obsidian Đẳng Cấp', 'day-chuyen-obsidian-dang-cap-143', 'cat_1', 'stone_2', 'menh_4', 700000, 1050000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 50, 72, 1, '2026-05-27 15:12:46', 0),
('sp_144', 'SP00144', 'Dây chuyền Ruby Bình An', 'day-chuyen-ruby-binh-an-144', 'cat_3', 'stone_2', 'menh_2', 830000, 1390000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 7, 126, 1, '2026-05-27 15:12:46', 0),
('sp_145', 'SP00145', 'Dây chuyền Cẩm Thạch Tài Lộc', 'day-chuyen-cam-thach-tai-loc-145', 'cat_3', 'stone_3', 'menh_4', 500000, 810000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 6, 235, 1, '2026-05-27 15:12:46', 0),
('sp_146', 'SP00146', 'Vòng tay Mắt Hổ Cao Cấp', 'vong-tay-mat-ho-cao-cap-146', 'cat_3', 'stone_2', 'menh_5', 880000, 1880000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Vt&background=E4D5C3&color=6B0D18', 14, 450, 0, '2026-05-27 15:12:46', 0),
('sp_147', 'SP00147', 'Dây chuyền Obsidian Trừ Tà', 'day-chuyen-obsidian-tru-ta-147', 'cat_2', 'stone_1', 'menh_2', 770000, 1150000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 24, 739, 1, '2026-05-27 15:12:46', 0),
('sp_148', 'SP00148', 'Dây chuyền Thạch Anh Tự Nhiên', 'day-chuyen-thach-anh-tu-nhien-148', 'cat_3', 'stone_2', 'menh_3', 180000, 710000, 650000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 30, 941, 1, '2026-05-27 15:12:46', 0),
('sp_149', 'SP00149', 'Dây chuyền Obsidian Đẳng Cấp', 'day-chuyen-obsidian-dang-cap-149', 'cat_1', 'stone_1', 'menh_2', 960000, 1490000, 1320000, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 15, 318, 1, '2026-05-27 15:12:46', 0),
('sp_150', 'SP00150', 'Dây chuyền Gỗ Sưa May Mắn', 'day-chuyen-go-sua-may-man-150', 'cat_3', 'stone_1', 'menh_3', 500000, 960000, NULL, 'Sản phẩm mang lại may mắn, bình an cho người sử dụng.', '<p>Được chế tác thủ công từ đá tự nhiên 100%.</p>', 'https://ui-avatars.com/api/?name=Dc&background=E4D5C3&color=6B0D18', 43, 789, 0, '2026-05-27 15:12:46', 0),
('sp_6a16adf050baa', 'test', 'test', 'test-1779871216', 'cat_3', 'stone_3', 'menh_4', NULL, 0, NULL, 'test', 'test', '/uploads/san_pham/1779871216_003ad25e6bec90b2c9fd-copy_GU6wBzyQ.jpg', 0, 0, 0, '2026-05-27 10:40:16', 1),
('sp_6a16d20ab0932', 'SP1779880458', 'teest', 'teest-1779880458', 'cat_3', 'stone_3', 'menh_3', NULL, 1000, NULL, 'test', '<p>test</p>', 'https://ui-avatars.com/api/?name=te&background=random', 0, 0, 1, '2026-05-27 13:14:18', 1),
('sp_6a16d4ab1595f', 'SP1779881131', 'teest', 'teest-1779881131', 'cat_3', 'stone_3', 'menh_3', NULL, 1000, NULL, 'test', '<p>test</p>', 'https://ui-avatars.com/api/?name=te&background=random', 0, 0, 1, '2026-05-27 13:25:31', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_bien_the`
--

CREATE TABLE `san_pham_bien_the` (
  `id` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `thuoc_tinh` varchar(100) NOT NULL COMMENT 'VD: Size 10mm',
  `so_luong_ton` int(11) NOT NULL DEFAULT 0,
  `gia_cong_them` decimal(15,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_hinh_anh`
--

CREATE TABLE `san_pham_hinh_anh` (
  `id` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `duong_dan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham_hinh_anh`
--

INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES
('img_6a16b004215ce', 'sp_001', '/uploads/san_pham/1779871748_0_003ad25e6bec90b2c9fd-copy_GU6wBzyQ.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_yeu_thich`
--

CREATE TABLE `san_pham_yeu_thich` (
  `id_nguoi_dung` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) DEFAULT NULL COMMENT 'Nếu NULL -> Gửi tất cả',
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `loai_thong_bao` varchar(50) NOT NULL COMMENT 'DonHang, HeThong, KhuyenMai...',
  `link` varchar(255) DEFAULT NULL,
  `da_doc` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vai_tro`
--

CREATE TABLE `vai_tro` (
  `id` varchar(36) NOT NULL,
  `ten_vai_tro` varchar(100) NOT NULL,
  `ma_vai_tro` varchar(50) NOT NULL,
  `quyen_han` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'JSON chứa mảng các quyền',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vai_tro`
--

INSERT INTO `vai_tro` (`id`, `ten_vai_tro`, `ma_vai_tro`, `quyen_han`, `trang_thai`) VALUES
('role_1', 'Super Admin', 'super_admin', '[\"all\"]', 1),
('role_2', 'Quản lý Kho', 'quan_ly_kho', '[\"view_kho\", \"add_kho\", \"edit_kho\"]', 1),
('role_3', 'Chăm sóc khách hàng', 'cskh', '[\"view_don_hang\", \"edit_don_hang\", \"view_khach_hang\"]', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` varchar(36) NOT NULL,
  `ma_voucher` varchar(50) NOT NULL,
  `loai_giam` tinyint(1) NOT NULL COMMENT '1: Phầm trăm (%), 2: Tiền mặt',
  `gia_tri` decimal(15,0) NOT NULL,
  `don_toi_thieu` decimal(15,0) DEFAULT 0,
  `giam_toi_da` decimal(15,0) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `da_dung` int(11) NOT NULL DEFAULT 0,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_bv_nd` (`id_nguoi_tao`);

--
-- Chỉ mục cho bảng `cau_hinh`
--
ALTER TABLE `cau_hinh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_cau_hinh` (`ma_cau_hinh`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ctdh_donhang` (`id_don_hang`),
  ADD KEY `fk_ctdh_bienthe` (`id_bien_the`);

--
-- Chỉ mục cho bảng `chi_tiet_phieu_kho`
--
ALTER TABLE `chi_tiet_phieu_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ctpk_phieu` (`id_phieu_kho`),
  ADD KEY `fk_ctpk_bienthe` (`id_bien_the`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhgia_sp` (`id_san_pham`),
  ADD KEY `fk_danhgia_nd` (`id_nguoi_dung`),
  ADD KEY `fk_danhgia_dh` (`id_don_hang`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_don_hang` (`ma_don_hang`),
  ADD KEY `fk_donhang_nd` (`id_nguoi_dung`),
  ADD KEY `fk_donhang_voucher` (`id_voucher`);

--
-- Chỉ mục cho bảng `hang_thanh_vien`
--
ALTER TABLE `hang_thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_da`
--
ALTER TABLE `loai_da`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `ma_loai_da` (`ma_loai_da`);

--
-- Chỉ mục cho bảng `loai_da_menh`
--
ALTER TABLE `loai_da_menh`
  ADD PRIMARY KEY (`id_loai_da`,`id_menh`),
  ADD KEY `id_menh` (`id_menh`);

--
-- Chỉ mục cho bảng `menh_phong_thuy`
--
ALTER TABLE `menh_phong_thuy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_nd_vaitro` (`id_vai_tro`),
  ADD KEY `fk_nd_hang` (`id_hang_thanh_vien`);

--
-- Chỉ mục cho bảng `nhat_ky_hoat_dong`
--
ALTER TABLE `nhat_ky_hoat_dong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_nd` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_ncc` (`ma_ncc`);

--
-- Chỉ mục cho bảng `phieu_kho`
--
ALTER TABLE `phieu_kho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_phieu` (`ma_phieu`),
  ADD KEY `fk_phieu_nd` (`id_nguoi_tao`),
  ADD KEY `fk_phieu_ncc` (`id_nha_cung_cap`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_sp` (`ma_sp`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_sp_danhmuc` (`id_danh_muc`),
  ADD KEY `fk_sp_loaida` (`id_loai_da`),
  ADD KEY `fk_sp_menh` (`id_menh_phong_thuy`);

--
-- Chỉ mục cho bảng `san_pham_bien_the`
--
ALTER TABLE `san_pham_bien_the`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bienthe_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `san_pham_hinh_anh`
--
ALTER TABLE `san_pham_hinh_anh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hinhanh_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `san_pham_yeu_thich`
--
ALTER TABLE `san_pham_yeu_thich`
  ADD PRIMARY KEY (`id_nguoi_dung`,`id_san_pham`),
  ADD KEY `fk_yt_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_nd` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_vai_tro` (`ma_vai_tro`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_voucher` (`ma_voucher`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD CONSTRAINT `fk_bv_nd` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ctdh_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ctdh_donhang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_phieu_kho`
--
ALTER TABLE `chi_tiet_phieu_kho`
  ADD CONSTRAINT `fk_ctpk_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ctpk_phieu` FOREIGN KEY (`id_phieu_kho`) REFERENCES `phieu_kho` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `fk_danhgia_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_danhgia_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_danhgia_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_donhang_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_donhang_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `loai_da_menh`
--
ALTER TABLE `loai_da_menh`
  ADD CONSTRAINT `loai_da_menh_ibfk_1` FOREIGN KEY (`id_loai_da`) REFERENCES `loai_da` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loai_da_menh_ibfk_2` FOREIGN KEY (`id_menh`) REFERENCES `menh_phong_thuy` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `fk_nd_hang` FOREIGN KEY (`id_hang_thanh_vien`) REFERENCES `hang_thanh_vien` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_nd_vaitro` FOREIGN KEY (`id_vai_tro`) REFERENCES `vai_tro` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `nhat_ky_hoat_dong`
--
ALTER TABLE `nhat_ky_hoat_dong`
  ADD CONSTRAINT `fk_log_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `phieu_kho`
--
ALTER TABLE `phieu_kho`
  ADD CONSTRAINT `fk_phieu_ncc` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_phieu_nd` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sp_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_sp_loaida` FOREIGN KEY (`id_loai_da`) REFERENCES `loai_da` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_sp_menh` FOREIGN KEY (`id_menh_phong_thuy`) REFERENCES `menh_phong_thuy` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `san_pham_bien_the`
--
ALTER TABLE `san_pham_bien_the`
  ADD CONSTRAINT `fk_bienthe_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham_hinh_anh`
--
ALTER TABLE `san_pham_hinh_anh`
  ADD CONSTRAINT `fk_hinhanh_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham_yeu_thich`
--
ALTER TABLE `san_pham_yeu_thich`
  ADD CONSTRAINT `fk_yt_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_yt_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD CONSTRAINT `fk_tb_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
