USE shop_chuoi_ngoc;

CREATE TABLE IF NOT EXISTS cau_hinh (
    ma_cai_dat VARCHAR(100) PRIMARY KEY,
    gia_tri TEXT,
    mo_ta VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS nguoi_dung_voucher (
    id VARCHAR(50) PRIMARY KEY,
    id_nguoi_dung VARCHAR(50) NOT NULL,
    id_voucher VARCHAR(50) NOT NULL,
    trang_thai INT DEFAULT 0 COMMENT '0: chua su dung, 1: da su dung',
    ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_nguoi_dung) REFERENCES nguoi_dung(id) ON DELETE CASCADE,
    FOREIGN KEY (id_voucher) REFERENCES voucher(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE nguoi_dung 
ADD COLUMN IF NOT EXISTS deleted_at DATETIME NULL DEFAULT NULL,
ADD COLUMN IF NOT EXISTS diem_tich_luy INT DEFAULT 0;
