ALTER TABLE voucher ADD COLUMN gioi_han_moi_user INT DEFAULT 1 COMMENT 'Số lần tối đa mỗi user được dùng voucher này. -1 = không giới hạn';
