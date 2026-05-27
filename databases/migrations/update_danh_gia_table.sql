ALTER TABLE `danh_gia`
ADD COLUMN `phan_hoi_noi_dung` TEXT NULL AFTER `ngay_tao`,
ADD COLUMN `phan_hoi_ngay` DATETIME NULL AFTER `phan_hoi_noi_dung`,
ADD COLUMN `phan_hoi_boi` VARCHAR(36) NULL AFTER `phan_hoi_ngay`;
