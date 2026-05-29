-- ============================================
-- Migration: Tạo bảng Kho Hàng, Khu Vực Kho, Cấu Hình Kho
-- Ngày: 2026-05-29
-- ============================================

-- 1. Bảng kho_hang
CREATE TABLE IF NOT EXISTS kho_hang (
    id CHAR(36) PRIMARY KEY,
    ma_kho VARCHAR(50) NOT NULL UNIQUE,
    ten_kho VARCHAR(200) NOT NULL,
    loai_kho ENUM('online','tong','cua_hang','loi') NOT NULL DEFAULT 'tong',
    mo_ta TEXT NULL,
    dia_chi TEXT NULL,
    tinh_thanh VARCHAR(100) NULL,
    quan_huyen VARCHAR(100) NULL,
    phuong_xa VARCHAR(100) NULL,
    id_nguoi_phu_trach CHAR(36) NULL,
    mac_dinh TINYINT(1) NOT NULL DEFAULT 0,
    cho_phep_ban TINYINT(1) NOT NULL DEFAULT 1,
    cho_phep_chuyen TINYINT(1) NOT NULL DEFAULT 1,
    cho_phep_kiem_ke TINYINT(1) NOT NULL DEFAULT 1,
    trang_thai TINYINT NOT NULL DEFAULT 1 COMMENT '1=Hoạt động, 2=Tạm ngừng, 0=Ngừng dùng',
    ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_nguoi_phu_trach) REFERENCES nguoi_dung(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Bảng khu_vuc_kho (Cây phân cấp: Khu → Kệ → Ngăn)
CREATE TABLE IF NOT EXISTS khu_vuc_kho (
    id CHAR(36) PRIMARY KEY,
    id_kho CHAR(36) NOT NULL,
    id_cha CHAR(36) NULL,
    ma_vi_tri VARCHAR(50) NOT NULL,
    ten_vi_tri VARCHAR(200) NOT NULL,
    cap_do ENUM('khu','ke','ngan') NOT NULL DEFAULT 'khu',
    suc_chua INT NULL COMMENT 'NULL = Không giới hạn',
    trang_thai TINYINT NOT NULL DEFAULT 1 COMMENT '1=Hoạt động, 0=Ngừng',
    ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kho) REFERENCES kho_hang(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cha) REFERENCES khu_vuc_kho(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Bảng cau_hinh_kho (Key-Value cho quy tắc & cảnh báo)
CREATE TABLE IF NOT EXISTS cau_hinh_kho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    config_key VARCHAR(100) NOT NULL UNIQUE,
    config_value TEXT NULL,
    ngay_cap_nhat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- INSERT dữ liệu mặc định
-- ============================================

-- Cấu hình quy tắc mặc định
INSERT INTO cau_hinh_kho (config_key, config_value) VALUES
('quy_tac_tru_kho', 'xac_nhan_don'),
('hoan_kho_huy_don', '1'),
('hoan_kho_giao_that_bai', '1'),
('chon_kho_tru', 'kho_mac_dinh'),
('cho_phep_pre_order', '0'),
('hien_thi_lien_he', '1'),
('canh_bao_sap_het', '1'),
('nguong_sap_het', '5'),
('canh_bao_ton_cao', '0'),
('nguong_ton_cao', '50'),
('ngay_khong_ban', '60'),
('canh_bao_ton_am', '1'),
('nguoi_nhan_super_admin', '1'),
('nguoi_nhan_quan_ly_kho', '1'),
('nguoi_nhan_phu_trach', '0'),
('kenh_app_admin', '1'),
('kenh_email', '1')
ON DUPLICATE KEY UPDATE config_value = VALUES(config_value);

-- Tạo kho mặc định "Tổng Kho"
INSERT INTO kho_hang (id, ma_kho, ten_kho, loai_kho, mo_ta, mac_dinh, trang_thai) VALUES
(UUID(), 'KHO-TONG', 'Tổng Kho', 'tong', 'Kho lưu trữ tổng - mặc định cho hệ thống', 1, 1);
