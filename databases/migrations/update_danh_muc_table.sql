ALTER TABLE `danh_muc` 
ADD COLUMN `ma_danh_muc` varchar(50) DEFAULT NULL,
ADD COLUMN `hinh_anh` varchar(255) DEFAULT NULL,
ADD COLUMN `thu_tu` int(11) NOT NULL DEFAULT 1,
ADD COLUMN `vi_tri` varchar(255) DEFAULT 'Menu chính',
ADD COLUMN `da_xoa` tinyint(1) NOT NULL DEFAULT 0;
