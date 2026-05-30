-- 1. Bảng san_pham_vi_tri: Mapping sản phẩm ↔ vị trí kho
CREATE TABLE IF NOT EXISTS san_pham_vi_tri (
    id CHAR(36) PRIMARY KEY,
    id_vi_tri CHAR(36) NOT NULL,        -- FK → khu_vuc_kho.id (Kệ hoặc Ngăn)
    id_bien_the CHAR(36) NOT NULL,      -- FK → san_pham_bien_the.id
    so_luong INT NOT NULL DEFAULT 0,    -- Số lượng SP tại vị trí này
    ngay_cap_nhat TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    UNIQUE KEY uk_vitri_bienthe (id_vi_tri, id_bien_the),
    FOREIGN KEY (id_vi_tri) REFERENCES khu_vuc_kho(id) ON DELETE CASCADE,
    FOREIGN KEY (id_bien_the) REFERENCES san_pham_bien_the(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Thêm cột id_vi_tri vào chi_tiet_phieu_kho
-- Lưu ý: Lệnh này sẽ lỗi nếu cột đã tồn tại, đây là mong muốn để báo hiệu.
ALTER TABLE chi_tiet_phieu_kho 
    ADD COLUMN id_vi_tri CHAR(36) NULL AFTER id_bien_the,
    ADD CONSTRAINT fk_ctpk_vitri FOREIGN KEY (id_vi_tri) REFERENCES khu_vuc_kho(id) ON DELETE SET NULL;
