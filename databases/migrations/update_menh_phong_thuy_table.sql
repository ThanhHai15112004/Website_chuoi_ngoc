ALTER TABLE `menh_phong_thuy`
ADD COLUMN `mo_ta_chi_tiet` text DEFAULT NULL,
ADD COLUMN `mau_dai_dien_hex` varchar(50) DEFAULT NULL,
ADD COLUMN `mau_ky` varchar(255) DEFAULT NULL,
ADD COLUMN `nam_sinh` text DEFAULT NULL,
ADD COLUMN `nhu_cau` text DEFAULT NULL,
ADD COLUMN `seo_tieu_de` varchar(255) DEFAULT NULL,
ADD COLUMN `seo_mo_ta` text DEFAULT NULL,
ADD COLUMN `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
ADD COLUMN `ngay_cap_nhat` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
ADD COLUMN `nguoi_cap_nhat` varchar(100) DEFAULT NULL;
