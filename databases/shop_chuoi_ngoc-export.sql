-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th6 02, 2026 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `id_danh_muc` varchar(36) DEFAULT NULL,
  `tags` text DEFAULT NULL COMMENT 'JSON array',
  `san_pham_lien_quan` text DEFAULT NULL COMMENT 'JSON array',
  `tom_tat` text DEFAULT NULL,
  `noi_dung` longtext NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `id_nguoi_tao` varchar(36) DEFAULT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Xuất bản, 0: Bản nháp',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `ngay_xuat_ban` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_viet`
--

INSERT INTO `bai_viet` (`id`, `tieu_de`, `slug`, `id_danh_muc`, `tags`, `san_pham_lien_quan`, `tom_tat`, `noi_dung`, `hinh_anh`, `id_nguoi_tao`, `luot_xem`, `trang_thai`, `seo_title`, `seo_description`, `ngay_tao`, `ngay_xuat_ban`) VALUES
('bv_6a1d894d77eae', 'Tầm quan trọng của ngũ hành trong đời sống hiện đại', 'tam-quan-trong-cua-ngu-hanh-trong-doi-song-hien-dai-178032058918', 'dm_6a1d5d9be7ff0', '[\"ngũ hành\",\"phong thủy đời sống\",\"tài lộc\"]', '[\"sp_011\",\"sp_015\"]', 'Ngũ hành tương sinh tương khắc ảnh hưởng như thế nào đến cuộc sống và công việc của bạn? Cùng tìm hiểu cách ứng dụng ngũ hành để mang lại bình an và tài lộc.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 4010, 1, 'Tầm quan trọng của ngũ hành trong đời sống hiện đại - Kiến thức Phong Thủy', 'Ngũ hành tương sinh tương khắc ảnh hưởng như thế nào đến cuộc sống và công việc của bạn? Cùng tìm hiểu cách ứng dụng ngũ hành để mang lại bình an và t', '2026-05-20 04:16:27', '2026-05-20 04:16:27'),
('bv_6a1d894d78d5e', 'Phong thủy luân lưu: Cách thu hút sinh khí vào nhà', 'phong-thuy-luan-luu-cach-thu-hut-sinh-khi-vao-nha-178032058962', 'dm_6a1d5d9be7ff0', '[\"sinh khí\",\"phong thủy nhà ở\",\"hút tài lộc\"]', '[\"sp_009\",\"sp_008\",\"sp_016\"]', 'Sinh khí là yếu tố cốt lõi giúp gia chủ khỏe mạnh, làm ăn phát đạt. Bài viết này hướng dẫn cách bố trí vật phẩm phong thủy để tối ưu hóa luồng khí.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 1548, 1, 'Phong thủy luân lưu: Cách thu hút sinh khí vào nhà - Kiến thức Phong Thủy', 'Sinh khí là yếu tố cốt lõi giúp gia chủ khỏe mạnh, làm ăn phát đạt. Bài viết này hướng dẫn cách bố trí vật phẩm phong thủy để tối ưu hóa luồng khí.', '2026-03-09 07:45:13', '2026-03-09 07:45:13'),
('bv_6a1d894d78e76', 'Giải mã bí ẩn của các linh vật phong thủy', 'giai-ma-bi-an-cua-cac-linh-vat-phong-thuy-178032058918', 'dm_6a1d5d9be7ff0', '[\"linh vật\",\"tỳ hưu\",\"thiềm thừ\",\"hồ ly\"]', '[\"sp_004\",\"sp_001\"]', 'Tỳ Hưu, Thiềm Thừ, Hồ Ly - mỗi linh vật mang một sức mạnh riêng. Làm sao để chọn đúng linh vật phù hợp với mong cầu của bạn?', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 1942, 1, 'Giải mã bí ẩn của các linh vật phong thủy - Kiến thức Phong Thủy', 'Tỳ Hưu, Thiềm Thừ, Hồ Ly - mỗi linh vật mang một sức mạnh riêng. Làm sao để chọn đúng linh vật phù hợp với mong cầu của bạn?', '2026-01-31 12:10:42', '2026-01-31 12:10:42'),
('bv_6a1d894d792e7', 'Thanh tẩy không gian sống bằng trầm hương và bột xông', 'thanh-tay-khong-gian-song-bang-tram-huong-va-bot-xong-178032058938', 'dm_6a1d5d9be7ff0', '[\"thanh tẩy\",\"trầm hương\",\"bột xông nhà\"]', '[\"sp_005\",\"sp_018\",\"sp_009\",\"sp_002\"]', 'Khói trầm hương không chỉ làm sạch không khí mà còn giúp xua đuổi tà khí, rước tài lộc vào nhà. Cùng tìm hiểu cách thanh tẩy chuẩn phong thủy.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 233, 1, 'Thanh tẩy không gian sống bằng trầm hương và bột xông - Kiến thức Phong Thủy', 'Khói trầm hương không chỉ làm sạch không khí mà còn giúp xua đuổi tà khí, rước tài lộc vào nhà. Cùng tìm hiểu cách thanh tẩy chuẩn phong thủy.', '2026-03-28 16:28:29', '2026-03-28 16:28:29'),
('bv_6a1d894d793f8', 'Cách đo lường năng lượng Bovis của đá quý', 'cach-do-luong-nang-luong-bovis-cua-da-quy-178032058978', 'dm_6a1d5d9be7ff0', '[\"năng lượng bovis\",\"đá quý\",\"từ trường\"]', '[\"sp_001\",\"sp_006\",\"sp_018\"]', 'Chỉ số Bovis quyết định mức độ năng lượng của một viên đá. Viên đá có chỉ số Bovis cao sẽ mang lại sức khỏe và may mắn lớn hơn.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 403, 1, 'Cách đo lường năng lượng Bovis của đá quý - Kiến thức Phong Thủy', 'Chỉ số Bovis quyết định mức độ năng lượng của một viên đá. Viên đá có chỉ số Bovis cao sẽ mang lại sức khỏe và may mắn lớn hơn.', '2026-04-05 23:43:36', '2026-04-05 23:43:36'),
('bv_6a1d894d794c5', 'Thiền định cùng đá phong thủy: Bí quyết cân bằng luân xa', 'thien-dinh-cung-da-phong-thuy-bi-quyet-can-bang-luan-xa-178032058914', 'dm_6a1d5d9be7ff0', '[\"thiền định\",\"luân xa\",\"đá thạch anh\"]', '[\"sp_015\",\"sp_018\"]', 'Sử dụng đá thạch anh, mã não trong thiền định giúp mở luân xa, giải tỏa căng thẳng và kết nối với vũ trụ.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 3299, 1, 'Thiền định cùng đá phong thủy: Bí quyết cân bằng luân xa - Kiến thức Phong Thủy', 'Sử dụng đá thạch anh, mã não trong thiền định giúp mở luân xa, giải tỏa căng thẳng và kết nối với vũ trụ.', '2025-12-23 22:43:07', '2025-12-23 22:43:07'),
('bv_6a1d894d79588', 'Phong thủy bàn làm việc giúp thăng tiến sự nghiệp', 'phong-thuy-ban-lam-viec-giup-thang-tien-su-nghiep-178032058955', 'dm_6a1d5d9be7ff0', '[\"bàn làm việc\",\"thăng tiến\",\"quả cầu phong thủy\"]', '[\"sp_014\",\"sp_006\",\"sp_008\",\"sp_010\"]', 'Vị trí đặt quả cầu phong thủy, cây tài lộc trên bàn làm việc có thể thay đổi vận trình công danh của bạn.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 1190, 1, 'Phong thủy bàn làm việc giúp thăng tiến sự nghiệp - Kiến thức Phong Thủy', 'Vị trí đặt quả cầu phong thủy, cây tài lộc trên bàn làm việc có thể thay đổi vận trình công danh của bạn.', '2026-03-04 00:55:16', '2026-03-04 00:55:16'),
('bv_6a1d894d7982f', 'Quy luật tương sinh tương khắc và ứng dụng khi chọn trang sức', 'quy-luat-tuong-sinh-tuong-khac-va-ung-dung-khi-chon-trang-suc-178032058997', 'dm_6a1d5d9be7ff0', '[\"tương sinh\",\"tương khắc\",\"trang sức\"]', '[\"sp_004\",\"sp_016\"]', 'Không phải loại đá nào cũng phù hợp. Đeo sai trang sức phong thủy có thể gây phản tác dụng. Hãy nắm rõ quy luật sinh khắc.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 2913, 1, 'Quy luật tương sinh tương khắc và ứng dụng khi chọn trang sức - Kiến thức Phong Thủy', 'Không phải loại đá nào cũng phù hợp. Đeo sai trang sức phong thủy có thể gây phản tác dụng. Hãy nắm rõ quy luật sinh khắc.', '2026-03-28 17:33:20', '2026-03-28 17:33:20'),
('bv_6a1d894d79925', 'Tháng cô hồn và những vật phẩm phong thủy cần mang theo', 'thang-co-hon-va-nhung-vat-pham-phong-thuy-can-mang-theo-178032058954', 'dm_6a1d5d9be7ff0', '[\"tháng cô hồn\",\"bình an\",\"bùa hộ mệnh\"]', '[\"sp_018\",\"sp_007\"]', 'Để bình an bước qua tháng 7 âm lịch, đây là những vòng tay, lá bùa hộ mệnh bạn không thể thiếu.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 2329, 1, 'Tháng cô hồn và những vật phẩm phong thủy cần mang theo - Kiến thức Phong Thủy', 'Để bình an bước qua tháng 7 âm lịch, đây là những vòng tay, lá bùa hộ mệnh bạn không thể thiếu.', '2026-01-14 18:50:23', '2026-01-14 18:50:23'),
('bv_6a1d894d799f4', 'Năm tuổi và cách hóa giải hạn Thái Tuế bằng trang sức', 'nam-tuoi-va-cach-hoa-giai-han-thai-tue-bang-trang-suc-178032058937', 'dm_6a1d5d9be7ff0', '[\"năm tuổi\",\"thái tuế\",\"hóa giải\"]', '[\"sp_012\",\"sp_019\",\"sp_007\",\"sp_016\"]', 'Gặp năm tuổi hoặc tam tai, việc sử dụng vòng tay có chạm khắc linh vật Bản Mệnh Phật sẽ giúp hóa hung thành cát.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 1325, 1, 'Năm tuổi và cách hóa giải hạn Thái Tuế bằng trang sức - Kiến thức Phong Thủy', 'Gặp năm tuổi hoặc tam tai, việc sử dụng vòng tay có chạm khắc linh vật Bản Mệnh Phật sẽ giúp hóa hung thành cát.', '2026-03-08 14:41:49', '2026-03-08 14:41:49'),
('bv_6a1d894d79b86', 'Cẩm nang chọn vòng tay phong thủy cho người mệnh Kim', 'cam-nang-chon-vong-tay-phong-thuy-cho-nguoi-menh-kim-178032058923', 'dm_6a1d5d9be8479', '[\"mệnh kim\",\"thạch anh tóc vàng\",\"tài lộc\"]', '[\"sp_016\",\"sp_013\"]', 'Người mệnh Kim nên đeo đá màu gì? Cùng khám phá những mẫu vòng tay thạch anh tóc vàng, mắt hổ mang lại tài lộc cho mệnh Kim.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 857, 1, 'Cẩm nang chọn vòng tay phong thủy cho người mệnh Kim - Kiến thức Phong Thủy', 'Người mệnh Kim nên đeo đá màu gì? Cùng khám phá những mẫu vòng tay thạch anh tóc vàng, mắt hổ mang lại tài lộc cho mệnh Kim.', '2026-02-23 04:02:17', '2026-02-23 04:02:17'),
('bv_6a1d894d79c5e', 'Mệnh Mộc đeo đá gì để công việc thuận buồm xuôi gió?', 'menh-moc-deo-da-gi-de-cong-viec-thuan-buom-xuoi-gio-178032058968', 'dm_6a1d5d9be8479', '[\"mệnh mộc\",\"ngọc bích\",\"diopside\"]', '[\"sp_008\",\"sp_010\",\"sp_001\",\"sp_007\"]', 'Màu xanh lục và đen là chân ái của người mệnh Mộc. Khám phá các loại Ngọc Bích, Diopside giúp vượng khí sinh tài.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 2405, 1, 'Mệnh Mộc đeo đá gì để công việc thuận buồm xuôi gió? - Kiến thức Phong Thủy', 'Màu xanh lục và đen là chân ái của người mệnh Mộc. Khám phá các loại Ngọc Bích, Diopside giúp vượng khí sinh tài.', '2026-05-19 19:22:54', '2026-05-19 19:22:54'),
('bv_6a1d894d79d61', 'Top 5 vòng đá may mắn dành riêng cho người mệnh Thủy', 'top-5-vong-da-may-man-danh-rieng-cho-nguoi-menh-thuy-178032058947', 'dm_6a1d5d9be8479', '[\"mệnh thủy\",\"aquamarine\",\"thạch anh đen\"]', '[\"sp_005\",\"sp_008\"]', 'Đá Aquamarine, Thạch Anh Đen, Thạch Anh Tóc Đen... đâu là lựa chọn hoàn hảo giúp người mệnh Thủy thăng hoa trong sự nghiệp?', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 826, 1, 'Top 5 vòng đá may mắn dành riêng cho người mệnh Thủy - Kiến thức Phong Thủy', 'Đá Aquamarine, Thạch Anh Đen, Thạch Anh Tóc Đen... đâu là lựa chọn hoàn hảo giúp người mệnh Thủy thăng hoa trong sự nghiệp?', '2025-12-21 19:31:13', '2025-12-21 19:31:13'),
('bv_6a1d894d79e3d', 'Bí quyết chọn trang sức đá quý cho người mệnh Hỏa', 'bi-quyet-chon-trang-suc-da-quy-cho-nguoi-menh-hoa-178032058995', 'dm_6a1d5d9be8479', '[\"mệnh hỏa\",\"thạch anh tóc đỏ\",\"ngọc dâu tây\"]', '[\"sp_016\",\"sp_011\"]', 'Mệnh Hỏa cần những gam màu nóng như đỏ, hồng, tím hoặc xanh lục tương sinh. Thạch Anh Tóc Đỏ là lựa chọn số 1.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 1180, 1, 'Bí quyết chọn trang sức đá quý cho người mệnh Hỏa - Kiến thức Phong Thủy', 'Mệnh Hỏa cần những gam màu nóng như đỏ, hồng, tím hoặc xanh lục tương sinh. Thạch Anh Tóc Đỏ là lựa chọn số 1.', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
('bv_6a1d894d79fa5', 'Mệnh Thổ nên tránh đeo đá màu gì để không bị xui xẻo?', 'menh-tho-nen-tranh-deo-da-mau-gi-de-khong-bi-xui-xeo-178032058952', 'dm_6a1d5d9be8479', '[\"mệnh thổ\",\"màu sắc\",\"kiêng kỵ\"]', '[\"sp_007\",\"sp_016\"]', 'Người mệnh Thổ tuyệt đối nên tránh các màu thuộc hành Mộc. Bài viết này hướng dẫn chi tiết cách chọn màu sắc chuẩn.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 2480, 1, 'Mệnh Thổ nên tránh đeo đá màu gì để không bị xui xẻo? - Kiến thức Phong Thủy', 'Người mệnh Thổ tuyệt đối nên tránh các màu thuộc hành Mộc. Bài viết này hướng dẫn chi tiết cách chọn màu sắc chuẩn.', '2026-02-02 04:11:50', '2026-02-02 04:11:50'),
('bv_6a1d894d7a099', 'Nam giới mệnh Kim nên đeo vòng tay thiết kế như thế nào?', 'nam-gioi-menh-kim-nen-deo-vong-tay-thiet-ke-nhu-the-nao-178032058912', 'dm_6a1d5d9be8479', '[\"nam giới\",\"mắt hổ\",\"mệnh kim\"]', '[\"sp_013\",\"sp_011\",\"sp_008\",\"sp_018\"]', 'Phái mạnh mệnh Kim cần những thiết kế nam tính, mạnh mẽ. Vòng tay Mắt Hổ Vàng Tâm kích thước 12mm-14mm là gợi ý tuyệt vời.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 1944, 1, 'Nam giới mệnh Kim nên đeo vòng tay thiết kế như thế nào? - Kiến thức Phong Thủy', 'Phái mạnh mệnh Kim cần những thiết kế nam tính, mạnh mẽ. Vòng tay Mắt Hổ Vàng Tâm kích thước 12mm-14mm là gợi ý tuyệt vời.', '2026-01-23 13:08:13', '2026-01-23 13:08:13'),
('bv_6a1d894d7a26a', 'Vòng tay hồ ly tình duyên cho nữ mệnh Thủy và Mộc', 'vong-tay-ho-ly-tinh-duyen-cho-nu-menh-thuy-va-moc-178032058932', 'dm_6a1d5d9be8479', '[\"hồ ly\",\"tình duyên\",\"mệnh thủy\",\"mệnh mộc\"]', '[\"sp_006\",\"sp_002\",\"sp_016\"]', 'Hồ ly mang lại may mắn trong tình yêu. Nhưng chọn hồ ly màu gì để hợp mệnh Thủy, Mộc? Hãy cùng tìm hiểu.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 2356, 1, 'Vòng tay hồ ly tình duyên cho nữ mệnh Thủy và Mộc - Kiến thức Phong Thủy', 'Hồ ly mang lại may mắn trong tình yêu. Nhưng chọn hồ ly màu gì để hợp mệnh Thủy, Mộc? Hãy cùng tìm hiểu.', '2026-01-18 00:55:04', '2026-01-18 00:55:04'),
('bv_6a1d894d7a348', 'Tỳ hưu chiêu tài: Hướng dẫn chọn màu theo ngũ hành', 'ty-huu-chieu-tai-huong-dan-chon-mau-theo-ngu-hanh-178032058974', 'dm_6a1d5d9be8479', '[\"tỳ hưu\",\"ngũ hành\",\"chiêu tài\"]', '[\"sp_018\",\"sp_016\",\"sp_019\",\"sp_006\"]', 'Tỳ hưu là linh vật chiêu tài bậc nhất. Chọn tỳ hưu ngọc bích, thạch anh hay mã não để phát huy tối đa công dụng?', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 246, 1, 'Tỳ hưu chiêu tài: Hướng dẫn chọn màu theo ngũ hành - Kiến thức Phong Thủy', 'Tỳ hưu là linh vật chiêu tài bậc nhất. Chọn tỳ hưu ngọc bích, thạch anh hay mã não để phát huy tối đa công dụng?', '2025-12-19 05:05:14', '2025-12-19 05:05:14'),
('bv_6a1d894d7a418', 'Giải đáp: Mệnh khuyết Kim, Thủy là gì và cách bổ khuyết', 'giai-dap-menh-khuyet-kim-thuy-la-gi-va-cach-bo-khuyet-178032058941', 'dm_6a1d5d9be8479', '[\"khuyết mệnh\",\"bát tự\",\"bổ khuyết\"]', '[\"sp_018\",\"sp_019\"]', 'Khuyết mệnh là khái niệm nâng cao trong phong thủy Bát Tự. Đeo vòng tay đá quý là cách bổ khuyết năng lượng hiệu quả nhất.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 2492, 1, 'Giải đáp: Mệnh khuyết Kim, Thủy là gì và cách bổ khuyết - Kiến thức Phong Thủy', 'Khuyết mệnh là khái niệm nâng cao trong phong thủy Bát Tự. Đeo vòng tay đá quý là cách bổ khuyết năng lượng hiệu quả nhất.', '2026-01-30 23:50:53', '2026-01-30 23:50:53'),
('bv_6a1d894d7a511', 'Tư vấn chọn quà tặng vòng tay phong thủy hợp mệnh cho đối tác', 'tu-van-chon-qua-tang-vong-tay-phong-thuy-hop-menh-cho-doi-tac-178032058961', 'dm_6a1d5d9be8479', '[\"quà tặng\",\"đối tác\",\"hợp mệnh\"]', '[\"sp_005\",\"sp_019\",\"sp_013\",\"sp_017\"]', 'Tặng quà phong thủy là một nghệ thuật. Cần biết rõ năm sinh để chọn đúng vòng hợp mệnh, thể hiện sự tinh tế của người tặng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 4219, 1, 'Tư vấn chọn quà tặng vòng tay phong thủy hợp mệnh cho đối tác - Kiến thức Phong Thủy', 'Tặng quà phong thủy là một nghệ thuật. Cần biết rõ năm sinh để chọn đúng vòng hợp mệnh, thể hiện sự tinh tế của người tặng.', '2025-12-18 14:58:39', '2025-12-18 14:58:39'),
('bv_6a1d894d7a5f9', 'Ngọc Hòa Điền: Viên ngọc quý từ Tân Cương mang giá trị vĩnh cửu', 'ngoc-hoa-dien-vien-ngoc-quy-tu-tan-cuong-mang-gia-tri-vinh-cuu-178032058935', 'dm_6a1d5d9be8e1a', '[\"ngọc hòa điền\",\"ngọc quý\",\"sức khỏe\"]', '[\"sp_004\",\"sp_014\"]', 'Ngọc Hòa Điền (Hetian Jade) được mệnh danh là Đệ Nhất Ngọc. Khám phá vẻ đẹp mỡ màng, êm dịu và ý nghĩa sức khỏe của nó.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 1511, 1, 'Ngọc Hòa Điền: Viên ngọc quý từ Tân Cương mang giá trị vĩnh cửu - Kiến thức Phong Thủy', 'Ngọc Hòa Điền (Hetian Jade) được mệnh danh là Đệ Nhất Ngọc. Khám phá vẻ đẹp mỡ màng, êm dịu và ý nghĩa sức khỏe của nó.', '2026-02-04 09:56:21', '2026-02-04 09:56:21'),
('bv_6a1d894d7a6bd', 'Thạch Anh Tóc Vàng - Biểu tượng của quyền lực và thịnh vượng', 'thach-anh-toc-vang---bieu-tuong-cua-quyen-luc-va-thinh-vuong-178032058980', 'dm_6a1d5d9be8e1a', '[\"thạch anh tóc vàng\",\"quyền lực\",\"thịnh vượng\"]', '[\"sp_014\",\"sp_010\"]', 'Sở hữu những tinh thể Rutile óng ánh, Thạch Anh Tóc Vàng không chỉ đẹp mà còn là viên đá thu hút tài lộc mạnh nhất.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 3538, 1, 'Thạch Anh Tóc Vàng - Biểu tượng của quyền lực và thịnh vượng - Kiến thức Phong Thủy', 'Sở hữu những tinh thể Rutile óng ánh, Thạch Anh Tóc Vàng không chỉ đẹp mà còn là viên đá thu hút tài lộc mạnh nhất.', '2026-02-05 15:58:24', '2026-02-05 15:58:24'),
('bv_6a1d894d7a81e', 'Mã Não (Agate): Viên đá của sự cân bằng và bảo vệ', 'ma-nao-agate-vien-da-cua-su-can-bang-va-bao-ve-178032058990', 'dm_6a1d5d9be8e1a', '[\"mã não\",\"cân bằng\",\"bảo vệ\"]', '[\"sp_015\",\"sp_019\",\"sp_001\"]', 'Từ xa xưa, Mã Não đã được dùng làm bùa hộ mệnh chống lại tà khí. Khám phá các dải màu độc đáo của Mã Não tự nhiên.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 784, 1, 'Mã Não (Agate): Viên đá của sự cân bằng và bảo vệ - Kiến thức Phong Thủy', 'Từ xa xưa, Mã Não đã được dùng làm bùa hộ mệnh chống lại tà khí. Khám phá các dải màu độc đáo của Mã Não tự nhiên.', '2026-06-01 19:18:34', '2026-06-01 19:18:34'),
('bv_6a1d894d7a8df', 'Ngọc Bích (Nephrite) - Khí chất thanh cao của người quân tử', 'ngoc-bich-nephrite---khi-chat-thanh-cao-cua-nguoi-quan-tu-178032058989', 'dm_6a1d5d9be8e1a', '[\"ngọc bích\",\"nephrite\",\"bình an\"]', '[\"sp_019\",\"sp_003\",\"sp_011\",\"sp_018\"]', 'Người xưa có câu \"Vàng có giá, Ngọc vô giá\". Ngọc bích xanh mướt mang đến sự bình an, tĩnh tâm và dung dưỡng khí huyết.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 3350, 1, 'Ngọc Bích (Nephrite) - Khí chất thanh cao của người quân tử - Kiến thức Phong Thủy', 'Người xưa có câu \"Vàng có giá, Ngọc vô giá\". Ngọc bích xanh mướt mang đến sự bình an, tĩnh tâm và dung dưỡng khí huyết.', '2026-01-22 15:08:37', '2026-01-22 15:08:37'),
('bv_6a1d894d7a99c', 'Đá Aquamarine - Nước mắt của nữ thần biển cả', 'da-aquamarine---nuoc-mat-cua-nu-than-bien-ca-178032058944', 'dm_6a1d5d9be8e1a', '[\"aquamarine\",\"tình yêu\",\"bình an\"]', '[\"sp_015\",\"sp_002\",\"sp_019\",\"sp_006\"]', 'Màu xanh trong vắt của Aquamarine tượng trưng cho tình yêu chung thủy, sự bình an trên những chuyến đi xa.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 616, 1, 'Đá Aquamarine - Nước mắt của nữ thần biển cả - Kiến thức Phong Thủy', 'Màu xanh trong vắt của Aquamarine tượng trưng cho tình yêu chung thủy, sự bình an trên những chuyến đi xa.', '2026-05-30 01:23:39', '2026-05-30 01:23:39'),
('bv_6a1d894d7aaba', 'Lu Thống: Ý nghĩa hanh thông, mọi sự suôn sẻ', 'lu-thong-y-nghia-hanh-thong-moi-su-suon-se-178032058912', 'dm_6a1d5d9be8e1a', '[\"lu thống\",\"hanh thông\",\"suôn sẻ\"]', '[\"sp_001\",\"sp_013\",\"sp_018\",\"sp_009\"]', 'Lu Thống có hình dáng trụ tròn hở hai đầu, mang ý nghĩa vạn sự hanh thông, tiền bạc chảy vào không ngừng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 794, 1, 'Lu Thống: Ý nghĩa hanh thông, mọi sự suôn sẻ - Kiến thức Phong Thủy', 'Lu Thống có hình dáng trụ tròn hở hai đầu, mang ý nghĩa vạn sự hanh thông, tiền bạc chảy vào không ngừng.', '2025-12-29 10:29:59', '2025-12-29 10:29:59');
INSERT INTO `bai_viet` (`id`, `tieu_de`, `slug`, `id_danh_muc`, `tags`, `san_pham_lien_quan`, `tom_tat`, `noi_dung`, `hinh_anh`, `id_nguoi_tao`, `luot_xem`, `trang_thai`, `seo_title`, `seo_description`, `ngay_tao`, `ngay_xuat_ban`) VALUES
('bv_6a1d894d7abd5', 'Hổ Phách (Amber) - Hóa thạch thời gian mang năng lượng chữa lành', 'ho-phach-amber---hoa-thach-thoi-gian-mang-nang-luong-chua-lanh-178032058967', 'dm_6a1d5d9be8e1a', '[\"hổ phách\",\"chữa lành\",\"an thần\"]', '[\"sp_009\",\"sp_005\",\"sp_020\"]', 'Hổ phách hàng triệu năm tuổi chứa axit succinic giúp giảm đau, an thần và mang lại vượng khí cho chủ nhân.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 2671, 1, 'Hổ Phách (Amber) - Hóa thạch thời gian mang năng lượng chữa lành - Kiến thức Phong Thủy', 'Hổ phách hàng triệu năm tuổi chứa axit succinic giúp giảm đau, an thần và mang lại vượng khí cho chủ nhân.', '2026-04-12 02:46:22', '2026-04-12 02:46:22'),
('bv_6a1d894d7acc0', 'Đá Diopside - Giọt ngọc xanh thẳm của rừng sâu', 'da-diopside---giot-ngoc-xanh-tham-cua-rung-sau-178032058968', 'dm_6a1d5d9be8e1a', '[\"diopside\",\"sáng tạo\",\"vượng tài\"]', '[\"sp_011\",\"sp_002\",\"sp_013\"]', 'Màu xanh lục đậm của Chrome Diopside giúp người đeo mở mang tầm nhìn, tăng tính sáng tạo và vượng tài lộc.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 3349, 1, 'Đá Diopside - Giọt ngọc xanh thẳm của rừng sâu - Kiến thức Phong Thủy', 'Màu xanh lục đậm của Chrome Diopside giúp người đeo mở mang tầm nhìn, tăng tính sáng tạo và vượng tài lộc.', '2026-04-20 06:24:34', '2026-04-20 06:24:34'),
('bv_6a1d894d7ae46', 'Ruby và Sapphire - Bộ đôi đá quý hoàng gia', 'ruby-va-sapphire---bo-doi-da-quy-hoang-gia-178032058944', 'dm_6a1d5d9be8e1a', '[\"ruby\",\"sapphire\",\"hoàng gia\"]', '[\"sp_015\",\"sp_006\",\"sp_014\",\"sp_008\"]', 'Là hai loại đá quý có độ cứng chỉ sau Kim Cương, Ruby mang lại quyền lực, còn Sapphire mang lại trí tuệ và sự sang trọng.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 1725, 1, 'Ruby và Sapphire - Bộ đôi đá quý hoàng gia - Kiến thức Phong Thủy', 'Là hai loại đá quý có độ cứng chỉ sau Kim Cương, Ruby mang lại quyền lực, còn Sapphire mang lại trí tuệ và sự sang trọng.', '2025-12-24 03:30:18', '2025-12-24 03:30:18'),
('bv_6a1d894d7af4c', 'Ngọc Phỉ Thúy (Jadeite): Phân biệt ngọc Type A, B, C', 'ngoc-phi-thuy-jadeite-phan-biet-ngoc-type-a-b-c-178032058966', 'dm_6a1d5d9be8e1a', '[\"phỉ thúy\",\"jadeite\",\"phân biệt ngọc\"]', '[\"sp_004\",\"sp_020\"]', 'Thế trường Ngọc Phỉ Thúy rất phức tạp. Làm sao để nhận biết ngọc thiên nhiên Type A chưa qua xử lý hóa chất?', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 2218, 1, 'Ngọc Phỉ Thúy (Jadeite): Phân biệt ngọc Type A, B, C - Kiến thức Phong Thủy', 'Thế trường Ngọc Phỉ Thúy rất phức tạp. Làm sao để nhận biết ngọc thiên nhiên Type A chưa qua xử lý hóa chất?', '2026-01-17 22:20:03', '2026-01-17 22:20:03'),
('bv_6a1d894d7b010', 'Hướng dẫn thanh tẩy vòng tay phong thủy mới mua', 'huong-dan-thanh-tay-vong-tay-phong-thuy-moi-mua-178032058987', 'dm_6a1d5d9be9003', '[\"thanh tẩy\",\"năng lượng\",\"mới mua\"]', '[\"sp_018\",\"sp_008\",\"sp_006\"]', 'Vòng tay khi mới thỉnh về cần được thanh tẩy năng lượng cũ trước khi trì chú và sử dụng. Đây là 3 cách thanh tẩy đơn giản tại nhà.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 1584, 1, 'Hướng dẫn thanh tẩy vòng tay phong thủy mới mua - Kiến thức Phong Thủy', 'Vòng tay khi mới thỉnh về cần được thanh tẩy năng lượng cũ trước khi trì chú và sử dụng. Đây là 3 cách thanh tẩy đơn giản tại nhà.', '2026-05-03 21:10:46', '2026-05-03 21:10:46'),
('bv_6a1d894d7b0e1', 'Cách bảo quản Ngọc Bích, Ngọc Hòa Điền ngày càng sáng bóng', 'cach-bao-quan-ngoc-bich-ngoc-hoa-dien-ngay-cang-sang-bong-178032058977', 'dm_6a1d5d9be9003', '[\"bảo quản ngọc\",\"lên nước\",\"dưỡng ngọc\"]', '[\"sp_018\",\"sp_002\",\"sp_010\",\"sp_001\"]', 'Ngọc đeo lâu ngày sẽ \"lên nước\" bóng đẹp nếu bạn biết cách dưỡng. Khám phá bí quyết thoa dầu dưỡng ngọc.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 204, 1, 'Cách bảo quản Ngọc Bích, Ngọc Hòa Điền ngày càng sáng bóng - Kiến thức Phong Thủy', 'Ngọc đeo lâu ngày sẽ \"lên nước\" bóng đẹp nếu bạn biết cách dưỡng. Khám phá bí quyết thoa dầu dưỡng ngọc.', '2026-02-07 09:02:39', '2026-02-07 09:02:39'),
('bv_6a1d894d7b19f', 'Những điều tuyệt đối kiêng kỵ khi đeo vòng tay tỳ hưu', 'nhung-dieu-tuyet-doi-kieng-ky-khi-deo-vong-tay-ty-huu-178032058928', 'dm_6a1d5d9be9003', '[\"kiêng kỵ\",\"tỳ hưu\",\"bảo quản\"]', '[\"sp_004\",\"sp_019\",\"sp_014\",\"sp_013\"]', 'Đeo tỳ hưu sai cách có thể làm mất lộc. Không nên để tỳ hưu dính máu, không để người lạ chạm vào miệng tỳ hưu.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 257, 1, 'Những điều tuyệt đối kiêng kỵ khi đeo vòng tay tỳ hưu - Kiến thức Phong Thủy', 'Đeo tỳ hưu sai cách có thể làm mất lộc. Không nên để tỳ hưu dính máu, không để người lạ chạm vào miệng tỳ hưu.', '2026-04-18 12:54:27', '2026-04-18 12:54:27'),
('bv_6a1d894d7b260', 'Vòng tay đá bị đứt dây: Điềm báo hay chỉ là sự cố?', 'vong-tay-da-bi-dut-day-diem-bao-hay-chi-la-su-co-178032058980', 'dm_6a1d5d9be9003', '[\"đứt dây\",\"điềm báo\",\"thay dây\"]', '[\"sp_018\",\"sp_004\"]', 'Nhiều người lo lắng khi dây xỏ vòng bị đứt. Đừng hoảng sợ, đó có thể là viên đá vừa gánh nạn thay bạn. Hướng dẫn cách xử lý.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 983, 1, 'Vòng tay đá bị đứt dây: Điềm báo hay chỉ là sự cố? - Kiến thức Phong Thủy', 'Nhiều người lo lắng khi dây xỏ vòng bị đứt. Đừng hoảng sợ, đó có thể là viên đá vừa gánh nạn thay bạn. Hướng dẫn cách xử lý.', '2026-03-09 15:22:28', '2026-03-09 15:22:28'),
('bv_6a1d894d7b436', 'Cách thay dây silicon xỏ vòng đá tại nhà chỉ với 5 phút', 'cach-thay-day-silicon-xo-vong-da-tai-nha-chi-voi-5-phut-178032058977', 'dm_6a1d5d9be9003', '[\"thay dây\",\"silicon\",\"tự làm\"]', '[\"sp_007\",\"sp_006\",\"sp_008\"]', 'Dây silicon dùng lâu ngày sẽ bị giãn. Hướng dẫn chi tiết từng bước tự xỏ lại vòng tay phong thủy bền chắc.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 92, 1, 'Cách thay dây silicon xỏ vòng đá tại nhà chỉ với 5 phút - Kiến thức Phong Thủy', 'Dây silicon dùng lâu ngày sẽ bị giãn. Hướng dẫn chi tiết từng bước tự xỏ lại vòng tay phong thủy bền chắc.', '2026-04-02 01:32:11', '2026-04-02 01:32:11'),
('bv_6a1d894d7b52b', 'Bảo quản trang sức bạc Thái mix cùng đá phong thủy', 'bao-quan-trang-suc-bac-thai-mix-cung-da-phong-thuy-178032058975', 'dm_6a1d5d9be9003', '[\"charm bạc\",\"làm sáng\",\"bảo quản\"]', '[\"sp_017\",\"sp_015\",\"sp_004\"]', 'Charm bạc bị xỉn màu do tuyến mồ hôi? Dùng kem đánh răng hoặc chanh muối để làm sáng bóng charm bạc nhanh chóng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 2841, 1, 'Bảo quản trang sức bạc Thái mix cùng đá phong thủy - Kiến thức Phong Thủy', 'Charm bạc bị xỉn màu do tuyến mồ hôi? Dùng kem đánh răng hoặc chanh muối để làm sáng bóng charm bạc nhanh chóng.', '2026-04-19 21:56:00', '2026-04-19 21:56:00'),
('bv_6a1d894d7b5ec', 'Đá phong thủy bị mờ nứt: Khi nào cần thay vòng mới?', 'da-phong-thuy-bi-mo-nut-khi-nao-can-thay-vong-moi-178032058989', 'dm_6a1d5d9be9003', '[\"đá mờ\",\"thay vòng\",\"năng lượng tiêu cực\"]', '[\"sp_015\",\"sp_002\",\"sp_004\",\"sp_020\"]', 'Trải qua thời gian dài hút năng lượng tiêu cực, viên đá có thể bị đục màu hoặc nứt rạn. Đây là lúc bạn cần thanh tẩy hoặc thay mới.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 1023, 1, 'Đá phong thủy bị mờ nứt: Khi nào cần thay vòng mới? - Kiến thức Phong Thủy', 'Trải qua thời gian dài hút năng lượng tiêu cực, viên đá có thể bị đục màu hoặc nứt rạn. Đây là lúc bạn cần thanh tẩy hoặc thay mới.', '2026-05-09 08:08:19', '2026-05-09 08:08:19'),
('bv_6a1d894d7b6ae', 'Tại sao thạch anh tóc lại bị nhạt màu sau một thời gian?', 'tai-sao-thach-anh-toc-lai-bi-nhat-mau-sau-mot-thoi-gian-178032058944', 'dm_6a1d5d9be9003', '[\"thạch anh tóc\",\"nhạt màu\",\"khắc phục\"]', '[\"sp_004\",\"sp_010\",\"sp_012\"]', 'Tiếp xúc nhiều với ánh nắng mặt trời gắt, chất tẩy rửa hóa học có thể làm giảm vẻ đẹp của thạch anh tóc. Cách khắc phục hiệu quả.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 3974, 1, 'Tại sao thạch anh tóc lại bị nhạt màu sau một thời gian? - Kiến thức Phong Thủy', 'Tiếp xúc nhiều với ánh nắng mặt trời gắt, chất tẩy rửa hóa học có thể làm giảm vẻ đẹp của thạch anh tóc. Cách khắc phục hiệu quả.', '2026-04-24 18:15:41', '2026-04-24 18:15:41'),
('bv_6a1d894d7b774', 'Hướng dẫn đo size cổ tay để chọn vòng chuẩn nhất', 'huong-dan-do-size-co-tay-de-chon-vong-chuan-nhat-178032058990', 'dm_6a1d5d9be9003', '[\"đo size\",\"ni tay\",\"hướng dẫn\"]', '[\"sp_004\",\"sp_012\",\"sp_019\"]', 'Mua vòng online làm sao để vừa tay? Cùng xem hướng dẫn đo ni cổ tay bằng sợi dây và thước kẻ đơn giản nhất.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 603, 1, 'Hướng dẫn đo size cổ tay để chọn vòng chuẩn nhất - Kiến thức Phong Thủy', 'Mua vòng online làm sao để vừa tay? Cùng xem hướng dẫn đo ni cổ tay bằng sợi dây và thước kẻ đơn giản nhất.', '2025-12-25 15:40:52', '2025-12-25 15:40:52'),
('bv_6a1d894d7b860', 'Cách kích hoạt lại năng lượng cho vòng đá sau 1 năm sử dụng', 'cach-kich-hoat-lai-nang-luong-cho-vong-da-sau-1-nam-su-dung-178032058986', 'dm_6a1d5d9be9003', '[\"kích hoạt\",\"năng lượng\",\"phơi trăng\"]', '[\"sp_001\",\"sp_020\"]', 'Đá phong thủy cũng cần \"nghỉ ngơi\" và sạc lại năng lượng. Phơi sương, phơi trăng hoặc ngâm nước suối là phương pháp hiệu quả.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 2744, 1, 'Cách kích hoạt lại năng lượng cho vòng đá sau 1 năm sử dụng - Kiến thức Phong Thủy', 'Đá phong thủy cũng cần \"nghỉ ngơi\" và sạc lại năng lượng. Phơi sương, phơi trăng hoặc ngâm nước suối là phương pháp hiệu quả.', '2026-04-29 17:15:51', '2026-04-29 17:15:51'),
('bv_6a1d894d7bab3', 'Mừng tháng Vu Lan: Tặng ngay Trầm Hương xông nhà khi mua vòng Ngọc', 'mung-thang-vu-lan-tang-ngay-tram-huong-xong-nha-khi-mua-vong-ngoc-178032058911', 'dm_6a1d5d9be91f3', '[\"vu lan\",\"ưu đãi\",\"trầm hương\"]', '[\"sp_016\",\"sp_002\"]', 'Chương trình tri ân đặc biệt mùa Vu Lan Báo Hiếu. Tặng hộp trầm hương nụ cao cấp cho mọi hóa đơn trên 1 triệu đồng.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 4231, 1, 'Mừng tháng Vu Lan: Tặng ngay Trầm Hương xông nhà khi mua vòng Ngọc - Kiến thức Phong Thủy', 'Chương trình tri ân đặc biệt mùa Vu Lan Báo Hiếu. Tặng hộp trầm hương nụ cao cấp cho mọi hóa đơn trên 1 triệu đồng.', '2025-12-05 04:13:18', '2025-12-05 04:13:18'),
('bv_6a1d894d7bc23', 'Sự kiện ra mắt BST \"Thanh Âm Mùa Thu\" - Giảm 15% toàn bộ', 'su-kien-ra-mat-bst-thanh-am-mua-thu---giam-15-toan-bo-178032058916', 'dm_6a1d5d9be91f3', '[\"bộ sưu tập\",\"mùa thu\",\"giảm giá\"]', '[\"sp_019\",\"sp_014\"]', 'Bộ sưu tập mới nhất với chất liệu Ngọc Hòa Điền kết hợp charm Bạc s925 thiết kế tinh xảo. Ưu đãi 15% tuần lễ vàng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 4196, 1, 'Sự kiện ra mắt BST \"Thanh Âm Mùa Thu\" - Giảm 15% toàn bộ - Kiến thức Phong Thủy', 'Bộ sưu tập mới nhất với chất liệu Ngọc Hòa Điền kết hợp charm Bạc s925 thiết kế tinh xảo. Ưu đãi 15% tuần lễ vàng.', '2026-01-03 08:18:00', '2026-01-03 08:18:00'),
('bv_6a1d894d7bd86', 'Sinh nhật Chuỗi Ngọc: Flash Sale 50% hàng ngàn sản phẩm', 'sinh-nhat-chuoi-ngoc-flash-sale-50-hang-ngan-san-pham-178032058939', 'dm_6a1d5d9be91f3', '[\"sinh nhật\",\"flash sale\",\"khuyến mãi\"]', '[\"sp_005\",\"sp_007\"]', 'Cơ hội sở hữu vòng tay phong thủy với mức giá chưa từng có. Duy nhất trong ngày sinh nhật của thương hiệu.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 53, 1, 'Sinh nhật Chuỗi Ngọc: Flash Sale 50% hàng ngàn sản phẩm - Kiến thức Phong Thủy', 'Cơ hội sở hữu vòng tay phong thủy với mức giá chưa từng có. Duy nhất trong ngày sinh nhật của thương hiệu.', '2025-12-18 23:28:24', '2025-12-18 23:28:24'),
('bv_6a1d894d7be90', 'Tặng vòng dâu tằm bình an cho bé khi mẹ mua sắm', 'tang-vong-dau-tam-binh-an-cho-be-khi-me-mua-sam-178032058947', 'dm_6a1d5d9be91f3', '[\"vòng dâu tằm\",\"tặng quà\",\"bình an\"]', '[\"sp_010\",\"sp_012\",\"sp_006\"]', 'Chương trình đồng hành cùng gia đình Việt. Mỗi hóa đơn mua sắm trang sức cho mẹ sẽ được tặng kèm vòng dâu tằm trừ tà cho bé.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 2994, 1, 'Tặng vòng dâu tằm bình an cho bé khi mẹ mua sắm - Kiến thức Phong Thủy', 'Chương trình đồng hành cùng gia đình Việt. Mỗi hóa đơn mua sắm trang sức cho mẹ sẽ được tặng kèm vòng dâu tằm trừ tà cho bé.', '2025-12-19 12:57:32', '2025-12-19 12:57:32'),
('bv_6a1d894d7bf82', 'Săn mã Freeship mọi miền tổ quốc trong tháng này', 'san-ma-freeship-moi-mien-to-quoc-trong-thang-nay-178032058969', 'dm_6a1d5d9be91f3', '[\"freeship\",\"vận chuyển\",\"thanh toán\"]', '[\"sp_007\",\"sp_015\",\"sp_016\"]', 'Chuỗi Ngọc chính thức hỗ trợ 100% phí vận chuyển cho tất cả đơn hàng thanh toán trước qua chuyển khoản ngân hàng.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 4587, 1, 'Săn mã Freeship mọi miền tổ quốc trong tháng này - Kiến thức Phong Thủy', 'Chuỗi Ngọc chính thức hỗ trợ 100% phí vận chuyển cho tất cả đơn hàng thanh toán trước qua chuyển khoản ngân hàng.', '2026-02-23 13:20:54', '2026-02-23 13:20:54'),
('bv_6a1d894d7c054', 'Pre-order Bộ Sưu Tập Tết 2027: Nhận quà khủng', 'pre-order-bo-suu-tap-tet-2027-nhan-qua-khung-178032058937', 'dm_6a1d5d9be91f3', '[\"tết 2027\",\"pre order\",\"lì xì vàng\"]', '[\"sp_019\",\"sp_020\",\"sp_017\",\"sp_013\"]', 'Đặt trước bộ vòng linh vật của năm 2027 để nhận ngay bao lì xì mạ vàng 24k may mắn. Số lượng có hạn.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 1866, 1, 'Pre-order Bộ Sưu Tập Tết 2027: Nhận quà khủng - Kiến thức Phong Thủy', 'Đặt trước bộ vòng linh vật của năm 2027 để nhận ngay bao lì xì mạ vàng 24k may mắn. Số lượng có hạn.', '2026-01-21 03:50:06', '2026-01-21 03:50:06'),
('bv_6a1d894d7c227', 'Tri ân khách hàng thân thiết: Nâng hạng thành viên, nhân đôi điểm', 'tri-an-khach-hang-than-thiet-nang-hang-thanh-vien-nhan-doi-diem-178032058944', 'dm_6a1d5d9be91f3', '[\"thành viên\",\"tích điểm\",\"vip\"]', '[\"sp_002\",\"sp_008\"]', 'Chính sách thành viên mới cực kỳ hấp dẫn. Khách hàng VIP sẽ được giảm thêm 5-10% cho mọi hóa đơn trọn đời.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 1710, 1, 'Tri ân khách hàng thân thiết: Nâng hạng thành viên, nhân đôi điểm - Kiến thức Phong Thủy', 'Chính sách thành viên mới cực kỳ hấp dẫn. Khách hàng VIP sẽ được giảm thêm 5-10% cho mọi hóa đơn trọn đời.', '2026-03-21 00:31:35', '2026-03-21 00:31:35'),
('bv_6a1d894d7c302', 'Xả kho cuối năm: Giá chỉ từ 199K cho vòng tay Mã Não', 'xa-kho-cuoi-nam-gia-chi-tu-199k-cho-vong-tay-ma-nao-178032058970', 'dm_6a1d5d9be91f3', '[\"xả kho\",\"cuối năm\",\"mã não\"]', '[\"sp_016\",\"sp_003\",\"sp_020\",\"sp_015\"]', 'Cơ hội mua sắm vòng tay Mã Não tự nhiên chuẩn phong thủy với giá dọn kho cực sốc, không lo về giá.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 2881, 1, 'Xả kho cuối năm: Giá chỉ từ 199K cho vòng tay Mã Não - Kiến thức Phong Thủy', 'Cơ hội mua sắm vòng tay Mã Não tự nhiên chuẩn phong thủy với giá dọn kho cực sốc, không lo về giá.', '2026-02-03 20:04:43', '2026-02-03 20:04:43'),
('bv_6a1d894d7c3c6', 'Quà tặng 8/3: Tôn vinh vẻ đẹp người phụ nữ Việt', 'qua-tang-83-ton-vinh-ve-dep-nguoi-phu-nu-viet-178032058960', 'dm_6a1d5d9be91f3', '[\"quà 8\\/3\",\"quà tặng\",\"phụ nữ\"]', '[\"sp_019\",\"sp_013\"]', 'Tháng của nàng, Chuỗi Ngọc tặng bạn mã giảm giá 83K và hộp quà hoa sáp cao cấp khi mua vòng tay dành tặng phái đẹp.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 1392, 1, 'Quà tặng 8/3: Tôn vinh vẻ đẹp người phụ nữ Việt - Kiến thức Phong Thủy', 'Tháng của nàng, Chuỗi Ngọc tặng bạn mã giảm giá 83K và hộp quà hoa sáp cao cấp khi mua vòng tay dành tặng phái đẹp.', '2026-04-09 11:30:19', '2026-04-09 11:30:19'),
('bv_6a1d894d7c482', 'Ra mắt dịch vụ: Tết dây mix charm theo yêu cầu cá nhân hóa', 'ra-mat-dich-vu-tet-day-mix-charm-theo-yeu-cau-ca-nhan-hoa-178032058982', 'dm_6a1d5d9be91f3', '[\"cá nhân hóa\",\"thiết kế\",\"tết dây\"]', '[\"sp_011\",\"sp_002\",\"sp_015\",\"sp_001\"]', 'Bạn muốn một chiếc vòng không đụng hàng? Chuỗi Ngọc ra mắt dịch vụ thiết kế tết dây và mix charm theo ý thích ngay tại cửa hàng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 624, 1, 'Ra mắt dịch vụ: Tết dây mix charm theo yêu cầu cá nhân hóa - Kiến thức Phong Thủy', 'Bạn muốn một chiếc vòng không đụng hàng? Chuỗi Ngọc ra mắt dịch vụ thiết kế tết dây và mix charm theo ý thích ngay tại cửa hàng.', '2026-02-17 00:49:50', '2026-02-17 00:49:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` varchar(20) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tieu_de_hien_thi` varchar(255) DEFAULT NULL,
  `cta` varchar(100) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `anh_desktop` varchar(255) NOT NULL,
  `anh_mobile` varchar(255) DEFAULT NULL,
  `vi_tri` varchar(50) NOT NULL,
  `thiet_bi` varchar(20) NOT NULL DEFAULT 'desktop_mobile',
  `loai_link` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thu_tu` int(11) NOT NULL DEFAULT 1,
  `trang_thai` varchar(50) NOT NULL DEFAULT 'nhap',
  `khong_gioi_han` tinyint(1) NOT NULL DEFAULT 0,
  `bat_dau` datetime DEFAULT NULL,
  `ket_thuc` datetime DEFAULT NULL,
  `luot_click` int(11) NOT NULL DEFAULT 0,
  `ngay_tao` datetime NOT NULL,
  `ngay_cap_nhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `ten`, `tieu_de_hien_thi`, `cta`, `mo_ta`, `anh_desktop`, `anh_mobile`, `vi_tri`, `thiet_bi`, `loai_link`, `link`, `thu_tu`, `trang_thai`, `khong_gioi_han`, `bat_dau`, `ket_thuc`, `luot_click`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('bn_6a1d95805f9e3', 'Bộ Sưu Tập Ngọc Hòa Điền 2026', 'Thanh Âm Ngọc Quý', 'Khám phá ngay', 'Chế tác tinh xảo từ Ngọc Hòa Điền tự nhiên, tôn vinh vẻ đẹp Á Đông.', '/public/uploads/banners/banner1.jpg', '/public/uploads/banners/banner2.jpg', 'slider_chinh', 'desktop_mobile', 'danh_muc', '/danh-muc/ngoc-hoa-dien', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fbbc', 'Flash Sale Cuối Tháng - Tặng Tỳ Hưu', 'Flash Sale Cuối Tháng', 'Săn Deal Ngay', 'Tặng charm Tỳ Hưu chiêu tài cho đơn hàng Vòng Đá Phong Thủy từ 2 triệu đồng.', '/public/uploads/banners/banner2.jpg', '/public/uploads/banners/banner3.jpg', 'slider_chinh', 'desktop_mobile', 'khuyen_mai', '/khuyen-mai', 2, 'dang_hien_thi', 0, '2026-06-01 00:00:00', '2026-06-11 23:59:59', 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fc6c', 'Vòng Sinh Mệnh - Bùa Hộ Mệnh 2026', 'Bình An Gõ Cửa', 'Chọn Vòng Ngay', 'Cá nhân hóa vòng phong thủy theo Dụng Thần Bát Tự, thu hút năng lượng tích cực.', '/public/uploads/banners/banner3.jpg', '/public/uploads/banners/banner4.jpg', 'slider_chinh', 'desktop_mobile', 'tuy_chinh', '/vong-sinh-menh', 3, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fd83', 'Banner Phụ Trái - Miễn phí vận chuyển', 'Freeship Mọi Miền', 'Xem chính sách', 'Giao hàng nhanh toàn quốc.', '/public/uploads/banners/banner4.jpg', '/public/uploads/banners/banner5.jpg', 'banner_phu', 'desktop_mobile', 'bai_viet', '/bai-viet/chinh-sach-giao-hang', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fe3c', 'Banner Phụ Phải - Đổi trả 7 ngày', 'An Tâm Mua Sắm', 'Chi tiết', 'Kiểm hàng trước khi thanh toán.', '/public/uploads/banners/banner5.jpg', '/public/uploads/banners/banner1.jpg', 'banner_phu', 'desktop_mobile', 'bai_viet', '/bai-viet/chinh-sach-doi-tra', 2, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805ff33', 'Banner Danh mục Thạch Anh', 'Năng Lượng Thạch Anh', 'Mua ngay', '', '/public/uploads/banners/banner1.jpg', '/public/uploads/banners/banner2.jpg', 'san_pham', 'desktop_mobile', 'danh_muc', '/danh-muc/thach-anh', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d958060032', 'Banner Danh mục Ngọc Bích', 'Bình An Từ Ngọc Bích', 'Khám phá', '', '/public/uploads/banners/banner2.jpg', '/public/uploads/banners/banner3.jpg', 'san_pham', 'desktop_mobile', 'danh_muc', '/danh-muc/ngoc-bich', 2, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95806014a', 'Banner Tặng kèm hộp gỗ cao cấp', 'Quà Tặng Cao Cấp', '', 'Tặng hộp gấm lót nhung và phiếu bảo hành đá quý trọn đời.', '/public/uploads/banners/banner3.jpg', '/public/uploads/banners/banner4.jpg', 'chi_tiet_sp', 'desktop_mobile', 'bai_viet', '/bai-viet/chinh-sach-bao-hanh', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95806022f', 'Banner Sidebar Blog - Tư vấn phong thủy', 'Tư Vấn Miễn Phí', 'Chat ngay', 'Bạn chưa biết chọn đá hợp mệnh? Hãy để chuyên gia hỗ trợ bạn.', '/public/uploads/banners/banner4.jpg', '/public/uploads/banners/banner5.jpg', 'bai_viet', 'desktop_mobile', 'tuy_chinh', 'https://zalo.me/', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d958060332', 'Banner Đăng ký nhận tin', 'Nhận Ưu Đãi Độc Quyền', 'Đăng ký', 'Nhận ngay Voucher 100K khi đăng ký email.', '/public/uploads/banners/banner5.jpg', '/public/uploads/banners/banner1.jpg', 'footer', 'desktop_mobile', 'tuy_chinh', '#', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95806040b', 'Banner Noel 2026 (Chưa dùng)', 'Merry Christmas', 'Săn Quà', 'Ấm áp mùa lễ hội cùng Chuỗi Ngọc.', '/public/uploads/banners/banner1.jpg', '/public/uploads/banners/banner2.jpg', 'khuyen_mai', 'desktop_mobile', 'khuyen_mai', '/khuyen-mai/noel-2026', 1, 'nhap', 0, '2026-12-15 00:00:00', '2026-12-25 23:59:59', 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d9580604e6', 'Banner Hết Hạn (Tết 2024)', 'Chúc Mừng Năm Mới', '', 'Giảm 50% dịp Tết.', '/public/uploads/banners/banner2.jpg', '/public/uploads/banners/banner3.jpg', 'slider_chinh', 'desktop_mobile', 'khuyen_mai', '/khuyen-mai', 4, 'dang_hien_thi', 0, '2024-01-01 00:00:00', '2024-02-15 23:59:59', 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52');

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
('ch_addr_001', 'chi_ban_online', 'Chỉ bán online', '0', '0 = có cửa hàng vật lý, 1 = chỉ bán online'),
('ch_addr_002', 'tinh_thanh', 'Tỉnh / Thành phố', 'Hồ Chí Minh', 'Tỉnh/thành phố của cửa hàng'),
('ch_addr_003', 'quan_huyen', 'Quận / Huyện', 'Tân Phú', 'Quận/huyện của cửa hàng'),
('ch_addr_004', 'phuong_xa', 'Phường / Xã', 'Phú Trung', 'Phường/xã của cửa hàng'),
('ch_addr_005', 'dia_chi_chi_tiet', 'Số nhà, Tên đường', '613 Âu Cơ', 'Địa chỉ chi tiết (số nhà, tên đường)'),
('ch_addr_006', 'google_map_iframe', 'Google Maps Iframe', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d823.941479810977!2d106.64180667238585!3d10.784614720837265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fe7efcecbd5%3A0xb4734cea965dd333!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBWxINuIEhp4bq_bg!5e0!3m2!1svi!2s!4v1780325786645!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Mã nhúng iframe Google Maps'),
('ch_basic_001', 'ten_cua_hang', 'Tên cửa hàng', 'Chuỗi Ngọc Phong Thủy', 'Tên chính thức của cửa hàng, hiển thị trên header, footer, email'),
('ch_basic_002', 'thuong_hieu', 'Tên thương hiệu ngắn', 'Chuỗi Ngọc', 'Tên ngắn gọn dùng cho SMS, không gian hiển thị hẹp'),
('ch_basic_003', 'slogan', 'Slogan / Câu khẩu hiệu', 'Vòng ngọc hợp mệnh, gửi may mắn trong từng hạt đá', 'Slogan hiển thị trên header/footer website'),
('ch_basic_004', 'mo_ta', 'Mô tả ngắn cửa hàng', 'Chuyên cung cấp các loại vòng tay phong thủy, đá quý tự nhiên 100% đem lại tài lộc và bình an.', 'Mô tả giới thiệu cửa hàng'),
('ch_basic_005', 'hotline_chinh', 'Hotline chính', '0901234567', 'Số điện thoại hotline chính hiển thị trên toàn website'),
('ch_basic_006', 'sdt_cskh', 'Số điện thoại CSKH', '0909876543', 'SĐT dành cho hỗ trợ kỹ thuật, khiếu nại'),
('ch_basic_007', 'email', 'Email hỗ trợ', 'hotro@chuoingoc.com', 'Email liên hệ chính'),
('ch_basic_008', 'gio_lam_viec', 'Giờ làm việc', '08:00 - 21:00, Thứ 2 - Chủ nhật', 'Thời gian hoạt động của cửa hàng'),
('ch_brand_001', 'logo_chinh', 'Logo chính (nền sáng)', 'http://localhost:8080/shopbanhangchuoingoc/public/uploads/store/logo_chinh_1780325695_6a1d9d3fc0644.jpg', 'URL ảnh logo chính dùng cho header, footer, email'),
('ch_brand_002', 'logo_toi', 'Logo âm bản (nền tối)', 'http://localhost:8080/shopbanhangchuoingoc/public/uploads/store/logo_toi_1780325700_6a1d9d44d2f98.jpg', 'URL ảnh logo dùng khi nền đỏ thẳm hoặc đen'),
('ch_brand_003', 'favicon', 'Favicon', 'http://localhost:8080/shopbanhangchuoingoc/public/uploads/store/favicon_1780325708_6a1d9d4ce8744.jpg', 'URL favicon 64x64px (.ICO hoặc .PNG)'),
('ch_brand_004', 'mau_thuong_hieu', 'Màu thương hiệu chủ đạo', '#6b0d18', 'Mã màu HEX nhận diện chính trên website'),
('ch_legal_001', 'ten_doanh_nghiep', 'Tên Doanh nghiệp / Hộ KD', '', 'Tên doanh nghiệp hoặc hộ kinh doanh theo ĐKKD'),
('ch_legal_002', 'ma_so_thue', 'Mã số thuế / Mã ĐKKD', '', 'Mã số thuế hoặc mã đăng ký kinh doanh'),
('ch_legal_003', 'dia_chi_dkkd', 'Địa chỉ ĐKKD', '', 'Địa chỉ ghi trên giấy đăng ký kinh doanh'),
('ch_legal_004', 'hien_thi_phap_ly', 'Hiển thị pháp lý trên Footer', '0', '0 = ẩn, 1 = hiện thông tin pháp lý trên footer website'),
('ch_seo_001', 'meta_title', 'Meta Title (Tiêu đề SEO)', 'Chuỗi Ngọc Phong Thủy - Vòng tay đá tự nhiên hợp mệnh', 'Tiêu đề SEO cho trang chủ, tối đa 60 ký tự'),
('ch_seo_002', 'meta_description', 'Meta Description (Mô tả SEO)', 'Mua vòng phong thủy, chuỗi ngọc, đá tự nhiên theo mệnh. Sản phẩm cao cấp, uy tín, giao hàng toàn quốc.', 'Mô tả SEO cho trang chủ, tối đa 160 ký tự'),
('ch_seo_003', 'keywords', 'Từ khóa SEO', 'vòng phong thủy, chuỗi ngọc, vòng đá tự nhiên, vòng hợp mệnh', 'Danh sách từ khóa SEO, cách nhau bằng dấu phẩy'),
('ch_seo_004', 'social_share_image', 'Ảnh chia sẻ (Social Share)', 'http://localhost:8080/shopbanhangchuoingoc/public/uploads/store/social_share_image_1780325814_6a1d9db6cb9da.jpg', 'URL ảnh OG Image 1200x630px cho Facebook, Zalo share'),
('ch_social_001', 'zalo', 'Zalo OA', '0901234567', 'Số điện thoại Zalo hoặc Link Zalo OA'),
('ch_social_002', 'zalo_active', 'Zalo OA - Trạng thái', '1', '0 = tắt, 1 = bật'),
('ch_social_003', 'facebook', 'Facebook Fanpage', 'https://facebook.com/chuoingoc', 'Link trang Facebook'),
('ch_social_004', 'facebook_active', 'Facebook - Trạng thái', '1', '0 = tắt, 1 = bật'),
('ch_social_005', 'tiktok', 'TikTok', 'https://tiktok.com/@chuoingoc', 'Link kênh TikTok'),
('ch_social_006', 'tiktok_active', 'TikTok - Trạng thái', '1', '0 = tắt, 1 = bật'),
('ch_social_007', 'shopee', 'Shopee Mall', '', 'Link gian hàng Shopee'),
('ch_social_008', 'shopee_active', 'Shopee - Trạng thái', '0', '0 = tắt, 1 = bật'),
('ch_social_009', 'youtube', 'YouTube', '', 'Link kênh YouTube'),
('ch_social_010', 'youtube_active', 'YouTube - Trạng thái', '0', '0 = tắt, 1 = bật'),
('config_1', 'thong_tin_shop', 'Thông tin cửa hàng', '{\"ten_shop\": \"Chuỗi Ngọc\", \"sdt\": \"0987654321\", \"dia_chi\": \"123 Đường X, Hà Nội\", \"email\": \"contact@chuoingoc.com\"}', NULL),
('config_2', 'phuong_thuc_thanh_toan', 'Phương thức thanh toán', '[{\"id\": \"cod\", \"ten\": \"Thanh toán khi nhận hàng\", \"trang_thai\": true}, {\"id\": \"vnpay\", \"ten\": \"Chuyển khoản VNPay\", \"trang_thai\": true}]', NULL),
('config_3', 'phuong_thuc_van_chuyen', 'Phương thức vận chuyển', '[{\"id\": \"ghtk\", \"ten\": \"Giao Hàng Tiết Kiệm\", \"phi\": 30000, \"trang_thai\": true}]', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cau_hinh_kho`
--

CREATE TABLE `cau_hinh_kho` (
  `id` int(11) NOT NULL,
  `config_key` varchar(100) NOT NULL,
  `config_value` text DEFAULT NULL,
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cau_hinh_kho`
--

INSERT INTO `cau_hinh_kho` (`id`, `config_key`, `config_value`, `ngay_cap_nhat`) VALUES
(1, 'quy_tac_tru_kho', 'xac_nhan_don', '2026-05-30 11:08:07'),
(2, 'hoan_kho_huy_don', '1', '2026-05-29 13:13:18'),
(3, 'hoan_kho_giao_that_bai', '1', '2026-05-29 13:13:18'),
(4, 'chon_kho_tru', 'kho_mac_dinh', '2026-05-29 13:13:18'),
(5, 'cho_phep_pre_order', '0', '2026-05-29 13:13:18'),
(6, 'hien_thi_lien_he', '1', '2026-05-29 13:13:18'),
(7, 'canh_bao_sap_het', '1', '2026-05-29 13:13:18'),
(8, 'nguong_sap_het', '5', '2026-05-29 13:13:18'),
(9, 'canh_bao_ton_cao', '0', '2026-05-29 13:13:18'),
(10, 'nguong_ton_cao', '50', '2026-05-29 13:13:18'),
(11, 'ngay_khong_ban', '60', '2026-05-29 13:13:18'),
(12, 'canh_bao_ton_am', '1', '2026-05-29 13:13:18'),
(13, 'nguoi_nhan_super_admin', '1', '2026-05-29 13:13:18'),
(14, 'nguoi_nhan_quan_ly_kho', '1', '2026-05-29 13:13:18'),
(15, 'nguoi_nhan_phu_trach', '0', '2026-05-29 13:13:18'),
(16, 'kenh_app_admin', '1', '2026-05-29 13:13:18'),
(17, 'kenh_email', '1', '2026-05-29 13:13:18'),
(18, 'sku_prefix', 'SP', '2026-05-29 13:21:39'),
(19, 'sku_length', '6', '2026-05-29 13:21:39'),
(20, 'barcode_type', 'code128', '2026-05-29 13:21:39'),
(21, 'barcode_print_size', '35x22', '2026-05-29 13:21:39'),
(22, 'barcode_print_name', '1', '2026-05-29 13:21:39'),
(23, 'barcode_print_price', '1', '2026-05-29 13:21:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinh_sach`
--

CREATE TABLE `chinh_sach` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL COMMENT 'Tên chính sách',
  `loai` varchar(50) NOT NULL COMMENT 'Loại: Đổi trả, Bảo hành, Vận chuyển, Thanh toán, Bảo mật, Điều khoản, Hướng dẫn, Kiểm hàng',
  `slug` varchar(255) NOT NULL COMMENT 'Đường dẫn SEO',
  `mo_ta_ngan` text DEFAULT NULL COMMENT 'Mô tả ngắn hiển thị ở danh sách/SEO',
  `noi_dung` longtext DEFAULT NULL COMMENT 'Nội dung chính sách (HTML)',
  `vi_tri_hien_thi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Mảng vị trí: Footer, Checkout, Trang sản phẩm, Đăng ký' CHECK (json_valid(`vi_tri_hien_thi`)),
  `trang_thai` enum('dang_hien_thi','dang_an','ban_nhap','can_cap_nhat') NOT NULL DEFAULT 'ban_nhap' COMMENT 'Trạng thái hiển thị',
  `seo_title` varchar(60) DEFAULT NULL COMMENT 'Meta Title SEO',
  `seo_description` varchar(160) DEFAULT NULL COMMENT 'Meta Description SEO',
  `nguoi_tao` varchar(100) DEFAULT NULL COMMENT 'Tên người tạo',
  `nguoi_cap_nhat` varchar(100) DEFAULT NULL COMMENT 'Tên người cập nhật cuối',
  `ngay_tao` datetime DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chính sách cửa hàng';

--
-- Đang đổ dữ liệu cho bảng `chinh_sach`
--

INSERT INTO `chinh_sach` (`id`, `ten`, `loai`, `slug`, `mo_ta_ngan`, `noi_dung`, `vi_tri_hien_thi`, `trang_thai`, `seo_title`, `seo_description`, `nguoi_tao`, `nguoi_cap_nhat`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 'Chính sách đổi trả', 'Đổi trả', 'chinh-sach-doi-tra', 'Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.', '<h2>1. ĐIỀU KIỆN ĐỔI TRẢ</h2><ul><li>Sản phẩm chưa qua sử dụng, còn nguyên tem mác, hộp đựng.</li><li>Không bị nứt vỡ, trầy xước do tác động ngoại lực.</li><li>Sản phẩm phải có hóa đơn mua hàng hợp lệ tại Chuỗi Ngọc.</li></ul><h2>2. THỜI GIAN ĐỔI TRẢ</h2><p>Khách hàng có thể yêu cầu đổi trả trong vòng <strong>7 ngày</strong> kể từ ngày nhận hàng.</p><h2>3. CÁC TRƯỜNG HỢP KHÔNG HỖ TRỢ</h2><ul><li>Vòng ngọc, chuỗi đá đã qua chỉnh sửa kích thước theo yêu cầu riêng.</li><li>Sản phẩm khuyến mãi sâu trong các chương trình Flash Sale.</li></ul>', '[\"Footer\",\"Checkout\"]', 'dang_hien_thi', 'Chính sách đổi trả - Chuỗi Ngọc Phong Thủy', 'Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.', 'Hải Admin', 'Hải Admin', '2026-06-02 11:01:54', '2026-06-02 11:01:54'),
(2, 'Chính sách bảo hành', 'Bảo hành', 'chinh-sach-bao-hanh', 'Cam kết bảo hành chất lượng sản phẩm vòng ngọc, chuỗi đá tự nhiên.', '<h2>1. PHẠM VI BẢO HÀNH</h2><ul><li>Bảo hành đứt dây, tuột hạt do lỗi kỹ thuật: miễn phí trong 6 tháng.</li><li>Bảo hành xước nhẹ bề mặt đá: đánh bóng miễn phí 1 lần.</li></ul><h2>2. KHÔNG BẢO HÀNH</h2><ul><li>Sản phẩm bị nứt vỡ do va đập mạnh.</li><li>Sản phẩm đã tự ý sửa chữa tại nơi khác.</li></ul>', '[\"Footer\",\"Trang sản phẩm\"]', 'dang_hien_thi', 'Chính sách bảo hành - Chuỗi Ngọc Phong Thủy', 'Cam kết bảo hành chất lượng sản phẩm vòng ngọc, chuỗi đá tự nhiên.', 'Hải Admin', 'Hải Admin', '2026-06-02 11:01:54', '2026-06-02 11:01:54'),
(3, 'Chính sách vận chuyển', 'Vận chuyển', 'chinh-sach-van-chuyen', 'Thông tin về phí vận chuyển, thời gian giao hàng và đồng kiểm.', '<h2>1. PHÍ VẬN CHUYỂN</h2><p>Miễn phí giao hàng cho đơn từ 500.000đ trở lên.</p><h2>2. THỜI GIAN GIAO HÀNG</h2><ul><li>Nội thành: 1-2 ngày</li><li>Ngoại thành: 3-5 ngày</li></ul>', '[\"Footer\",\"Checkout\"]', 'dang_hien_thi', '', 'Thông tin về phí vận chuyển, thời gian giao hàng.', 'Super Admin', 'Super Admin', '2026-06-02 11:01:54', '2026-06-02 11:01:54'),
(4, 'Chính sách bảo mật', 'Bảo mật', 'chinh-sach-bao-mat', 'Cam kết bảo vệ thông tin cá nhân của khách hàng.', '<h2>1. THU THẬP THÔNG TIN</h2><p>Chúng tôi chỉ thu thập thông tin cần thiết cho việc xử lý đơn hàng.</p><h2>2. BẢO VỆ DỮ LIỆU</h2><p>Mọi thông tin được mã hóa và bảo vệ nghiêm ngặt.</p>', '[\"Footer\",\"Đăng ký\"]', 'dang_hien_thi', 'Chính sách bảo mật - Chuỗi Ngọc', 'Cam kết bảo vệ thông tin cá nhân của khách hàng.', 'Hải Admin', 'Hải Admin', '2026-06-02 11:01:54', '2026-06-02 11:05:14'),
(5, 'Chính sách thanh toán', 'Thanh toán', 'chinh-sach-thanh-toan', 'Hướng dẫn các phương thức thanh toán được chấp nhận.', '<h2>PHƯƠNG THỨC THANH TOÁN</h2><ul><li>Thanh toán khi nhận hàng (COD)</li><li>Chuyển khoản ngân hàng</li><li>Ví điện tử MoMo, ZaloPay</li></ul>', '[\"Checkout\"]', 'dang_hien_thi', '', '', 'Hải Admin', 'Hải Admin', '2026-06-02 11:01:54', '2026-06-02 11:01:54'),
(6, 'Điều khoản sử dụng', 'Điều khoản', 'dieu-khoan-su-dung', 'Các điều khoản và điều kiện khi sử dụng website.', '<h2>ĐIỀU KHOẢN CHUNG</h2><p>Bằng việc truy cập website, bạn đồng ý với các điều khoản sử dụng dưới đây.</p>', '[\"Footer\"]', 'dang_hien_thi', '', '', 'Super Admin', 'Super Admin', '2026-06-02 11:01:54', '2026-06-02 11:05:02'),
(7, 'Hướng dẫn mua hàng', 'Hướng dẫn', 'huong-dan-mua-hang', 'Hướng dẫn từng bước để đặt hàng trên website.', '<h2>CÁC BƯỚC MUA HÀNG</h2><ol><li>Chọn sản phẩm yêu thích</li><li>Thêm vào giỏ hàng</li><li>Tiến hành thanh toán</li><li>Nhận hàng và kiểm tra</li></ol>', '[]', 'dang_hien_thi', '', '', 'Hải Admin', 'Hải Admin', '2026-06-02 11:01:54', '2026-06-02 11:05:07'),
(8, 'Chính sách kiểm hàng', 'Kiểm hàng', 'chinh-sach-kiem-hang', 'Quyền kiểm tra hàng hóa trước khi nhận.', '<h2>QUYỀN KIỂM HÀNG</h2><p>Quý khách có quyền đồng kiểm sản phẩm trước khi thanh toán cho đơn vị vận chuyển.</p>', '[\"Trang sản phẩm\"]', 'dang_hien_thi', 'Chính sách kiểm hàng - Chuỗi Ngọc', 'Quyền kiểm tra hàng hóa trước khi nhận.', 'Hải Admin', 'Hải Admin', '2026-06-02 11:01:54', '2026-06-02 11:01:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinh_sach_lich_su`
--

CREATE TABLE `chinh_sach_lich_su` (
  `id` int(11) NOT NULL,
  `id_chinh_sach` int(11) NOT NULL,
  `hanh_dong` varchar(255) NOT NULL COMMENT 'Mô tả hành động',
  `mo_ta` text DEFAULT NULL COMMENT 'Chi tiết thay đổi',
  `nguoi_thuc_hien` varchar(100) DEFAULT NULL COMMENT 'Tên người thực hiện',
  `ngay_thuc_hien` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Lịch sử chỉnh sửa chính sách';

--
-- Đang đổ dữ liệu cho bảng `chinh_sach_lich_su`
--

INSERT INTO `chinh_sach_lich_su` (`id`, `id_chinh_sach`, `hanh_dong`, `mo_ta`, `nguoi_thuc_hien`, `ngay_thuc_hien`) VALUES
(1, 1, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Chính sách đổi trả\"', 'Hải Admin', '2026-06-02 11:01:54'),
(2, 2, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Chính sách bảo hành\"', 'Hải Admin', '2026-06-02 11:01:54'),
(3, 3, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Chính sách vận chuyển\"', 'Super Admin', '2026-06-02 11:01:54'),
(4, 4, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Chính sách bảo mật\"', 'Hải Admin', '2026-06-02 11:01:54'),
(5, 5, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Chính sách thanh toán\"', 'Hải Admin', '2026-06-02 11:01:54'),
(6, 6, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Điều khoản sử dụng\"', 'Super Admin', '2026-06-02 11:01:54'),
(7, 7, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Hướng dẫn mua hàng\"', 'Hải Admin', '2026-06-02 11:01:54'),
(8, 8, 'Khởi tạo chính sách', 'Tạo mới chính sách \"Chính sách kiểm hàng\"', 'Hải Admin', '2026-06-02 11:01:54'),
(9, 6, 'Đổi trạng thái → Đang hiển thị', 'Chuyển trạng thái sang \"Đang hiển thị\"', 'Admin', '2026-06-02 11:05:02'),
(10, 7, 'Đổi trạng thái → Đang hiển thị', 'Chuyển trạng thái sang \"Đang hiển thị\"', 'Admin', '2026-06-02 11:05:07'),
(11, 4, 'Đổi trạng thái → Đang hiển thị', 'Chuyển trạng thái sang \"Đang hiển thị\"', 'Admin', '2026-06-02 11:05:14');

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

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_bien_the`, `so_luong`, `don_gia`) VALUES
('ctdh_6a1c160a079c3', 'dh_6a1c160a073e1', 'bt_6a17ca3f31802_4999', 2, 420000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_kiem_ke`
--

CREATE TABLE `chi_tiet_kiem_ke` (
  `id` char(36) NOT NULL,
  `id_phieu_kiem_ke` char(36) NOT NULL,
  `id_bien_the` char(36) NOT NULL,
  `id_vi_tri` char(36) DEFAULT NULL,
  `ton_he_thong` int(11) DEFAULT 0 COMMENT 'Snapshot t???n kho t???i th???i ??i???m t???o phi???u',
  `ton_thuc_te` int(11) DEFAULT NULL COMMENT 'Null = ch??a ki???m',
  `chenh_lech` int(11) DEFAULT NULL COMMENT 'ton_thuc_te - ton_he_thong',
  `gia_von` decimal(15,2) DEFAULT 0.00,
  `thanh_tien_lech` decimal(15,2) DEFAULT 0.00 COMMENT 'chenh_lech * gia_von',
  `ly_do` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `trang_thai_kiem` varchar(30) DEFAULT 'Ch??a ki???m' COMMENT 'Ch??a ki???m, ???? ki???m, C?? ch??nh l???ch'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_kiem_ke`
--

INSERT INTO `chi_tiet_kiem_ke` (`id`, `id_phieu_kiem_ke`, `id_bien_the`, `id_vi_tri`, `ton_he_thong`, `ton_thuc_te`, `chenh_lech`, `gia_von`, `thanh_tien_lech`, `ly_do`, `ghi_chu`, `trang_thai_kiem`) VALUES
('ce3e1f49-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31802_4999', NULL, 111, 110, -1, 420000.00, -420000.00, '', NULL, 'Có chênh lệch'),
('ce3e3a91-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31b18_5076', NULL, 145, 140, -5, 420000.00, -2100000.00, '', NULL, 'Có chênh lệch'),
('ce3e4885-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31dac_1378', NULL, 115, 115, 0, 420000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce3e91c4-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3343d_7665', NULL, 31, 31, 0, 210000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce3ea36e-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f32ac5_4697', NULL, 70, 70, 0, 210000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce3eb0c3-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f32f2c_1814', NULL, 23, 23, 0, 210000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce3ebd88-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3e2f0_9774', NULL, 82, 85, 3, 840000.00, 2520000.00, '', NULL, 'Có chênh lệch'),
('ce3eca22-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3df49_2169', NULL, 77, 75, -2, 840000.00, -1680000.00, '', NULL, 'Có chênh lệch'),
('ce3ed6c5-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3db8f_3782', NULL, 11, 20, 9, 840000.00, 7560000.00, '', NULL, 'Có chênh lệch'),
('ce3ee348-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3eece_6613', NULL, 54, 55, 1, 1120000.00, 1120000.00, '', NULL, 'Có chênh lệch'),
('ce3eefbf-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3eab5_8602', NULL, 92, 100, 8, 1120000.00, 8960000.00, '', NULL, 'Có chênh lệch'),
('ce3efc2a-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3f2d3_5674', NULL, 24, 30, 6, 1120000.00, 6720000.00, '', NULL, 'Có chênh lệch'),
('ce3f08c8-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3fe6d_9123', NULL, 73, 75, 2, 910000.00, 1820000.00, '', NULL, 'Có chênh lệch'),
('ce3f1545-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3faf2_3949', NULL, 50, 50, 0, 910000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce3f21b8-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f40a17_2289', NULL, 74, 70, -4, 280000.00, -1120000.00, '', NULL, 'Có chênh lệch'),
('ce3f2e3c-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f40626_6797', NULL, 44, 45, 1, 280000.00, 280000.00, '', NULL, 'Có chênh lệch'),
('ce3f3ade-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f4151f_8482', NULL, 89, 90, 1, 770000.00, 770000.00, '', NULL, 'Có chênh lệch'),
('ce3f474b-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f411b4_4886', NULL, 26, 30, 4, 770000.00, 3080000.00, '', NULL, 'Có chênh lệch'),
('ce3f53c6-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f34555_1778', NULL, 78, 80, 2, 1050000.00, 2100000.00, '', NULL, 'Có chênh lệch'),
('ce3f604b-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f33d03_1597', NULL, 16, 20, 4, 1050000.00, 4200000.00, '', NULL, 'Có chênh lệch'),
('ce3f6c9b-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3413a_2487', NULL, 47, 50, 3, 1050000.00, 3150000.00, '', NULL, 'Có chênh lệch'),
('ce3f78f2-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f34956_1505', NULL, 39, 40, 1, 1050000.00, 1050000.00, '', NULL, 'Có chênh lệch'),
('ce3f8724-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f352d2_7083', NULL, 35, 30, -5, 1120000.00, -5600000.00, '', NULL, 'Có chênh lệch'),
('ce3f9432-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f35b27_1230', NULL, 85, 80, -5, 1120000.00, -5600000.00, '', NULL, 'Có chênh lệch'),
('ce3fa0b8-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f356ff_3946', NULL, 38, 39, 1, 1120000.00, 1120000.00, '', NULL, 'Có chênh lệch'),
('ce3fad96-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f35fd8_5708', NULL, 75, 70, -5, 910000.00, -4550000.00, '', NULL, 'Có chênh lệch'),
('ce3fba14-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3624c_2637', NULL, 94, 100, 6, 910000.00, 5460000.00, '', NULL, 'Có chênh lệch'),
('ce3fc825-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3648f_7582', NULL, 61, 70, 9, 910000.00, 8190000.00, '', NULL, 'Có chênh lệch'),
('ce3fd945-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f36705_1246', NULL, 38, 50, 12, 910000.00, 10920000.00, '', NULL, 'Có chênh lệch'),
('ce3fe84e-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f41eeb_6366', NULL, 58, 60, 2, 1120000.00, 2240000.00, '', NULL, 'Có chênh lệch'),
('ce3ff56b-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f41d81_7284', NULL, 84, 84, 0, 1120000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce400243-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f41c25_8343', NULL, 28, 30, 2, 1120000.00, 2240000.00, '', NULL, 'Có chênh lệch'),
('ce400ef1-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f372d5_2690', NULL, 54, 54, 0, 910000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce401ba2-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f36ee0_2672', NULL, 44, 44, 0, 910000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce402857-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f42208_2267', NULL, 54, 54, 0, 910000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce40350d-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f42542_6921', NULL, 22, 30, 8, 910000.00, 7280000.00, '', NULL, 'Có chênh lệch'),
('ce4041c3-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f42c4f_2357', NULL, 36, 40, 4, 910000.00, 3640000.00, '', NULL, 'Có chênh lệch'),
('ce404e6c-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f42fc2_2526', NULL, 49, 50, 1, 910000.00, 910000.00, '', NULL, 'Có chênh lệch'),
('ce405aff-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f43353_5705', NULL, 35, 35, 0, 910000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce406796-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3c6b9_8385', NULL, 83, 85, 2, 1120000.00, 2240000.00, '', NULL, 'Có chênh lệch'),
('ce407447-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3c435_9741', NULL, 47, 47, 0, 1120000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce4080e9-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3c903_3115', NULL, 30, 30, 0, 1120000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce408d92-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3c1e0_7068', NULL, 69, 69, 0, 1120000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce409a26-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f44eb1_1876', NULL, 73, 75, 2, 1190000.00, 2380000.00, '', NULL, 'Có chênh lệch'),
('ce40a6c7-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f45a76_9908', NULL, 50, 50, 0, 1190000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce40b363-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f456ae_2640', NULL, 11, 11, 0, 1190000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce40c509-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f452ab_9530', NULL, 23, 35, 12, 1190000.00, 14280000.00, '', NULL, 'Có chênh lệch'),
('ce40d4f6-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f43eaf_3226', NULL, 39, 40, 1, 1050000.00, 1050000.00, '', NULL, 'Có chênh lệch'),
('ce40e7d4-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f442b1_3626', NULL, 60, 70, 10, 1050000.00, 10500000.00, '', NULL, 'Có chênh lệch'),
('ce40f4b3-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f43ad2_1326', NULL, 54, 55, 1, 1050000.00, 1050000.00, '', NULL, 'Có chênh lệch'),
('ce41011d-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f446f2_6943', NULL, 22, 22, 0, 1050000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce410d73-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3cf3f_7131', NULL, 69, 70, 1, 490000.00, 490000.00, '', NULL, 'Có chênh lệch'),
('ce4119c5-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3cd6a_2743', NULL, 75, 75, 0, 490000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce41262c-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3d357_6692', NULL, 68, 68, 0, 490000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce413821-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f387f9_5857', NULL, 71, 71, 0, 1050000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce414714-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f37bf0_7610', NULL, 77, 77, 0, 1050000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce4153bc-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f38210_9526', NULL, 67, 67, 0, 1050000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce416014-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f396f6_4341', NULL, 19, 20, 1, 560000.00, 560000.00, '', NULL, 'Có chênh lệch'),
('ce416d1a-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f39289_9497', NULL, 25, 30, 5, 560000.00, 2800000.00, '', NULL, 'Có chênh lệch'),
('ce417980-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f39b7a_1941', NULL, 54, 55, 1, 560000.00, 560000.00, '', NULL, 'Có chênh lệch'),
('ce4185ce-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3b7a5_8182', NULL, 77, 77, 0, 700000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce419213-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3bcdc_6964', NULL, 34, 35, 1, 700000.00, 700000.00, '', NULL, 'Có chênh lệch'),
('ce419f73-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3b300_5532', NULL, 81, 87, 6, 700000.00, 4200000.00, '', NULL, 'Có chênh lệch'),
('ce41abc2-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3a3c8_9509', NULL, 46, 46, 0, 770000.00, 0.00, '', NULL, 'Đã kiểm'),
('ce41b7ff-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3ab4f_3277', NULL, 16, 20, 4, 770000.00, 3080000.00, '', NULL, 'Có chênh lệch'),
('ce41c426-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3a780_2488', NULL, 58, 60, 2, 770000.00, 1540000.00, '', NULL, 'Có chênh lệch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_kho`
--

CREATE TABLE `chi_tiet_phieu_kho` (
  `id` varchar(36) NOT NULL,
  `id_phieu_kho` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `id_vi_tri` char(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(15,0) DEFAULT 0,
  `ghi_chu_ct` varchar(255) DEFAULT NULL,
  `so_luong_nhan` int(11) DEFAULT NULL,
  `so_luong_loi` int(11) NOT NULL DEFAULT 0,
  `loi_thieu_chi_tiet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_phieu_kho`
--

INSERT INTO `chi_tiet_phieu_kho` (`id`, `id_phieu_kho`, `id_bien_the`, `id_vi_tri`, `so_luong`, `don_gia`, `ghi_chu_ct`, `so_luong_nhan`, `so_luong_loi`, `loi_thieu_chi_tiet`) VALUES
('4493ac45-5b53-11f1-8d3a-088fc37729cd', '44935fe4-5b53-11f1-8d3a-088fc37729cd', 'bt_6a17ca3f42542_6921', NULL, 10, 50000, '', NULL, 0, NULL),
('4f39c387-5c28-11f1-a6a6-088fc37729cd', '4f39a13e-5c28-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31802_4999', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 20, 420000, NULL, 20, 0, ''),
('4f39fa76-5c28-11f1-a6a6-088fc37729cd', '4f39a13e-5c28-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 20, 420000, NULL, 20, 0, ''),
('4f3a19e6-5c28-11f1-a6a6-088fc37729cd', '4f39a13e-5c28-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 20, 420000, NULL, 20, 0, ''),
('5494f7a8-5c26-11f1-a6a6-088fc37729cd', '5494ba8f-5c26-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31802_4999', NULL, 1, 420000, NULL, NULL, 0, NULL),
('549567b8-5c26-11f1-a6a6-088fc37729cd', '5494ba8f-5c26-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', NULL, 1, 420000, NULL, NULL, 0, NULL),
('54959355-5c26-11f1-a6a6-088fc37729cd', '5494ba8f-5c26-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', NULL, 1, 420000, NULL, NULL, 0, NULL),
('bd00d603-5c24-11f1-a6a6-088fc37729cd', 'bd00b99f-5c24-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31802_4999', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 50, 45000, '', 50, 0, ''),
('bd010c52-5c24-11f1-a6a6-088fc37729cd', 'bd00b99f-5c24-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 50, 45000, '', 50, 0, ''),
('bd0134a1-5c24-11f1-a6a6-088fc37729cd', 'bd00b99f-5c24-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 50, 45000, '', 50, 0, ''),
('faedfc84-5c1f-11f1-a6a6-088fc37729cd', 'faedbdeb-5c1f-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31802_4999', NULL, 50, 45000, '', 50, 0, ''),
('faee14e9-5c1f-11f1-a6a6-088fc37729cd', 'faedbdeb-5c1f-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', NULL, 50, 45000, '', 50, 0, ''),
('faee1e97-5c1f-11f1-a6a6-088fc37729cd', 'faedbdeb-5c1f-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', NULL, 50, 45000, '', 50, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_thuyen_chuyen`
--

CREATE TABLE `chi_tiet_thuyen_chuyen` (
  `id` char(36) NOT NULL,
  `id_phieu_chuyen` char(36) NOT NULL,
  `id_bien_the` char(36) NOT NULL,
  `id_vi_tri` char(36) DEFAULT NULL,
  `id_vi_tri_nhan` char(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `so_luong_thuc_nhan` int(11) DEFAULT NULL,
  `so_luong_loi` int(11) DEFAULT 0,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_thuyen_chuyen`
--

INSERT INTO `chi_tiet_thuyen_chuyen` (`id`, `id_phieu_chuyen`, `id_bien_the`, `id_vi_tri`, `id_vi_tri_nhan`, `so_luong`, `so_luong_thuc_nhan`, `so_luong_loi`, `ghi_chu`) VALUES
('62184c1a-5cab-11f1-962c-088fc37729cd', '62182a4e-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31802_4999', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', '3fc9422f-5c1f-11f1-a6a6-088fc37729cd', 10, 10, 0, NULL),
('6218582a-5cab-11f1-962c-088fc37729cd', '62182a4e-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31b18_5076', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', '3fc9422f-5c1f-11f1-a6a6-088fc37729cd', 10, 10, 0, NULL),
('62186368-5cab-11f1-962c-088fc37729cd', '62182a4e-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31dac_1378', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 10, 10, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_trinh_khuyen_mai`
--

CREATE TABLE `chuong_trinh_khuyen_mai` (
  `id` varchar(36) NOT NULL,
  `ma_km` varchar(50) NOT NULL,
  `ten_chuong_trinh` varchar(255) NOT NULL,
  `loai_km` varchar(50) NOT NULL COMMENT 'percent, flash, clearance, bundle',
  `kieu_giam` varchar(50) NOT NULL COMMENT 'phan_tram, so_tien, gia_co_dinh',
  `gia_tri_giam` decimal(15,0) NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `gioi_han_tong` int(11) NOT NULL DEFAULT -1 COMMENT '-1: Không giới hạn',
  `gioi_han_khach` int(11) NOT NULL DEFAULT -1 COMMENT '-1: Không giới hạn',
  `da_su_dung` int(11) NOT NULL DEFAULT 0,
  `hien_thi_badge` tinyint(1) NOT NULL DEFAULT 1,
  `hien_thi_countdown` tinyint(1) NOT NULL DEFAULT 0,
  `hien_thi_progress` tinyint(1) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: Nháp/Tạm dừng, 1: Hoạt động, 2: Kết thúc',
  `nguoi_tao` varchar(36) DEFAULT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong_trinh_khuyen_mai`
--

INSERT INTO `chuong_trinh_khuyen_mai` (`id`, `ma_km`, `ten_chuong_trinh`, `loai_km`, `kieu_giam`, `gia_tri_giam`, `ngay_bat_dau`, `ngay_ket_thuc`, `gioi_han_tong`, `gioi_han_khach`, `da_su_dung`, `hien_thi_badge`, `hien_thi_countdown`, `hien_thi_progress`, `trang_thai`, `nguoi_tao`, `ngay_tao`) VALUES
('6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'KM-XK-SALE', 'Xả Kho Giảm Mạnh', 'clearance', 'so_tien', 200000, '2026-06-01 00:00:00', '2026-07-30 23:59:00', -1, -1, 0, 1, 0, 0, 1, NULL, '2026-06-01 16:45:33'),
('a17c4763-d5c7-4995-8146-550d04124502', 'KM-FS-WEEKEND', 'Flash Sale Cuối Tuần', 'flash', 'phan_tram', 20, '2026-06-01 00:00:00', '2026-07-31 23:59:00', -1, -1, 0, 1, 1, 1, 1, NULL, '2026-06-01 16:45:33'),
('ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'KM-NB-WEEK', 'Tuần Lễ Ngọc Bích', 'percent', 'phan_tram', 15, '2026-05-31 00:00:00', '2026-07-31 23:59:00', -1, -1, 0, 1, 0, 0, 1, NULL, '2026-06-01 16:45:33'),
('c7a64a06-243a-4a74-8f8a-c141d3631666', 'KM-DG-500K', 'Đồng Giá Sốc', 'flash', 'gia_co_dinh', 500000, '2026-06-01 00:00:00', '2026-07-31 23:59:00', -1, -1, 0, 1, 1, 1, 1, NULL, '2026-06-01 16:45:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_trinh_khuyen_mai_san_pham`
--

CREATE TABLE `chuong_trinh_khuyen_mai_san_pham` (
  `id` varchar(36) NOT NULL,
  `id_khuyen_mai` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `gia_tri_giam_tuy_chinh` decimal(15,0) DEFAULT NULL COMMENT 'NULL nếu theo giảm giá gốc của chương trình',
  `so_luong_gioi_han` int(11) NOT NULL DEFAULT -1,
  `so_luong_da_ban` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong_trinh_khuyen_mai_san_pham`
--

INSERT INTO `chuong_trinh_khuyen_mai_san_pham` (`id`, `id_khuyen_mai`, `id_san_pham`, `gia_tri_giam_tuy_chinh`, `so_luong_gioi_han`, `so_luong_da_ban`) VALUES
('08fdb3cc-f925-4e8e-bee9-1ebadd8ca77b', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_016', NULL, -1, 0),
('118584d3-53f0-4aec-8365-198c2e6a4f8e', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_010', NULL, -1, 0),
('1aa090c4-ab8f-4be5-a69b-91d29909087f', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_001', NULL, -1, 0),
('2405aec5-afa0-4b50-9729-4394102ca586', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_019', NULL, -1, 0),
('3d50c6f9-91d8-49ef-aa08-713f69e6082c', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_003', NULL, -1, 0),
('44896d7c-f5b7-46a5-90c9-b090ad4d2769', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_014', NULL, -1, 0),
('45262285-7387-4067-b728-dbce9e8a437c', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_012', NULL, -1, 0),
('57e7cfb2-d6fc-42c2-85a8-d13855ebdfa9', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_008', NULL, -1, 0),
('5a42cd9b-ca0f-436a-aa5a-32fba3f23c78', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_015', NULL, -1, 0),
('7a36a2eb-bbd6-42d0-90c4-3310e71e21ee', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_009', NULL, -1, 0),
('878d7b1c-7ede-4800-96f4-a3a213f14bb9', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_005', NULL, -1, 0),
('9691169d-ecce-4b09-b668-e8216199368c', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_011', NULL, -1, 0),
('a20cd1d3-03c8-4c55-9fe6-7bbe62cbb1fa', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_018', NULL, -1, 0),
('ac528547-8166-430a-8925-39d3cf8b4833', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_013', NULL, -1, 0),
('ba5e3752-c694-4d4c-9855-923d5336c5f9', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_007', NULL, -1, 0),
('bdd987a9-c325-4dd0-86f8-f0753282606f', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_006', NULL, -1, 0),
('dd2aef34-5b61-4269-823d-7d4601b56cf3', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_017', NULL, -1, 0),
('df3e1239-5510-4fe4-bffa-6c9b1b24f24a', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_021', NULL, -1, 0),
('e07d378b-ceb7-4588-bd49-d9be0522cc9b', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_004', NULL, -1, 0),
('e7238f38-e3d4-4751-a4cd-ded5d556accf', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_022', NULL, -1, 0),
('ece6a20d-d596-41ae-9d09-29cdea38e1a8', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_002', NULL, -1, 0),
('f476006a-948a-4428-bee5-de3d71011639', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_020', NULL, -1, 0);

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
('dg_6a1839725cf93', 'sp_005', 'kh_6a17dc271eecd', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a1839725d9f0', 'sp_007', 'kh_6a17dc271eecd', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a1839725efed', 'sp_014', 'kh_6a17dc6aac40c', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839725f1d0', 'sp_015', 'kh_6a17dc6aac40c', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-04 14:47:46', NULL, NULL, NULL),
('dg_6a18397260400', 'sp_007', 'kh_6a183864cecd3', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a18397260759', 'sp_016', 'kh_6a183864cecd3', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-15 14:47:46', NULL, NULL, NULL),
('dg_6a18397262375', 'sp_013', 'kh_6a183864d097f', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972629d3', 'sp_004', 'kh_6a183864d0cf7', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-10 14:47:46', NULL, NULL, NULL),
('dg_6a183972638f6', 'sp_011', 'kh_6a183864d1037', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-17 14:47:46', NULL, NULL, NULL),
('dg_6a18397263d2f', 'sp_013', 'kh_6a183864d1037', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972645d3', 'sp_016', 'kh_6a183864d141b', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972659ae', 'sp_008', 'kh_6a183864d1a95', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839726612e', 'sp_002', 'kh_6a183864d1d81', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397266777', 'sp_001', 'kh_6a183864d2043', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a18397268fc3', 'sp_001', 'kh_6a183864d2c59', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a1839726934f', 'sp_016', 'kh_6a183864d2c59', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972697a5', 'sp_002', 'kh_6a183864d3095', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839726991f', 'sp_006', 'kh_6a183864d3095', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839726a791', 'sp_006', 'kh_6a183864d3388', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-26 14:47:46', NULL, NULL, NULL),
('dg_6a1839726aaad', 'sp_019', 'kh_6a183864d3388', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839726b128', 'sp_010', 'kh_6a183864d366c', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839726b47e', 'sp_014', 'kh_6a183864d366c', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839726c420', 'sp_003', 'kh_6a183864d3b7c', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839726c590', 'sp_013', 'kh_6a183864d3b7c', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839726c83f', 'sp_001', 'kh_6a183864d3df0', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839726cb3f', 'sp_006', 'kh_6a183864d3df0', NULL, 3, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a1839726d53d', 'sp_018', 'kh_6a183864d404e', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839726df58', 'sp_006', 'kh_6a183864d4360', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839726e5fb', 'sp_013', 'kh_6a183864d461b', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a1839726e925', 'sp_014', 'kh_6a183864d461b', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-27 14:47:46', NULL, NULL, NULL),
('dg_6a1839726f488', 'sp_004', 'kh_6a183864d49e4', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839726fb67', 'sp_014', 'kh_6a183864d4c48', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-12 14:47:46', NULL, NULL, NULL),
('dg_6a18397270cf2', 'sp_010', 'kh_6a183864d5370', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a18397271077', 'sp_021', 'kh_6a183864d5370', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-12 14:47:46', NULL, NULL, NULL),
('dg_6a18397271eb5', 'sp_006', 'kh_6a183864d56f6', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a18397272160', 'sp_022', 'kh_6a183864d56f6', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a1839727283a', 'sp_021', 'kh_6a183864d5b61', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-03-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839727292a', 'sp_022', 'kh_6a183864d5b61', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a18397272d1b', 'sp_001', 'kh_6a183864d5f72', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a18397273004', 'sp_009', 'kh_6a183864d5f72', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-05 14:47:46', NULL, NULL, NULL),
('dg_6a18397273dbb', 'sp_012', 'kh_6a183864d62a5', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a183972740e9', 'sp_015', 'kh_6a183864d62a5', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a18397274c28', 'sp_004', 'kh_6a183864d6660', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397274d25', 'sp_013', 'kh_6a183864d6660', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a183972750bd', 'sp_006', 'kh_6a183864d6c49', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a18397275194', 'sp_008', 'kh_6a183864d6c49', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839727560f', 'sp_006', 'kh_6a183864d7fc1', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839727592a', 'sp_016', 'kh_6a183864d7fc1', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-09 14:47:46', NULL, NULL, NULL),
('dg_6a18397276023', 'sp_019', 'kh_6a183864d8470', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972765a6', 'sp_017', 'kh_6a183864d8938', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a18397277683', 'sp_019', 'kh_6a183864d8938', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a18397277ff9', 'sp_006', 'kh_6a183864d8da8', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-12 14:47:46', NULL, NULL, NULL),
('dg_6a183972782fe', 'sp_020', 'kh_6a183864d9216', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a1839727897c', 'sp_022', 'kh_6a183864d9674', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a18397279530', 'sp_013', 'kh_6a183864d9b06', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-13 14:47:46', NULL, NULL, NULL),
('dg_6a18397279df2', 'sp_007', 'kh_6a183864da4a6', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a18397279eda', 'sp_022', 'kh_6a183864da4a6', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839727a18b', 'sp_012', 'kh_6a183864da863', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a1839727a467', 'sp_022', 'kh_6a183864da863', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a1839727b336', 'sp_015', 'kh_6a183864daccb', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839727bf03', 'sp_011', 'kh_6a183864daf6b', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a1839727c206', 'sp_022', 'kh_6a183864daf6b', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-13 14:47:46', NULL, NULL, NULL),
('dg_6a1839727cd89', 'sp_010', 'kh_6a183864db37e', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a1839727ce6f', 'sp_015', 'kh_6a183864db37e', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-13 14:47:46', NULL, NULL, NULL),
('dg_6a1839727d3a4', 'sp_015', 'kh_6a183864db59a', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839727d65b', 'sp_022', 'kh_6a183864db59a', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839727ec71', 'sp_006', 'kh_6a183864dba87', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839727f2b3', 'sp_018', 'kh_6a183864dbc65', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839727f583', 'sp_019', 'kh_6a183864dbc65', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839727fc27', 'sp_005', 'kh_6a183864dc124', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839727fd28', 'sp_006', 'kh_6a183864dc124', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a18397280196', 'sp_006', 'kh_6a183864dc2ce', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-11 14:47:46', NULL, NULL, NULL),
('dg_6a18397280c2c', 'sp_019', 'kh_6a183864dc515', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-18 14:47:46', NULL, NULL, NULL),
('dg_6a18397281178', 'sp_003', 'kh_6a183864dc8e2', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a1839728140e', 'sp_016', 'kh_6a183864dc8e2', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839728265f', 'sp_013', 'kh_6a183864dd2b1', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839728293a', 'sp_016', 'kh_6a183864dd2b1', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a18397283c04', 'sp_004', 'kh_6a183864dd6ee', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397283efa', 'sp_014', 'kh_6a183864dd6ee', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-07 14:47:46', NULL, NULL, NULL),
('dg_6a183972845b5', 'sp_003', 'kh_6a183864dd94e', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-27 14:47:46', NULL, NULL, NULL),
('dg_6a18397284681', 'sp_016', 'kh_6a183864dd94e', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-03 14:47:46', NULL, NULL, NULL),
('dg_6a1839728486e', 'sp_017', 'kh_6a183864ddaee', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a18397285d14', 'sp_019', 'kh_6a183864ddec8', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a18397286891', 'sp_015', 'kh_6a183864de10e', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a18397286ce8', 'sp_004', 'kh_6a183864de4c6', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-07 14:47:46', NULL, NULL, NULL),
('dg_6a1839728700e', 'sp_015', 'kh_6a183864de67d', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-07 14:47:46', NULL, NULL, NULL),
('dg_6a18397287338', 'sp_012', 'kh_6a183864de904', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972873f6', 'sp_003', 'kh_6a183864de904', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839728764b', 'sp_021', 'kh_6a183864defa6', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a1839728788a', 'sp_017', 'kh_6a183864df195', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-05 14:47:46', NULL, NULL, NULL),
('dg_6a18397287ad0', 'sp_006', 'kh_6a183864df364', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-25 14:47:46', NULL, NULL, NULL),
('dg_6a18397287b8e', 'sp_008', 'kh_6a183864df364', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972881f0', 'sp_020', 'kh_6a183864dfb1f', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-08 14:47:46', NULL, NULL, NULL),
('dg_6a18397289118', 'sp_012', 'kh_6a183864dfd42', NULL, 3, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972893dd', 'sp_010', 'kh_6a183864dfd42', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839728997c', 'sp_001', 'kh_6a183864dff7a', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a18397289c50', 'sp_011', 'kh_6a183864dff7a', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a1839728a495', 'sp_002', 'kh_6a183864e01ed', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839728ac01', 'sp_008', 'kh_6a183864e04e7', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a1839728aece', 'sp_016', 'kh_6a183864e04e7', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839728bc20', 'sp_015', 'kh_6a183864e06e7', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-15 14:47:46', NULL, NULL, NULL),
('dg_6a1839728bf31', 'sp_019', 'kh_6a183864e06e7', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839728ca6c', 'sp_008', 'kh_6a183864e08d6', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839728d544', 'sp_010', 'kh_6a183864e0c66', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839728dde5', 'sp_007', 'kh_6a183864e0f3c', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a1839728e73a', 'sp_007', 'kh_6a183864e15ab', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a1839728e9f7', 'sp_009', 'kh_6a183864e15ab', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-29 14:47:46', NULL, NULL, NULL),
('dg_6a1839728facc', 'sp_003', 'kh_6a183864e1a42', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839728fda1', 'sp_004', 'kh_6a183864e1a42', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a1839729039b', 'sp_017', 'kh_6a183864e1ef0', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-04 14:47:46', NULL, NULL, NULL),
('dg_6a183972905e2', 'sp_009', 'kh_6a183864e2115', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972909b2', 'sp_012', 'kh_6a183864e22de', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972919b4', 'sp_009', 'kh_6a183864e27a5', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a18397291e72', 'sp_002', 'kh_6a183864e297a', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a18397291f34', 'sp_009', 'kh_6a183864e297a', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a18397292995', 'sp_007', 'kh_6a183864e2dce', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-26 14:47:46', NULL, NULL, NULL),
('dg_6a18397292cf3', 'sp_018', 'kh_6a183864e2dce', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a1839729381c', 'sp_003', 'kh_6a183864e3037', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839729437e', 'sp_001', 'kh_6a183864e324c', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a18397294b8a', 'sp_011', 'kh_6a183864e340d', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a18397294e70', 'sp_004', 'kh_6a183864e340d', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a18397295dae', 'sp_003', 'kh_6a183864e378b', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a183972960a7', 'sp_019', 'kh_6a183864e378b', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-07 14:47:46', NULL, NULL, NULL),
('dg_6a18397296c7b', 'sp_014', 'kh_6a183864e397e', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839729748b', 'sp_011', 'kh_6a183864e3bd9', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-18 14:47:46', NULL, NULL, NULL),
('dg_6a18397297774', 'sp_020', 'kh_6a183864e3bd9', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a18397297e4e', 'sp_018', 'kh_6a183864e3f0d', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839729820b', 'sp_021', 'kh_6a183864e4124', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-29 14:47:46', NULL, NULL, NULL),
('dg_6a18397298f15', 'sp_016', 'kh_6a183864e448e', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-03 14:47:46', NULL, NULL, NULL),
('dg_6a18397299230', 'sp_022', 'kh_6a183864e448e', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-03-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397299822', 'sp_001', 'kh_6a183864e465e', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a18397299ae8', 'sp_020', 'kh_6a183864e465e', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a168', 'sp_017', 'kh_6a183864e480f', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a480', 'sp_007', 'kh_6a183864e4ad5', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a6c3', 'sp_009', 'kh_6a183864e4e7a', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a900', 'sp_008', 'kh_6a183864e51d8', NULL, 3, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a1839729afcf', 'sp_016', 'kh_6a183864e5616', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-14 14:47:46', NULL, NULL, NULL),
('dg_6a1839729b287', 'sp_019', 'kh_6a183864e5616', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839729b650', 'sp_010', 'kh_6a183864e5953', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a1839729c48c', 'sp_018', 'kh_6a183864e6652', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a1839729d2f9', 'sp_009', 'kh_6a183864e6ab3', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a1839729d5d9', 'sp_018', 'kh_6a183864e6ab3', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a1839729e869', 'sp_013', 'kh_6a183864e6fe0', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839729f9d2', 'sp_003', 'kh_6a183864e7437', NULL, 4, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-11 14:47:46', NULL, NULL, NULL),
('dg_6a1839729fcb0', 'sp_009', 'kh_6a183864e7437', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972a0cfd', 'sp_004', 'kh_6a183864e8000', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972a0de3', 'sp_005', 'kh_6a183864e8000', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972a1bca', 'sp_006', 'kh_6a183864e8353', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972a1eab', 'sp_018', 'kh_6a183864e8353', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972a2cbe', 'sp_012', 'kh_6a183864e86dc', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3256', 'sp_001', 'kh_6a183864e8aa9', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3531', 'sp_006', 'kh_6a183864e8aa9', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3bcd', 'sp_018', 'kh_6a183864e8eb1', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3ca6', 'sp_022', 'kh_6a183864e8eb1', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3f5e', 'sp_007', 'kh_6a183864e92f9', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972a4a76', 'sp_019', 'kh_6a183864e94fe', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972a592d', 'sp_011', 'kh_6a183864e97f6', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a183972a5d84', 'sp_013', 'kh_6a183864e9903', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a183972a6ba1', 'sp_017', 'kh_6a183864e9d20', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a183972a7b1c', 'sp_002', 'kh_6a183864e9ff4', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a183972a8193', 'sp_014', 'kh_6a183864ea37d', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a183972a8466', 'sp_015', 'kh_6a183864ea37d', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972a8ce9', 'sp_022', 'kh_6a183864ea6ff', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a183972a9028', 'sp_013', 'kh_6a183864eaa49', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-17 14:47:46', NULL, NULL, NULL),
('dg_6a183972a930a', 'sp_021', 'kh_6a183864eaa49', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972a9b5a', 'sp_009', 'kh_6a183864eae73', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-09 14:47:46', NULL, NULL, NULL),
('dg_6a183972a9e10', 'sp_017', 'kh_6a183864eae73', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972aaa4e', 'sp_005', 'kh_6a183864eb2bc', NULL, 3, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972ab842', 'sp_009', 'kh_6a183864eb497', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972abb1b', 'sp_014', 'kh_6a183864eb497', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a183972ac41e', 'sp_005', 'kh_6a183864eb77f', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-04 14:47:46', NULL, NULL, NULL),
('dg_6a183972ac500', 'sp_010', 'kh_6a183864eb77f', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972ad127', 'sp_019', 'kh_6a183864eba74', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a183972ad3cc', 'sp_021', 'kh_6a183864eba74', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a183972aeade', 'sp_006', 'kh_6a183864ebc34', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972aebb0', 'sp_020', 'kh_6a183864ebc34', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972af478', 'sp_007', 'kh_6a183864ebe1c', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b01e9', 'sp_004', 'kh_6a183864ebfd1', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972b0546', 'sp_019', 'kh_6a183864ebfd1', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b0d57', 'sp_012', 'kh_6a183864ec1a3', NULL, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a183972b0e78', 'sp_006', 'kh_6a183864ec1a3', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-17 14:47:46', NULL, NULL, NULL),
('dg_6a183972b1af3', 'sp_001', 'kh_6a183864eccd3', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a183972b2657', 'sp_013', 'kh_6a183864ed220', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-13 14:47:46', NULL, NULL, NULL),
('dg_6a183972b3144', 'sp_011', 'kh_6a183864ed3e0', NULL, 4, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a183972b3218', 'sp_002', 'kh_6a183864ed3e0', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972b3dd2', 'sp_014', 'kh_6a183864ed5b5', NULL, 3, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a183972b4efd', 'sp_006', 'kh_6a183864edb17', NULL, 4, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972b5f3e', 'sp_003', 'kh_6a183864ee308', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972b6294', 'sp_004', 'kh_6a183864ee308', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972b6999', 'sp_011', 'kh_6a183864ee45b', NULL, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972b6c60', 'sp_022', 'kh_6a183864ee640', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7122', 'sp_012', 'kh_6a183864ee93f', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a183972b71dc', 'sp_014', 'kh_6a183864ee93f', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7366', 'sp_017', 'kh_6a183864eeb01', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a183972b796f', 'sp_012', 'kh_6a183864eec20', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-14 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7a88', 'sp_002', 'kh_6a183864eec20', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7dbe', 'sp_011', 'kh_6a183864eedff', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7e7f', 'sp_005', 'kh_6a183864eedff', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a183972b944f', 'sp_003', 'kh_6a183864ef19f', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972ba2c3', 'sp_019', 'kh_6a183864ef344', NULL, 4, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a183972ba744', 'sp_012', 'kh_6a183864ef4e4', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a183972ba806', 'sp_013', 'kh_6a183864ef4e4', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a183972bac3c', 'sp_018', 'kh_6a183864ef658', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972bb513', 'sp_004', 'kh_6a183864ef83f', NULL, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a183972bb7e6', 'sp_020', 'kh_6a183864ef83f', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972bc347', 'sp_008', 'kh_6a183864efc56', NULL, 3, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a183972bc611', 'sp_014', 'kh_6a183864efc56', NULL, 3, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a183972bd459', 'sp_008', 'kh_6a183864efd8d', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-09 14:47:46', NULL, NULL, NULL),
('dg_6a183972be553', 'sp_001', 'kh_6a183864f03e3', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972be85b', 'sp_006', 'kh_6a183864f03e3', NULL, 3, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a183972bfb48', 'sp_020', 'kh_6a183864f08b4', NULL, 3, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972c0009', 'sp_003', 'kh_6a183864f09d1', NULL, 4, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972c02bc', 'sp_010', 'kh_6a183864f09d1', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972c089f', 'sp_001', 'kh_6a183864f0b91', NULL, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972c0b8f', 'sp_014', 'kh_6a183864f0b91', NULL, 3, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a183972c13a1', 'sp_004', 'kh_6a183864f0d2f', NULL, 3, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-07 14:47:46', NULL, NULL, NULL),
('dg_6a183972c1e45', 'sp_002', 'kh_6a183864f0f35', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-26 14:47:46', NULL, NULL, NULL),
('dg_6a183972c255b', 'sp_002', 'kh_6a183864f111f', NULL, 3, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972c262f', 'sp_009', 'kh_6a183864f111f', NULL, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972c28ce', 'sp_004', 'kh_6a183864f1566', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972c2c65', 'sp_018', 'kh_6a183864f1999', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-03-30 14:47:46', NULL, NULL, NULL),
('dg_6a183972c2d48', 'sp_021', 'kh_6a183864f1999', NULL, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-14 14:47:46', NULL, NULL, NULL),
('dg_6a183972c3d3c', 'sp_013', 'kh_6a183864f22c1', NULL, 4, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972c4178', 'sp_005', 'user_3', NULL, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972c427a', 'sp_021', 'user_3', NULL, 4, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL);

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
('cat_bot', 'Bột Xông Nhà', 'bot-xong-nha', '', '6a17cf235ca24_bot-xong-nha-tay-ue.jpg', 1, 'DM1779945251', 1, 'Menu chính', 0),
('cat_tramhuong', 'Trầm Hương và Nhang', 'tram-huong-va-nhang', '', '6a17cf6bc1ccd_tram-huong-nhang-tram-feature-2-2018.jpg', 1, 'DM1779945323', 3, 'Menu chính', 0),
('cat_tranghat', 'Tràng Hạt', 'trang-hat', '', '6a17cf4973dbc_03-1.jpg', 1, 'DM1779945289', 2, 'Menu chính', 0),
('cat_vongngoc', 'Vòng Ngọc', 'vong-ngoc', '', '6a17cf8a31376_pngtree-polished-green-jade-bangle-on-white-background-png-image_18500273.webp', 1, 'DM1779945354', 4, 'Menu chính', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc_bai_viet`
--

CREATE TABLE `danh_muc_bai_viet` (
  `id` varchar(36) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thu_tu` int(11) DEFAULT 0,
  `ngay_tao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc_bai_viet`
--

INSERT INTO `danh_muc_bai_viet` (`id`, `ten_danh_muc`, `slug`, `thu_tu`, `ngay_tao`) VALUES
('dm_6a1d5d9be7ff0', 'Kiến thức phong thủy', 'kien-thuc-phong-thuy', 1, '2026-06-01 17:23:23'),
('dm_6a1d5d9be8479', 'Chọn vòng theo mệnh', 'chon-vong-theo-menh', 2, '2026-06-01 17:23:23'),
('dm_6a1d5d9be8e1a', 'Ý nghĩa đá / ngọc', 'y-nghia-da-ngoc', 3, '2026-06-01 17:23:23'),
('dm_6a1d5d9be9003', 'Hướng dẫn bảo quản', 'huong-dan-bao-quan', 4, '2026-06-01 17:23:23'),
('dm_6a1d5d9be91f3', 'Tin tức ưu đãi', 'tin-tuc-uu-dai', 5, '2026-06-01 17:23:23');

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

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma_don_hang`, `id_nguoi_dung`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_giao_hang`, `ghi_chu`, `tong_tien`, `phi_ship`, `id_voucher`, `tien_giam_gia`, `thanh_tien`, `pt_thanh_toan`, `trang_thai_thanh_toan`, `trang_thai_don_hang`, `ngay_tao`) VALUES
('dh_6a1c160a073e1', 'DHA073EE', 'kh_6a183864f03e3', 'Dương Gia Lan', '0963741968', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', '', 0, 0, NULL, 0, 840000, 'Tiền mặt', 1, 3, '2026-05-31 18:05:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_thanh_vien`
--

CREATE TABLE `hang_thanh_vien` (
  `id` varchar(36) NOT NULL,
  `ten_hang` varchar(100) NOT NULL,
  `chi_tieu_toi_thieu` decimal(15,0) NOT NULL DEFAULT 0,
  `phan_tram_giam` decimal(5,2) NOT NULL DEFAULT 0.00,
  `icon` varchar(255) DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL,
  `dac_quyen` text DEFAULT NULL,
  `mau_sac` varchar(100) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 1,
  `danh_sach_voucher` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_thanh_vien`
--

INSERT INTO `hang_thanh_vien` (`id`, `ten_hang`, `chi_tieu_toi_thieu`, `phan_tram_giam`, `icon`, `mo_ta`, `dac_quyen`, `mau_sac`, `trang_thai`, `danh_sach_voucher`) VALUES
('rank_1', 'Đồng', 0, 0.00, 'mdi:medal-outline', 'Hạng cơ bản cho khách hàng mới', '[\"Voucher cơ bản\",\"Ưu đãi sinh nhật\",\"Theo dõi đơn hàng\"]', 'bg-gray-100 text-gray-700 border-gray-200', 1, '[\"SILVER2\"]'),
('rank_2', 'Bạc', 5000000, 5.00, 'mdi:medal', 'Hạng thân thiết dành cho khách mua thường xuyên', '[\"Giảm giá cao hơn\",\"Freeship định kỳ\",\"Nhận ưu đãi sớm\"]', 'bg-yellow-100 text-yellow-800 border-yellow-200', 1, '[\"GOLD5\"]'),
('rank_3', 'Vàng', 15000000, 10.00, 'mdi:star-circle', 'Hạng cao cấp dành cho khách hàng VIP', '[\"Giảm giá cao nhất\",\"Quà tặng đặc biệt\",\"Ưu tiên hỗ trợ\",\"Tư vấn chọn vòng riêng\"]', 'bg-red-100 text-[#6B0D18] border-red-200 shadow-sm', 1, '[\"DIAMOND10\",\"FREESHIPVIP\"]'),
('rank_4', 'Kim Cương', 50000000, 15.00, 'mdi:diamond', 'Hạng cao cấp dành cho khách hàng SVIP', '[]', 'bg-blue-100 text-blue-800 border-blue-200', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho_hang`
--

CREATE TABLE `kho_hang` (
  `id` char(36) NOT NULL,
  `ma_kho` varchar(50) NOT NULL,
  `ten_kho` varchar(200) NOT NULL,
  `loai_kho` enum('online','tong','cua_hang','loi') NOT NULL DEFAULT 'tong',
  `mo_ta` text DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `tinh_thanh` varchar(100) DEFAULT NULL,
  `quan_huyen` varchar(100) DEFAULT NULL,
  `phuong_xa` varchar(100) DEFAULT NULL,
  `id_nguoi_phu_trach` char(36) DEFAULT NULL,
  `mac_dinh` tinyint(1) NOT NULL DEFAULT 0,
  `cho_phep_ban` tinyint(1) NOT NULL DEFAULT 1,
  `cho_phep_chuyen` tinyint(1) NOT NULL DEFAULT 1,
  `cho_phep_kiem_ke` tinyint(1) NOT NULL DEFAULT 1,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Hoạt động, 2=Tạm ngừng, 0=Ngừng dùng',
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho_hang`
--

INSERT INTO `kho_hang` (`id`, `ma_kho`, `ten_kho`, `loai_kho`, `mo_ta`, `dia_chi`, `tinh_thanh`, `quan_huyen`, `phuong_xa`, `id_nguoi_phu_trach`, `mac_dinh`, `cho_phep_ban`, `cho_phep_chuyen`, `cho_phep_kiem_ke`, `trang_thai`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'KHO-TONG', 'Kho Tổng', 'tong', 'Kho lưu trữ tổng - mặc định cho hệ thống', '13 Ngô Quyền', 'TP HCM', 'Quận 5', 'Phường 11', NULL, 1, 1, 1, 1, 0, '2026-05-29 20:13:18', '2026-05-30 11:45:14'),
('d36a7902-5c1c-11f1-a6a6-088fc37729cd', 'KHO-HCM-TB', 'Kho Cửa hàng - Tân Bình', 'cua_hang', NULL, 'Quận Tân Bình', 'TP.HCM', NULL, NULL, NULL, 0, 1, 1, 1, 1, '2026-05-30 18:43:50', '2026-05-30 11:43:50'),
('d36b5bba-5c1c-11f1-a6a6-088fc37729cd', 'KHO-HCM-Q10', 'Kho Cửa hàng - Quận 10', 'cua_hang', NULL, 'Quận 10', 'TP.HCM', NULL, NULL, NULL, 0, 1, 1, 1, 1, '2026-05-30 18:43:50', '2026-05-30 11:43:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu_vuc_giao_hang`
--

CREATE TABLE `khu_vuc_giao_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `danh_sach_tinh` text DEFAULT NULL,
  `phi_tieu_chuan` int(11) DEFAULT 0,
  `phi_nhanh` int(11) DEFAULT 0,
  `freeship_tu` int(11) DEFAULT 0,
  `thoi_gian` varchar(50) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khu_vuc_giao_hang`
--

INSERT INTO `khu_vuc_giao_hang` (`id`, `ten`, `danh_sach_tinh`, `phi_tieu_chuan`, `phi_nhanh`, `freeship_tu`, `thoi_gian`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Nội thành TP HCM', 'Quận 1, Quận 2, Quận 3, Quận 4, Quận 5, Quận 6, Quận 7, Quận 8, Quận 9, Quận 10, Quận 11, Quận 12, Quân Tân Phú, Quận Tân Bình, Quận Bình Tân, Quận Bình Thạnh, Quận Gò Vấn', 20000, 35000, 500000, '1 - 2 ngày', 1, '2026-06-01 15:10:04', '2026-06-01 15:23:29'),
(2, 'Toàn quốc', 'Tất cả các tỉnh thành còn lại', 30000, 50000, 500000, '2 - 5 ngày', 1, '2026-06-01 15:10:04', '2026-06-01 15:10:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu_vuc_kho`
--

CREATE TABLE `khu_vuc_kho` (
  `id` char(36) NOT NULL,
  `id_kho` char(36) NOT NULL,
  `id_cha` char(36) DEFAULT NULL,
  `ma_vi_tri` varchar(50) NOT NULL,
  `ten_vi_tri` varchar(200) NOT NULL,
  `cap_do` enum('khu','ke','ngan') NOT NULL DEFAULT 'khu',
  `suc_chua` int(11) DEFAULT NULL COMMENT 'NULL = Không giới hạn',
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Hoạt động, 0=Ngừng',
  `ngay_tao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khu_vuc_kho`
--

INSERT INTO `khu_vuc_kho` (`id`, `id_kho`, `id_cha`, `ma_vi_tri`, `ten_vi_tri`, `cap_do`, `suc_chua`, `trang_thai`, `ngay_tao`) VALUES
('3fc9422f-5c1f-11f1-a6a6-088fc37729cd', 'd36b5bba-5c1c-11f1-a6a6-088fc37729cd', 'd36b74ab-5c1c-11f1-a6a6-088fc37729cd', 'Ke_B1', 'Kệ B1', 'ke', 2000, 1, '2026-05-30 19:01:10'),
('4d3fbd41-5c1f-11f1-a6a6-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'd36ad10a-5c1c-11f1-a6a6-088fc37729cd', 'KH-A3', 'Kệ A3', 'ke', 2000, 1, '2026-05-30 19:01:33'),
('d36ad10a-5c1c-11f1-a6a6-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', NULL, 'KV-A', 'Khu A', 'khu', 6000, 1, '2026-05-30 18:43:50'),
('d36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'd36ad10a-5c1c-11f1-a6a6-088fc37729cd', 'KE-A1', 'Kệ A1', 'ke', 2000, 1, '2026-05-30 18:43:50'),
('d36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'd36ad10a-5c1c-11f1-a6a6-088fc37729cd', 'KE-A2', 'Kệ A2', 'ke', 2000, 1, '2026-05-30 18:43:50'),
('d36b74ab-5c1c-11f1-a6a6-088fc37729cd', 'd36b5bba-5c1c-11f1-a6a6-088fc37729cd', NULL, 'KV-B', 'Khu B', 'khu', 4000, 1, '2026-05-30 18:43:50'),
('d36b781f-5c1c-11f1-a6a6-088fc37729cd', 'd36b5bba-5c1c-11f1-a6a6-088fc37729cd', 'd36b74ab-5c1c-11f1-a6a6-088fc37729cd', 'KE-B2', 'Kệ B2', 'ke', 2000, 1, '2026-05-30 18:43:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_kiem_ke`
--

CREATE TABLE `lich_kiem_ke` (
  `id` int(11) NOT NULL,
  `ten_lich` varchar(255) NOT NULL,
  `id_kho` varchar(36) NOT NULL,
  `pham_vi` varchar(255) NOT NULL COMMENT 'toan_kho hoặc chuỗi json chứa id nhóm',
  `chu_ky` varchar(100) NOT NULL COMMENT 'hang_ngay, hang_tuan, hang_thang',
  `thoi_gian_tao` varchar(50) NOT NULL COMMENT 'Tạo vào thứ mấy hoặc ngày nào',
  `nhac_truoc_ngay` int(11) NOT NULL DEFAULT 1,
  `id_nguoi_thuc_hien` varchar(36) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Kích hoạt, 0: Tắt',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('ld_1', 'LD001', 'Mã Não', 'Agate', 'ma-nao', 'Đá bán quý', 'Đỏ, Cam, Đen', '#DC2626', 'Mang lại sự cân bằng, bảo vệ...', '[\"Bình an\"]', '6a17cfa7e4f38_da-ma-nao.jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:16:23'),
('ld_2', 'LD002', 'San Hô', 'Coral', 'san-ho', 'Đá bán quý', 'Đỏ, Trắng', '#EF4444', 'Biểu tượng của sự sống, xua đuổi tà ma...', '[\"Sức khỏe\"]', '6a17cfe4a6c0c_da-san-ho-la-gi_2_.jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:17:24'),
('ld_3', 'LD003', 'Hồng Anh Đào', 'Cherry Blossom Agate', 'hong-anh-dao', 'Đá bán quý', 'Hồng nhạt', '#F472B6', 'Giúp tâm hồn thư thái, thu hút tình duyên...', '[\"Tình duyên\"]', '6a17d00fb804c_images (1).jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:18:07'),
('ld_4', 'LD004', 'Ngọc Mực Dục', 'Ink Jade', 'ngoc-muc-duc', 'Ngọc', 'Đen tuyền', '#1F2937', 'Sự huyền bí, quyền lực và bảo vệ...', '[\"Công danh\"]', '6a17d02455697_510-4D6EAcL._AC_UY300_.jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:18:28'),
('ld_5', 'LD005', 'Ngọc Tụ Nham', 'Xiuyan Jade', 'ngoc-tu-nham', 'Ngọc', 'Xanh lục nhạt', '#6EE7B7', 'Tượng trưng cho sự thanh tao, may mắn...', '[\"May mắn\"]', '6a17d03921f52_images (2).jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:18:49'),
('ld_6', 'LD006', 'Thạch Anh Tóc Vàng', 'Golden Rutilated Quartz', 'thach-anh-toc-vang', 'Đá bán quý', 'Vàng', '#FBBF24', 'Thu hút tài lộc, thịnh vượng...', '[\"Tài lộc\"]', '6a17d0569a7c5_images (3).jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:19:18'),
('ld_7', 'LD007', 'Ngọc Bích', 'Nephrite', 'ngoc-bich', 'Ngọc', 'Xanh ngọc', '#10B981', 'Mang lại bình an, trường thọ...', '[\"Bình an\"]', '6a17d07d21fa2_images (4).jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:19:57'),
('ld_8', 'LD008', 'Trầm Hương', 'Agarwood', 'tram-huong', 'Khác', 'Nâu sẫm', '#78350F', 'Hương thơm xua đuổi tà khí, tĩnh tâm...', '[\"Sức khỏe\"]', '6a17d0a6c36e0_images (5).jpg', 1, 0, '2026-05-28 11:57:38', '2026-05-28 12:20:38');

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
('ld_1', 'menh_4'),
('ld_1', 'menh_5'),
('ld_2', 'menh_4'),
('ld_2', 'menh_5'),
('ld_3', 'menh_4'),
('ld_4', 'menh_2'),
('ld_4', 'menh_3'),
('ld_5', 'menh_2'),
('ld_5', 'menh_4'),
('ld_6', 'menh_1'),
('ld_6', 'menh_5'),
('ld_7', 'menh_2'),
('ld_7', 'menh_4'),
('ld_8', 'menh_2'),
('ld_8', 'menh_4');

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
('menh_1', 'Kim', 'kim', 'Sự cứng rắn, sắc bén, độc đoán', 'Thổ', 'Hỏa', 'Trắng, Xám, Ghi, Vàng, Nâu Đất', 'Mệnh Kim tượng trưng cho kim loại...', '#9CA3AF', 'Đỏ, Hồng, Tím, Cam', '[{\"nam\":\"1992\",\"can_chi\":\"Nhâm Thân\"},{\"nam\":\"1993\",\"can_chi\":\"Quý Dậu\"},{\"nam\":\"2000\",\"can_chi\":\"Canh Thìn\"},{\"nam\":\"2001\",\"can_chi\":\"Tân Tỵ\"},{\"nam\":\"1984\",\"can_chi\":\"Giáp Tý\"},{\"nam\":\"1985\",\"can_chi\":\"Ất Sửu\"}]', '[\"Công danh\",\"Tài lộc\"]', NULL, NULL, 1, '2026-05-28 12:15:11', NULL),
('menh_2', 'Mộc', 'moc', 'Sự sinh sôi, phát triển, mềm dẻo', 'Thủy', 'Kim', 'Xanh Lá Cây, Đen, Xanh Nước Biển', 'Mệnh Mộc tượng trưng cho mùa xuân...', '#10B981', 'Trắng, Xám, Ghi, Bạc', '[{\"nam\":\"1988\",\"can_chi\":\"Mậu Thìn\"},{\"nam\":\"1989\",\"can_chi\":\"Kỷ Tỵ\"},{\"nam\":\"2002\",\"can_chi\":\"Nhâm Ngọ\"},{\"nam\":\"2003\",\"can_chi\":\"Quý Mùi\"},{\"nam\":\"1980\",\"can_chi\":\"Canh Thân\"},{\"nam\":\"1981\",\"can_chi\":\"Tân Dậu\"}]', '[\"Sức khỏe\",\"Bình an\"]', NULL, NULL, 1, '2026-05-28 12:15:11', NULL),
('menh_3', 'Thủy', 'thuy', 'Sự mềm mại, uyển chuyển, linh hoạt', 'Kim', 'Thổ', 'Đen, Xanh Nước Biển, Trắng, Xám, Ghi', 'Mệnh Thủy tượng trưng cho nước...', '#3B82F6', 'Vàng, Nâu Đất, Đỏ', '[{\"nam\":\"1996\",\"can_chi\":\"Bính Tý\"},{\"nam\":\"1997\",\"can_chi\":\"Đinh Sửu\"},{\"nam\":\"2004\",\"can_chi\":\"Giáp Thân\"},{\"nam\":\"2005\",\"can_chi\":\"Ất Dậu\"},{\"nam\":\"1982\",\"can_chi\":\"Nhâm Tuất\"},{\"nam\":\"1983\",\"can_chi\":\"Quý Hợi\"}]', '[\"Giao tiếp\",\"Tài lộc\"]', NULL, NULL, 1, '2026-05-28 12:15:11', NULL),
('menh_4', 'Hỏa', 'hoa', 'Sự nhiệt huyết, năng lượng, bùng nổ', 'Mộc', 'Thủy', 'Đỏ, Hồng, Tím, Xanh Lá Cây', 'Mệnh Hỏa tượng trưng cho ngọn lửa...', '#EF4444', 'Đen, Xanh Nước Biển', '[{\"nam\":\"1986\",\"can_chi\":\"Bính Dần\"},{\"nam\":\"1987\",\"can_chi\":\"Đinh Mão\"},{\"nam\":\"1994\",\"can_chi\":\"Giáp Tuất\"},{\"nam\":\"1995\",\"can_chi\":\"Ất Hợi\"},{\"nam\":\"2008\",\"can_chi\":\"Mậu Tý\"},{\"nam\":\"2009\",\"can_chi\":\"Kỷ Sửu\"}]', '[\"Tình duyên\",\"Sáng tạo\"]', NULL, NULL, 1, '2026-05-28 12:15:11', NULL),
('menh_5', 'Thổ', 'tho', 'Sự vững chắc, bao dung, kiên nhẫn', 'Hỏa', 'Mộc', 'Vàng, Nâu Đất, Đỏ, Hồng, Tím', 'Mệnh Thổ tượng trưng cho đất...', '#D97706', 'Xanh Lá Cây, Xanh Lục', '[{\"nam\":\"1990\",\"can_chi\":\"Canh Ngọ\"},{\"nam\":\"1991\",\"can_chi\":\"Tân Mùi\"},{\"nam\":\"1998\",\"can_chi\":\"Mậu Dần\"},{\"nam\":\"1999\",\"can_chi\":\"Kỷ Mão\"},{\"nam\":\"2006\",\"can_chi\":\"Bính Tuất\"},{\"nam\":\"2007\",\"can_chi\":\"Đinh Hợi\"}]', '[\"Bình an\",\"Gia đạo\"]', NULL, NULL, 1, '2026-05-28 12:15:11', NULL);

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
  `gioi_tinh` varchar(20) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `nam_sinh` int(11) DEFAULT NULL,
  `id_menh` varchar(36) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ghi_chu_vip` text DEFAULT NULL,
  `tong_chi_tieu` decimal(15,0) NOT NULL DEFAULT 0,
  `diem_thuong` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hoạt động, 0: Khóa',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `diem_tich_luy` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `id_vai_tro`, `id_hang_thanh_vien`, `ma_nd`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `nam_sinh`, `id_menh`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`, `ghi_chu_vip`, `tong_chi_tieu`, `diem_thuong`, `trang_thai`, `ngay_tao`, `deleted_at`, `diem_tich_luy`) VALUES
('5e4d964ac24fe1e1abba8a377b6788ee', NULL, NULL, 'KH986998', 'cường', NULL, NULL, NULL, NULL, 'thanhhailop11a6@gmail.com', '$2y$10$fWTC043fqCc.tT7JKLU1y.2X9ouBUWR0.kgqXNnRrivoykxfDquwq', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-06-02 12:24:14', NULL, 0),
('ba467f83493062c5b15e72da52ac47fc', NULL, NULL, 'KH986997', 'Hai', NULL, NULL, NULL, NULL, 'thanhhai81004@gmail.com', '$2y$10$P4OFb2ZeOAq4wHOhurADjuAzNhrzM2uE9EW6wqfBENsAXduh6Stje', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-06-02 12:21:17', NULL, 0),
('kh_6a17dc271eecd', NULL, 'rank_1', 'KHEED0', 'test', 'nam', NULL, 2004, 'menh_3', 'admin1234@example.com', '$2y$10$.CsVhEUwIknhOWXemM9deekc9dGPrRS4nkBQZDq4mLBt.L3DwuPji', '0898675436', '789 Trần Hưng Đạo, Quận 1, TP.HCM', '/uploads/users/kh_6a17dc271eecd.jpeg', '', 0, 0, 1, '2026-05-28 13:09:43', '2026-05-28 19:42:27', 0),
('kh_6a17dc6aac40c', NULL, 'rank_1', 'KHC40F', 'tdsdgds', 'nam', '1995-06-16', 1995, 'menh_4', '235235@gmail.com', '$2y$10$3/Jh6nWeTkWZ27.ofu3/Ce2hNxO7JliNHrtcMZOYWI0Py/mFgAEpm', '09876353', '12 Võ Văn Kiệt, Cần Thơ', '/uploads/users/kh_6a17dc6aac40c.jpeg', '', 0, 0, 1, '2026-05-28 13:10:50', '2026-05-28 19:42:17', 0),
('kh_6a183864cecd3', NULL, 'rank_1', 'KH63511E', 'Nguyễn Xuân Linh', 'Nữ', '2003-03-01', 2003, NULL, '9936@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0984470724', '45 Lê Duẩn, Hà Nội', NULL, NULL, 3382658, 0, 1, '2025-09-04 14:43:16', NULL, 0),
('kh_6a183864cfc64', NULL, 'rank_1', 'KH4E7B2E', 'Võ Gia Vinh', 'Nữ', '1996-08-20', 1996, NULL, 'vogiavinh4902@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0969559443', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4245178, 0, 1, '2025-06-08 14:43:16', NULL, 0),
('kh_6a183864d0640', NULL, 'rank_1', 'KHFAD19F', 'Phan Đức Khánh', 'Nam', '1970-11-06', 1970, NULL, '1548@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0978772656', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2026-04-20 14:43:16', NULL, 0),
('kh_6a183864d097f', NULL, 'rank_1', 'KH1358F0', 'Huỳnh Đức Dũng', 'Nam', '1984-09-20', 1984, NULL, '7689@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0931171040', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2864973, 0, 1, '2026-03-20 14:43:16', NULL, 0),
('kh_6a183864d0cf7', NULL, 'rank_1', 'KHF35579', 'Đặng Minh Vinh', 'Khác', '1981-08-27', 1981, NULL, '2586@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0962417692', '34 Hai Bà Trưng, Huế', NULL, NULL, 2152460, 0, 1, '2026-04-06 14:43:16', NULL, 0),
('kh_6a183864d1037', NULL, 'rank_1', 'KH475D44', 'Võ Đức Dũng', 'Nữ', '2005-02-08', 2005, NULL, '9868@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0918154900', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 4358309, 0, 1, '2026-05-25 14:43:16', NULL, 0),
('kh_6a183864d141b', NULL, 'rank_1', 'KH094853', 'Phạm Hữu Bình', 'Khác', '1986-07-11', 1986, NULL, '6203@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0999267027', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-03-03 14:43:16', NULL, 0),
('kh_6a183864d1780', NULL, 'rank_1', 'KH331C0B', 'Trần Thanh Anh', 'Nam', '1993-07-27', 1993, NULL, '7045@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0928495551', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4429586, 0, 1, '2025-08-27 14:43:16', NULL, 0),
('kh_6a183864d1a95', NULL, 'rank_1', 'KH5A1BAA', 'Nguyễn Văn Quỳnh', 'Nữ', '1996-10-21', 1996, NULL, '1115@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916825106', '34 Hai Bà Trưng, Huế', NULL, NULL, 3585561, 0, 1, '2026-04-06 14:43:16', NULL, 0),
('kh_6a183864d1d81', NULL, 'rank_1', 'KH96D064', 'Nguyễn Gia Phương', 'Nữ', '2004-08-20', 2004, NULL, '8984@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0949781504', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-01-01 14:43:16', NULL, 0),
('kh_6a183864d2043', NULL, 'rank_2', 'KH27376C', 'Bùi Hữu Giang', 'Nữ', '2000-06-13', 2000, NULL, '2680@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0999757491', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 6170738, 0, 1, '2026-05-26 14:43:16', NULL, 0),
('kh_6a183864d239a', NULL, 'rank_1', 'KH893C39', 'Phan Quang Phương', 'Nữ', '1976-01-16', 1976, NULL, '345@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915714647', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 961599, 0, 1, '2025-12-29 14:43:16', NULL, 0),
('kh_6a183864d2686', NULL, 'rank_1', 'KH3C98BC', 'Lê Tuấn Anh', 'Khác', '1982-08-13', 1982, NULL, '2301@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0990081719', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-07-15 14:43:16', NULL, 0),
('kh_6a183864d2994', NULL, 'rank_1', 'KHD9F637', 'Đặng Thanh Mai', 'Nữ', '1995-02-05', 1995, NULL, '5213@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0985835832', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 418698, 0, 1, '2025-08-11 14:43:16', NULL, 0),
('kh_6a183864d2c59', NULL, 'rank_1', 'KHB3D92E', 'Phạm Thu Anh', 'Nữ', '1988-06-05', 1988, NULL, '5585@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0994866399', '45 Lê Duẩn, Hà Nội', NULL, NULL, 2936248, 0, 1, '2025-08-30 14:43:16', NULL, 0),
('kh_6a183864d3095', NULL, 'rank_1', 'KH008C6E', 'Ngô Đức Em', 'Khác', '1979-11-15', 1979, NULL, '5834@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0938640848', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4958944, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864d3388', NULL, 'rank_1', 'KHA4ADE1', 'Lý Tuấn Oanh', 'Nam', '1994-03-17', 1994, NULL, '2821@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0921022400', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2987663, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864d366c', NULL, 'rank_1', 'KHD9553D', 'Hoàng Minh Khánh', 'Khác', '1979-01-24', 1979, NULL, 'hoangminhkhanh4279@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0971416792', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-03-19 14:43:16', NULL, 0),
('kh_6a183864d38a6', NULL, 'rank_1', 'KH6E85AF', 'Dương Thị Yến', 'Khác', '2005-12-01', 2005, NULL, '615@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0913792721', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 519874, 0, 1, '2025-06-29 14:43:16', NULL, 0),
('kh_6a183864d3b7c', NULL, 'rank_1', 'KHF44557', 'Lê Xuân Bình', 'Nữ', '1999-04-09', 1999, NULL, 'lexuanbinh9834@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0936940457', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-05-19 14:43:16', NULL, 0),
('kh_6a183864d3df0', NULL, 'rank_1', 'KH6A3140', 'Hoàng Văn Giang', 'Khác', '1978-12-10', 1978, NULL, 'hoangvangiang8008@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0922977234', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 452099, 0, 1, '2025-09-29 14:43:16', NULL, 0),
('kh_6a183864d404e', NULL, 'rank_1', 'KHB1613E', 'Phan Minh Yến', 'Nữ', '1978-11-28', 1978, NULL, '6646@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916319167', '45 Lê Duẩn, Hà Nội', NULL, NULL, 2235127, 0, 1, '2026-01-08 14:43:16', NULL, 0),
('kh_6a183864d4360', NULL, 'rank_1', 'KH0A5463', 'Lý Hải Nam', 'Nam', '1983-02-16', 1983, NULL, '1380@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0938599736', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3447958, 0, 1, '2026-01-26 14:43:16', NULL, 0),
('kh_6a183864d461b', NULL, 'rank_1', 'KH02ECDA', 'Trần Hữu Uyên', 'Nam', '1978-07-17', 1978, NULL, '3705@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0992394513', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4123409, 0, 1, '2025-10-30 14:43:16', NULL, 0),
('kh_6a183864d49e4', NULL, 'rank_1', 'KH73E48E', 'Vũ Minh Uyên', 'Nam', '1983-10-12', 1983, NULL, 'vuminhuyen1386@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0924403854', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2963948, 0, 1, '2026-02-07 14:43:16', NULL, 0),
('kh_6a183864d4c48', NULL, 'rank_1', 'KHA9331E', 'Vũ Gia Anh', 'Khác', '1998-01-02', 1998, NULL, 'vugiaanh4993@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0951277788', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-12-02 14:43:16', NULL, 0),
('kh_6a183864d4e56', NULL, 'rank_1', 'KHEE1687', 'Lý Mạnh Bình', 'Nữ', '1983-03-05', 1983, NULL, '5551@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0947527059', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-01-20 14:43:16', NULL, 0),
('kh_6a183864d5370', NULL, 'rank_1', 'KH406689', 'Phan Thanh Anh', 'Nam', '1970-01-20', 1970, NULL, 'phanthanhanh1413@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0949199459', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-09-13 14:43:16', NULL, 0),
('kh_6a183864d56f6', NULL, 'rank_1', 'KH8EA701', 'Phạm Tuấn Dũng', 'Khác', '1984-06-18', 1984, NULL, '1990@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0911552904', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-11-30 14:43:16', NULL, 0),
('kh_6a183864d5b61', NULL, 'rank_1', 'KH33D66A', 'Lý Đức Dũng', 'Nam', '1997-05-14', 1997, NULL, '3516@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0982791888', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-11-02 14:43:16', NULL, 0),
('kh_6a183864d5f72', NULL, 'rank_1', 'KH1B89EC', 'Lý Ngọc Linh', 'Khác', '1994-11-23', 1994, NULL, '8785@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0932397062', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4005261, 0, 1, '2025-11-16 14:43:16', NULL, 0),
('kh_6a183864d62a5', NULL, 'rank_1', 'KH2D97CF', 'Đặng Thu Yến', 'Khác', '2002-06-10', 2002, NULL, '2456@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0980251088', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1821240, 0, 1, '2026-05-04 14:43:16', NULL, 0),
('kh_6a183864d6660', NULL, 'rank_1', 'KH5A5456', 'Hồ Minh Khánh', 'Nữ', '1975-08-20', 1975, NULL, '6280@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0927339467', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 4630497, 0, 1, '2025-12-13 14:43:16', NULL, 0),
('kh_6a183864d6a51', NULL, 'rank_1', 'KH340D22', 'Huỳnh Thanh Anh', 'Nữ', '1994-09-13', 1994, NULL, 'huynhthanhanh5308@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0934346264', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864d6c49', NULL, 'rank_1', 'KHD602B2', 'Đặng Thị Em', 'Nữ', '1996-12-08', 1996, NULL, '7516@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0968586968', '34 Hai Bà Trưng, Huế', NULL, NULL, 3143878, 0, 1, '2025-10-14 14:43:16', NULL, 0),
('kh_6a183864d7fc1', NULL, 'rank_1', 'KH7D19F8', 'Lê Gia Anh', 'Khác', '1978-11-26', 1978, NULL, 'legiaanh4369@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0938570706', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4452028, 0, 1, '2025-11-10 14:43:16', NULL, 0),
('kh_6a183864d8470', NULL, 'rank_1', 'KHAF5957', 'Đỗ Hải Mai', 'Khác', '1998-08-06', 1998, NULL, '2807@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0937624495', '34 Hai Bà Trưng, Huế', NULL, NULL, 2688434, 0, 1, '2025-10-24 14:43:16', NULL, 0),
('kh_6a183864d8938', NULL, 'rank_1', 'KH8052A0', 'Vũ Mạnh Nam', 'Nam', '1986-07-12', 1986, NULL, '7009@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0980483971', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1093295, 0, 1, '2025-11-26 14:43:16', NULL, 0),
('kh_6a183864d8da8', NULL, 'rank_1', 'KH9268B3', 'Dương Quang Dũng', 'Nam', '1993-09-04', 1993, NULL, '1857@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0988874929', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 1090937, 0, 1, '2025-09-19 14:43:16', NULL, 0),
('kh_6a183864d9216', NULL, 'rank_1', 'KH2A97C3', 'Võ Thị Nam', 'Khác', '1982-10-11', 1982, NULL, '1708@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0992454223', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 4750567, 0, 1, '2025-07-26 14:43:16', NULL, 0),
('kh_6a183864d9674', NULL, 'rank_1', 'KH179B21', 'Trần Hữu Lan', 'Nữ', '1990-02-12', 1990, NULL, '9930@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0947837325', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4414524, 0, 1, '2025-09-10 14:43:16', NULL, 0),
('kh_6a183864d9b06', NULL, 'rank_1', 'KHEFD174', 'Hồ Gia Trang', 'Nữ', '1991-08-28', 1991, NULL, '1169@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0936314809', '34 Hai Bà Trưng, Huế', NULL, NULL, 1896164, 0, 1, '2026-05-05 14:43:16', NULL, 0),
('kh_6a183864da034', NULL, 'rank_1', 'KHC010E3', 'Ngô Mạnh Em', 'Nữ', '1986-04-23', 1986, NULL, '1319@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0960858674', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 1379438, 0, 1, '2025-09-25 14:43:16', NULL, 0),
('kh_6a183864da4a6', NULL, 'rank_1', 'KHEDE5FC', 'Lê Gia Vinh', 'Nam', '2005-05-04', 2005, NULL, 'legiavinh4405@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0989228781', '34 Hai Bà Trưng, Huế', NULL, NULL, 4500776, 0, 1, '2025-07-25 14:43:16', NULL, 0),
('kh_6a183864da863', NULL, 'rank_1', 'KHB159BB', 'Phạm Mạnh Uyên', 'Nữ', '1973-05-05', 1973, NULL, '4625@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0918308088', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 571191, 0, 1, '2026-05-12 14:43:16', NULL, 0),
('kh_6a183864daccb', NULL, 'rank_1', 'KHBB0166', 'Bùi Mạnh Lan', 'Nam', '1992-11-04', 1992, NULL, '9430@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916455118', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-04-28 14:43:16', NULL, 0),
('kh_6a183864daf6b', NULL, 'rank_1', 'KHDC6BAB', 'Lý Xuân Phúc', 'Nữ', '1978-04-19', 1978, NULL, 'lyxuanphuc9723@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0935677669', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2026-01-10 14:43:16', NULL, 0),
('kh_6a183864db0c9', NULL, 'rank_1', 'KHD8A591', 'Dương Thị Lan', 'Nữ', '1991-05-17', 1991, NULL, '9990@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0938080761', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-09-19 14:43:16', NULL, 0),
('kh_6a183864db37e', NULL, 'rank_1', 'KH7CB893', 'Phan Minh Anh', 'Nam', '1995-08-18', 1995, NULL, 'phanminhanh7359@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0940263563', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3550125, 0, 1, '2025-09-01 14:43:16', NULL, 0),
('kh_6a183864db59a', NULL, 'rank_1', 'KH588568', 'Bùi Minh Bình', 'Khác', '1998-04-27', 1998, NULL, 'buiminhbinh4621@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0978148710', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4677050, 0, 1, '2025-08-10 14:43:16', NULL, 0),
('kh_6a183864db7a4', NULL, 'rank_1', 'KHEB30A3', 'Hồ Gia Phúc', 'Khác', '2005-09-01', 2005, NULL, '2523@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915965408', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 3546226, 0, 1, '2025-06-04 14:43:16', NULL, 0),
('kh_6a183864dba87', NULL, 'rank_1', 'KH618739', 'Dương Thanh Dũng', 'Khác', '1994-08-26', 1994, NULL, '168@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0968105924', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-10-24 14:43:16', NULL, 0),
('kh_6a183864dbc65', NULL, 'rank_1', 'KH065AED', 'Hồ Thu Dũng', 'Nữ', '1986-03-27', 1986, NULL, '603@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0980263755', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-05-29 14:43:16', NULL, 0),
('kh_6a183864dbed9', NULL, 'rank_1', 'KHE489E3', 'Dương Văn Cường', 'Khác', '2001-01-17', 2001, NULL, '2020@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0917852699', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2765008, 0, 1, '2025-07-28 14:43:16', NULL, 0),
('kh_6a183864dc124', NULL, 'rank_1', 'KHBAB8C3', 'Bùi Thu Nam', 'Khác', '1993-02-21', 1993, NULL, 'buithunam7294@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0994291498', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 182330, 0, 1, '2025-10-01 14:43:16', NULL, 0),
('kh_6a183864dc2ce', NULL, 'rank_1', 'KH4B6442', 'Hoàng Ngọc Cường', 'Nam', '2000-08-06', 2000, NULL, '3988@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0966849918', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-01-26 14:43:16', NULL, 0),
('kh_6a183864dc515', NULL, 'rank_1', 'KH5B3562', 'Vũ Thu Phúc', 'Nam', '1978-05-19', 1978, NULL, 'vuthuphuc1338@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0935057358', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4564380, 0, 1, '2026-01-28 14:43:16', NULL, 0),
('kh_6a183864dc8e2', NULL, 'rank_1', 'KH4CEB48', 'Hoàng Quang Phúc', 'Khác', '1996-02-03', 1996, NULL, 'hoangquangphuc3195@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0932816048', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 4524109, 0, 1, '2025-11-25 14:43:16', NULL, 0),
('kh_6a183864dcc8c', NULL, 'rank_1', 'KHFF285D', 'Phạm Hữu Uyên', 'Nam', '1970-06-07', 1970, NULL, '5260@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0968571452', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-08-08 14:43:16', NULL, 0),
('kh_6a183864dcf8e', NULL, 'rank_1', 'KHD3459E', 'Võ Tuấn Vinh', 'Nam', '1982-04-11', 1982, NULL, '6187@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0960414667', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-01-02 14:43:16', NULL, 0),
('kh_6a183864dd2b1', NULL, 'rank_1', 'KH7A96A4', 'Vũ Tuấn Cường', 'Khác', '1988-07-18', 1988, NULL, '8820@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0972090248', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-06-17 14:43:16', NULL, 0),
('kh_6a183864dd502', NULL, 'rank_1', 'KH9FCC46', 'Phan Văn Dũng', 'Nữ', '1996-11-12', 1996, NULL, 'phanvandung5895@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0942763863', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 243513, 0, 0, '2025-06-23 14:43:16', NULL, 0),
('kh_6a183864dd6ee', NULL, 'rank_1', 'KH3899BC', 'Trần Hải Uyên', 'Khác', '1979-01-16', 1979, NULL, '9833@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0992988946', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 1831029, 0, 1, '2026-01-10 14:43:16', NULL, 0),
('kh_6a183864dd94e', NULL, 'rank_1', 'KH6F1D87', 'Hoàng Quang Quỳnh', 'Nữ', '2000-05-27', 2000, NULL, 'hoangquangquynh7092@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0934723715', '34 Hai Bà Trưng, Huế', NULL, NULL, 1984253, 0, 1, '2025-10-27 14:43:16', NULL, 0),
('kh_6a183864ddaee', NULL, 'rank_1', 'KH76A5C4', 'Lê Thu Trang', 'Nữ', '1976-06-10', 1976, NULL, 'lethutrang1043@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0940495368', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-10-08 14:43:16', NULL, 0),
('kh_6a183864ddc67', NULL, 'rank_1', 'KHA823A6', 'Hồ Thanh Mai', 'Khác', '1975-10-03', 1975, NULL, '7708@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0928888700', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-11-27 14:43:16', NULL, 0),
('kh_6a183864ddec8', NULL, 'rank_1', 'KH241195', 'Phạm Văn Bình', 'Nam', '1979-06-01', 1979, NULL, '2679@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0979937999', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 1088938, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864de10e', NULL, 'rank_1', 'KH41F355', 'Phan Thị Trang', 'Khác', '2003-04-13', 2003, NULL, '9748@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0932750969', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-07-14 14:43:16', NULL, 0),
('kh_6a183864de4c6', NULL, 'rank_1', 'KHD153C5', 'Lê Gia Anh', 'Nam', '1997-10-15', 1997, NULL, 'legiaanh7077@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0930860383', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-05-13 14:43:16', NULL, 0),
('kh_6a183864de67d', NULL, 'rank_1', 'KHA66252', 'Ngô Tuấn Giang', 'Khác', '2000-03-06', 2000, NULL, '1547@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0913404799', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-09-19 14:43:16', NULL, 0),
('kh_6a183864de904', NULL, 'rank_1', 'KH2C3E65', 'Huỳnh Thu Sơn', 'Khác', '1986-11-06', 1986, NULL, '5366@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0968837903', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-02-03 14:43:16', NULL, 0),
('kh_6a183864dec9f', NULL, 'rank_1', 'KHC9947E', 'Lê Đức Quỳnh', 'Khác', '1988-09-03', 1988, NULL, '468@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0990114351', '34 Hai Bà Trưng, Huế', NULL, NULL, 1628764, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864defa6', NULL, 'rank_1', 'KH70FF7E', 'Lê Xuân Oanh', 'Nữ', '1990-03-12', 1990, NULL, 'lexuanoanh1120@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0966078966', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2220734, 0, 0, '2025-09-20 14:43:16', NULL, 0),
('kh_6a183864df195', NULL, 'rank_1', 'KHCC2E9C', 'Phan Xuân Vinh', 'Nam', '1997-11-25', 1997, NULL, 'phanxuanvinh5781@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0927244534', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-07-22 14:43:16', NULL, 0),
('kh_6a183864df364', NULL, 'rank_1', 'KH73163D', 'Phạm Thanh Linh', 'Nam', '1990-06-24', 1990, NULL, '2623@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0927272153', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 3703209, 0, 1, '2026-01-12 14:43:16', NULL, 0),
('kh_6a183864df8e1', NULL, 'rank_1', 'KH8516C3', 'Dương Thị Sơn', 'Nữ', '1975-07-24', 1975, NULL, '1719@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0926834960', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 4660249, 0, 1, '2025-07-22 14:43:16', NULL, 0),
('kh_6a183864dfb1f', NULL, 'rank_1', 'KHDA76AA', 'Huỳnh Hữu Lan', 'Nam', '1991-04-08', 1991, NULL, '1550@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0950574910', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 348149, 0, 1, '2026-01-08 14:43:16', NULL, 0),
('kh_6a183864dfd42', NULL, 'rank_1', 'KHF95AB8', 'Phạm Gia Bình', 'Nữ', '1996-03-22', 1996, NULL, '268@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0969498804', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 669934, 0, 1, '2026-04-04 14:43:16', NULL, 0),
('kh_6a183864dff7a', NULL, 'rank_1', 'KH056223', 'Huỳnh Mạnh Phương', 'Nữ', '1995-01-16', 1995, NULL, '5263@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0937181432', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-12-12 14:43:16', NULL, 0),
('kh_6a183864e01ed', NULL, 'rank_1', 'KH5F67E2', 'Lê Hữu Sơn', 'Khác', '1981-05-28', 1981, NULL, '9015@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915913407', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2198156, 0, 1, '2026-04-22 14:43:16', NULL, 0),
('kh_6a183864e04e7', NULL, 'rank_1', 'KHFAADC4', 'Hoàng Quang Oanh', 'Khác', '1974-07-10', 1974, NULL, 'hoangquangoanh9286@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0976244456', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4661020, 0, 1, '2026-05-19 14:43:16', NULL, 0),
('kh_6a183864e06e7', NULL, 'rank_1', 'KHE0142B', 'Ngô Gia Khánh', 'Nam', '2000-10-18', 2000, NULL, 'ngogiakhanh4590@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0921872101', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2353299, 0, 1, '2025-10-17 14:43:16', NULL, 0),
('kh_6a183864e08d6', NULL, 'rank_1', 'KHAEBDE9', 'Huỳnh Thu Phúc', 'Nữ', '1983-08-26', 1983, NULL, 'huynhthuphuc7254@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0977899571', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 2937410, 0, 1, '2026-02-06 14:43:16', NULL, 0),
('kh_6a183864e0c66', NULL, 'rank_1', 'KHFC3C27', 'Phạm Thu Em', 'Nam', '1997-05-09', 1997, NULL, '861@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916627942', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 3667123, 0, 1, '2026-04-11 14:43:16', NULL, 0),
('kh_6a183864e0f3c', NULL, 'rank_1', 'KHCDC1EC', 'Đỗ Hải Anh', 'Nữ', '1999-04-11', 1999, NULL, '9523@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0933149617', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-11-10 14:43:16', NULL, 0),
('kh_6a183864e11be', NULL, 'rank_1', 'KHC0B315', 'Lý Gia Dũng', 'Khác', '1995-02-11', 1995, NULL, 'lygiadung1219@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0914809588', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-11-13 14:43:16', NULL, 0),
('kh_6a183864e1347', NULL, 'rank_1', 'KH649480', 'Đặng Đức Linh', 'Khác', '1995-10-12', 1995, NULL, '4255@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0977817377', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2410179, 0, 1, '2026-03-22 14:43:16', NULL, 0),
('kh_6a183864e15ab', NULL, 'rank_1', 'KH165C90', 'Đặng Hải Dũng', 'Khác', '2003-03-26', 2003, NULL, '4118@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915887489', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4210706, 0, 1, '2025-06-04 14:43:16', NULL, 0),
('kh_6a183864e1811', NULL, 'rank_1', 'KH0072BA', 'Trần Thanh Hùng', 'Nam', '1992-02-18', 1992, NULL, '7515@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0980296153', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2620094, 0, 1, '2025-07-10 14:43:16', NULL, 0),
('kh_6a183864e1a42', NULL, 'rank_1', 'KHD0B449', 'Đặng Thu Em', 'Khác', '1988-01-17', 1988, NULL, '9100@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0939394996', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2541073, 0, 1, '2025-09-11 14:43:16', NULL, 0),
('kh_6a183864e1c6c', NULL, 'rank_1', 'KH37712E', 'Đỗ Minh Sơn', 'Nam', '1992-08-05', 1992, NULL, '8216@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0927400184', '34 Hai Bà Trưng, Huế', NULL, NULL, 608862, 0, 1, '2025-10-01 14:43:16', NULL, 0),
('kh_6a183864e1ef0', NULL, 'rank_1', 'KHF1F584', 'Võ Xuân Vinh', 'Nam', '1978-01-06', 1978, NULL, 'voxuanvinh5415@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0943519708', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-07-29 14:43:16', NULL, 0),
('kh_6a183864e2115', NULL, 'rank_1', 'KH937C41', 'Hoàng Thu Phúc', 'Khác', '1982-01-20', 1982, NULL, 'hoangthuphuc2632@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0912965767', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2735667, 0, 1, '2025-12-21 14:43:16', NULL, 0),
('kh_6a183864e22de', NULL, 'rank_1', 'KHA6277E', 'Trần Xuân Trang', 'Nữ', '2002-02-19', 2002, NULL, '4496@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0944020875', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 501778, 0, 1, '2026-04-24 14:43:16', NULL, 0),
('kh_6a183864e2552', NULL, 'rank_1', 'KHEED641', 'Hồ Thu Nam', 'Khác', '1974-09-14', 1974, NULL, '2667@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0977104561', '45 Lê Duẩn, Hà Nội', NULL, NULL, 663578, 0, 1, '2025-11-15 14:43:16', NULL, 0),
('kh_6a183864e27a5', NULL, 'rank_1', 'KH916555', 'Vũ Minh Quỳnh', 'Nam', '1989-08-09', 1989, NULL, 'vuminhquynh623@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0985967505', '34 Hai Bà Trưng, Huế', NULL, NULL, 355779, 0, 1, '2025-10-06 14:43:16', NULL, 0),
('kh_6a183864e297a', NULL, 'rank_1', 'KH833558', 'Dương Thu Giang', 'Nam', '1995-08-07', 1995, NULL, '4196@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0930466278', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2612934, 0, 1, '2026-01-21 14:43:16', NULL, 0),
('kh_6a183864e2dce', NULL, 'rank_1', 'KHCD7099', 'Lý Xuân Bình', 'Nữ', '2005-12-25', 2005, NULL, 'lyxuanbinh4216@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0989825994', '45 Lê Duẩn, Hà Nội', NULL, NULL, 1195250, 0, 1, '2025-12-12 14:43:16', NULL, 0),
('kh_6a183864e3037', NULL, 'rank_1', 'KH8B19DA', 'Phạm Thị Phúc', 'Nam', '1992-08-14', 1992, NULL, '2133@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0920070718', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 508595, 0, 0, '2026-01-02 14:43:16', NULL, 0),
('kh_6a183864e324c', NULL, 'rank_1', 'KH3B963F', 'Đỗ Hữu Lan', 'Nữ', '1999-10-16', 1999, NULL, '3648@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0965702760', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2782929, 0, 1, '2025-05-30 14:43:16', NULL, 0),
('kh_6a183864e340d', NULL, 'rank_1', 'KHB629E7', 'Lê Hữu Mai', 'Khác', '1977-10-21', 1977, NULL, '8669@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0930734820', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-01-18 14:43:16', NULL, 0),
('kh_6a183864e35e0', NULL, 'rank_1', 'KH8A2AAF', 'Hoàng Mạnh Em', 'Nam', '1972-01-11', 1972, NULL, '2193@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0952580486', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2026-04-09 14:43:16', NULL, 0),
('kh_6a183864e378b', NULL, 'rank_1', 'KH672366', 'Hoàng Hải Trang', 'Nữ', '1971-08-10', 1971, NULL, '4848@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0973617170', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 4754613, 0, 1, '2026-03-16 14:43:16', NULL, 0),
('kh_6a183864e397e', NULL, 'rank_1', 'KH022EE6', 'Phan Tuấn Mai', 'Khác', '1996-05-07', 1996, NULL, '5268@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0950978217', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2844744, 0, 1, '2025-10-05 14:43:16', NULL, 0),
('kh_6a183864e3bd9', NULL, 'rank_1', 'KH72C64F', 'Đặng Thanh Lan', 'Khác', '1993-04-22', 1993, NULL, '3331@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0936789773', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-11-14 14:43:16', NULL, 0),
('kh_6a183864e3f0d', NULL, 'rank_1', 'KH4278FB', 'Phạm Xuân Anh', 'Nam', '2000-03-18', 2000, NULL, '7127@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0928760376', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-03-29 14:43:16', NULL, 0),
('kh_6a183864e4124', NULL, 'rank_1', 'KH981F9A', 'Trần Hải Quỳnh', 'Nữ', '1974-11-07', 1974, NULL, '4951@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0920212172', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2336647, 0, 1, '2025-07-17 14:43:16', NULL, 0),
('kh_6a183864e42da', NULL, 'rank_1', 'KHFD9989', 'Hoàng Ngọc Em', 'Khác', '1994-04-15', 1994, NULL, '1897@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916545072', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 1668990, 0, 1, '2025-08-11 14:43:16', NULL, 0),
('kh_6a183864e448e', NULL, 'rank_1', 'KH0D3EF5', 'Phan Đức Cường', 'Nam', '1976-04-14', 1976, NULL, '6495@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0972659800', '34 Hai Bà Trưng, Huế', NULL, NULL, 1940646, 0, 1, '2025-08-14 14:43:16', NULL, 0),
('kh_6a183864e465e', NULL, 'rank_1', 'KH32ECD2', 'Vũ Tuấn Uyên', 'Nữ', '1973-09-19', 1973, NULL, '5507@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0973195462', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4969420, 0, 1, '2025-12-07 14:43:16', NULL, 0),
('kh_6a183864e480f', NULL, 'rank_1', 'KHAEFE5F', 'Trần Hải Bình', 'Nam', '1976-11-01', 1976, NULL, '5698@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0925719243', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 343801, 0, 1, '2026-03-03 14:43:16', NULL, 0),
('kh_6a183864e49b2', NULL, 'rank_1', 'KHCD4507', 'Lê Thanh Khánh', 'Nam', '1984-02-27', 1984, NULL, 'lethanhkhanh8632@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0913689453', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 809996, 0, 1, '2026-04-13 14:43:16', NULL, 0),
('kh_6a183864e4ad5', NULL, 'rank_2', 'KHC8DB03', 'Dương Thị Phúc', 'Nam', '1970-04-23', 1970, NULL, '4929@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0942060485', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 1354169, 0, 0, '2026-02-11 14:43:16', NULL, 0),
('kh_6a183864e4e7a', NULL, 'rank_1', 'KHFF7C53', 'Ngô Đức Trang', 'Nữ', '1987-07-10', 1987, NULL, '6679@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0917006059', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 2944192, 0, 1, '2026-01-27 14:43:16', NULL, 0),
('kh_6a183864e51d8', NULL, 'rank_1', 'KH6984E0', 'Lê Ngọc Trang', 'Nữ', '1993-06-09', 1993, NULL, '7684@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0926686413', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 447827, 0, 1, '2025-09-07 14:43:16', NULL, 0),
('kh_6a183864e5616', NULL, 'rank_1', 'KH1BAD1C', 'Bùi Gia Khánh', 'Nữ', '1980-12-16', 1980, NULL, 'buigiakhanh6064@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0919900869', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 4324762, 0, 1, '2026-03-23 14:43:16', NULL, 0),
('kh_6a183864e5953', NULL, 'rank_1', 'KHBF0C60', 'Dương Mạnh Phúc', 'Nữ', '1977-04-05', 1977, NULL, '1387@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0966921801', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-02-24 14:43:16', NULL, 0),
('kh_6a183864e5e62', NULL, 'rank_1', 'KH8D153F', 'Phan Thị Lan', 'Khác', '1984-03-28', 1984, NULL, '2359@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0987203685', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 593508, 0, 1, '2026-02-03 14:43:16', NULL, 0),
('kh_6a183864e626b', NULL, 'rank_1', 'KHE19462', 'Nguyễn Hải Trang', 'Nam', '2003-06-14', 2003, NULL, '1581@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0982335240', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2026-05-06 14:43:16', NULL, 0),
('kh_6a183864e6652', NULL, 'rank_1', 'KHAF1FC8', 'Võ Xuân Khánh', 'Nam', '1976-03-15', 1976, NULL, 'voxuankhanh9988@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0953024854', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-02-12 14:43:16', NULL, 0),
('kh_6a183864e697a', NULL, 'rank_1', 'KH6E0819', 'Ngô Thanh Khánh', 'Nam', '2002-01-24', 2002, NULL, 'ngothanhkhanh2346@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0910562163', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2997512, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864e6ab3', NULL, 'rank_1', 'KH44A75C', 'Lý Tuấn Trang', 'Nam', '1979-01-04', 1979, NULL, '5144@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0999133382', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-04-23 14:43:16', NULL, 0),
('kh_6a183864e6c90', NULL, 'rank_1', 'KHBBD27B', 'Hồ Ngọc Dũng', 'Nữ', '1985-07-13', 1985, NULL, '9408@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0981124157', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-10-13 14:43:16', NULL, 0),
('kh_6a183864e6e30', NULL, 'rank_1', 'KHD28199', 'Dương Mạnh Oanh', 'Nam', '1978-03-24', 1978, NULL, '4026@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0958396054', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2026-05-05 14:43:16', NULL, 0),
('kh_6a183864e6fe0', NULL, 'rank_1', 'KH556816', 'Nguyễn Ngọc Anh', 'Nữ', '1994-09-23', 1994, NULL, '3694@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0979235811', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-11-29 14:43:16', NULL, 0),
('kh_6a183864e71db', NULL, 'rank_1', 'KH26645D', 'Bùi Thị Vinh', 'Nam', '1998-08-24', 1998, NULL, '2532@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0970919804', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 819317, 0, 1, '2025-11-14 14:43:16', NULL, 0),
('kh_6a183864e7437', NULL, 'rank_1', 'KH7D7FA4', 'Trần Tuấn Dũng', 'Nữ', '1978-10-19', 1978, NULL, '1016@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0972860811', '34 Hai Bà Trưng, Huế', NULL, NULL, 3017635, 0, 1, '2026-03-22 14:43:16', NULL, 0),
('kh_6a183864e7836', NULL, 'rank_1', 'KHA9D159', 'Đỗ Thanh Dũng', 'Khác', '2000-07-16', 2000, NULL, '1347@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0929817020', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4731282, 0, 1, '2026-04-14 14:43:16', NULL, 0),
('kh_6a183864e7c2e', NULL, 'rank_1', 'KHD4417C', 'Trần Minh Giang', 'Nam', '1982-05-03', 1982, NULL, '257@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0977683676', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-11-17 14:43:16', NULL, 0),
('kh_6a183864e8000', NULL, 'rank_1', 'KH6172EE', 'Đỗ Thu Em', 'Nữ', '1987-08-26', 1987, NULL, '4690@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0942023270', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 1035710, 0, 1, '2025-09-21 14:43:16', NULL, 0),
('kh_6a183864e8353', NULL, 'rank_1', 'KH90ED35', 'Hồ Văn Phúc', 'Khác', '1989-12-21', 1989, NULL, '4648@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0965234014', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 2274959, 0, 1, '2025-07-10 14:43:16', NULL, 0),
('kh_6a183864e86dc', NULL, 'rank_1', 'KH473A94', 'Hoàng Ngọc Khánh', 'Nữ', '1976-08-07', 1976, NULL, '5570@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0979724182', '45 Lê Duẩn, Hà Nội', NULL, NULL, 3199241, 0, 0, '2025-06-26 14:43:16', NULL, 0),
('kh_6a183864e8aa9', NULL, 'rank_1', 'KH468466', 'Đỗ Hải Yến', 'Khác', '1990-12-12', 1990, NULL, '3881@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0917668687', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 1056265, 0, 1, '2026-02-06 14:43:16', NULL, 0),
('kh_6a183864e8eb1', NULL, 'rank_1', 'KH0544E7', 'Đặng Tuấn Oanh', 'Nữ', '1974-08-01', 1974, NULL, '3232@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0998269494', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-09-29 14:43:16', NULL, 0),
('kh_6a183864e92f9', NULL, 'rank_1', 'KHA7655D', 'Hồ Thu Nam', 'Nam', '1994-04-03', 1994, NULL, '5688@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0936441165', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-12-26 14:43:16', NULL, 0),
('kh_6a183864e94fe', NULL, 'rank_1', 'KH893BB4', 'Phạm Hữu Phúc', 'Khác', '2001-11-16', 2001, NULL, '365@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915727016', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3783633, 0, 1, '2025-12-23 14:43:16', NULL, 0),
('kh_6a183864e96f0', NULL, 'rank_1', 'KHAA14EA', 'Vũ Thanh Bình', 'Nam', '1970-03-26', 1970, NULL, 'vuthanhbinh3760@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0974975802', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-05-31 14:43:16', NULL, 0),
('kh_6a183864e97f6', NULL, 'rank_1', 'KH9363D6', 'Lý Văn Vinh', 'Nữ', '1973-07-20', 1973, NULL, 'lyvanvinh2005@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0990664674', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1613167, 0, 1, '2025-10-26 14:43:16', NULL, 0),
('kh_6a183864e9903', NULL, 'rank_1', 'KH33DBA4', 'Huỳnh Quang Lan', 'Nữ', '1990-08-24', 1990, NULL, 'huynhquanglan2030@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0979510034', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 3101136, 0, 1, '2025-10-05 14:43:16', NULL, 0),
('kh_6a183864e9a0f', NULL, 'rank_1', 'KH0A9342', 'Bùi Minh Em', 'Nam', '1973-12-06', 1973, NULL, 'buiminhem8511@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0930202472', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4051941, 0, 1, '2026-02-17 14:43:16', NULL, 0),
('kh_6a183864e9d20', NULL, 'rank_1', 'KHE01D03', 'Ngô Văn Bình', 'Nam', '1992-05-15', 1992, NULL, 'ngovanbinh4804@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0987121635', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 4017715, 0, 1, '2025-06-07 14:43:16', NULL, 0),
('kh_6a183864e9ff4', NULL, 'rank_1', 'KH1C538E', 'Trần Minh Sơn', 'Nữ', '1988-05-22', 1988, NULL, '3822@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0987428676', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1835558, 0, 1, '2026-02-04 14:43:16', NULL, 0),
('kh_6a183864ea37d', NULL, 'rank_1', 'KHEBF633', 'Phạm Thanh Hùng', 'Nữ', '1970-01-22', 1970, NULL, '505@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0935167661', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4537439, 0, 1, '2025-07-23 14:43:16', NULL, 0),
('kh_6a183864ea6ff', NULL, 'rank_1', 'KH05C9D2', 'Võ Quang Em', 'Khác', '1987-12-20', 1987, NULL, 'voquangem6966@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0997022975', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2407281, 0, 1, '2025-09-23 14:43:16', NULL, 0),
('kh_6a183864eaa49', NULL, 'rank_1', 'KH1BE13A', 'Vũ Thị Uyên', 'Nam', '1985-12-24', 1985, NULL, '1836@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0914671704', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-10-20 14:43:16', NULL, 0),
('kh_6a183864eae73', NULL, 'rank_1', 'KH570DC6', 'Hoàng Gia Lan', 'Nam', '1998-02-03', 1998, NULL, 'hoanggialan9433@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915066960', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 529891, 0, 1, '2025-12-29 14:43:16', NULL, 0),
('kh_6a183864eb17d', NULL, 'rank_1', 'KHB9651B', 'Lý Gia Giang', 'Khác', '2003-09-01', 2003, NULL, 'lygiagiang1512@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0918923821', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 4643614, 0, 1, '2025-12-25 14:43:16', NULL, 0),
('kh_6a183864eb2bc', NULL, 'rank_1', 'KH9D32AE', 'Đỗ Gia Yến', 'Nữ', '1972-05-22', 1972, NULL, '2869@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916201190', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-08-08 14:43:16', NULL, 0),
('kh_6a183864eb497', NULL, 'rank_1', 'KH65EDE7', 'Phan Thanh Yến', 'Nữ', '1971-11-04', 1971, NULL, '491@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0983907799', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 0, '2026-01-05 14:43:16', NULL, 0),
('kh_6a183864eb656', NULL, 'rank_1', 'KHA4985C', 'Phan Quang Khánh', 'Nữ', '1992-07-07', 1992, NULL, 'phanquangkhanh5612@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0964981894', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2026-03-14 14:43:16', NULL, 0),
('kh_6a183864eb77f', NULL, 'rank_1', 'KH0F7042', 'Bùi Ngọc Khánh', 'Nữ', '1984-01-12', 1984, NULL, '6206@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0971451915', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 3209041, 0, 1, '2025-09-11 14:43:16', NULL, 0),
('kh_6a183864eb94d', NULL, 'rank_1', 'KH4D6BF6', 'Bùi Xuân Quỳnh', 'Nam', '1981-09-04', 1981, NULL, 'buixuanquynh1518@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0966427574', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 3966927, 0, 1, '2026-05-26 14:43:16', NULL, 0),
('kh_6a183864eba74', NULL, 'rank_1', 'KH8F86B0', 'Hoàng Mạnh Lan', 'Nam', '2000-01-08', 2000, NULL, '7092@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0944082095', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 1090968, 0, 1, '2025-12-12 14:43:16', NULL, 0),
('kh_6a183864ebc34', NULL, 'rank_1', 'KHB79C9D', 'Ngô Mạnh Phúc', 'Nữ', '1976-07-26', 1976, NULL, '2672@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0997596600', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-01-19 14:43:16', NULL, 0),
('kh_6a183864ebe1c', NULL, 'rank_1', 'KH7D4057', 'Đặng Minh Khánh', 'Khác', '1998-10-23', 1998, NULL, '5599@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0960314702', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 1286175, 0, 1, '2025-07-01 14:43:16', NULL, 0),
('kh_6a183864ebfd1', NULL, 'rank_1', 'KH606AB1', 'Bùi Tuấn Nam', 'Nam', '1972-05-23', 1972, NULL, '6254@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0944156691', '34 Hai Bà Trưng, Huế', NULL, NULL, 992795, 0, 1, '2026-01-06 14:43:16', NULL, 0),
('kh_6a183864ec1a3', NULL, 'rank_1', 'KH695586', 'Trần Minh Hùng', 'Khác', '1991-11-21', 1991, NULL, '1729@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0976865853', '45 Lê Duẩn, Hà Nội', NULL, NULL, 3061502, 0, 1, '2025-08-27 14:43:16', NULL, 0),
('kh_6a183864ec5a2', NULL, 'rank_1', 'KHC87F94', 'Hồ Tuấn Sơn', 'Nữ', '1979-02-05', 1979, NULL, '2394@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0922973758', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-04-09 14:43:16', NULL, 0),
('kh_6a183864eccd3', NULL, 'rank_1', 'KHDB4636', 'Phạm Ngọc Anh', 'Nam', '1979-02-03', 1979, NULL, '3902@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0921936506', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 2077153, 0, 1, '2025-06-07 14:43:16', NULL, 0),
('kh_6a183864eceeb', NULL, 'rank_1', 'KH7FCB9C', 'Vũ Minh Em', 'Nữ', '1991-08-23', 1991, NULL, 'vuminhem7602@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0931740650', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 3741947, 0, 1, '2026-04-04 14:43:16', NULL, 0),
('kh_6a183864ed025', NULL, 'rank_1', 'KH6F07C5', 'Vũ Mạnh Linh', 'Nam', '1975-05-06', 1975, NULL, '1361@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0919774498', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 992454, 0, 1, '2025-09-02 14:43:16', NULL, 0),
('kh_6a183864ed220', NULL, 'rank_1', 'KHEE61A1', 'Phan Hữu Nam', 'Nữ', '2004-05-19', 2004, NULL, '2843@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0957784586', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-07-31 14:43:16', NULL, 0),
('kh_6a183864ed3e0', NULL, 'rank_1', 'KH40B790', 'Vũ Hữu Em', 'Khác', '1976-06-28', 1976, NULL, '4407@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915476542', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 3286634, 0, 1, '2026-02-01 14:43:16', NULL, 0),
('kh_6a183864ed5b5', NULL, 'rank_1', 'KHFCC6E3', 'Lý Hữu Hùng', 'Nam', '1999-06-11', 1999, NULL, '2534@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0972823882', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2026-02-05 14:43:16', NULL, 0),
('kh_6a183864ed76b', NULL, 'rank_1', 'KHB02645', 'Đặng Thị Quỳnh', 'Nam', '1990-09-26', 1990, NULL, '2236@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0947328688', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2997422, 0, 1, '2026-01-08 14:43:16', NULL, 0),
('kh_6a183864edb17', NULL, 'rank_1', 'KH986996', 'Dương Gia Phương', 'Khác', '1986-03-19', 1986, NULL, '3387@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0935433241', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-11-19 14:43:16', NULL, 0),
('kh_6a183864edeab', NULL, 'rank_1', 'KH64E9A6', 'Dương Tuấn Oanh', 'Nam', '1991-06-06', 1991, NULL, '5288@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0958954165', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 4065523, 0, 1, '2026-05-01 14:43:16', NULL, 0),
('kh_6a183864ee308', NULL, 'rank_1', 'KH72D165', 'Hoàng Gia Dũng', 'Khác', '1973-10-16', 1973, NULL, 'hoanggiadung3024@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915207482', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-12-03 14:43:16', NULL, 0),
('kh_6a183864ee45b', NULL, 'rank_1', 'KH9091D9', 'Trần Gia Mai', 'Nữ', '1973-07-13', 1973, NULL, '7535@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0929046933', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1528464, 0, 0, '2025-07-25 14:43:16', NULL, 0),
('kh_6a183864ee640', NULL, 'rank_1', 'KH601EF6', 'Đỗ Đức Uyên', 'Nữ', '1990-10-23', 1990, NULL, '8911@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0956323431', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3337829, 0, 1, '2025-12-16 14:43:16', NULL, 0);
INSERT INTO `nguoi_dung` (`id`, `id_vai_tro`, `id_hang_thanh_vien`, `ma_nd`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `nam_sinh`, `id_menh`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`, `ghi_chu_vip`, `tong_chi_tieu`, `diem_thuong`, `trang_thai`, `ngay_tao`, `deleted_at`, `diem_tich_luy`) VALUES
('kh_6a183864ee82a', NULL, 'rank_1', 'KH4FF832', 'Lý Thu Quỳnh', 'Nam', '1970-12-07', 1970, NULL, 'lythuquynh3833@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0955977344', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-08-12 14:43:16', NULL, 0),
('kh_6a183864ee93f', NULL, 'rank_1', 'KH3A5033', 'Nguyễn Hải Linh', 'Nam', '1995-07-05', 1995, NULL, '6402@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0959514940', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2056694, 0, 1, '2026-01-10 14:43:16', NULL, 0),
('kh_6a183864eeb01', NULL, 'rank_1', 'KHE9AEB4', 'Ngô Minh Lan', 'Khác', '1976-08-28', 1976, NULL, 'ngominhlan9267@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0941234011', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-04-08 14:43:16', NULL, 0),
('kh_6a183864eec20', NULL, 'rank_1', 'KHF500D4', 'Lý Gia Yến', 'Nam', '1979-07-01', 1979, NULL, '1592@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0948380722', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-12-18 14:43:16', NULL, 0),
('kh_6a183864eedff', NULL, 'rank_1', 'KH15E28E', 'Đỗ Đức Uyên', 'Nam', '1970-05-03', 1970, NULL, '6425@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0916272438', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4622861, 0, 1, '2026-04-02 14:43:16', NULL, 0),
('kh_6a183864eefc8', NULL, 'rank_1', 'KH6872A3', 'Lý Hữu Anh', 'Khác', '1999-06-24', 1999, NULL, '6977@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0914067817', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-11-25 14:43:16', NULL, 0),
('kh_6a183864ef19f', NULL, 'rank_1', 'KHF5221A', 'Trần Quang Dũng', 'Nam', '2003-01-19', 2003, NULL, '4866@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0935739001', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 4410746, 0, 1, '2026-01-18 14:43:16', NULL, 0),
('kh_6a183864ef344', NULL, 'rank_1', 'KH8A763A', 'Trần Tuấn Lan', 'Nam', '1996-03-13', 1996, NULL, '9624@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0923666306', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2650042, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864ef4e4', NULL, 'rank_1', 'KHE17FB3', 'Nguyễn Văn Uyên', 'Nữ', '1987-11-09', 1987, NULL, '5581@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0979181974', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-04-01 14:43:16', NULL, 0),
('kh_6a183864ef658', NULL, 'rank_1', 'KHB96339', 'Hồ Hải Uyên', 'Nam', '1977-11-05', 1977, NULL, '2160@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0915577351', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2777847, 0, 1, '2025-10-07 14:43:16', NULL, 0),
('kh_6a183864ef83f', NULL, 'rank_1', 'KHBC5D04', 'Võ Ngọc Em', 'Nữ', '1980-07-20', 1980, NULL, '3900@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0922625958', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-09-21 14:43:16', NULL, 0),
('kh_6a183864efc56', NULL, 'rank_1', 'KH5807CC', 'Võ Gia Giang', 'Khác', '1987-01-16', 1987, NULL, 'vogiagiang6605@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0925089968', '45 Lê Duẩn, Hà Nội', NULL, NULL, 494025, 0, 1, '2026-02-12 14:43:16', NULL, 0),
('kh_6a183864efd8d', NULL, 'rank_1', 'KH550C08', 'Võ Minh Bình', 'Khác', '2001-08-01', 2001, NULL, 'vominhbinh1560@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0966182184', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-07-29 14:43:16', NULL, 0),
('kh_6a183864efec4', NULL, 'rank_1', 'KH405DC9', 'Võ Minh Anh', 'Nữ', '1976-08-17', 1976, NULL, 'vominhanh3746@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0987344089', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-08-22 14:43:16', NULL, 0),
('kh_6a183864efffd', NULL, 'rank_1', 'KH3E306C', 'Lý Hải Mai', 'Khác', '1973-08-22', 1973, NULL, '707@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0933860277', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-10-07 14:43:16', NULL, 0),
('kh_6a183864f0202', NULL, 'rank_1', 'KH41144C', 'Nguyễn Tuấn Sơn', 'Nam', '1973-04-26', 1973, NULL, '5809@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0943117963', '45 Lê Duẩn, Hà Nội', NULL, NULL, 337341, 0, 1, '2025-08-15 14:43:16', NULL, 0),
('kh_6a183864f03e3', NULL, 'rank_1', 'KH3D95A6', 'Dương Gia Lan', 'Khác', '1979-03-24', 1979, NULL, '5394@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0963741968', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 840000, 0, 1, '2026-05-18 14:43:16', NULL, 84),
('kh_6a183864f05c2', NULL, 'rank_1', 'KHFC9F39', 'Phan Xuân Mai', 'Nữ', '2002-11-07', 2002, NULL, 'phanxuanmai7424@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0938391397', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2903073, 0, 1, '2025-12-26 14:43:16', NULL, 0),
('kh_6a183864f06ea', NULL, 'rank_1', 'KH9A5A8D', 'Đỗ Quang Em', 'Nữ', '1979-08-24', 1979, NULL, '2490@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0976312363', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 293298, 0, 1, '2025-12-08 14:43:16', NULL, 0),
('kh_6a183864f08b4', NULL, 'rank_1', 'KH9BFE13', 'Vũ Thanh Anh', 'Nữ', '1979-08-15', 1979, NULL, 'vuthanhanh9712@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0945301608', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 3432708, 0, 1, '2025-10-11 14:43:16', NULL, 0),
('kh_6a183864f09d1', NULL, 'rank_1', 'KH246F4C', 'Trần Hải Yến', 'Khác', '2005-01-03', 2005, NULL, '5793@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0939040602', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-06-17 14:43:16', NULL, 0),
('kh_6a183864f0b91', NULL, 'rank_1', 'KH74ED11', 'Võ Đức Yến', 'Khác', '1995-05-25', 1995, NULL, '1190@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0962296810', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-04-04 14:43:16', NULL, 0),
('kh_6a183864f0d2f', NULL, 'rank_1', 'KHC03A53', 'Võ Đức Quỳnh', 'Nữ', '1990-12-23', 1990, NULL, '9629@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0940522709', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864f0f35', NULL, 'rank_1', 'KH6F3EB0', 'Đặng Minh Linh', 'Nữ', '1982-01-09', 1982, NULL, '9054@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0973115348', '45 Lê Duẩn, Hà Nội', NULL, NULL, 887577, 0, 1, '2025-08-16 14:43:16', NULL, 0),
('kh_6a183864f111f', NULL, 'rank_1', 'KH9C6369', 'Phan Hữu Phúc', 'Khác', '1991-03-26', 1991, NULL, '6698@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0944438877', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 1689742, 0, 1, '2025-11-13 14:43:16', NULL, 0),
('kh_6a183864f1566', NULL, 'rank_1', 'KH62BA4A', 'Huỳnh Minh Em', 'Khác', '1982-07-20', 1982, NULL, 'huynhminhem2152@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0910940521', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 446439, 0, 1, '2026-03-30 14:43:16', NULL, 0),
('kh_6a183864f1999', NULL, 'rank_1', 'KH918C5B', 'Lê Đức Dũng', 'Nam', '1976-04-09', 1976, NULL, '2227@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0959484935', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-07-27 14:43:16', NULL, 0),
('kh_6a183864f1e48', NULL, 'rank_1', 'KHD6B371', 'Ngô Thị Anh', 'Nữ', '2001-06-16', 2001, NULL, '8577@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0974394785', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1511256, 0, 1, '2026-02-04 14:43:16', NULL, 0),
('kh_6a183864f22c1', NULL, 'rank_1', 'KH954E88', 'Võ Minh Mai', 'Nam', '1990-09-11', 1990, NULL, 'vominhmai716@gmail.com', '$2y$10$g7Y99tBSMiBYBRe2kVxfAecv5kk0gTU.hDIx4sjgliVvJh4Cd8oJq', '0978101908', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 214783, 0, 1, '2026-01-30 14:43:16', NULL, 0),
('user_1', 'role_1', NULL, 'NV001', 'Hải Admin', NULL, NULL, NULL, NULL, 'admin@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26', NULL, 0),
('user_2', 'role_2', NULL, 'NV002', 'Tuấn Kho', NULL, NULL, NULL, NULL, 'kho@chuoingoc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26', NULL, 0),
('user_3', NULL, 'rank_1', 'KH001', 'Khách hàng A', 'nam', NULL, 2004, 'menh_3', 'khachhang@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '876987654', '34 Hai Bà Trưng, Huế', NULL, '', 0, 0, 0, '2026-05-27 14:38:26', '2026-05-28 19:42:13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung_voucher`
--

CREATE TABLE `nguoi_dung_voucher` (
  `id` varchar(50) NOT NULL,
  `id_nguoi_dung` varchar(50) NOT NULL,
  `id_voucher` varchar(50) NOT NULL,
  `trang_thai` int(11) DEFAULT 0 COMMENT '0: chua su dung, 1: da su dung',
  `ngay_tao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `ma_nv` varchar(20) NOT NULL COMMENT 'Mã nhân viên',
  `ho_ten` varchar(255) NOT NULL COMMENT 'Họ và tên',
  `email` varchar(255) NOT NULL COMMENT 'Email đăng nhập',
  `dien_thoai` varchar(20) DEFAULT NULL,
  `mat_khau` varchar(255) NOT NULL COMMENT 'Password hashed',
  `vai_tro` varchar(50) NOT NULL DEFAULT 'Nhân viên bán hàng',
  `phong_ban` varchar(100) DEFAULT NULL,
  `trang_thai` enum('hoat_dong','cho_kich_hoat','bi_khoa') NOT NULL DEFAULT 'cho_kich_hoat',
  `avatar` varchar(500) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `yeu_cau_doi_mk` tinyint(1) DEFAULT 1,
  `ly_do_khoa` text DEFAULT NULL,
  `ngay_vao_lam` date DEFAULT NULL,
  `lan_dang_nhap_cuoi` datetime DEFAULT NULL,
  `nguoi_tao` varchar(100) DEFAULT NULL,
  `nguoi_cap_nhat` varchar(100) DEFAULT NULL,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhân viên hệ thống';

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ma_nv`, `ho_ten`, `email`, `dien_thoai`, `mat_khau`, `vai_tro`, `phong_ban`, `trang_thai`, `avatar`, `ngay_sinh`, `dia_chi`, `ghi_chu`, `yeu_cau_doi_mk`, `ly_do_khoa`, `ngay_vao_lam`, `lan_dang_nhap_cuoi`, `nguoi_tao`, `nguoi_cap_nhat`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 'NV0001', 'Hải Admin', 'thanhhai@example.com', '0901234567', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Super Admin', 'Quản trị', 'hoat_dong', NULL, '2004-11-15', '123 Nguyễn Văn Linh, Quận Hải Châu, TP. Đà Nẵng', 'Người sáng lập hệ thống. Phụ trách tổng thể nền tảng.', 0, NULL, '2026-01-01', '2026-06-02 11:57:46', 'Hệ thống', NULL, '2026-06-02 11:44:30', '2026-06-02 11:57:46'),
(2, 'NV0002', 'Nguyễn Văn Kho', 'vankho@example.com', '0987654321', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '1995-03-20', NULL, NULL, 1, NULL, '2026-02-15', '2026-05-18 08:15:00', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(3, 'NV0003', 'Trần Thị Chăm Sóc', 'chamsoc@example.com', '0912345678', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'cho_kich_hoat', NULL, '1998-07-10', NULL, NULL, 1, NULL, '2026-05-17', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(4, 'NV0004', 'Lê Kế Toán', 'ketoan@example.com', NULL, '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'bi_khoa', NULL, '1990-12-25', NULL, 'Vi phạm quy trình, tạm khóa để điều tra.', 1, 'Nhân viên nghỉ việc / Thôi việc', '2026-03-10', '2026-05-01 17:00:00', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(5, 'NV0005', 'Phạm Bán Hàng', 'banhang@example.com', '0933445566', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '2000-05-15', NULL, NULL, 1, NULL, '2026-04-20', '2026-05-17 19:20:00', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(6, 'NV0006', 'Lê Dũng', 'ledung6@example.com', '0933459419', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '1989-06-02', NULL, NULL, 1, NULL, '2025-10-24', '2026-05-10 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(7, 'NV0007', 'Hồ Nga', '7@example.com', '0947123732', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'hoat_dong', NULL, '2003-06-02', NULL, NULL, 1, NULL, '2025-03-09', '2026-05-15 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(8, 'NV0008', 'Lý Giang', 'lygiang8@example.com', '0924168277', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '2002-06-02', NULL, NULL, 1, NULL, '2024-11-09', '2026-05-29 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(9, 'NV0009', 'Hồ Bình', '9@example.com', '0983361777', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'hoat_dong', NULL, '1987-06-02', NULL, NULL, 1, NULL, '2024-09-16', '2026-05-19 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(10, 'NV0010', 'Vũ Vy', 'vuvy10@example.com', '0938853130', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'hoat_dong', NULL, '1991-06-02', NULL, NULL, 1, NULL, '2025-02-08', '2026-05-17 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(11, 'NV0011', 'Phạm Sơn', '11@example.com', '0980251591', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'cho_kich_hoat', NULL, '1984-06-02', NULL, NULL, 1, NULL, '2025-06-30', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(12, 'NV0012', 'Phạm Yến', '12@example.com', '0915771622', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '2001-06-02', NULL, NULL, 1, NULL, '2025-07-15', '2026-05-16 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(13, 'NV0013', 'Hoàng Sơn', '13@example.com', '0944727227', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'bi_khoa', NULL, '2002-06-02', NULL, NULL, 1, 'Khóa tự động do lâu không hoạt động', '2023-11-20', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(14, 'NV0014', 'Phan Phương', '14@example.com', '0931731073', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '1982-06-02', NULL, NULL, 1, NULL, '2025-07-13', '2026-05-14 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(15, 'NV0015', 'Phạm Hải', '15@example.com', '0966946923', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'cho_kich_hoat', NULL, '1986-06-02', NULL, NULL, 1, NULL, '2024-01-01', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(16, 'NV0016', 'Dương Tùng', '16@example.com', '0950949441', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'bi_khoa', NULL, '1996-06-02', NULL, NULL, 1, 'Khóa tự động do lâu không hoạt động', '2025-12-10', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(17, 'NV0017', 'Hồ Tuấn', '17@example.com', '0948240874', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'cho_kich_hoat', NULL, '1988-06-02', NULL, NULL, 1, NULL, '2023-10-31', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(18, 'NV0018', 'Ngô Quang', 'ngoquang18@example.com', '0938815752', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '1984-06-02', NULL, NULL, 1, NULL, '2025-06-17', '2026-05-15 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(19, 'NV0019', 'Hoàng Trang', 'hoangtrang19@example.com', '0996304055', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'cho_kich_hoat', NULL, '1988-06-02', NULL, NULL, 1, NULL, '2025-06-02', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(20, 'NV0020', 'Võ Em', 'voem20@example.com', '0939191381', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '1987-06-02', NULL, NULL, 1, NULL, '2025-01-16', '2026-05-24 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(21, 'NV0021', 'Ngô Quang', 'ngoquang21@example.com', '0980925788', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'bi_khoa', NULL, '2004-06-02', NULL, NULL, 1, 'Khóa tự động do lâu không hoạt động', '2024-04-24', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(22, 'NV0022', 'Trần Thị Hải', '22@example.com', '0996228337', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'hoat_dong', NULL, '1987-06-02', NULL, NULL, 1, NULL, '2026-03-27', '2026-05-22 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(23, 'NV0023', 'Lý Yến', '23@example.com', '0952065918', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '1995-06-02', NULL, NULL, 1, NULL, '2025-10-06', '2026-05-29 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(24, 'NV0024', 'Võ Vy', 'vovy24@example.com', '0990881629', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'hoat_dong', NULL, '2004-06-02', NULL, NULL, 1, NULL, '2025-11-23', '2026-05-24 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(25, 'NV0025', 'Lý Lan', 'lylan25@example.com', '0921205663', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'hoat_dong', NULL, '1983-06-02', NULL, NULL, 1, NULL, '2024-11-10', '2026-05-04 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(26, 'NV0026', 'Đặng Giang', '26@example.com', '0992904801', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'cho_kich_hoat', NULL, '2006-06-02', NULL, NULL, 1, NULL, '2024-10-15', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(27, 'NV0027', 'Đỗ Tuấn', '27@example.com', '0985496125', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'hoat_dong', NULL, '1985-06-02', NULL, NULL, 1, NULL, '2024-06-18', '2026-05-04 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(28, 'NV0028', 'Phan Tuấn', '28@example.com', '0956468167', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '1986-06-02', NULL, NULL, 1, NULL, '2024-06-20', '2026-05-06 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(29, 'NV0029', 'Nguyễn Văn Cường', '29@example.com', '0957062380', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '2004-06-02', NULL, NULL, 1, NULL, '2025-12-26', '2026-05-13 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(30, 'NV0030', 'Đỗ Cường', '30@example.com', '0915902666', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'cho_kich_hoat', NULL, '2006-06-02', NULL, NULL, 1, NULL, '2024-05-15', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(31, 'NV0031', 'Phan Hải', '31@example.com', '0966259935', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'hoat_dong', NULL, '2002-06-02', NULL, NULL, 1, NULL, '2025-02-09', '2026-05-25 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(32, 'NV0032', 'Võ Linh', 'volinh32@example.com', '0984128992', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'hoat_dong', NULL, '1995-06-02', NULL, NULL, 1, NULL, '2025-09-11', '2026-05-14 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(33, 'NV0033', 'Đặng Tùng', '33@example.com', '0987853574', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '2001-06-02', NULL, NULL, 1, NULL, '2024-06-06', '2026-05-21 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(34, 'NV0034', 'Võ Hải', '34@example.com', '0935190400', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '2005-06-02', NULL, NULL, 1, NULL, '2025-03-16', '2026-05-21 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(35, 'NV0035', 'Võ Yến', '35@example.com', '0989392742', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'hoat_dong', NULL, '1990-06-02', NULL, NULL, 1, NULL, '2026-03-14', '2026-05-29 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(36, 'NV0036', 'Hồ Sơn', '36@example.com', '0979958142', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'hoat_dong', NULL, '1991-06-02', NULL, NULL, 1, NULL, '2025-03-17', '2026-05-08 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(37, 'NV0037', 'Bùi Tuấn', '37@example.com', '0946820607', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'cho_kich_hoat', NULL, '1987-06-02', NULL, NULL, 1, NULL, '2026-03-04', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(38, 'NV0038', 'Trần Thị Bình', '38@example.com', '0960956658', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'hoat_dong', NULL, '2005-06-02', NULL, NULL, 1, NULL, '2023-10-27', '2026-05-30 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(39, 'NV0039', 'Dương Giang', '39@example.com', '0966678472', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'hoat_dong', NULL, '1989-06-02', NULL, NULL, 1, NULL, '2024-01-31', '2026-05-06 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(40, 'NV0040', 'Lý Cường', '40@example.com', '0919739123', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '1983-06-02', NULL, NULL, 1, NULL, '2025-12-04', '2026-05-17 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(41, 'NV0041', 'Đặng Hải', '41@example.com', '0988356191', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Nhân viên bán hàng', 'Bán hàng', 'hoat_dong', NULL, '1999-06-02', NULL, NULL, 1, NULL, '2026-02-09', '2026-05-12 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(42, 'NV0042', 'Phan Xuân', 'phanxuan42@example.com', '0922960674', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '1995-06-02', NULL, NULL, 1, NULL, '2025-05-08', '2026-05-26 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(43, 'NV0043', 'Đặng Dũng', '43@example.com', '0919149330', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Admin', 'Quản trị', 'hoat_dong', NULL, '1987-06-02', NULL, NULL, 1, NULL, '2024-06-06', '2026-06-02 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(44, 'NV0044', 'Lê Mai', 'lemai44@example.com', '0963989871', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '1987-06-02', NULL, NULL, 1, NULL, '2024-06-02', '2026-05-15 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(45, 'NV0045', 'Vũ Phương', '45@example.com', '0992928098', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'CSKH', 'CSKH', 'hoat_dong', NULL, '1994-06-02', NULL, NULL, 1, NULL, '2025-08-14', '2026-05-23 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(46, 'NV0046', 'Đặng Uyên', '46@example.com', '0936198662', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'cho_kich_hoat', NULL, '1985-06-02', NULL, NULL, 1, NULL, '2024-03-12', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(47, 'NV0047', 'Bùi Uyên', 'buiuyen47@example.com', '0917997146', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'hoat_dong', NULL, '1984-06-02', NULL, NULL, 1, NULL, '2026-01-13', '2026-05-11 06:44:30', 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(48, 'NV0048', 'Hoàng Yến', '48@example.com', '0968057295', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'cho_kich_hoat', NULL, '1992-06-02', NULL, NULL, 1, NULL, '2024-11-02', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(49, 'NV0049', 'Ngô Phúc', 'ngophuc49@example.com', '0930751656', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Quản lý kho', 'Kho', 'cho_kich_hoat', NULL, '1981-06-02', NULL, NULL, 1, NULL, '2023-10-28', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30'),
(50, 'NV0050', 'Ngô Em', 'ngoem50@example.com', '0912351353', '$2y$10$IJbr6RlInKAXBI5gxdIXWOw14f.YanHWm3QJA/89cmJuCSzZJZ73.', 'Kế toán / báo cáo', 'Kế toán', 'bi_khoa', NULL, '1992-06-02', NULL, NULL, 1, 'Khóa tự động do lâu không hoạt động', '2024-12-02', NULL, 'Hải Admin', NULL, '2026-06-02 11:44:30', '2026-06-02 11:44:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien_lich_su`
--

CREATE TABLE `nhan_vien_lich_su` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `hanh_dong` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `thiet_bi` varchar(255) DEFAULT NULL,
  `nguoi_thuc_hien` varchar(100) DEFAULT NULL,
  `ngay_thuc_hien` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Lịch sử hoạt động nhân viên';

--
-- Đang đổ dữ liệu cho bảng `nhan_vien_lich_su`
--

INSERT INTO `nhan_vien_lich_su` (`id`, `id_nhan_vien`, `hanh_dong`, `mo_ta`, `ip_address`, `thiet_bi`, `nguoi_thuc_hien`, `ngay_thuc_hien`) VALUES
(1, 1, 'Đăng nhập', 'Đăng nhập thành công', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', '2026-06-02 06:44:30'),
(2, 1, 'Đăng nhập', 'Đăng nhập thành công', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', '2026-06-01 06:44:30'),
(3, 1, 'Tạo phiếu nhập kho PN00123', 'Đã thêm 50 sản phẩm.', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', '2026-06-02 04:44:30'),
(4, 1, 'Cập nhật cấu hình', 'Đã chỉnh sửa nội dung tab.', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', '2026-06-01 06:44:30'),
(5, 1, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(6, 2, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(7, 3, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(8, 4, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(9, 5, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(10, 6, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(11, 7, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(12, 8, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(13, 9, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(14, 10, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(15, 11, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(16, 12, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(17, 13, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(18, 14, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(19, 15, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(20, 16, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(21, 17, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(22, 18, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(23, 19, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(24, 20, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(25, 21, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(26, 22, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(27, 23, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(28, 24, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(29, 25, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(30, 26, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(31, 27, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(32, 28, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(33, 29, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(34, 30, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(35, 31, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(36, 32, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(37, 33, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(38, 34, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(39, 35, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(40, 36, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(41, 37, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(42, 38, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(43, 39, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(44, 40, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(45, 41, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(46, 42, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(47, 43, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(48, 44, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(49, 45, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(50, 46, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(51, 47, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(52, 48, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(53, 49, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(54, 50, 'Tạo tài khoản', 'Khởi tạo tài khoản', NULL, NULL, 'Hệ thống', '2026-05-02 06:44:30'),
(55, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Hải Admin', '2026-06-02 11:57:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien_quyen`
--

CREATE TABLE `nhan_vien_quyen` (
  `id` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `module` varchar(100) NOT NULL COMMENT 'Dashboard, Sản phẩm, Đơn hàng, Kho, Cấu hình',
  `xem` tinyint(1) DEFAULT 0,
  `them` tinyint(1) DEFAULT 0,
  `sua` tinyint(1) DEFAULT 0,
  `xoa` tinyint(1) DEFAULT 0,
  `dac_biet` tinyint(1) DEFAULT 0 COMMENT 'Xuất Excel, Duyệt phiếu...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Ma trận quyền nhân viên';

--
-- Đang đổ dữ liệu cho bảng `nhan_vien_quyen`
--

INSERT INTO `nhan_vien_quyen` (`id`, `id_nhan_vien`, `module`, `xem`, `them`, `sua`, `xoa`, `dac_biet`) VALUES
(1, 1, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(2, 1, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(3, 1, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(4, 1, 'Quản lý Kho', 1, 1, 1, 1, 1),
(5, 1, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(6, 2, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(7, 2, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(8, 2, 'Quản lý Kho', 1, 1, 1, 1, 1),
(9, 3, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(10, 3, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(11, 3, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(12, 4, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(13, 4, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(14, 5, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(15, 5, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(16, 5, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(17, 6, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(18, 6, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(19, 6, 'Quản lý Kho', 1, 1, 1, 1, 1),
(20, 7, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(21, 7, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(22, 7, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(23, 8, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(24, 8, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(25, 8, 'Quản lý Kho', 1, 1, 1, 1, 1),
(26, 9, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(27, 9, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(28, 9, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(29, 10, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(30, 10, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(31, 10, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(32, 10, 'Quản lý Kho', 1, 1, 1, 1, 1),
(33, 10, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(34, 11, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(35, 11, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(36, 11, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(37, 12, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(38, 12, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(39, 12, 'Quản lý Kho', 1, 1, 1, 1, 1),
(40, 13, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(41, 13, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(42, 14, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(43, 14, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(44, 14, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(45, 15, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(46, 15, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(47, 16, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(48, 16, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(49, 17, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(50, 17, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(51, 17, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(52, 17, 'Quản lý Kho', 1, 1, 1, 1, 1),
(53, 17, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(54, 18, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(55, 18, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(56, 18, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(57, 19, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(58, 19, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(59, 19, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(60, 20, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(61, 20, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(62, 20, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(63, 21, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(64, 21, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(65, 21, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(66, 22, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(67, 22, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(68, 22, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(69, 23, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(70, 23, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(71, 23, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(72, 24, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(73, 24, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(74, 24, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(75, 25, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(76, 25, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(77, 25, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(78, 25, 'Quản lý Kho', 1, 1, 1, 1, 1),
(79, 25, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(80, 26, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(81, 26, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(82, 26, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(83, 27, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(84, 27, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(85, 28, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(86, 28, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(87, 28, 'Quản lý Kho', 1, 1, 1, 1, 1),
(88, 29, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(89, 29, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(90, 29, 'Quản lý Kho', 1, 1, 1, 1, 1),
(91, 30, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(92, 30, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(93, 30, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(94, 30, 'Quản lý Kho', 1, 1, 1, 1, 1),
(95, 30, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(96, 31, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(97, 31, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(98, 32, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(99, 32, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(100, 32, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(101, 32, 'Quản lý Kho', 1, 1, 1, 1, 1),
(102, 32, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(103, 33, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(104, 33, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(105, 33, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(106, 34, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(107, 34, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(108, 34, 'Quản lý Kho', 1, 1, 1, 1, 1),
(109, 35, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(110, 35, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(111, 35, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(112, 35, 'Quản lý Kho', 1, 1, 1, 1, 1),
(113, 35, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(114, 36, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(115, 36, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(116, 37, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(117, 37, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(118, 37, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(119, 38, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(120, 38, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(121, 38, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(122, 39, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(123, 39, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(124, 40, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(125, 40, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(126, 40, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(127, 41, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(128, 41, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(129, 41, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(130, 42, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(131, 42, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(132, 42, 'Quản lý Kho', 1, 1, 1, 1, 1),
(133, 43, 'Dashboard & Thống kê', 1, 1, 1, 1, 1),
(134, 43, 'Sản phẩm & Danh mục', 1, 1, 1, 1, 1),
(135, 43, 'Đơn hàng & Thanh toán', 1, 1, 1, 1, 1),
(136, 43, 'Quản lý Kho', 1, 1, 1, 1, 1),
(137, 43, 'Cấu hình & Nhân sự', 1, 1, 1, 1, 1),
(138, 44, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(139, 44, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(140, 44, 'Quản lý Kho', 1, 1, 1, 1, 1),
(141, 45, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(142, 45, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0),
(143, 45, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0),
(144, 46, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(145, 46, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1),
(146, 47, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(147, 47, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(148, 47, 'Quản lý Kho', 1, 1, 1, 1, 1),
(149, 48, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(150, 48, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(151, 48, 'Quản lý Kho', 1, 1, 1, 1, 1),
(152, 49, 'Dashboard & Thống kê', 1, 0, 0, 0, 0),
(153, 49, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1),
(154, 49, 'Quản lý Kho', 1, 1, 1, 1, 1),
(155, 50, 'Dashboard & Thống kê', 1, 0, 0, 0, 1),
(156, 50, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1);

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

--
-- Đang đổ dữ liệu cho bảng `nhat_ky_hoat_dong`
--

INSERT INTO `nhat_ky_hoat_dong` (`id`, `id_nguoi_dung`, `hanh_dong`, `module`, `doi_tuong_id`, `gia_tri_cu`, `gia_tri_moi`, `ip`, `thiet_bi`, `muc_do`, `ngay_tao`) VALUES
('', 'kh_6a17dc271eecd', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_4', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:01:42'),
('log_6a17d883ab72c', 'user_1', 'Thêm mới hạng', 'Hạng thành viên', 'test444444', NULL, 'Thêm mới hạng: test', NULL, NULL, 'Bình thường', '2026-05-28 12:54:11'),
('log_6a17d8934e004', 'user_1', 'Xóa hạng', 'Hạng thành viên', 'test', NULL, 'Xóa hạng: test', NULL, NULL, 'Bình thường', '2026-05-28 12:54:27'),
('log_6a17d89b82ba5', 'user_1', 'Xóa hạng', 'Hạng thành viên', 'test444444', NULL, 'Xóa hạng: test444444', NULL, NULL, 'Bình thường', '2026-05-28 12:54:35'),
('log_6a17d938b3535', 'user_1', 'Cập nhật hạng', 'Hạng thành viên', 'rank_4', NULL, 'Cập nhật hạng: Kim Cương', NULL, NULL, 'Bình thường', '2026-05-28 12:57:12'),
('log_6a17dc272dba5', 'user_1', 'Thêm mới', 'Khách hàng', 'kh_6a17dc271eecd', NULL, 'Thêm mới khách hàng: test', NULL, NULL, 'Bình thường', '2026-05-28 13:09:43'),
('log_6a17dc4fa8b4c', 'user_1', 'Cập nhật', 'Khách hàng', 'user_3', NULL, 'Cập nhật thông tin khách hàng: Khách hàng A', NULL, NULL, 'Bình thường', '2026-05-28 13:10:23'),
('log_6a17dc6aba270', 'user_1', 'Thêm mới', 'Khách hàng', 'kh_6a17dc6aac40c', NULL, 'Thêm mới khách hàng: tdsdgds', NULL, NULL, 'Bình thường', '2026-05-28 13:10:50'),
('log_6a17de12ad0eb', 'user_1', 'Cập nhật', 'Khách hàng', 'kh_6a17dc6aac40c', NULL, 'Cập nhật thông tin khách hàng: tdsdgds', NULL, NULL, 'Bình thường', '2026-05-28 13:17:54'),
('log_6a17de4311714', 'user_1', 'Cập nhật', 'Khách hàng', 'kh_6a17dc6aac40c', NULL, 'Cập nhật thông tin khách hàng: tdsdgds', NULL, NULL, 'Bình thường', '2026-05-28 13:18:43'),
('log_6a17df9410b22', 'user_1', 'Cập nhật', 'Khách hàng', 'kh_6a17dc6aac40c', NULL, 'Cập nhật thông tin khách hàng: tdsdgds', NULL, NULL, 'Bình thường', '2026-05-28 13:24:20'),
('log_6a18334ea12fb', 'user_1', 'Khóa/Mở khóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Thay đổi trạng thái 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:21:34'),
('log_6a1833c428814', 'user_1', 'Khóa/Mở khóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Thay đổi trạng thái 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:23:32'),
('log_6a1834ec4531e', 'user_1', 'Khóa/Mở khóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Thay đổi trạng thái 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:28:28'),
('log_6a1834f1e6304', 'user_1', 'Khóa/Mở khóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Thay đổi trạng thái 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:28:33'),
('log_6a1834f8661b2', 'user_1', 'Cập nhật hạng', 'Khách hàng', 'kh_6a17dc271eecd', NULL, 'Cập nhật hạng thành viên bằng thủ công', NULL, NULL, 'Bình thường', '2026-05-28 19:28:40'),
('log_6a183685c6ee2', 'user_1', 'Cập nhật hạng', 'Khách hàng', 'kh_6a17dc271eecd', NULL, 'Cập nhật hạng thành viên bằng thủ công', NULL, NULL, 'Bình thường', '2026-05-28 19:35:17'),
('log_6a18382577ea1', 'user_1', 'Xóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Xóa mềm 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:42:13'),
('log_6a1838294d9a8', 'user_1', 'Xóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Xóa mềm 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:42:17'),
('log_6a183833b2093', 'user_1', 'Xóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Xóa mềm 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-28 19:42:27'),
('log_6a183bb1dad92', 'user_1', 'Gửi thông báo', 'Khách hàng', 'kh_6a183864d1037', NULL, 'Gửi thông báo cá nhân: Quà tặng đặc biệt dành cho bạn!', NULL, NULL, 'Bình thường', '2026-05-28 19:57:21'),
('log_6a183bc2e14c6', 'user_1', 'Cập nhật hạng', 'Khách hàng', 'kh_6a183864d62a5', NULL, 'Cập nhật hạng thành viên bằng thủ công', NULL, NULL, 'Bình thường', '2026-05-28 19:57:38'),
('log_6a195e9ded251', 'user_1', 'Khóa/Mở khóa tài khoản', 'Khách hàng', 'Bulk', NULL, 'Thay đổi trạng thái 1 khách hàng', NULL, NULL, 'Bình thường', '2026-05-29 16:38:37'),
('log_6a1c160a0825b', 'user_1', 'Tạo đơn hàng', 'Đơn hàng', 'dh_6a1c160a073e1', NULL, 'Tạo đơn hàng POS cho Dương Gia Lan', NULL, NULL, 'Bình thường', '2026-05-31 18:05:46'),
('log_6a1c160a08452', 'user_1', 'Cập nhật thanh toán', 'Đơn hàng', 'dh_6a1c160a073e1', NULL, 'Trạng thái TT: Đã thanh toán', NULL, NULL, 'Bình thường', '2026-05-31 18:05:46'),
('log_6a1c171f6704e', 'user_1', 'Cập nhật đơn hàng', 'Đơn hàng', 'dh_6a1c160a073e1', NULL, 'Cập nhật trạng thái thành: Đang chuẩn bị', NULL, NULL, 'Bình thường', '2026-05-31 18:10:23'),
('log_6a1c1736e00a8', 'user_1', 'Cập nhật đơn hàng', 'Đơn hàng', 'dh_6a1c160a073e1', NULL, 'Cập nhật trạng thái thành: Đang giao', NULL, NULL, 'Bình thường', '2026-05-31 18:10:46'),
('log_6a1c18088e958', 'user_1', 'Cập nhật đơn hàng', 'Đơn hàng', 'dh_6a1c160a073e1', NULL, 'Cập nhật trạng thái thành: Thành công', NULL, NULL, 'Bình thường', '2026-05-31 18:14:16'),
('nk_6a183d0835903', 'kh_6a183864d0640', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d08364d1', 'kh_6a183864d097f', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0836caa', 'kh_6a183864d1780', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0837415', 'kh_6a183864d2c59', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0837ea5', 'kh_6a183864d3388', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d08382cc', 'kh_6a183864d3b7c', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083865a', 'kh_6a183864d5f72', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d08389b2', 'kh_6a183864d62a5', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0838d10', 'kh_6a183864d8938', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0839069', 'kh_6a183864da863', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0839384', 'kh_6a183864daccb', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d08396bd', 'kh_6a183864dba87', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0839a20', 'kh_6a183864dbc65', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0839d2c', 'kh_6a183864dc8e2', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083a3ba', 'kh_6a183864dd94e', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_4', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083aa5c', 'kh_6a183864de67d', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_4', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083b0ce', 'kh_6a183864df8e1', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083b768', 'kh_6a183864e2115', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083be30', 'kh_6a183864e297a', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_4', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083c523', 'kh_6a183864e448e', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083cbb3', 'kh_6a183864e49b2', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083d055', 'kh_6a183864e8353', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083d329', 'kh_6a183864e97f6', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083d815', 'kh_6a183864e9ff4', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083dee1', 'kh_6a183864eae73', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083e543', 'kh_6a183864eb2bc', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083ebff', 'kh_6a183864eb656', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083f286', 'kh_6a183864eba74', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d083f97f', 'kh_6a183864ebfd1', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_4', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d084006a', 'kh_6a183864ec1a3', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0840706', 'kh_6a183864ed3e0', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0840d6c', 'kh_6a183864edeab', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0841446', 'kh_6a183864eefc8', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d08416e3', 'kh_6a183864ef19f', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d084197a', 'kh_6a183864ef83f', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_4', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0841bcc', 'kh_6a183864efec4', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0841e17', 'kh_6a183864f09d1', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_3', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04'),
('nk_6a183d0842057', 'kh_6a183864f1e48', 'Thăng hạng tự động', 'Hạng thành viên', NULL, 'rank_2', 'rank_1', NULL, NULL, 'Bình thường', '2026-05-28 20:03:04');

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

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ma_ncc`, `ten_ncc`, `nguoi_lien_he`, `sdt`, `email`, `dia_chi`, `trang_thai`) VALUES
('4bf56e10-5eb6-490c-92b0-53916e9db269', 'NCCHOACAT', 'Công ty TNHH Hòa Cát', 'Nguyễn Thị Hòa', '03659458445', 'hoacat251@gmail.com', 'TPHCM', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_quyen_kho`
--

CREATE TABLE `phan_quyen_kho` (
  `id` int(11) NOT NULL,
  `id_kho` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) NOT NULL,
  `quyen_xem` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_nhap` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_xuat` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_dieu_chinh` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_kiem_ke` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_chuyen` tinyint(1) NOT NULL DEFAULT 0,
  `quyen_duyet` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id_don_hang` varchar(36) DEFAULT NULL,
  `tong_tien` decimal(15,0) DEFAULT 0 COMMENT 'Dùng cho Phiếu nhập/xuất',
  `ly_do` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Bản nháp, 1: Hoàn thành, 2: Đã hủy',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `tien_da_tra` decimal(15,0) NOT NULL DEFAULT 0,
  `trang_thai_thanh_toan` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chưa, 1: 1 phần, 2: Xong',
  `ngay_du_kien` datetime DEFAULT NULL,
  `ngay_nhap` datetime DEFAULT NULL,
  `id_nguoi_kiem` varchar(36) DEFAULT NULL,
  `muc_do_uu_tien` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: BT, 1: Gấp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_kho`
--

INSERT INTO `phieu_kho` (`id`, `ma_phieu`, `loai_phieu`, `id_nguoi_tao`, `id_nha_cung_cap`, `id_don_hang`, `tong_tien`, `ly_do`, `ghi_chu`, `trang_thai`, `ngay_tao`, `tien_da_tra`, `trang_thai_thanh_toan`, `ngay_du_kien`, `ngay_nhap`, `id_nguoi_kiem`, `muc_do_uu_tien`) VALUES
('44935fe4-5b53-11f1-8d3a-088fc37729cd', 'NK-20260529-134101-63', 1, NULL, NULL, NULL, 500000, 'Nhập hàng từ nhà cung cấp', '', 4, '2026-05-29 18:41:01', 0, 0, '2026-05-29 00:00:00', NULL, NULL, 0),
('4f39a13e-5c28-11f1-a6a6-088fc37729cd', 'XK20260530150529', 2, NULL, NULL, NULL, 25200000, 'f', '', 3, '2026-05-30 20:06:01', 0, 0, NULL, '2026-05-30 20:06:49', NULL, 0),
('5494ba8f-5c26-11f1-a6a6-088fc37729cd', 'XK20260530145058', 2, NULL, NULL, NULL, 1260000, 'h', '', 4, '2026-05-30 19:51:51', 0, 0, NULL, NULL, NULL, 0),
('bd00b99f-5c24-11f1-a6a6-088fc37729cd', 'NK-20260530-144028-37', 1, NULL, '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 6750000, 'Nhập hàng từ nhà cung cấp', '', 3, '2026-05-30 19:40:28', 6750000, 2, '2026-05-30 00:00:00', '2026-05-30 19:43:06', NULL, 0),
('faedbdeb-5c1f-11f1-a6a6-088fc37729cd', 'NK-20260530-140624-96', 1, NULL, '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 6750000, 'Nhập hàng từ nhà cung cấp', '', 3, '2026-05-30 19:06:24', 6750000, 2, '2026-05-30 00:00:00', '2026-05-30 19:31:16', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_kiem_ke`
--

CREATE TABLE `phieu_kiem_ke` (
  `id` char(36) NOT NULL,
  `ma_phieu` varchar(50) NOT NULL,
  `ten_dot` varchar(200) DEFAULT NULL,
  `id_kho` char(36) NOT NULL,
  `loai_kiem_ke` varchar(50) DEFAULT 'To??n kho' COMMENT 'To??n kho, Danh m???c, S???n ph???m, Lo???i ????, ?????nh k???',
  `trang_thai` tinyint(4) DEFAULT 0 COMMENT '0: Nh??p, 1: ??ang ki???m k??, 2: Ch??? duy???t, 3: ???? duy???t, 4: ???? ??i???u ch???nh kho, 5: Ho??n t???t, 6: ???? h???y',
  `ghi_chu` text DEFAULT NULL,
  `id_nguoi_tao` char(36) DEFAULT NULL,
  `id_nguoi_duyet` char(36) DEFAULT NULL,
  `nguoi_kiem_ke` varchar(500) DEFAULT NULL COMMENT 'Danh s??ch t??n ng?????i ki???m k??, ph??n c??ch b???i d???u ph???y',
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `han_hoan_tat` date DEFAULT NULL,
  `ngay_duyet` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_kiem_ke`
--

INSERT INTO `phieu_kiem_ke` (`id`, `ma_phieu`, `ten_dot`, `id_kho`, `loai_kiem_ke`, `trang_thai`, `ghi_chu`, `id_nguoi_tao`, `id_nguoi_duyet`, `nguoi_kiem_ke`, `ngay_tao`, `han_hoan_tat`, `ngay_duyet`) VALUES
('ce3db77d-5cab-11f1-962c-088fc37729cd', 'KK20260531747', '', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Kho Cửa hàng - Tân Bình', 5, '', NULL, NULL, '', '2026-05-31 11:47:19', NULL, '2026-05-31 06:49:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `id` int(11) NOT NULL,
  `ma` varchar(20) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `dieu_kien` varchar(255) DEFAULT NULL,
  `phi` int(11) DEFAULT 0,
  `icon` varchar(50) DEFAULT 'mdi:wallet',
  `thu_tu` int(11) DEFAULT 0,
  `trang_thai` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`id`, `ma`, `ten`, `mo_ta`, `dieu_kien`, `phi`, `icon`, `thu_tu`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'COD', 'Thanh toán khi nhận hàng', 'Khách thanh toán cho nhân viên giao hàng khi nhận sản phẩm', 'Áp dụng toàn bộ đơn hàng.', 0, 'mdi:wallet', 0, 1, '2026-06-01 15:10:04', '2026-06-01 15:19:30'),
(2, 'BANK', 'Chuyển khoản ngân hàng', 'Khách chuyển khoản trước khi shop xử lý đơn', 'Đơn từ 0đ', 0, 'mdi:bank-transfer', 1, 1, '2026-06-01 15:10:04', '2026-06-01 15:10:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_van_chuyen`
--

CREATE TABLE `phuong_thuc_van_chuyen` (
  `id` int(11) NOT NULL,
  `ma` varchar(20) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `khu_vuc` varchar(100) DEFAULT 'Toàn quốc',
  `thoi_gian` varchar(50) DEFAULT NULL,
  `phi_mac_dinh` int(11) DEFAULT 0,
  `freeship_tu` int(11) DEFAULT 0,
  `icon` varchar(50) DEFAULT 'mdi:truck-outline',
  `thu_tu` int(11) DEFAULT 0,
  `trang_thai` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_van_chuyen`
--

INSERT INTO `phuong_thuc_van_chuyen` (`id`, `ma`, `ten`, `mo_ta`, `khu_vuc`, `thoi_gian`, `phi_mac_dinh`, `freeship_tu`, `icon`, `thu_tu`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'STD', 'Giao hàng tiêu chuẩn', 'Giao toàn quốc trong 2 - 5 ngày', 'Toàn quốc', '2 - 5 ngày', 30000, 500000, 'mdi:truck-outline', 0, 1, '2026-06-01 15:10:04', '2026-06-01 15:10:04'),
(2, 'FAST', 'Giao hàng nhanh', 'Giao tốc hành nội thành và liên tỉnh', 'Toàn quốc', '1 - 2 ngày', 50000, 0, 'mdi:truck-fast-outline', 1, 1, '2026-06-01 15:10:04', '2026-06-01 15:20:30'),
(3, 'STORE', 'Nhận tại cửa hàng', 'Khách đến cửa hàng lấy hàng trực tiếp', 'Hà Nội', 'Lấy ngay', 0, 0, 'mdi:store', 2, 1, '2026-06-01 15:10:04', '2026-06-01 15:10:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quy_tac_freeship`
--

CREATE TABLE `quy_tac_freeship` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `khu_vuc_ap_dung` varchar(255) DEFAULT NULL,
  `dieu_kien` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quy_tac_freeship`
--

INSERT INTO `quy_tac_freeship` (`id`, `ten`, `khu_vuc_ap_dung`, `dieu_kien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Freeship đơn từ 500.000đ', 'Áp dụng toàn quốc', 'Đơn từ 500.000đ', 1, '2026-06-01 15:10:04', '2026-06-01 15:10:04'),
(2, 'Freeship cho hạng Diamond', 'Áp dụng mọi đơn hàng', 'Hạng Diamond', 1, '2026-06-01 15:10:04', '2026-06-01 15:10:04');

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
  `don_vi_tinh` varchar(30) NOT NULL DEFAULT 'Cái' COMMENT 'Đơn vị tính: Cái, Sợi, Chuỗi, Viên, Bộ, Hộp, Thùng, Gram, Kg',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `da_xoa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `tong_ton_kho`, `luot_xem`, `trang_thai`, `don_vi_tinh`, `ngay_tao`, `da_xoa`) VALUES
('sp_001', 'SP0001', 'Bột Xông Nhà', 'san-pham-bot-xong-nha-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_bot', 'ld_7', 'menh_2', 420000, 1020000, 816000, 'Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '<p><strong>Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p><h3>1. Thông tin chi tiết sản phẩm</h3><ul><li><strong>Tên sản phẩm:</strong> Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li><li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li><li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li><li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li><li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li><li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li><li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li></ul><h3>2. Lợi ích và điểm nổi bật</h3><ul><li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li><li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li><li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li><li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li><li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li></ul><h3>3. Hướng dẫn chọn size</h3><ul><li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li><li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li><li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li></ul><p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p><h3>4. Hướng dẫn sử dụng và bảo quản</h3><ul><li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li><li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li><li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li><li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li></ul><h3>5. Cam kết của shop</h3><ul><li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li><li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li><li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li><li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li></ul><p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg', 365, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_002', 'SP0002', 'Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích', 'chuoi-ngoc-muc-duc-a-mix-lu-thong-binh-an-ngoc-bich-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_4', 'menh_2', 210000, 810000, 688500, 'Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Mực Dục tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Mực Dục 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Lục Đậm, Đen Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay ngọc mực dục, ngọc tự nhiên, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-1.jpg', 124, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_003', 'SP0003', 'Mã Não Mật Mèo Mụp', 'vong-tay-ma-nao-mat-meo-mup-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_1', 'menh_5', 1050000, 1350000, 1150000, 'Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-1.jpg', 190, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_004', 'SP0004', 'Ngọc Hòa Điền Màu Nhã Nhặn', 'vong-tay-ngoc-hoa-dien-mau-nha-nhan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_5', 'menh_2', 1120000, 1520000, 500000, 'Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-1.jpg', 149, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_005', 'SP0005', 'Ngọc Hòa Điền Tân Cương', 'vong-tay-ngoc-hoa-dien-tan-cuong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_6', 'menh_5', 910000, 1410000, 1128000, 'Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-1.jpg', 290, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_006', 'SP0006', 'Ngọc Liu Ninh Thiên Thanh Đông', 'vong-tay-ngoc-liu-ninh-thien-thanh-dong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_3', 'menh_4', 910000, 1510000, 1283500, 'Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Liu Ninh tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Liu Ninh 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Rêu, Xanh Thanh</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc liu ninh, vòng ngọc tự nhiên, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-1.jpg', 98, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_007', 'SP0007', 'Tràng Hạt Ngọc Hòa Điền', 'vong-tay-trang-hat-ngoc-hoa-dien-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_8', 'menh_4', 1050000, 1350000, 1150000, 'Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-1.jpg', 215, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_008', 'SP0008', 'Tràng San Hô Niệm Phật', 'vong-tay-trang-san-ho-niem-phat-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_3', 'menh_4', 560000, 960000, 500000, 'Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu San Hô tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> San Hô 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Trắng</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay san hô, san hô đỏ, trang sức biển, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-1.jpg', 105, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_009', 'SP0009', 'Vòng Thời Trang Xinh Yêu', 'vong-thoi-trang-xinh-yeu-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_1', 'menh_5', 770000, 1170000, 936000, 'Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg', 126, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_010', 'SP0010', 'Vòng Đá Mã Não', 'vong-da-ma-nao-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_3', 'menh_4', 700000, 1200000, 1020000, 'Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg', 199, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_011', 'SP0011', 'Nhang', 'san-pham-nhang-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tramhuong', 'ld_3', 'menh_4', 1120000, 1520000, 1320000, 'Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg', 231, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_012', 'SP0012', 'Tram Huong', 'san-pham-tram-huong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tramhuong', 'ld_4', 'menh_3', 490000, 790000, 500000, 'Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg', 213, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_013', 'SP0013', 'Hồng Anh Đào Ngọc Nương Tử', 'vong-tay-hong-anh-dao-ngoc-nuong-tu-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_8', 'menh_4', 840000, 1140000, 912000, 'Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Hồng Anh Đào tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Hồng Anh Đào 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Hồng Nhạt, Trắng Vân Hồng</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> đá hồng anh đào, vòng tay nữ, vòng thạch anh hồng, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg', 180, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_014', 'SP0014', 'Hồng Đào Điểm Son', 'vong-tay-hong-dao-diem-son-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_3', 'menh_4', 1120000, 1520000, 1292000, 'Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg', 185, 0, 1, 'Cái', '2026-05-28 11:33:25', 0);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `tong_ton_kho`, `luot_xem`, `trang_thai`, `don_vi_tinh`, `ngay_tao`, `da_xoa`) VALUES
('sp_015', 'SP0015', 'Mã Não Anh Đào', 'vong-tay-ma-nao-anh-dao-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_2', 'menh_5', 910000, 1310000, 1110000, 'Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg', 125, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_016', 'SP0016', 'Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng', 'vong-tay-ma-nao-anh-dao-diem-hoa-trong-co-vay-rong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_6', 'menh_1', 280000, 680000, 500000, 'Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-1.jpg', 115, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_017', 'SP0017', 'Mã Não Hồng Bưởi', 'vong-tay-ma-nao-hong-buoi-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_7', 'menh_2', 770000, 1070000, 856000, 'Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg', 120, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_018', 'SP0018', 'Ngọc Lăng Đông Đôn Hoàng', 'vong-tay-ngoc-lang-dong-don-hoang-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_2', 'menh_5', 1120000, 1520000, 1292000, 'Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Lăng Đông tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Lăng Đông 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Nâu Vàng, Hổ Phách</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc lăng đông, vòng ngọc quà tặng, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-1.jpg', 174, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_019', 'SP0019', 'Ngọc Tụ Nham Liu Ninh', 'vong-tay-ngoc-tu-nham-liu-ninh-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_2', 'menh_5', 910000, 1410000, 1210000, 'Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Tụ Nham tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Tụ Nham 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Trong, Vân Mây</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc tụ nham, vòng tay phong thủy ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-1.jpg', 84, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_020', 'SP0020', 'Ngọc Tụ Nham Vân Mây', 'vong-tay-ngoc-tu-nham-van-may-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_8', 'menh_4', 910000, 1510000, 500000, 'Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Tụ Nham tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Tụ Nham 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Trong, Vân Mây</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc tụ nham, vòng tay phong thủy ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg', 125, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_021', 'SP0021', 'Shentacui Bánh Đậu Mứt Cam', 'vong-tay-shentacui-banh-dau-mut-cam-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_4', 'menh_2', 1050000, 1350000, 1080000, 'Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg', 187, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_022', 'SP0022', 'Sâm Panh Thuần', 'vong-tay-sam-panh-thuan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_5', 'menh_4', 1190000, 1790000, 1521500, 'Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg', 171, 0, 1, 'Cái', '2026-05-28 11:33:25', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_bien_the`
--

CREATE TABLE `san_pham_bien_the` (
  `id` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `thuoc_tinh` varchar(100) NOT NULL COMMENT 'VD: Size 10mm',
  `so_luong_ton` int(11) NOT NULL DEFAULT 0,
  `so_luong_tam_giu` int(11) NOT NULL DEFAULT 0,
  `gia_cong_them` decimal(15,0) NOT NULL DEFAULT 0,
  `nguong_canh_bao` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham_bien_the`
--

INSERT INTO `san_pham_bien_the` (`id`, `id_san_pham`, `thuoc_tinh`, `so_luong_ton`, `so_luong_tam_giu`, `gia_cong_them`, `nguong_canh_bao`) VALUES
('bt_6a17ca3f31802_4999', 'sp_001', 'Size 12mm', 108, 0, 0, 5),
('bt_6a17ca3f31b18_5076', 'sp_001', 'Size 14mm', 140, 0, 10000, 5),
('bt_6a17ca3f31dac_1378', 'sp_001', 'Size 8mm', 115, 0, 100000, 5),
('bt_6a17ca3f32ac5_4697', 'sp_002', 'Size 14mm', 70, 0, 0, 5),
('bt_6a17ca3f32f2c_1814', 'sp_002', 'Size 8mm', 23, 0, 40000, 5),
('bt_6a17ca3f3343d_7665', 'sp_002', 'Size 12mm', 31, 0, 20000, 5),
('bt_6a17ca3f33d03_1597', 'sp_003', 'Size 12mm', 20, 0, 0, 5),
('bt_6a17ca3f3413a_2487', 'sp_003', 'Size 14mm', 50, 0, 40000, 5),
('bt_6a17ca3f34555_1778', 'sp_003', 'Size 10mm', 80, 0, 100000, 5),
('bt_6a17ca3f34956_1505', 'sp_003', 'Size 8mm', 40, 0, 120000, 5),
('bt_6a17ca3f352d2_7083', 'sp_004', 'Màu đậm', 30, 0, 0, 5),
('bt_6a17ca3f356ff_3946', 'sp_004', 'Màu tự nhiên', 39, 0, 20000, 5),
('bt_6a17ca3f35b27_1230', 'sp_004', 'Màu nhạt', 80, 0, 40000, 5),
('bt_6a17ca3f35fd8_5708', 'sp_005', 'Size 10mm', 70, 0, 0, 5),
('bt_6a17ca3f3624c_2637', 'sp_005', 'Size 12mm', 100, 0, 40000, 5),
('bt_6a17ca3f3648f_7582', 'sp_005', 'Size 14mm', 70, 0, 40000, 5),
('bt_6a17ca3f36705_1246', 'sp_005', 'Size 8mm', 50, 0, 60000, 5),
('bt_6a17ca3f36ee0_2672', 'sp_006', 'Size 14mm', 44, 0, 0, 5),
('bt_6a17ca3f372d5_2690', 'sp_006', 'Size 12mm', 54, 0, 20000, 5),
('bt_6a17ca3f37bf0_7610', 'sp_007', 'Màu nhạt', 77, 0, 0, 5),
('bt_6a17ca3f38210_9526', 'sp_007', 'Màu tự nhiên', 67, 0, 40000, 5),
('bt_6a17ca3f387f9_5857', 'sp_007', 'Màu đậm', 71, 0, 100000, 5),
('bt_6a17ca3f39289_9497', 'sp_008', 'Size 14mm', 30, 0, 0, 5),
('bt_6a17ca3f396f6_4341', 'sp_008', 'Size 12mm', 20, 0, 50000, 5),
('bt_6a17ca3f39b7a_1941', 'sp_008', 'Size 8mm', 55, 0, 20000, 5),
('bt_6a17ca3f3a3c8_9509', 'sp_009', 'Màu đậm', 46, 0, 0, 5),
('bt_6a17ca3f3a780_2488', 'sp_009', 'Màu tự nhiên', 60, 0, 40000, 5),
('bt_6a17ca3f3ab4f_3277', 'sp_009', 'Màu nhạt', 20, 0, 60000, 5),
('bt_6a17ca3f3b300_5532', 'sp_010', 'Size 8mm', 87, 0, 0, 5),
('bt_6a17ca3f3b7a5_8182', 'sp_010', 'Size 12mm', 77, 0, 20000, 5),
('bt_6a17ca3f3bcdc_6964', 'sp_010', 'Size 14mm', 35, 0, 100000, 5),
('bt_6a17ca3f3c1e0_7068', 'sp_011', 'Size 8mm', 69, 0, 0, 5),
('bt_6a17ca3f3c435_9741', 'sp_011', 'Size 12mm', 47, 0, 30000, 5),
('bt_6a17ca3f3c6b9_8385', 'sp_011', 'Size 10mm', 85, 0, 40000, 5),
('bt_6a17ca3f3c903_3115', 'sp_011', 'Size 14mm', 30, 0, 30000, 5),
('bt_6a17ca3f3cd6a_2743', 'sp_012', 'Size 12mm', 75, 0, 0, 5),
('bt_6a17ca3f3cf3f_7131', 'sp_012', 'Size 10mm', 70, 0, 30000, 5),
('bt_6a17ca3f3d357_6692', 'sp_012', 'Size 8mm', 68, 0, 100000, 5),
('bt_6a17ca3f3db8f_3782', 'sp_013', 'Màu tự nhiên', 20, 0, 0, 5),
('bt_6a17ca3f3df49_2169', 'sp_013', 'Màu nhạt', 75, 0, 10000, 5),
('bt_6a17ca3f3e2f0_9774', 'sp_013', 'Màu đậm', 85, 0, 20000, 5),
('bt_6a17ca3f3eab5_8602', 'sp_014', 'Màu nhạt', 100, 0, 0, 5),
('bt_6a17ca3f3eece_6613', 'sp_014', 'Màu đậm', 55, 0, 20000, 5),
('bt_6a17ca3f3f2d3_5674', 'sp_014', 'Màu tự nhiên', 30, 0, 40000, 5),
('bt_6a17ca3f3faf2_3949', 'sp_015', 'Màu tự nhiên', 50, 0, 0, 5),
('bt_6a17ca3f3fe6d_9123', 'sp_015', 'Màu nhạt', 75, 0, 10000, 5),
('bt_6a17ca3f40626_6797', 'sp_016', 'Size 14mm', 45, 0, 0, 5),
('bt_6a17ca3f40a17_2289', 'sp_016', 'Size 10mm', 70, 0, 10000, 5),
('bt_6a17ca3f411b4_4886', 'sp_017', 'Màu tự nhiên', 30, 0, 0, 5),
('bt_6a17ca3f4151f_8482', 'sp_017', 'Màu nhạt', 90, 0, 50000, 5),
('bt_6a17ca3f41c25_8343', 'sp_018', 'Size 8mm', 30, 0, 0, 5),
('bt_6a17ca3f41d81_7284', 'sp_018', 'Size 14mm', 84, 0, 10000, 5),
('bt_6a17ca3f41eeb_6366', 'sp_018', 'Size 12mm', 60, 0, 100000, 5),
('bt_6a17ca3f42208_2267', 'sp_019', 'Màu nhạt', 54, 0, 0, 5),
('bt_6a17ca3f42542_6921', 'sp_019', 'Màu tự nhiên', 30, 0, 20000, 5),
('bt_6a17ca3f42c4f_2357', 'sp_020', 'Size 10mm', 40, 0, 0, 5),
('bt_6a17ca3f42fc2_2526', 'sp_020', 'Size 12mm', 50, 0, 10000, 5),
('bt_6a17ca3f43353_5705', 'sp_020', 'Size 14mm', 35, 0, 80000, 5),
('bt_6a17ca3f43ad2_1326', 'sp_021', 'Size 14mm', 55, 0, 0, 5),
('bt_6a17ca3f43eaf_3226', 'sp_021', 'Size 10mm', 40, 0, 10000, 5),
('bt_6a17ca3f442b1_3626', 'sp_021', 'Size 12mm', 70, 0, 80000, 5),
('bt_6a17ca3f446f2_6943', 'sp_021', 'Size 8mm', 22, 0, 30000, 5),
('bt_6a17ca3f44eb1_1876', 'sp_022', 'Size 10mm', 75, 0, 0, 5),
('bt_6a17ca3f452ab_9530', 'sp_022', 'Size 8mm', 35, 0, 50000, 5),
('bt_6a17ca3f456ae_2640', 'sp_022', 'Size 14mm', 11, 0, 80000, 5),
('bt_6a17ca3f45a76_9908', 'sp_022', 'Size 12mm', 50, 0, 120000, 5);

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
('img_0001', 'sp_001', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg'),
('img_0002', 'sp_001', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-2.jpg'),
('img_0003', 'sp_001', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-3.jpg'),
('img_0004', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-1.jpg'),
('img_0005', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-2.jpg'),
('img_0006', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-3.jpg'),
('img_0007', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-4.jpg'),
('img_0008', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-5.jpg'),
('img_0009', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-1.jpg'),
('img_0010', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-2.jpg'),
('img_0011', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-3.jpg'),
('img_0012', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-4.jpg'),
('img_0013', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-5.jpg'),
('img_0014', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-6.jpg'),
('img_0015', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-7.jpg'),
('img_0016', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-8.jpg'),
('img_0017', 'sp_004', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-1.jpg'),
('img_0018', 'sp_004', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-2.jpg'),
('img_0019', 'sp_004', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-3.jpg'),
('img_0020', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-1.jpg'),
('img_0021', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-2.jpg'),
('img_0022', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-3.jpg'),
('img_0023', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-4.jpg'),
('img_0024', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-5.jpg'),
('img_0025', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-1.jpg'),
('img_0026', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-2.jpg'),
('img_0027', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-3.jpg'),
('img_0028', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-4.jpg'),
('img_0029', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-1.jpg'),
('img_0030', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-2.jpg'),
('img_0031', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-3.jpg'),
('img_0032', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-4.jpg'),
('img_0033', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-1.jpg'),
('img_0034', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-2.jpg'),
('img_0035', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-3.jpg'),
('img_0036', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-4.jpg'),
('img_0037', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-5.jpg'),
('img_0038', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-6.jpg'),
('img_0039', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg'),
('img_0040', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-2.jpg'),
('img_0041', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-3.jpg'),
('img_0042', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-4.jpg'),
('img_0043', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-5.jpg'),
('img_0044', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-6.jpg'),
('img_0045', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-7.jpg'),
('img_0046', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-8.jpg'),
('img_0047', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg'),
('img_0048', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-2.jpg'),
('img_0049', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-3.jpg'),
('img_0050', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-4.jpg'),
('img_0051', 'sp_011', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg'),
('img_0052', 'sp_011', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-2.jpg'),
('img_0053', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'),
('img_0054', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-2.jpg'),
('img_0055', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-3.jpg'),
('img_0056', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-4.jpg'),
('img_0057', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg'),
('img_0058', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-2.jpg'),
('img_0059', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-3.jpg'),
('img_0060', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-4.jpg'),
('img_0061', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg'),
('img_0062', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg'),
('img_0063', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-3.jpg'),
('img_0064', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-4.jpg'),
('img_0065', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg'),
('img_0066', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-2.jpg'),
('img_0067', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-3.jpg'),
('img_0068', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-4.jpg'),
('img_0069', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-1.jpg'),
('img_0070', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-2.jpg'),
('img_0071', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-3.jpg'),
('img_0072', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-4.jpg'),
('img_0073', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg'),
('img_0074', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-2.jpg'),
('img_0075', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-3.jpg'),
('img_0076', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-4.jpg'),
('img_0077', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-5.jpg'),
('img_0078', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-6.jpg'),
('img_0079', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-7.jpg'),
('img_0080', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-1.jpg'),
('img_0081', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-2.jpg'),
('img_0082', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-3.jpg'),
('img_0083', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-4.jpg'),
('img_0084', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-1.jpg'),
('img_0085', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-2.jpg'),
('img_0086', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-3.jpg'),
('img_0087', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-4.jpg'),
('img_0088', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-5.jpg'),
('img_0089', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-6.jpg'),
('img_0090', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-7.jpg'),
('img_0091', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-8.jpg'),
('img_0092', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg'),
('img_0093', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (2).jpg'),
('img_0094', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg'),
('img_0095', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-4.jpg'),
('img_0096', 'sp_021', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg'),
('img_0097', 'sp_021', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (2).jpg'),
('img_0098', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg'),
('img_0099', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-2.jpg'),
('img_0100', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-3.jpg'),
('img_0101', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_vi_tri`
--

CREATE TABLE `san_pham_vi_tri` (
  `id` char(36) NOT NULL,
  `id_vi_tri` char(36) NOT NULL,
  `id_bien_the` char(36) NOT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham_vi_tri`
--

INSERT INTO `san_pham_vi_tri` (`id`, `id_vi_tri`, `id_bien_the`, `so_luong`, `ngay_cap_nhat`) VALUES
('1b7b07fc-5c25-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', 30, '2026-05-30 13:06:49'),
('1b7b27a9-5c25-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', 20, '2026-05-31 04:44:44'),
('81f6898c-5cab-11f1-962c-088fc37729cd', '3fc9422f-5c1f-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31802_4999', 10, '2026-05-31 04:45:11'),
('81f69d9a-5cab-11f1-962c-088fc37729cd', '3fc9422f-5c1f-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', 10, '2026-05-31 04:45:11'),
('81f6c638-5cab-11f1-962c-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', 10, '2026-05-31 04:45:11'),
('d36c04c6-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31802_4999', 51, '2026-05-31 04:44:44'),
('d36c28c1-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', 42, '2026-05-30 11:43:50'),
('d36c4396-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31b18_5076', 13, '2026-05-31 04:44:44'),
('d36c5c07-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f31dac_1378', 35, '2026-05-30 11:43:50'),
('d36c7370-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f32ac5_4697', 36, '2026-05-30 11:43:50'),
('d36c8f85-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f32ac5_4697', 34, '2026-05-30 11:43:50'),
('d36cb166-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f32f2c_1814', 23, '2026-05-30 11:43:50'),
('d36ce2b4-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3343d_7665', 14, '2026-05-30 11:43:50'),
('d36d282d-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3343d_7665', 17, '2026-05-30 11:43:50'),
('d36d5b11-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f33d03_1597', 16, '2026-05-30 11:43:50'),
('d36d92aa-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3413a_2487', 20, '2026-05-30 11:43:50'),
('d36db266-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3413a_2487', 27, '2026-05-30 11:43:50'),
('d36dcdc7-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f34555_1778', 47, '2026-05-30 11:43:50'),
('d36de8e5-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f34555_1778', 31, '2026-05-30 11:43:50'),
('d36e0143-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f34956_1505', 39, '2026-05-30 11:43:50'),
('d36e197e-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f352d2_7083', 35, '2026-05-30 11:43:50'),
('d36e4cfb-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f356ff_3946', 38, '2026-05-30 11:43:50'),
('d36e8019-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f35b27_1230', 36, '2026-05-30 11:43:50'),
('d36eadf3-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f35b27_1230', 49, '2026-05-30 11:43:50'),
('d36ee38a-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f35fd8_5708', 48, '2026-05-30 11:43:50'),
('d36f1878-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f35fd8_5708', 27, '2026-05-30 11:43:50'),
('d36f4e89-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3624c_2637', 47, '2026-05-30 11:43:50'),
('d36f7ce5-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3624c_2637', 47, '2026-05-30 11:43:50'),
('d36faa18-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3648f_7582', 17, '2026-05-30 11:43:50'),
('d36fd328-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3648f_7582', 44, '2026-05-30 11:43:50'),
('d36ff7e1-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f36705_1246', 10, '2026-05-30 11:43:50'),
('d3700f27-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f36705_1246', 28, '2026-05-30 11:43:50'),
('d3702db6-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f36ee0_2672', 44, '2026-05-30 11:43:50'),
('d3704a29-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f372d5_2690', 24, '2026-05-30 11:43:50'),
('d3706372-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f372d5_2690', 30, '2026-05-30 11:43:50'),
('d37087b9-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f37bf0_7610', 29, '2026-05-30 11:43:50'),
('d370aeaa-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f37bf0_7610', 48, '2026-05-30 11:43:50'),
('d370d2c4-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f38210_9526', 18, '2026-05-30 11:43:50'),
('d370f627-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f38210_9526', 49, '2026-05-30 11:43:50'),
('d37121ed-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f387f9_5857', 31, '2026-05-30 11:43:50'),
('d3715432-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f387f9_5857', 40, '2026-05-30 11:43:50'),
('d3718187-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f39289_9497', 25, '2026-05-30 11:43:50'),
('d371adc0-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f396f6_4341', 19, '2026-05-30 11:43:50'),
('d371d6a4-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f39b7a_1941', 20, '2026-05-30 11:43:50'),
('d371eeb6-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f39b7a_1941', 34, '2026-05-30 11:43:50'),
('d3720107-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3a3c8_9509', 46, '2026-05-30 11:43:50'),
('d37215d3-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3a780_2488', 42, '2026-05-30 11:43:50'),
('d3722bff-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3a780_2488', 16, '2026-05-30 11:43:50'),
('d3724c4b-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3ab4f_3277', 16, '2026-05-30 11:43:50'),
('d3727cb9-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3b300_5532', 49, '2026-05-30 11:43:50'),
('d372a5c4-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3b300_5532', 32, '2026-05-30 11:43:50'),
('d372cffc-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3b7a5_8182', 49, '2026-05-30 11:43:50'),
('d372f77e-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3b7a5_8182', 28, '2026-05-30 11:43:50'),
('d3731e97-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3bcdc_6964', 34, '2026-05-30 11:43:50'),
('d3734dc1-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c1e0_7068', 24, '2026-05-30 11:43:50'),
('d3738187-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c1e0_7068', 45, '2026-05-30 11:43:50'),
('d373b033-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c435_9741', 47, '2026-05-30 11:43:50'),
('d373dd3a-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c6b9_8385', 46, '2026-05-30 11:43:50'),
('d37407f8-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c6b9_8385', 37, '2026-05-30 11:43:50'),
('d37420c5-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c903_3115', 16, '2026-05-30 11:43:50'),
('d3743571-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3c903_3115', 14, '2026-05-30 11:43:50'),
('d3744f53-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3cd6a_2743', 45, '2026-05-30 11:43:50'),
('d3746c34-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3cd6a_2743', 30, '2026-05-30 11:43:50'),
('d3748c08-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3cf3f_7131', 24, '2026-05-30 11:43:50'),
('d374adb6-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3cf3f_7131', 45, '2026-05-30 11:43:50'),
('d374ca62-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3d357_6692', 40, '2026-05-30 11:43:50'),
('d374e3d7-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3d357_6692', 28, '2026-05-30 11:43:50'),
('d374fd55-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3db8f_3782', 11, '2026-05-30 11:43:50'),
('d3752746-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3df49_2169', 34, '2026-05-30 11:43:50'),
('d3755445-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3df49_2169', 43, '2026-05-30 11:43:50'),
('d37588ed-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3e2f0_9774', 41, '2026-05-30 11:43:50'),
('d375b815-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3e2f0_9774', 41, '2026-05-30 11:43:50'),
('d375d2c7-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3eab5_8602', 47, '2026-05-30 11:43:50'),
('d375ebac-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3eab5_8602', 45, '2026-05-30 11:43:50'),
('d376047d-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3eece_6613', 40, '2026-05-30 11:43:50'),
('d3761b63-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3eece_6613', 14, '2026-05-30 11:43:50'),
('d37632e7-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3f2d3_5674', 24, '2026-05-30 11:43:50'),
('d3764a2f-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3faf2_3949', 21, '2026-05-30 11:43:50'),
('d37664d9-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3faf2_3949', 29, '2026-05-30 11:43:50'),
('d3767d92-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3fe6d_9123', 38, '2026-05-30 11:43:50'),
('d3769778-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f3fe6d_9123', 35, '2026-05-30 11:43:50'),
('d376ac10-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f40626_6797', 44, '2026-05-30 11:43:50'),
('d376d181-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f40a17_2289', 45, '2026-05-30 11:43:50'),
('d376f6fc-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f40a17_2289', 29, '2026-05-30 11:43:50'),
('d3771b14-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f411b4_4886', 26, '2026-05-30 11:43:50'),
('d377404c-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f4151f_8482', 49, '2026-05-30 11:43:50'),
('d37765b4-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f4151f_8482', 40, '2026-05-30 11:43:50'),
('d3778cdd-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f41c25_8343', 28, '2026-05-30 11:43:50'),
('d377a0e4-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f41d81_7284', 42, '2026-05-30 11:43:50'),
('d377b3b9-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f41d81_7284', 42, '2026-05-30 11:43:50'),
('d377c7df-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f41eeb_6366', 29, '2026-05-30 11:43:50'),
('d377dfe0-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f41eeb_6366', 29, '2026-05-30 11:43:50'),
('d377fadb-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f42208_2267', 24, '2026-05-30 11:43:50'),
('d3781544-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f42208_2267', 30, '2026-05-30 11:43:50'),
('d3782ed0-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f42542_6921', 22, '2026-05-30 11:43:50'),
('d37841ce-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f42c4f_2357', 20, '2026-05-30 11:43:50'),
('d3785448-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f42c4f_2357', 16, '2026-05-30 11:43:50'),
('d37865f5-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f42fc2_2526', 49, '2026-05-30 11:43:50'),
('d3787ba3-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f43353_5705', 35, '2026-05-30 11:43:50'),
('d3789071-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f43ad2_1326', 34, '2026-05-30 11:43:50'),
('d378a5e2-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f43ad2_1326', 20, '2026-05-30 11:43:50'),
('d378b9c3-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f43eaf_3226', 39, '2026-05-30 11:43:50'),
('d378e0ef-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f442b1_3626', 21, '2026-05-30 11:43:50'),
('d3790672-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f442b1_3626', 39, '2026-05-30 11:43:50'),
('d3793111-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f446f2_6943', 11, '2026-05-30 11:43:50'),
('d3795add-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f446f2_6943', 11, '2026-05-30 11:43:50'),
('d37984d2-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f44eb1_1876', 35, '2026-05-30 11:43:50'),
('d379b5a0-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f44eb1_1876', 38, '2026-05-30 11:43:50'),
('d379e44b-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f452ab_9530', 23, '2026-05-30 11:43:50'),
('d37a0fc4-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f456ae_2640', 11, '2026-05-30 11:43:50'),
('d37a3a32-5c1c-11f1-a6a6-088fc37729cd', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f45a76_9908', 21, '2026-05-30 11:43:50'),
('d37a62b2-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f45a76_9908', 29, '2026-05-30 11:43:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_yeu_thich`
--

CREATE TABLE `san_pham_yeu_thich` (
  `id_nguoi_dung` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham_yeu_thich`
--

INSERT INTO `san_pham_yeu_thich` (`id_nguoi_dung`, `id_san_pham`) VALUES
('kh_6a17dc6aac40c', 'sp_016'),
('kh_6a17dc6aac40c', 'sp_021'),
('kh_6a17dc6aac40c', 'sp_022'),
('kh_6a183864cecd3', 'sp_015'),
('kh_6a183864cecd3', 'sp_017'),
('kh_6a183864cecd3', 'sp_019'),
('kh_6a183864d0640', 'sp_002'),
('kh_6a183864d0640', 'sp_003'),
('kh_6a183864d0640', 'sp_004'),
('kh_6a183864d097f', 'sp_010'),
('kh_6a183864d097f', 'sp_011'),
('kh_6a183864d0cf7', 'sp_018'),
('kh_6a183864d0cf7', 'sp_021'),
('kh_6a183864d1037', 'sp_005'),
('kh_6a183864d1037', 'sp_008'),
('kh_6a183864d1037', 'sp_020'),
('kh_6a183864d1780', 'sp_003'),
('kh_6a183864d1780', 'sp_018'),
('kh_6a183864d1780', 'sp_021'),
('kh_6a183864d1a95', 'sp_012'),
('kh_6a183864d1d81', 'sp_002'),
('kh_6a183864d1d81', 'sp_013'),
('kh_6a183864d239a', 'sp_009'),
('kh_6a183864d2686', 'sp_004'),
('kh_6a183864d2994', 'sp_003'),
('kh_6a183864d2994', 'sp_013'),
('kh_6a183864d2c59', 'sp_003'),
('kh_6a183864d2c59', 'sp_004'),
('kh_6a183864d2c59', 'sp_017'),
('kh_6a183864d3095', 'sp_011'),
('kh_6a183864d3388', 'sp_009'),
('kh_6a183864d3388', 'sp_011'),
('kh_6a183864d3388', 'sp_018'),
('kh_6a183864d3b7c', 'sp_002'),
('kh_6a183864d3b7c', 'sp_012'),
('kh_6a183864d3b7c', 'sp_016'),
('kh_6a183864d404e', 'sp_015'),
('kh_6a183864d4360', 'sp_021'),
('kh_6a183864d49e4', 'sp_005'),
('kh_6a183864d49e4', 'sp_009'),
('kh_6a183864d49e4', 'sp_012'),
('kh_6a183864d4c48', 'sp_012'),
('kh_6a183864d4c48', 'sp_017'),
('kh_6a183864d4c48', 'sp_018'),
('kh_6a183864d5370', 'sp_003'),
('kh_6a183864d5370', 'sp_008'),
('kh_6a183864d56f6', 'sp_006'),
('kh_6a183864d56f6', 'sp_009'),
('kh_6a183864d56f6', 'sp_010'),
('kh_6a183864d5b61', 'sp_015'),
('kh_6a183864d5f72', 'sp_003'),
('kh_6a183864d5f72', 'sp_010'),
('kh_6a183864d62a5', 'sp_003'),
('kh_6a183864d62a5', 'sp_004'),
('kh_6a183864d62a5', 'sp_020'),
('kh_6a183864d6660', 'sp_012'),
('kh_6a183864d6660', 'sp_013'),
('kh_6a183864d6a51', 'sp_008'),
('kh_6a183864d7fc1', 'sp_011'),
('kh_6a183864d8da8', 'sp_005'),
('kh_6a183864d8da8', 'sp_016'),
('kh_6a183864d9216', 'sp_002'),
('kh_6a183864d9674', 'sp_001'),
('kh_6a183864d9674', 'sp_020'),
('kh_6a183864d9674', 'sp_022'),
('kh_6a183864d9b06', 'sp_003'),
('kh_6a183864d9b06', 'sp_013'),
('kh_6a183864da034', 'sp_002'),
('kh_6a183864da4a6', 'sp_016'),
('kh_6a183864da863', 'sp_022'),
('kh_6a183864daccb', 'sp_006'),
('kh_6a183864daccb', 'sp_020'),
('kh_6a183864daccb', 'sp_021'),
('kh_6a183864daf6b', 'sp_008'),
('kh_6a183864daf6b', 'sp_011'),
('kh_6a183864db0c9', 'sp_002'),
('kh_6a183864db37e', 'sp_007'),
('kh_6a183864db37e', 'sp_016'),
('kh_6a183864db7a4', 'sp_008'),
('kh_6a183864db7a4', 'sp_012'),
('kh_6a183864dba87', 'sp_006'),
('kh_6a183864dba87', 'sp_013'),
('kh_6a183864dba87', 'sp_020'),
('kh_6a183864dbed9', 'sp_001'),
('kh_6a183864dc2ce', 'sp_010'),
('kh_6a183864dc2ce', 'sp_011'),
('kh_6a183864dc2ce', 'sp_019'),
('kh_6a183864dc515', 'sp_013'),
('kh_6a183864dc515', 'sp_022'),
('kh_6a183864dcc8c', 'sp_006'),
('kh_6a183864dcc8c', 'sp_020'),
('kh_6a183864dcf8e', 'sp_002'),
('kh_6a183864dcf8e', 'sp_014'),
('kh_6a183864dcf8e', 'sp_021'),
('kh_6a183864dd2b1', 'sp_005'),
('kh_6a183864dd2b1', 'sp_016'),
('kh_6a183864dd2b1', 'sp_022'),
('kh_6a183864dd502', 'sp_007'),
('kh_6a183864dd6ee', 'sp_003'),
('kh_6a183864dd6ee', 'sp_019'),
('kh_6a183864dd94e', 'sp_001'),
('kh_6a183864ddc67', 'sp_001'),
('kh_6a183864ddc67', 'sp_014'),
('kh_6a183864ddc67', 'sp_022'),
('kh_6a183864ddec8', 'sp_006'),
('kh_6a183864de10e', 'sp_007'),
('kh_6a183864de10e', 'sp_022'),
('kh_6a183864de67d', 'sp_002'),
('kh_6a183864de904', 'sp_002'),
('kh_6a183864de904', 'sp_013'),
('kh_6a183864df195', 'sp_003'),
('kh_6a183864df364', 'sp_016'),
('kh_6a183864dfd42', 'sp_001'),
('kh_6a183864dfd42', 'sp_005'),
('kh_6a183864dfd42', 'sp_018'),
('kh_6a183864e01ed', 'sp_018'),
('kh_6a183864e01ed', 'sp_019'),
('kh_6a183864e04e7', 'sp_014'),
('kh_6a183864e04e7', 'sp_021'),
('kh_6a183864e06e7', 'sp_007'),
('kh_6a183864e06e7', 'sp_011'),
('kh_6a183864e06e7', 'sp_019'),
('kh_6a183864e08d6', 'sp_004'),
('kh_6a183864e08d6', 'sp_007'),
('kh_6a183864e0c66', 'sp_006'),
('kh_6a183864e0c66', 'sp_018'),
('kh_6a183864e0f3c', 'sp_003'),
('kh_6a183864e0f3c', 'sp_012'),
('kh_6a183864e0f3c', 'sp_020'),
('kh_6a183864e11be', 'sp_007'),
('kh_6a183864e1347', 'sp_013'),
('kh_6a183864e15ab', 'sp_010'),
('kh_6a183864e1811', 'sp_008'),
('kh_6a183864e1a42', 'sp_002'),
('kh_6a183864e1a42', 'sp_005'),
('kh_6a183864e1c6c', 'sp_002'),
('kh_6a183864e1c6c', 'sp_007'),
('kh_6a183864e2115', 'sp_018'),
('kh_6a183864e22de', 'sp_014'),
('kh_6a183864e22de', 'sp_018'),
('kh_6a183864e2552', 'sp_001'),
('kh_6a183864e2552', 'sp_022'),
('kh_6a183864e27a5', 'sp_003'),
('kh_6a183864e27a5', 'sp_011'),
('kh_6a183864e27a5', 'sp_018'),
('kh_6a183864e297a', 'sp_012'),
('kh_6a183864e2dce', 'sp_001'),
('kh_6a183864e2dce', 'sp_003'),
('kh_6a183864e2dce', 'sp_019'),
('kh_6a183864e3037', 'sp_017'),
('kh_6a183864e3037', 'sp_019'),
('kh_6a183864e324c', 'sp_003'),
('kh_6a183864e324c', 'sp_007'),
('kh_6a183864e340d', 'sp_001'),
('kh_6a183864e340d', 'sp_004'),
('kh_6a183864e340d', 'sp_008'),
('kh_6a183864e35e0', 'sp_005'),
('kh_6a183864e35e0', 'sp_016'),
('kh_6a183864e378b', 'sp_006'),
('kh_6a183864e378b', 'sp_013'),
('kh_6a183864e378b', 'sp_020'),
('kh_6a183864e397e', 'sp_015'),
('kh_6a183864e397e', 'sp_016'),
('kh_6a183864e3bd9', 'sp_015'),
('kh_6a183864e3f0d', 'sp_003'),
('kh_6a183864e3f0d', 'sp_008'),
('kh_6a183864e3f0d', 'sp_017'),
('kh_6a183864e4124', 'sp_004'),
('kh_6a183864e4124', 'sp_010'),
('kh_6a183864e42da', 'sp_021'),
('kh_6a183864e448e', 'sp_014'),
('kh_6a183864e448e', 'sp_018'),
('kh_6a183864e448e', 'sp_021'),
('kh_6a183864e480f', 'sp_015'),
('kh_6a183864e4ad5', 'sp_016'),
('kh_6a183864e4e7a', 'sp_010'),
('kh_6a183864e51d8', 'sp_015'),
('kh_6a183864e5616', 'sp_003'),
('kh_6a183864e5953', 'sp_009'),
('kh_6a183864e5953', 'sp_019'),
('kh_6a183864e5e62', 'sp_021'),
('kh_6a183864e6652', 'sp_005'),
('kh_6a183864e6652', 'sp_013'),
('kh_6a183864e6652', 'sp_021'),
('kh_6a183864e697a', 'sp_007'),
('kh_6a183864e697a', 'sp_019'),
('kh_6a183864e6e30', 'sp_004'),
('kh_6a183864e6e30', 'sp_005'),
('kh_6a183864e6e30', 'sp_006'),
('kh_6a183864e6fe0', 'sp_005'),
('kh_6a183864e6fe0', 'sp_017'),
('kh_6a183864e71db', 'sp_002'),
('kh_6a183864e71db', 'sp_010'),
('kh_6a183864e71db', 'sp_021'),
('kh_6a183864e7836', 'sp_015'),
('kh_6a183864e7836', 'sp_021'),
('kh_6a183864e7c2e', 'sp_005'),
('kh_6a183864e7c2e', 'sp_013'),
('kh_6a183864e7c2e', 'sp_018'),
('kh_6a183864e8353', 'sp_016'),
('kh_6a183864e8353', 'sp_019'),
('kh_6a183864e8353', 'sp_020'),
('kh_6a183864e86dc', 'sp_004'),
('kh_6a183864e86dc', 'sp_009'),
('kh_6a183864e86dc', 'sp_015'),
('kh_6a183864e8eb1', 'sp_014'),
('kh_6a183864e8eb1', 'sp_016'),
('kh_6a183864e8eb1', 'sp_017'),
('kh_6a183864e94fe', 'sp_004'),
('kh_6a183864e94fe', 'sp_019'),
('kh_6a183864e96f0', 'sp_004'),
('kh_6a183864e96f0', 'sp_007'),
('kh_6a183864e9903', 'sp_005'),
('kh_6a183864e9903', 'sp_020'),
('kh_6a183864e9903', 'sp_021'),
('kh_6a183864e9a0f', 'sp_001'),
('kh_6a183864e9a0f', 'sp_002'),
('kh_6a183864e9a0f', 'sp_011'),
('kh_6a183864e9d20', 'sp_002'),
('kh_6a183864e9ff4', 'sp_001'),
('kh_6a183864e9ff4', 'sp_006'),
('kh_6a183864e9ff4', 'sp_017'),
('kh_6a183864ea6ff', 'sp_017'),
('kh_6a183864ea6ff', 'sp_022'),
('kh_6a183864eaa49', 'sp_017'),
('kh_6a183864eae73', 'sp_014'),
('kh_6a183864eb17d', 'sp_002'),
('kh_6a183864eb497', 'sp_009'),
('kh_6a183864eb497', 'sp_014'),
('kh_6a183864eb497', 'sp_021'),
('kh_6a183864eb656', 'sp_008'),
('kh_6a183864eb656', 'sp_017'),
('kh_6a183864eb77f', 'sp_006'),
('kh_6a183864eb77f', 'sp_011'),
('kh_6a183864eb77f', 'sp_018'),
('kh_6a183864eba74', 'sp_009'),
('kh_6a183864eba74', 'sp_020'),
('kh_6a183864ebc34', 'sp_008'),
('kh_6a183864ebc34', 'sp_014'),
('kh_6a183864ebc34', 'sp_018'),
('kh_6a183864ebe1c', 'sp_002'),
('kh_6a183864ebe1c', 'sp_022'),
('kh_6a183864ebfd1', 'sp_001'),
('kh_6a183864ebfd1', 'sp_017'),
('kh_6a183864ebfd1', 'sp_021'),
('kh_6a183864ec1a3', 'sp_007'),
('kh_6a183864ec1a3', 'sp_020'),
('kh_6a183864ec5a2', 'sp_008'),
('kh_6a183864ec5a2', 'sp_019'),
('kh_6a183864eccd3', 'sp_019'),
('kh_6a183864ed3e0', 'sp_004'),
('kh_6a183864ed3e0', 'sp_017'),
('kh_6a183864ed3e0', 'sp_021'),
('kh_6a183864ed5b5', 'sp_003'),
('kh_6a183864ed5b5', 'sp_015'),
('kh_6a183864ed5b5', 'sp_021'),
('kh_6a183864ed76b', 'sp_008'),
('kh_6a183864ed76b', 'sp_011'),
('kh_6a183864ed76b', 'sp_015'),
('kh_6a183864edeab', 'sp_003'),
('kh_6a183864edeab', 'sp_012'),
('kh_6a183864ee308', 'sp_019'),
('kh_6a183864ee45b', 'sp_012'),
('kh_6a183864ee640', 'sp_014'),
('kh_6a183864ee82a', 'sp_015'),
('kh_6a183864ee93f', 'sp_009'),
('kh_6a183864ee93f', 'sp_020'),
('kh_6a183864eec20', 'sp_010'),
('kh_6a183864eec20', 'sp_014'),
('kh_6a183864eec20', 'sp_020'),
('kh_6a183864eedff', 'sp_010'),
('kh_6a183864eefc8', 'sp_006'),
('kh_6a183864eefc8', 'sp_011'),
('kh_6a183864eefc8', 'sp_021'),
('kh_6a183864ef19f', 'sp_007'),
('kh_6a183864ef19f', 'sp_022'),
('kh_6a183864ef344', 'sp_018'),
('kh_6a183864ef344', 'sp_020'),
('kh_6a183864ef344', 'sp_021'),
('kh_6a183864ef4e4', 'sp_002'),
('kh_6a183864ef658', 'sp_010'),
('kh_6a183864ef83f', 'sp_016'),
('kh_6a183864efc56', 'sp_017'),
('kh_6a183864efc56', 'sp_020'),
('kh_6a183864efd8d', 'sp_003'),
('kh_6a183864efd8d', 'sp_018'),
('kh_6a183864efd8d', 'sp_019'),
('kh_6a183864efffd', 'sp_022'),
('kh_6a183864f0202', 'sp_005'),
('kh_6a183864f0202', 'sp_012'),
('kh_6a183864f0202', 'sp_013'),
('kh_6a183864f03e3', 'sp_003'),
('kh_6a183864f03e3', 'sp_021'),
('kh_6a183864f05c2', 'sp_003'),
('kh_6a183864f06ea', 'sp_012'),
('kh_6a183864f06ea', 'sp_014'),
('kh_6a183864f08b4', 'sp_003'),
('kh_6a183864f08b4', 'sp_008'),
('kh_6a183864f08b4', 'sp_014'),
('kh_6a183864f09d1', 'sp_014'),
('kh_6a183864f09d1', 'sp_020'),
('kh_6a183864f0d2f', 'sp_006'),
('kh_6a183864f0f35', 'sp_015'),
('kh_6a183864f0f35', 'sp_021'),
('kh_6a183864f111f', 'sp_020'),
('kh_6a183864f1566', 'sp_003'),
('kh_6a183864f1999', 'sp_007'),
('kh_6a183864f1999', 'sp_008'),
('kh_6a183864f1e48', 'sp_004'),
('kh_6a183864f1e48', 'sp_012'),
('kh_6a183864f1e48', 'sp_013'),
('kh_6a183864f22c1', 'sp_004'),
('user_3', 'sp_003'),
('user_3', 'sp_008');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan_ngan_hang`
--

CREATE TABLE `tai_khoan_ngan_hang` (
  `id` int(11) NOT NULL,
  `ten_ngan_hang` varchar(100) NOT NULL,
  `chu_tai_khoan` varchar(100) NOT NULL,
  `so_tai_khoan` varchar(50) NOT NULL,
  `chi_nhanh` varchar(100) DEFAULT NULL,
  `qr_image` varchar(255) DEFAULT NULL,
  `la_mac_dinh` tinyint(1) DEFAULT 0,
  `trang_thai` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan_ngan_hang`
--

INSERT INTO `tai_khoan_ngan_hang` (`id`, `ten_ngan_hang`, `chu_tai_khoan`, `so_tai_khoan`, `chi_nhanh`, `qr_image`, `la_mac_dinh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Vietcombank', 'CÔNG TY CHUỖI NGỌC', '1234567892', 'Chi nhánh Hội sở chính', 'http://localhost:8080/shopbanhangchuoingoc/public/uploads/bank/qr_1_1780327224.png', 1, 1, '2026-06-01 15:10:04', '2026-06-01 15:20:24');

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

--
-- Đang đổ dữ liệu cho bảng `thong_bao`
--

INSERT INTO `thong_bao` (`id`, `id_nguoi_dung`, `tieu_de`, `noi_dung`, `loai_thong_bao`, `link`, `da_doc`, `ngay_tao`) VALUES
('tb_6a17e7a34af6a', NULL, 'Đơn hàng mới #DH001', 'Khách hàng Nguyễn Văn A vừa đặt Vòng tay Thạch Anh Tóc Vàng. Vui lòng kiểm tra và xử lý đơn hàng sớm nhất.', 'don_hang', '/admin/don-hang/chi-tiet/DH001', 1, '2026-05-28 13:58:43'),
('tb_6a17e7a34b5d5', NULL, 'Cảnh báo bảo mật', 'Có đăng nhập bất thường từ địa chỉ IP 192.168.1.55 vào tài khoản Admin. Vui lòng kiểm tra lại nếu không phải là bạn.', 'he_thong', '/admin/nhat-ky-hoat-dong', 1, '2026-05-28 13:58:43'),
('tb_6a17e7a34bb81', NULL, 'Đánh giá 5 sao từ khách hàng', 'Khách hàng Trần B vừa để lại đánh giá 5 sao cho sản phẩm Vòng Cẩm Thạch: \"Sản phẩm rất đẹp, đóng gói cẩn thận. Sẽ ủng hộ shop dài dài.\"', 'danh_gia', '/admin/binh-luan', 1, '2026-05-28 13:58:43'),
('tb_6a17e7a34c3e8', NULL, 'Thành viên mới đăng ký', 'Lê Văn C vừa đăng ký tài khoản mới trên hệ thống.', 'tai_khoan', '/admin/khach-hang', 1, '2026-05-28 13:58:43'),
('tb_6a17e7a34c66e', NULL, 'Sắp hết hàng trong kho', 'Sản phẩm Nhẫn Mắt Hổ Size 16mm hiện chỉ còn 2 chiếc trong kho. Vui lòng lên kế hoạch nhập hàng.', 'kho', '/admin/ton-kho', 1, '2026-05-28 13:58:43'),
('tb_6a183bb1d9dec', 'kh_6a183864d1037', 'Quà tặng đặc biệt dành cho bạn!', 'Chuỗi Ngọc xin tặng bạn mã giảm giá 10% cho lần mua sắm tiếp theo. Cảm ơn bạn đã luôn ủng hộ!', 'he_thong', NULL, 0, '2026-05-28 19:57:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuyen_chuyen_kho`
--

CREATE TABLE `thuyen_chuyen_kho` (
  `id` char(36) NOT NULL,
  `ma_phieu` varchar(50) NOT NULL,
  `id_kho_gui` char(36) NOT NULL,
  `id_kho_nhan` char(36) NOT NULL,
  `loai_chuyen` varchar(50) DEFAULT 'Chuy???n n???i b???',
  `muc_do_uu_tien` tinyint(4) DEFAULT 0 COMMENT '0: B??nh th?????ng, 1: G???p',
  `trang_thai` tinyint(4) DEFAULT 0 COMMENT '0: Nh??p, 1: Ch??? x??c nh???n, 2: ???? duy???t, 3: ??ang chuy???n, 4: ???? ho??n t???t, 5: C?? l???i/thi???u h??ng, 6: ???? h???y',
  `ghi_chu` text DEFAULT NULL,
  `ly_do_huy` text DEFAULT NULL,
  `id_nguoi_tao` char(36) DEFAULT NULL,
  `id_nguoi_duyet` char(36) DEFAULT NULL,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_duyet` datetime DEFAULT NULL,
  `ngay_chuyen` datetime DEFAULT NULL,
  `ngay_nhan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuyen_chuyen_kho`
--

INSERT INTO `thuyen_chuyen_kho` (`id`, `ma_phieu`, `id_kho_gui`, `id_kho_nhan`, `loai_chuyen`, `muc_do_uu_tien`, `trang_thai`, `ghi_chu`, `ly_do_huy`, `id_nguoi_tao`, `id_nguoi_duyet`, `ngay_tao`, `ngay_duyet`, `ngay_chuyen`, `ngay_nhan`) VALUES
('62182a4e-5cab-11f1-962c-088fc37729cd', 'CK20260531999', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'd36b5bba-5c1c-11f1-a6a6-088fc37729cd', 'Chuyển nội bộ', 0, 4, '', NULL, NULL, NULL, '2026-05-31 11:44:18', '2026-05-31 06:44:29', '2026-05-31 06:44:44', '2026-05-31 06:45:11');

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
  `ten_chuong_trinh` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `pham_vi_san_pham` varchar(50) DEFAULT 'all',
  `doi_tuong` varchar(50) DEFAULT 'all',
  `hang_thanh_vien` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`hang_thanh_vien`)),
  `is_combine` tinyint(1) DEFAULT 0,
  `loai_giam` tinyint(1) NOT NULL COMMENT '1: Phầm trăm (%), 2: Tiền mặt',
  `gia_tri` decimal(15,0) NOT NULL,
  `don_toi_thieu` decimal(15,0) DEFAULT 0,
  `giam_toi_da` decimal(15,0) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `da_dung` int(11) NOT NULL DEFAULT 0,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `ma_voucher`, `ten_chuong_trinh`, `mo_ta`, `pham_vi_san_pham`, `doi_tuong`, `hang_thanh_vien`, `is_combine`, `loai_giam`, `gia_tri`, `don_toi_thieu`, `giam_toi_da`, `so_luong`, `da_dung`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('', 'VIP4BB211', 'Chương trình giảm tiền siêu hot 1', 'Mô tả chi tiết cho chương trình VIP4BB211', 'all', 'all', '[\"silver\"]', 0, 2, 160000, 500000, 0, 129, 0, '2026-05-22 04:17:53', '2026-06-14 04:17:53', 1, '2026-06-01 09:17:53', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62020db', 'NEWD9A611', 'Chương trình miễn phí ship siêu hot 1', 'Mô tả chi tiết cho chương trình NEWD9A611', 'all', 'all', NULL, 1, 3, 0, 400000, 50000, -1, 0, '2026-06-03 04:20:00', '2026-06-14 04:20:00', 1, '2026-06-01 09:20:18', '2026-06-01 15:31:54'),
('vc_seed_6a1cec6202bca', 'SALECE2F12', 'Chương trình giảm tiền siêu hot 2', 'Mô tả chi tiết cho chương trình SALECE2F12', 'vat_pham', 'all', '[\"silver\"]', 0, 2, 140000, 300000, 0, -1, 0, '2026-06-05 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6202e6e', 'CHAO7817D3', 'Chương trình giảm tiền siêu hot 3', 'Mô tả chi tiết cho chương trình CHAO7817D3', 'vat_pham', 'all', '[\"silver\"]', 1, 2, 130000, 300000, 0, 184, 0, '2026-05-26 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62030a8', 'CHAO8B9F54', 'Chương trình miễn phí ship siêu hot 4', 'Mô tả chi tiết cho chương trình CHAO8B9F54', 'all', 'all', '[\"silver\"]', 0, 3, 0, 500000, 30000, 415, 0, '2026-06-06 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec62034c3', 'LIXI7B36F5', 'Chương trình tặng quà siêu hot 5', 'Mô tả chi tiết cho chương trình LIXI7B36F5', 'vat_pham', 'all', '[\"silver\"]', 0, 4, 0, 200000, 0, 219, 0, '2026-05-28 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62038a2', 'THANG267E86', 'Chương trình giảm tiền siêu hot 6', 'Mô tả chi tiết cho chương trình THANG267E86', 'chuoi_da', 'all', NULL, 0, 2, 130000, 0, 0, 281, 0, '2026-05-24 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6203c9a', 'VIP62D357', 'Chương trình miễn phí ship siêu hot 7', 'Mô tả chi tiết cho chương trình VIP62D357', 'chuoi_da', 'all', '[\"gold\"]', 1, 3, 0, 300000, 20000, -1, 0, '2026-05-28 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6204050', 'SALEA3F528', 'Chương trình tặng quà siêu hot 8', 'Mô tả chi tiết cho chương trình SALEA3F528', 'vat_pham', 'all', '[\"diamond\"]', 0, 4, 0, 300000, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62044d4', 'NEWFE1D19', 'Chương trình tặng quà siêu hot 9', 'Mô tả chi tiết cho chương trình NEWFE1D19', 'vong_ngoc', 'all', '[\"gold\"]', 1, 4, 0, 400000, 0, -1, 0, '2026-06-03 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec62048e0', 'LIXIC297C10', 'Chương trình miễn phí ship siêu hot 10', 'Mô tả chi tiết cho chương trình LIXIC297C10', 'all', 'all', NULL, 1, 3, 0, 400000, 30000, 76, 0, '2026-05-29 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6204c95', 'SALE15B5A11', 'Chương trình giảm tiền siêu hot 11', 'Mô tả chi tiết cho chương trình SALE15B5A11', 'chuoi_da', 'all', '[\"diamond\"]', 1, 2, 110000, 0, 0, 304, 0, '2026-05-25 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62050c8', 'LIXI92FBB12', 'Chương trình giảm % siêu hot 12', 'Mô tả chi tiết cho chương trình LIXI92FBB12', 'chuoi_da', 'new', NULL, 0, 1, 23, 300000, 60000, 31, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620528a', 'SALECB11313', 'Chương trình tặng quà siêu hot 13', 'Mô tả chi tiết cho chương trình SALECB11313', 'chuoi_da', 'all', '[\"diamond\"]', 1, 4, 0, 400000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62054cb', 'THANGA1B5914', 'Chương trình tặng quà siêu hot 14', 'Mô tả chi tiết cho chương trình THANGA1B5914', 'vong_ngoc', 'all', '[\"silver\"]', 0, 4, 0, 400000, 0, 91, 0, '2026-05-25 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:34:59'),
('vc_seed_6a1cec6205681', 'NEWA846215', 'Chương trình giảm tiền siêu hot 15', 'Mô tả chi tiết cho chương trình NEWA846215', 'chuoi_da', 'new', NULL, 0, 2, 50000, 0, 0, 306, 0, '2026-05-28 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620586c', 'LIXIE296F16', 'Chương trình giảm tiền siêu hot 16', 'Mô tả chi tiết cho chương trình LIXIE296F16', 'chuoi_da', 'all', '[\"gold\"]', 1, 2, 190000, 200000, 0, -1, 0, '2026-05-22 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6205a6e', 'CHAO9EDC117', 'Chương trình miễn phí ship siêu hot 17', 'Mô tả chi tiết cho chương trình CHAO9EDC117', 'vong_ngoc', 'all', NULL, 1, 3, 0, 400000, 50000, -1, 0, '2026-06-03 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6205be0', 'LIXIC0BAA18', 'Chương trình giảm % siêu hot 18', 'Mô tả chi tiết cho chương trình LIXIC0BAA18', 'vat_pham', 'all', '[\"silver\"]', 0, 1, 27, 400000, 70000, 195, 0, '2026-05-25 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6205dc6', 'SALEC417219', 'Chương trình miễn phí ship siêu hot 19', 'Mô tả chi tiết cho chương trình SALEC417219', 'all', 'new', NULL, 0, 3, 0, 400000, 40000, 205, 0, '2026-05-23 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:04'),
('vc_seed_6a1cec6205faa', 'NEW4334220', 'Chương trình giảm tiền siêu hot 20', 'Mô tả chi tiết cho chương trình NEW4334220', 'all', 'new', NULL, 0, 2, 160000, 500000, 0, 86, 0, '2026-05-26 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62061ae', 'NEW93BFE21', 'Chương trình miễn phí ship siêu hot 21', 'Mô tả chi tiết cho chương trình NEW93BFE21', 'chuoi_da', 'new', NULL, 1, 3, 0, 400000, 20000, -1, 0, '2026-05-30 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620639a', 'CHAO97A5E22', 'Chương trình giảm tiền siêu hot 22', 'Mô tả chi tiết cho chương trình CHAO97A5E22', 'vat_pham', 'all', NULL, 1, 2, 120000, 300000, 0, 324, 0, '2026-05-31 04:20:18', '2026-06-13 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6206556', 'NEWA703023', 'Chương trình tặng quà siêu hot 23', 'Mô tả chi tiết cho chương trình NEWA703023', 'all', 'all', '[\"gold\"]', 0, 4, 0, 300000, 0, 20, 0, '2026-05-14 04:20:18', '2026-05-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620693f', 'SALE2256424', 'Chương trình tặng quà siêu hot 24', 'Mô tả chi tiết cho chương trình SALE2256424', 'vat_pham', 'all', '[\"silver\"]', 1, 4, 0, 500000, 0, -1, 0, '2026-05-11 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6206d29', 'SALE411DA25', 'Chương trình miễn phí ship siêu hot 25', 'Mô tả chi tiết cho chương trình SALE411DA25', 'all', 'new', NULL, 0, 3, 0, 300000, 20000, 138, 0, '2026-05-25 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62070ea', 'NEW3F4DE26', 'Chương trình giảm % siêu hot 26', 'Mô tả chi tiết cho chương trình NEW3F4DE26', 'chuoi_da', 'all', NULL, 1, 1, 6, 100000, 30000, 273, 0, '2026-05-31 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620725c', 'THANGA70B727', 'Chương trình tặng quà siêu hot 27', 'Mô tả chi tiết cho chương trình THANGA70B727', 'vong_ngoc', 'all', '[\"diamond\"]', 0, 4, 0, 400000, 0, 79, 0, '2026-05-16 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620744d', 'THANG7019F28', 'Chương trình tặng quà siêu hot 28', 'Mô tả chi tiết cho chương trình THANG7019F28', 'all', 'new', NULL, 0, 4, 0, 100000, 0, 326, 0, '2026-05-28 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620762c', 'THANGA4B4E29', 'Chương trình miễn phí ship siêu hot 29', 'Mô tả chi tiết cho chương trình THANGA4B4E29', 'chuoi_da', 'all', NULL, 0, 3, 0, 400000, 40000, -1, 0, '2026-05-14 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62077f3', 'SALE200CF30', 'Chương trình giảm % siêu hot 30', 'Mô tả chi tiết cho chương trình SALE200CF30', 'vong_ngoc', 'all', '[\"silver\"]', 1, 1, 29, 100000, 70000, 414, 0, '2026-06-03 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec62079f6', 'THANG9942A31', 'Chương trình miễn phí ship siêu hot 31', 'Mô tả chi tiết cho chương trình THANG9942A31', 'all', 'all', '[\"silver\"]', 0, 3, 0, 300000, 30000, -1, 0, '2026-05-30 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6207bdb', 'NEW547AB32', 'Chương trình miễn phí ship siêu hot 32', 'Mô tả chi tiết cho chương trình NEW547AB32', 'all', 'new', NULL, 0, 3, 0, 200000, 40000, -1, 0, '2026-06-02 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6207e22', 'SALE47CD133', 'Chương trình giảm % siêu hot 33', 'Mô tả chi tiết cho chương trình SALE47CD133', 'all', 'all', '[\"silver\"]', 0, 1, 36, 500000, 90000, -1, 0, '2026-05-24 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6208cd6', 'SALE7857A34', 'Chương trình giảm % siêu hot 34', 'Mô tả chi tiết cho chương trình SALE7857A34', 'vat_pham', 'all', NULL, 1, 1, 46, 200000, 30000, -1, 0, '2026-05-25 04:20:18', '2026-06-06 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6208eee', 'NEWC243035', 'Chương trình miễn phí ship siêu hot 35', 'Mô tả chi tiết cho chương trình NEWC243035', 'vong_ngoc', 'all', '[\"silver\"]', 0, 3, 0, 500000, 30000, -1, 0, '2026-05-24 04:20:18', '2026-06-20 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62090d8', 'NEWD0D6636', 'Chương trình giảm tiền siêu hot 36', 'Mô tả chi tiết cho chương trình NEWD0D6636', 'vong_ngoc', 'all', '[\"gold\"]', 1, 2, 110000, 500000, 0, 385, 0, '2026-05-26 04:20:18', '2026-06-25 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620926b', 'LIXI864D737', 'Chương trình giảm tiền siêu hot 37', 'Mô tả chi tiết cho chương trình LIXI864D737', 'vat_pham', 'new', NULL, 1, 2, 180000, 500000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620944a', 'LIXIFD51038', 'Chương trình giảm % siêu hot 38', 'Mô tả chi tiết cho chương trình LIXIFD51038', 'vat_pham', 'new', NULL, 0, 1, 6, 400000, 60000, 227, 0, '2026-05-30 04:20:18', '2026-06-09 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6209679', 'CHAOB571B39', 'Chương trình giảm % siêu hot 39', 'Mô tả chi tiết cho chương trình CHAOB571B39', 'chuoi_da', 'all', '[\"silver\"]', 0, 1, 42, 300000, 50000, -1, 0, '2026-05-27 04:20:18', '2026-06-05 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620985c', 'SALE2527940', 'Chương trình miễn phí ship siêu hot 40', 'Mô tả chi tiết cho chương trình SALE2527940', 'chuoi_da', 'all', '[\"diamond\"]', 0, 3, 0, 0, 20000, 400, 0, '2026-06-06 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6209a68', 'VIP3AEB541', 'Chương trình giảm tiền siêu hot 41', 'Mô tả chi tiết cho chương trình VIP3AEB541', 'chuoi_da', 'all', '[\"silver\"]', 1, 2, 140000, 300000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6209e6f', 'NEW11DDB42', 'Chương trình giảm tiền siêu hot 42', 'Mô tả chi tiết cho chương trình NEW11DDB42', 'chuoi_da', 'all', '[\"gold\"]', 0, 2, 190000, 300000, 0, -1, 0, '2026-05-26 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620a078', 'THANG425D443', 'Chương trình giảm % siêu hot 43', 'Mô tả chi tiết cho chương trình THANG425D443', 'vong_ngoc', 'all', '[\"gold\"]', 1, 1, 35, 200000, 50000, 469, 0, '2026-05-24 04:20:18', '2026-06-11 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620a242', 'VIP9A28E44', 'Chương trình giảm % siêu hot 44', 'Mô tả chi tiết cho chương trình VIP9A28E44', 'vat_pham', 'all', '[\"gold\"]', 0, 1, 43, 400000, 90000, -1, 0, '2026-05-26 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620a430', 'VIPECE4745', 'Chương trình giảm tiền siêu hot 45', 'Mô tả chi tiết cho chương trình VIPECE4745', 'chuoi_da', 'all', '[\"gold\"]', 0, 2, 170000, 400000, 0, 141, 0, '2026-05-27 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620a60f', 'VIP1E3CB46', 'Chương trình miễn phí ship siêu hot 46', 'Mô tả chi tiết cho chương trình VIP1E3CB46', 'chuoi_da', 'all', '[\"silver\"]', 1, 3, 0, 200000, 20000, 141, 0, '2026-06-06 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620a7ce', 'THANG4F7EC47', 'Chương trình giảm % siêu hot 47', 'Mô tả chi tiết cho chương trình THANG4F7EC47', 'all', 'all', '[\"gold\"]', 1, 1, 12, 400000, 20000, -1, 0, '2026-06-04 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620a99a', 'LIXIE894A48', 'Chương trình tặng quà siêu hot 48', 'Mô tả chi tiết cho chương trình LIXIE894A48', 'vat_pham', 'all', '[\"silver\"]', 0, 4, 0, 200000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-06 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:20:18'),
('vc_seed_6a1cec620ab53', 'SALE751B649', 'Chương trình giảm tiền siêu hot 49', 'Mô tả chi tiết cho chương trình SALE751B649', 'chuoi_da', 'all', '[\"gold\"]', 0, 2, 130000, 400000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620ad24', 'VIP8E41950', 'Chương trình giảm tiền siêu hot 50', 'Mô tả chi tiết cho chương trình VIP8E41950', 'chuoi_da', 'all', '[\"gold\"]', 1, 2, 120000, 200000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620aed8', 'NEWE691051', 'Chương trình giảm tiền siêu hot 51', 'Mô tả chi tiết cho chương trình NEWE691051', 'vong_ngoc', 'all', '[\"gold\"]', 0, 2, 50000, 400000, 0, -1, 0, '2026-05-26 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620b0a8', 'NEW6485A52', 'Chương trình giảm tiền siêu hot 52', 'Mô tả chi tiết cho chương trình NEW6485A52', 'chuoi_da', 'all', '[\"silver\"]', 1, 2, 160000, 500000, 0, 352, 0, '2026-05-28 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620b269', 'CHAO963AF53', 'Chương trình tặng quà siêu hot 53', 'Mô tả chi tiết cho chương trình CHAO963AF53', 'chuoi_da', 'all', '[\"silver\"]', 0, 4, 0, 300000, 0, -1, 0, '2026-05-12 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620b5c2', 'LIXIA258454', 'Chương trình giảm tiền siêu hot 54', 'Mô tả chi tiết cho chương trình LIXIA258454', 'vat_pham', 'all', '[\"diamond\"]', 1, 2, 140000, 500000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620b7ba', 'SALEE859555', 'Chương trình miễn phí ship siêu hot 55', 'Mô tả chi tiết cho chương trình SALEE859555', 'vat_pham', 'all', '[\"diamond\"]', 0, 3, 0, 500000, 30000, -1, 0, '2026-06-04 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620b9b1', 'VIP35D9B56', 'Chương trình tặng quà siêu hot 56', 'Mô tả chi tiết cho chương trình VIP35D9B56', 'all', 'new', NULL, 1, 4, 0, 500000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620bbd8', 'LIXI5DF6C57', 'Chương trình giảm % siêu hot 57', 'Mô tả chi tiết cho chương trình LIXI5DF6C57', 'vong_ngoc', 'all', '[\"silver\"]', 0, 1, 36, 200000, 20000, 211, 0, '2026-05-30 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620bdbd', 'CHAO8B8DA58', 'Chương trình giảm tiền siêu hot 58', 'Mô tả chi tiết cho chương trình CHAO8B8DA58', 'all', 'all', '[\"gold\"]', 0, 2, 30000, 200000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620bf91', 'CHAO2ADBB59', 'Chương trình tặng quà siêu hot 59', 'Mô tả chi tiết cho chương trình CHAO2ADBB59', 'all', 'new', NULL, 0, 4, 0, 300000, 0, 274, 0, '2026-05-27 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620c0d8', 'LIXI7360F60', 'Chương trình giảm tiền siêu hot 60', 'Mô tả chi tiết cho chương trình LIXI7360F60', 'chuoi_da', 'all', '[\"silver\"]', 0, 2, 50000, 100000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620c2a4', 'NEWFFB2061', 'Chương trình tặng quà siêu hot 61', 'Mô tả chi tiết cho chương trình NEWFFB2061', 'all', 'all', '[\"gold\"]', 0, 4, 0, 200000, 0, -1, 0, '2026-06-05 04:20:18', '2026-06-19 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620c45f', 'SALE4420162', 'Chương trình miễn phí ship siêu hot 62', 'Mô tả chi tiết cho chương trình SALE4420162', 'vat_pham', 'all', NULL, 0, 3, 0, 500000, 30000, 469, 0, '2026-05-29 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620c5a1', 'SALEFA95A63', 'Chương trình giảm tiền siêu hot 63', 'Mô tả chi tiết cho chương trình SALEFA95A63', 'all', 'new', NULL, 0, 2, 150000, 0, 0, -1, 0, '2026-05-24 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620c759', 'NEWA0AA164', 'Chương trình tặng quà siêu hot 64', 'Mô tả chi tiết cho chương trình NEWA0AA164', 'all', 'all', '[\"gold\"]', 0, 4, 0, 100000, 0, 335, 0, '2026-05-23 04:20:18', '2026-06-06 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620c93e', 'THANGCBB8565', 'Chương trình miễn phí ship siêu hot 65', 'Mô tả chi tiết cho chương trình THANGCBB8565', 'all', 'new', NULL, 0, 3, 0, 200000, 40000, 124, 0, '2026-05-27 04:20:18', '2026-06-11 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620cb30', 'VIP44AD966', 'Chương trình giảm % siêu hot 66', 'Mô tả chi tiết cho chương trình VIP44AD966', 'chuoi_da', 'all', '[\"silver\"]', 1, 1, 14, 0, 90000, 108, 0, '2026-05-25 04:20:18', '2026-06-26 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620cc83', 'VIP22B9067', 'Chương trình miễn phí ship siêu hot 67', 'Mô tả chi tiết cho chương trình VIP22B9067', 'vat_pham', 'all', '[\"gold\"]', 0, 3, 0, 200000, 50000, 257, 0, '2026-05-14 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620ce81', 'NEWEB7B068', 'Chương trình giảm % siêu hot 68', 'Mô tả chi tiết cho chương trình NEWEB7B068', 'all', 'all', '[\"gold\"]', 1, 1, 7, 0, 70000, 187, 0, '2026-05-24 04:20:18', '2026-06-05 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620d006', 'VIP7DDF469', 'Chương trình tặng quà siêu hot 69', 'Mô tả chi tiết cho chương trình VIP7DDF469', 'all', 'all', '[\"silver\"]', 0, 4, 0, 100000, 0, -1, 0, '2026-05-26 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620d3ad', 'THANG840FA70', 'Chương trình giảm % siêu hot 70', 'Mô tả chi tiết cho chương trình THANG840FA70', 'chuoi_da', 'all', NULL, 0, 1, 34, 100000, 40000, 264, 0, '2026-06-03 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620d5d2', 'SALE778B271', 'Chương trình giảm tiền siêu hot 71', 'Mô tả chi tiết cho chương trình SALE778B271', 'vong_ngoc', 'all', '[\"silver\"]', 0, 2, 100000, 100000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620d7e5', 'CHAO51BA672', 'Chương trình miễn phí ship siêu hot 72', 'Mô tả chi tiết cho chương trình CHAO51BA672', 'chuoi_da', 'all', '[\"gold\"]', 0, 3, 0, 400000, 50000, 400, 0, '2026-05-22 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620da8e', 'VIP66D8573', 'Chương trình giảm % siêu hot 73', 'Mô tả chi tiết cho chương trình VIP66D8573', 'vat_pham', 'all', NULL, 0, 1, 11, 300000, 70000, -1, 0, '2026-05-31 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620dc7f', 'THANGD986C74', 'Chương trình giảm tiền siêu hot 74', 'Mô tả chi tiết cho chương trình THANGD986C74', 'vong_ngoc', 'all', '[\"silver\"]', 0, 2, 70000, 400000, 0, 376, 0, '2026-06-04 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620dde8', 'VIPAA60675', 'Chương trình giảm tiền siêu hot 75', 'Mô tả chi tiết cho chương trình VIPAA60675', 'vong_ngoc', 'all', '[\"gold\"]', 1, 2, 110000, 400000, 0, 77, 0, '2026-05-28 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620df56', 'NEWB916D76', 'Chương trình tặng quà siêu hot 76', 'Mô tả chi tiết cho chương trình NEWB916D76', 'vong_ngoc', 'all', '[\"silver\"]', 0, 4, 0, 300000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620e1db', 'NEW8DC0277', 'Chương trình giảm % siêu hot 77', 'Mô tả chi tiết cho chương trình NEW8DC0277', 'vat_pham', 'new', NULL, 0, 1, 26, 200000, 40000, -1, 0, '2026-05-23 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620e3be', 'CHAOED74A78', 'Chương trình giảm % siêu hot 78', 'Mô tả chi tiết cho chương trình CHAOED74A78', 'all', 'all', NULL, 0, 1, 47, 200000, 40000, -1, 0, '2026-05-31 04:20:18', '2026-06-09 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620e5ad', 'THANG6311279', 'Chương trình giảm % siêu hot 79', 'Mô tả chi tiết cho chương trình THANG6311279', 'chuoi_da', 'all', '[\"silver\"]', 1, 1, 22, 0, 80000, 307, 0, '2026-05-22 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620e776', 'NEWA4EFF80', 'Chương trình miễn phí ship siêu hot 80', 'Mô tả chi tiết cho chương trình NEWA4EFF80', 'vong_ngoc', 'all', NULL, 0, 3, 0, 200000, 20000, 191, 0, '2026-05-13 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620e94d', 'THANGF34C581', 'Chương trình giảm tiền siêu hot 81', 'Mô tả chi tiết cho chương trình THANGF34C581', 'chuoi_da', 'all', '[\"diamond\"]', 1, 2, 170000, 400000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620eb4f', 'SALE0F06082', 'Chương trình giảm % siêu hot 82', 'Mô tả chi tiết cho chương trình SALE0F06082', 'vong_ngoc', 'new', NULL, 0, 1, 28, 500000, 50000, 261, 0, '2026-05-31 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620ecbf', 'LIXI3F2B183', 'Chương trình miễn phí ship siêu hot 83', 'Mô tả chi tiết cho chương trình LIXI3F2B183', 'chuoi_da', 'all', '[\"gold\"]', 1, 3, 0, 100000, 20000, -1, 0, '2026-05-23 04:20:18', '2026-06-15 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620ef00', 'SALE4F63F84', 'Chương trình miễn phí ship siêu hot 84', 'Mô tả chi tiết cho chương trình SALE4F63F84', 'all', 'all', '[\"gold\"]', 0, 3, 0, 100000, 40000, 185, 0, '2026-05-21 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620f0df', 'LIXI6271485', 'Chương trình tặng quà siêu hot 85', 'Mô tả chi tiết cho chương trình LIXI6271485', 'vong_ngoc', 'all', '[\"diamond\"]', 0, 4, 0, 300000, 0, 177, 0, '2026-05-28 04:20:18', '2026-06-07 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620f304', 'VIP1FA6C86', 'Chương trình tặng quà siêu hot 86', 'Mô tả chi tiết cho chương trình VIP1FA6C86', 'vat_pham', 'new', NULL, 1, 4, 0, 300000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-25 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620f4da', 'THANG7D84787', 'Chương trình giảm tiền siêu hot 87', 'Mô tả chi tiết cho chương trình THANG7D84787', 'vong_ngoc', 'all', '[\"silver\"]', 0, 2, 170000, 300000, 0, 172, 0, '2026-05-28 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620f6b9', 'NEW9453488', 'Chương trình giảm tiền siêu hot 88', 'Mô tả chi tiết cho chương trình NEW9453488', 'all', 'all', '[\"diamond\"]', 0, 2, 110000, 300000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620f880', 'NEW8BA8189', 'Chương trình giảm tiền siêu hot 89', 'Mô tả chi tiết cho chương trình NEW8BA8189', 'all', 'all', '[\"diamond\"]', 0, 2, 100000, 100000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-06 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620fa4e', 'VIP808F390', 'Chương trình tặng quà siêu hot 90', 'Mô tả chi tiết cho chương trình VIP808F390', 'vat_pham', 'all', '[\"silver\"]', 0, 4, 0, 100000, 0, -1, 0, '2026-05-24 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620fc0d', 'LIXI31F8691', 'Chương trình giảm % siêu hot 91', 'Mô tả chi tiết cho chương trình LIXI31F8691', 'vat_pham', 'all', '[\"gold\"]', 1, 1, 39, 0, 100000, -1, 0, '2026-06-04 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec620fdf7', 'CHAO2752F92', 'Chương trình giảm tiền siêu hot 92', 'Mô tả chi tiết cho chương trình CHAO2752F92', 'chuoi_da', 'all', '[\"gold\"]', 0, 2, 150000, 400000, 0, 206, 0, '2026-05-30 04:20:18', '2026-06-26 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec620ffb8', 'NEW8DDDC93', 'Chương trình giảm % siêu hot 93', 'Mô tả chi tiết cho chương trình NEW8DDDC93', 'chuoi_da', 'all', '[\"silver\"]', 0, 1, 30, 400000, 60000, -1, 0, '2026-05-02 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62101ae', 'SALE4073794', 'Chương trình tặng quà siêu hot 94', 'Mô tả chi tiết cho chương trình SALE4073794', 'chuoi_da', 'new', NULL, 1, 4, 0, 500000, 0, 334, 0, '2026-05-25 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6210308', 'SALE14C1E95', 'Chương trình miễn phí ship siêu hot 95', 'Mô tả chi tiết cho chương trình SALE14C1E95', 'vat_pham', 'all', '[\"diamond\"]', 1, 3, 0, 0, 40000, 228, 0, '2026-06-06 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6210503', 'NEW8167E96', 'Chương trình tặng quà siêu hot 96', 'Mô tả chi tiết cho chương trình NEW8167E96', 'vat_pham', 'all', '[\"silver\"]', 1, 4, 0, 400000, 0, 406, 0, '2026-05-26 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62106da', 'CHAO074F597', 'Chương trình tặng quà siêu hot 97', 'Mô tả chi tiết cho chương trình CHAO074F597', 'chuoi_da', 'all', '[\"diamond\"]', 1, 4, 0, 300000, 0, 211, 0, '2026-05-29 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6210914', 'THANG50DE098', 'Chương trình tặng quà siêu hot 98', 'Mô tả chi tiết cho chương trình THANG50DE098', 'vat_pham', 'all', '[\"gold\"]', 1, 4, 0, 100000, 0, 200, 0, '2026-05-29 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6210b17', 'LIXI95A8399', 'Chương trình tặng quà siêu hot 99', 'Mô tả chi tiết cho chương trình LIXI95A8399', 'vat_pham', 'all', NULL, 1, 4, 0, 300000, 0, -1, 0, '2026-05-08 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6210cfb', 'CHAOEC8FF100', 'Chương trình giảm % siêu hot 100', 'Mô tả chi tiết cho chương trình CHAOEC8FF100', 'vat_pham', 'all', '[\"gold\"]', 0, 1, 17, 200000, 40000, -1, 0, '2026-05-25 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6210efa', 'NEWB4F7F101', 'Chương trình miễn phí ship siêu hot 101', 'Mô tả chi tiết cho chương trình NEWB4F7F101', 'chuoi_da', 'new', NULL, 1, 3, 0, 400000, 30000, 368, 0, '2026-05-22 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62110d0', 'NEWE402E102', 'Chương trình miễn phí ship siêu hot 102', 'Mô tả chi tiết cho chương trình NEWE402E102', 'vat_pham', 'all', NULL, 0, 3, 0, 500000, 50000, 251, 0, '2026-05-23 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62112d6', 'NEW39F80103', 'Chương trình tặng quà siêu hot 103', 'Mô tả chi tiết cho chương trình NEW39F80103', 'chuoi_da', 'all', '[\"silver\"]', 0, 4, 0, 500000, 0, 11, 0, '2026-05-28 04:20:18', '2026-06-11 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6211594', 'SALE924F9104', 'Chương trình tặng quà siêu hot 104', 'Mô tả chi tiết cho chương trình SALE924F9104', 'vat_pham', 'new', NULL, 1, 4, 0, 100000, 0, -1, 0, '2026-05-22 04:20:18', '2026-06-11 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6211704', 'THANG12F9A105', 'Chương trình giảm % siêu hot 105', 'Mô tả chi tiết cho chương trình THANG12F9A105', 'all', 'all', '[\"silver\"]', 0, 1, 14, 400000, 20000, -1, 0, '2026-05-22 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62118ed', 'CHAO6900C106', 'Chương trình giảm % siêu hot 106', 'Mô tả chi tiết cho chương trình CHAO6900C106', 'all', 'new', NULL, 0, 1, 33, 100000, 90000, -1, 0, '2026-05-23 04:20:18', '2026-06-07 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6211abc', 'SALE3B3AB107', 'Chương trình tặng quà siêu hot 107', 'Mô tả chi tiết cho chương trình SALE3B3AB107', 'vong_ngoc', 'new', NULL, 0, 4, 0, 0, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-20 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6211ca1', 'NEW26360108', 'Chương trình miễn phí ship siêu hot 108', 'Mô tả chi tiết cho chương trình NEW26360108', 'all', 'all', '[\"silver\"]', 1, 3, 0, 500000, 20000, -1, 0, '2026-05-26 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6211e6f', 'LIXI03E5A109', 'Chương trình miễn phí ship siêu hot 109', 'Mô tả chi tiết cho chương trình LIXI03E5A109', 'vong_ngoc', 'all', '[\"silver\"]', 1, 3, 0, 100000, 20000, 103, 0, '2026-05-29 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62120b4', 'VIPE2F79110', 'Chương trình giảm tiền siêu hot 110', 'Mô tả chi tiết cho chương trình VIPE2F79110', 'vong_ngoc', 'all', '[\"diamond\"]', 1, 2, 160000, 300000, 0, 174, 0, '2026-05-29 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62122aa', 'VIP0223B111', 'Chương trình miễn phí ship siêu hot 111', 'Mô tả chi tiết cho chương trình VIP0223B111', 'vong_ngoc', 'all', '[\"gold\"]', 1, 3, 0, 400000, 30000, -1, 0, '2026-05-28 04:20:18', '2026-06-09 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6212473', 'LIXI7C9BF112', 'Chương trình tặng quà siêu hot 112', 'Mô tả chi tiết cho chương trình LIXI7C9BF112', 'all', 'new', NULL, 1, 4, 0, 100000, 0, 124, 0, '2026-05-30 04:20:18', '2026-06-22 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6212631', 'NEW64398113', 'Chương trình giảm % siêu hot 113', 'Mô tả chi tiết cho chương trình NEW64398113', 'vat_pham', 'all', '[\"silver\"]', 1, 1, 42, 300000, 30000, 441, 0, '2026-06-03 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6212809', 'LIXI629ED114', 'Chương trình giảm % siêu hot 114', 'Mô tả chi tiết cho chương trình LIXI629ED114', 'vat_pham', 'all', '[\"gold\"]', 1, 1, 39, 300000, 60000, 260, 0, '2026-05-18 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62129ee', 'SALE18301115', 'Chương trình giảm tiền siêu hot 115', 'Mô tả chi tiết cho chương trình SALE18301115', 'all', 'all', '[\"silver\"]', 0, 2, 120000, 0, 0, -1, 0, '2026-05-24 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6212be6', 'SALE80FCF116', 'Chương trình giảm % siêu hot 116', 'Mô tả chi tiết cho chương trình SALE80FCF116', 'all', 'all', '[\"diamond\"]', 0, 1, 47, 100000, 40000, -1, 0, '2026-05-31 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6212de5', 'NEWAC874117', 'Chương trình giảm tiền siêu hot 117', 'Mô tả chi tiết cho chương trình NEWAC874117', 'vat_pham', 'all', '[\"diamond\"]', 1, 2, 40000, 100000, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6212fa0', 'CHAO631A3118', 'Chương trình giảm tiền siêu hot 118', 'Mô tả chi tiết cho chương trình CHAO631A3118', 'vong_ngoc', 'all', '[\"diamond\"]', 1, 2, 200000, 400000, 0, 204, 0, '2026-05-09 04:20:18', '2026-05-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621317e', 'SALED4091119', 'Chương trình giảm tiền siêu hot 119', 'Mô tả chi tiết cho chương trình SALED4091119', 'chuoi_da', 'new', NULL, 0, 2, 80000, 0, 0, -1, 0, '2026-05-29 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6213364', 'NEW6EEE8120', 'Chương trình giảm tiền siêu hot 120', 'Mô tả chi tiết cho chương trình NEW6EEE8120', 'vat_pham', 'all', '[\"diamond\"]', 0, 2, 200000, 500000, 0, 23, 0, '2026-05-27 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6213527', 'LIXIB3AFB121', 'Chương trình miễn phí ship siêu hot 121', 'Mô tả chi tiết cho chương trình LIXIB3AFB121', 'vat_pham', 'all', NULL, 0, 3, 0, 300000, 50000, -1, 0, '2026-05-26 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:27'),
('vc_seed_6a1cec62136f8', 'THANG43966122', 'Chương trình tặng quà siêu hot 122', 'Mô tả chi tiết cho chương trình THANG43966122', 'chuoi_da', 'all', '[\"silver\"]', 1, 4, 0, 400000, 0, 44, 0, '2026-05-22 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:27'),
('vc_seed_6a1cec62138fa', 'CHAOC6DB1123', 'Chương trình tặng quà siêu hot 123', 'Mô tả chi tiết cho chương trình CHAOC6DB1123', 'vat_pham', 'all', NULL, 1, 4, 0, 400000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:30'),
('vc_seed_6a1cec6213ae9', 'CHAO2850C124', 'Chương trình miễn phí ship siêu hot 124', 'Mô tả chi tiết cho chương trình CHAO2850C124', 'vong_ngoc', 'all', '[\"diamond\"]', 1, 3, 0, 100000, 20000, 11, 0, '2026-05-31 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6213d04', 'SALE3D3DF125', 'Chương trình tặng quà siêu hot 125', 'Mô tả chi tiết cho chương trình SALE3D3DF125', 'all', 'new', NULL, 0, 4, 0, 300000, 0, 443, 0, '2026-05-31 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6213e65', 'LIXIEF4B7126', 'Chương trình giảm % siêu hot 126', 'Mô tả chi tiết cho chương trình LIXIEF4B7126', 'vong_ngoc', 'all', '[\"gold\"]', 1, 1, 28, 500000, 30000, 130, 0, '2026-05-23 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214054', 'THANGD16DE127', 'Chương trình giảm tiền siêu hot 127', 'Mô tả chi tiết cho chương trình THANGD16DE127', 'vat_pham', 'new', NULL, 1, 2, 30000, 500000, 0, -1, 0, '2026-05-08 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62141c3', 'CHAO7E5DF128', 'Chương trình miễn phí ship siêu hot 128', 'Mô tả chi tiết cho chương trình CHAO7E5DF128', 'chuoi_da', 'all', '[\"gold\"]', 1, 3, 0, 100000, 40000, -1, 0, '2026-05-22 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214301', 'SALE00F4F129', 'Chương trình giảm tiền siêu hot 129', 'Mô tả chi tiết cho chương trình SALE00F4F129', 'vong_ngoc', 'all', '[\"silver\"]', 1, 2, 190000, 500000, 0, 45, 0, '2026-05-29 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214470', 'NEW7DDB0130', 'Chương trình giảm tiền siêu hot 130', 'Mô tả chi tiết cho chương trình NEW7DDB0130', 'chuoi_da', 'all', NULL, 0, 2, 20000, 100000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62145e7', 'NEWD6349131', 'Chương trình giảm % siêu hot 131', 'Mô tả chi tiết cho chương trình NEWD6349131', 'vong_ngoc', 'all', '[\"silver\"]', 1, 1, 29, 0, 40000, 248, 0, '2026-05-27 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214742', 'THANG3606D132', 'Chương trình giảm % siêu hot 132', 'Mô tả chi tiết cho chương trình THANG3606D132', 'chuoi_da', 'all', '[\"gold\"]', 0, 1, 44, 100000, 70000, -1, 0, '2026-05-26 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621488f', 'SALEA10D8133', 'Chương trình miễn phí ship siêu hot 133', 'Mô tả chi tiết cho chương trình SALEA10D8133', 'vat_pham', 'all', '[\"gold\"]', 1, 3, 0, 400000, 20000, 287, 0, '2026-05-23 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62149e1', 'NEWAB903134', 'Chương trình miễn phí ship siêu hot 134', 'Mô tả chi tiết cho chương trình NEWAB903134', 'chuoi_da', 'all', '[\"silver\"]', 1, 3, 0, 300000, 40000, 185, 0, '2026-05-09 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214b22', 'NEW85722135', 'Chương trình giảm % siêu hot 135', 'Mô tả chi tiết cho chương trình NEW85722135', 'chuoi_da', 'all', NULL, 1, 1, 41, 500000, 20000, -1, 0, '2026-05-29 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214c8a', 'LIXI51DEA136', 'Chương trình tặng quà siêu hot 136', 'Mô tả chi tiết cho chương trình LIXI51DEA136', 'chuoi_da', 'new', NULL, 0, 4, 0, 500000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6214dfb', 'CHAOFCDE0137', 'Chương trình miễn phí ship siêu hot 137', 'Mô tả chi tiết cho chương trình CHAOFCDE0137', 'chuoi_da', 'all', '[\"gold\"]', 0, 3, 0, 200000, 30000, 201, 0, '2026-05-27 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:34'),
('vc_seed_6a1cec6214f65', 'THANG522E1138', 'Chương trình giảm % siêu hot 138', 'Mô tả chi tiết cho chương trình THANG522E1138', 'chuoi_da', 'all', '[\"gold\"]', 0, 1, 20, 500000, 100000, 100, 0, '2026-05-31 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62150ba', 'CHAO8531A139', 'Chương trình miễn phí ship siêu hot 139', 'Mô tả chi tiết cho chương trình CHAO8531A139', 'all', 'all', NULL, 0, 3, 0, 500000, 50000, -1, 0, '2026-05-24 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:20:18'),
('vc_seed_6a1cec6215207', 'CHAO111B1140', 'Chương trình miễn phí ship siêu hot 140', 'Mô tả chi tiết cho chương trình CHAO111B1140', 'all', 'all', '[\"silver\"]', 0, 3, 0, 0, 50000, 285, 0, '2026-05-27 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621533c', 'THANG226D2141', 'Chương trình giảm tiền siêu hot 141', 'Mô tả chi tiết cho chương trình THANG226D2141', 'vong_ngoc', 'new', NULL, 1, 2, 90000, 300000, 0, 67, 0, '2026-05-24 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621548d', 'VIPE7748142', 'Chương trình giảm tiền siêu hot 142', 'Mô tả chi tiết cho chương trình VIPE7748142', 'vat_pham', 'all', '[\"gold\"]', 0, 2, 200000, 400000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62155ff', 'NEWF1B95143', 'Chương trình giảm % siêu hot 143', 'Mô tả chi tiết cho chương trình NEWF1B95143', 'chuoi_da', 'all', '[\"silver\"]', 0, 1, 9, 400000, 90000, -1, 0, '2026-05-27 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6215785', 'VIPEC2F5144', 'Chương trình miễn phí ship siêu hot 144', 'Mô tả chi tiết cho chương trình VIPEC2F5144', 'chuoi_da', 'all', NULL, 1, 3, 0, 0, 20000, 95, 0, '2026-05-23 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62158f1', 'NEW5420F145', 'Chương trình miễn phí ship siêu hot 145', 'Mô tả chi tiết cho chương trình NEW5420F145', 'chuoi_da', 'all', '[\"silver\"]', 1, 3, 0, 0, 40000, 410, 0, '2026-05-23 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6215a49', 'VIPE7230146', 'Chương trình giảm % siêu hot 146', 'Mô tả chi tiết cho chương trình VIPE7230146', 'vong_ngoc', 'all', '[\"silver\"]', 1, 1, 34, 200000, 40000, 412, 0, '2026-05-25 04:20:18', '2026-06-09 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:19'),
('vc_seed_6a1cec6215b91', 'CHAO7DF13147', 'Chương trình giảm % siêu hot 147', 'Mô tả chi tiết cho chương trình CHAO7DF13147', 'chuoi_da', 'all', '[\"silver\"]', 0, 1, 41, 400000, 100000, -1, 0, '2026-05-12 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6215ce8', 'NEWE0F8C148', 'Chương trình giảm % siêu hot 148', 'Mô tả chi tiết cho chương trình NEWE0F8C148', 'vat_pham', 'all', '[\"gold\"]', 1, 1, 42, 100000, 100000, -1, 0, '2026-05-31 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6215e70', 'CHAOBD385149', 'Chương trình tặng quà siêu hot 149', 'Mô tả chi tiết cho chương trình CHAOBD385149', 'chuoi_da', 'all', NULL, 1, 4, 0, 500000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6215ff5', 'SALED52D8150', 'Chương trình tặng quà siêu hot 150', 'Mô tả chi tiết cho chương trình SALED52D8150', 'all', 'all', '[\"gold\"]', 1, 4, 0, 0, 0, 450, 0, '2026-05-31 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6216160', 'CHAO1B628151', 'Chương trình tặng quà siêu hot 151', 'Mô tả chi tiết cho chương trình CHAO1B628151', 'all', 'all', '[\"diamond\"]', 0, 4, 0, 400000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62162ad', 'SALEACD5B152', 'Chương trình giảm tiền siêu hot 152', 'Mô tả chi tiết cho chương trình SALEACD5B152', 'chuoi_da', 'all', NULL, 0, 2, 120000, 500000, 0, 486, 0, '2026-05-23 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62163fb', 'LIXI07ED7153', 'Chương trình tặng quà siêu hot 153', 'Mô tả chi tiết cho chương trình LIXI07ED7153', 'vong_ngoc', 'all', '[\"silver\"]', 1, 4, 0, 100000, 0, 433, 0, '2026-05-28 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621655a', 'VIP09703154', 'Chương trình miễn phí ship siêu hot 154', 'Mô tả chi tiết cho chương trình VIP09703154', 'vat_pham', 'all', '[\"diamond\"]', 1, 3, 0, 0, 40000, -1, 0, '2026-05-23 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62166b5', 'LIXI1F7D5155', 'Chương trình miễn phí ship siêu hot 155', 'Mô tả chi tiết cho chương trình LIXI1F7D5155', 'chuoi_da', 'all', NULL, 0, 3, 0, 200000, 30000, 287, 0, '2026-05-22 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621680a', 'CHAO9514F156', 'Chương trình tặng quà siêu hot 156', 'Mô tả chi tiết cho chương trình CHAO9514F156', 'vat_pham', 'new', NULL, 1, 4, 0, 0, 0, -1, 0, '2026-05-16 04:20:18', '2026-05-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6216952', 'CHAOCF322157', 'Chương trình giảm % siêu hot 157', 'Mô tả chi tiết cho chương trình CHAOCF322157', 'chuoi_da', 'all', '[\"gold\"]', 1, 1, 25, 300000, 100000, -1, 0, '2026-05-28 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6216a93', 'LIXIEAF46158', 'Chương trình tặng quà siêu hot 158', 'Mô tả chi tiết cho chương trình LIXIEAF46158', 'vong_ngoc', 'all', '[\"diamond\"]', 1, 4, 0, 200000, 0, -1, 0, '2026-05-04 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6216bf4', 'CHAOF178A159', 'Chương trình miễn phí ship siêu hot 159', 'Mô tả chi tiết cho chương trình CHAOF178A159', 'chuoi_da', 'all', '[\"gold\"]', 0, 3, 0, 0, 50000, 397, 0, '2026-05-31 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6216d4a', 'LIXI9B42B160', 'Chương trình miễn phí ship siêu hot 160', 'Mô tả chi tiết cho chương trình LIXI9B42B160', 'vong_ngoc', 'all', '[\"diamond\"]', 0, 3, 0, 400000, 20000, -1, 0, '2026-05-30 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6216e9b', 'VIPCD4FF161', 'Chương trình giảm % siêu hot 161', 'Mô tả chi tiết cho chương trình VIPCD4FF161', 'vong_ngoc', 'all', NULL, 1, 1, 32, 200000, 70000, -1, 0, '2026-05-30 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217021', 'NEWC1067162', 'Chương trình miễn phí ship siêu hot 162', 'Mô tả chi tiết cho chương trình NEWC1067162', 'vat_pham', 'all', '[\"diamond\"]', 1, 3, 0, 500000, 40000, 316, 0, '2026-05-26 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217171', 'LIXI27679163', 'Chương trình tặng quà siêu hot 163', 'Mô tả chi tiết cho chương trình LIXI27679163', 'vong_ngoc', 'all', NULL, 0, 4, 0, 200000, 0, -1, 0, '2026-05-07 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62172b8', 'NEW4A469164', 'Chương trình miễn phí ship siêu hot 164', 'Mô tả chi tiết cho chương trình NEW4A469164', 'chuoi_da', 'all', '[\"gold\"]', 0, 3, 0, 100000, 30000, -1, 0, '2026-06-04 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec62173fc', 'LIXI29013165', 'Chương trình giảm tiền siêu hot 165', 'Mô tả chi tiết cho chương trình LIXI29013165', 'vong_ngoc', 'all', '[\"diamond\"]', 0, 2, 90000, 0, 0, 160, 0, '2026-05-23 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217543', 'SALE09159166', 'Chương trình giảm tiền siêu hot 166', 'Mô tả chi tiết cho chương trình SALE09159166', 'vong_ngoc', 'all', '[\"silver\"]', 1, 2, 50000, 500000, 0, 107, 0, '2026-05-29 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:20:18'),
('vc_seed_6a1cec62176da', 'CHAO25134167', 'Chương trình miễn phí ship siêu hot 167', 'Mô tả chi tiết cho chương trình CHAO25134167', 'all', 'all', NULL, 0, 3, 0, 500000, 50000, -1, 0, '2026-05-29 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621784e', 'SALE91E32168', 'Chương trình giảm % siêu hot 168', 'Mô tả chi tiết cho chương trình SALE91E32168', 'all', 'new', NULL, 0, 1, 38, 300000, 30000, 15, 0, '2026-05-26 04:20:18', '2026-06-25 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:20:18'),
('vc_seed_6a1cec6217995', 'LIXIC7630169', 'Chương trình giảm % siêu hot 169', 'Mô tả chi tiết cho chương trình LIXIC7630169', 'chuoi_da', 'all', '[\"gold\"]', 0, 1, 6, 0, 90000, 429, 0, '2026-05-26 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217ade', 'THANG5FA0E170', 'Chương trình miễn phí ship siêu hot 170', 'Mô tả chi tiết cho chương trình THANG5FA0E170', 'all', 'all', '[\"diamond\"]', 0, 3, 0, 300000, 30000, 472, 0, '2026-05-30 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217c60', 'CHAO0E4F4171', 'Chương trình giảm tiền siêu hot 171', 'Mô tả chi tiết cho chương trình CHAO0E4F4171', 'chuoi_da', 'all', '[\"diamond\"]', 1, 2, 100000, 300000, 0, 123, 0, '2026-05-29 04:20:18', '2026-06-20 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217e65', 'VIP8D4F1172', 'Chương trình giảm tiền siêu hot 172', 'Mô tả chi tiết cho chương trình VIP8D4F1172', 'vat_pham', 'all', '[\"diamond\"]', 1, 2, 110000, 200000, 0, 385, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6217f9e', 'LIXI25847173', 'Chương trình miễn phí ship siêu hot 173', 'Mô tả chi tiết cho chương trình LIXI25847173', 'vat_pham', 'new', NULL, 0, 3, 0, 300000, 40000, 224, 0, '2026-05-25 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62180d6', 'NEWECBC2174', 'Chương trình giảm tiền siêu hot 174', 'Mô tả chi tiết cho chương trình NEWECBC2174', 'vat_pham', 'new', NULL, 1, 2, 140000, 0, 0, 155, 0, '2026-05-27 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6218223', 'VIP3B570175', 'Chương trình tặng quà siêu hot 175', 'Mô tả chi tiết cho chương trình VIP3B570175', 'vat_pham', 'all', '[\"silver\"]', 1, 4, 0, 0, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22');
INSERT INTO `voucher` (`id`, `ma_voucher`, `ten_chuong_trinh`, `mo_ta`, `pham_vi_san_pham`, `doi_tuong`, `hang_thanh_vien`, `is_combine`, `loai_giam`, `gia_tri`, `don_toi_thieu`, `giam_toi_da`, `so_luong`, `da_dung`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('vc_seed_6a1cec621839c', 'THANG4C022176', 'Chương trình giảm % siêu hot 176', 'Mô tả chi tiết cho chương trình THANG4C022176', 'all', 'all', '[\"gold\"]', 0, 1, 20, 300000, 70000, 479, 0, '2026-05-31 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62184eb', 'SALECEA69177', 'Chương trình tặng quà siêu hot 177', 'Mô tả chi tiết cho chương trình SALECEA69177', 'chuoi_da', 'all', NULL, 1, 4, 0, 500000, 0, -1, 0, '2026-05-05 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6218635', 'LIXIC2F72178', 'Chương trình giảm tiền siêu hot 178', 'Mô tả chi tiết cho chương trình LIXIC2F72178', 'vat_pham', 'all', '[\"silver\"]', 1, 2, 60000, 200000, 0, 313, 0, '2026-06-03 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31'),
('vc_seed_6a1cec6218782', 'NEW35093179', 'Chương trình giảm tiền siêu hot 179', 'Mô tả chi tiết cho chương trình NEW35093179', 'vong_ngoc', 'all', '[\"diamond\"]', 1, 2, 20000, 500000, 0, -1, 0, '2026-05-26 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62188c6', 'NEW92369180', 'Chương trình miễn phí ship siêu hot 180', 'Mô tả chi tiết cho chương trình NEW92369180', 'vat_pham', 'new', NULL, 0, 3, 0, 400000, 50000, -1, 0, '2026-05-31 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6218a20', 'CHAO857BB181', 'Chương trình tặng quà siêu hot 181', 'Mô tả chi tiết cho chương trình CHAO857BB181', 'chuoi_da', 'new', NULL, 0, 4, 0, 100000, 0, -1, 0, '2026-05-04 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6218d9f', 'VIPFAB47182', 'Chương trình giảm tiền siêu hot 182', 'Mô tả chi tiết cho chương trình VIPFAB47182', 'vong_ngoc', 'new', NULL, 0, 2, 160000, 500000, 0, 88, 0, '2026-05-28 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec62190ff', 'NEWD0BBE183', 'Chương trình miễn phí ship siêu hot 183', 'Mô tả chi tiết cho chương trình NEWD0BBE183', 'vong_ngoc', 'new', NULL, 1, 3, 0, 500000, 30000, 395, 0, '2026-05-28 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621942f', 'VIP5DEC8184', 'Chương trình miễn phí ship siêu hot 184', 'Mô tả chi tiết cho chương trình VIP5DEC8184', 'all', 'all', '[\"silver\"]', 1, 3, 0, 500000, 50000, 16, 0, '2026-05-23 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6219768', 'VIPCA366185', 'Chương trình giảm tiền siêu hot 185', 'Mô tả chi tiết cho chương trình VIPCA366185', 'all', 'all', '[\"diamond\"]', 0, 2, 200000, 100000, 0, 362, 0, '2026-05-31 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6219aa8', 'LIXI4F085186', 'Chương trình tặng quà siêu hot 186', 'Mô tả chi tiết cho chương trình LIXI4F085186', 'vong_ngoc', 'all', NULL, 0, 4, 0, 300000, 0, 371, 0, '2026-05-30 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec6219dd0', 'CHAO1C368187', 'Chương trình giảm % siêu hot 187', 'Mô tả chi tiết cho chương trình CHAO1C368187', 'all', 'all', '[\"silver\"]', 1, 1, 24, 200000, 60000, 215, 0, '2026-05-30 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621a138', 'SALE02671188', 'Chương trình tặng quà siêu hot 188', 'Mô tả chi tiết cho chương trình SALE02671188', 'vong_ngoc', 'new', NULL, 0, 4, 0, 100000, 0, 134, 0, '2026-05-22 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621a49e', 'SALEE7368189', 'Chương trình giảm tiền siêu hot 189', 'Mô tả chi tiết cho chương trình SALEE7368189', 'all', 'all', '[\"diamond\"]', 1, 2, 70000, 500000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621a7c1', 'LIXI8C7E6190', 'Chương trình giảm tiền siêu hot 190', 'Mô tả chi tiết cho chương trình LIXI8C7E6190', 'vat_pham', 'all', '[\"diamond\"]', 1, 2, 200000, 500000, 0, 104, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621ab53', 'CHAO201D2191', 'Chương trình miễn phí ship siêu hot 191', 'Mô tả chi tiết cho chương trình CHAO201D2191', 'all', 'new', NULL, 0, 3, 0, 200000, 50000, -1, 0, '2026-05-29 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621aecb', 'LIXIEA23E192', 'Chương trình giảm % siêu hot 192', 'Mô tả chi tiết cho chương trình LIXIEA23E192', 'vat_pham', 'all', NULL, 1, 1, 47, 300000, 20000, -1, 0, '2026-05-23 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621b23b', 'VIPBB5C0193', 'Chương trình giảm tiền siêu hot 193', 'Mô tả chi tiết cho chương trình VIPBB5C0193', 'vat_pham', 'all', '[\"silver\"]', 1, 2, 200000, 300000, 0, 33, 0, '2026-05-28 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621b555', 'LIXIBE7F1194', 'Chương trình giảm tiền siêu hot 194', 'Mô tả chi tiết cho chương trình LIXIBE7F1194', 'chuoi_da', 'all', '[\"diamond\"]', 0, 2, 130000, 100000, 0, 435, 0, '2026-05-11 04:20:18', '2026-05-29 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621b88f', 'VIP23EB2195', 'Chương trình tặng quà siêu hot 195', 'Mô tả chi tiết cho chương trình VIP23EB2195', 'vat_pham', 'new', NULL, 0, 4, 0, 500000, 0, -1, 0, '2026-05-29 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621b9f6', 'LIXID020F196', 'Chương trình tặng quà siêu hot 196', 'Mô tả chi tiết cho chương trình LIXID020F196', 'vat_pham', 'all', NULL, 1, 4, 0, 100000, 0, 165, 0, '2026-05-22 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621bb29', 'CHAO24673197', 'Chương trình tặng quà siêu hot 197', 'Mô tả chi tiết cho chương trình CHAO24673197', 'vat_pham', 'all', '[\"silver\"]', 0, 4, 0, 400000, 0, 131, 0, '2026-05-29 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621bc6e', 'VIPABE26198', 'Chương trình miễn phí ship siêu hot 198', 'Mô tả chi tiết cho chương trình VIPABE26198', 'vong_ngoc', 'all', '[\"silver\"]', 1, 3, 0, 100000, 40000, 172, 0, '2026-05-31 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621bdd7', 'LIXI7C369199', 'Chương trình tặng quà siêu hot 199', 'Mô tả chi tiết cho chương trình LIXI7C369199', 'vong_ngoc', 'new', NULL, 0, 4, 0, 200000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22'),
('vc_seed_6a1cec621bf28', 'LIXI182DF200', 'Chương trình tặng quà siêu hot 200', 'Mô tả chi tiết cho chương trình LIXI182DF200', 'vong_ngoc', 'all', NULL, 0, 4, 0, 500000, 0, 211, 0, '2026-05-25 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher_danh_muc`
--

CREATE TABLE `voucher_danh_muc` (
  `id_voucher` varchar(50) NOT NULL,
  `id_danh_muc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher_san_pham`
--

CREATE TABLE `voucher_san_pham` (
  `id_voucher` varchar(50) NOT NULL,
  `id_san_pham` varchar(50) NOT NULL
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
  ADD KEY `fk_bv_nd` (`id_nguoi_tao`),
  ADD KEY `fk_bv_dm` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cau_hinh`
--
ALTER TABLE `cau_hinh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_cau_hinh` (`ma_cau_hinh`);

--
-- Chỉ mục cho bảng `cau_hinh_kho`
--
ALTER TABLE `cau_hinh_kho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `config_key` (`config_key`);

--
-- Chỉ mục cho bảng `chinh_sach`
--
ALTER TABLE `chinh_sach`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_trang_thai` (`trang_thai`),
  ADD KEY `idx_loai` (`loai`),
  ADD KEY `idx_ngay_cap_nhat` (`ngay_cap_nhat`);

--
-- Chỉ mục cho bảng `chinh_sach_lich_su`
--
ALTER TABLE `chinh_sach_lich_su`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_chinh_sach` (`id_chinh_sach`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ctdh_donhang` (`id_don_hang`),
  ADD KEY `fk_ctdh_bienthe` (`id_bien_the`);

--
-- Chỉ mục cho bảng `chi_tiet_kiem_ke`
--
ALTER TABLE `chi_tiet_kiem_ke`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_phieu_kiem_ke` (`id_phieu_kiem_ke`),
  ADD KEY `idx_bien_the_kk` (`id_bien_the`);

--
-- Chỉ mục cho bảng `chi_tiet_phieu_kho`
--
ALTER TABLE `chi_tiet_phieu_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ctpk_phieu` (`id_phieu_kho`),
  ADD KEY `fk_ctpk_bienthe` (`id_bien_the`),
  ADD KEY `fk_ctpk_vitri` (`id_vi_tri`);

--
-- Chỉ mục cho bảng `chi_tiet_thuyen_chuyen`
--
ALTER TABLE `chi_tiet_thuyen_chuyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_phieu_chuyen` (`id_phieu_chuyen`),
  ADD KEY `idx_bien_the_tc` (`id_bien_the`);

--
-- Chỉ mục cho bảng `chuong_trinh_khuyen_mai`
--
ALTER TABLE `chuong_trinh_khuyen_mai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_km` (`ma_km`),
  ADD KEY `fk_ctkm_nguoidung` (`nguoi_tao`);

--
-- Chỉ mục cho bảng `chuong_trinh_khuyen_mai_san_pham`
--
ALTER TABLE `chuong_trinh_khuyen_mai_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_km_sp_chuongtrinh` (`id_khuyen_mai`),
  ADD KEY `fk_km_sp_sanpham` (`id_san_pham`);

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
-- Chỉ mục cho bảng `danh_muc_bai_viet`
--
ALTER TABLE `danh_muc_bai_viet`
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
-- Chỉ mục cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_kho` (`ma_kho`),
  ADD KEY `id_nguoi_phu_trach` (`id_nguoi_phu_trach`);

--
-- Chỉ mục cho bảng `khu_vuc_giao_hang`
--
ALTER TABLE `khu_vuc_giao_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khu_vuc_kho`
--
ALTER TABLE `khu_vuc_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kho` (`id_kho`),
  ADD KEY `id_cha` (`id_cha`);

--
-- Chỉ mục cho bảng `lich_kiem_ke`
--
ALTER TABLE `lich_kiem_ke`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lich_kho` (`id_kho`),
  ADD KEY `fk_lich_nguoi_dung` (`id_nguoi_thuc_hien`);

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
  ADD KEY `fk_nd_hang` (`id_hang_thanh_vien`),
  ADD KEY `fk_nd_menh` (`id_menh`);

--
-- Chỉ mục cho bảng `nguoi_dung_voucher`
--
ALTER TABLE `nguoi_dung_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoi_dung` (`id_nguoi_dung`),
  ADD KEY `id_voucher` (`id_voucher`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_nv` (`ma_nv`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_trang_thai` (`trang_thai`),
  ADD KEY `idx_vai_tro` (`vai_tro`),
  ADD KEY `idx_phong_ban` (`phong_ban`);

--
-- Chỉ mục cho bảng `nhan_vien_lich_su`
--
ALTER TABLE `nhan_vien_lich_su`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_nv` (`id_nhan_vien`);

--
-- Chỉ mục cho bảng `nhan_vien_quyen`
--
ALTER TABLE `nhan_vien_quyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_nv_module` (`id_nhan_vien`,`module`);

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
-- Chỉ mục cho bảng `phan_quyen_kho`
--
ALTER TABLE `phan_quyen_kho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_phan_quyen` (`id_kho`,`id_nguoi_dung`),
  ADD KEY `fk_quyen_nguoi_dung` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `phieu_kho`
--
ALTER TABLE `phieu_kho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_phieu` (`ma_phieu`),
  ADD KEY `fk_phieu_nd` (`id_nguoi_tao`),
  ADD KEY `fk_phieu_ncc` (`id_nha_cung_cap`);

--
-- Chỉ mục cho bảng `phieu_kiem_ke`
--
ALTER TABLE `phieu_kiem_ke`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_ma_phieu_kk` (`ma_phieu`),
  ADD KEY `idx_trang_thai_kk` (`trang_thai`),
  ADD KEY `idx_id_kho_kk` (`id_kho`),
  ADD KEY `idx_ngay_tao_kk` (`ngay_tao`);

--
-- Chỉ mục cho bảng `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma` (`ma`);

--
-- Chỉ mục cho bảng `phuong_thuc_van_chuyen`
--
ALTER TABLE `phuong_thuc_van_chuyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma` (`ma`);

--
-- Chỉ mục cho bảng `quy_tac_freeship`
--
ALTER TABLE `quy_tac_freeship`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `san_pham_vi_tri`
--
ALTER TABLE `san_pham_vi_tri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_vitri_bienthe` (`id_vi_tri`,`id_bien_the`),
  ADD KEY `id_bien_the` (`id_bien_the`);

--
-- Chỉ mục cho bảng `san_pham_yeu_thich`
--
ALTER TABLE `san_pham_yeu_thich`
  ADD PRIMARY KEY (`id_nguoi_dung`,`id_san_pham`),
  ADD KEY `fk_yt_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `tai_khoan_ngan_hang`
--
ALTER TABLE `tai_khoan_ngan_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_nd` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `thuyen_chuyen_kho`
--
ALTER TABLE `thuyen_chuyen_kho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_ma_phieu_tc` (`ma_phieu`),
  ADD KEY `idx_trang_thai_tc` (`trang_thai`),
  ADD KEY `idx_kho_gui` (`id_kho_gui`),
  ADD KEY `idx_kho_nhan` (`id_kho_nhan`),
  ADD KEY `idx_ngay_tao_tc` (`ngay_tao`);

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
-- Chỉ mục cho bảng `voucher_danh_muc`
--
ALTER TABLE `voucher_danh_muc`
  ADD PRIMARY KEY (`id_voucher`,`id_danh_muc`),
  ADD KEY `idx_voucher_danh_muc_id_danh_muc` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `voucher_san_pham`
--
ALTER TABLE `voucher_san_pham`
  ADD PRIMARY KEY (`id_voucher`,`id_san_pham`),
  ADD KEY `idx_voucher_san_pham_id_san_pham` (`id_san_pham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cau_hinh_kho`
--
ALTER TABLE `cau_hinh_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `chinh_sach`
--
ALTER TABLE `chinh_sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `chinh_sach_lich_su`
--
ALTER TABLE `chinh_sach_lich_su`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khu_vuc_giao_hang`
--
ALTER TABLE `khu_vuc_giao_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lich_kiem_ke`
--
ALTER TABLE `lich_kiem_ke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `nhan_vien_lich_su`
--
ALTER TABLE `nhan_vien_lich_su`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `nhan_vien_quyen`
--
ALTER TABLE `nhan_vien_quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `phan_quyen_kho`
--
ALTER TABLE `phan_quyen_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_van_chuyen`
--
ALTER TABLE `phuong_thuc_van_chuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quy_tac_freeship`
--
ALTER TABLE `quy_tac_freeship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tai_khoan_ngan_hang`
--
ALTER TABLE `tai_khoan_ngan_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD CONSTRAINT `fk_bv_dm` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc_bai_viet` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_bv_nd` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `chinh_sach_lich_su`
--
ALTER TABLE `chinh_sach_lich_su`
  ADD CONSTRAINT `chinh_sach_lich_su_ibfk_1` FOREIGN KEY (`id_chinh_sach`) REFERENCES `chinh_sach` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ctdh_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ctdh_donhang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_kiem_ke`
--
ALTER TABLE `chi_tiet_kiem_ke`
  ADD CONSTRAINT `fk_ct_kk_phieu` FOREIGN KEY (`id_phieu_kiem_ke`) REFERENCES `phieu_kiem_ke` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_phieu_kho`
--
ALTER TABLE `chi_tiet_phieu_kho`
  ADD CONSTRAINT `fk_ctpk_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ctpk_phieu` FOREIGN KEY (`id_phieu_kho`) REFERENCES `phieu_kho` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ctpk_vitri` FOREIGN KEY (`id_vi_tri`) REFERENCES `khu_vuc_kho` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `chi_tiet_thuyen_chuyen`
--
ALTER TABLE `chi_tiet_thuyen_chuyen`
  ADD CONSTRAINT `fk_ct_tc_phieu` FOREIGN KEY (`id_phieu_chuyen`) REFERENCES `thuyen_chuyen_kho` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chuong_trinh_khuyen_mai`
--
ALTER TABLE `chuong_trinh_khuyen_mai`
  ADD CONSTRAINT `fk_ctkm_nguoidung` FOREIGN KEY (`nguoi_tao`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `chuong_trinh_khuyen_mai_san_pham`
--
ALTER TABLE `chuong_trinh_khuyen_mai_san_pham`
  ADD CONSTRAINT `fk_km_sp_chuongtrinh` FOREIGN KEY (`id_khuyen_mai`) REFERENCES `chuong_trinh_khuyen_mai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_km_sp_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

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
-- Các ràng buộc cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD CONSTRAINT `kho_hang_ibfk_1` FOREIGN KEY (`id_nguoi_phu_trach`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `khu_vuc_kho`
--
ALTER TABLE `khu_vuc_kho`
  ADD CONSTRAINT `khu_vuc_kho_ibfk_1` FOREIGN KEY (`id_kho`) REFERENCES `kho_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `khu_vuc_kho_ibfk_2` FOREIGN KEY (`id_cha`) REFERENCES `khu_vuc_kho` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `lich_kiem_ke`
--
ALTER TABLE `lich_kiem_ke`
  ADD CONSTRAINT `fk_lich_kho` FOREIGN KEY (`id_kho`) REFERENCES `kho_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lich_nguoi_dung` FOREIGN KEY (`id_nguoi_thuc_hien`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `fk_nd_menh` FOREIGN KEY (`id_menh`) REFERENCES `menh_phong_thuy` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_nd_vaitro` FOREIGN KEY (`id_vai_tro`) REFERENCES `vai_tro` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `nguoi_dung_voucher`
--
ALTER TABLE `nguoi_dung_voucher`
  ADD CONSTRAINT `nguoi_dung_voucher_ibfk_1` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nguoi_dung_voucher_ibfk_2` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhan_vien_lich_su`
--
ALTER TABLE `nhan_vien_lich_su`
  ADD CONSTRAINT `nhan_vien_lich_su_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhan_vien_quyen`
--
ALTER TABLE `nhan_vien_quyen`
  ADD CONSTRAINT `nhan_vien_quyen_ibfk_1` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhat_ky_hoat_dong`
--
ALTER TABLE `nhat_ky_hoat_dong`
  ADD CONSTRAINT `fk_log_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `phan_quyen_kho`
--
ALTER TABLE `phan_quyen_kho`
  ADD CONSTRAINT `fk_quyen_kho` FOREIGN KEY (`id_kho`) REFERENCES `kho_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_quyen_nguoi_dung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE;

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
-- Các ràng buộc cho bảng `san_pham_vi_tri`
--
ALTER TABLE `san_pham_vi_tri`
  ADD CONSTRAINT `san_pham_vi_tri_ibfk_1` FOREIGN KEY (`id_vi_tri`) REFERENCES `khu_vuc_kho` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_pham_vi_tri_ibfk_2` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE CASCADE;

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

--
-- Các ràng buộc cho bảng `voucher_danh_muc`
--
ALTER TABLE `voucher_danh_muc`
  ADD CONSTRAINT `fk_voucher_danh_muc_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `voucher_san_pham`
--
ALTER TABLE `voucher_san_pham`
  ADD CONSTRAINT `fk_voucher_san_pham_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
