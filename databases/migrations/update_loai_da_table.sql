-- Thêm các cột cho bảng loai_da
ALTER TABLE loai_da 
    ADD COLUMN ma_loai_da VARCHAR(50) NULL AFTER id,
    ADD COLUMN ten_tieng_anh VARCHAR(150) NULL AFTER ten_loai_da,
    ADD COLUMN nhom VARCHAR(50) NULL AFTER slug,
    ADD COLUMN mau_sac_ten VARCHAR(100) NULL AFTER nhom,
    ADD COLUMN mau_sac_hex VARCHAR(20) NULL AFTER mau_sac_ten,
    ADD COLUMN nhu_cau JSON NULL AFTER y_nghia,
    ADD COLUMN hinh_anh VARCHAR(255) NULL AFTER nhu_cau,
    ADD COLUMN trang_thai TINYINT(1) DEFAULT 1 AFTER hinh_anh,
    ADD COLUMN da_xoa TINYINT(1) DEFAULT 0 AFTER trang_thai,
    ADD COLUMN ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP AFTER da_xoa,
    ADD COLUMN ngay_cap_nhat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER ngay_tao;

-- Cập nhật ma_loai_da unique
UPDATE loai_da SET ma_loai_da = UPPER(SUBSTRING(MD5(id), 1, 8)) WHERE ma_loai_da IS NULL;
ALTER TABLE loai_da ADD UNIQUE(ma_loai_da);

-- Bảng trung gian loai_da_menh
CREATE TABLE IF NOT EXISTS loai_da_menh (
    id_loai_da VARCHAR(36) NOT NULL,
    id_menh VARCHAR(36) NOT NULL,
    PRIMARY KEY (id_loai_da, id_menh),
    FOREIGN KEY (id_loai_da) REFERENCES loai_da(id) ON DELETE CASCADE,
    FOREIGN KEY (id_menh) REFERENCES menh_phong_thuy(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
