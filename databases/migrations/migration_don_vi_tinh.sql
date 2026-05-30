-- databases/migrations/migration_don_vi_tinh.sql

ALTER TABLE san_pham ADD COLUMN don_vi_tinh VARCHAR(30) NOT NULL DEFAULT 'Cái' COMMENT 'Đơn vị tính: Cái, Sợi, Chuỗi, Viên, Bộ, Hộp, Thùng, Gram, Kg' AFTER trang_thai;
