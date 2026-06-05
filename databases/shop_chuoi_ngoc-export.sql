-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th6 05, 2026 lúc 05:53 PM
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
('bv_6a1d894d79c5e', 'Mệnh Mộc đeo đá gì để công việc thuận buồm xuôi gió?', 'menh-moc-deo-da-gi-de-cong-viec-thuan-buom-xuoi-gio-178032058968', 'dm_6a1d5d9be8479', '[\"mệnh mộc\",\"ngọc bích\",\"diopside\"]', '[\"sp_008\",\"sp_010\",\"sp_001\",\"sp_007\"]', 'Màu xanh lục và đen là chân ái của người mệnh Mộc. Khám phá các loại Ngọc Bích, Diopside giúp vượng khí sinh tài.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 2407, 1, 'Mệnh Mộc đeo đá gì để công việc thuận buồm xuôi gió? - Kiến thức Phong Thủy', 'Màu xanh lục và đen là chân ái của người mệnh Mộc. Khám phá các loại Ngọc Bích, Diopside giúp vượng khí sinh tài.', '2026-05-19 19:22:54', '2026-05-19 19:22:54'),
('bv_6a1d894d79d61', 'Top 5 vòng đá may mắn dành riêng cho người mệnh Thủy', 'top-5-vong-da-may-man-danh-rieng-cho-nguoi-menh-thuy-178032058947', 'dm_6a1d5d9be8479', '[\"mệnh thủy\",\"aquamarine\",\"thạch anh đen\"]', '[\"sp_005\",\"sp_008\"]', 'Đá Aquamarine, Thạch Anh Đen, Thạch Anh Tóc Đen... đâu là lựa chọn hoàn hảo giúp người mệnh Thủy thăng hoa trong sự nghiệp?', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 826, 1, 'Top 5 vòng đá may mắn dành riêng cho người mệnh Thủy - Kiến thức Phong Thủy', 'Đá Aquamarine, Thạch Anh Đen, Thạch Anh Tóc Đen... đâu là lựa chọn hoàn hảo giúp người mệnh Thủy thăng hoa trong sự nghiệp?', '2025-12-21 19:31:13', '2025-12-21 19:31:13'),
('bv_6a1d894d79e3d', 'Bí quyết chọn trang sức đá quý cho người mệnh Hỏa', 'bi-quyet-chon-trang-suc-da-quy-cho-nguoi-menh-hoa-178032058995', 'dm_6a1d5d9be8479', '[\"mệnh hỏa\",\"thạch anh tóc đỏ\",\"ngọc dâu tây\"]', '[\"sp_016\",\"sp_011\"]', 'Mệnh Hỏa cần những gam màu nóng như đỏ, hồng, tím hoặc xanh lục tương sinh. Thạch Anh Tóc Đỏ là lựa chọn số 1.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 1180, 1, 'Bí quyết chọn trang sức đá quý cho người mệnh Hỏa - Kiến thức Phong Thủy', 'Mệnh Hỏa cần những gam màu nóng như đỏ, hồng, tím hoặc xanh lục tương sinh. Thạch Anh Tóc Đỏ là lựa chọn số 1.', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
('bv_6a1d894d79fa5', 'Mệnh Thổ nên tránh đeo đá màu gì để không bị xui xẻo?', 'menh-tho-nen-tranh-deo-da-mau-gi-de-khong-bi-xui-xeo-178032058952', 'dm_6a1d5d9be8479', '[\"mệnh thổ\",\"màu sắc\",\"kiêng kỵ\"]', '[\"sp_007\",\"sp_016\"]', 'Người mệnh Thổ tuyệt đối nên tránh các màu thuộc hành Mộc. Bài viết này hướng dẫn chi tiết cách chọn màu sắc chuẩn.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 2480, 1, 'Mệnh Thổ nên tránh đeo đá màu gì để không bị xui xẻo? - Kiến thức Phong Thủy', 'Người mệnh Thổ tuyệt đối nên tránh các màu thuộc hành Mộc. Bài viết này hướng dẫn chi tiết cách chọn màu sắc chuẩn.', '2026-02-02 04:11:50', '2026-02-02 04:11:50'),
('bv_6a1d894d7a099', 'Nam giới mệnh Kim nên đeo vòng tay thiết kế như thế nào?', 'nam-gioi-menh-kim-nen-deo-vong-tay-thiet-ke-nhu-the-nao-178032058912', 'dm_6a1d5d9be8479', '[\"nam giới\",\"mắt hổ\",\"mệnh kim\"]', '[\"sp_013\",\"sp_011\",\"sp_008\",\"sp_018\"]', 'Phái mạnh mệnh Kim cần những thiết kế nam tính, mạnh mẽ. Vòng tay Mắt Hổ Vàng Tâm kích thước 12mm-14mm là gợi ý tuyệt vời.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 1944, 1, 'Nam giới mệnh Kim nên đeo vòng tay thiết kế như thế nào? - Kiến thức Phong Thủy', 'Phái mạnh mệnh Kim cần những thiết kế nam tính, mạnh mẽ. Vòng tay Mắt Hổ Vàng Tâm kích thước 12mm-14mm là gợi ý tuyệt vời.', '2026-01-23 13:08:13', '2026-01-23 13:08:13'),
('bv_6a1d894d7a26a', 'Vòng tay hồ ly tình duyên cho nữ mệnh Thủy và Mộc', 'vong-tay-ho-ly-tinh-duyen-cho-nu-menh-thuy-va-moc-178032058932', 'dm_6a1d5d9be8479', '[\"hồ ly\",\"tình duyên\",\"mệnh thủy\",\"mệnh mộc\"]', '[\"sp_006\",\"sp_002\",\"sp_016\"]', 'Hồ ly mang lại may mắn trong tình yêu. Nhưng chọn hồ ly màu gì để hợp mệnh Thủy, Mộc? Hãy cùng tìm hiểu.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 2356, 1, 'Vòng tay hồ ly tình duyên cho nữ mệnh Thủy và Mộc - Kiến thức Phong Thủy', 'Hồ ly mang lại may mắn trong tình yêu. Nhưng chọn hồ ly màu gì để hợp mệnh Thủy, Mộc? Hãy cùng tìm hiểu.', '2026-01-18 00:55:04', '2026-01-18 00:55:04'),
('bv_6a1d894d7a348', 'Tỳ hưu chiêu tài: Hướng dẫn chọn màu theo ngũ hành', 'ty-huu-chieu-tai-huong-dan-chon-mau-theo-ngu-hanh-178032058974', 'dm_6a1d5d9be8479', '[\"tỳ hưu\",\"ngũ hành\",\"chiêu tài\"]', '[\"sp_018\",\"sp_016\",\"sp_019\",\"sp_006\"]', 'Tỳ hưu là linh vật chiêu tài bậc nhất. Chọn tỳ hưu ngọc bích, thạch anh hay mã não để phát huy tối đa công dụng?', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 246, 1, 'Tỳ hưu chiêu tài: Hướng dẫn chọn màu theo ngũ hành - Kiến thức Phong Thủy', 'Tỳ hưu là linh vật chiêu tài bậc nhất. Chọn tỳ hưu ngọc bích, thạch anh hay mã não để phát huy tối đa công dụng?', '2025-12-19 05:05:14', '2025-12-19 05:05:14'),
('bv_6a1d894d7a418', 'Giải đáp: Mệnh khuyết Kim, Thủy là gì và cách bổ khuyết', 'giai-dap-menh-khuyet-kim-thuy-la-gi-va-cach-bo-khuyet-178032058941', 'dm_6a1d5d9be8479', '[\"khuyết mệnh\",\"bát tự\",\"bổ khuyết\"]', '[\"sp_018\",\"sp_019\"]', 'Khuyết mệnh là khái niệm nâng cao trong phong thủy Bát Tự. Đeo vòng tay đá quý là cách bổ khuyết năng lượng hiệu quả nhất.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 2492, 1, 'Giải đáp: Mệnh khuyết Kim, Thủy là gì và cách bổ khuyết - Kiến thức Phong Thủy', 'Khuyết mệnh là khái niệm nâng cao trong phong thủy Bát Tự. Đeo vòng tay đá quý là cách bổ khuyết năng lượng hiệu quả nhất.', '2026-01-30 23:50:53', '2026-01-30 23:50:53'),
('bv_6a1d894d7a511', 'Tư vấn chọn quà tặng vòng tay phong thủy hợp mệnh cho đối tác', 'tu-van-chon-qua-tang-vong-tay-phong-thuy-hop-menh-cho-doi-tac-178032058961', 'dm_6a1d5d9be8479', '[\"quà tặng\",\"đối tác\",\"hợp mệnh\"]', '[\"sp_005\",\"sp_019\",\"sp_013\",\"sp_017\"]', 'Tặng quà phong thủy là một nghệ thuật. Cần biết rõ năm sinh để chọn đúng vòng hợp mệnh, thể hiện sự tinh tế của người tặng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 4222, 1, 'Tư vấn chọn quà tặng vòng tay phong thủy hợp mệnh cho đối tác - Kiến thức Phong Thủy', 'Tặng quà phong thủy là một nghệ thuật. Cần biết rõ năm sinh để chọn đúng vòng hợp mệnh, thể hiện sự tinh tế của người tặng.', '2025-12-18 14:58:39', '2025-12-18 14:58:39'),
('bv_6a1d894d7a5f9', 'Ngọc Hòa Điền: Viên ngọc quý từ Tân Cương mang giá trị vĩnh cửu', 'ngoc-hoa-dien-vien-ngoc-quy-tu-tan-cuong-mang-gia-tri-vinh-cuu-178032058935', 'dm_6a1d5d9be8e1a', '[\"ngọc hòa điền\",\"ngọc quý\",\"sức khỏe\"]', '[\"sp_004\",\"sp_014\"]', 'Ngọc Hòa Điền (Hetian Jade) được mệnh danh là Đệ Nhất Ngọc. Khám phá vẻ đẹp mỡ màng, êm dịu và ý nghĩa sức khỏe của nó.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 1511, 1, 'Ngọc Hòa Điền: Viên ngọc quý từ Tân Cương mang giá trị vĩnh cửu - Kiến thức Phong Thủy', 'Ngọc Hòa Điền (Hetian Jade) được mệnh danh là Đệ Nhất Ngọc. Khám phá vẻ đẹp mỡ màng, êm dịu và ý nghĩa sức khỏe của nó.', '2026-02-04 09:56:21', '2026-02-04 09:56:21'),
('bv_6a1d894d7a6bd', 'Thạch Anh Tóc Vàng - Biểu tượng của quyền lực và thịnh vượng', 'thach-anh-toc-vang---bieu-tuong-cua-quyen-luc-va-thinh-vuong-178032058980', 'dm_6a1d5d9be8e1a', '[\"thạch anh tóc vàng\",\"quyền lực\",\"thịnh vượng\"]', '[\"sp_014\",\"sp_010\"]', 'Sở hữu những tinh thể Rutile óng ánh, Thạch Anh Tóc Vàng không chỉ đẹp mà còn là viên đá thu hút tài lộc mạnh nhất.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 3538, 1, 'Thạch Anh Tóc Vàng - Biểu tượng của quyền lực và thịnh vượng - Kiến thức Phong Thủy', 'Sở hữu những tinh thể Rutile óng ánh, Thạch Anh Tóc Vàng không chỉ đẹp mà còn là viên đá thu hút tài lộc mạnh nhất.', '2026-02-05 15:58:24', '2026-02-05 15:58:24'),
('bv_6a1d894d7a81e', 'Mã Não (Agate): Viên đá của sự cân bằng và bảo vệ', 'ma-nao-agate-vien-da-cua-su-can-bang-va-bao-ve-178032058990', 'dm_6a1d5d9be8e1a', '[\"mã não\",\"cân bằng\",\"bảo vệ\"]', '[\"sp_015\",\"sp_019\",\"sp_001\"]', 'Từ xa xưa, Mã Não đã được dùng làm bùa hộ mệnh chống lại tà khí. Khám phá các dải màu độc đáo của Mã Não tự nhiên.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 785, 1, 'Mã Não (Agate): Viên đá của sự cân bằng và bảo vệ - Kiến thức Phong Thủy', 'Từ xa xưa, Mã Não đã được dùng làm bùa hộ mệnh chống lại tà khí. Khám phá các dải màu độc đáo của Mã Não tự nhiên.', '2026-06-01 19:18:34', '2026-06-01 19:18:34'),
('bv_6a1d894d7a8df', 'Ngọc Bích (Nephrite) - Khí chất thanh cao của người quân tử', 'ngoc-bich-nephrite---khi-chat-thanh-cao-cua-nguoi-quan-tu-178032058989', 'dm_6a1d5d9be8e1a', '[\"ngọc bích\",\"nephrite\",\"bình an\"]', '[\"sp_019\",\"sp_003\",\"sp_011\",\"sp_018\"]', 'Người xưa có câu \"Vàng có giá, Ngọc vô giá\". Ngọc bích xanh mướt mang đến sự bình an, tĩnh tâm và dung dưỡng khí huyết.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 3350, 1, 'Ngọc Bích (Nephrite) - Khí chất thanh cao của người quân tử - Kiến thức Phong Thủy', 'Người xưa có câu \"Vàng có giá, Ngọc vô giá\". Ngọc bích xanh mướt mang đến sự bình an, tĩnh tâm và dung dưỡng khí huyết.', '2026-01-22 15:08:37', '2026-01-22 15:08:37'),
('bv_6a1d894d7a99c', 'Đá Aquamarine - Nước mắt của nữ thần biển cả', 'da-aquamarine---nuoc-mat-cua-nu-than-bien-ca-178032058944', 'dm_6a1d5d9be8e1a', '[\"aquamarine\",\"tình yêu\",\"bình an\"]', '[\"sp_015\",\"sp_002\",\"sp_019\",\"sp_006\"]', 'Màu xanh trong vắt của Aquamarine tượng trưng cho tình yêu chung thủy, sự bình an trên những chuyến đi xa.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 618, 1, 'Đá Aquamarine - Nước mắt của nữ thần biển cả - Kiến thức Phong Thủy', 'Màu xanh trong vắt của Aquamarine tượng trưng cho tình yêu chung thủy, sự bình an trên những chuyến đi xa.', '2026-05-30 01:23:39', '2026-05-30 01:23:39'),
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
('bv_6a1d894d7b5ec', 'Đá phong thủy bị mờ nứt: Khi nào cần thay vòng mới?', 'da-phong-thuy-bi-mo-nut-khi-nao-can-thay-vong-moi-178032058989', 'dm_6a1d5d9be9003', '[\"đá mờ\",\"thay vòng\",\"năng lượng tiêu cực\"]', '[\"sp_015\",\"sp_002\",\"sp_004\",\"sp_020\"]', 'Trải qua thời gian dài hút năng lượng tiêu cực, viên đá có thể bị đục màu hoặc nứt rạn. Đây là lúc bạn cần thanh tẩy hoặc thay mới.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 1024, 1, 'Đá phong thủy bị mờ nứt: Khi nào cần thay vòng mới? - Kiến thức Phong Thủy', 'Trải qua thời gian dài hút năng lượng tiêu cực, viên đá có thể bị đục màu hoặc nứt rạn. Đây là lúc bạn cần thanh tẩy hoặc thay mới.', '2026-05-09 08:08:19', '2026-05-09 08:08:19'),
('bv_6a1d894d7b6ae', 'Tại sao thạch anh tóc lại bị nhạt màu sau một thời gian?', 'tai-sao-thach-anh-toc-lai-bi-nhat-mau-sau-mot-thoi-gian-178032058944', 'dm_6a1d5d9be9003', '[\"thạch anh tóc\",\"nhạt màu\",\"khắc phục\"]', '[\"sp_004\",\"sp_010\",\"sp_012\"]', 'Tiếp xúc nhiều với ánh nắng mặt trời gắt, chất tẩy rửa hóa học có thể làm giảm vẻ đẹp của thạch anh tóc. Cách khắc phục hiệu quả.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 3974, 1, 'Tại sao thạch anh tóc lại bị nhạt màu sau một thời gian? - Kiến thức Phong Thủy', 'Tiếp xúc nhiều với ánh nắng mặt trời gắt, chất tẩy rửa hóa học có thể làm giảm vẻ đẹp của thạch anh tóc. Cách khắc phục hiệu quả.', '2026-04-24 18:15:41', '2026-04-24 18:15:41'),
('bv_6a1d894d7b774', 'Hướng dẫn đo size cổ tay để chọn vòng chuẩn nhất', 'huong-dan-do-size-co-tay-de-chon-vong-chuan-nhat-178032058990', 'dm_6a1d5d9be9003', '[\"đo size\",\"ni tay\",\"hướng dẫn\"]', '[\"sp_004\",\"sp_012\",\"sp_019\"]', 'Mua vòng online làm sao để vừa tay? Cùng xem hướng dẫn đo ni cổ tay bằng sợi dây và thước kẻ đơn giản nhất.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 603, 1, 'Hướng dẫn đo size cổ tay để chọn vòng chuẩn nhất - Kiến thức Phong Thủy', 'Mua vòng online làm sao để vừa tay? Cùng xem hướng dẫn đo ni cổ tay bằng sợi dây và thước kẻ đơn giản nhất.', '2025-12-25 15:40:52', '2025-12-25 15:40:52'),
('bv_6a1d894d7b860', 'Cách kích hoạt lại năng lượng cho vòng đá sau 1 năm sử dụng', 'cach-kich-hoat-lai-nang-luong-cho-vong-da-sau-1-nam-su-dung-178032058986', 'dm_6a1d5d9be9003', '[\"kích hoạt\",\"năng lượng\",\"phơi trăng\"]', '[\"sp_001\",\"sp_020\"]', 'Đá phong thủy cũng cần \"nghỉ ngơi\" và sạc lại năng lượng. Phơi sương, phơi trăng hoặc ngâm nước suối là phương pháp hiệu quả.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 2744, 1, 'Cách kích hoạt lại năng lượng cho vòng đá sau 1 năm sử dụng - Kiến thức Phong Thủy', 'Đá phong thủy cũng cần \"nghỉ ngơi\" và sạc lại năng lượng. Phơi sương, phơi trăng hoặc ngâm nước suối là phương pháp hiệu quả.', '2026-04-29 17:15:51', '2026-04-29 17:15:51'),
('bv_6a1d894d7bab3', 'Mừng tháng Vu Lan: Tặng ngay Trầm Hương xông nhà khi mua vòng Ngọc', 'mung-thang-vu-lan-tang-ngay-tram-huong-xong-nha-khi-mua-vong-ngoc-178032058911', 'dm_6a1d5d9be91f3', '[\"vu lan\",\"ưu đãi\",\"trầm hương\"]', '[\"sp_016\",\"sp_002\"]', 'Chương trình tri ân đặc biệt mùa Vu Lan Báo Hiếu. Tặng hộp trầm hương nụ cao cấp cho mọi hóa đơn trên 1 triệu đồng.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/10/800/500', NULL, 4233, 1, 'Mừng tháng Vu Lan: Tặng ngay Trầm Hương xông nhà khi mua vòng Ngọc - Kiến thức Phong Thủy', 'Chương trình tri ân đặc biệt mùa Vu Lan Báo Hiếu. Tặng hộp trầm hương nụ cao cấp cho mọi hóa đơn trên 1 triệu đồng.', '2025-12-05 04:13:18', '2025-12-05 04:13:18'),
('bv_6a1d894d7bc23', 'Sự kiện ra mắt BST \"Thanh Âm Mùa Thu\" - Giảm 15% toàn bộ', 'su-kien-ra-mat-bst-thanh-am-mua-thu---giam-15-toan-bo-178032058916', 'dm_6a1d5d9be91f3', '[\"bộ sưu tập\",\"mùa thu\",\"giảm giá\"]', '[\"sp_019\",\"sp_014\"]', 'Bộ sưu tập mới nhất với chất liệu Ngọc Hòa Điền kết hợp charm Bạc s925 thiết kế tinh xảo. Ưu đãi 15% tuần lễ vàng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/11/800/500', NULL, 4196, 1, 'Sự kiện ra mắt BST \"Thanh Âm Mùa Thu\" - Giảm 15% toàn bộ - Kiến thức Phong Thủy', 'Bộ sưu tập mới nhất với chất liệu Ngọc Hòa Điền kết hợp charm Bạc s925 thiết kế tinh xảo. Ưu đãi 15% tuần lễ vàng.', '2026-01-03 08:18:00', '2026-01-03 08:18:00'),
('bv_6a1d894d7bd86', 'Sinh nhật Chuỗi Ngọc: Flash Sale 50% hàng ngàn sản phẩm', 'sinh-nhat-chuoi-ngoc-flash-sale-50-hang-ngan-san-pham-178032058939', 'dm_6a1d5d9be91f3', '[\"sinh nhật\",\"flash sale\",\"khuyến mãi\"]', '[\"sp_005\",\"sp_007\"]', 'Cơ hội sở hữu vòng tay phong thủy với mức giá chưa từng có. Duy nhất trong ngày sinh nhật của thương hiệu.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/12/800/500', NULL, 53, 1, 'Sinh nhật Chuỗi Ngọc: Flash Sale 50% hàng ngàn sản phẩm - Kiến thức Phong Thủy', 'Cơ hội sở hữu vòng tay phong thủy với mức giá chưa từng có. Duy nhất trong ngày sinh nhật của thương hiệu.', '2025-12-18 23:28:24', '2025-12-18 23:28:24'),
('bv_6a1d894d7be90', 'Tặng vòng dâu tằm bình an cho bé khi mẹ mua sắm', 'tang-vong-dau-tam-binh-an-cho-be-khi-me-mua-sam-178032058947', 'dm_6a1d5d9be91f3', '[\"vòng dâu tằm\",\"tặng quà\",\"bình an\"]', '[\"sp_010\",\"sp_012\",\"sp_006\"]', 'Chương trình đồng hành cùng gia đình Việt. Mỗi hóa đơn mua sắm trang sức cho mẹ sẽ được tặng kèm vòng dâu tằm trừ tà cho bé.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/13/800/500', NULL, 2994, 1, 'Tặng vòng dâu tằm bình an cho bé khi mẹ mua sắm - Kiến thức Phong Thủy', 'Chương trình đồng hành cùng gia đình Việt. Mỗi hóa đơn mua sắm trang sức cho mẹ sẽ được tặng kèm vòng dâu tằm trừ tà cho bé.', '2025-12-19 12:57:32', '2025-12-19 12:57:32'),
('bv_6a1d894d7bf82', 'Săn mã Freeship mọi miền tổ quốc trong tháng này', 'san-ma-freeship-moi-mien-to-quoc-trong-thang-nay-178032058969', 'dm_6a1d5d9be91f3', '[\"freeship\",\"vận chuyển\",\"thanh toán\"]', '[\"sp_007\",\"sp_015\",\"sp_016\"]', 'Chuỗi Ngọc chính thức hỗ trợ 100% phí vận chuyển cho tất cả đơn hàng thanh toán trước qua chuyển khoản ngân hàng.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/14/800/500', NULL, 4587, 1, 'Săn mã Freeship mọi miền tổ quốc trong tháng này - Kiến thức Phong Thủy', 'Chuỗi Ngọc chính thức hỗ trợ 100% phí vận chuyển cho tất cả đơn hàng thanh toán trước qua chuyển khoản ngân hàng.', '2026-02-23 13:20:54', '2026-02-23 13:20:54'),
('bv_6a1d894d7c054', 'Pre-order Bộ Sưu Tập Tết 2027: Nhận quà khủng', 'pre-order-bo-suu-tap-tet-2027-nhan-qua-khung-178032058937', 'dm_6a1d5d9be91f3', '[\"tết 2027\",\"pre order\",\"lì xì vàng\"]', '[\"sp_019\",\"sp_020\",\"sp_017\",\"sp_013\"]', 'Đặt trước bộ vòng linh vật của năm 2027 để nhận ngay bao lì xì mạ vàng 24k may mắn. Số lượng có hạn.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/15/800/500', NULL, 1866, 1, 'Pre-order Bộ Sưu Tập Tết 2027: Nhận quà khủng - Kiến thức Phong Thủy', 'Đặt trước bộ vòng linh vật của năm 2027 để nhận ngay bao lì xì mạ vàng 24k may mắn. Số lượng có hạn.', '2026-01-21 03:50:06', '2026-01-21 03:50:06'),
('bv_6a1d894d7c227', 'Tri ân khách hàng thân thiết: Nâng hạng thành viên, nhân đôi điểm', 'tri-an-khach-hang-than-thiet-nang-hang-thanh-vien-nhan-doi-diem-178032058944', 'dm_6a1d5d9be91f3', '[\"thành viên\",\"tích điểm\",\"vip\"]', '[\"sp_002\",\"sp_008\"]', 'Chính sách thành viên mới cực kỳ hấp dẫn. Khách hàng VIP sẽ được giảm thêm 5-10% cho mọi hóa đơn trọn đời.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/16/800/500', NULL, 1710, 1, 'Tri ân khách hàng thân thiết: Nâng hạng thành viên, nhân đôi điểm - Kiến thức Phong Thủy', 'Chính sách thành viên mới cực kỳ hấp dẫn. Khách hàng VIP sẽ được giảm thêm 5-10% cho mọi hóa đơn trọn đời.', '2026-03-21 00:31:35', '2026-03-21 00:31:35'),
('bv_6a1d894d7c302', 'Xả kho cuối năm: Giá chỉ từ 199K cho vòng tay Mã Não', 'xa-kho-cuoi-nam-gia-chi-tu-199k-cho-vong-tay-ma-nao-178032058970', 'dm_6a1d5d9be91f3', '[\"xả kho\",\"cuối năm\",\"mã não\"]', '[\"sp_016\",\"sp_003\",\"sp_020\",\"sp_015\"]', 'Cơ hội mua sắm vòng tay Mã Não tự nhiên chuẩn phong thủy với giá dọn kho cực sốc, không lo về giá.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/17/800/500', NULL, 2881, 1, 'Xả kho cuối năm: Giá chỉ từ 199K cho vòng tay Mã Não - Kiến thức Phong Thủy', 'Cơ hội mua sắm vòng tay Mã Não tự nhiên chuẩn phong thủy với giá dọn kho cực sốc, không lo về giá.', '2026-02-03 20:04:43', '2026-02-03 20:04:43'),
('bv_6a1d894d7c3c6', 'Quà tặng 8/3: Tôn vinh vẻ đẹp người phụ nữ Việt', 'qua-tang-83-ton-vinh-ve-dep-nguoi-phu-nu-viet-178032058960', 'dm_6a1d5d9be91f3', '[\"quà 8\\/3\",\"quà tặng\",\"phụ nữ\"]', '[\"sp_019\",\"sp_013\"]', 'Tháng của nàng, Chuỗi Ngọc tặng bạn mã giảm giá 83K và hộp quà hoa sáp cao cấp khi mua vòng tay dành tặng phái đẹp.', '<p>Trong phong thủy, năng lượng vạn vật đều tuân theo quy luật tự nhiên. Hiểu rõ các quy luật này không chỉ giúp bạn cải thiện sức khỏe mà còn mang lại sự thăng hoa trong công việc.</p>\n        <h2>1. Nguyên lý cơ bản</h2>\n        <p>Mỗi vật thể xung quanh chúng ta đều mang một tần số rung động riêng. Các loại ngọc, đá quý trải qua hàng triệu năm hấp thụ tinh hoa đất trời, mang trong mình nguồn năng lượng vô cùng tinh khiết.</p>\n        <ul>\n            <li>Giúp thanh lọc tâm trí, giảm bớt căng thẳng lo âu.</li>\n            <li>Thu hút những cơ hội tốt đẹp, những quý nhân phù trợ trong sự nghiệp.</li>\n            <li>Cân bằng năng lượng âm dương trong cơ thể.</li>\n        </ul>\n        <h2>2. Lời khuyên chuyên gia</h2>\n        <p>Theo các chuyên gia phong thủy, khi chọn mua bất kỳ vật phẩm nào, bạn nên ưu tiên cảm giác của bản thân. Nếu bạn nhìn thấy một chiếc vòng và cảm thấy vô cùng yêu thích, đó chính là <strong>\'vạn vật hữu linh, vật tìm chủ\'</strong>.</p>\n        <blockquote>\n            <p>Hãy chăm sóc và thanh tẩy vật phẩm phong thủy thường xuyên để chúng phát huy tối đa công năng bảo vệ bạn.</p>\n        </blockquote>\n        <p>Chúc bạn sớm tìm được vật phẩm ưng ý và đón nhận nhiều may mắn trong cuộc sống!</p>', 'https://picsum.photos/id/18/800/500', NULL, 1392, 1, 'Quà tặng 8/3: Tôn vinh vẻ đẹp người phụ nữ Việt - Kiến thức Phong Thủy', 'Tháng của nàng, Chuỗi Ngọc tặng bạn mã giảm giá 83K và hộp quà hoa sáp cao cấp khi mua vòng tay dành tặng phái đẹp.', '2026-04-09 11:30:19', '2026-04-09 11:30:19'),
('bv_6a1d894d7c482', 'Ra mắt dịch vụ: Tết dây mix charm theo yêu cầu cá nhân hóa', 'ra-mat-dich-vu-tet-day-mix-charm-theo-yeu-cau-ca-nhan-hoa-178032058982', 'dm_6a1d5d9be91f3', '[\"cá nhân hóa\",\"thiết kế\",\"tết dây\"]', '[\"sp_011\",\"sp_002\",\"sp_015\",\"sp_001\"]', 'Bạn muốn một chiếc vòng không đụng hàng? Chuỗi Ngọc ra mắt dịch vụ thiết kế tết dây và mix charm theo ý thích ngay tại cửa hàng.', '<p>Bạn có biết rằng, những chi tiết nhỏ nhất trong cuộc sống hàng ngày cũng có thể ảnh hưởng đến tài lộc của bạn? Hãy cùng tìm hiểu bí quyết ứng dụng phong thủy một cách khoa học và tinh tế nhất.</p>\n        <h2>Tầm quan trọng của sự cân bằng</h2>\n        <p>Phong thủy không phải là mê tín dị đoan, mà là bộ môn khoa học về môi trường sống. Sự cân bằng năng lượng sẽ giúp cơ thể tự phục hồi và tư duy trở nên sáng suốt hơn.</p>\n        <p>Để duy trì trạng thái tốt nhất, bạn cần:</p>\n        <ol>\n            <li>Luôn giữ không gian sống sạch sẽ, thoáng đãng.</li>\n            <li>Sử dụng các loại bột xông, tinh dầu trầm hương để làm sạch không khí.</li>\n            <li>Mang bên mình một vật phẩm phong thủy hợp mệnh để làm điểm tựa tinh thần.</li>\n        </ol>\n        <h2>Gợi ý dành riêng cho bạn</h2>\n        <p>Với nhiều năm kinh nghiệm trong lĩnh vực đá quý, chúng tôi khuyên bạn nên chọn những sản phẩm có nguồn gốc tự nhiên 100%. Đá tự nhiên có vân vết, có độ lạnh đặc trưng và năng lượng dồi dào, khác hẳn với các loại đá nhân tạo hay thủy tinh nấu.</p>\n        <p>Đừng ngần ngại liên hệ với đội ngũ chuyên gia của chúng tôi để được tư vấn hoàn toàn miễn phí nhé.</p>', 'https://picsum.photos/id/19/800/500', NULL, 624, 1, 'Ra mắt dịch vụ: Tết dây mix charm theo yêu cầu cá nhân hóa - Kiến thức Phong Thủy', 'Bạn muốn một chiếc vòng không đụng hàng? Chuỗi Ngọc ra mắt dịch vụ thiết kế tết dây và mix charm theo ý thích ngay tại cửa hàng.', '2026-02-17 00:49:50', '2026-02-17 00:49:50'),
('bv_chinh_sach_doi_tra', 'Chính sách đổi trả', 'chinh-sach-doi-tra', NULL, NULL, NULL, NULL, '<h2>1. ĐIỀU KIỆN ĐỔI TRẢ</h2><ul><li>Sản phẩm chưa qua sử dụng, còn nguyên tem mác, hộp đựng.</li><li>Không bị nứt vỡ, trầy xước do tác động ngoại lực.</li><li>Sản phẩm phải có hóa đơn mua hàng hợp lệ tại Chuỗi Ngọc.</li></ul><h2>2. THỜI GIAN ĐỔI TRẢ</h2><p>Khách hàng có thể yêu cầu đổi trả trong vòng <strong>7 ngày</strong> kể từ ngày nhận hàng.</p><h2>3. CÁC TRƯỜNG HỢP KHÔNG HỖ TRỢ</h2><ul><li>Vòng ngọc, chuỗi đá đã qua chỉnh sửa kích thước theo yêu cầu riêng.</li><li>Sản phẩm khuyến mãi sâu trong các chương trình Flash Sale.</li></ul>', NULL, NULL, 7, 1, NULL, NULL, '2026-06-03 12:07:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` varchar(20) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tieu_de_hien_thi` varchar(255) DEFAULT NULL,
  `badge_text` varchar(100) DEFAULT NULL,
  `cta` varchar(100) DEFAULT NULL,
  `btn_2_text` varchar(50) DEFAULT NULL,
  `btn_2_link` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `dac_diem_1` varchar(255) DEFAULT NULL,
  `dac_diem_2` varchar(255) DEFAULT NULL,
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

INSERT INTO `banner` (`id`, `ten`, `tieu_de_hien_thi`, `badge_text`, `cta`, `btn_2_text`, `btn_2_link`, `mo_ta`, `dac_diem_1`, `dac_diem_2`, `anh_desktop`, `anh_mobile`, `vi_tri`, `thiet_bi`, `loai_link`, `link`, `thu_tu`, `trang_thai`, `khong_gioi_han`, `bat_dau`, `ket_thuc`, `luot_click`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('bn_6a1d95805f9e3', 'Bộ Sưu Tập Ngọc Hòa Điền 2026', 'Thanh Âm Ngọc Quý', '✨ Ngọc Quý Thiên Nhiên', 'Khám phá ngay', 'Xem bộ sưu tập', '/san-pham', 'Chế tác tinh xảo từ Ngọc Hòa Điền tự nhiên, tôn vinh vẻ đẹp Á Đông.', 'Chế tác thủ công tinh xảo, tôn vinh nét Á Đông', 'Bảo hành ngọc tự nhiên trọn đời 100%', '/public/uploads/banners/banner1.jpg', '/public/uploads/banners/banner2.jpg', 'slider_chinh', 'desktop_mobile', 'danh_muc', '/san-pham', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fbbc', 'Flash Sale Cuối Tháng - Tặng Tỳ Hưu', 'Flash Sale Cuối Tháng', '🔥 Ưu Đãi Giới Hạn', 'Săn Deal Ngay', 'Xem chi tiết', '/khuyen-mai', 'Tặng charm Tỳ Hưu chiêu tài cho đơn hàng Vòng Đá Phong Thủy từ 2 triệu đồng.', 'Tặng charm Tỳ Hưu mạ vàng chiêu tài hút vận may cát tường', 'Miễn phí vận chuyển toàn quốc cho tất cả đơn hàng Flash Sale', '/public/uploads/banners/banner2.jpg', '/public/uploads/banners/banner3.jpg', 'slider_chinh', 'desktop_mobile', 'khuyen_mai', '/khuyen-mai', 2, 'dang_hien_thi', 0, '2026-06-01 00:00:00', '2026-06-11 23:59:59', 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fc6c', 'Vòng Sinh Mệnh - Bùa Hộ Mệnh 2026', 'Bình An Gõ Cửa', '☯ Dụng Thần Bát Tự', 'Chọn Vòng Ngay', 'Nhận tư vấn', '/lien-he', 'Cá nhân hóa vòng phong thủy theo Dụng Thần Bát Tự, thu hút năng lượng tích cực.', 'Cá nhân hóa thiết kế vòng theo ngày giờ sinh cụ thể', 'Kích hoạt vượng khí, đẩy lùi xui rủi mang lại bình an', '/public/uploads/banners/banner3.jpg', '/public/uploads/banners/banner4.jpg', 'slider_chinh', 'desktop_mobile', 'tuy_chinh', '/vong-theo-menh', 3, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fd83', 'Banner Phụ Trái - Miễn phí vận chuyển', 'Freeship Mọi Miền', NULL, 'Xem chính sách', NULL, NULL, 'Giao hàng nhanh toàn quốc.', NULL, NULL, '/public/uploads/banners/banner4.jpg', '/public/uploads/banners/banner5.jpg', 'banner_phu', 'desktop_mobile', 'bai_viet', '/bai-viet', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805fe3c', 'Banner Phụ Phải - Đổi trả 7 ngày', 'An Tâm Mua Sắm', NULL, 'Chi tiết', NULL, NULL, 'Kiểm hàng trước khi thanh toán.', NULL, NULL, '/public/uploads/banners/banner5.jpg', '/public/uploads/banners/banner1.jpg', 'banner_phu', 'desktop_mobile', 'bai_viet', '/bai-viet', 2, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95805ff33', 'Banner Danh mục Thạch Anh', 'Năng Lượng Thạch Anh', NULL, 'Mua ngay', NULL, '/san-pham', '', NULL, NULL, '/public/uploads/banners/banner1.jpg', '/public/uploads/banners/banner2.jpg', 'san_pham', 'desktop_mobile', 'danh_muc', '/san-pham', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d958060032', 'Banner Danh mục Ngọc Bích', 'Bình An Từ Ngọc Bích', '✨ Ngọc Quý Thiên Nhiên', 'Khám phá', 'Xem bộ sưu tập', '/san-pham', '', 'Chế tác thủ công tinh xảo, tôn vinh nét Á Đông', 'Bảo hành ngọc tự nhiên trọn đời 100%', '/public/uploads/banners/banner2.jpg', '/public/uploads/banners/banner3.jpg', 'san_pham', 'desktop_mobile', 'danh_muc', '/san-pham', 2, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95806014a', 'Banner Tặng kèm hộp gỗ cao cấp', 'Quà Tặng Cao Cấp', NULL, '', NULL, NULL, 'Tặng hộp gấm lót nhung và phiếu bảo hành đá quý trọn đời.', NULL, NULL, '/public/uploads/banners/banner3.jpg', '/public/uploads/banners/banner4.jpg', 'chi_tiet_sp', 'desktop_mobile', 'bai_viet', '/bai-viet', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95806022f', 'Banner Sidebar Blog - Tư vấn phong thủy', 'Tư Vấn Miễn Phí', NULL, 'Chat ngay', NULL, NULL, 'Bạn chưa biết chọn đá hợp mệnh? Hãy để chuyên gia hỗ trợ bạn.', NULL, NULL, '/public/uploads/banners/banner4.jpg', '/public/uploads/banners/banner5.jpg', 'bai_viet', 'desktop_mobile', 'tuy_chinh', 'https://zalo.me/', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d958060332', 'Banner Đăng ký nhận tin', 'Nhận Ưu Đãi Độc Quyền', NULL, 'Đăng ký', NULL, NULL, 'Nhận ngay Voucher 100K khi đăng ký email.', NULL, NULL, '/public/uploads/banners/banner5.jpg', '/public/uploads/banners/banner1.jpg', 'footer', 'desktop_mobile', 'tuy_chinh', '#', 1, 'dang_hien_thi', 1, NULL, NULL, 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d95806040b', 'Banner Noel 2026 (Chưa dùng)', 'Merry Christmas', NULL, 'Săn Quà', NULL, NULL, 'Ấm áp mùa lễ hội cùng Chuỗi Ngọc.', NULL, NULL, '/public/uploads/banners/banner1.jpg', '/public/uploads/banners/banner2.jpg', 'khuyen_mai', 'desktop_mobile', 'khuyen_mai', '/khuyen-mai/noel-2026', 1, 'nhap', 0, '2026-12-15 00:00:00', '2026-12-25 23:59:59', 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52'),
('bn_6a1d9580604e6', 'Banner Hết Hạn (Tết 2024)', 'Chúc Mừng Năm Mới', NULL, '', NULL, NULL, 'Giảm 50% dịp Tết.', NULL, NULL, '/public/uploads/banners/banner2.jpg', '/public/uploads/banners/banner3.jpg', 'slider_chinh', 'desktop_mobile', 'khuyen_mai', '/khuyen-mai', 4, 'dang_hien_thi', 0, '2024-01-01 00:00:00', '2024-02-15 23:59:59', 0, '2026-06-01 21:21:52', '2026-06-01 21:21:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan_bai_viet`
--

CREATE TABLE `binh_luan_bai_viet` (
  `id` varchar(36) NOT NULL,
  `id_bai_viet` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) DEFAULT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `noi_dung` text NOT NULL,
  `id_phan_hoi` varchar(36) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Hợp lệ, 0: Ẩn',
  `ngay_tao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan_bai_viet`
--

INSERT INTO `binh_luan_bai_viet` (`id`, `id_bai_viet`, `id_nguoi_dung`, `ho_ten`, `email`, `noi_dung`, `id_phan_hoi`, `trang_thai`, `ngay_tao`) VALUES
('bl_1', 'bv_6a1d894d77eae', NULL, 'Hoàng Kim', NULL, 'Bài viết rất chi tiết và bổ ích. Cho mình hỏi cổ tay nhỏ thì nên đeo hạt mấy ly ạ?', NULL, 1, '2023-11-12 14:30:00'),
('bl_2', 'bv_6a1d894d77eae', NULL, 'Trần Phương', NULL, 'Mình đã mua vòng Thạch Anh Tóc Vàng bên shop, đá rất sáng và đẹp. Sẽ ủng hộ shop dài dài.', NULL, 1, '2023-11-10 09:15:00');

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
('ch_6a16d928f266b', 'review_settings', 'Cài đặt đánh giá', '{\"auto_approve_stars\":1,\"hold_with_image\":1,\"blocked_keywords\":\"\"}', 'Cấu hình duyệt tự động và chặn từ khóa'),
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
('ctdh_6a1c160a079c3', 'dh_6a1c160a073e1', 'bt_6a17ca3f31802_4999', 2, 420000),
('ctdh_6a1ed042b3a52', 'dh_6a1ed042b3167', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed042b4ae7', 'dh_6a1ed042b3167', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed042b56b2', 'dh_6a1ed042b53da', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed042b5bf8', 'dh_6a1ed042b53da', 'bt_6a17ca3f411b4_4886', 2, 1070000),
('ctdh_6a1ed042b6c29', 'dh_6a1ed042b67e2', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed042b785b', 'dh_6a1ed042b73dc', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed042b80d4', 'dh_6a1ed042b73dc', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed042b8fe1', 'dh_6a1ed042b73dc', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042ba0c4', 'dh_6a1ed042b9c1a', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed042ba91a', 'dh_6a1ed042b9c1a', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed042bbb4c', 'dh_6a1ed042bb8ed', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed042bc582', 'dh_6a1ed042bc2e7', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed042bc904', 'dh_6a1ed042bc2e7', 'bt_6a17ca3f3c1e0_7068', 3, 1520000),
('ctdh_6a1ed042bd064', 'dh_6a1ed042bce10', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed042bdb6b', 'dh_6a1ed042bd781', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed042bdeec', 'dh_6a1ed042bd781', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed042be2c6', 'dh_6a1ed042bd781', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed042be6b0', 'dh_6a1ed042bd781', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed042bf249', 'dh_6a1ed042bee0e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed042bf605', 'dh_6a1ed042bee0e', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed042bfeb5', 'dh_6a1ed042bface', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed042c060d', 'dh_6a1ed042bface', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed042c0d48', 'dh_6a1ed042bface', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed042c1cb0', 'dh_6a1ed042c185d', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed042c2450', 'dh_6a1ed042c185d', 'bt_6a17ca3f35b27_1230', 2, 1520000),
('ctdh_6a1ed042c337a', 'dh_6a1ed042c2f70', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed042c3a78', 'dh_6a1ed042c2f70', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed042c4161', 'dh_6a1ed042c2f70', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed042c4b3d', 'dh_6a1ed042c4932', 'bt_6a17ca3f41c25_8343', 2, 1520000),
('ctdh_6a1ed042c4ebf', 'dh_6a1ed042c4932', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed042c5229', 'dh_6a1ed042c4932', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed042c5925', 'dh_6a1ed042c56fc', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed042c6824', 'dh_6a1ed042c6406', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed042c6f5a', 'dh_6a1ed042c6406', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed042c7861', 'dh_6a1ed042c765d', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed042c7c17', 'dh_6a1ed042c765d', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed042c7fa0', 'dh_6a1ed042c765d', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed042c86f2', 'dh_6a1ed042c765d', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed042c95ca', 'dh_6a1ed042c91c0', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042c9d33', 'dh_6a1ed042c91c0', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed042cabf7', 'dh_6a1ed042ca7d0', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed042cb299', 'dh_6a1ed042ca7d0', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed042cb8e5', 'dh_6a1ed042ca7d0', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed042cc682', 'dh_6a1ed042cc47a', 'bt_6a17ca3f45a76_9908', 1, 1790000),
('ctdh_6a1ed042cc82c', 'dh_6a1ed042cc47a', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042cc9ba', 'dh_6a1ed042cc47a', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042ccf49', 'dh_6a1ed042ccd1f', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed042cd10b', 'dh_6a1ed042ccd1f', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed042cd88f', 'dh_6a1ed042cd4ee', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed042cdefe', 'dh_6a1ed042cd4ee', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed042ce507', 'dh_6a1ed042cd4ee', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042ceb11', 'dh_6a1ed042cd4ee', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed042cf54c', 'dh_6a1ed042cf3d4', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed042cf680', 'dh_6a1ed042cf3d4', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed042cf78f', 'dh_6a1ed042cf3d4', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042cfae1', 'dh_6a1ed042cf975', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed042cfd11', 'dh_6a1ed042cf975', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed042d031a', 'dh_6a1ed042cf975', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed042d098c', 'dh_6a1ed042cf975', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed042d1576', 'dh_6a1ed042d123d', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed042d1896', 'dh_6a1ed042d123d', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed042d222a', 'dh_6a1ed042d1eb6', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed042d28df', 'dh_6a1ed042d1eb6', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed042d2f85', 'dh_6a1ed042d2e22', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed042d3761', 'dh_6a1ed042d33ad', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed042d443f', 'dh_6a1ed042d40e5', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed042d50eb', 'dh_6a1ed042d4d79', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed042d5713', 'dh_6a1ed042d4d79', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042d5d2b', 'dh_6a1ed042d4d79', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed042d639c', 'dh_6a1ed042d622a', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed042d65c4', 'dh_6a1ed042d622a', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed042d6c26', 'dh_6a1ed042d68f6', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed042d7836', 'dh_6a1ed042d74e8', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed042d7e23', 'dh_6a1ed042d74e8', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed042d8419', 'dh_6a1ed042d74e8', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed042d902f', 'dh_6a1ed042d8cc8', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed042d9d91', 'dh_6a1ed042d99c9', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed042da034', 'dh_6a1ed042d99c9', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed042da54d', 'dh_6a1ed042da360', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed042da8a8', 'dh_6a1ed042da360', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed042dac0a', 'dh_6a1ed042da360', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed042db57b', 'dh_6a1ed042db215', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042dbba4', 'dh_6a1ed042db215', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042dc1b0', 'dh_6a1ed042db215', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed042dceb1', 'dh_6a1ed042dcb35', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed042dd0cf', 'dh_6a1ed042dcb35', 'bt_6a17ca3f43eaf_3226', 1, 1350000),
('ctdh_6a1ed042dd300', 'dh_6a1ed042dcb35', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed042dd81b', 'dh_6a1ed042dd68a', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed042ddb06', 'dh_6a1ed042dd68a', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042dde22', 'dh_6a1ed042dd68a', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed042de717', 'dh_6a1ed042de39f', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed042dea1c', 'dh_6a1ed042de39f', 'bt_6a17ca3f3b7a5_8182', 3, 1200000),
('ctdh_6a1ed042df39e', 'dh_6a1ed042df029', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed042e0028', 'dh_6a1ed042dfcae', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed042e030e', 'dh_6a1ed042dfcae', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed042e0620', 'dh_6a1ed042dfcae', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed042e0a4a', 'dh_6a1ed042dfcae', 'bt_6a17ca3f3db8f_3782', 2, 1140000),
('ctdh_6a1ed042e0dbe', 'dh_6a1ed042e0c65', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed042e0fdd', 'dh_6a1ed042e0c65', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed042e14f9', 'dh_6a1ed042e1386', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed042e1b25', 'dh_6a1ed042e17e9', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed042e214d', 'dh_6a1ed042e17e9', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed042e2d7f', 'dh_6a1ed042e2a3e', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed042e2e94', 'dh_6a1ed042e2a3e', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed042e2f99', 'dh_6a1ed042e2a3e', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed042e30c0', 'dh_6a1ed042e2a3e', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed042e383f', 'dh_6a1ed042e34ac', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed042e443b', 'dh_6a1ed042e40c9', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed042e4a33', 'dh_6a1ed042e40c9', 'bt_6a17ca3f3ab4f_3277', 3, 1170000),
('ctdh_6a1ed042e5097', 'dh_6a1ed042e40c9', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed042e5cf6', 'dh_6a1ed042e5975', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed042e65e0', 'dh_6a1ed042e628a', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed042e6bd5', 'dh_6a1ed042e628a', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed042e702a', 'dh_6a1ed042e628a', 'bt_6a17ca3f41eeb_6366', 2, 1520000),
('ctdh_6a1ed042e7493', 'dh_6a1ed042e7316', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042e7781', 'dh_6a1ed042e7316', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed042e7a15', 'dh_6a1ed042e7316', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed042e7f83', 'dh_6a1ed042e7d96', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed042e83e5', 'dh_6a1ed042e7d96', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed042e89e6', 'dh_6a1ed042e7d96', 'bt_6a17ca3f40a17_2289', 2, 680000),
('ctdh_6a1ed042e910f', 'dh_6a1ed042e7d96', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed042e9979', 'dh_6a1ed042e97d1', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed042e9c04', 'dh_6a1ed042e97d1', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed042ea291', 'dh_6a1ed042e97d1', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed042eb051', 'dh_6a1ed042eac30', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed042eb379', 'dh_6a1ed042eac30', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed042eb6a4', 'dh_6a1ed042eac30', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed042ec075', 'dh_6a1ed042ebd04', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed042ec776', 'dh_6a1ed042ebd04', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed042ece53', 'dh_6a1ed042ebd04', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed042edaf0', 'dh_6a1ed042ed743', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed042ee164', 'dh_6a1ed042edff4', 'bt_6a17ca3f42208_2267', 2, 1410000),
('ctdh_6a1ed042ee407', 'dh_6a1ed042edff4', 'bt_6a17ca3f3ab4f_3277', 1, 1170000),
('ctdh_6a1ed042ee655', 'dh_6a1ed042edff4', 'bt_6a17ca3f39289_9497', 2, 960000),
('ctdh_6a1ed042eeb61', 'dh_6a1ed042ee99e', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed042eee23', 'dh_6a1ed042ee99e', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed042efac9', 'dh_6a1ed042ef719', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042f0188', 'dh_6a1ed042ef719', 'bt_6a17ca3f3eab5_8602', 1, 1520000),
('ctdh_6a1ed042f0440', 'dh_6a1ed042ef719', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed042f09c6', 'dh_6a1ed042f0820', 'bt_6a17ca3f41eeb_6366', 2, 1520000),
('ctdh_6a1ed042f0d00', 'dh_6a1ed042f0820', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed042f1680', 'dh_6a1ed042f130d', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed042f1c98', 'dh_6a1ed042f130d', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed042f2a12', 'dh_6a1ed042f2659', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed042f342b', 'dh_6a1ed042f305f', 'bt_6a17ca3f41eeb_6366', 1, 1520000),
('ctdh_6a1ed042f3ac2', 'dh_6a1ed042f305f', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed043006cf', 'dh_6a1ed043001eb', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed0430094c', 'dh_6a1ed043001eb', 'bt_6a17ca3f42fc2_2526', 3, 1510000),
('ctdh_6a1ed04300e8d', 'dh_6a1ed04300cba', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed0430127a', 'dh_6a1ed043010c6', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed04301cc7', 'dh_6a1ed04301988', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed043022f0', 'dh_6a1ed04301988', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043028e0', 'dh_6a1ed04301988', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04302cfb', 'dh_6a1ed04301988', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed043031c1', 'dh_6a1ed04303043', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed043033d4', 'dh_6a1ed04303043', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04304d15', 'dh_6a1ed04304949', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed04305029', 'dh_6a1ed04304949', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed043059ef', 'dh_6a1ed0430561d', 'bt_6a17ca3f43353_5705', 1, 1510000),
('ctdh_6a1ed043066de', 'dh_6a1ed04306361', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0430707d', 'dh_6a1ed04306cf5', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0430767c', 'dh_6a1ed04306cf5', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed043078ef', 'dh_6a1ed04306cf5', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04308281', 'dh_6a1ed04307e68', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed04308fe3', 'dh_6a1ed04308c4c', 'bt_6a17ca3f43ad2_1326', 2, 1350000),
('ctdh_6a1ed0430989f', 'dh_6a1ed04308c4c', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04309f08', 'dh_6a1ed04308c4c', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0430ab21', 'dh_6a1ed0430a7bf', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0430afdf', 'dh_6a1ed0430ae2f', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0430b108', 'dh_6a1ed0430ae2f', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0430b22d', 'dh_6a1ed0430ae2f', 'bt_6a17ca3f3df49_2169', 2, 1140000),
('ctdh_6a1ed0430b330', 'dh_6a1ed0430ae2f', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0430b85c', 'dh_6a1ed0430b6b2', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0430beb1', 'dh_6a1ed0430b6b2', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0430c4da', 'dh_6a1ed0430b6b2', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed0430caeb', 'dh_6a1ed0430b6b2', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0430d8e7', 'dh_6a1ed0430d3f6', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0430dc6f', 'dh_6a1ed0430daff', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0430e0ed', 'dh_6a1ed0430df8f', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed0430e537', 'dh_6a1ed0430e3d3', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed0430e9c9', 'dh_6a1ed0430e3d3', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0430f831', 'dh_6a1ed0430f466', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0430fcae', 'dh_6a1ed0430f466', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0430ff0a', 'dh_6a1ed0430f466', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed04310c02', 'dh_6a1ed04310713', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043112b5', 'dh_6a1ed04310713', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04311903', 'dh_6a1ed04310713', 'bt_6a17ca3f372d5_2690', 3, 1510000),
('ctdh_6a1ed0431258f', 'dh_6a1ed0431222a', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04312b8e', 'dh_6a1ed0431222a', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed043131f6', 'dh_6a1ed0431222a', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04313e90', 'dh_6a1ed04313b27', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed043141d1', 'dh_6a1ed04313b27', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed043144d2', 'dh_6a1ed04313b27', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04314856', 'dh_6a1ed043146f0', 'bt_6a17ca3f40626_6797', 2, 680000),
('ctdh_6a1ed04314ad6', 'dh_6a1ed043146f0', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed04314cfe', 'dh_6a1ed043146f0', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04314f23', 'dh_6a1ed043146f0', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04315947', 'dh_6a1ed04315606', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed04316208', 'dh_6a1ed04315606', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed043170e3', 'dh_6a1ed04316c13', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0431720d', 'dh_6a1ed04316c13', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed04317446', 'dh_6a1ed04316c13', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0431780f', 'dh_6a1ed04317681', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed04317914', 'dh_6a1ed04317681', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04317a21', 'dh_6a1ed04317681', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed04317d61', 'dh_6a1ed04317c03', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed043181b2', 'dh_6a1ed04318057', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed043185e4', 'dh_6a1ed04318057', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04318bf2', 'dh_6a1ed04318057', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04319203', 'dh_6a1ed04318057', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04319f54', 'dh_6a1ed04319b64', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0431a58d', 'dh_6a1ed04319b64', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0431a860', 'dh_6a1ed04319b64', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0431aae6', 'dh_6a1ed04319b64', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0431b783', 'dh_6a1ed0431b3e0', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0431be25', 'dh_6a1ed0431b3e0', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed0431c4a8', 'dh_6a1ed0431b3e0', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0431cb08', 'dh_6a1ed0431b3e0', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0431d7d3', 'dh_6a1ed0431d441', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed0431de7a', 'dh_6a1ed0431d441', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed0431e397', 'dh_6a1ed0431e1fa', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0431e678', 'dh_6a1ed0431e1fa', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0431e94f', 'dh_6a1ed0431e1fa', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed0431f5c6', 'dh_6a1ed0431f263', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0431fc15', 'dh_6a1ed0431f263', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed04320257', 'dh_6a1ed0431f263', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed04320fd0', 'dh_6a1ed04320b89', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04321358', 'dh_6a1ed04320b89', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04322265', 'dh_6a1ed04321d38', 'bt_6a17ca3f3c6b9_8385', 1, 1520000),
('ctdh_6a1ed0432261a', 'dh_6a1ed04321d38', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04322991', 'dh_6a1ed04322823', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed04322bfb', 'dh_6a1ed04322823', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04322f26', 'dh_6a1ed04322823', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04323a8a', 'dh_6a1ed04323478', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed043242b8', 'dh_6a1ed04323478', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed04324ba0', 'dh_6a1ed04323478', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04325ccf', 'dh_6a1ed04325775', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed04326458', 'dh_6a1ed04326293', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed043266b4', 'dh_6a1ed04326293', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed04326944', 'dh_6a1ed04326293', 'bt_6a17ca3f3bcdc_6964', 3, 1200000),
('ctdh_6a1ed04326ba9', 'dh_6a1ed04326293', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04327043', 'dh_6a1ed04326ec9', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04327314', 'dh_6a1ed04326ec9', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04327cd1', 'dh_6a1ed04326ec9', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04328e1a', 'dh_6a1ed043289f6', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed043294c1', 'dh_6a1ed043289f6', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04329e52', 'dh_6a1ed04329cad', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04329f70', 'dh_6a1ed04329cad', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed0432a0a0', 'dh_6a1ed04329cad', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed0432a67b', 'dh_6a1ed0432a2ef', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0432a97b', 'dh_6a1ed0432a2ef', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0432ac6c', 'dh_6a1ed0432a2ef', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed0432af60', 'dh_6a1ed0432a2ef', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0432b98c', 'dh_6a1ed0432b5d3', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0432c74f', 'dh_6a1ed0432c3a6', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0432cdb9', 'dh_6a1ed0432c3a6', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0432d281', 'dh_6a1ed0432c3a6', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0432d86e', 'dh_6a1ed0432c3a6', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0432e6d8', 'dh_6a1ed0432e2f0', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed0432f391', 'dh_6a1ed0432f007', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0432f970', 'dh_6a1ed0432f007', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed0432ff63', 'dh_6a1ed0432f007', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04330c1c', 'dh_6a1ed0433086b', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04330f23', 'dh_6a1ed0433086b', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed043318fc', 'dh_6a1ed04331554', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04331bc4', 'dh_6a1ed04331554', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04331e1a', 'dh_6a1ed04331554', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed043323bf', 'dh_6a1ed04332214', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed0433267f', 'dh_6a1ed04332214', 'bt_6a17ca3f3faf2_3949', 1, 1310000),
('ctdh_6a1ed043330a3', 'dh_6a1ed04332cde', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed04333765', 'dh_6a1ed04332cde', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04333e6d', 'dh_6a1ed04332cde', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed04334504', 'dh_6a1ed04332cde', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed04334a7e', 'dh_6a1ed043348b6', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04335157', 'dh_6a1ed043348b6', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04335f1e', 'dh_6a1ed04335b82', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04336588', 'dh_6a1ed04335b82', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04336c17', 'dh_6a1ed04335b82', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0433794f', 'dh_6a1ed043375da', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed04337c89', 'dh_6a1ed043375da', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed04337fa5', 'dh_6a1ed043375da', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04338997', 'dh_6a1ed043385d0', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04338ac5', 'dh_6a1ed043385d0', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04338bfd', 'dh_6a1ed043385d0', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed043390ab', 'dh_6a1ed04338ef3', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed043391d0', 'dh_6a1ed04338ef3', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed043392df', 'dh_6a1ed04338ef3', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04339679', 'dh_6a1ed04339501', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed043397a7', 'dh_6a1ed04339501', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04339af7', 'dh_6a1ed0433999a', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed0433a136', 'dh_6a1ed0433999a', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0433aecb', 'dh_6a1ed0433aad2', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0433b3de', 'dh_6a1ed0433b23a', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0433b4fc', 'dh_6a1ed0433b23a', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0433bc4b', 'dh_6a1ed0433b8ee', 'bt_6a17ca3f3eece_6613', 1, 1520000),
('ctdh_6a1ed0433c2d6', 'dh_6a1ed0433b8ee', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0433ca45', 'dh_6a1ed0433b8ee', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed0433d0f0', 'dh_6a1ed0433b8ee', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0433ddef', 'dh_6a1ed0433da84', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0433e747', 'dh_6a1ed0433e3c5', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0433ed4c', 'dh_6a1ed0433e3c5', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0433f217', 'dh_6a1ed0433f09e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0433f49e', 'dh_6a1ed0433f09e', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0433f702', 'dh_6a1ed0433f09e', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04340238', 'dh_6a1ed0433fe9f', 'bt_6a17ca3f3cd6a_2743', 2, 790000),
('ctdh_6a1ed04340553', 'dh_6a1ed0433fe9f', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04340f45', 'dh_6a1ed04340ba8', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04341673', 'dh_6a1ed04340ba8', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04342247', 'dh_6a1ed043420ab', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04342474', 'dh_6a1ed043420ab', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04342b86', 'dh_6a1ed043420ab', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04343217', 'dh_6a1ed043420ab', 'bt_6a17ca3f39289_9497', 2, 960000),
('ctdh_6a1ed0434407f', 'dh_6a1ed04343c6c', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04344e44', 'dh_6a1ed04343c6c', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04345ead', 'dh_6a1ed043459e5', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed043470b5', 'dh_6a1ed0434695a', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed043476c7', 'dh_6a1ed0434695a', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04347bbe', 'dh_6a1ed043479c5', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04347cc1', 'dh_6a1ed043479c5', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043480da', 'dh_6a1ed04347ef6', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043489f8', 'dh_6a1ed04347ef6', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043490ff', 'dh_6a1ed04347ef6', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed04349abb', 'dh_6a1ed04347ef6', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed0434a917', 'dh_6a1ed0434a5b2', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0434af5a', 'dh_6a1ed0434a5b2', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0434b493', 'dh_6a1ed0434a5b2', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed0434b723', 'dh_6a1ed0434a5b2', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0434bcd8', 'dh_6a1ed0434baed', 'bt_6a17ca3f39289_9497', 2, 960000),
('ctdh_6a1ed0434c14b', 'dh_6a1ed0434baed', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0434cdbd', 'dh_6a1ed0434ca72', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0434daa4', 'dh_6a1ed0434d6e5', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0434ddcd', 'dh_6a1ed0434d6e5', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed0434e0fd', 'dh_6a1ed0434d6e5', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0434e87b', 'dh_6a1ed0434e6e9', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0434eab2', 'dh_6a1ed0434e6e9', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed0434f507', 'dh_6a1ed0434f1c1', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed04350397', 'dh_6a1ed0434ff6b', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed043511f3', 'dh_6a1ed04350e20', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04351870', 'dh_6a1ed04350e20', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04351e88', 'dh_6a1ed04350e20', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0435274b', 'dh_6a1ed043525af', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed043529d5', 'dh_6a1ed043525af', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed043530a3', 'dh_6a1ed04352efe', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed043531b5', 'dh_6a1ed04352efe', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0435351f', 'dh_6a1ed043533b4', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed0435373d', 'dh_6a1ed043533b4', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed043539a7', 'dh_6a1ed043533b4', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed04353fa5', 'dh_6a1ed04353d9c', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0435410c', 'dh_6a1ed04353d9c', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed04354568', 'dh_6a1ed04354396', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043546c7', 'dh_6a1ed04354396', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04354b85', 'dh_6a1ed043549e4', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed04354dcf', 'dh_6a1ed043549e4', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed04354ffb', 'dh_6a1ed043549e4', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed043554c6', 'dh_6a1ed043552e6', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed04355755', 'dh_6a1ed043552e6', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04355a2c', 'dh_6a1ed043552e6', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04355cc5', 'dh_6a1ed043552e6', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0435620c', 'dh_6a1ed04356067', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04356520', 'dh_6a1ed04356067', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed04356813', 'dh_6a1ed04356067', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04357164', 'dh_6a1ed04356dfd', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043575fa', 'dh_6a1ed04356dfd', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed043578f5', 'dh_6a1ed04356dfd', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed043583c4', 'dh_6a1ed04358020', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed043590d0', 'dh_6a1ed04358d4e', 'bt_6a17ca3f42208_2267', 3, 1410000),
('ctdh_6a1ed04359d26', 'dh_6a1ed043599b3', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed0435a009', 'dh_6a1ed043599b3', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0435a2f8', 'dh_6a1ed043599b3', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0435a5ff', 'dh_6a1ed043599b3', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0435ac1f', 'dh_6a1ed0435aa72', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0435ae80', 'dh_6a1ed0435aa72', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0435b392', 'dh_6a1ed0435b1b5', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0435bd6d', 'dh_6a1ed0435b9ea', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0435c39f', 'dh_6a1ed0435b9ea', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0435c985', 'dh_6a1ed0435b9ea', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0435d5ff', 'dh_6a1ed0435d288', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0435e2df', 'dh_6a1ed0435defd', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0435e7a2', 'dh_6a1ed0435defd', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0435ea36', 'dh_6a1ed0435defd', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed0435ec68', 'dh_6a1ed0435defd', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed04362040', 'dh_6a1ed0435f8c5', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04362dc8', 'dh_6a1ed0435f8c5', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed04364208', 'dh_6a1ed04363ae0', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed0436493a', 'dh_6a1ed04363ae0', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04365299', 'dh_6a1ed04363ae0', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04365bfd', 'dh_6a1ed04363ae0', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04366ec6', 'dh_6a1ed04366a74', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed04367826', 'dh_6a1ed04366a74', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04367cf9', 'dh_6a1ed04367b6f', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043687c3', 'dh_6a1ed0436826f', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04368f7d', 'dh_6a1ed0436826f', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04369444', 'dh_6a1ed043691ba', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed043696bf', 'dh_6a1ed043691ba', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed043697e0', 'dh_6a1ed043691ba', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04369b16', 'dh_6a1ed043691ba', 'bt_6a17ca3f3cd6a_2743', 1, 790000),
('ctdh_6a1ed0436a8b3', 'dh_6a1ed0436a431', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0436b0ec', 'dh_6a1ed0436a431', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0436b3cf', 'dh_6a1ed0436a431', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed0436bb16', 'dh_6a1ed0436a431', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed0436d2e6', 'dh_6a1ed0436cb96', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0436e042', 'dh_6a1ed0436cb96', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0436eeed', 'dh_6a1ed0436cb96', 'bt_6a17ca3f40626_6797', 1, 680000),
('ctdh_6a1ed0436fe61', 'dh_6a1ed0436fa44', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0437020a', 'dh_6a1ed0436fa44', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed0437058f', 'dh_6a1ed0436fa44', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04371052', 'dh_6a1ed04370c92', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed04371e16', 'dh_6a1ed04371a9b', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04371fae', 'dh_6a1ed04371a9b', 'bt_6a17ca3f3cd6a_2743', 2, 790000),
('ctdh_6a1ed04372111', 'dh_6a1ed04371a9b', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043725ec', 'dh_6a1ed043723d4', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed04372ec4', 'dh_6a1ed04372af8', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0437360f', 'dh_6a1ed04372af8', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04373ea3', 'dh_6a1ed04372af8', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04375963', 'dh_6a1ed04372af8', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043768a4', 'dh_6a1ed043766f6', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04376add', 'dh_6a1ed043766f6', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04377b0c', 'dh_6a1ed04377578', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed04379a2b', 'dh_6a1ed043794ca', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04379e1c', 'dh_6a1ed043794ca', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed0437a23d', 'dh_6a1ed043794ca', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0437a6bc', 'dh_6a1ed043794ca', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed0437b391', 'dh_6a1ed0437ae46', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0437bc17', 'dh_6a1ed0437ae46', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0437c592', 'dh_6a1ed0437ae46', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0437ce08', 'dh_6a1ed0437ae46', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0437d6ac', 'dh_6a1ed0437d419', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0437d9d2', 'dh_6a1ed0437d419', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0437dd50', 'dh_6a1ed0437d419', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0437e120', 'dh_6a1ed0437d419', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0437ea5e', 'dh_6a1ed0437e7c3', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0437ebff', 'dh_6a1ed0437e7c3', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0437ed84', 'dh_6a1ed0437e7c3', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0437f697', 'dh_6a1ed0437f0d7', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0437fa6a', 'dh_6a1ed0437f0d7', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0437fe10', 'dh_6a1ed0437f0d7', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04380dc7', 'dh_6a1ed043808de', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04381a3a', 'dh_6a1ed04381537', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04382308', 'dh_6a1ed04381537', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04382c08', 'dh_6a1ed04381537', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed043834f1', 'dh_6a1ed04381537', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04384c10', 'dh_6a1ed04384622', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04386c9d', 'dh_6a1ed04386686', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed04387451', 'dh_6a1ed0438713d', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043877f9', 'dh_6a1ed0438713d', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04387ff6', 'dh_6a1ed04387d1d', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0438833f', 'dh_6a1ed04387d1d', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04388654', 'dh_6a1ed04387d1d', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04388ec1', 'dh_6a1ed04388b74', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04389d3e', 'dh_6a1ed04388b74', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0438a70f', 'dh_6a1ed0438a416', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0438b026', 'dh_6a1ed0438adaf', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0438b417', 'dh_6a1ed0438adaf', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed0438b949', 'dh_6a1ed0438adaf', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0438c6ed', 'dh_6a1ed0438c288', 'bt_6a17ca3f42208_2267', 2, 1410000),
('ctdh_6a1ed0438cdb6', 'dh_6a1ed0438c288', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed0438d3e1', 'dh_6a1ed0438c288', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0438da36', 'dh_6a1ed0438c288', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed0438e6e0', 'dh_6a1ed0438e35e', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0438e93a', 'dh_6a1ed0438e35e', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed0438ed92', 'dh_6a1ed0438ec2a', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0438eeaa', 'dh_6a1ed0438ec2a', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed0438efad', 'dh_6a1ed0438ec2a', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed0438f919', 'dh_6a1ed0438f58c', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043902cb', 'dh_6a1ed0438ff4c', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed0439091c', 'dh_6a1ed0438ff4c', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed043912a9', 'dh_6a1ed043910ee', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0439151a', 'dh_6a1ed043910ee', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed04391df9', 'dh_6a1ed04391a43', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04392449', 'dh_6a1ed04391a43', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043930e3', 'dh_6a1ed04392d3f', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043934dc', 'dh_6a1ed04392d3f', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed043938ad', 'dh_6a1ed04392d3f', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04393e88', 'dh_6a1ed04392d3f', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043948dd', 'dh_6a1ed04394593', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04395273', 'dh_6a1ed04394593', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed04395a77', 'dh_6a1ed04394593', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04396410', 'dh_6a1ed04396253', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed043968d2', 'dh_6a1ed04396751', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04396a20', 'dh_6a1ed04396751', 'bt_6a17ca3f3c435_9741', 3, 1520000),
('ctdh_6a1ed04396f08', 'dh_6a1ed04396751', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed04397b01', 'dh_6a1ed04397733', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04397fe4', 'dh_6a1ed04397733', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04398996', 'dh_6a1ed043985df', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0439916b', 'dh_6a1ed04398fce', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed0439943b', 'dh_6a1ed04398fce', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043996a6', 'dh_6a1ed04398fce', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04399936', 'dh_6a1ed04398fce', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed04399eb9', 'dh_6a1ed04399ce7', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed0439a15c', 'dh_6a1ed04399ce7', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed0439a3a6', 'dh_6a1ed04399ce7', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0439aa17', 'dh_6a1ed04399ce7', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0439b6dc', 'dh_6a1ed0439b398', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed0439bd21', 'dh_6a1ed0439b398', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0439c7d7', 'dh_6a1ed0439c63f', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed0439c8fc', 'dh_6a1ed0439c63f', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed0439ca05', 'dh_6a1ed0439c63f', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0439cdb8', 'dh_6a1ed0439cc19', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0439d000', 'dh_6a1ed0439cc19', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0439d60d', 'dh_6a1ed0439cc19', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0439e211', 'dh_6a1ed0439de7c', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0439e841', 'dh_6a1ed0439de7c', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0439eeb5', 'dh_6a1ed0439de7c', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0439f4c2', 'dh_6a1ed0439de7c', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0439f9c9', 'dh_6a1ed0439f81e', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0439fafa', 'dh_6a1ed0439f81e', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed043a0063', 'dh_6a1ed0439fce3', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043a0389', 'dh_6a1ed0439fce3', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed043a10db', 'dh_6a1ed043a0c48', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043a1899', 'dh_6a1ed043a0c48', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043a2269', 'dh_6a1ed043a0c48', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed043a2ab6', 'dh_6a1ed043a0c48', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed043a3b87', 'dh_6a1ed043a3771', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043a40bc', 'dh_6a1ed043a3771', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed043a4459', 'dh_6a1ed043a3771', 'bt_6a17ca3f34555_1778', 1, 1350000),
('ctdh_6a1ed043a488d', 'dh_6a1ed043a46e6', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043a4af5', 'dh_6a1ed043a46e6', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043a4daa', 'dh_6a1ed043a46e6', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed043a52ca', 'dh_6a1ed043a5144', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed043a6703', 'dh_6a1ed043a6334', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043a7202', 'dh_6a1ed043a6e45', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed043a7690', 'dh_6a1ed043a6e45', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed043a7907', 'dh_6a1ed043a6e45', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed043a7e7f', 'dh_6a1ed043a7c6b', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed043a8874', 'dh_6a1ed043a8459', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043a8eae', 'dh_6a1ed043a8459', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed043a9b32', 'dh_6a1ed043a97d7', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043aa6f9', 'dh_6a1ed043aa3b7', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed043aaa1b', 'dh_6a1ed043aa3b7', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed043ab4c9', 'dh_6a1ed043ab01c', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043ab5f1', 'dh_6a1ed043ab01c', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed043ab71c', 'dh_6a1ed043ab01c', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed043abc59', 'dh_6a1ed043ab908', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed043ac27f', 'dh_6a1ed043ab908', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043ac84a', 'dh_6a1ed043ab908', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043ace25', 'dh_6a1ed043ab908', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed043adaeb', 'dh_6a1ed043ad756', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043ae4bc', 'dh_6a1ed043ae131', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043ae5d5', 'dh_6a1ed043ae131', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed043ae6e0', 'dh_6a1ed043ae131', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043ae807', 'dh_6a1ed043ae131', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed043aebaa', 'dh_6a1ed043aea3f', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043aedd3', 'dh_6a1ed043aea3f', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed043af3c7', 'dh_6a1ed043aea3f', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed043afa44', 'dh_6a1ed043aea3f', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed043b0fa0', 'dh_6a1ed043b08f4', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed043b17a8', 'dh_6a1ed043b08f4', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043b1fd5', 'dh_6a1ed043b08f4', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043b27aa', 'dh_6a1ed043b08f4', 'bt_6a17ca3f34956_1505', 1, 1350000),
('ctdh_6a1ed043b3946', 'dh_6a1ed043b33ed', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043b3bfb', 'dh_6a1ed043b33ed', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed043b3e44', 'dh_6a1ed043b33ed', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed043b4bb4', 'dh_6a1ed043b47e4', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed043b5477', 'dh_6a1ed043b47e4', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed043b5d09', 'dh_6a1ed043b47e4', 'bt_6a17ca3f34555_1778', 1, 1350000),
('ctdh_6a1ed043b7056', 'dh_6a1ed043b6c0f', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043b823f', 'dh_6a1ed043b7d1e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed043b87ae', 'dh_6a1ed043b8618', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed043b8a45', 'dh_6a1ed043b8618', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed043b8efe', 'dh_6a1ed043b8d5d', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed043b9024', 'dh_6a1ed043b8d5d', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed043b966d', 'dh_6a1ed043b9318', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043b9e11', 'dh_6a1ed043b9318', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043ba3e0', 'dh_6a1ed043b9318', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed043ba9ca', 'dh_6a1ed043b9318', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043bb66c', 'dh_6a1ed043bb2b4', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043bbb3f', 'dh_6a1ed043bb2b4', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043bbe82', 'dh_6a1ed043bb2b4', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043bc3e4', 'dh_6a1ed043bc22f', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043bca25', 'dh_6a1ed043bc22f', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043bd094', 'dh_6a1ed043bc22f', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed043bde1d', 'dh_6a1ed043bda57', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed043be166', 'dh_6a1ed043bda57', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043be494', 'dh_6a1ed043bda57', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed043be8da', 'dh_6a1ed043bda57', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed043bed40', 'dh_6a1ed043bebb8', 'bt_6a17ca3f3eece_6613', 1, 1520000),
('ctdh_6a1ed043bf1af', 'dh_6a1ed043bebb8', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043bf8b4', 'dh_6a1ed043bebb8', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed043c0a06', 'dh_6a1ed043c0331', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed043c12be', 'dh_6a1ed043c0331', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed043c1af6', 'dh_6a1ed043c0331', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043c2c02', 'dh_6a1ed043c26a8', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043c366d', 'dh_6a1ed043c26a8', 'bt_6a17ca3f35b27_1230', 2, 1520000),
('ctdh_6a1ed043c4926', 'dh_6a1ed043c42fb', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed043c4cce', 'dh_6a1ed043c42fb', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043c4e5d', 'dh_6a1ed043c42fb', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed043c532c', 'dh_6a1ed043c517f', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043c55f5', 'dh_6a1ed043c517f', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed043c5949', 'dh_6a1ed043c517f', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043c5f83', 'dh_6a1ed043c5dc7', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed043c623f', 'dh_6a1ed043c5dc7', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed043c6597', 'dh_6a1ed043c5dc7', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed043c7401', 'dh_6a1ed043c7164', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043c7781', 'dh_6a1ed043c7164', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043c8456', 'dh_6a1ed043c807e', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed043c8a88', 'dh_6a1ed043c807e', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed043c9123', 'dh_6a1ed043c807e', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed043c9e31', 'dh_6a1ed043c9a6a', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed043cabe2', 'dh_6a1ed043ca82e', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043cb8a3', 'dh_6a1ed043cb53c', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed043cbbb2', 'dh_6a1ed043cb53c', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed043cbcde', 'dh_6a1ed043cb53c', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043cbed8', 'dh_6a1ed043cb53c', 'bt_6a17ca3f42c4f_2357', 1, 1510000),
('ctdh_6a1ed043cc2c5', 'dh_6a1ed043cc136', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed043cc583', 'dh_6a1ed043cc136', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed043cc85b', 'dh_6a1ed043cc136', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed043ccdf3', 'dh_6a1ed043ccc06', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043cd2ff', 'dh_6a1ed043ccc06', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043ce386', 'dh_6a1ed043cdd74', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043ce6ee', 'dh_6a1ed043cdd74', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043ce982', 'dh_6a1ed043cdd74', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed043cf08c', 'dh_6a1ed043ceeeb', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043cf37b', 'dh_6a1ed043ceeeb', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed043cf5f3', 'dh_6a1ed043ceeeb', 'bt_6a17ca3f4151f_8482', 1, 1070000),
('ctdh_6a1ed043cfade', 'dh_6a1ed043ceeeb', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043d0e5d', 'dh_6a1ed043d0a2d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043d1751', 'dh_6a1ed043d0a2d', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed043d2053', 'dh_6a1ed043d0a2d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed043d28c1', 'dh_6a1ed043d0a2d', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043d35f3', 'dh_6a1ed043d334b', 'bt_6a17ca3f34956_1505', 1, 1350000),
('ctdh_6a1ed043d3933', 'dh_6a1ed043d334b', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043d3f00', 'dh_6a1ed043d3d5e', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed043d4144', 'dh_6a1ed043d3d5e', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043d4470', 'dh_6a1ed043d3d5e', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed043d49b6', 'dh_6a1ed043d47da', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043d4cba', 'dh_6a1ed043d47da', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed043d4f73', 'dh_6a1ed043d47da', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043d5a5c', 'dh_6a1ed043d5533', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed043d6261', 'dh_6a1ed043d5533', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed043d6bb3', 'dh_6a1ed043d5533', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043d7502', 'dh_6a1ed043d5533', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed043d8484', 'dh_6a1ed043d8055', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed043d8bf1', 'dh_6a1ed043d8055', 'bt_6a17ca3f33d03_1597', 3, 1350000);
INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_bien_the`, `so_luong`, `don_gia`) VALUES
('ctdh_6a1ed043d9a06', 'dh_6a1ed043d95b5', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed043da3eb', 'dh_6a1ed043da068', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed043da722', 'dh_6a1ed043da068', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed043dadb4', 'dh_6a1ed043dabd4', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed043db0a9', 'dh_6a1ed043dabd4', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed043db336', 'dh_6a1ed043dabd4', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043db907', 'dh_6a1ed043db67f', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043dbbe9', 'dh_6a1ed043db67f', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed043dc045', 'dh_6a1ed043db67f', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043dc6e5', 'dh_6a1ed043db67f', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed043dd454', 'dh_6a1ed043dd017', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed043dd61e', 'dh_6a1ed043dd017', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed043ddbac', 'dh_6a1ed043dd952', 'bt_6a17ca3f3b7a5_8182', 1, 1200000),
('ctdh_6a1ed043ddf18', 'dh_6a1ed043dd952', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed043de4bc', 'dh_6a1ed043dd952', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed043deb86', 'dh_6a1ed043dd952', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043dfa32', 'dh_6a1ed043df570', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed043e0f63', 'dh_6a1ed043e0b61', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed043e1988', 'dh_6a1ed043e0b61', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed043e231e', 'dh_6a1ed043e0b61', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed043e25b6', 'dh_6a1ed043e0b61', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed043e2aad', 'dh_6a1ed043e2901', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043e337b', 'dh_6a1ed043e2901', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed043e44d2', 'dh_6a1ed043e40d3', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed043e485d', 'dh_6a1ed043e40d3', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043e4bb8', 'dh_6a1ed043e40d3', 'bt_6a17ca3f372d5_2690', 3, 1510000),
('ctdh_6a1ed043e4ecb', 'dh_6a1ed043e40d3', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed043e5896', 'dh_6a1ed043e54e0', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed043e5eb0', 'dh_6a1ed043e54e0', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043e615d', 'dh_6a1ed043e54e0', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed043e640f', 'dh_6a1ed043e54e0', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043e708b', 'dh_6a1ed043e6d28', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed043e737f', 'dh_6a1ed043e6d28', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043e7d2c', 'dh_6a1ed043e7921', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043e83d8', 'dh_6a1ed043e7921', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed043e8afc', 'dh_6a1ed043e7921', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed043e91ac', 'dh_6a1ed043e7921', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed043eae21', 'dh_6a1ed043ea97a', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed043eb595', 'dh_6a1ed043ea97a', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed043ebdc1', 'dh_6a1ed043ebbc1', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043ec2fc', 'dh_6a1ed043ebbc1', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed043ecdce', 'dh_6a1ed043ebbc1', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed043ed5f6', 'dh_6a1ed043ebbc1', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed043ee3cb', 'dh_6a1ed043ee003', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed043eee3d', 'dh_6a1ed043eea4c', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed043ef4c9', 'dh_6a1ed043eea4c', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed043efecd', 'dh_6a1ed043efc66', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed043f0133', 'dh_6a1ed043efc66', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed043f0395', 'dh_6a1ed043efc66', 'bt_6a17ca3f3df49_2169', 2, 1140000),
('ctdh_6a1ed043f0717', 'dh_6a1ed043efc66', 'bt_6a17ca3f452ab_9530', 3, 1790000),
('ctdh_6a1ed043f11f7', 'dh_6a1ed043f0e12', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed043f1985', 'dh_6a1ed043f0e12', 'bt_6a17ca3f3e2f0_9774', 1, 1140000),
('ctdh_6a1ed043f213c', 'dh_6a1ed043f0e12', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed043f3009', 'dh_6a1ed043f2bd1', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed043f33b4', 'dh_6a1ed043f2bd1', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed043f3742', 'dh_6a1ed043f2bd1', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed043f3a9b', 'dh_6a1ed043f2bd1', 'bt_6a17ca3f35b27_1230', 2, 1520000),
('ctdh_6a1ed044003df', 'dh_6a1ed043f4200', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed04400add', 'dh_6a1ed043f4200', 'bt_6a17ca3f43ad2_1326', 2, 1350000),
('ctdh_6a1ed04400ed3', 'dh_6a1ed043f4200', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed04401562', 'dh_6a1ed044013b1', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed0440183b', 'dh_6a1ed044013b1', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04401ac9', 'dh_6a1ed044013b1', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04402442', 'dh_6a1ed0440204a', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed04402b3d', 'dh_6a1ed0440204a', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044031db', 'dh_6a1ed0440204a', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0440385d', 'dh_6a1ed0440204a', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04403d11', 'dh_6a1ed04403b79', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04403e20', 'dh_6a1ed04403b79', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04403f2c', 'dh_6a1ed04403b79', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed04404042', 'dh_6a1ed04403b79', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044049ca', 'dh_6a1ed04404649', 'bt_6a17ca3f3eab5_8602', 2, 1520000),
('ctdh_6a1ed0440507e', 'dh_6a1ed04404649', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0440579a', 'dh_6a1ed04404649', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04406509', 'dh_6a1ed0440618e', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed04406afc', 'dh_6a1ed0440693f', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed04406c92', 'dh_6a1ed0440693f', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04407212', 'dh_6a1ed04406e9b', 'bt_6a17ca3f442b1_3626', 2, 1350000),
('ctdh_6a1ed04407f7c', 'dh_6a1ed04407bf7', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed044085f0', 'dh_6a1ed04407bf7', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed04408c27', 'dh_6a1ed04407bf7', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0440923e', 'dh_6a1ed04407bf7', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0440a02a', 'dh_6a1ed04409b8f', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0440a292', 'dh_6a1ed04409b8f', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0440a4b2', 'dh_6a1ed04409b8f', 'bt_6a17ca3f34555_1778', 1, 1350000),
('ctdh_6a1ed0440a6c8', 'dh_6a1ed04409b8f', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed0440afcf', 'dh_6a1ed0440ac66', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0440b69b', 'dh_6a1ed0440ac66', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0440bcc5', 'dh_6a1ed0440ac66', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0440c92d', 'dh_6a1ed0440c5c1', 'bt_6a17ca3f372d5_2690', 3, 1510000),
('ctdh_6a1ed0440cf2d', 'dh_6a1ed0440c5c1', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0440dc88', 'dh_6a1ed0440d8f2', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0440e118', 'dh_6a1ed0440d8f2', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0440e37a', 'dh_6a1ed0440d8f2', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0440eed7', 'dh_6a1ed0440ead1', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0440fcd8', 'dh_6a1ed0440f8dd', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044103df', 'dh_6a1ed0440f8dd', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04410af7', 'dh_6a1ed0440f8dd', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed04411158', 'dh_6a1ed0440f8dd', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04411d35', 'dh_6a1ed04411b11', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed04411fc0', 'dh_6a1ed04411b11', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed044124b2', 'dh_6a1ed044122ef', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed044129ed', 'dh_6a1ed044122ef', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed04413772', 'dh_6a1ed044133b9', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04413aea', 'dh_6a1ed044133b9', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04413dfd', 'dh_6a1ed044133b9', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044140f8', 'dh_6a1ed044133b9', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04414a17', 'dh_6a1ed044146ca', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04414d17', 'dh_6a1ed044146ca', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed04415024', 'dh_6a1ed044146ca', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed04415303', 'dh_6a1ed044146ca', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04415d10', 'dh_6a1ed0441592f', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04415ff7', 'dh_6a1ed0441592f', 'bt_6a17ca3f3b300_5532', 1, 1200000),
('ctdh_6a1ed044164f8', 'dh_6a1ed04416372', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04416794', 'dh_6a1ed04416372', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04416cef', 'dh_6a1ed04416372', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04418aa6', 'dh_6a1ed04418381', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044196f3', 'dh_6a1ed0441930d', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed0441a097', 'dh_6a1ed0441930d', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed0441a2c1', 'dh_6a1ed0441930d', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0441a8ca', 'dh_6a1ed0441a712', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0441ab60', 'dh_6a1ed0441a712', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0441ae17', 'dh_6a1ed0441a712', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0441b3ba', 'dh_6a1ed0441b236', 'bt_6a17ca3f3cf3f_7131', 1, 790000),
('ctdh_6a1ed0441b60e', 'dh_6a1ed0441b236', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed0441c4e6', 'dh_6a1ed0441c13a', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed0441cce9', 'dh_6a1ed0441c13a', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed0441d3ab', 'dh_6a1ed0441c13a', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed0441d923', 'dh_6a1ed0441c13a', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed0441de04', 'dh_6a1ed0441dc6e', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0441e040', 'dh_6a1ed0441dc6e', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0441e2fa', 'dh_6a1ed0441dc6e', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0441f3eb', 'dh_6a1ed0441f03a', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed044206a8', 'dh_6a1ed044201a9', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04420fc5', 'dh_6a1ed044201a9', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04421e1f', 'dh_6a1ed04421c6b', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed04422335', 'dh_6a1ed04422155', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed04422635', 'dh_6a1ed04422155', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed04422870', 'dh_6a1ed04422155', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed04422ad0', 'dh_6a1ed04422155', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed0442309e', 'dh_6a1ed04422f22', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0442346d', 'dh_6a1ed04422f22', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04423d64', 'dh_6a1ed04423a12', 'bt_6a17ca3f3df49_2169', 3, 1140000),
('ctdh_6a1ed04424702', 'dh_6a1ed04424302', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed044249a3', 'dh_6a1ed04424302', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04424c4c', 'dh_6a1ed04424302', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04424ea7', 'dh_6a1ed04424302', 'bt_6a17ca3f3c435_9741', 2, 1520000),
('ctdh_6a1ed044257b1', 'dh_6a1ed044253f0', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04425ddb', 'dh_6a1ed044253f0', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed0442643b', 'dh_6a1ed044253f0', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044270f7', 'dh_6a1ed04426d38', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04427d84', 'dh_6a1ed044279f8', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed044280fe', 'dh_6a1ed04427f92', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044287dc', 'dh_6a1ed04428408', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04428f08', 'dh_6a1ed04428408', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04429bf4', 'dh_6a1ed0442984b', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0442a233', 'dh_6a1ed0442984b', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0442a83e', 'dh_6a1ed0442984b', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed0442ae12', 'dh_6a1ed0442984b', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0442b6db', 'dh_6a1ed0442b505', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0442b9b8', 'dh_6a1ed0442b505', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0442c1be', 'dh_6a1ed0442be36', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed0442c85b', 'dh_6a1ed0442be36', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed0442d5d0', 'dh_6a1ed0442d203', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed0442dc79', 'dh_6a1ed0442d203', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0442e2eb', 'dh_6a1ed0442d203', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0442f2d0', 'dh_6a1ed0442edd2', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0442f885', 'dh_6a1ed0442edd2', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed0442fb98', 'dh_6a1ed0442edd2', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044307d2', 'dh_6a1ed044303b0', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04430b3f', 'dh_6a1ed044303b0', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04431550', 'dh_6a1ed0443119d', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0443233c', 'dh_6a1ed04431f53', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed0443304c', 'dh_6a1ed04432cc1', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed0443349e', 'dh_6a1ed04432cc1', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed044336f7', 'dh_6a1ed04432cc1', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04433fab', 'dh_6a1ed04433bfe', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04434962', 'dh_6a1ed044345f0', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04434fa2', 'dh_6a1ed044345f0', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04435cc2', 'dh_6a1ed044358f1', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed0443638a', 'dh_6a1ed044358f1', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04436a10', 'dh_6a1ed044358f1', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed044370a0', 'dh_6a1ed044358f1', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed04437b4d', 'dh_6a1ed04437981', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04437c63', 'dh_6a1ed04437981', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04437d75', 'dh_6a1ed04437981', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed044380dc', 'dh_6a1ed04437f79', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed04438579', 'dh_6a1ed04437f79', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044392f3', 'dh_6a1ed04438f3e', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044399ae', 'dh_6a1ed04438f3e', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0443a00a', 'dh_6a1ed04438f3e', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0443ab3f', 'dh_6a1ed0443a994', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0443add2', 'dh_6a1ed0443a994', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0443b94e', 'dh_6a1ed0443b5a5', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed0443d3c9', 'dh_6a1ed0443c21c', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0443dacc', 'dh_6a1ed0443c21c', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed0443e785', 'dh_6a1ed0443e3cc', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0443eab4', 'dh_6a1ed0443e3cc', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed0443f49c', 'dh_6a1ed0443f0f7', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0443fae4', 'dh_6a1ed0443f0f7', 'bt_6a17ca3f43eaf_3226', 1, 1350000),
('ctdh_6a1ed0443ff45', 'dh_6a1ed0443f0f7', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed0444046d', 'dh_6a1ed0444027e', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04440758', 'dh_6a1ed0444027e', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04440de8', 'dh_6a1ed0444027e', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044414a6', 'dh_6a1ed0444027e', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044422cd', 'dh_6a1ed04441eb1', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04442f99', 'dh_6a1ed04442c39', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044430c1', 'dh_6a1ed04442c39', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed044431ef', 'dh_6a1ed04442c39', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed04443594', 'dh_6a1ed0444340a', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed0444383b', 'dh_6a1ed0444340a', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04443ee1', 'dh_6a1ed0444340a', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed04444c6f', 'dh_6a1ed04444897', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04444fdb', 'dh_6a1ed04444897', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed04445328', 'dh_6a1ed04444897', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0444565a', 'dh_6a1ed04444897', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed044460ac', 'dh_6a1ed04445cbb', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04446711', 'dh_6a1ed04445cbb', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed04446d6c', 'dh_6a1ed04445cbb', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04447619', 'dh_6a1ed04447497', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0444787a', 'dh_6a1ed04447497', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04447ae6', 'dh_6a1ed04447497', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed04447d26', 'dh_6a1ed04447497', 'bt_6a17ca3f372d5_2690', 3, 1510000),
('ctdh_6a1ed04448a1b', 'dh_6a1ed04448694', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04448d6a', 'dh_6a1ed04448694', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04449098', 'dh_6a1ed04448694', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed0444937a', 'dh_6a1ed04448694', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04449c9c', 'dh_6a1ed0444995c', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0444a2dc', 'dh_6a1ed0444995c', 'bt_6a17ca3f44eb1_1876', 3, 1790000),
('ctdh_6a1ed0444a804', 'dh_6a1ed0444a677', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed0444aa5f', 'dh_6a1ed0444a677', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0444acd9', 'dh_6a1ed0444a677', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0444b9e3', 'dh_6a1ed0444b604', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed0444c72c', 'dh_6a1ed0444c3bf', 'bt_6a17ca3f34956_1505', 1, 1350000),
('ctdh_6a1ed0444d44e', 'dh_6a1ed0444d082', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0444d7c9', 'dh_6a1ed0444d082', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0444db18', 'dh_6a1ed0444d082', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0444e5ea', 'dh_6a1ed0444e13b', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0444e864', 'dh_6a1ed0444e13b', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed0444ea9e', 'dh_6a1ed0444e13b', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed0444f135', 'dh_6a1ed0444e13b', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed0444feb9', 'dh_6a1ed0444faf2', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed04450558', 'dh_6a1ed0444faf2', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04450b9c', 'dh_6a1ed0444faf2', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044512e4', 'dh_6a1ed0444faf2', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04451daf', 'dh_6a1ed04451c1f', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04452279', 'dh_6a1ed044520f3', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044523c5', 'dh_6a1ed044520f3', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04452969', 'dh_6a1ed044525f4', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04452faa', 'dh_6a1ed044525f4', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04453c51', 'dh_6a1ed044538c4', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044542ba', 'dh_6a1ed044538c4', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0445491d', 'dh_6a1ed044538c4', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed04454ff5', 'dh_6a1ed044538c4', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed04455d03', 'dh_6a1ed0445592b', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed04455f97', 'dh_6a1ed0445592b', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0445621b', 'dh_6a1ed0445592b', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04456d71', 'dh_6a1ed044569e3', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed044573b1', 'dh_6a1ed044569e3', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04457a43', 'dh_6a1ed044569e3', 'bt_6a17ca3f34555_1778', 1, 1350000),
('ctdh_6a1ed04458718', 'dh_6a1ed044583c5', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04458d21', 'dh_6a1ed044583c5', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04459161', 'dh_6a1ed044583c5', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed0445939a', 'dh_6a1ed044583c5', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed04459aa1', 'dh_6a1ed044596c0', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0445a17b', 'dh_6a1ed044596c0', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed0445a7a2', 'dh_6a1ed044596c0', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0445ae18', 'dh_6a1ed044596c0', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed0445bb7c', 'dh_6a1ed0445b76e', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0445c21b', 'dh_6a1ed0445b76e', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed0445cee0', 'dh_6a1ed0445cb35', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed0445d536', 'dh_6a1ed0445cb35', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0445da28', 'dh_6a1ed0445d890', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed0445dc5c', 'dh_6a1ed0445d890', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed0445de82', 'dh_6a1ed0445d890', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0445eb9a', 'dh_6a1ed0445e7c6', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0445ef01', 'dh_6a1ed0445e7c6', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed0445f280', 'dh_6a1ed0445e7c6', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0445fc82', 'dh_6a1ed0445f911', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044602e4', 'dh_6a1ed0445f911', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044609c8', 'dh_6a1ed04460837', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04460eac', 'dh_6a1ed04460837', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04461b24', 'dh_6a1ed044617af', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04461e2a', 'dh_6a1ed044617af', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed04462149', 'dh_6a1ed044617af', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed04462ba5', 'dh_6a1ed0446281b', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04463363', 'dh_6a1ed0446281b', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04463ff2', 'dh_6a1ed04463c95', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed0446466c', 'dh_6a1ed04463c95', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04464cc6', 'dh_6a1ed04463c95', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed04465571', 'dh_6a1ed0446539e', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed044656b5', 'dh_6a1ed0446539e', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04465803', 'dh_6a1ed0446539e', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04465937', 'dh_6a1ed0446539e', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04465eb1', 'dh_6a1ed04465b35', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed0446741c', 'dh_6a1ed044664cd', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04468309', 'dh_6a1ed044664cd', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed044689b8', 'dh_6a1ed044664cd', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed0446915c', 'dh_6a1ed04468f74', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed04469282', 'dh_6a1ed04468f74', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04469a1b', 'dh_6a1ed04469670', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0446a0b3', 'dh_6a1ed04469670', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed0446a739', 'dh_6a1ed04469670', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0446ad6a', 'dh_6a1ed04469670', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0446b986', 'dh_6a1ed0446b604', 'bt_6a17ca3f3c1e0_7068', 1, 1520000),
('ctdh_6a1ed0446bfec', 'dh_6a1ed0446b604', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed0446cc3b', 'dh_6a1ed0446c8ba', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed0446d243', 'dh_6a1ed0446c8ba', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed0446d84a', 'dh_6a1ed0446d67a', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0446d978', 'dh_6a1ed0446d67a', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0446dae5', 'dh_6a1ed0446d67a', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0446dc34', 'dh_6a1ed0446d67a', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0446e903', 'dh_6a1ed0446e42e', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed0446f1f7', 'dh_6a1ed0446e42e', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0446fb92', 'dh_6a1ed0446e42e', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed044703de', 'dh_6a1ed0446e42e', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04471381', 'dh_6a1ed04471126', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044717c1', 'dh_6a1ed04471126', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04471db3', 'dh_6a1ed04471bc7', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed04472361', 'dh_6a1ed04471bc7', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04472a6c', 'dh_6a1ed04471bc7', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed044739ae', 'dh_6a1ed044735b4', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed044740e4', 'dh_6a1ed044735b4', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed04474745', 'dh_6a1ed044735b4', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04475404', 'dh_6a1ed0447507c', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04475a86', 'dh_6a1ed0447507c', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04475d70', 'dh_6a1ed0447507c', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed04476298', 'dh_6a1ed044760fc', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04476593', 'dh_6a1ed044760fc', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed044768c0', 'dh_6a1ed044760fc', 'bt_6a17ca3f3c1e0_7068', 2, 1520000),
('ctdh_6a1ed0447728b', 'dh_6a1ed04476f09', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044778dc', 'dh_6a1ed04476f09', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed04477faf', 'dh_6a1ed04476f09', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044786f9', 'dh_6a1ed04476f09', 'bt_6a17ca3f411b4_4886', 3, 1070000),
('ctdh_6a1ed04479329', 'dh_6a1ed04479111', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed044794e8', 'dh_6a1ed04479111', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04479688', 'dh_6a1ed04479111', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed04479cf9', 'dh_6a1ed04479949', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0447a361', 'dh_6a1ed04479949', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0447a99c', 'dh_6a1ed04479949', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0447b040', 'dh_6a1ed04479949', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0447bd95', 'dh_6a1ed0447b9b6', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0447c0ea', 'dh_6a1ed0447b9b6', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0447c3eb', 'dh_6a1ed0447b9b6', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0447c7bf', 'dh_6a1ed0447b9b6', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0447d22a', 'dh_6a1ed0447ce70', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed0447d7e7', 'dh_6a1ed0447ce70', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed0447da81', 'dh_6a1ed0447ce70', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0447dd09', 'dh_6a1ed0447ce70', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed0447e393', 'dh_6a1ed0447e00f', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0447ea3f', 'dh_6a1ed0447e00f', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0447f742', 'dh_6a1ed0447f3a0', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044804a7', 'dh_6a1ed04480113', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed04480955', 'dh_6a1ed04480113', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04480bb1', 'dh_6a1ed04480113', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04481034', 'dh_6a1ed04480113', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04481d73', 'dh_6a1ed04481991', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed04482093', 'dh_6a1ed04481991', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed044823c5', 'dh_6a1ed04481991', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04482d95', 'dh_6a1ed044829db', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed04483421', 'dh_6a1ed044829db', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed04484120', 'dh_6a1ed04483d7d', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed04484ed8', 'dh_6a1ed04484a54', 'bt_6a17ca3f3d357_6692', 1, 790000),
('ctdh_6a1ed044854ae', 'dh_6a1ed04485309', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0448574c', 'dh_6a1ed04485309', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044859c4', 'dh_6a1ed04485309', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044866ca', 'dh_6a1ed0448634c', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04486cee', 'dh_6a1ed0448634c', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed04487300', 'dh_6a1ed0448634c', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04487e01', 'dh_6a1ed04487c5a', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04488056', 'dh_6a1ed04487c5a', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04488287', 'dh_6a1ed04487c5a', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04488ca5', 'dh_6a1ed04488843', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed044893d2', 'dh_6a1ed04488843', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed0448a1c4', 'dh_6a1ed04489d9a', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0448aa76', 'dh_6a1ed04489d9a', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0448b1c1', 'dh_6a1ed04489d9a', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0448bf33', 'dh_6a1ed0448bb5f', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed0448c679', 'dh_6a1ed0448bb5f', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0448cc3b', 'dh_6a1ed0448bb5f', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0448d242', 'dh_6a1ed0448cfe2', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0448d9a1', 'dh_6a1ed0448d5eb', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed0448e004', 'dh_6a1ed0448d5eb', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0448e7b3', 'dh_6a1ed0448d5eb', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed0448edf3', 'dh_6a1ed0448d5eb', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0448fa76', 'dh_6a1ed0448f702', 'bt_6a17ca3f42c4f_2357', 2, 1510000),
('ctdh_6a1ed0449029a', 'dh_6a1ed044900b8', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed044903c7', 'dh_6a1ed044900b8', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed044904d6', 'dh_6a1ed044900b8', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044905e8', 'dh_6a1ed044900b8', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed04490d8c', 'dh_6a1ed044909f3', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed04491103', 'dh_6a1ed044909f3', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0449149b', 'dh_6a1ed044909f3', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04491ed9', 'dh_6a1ed04491b39', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04492bea', 'dh_6a1ed04492834', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04493209', 'dh_6a1ed04492834', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04493fac', 'dh_6a1ed04493b14', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04494279', 'dh_6a1ed04493b14', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed04494750', 'dh_6a1ed044945cb', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04494990', 'dh_6a1ed044945cb', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04494fdf', 'dh_6a1ed044945cb', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04495ca5', 'dh_6a1ed044958e4', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04496a07', 'dh_6a1ed04496648', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed04497196', 'dh_6a1ed04496fe6', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0449745f', 'dh_6a1ed04496fe6', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04497b6d', 'dh_6a1ed044977e3', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0449822b', 'dh_6a1ed044977e3', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed044988e4', 'dh_6a1ed044977e3', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0449961d', 'dh_6a1ed0449924a', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0449a096', 'dh_6a1ed04499ccb', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0449a848', 'dh_6a1ed04499ccb', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0449aee2', 'dh_6a1ed04499ccb', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0449b556', 'dh_6a1ed04499ccb', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0449bd96', 'dh_6a1ed0449b9f4', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0449c43b', 'dh_6a1ed0449b9f4', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0449d174', 'dh_6a1ed0449cdb5', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed0449d4ad', 'dh_6a1ed0449cdb5', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0449d800', 'dh_6a1ed0449cdb5', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed0449db71', 'dh_6a1ed0449cdb5', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed0449e527', 'dh_6a1ed0449e1b3', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0449ea0b', 'dh_6a1ed0449e1b3', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0449ecb4', 'dh_6a1ed0449e1b3', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0449ef53', 'dh_6a1ed0449e1b3', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0449f7d3', 'dh_6a1ed0449f342', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0449ff3f', 'dh_6a1ed0449f342', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed044a1299', 'dh_6a1ed044a0e2c', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed044a1a08', 'dh_6a1ed044a0e2c', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed044a1da7', 'dh_6a1ed044a0e2c', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044a27c9', 'dh_6a1ed044a241a', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044a35ee', 'dh_6a1ed044a3204', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044a3958', 'dh_6a1ed044a3204', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044a3dcd', 'dh_6a1ed044a3c2c', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed044a4066', 'dh_6a1ed044a3c2c', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed044a4350', 'dh_6a1ed044a3c2c', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed044a4cd1', 'dh_6a1ed044a4908', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044a5b03', 'dh_6a1ed044a5702', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed044a6242', 'dh_6a1ed044a5702', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed044a68b0', 'dh_6a1ed044a5702', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed044a70db', 'dh_6a1ed044a6e29', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed044a75fb', 'dh_6a1ed044a6e29', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed044a7c97', 'dh_6a1ed044a7ad0', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed044a7f05', 'dh_6a1ed044a7ad0', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044a83e6', 'dh_6a1ed044a8229', 'bt_6a17ca3f3faf2_3949', 3, 1310000),
('ctdh_6a1ed044a852e', 'dh_6a1ed044a8229', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed044a8856', 'dh_6a1ed044a8229', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044a8bd2', 'dh_6a1ed044a8229', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044a9774', 'dh_6a1ed044a9310', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed044a9f15', 'dh_6a1ed044a9310', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044aa80d', 'dh_6a1ed044a9310', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044aabd8', 'dh_6a1ed044a9310', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed044ab562', 'dh_6a1ed044ab113', 'bt_6a17ca3f3cd6a_2743', 2, 790000),
('ctdh_6a1ed044abc86', 'dh_6a1ed044ab113', 'bt_6a17ca3f40626_6797', 3, 680000),
('ctdh_6a1ed044ac9dc', 'dh_6a1ed044ac60d', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044ad045', 'dh_6a1ed044ac60d', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044ad695', 'dh_6a1ed044ac60d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044add3f', 'dh_6a1ed044ac60d', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed044ae54a', 'dh_6a1ed044ae356', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044ae816', 'dh_6a1ed044ae356', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed044aea83', 'dh_6a1ed044ae356', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed044aef4b', 'dh_6a1ed044aedaf', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044af07b', 'dh_6a1ed044aedaf', 'bt_6a17ca3f3b300_5532', 3, 1200000),
('ctdh_6a1ed044af19b', 'dh_6a1ed044aedaf', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed044af4d6', 'dh_6a1ed044aedaf', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed044afe9e', 'dh_6a1ed044afb09', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044b01ea', 'dh_6a1ed044afb09', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed044b04de', 'dh_6a1ed044afb09', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed044b0e5a', 'dh_6a1ed044b0ab3', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed044b1af1', 'dh_6a1ed044b182d', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed044b1c61', 'dh_6a1ed044b182d', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044b1dd2', 'dh_6a1ed044b182d', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044b1f23', 'dh_6a1ed044b182d', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed044b2340', 'dh_6a1ed044b2173', 'bt_6a17ca3f3fe6d_9123', 3, 1310000),
('ctdh_6a1ed044b24b2', 'dh_6a1ed044b2173', 'bt_6a17ca3f3fe6d_9123', 2, 1310000),
('ctdh_6a1ed044b283d', 'dh_6a1ed044b2173', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044b31fe', 'dh_6a1ed044b2e62', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044b38b4', 'dh_6a1ed044b2e62', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044b3fb0', 'dh_6a1ed044b2e62', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044b4b53', 'dh_6a1ed044b495b', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044b4df8', 'dh_6a1ed044b495b', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed044b529e', 'dh_6a1ed044b495b', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed044b60e1', 'dh_6a1ed044b5d1d', 'bt_6a17ca3f372d5_2690', 3, 1510000),
('ctdh_6a1ed044b67b6', 'dh_6a1ed044b5d1d', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed044b76e1', 'dh_6a1ed044b72b6', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed044b7a00', 'dh_6a1ed044b72b6', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044b7cf5', 'dh_6a1ed044b72b6', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044b87bf', 'dh_6a1ed044b83f0', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044b8e5f', 'dh_6a1ed044b83f0', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044b952f', 'dh_6a1ed044b83f0', 'bt_6a17ca3f3eece_6613', 1, 1520000),
('ctdh_6a1ed044b981f', 'dh_6a1ed044b83f0', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed044b9e6a', 'dh_6a1ed044b9c2e', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed044ba14c', 'dh_6a1ed044b9c2e', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed044ba877', 'dh_6a1ed044b9c2e', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044bb703', 'dh_6a1ed044bb318', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed044bc1b2', 'dh_6a1ed044bbd7d', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044bc565', 'dh_6a1ed044bbd7d', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044bcd63', 'dh_6a1ed044bcb96', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044bceac', 'dh_6a1ed044bcb96', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed044bd05b', 'dh_6a1ed044bcb96', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed044bd6b2', 'dh_6a1ed044bd2d5', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed044bdb11', 'dh_6a1ed044bd2d5', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed044bdf11', 'dh_6a1ed044bd2d5', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044be244', 'dh_6a1ed044bd2d5', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed044bebfa', 'dh_6a1ed044be87e', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044bf5ce', 'dh_6a1ed044bf247', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed044bfbe8', 'dh_6a1ed044bf247', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed044c0212', 'dh_6a1ed044bf247', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed044c0835', 'dh_6a1ed044bf247', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed044c0f85', 'dh_6a1ed044c0db2', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044c10bd', 'dh_6a1ed044c0db2', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed044c147c', 'dh_6a1ed044c12be', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044c18ef', 'dh_6a1ed044c12be', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044c26b9', 'dh_6a1ed044c22d3', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044c29c5', 'dh_6a1ed044c22d3', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed044c33a7', 'dh_6a1ed044c3025', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed044c3c50', 'dh_6a1ed044c3025', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044c497e', 'dh_6a1ed044c45a7', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed044c4fb5', 'dh_6a1ed044c45a7', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed044c5687', 'dh_6a1ed044c45a7', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044c63e7', 'dh_6a1ed044c603f', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed044c6a61', 'dh_6a1ed044c603f', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed044c70b6', 'dh_6a1ed044c603f', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed044c7c6d', 'dh_6a1ed044c7a84', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044c7f5b', 'dh_6a1ed044c7a84', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed044c8228', 'dh_6a1ed044c7a84', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed044c8d46', 'dh_6a1ed044c899a', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044c9452', 'dh_6a1ed044c899a', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed044ca157', 'dh_6a1ed044c9d66', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044caf56', 'dh_6a1ed044caa6e', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044cb0be', 'dh_6a1ed044caa6e', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044cb1e7', 'dh_6a1ed044caa6e', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed044cb350', 'dh_6a1ed044caa6e', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed044cbb31', 'dh_6a1ed044cb78a', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed044cbe4f', 'dh_6a1ed044cb78a', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed044cc7e0', 'dh_6a1ed044cc428', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed044ccaf1', 'dh_6a1ed044cc428', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044cce2c', 'dh_6a1ed044cc428', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed044cd145', 'dh_6a1ed044cc428', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044cdbcf', 'dh_6a1ed044cd7f8', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044ce29d', 'dh_6a1ed044cd7f8', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044ce935', 'dh_6a1ed044cd7f8', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044cefdb', 'dh_6a1ed044cd7f8', 'bt_6a17ca3f446f2_6943', 2, 1350000),
('ctdh_6a1ed044cf957', 'dh_6a1ed044cf788', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed044cfece', 'dh_6a1ed044cfd2c', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044d012c', 'dh_6a1ed044cfd2c', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed044d07a5', 'dh_6a1ed044cfd2c', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044d0ec7', 'dh_6a1ed044cfd2c', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044d2b2c', 'dh_6a1ed044d2759', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed044d3610', 'dh_6a1ed044d316a', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044d3771', 'dh_6a1ed044d316a', 'bt_6a17ca3f40a17_2289', 2, 680000),
('ctdh_6a1ed044d3b55', 'dh_6a1ed044d39ce', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044d3c86', 'dh_6a1ed044d39ce', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed044d3fc4', 'dh_6a1ed044d39ce', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed044d4331', 'dh_6a1ed044d39ce', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed044d4dd8', 'dh_6a1ed044d4a17', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044d5408', 'dh_6a1ed044d4a17', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044d6113', 'dh_6a1ed044d5d80', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed044d6dbb', 'dh_6a1ed044d6a3c', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed044d7777', 'dh_6a1ed044d7428', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed044d7be8', 'dh_6a1ed044d7428', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed044d80b1', 'dh_6a1ed044d7f10', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044d838b', 'dh_6a1ed044d7f10', 'bt_6a17ca3f3c435_9741', 1, 1520000),
('ctdh_6a1ed044d8e48', 'dh_6a1ed044d8aa6', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044d9590', 'dh_6a1ed044d8aa6', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044da2a4', 'dh_6a1ed044d9f09', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044da9f8', 'dh_6a1ed044da851', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044dac7d', 'dh_6a1ed044da851', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed044db3a9', 'dh_6a1ed044db01d', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044dba08', 'dh_6a1ed044db01d', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044dc6cc', 'dh_6a1ed044dc2f2', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed044dcd27', 'dh_6a1ed044dc2f2', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed044dd3b5', 'dh_6a1ed044dc2f2', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed044dde42', 'dh_6a1ed044ddcc7', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed044de0a4', 'dh_6a1ed044ddcc7', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed044de301', 'dh_6a1ed044ddcc7', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044de95e', 'dh_6a1ed044de5fb', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed044dec5d', 'dh_6a1ed044de5fb', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed044df54e', 'dh_6a1ed044df202', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044df86a', 'dh_6a1ed044df202', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed044e0181', 'dh_6a1ed044dfe15', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed044e076a', 'dh_6a1ed044dfe15', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed044e1154', 'dh_6a1ed044e0fe7', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed044e13e5', 'dh_6a1ed044e0fe7', 'bt_6a17ca3f39289_9497', 2, 960000),
('ctdh_6a1ed044e18bf', 'dh_6a1ed044e1713', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044e1f19', 'dh_6a1ed044e1713', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044e24dd', 'dh_6a1ed044e1713', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044e3116', 'dh_6a1ed044e2dae', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed044e3438', 'dh_6a1ed044e2dae', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed044e3e28', 'dh_6a1ed044e3a9f', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044e4128', 'dh_6a1ed044e3a9f', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed044e4415', 'dh_6a1ed044e3a9f', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044e479b', 'dh_6a1ed044e4630', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044e4bcb', 'dh_6a1ed044e4630', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044e57f4', 'dh_6a1ed044e5482', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed044e5e13', 'dh_6a1ed044e5482', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044e63ed', 'dh_6a1ed044e5482', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed044e69a7', 'dh_6a1ed044e5482', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044e75e8', 'dh_6a1ed044e726a', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044e7ce3', 'dh_6a1ed044e726a', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed044e8488', 'dh_6a1ed044e82e8', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed044e8702', 'dh_6a1ed044e82e8', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed044e8e45', 'dh_6a1ed044e8a1c', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed044e9a6c', 'dh_6a1ed044e9730', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed044ea67f', 'dh_6a1ed044ea305', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed044ea98c', 'dh_6a1ed044ea305', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed044eac7e', 'dh_6a1ed044ea305', 'bt_6a17ca3f4151f_8482', 1, 1070000),
('ctdh_6a1ed044eb49e', 'dh_6a1ed044eb2ab', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed044eb6e8', 'dh_6a1ed044eb2ab', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044ebfa9', 'dh_6a1ed044ebbcd', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044ec5d7', 'dh_6a1ed044ebbcd', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044ecc13', 'dh_6a1ed044ebbcd', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044ed228', 'dh_6a1ed044ebbcd', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044ede52', 'dh_6a1ed044edaee', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed044ee469', 'dh_6a1ed044edaee', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed044eea50', 'dh_6a1ed044edaee', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed044ef258', 'dh_6a1ed044ef096', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed044ef547', 'dh_6a1ed044ef096', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed044ef775', 'dh_6a1ed044ef096', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed044f01a7', 'dh_6a1ed044efe1e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044f079a', 'dh_6a1ed044efe1e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044f0d98', 'dh_6a1ed044efe1e', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed044f1399', 'dh_6a1ed044efe1e', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed044f1fdb', 'dh_6a1ed044f1c6c', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed044f22e6', 'dh_6a1ed044f1c6c', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044f289c', 'dh_6a1ed044f2707', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed044f2bec', 'dh_6a1ed044f2a7b', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed044f2cf2', 'dh_6a1ed044f2a7b', 'bt_6a17ca3f43eaf_3226', 2, 1350000),
('ctdh_6a1ed044f2e2f', 'dh_6a1ed044f2a7b', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed044f3199', 'dh_6a1ed044f2a7b', 'bt_6a17ca3f3eab5_8602', 2, 1520000),
('ctdh_6a1ed044f3b72', 'dh_6a1ed044f37ba', 'bt_6a17ca3f3c435_9741', 3, 1520000),
('ctdh_6a1ed044f421d', 'dh_6a1ed044f37ba', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0450064e', 'dh_6a1ed044f37ba', 'bt_6a17ca3f3c903_3115', 1, 1520000),
('ctdh_6a1ed045013c2', 'dh_6a1ed0450101e', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04501c24', 'dh_6a1ed04501998', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04501ee5', 'dh_6a1ed04501998', 'bt_6a17ca3f31b18_5076', 1, 1020000);
INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_bien_the`, `so_luong`, `don_gia`) VALUES
('ctdh_6a1ed0450256b', 'dh_6a1ed04501998', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0450361e', 'dh_6a1ed04502f82', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed04503dc9', 'dh_6a1ed04502f82', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04504cc6', 'dh_6a1ed0450485c', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045053e2', 'dh_6a1ed0450485c', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04506221', 'dh_6a1ed04505db4', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045063d4', 'dh_6a1ed04505db4', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed045068f8', 'dh_6a1ed04506709', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed04506f80', 'dh_6a1ed04506709', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04507582', 'dh_6a1ed04506709', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed04507c61', 'dh_6a1ed04506709', 'bt_6a17ca3f43ad2_1326', 3, 1350000),
('ctdh_6a1ed045089c0', 'dh_6a1ed04508585', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0450906c', 'dh_6a1ed04508585', 'bt_6a17ca3f3b7a5_8182', 2, 1200000),
('ctdh_6a1ed0450971d', 'dh_6a1ed04508585', 'bt_6a17ca3f41c25_8343', 3, 1520000),
('ctdh_6a1ed04509e37', 'dh_6a1ed04508585', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed0450a3f2', 'dh_6a1ed0450a23d', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0450a67d', 'dh_6a1ed0450a23d', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0450acdb', 'dh_6a1ed0450a23d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0450b2ff', 'dh_6a1ed0450a23d', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed0450bfbb', 'dh_6a1ed0450bbe7', 'bt_6a17ca3f3df49_2169', 3, 1140000),
('ctdh_6a1ed0450ccd4', 'dh_6a1ed0450c8e1', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0450d935', 'dh_6a1ed0450d5c0', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0450dc36', 'dh_6a1ed0450d5c0', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0450e002', 'dh_6a1ed0450d5c0', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed0450e620', 'dh_6a1ed0450e459', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0450e8a1', 'dh_6a1ed0450e459', 'bt_6a17ca3f411b4_4886', 3, 1070000),
('ctdh_6a1ed0450eafe', 'dh_6a1ed0450e459', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0450ed36', 'dh_6a1ed0450e459', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0450fba6', 'dh_6a1ed0450f63e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0450fe2c', 'dh_6a1ed0450f63e', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045104b4', 'dh_6a1ed045101e4', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04510a72', 'dh_6a1ed045108a9', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed04510d15', 'dh_6a1ed045108a9', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045111b1', 'dh_6a1ed0451103c', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed0451162e', 'dh_6a1ed045114c7', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04511838', 'dh_6a1ed045114c7', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04511a92', 'dh_6a1ed045114c7', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed04511d11', 'dh_6a1ed045114c7', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045121c7', 'dh_6a1ed04512055', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed045123f7', 'dh_6a1ed04512055', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0451262c', 'dh_6a1ed04512055', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04512a8b', 'dh_6a1ed0451292d', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04512b8e', 'dh_6a1ed0451292d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04512c91', 'dh_6a1ed0451292d', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04512d99', 'dh_6a1ed0451292d', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04513319', 'dh_6a1ed04512f74', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04513902', 'dh_6a1ed04512f74', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed04513f08', 'dh_6a1ed04512f74', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04514472', 'dh_6a1ed04512f74', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045148fe', 'dh_6a1ed04514776', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed04514a11', 'dh_6a1ed04514776', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04514f19', 'dh_6a1ed04514be5', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04515219', 'dh_6a1ed04514be5', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04515bd9', 'dh_6a1ed04515820', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed0451624e', 'dh_6a1ed04515820', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04516877', 'dh_6a1ed04515820', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed04516e73', 'dh_6a1ed04515820', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04517b22', 'dh_6a1ed0451779c', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed0451817e', 'dh_6a1ed0451779c', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045183ec', 'dh_6a1ed0451779c', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04518ae9', 'dh_6a1ed04518733', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed04519179', 'dh_6a1ed04518733', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04519dde', 'dh_6a1ed04519a59', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed0451a3dc', 'dh_6a1ed04519a59', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0451a9eb', 'dh_6a1ed04519a59', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0451b793', 'dh_6a1ed0451b2ef', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed0451b9f8', 'dh_6a1ed0451b2ef', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed0451bc38', 'dh_6a1ed0451b2ef', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0451bf15', 'dh_6a1ed0451b2ef', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed0451cbb7', 'dh_6a1ed0451c809', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0451d24c', 'dh_6a1ed0451c809', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0451d887', 'dh_6a1ed0451c809', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0451e521', 'dh_6a1ed0451e175', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed0451f228', 'dh_6a1ed0451ee6b', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0451f89f', 'dh_6a1ed0451ee6b', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0451fdcc', 'dh_6a1ed0451fc2e', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045200f7', 'dh_6a1ed0451fc2e', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed0452045b', 'dh_6a1ed0451fc2e', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04520778', 'dh_6a1ed0451fc2e', 'bt_6a17ca3f35b27_1230', 2, 1520000),
('ctdh_6a1ed045210af', 'dh_6a1ed04520d65', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed045216f3', 'dh_6a1ed04520d65', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04522338', 'dh_6a1ed04521f9b', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed0452291c', 'dh_6a1ed04521f9b', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04522d07', 'dh_6a1ed04521f9b', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04522f38', 'dh_6a1ed04521f9b', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045233c2', 'dh_6a1ed0452324a', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04523e37', 'dh_6a1ed04523a85', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04524476', 'dh_6a1ed04523a85', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045251f6', 'dh_6a1ed04524e25', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed04525827', 'dh_6a1ed04524e25', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04526586', 'dh_6a1ed045261a4', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04526c7c', 'dh_6a1ed045261a4', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04526f2a', 'dh_6a1ed045261a4', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed04527280', 'dh_6a1ed045261a4', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04527d27', 'dh_6a1ed045279d0', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed04528371', 'dh_6a1ed045279d0', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed045289f2', 'dh_6a1ed045279d0', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0452906d', 'dh_6a1ed045279d0', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04529971', 'dh_6a1ed04529781', 'bt_6a17ca3f41d81_7284', 3, 1520000),
('ctdh_6a1ed04529aaf', 'dh_6a1ed04529781', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0452a1f8', 'dh_6a1ed04529eaf', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0452a5ba', 'dh_6a1ed04529eaf', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0452a8a8', 'dh_6a1ed04529eaf', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0452b1ac', 'dh_6a1ed0452ae5d', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0452beea', 'dh_6a1ed0452bb51', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed0452c87b', 'dh_6a1ed0452c509', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed0452d497', 'dh_6a1ed0452d12e', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0452d727', 'dh_6a1ed0452d12e', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0452d95a', 'dh_6a1ed0452d12e', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0452ddde', 'dh_6a1ed0452dc5b', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed0452e0ff', 'dh_6a1ed0452dc5b', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed0452e3e8', 'dh_6a1ed0452dc5b', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0452ecfb', 'dh_6a1ed0452e991', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0452f2c8', 'dh_6a1ed0452e991', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0452ff2c', 'dh_6a1ed0452fbbf', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed045309eb', 'dh_6a1ed04530810', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04530b2a', 'dh_6a1ed04530810', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04530c53', 'dh_6a1ed04530810', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04531405', 'dh_6a1ed04531084', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04531a73', 'dh_6a1ed04531084', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04532076', 'dh_6a1ed04531084', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04532714', 'dh_6a1ed04531084', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04533413', 'dh_6a1ed0453309b', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04533a6c', 'dh_6a1ed0453309b', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0453412a', 'dh_6a1ed0453309b', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045347c1', 'dh_6a1ed0453309b', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed04534c98', 'dh_6a1ed04534af7', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04534e04', 'dh_6a1ed04534af7', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed04534ffd', 'dh_6a1ed04534af7', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0453517e', 'dh_6a1ed04534af7', 'bt_6a17ca3f40a17_2289', 1, 680000),
('ctdh_6a1ed04535980', 'dh_6a1ed0453560a', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04535fc3', 'dh_6a1ed0453560a', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0453661f', 'dh_6a1ed0453560a', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04536c2e', 'dh_6a1ed0453560a', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0453785f', 'dh_6a1ed045374e2', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04537fdf', 'dh_6a1ed04537dd7', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed045385c9', 'dh_6a1ed04538429', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04538801', 'dh_6a1ed04538429', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04538ed9', 'dh_6a1ed04538429', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed04539570', 'dh_6a1ed04538429', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0453a25b', 'dh_6a1ed04539f09', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0453a38b', 'dh_6a1ed04539f09', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0453a4a8', 'dh_6a1ed04539f09', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed0453ab57', 'dh_6a1ed0453a7a1', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed0453ae3d', 'dh_6a1ed0453a7a1', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0453b16a', 'dh_6a1ed0453a7a1', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0453b47d', 'dh_6a1ed0453a7a1', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed0453bd60', 'dh_6a1ed0453ba12', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed0453c367', 'dh_6a1ed0453ba12', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0453c94b', 'dh_6a1ed0453ba12', 'bt_6a17ca3f456ae_2640', 2, 1790000),
('ctdh_6a1ed0453d5d3', 'dh_6a1ed0453d23b', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0453dbf2', 'dh_6a1ed0453d23b', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed0453e211', 'dh_6a1ed0453d23b', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed0453e92e', 'dh_6a1ed0453e779', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0453ea5a', 'dh_6a1ed0453e779', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0453eb77', 'dh_6a1ed0453e779', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed0453eef1', 'dh_6a1ed0453ed6d', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0453f123', 'dh_6a1ed0453ed6d', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0453f360', 'dh_6a1ed0453ed6d', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0453f934', 'dh_6a1ed0453ed6d', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045400bc', 'dh_6a1ed0453ff15', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045407d9', 'dh_6a1ed04540447', 'bt_6a17ca3f3624c_2637', 1, 1410000),
('ctdh_6a1ed04540aec', 'dh_6a1ed04540447', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04540dea', 'dh_6a1ed04540447', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04541758', 'dh_6a1ed045413b0', 'bt_6a17ca3f3fe6d_9123', 1, 1310000),
('ctdh_6a1ed04542426', 'dh_6a1ed045420c4', 'bt_6a17ca3f41d81_7284', 2, 1520000),
('ctdh_6a1ed04542729', 'dh_6a1ed045420c4', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04542fa2', 'dh_6a1ed04542c87', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed045435ec', 'dh_6a1ed04542c87', 'bt_6a17ca3f34956_1505', 1, 1350000),
('ctdh_6a1ed04543c2a', 'dh_6a1ed04542c87', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045443b6', 'dh_6a1ed04544229', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045444e8', 'dh_6a1ed04544229', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed045445ff', 'dh_6a1ed04544229', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0454473e', 'dh_6a1ed04544229', 'bt_6a17ca3f372d5_2690', 3, 1510000),
('ctdh_6a1ed04544ade', 'dh_6a1ed0454492d', 'bt_6a17ca3f442b1_3626', 2, 1350000),
('ctdh_6a1ed0454544f', 'dh_6a1ed045450b0', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed04545749', 'dh_6a1ed045450b0', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed0454608c', 'dh_6a1ed04545d28', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed045466c6', 'dh_6a1ed04545d28', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed04546c26', 'dh_6a1ed04546a33', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed0454718b', 'dh_6a1ed04546ff2', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045477f6', 'dh_6a1ed04546ff2', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed04547e5d', 'dh_6a1ed04546ff2', 'bt_6a17ca3f42208_2267', 1, 1410000),
('ctdh_6a1ed04548507', 'dh_6a1ed04546ff2', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed045492a6', 'dh_6a1ed04548ec6', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04549925', 'dh_6a1ed04548ec6', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0454a779', 'dh_6a1ed0454a3f8', 'bt_6a17ca3f4151f_8482', 3, 1070000),
('ctdh_6a1ed0454aaba', 'dh_6a1ed0454a3f8', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed0454ae64', 'dh_6a1ed0454ace4', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0454b0e4', 'dh_6a1ed0454ace4', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0454b695', 'dh_6a1ed0454ace4', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed0454bd2c', 'dh_6a1ed0454ace4', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed0454c9f8', 'dh_6a1ed0454c67e', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0454d638', 'dh_6a1ed0454d2d5', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0454d938', 'dh_6a1ed0454d2d5', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0454de24', 'dh_6a1ed0454dc11', 'bt_6a17ca3f39b7a_1941', 3, 960000),
('ctdh_6a1ed0454df3b', 'dh_6a1ed0454dc11', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0454e04d', 'dh_6a1ed0454dc11', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0454e15a', 'dh_6a1ed0454dc11', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed0454e714', 'dh_6a1ed0454e38b', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0454ed39', 'dh_6a1ed0454e38b', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed0454f31e', 'dh_6a1ed0454e38b', 'bt_6a17ca3f3cd6a_2743', 3, 790000),
('ctdh_6a1ed0454f968', 'dh_6a1ed0454e38b', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045505a2', 'dh_6a1ed04550221', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04550bdd', 'dh_6a1ed04550221', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed04551203', 'dh_6a1ed04550221', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed0455185c', 'dh_6a1ed045516f2', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04551c51', 'dh_6a1ed045516f2', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0455225a', 'dh_6a1ed045516f2', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04552fc6', 'dh_6a1ed04552c20', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04553613', 'dh_6a1ed04552c20', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0455428a', 'dh_6a1ed04553f13', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045548fc', 'dh_6a1ed04553f13', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04554dc0', 'dh_6a1ed04554c42', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04554ffd', 'dh_6a1ed04554c42', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0455522a', 'dh_6a1ed04554c42', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04555e55', 'dh_6a1ed04555aee', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04556499', 'dh_6a1ed04555aee', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04556b09', 'dh_6a1ed04555aee', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed045570e5', 'dh_6a1ed04555aee', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed04557dcf', 'dh_6a1ed04557a5d', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04558a9f', 'dh_6a1ed045588cc', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04558fd7', 'dh_6a1ed04558e0d', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed045592fa', 'dh_6a1ed04558e0d', 'bt_6a17ca3f3d357_6692', 1, 790000),
('ctdh_6a1ed04559ce6', 'dh_6a1ed045598ed', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0455a020', 'dh_6a1ed045598ed', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0455a37f', 'dh_6a1ed045598ed', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0455a72c', 'dh_6a1ed045598ed', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0455b13a', 'dh_6a1ed0455adab', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0455b453', 'dh_6a1ed0455adab', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0455b762', 'dh_6a1ed0455adab', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0455ba92', 'dh_6a1ed0455adab', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed0455be1b', 'dh_6a1ed0455bcae', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0455c67a', 'dh_6a1ed0455c334', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0455cc93', 'dh_6a1ed0455c334', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed0455d8fe', 'dh_6a1ed0455d56f', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0455df43', 'dh_6a1ed0455d56f', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0455ebcc', 'dh_6a1ed0455e824', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed0455f204', 'dh_6a1ed0455e824', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0455fe21', 'dh_6a1ed0455fac4', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed0455ff70', 'dh_6a1ed0455fac4', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04560322', 'dh_6a1ed045601b4', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04560595', 'dh_6a1ed045601b4', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04560a01', 'dh_6a1ed045608a3', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04560c0e', 'dh_6a1ed045608a3', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0456125f', 'dh_6a1ed045608a3', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed045618fe', 'dh_6a1ed045608a3', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045624b0', 'dh_6a1ed045622fb', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04562835', 'dh_6a1ed045626bc', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04562c6c', 'dh_6a1ed045626bc', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed045638bf', 'dh_6a1ed04563572', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed04563ed1', 'dh_6a1ed04563572', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04564500', 'dh_6a1ed04563572', 'bt_6a17ca3f40a17_2289', 1, 680000),
('ctdh_6a1ed04564ac9', 'dh_6a1ed04563572', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed045656c3', 'dh_6a1ed04565346', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04565eb7', 'dh_6a1ed04565346', 'bt_6a17ca3f3ab4f_3277', 1, 1170000),
('ctdh_6a1ed045664e1', 'dh_6a1ed04565346', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed04566bba', 'dh_6a1ed04566a3d', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed04566e32', 'dh_6a1ed04566a3d', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed04567086', 'dh_6a1ed04566a3d', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed045672d9', 'dh_6a1ed04566a3d', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04567f5c', 'dh_6a1ed04567bc8', 'bt_6a17ca3f3c6b9_8385', 3, 1520000),
('ctdh_6a1ed04568595', 'dh_6a1ed04567bc8', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed0456924f', 'dh_6a1ed04568ea6', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045694a5', 'dh_6a1ed04568ea6', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed04569712', 'dh_6a1ed04568ea6', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0456a859', 'dh_6a1ed04568ea6', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0456bc34', 'dh_6a1ed0456b489', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0456c0b9', 'dh_6a1ed0456b489', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0456cc2c', 'dh_6a1ed0456c80e', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0456dab6', 'dh_6a1ed0456d730', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0456e92a', 'dh_6a1ed0456e507', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed0456efe3', 'dh_6a1ed0456e507', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0456f803', 'dh_6a1ed0456f66d', 'bt_6a17ca3f3ab4f_3277', 2, 1170000),
('ctdh_6a1ed0456fb0b', 'dh_6a1ed0456f66d', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed0456fd63', 'dh_6a1ed0456f66d', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed0457040d', 'dh_6a1ed0456f66d', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04571266', 'dh_6a1ed04570e9a', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed045719d7', 'dh_6a1ed04570e9a', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04572028', 'dh_6a1ed04570e9a', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed04572709', 'dh_6a1ed04570e9a', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed04572e10', 'dh_6a1ed04572c87', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04573296', 'dh_6a1ed04572c87', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed045738e9', 'dh_6a1ed04572c87', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0457465c', 'dh_6a1ed045742d8', 'bt_6a17ca3f42542_6921', 3, 1410000),
('ctdh_6a1ed045749ab', 'dh_6a1ed045742d8', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed04574d12', 'dh_6a1ed045742d8', 'bt_6a17ca3f44eb1_1876', 3, 1790000),
('ctdh_6a1ed04575731', 'dh_6a1ed04575396', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed045759fd', 'dh_6a1ed04575396', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed04575d31', 'dh_6a1ed04575396', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0457677f', 'dh_6a1ed045763b0', 'bt_6a17ca3f42c4f_2357', 3, 1510000),
('ctdh_6a1ed045773f0', 'dh_6a1ed0457721d', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0457750a', 'dh_6a1ed0457721d', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed04577a70', 'dh_6a1ed0457786a', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04577bf6', 'dh_6a1ed0457786a', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045780a1', 'dh_6a1ed04577e9d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045783cf', 'dh_6a1ed04577e9d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04578da9', 'dh_6a1ed04578a2c', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045791ba', 'dh_6a1ed04578ff5', 'bt_6a17ca3f3d357_6692', 2, 790000),
('ctdh_6a1ed045794b3', 'dh_6a1ed04578ff5', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed04579bbb', 'dh_6a1ed045797d3', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04579ee2', 'dh_6a1ed045797d3', 'bt_6a17ca3f37bf0_7610', 3, 1350000),
('ctdh_6a1ed0457a8a2', 'dh_6a1ed0457a4f6', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0457af00', 'dh_6a1ed0457a4f6', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0457b52d', 'dh_6a1ed0457a4f6', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed0457c19f', 'dh_6a1ed0457be67', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0457c799', 'dh_6a1ed0457be67', 'bt_6a17ca3f3c435_9741', 3, 1520000),
('ctdh_6a1ed0457cf38', 'dh_6a1ed0457be67', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0457d468', 'dh_6a1ed0457d2d2', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0457dabd', 'dh_6a1ed0457d76b', 'bt_6a17ca3f3b300_5532', 2, 1200000),
('ctdh_6a1ed0457e0ba', 'dh_6a1ed0457d76b', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0457ed3f', 'dh_6a1ed0457e9d2', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0457f3ef', 'dh_6a1ed0457e9d2', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0457fa92', 'dh_6a1ed0457e9d2', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04580165', 'dh_6a1ed0457ffd2', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045805ce', 'dh_6a1ed04580469', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04580a6e', 'dh_6a1ed04580469', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed04581055', 'dh_6a1ed04580469', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed04581669', 'dh_6a1ed04580469', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04582417', 'dh_6a1ed04582096', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed04582a94', 'dh_6a1ed04582096', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed045831f4', 'dh_6a1ed04582096', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed0458367f', 'dh_6a1ed04583505', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04584186', 'dh_6a1ed04583db2', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed045847c1', 'dh_6a1ed04583db2', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed04584d84', 'dh_6a1ed04583db2', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04585a11', 'dh_6a1ed045856b0', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed045864f6', 'dh_6a1ed04586354', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04586617', 'dh_6a1ed04586354', 'bt_6a17ca3f42fc2_2526', 1, 1510000),
('ctdh_6a1ed04586959', 'dh_6a1ed04586804', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed04586a69', 'dh_6a1ed04586804', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04586b8c', 'dh_6a1ed04586804', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed04586eea', 'dh_6a1ed04586d8f', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04587143', 'dh_6a1ed04586d8f', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045877ce', 'dh_6a1ed04586d8f', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed045883e6', 'dh_6a1ed04588068', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045889d5', 'dh_6a1ed04588068', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed04588ff9', 'dh_6a1ed04588068', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0458962f', 'dh_6a1ed04588068', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04589cbb', 'dh_6a1ed04589b3f', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed04589dcb', 'dh_6a1ed04589b3f', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed0458a154', 'dh_6a1ed04589fa9', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0458a83a', 'dh_6a1ed04589fa9', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0458af6f', 'dh_6a1ed04589fa9', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0458bd1c', 'dh_6a1ed0458b973', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed0458c439', 'dh_6a1ed0458b973', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0458ce2a', 'dh_6a1ed0458cc53', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0458d075', 'dh_6a1ed0458cc53', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0458dcdb', 'dh_6a1ed0458d92c', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0458dfce', 'dh_6a1ed0458d92c', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed0458e2c3', 'dh_6a1ed0458d92c', 'bt_6a17ca3f42c4f_2357', 1, 1510000),
('ctdh_6a1ed0458e5e7', 'dh_6a1ed0458d92c', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0458eefd', 'dh_6a1ed0458ebb2', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0458f1da', 'dh_6a1ed0458ebb2', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0458f49f', 'dh_6a1ed0458ebb2', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0458fe1c', 'dh_6a1ed0458fa80', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed04590130', 'dh_6a1ed0458fa80', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0459041a', 'dh_6a1ed0458fa80', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed04590d4f', 'dh_6a1ed04590a00', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04590ffd', 'dh_6a1ed04590a00', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04591516', 'dh_6a1ed0459134f', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed04591650', 'dh_6a1ed0459134f', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045917c4', 'dh_6a1ed0459134f', 'bt_6a17ca3f41c25_8343', 3, 1520000),
('ctdh_6a1ed045921b9', 'dh_6a1ed04591e28', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed045927f8', 'dh_6a1ed04591e28', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed045934b7', 'dh_6a1ed04593141', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04593945', 'dh_6a1ed04593141', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed04593c32', 'dh_6a1ed04593141', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045942b9', 'dh_6a1ed04593f12', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed045949de', 'dh_6a1ed04593f12', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed04595050', 'dh_6a1ed04593f12', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed045956a0', 'dh_6a1ed04593f12', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045963a8', 'dh_6a1ed04595fd5', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04596a38', 'dh_6a1ed04595fd5', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04597763', 'dh_6a1ed045973a4', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed04597e39', 'dh_6a1ed045973a4', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed04598762', 'dh_6a1ed04598585', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed04598c9a', 'dh_6a1ed04598aef', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed04598dad', 'dh_6a1ed04598aef', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0459971f', 'dh_6a1ed0459938c', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed04599e1b', 'dh_6a1ed0459938c', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0459a4e7', 'dh_6a1ed0459938c', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0459ab67', 'dh_6a1ed0459938c', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0459b523', 'dh_6a1ed0459b372', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed0459b770', 'dh_6a1ed0459b372', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0459b9e3', 'dh_6a1ed0459b372', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed0459c4fa', 'dh_6a1ed0459c160', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0459cbd2', 'dh_6a1ed0459c160', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0459d2ff', 'dh_6a1ed0459c160', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0459d9f0', 'dh_6a1ed0459c160', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0459e723', 'dh_6a1ed0459e371', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed0459ee18', 'dh_6a1ed0459e371', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed0459fb7f', 'dh_6a1ed0459f7b1', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed0459fdfd', 'dh_6a1ed0459f7b1', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed045a02c3', 'dh_6a1ed045a0113', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed045a0c3d', 'dh_6a1ed045a085a', 'bt_6a17ca3f36ee0_2672', 2, 1510000),
('ctdh_6a1ed045a12b5', 'dh_6a1ed045a085a', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed045a190d', 'dh_6a1ed045a085a', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed045a2626', 'dh_6a1ed045a2243', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045a2b3d', 'dh_6a1ed045a2243', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045a30c5', 'dh_6a1ed045a2f20', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed045a3387', 'dh_6a1ed045a2f20', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045a3869', 'dh_6a1ed045a2f20', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045a469d', 'dh_6a1ed045a4296', 'bt_6a17ca3f3cd6a_2743', 3, 790000),
('ctdh_6a1ed045a4d61', 'dh_6a1ed045a4296', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045a5479', 'dh_6a1ed045a4296', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045a6271', 'dh_6a1ed045a5e95', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed045a6f9a', 'dh_6a1ed045a6c1f', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed045a724c', 'dh_6a1ed045a6c1f', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045a751e', 'dh_6a1ed045a6c1f', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed045a8256', 'dh_6a1ed045a7ea0', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed045a88b2', 'dh_6a1ed045a7ea0', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045a9779', 'dh_6a1ed045a922f', 'bt_6a17ca3f446f2_6943', 1, 1350000),
('ctdh_6a1ed045a9a9d', 'dh_6a1ed045a922f', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed045aac18', 'dh_6a1ed045a922f', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed045ab67d', 'dh_6a1ed045ab2af', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed045ab916', 'dh_6a1ed045ab2af', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed045abeb6', 'dh_6a1ed045abc3f', 'bt_6a17ca3f3c435_9741', 2, 1520000),
('ctdh_6a1ed045abff1', 'dh_6a1ed045abc3f', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed045ac84d', 'dh_6a1ed045ac4a9', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045acb90', 'dh_6a1ed045ac4a9', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed045acee6', 'dh_6a1ed045ac4a9', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed045ad8f1', 'dh_6a1ed045ad508', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045adf89', 'dh_6a1ed045ad508', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045ae60e', 'dh_6a1ed045ad508', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed045af3e6', 'dh_6a1ed045aefe6', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045af9df', 'dh_6a1ed045aefe6', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed045afcdb', 'dh_6a1ed045aefe6', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045b08c0', 'dh_6a1ed045b04d0', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed045b15b9', 'dh_6a1ed045b1200', 'bt_6a17ca3f387f9_5857', 1, 1350000),
('ctdh_6a1ed045b24d8', 'dh_6a1ed045b205e', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045b2b79', 'dh_6a1ed045b205e', 'bt_6a17ca3f3e2f0_9774', 3, 1140000),
('ctdh_6a1ed045b3086', 'dh_6a1ed045b205e', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed045b3643', 'dh_6a1ed045b3454', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045b37ae', 'dh_6a1ed045b3454', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed045b38de', 'dh_6a1ed045b3454', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045b4277', 'dh_6a1ed045b3ecf', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed045b48d2', 'dh_6a1ed045b3ecf', 'bt_6a17ca3f35b27_1230', 2, 1520000),
('ctdh_6a1ed045b55b8', 'dh_6a1ed045b5227', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045b5c57', 'dh_6a1ed045b5227', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045b6975', 'dh_6a1ed045b65a0', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045b705a', 'dh_6a1ed045b65a0', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045b786d', 'dh_6a1ed045b766f', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045b7d41', 'dh_6a1ed045b7bc0', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045b8432', 'dh_6a1ed045b7bc0', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed045b8aed', 'dh_6a1ed045b7bc0', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045b9124', 'dh_6a1ed045b7bc0', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed045b9f67', 'dh_6a1ed045b9b4d', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed045bac1b', 'dh_6a1ed045baa2e', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045baee6', 'dh_6a1ed045baa2e', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045bbc66', 'dh_6a1ed045bb808', 'bt_6a17ca3f44eb1_1876', 3, 1790000),
('ctdh_6a1ed045bc459', 'dh_6a1ed045bb808', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045bcbf6', 'dh_6a1ed045bb808', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed045bda76', 'dh_6a1ed045bd65d', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed045be164', 'dh_6a1ed045bd65d', 'bt_6a17ca3f39b7a_1941', 1, 960000),
('ctdh_6a1ed045be832', 'dh_6a1ed045bd65d', 'bt_6a17ca3f40a17_2289', 3, 680000),
('ctdh_6a1ed045bef64', 'dh_6a1ed045bd65d', 'bt_6a17ca3f3413a_2487', 1, 1350000),
('ctdh_6a1ed045bfbf7', 'dh_6a1ed045bfa01', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed045bfd4a', 'dh_6a1ed045bfa01', 'bt_6a17ca3f36705_1246', 1, 1410000),
('ctdh_6a1ed045bfe71', 'dh_6a1ed045bfa01', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045c029e', 'dh_6a1ed045c00aa', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045c040f', 'dh_6a1ed045c00aa', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed045c0599', 'dh_6a1ed045c00aa', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed045c099a', 'dh_6a1ed045c00aa', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed045c1677', 'dh_6a1ed045c1167', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045c1dc3', 'dh_6a1ed045c1167', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed045c2529', 'dh_6a1ed045c1167', 'bt_6a17ca3f3d357_6692', 2, 790000),
('ctdh_6a1ed045c2c46', 'dh_6a1ed045c1167', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045c3442', 'dh_6a1ed045c325b', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed045c357f', 'dh_6a1ed045c325b', 'bt_6a17ca3f42208_2267', 3, 1410000),
('ctdh_6a1ed045c4041', 'dh_6a1ed045c39f5', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed045c477d', 'dh_6a1ed045c4488', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed045c4aa5', 'dh_6a1ed045c4488', 'bt_6a17ca3f3df49_2169', 1, 1140000),
('ctdh_6a1ed045c4d92', 'dh_6a1ed045c4488', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045c536d', 'dh_6a1ed045c51a7', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed045c572a', 'dh_6a1ed045c559c', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045c5dec', 'dh_6a1ed045c559c', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed045c6496', 'dh_6a1ed045c559c', 'bt_6a17ca3f3a3c8_9509', 3, 1170000),
('ctdh_6a1ed045c6b57', 'dh_6a1ed045c559c', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed045c7930', 'dh_6a1ed045c7591', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045c8058', 'dh_6a1ed045c7591', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045c8dde', 'dh_6a1ed045c8b16', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed045c8f4f', 'dh_6a1ed045c8b16', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed045c90d2', 'dh_6a1ed045c8b16', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045c96bd', 'dh_6a1ed045c9350', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed045ca5d3', 'dh_6a1ed045ca18d', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045cb31c', 'dh_6a1ed045caf76', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045cb65b', 'dh_6a1ed045caf76', 'bt_6a17ca3f42208_2267', 3, 1410000),
('ctdh_6a1ed045cb9c9', 'dh_6a1ed045caf76', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed045cbcde', 'dh_6a1ed045caf76', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed045cc6e3', 'dh_6a1ed045cc2ef', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed045cc98c', 'dh_6a1ed045cc2ef', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045ccc93', 'dh_6a1ed045cc2ef', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045ccf5f', 'dh_6a1ed045cc2ef', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed045cd845', 'dh_6a1ed045cd4cf', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed045cdea1', 'dh_6a1ed045cd4cf', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045ce53a', 'dh_6a1ed045cd4cf', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed045cec0a', 'dh_6a1ed045cd4cf', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a1ed045cf8ee', 'dh_6a1ed045cf52c', 'bt_6a17ca3f452ab_9530', 2, 1790000),
('ctdh_6a1ed045cffc9', 'dh_6a1ed045cf52c', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed045d0587', 'dh_6a1ed045cf52c', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045d085b', 'dh_6a1ed045cf52c', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed045d1433', 'dh_6a1ed045d10a9', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed045d1797', 'dh_6a1ed045d10a9', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed045d2207', 'dh_6a1ed045d1e12', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045d2d80', 'dh_6a1ed045d292a', 'bt_6a17ca3f44eb1_1876', 3, 1790000),
('ctdh_6a1ed045d34d5', 'dh_6a1ed045d292a', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed045d3be9', 'dh_6a1ed045d292a', 'bt_6a17ca3f43ad2_1326', 2, 1350000),
('ctdh_6a1ed045d439a', 'dh_6a1ed045d292a', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed045d4bad', 'dh_6a1ed045d49bd', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed045d512f', 'dh_6a1ed045d4f56', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045d527e', 'dh_6a1ed045d4f56', 'bt_6a17ca3f396f6_4341', 2, 960000),
('ctdh_6a1ed045d5655', 'dh_6a1ed045d4f56', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed045d59a7', 'dh_6a1ed045d4f56', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045d6488', 'dh_6a1ed045d6078', 'bt_6a17ca3f34555_1778', 3, 1350000),
('ctdh_6a1ed045d6b87', 'dh_6a1ed045d6078', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed045d728a', 'dh_6a1ed045d6078', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed045d79a0', 'dh_6a1ed045d6078', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045d8a87', 'dh_6a1ed045d8791', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045d8f1b', 'dh_6a1ed045d8d5c', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed045d95bc', 'dh_6a1ed045d9385', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045d98bb', 'dh_6a1ed045d9385', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed045d9f6b', 'dh_6a1ed045d9d65', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed045da302', 'dh_6a1ed045d9d65', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045da5ab', 'dh_6a1ed045d9d65', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045da87f', 'dh_6a1ed045d9d65', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed045dae54', 'dh_6a1ed045dac76', 'bt_6a17ca3f41c25_8343', 1, 1520000),
('ctdh_6a1ed045db66c', 'dh_6a1ed045dac76', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed045dbedf', 'dh_6a1ed045dac76', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed045dc622', 'dh_6a1ed045dac76', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045dda2b', 'dh_6a1ed045dd59b', 'bt_6a17ca3f3a780_2488', 3, 1170000),
('ctdh_6a1ed045ddda2', 'dh_6a1ed045dd59b', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed045de158', 'dh_6a1ed045dd59b', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045debe9', 'dh_6a1ed045de82c', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed045defc1', 'dh_6a1ed045de82c', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed045df384', 'dh_6a1ed045de82c', 'bt_6a17ca3f352d2_7083', 1, 1520000),
('ctdh_6a1ed045dfc82', 'dh_6a1ed045dfaca', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed045dff67', 'dh_6a1ed045dfaca', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed045e0220', 'dh_6a1ed045dfaca', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045e0651', 'dh_6a1ed045dfaca', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed045e1349', 'dh_6a1ed045e0efa', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed045e16f1', 'dh_6a1ed045e0efa', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045e1a8f', 'dh_6a1ed045e0efa', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045e24df', 'dh_6a1ed045e2102', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed045e2c7f', 'dh_6a1ed045e2102', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed045e33eb', 'dh_6a1ed045e2102', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045e3e50', 'dh_6a1ed045e3c9c', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045e462b', 'dh_6a1ed045e441b', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed045e491a', 'dh_6a1ed045e441b', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed045e4c11', 'dh_6a1ed045e441b', 'bt_6a17ca3f3db8f_3782', 2, 1140000),
('ctdh_6a1ed045e4eb8', 'dh_6a1ed045e441b', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed045e560c', 'dh_6a1ed045e5229', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045e5cf3', 'dh_6a1ed045e5229', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed045e6444', 'dh_6a1ed045e5229', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045e6940', 'dh_6a1ed045e5229', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed045e6f33', 'dh_6a1ed045e6d88', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed045e71b7', 'dh_6a1ed045e6d88', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed045e746e', 'dh_6a1ed045e6d88', 'bt_6a17ca3f3413a_2487', 2, 1350000),
('ctdh_6a1ed045e77d5', 'dh_6a1ed045e6d88', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045e7df6', 'dh_6a1ed045e7c0d', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045e8ca8', 'dh_6a1ed045e88ea', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045ea0eb', 'dh_6a1ed045e97d0', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed045ea604', 'dh_6a1ed045e97d0', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed045ea921', 'dh_6a1ed045e97d0', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed045eac5f', 'dh_6a1ed045e97d0', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045ebba9', 'dh_6a1ed045eb7c1', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed045ec852', 'dh_6a1ed045ec498', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed045ed54d', 'dh_6a1ed045ed1dc', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed045edca4', 'dh_6a1ed045ed1dc', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045edfcc', 'dh_6a1ed045ed1dc', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed045ee2ba', 'dh_6a1ed045ed1dc', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045ee94a', 'dh_6a1ed045ee74c', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed045eecb6', 'dh_6a1ed045ee74c', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045ef021', 'dh_6a1ed045ee74c', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed045efa2c', 'dh_6a1ed045ef64d', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed045f00e4', 'dh_6a1ed045ef64d', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed045f07ad', 'dh_6a1ed045ef64d', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed045f14aa', 'dh_6a1ed045f1127', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed045f248e', 'dh_6a1ed045f20ad', 'bt_6a17ca3f3c903_3115', 1, 1520000),
('ctdh_6a1ed045f2788', 'dh_6a1ed045f20ad', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed045f29e3', 'dh_6a1ed045f20ad', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045f2bf2', 'dh_6a1ed045f20ad', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed045f34a9', 'dh_6a1ed045f3104', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed045f3c08', 'dh_6a1ed045f3104', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed0460008c', 'dh_6a1ed045f3104', 'bt_6a17ca3f40a17_2289', 2, 680000),
('ctdh_6a1ed04600ec0', 'dh_6a1ed04600ac0', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0460197f', 'dh_6a1ed04601796', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04601bd1', 'dh_6a1ed04601796', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed0460297b', 'dh_6a1ed046025b5', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed046030f8', 'dh_6a1ed046025b5', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed04603fc3', 'dh_6a1ed04603b9c', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed0460472f', 'dh_6a1ed04603b9c', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04604e7f', 'dh_6a1ed04603b9c', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed046055eb', 'dh_6a1ed04603b9c', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed046064bd', 'dh_6a1ed04606098', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04606994', 'dh_6a1ed04606098', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04606eb6', 'dh_6a1ed04606cd2', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04606fef', 'dh_6a1ed04606cd2', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed04607110', 'dh_6a1ed04606cd2', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0460724a', 'dh_6a1ed04606cd2', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0460760f', 'dh_6a1ed0460747c', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0460771f', 'dh_6a1ed0460747c', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed046080bc', 'dh_6a1ed04607d1b', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04609270', 'dh_6a1ed04607d1b', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0460963b', 'dh_6a1ed04607d1b', 'bt_6a17ca3f3eece_6613', 2, 1520000),
('ctdh_6a1ed046099a8', 'dh_6a1ed04607d1b', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed0460a057', 'dh_6a1ed04609eab', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0460a3f2', 'dh_6a1ed0460a278', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed0460a641', 'dh_6a1ed0460a278', 'bt_6a17ca3f43353_5705', 1, 1510000),
('ctdh_6a1ed0460aae0', 'dh_6a1ed0460a278', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0460b1d6', 'dh_6a1ed0460a278', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0460bfd3', 'dh_6a1ed0460bbf6', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0460c2fd', 'dh_6a1ed0460bbf6', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0460cdd8', 'dh_6a1ed0460c972', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed0460d525', 'dh_6a1ed0460c972', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed0460e187', 'dh_6a1ed0460dfc8', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0460e410', 'dh_6a1ed0460dfc8', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed0460f015', 'dh_6a1ed0460ebea', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0460f885', 'dh_6a1ed0460ebea', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed04610132', 'dh_6a1ed0460ebea', 'bt_6a17ca3f352d2_7083', 3, 1520000),
('ctdh_6a1ed046109f9', 'dh_6a1ed0460ebea', 'bt_6a17ca3f352d2_7083', 2, 1520000),
('ctdh_6a1ed046118d3', 'dh_6a1ed04611460', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04612047', 'dh_6a1ed04611460', 'bt_6a17ca3f45a76_9908', 1, 1790000),
('ctdh_6a1ed046127f2', 'dh_6a1ed04611460', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04612e1c', 'dh_6a1ed04612c64', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed046130a4', 'dh_6a1ed04612c64', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed046135d2', 'dh_6a1ed046133fd', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0461393e', 'dh_6a1ed046133fd', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04613c02', 'dh_6a1ed046133fd', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed046149dc', 'dh_6a1ed04614661', 'bt_6a17ca3f39289_9497', 2, 960000),
('ctdh_6a1ed04615098', 'dh_6a1ed04614661', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0461579f', 'dh_6a1ed04614661', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04616392', 'dh_6a1ed046161ea', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed046164a5', 'dh_6a1ed046161ea', 'bt_6a17ca3f34555_1778', 1, 1350000);
INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_bien_the`, `so_luong`, `don_gia`) VALUES
('ctdh_6a1ed046165b2', 'dh_6a1ed046161ea', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed046166b8', 'dh_6a1ed046161ea', 'bt_6a17ca3f41d81_7284', 2, 1520000),
('ctdh_6a1ed04616ae5', 'dh_6a1ed0461696a', 'bt_6a17ca3f37bf0_7610', 2, 1350000),
('ctdh_6a1ed04616bff', 'dh_6a1ed0461696a', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed0461705b', 'dh_6a1ed04616eca', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed046176cb', 'dh_6a1ed04616eca', 'bt_6a17ca3f36705_1246', 2, 1410000),
('ctdh_6a1ed04618402', 'dh_6a1ed04618090', 'bt_6a17ca3f4151f_8482', 2, 1070000),
('ctdh_6a1ed0461889d', 'dh_6a1ed04618090', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04618b33', 'dh_6a1ed04618090', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed04618de6', 'dh_6a1ed04618090', 'bt_6a17ca3f356ff_3946', 3, 1520000),
('ctdh_6a1ed046192d7', 'dh_6a1ed0461914f', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0461942c', 'dh_6a1ed0461914f', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04619779', 'dh_6a1ed04619609', 'bt_6a17ca3f3624c_2637', 2, 1410000),
('ctdh_6a1ed04619a3a', 'dh_6a1ed04619609', 'bt_6a17ca3f39289_9497', 2, 960000),
('ctdh_6a1ed04619c4c', 'dh_6a1ed04619609', 'bt_6a17ca3f37bf0_7610', 1, 1350000),
('ctdh_6a1ed04619e6b', 'dh_6a1ed04619609', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0461a2c8', 'dh_6a1ed0461a169', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0461a766', 'dh_6a1ed0461a169', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed0461a9ab', 'dh_6a1ed0461a169', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0461afc4', 'dh_6a1ed0461ad85', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0461bc40', 'dh_6a1ed0461b8f9', 'bt_6a17ca3f34956_1505', 1, 1350000),
('ctdh_6a1ed0461c60e', 'dh_6a1ed0461c28e', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0461c987', 'dh_6a1ed0461c28e', 'bt_6a17ca3f3a780_2488', 2, 1170000),
('ctdh_6a1ed0461d34d', 'dh_6a1ed0461cfdd', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0461d77d', 'dh_6a1ed0461cfdd', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed0461d9a6', 'dh_6a1ed0461cfdd', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed0461dc25', 'dh_6a1ed0461cfdd', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed0461e446', 'dh_6a1ed0461e033', 'bt_6a17ca3f3fe6d_9123', 1, 1310000),
('ctdh_6a1ed0461ebba', 'dh_6a1ed0461e033', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed0461f298', 'dh_6a1ed0461e033', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04620088', 'dh_6a1ed0461fc91', 'bt_6a17ca3f35fd8_5708', 2, 1410000),
('ctdh_6a1ed046203ba', 'dh_6a1ed0461fc91', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04620717', 'dh_6a1ed0461fc91', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04621139', 'dh_6a1ed04620dac', 'bt_6a17ca3f36ee0_2672', 1, 1510000),
('ctdh_6a1ed0462162c', 'dh_6a1ed04620dac', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed046218c1', 'dh_6a1ed04620dac', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04621b22', 'dh_6a1ed04620dac', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed04622400', 'dh_6a1ed04622065', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04622a53', 'dh_6a1ed04622065', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed04623131', 'dh_6a1ed04622065', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed04623e92', 'dh_6a1ed04623aed', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04624e1d', 'dh_6a1ed04624919', 'bt_6a17ca3f34555_1778', 2, 1350000),
('ctdh_6a1ed04624f7e', 'dh_6a1ed04624919', 'bt_6a17ca3f38210_9526', 1, 1350000),
('ctdh_6a1ed046250c8', 'dh_6a1ed04624919', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed046251f3', 'dh_6a1ed04624919', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed04625634', 'dh_6a1ed046254a8', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04625b29', 'dh_6a1ed046254a8', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed046261a8', 'dh_6a1ed046254a8', 'bt_6a17ca3f3ab4f_3277', 2, 1170000),
('ctdh_6a1ed04626870', 'dh_6a1ed046254a8', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed046275e1', 'dh_6a1ed04627204', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04627c75', 'dh_6a1ed04627204', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04628347', 'dh_6a1ed04627204', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed046289ed', 'dh_6a1ed04627204', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed04629587', 'dh_6a1ed046293ac', 'bt_6a17ca3f356ff_3946', 2, 1520000),
('ctdh_6a1ed046298a9', 'dh_6a1ed046293ac', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed04629e8b', 'dh_6a1ed04629c0f', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed0462adf7', 'dh_6a1ed0462a9d0', 'bt_6a17ca3f3df49_2169', 2, 1140000),
('ctdh_6a1ed0462b804', 'dh_6a1ed0462b473', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0462be8a', 'dh_6a1ed0462b473', 'bt_6a17ca3f3648f_7582', 3, 1410000),
('ctdh_6a1ed0462c8c5', 'dh_6a1ed0462c735', 'bt_6a17ca3f372d5_2690', 2, 1510000),
('ctdh_6a1ed0462c9f0', 'dh_6a1ed0462c735', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0462d1c2', 'dh_6a1ed0462ce49', 'bt_6a17ca3f34555_1778', 1, 1350000),
('ctdh_6a1ed0462dc3e', 'dh_6a1ed0462d820', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed0462e33f', 'dh_6a1ed0462d820', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0462f0b1', 'dh_6a1ed0462ece2', 'bt_6a17ca3f42208_2267', 1, 1410000),
('ctdh_6a1ed0462f827', 'dh_6a1ed0462ece2', 'bt_6a17ca3f35b27_1230', 1, 1520000),
('ctdh_6a1ed0462ff19', 'dh_6a1ed0462ece2', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04630cff', 'dh_6a1ed046308ee', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed046313c1', 'dh_6a1ed04631248', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed046315e1', 'dh_6a1ed04631248', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed046317f6', 'dh_6a1ed04631248', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed04631aa9', 'dh_6a1ed04631248', 'bt_6a17ca3f3413a_2487', 3, 1350000),
('ctdh_6a1ed04631fd9', 'dh_6a1ed04631e22', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed04632285', 'dh_6a1ed04631e22', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed046324c4', 'dh_6a1ed04631e22', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04632916', 'dh_6a1ed04631e22', 'bt_6a17ca3f31dac_1378', 1, 1020000),
('ctdh_6a1ed04632fd4', 'dh_6a1ed04632e56', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed04633210', 'dh_6a1ed04632e56', 'bt_6a17ca3f35fd8_5708', 1, 1410000),
('ctdh_6a1ed0463351a', 'dh_6a1ed04632e56', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0463388e', 'dh_6a1ed04632e56', 'bt_6a17ca3f42c4f_2357', 3, 1510000),
('ctdh_6a1ed04634214', 'dh_6a1ed04633e9d', 'bt_6a17ca3f372d5_2690', 1, 1510000),
('ctdh_6a1ed04634f2d', 'dh_6a1ed04634b88', 'bt_6a17ca3f35fd8_5708', 3, 1410000),
('ctdh_6a1ed04635576', 'dh_6a1ed04634b88', 'bt_6a17ca3f38210_9526', 2, 1350000),
('ctdh_6a1ed04636262', 'dh_6a1ed04635eb1', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04636b80', 'dh_6a1ed04636827', 'bt_6a17ca3f396f6_4341', 3, 960000),
('ctdh_6a1ed04636fa8', 'dh_6a1ed04636827', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed04637569', 'dh_6a1ed0463737f', 'bt_6a17ca3f34956_1505', 1, 1350000),
('ctdh_6a1ed046377fb', 'dh_6a1ed0463737f', 'bt_6a17ca3f3343d_7665', 3, 810000),
('ctdh_6a1ed046382f7', 'dh_6a1ed04637f44', 'bt_6a17ca3f3648f_7582', 2, 1410000),
('ctdh_6a1ed0463895f', 'dh_6a1ed04637f44', 'bt_6a17ca3f387f9_5857', 3, 1350000),
('ctdh_6a1ed04638f93', 'dh_6a1ed04637f44', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed04639601', 'dh_6a1ed04637f44', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0463a195', 'dh_6a1ed04639ffb', 'bt_6a17ca3f3a3c8_9509', 1, 1170000),
('ctdh_6a1ed0463a3db', 'dh_6a1ed04639ffb', 'bt_6a17ca3f34555_1778', 1, 1350000),
('ctdh_6a1ed0463abc7', 'dh_6a1ed0463a78a', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed0463b21d', 'dh_6a1ed0463a78a', 'bt_6a17ca3f3c6b9_8385', 3, 1520000),
('ctdh_6a1ed0463b8c2', 'dh_6a1ed0463a78a', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0463bf79', 'dh_6a1ed0463a78a', 'bt_6a17ca3f33d03_1597', 1, 1350000),
('ctdh_6a1ed0463cc2f', 'dh_6a1ed0463c8a8', 'bt_6a17ca3f356ff_3946', 1, 1520000),
('ctdh_6a1ed0463cf42', 'dh_6a1ed0463c8a8', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0463d260', 'dh_6a1ed0463c8a8', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0463dbec', 'dh_6a1ed0463d830', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0463e25d', 'dh_6a1ed0463d830', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed0463e94b', 'dh_6a1ed0463e7b9', 'bt_6a17ca3f3648f_7582', 1, 1410000),
('ctdh_6a1ed0463ecaf', 'dh_6a1ed0463eb49', 'bt_6a17ca3f33d03_1597', 2, 1350000),
('ctdh_6a1ed0463eef8', 'dh_6a1ed0463eb49', 'bt_6a17ca3f31dac_1378', 2, 1020000),
('ctdh_6a1ed0463f4f2', 'dh_6a1ed0463eb49', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0464020f', 'dh_6a1ed0463fe82', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0464084a', 'dh_6a1ed0463fe82', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed046412c0', 'dh_6a1ed04641106', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed04641565', 'dh_6a1ed04641106', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed046417dd', 'dh_6a1ed04641106', 'bt_6a17ca3f3a3c8_9509', 2, 1170000),
('ctdh_6a1ed04641a35', 'dh_6a1ed04641106', 'bt_6a17ca3f39289_9497', 3, 960000),
('ctdh_6a1ed046425c0', 'dh_6a1ed0464224f', 'bt_6a17ca3f3624c_2637', 3, 1410000),
('ctdh_6a1ed04642c38', 'dh_6a1ed0464224f', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed046432f9', 'dh_6a1ed0464224f', 'bt_6a17ca3f396f6_4341', 1, 960000),
('ctdh_6a1ed0464392d', 'dh_6a1ed0464224f', 'bt_6a17ca3f33d03_1597', 3, 1350000),
('ctdh_6a1ed046445f6', 'dh_6a1ed0464424e', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed0464495d', 'dh_6a1ed0464424e', 'bt_6a17ca3f39289_9497', 1, 960000),
('ctdh_6a1ed046452c1', 'dh_6a1ed04644f5d', 'bt_6a17ca3f387f9_5857', 2, 1350000),
('ctdh_6a1ed04645584', 'dh_6a1ed04644f5d', 'bt_6a17ca3f32f2c_1814', 2, 810000),
('ctdh_6a1ed04645823', 'dh_6a1ed04644f5d', 'bt_6a17ca3f31b18_5076', 1, 1020000),
('ctdh_6a1ed046464a1', 'dh_6a1ed046460cb', 'bt_6a17ca3f3cd6a_2743', 3, 790000),
('ctdh_6a1ed046471ac', 'dh_6a1ed04646e0f', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed046474dc', 'dh_6a1ed04646e0f', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed04648e26', 'dh_6a1ed046489b9', 'bt_6a17ca3f35b27_1230', 3, 1520000),
('ctdh_6a1ed04649152', 'dh_6a1ed046489b9', 'bt_6a17ca3f36705_1246', 3, 1410000),
('ctdh_6a1ed046494a5', 'dh_6a1ed046489b9', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed046495bf', 'dh_6a1ed046489b9', 'bt_6a17ca3f442b1_3626', 2, 1350000),
('ctdh_6a1ed04649967', 'dh_6a1ed046497e1', 'bt_6a17ca3f32ac5_4697', 3, 810000),
('ctdh_6a1ed04649ee5', 'dh_6a1ed04649d41', 'bt_6a17ca3f31dac_1378', 3, 1020000),
('ctdh_6a1ed0464ad09', 'dh_6a1ed0464a8ef', 'bt_6a17ca3f38210_9526', 3, 1350000),
('ctdh_6a1ed0464b33a', 'dh_6a1ed0464a8ef', 'bt_6a17ca3f32ac5_4697', 1, 810000),
('ctdh_6a1ed0464c246', 'dh_6a1ed0464be6c', 'bt_6a17ca3f3343d_7665', 1, 810000),
('ctdh_6a1ed0464c5dd', 'dh_6a1ed0464be6c', 'bt_6a17ca3f42542_6921', 3, 1410000),
('ctdh_6a1ed0464d016', 'dh_6a1ed0464cca3', 'bt_6a17ca3f3a780_2488', 1, 1170000),
('ctdh_6a1ed0464d3a4', 'dh_6a1ed0464cca3', 'bt_6a17ca3f32f2c_1814', 1, 810000),
('ctdh_6a1ed0464da4f', 'dh_6a1ed0464d831', 'bt_6a17ca3f3343d_7665', 2, 810000),
('ctdh_6a1ed0464dcbc', 'dh_6a1ed0464d831', 'bt_6a17ca3f34956_1505', 3, 1350000),
('ctdh_6a1ed0464e4f5', 'dh_6a1ed0464d831', 'bt_6a17ca3f31b18_5076', 3, 1020000),
('ctdh_6a1ed0464f2ba', 'dh_6a1ed0464ef4b', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed0464f64f', 'dh_6a1ed0464ef4b', 'bt_6a17ca3f31802_4999', 3, 1020000),
('ctdh_6a1ed046500d8', 'dh_6a1ed0464fd1d', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed046507dd', 'dh_6a1ed0464fd1d', 'bt_6a17ca3f31802_4999', 2, 1020000),
('ctdh_6a1ed04650ec9', 'dh_6a1ed0464fd1d', 'bt_6a17ca3f31b18_5076', 2, 1020000),
('ctdh_6a1ed04651545', 'dh_6a1ed0464fd1d', 'bt_6a17ca3f36ee0_2672', 3, 1510000),
('ctdh_6a1ed04651c68', 'dh_6a1ed04651a63', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed04651ed0', 'dh_6a1ed04651a63', 'bt_6a17ca3f39b7a_1941', 2, 960000),
('ctdh_6a1ed046522d3', 'dh_6a1ed04651a63', 'bt_6a17ca3f31802_4999', 1, 1020000),
('ctdh_6a1ed046528de', 'dh_6a1ed04651a63', 'bt_6a17ca3f32f2c_1814', 3, 810000),
('ctdh_6a1ed0465363b', 'dh_6a1ed04653194', 'bt_6a17ca3f32ac5_4697', 2, 810000),
('ctdh_6a1ed04653960', 'dh_6a1ed04653194', 'bt_6a17ca3f34956_1505', 2, 1350000),
('ctdh_6a2111f01bde0', 'dh_6a2111f01b8b2', 'bt_6a17ca3f36ee0_2672', 1, 1283500);

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
('ce41c426-5cab-11f1-962c-088fc37729cd', 'ce3db77d-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f3a780_2488', NULL, 58, 60, 2, 770000.00, 1540000.00, '', NULL, 'Có chênh lệch'),
('ct_6a1ed26ee0482', 'kk_6a1ed26edff61', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eaced9', 28, 26, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee0893', 'kk_6a1ed26edff61', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead433', 39, 41, 2, 420000.00, 840000.00, NULL, NULL, '1'),
('ct_6a1ed26ee0a18', 'kk_6a1ed26edff61', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead9ff', 32, 34, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee0ba5', 'kk_6a1ed26edff61', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead2f8', 38, 40, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee0d3f', 'kk_6a1ed26edff61', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead433', 24, 22, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee0e94', 'kk_6a1ed26edff61', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eaced9', 34, 35, 1, 910000.00, 910000.00, NULL, NULL, '1'),
('ct_6a1ed26ee1019', 'kk_6a1ed26edff61', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead1a8', 15, 15, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee116d', 'kk_6a1ed26edff61', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead2f8', 34, 33, -1, 1050000.00, -1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ee12ae', 'kk_6a1ed26edff61', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead6c3', 44, 44, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee18ed', 'kk_6a1ed26ee1576', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead1a8', 24, 25, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ee1d9b', 'kk_6a1ed26ee1576', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead6c3', 29, 29, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee1ec5', 'kk_6a1ed26ee1576', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead433', 18, 19, 1, 210000.00, 210000.00, NULL, NULL, '1'),
('ct_6a1ed26ee1fea', 'kk_6a1ed26ee1576', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead2f8', 19, 17, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2102', 'kk_6a1ed26ee1576', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26eadee3', 15, 14, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2228', 'kk_6a1ed26ee1576', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead1a8', 11, 12, 1, 1120000.00, 1120000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2470', 'kk_6a1ed26ee1576', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead6c3', 28, 27, -1, 1050000.00, -1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ee272d', 'kk_6a1ed26ee2582', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26eaced9', 36, 38, 2, 210000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2858', 'kk_6a1ed26ee2582', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead9ff', 22, 20, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2979', 'kk_6a1ed26ee2582', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead2f8', 20, 18, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2c2c', 'kk_6a1ed26ee2582', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26eaced9', 44, 46, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee2de3', 'kk_6a1ed26ee2582', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead2f8', 22, 22, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee2f83', 'kk_6a1ed26ee2582', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead6c3', 47, 45, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee30da', 'kk_6a1ed26ee2582', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead6c3', 26, 25, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26ee3234', 'kk_6a1ed26ee2582', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eadb74', 43, 44, 1, 910000.00, 910000.00, NULL, NULL, '1'),
('ct_6a1ed26ee339f', 'kk_6a1ed26ee2582', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead2f8', 16, 16, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee3837', 'kk_6a1ed26ee3490', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadb74', 40, 38, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee3b83', 'kk_6a1ed26ee3490', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead56c', 42, 42, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee3eca', 'kk_6a1ed26ee3490', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead8d9', 19, 17, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee4217', 'kk_6a1ed26ee3490', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead2f8', 30, 28, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee455c', 'kk_6a1ed26ee3490', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead1a8', 14, 15, 1, 420000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee468c', 'kk_6a1ed26ee3490', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead433', 30, 30, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee47e8', 'kk_6a1ed26ee3490', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eadee3', 42, 44, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee4a5e', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead433', 16, 15, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26ee4b7c', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eadb74', 33, 34, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ee4e8f', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead6c3', 43, 41, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee51c0', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead9ff', 43, 44, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ee5515', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead9ff', 34, 33, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26ee5845', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead433', 16, 14, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee5b9d', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead9ff', 23, 22, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26ee5eae', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eadb74', 31, 31, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee61cc', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead8d9', 46, 46, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee64e1', 'kk_6a1ed26ee48d4', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead2f8', 10, 12, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee6971', 'kk_6a1ed26ee67ae', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26eadb74', 15, 17, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee6ad7', 'kk_6a1ed26ee67ae', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead6c3', 48, 48, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee6c09', 'kk_6a1ed26ee67ae', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead8d9', 43, 41, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee6d6b', 'kk_6a1ed26ee67ae', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead56c', 38, 36, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee6eac', 'kk_6a1ed26ee67ae', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead433', 50, 52, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee6fca', 'kk_6a1ed26ee67ae', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead433', 48, 47, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26ee7631', 'kk_6a1ed26ee7292', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26eaced9', 22, 23, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ee79a6', 'kk_6a1ed26ee7292', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead2f8', 17, 17, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee7d92', 'kk_6a1ed26ee7292', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead9ff', 39, 37, -2, 1120000.00, -2240000.00, NULL, NULL, '1'),
('ct_6a1ed26ee8114', 'kk_6a1ed26ee7292', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26eadee3', 47, 48, 1, 210000.00, 210000.00, NULL, NULL, '1'),
('ct_6a1ed26ee8446', 'kk_6a1ed26ee7292', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead56c', 11, 11, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee875c', 'kk_6a1ed26ee7292', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead433', 34, 36, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee8b92', 'kk_6a1ed26ee7292', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eadb74', 50, 49, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26ee8cd0', 'kk_6a1ed26ee7292', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26eadee3', 41, 39, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee8ffe', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26eadb74', 49, 49, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ee9166', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eadb74', 14, 16, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee92da', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead8d9', 24, 23, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee9425', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead56c', 16, 14, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee957c', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead2f8', 18, 17, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26ee96b4', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead433', 35, 37, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ee97e1', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26eaced9', 31, 30, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26ee9916', 'kk_6a1ed26ee8e44', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead8d9', 48, 46, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ee9d40', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26eadee3', 39, 41, 2, 420000.00, 840000.00, NULL, NULL, '1'),
('ct_6a1ed26eea009', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead9ff', 49, 49, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eea319', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead2f8', 40, 38, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eea624', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eaced9', 16, 16, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eea758', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead9ff', 36, 38, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26eea884', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead2f8', 43, 43, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eea98c', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead8d9', 39, 39, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eeaab2', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead8d9', 40, 39, -1, 1050000.00, -1050000.00, NULL, NULL, '1'),
('ct_6a1ed26eeabdc', 'kk_6a1ed26ee99e6', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead6c3', 39, 39, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eeaec8', 'kk_6a1ed26eeace1', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead6c3', 41, 39, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26eeb031', 'kk_6a1ed26eeace1', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead6c3', 31, 31, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eeb16f', 'kk_6a1ed26eeace1', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead8d9', 44, 45, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26eeb2c3', 'kk_6a1ed26eeace1', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead6c3', 28, 26, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26eeb403', 'kk_6a1ed26eeace1', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead433', 31, 29, -2, 420000.00, -840000.00, NULL, NULL, '1'),
('ct_6a1ed26eeb75c', 'kk_6a1ed26eeace1', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead433', 47, 48, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26eeb8b4', 'kk_6a1ed26eeace1', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead9ff', 34, 33, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eebb2f', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead2f8', 38, 38, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eebc4c', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eadee3', 34, 36, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26eebd5b', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead9ff', 36, 36, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eebe68', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead8d9', 40, 41, 1, 910000.00, 910000.00, NULL, NULL, '1'),
('ct_6a1ed26eebf6f', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead2f8', 34, 32, -2, 420000.00, -840000.00, NULL, NULL, '1'),
('ct_6a1ed26eec075', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead8d9', 31, 31, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eec1c1', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead433', 30, 28, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eec2ee', 'kk_6a1ed26eeb99d', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead2f8', 31, 31, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eec56d', 'kk_6a1ed26eec3e3', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead433', 46, 45, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26eec6ac', 'kk_6a1ed26eec3e3', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead9ff', 39, 38, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eec9f5', 'kk_6a1ed26eec3e3', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26eadb74', 24, 26, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26eecd34', 'kk_6a1ed26eec3e3', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadee3', 47, 46, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26eece8c', 'kk_6a1ed26eec3e3', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26eaced9', 22, 20, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26eed10f', 'kk_6a1ed26eecf85', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead9ff', 26, 26, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eed24b', 'kk_6a1ed26eecf85', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead2f8', 14, 15, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26eed378', 'kk_6a1ed26eecf85', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead8d9', 36, 37, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26eed4ac', 'kk_6a1ed26eecf85', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead9ff', 47, 46, -1, 1120000.00, -1120000.00, NULL, NULL, '1'),
('ct_6a1ed26eed5da', 'kk_6a1ed26eecf85', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26eaced9', 18, 20, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26eed6f4', 'kk_6a1ed26eecf85', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead433', 42, 43, 1, 210000.00, 210000.00, NULL, NULL, '1'),
('ct_6a1ed26eed80c', 'kk_6a1ed26eecf85', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead6c3', 50, 49, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eeda67', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead56c', 19, 19, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eedba5', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead6c3', 18, 20, 2, 210000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26eedcfc', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead6c3', 50, 48, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26eede25', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26eadb74', 21, 23, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26eedf46', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead56c', 30, 30, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eee261', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead6c3', 33, 35, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26eee409', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead56c', 48, 49, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26eee5c7', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead8d9', 33, 32, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eee710', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26eaced9', 14, 14, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eee84e', 'kk_6a1ed26eed8e5', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eadb74', 40, 42, 2, 210000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26eeeafb', 'kk_6a1ed26eee952', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead9ff', 42, 42, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eeec27', 'kk_6a1ed26eee952', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead2f8', 47, 49, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26eeef68', 'kk_6a1ed26eee952', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eaced9', 47, 49, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26eef24a', 'kk_6a1ed26eee952', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead433', 16, 14, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26eef582', 'kk_6a1ed26eee952', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead8d9', 18, 18, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eef88b', 'kk_6a1ed26eee952', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead6c3', 44, 44, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26eefb7d', 'kk_6a1ed26eee952', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26eaced9', 20, 22, 2, 420000.00, 840000.00, NULL, NULL, '1'),
('ct_6a1ed26eefcd7', 'kk_6a1ed26eee952', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead1a8', 40, 42, 2, 420000.00, 840000.00, NULL, NULL, '1'),
('ct_6a1ed26eefe21', 'kk_6a1ed26eee952', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead6c3', 48, 47, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26eeff6f', 'kk_6a1ed26eee952', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead1a8', 37, 35, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ef0208', 'kk_6a1ed26ef0060', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead56c', 21, 22, 1, 420000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26ef0327', 'kk_6a1ed26ef0060', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26eaced9', 40, 38, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26ef0444', 'kk_6a1ed26ef0060', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead1a8', 49, 50, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ef058a', 'kk_6a1ed26ef0060', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead2f8', 40, 39, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26ef070f', 'kk_6a1ed26ef0060', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead9ff', 36, 36, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef0870', 'kk_6a1ed26ef0060', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26eadb74', 27, 29, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26ef09ca', 'kk_6a1ed26ef0060', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26eaced9', 22, 20, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ef0b1b', 'kk_6a1ed26ef0060', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead6c3', 36, 37, 1, 1120000.00, 1120000.00, NULL, NULL, '1'),
('ct_6a1ed26ef0c9e', 'kk_6a1ed26ef0060', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead9ff', 34, 34, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef125b', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead2f8', 37, 37, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef1382', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead56c', 16, 16, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef14de', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead8d9', 19, 19, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef1641', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead9ff', 34, 36, 2, 420000.00, 840000.00, NULL, NULL, '1'),
('ct_6a1ed26ef186e', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead9ff', 31, 33, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26ef19d4', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead1a8', 11, 11, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef1b35', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead2f8', 41, 39, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ef1e85', 'kk_6a1ed26ef0d8c', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead1a8', 48, 49, 1, 1120000.00, 1120000.00, NULL, NULL, '1'),
('ct_6a1ed26ef253a', 'kk_6a1ed26ef218a', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead1a8', 13, 14, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ef287a', 'kk_6a1ed26ef218a', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eaced9', 25, 27, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26ef2d83', 'kk_6a1ed26ef218a', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead56c', 35, 33, -2, 420000.00, -840000.00, NULL, NULL, '1'),
('ct_6a1ed26ef2eb4', 'kk_6a1ed26ef218a', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26eadee3', 13, 13, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef2fcf', 'kk_6a1ed26ef218a', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26eadb74', 26, 27, 1, 910000.00, 910000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3100', 'kk_6a1ed26ef218a', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead6c3', 32, 31, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3282', 'kk_6a1ed26ef218a', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead2f8', 12, 13, 1, 1120000.00, 1120000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3540', 'kk_6a1ed26ef338d', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead2f8', 41, 42, 1, 1120000.00, 1120000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3692', 'kk_6a1ed26ef338d', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead1a8', 27, 26, -1, 1120000.00, -1120000.00, NULL, NULL, '1'),
('ct_6a1ed26ef37bb', 'kk_6a1ed26ef338d', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eadb74', 30, 31, 1, 910000.00, 910000.00, NULL, NULL, '1'),
('ct_6a1ed26ef38c7', 'kk_6a1ed26ef338d', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead8d9', 39, 38, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26ef39f8', 'kk_6a1ed26ef338d', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eadee3', 41, 42, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3b2e', 'kk_6a1ed26ef338d', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eaced9', 43, 43, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef3c6b', 'kk_6a1ed26ef338d', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eadb74', 26, 25, -1, 910000.00, -910000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3eb8', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead56c', 25, 27, 2, 1050000.00, 2100000.00, NULL, NULL, '1'),
('ct_6a1ed26ef3fef', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26eadee3', 34, 34, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26ef40f9', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead2f8', 25, 23, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26f001a3', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead56c', 24, 25, 1, 420000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26f004ca', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26eaced9', 38, 38, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f00619', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead56c', 15, 13, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26f00735', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead6c3', 48, 49, 1, 420000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26f0084a', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26eadee3', 48, 50, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f0096f', 'kk_6a1ed26ef3d3a', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead8d9', 37, 35, -2, 1120000.00, -2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f00be4', 'kk_6a1ed26f00a3e', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead8d9', 34, 33, -1, 1050000.00, -1050000.00, NULL, NULL, '1'),
('ct_6a1ed26f00d6e', 'kk_6a1ed26f00a3e', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead433', 33, 31, -2, 420000.00, -840000.00, NULL, NULL, '1'),
('ct_6a1ed26f00ee5', 'kk_6a1ed26f00a3e', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadb74', 34, 36, 2, 910000.00, 1820000.00, NULL, NULL, '1'),
('ct_6a1ed26f01058', 'kk_6a1ed26f00a3e', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead2f8', 25, 23, -2, 1120000.00, -2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f01194', 'kk_6a1ed26f00a3e', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead1a8', 18, 16, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26f012df', 'kk_6a1ed26f00a3e', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead56c', 12, 12, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f0158b', 'kk_6a1ed26f013c6', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26eaced9', 23, 21, -2, 1120000.00, -2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f016d1', 'kk_6a1ed26f013c6', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead6c3', 43, 42, -1, 420000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26f01af4', 'kk_6a1ed26f013c6', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead6c3', 41, 41, 0, 1050000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f01c0e', 'kk_6a1ed26f013c6', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead1a8', 16, 16, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f01d31', 'kk_6a1ed26f013c6', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead1a8', 24, 23, -1, 1120000.00, -1120000.00, NULL, NULL, '1'),
('ct_6a1ed26f01f75', 'kk_6a1ed26f01e18', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead8d9', 44, 42, -2, 1120000.00, -2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f02088', 'kk_6a1ed26f01e18', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead56c', 10, 11, 1, 210000.00, 210000.00, NULL, NULL, '1'),
('ct_6a1ed26f021b4', 'kk_6a1ed26f01e18', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead56c', 19, 19, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f022d8', 'kk_6a1ed26f01e18', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead56c', 44, 44, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f0242e', 'kk_6a1ed26f01e18', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26eadee3', 23, 24, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26f02685', 'kk_6a1ed26f01e18', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead56c', 15, 17, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f02801', 'kk_6a1ed26f01e18', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead9ff', 41, 42, 1, 210000.00, 210000.00, NULL, NULL, '1'),
('ct_6a1ed26f02b5a', 'kk_6a1ed26f01e18', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead2f8', 45, 45, 0, 420000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f02e60', 'kk_6a1ed26f01e18', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eadee3', 17, 16, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26f03190', 'kk_6a1ed26f01e18', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead9ff', 36, 37, 1, 420000.00, 420000.00, NULL, NULL, '1'),
('ct_6a1ed26f037b4', 'kk_6a1ed26f03436', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead1a8', 29, 31, 2, 420000.00, 840000.00, NULL, NULL, '1'),
('ct_6a1ed26f038d5', 'kk_6a1ed26f03436', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26eaced9', 17, 15, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26f039e5', 'kk_6a1ed26f03436', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead8d9', 16, 17, 1, 1050000.00, 1050000.00, NULL, NULL, '1'),
('ct_6a1ed26f03af4', 'kk_6a1ed26f03436', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead2f8', 28, 28, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f03c0b', 'kk_6a1ed26f03436', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead8d9', 22, 20, -2, 210000.00, -420000.00, NULL, NULL, '1'),
('ct_6a1ed26f03d0e', 'kk_6a1ed26f03436', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead8d9', 36, 37, 1, 210000.00, 210000.00, NULL, NULL, '1'),
('ct_6a1ed26f03e14', 'kk_6a1ed26f03436', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead9ff', 23, 25, 2, 1120000.00, 2240000.00, NULL, NULL, '1'),
('ct_6a1ed26f03f13', 'kk_6a1ed26f03436', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26eadee3', 21, 20, -1, 210000.00, -210000.00, NULL, NULL, '1'),
('ct_6a1ed26f04018', 'kk_6a1ed26f03436', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eaced9', 23, 24, 1, 910000.00, 910000.00, NULL, NULL, '1'),
('ct_6a1ed26f042b3', 'kk_6a1ed26f040df', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead9ff', 11, 9, -2, 1050000.00, -2100000.00, NULL, NULL, '1'),
('ct_6a1ed26f04407', 'kk_6a1ed26f040df', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadee3', 36, 36, 0, 910000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f04722', 'kk_6a1ed26f040df', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead9ff', 37, 37, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f0484b', 'kk_6a1ed26f040df', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead433', 21, 19, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26f0495b', 'kk_6a1ed26f040df', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead9ff', 32, 32, 0, 1120000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f04a99', 'kk_6a1ed26f040df', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead1a8', 20, 18, -2, 910000.00, -1820000.00, NULL, NULL, '1'),
('ct_6a1ed26f04bd7', 'kk_6a1ed26f040df', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead56c', 33, 33, 0, 210000.00, 0.00, NULL, NULL, '1'),
('ct_6a1ed26f04cfa', 'kk_6a1ed26f040df', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead433', 18, 18, 0, 1120000.00, 0.00, NULL, NULL, '1');

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
('ct_6a1ed26eaecbd', 'pn_6a1ed26eae64b', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead1a8', 35, 910000, NULL, 35, 0, NULL),
('ct_6a1ed26eaf150', 'pn_6a1ed26eae64b', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead6c3', 42, 210000, NULL, 42, 0, NULL),
('ct_6a1ed26eaf51e', 'pn_6a1ed26eae64b', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead433', 10, 910000, NULL, 10, 0, NULL),
('ct_6a1ed26eaf86e', 'pn_6a1ed26eae64b', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead2f8', 11, 1120000, NULL, 11, 0, NULL),
('ct_6a1ed26eb024f', 'pn_6a1ed26eb008e', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead433', 22, 1120000, NULL, 22, 0, NULL),
('ct_6a1ed26eb03a2', 'pn_6a1ed26eb008e', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead2f8', 31, 1120000, NULL, 31, 0, NULL),
('ct_6a1ed26eb0554', 'pn_6a1ed26eb008e', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead8d9', 33, 1120000, NULL, 33, 0, NULL),
('ct_6a1ed26eb066d', 'pn_6a1ed26eb008e', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead433', 20, 1050000, NULL, 20, 0, NULL),
('ct_6a1ed26eb0776', 'pn_6a1ed26eb008e', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead6c3', 32, 910000, NULL, 32, 0, NULL),
('ct_6a1ed26eb0eab', 'pn_6a1ed26eb0b55', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead56c', 36, 210000, NULL, 36, 0, NULL),
('ct_6a1ed26eb11ae', 'pn_6a1ed26eb0b55', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead9ff', 18, 1050000, NULL, 18, 0, NULL),
('ct_6a1ed26eb12f8', 'pn_6a1ed26eb0b55', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead56c', 25, 1050000, NULL, 25, 0, NULL),
('ct_6a1ed26eb1829', 'pn_6a1ed26eb1606', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead8d9', 21, 910000, NULL, 21, 0, NULL),
('ct_6a1ed26eb1950', 'pn_6a1ed26eb1606', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26eadee3', 39, 1050000, NULL, 39, 0, NULL),
('ct_6a1ed26eb1fa0', 'pn_6a1ed26eb1b87', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead56c', 15, 420000, NULL, 15, 0, NULL),
('ct_6a1ed26eb2375', 'pn_6a1ed26eb1b87', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead9ff', 44, 910000, NULL, 44, 0, NULL),
('ct_6a1ed26eb2f84', 'pn_6a1ed26eb2b89', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead8d9', 33, 1050000, NULL, 33, 0, NULL),
('ct_6a1ed26eb32e3', 'pn_6a1ed26eb2b89', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead8d9', 19, 910000, NULL, 19, 0, NULL),
('ct_6a1ed26eb36c3', 'pn_6a1ed26eb2b89', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eadee3', 49, 910000, NULL, 49, 0, NULL),
('ct_6a1ed26eb3bd0', 'pn_6a1ed26eb3a33', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead433', 19, 1120000, NULL, 19, 0, NULL),
('ct_6a1ed26eb3cf9', 'pn_6a1ed26eb3a33', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead6c3', 26, 1050000, NULL, 26, 0, NULL),
('ct_6a1ed26eb3eb5', 'pn_6a1ed26eb3a33', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead56c', 49, 210000, NULL, 49, 0, NULL),
('ct_6a1ed26eb47b5', 'pn_6a1ed26eb4413', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead56c', 34, 1120000, NULL, 34, 0, NULL),
('ct_6a1ed26eb4ba6', 'pn_6a1ed26eb4413', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead9ff', 12, 910000, NULL, 12, 0, NULL),
('ct_6a1ed26eb4ed1', 'pn_6a1ed26eb4413', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead2f8', 31, 910000, NULL, 31, 0, NULL),
('ct_6a1ed26eb52ec', 'pn_6a1ed26eb4413', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26eaced9', 39, 1050000, NULL, 39, 0, NULL),
('ct_6a1ed26eb5705', 'pn_6a1ed26eb4413', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead6c3', 40, 1120000, NULL, 40, 0, NULL),
('ct_6a1ed26eb63a7', 'pn_6a1ed26eb5ea6', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead8d9', 30, 420000, NULL, 30, 0, NULL),
('ct_6a1ed26eb679a', 'pn_6a1ed26eb5ea6', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26eaced9', 23, 1050000, NULL, 23, 0, NULL),
('ct_6a1ed26eb6ae3', 'pn_6a1ed26eb5ea6', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead9ff', 21, 420000, NULL, 21, 0, NULL),
('ct_6a1ed26eb6e27', 'pn_6a1ed26eb5ea6', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead433', 20, 420000, NULL, 20, 0, NULL),
('ct_6a1ed26eb71e7', 'pn_6a1ed26eb5ea6', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadee3', 12, 910000, NULL, 12, 0, NULL),
('ct_6a1ed26eb782a', 'pn_6a1ed26eb769d', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead1a8', 22, 910000, NULL, 22, 0, NULL),
('ct_6a1ed26eb793d', 'pn_6a1ed26eb769d', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead433', 46, 1050000, NULL, 46, 0, NULL),
('ct_6a1ed26eb7c7c', 'pn_6a1ed26eb7b17', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead6c3', 39, 1050000, NULL, 39, 0, NULL),
('ct_6a1ed26eb7f8f', 'pn_6a1ed26eb7b17', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead433', 21, 1120000, NULL, 21, 0, NULL),
('ct_6a1ed26eb82c0', 'pn_6a1ed26eb7b17', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead9ff', 47, 910000, NULL, 47, 0, NULL),
('ct_6a1ed26eb8604', 'pn_6a1ed26eb7b17', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead433', 32, 1120000, NULL, 32, 0, NULL),
('ct_6a1ed26eb8983', 'pn_6a1ed26eb7b17', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26eadee3', 15, 910000, NULL, 15, 0, NULL),
('ct_6a1ed26eb92ea', 'pn_6a1ed26eb8f98', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead1a8', 45, 910000, NULL, 45, 0, NULL),
('ct_6a1ed26eb95ff', 'pn_6a1ed26eb8f98', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead1a8', 50, 910000, NULL, 50, 0, NULL),
('ct_6a1ed26eb98e7', 'pn_6a1ed26eb8f98', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead2f8', 36, 910000, NULL, 36, 0, NULL),
('ct_6a1ed26eba2ce', 'pn_6a1ed26eb9f27', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead433', 42, 910000, NULL, 42, 0, NULL),
('ct_6a1ed26eba6c9', 'pn_6a1ed26eb9f27', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead433', 31, 1050000, NULL, 31, 0, NULL),
('ct_6a1ed26ebaa2d', 'pn_6a1ed26eba8c9', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26eadee3', 33, 1050000, NULL, 33, 0, NULL),
('ct_6a1ed26ebab39', 'pn_6a1ed26eba8c9', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead1a8', 24, 420000, NULL, 24, 0, NULL),
('ct_6a1ed26ebaebf', 'pn_6a1ed26ebad17', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead8d9', 42, 1050000, NULL, 42, 0, NULL),
('ct_6a1ed26ebafea', 'pn_6a1ed26ebad17', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eadee3', 31, 910000, NULL, 31, 0, NULL),
('ct_6a1ed26ebb10b', 'pn_6a1ed26ebad17', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead9ff', 44, 1120000, NULL, 44, 0, NULL),
('ct_6a1ed26ebb222', 'pn_6a1ed26ebad17', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead2f8', 36, 910000, NULL, 36, 0, NULL),
('ct_6a1ed26ebb355', 'pn_6a1ed26ebad17', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26eaced9', 23, 420000, NULL, 23, 0, NULL),
('ct_6a1ed26ebb74f', 'pn_6a1ed26ebb590', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead433', 40, 910000, NULL, 40, 0, NULL),
('ct_6a1ed26ebba50', 'pn_6a1ed26ebb590', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead8d9', 24, 1120000, NULL, 24, 0, NULL),
('ct_6a1ed26ebbd20', 'pn_6a1ed26ebb590', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead8d9', 36, 210000, NULL, 36, 0, NULL),
('ct_6a1ed26ebc03f', 'pn_6a1ed26ebb590', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead2f8', 46, 1050000, NULL, 46, 0, NULL),
('ct_6a1ed26ebc5c8', 'pn_6a1ed26ebc45d', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead8d9', 18, 210000, NULL, 18, 0, NULL),
('ct_6a1ed26ebc6e7', 'pn_6a1ed26ebc45d', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead6c3', 25, 1120000, NULL, 25, 0, NULL),
('ct_6a1ed26ebc800', 'pn_6a1ed26ebc45d', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26eaced9', 33, 210000, NULL, 33, 0, NULL),
('ct_6a1ed26ebcb79', 'pn_6a1ed26ebc9fb', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadee3', 36, 910000, NULL, 36, 0, NULL),
('ct_6a1ed26ebcc93', 'pn_6a1ed26ebc9fb', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead9ff', 45, 210000, NULL, 45, 0, NULL),
('ct_6a1ed26ebcfbf', 'pn_6a1ed26ebc9fb', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26eaced9', 48, 210000, NULL, 48, 0, NULL),
('ct_6a1ed26ebd32c', 'pn_6a1ed26ebc9fb', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead56c', 47, 910000, NULL, 47, 0, NULL),
('ct_6a1ed26ebd665', 'pn_6a1ed26ebc9fb', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead56c', 37, 420000, NULL, 37, 0, NULL),
('ct_6a1ed26ebdfd2', 'pn_6a1ed26ebdc77', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead6c3', 25, 910000, NULL, 25, 0, NULL),
('ct_6a1ed26ebe30c', 'pn_6a1ed26ebdc77', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead433', 27, 1120000, NULL, 27, 0, NULL),
('ct_6a1ed26ebe662', 'pn_6a1ed26ebdc77', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead433', 28, 910000, NULL, 28, 0, NULL),
('ct_6a1ed26ebe9a2', 'pn_6a1ed26ebdc77', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead9ff', 24, 910000, NULL, 24, 0, NULL),
('ct_6a1ed26ebed02', 'pn_6a1ed26ebdc77', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26eadb74', 28, 910000, NULL, 28, 0, NULL),
('ct_6a1ed26ebf890', 'pn_6a1ed26ebf3f0', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eadb74', 36, 1050000, NULL, 36, 0, NULL),
('ct_6a1ed26ebf9bb', 'pn_6a1ed26ebf3f0', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead8d9', 16, 1050000, NULL, 16, 0, NULL),
('ct_6a1ed26ebfacd', 'pn_6a1ed26ebf3f0', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead8d9', 49, 1050000, NULL, 49, 0, NULL),
('ct_6a1ed26ec002e', 'pn_6a1ed26ebfcc3', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead1a8', 22, 420000, NULL, 22, 0, NULL),
('ct_6a1ed26ec0354', 'pn_6a1ed26ebfcc3', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26eadee3', 13, 1050000, NULL, 13, 0, NULL),
('ct_6a1ed26ec067a', 'pn_6a1ed26ebfcc3', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26eadb74', 31, 420000, NULL, 31, 0, NULL),
('ct_6a1ed26ec09bd', 'pn_6a1ed26ebfcc3', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead2f8', 39, 420000, NULL, 39, 0, NULL),
('ct_6a1ed26ec0d36', 'pn_6a1ed26ebfcc3', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26eaced9', 28, 1120000, NULL, 28, 0, NULL),
('ct_6a1ed26ec174c', 'pn_6a1ed26ec1399', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead433', 47, 910000, NULL, 47, 0, NULL),
('ct_6a1ed26ec1a4f', 'pn_6a1ed26ec1399', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead8d9', 13, 1120000, NULL, 13, 0, NULL),
('ct_6a1ed26ec1d3a', 'pn_6a1ed26ec1399', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26eadb74', 31, 420000, NULL, 31, 0, NULL),
('ct_6a1ed26ec1e7b', 'pn_6a1ed26ec1399', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead2f8', 32, 210000, NULL, 32, 0, NULL),
('ct_6a1ed26ec22c4', 'pn_6a1ed26ec2092', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead6c3', 22, 1120000, NULL, 22, 0, NULL),
('ct_6a1ed26ec2611', 'pn_6a1ed26ec2092', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eadee3', 11, 910000, NULL, 11, 0, NULL),
('ct_6a1ed26ec296e', 'pn_6a1ed26ec2092', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26eadee3', 34, 210000, NULL, 34, 0, NULL),
('ct_6a1ed26ec2cb3', 'pn_6a1ed26ec2092', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead2f8', 50, 1050000, NULL, 50, 0, NULL),
('ct_6a1ed26ec2fc7', 'pn_6a1ed26ec2092', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead1a8', 26, 910000, NULL, 26, 0, NULL),
('ct_6a1ed26ec3942', 'pn_6a1ed26ec35a8', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eaced9', 19, 910000, NULL, 19, 0, NULL),
('ct_6a1ed26ec3c5b', 'pn_6a1ed26ec35a8', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead6c3', 11, 910000, NULL, 11, 0, NULL),
('ct_6a1ed26ec3fbc', 'pn_6a1ed26ec35a8', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead2f8', 14, 910000, NULL, 14, 0, NULL),
('ct_6a1ed26ec4950', 'pn_6a1ed26ec45c9', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead1a8', 48, 1050000, NULL, 48, 0, NULL),
('ct_6a1ed26ec4c5c', 'pn_6a1ed26ec45c9', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead56c', 36, 1120000, NULL, 36, 0, NULL),
('ct_6a1ed26ec4f72', 'pn_6a1ed26ec45c9', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead2f8', 34, 910000, NULL, 34, 0, NULL),
('ct_6a1ed26ec5ab7', 'px_6a1ed26ec5544', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead9ff', 1, 1050000, NULL, 1, 0, NULL),
('ct_6a1ed26ec5c68', 'px_6a1ed26ec5544', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead6c3', 9, 1050000, NULL, 9, 0, NULL),
('ct_6a1ed26ec5de6', 'px_6a1ed26ec5544', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead8d9', 13, 420000, NULL, 13, 0, NULL),
('ct_6a1ed26ec5f4a', 'px_6a1ed26ec5544', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead2f8', 7, 1050000, NULL, 7, 0, NULL),
('ct_6a1ed26ec631a', 'px_6a1ed26ec6195', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead8d9', 13, 910000, NULL, 13, 0, NULL),
('ct_6a1ed26ec68ac', 'px_6a1ed26ec6524', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead56c', 9, 910000, NULL, 9, 0, NULL),
('ct_6a1ed26ec6b6b', 'px_6a1ed26ec6524', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26eadee3', 11, 1050000, NULL, 11, 0, NULL),
('ct_6a1ed26ec6e62', 'px_6a1ed26ec6524', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eadb74', 13, 1050000, NULL, 13, 0, NULL),
('ct_6a1ed26ec77e7', 'px_6a1ed26ec7414', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead8d9', 14, 1120000, NULL, 14, 0, NULL),
('ct_6a1ed26ec7af3', 'px_6a1ed26ec7414', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead433', 11, 1050000, NULL, 11, 0, NULL),
('ct_6a1ed26ec8011', 'px_6a1ed26ec7414', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead6c3', 1, 1050000, NULL, 1, 0, NULL),
('ct_6a1ed26ec8167', 'px_6a1ed26ec7414', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eadb74', 13, 210000, NULL, 13, 0, NULL),
('ct_6a1ed26ec8554', 'px_6a1ed26ec83c2', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead1a8', 12, 1050000, NULL, 12, 0, NULL),
('ct_6a1ed26ec8675', 'px_6a1ed26ec83c2', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead56c', 14, 1120000, NULL, 14, 0, NULL),
('ct_6a1ed26ec8c00', 'px_6a1ed26ec8882', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26eadee3', 9, 910000, NULL, 9, 0, NULL),
('ct_6a1ed26ec8f4e', 'px_6a1ed26ec8882', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead6c3', 7, 1120000, NULL, 7, 0, NULL),
('ct_6a1ed26ec9352', 'px_6a1ed26ec8882', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead433', 10, 910000, NULL, 10, 0, NULL),
('ct_6a1ed26ec99a0', 'px_6a1ed26ec9800', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead433', 8, 910000, NULL, 8, 0, NULL),
('ct_6a1ed26ec9cfe', 'px_6a1ed26ec9b9a', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26eaced9', 10, 1050000, NULL, 10, 0, NULL),
('ct_6a1ed26ec9e17', 'px_6a1ed26ec9b9a', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26eadb74', 13, 1120000, NULL, 13, 0, NULL),
('ct_6a1ed26ec9f24', 'px_6a1ed26ec9b9a', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26eadee3', 14, 1050000, NULL, 14, 0, NULL),
('ct_6a1ed26eca81c', 'px_6a1ed26eca4e0', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead6c3', 1, 1120000, NULL, 1, 0, NULL),
('ct_6a1ed26ecab82', 'px_6a1ed26eca4e0', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead8d9', 7, 210000, NULL, 7, 0, NULL),
('ct_6a1ed26ecb653', 'px_6a1ed26ecb2bb', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26eaced9', 2, 1050000, NULL, 2, 0, NULL),
('ct_6a1ed26ecb96d', 'px_6a1ed26ecb2bb', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26eadee3', 6, 1120000, NULL, 6, 0, NULL),
('ct_6a1ed26ecc34f', 'px_6a1ed26ecbf6b', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead8d9', 13, 210000, NULL, 13, 0, NULL),
('ct_6a1ed26ecc693', 'px_6a1ed26ecbf6b', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead9ff', 11, 210000, NULL, 11, 0, NULL),
('ct_6a1ed26ecca67', 'px_6a1ed26ecbf6b', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead8d9', 10, 1050000, NULL, 10, 0, NULL),
('ct_6a1ed26eccd99', 'px_6a1ed26ecbf6b', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead56c', 6, 1050000, NULL, 6, 0, NULL),
('ct_6a1ed26ecd20e', 'px_6a1ed26ecd041', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead9ff', 7, 1050000, NULL, 7, 0, NULL),
('ct_6a1ed26ecd36e', 'px_6a1ed26ecd041', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead1a8', 8, 210000, NULL, 8, 0, NULL),
('ct_6a1ed26ecd67e', 'px_6a1ed26ecd041', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead2f8', 7, 1120000, NULL, 7, 0, NULL),
('ct_6a1ed26ecd992', 'px_6a1ed26ecd041', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead433', 10, 1050000, NULL, 10, 0, NULL),
('ct_6a1ed26ece392', 'px_6a1ed26ecdfcf', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead433', 11, 1120000, NULL, 11, 0, NULL),
('ct_6a1ed26ece6e5', 'px_6a1ed26ecdfcf', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead6c3', 5, 420000, NULL, 5, 0, NULL),
('ct_6a1ed26ecf04f', 'px_6a1ed26ececdd', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead56c', 10, 420000, NULL, 10, 0, NULL),
('ct_6a1ed26ecf350', 'px_6a1ed26ececdd', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eadee3', 6, 1050000, NULL, 6, 0, NULL),
('ct_6a1ed26ecfe9a', 'px_6a1ed26ecf93d', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead56c', 11, 910000, NULL, 11, 0, NULL),
('ct_6a1ed26ed0017', 'px_6a1ed26ecf93d', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead8d9', 15, 210000, NULL, 15, 0, NULL),
('ct_6a1ed26ed0446', 'px_6a1ed26ed0289', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eadee3', 13, 1050000, NULL, 13, 0, NULL),
('ct_6a1ed26ed0593', 'px_6a1ed26ed0289', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eaced9', 4, 1050000, NULL, 4, 0, NULL),
('ct_6a1ed26ed06b6', 'px_6a1ed26ed0289', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26eadb74', 3, 420000, NULL, 3, 0, NULL),
('ct_6a1ed26ed07cf', 'px_6a1ed26ed0289', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead6c3', 3, 1050000, NULL, 3, 0, NULL),
('ct_6a1ed26ed0f0d', 'px_6a1ed26ed0bc7', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26ead1a8', 7, 1050000, NULL, 7, 0, NULL),
('ct_6a1ed26ed1244', 'px_6a1ed26ed0bc7', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead433', 13, 910000, NULL, 13, 0, NULL),
('ct_6a1ed26ed1bae', 'px_6a1ed26ed1811', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26eaced9', 13, 210000, NULL, 13, 0, NULL),
('ct_6a1ed26ed1f11', 'px_6a1ed26ed1811', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26eadee3', 8, 910000, NULL, 8, 0, NULL),
('ct_6a1ed26ed2888', 'px_6a1ed26ed2518', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead8d9', 5, 910000, NULL, 5, 0, NULL),
('ct_6a1ed26ed31b2', 'px_6a1ed26ed2e38', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead2f8', 5, 1050000, NULL, 5, 0, NULL),
('ct_6a1ed26ed32f4', 'px_6a1ed26ed2e38', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead1a8', 12, 910000, NULL, 12, 0, NULL),
('ct_6a1ed26ed36cc', 'px_6a1ed26ed353c', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead2f8', 2, 910000, NULL, 2, 0, NULL),
('ct_6a1ed26ed37e9', 'px_6a1ed26ed353c', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26eadee3', 3, 1120000, NULL, 3, 0, NULL),
('ct_6a1ed26ed3912', 'px_6a1ed26ed353c', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead433', 9, 910000, NULL, 9, 0, NULL),
('ct_6a1ed26ed3e8a', 'px_6a1ed26ed3b16', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead9ff', 1, 420000, NULL, 1, 0, NULL),
('ct_6a1ed26ed41ac', 'px_6a1ed26ed3b16', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead6c3', 3, 1120000, NULL, 3, 0, NULL),
('ct_6a1ed26ed44ba', 'px_6a1ed26ed3b16', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead1a8', 6, 910000, NULL, 6, 0, NULL),
('ct_6a1ed26ed4827', 'px_6a1ed26ed3b16', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead56c', 8, 910000, NULL, 8, 0, NULL),
('ct_6a1ed26ed51ef', 'px_6a1ed26ed4e40', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead9ff', 9, 1120000, NULL, 9, 0, NULL),
('ct_6a1ed26ed552a', 'px_6a1ed26ed4e40', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26eadb74', 7, 1120000, NULL, 7, 0, NULL),
('ct_6a1ed26ed569b', 'px_6a1ed26ed4e40', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26eadb74', 7, 210000, NULL, 7, 0, NULL),
('ct_6a1ed26ed5a38', 'px_6a1ed26ed58a8', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead1a8', 5, 1050000, NULL, 5, 0, NULL),
('ct_6a1ed26ed5b54', 'px_6a1ed26ed58a8', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26eaced9', 12, 1050000, NULL, 12, 0, NULL),
('ct_6a1ed26ed6283', 'px_6a1ed26ed5f41', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26eadb74', 2, 910000, NULL, 2, 0, NULL),
('ct_6a1ed26ed658f', 'px_6a1ed26ed5f41', 'bt_6a17ca3f31dac_1378', 'kv_6a1ed26ead433', 11, 420000, NULL, 11, 0, NULL),
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
('62186368-5cab-11f1-962c-088fc37729cd', '62182a4e-5cab-11f1-962c-088fc37729cd', 'bt_6a17ca3f31dac_1378', 'd36ad66f-5c1c-11f1-a6a6-088fc37729cd', 'd36b781f-5c1c-11f1-a6a6-088fc37729cd', 10, 10, 0, NULL),
('ct_6a1ed26ed73b1', 'tc_6a1ed26ed6c0f', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26eadb74', NULL, 14, 14, 0, NULL),
('ct_6a1ed26ed796d', 'tc_6a1ed26ed6c0f', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eaced9', NULL, 16, 16, 0, NULL),
('ct_6a1ed26ed8340', 'tc_6a1ed26ed7c40', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eaced9', NULL, 6, 6, 0, NULL),
('ct_6a1ed26ed8846', 'tc_6a1ed26ed8663', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead433', NULL, 19, 19, 0, NULL),
('ct_6a1ed26ed8b3f', 'tc_6a1ed26ed8942', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead8d9', NULL, 16, 16, 0, NULL),
('ct_6a1ed26ed8f97', 'tc_6a1ed26ed8c2b', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eadb74', NULL, 6, 6, 0, NULL),
('ct_6a1ed26ed926d', 'tc_6a1ed26ed8c2b', 'bt_6a17ca3f33d03_1597', 'kv_6a1ed26ead433', NULL, 5, 5, 0, NULL),
('ct_6a1ed26ed93bb', 'tc_6a1ed26ed8c2b', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead9ff', NULL, 12, 12, 0, NULL),
('ct_6a1ed26ed9626', 'tc_6a1ed26ed9481', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead56c', NULL, 11, 11, 0, NULL),
('ct_6a1ed26ed9739', 'tc_6a1ed26ed9481', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26eaced9', NULL, 9, 9, 0, NULL),
('ct_6a1ed26ed995a', 'tc_6a1ed26ed9803', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead56c', NULL, 8, 8, 0, NULL),
('ct_6a1ed26ed9a66', 'tc_6a1ed26ed9803', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead433', NULL, 19, 19, 0, NULL),
('ct_6a1ed26ed9b9f', 'tc_6a1ed26ed9803', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26eadee3', NULL, 20, 20, 0, NULL),
('ct_6a1ed26ed9e73', 'tc_6a1ed26ed9cac', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead433', NULL, 13, 13, 0, NULL),
('ct_6a1ed26eda1ae', 'tc_6a1ed26ed9cac', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead9ff', NULL, 14, 14, 0, NULL),
('ct_6a1ed26eda854', 'tc_6a1ed26eda49f', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead6c3', NULL, 19, 19, 0, NULL),
('ct_6a1ed26edab7c', 'tc_6a1ed26eda49f', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead6c3', NULL, 6, 6, 0, NULL),
('ct_6a1ed26edafd2', 'tc_6a1ed26eda49f', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead433', NULL, 5, 5, 0, NULL),
('ct_6a1ed26edb219', 'tc_6a1ed26edb0ac', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead56c', NULL, 15, 15, 0, NULL),
('ct_6a1ed26edb329', 'tc_6a1ed26edb0ac', 'bt_6a17ca3f34956_1505', 'kv_6a1ed26ead1a8', NULL, 12, 12, 0, NULL),
('ct_6a1ed26edb430', 'tc_6a1ed26edb0ac', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26eaced9', NULL, 19, 19, 0, NULL),
('ct_6a1ed26edb655', 'tc_6a1ed26edb4fb', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26ead2f8', NULL, 5, 5, 0, NULL),
('ct_6a1ed26edb91d', 'tc_6a1ed26edb759', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26ead433', NULL, 5, 5, 0, NULL),
('ct_6a1ed26edba73', 'tc_6a1ed26edb759', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead8d9', NULL, 19, 19, 0, NULL),
('ct_6a1ed26edbf43', 'tc_6a1ed26edbd96', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead56c', NULL, 19, 19, 0, NULL),
('ct_6a1ed26edc061', 'tc_6a1ed26edbd96', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead56c', NULL, 15, 15, 0, NULL),
('ct_6a1ed26edc198', 'tc_6a1ed26edbd96', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26ead2f8', NULL, 10, 10, 0, NULL),
('ct_6a1ed26edc3c6', 'tc_6a1ed26edc25d', 'bt_6a17ca3f3343d_7665', 'kv_6a1ed26ead6c3', NULL, 9, 9, 0, NULL),
('ct_6a1ed26edc506', 'tc_6a1ed26edc25d', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26ead1a8', NULL, 9, 9, 0, NULL),
('ct_6a1ed26edc7cb', 'tc_6a1ed26edc620', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead1a8', NULL, 12, 12, 0, NULL),
('ct_6a1ed26edc8e6', 'tc_6a1ed26edc620', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead6c3', NULL, 7, 7, 0, NULL),
('ct_6a1ed26edc9ea', 'tc_6a1ed26edc620', 'bt_6a17ca3f356ff_3946', 'kv_6a1ed26eadb74', NULL, 19, 19, 0, NULL),
('ct_6a1ed26edd038', 'tc_6a1ed26edccd4', 'bt_6a17ca3f32f2c_1814', 'kv_6a1ed26ead2f8', NULL, 8, 8, 0, NULL),
('ct_6a1ed26edd31b', 'tc_6a1ed26edccd4', 'bt_6a17ca3f3413a_2487', 'kv_6a1ed26ead433', NULL, 11, 11, 0, NULL),
('ct_6a1ed26edd7bf', 'tc_6a1ed26edd606', 'bt_6a17ca3f31802_4999', 'kv_6a1ed26eaced9', NULL, 6, 6, 0, NULL),
('ct_6a1ed26edd907', 'tc_6a1ed26edd606', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eadee3', NULL, 14, 14, 0, NULL),
('ct_6a1ed26edda1e', 'tc_6a1ed26edd606', 'bt_6a17ca3f32ac5_4697', 'kv_6a1ed26ead433', NULL, 9, 9, 0, NULL),
('ct_6a1ed26eddc8d', 'tc_6a1ed26eddb1f', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26eaced9', NULL, 18, 18, 0, NULL),
('ct_6a1ed26eddda2', 'tc_6a1ed26eddb1f', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26eadb74', NULL, 13, 13, 0, NULL),
('ct_6a1ed26eddea6', 'tc_6a1ed26eddb1f', 'bt_6a17ca3f31b18_5076', 'kv_6a1ed26ead2f8', NULL, 20, 20, 0, NULL),
('ct_6a1ed26ede0ff', 'tc_6a1ed26eddf93', 'bt_6a17ca3f35b27_1230', 'kv_6a1ed26ead6c3', NULL, 12, 12, 0, NULL),
('ct_6a1ed26ede252', 'tc_6a1ed26eddf93', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead6c3', NULL, 19, 19, 0, NULL),
('ct_6a1ed26ede367', 'tc_6a1ed26eddf93', 'bt_6a17ca3f372d5_2690', 'kv_6a1ed26ead56c', NULL, 13, 13, 0, NULL),
('ct_6a1ed26ede782', 'tc_6a1ed26ede42c', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead8d9', NULL, 19, 19, 0, NULL),
('ct_6a1ed26edea76', 'tc_6a1ed26ede42c', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eadee3', NULL, 5, 5, 0, NULL),
('ct_6a1ed26ededb8', 'tc_6a1ed26ede42c', 'bt_6a17ca3f37bf0_7610', 'kv_6a1ed26eadee3', NULL, 9, 9, 0, NULL),
('ct_6a1ed26edf06b', 'tc_6a1ed26edeeba', 'bt_6a17ca3f3648f_7582', 'kv_6a1ed26eadee3', NULL, 11, 11, 0, NULL),
('ct_6a1ed26edf2de', 'tc_6a1ed26edf15a', 'bt_6a17ca3f35fd8_5708', 'kv_6a1ed26ead8d9', NULL, 5, 5, 0, NULL),
('ct_6a1ed26edf609', 'tc_6a1ed26edf3df', 'bt_6a17ca3f3624c_2637', 'kv_6a1ed26ead8d9', NULL, 11, 11, 0, NULL),
('ct_6a1ed26edf72c', 'tc_6a1ed26edf3df', 'bt_6a17ca3f36ee0_2672', 'kv_6a1ed26eadee3', NULL, 16, 16, 0, NULL),
('ct_6a1ed26edf94f', 'tc_6a1ed26edf7f5', 'bt_6a17ca3f36705_1246', 'kv_6a1ed26ead6c3', NULL, 11, 11, 0, NULL),
('ct_6a1ed26edfd70', 'tc_6a1ed26edfa0c', 'bt_6a17ca3f34555_1778', 'kv_6a1ed26ead6c3', NULL, 8, 8, 0, NULL),
('ct_6a1ed26edfe93', 'tc_6a1ed26edfa0c', 'bt_6a17ca3f352d2_7083', 'kv_6a1ed26ead2f8', NULL, 6, 6, 0, NULL);

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
('08fdb3cc-f925-4e8e-bee9-1ebadd8ca77b', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_016', NULL, -1, 14),
('118584d3-53f0-4aec-8365-198c2e6a4f8e', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_010', NULL, -1, 9),
('1aa090c4-ab8f-4be5-a69b-91d29909087f', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_001', NULL, -1, 819),
('2405aec5-afa0-4b50-9729-4394102ca586', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_019', NULL, -1, 9),
('3d50c6f9-91d8-49ef-aa08-713f69e6082c', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_003', NULL, -1, 454),
('44896d7c-f5b7-46a5-90c9-b090ad4d2769', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_014', NULL, -1, 6),
('45262285-7387-4067-b728-dbce9e8a437c', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_012', NULL, -1, 17),
('57e7cfb2-d6fc-42c2-85a8-d13855ebdfa9', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_008', NULL, -1, 150),
('5a42cd9b-ca0f-436a-aa5a-32fba3f23c78', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_015', NULL, -1, 3),
('7a36a2eb-bbd6-42d0-90c4-3310e71e21ee', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_009', NULL, -1, 114),
('878d7b1c-7ede-4800-96f4-a3a213f14bb9', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_005', NULL, -1, 218),
('9691169d-ecce-4b09-b668-e8216199368c', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_011', NULL, -1, 21),
('a20cd1d3-03c8-4c55-9fe6-7bbe62cbb1fa', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_018', NULL, -1, 9),
('ac528547-8166-430a-8925-39d3cf8b4833', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_013', NULL, -1, 10),
('ba5e3752-c694-4d4c-9855-923d5336c5f9', '6337bcb3-afdf-47b7-b9fc-8d4fa5dc8ba4', 'sp_007', NULL, -1, 159),
('bdd987a9-c325-4dd0-86f8-f0753282606f', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_006', NULL, -1, 99),
('dd2aef34-5b61-4269-823d-7d4601b56cf3', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_017', NULL, -1, 11),
('df3e1239-5510-4fe4-bffa-6c9b1b24f24a', 'a17c4763-d5c7-4995-8146-550d04124502', 'sp_021', NULL, -1, 15),
('e07d378b-ceb7-4588-bd49-d9be0522cc9b', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_004', NULL, -1, 159),
('e7238f38-e3d4-4751-a4cd-ded5d556accf', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_022', NULL, -1, 14),
('ece6a20d-d596-41ae-9d09-29cdea38e1a8', 'ac7f92a3-f3ad-4e62-b857-2879bccc5cde', 'sp_002', NULL, -1, 684),
('f476006a-948a-4428-bee5-de3d71011639', 'c7a64a06-243a-4a74-8f8a-c141d3631666', 'sp_020', NULL, -1, 10);

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
  `sao_chat_luong` tinyint(1) DEFAULT 5,
  `sao_mo_ta` tinyint(1) DEFAULT 5,
  `sao_dich_vu` tinyint(1) DEFAULT 5,
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

INSERT INTO `danh_gia` (`id`, `id_san_pham`, `id_nguoi_dung`, `id_don_hang`, `so_sao`, `sao_chat_luong`, `sao_mo_ta`, `sao_dich_vu`, `noi_dung`, `hinh_anh`, `trang_thai`, `ngay_tao`, `phan_hoi_noi_dung`, `phan_hoi_ngay`, `phan_hoi_boi`) VALUES
('80b337e7-544d-4256-8a8b-c5a4ba3f37c5', 'sp_006', 'ba467f83493062c5b15e72da52ac47fc', NULL, 4, 5, 5, 4, 'tốt', '/uploads/danh_gia/6a21a1c96a424-03-1.jpg', 1, '2026-06-04 23:03:21', 'Cảm ơn bạn đã tin tưởng và lựa chọn sản phẩm của Chuỗi Ngọc. Chúc bạn luôn vui vẻ và gặp nhiều may mắn! Nếu cần hỗ trợ thêm gì hãy nhắn tin cho shop nhé.', '2026-06-04 23:06:20', 'ba467f83493062c5b15e72da52ac47fc'),
('dg_6a1839725cf93', 'sp_005', 'kh_6a17dc271eecd', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-04 14:47:46', 'Cảm ơn bạn đã tin tưởng và ủng hộ Chuỗi Ngọc Phong Thủy! Chúng tôi rất vui khi bạn hài lòng với sản phẩm. Chúc bạn luôn bình an và may mắn!', '2026-06-04 22:28:51', NULL),
('dg_6a1839725d9f0', 'sp_007', 'kh_6a17dc271eecd', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-26 14:47:46', 'Chào bạn, cảm ơn bạn đã đánh giá! Nếu có bất kỳ thắc mắc nào về sản phẩm, xin vui lòng liên hệ hotline 0909.xxx.xxx để được hỗ trợ tốt nhất nhé. Trân trọng!', '2026-06-04 22:28:59', NULL),
('dg_6a1839725efed', 'sp_014', 'kh_6a17dc6aac40c', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839725f1d0', 'sp_015', 'kh_6a17dc6aac40c', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-04 14:47:46', NULL, NULL, NULL),
('dg_6a18397260400', 'sp_007', 'kh_6a183864cecd3', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a18397260759', 'sp_016', 'kh_6a183864cecd3', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-15 14:47:46', NULL, NULL, NULL),
('dg_6a18397262375', 'sp_013', 'kh_6a183864d097f', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972629d3', 'sp_004', 'kh_6a183864d0cf7', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-10 14:47:46', NULL, NULL, NULL),
('dg_6a183972638f6', 'sp_011', 'kh_6a183864d1037', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-17 14:47:46', NULL, NULL, NULL),
('dg_6a18397263d2f', 'sp_013', 'kh_6a183864d1037', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972645d3', 'sp_016', 'kh_6a183864d141b', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972659ae', 'sp_008', 'kh_6a183864d1a95', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839726612e', 'sp_002', 'kh_6a183864d1d81', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397266777', 'sp_001', 'kh_6a183864d2043', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a18397268fc3', 'sp_001', 'kh_6a183864d2c59', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a1839726934f', 'sp_016', 'kh_6a183864d2c59', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972697a5', 'sp_002', 'kh_6a183864d3095', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839726991f', 'sp_006', 'kh_6a183864d3095', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839726a791', 'sp_006', 'kh_6a183864d3388', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-26 14:47:46', NULL, NULL, NULL),
('dg_6a1839726aaad', 'sp_019', 'kh_6a183864d3388', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839726b128', 'sp_010', 'kh_6a183864d366c', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839726b47e', 'sp_014', 'kh_6a183864d366c', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839726c420', 'sp_003', 'kh_6a183864d3b7c', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839726c590', 'sp_013', 'kh_6a183864d3b7c', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839726c83f', 'sp_001', 'kh_6a183864d3df0', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839726cb3f', 'sp_006', 'kh_6a183864d3df0', NULL, 3, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-26 14:47:46', 'Cảm ơn bạn rất nhiều! Shop rất vui khi nhận được phản hồi tích cực từ bạn. Hy vọng bạn sẽ tiếp tục ủng hộ shop nhé!', '2026-06-04 22:29:16', NULL),
('dg_6a1839726d53d', 'sp_018', 'kh_6a183864d404e', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839726df58', 'sp_006', 'kh_6a183864d4360', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839726e5fb', 'sp_013', 'kh_6a183864d461b', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a1839726e925', 'sp_014', 'kh_6a183864d461b', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-27 14:47:46', NULL, NULL, NULL),
('dg_6a1839726f488', 'sp_004', 'kh_6a183864d49e4', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839726fb67', 'sp_014', 'kh_6a183864d4c48', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-12 14:47:46', NULL, NULL, NULL),
('dg_6a18397270cf2', 'sp_010', 'kh_6a183864d5370', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a18397271077', 'sp_021', 'kh_6a183864d5370', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-12 14:47:46', NULL, NULL, NULL),
('dg_6a18397271eb5', 'sp_006', 'kh_6a183864d56f6', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a18397272160', 'sp_022', 'kh_6a183864d56f6', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a1839727283a', 'sp_021', 'kh_6a183864d5b61', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-03-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839727292a', 'sp_022', 'kh_6a183864d5b61', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a18397272d1b', 'sp_001', 'kh_6a183864d5f72', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a18397273004', 'sp_009', 'kh_6a183864d5f72', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-05 14:47:46', NULL, NULL, NULL),
('dg_6a18397273dbb', 'sp_012', 'kh_6a183864d62a5', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a183972740e9', 'sp_015', 'kh_6a183864d62a5', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a18397274c28', 'sp_004', 'kh_6a183864d6660', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397274d25', 'sp_013', 'kh_6a183864d6660', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a183972750bd', 'sp_006', 'kh_6a183864d6c49', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-23 14:47:46', 'Cảm ơn bạn rất nhiều! Shop rất vui khi nhận được phản hồi tích cực từ bạn. Hy vọng bạn sẽ tiếp tục ủng hộ shop nhé!', '2026-06-04 22:29:16', NULL),
('dg_6a18397275194', 'sp_008', 'kh_6a183864d6c49', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839727560f', 'sp_006', 'kh_6a183864d7fc1', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839727592a', 'sp_016', 'kh_6a183864d7fc1', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-09 14:47:46', NULL, NULL, NULL),
('dg_6a18397276023', 'sp_019', 'kh_6a183864d8470', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972765a6', 'sp_017', 'kh_6a183864d8938', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a18397277683', 'sp_019', 'kh_6a183864d8938', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a18397277ff9', 'sp_006', 'kh_6a183864d8da8', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-12 14:47:46', NULL, NULL, NULL),
('dg_6a183972782fe', 'sp_020', 'kh_6a183864d9216', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a1839727897c', 'sp_022', 'kh_6a183864d9674', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a18397279530', 'sp_013', 'kh_6a183864d9b06', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-13 14:47:46', NULL, NULL, NULL),
('dg_6a18397279df2', 'sp_007', 'kh_6a183864da4a6', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a18397279eda', 'sp_022', 'kh_6a183864da4a6', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839727a18b', 'sp_012', 'kh_6a183864da863', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a1839727a467', 'sp_022', 'kh_6a183864da863', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a1839727b336', 'sp_015', 'kh_6a183864daccb', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839727bf03', 'sp_011', 'kh_6a183864daf6b', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a1839727c206', 'sp_022', 'kh_6a183864daf6b', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-13 14:47:46', NULL, NULL, NULL),
('dg_6a1839727cd89', 'sp_010', 'kh_6a183864db37e', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a1839727ce6f', 'sp_015', 'kh_6a183864db37e', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-13 14:47:46', NULL, NULL, NULL),
('dg_6a1839727d3a4', 'sp_015', 'kh_6a183864db59a', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839727d65b', 'sp_022', 'kh_6a183864db59a', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-18 14:47:46', NULL, NULL, NULL),
('dg_6a1839727ec71', 'sp_006', 'kh_6a183864dba87', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839727f2b3', 'sp_018', 'kh_6a183864dbc65', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839727f583', 'sp_019', 'kh_6a183864dbc65', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839727fc27', 'sp_005', 'kh_6a183864dc124', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a1839727fd28', 'sp_006', 'kh_6a183864dc124', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a18397280196', 'sp_006', 'kh_6a183864dc2ce', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-11 14:47:46', NULL, NULL, NULL),
('dg_6a18397280c2c', 'sp_019', 'kh_6a183864dc515', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-18 14:47:46', NULL, NULL, NULL),
('dg_6a18397281178', 'sp_003', 'kh_6a183864dc8e2', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a1839728140e', 'sp_016', 'kh_6a183864dc8e2', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839728265f', 'sp_013', 'kh_6a183864dd2b1', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839728293a', 'sp_016', 'kh_6a183864dd2b1', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a18397283c04', 'sp_004', 'kh_6a183864dd6ee', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397283efa', 'sp_014', 'kh_6a183864dd6ee', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-07 14:47:46', NULL, NULL, NULL),
('dg_6a183972845b5', 'sp_003', 'kh_6a183864dd94e', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-27 14:47:46', NULL, NULL, NULL),
('dg_6a18397284681', 'sp_016', 'kh_6a183864dd94e', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-03 14:47:46', NULL, NULL, NULL),
('dg_6a1839728486e', 'sp_017', 'kh_6a183864ddaee', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a18397285d14', 'sp_019', 'kh_6a183864ddec8', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a18397286891', 'sp_015', 'kh_6a183864de10e', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a18397286ce8', 'sp_004', 'kh_6a183864de4c6', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-07 14:47:46', NULL, NULL, NULL),
('dg_6a1839728700e', 'sp_015', 'kh_6a183864de67d', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-07 14:47:46', NULL, NULL, NULL),
('dg_6a18397287338', 'sp_012', 'kh_6a183864de904', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972873f6', 'sp_003', 'kh_6a183864de904', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839728764b', 'sp_021', 'kh_6a183864defa6', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a1839728788a', 'sp_017', 'kh_6a183864df195', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-05 14:47:46', NULL, NULL, NULL),
('dg_6a18397287ad0', 'sp_006', 'kh_6a183864df364', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-25 14:47:46', NULL, NULL, NULL),
('dg_6a18397287b8e', 'sp_008', 'kh_6a183864df364', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972881f0', 'sp_020', 'kh_6a183864dfb1f', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-08 14:47:46', NULL, NULL, NULL),
('dg_6a18397289118', 'sp_012', 'kh_6a183864dfd42', NULL, 3, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972893dd', 'sp_010', 'kh_6a183864dfd42', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839728997c', 'sp_001', 'kh_6a183864dff7a', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a18397289c50', 'sp_011', 'kh_6a183864dff7a', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-20 14:47:46', NULL, NULL, NULL),
('dg_6a1839728a495', 'sp_002', 'kh_6a183864e01ed', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-19 14:47:46', NULL, NULL, NULL),
('dg_6a1839728ac01', 'sp_008', 'kh_6a183864e04e7', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a1839728aece', 'sp_016', 'kh_6a183864e04e7', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-22 14:47:46', NULL, NULL, NULL),
('dg_6a1839728bc20', 'sp_015', 'kh_6a183864e06e7', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-15 14:47:46', NULL, NULL, NULL),
('dg_6a1839728bf31', 'sp_019', 'kh_6a183864e06e7', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839728ca6c', 'sp_008', 'kh_6a183864e08d6', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a1839728d544', 'sp_010', 'kh_6a183864e0c66', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839728dde5', 'sp_007', 'kh_6a183864e0f3c', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a1839728e73a', 'sp_007', 'kh_6a183864e15ab', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a1839728e9f7', 'sp_009', 'kh_6a183864e15ab', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-29 14:47:46', NULL, NULL, NULL),
('dg_6a1839728facc', 'sp_003', 'kh_6a183864e1a42', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839728fda1', 'sp_004', 'kh_6a183864e1a42', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a1839729039b', 'sp_017', 'kh_6a183864e1ef0', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-04 14:47:46', NULL, NULL, NULL),
('dg_6a183972905e2', 'sp_009', 'kh_6a183864e2115', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972909b2', 'sp_012', 'kh_6a183864e22de', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972919b4', 'sp_009', 'kh_6a183864e27a5', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a18397291e72', 'sp_002', 'kh_6a183864e297a', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a18397291f34', 'sp_009', 'kh_6a183864e297a', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a18397292995', 'sp_007', 'kh_6a183864e2dce', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-26 14:47:46', NULL, NULL, NULL),
('dg_6a18397292cf3', 'sp_018', 'kh_6a183864e2dce', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a1839729381c', 'sp_003', 'kh_6a183864e3037', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839729437e', 'sp_001', 'kh_6a183864e324c', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a18397294b8a', 'sp_011', 'kh_6a183864e340d', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a18397294e70', 'sp_004', 'kh_6a183864e340d', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a18397295dae', 'sp_003', 'kh_6a183864e378b', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a183972960a7', 'sp_019', 'kh_6a183864e378b', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-07 14:47:46', NULL, NULL, NULL),
('dg_6a18397296c7b', 'sp_014', 'kh_6a183864e397e', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839729748b', 'sp_011', 'kh_6a183864e3bd9', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-18 14:47:46', NULL, NULL, NULL),
('dg_6a18397297774', 'sp_020', 'kh_6a183864e3bd9', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a18397297e4e', 'sp_018', 'kh_6a183864e3f0d', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a1839729820b', 'sp_021', 'kh_6a183864e4124', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-29 14:47:46', NULL, NULL, NULL),
('dg_6a18397298f15', 'sp_016', 'kh_6a183864e448e', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-03 14:47:46', NULL, NULL, NULL),
('dg_6a18397299230', 'sp_022', 'kh_6a183864e448e', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-03-30 14:47:46', NULL, NULL, NULL),
('dg_6a18397299822', 'sp_001', 'kh_6a183864e465e', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a18397299ae8', 'sp_020', 'kh_6a183864e465e', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a168', 'sp_017', 'kh_6a183864e480f', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-17 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a480', 'sp_007', 'kh_6a183864e4ad5', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a6c3', 'sp_009', 'kh_6a183864e4e7a', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a1839729a900', 'sp_008', 'kh_6a183864e51d8', NULL, 3, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a1839729afcf', 'sp_016', 'kh_6a183864e5616', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-14 14:47:46', NULL, NULL, NULL),
('dg_6a1839729b287', 'sp_019', 'kh_6a183864e5616', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a1839729b650', 'sp_010', 'kh_6a183864e5953', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a1839729c48c', 'sp_018', 'kh_6a183864e6652', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-23 14:47:46', NULL, NULL, NULL),
('dg_6a1839729d2f9', 'sp_009', 'kh_6a183864e6ab3', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a1839729d5d9', 'sp_018', 'kh_6a183864e6ab3', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a1839729e869', 'sp_013', 'kh_6a183864e6fe0', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a1839729f9d2', 'sp_003', 'kh_6a183864e7437', NULL, 4, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-11 14:47:46', NULL, NULL, NULL),
('dg_6a1839729fcb0', 'sp_009', 'kh_6a183864e7437', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972a0cfd', 'sp_004', 'kh_6a183864e8000', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972a0de3', 'sp_005', 'kh_6a183864e8000', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972a1bca', 'sp_006', 'kh_6a183864e8353', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972a1eab', 'sp_018', 'kh_6a183864e8353', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972a2cbe', 'sp_012', 'kh_6a183864e86dc', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3256', 'sp_001', 'kh_6a183864e8aa9', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3531', 'sp_006', 'kh_6a183864e8aa9', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3bcd', 'sp_018', 'kh_6a183864e8eb1', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3ca6', 'sp_022', 'kh_6a183864e8eb1', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a183972a3f5e', 'sp_007', 'kh_6a183864e92f9', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972a4a76', 'sp_019', 'kh_6a183864e94fe', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972a592d', 'sp_011', 'kh_6a183864e97f6', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-18 14:47:46', NULL, NULL, NULL),
('dg_6a183972a5d84', 'sp_013', 'kh_6a183864e9903', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-05 14:47:46', NULL, NULL, NULL),
('dg_6a183972a6ba1', 'sp_017', 'kh_6a183864e9d20', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-28 14:47:46', NULL, NULL, NULL),
('dg_6a183972a7b1c', 'sp_002', 'kh_6a183864e9ff4', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-03-31 14:47:46', NULL, NULL, NULL),
('dg_6a183972a8193', 'sp_014', 'kh_6a183864ea37d', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-26 14:47:46', NULL, NULL, NULL),
('dg_6a183972a8466', 'sp_015', 'kh_6a183864ea37d', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972a8ce9', 'sp_022', 'kh_6a183864ea6ff', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a183972a9028', 'sp_013', 'kh_6a183864eaa49', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-17 14:47:46', NULL, NULL, NULL),
('dg_6a183972a930a', 'sp_021', 'kh_6a183864eaa49', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972a9b5a', 'sp_009', 'kh_6a183864eae73', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-09 14:47:46', NULL, NULL, NULL),
('dg_6a183972a9e10', 'sp_017', 'kh_6a183864eae73', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972aaa4e', 'sp_005', 'kh_6a183864eb2bc', NULL, 3, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972ab842', 'sp_009', 'kh_6a183864eb497', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972abb1b', 'sp_014', 'kh_6a183864eb497', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a183972ac41e', 'sp_005', 'kh_6a183864eb77f', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-04 14:47:46', NULL, NULL, NULL),
('dg_6a183972ac500', 'sp_010', 'kh_6a183864eb77f', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-03-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972ad127', 'sp_019', 'kh_6a183864eba74', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-10 14:47:46', NULL, NULL, NULL),
('dg_6a183972ad3cc', 'sp_021', 'kh_6a183864eba74', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a183972aeade', 'sp_006', 'kh_6a183864ebc34', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972aebb0', 'sp_020', 'kh_6a183864ebc34', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972af478', 'sp_007', 'kh_6a183864ebe1c', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b01e9', 'sp_004', 'kh_6a183864ebfd1', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972b0546', 'sp_019', 'kh_6a183864ebfd1', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b0d57', 'sp_012', 'kh_6a183864ec1a3', NULL, 5, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-24 14:47:46', NULL, NULL, NULL),
('dg_6a183972b0e78', 'sp_006', 'kh_6a183864ec1a3', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-17 14:47:46', NULL, NULL, NULL),
('dg_6a183972b1af3', 'sp_001', 'kh_6a183864eccd3', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-16 14:47:46', NULL, NULL, NULL),
('dg_6a183972b2657', 'sp_013', 'kh_6a183864ed220', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-13 14:47:46', NULL, NULL, NULL),
('dg_6a183972b3144', 'sp_011', 'kh_6a183864ed3e0', NULL, 4, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a183972b3218', 'sp_002', 'kh_6a183864ed3e0', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972b3dd2', 'sp_014', 'kh_6a183864ed5b5', NULL, 3, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-05-04 14:47:46', NULL, NULL, NULL),
('dg_6a183972b4efd', 'sp_006', 'kh_6a183864edb17', NULL, 4, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-05-20 14:47:46', NULL, NULL, NULL),
('dg_6a183972b5f3e', 'sp_003', 'kh_6a183864ee308', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-29 14:47:46', NULL, NULL, NULL),
('dg_6a183972b6294', 'sp_004', 'kh_6a183864ee308', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972b6999', 'sp_011', 'kh_6a183864ee45b', NULL, 5, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-25 14:47:46', NULL, NULL, NULL),
('dg_6a183972b6c60', 'sp_022', 'kh_6a183864ee640', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7122', 'sp_012', 'kh_6a183864ee93f', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a183972b71dc', 'sp_014', 'kh_6a183864ee93f', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-05-08 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7366', 'sp_017', 'kh_6a183864eeb01', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-23 14:47:46', NULL, NULL, NULL),
('dg_6a183972b796f', 'sp_012', 'kh_6a183864eec20', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-14 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7a88', 'sp_002', 'kh_6a183864eec20', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7dbe', 'sp_011', 'kh_6a183864eedff', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-02 14:47:46', NULL, NULL, NULL),
('dg_6a183972b7e7f', 'sp_005', 'kh_6a183864eedff', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a183972b944f', 'sp_003', 'kh_6a183864ef19f', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972ba2c3', 'sp_019', 'kh_6a183864ef344', NULL, 4, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-16 14:47:46', NULL, NULL, NULL),
('dg_6a183972ba744', 'sp_012', 'kh_6a183864ef4e4', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-21 14:47:46', NULL, NULL, NULL),
('dg_6a183972ba806', 'sp_013', 'kh_6a183864ef4e4', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-01 14:47:46', NULL, NULL, NULL),
('dg_6a183972bac3c', 'sp_018', 'kh_6a183864ef658', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972bb513', 'sp_004', 'kh_6a183864ef83f', NULL, 5, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-24 14:47:46', NULL, NULL, NULL),
('dg_6a183972bb7e6', 'sp_020', 'kh_6a183864ef83f', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-19 14:47:46', NULL, NULL, NULL),
('dg_6a183972bc347', 'sp_008', 'kh_6a183864efc56', NULL, 3, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a183972bc611', 'sp_014', 'kh_6a183864efc56', NULL, 3, 5, 5, 5, 'Rất thích món trang sức này, mang lại cảm giác bình an.', NULL, 1, '2026-04-03 14:47:46', NULL, NULL, NULL),
('dg_6a183972bd459', 'sp_008', 'kh_6a183864efd8d', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-09 14:47:46', NULL, NULL, NULL),
('dg_6a183972be553', 'sp_001', 'kh_6a183864f03e3', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972be85b', 'sp_006', 'kh_6a183864f03e3', NULL, 3, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-23 14:47:46', 'Cảm ơn bạn rất nhiều! Shop rất vui khi nhận được phản hồi tích cực từ bạn. Hy vọng bạn sẽ tiếp tục ủng hộ shop nhé!', '2026-06-04 22:29:16', NULL),
('dg_6a183972bfb48', 'sp_020', 'kh_6a183864f08b4', NULL, 3, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972c0009', 'sp_003', 'kh_6a183864f09d1', NULL, 4, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972c02bc', 'sp_010', 'kh_6a183864f09d1', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972c089f', 'sp_001', 'kh_6a183864f0b91', NULL, 5, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-11 14:47:46', NULL, NULL, NULL),
('dg_6a183972c0b8f', 'sp_014', 'kh_6a183864f0b91', NULL, 3, 5, 5, 5, 'Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng.', NULL, 1, '2026-04-30 14:47:46', NULL, NULL, NULL),
('dg_6a183972c13a1', 'sp_004', 'kh_6a183864f0d2f', NULL, 3, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-04-07 14:47:46', NULL, NULL, NULL),
('dg_6a183972c1e45', 'sp_002', 'kh_6a183864f0f35', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-26 14:47:46', NULL, NULL, NULL),
('dg_6a183972c255b', 'sp_002', 'kh_6a183864f111f', NULL, 3, 5, 5, 5, 'Vòng tay vừa vặn, màu sắc như hình. Sẽ ủng hộ shop tiếp.', NULL, 1, '2026-05-15 14:47:46', NULL, NULL, NULL),
('dg_6a183972c262f', 'sp_009', 'kh_6a183864f111f', NULL, 5, 5, 5, 5, 'Đá hơi xỉn màu so với hình quảng cáo.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL),
('dg_6a183972c28ce', 'sp_004', 'kh_6a183864f1566', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-06 14:47:46', NULL, NULL, NULL),
('dg_6a183972c2c65', 'sp_018', 'kh_6a183864f1999', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-03-30 14:47:46', NULL, NULL, NULL),
('dg_6a183972c2d48', 'sp_021', 'kh_6a183864f1999', NULL, 5, 5, 5, 5, 'Sản phẩm rất đẹp, đá sáng bóng, ưng ý lắm.', NULL, 1, '2026-05-14 14:47:46', NULL, NULL, NULL),
('dg_6a183972c3d3c', 'sp_013', 'kh_6a183864f22c1', NULL, 4, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-05-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972c4178', 'sp_005', 'user_3', NULL, 5, 5, 5, 5, 'Chất lượng tốt, giá cả hợp lý.', NULL, 1, '2026-04-27 14:47:46', NULL, NULL, NULL),
('dg_6a183972c427a', 'sp_021', 'user_3', NULL, 4, 5, 5, 5, 'Tạm được, không xuất sắc nhưng cũng không tệ.', NULL, 1, '2026-04-22 14:47:46', NULL, NULL, NULL);

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
('dh_6a1c160a073e1', 'DHA073EE', 'kh_6a183864f03e3', 'Dương Gia Lan', '0963741968', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', '', 0, 0, NULL, 0, 840000, 'Tiền mặt', 1, 3, '2026-05-31 18:05:46'),
('dh_6a1ed01da8320', 'DH499564', NULL, 'Khách hàng 99', '0900000099', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 0, 30000, NULL, 0, 0, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-29 15:38:34'),
('dh_6a1ed042b3167', 'DH452553', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4740000, 30000, NULL, 0, 4770000, 'Thanh toán qua VNPAY', 0, 2, '2026-01-08 00:28:34'),
('dh_6a1ed042b53da', 'DH721298', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5180000, 30000, NULL, 0, 5210000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-02 08:06:47'),
('dh_6a1ed042b67e2', 'DH751544', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-02-12 19:34:51'),
('dh_6a1ed042b73dc', 'DH806152', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7590000, 30000, NULL, 0, 7620000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-28 03:27:30'),
('dh_6a1ed042b9c1a', 'DH671426', NULL, 'Khách hàng 78', '0900000078', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4170000, 30000, NULL, 0, 4200000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-21 17:37:57'),
('dh_6a1ed042bb8ed', 'DH475618', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-26 03:52:52'),
('dh_6a1ed042bc2e7', 'DH502306', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5910000, 30000, NULL, 0, 5940000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-29 02:42:40'),
('dh_6a1ed042bce10', 'DH196505', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-01-07 00:02:05'),
('dh_6a1ed042bd781', 'DH671386', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8900000, 30000, NULL, 0, 8930000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-05-27 06:02:46'),
('dh_6a1ed042bee0e', 'DH535505', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3360000, 30000, NULL, 0, 3390000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-25 07:29:28'),
('dh_6a1ed042bface', 'DH967335', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8310000, 30000, NULL, 0, 8340000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-08 00:56:45'),
('dh_6a1ed042c185d', 'DH912425', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5740000, 30000, NULL, 0, 5770000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-07 22:54:19'),
('dh_6a1ed042c2f70', 'DH707094', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 5570000, 30000, NULL, 0, 5600000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-06 14:23:55'),
('dh_6a1ed042c4932', 'DH628676', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 8940000, 30000, NULL, 0, 8970000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-07 12:52:47'),
('dh_6a1ed042c56fc', 'DH303233', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 960000, 30000, NULL, 0, 990000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-19 22:51:41'),
('dh_6a1ed042c6406', 'DH367140', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6080000, 30000, NULL, 0, 6110000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-21 06:15:04'),
('dh_6a1ed042c765d', 'DH914654', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 9710000, 30000, NULL, 0, 9740000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-19 23:37:53'),
('dh_6a1ed042c91c0', 'DH915333', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 3720000, 30000, NULL, 0, 3750000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-10 20:19:18'),
('dh_6a1ed042ca7d0', 'DH750757', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 7890000, 30000, NULL, 0, 7920000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-15 23:32:22'),
('dh_6a1ed042cc47a', 'DH128529', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4850000, 30000, NULL, 0, 4880000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-03-07 15:56:12'),
('dh_6a1ed042ccd1f', 'DH735887', NULL, 'Khách hàng 15', '0900000015', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-04-11 23:30:00'),
('dh_6a1ed042cd4ee', 'DH678761', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7680000, 30000, NULL, 0, 7710000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-18 01:57:53'),
('dh_6a1ed042cf3d4', 'DH163017', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6900000, 30000, NULL, 0, 6930000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-02-21 08:16:21'),
('dh_6a1ed042cf975', 'DH115296', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 7360000, 30000, NULL, 0, 7390000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-30 16:05:20'),
('dh_6a1ed042d123d', 'DH887301', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-11 18:20:22'),
('dh_6a1ed042d1eb6', 'DH406384', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-05 04:58:52'),
('dh_6a1ed042d2e22', 'DH725353', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-04-19 03:39:30'),
('dh_6a1ed042d33ad', 'DH940269', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-18 20:47:16'),
('dh_6a1ed042d40e5', 'DH538206', NULL, 'Khách hàng 1', '0900000001', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-21 13:40:13'),
('dh_6a1ed042d4d79', 'DH173058', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6470000, 30000, NULL, 0, 6500000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-09 08:42:38'),
('dh_6a1ed042d622a', 'DH806112', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2760000, 30000, NULL, 0, 2790000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-08 21:10:41'),
('dh_6a1ed042d68f6', 'DH449601', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-21 20:43:52'),
('dh_6a1ed042d74e8', 'DH335190', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-17 13:44:52'),
('dh_6a1ed042d8cc8', 'DH738737', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-03 22:46:01'),
('dh_6a1ed042d99c9', 'DH134440', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3660000, 30000, NULL, 0, 3690000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-06 18:44:17'),
('dh_6a1ed042da360', 'DH121652', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 3540000, 30000, NULL, 0, 3570000, 'Thanh toán qua VNPAY', 0, 0, '2026-01-19 22:36:18'),
('dh_6a1ed042db215', 'DH232603', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-28 07:23:09'),
('dh_6a1ed042dcb35', 'DH224889', NULL, 'Khách hàng 1', '0900000001', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6210000, 30000, NULL, 0, 6240000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-17 18:06:57'),
('dh_6a1ed042dd68a', 'DH690376', NULL, 'Khách hàng 1', '0900000001', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3340000, 30000, NULL, 0, 3370000, 'Thanh toán qua VNPAY', 0, 4, '2026-05-24 10:22:47'),
('dh_6a1ed042de39f', 'DH217549', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 4410000, 30000, NULL, 0, 4440000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-03-01 05:27:42'),
('dh_6a1ed042df029', 'DH165312', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-09 16:52:06'),
('dh_6a1ed042dfcae', 'DH603433', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7050000, 30000, NULL, 0, 7080000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-05-29 08:58:50'),
('dh_6a1ed042e0c65', 'DH921239', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5970000, 30000, NULL, 0, 6000000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-22 15:54:55'),
('dh_6a1ed042e1386', 'DH229636', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 1920000, 30000, NULL, 0, 1950000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-07 05:49:54'),
('dh_6a1ed042e17e9', 'DH486652', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-29 08:31:29'),
('dh_6a1ed042e2a3e', 'DH656034', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7500000, 30000, NULL, 0, 7530000, 'Thanh toán qua VNPAY', 0, 2, '2026-02-14 21:56:24'),
('dh_6a1ed042e34ac', 'DH210563', NULL, 'Khách hàng 62', '0900000062', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-29 22:59:37'),
('dh_6a1ed042e40c9', 'DH279447', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6030000, 30000, NULL, 0, 6060000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-26 22:14:24'),
('dh_6a1ed042e5975', 'DH891200', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-04-07 22:39:41'),
('dh_6a1ed042e628a', 'DH155732', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6100000, 30000, NULL, 0, 6130000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-16 15:14:40'),
('dh_6a1ed042e7316', 'DH529395', NULL, 'Khách hàng 80', '0900000080', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6510000, 30000, NULL, 0, 6540000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-19 16:47:21'),
('dh_6a1ed042e7d96', 'DH628810', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 10160000, 30000, NULL, 0, 10190000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-11 10:32:18'),
('dh_6a1ed042e97d1', 'DH415507', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 3750000, 30000, NULL, 0, 3780000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-02 09:32:35'),
('dh_6a1ed042eac30', 'DH964848', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 8760000, 30000, NULL, 0, 8790000, 'Thanh toán qua VNPAY', 0, 2, '2026-03-20 01:37:58'),
('dh_6a1ed042ebd04', 'DH406291', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5890000, 30000, NULL, 0, 5920000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-02 03:12:44'),
('dh_6a1ed042ed743', 'DH968553', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-02 05:31:41'),
('dh_6a1ed042edff4', 'DH769904', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5910000, 30000, NULL, 0, 5940000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-11 23:42:14'),
('dh_6a1ed042ee99e', 'DH558300', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6390000, 30000, NULL, 0, 6420000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-11 20:26:53'),
('dh_6a1ed042ef719', 'DH969809', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4370000, 30000, NULL, 0, 4400000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-30 13:39:48'),
('dh_6a1ed042f0820', 'DH534855', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5740000, 30000, NULL, 0, 5770000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-30 17:12:16'),
('dh_6a1ed042f130d', 'DH689343', NULL, 'Khách hàng 95', '0900000095', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2850000, 30000, NULL, 0, 2880000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-10 10:39:10'),
('dh_6a1ed042f2659', 'DH942548', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-03-11 17:30:58'),
('dh_6a1ed042f305f', 'DH898452', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2330000, 30000, NULL, 0, 2360000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-03 07:23:21'),
('dh_6a1ed043001eb', 'DH368469', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5940000, 30000, NULL, 0, 5970000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-06 19:20:04'),
('dh_6a1ed04300cba', 'DH906555', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-03-10 09:30:05'),
('dh_6a1ed043010c6', 'DH560687', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-30 17:09:45'),
('dh_6a1ed04301988', 'DH483283', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 6960000, 30000, NULL, 0, 6990000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-19 17:12:54'),
('dh_6a1ed04303043', 'DH514585', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4920000, 30000, NULL, 0, 4950000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-09 01:32:54'),
('dh_6a1ed04304949', 'DH520139', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7380000, 30000, NULL, 0, 7410000, 'Thanh toán qua VNPAY', 0, 0, '2026-05-02 13:42:47'),
('dh_6a1ed0430561d', 'DH692288', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1510000, 30000, NULL, 0, 1540000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-06 13:26:29'),
('dh_6a1ed04306361', 'DH134288', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-16 12:00:21'),
('dh_6a1ed04306cf5', 'DH344687', NULL, 'Khách hàng 91', '0900000091', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6510000, 30000, NULL, 0, 6540000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-28 02:39:41'),
('dh_6a1ed04307e68', 'DH675347', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4560000, 30000, NULL, 0, 4590000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-19 11:02:04'),
('dh_6a1ed04308c4c', 'DH702439', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5670000, 30000, NULL, 0, 5700000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-19 20:33:43'),
('dh_6a1ed0430a7bf', 'DH441558', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-30 04:22:43'),
('dh_6a1ed0430ae2f', 'DH605709', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9810000, 30000, NULL, 0, 9840000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-03-30 07:14:57'),
('dh_6a1ed0430b6b2', 'DH940302', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 10330000, 30000, NULL, 0, 10360000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-04 04:23:49'),
('dh_6a1ed0430d3f6', 'DH407035', NULL, 'Khách hàng 70', '0900000070', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 0, 2, '2026-03-24 15:25:29'),
('dh_6a1ed0430daff', 'DH175134', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-10 13:58:46'),
('dh_6a1ed0430df8f', 'DH394005', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2340000, 30000, NULL, 0, 2370000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-06 12:15:54'),
('dh_6a1ed0430e3d3', 'DH194984', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-22 21:34:08'),
('dh_6a1ed0430f466', 'DH591133', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6540000, 30000, NULL, 0, 6570000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-21 21:48:06'),
('dh_6a1ed04310713', 'DH554565', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 7170000, 30000, NULL, 0, 7200000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-31 08:36:28'),
('dh_6a1ed0431222a', 'DH126231', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6750000, 30000, NULL, 0, 6780000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-24 23:36:43'),
('dh_6a1ed04313b27', 'DH862827', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4370000, 30000, NULL, 0, 4400000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-02-11 10:25:11'),
('dh_6a1ed043146f0', 'DH838790', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7040000, 30000, NULL, 0, 7070000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-07 17:04:19'),
('dh_6a1ed04315606', 'DH762570', NULL, 'Khách hàng 32', '0900000032', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 3840000, 30000, NULL, 0, 3870000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-03 11:49:25'),
('dh_6a1ed04316c13', 'DH907824', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 7470000, 30000, NULL, 0, 7500000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-26 12:00:47'),
('dh_6a1ed04317681', 'DH620451', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 11160000, 30000, NULL, 0, 11190000, 'Thanh toán qua VNPAY', 0, 4, '2026-02-27 09:56:44'),
('dh_6a1ed04317c03', 'DH495504', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-06 02:08:54'),
('dh_6a1ed04318057', 'DH630655', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 9630000, 30000, NULL, 0, 9660000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-19 21:40:50'),
('dh_6a1ed04319b64', 'DH665486', NULL, 'Khách hàng 27', '0900000027', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 8790000, 30000, NULL, 0, 8820000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-14 16:07:32'),
('dh_6a1ed0431b3e0', 'DH834758', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 13080000, 30000, NULL, 0, 13110000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-07 14:44:30'),
('dh_6a1ed0431d441', 'DH302548', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-08 05:13:54'),
('dh_6a1ed0431e1fa', 'DH831438', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8400000, 30000, NULL, 0, 8430000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-18 11:27:04'),
('dh_6a1ed0431f263', 'DH214539', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4480000, 30000, NULL, 0, 4510000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-03 11:38:33'),
('dh_6a1ed04320b89', 'DH656795', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 1830000, 30000, NULL, 0, 1860000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-03 23:57:10'),
('dh_6a1ed04321d38', 'DH410351', NULL, 'Khách hàng 92', '0900000092', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2540000, 30000, NULL, 0, 2570000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-05-23 03:45:13'),
('dh_6a1ed04322823', 'DH768696', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8190000, 30000, NULL, 0, 8220000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-10 23:33:38'),
('dh_6a1ed04323478', 'DH950583', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6830000, 30000, NULL, 0, 6860000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-24 04:42:42'),
('dh_6a1ed04325775', 'DH642923', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 2880000, 30000, NULL, 0, 2910000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-28 21:19:53'),
('dh_6a1ed04326293', 'DH155096', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 12190000, 30000, NULL, 0, 12220000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-21 09:26:13'),
('dh_6a1ed04326ec9', 'DH695514', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 9630000, 30000, NULL, 0, 9660000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-05 23:40:29'),
('dh_6a1ed043289f6', 'DH152173', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-03 04:15:49'),
('dh_6a1ed04329cad', 'DH542243', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6660000, 30000, NULL, 0, 6690000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-04-13 10:49:29'),
('dh_6a1ed0432a2ef', 'DH989443', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 12780000, 30000, NULL, 0, 12810000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-05-30 20:46:24'),
('dh_6a1ed0432b5d3', 'DH974481', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-26 12:34:27'),
('dh_6a1ed0432c3a6', 'DH616489', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8340000, 30000, NULL, 0, 8370000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-11 18:11:01'),
('dh_6a1ed0432e2f0', 'DH231069', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4560000, 30000, NULL, 0, 4590000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-10 14:35:58'),
('dh_6a1ed0432f007', 'DH916447', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4920000, 30000, NULL, 0, 4950000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-22 09:31:41'),
('dh_6a1ed0433086b', 'DH674413', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2790000, 30000, NULL, 0, 2820000, 'Thanh toán qua VNPAY', 0, 0, '2026-01-30 16:10:54'),
('dh_6a1ed04331554', 'DH342918', NULL, 'Khách hàng 79', '0900000079', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 6660000, 30000, NULL, 0, 6690000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-14 02:41:45'),
('dh_6a1ed04332214', 'DH140298', NULL, 'Khách hàng 90', '0900000090', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4350000, 30000, NULL, 0, 4380000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-04 11:24:27'),
('dh_6a1ed04332cde', 'DH119954', NULL, 'Khách hàng 84', '0900000084', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 11280000, 30000, NULL, 0, 11310000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-26 05:04:18'),
('dh_6a1ed043348b6', 'DH900690', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1830000, 30000, NULL, 0, 1860000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-29 16:23:09'),
('dh_6a1ed04335b82', 'DH560644', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5340000, 30000, NULL, 0, 5370000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-09 08:47:41'),
('dh_6a1ed043375da', 'DH786951', NULL, 'Khách hàng 19', '0900000019', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7520000, 30000, NULL, 0, 7550000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-05-16 23:01:16'),
('dh_6a1ed043385d0', 'DH853825', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7110000, 30000, NULL, 0, 7140000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-01-12 05:41:15'),
('dh_6a1ed04338ef3', 'DH690291', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 8280000, 30000, NULL, 0, 8310000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-07 04:23:46'),
('dh_6a1ed04339501', 'DH942680', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 9060000, 30000, NULL, 0, 9090000, 'Thanh toán qua VNPAY', 0, 4, '2026-04-13 06:22:37'),
('dh_6a1ed0433999a', 'DH390224', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-24 06:12:36'),
('dh_6a1ed0433aad2', 'DH952510', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-14 01:45:49'),
('dh_6a1ed0433b23a', 'DH302700', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3780000, 30000, NULL, 0, 3810000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-19 18:29:00'),
('dh_6a1ed0433b8ee', 'DH695079', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6980000, 30000, NULL, 0, 7010000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-20 07:55:06'),
('dh_6a1ed0433da84', 'DH533851', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 0, 1, '2026-01-16 06:12:22'),
('dh_6a1ed0433e3c5', 'DH510623', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-06 18:45:33'),
('dh_6a1ed0433f09e', 'DH545899', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5070000, 30000, NULL, 0, 5100000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-01 21:16:34'),
('dh_6a1ed0433fe9f', 'DH466354', NULL, 'Khách hàng 88', '0900000088', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4010000, 30000, NULL, 0, 4040000, 'Thanh toán qua VNPAY', 0, 2, '2026-02-27 08:36:36'),
('dh_6a1ed04340ba8', 'DH828232', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3240000, 30000, NULL, 0, 3270000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-13 10:29:43'),
('dh_6a1ed043420ab', 'DH689722', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 9210000, 30000, NULL, 0, 9240000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-28 01:22:38'),
('dh_6a1ed04343c6c', 'DH488099', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3510000, 30000, NULL, 0, 3540000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-20 07:34:32'),
('dh_6a1ed043459e5', 'DH293246', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 2880000, 30000, NULL, 0, 2910000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-11 08:35:43'),
('dh_6a1ed0434695a', 'DH117970', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5400000, 30000, NULL, 0, 5430000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-25 00:30:01'),
('dh_6a1ed043479c5', 'DH482408', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4740000, 30000, NULL, 0, 4770000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-07 01:03:21'),
('dh_6a1ed04347ef6', 'DH665544', NULL, 'Khách hàng 90', '0900000090', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8970000, 30000, NULL, 0, 9000000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-19 00:39:02'),
('dh_6a1ed0434a5b2', 'DH336775', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 11070000, 30000, NULL, 0, 11100000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-15 19:58:57'),
('dh_6a1ed0434baed', 'DH241539', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4980000, 30000, NULL, 0, 5010000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-24 00:24:36'),
('dh_6a1ed0434ca72', 'DH340578', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-23 23:54:19'),
('dh_6a1ed0434d6e5', 'DH838490', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5070000, 30000, NULL, 0, 5100000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-17 23:15:19'),
('dh_6a1ed0434e6e9', 'DH280454', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-11 15:53:34'),
('dh_6a1ed0434f1c1', 'DH119973', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 960000, 30000, NULL, 0, 990000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-21 20:09:39'),
('dh_6a1ed0434ff6b', 'DH952112', NULL, 'Khách hàng 72', '0900000072', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-31 07:57:21'),
('dh_6a1ed04350e20', 'DH975162', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3780000, 30000, NULL, 0, 3810000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-08 14:22:43'),
('dh_6a1ed043525af', 'DH580010', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3840000, 30000, NULL, 0, 3870000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-14 16:19:06'),
('dh_6a1ed04352efe', 'DH920880', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-01-11 11:59:07'),
('dh_6a1ed043533b4', 'DH337875', NULL, 'Khách hàng 65', '0900000065', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-15 14:18:29'),
('dh_6a1ed04353d9c', 'DH797439', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Thanh toán qua VNPAY', 0, 4, '2026-05-25 03:10:44'),
('dh_6a1ed04354396', 'DH975730', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4320000, 30000, NULL, 0, 4350000, 'Thanh toán qua VNPAY', 0, 4, '2026-02-28 11:45:17'),
('dh_6a1ed043549e4', 'DH935907', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 10150000, 30000, NULL, 0, 10180000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-25 16:59:09'),
('dh_6a1ed043552e6', 'DH300273', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 11310000, 30000, NULL, 0, 11340000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-06-01 03:52:07'),
('dh_6a1ed04356067', 'DH282537', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5380000, 30000, NULL, 0, 5410000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-01-09 10:42:15'),
('dh_6a1ed04356dfd', 'DH537961', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-24 10:52:32'),
('dh_6a1ed04358020', 'DH805148', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-08 21:43:08'),
('dh_6a1ed04358d4e', 'DH877813', NULL, 'Khách hàng 14', '0900000014', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-10 14:50:48'),
('dh_6a1ed043599b3', 'DH625937', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 7710000, 30000, NULL, 0, 7740000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-05-25 01:41:33'),
('dh_6a1ed0435aa72', 'DH512728', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-14 02:08:54'),
('dh_6a1ed0435b1b5', 'DH465690', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-03-06 18:47:18'),
('dh_6a1ed0435b9ea', 'DH255411', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-24 19:51:11'),
('dh_6a1ed0435d288', 'DH720555', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-08 05:01:18'),
('dh_6a1ed0435defd', 'DH547432', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 11760000, 30000, NULL, 0, 11790000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-04 06:18:05'),
('dh_6a1ed0435f8c5', 'DH348323', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 4020000, 30000, NULL, 0, 4050000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-27 00:56:42'),
('dh_6a1ed04363ae0', 'DH832236', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 7830000, 30000, NULL, 0, 7860000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-23 17:05:51'),
('dh_6a1ed04366a74', 'DH544010', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8610000, 30000, NULL, 0, 8640000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-18 09:22:25'),
('dh_6a1ed04367b6f', 'DH880473', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-20 12:26:15'),
('dh_6a1ed0436826f', 'DH289333', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-01-11 13:20:13'),
('dh_6a1ed043691ba', 'DH927224', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 9570000, 30000, NULL, 0, 9600000, 'Thanh toán qua VNPAY', 0, 1, '2026-01-24 06:20:29'),
('dh_6a1ed0436a431', 'DH623182', NULL, 'Khách hàng 41', '0900000041', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 12780000, 30000, NULL, 0, 12810000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-18 20:39:30'),
('dh_6a1ed0436cb96', 'DH602368', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4760000, 30000, NULL, 0, 4790000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-11 06:55:53'),
('dh_6a1ed0436fa44', 'DH993251', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 7610000, 30000, NULL, 0, 7640000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-03-03 11:58:23'),
('dh_6a1ed04370c92', 'DH418906', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3040000, 30000, NULL, 0, 3070000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-17 00:54:01'),
('dh_6a1ed04371a9b', 'DH500446', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5660000, 30000, NULL, 0, 5690000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-05-27 05:03:02'),
('dh_6a1ed043723d4', 'DH780777', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-25 23:02:26'),
('dh_6a1ed04372af8', 'DH634258', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 10170000, 30000, NULL, 0, 10200000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-28 04:17:21'),
('dh_6a1ed043766f6', 'DH625495', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-20 02:57:29'),
('dh_6a1ed04377578', 'DH390345', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3510000, 30000, NULL, 0, 3540000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-02 03:14:36'),
('dh_6a1ed043794ca', 'DH729110', NULL, 'Khách hàng 84', '0900000084', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7860000, 30000, NULL, 0, 7890000, 'Thanh toán qua VNPAY', 0, 4, '2026-03-07 09:50:52'),
('dh_6a1ed0437ae46', 'DH154083', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6510000, 30000, NULL, 0, 6540000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-31 01:08:45'),
('dh_6a1ed0437d419', 'DH661869', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9270000, 30000, NULL, 0, 9300000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-27 08:46:56'),
('dh_6a1ed0437e7c3', 'DH320626', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7110000, 30000, NULL, 0, 7140000, 'Thanh toán qua VNPAY', 0, 1, '2026-04-01 11:54:48'),
('dh_6a1ed0437f0d7', 'DH681340', NULL, 'Khách hàng 61', '0900000061', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-18 03:12:40'),
('dh_6a1ed043808de', 'DH161079', NULL, 'Khách hàng 80', '0900000080', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-23 09:31:20'),
('dh_6a1ed04381537', 'DH505374', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 11250000, 30000, NULL, 0, 11280000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-07 17:57:58'),
('dh_6a1ed04384622', 'DH304930', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-04-08 14:37:29'),
('dh_6a1ed04386686', 'DH668238', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2340000, 30000, NULL, 0, 2370000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-02 00:59:27'),
('dh_6a1ed0438713d', 'DH590375', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5670000, 30000, NULL, 0, 5700000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-03 17:11:27'),
('dh_6a1ed04387d1d', 'DH217835', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4260000, 30000, NULL, 0, 4290000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-21 00:25:18'),
('dh_6a1ed04388b74', 'DH426724', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-13 17:41:06'),
('dh_6a1ed0438a416', 'DH211905', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-25 03:56:13'),
('dh_6a1ed0438adaf', 'DH664433', NULL, 'Khách hàng 92', '0900000092', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6570000, 30000, NULL, 0, 6600000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-13 14:47:27'),
('dh_6a1ed0438c288', 'DH572671', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 9090000, 30000, NULL, 0, 9120000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-18 12:58:23'),
('dh_6a1ed0438e35e', 'DH290487', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4740000, 30000, NULL, 0, 4770000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-09 05:25:54'),
('dh_6a1ed0438ec2a', 'DH375415', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 6780000, 30000, NULL, 0, 6810000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-04-29 10:55:33'),
('dh_6a1ed0438f58c', 'DH181401', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-05-19 02:08:51'),
('dh_6a1ed0438ff4c', 'DH986480', NULL, 'Khách hàng 14', '0900000014', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-29 11:30:05'),
('dh_6a1ed043910ee', 'DH520086', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1980000, 30000, NULL, 0, 2010000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-17 09:55:09'),
('dh_6a1ed04391a43', 'DH678633', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 1830000, 30000, NULL, 0, 1860000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-14 21:06:20'),
('dh_6a1ed04392d3f', 'DH364595', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 7890000, 30000, NULL, 0, 7920000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-11 12:45:58'),
('dh_6a1ed04394593', 'DH188495', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4750000, 30000, NULL, 0, 4780000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-16 14:21:56'),
('dh_6a1ed04396253', 'DH520787', NULL, 'Khách hàng 83', '0900000083', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-02 12:11:23'),
('dh_6a1ed04396751', 'DH166539', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 7560000, 30000, NULL, 0, 7590000, 'Thanh toán qua VNPAY', 0, 1, '2026-01-15 19:22:57'),
('dh_6a1ed04397733', 'DH776714', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5400000, 30000, NULL, 0, 5430000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-04-23 21:51:27'),
('dh_6a1ed043985df', 'DH259489', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 0, 1, '2026-02-03 01:58:43'),
('dh_6a1ed04398fce', 'DH437941', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8430000, 30000, NULL, 0, 8460000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-28 16:46:10'),
('dh_6a1ed04399ce7', 'DH977398', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 8940000, 30000, NULL, 0, 8970000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-24 09:14:54'),
('dh_6a1ed0439b398', 'DH366310', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3780000, 30000, NULL, 0, 3810000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-07 01:41:41'),
('dh_6a1ed0439c63f', 'DH739483', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 3730000, 30000, NULL, 0, 3760000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-04-29 13:44:37'),
('dh_6a1ed0439cc19', 'DH500547', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5220000, 30000, NULL, 0, 5250000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-13 06:40:31'),
('dh_6a1ed0439de7c', 'DH482685', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7050000, 30000, NULL, 0, 7080000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-04 00:32:08'),
('dh_6a1ed0439f81e', 'DH435885', NULL, 'Khách hàng 72', '0900000072', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3660000, 30000, NULL, 0, 3690000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-14 05:31:04'),
('dh_6a1ed0439fce3', 'DH230312', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-01-29 13:21:47'),
('dh_6a1ed043a0c48', 'DH198341', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 10170000, 30000, NULL, 0, 10200000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-13 17:55:39'),
('dh_6a1ed043a3771', 'DH679355', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5430000, 30000, NULL, 0, 5460000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-04-09 13:32:27'),
('dh_6a1ed043a46e6', 'DH581316', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7500000, 30000, NULL, 0, 7530000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-04 17:29:39'),
('dh_6a1ed043a5144', 'DH554524', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1520000, 30000, NULL, 0, 1550000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-09 01:58:32'),
('dh_6a1ed043a6334', 'DH156455', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-22 04:21:49'),
('dh_6a1ed043a6e45', 'DH556245', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7330000, 30000, NULL, 0, 7360000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-23 10:25:07'),
('dh_6a1ed043a7c6b', 'DH239230', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán qua VNPAY', 0, 4, '2026-04-08 14:37:04'),
('dh_6a1ed043a8459', 'DH705165', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4440000, 30000, NULL, 0, 4470000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-17 07:15:26'),
('dh_6a1ed043a97d7', 'DH291737', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-12 14:50:15'),
('dh_6a1ed043aa3b7', 'DH888618', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3950000, 30000, NULL, 0, 3980000, 'Thanh toán qua VNPAY', 0, 2, '2026-05-13 13:50:54'),
('dh_6a1ed043ab01c', 'DH638044', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Thanh toán qua VNPAY', 0, 1, '2026-05-07 17:38:58'),
('dh_6a1ed043ab908', 'DH769639', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 10530000, 30000, NULL, 0, 10560000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-28 19:10:38'),
('dh_6a1ed043ad756', 'DH161798', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán qua VNPAY', 0, 4, '2026-03-18 07:52:31'),
('dh_6a1ed043ae131', 'DH847158', NULL, 'Khách hàng 14', '0900000014', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5470000, 30000, NULL, 0, 5500000, 'Thanh toán qua VNPAY', 0, 4, '2026-05-12 04:45:10'),
('dh_6a1ed043aea3f', 'DH741815', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 9120000, 30000, NULL, 0, 9150000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-08 18:00:24'),
('dh_6a1ed043b08f4', 'DH672852', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7410000, 30000, NULL, 0, 7440000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-04 21:42:52'),
('dh_6a1ed043b33ed', 'DH549298', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 7800000, 30000, NULL, 0, 7830000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-31 10:29:39'),
('dh_6a1ed043b47e4', 'DH919181', NULL, 'Khách hàng 95', '0900000095', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5400000, 30000, NULL, 0, 5430000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-02 13:18:07'),
('dh_6a1ed043b6c0f', 'DH579987', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-12 23:32:00'),
('dh_6a1ed043b7d1e', 'DH839564', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-01 14:26:48'),
('dh_6a1ed043b8618', 'DH132854', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4620000, 30000, NULL, 0, 4650000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-18 02:05:07'),
('dh_6a1ed043b8d5d', 'DH551242', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2860000, 30000, NULL, 0, 2890000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-27 08:39:45'),
('dh_6a1ed043b9318', 'DH800410', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 13210000, 30000, NULL, 0, 13240000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-20 17:57:50'),
('dh_6a1ed043bb2b4', 'DH545244', NULL, 'Khách hàng 15', '0900000015', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2640000, 30000, NULL, 0, 2670000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-30 21:44:33'),
('dh_6a1ed043bc22f', 'DH795267', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 7470000, 30000, NULL, 0, 7500000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-03 11:50:56'),
('dh_6a1ed043bda57', 'DH349846', NULL, 'Khách hàng 69', '0900000069', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 11110000, 30000, NULL, 0, 11140000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-03-24 20:05:21'),
('dh_6a1ed043bebb8', 'DH220176', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 6650000, 30000, NULL, 0, 6680000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-25 08:19:46'),
('dh_6a1ed043c0331', 'DH129374', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7380000, 30000, NULL, 0, 7410000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-10 07:55:35'),
('dh_6a1ed043c26a8', 'DH497608', NULL, 'Khách hàng 61', '0900000061', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4660000, 30000, NULL, 0, 4690000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-28 21:17:15'),
('dh_6a1ed043c42fb', 'DH838354', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 10530000, 30000, NULL, 0, 10560000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-04-12 05:43:19'),
('dh_6a1ed043c517f', 'DH557903', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6750000, 30000, NULL, 0, 6780000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-14 01:12:59'),
('dh_6a1ed043c5dc7', 'DH469189', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 6980000, 30000, NULL, 0, 7010000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-23 13:12:15'),
('dh_6a1ed043c7164', 'DH510735', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3870000, 30000, NULL, 0, 3900000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-26 15:53:11'),
('dh_6a1ed043c807e', 'DH950937', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6330000, 30000, NULL, 0, 6360000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-16 05:07:28'),
('dh_6a1ed043c9a6a', 'DH500814', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-14 09:59:32'),
('dh_6a1ed043ca82e', 'DH452431', NULL, 'Khách hàng 72', '0900000072', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-03 12:56:06'),
('dh_6a1ed043cb53c', 'DH627253', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8260000, 30000, NULL, 0, 8290000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-04 06:33:46'),
('dh_6a1ed043cc136', 'DH387594', NULL, 'Khách hàng 62', '0900000062', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8310000, 30000, NULL, 0, 8340000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-26 10:21:29'),
('dh_6a1ed043ccc06', 'DH995451', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1830000, 30000, NULL, 0, 1860000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-16 11:24:25');
INSERT INTO `don_hang` (`id`, `ma_don_hang`, `id_nguoi_dung`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_giao_hang`, `ghi_chu`, `tong_tien`, `phi_ship`, `id_voucher`, `tien_giam_gia`, `thanh_tien`, `pt_thanh_toan`, `trang_thai_thanh_toan`, `trang_thai_don_hang`, `ngay_tao`) VALUES
('dh_6a1ed043cdd74', 'DH592297', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 8130000, 30000, NULL, 0, 8160000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-11 06:14:18'),
('dh_6a1ed043ceeeb', 'DH616853', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7820000, 30000, NULL, 0, 7850000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-09 06:08:41'),
('dh_6a1ed043d0a2d', 'DH951810', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 12870000, 30000, NULL, 0, 12900000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-22 14:46:43'),
('dh_6a1ed043d334b', 'DH890427', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2970000, 30000, NULL, 0, 3000000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-15 13:00:55'),
('dh_6a1ed043d3d5e', 'DH909675', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5000000, 30000, NULL, 0, 5030000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-09 11:19:53'),
('dh_6a1ed043d47da', 'DH511749', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9600000, 30000, NULL, 0, 9630000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-07 14:24:14'),
('dh_6a1ed043d5533', 'DH721718', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 10650000, 30000, NULL, 0, 10680000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-14 17:38:05'),
('dh_6a1ed043d8055', 'DH990768', NULL, 'Khách hàng 43', '0900000043', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5670000, 30000, NULL, 0, 5700000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-24 09:47:40'),
('dh_6a1ed043d95b5', 'DH623730', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3510000, 30000, NULL, 0, 3540000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-01-07 04:08:15'),
('dh_6a1ed043da068', 'DH525243', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-05-27 21:15:17'),
('dh_6a1ed043dabd4', 'DH621228', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-28 20:33:13'),
('dh_6a1ed043db67f', 'DH372176', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 10470000, 30000, NULL, 0, 10500000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-01 18:53:16'),
('dh_6a1ed043dd017', 'DH959171', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3660000, 30000, NULL, 0, 3690000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-03-29 07:10:34'),
('dh_6a1ed043dd952', 'DH539128', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 10590000, 30000, NULL, 0, 10620000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-19 18:22:47'),
('dh_6a1ed043df570', 'DH852075', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-29 20:08:19'),
('dh_6a1ed043e0b61', 'DH675558', NULL, 'Khách hàng 1', '0900000001', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 13350000, 30000, NULL, 0, 13380000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-16 08:26:48'),
('dh_6a1ed043e2901', 'DH108000', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-16 03:41:07'),
('dh_6a1ed043e40d3', 'DH486677', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 10120000, 30000, NULL, 0, 10150000, 'Thanh toán qua VNPAY', 0, 0, '2026-04-08 09:30:50'),
('dh_6a1ed043e54e0', 'DH439980', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 9210000, 30000, NULL, 0, 9240000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-13 23:02:46'),
('dh_6a1ed043e6d28', 'DH707040', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-02-23 02:03:27'),
('dh_6a1ed043e7921', 'DH788559', NULL, 'Khách hàng 41', '0900000041', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 7920000, 30000, NULL, 0, 7950000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-25 18:25:57'),
('dh_6a1ed043ea97a', 'DH826582', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3690000, 30000, NULL, 0, 3720000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-20 23:27:57'),
('dh_6a1ed043ebbc1', 'DH320458', NULL, 'Khách hàng 88', '0900000088', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-10 21:46:59'),
('dh_6a1ed043ee003', 'DH641218', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-05-27 02:02:55'),
('dh_6a1ed043eea4c', 'DH645363', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-10 11:52:54'),
('dh_6a1ed043efc66', 'DH181807', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 12690000, 30000, NULL, 0, 12720000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-11 13:13:13'),
('dh_6a1ed043f0e12', 'DH698407', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3570000, 30000, NULL, 0, 3600000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-28 13:50:49'),
('dh_6a1ed043f2bd1', 'DH471404', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 13660000, 30000, NULL, 0, 13690000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-05-28 14:10:08'),
('dh_6a1ed043f4200', 'DH681908', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6570000, 30000, NULL, 0, 6600000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-22 02:27:43'),
('dh_6a1ed044013b1', 'DH927478', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5850000, 30000, NULL, 0, 5880000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-08 18:44:29'),
('dh_6a1ed0440204a', 'DH156989', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 10560000, 30000, NULL, 0, 10590000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-24 15:50:06'),
('dh_6a1ed04403b79', 'DH148347', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7410000, 30000, NULL, 0, 7440000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-29 16:58:27'),
('dh_6a1ed04404649', 'DH229899', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7780000, 30000, NULL, 0, 7810000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-31 03:31:53'),
('dh_6a1ed0440618e', 'DH215692', NULL, 'Khách hàng 56', '0900000056', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Thanh toán qua VNPAY', 0, 2, '2026-05-26 07:56:29'),
('dh_6a1ed0440693f', 'DH537868', NULL, 'Khách hàng 4', '0900000004', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5070000, 30000, NULL, 0, 5100000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-04-08 10:34:20'),
('dh_6a1ed04406e9b', 'DH107931', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-11 16:51:57'),
('dh_6a1ed04407bf7', 'DH395032', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 9270000, 30000, NULL, 0, 9300000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-30 17:30:56'),
('dh_6a1ed04409b8f', 'DH991270', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7140000, 30000, NULL, 0, 7170000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-08 12:45:01'),
('dh_6a1ed0440ac66', 'DH356923', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-24 06:28:55'),
('dh_6a1ed0440c5c1', 'DH528545', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6960000, 30000, NULL, 0, 6990000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-02 04:54:27'),
('dh_6a1ed0440d8f2', 'DH744051', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 9300000, 30000, NULL, 0, 9330000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-11 14:58:30'),
('dh_6a1ed0440ead1', 'DH948688', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-05 12:40:31'),
('dh_6a1ed0440f8dd', 'DH352463', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 12870000, 30000, NULL, 0, 12900000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-15 12:19:56'),
('dh_6a1ed04411b11', 'DH134087', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-11 19:04:16'),
('dh_6a1ed044122ef', 'DH773591', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6390000, 30000, NULL, 0, 6420000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 03:11:52'),
('dh_6a1ed044133b9', 'DH879478', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5130000, 30000, NULL, 0, 5160000, 'Thanh toán qua VNPAY', 0, 4, '2026-04-29 23:19:36'),
('dh_6a1ed044146ca', 'DH488105', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 12360000, 30000, NULL, 0, 12390000, 'Thanh toán qua VNPAY', 0, 0, '2026-05-08 23:30:00'),
('dh_6a1ed0441592f', 'DH865357', NULL, 'Khách hàng 79', '0900000079', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2220000, 30000, NULL, 0, 2250000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-26 02:57:53'),
('dh_6a1ed04416372', 'DH386896', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 10020000, 30000, NULL, 0, 10050000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-07 14:01:06'),
('dh_6a1ed04418381', 'DH239748', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-03-18 12:46:00'),
('dh_6a1ed0441930d', 'DH136944', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7590000, 30000, NULL, 0, 7620000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-23 13:26:17'),
('dh_6a1ed0441a712', 'DH661070', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 10470000, 30000, NULL, 0, 10500000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-19 09:49:34'),
('dh_6a1ed0441b236', 'DH982259', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2140000, 30000, NULL, 0, 2170000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-23 15:54:30'),
('dh_6a1ed0441c13a', 'DH992395', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 10140000, 30000, NULL, 0, 10170000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-21 19:42:56'),
('dh_6a1ed0441dc6e', 'DH292007', NULL, 'Khách hàng 84', '0900000084', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7140000, 30000, NULL, 0, 7170000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-16 22:10:21'),
('dh_6a1ed0441f03a', 'DH705869', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-27 00:19:30'),
('dh_6a1ed044201a9', 'DH506021', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-10 19:04:59'),
('dh_6a1ed04421c6b', 'DH605719', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3510000, 30000, NULL, 0, 3540000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-19 16:55:20'),
('dh_6a1ed04422155', 'DH834015', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 12120000, 30000, NULL, 0, 12150000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-13 20:17:45'),
('dh_6a1ed04422f22', 'DH220016', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 1830000, 30000, NULL, 0, 1860000, 'Thanh toán qua VNPAY', 0, 2, '2026-03-22 03:46:37'),
('dh_6a1ed04423a12', 'DH176920', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3420000, 30000, NULL, 0, 3450000, 'Thanh toán qua VNPAY', 0, 2, '2026-03-10 20:36:50'),
('dh_6a1ed04424302', 'DH662166', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8320000, 30000, NULL, 0, 8350000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-03 03:12:39'),
('dh_6a1ed044253f0', 'DH379588', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8310000, 30000, NULL, 0, 8340000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-20 01:35:04'),
('dh_6a1ed04426d38', 'DH634260', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-31 01:38:37'),
('dh_6a1ed044279f8', 'DH913793', NULL, 'Khách hàng 14', '0900000014', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-05-17 01:13:39'),
('dh_6a1ed04427f92', 'DH730458', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-07 09:40:23'),
('dh_6a1ed04428408', 'DH141578', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-20 16:47:29'),
('dh_6a1ed0442984b', 'DH972347', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 9720000, 30000, NULL, 0, 9750000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-16 12:24:16'),
('dh_6a1ed0442b505', 'DH826835', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-22 19:16:51'),
('dh_6a1ed0442be36', 'DH477416', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-31 00:43:28'),
('dh_6a1ed0442d203', 'DH347354', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5280000, 30000, NULL, 0, 5310000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-02 08:17:53'),
('dh_6a1ed0442edd2', 'DH268255', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6780000, 30000, NULL, 0, 6810000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-07 16:22:46'),
('dh_6a1ed044303b0', 'DH703681', NULL, 'Khách hàng 69', '0900000069', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-03-10 08:42:44'),
('dh_6a1ed0443119d', 'DH223602', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-29 23:11:26'),
('dh_6a1ed04431f53', 'DH928449', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 960000, 30000, NULL, 0, 990000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-06-02 04:23:27'),
('dh_6a1ed04432cc1', 'DH321063', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4800000, 30000, NULL, 0, 4830000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-11 11:13:21'),
('dh_6a1ed04433bfe', 'DH843001', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 0, 2, '2026-01-31 12:32:51'),
('dh_6a1ed044345f0', 'DH674284', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 3240000, 30000, NULL, 0, 3270000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-02 07:44:50'),
('dh_6a1ed044358f1', 'DH941434', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8970000, 30000, NULL, 0, 9000000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-25 18:56:49'),
('dh_6a1ed04437981', 'DH268971', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8040000, 30000, NULL, 0, 8070000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-05 22:53:35'),
('dh_6a1ed04437f79', 'DH459838', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6210000, 30000, NULL, 0, 6240000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-26 04:04:23'),
('dh_6a1ed04438f3e', 'DH507816', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 8130000, 30000, NULL, 0, 8160000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-26 21:25:23'),
('dh_6a1ed0443a994', 'DH435186', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-19 10:26:13'),
('dh_6a1ed0443b5a5', 'DH737676', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1920000, 30000, NULL, 0, 1950000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-24 08:35:34'),
('dh_6a1ed0443c21c', 'DH201992', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-04 13:24:22'),
('dh_6a1ed0443e3cc', 'DH891046', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5250000, 30000, NULL, 0, 5280000, 'Thanh toán qua VNPAY', 0, 4, '2026-03-11 23:12:32'),
('dh_6a1ed0443f0f7', 'DH306118', NULL, 'Khách hàng 32', '0900000032', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6540000, 30000, NULL, 0, 6570000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-27 11:48:31'),
('dh_6a1ed0444027e', 'DH531725', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 10530000, 30000, NULL, 0, 10560000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-19 05:18:10'),
('dh_6a1ed04441eb1', 'DH402531', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-12 23:40:08'),
('dh_6a1ed04442c39', 'DH774681', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5940000, 30000, NULL, 0, 5970000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-03-07 04:35:30'),
('dh_6a1ed0444340a', 'DH977714', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7890000, 30000, NULL, 0, 7920000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-23 21:40:07'),
('dh_6a1ed04444897', 'DH889968', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7680000, 30000, NULL, 0, 7710000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-10 08:11:18'),
('dh_6a1ed04445cbb', 'DH999103', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8370000, 30000, NULL, 0, 8400000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-18 16:37:37'),
('dh_6a1ed04447497', 'DH425917', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 11100000, 30000, NULL, 0, 11130000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-01 03:58:43'),
('dh_6a1ed04448694', 'DH211934', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 10140000, 30000, NULL, 0, 10170000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-02-03 16:04:48'),
('dh_6a1ed0444995c', 'DH576415', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7800000, 30000, NULL, 0, 7830000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-16 17:48:21'),
('dh_6a1ed0444a677', 'DH735548', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6360000, 30000, NULL, 0, 6390000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-19 02:28:45'),
('dh_6a1ed0444b604', 'DH723153', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1410000, 30000, NULL, 0, 1440000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-01 17:06:26'),
('dh_6a1ed0444c3bf', 'DH101217', NULL, 'Khách hàng 32', '0900000032', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-22 14:12:02'),
('dh_6a1ed0444d082', 'DH714241', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 6720000, 30000, NULL, 0, 6750000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-01-26 12:38:46'),
('dh_6a1ed0444e13b', 'DH962826', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 11390000, 30000, NULL, 0, 11420000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-07 06:10:20'),
('dh_6a1ed0444faf2', 'DH523451', NULL, 'Khách hàng 4', '0900000004', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 8190000, 30000, NULL, 0, 8220000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-19 15:48:10'),
('dh_6a1ed04451c1f', 'DH398170', NULL, 'Khách hàng 62', '0900000062', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-23 03:25:28'),
('dh_6a1ed044520f3', 'DH621025', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 0, 2, '2026-05-11 23:41:28'),
('dh_6a1ed044525f4', 'DH557846', NULL, 'Khách hàng 79', '0900000079', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-23 13:08:41'),
('dh_6a1ed044538c4', 'DH800201', NULL, 'Khách hàng 15', '0900000015', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 10890000, 30000, NULL, 0, 10920000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-06 09:17:22'),
('dh_6a1ed0445592b', 'DH734596', NULL, 'Khách hàng 80', '0900000080', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4830000, 30000, NULL, 0, 4860000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-05 01:59:23'),
('dh_6a1ed044569e3', 'DH491178', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7230000, 30000, NULL, 0, 7260000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-18 12:45:15'),
('dh_6a1ed044583c5', 'DH973736', NULL, 'Khách hàng 15', '0900000015', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 7230000, 30000, NULL, 0, 7260000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-20 14:45:38'),
('dh_6a1ed044596c0', 'DH183830', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 9520000, 30000, NULL, 0, 9550000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-03 08:51:38'),
('dh_6a1ed0445b76e', 'DH978363', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6180000, 30000, NULL, 0, 6210000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-15 21:25:46'),
('dh_6a1ed0445cb35', 'DH920798', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3690000, 30000, NULL, 0, 3720000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-02 09:26:45'),
('dh_6a1ed0445d890', 'DH327606', NULL, 'Khách hàng 84', '0900000084', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5310000, 30000, NULL, 0, 5340000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-24 13:50:15'),
('dh_6a1ed0445e7c6', 'DH524495', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4900000, 30000, NULL, 0, 4930000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-05-03 18:32:08'),
('dh_6a1ed0445f911', 'DH735296', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2640000, 30000, NULL, 0, 2670000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-27 07:10:03'),
('dh_6a1ed04460837', 'DH708524', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-22 01:50:09'),
('dh_6a1ed044617af', 'DH949722', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4720000, 30000, NULL, 0, 4750000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-02-02 12:01:28'),
('dh_6a1ed0446281b', 'DH316471', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 2160000, 30000, NULL, 0, 2190000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-27 08:48:35'),
('dh_6a1ed04463c95', 'DH828242', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 8280000, 30000, NULL, 0, 8310000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-12 23:23:46'),
('dh_6a1ed0446539e', 'DH936869', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8110000, 30000, NULL, 0, 8140000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-01-06 18:03:09'),
('dh_6a1ed04465b35', 'DH183402', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1410000, 30000, NULL, 0, 1440000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-02-17 09:52:41'),
('dh_6a1ed044664cd', 'DH279423', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6480000, 30000, NULL, 0, 6510000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-02 02:30:51'),
('dh_6a1ed04468f74', 'DH766829', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4440000, 30000, NULL, 0, 4470000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-02-02 07:03:32'),
('dh_6a1ed04469670', 'DH118410', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 7290000, 30000, NULL, 0, 7320000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-22 21:37:13'),
('dh_6a1ed0446b604', 'DH743849', NULL, 'Khách hàng 19', '0900000019', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6050000, 30000, NULL, 0, 6080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-02 10:36:44'),
('dh_6a1ed0446c8ba', 'DH814267', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5900000, 30000, NULL, 0, 5930000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-07 13:43:49'),
('dh_6a1ed0446d67a', 'DH392164', NULL, 'Khách hàng 91', '0900000091', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6510000, 30000, NULL, 0, 6540000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-04-16 22:58:15'),
('dh_6a1ed0446e42e', 'DH466379', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5710000, 30000, NULL, 0, 5740000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-08 02:50:22'),
('dh_6a1ed04471126', 'DH833297', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-04 04:39:03'),
('dh_6a1ed04471bc7', 'DH421264', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 9690000, 30000, NULL, 0, 9720000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-31 16:04:34'),
('dh_6a1ed044735b4', 'DH901583', NULL, 'Khách hàng 89', '0900000089', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5940000, 30000, NULL, 0, 5970000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-11 17:26:27'),
('dh_6a1ed0447507c', 'DH542432', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4620000, 30000, NULL, 0, 4650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-07 22:47:20'),
('dh_6a1ed044760fc', 'DH488009', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5470000, 30000, NULL, 0, 5500000, 'Thanh toán qua VNPAY', 0, 0, '2026-04-11 08:46:12'),
('dh_6a1ed04476f09', 'DH760349', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 8940000, 30000, NULL, 0, 8970000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-23 19:38:06'),
('dh_6a1ed04479111', 'DH667012', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8460000, 30000, NULL, 0, 8490000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-03-31 07:35:50'),
('dh_6a1ed04479949', 'DH456562', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5850000, 30000, NULL, 0, 5880000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-12 08:21:50'),
('dh_6a1ed0447b9b6', 'DH773896', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 6690000, 30000, NULL, 0, 6720000, 'Thanh toán qua VNPAY', 0, 4, '2026-04-28 20:56:06'),
('dh_6a1ed0447ce70', 'DH302260', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 12420000, 30000, NULL, 0, 12450000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-20 08:54:15'),
('dh_6a1ed0447e00f', 'DH517656', NULL, 'Khách hàng 62', '0900000062', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-29 18:49:45'),
('dh_6a1ed0447f3a0', 'DH803528', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-05 15:02:04'),
('dh_6a1ed04480113', 'DH953028', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 10630000, 30000, NULL, 0, 10660000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-13 19:38:50'),
('dh_6a1ed04481991', 'DH115071', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 9420000, 30000, NULL, 0, 9450000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-06 10:47:54'),
('dh_6a1ed044829db', 'DH593839', NULL, 'Khách hàng 90', '0900000090', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4110000, 30000, NULL, 0, 4140000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-14 18:12:25'),
('dh_6a1ed04483d7d', 'DH278042', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1510000, 30000, NULL, 0, 1540000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-14 21:09:33'),
('dh_6a1ed04484a54', 'DH800455', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 790000, 30000, NULL, 0, 820000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-23 00:19:53'),
('dh_6a1ed04485309', 'DH532155', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7470000, 30000, NULL, 0, 7500000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-27 11:29:32'),
('dh_6a1ed0448634c', 'DH363135', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7080000, 30000, NULL, 0, 7110000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-27 03:13:31'),
('dh_6a1ed04487c5a', 'DH625571', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-08 19:05:51'),
('dh_6a1ed04488843', 'DH211174', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5920000, 30000, NULL, 0, 5950000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-11 12:17:35'),
('dh_6a1ed04489d9a', 'DH628305', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8790000, 30000, NULL, 0, 8820000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-26 18:12:21'),
('dh_6a1ed0448bb5f', 'DH681632', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5190000, 30000, NULL, 0, 5220000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-12 09:26:51'),
('dh_6a1ed0448cfe2', 'DH462947', NULL, 'Khách hàng 84', '0900000084', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-04 14:10:55'),
('dh_6a1ed0448d5eb', 'DH536582', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 9020000, 30000, NULL, 0, 9050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-14 19:22:07'),
('dh_6a1ed0448f702', 'DH228381', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3020000, 30000, NULL, 0, 3050000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-17 22:38:00'),
('dh_6a1ed044900b8', 'DH146327', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 9660000, 30000, NULL, 0, 9690000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-04-04 08:06:01'),
('dh_6a1ed044909f3', 'DH936443', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 6750000, 30000, NULL, 0, 6780000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-04-05 09:15:36'),
('dh_6a1ed04491b39', 'DH290107', NULL, 'Khách hàng 89', '0900000089', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-29 22:31:35'),
('dh_6a1ed04492834', 'DH490898', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5100000, 30000, NULL, 0, 5130000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-05 15:17:40'),
('dh_6a1ed04493b14', 'DH121642', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-23 06:51:22'),
('dh_6a1ed044945cb', 'DH889160', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5070000, 30000, NULL, 0, 5100000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-30 08:03:24'),
('dh_6a1ed044958e4', 'DH845166', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-01 15:57:14'),
('dh_6a1ed04496648', 'DH355455', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-05 17:52:16'),
('dh_6a1ed04496fe6', 'DH805688', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5760000, 30000, NULL, 0, 5790000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-09 06:25:46'),
('dh_6a1ed044977e3', 'DH936837', NULL, 'Khách hàng 95', '0900000095', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8670000, 30000, NULL, 0, 8700000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-05 00:09:55'),
('dh_6a1ed0449924a', 'DH261659', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán qua VNPAY', 0, 1, '2026-01-21 10:11:15'),
('dh_6a1ed04499ccb', 'DH578027', NULL, 'Khách hàng 46', '0900000046', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5400000, 30000, NULL, 0, 5430000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-29 21:02:52'),
('dh_6a1ed0449b9f4', 'DH702950', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-26 10:46:35'),
('dh_6a1ed0449cdb5', 'DH224338', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6470000, 30000, NULL, 0, 6500000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-25 15:51:13'),
('dh_6a1ed0449e1b3', 'DH633804', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 9420000, 30000, NULL, 0, 9450000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-02 04:58:20'),
('dh_6a1ed0449f342', 'DH461717', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5400000, 30000, NULL, 0, 5430000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-23 18:47:52'),
('dh_6a1ed044a0e2c', 'DH809738', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4980000, 30000, NULL, 0, 5010000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-04-18 00:42:00'),
('dh_6a1ed044a241a', 'DH202348', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-02 04:50:06'),
('dh_6a1ed044a3204', 'DH610202', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3720000, 30000, NULL, 0, 3750000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-03-06 21:21:40'),
('dh_6a1ed044a3c2c', 'DH153988', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-10 02:50:30'),
('dh_6a1ed044a4908', 'DH377599', NULL, 'Khách hàng 4', '0900000004', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-15 19:16:48'),
('dh_6a1ed044a5702', 'DH684446', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8890000, 30000, NULL, 0, 8920000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-27 23:08:14'),
('dh_6a1ed044a6e29', 'DH350116', NULL, 'Khách hàng 70', '0900000070', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4740000, 30000, NULL, 0, 4770000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-20 06:15:22'),
('dh_6a1ed044a7ad0', 'DH822259', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 5250000, 30000, NULL, 0, 5280000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-28 10:17:53'),
('dh_6a1ed044a8229', 'DH626845', NULL, 'Khách hàng 41', '0900000041', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 11630000, 30000, NULL, 0, 11660000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-18 18:19:00'),
('dh_6a1ed044a9310', 'DH462998', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 10890000, 30000, NULL, 0, 10920000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-09 13:20:51'),
('dh_6a1ed044ab113', 'DH242122', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3620000, 30000, NULL, 0, 3650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-25 01:41:08'),
('dh_6a1ed044ac60d', 'DH192624', NULL, 'Khách hàng 42', '0900000042', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 9780000, 30000, NULL, 0, 9810000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-11 18:34:27'),
('dh_6a1ed044ae356', 'DH356321', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 8580000, 30000, NULL, 0, 8610000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-10 19:30:28'),
('dh_6a1ed044aedaf', 'DH322766', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Thanh toán qua VNPAY', 0, 0, '2026-02-01 12:41:51'),
('dh_6a1ed044afb09', 'DH487662', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 8120000, 30000, NULL, 0, 8150000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-03-13 02:01:05'),
('dh_6a1ed044b0ab3', 'DH410512', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1410000, 30000, NULL, 0, 1440000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-13 20:06:11'),
('dh_6a1ed044b182d', 'DH223304', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 9090000, 30000, NULL, 0, 9120000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-02-09 05:57:59'),
('dh_6a1ed044b2173', 'DH880395', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 7360000, 30000, NULL, 0, 7390000, 'Thanh toán qua VNPAY', 0, 0, '2026-04-26 14:25:38'),
('dh_6a1ed044b2e62', 'DH107187', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8910000, 30000, NULL, 0, 8940000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-10 06:14:53'),
('dh_6a1ed044b495b', 'DH634388', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7440000, 30000, NULL, 0, 7470000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-20 18:12:04'),
('dh_6a1ed044b5d1d', 'DH825672', NULL, 'Khách hàng 14', '0900000014', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6570000, 30000, NULL, 0, 6600000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-03 02:19:34'),
('dh_6a1ed044b72b6', 'DH938024', NULL, 'Khách hàng 22', '0900000022', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 6750000, 30000, NULL, 0, 6780000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-11 14:17:16'),
('dh_6a1ed044b83f0', 'DH654018', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8480000, 30000, NULL, 0, 8510000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-16 18:12:05'),
('dh_6a1ed044b9c2e', 'DH212468', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-16 01:35:31'),
('dh_6a1ed044bb318', 'DH823394', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2340000, 30000, NULL, 0, 2370000, 'Thanh toán qua VNPAY', 0, 4, '2026-02-28 08:43:44'),
('dh_6a1ed044bbd7d', 'DH983324', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-03-06 03:00:34'),
('dh_6a1ed044bcb96', 'DH307957', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7440000, 30000, NULL, 0, 7470000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-04-07 23:17:48'),
('dh_6a1ed044bd2d5', 'DH330410', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4620000, 30000, NULL, 0, 4650000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-03-05 04:06:23'),
('dh_6a1ed044be87e', 'DH348761', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-02-20 07:13:54'),
('dh_6a1ed044bf247', 'DH591691', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 9720000, 30000, NULL, 0, 9750000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-07 04:56:11'),
('dh_6a1ed044c0db2', 'DH141442', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8280000, 30000, NULL, 0, 8310000, 'Thanh toán qua VNPAY', 0, 4, '2026-03-27 11:30:21'),
('dh_6a1ed044c12be', 'DH630317', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3510000, 30000, NULL, 0, 3540000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-19 17:30:19'),
('dh_6a1ed044c22d3', 'DH304216', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3690000, 30000, NULL, 0, 3720000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-05-24 23:06:28'),
('dh_6a1ed044c3025', 'DH929448', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-06 18:31:44'),
('dh_6a1ed044c45a7', 'DH129665', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5340000, 30000, NULL, 0, 5370000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-06 11:00:54'),
('dh_6a1ed044c603f', 'DH175354', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3810000, 30000, NULL, 0, 3840000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-19 13:17:26'),
('dh_6a1ed044c7a84', 'DH674938', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-20 13:26:22'),
('dh_6a1ed044c899a', 'DH483203', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 5850000, 30000, NULL, 0, 5880000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-05 05:13:39'),
('dh_6a1ed044c9d66', 'DH364522', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-02 01:58:47'),
('dh_6a1ed044caa6e', 'DH746173', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-05-28 23:26:05'),
('dh_6a1ed044cb78a', 'DH888485', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3690000, 30000, NULL, 0, 3720000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-18 23:00:26'),
('dh_6a1ed044cc428', 'DH941549', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6690000, 30000, NULL, 0, 6720000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-01-21 15:34:25'),
('dh_6a1ed044cd7f8', 'DH359730', NULL, 'Khách hàng 88', '0900000088', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 12420000, 30000, NULL, 0, 12450000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-19 09:01:01'),
('dh_6a1ed044cf788', 'DH120965', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1920000, 30000, NULL, 0, 1950000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-13 00:43:46'),
('dh_6a1ed044cfd2c', 'DH701295', NULL, 'Khách hàng 82', '0900000082', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 11750000, 30000, NULL, 0, 11780000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-20 05:18:36'),
('dh_6a1ed044d2759', 'DH674230', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-08 09:40:27'),
('dh_6a1ed044d316a', 'DH626672', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2980000, 30000, NULL, 0, 3010000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-30 03:33:13'),
('dh_6a1ed044d39ce', 'DH761391', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8730000, 30000, NULL, 0, 8760000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-01-23 08:04:38'),
('dh_6a1ed044d4a17', 'DH821944', NULL, 'Khách hàng 80', '0900000080', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6120000, 30000, NULL, 0, 6150000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-15 04:38:21'),
('dh_6a1ed044d5d80', 'DH974198', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1410000, 30000, NULL, 0, 1440000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-15 15:24:14'),
('dh_6a1ed044d6a3c', 'DH157057', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2880000, 30000, NULL, 0, 2910000, 'Thanh toán qua VNPAY', 0, 0, '2026-02-08 07:15:03'),
('dh_6a1ed044d7428', 'DH730778', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5130000, 30000, NULL, 0, 5160000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-11 21:18:49'),
('dh_6a1ed044d7f10', 'DH558080', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2540000, 30000, NULL, 0, 2570000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-18 19:20:16'),
('dh_6a1ed044d8aa6', 'DH335479', NULL, 'Khách hàng 27', '0900000027', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4080000, 30000, NULL, 0, 4110000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-07 05:05:12'),
('dh_6a1ed044d9f09', 'DH198114', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-23 00:11:37'),
('dh_6a1ed044da851', 'DH502110', NULL, 'Khách hàng 72', '0900000072', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3360000, 30000, NULL, 0, 3390000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-15 16:51:36'),
('dh_6a1ed044db01d', 'DH605000', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 8100000, 30000, NULL, 0, 8130000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-10 04:52:31'),
('dh_6a1ed044dc2f2', 'DH765900', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6250000, 30000, NULL, 0, 6280000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-28 22:15:33'),
('dh_6a1ed044ddcc7', 'DH684455', NULL, 'Khách hàng 65', '0900000065', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6760000, 30000, NULL, 0, 6790000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-21 15:53:40'),
('dh_6a1ed044de5fb', 'DH893456', NULL, 'Khách hàng 72', '0900000072', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6480000, 30000, NULL, 0, 6510000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-02-28 22:11:11'),
('dh_6a1ed044df202', 'DH322009', NULL, 'Khách hàng 99', '0900000099', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2970000, 30000, NULL, 0, 3000000, 'Thanh toán qua VNPAY', 0, 0, '2026-02-17 19:02:27'),
('dh_6a1ed044dfe15', 'DH467914', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3430000, 30000, NULL, 0, 3460000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-29 15:29:21'),
('dh_6a1ed044e0fe7', 'DH921141', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2730000, 30000, NULL, 0, 2760000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-01 16:25:10'),
('dh_6a1ed044e1713', 'DH335557', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 7740000, 30000, NULL, 0, 7770000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-28 11:33:40'),
('dh_6a1ed044e2dae', 'DH806447', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-23 15:17:10'),
('dh_6a1ed044e3a9f', 'DH111942', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3990000, 30000, NULL, 0, 4020000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-06-02 06:36:54'),
('dh_6a1ed044e4630', 'DH494803', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3870000, 30000, NULL, 0, 3900000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-28 03:17:35'),
('dh_6a1ed044e5482', 'DH563347', NULL, 'Khách hàng 40', '0900000040', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4910000, 30000, NULL, 0, 4940000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-26 07:42:16'),
('dh_6a1ed044e726a', 'DH752144', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-11 00:40:26'),
('dh_6a1ed044e82e8', 'DH745632', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3510000, 30000, NULL, 0, 3540000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-06 01:53:34'),
('dh_6a1ed044e8a1c', 'DH609097', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-17 14:48:43'),
('dh_6a1ed044e9730', 'DH569743', NULL, 'Khách hàng 69', '0900000069', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2820000, 30000, NULL, 0, 2850000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-27 10:50:58'),
('dh_6a1ed044ea305', 'DH803077', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3260000, 30000, NULL, 0, 3290000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-19 14:24:03'),
('dh_6a1ed044eb2ab', 'DH135085', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7110000, 30000, NULL, 0, 7140000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-17 12:03:24'),
('dh_6a1ed044ebbcd', 'DH173878', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6840000, 30000, NULL, 0, 6870000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-03 01:10:19'),
('dh_6a1ed044edaee', 'DH695736', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4410000, 30000, NULL, 0, 4440000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-09 19:14:30'),
('dh_6a1ed044ef096', 'DH641054', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 10150000, 30000, NULL, 0, 10180000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-22 09:37:24'),
('dh_6a1ed044efe1e', 'DH419454', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-27 08:40:54'),
('dh_6a1ed044f1c6c', 'DH523623', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 3030000, 30000, NULL, 0, 3060000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-02-24 14:51:16'),
('dh_6a1ed044f2707', 'DH875022', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-06-01 17:03:04'),
('dh_6a1ed044f2a7b', 'DH965026', NULL, 'Khách hàng 42', '0900000042', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 8380000, 30000, NULL, 0, 8410000, 'Thanh toán qua VNPAY', 0, 1, '2026-04-19 06:34:05');
INSERT INTO `don_hang` (`id`, `ma_don_hang`, `id_nguoi_dung`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_giao_hang`, `ghi_chu`, `tong_tien`, `phi_ship`, `id_voucher`, `tien_giam_gia`, `thanh_tien`, `pt_thanh_toan`, `trang_thai_thanh_toan`, `trang_thai_don_hang`, `ngay_tao`) VALUES
('dh_6a1ed044f37ba', 'DH869982', NULL, 'Khách hàng 40', '0900000040', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7100000, 30000, NULL, 0, 7130000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-26 08:04:17'),
('dh_6a1ed0450101e', 'DH736871', NULL, 'Khách hàng 70', '0900000070', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-31 02:15:30'),
('dh_6a1ed04501998', 'DH566223', NULL, 'Khách hàng 1', '0900000001', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2850000, 30000, NULL, 0, 2880000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-17 11:00:21'),
('dh_6a1ed04502f82', 'DH623543', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3360000, 30000, NULL, 0, 3390000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-09 18:57:03'),
('dh_6a1ed0450485c', 'DH951673', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6120000, 30000, NULL, 0, 6150000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-17 14:54:43'),
('dh_6a1ed04505db4', 'DH960730', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5670000, 30000, NULL, 0, 5700000, 'Thanh toán qua VNPAY', 0, 4, '2026-03-08 16:48:22'),
('dh_6a1ed04506709', 'DH719095', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 9410000, 30000, NULL, 0, 9440000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-29 00:58:22'),
('dh_6a1ed04508585', 'DH875737', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 12720000, 30000, NULL, 0, 12750000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-28 18:42:33'),
('dh_6a1ed0450a23d', 'DH492032', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 12390000, 30000, NULL, 0, 12420000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-30 14:26:35'),
('dh_6a1ed0450bbe7', 'DH191803', NULL, 'Khách hàng 78', '0900000078', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3420000, 30000, NULL, 0, 3450000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-28 19:04:11'),
('dh_6a1ed0450c8e1', 'DH325832', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-11 02:00:18'),
('dh_6a1ed0450d5c0', 'DH398876', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6150000, 30000, NULL, 0, 6180000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-04-07 09:55:53'),
('dh_6a1ed0450e459', 'DH750586', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 9960000, 30000, NULL, 0, 9990000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-05 01:28:53'),
('dh_6a1ed0450f63e', 'DH181437', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4080000, 30000, NULL, 0, 4110000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-30 01:05:20'),
('dh_6a1ed045101e4', 'DH429153', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-25 05:29:03'),
('dh_6a1ed045108a9', 'DH980008', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3150000, 30000, NULL, 0, 3180000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-18 05:21:02'),
('dh_6a1ed0451103c', 'DH925856', NULL, 'Khách hàng 95', '0900000095', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-09 20:45:01'),
('dh_6a1ed045114c7', 'DH306264', NULL, 'Khách hàng 56', '0900000056', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 11880000, 30000, NULL, 0, 11910000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-11 01:53:57'),
('dh_6a1ed04512055', 'DH717371', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 10200000, 30000, NULL, 0, 10230000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-14 01:58:28'),
('dh_6a1ed0451292d', 'DH109185', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 11970000, 30000, NULL, 0, 12000000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-01-05 02:14:58'),
('dh_6a1ed04512f74', 'DH757084', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 9210000, 30000, NULL, 0, 9240000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-23 21:57:45'),
('dh_6a1ed04514776', 'DH226596', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-01-09 14:18:53'),
('dh_6a1ed04514be5', 'DH520314', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2850000, 30000, NULL, 0, 2880000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-02 01:00:21'),
('dh_6a1ed04515820', 'DH647473', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 8340000, 30000, NULL, 0, 8370000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-14 01:33:02'),
('dh_6a1ed0451779c', 'DH458550', NULL, 'Khách hàng 41', '0900000041', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 5880000, 30000, NULL, 0, 5910000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-14 04:02:29'),
('dh_6a1ed04518733', 'DH242971', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6080000, 30000, NULL, 0, 6110000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-16 09:14:31'),
('dh_6a1ed04519a59', 'DH204454', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7100000, 30000, NULL, 0, 7130000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-15 00:20:08'),
('dh_6a1ed0451b2ef', 'DH269779', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 9810000, 30000, NULL, 0, 9840000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-12 10:58:43'),
('dh_6a1ed0451c809', 'DH623052', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5070000, 30000, NULL, 0, 5100000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-20 10:12:21'),
('dh_6a1ed0451e175', 'DH716354', NULL, 'Khách hàng 27', '0900000027', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1170000, 30000, NULL, 0, 1200000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-23 14:10:11'),
('dh_6a1ed0451ee6b', 'DH903691', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 1830000, 30000, NULL, 0, 1860000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-04 21:08:13'),
('dh_6a1ed0451fc2e', 'DH417055', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 10050000, 30000, NULL, 0, 10080000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-22 00:54:23'),
('dh_6a1ed04520d65', 'DH453503', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 3840000, 30000, NULL, 0, 3870000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-24 18:08:46'),
('dh_6a1ed04521f9b', 'DH959999', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 10560000, 30000, NULL, 0, 10590000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-05 04:43:36'),
('dh_6a1ed0452324a', 'DH189845', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-01 07:17:18'),
('dh_6a1ed04523a85', 'DH543088', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-12 20:48:57'),
('dh_6a1ed04524e25', 'DH626905', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3950000, 30000, NULL, 0, 3980000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-23 23:29:53'),
('dh_6a1ed045261a4', 'DH844808', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 12120000, 30000, NULL, 0, 12150000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-28 05:10:05'),
('dh_6a1ed045279d0', 'DH259198', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 13020000, 30000, NULL, 0, 13050000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-13 04:34:09'),
('dh_6a1ed04529781', 'DH320489', NULL, 'Khách hàng 90', '0900000090', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-05-04 17:43:06'),
('dh_6a1ed04529eaf', 'DH179094', NULL, 'Khách hàng 42', '0900000042', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7830000, 30000, NULL, 0, 7860000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-02-25 19:10:03'),
('dh_6a1ed0452ae5d', 'DH549650', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-16 09:39:20'),
('dh_6a1ed0452bb51', 'DH659387', NULL, 'Khách hàng 27', '0900000027', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1520000, 30000, NULL, 0, 1550000, 'Thanh toán qua VNPAY', 0, 2, '2026-01-05 02:30:28'),
('dh_6a1ed0452c509', 'DH329935', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4560000, 30000, NULL, 0, 4590000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-17 09:36:08'),
('dh_6a1ed0452d12e', 'DH350958', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 5760000, 30000, NULL, 0, 5790000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-19 19:22:27'),
('dh_6a1ed0452dc5b', 'DH881167', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 9390000, 30000, NULL, 0, 9420000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-03-20 01:23:48'),
('dh_6a1ed0452e991', 'DH370986', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-22 20:50:25'),
('dh_6a1ed0452fbbf', 'DH616369', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4560000, 30000, NULL, 0, 4590000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-16 21:13:03'),
('dh_6a1ed04530810', 'DH510949', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6300000, 30000, NULL, 0, 6330000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-01-25 13:38:26'),
('dh_6a1ed04531084', 'DH119929', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 10860000, 30000, NULL, 0, 10890000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-15 10:44:21'),
('dh_6a1ed0453309b', 'DH793826', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 9720000, 30000, NULL, 0, 9750000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-28 02:43:43'),
('dh_6a1ed04534af7', 'DH850379', NULL, 'Khách hàng 91', '0900000091', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4490000, 30000, NULL, 0, 4520000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-02-14 12:09:56'),
('dh_6a1ed0453560a', 'DH261077', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8580000, 30000, NULL, 0, 8610000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-17 02:31:00'),
('dh_6a1ed045374e2', 'DH772415', NULL, 'Khách hàng 41', '0900000041', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-16 14:01:36'),
('dh_6a1ed04537dd7', 'DH685532', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-31 06:06:20'),
('dh_6a1ed04538429', 'DH697546', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8460000, 30000, NULL, 0, 8490000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-10 15:18:33'),
('dh_6a1ed04539f09', 'DH642767', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8100000, 30000, NULL, 0, 8130000, 'Thanh toán qua VNPAY', 0, 1, '2026-05-13 07:24:03'),
('dh_6a1ed0453a7a1', 'DH482001', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7050000, 30000, NULL, 0, 7080000, 'Thanh toán qua VNPAY', 0, 2, '2026-03-30 20:06:26'),
('dh_6a1ed0453ba12', 'DH558423', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 10330000, 30000, NULL, 0, 10360000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-22 09:07:44'),
('dh_6a1ed0453d23b', 'DH158011', NULL, 'Khách hàng 27', '0900000027', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 8060000, 30000, NULL, 0, 8090000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-29 01:42:38'),
('dh_6a1ed0453e779', 'DH860609', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4910000, 30000, NULL, 0, 4940000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-05-24 22:08:24'),
('dh_6a1ed0453ed6d', 'DH658484', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 8340000, 30000, NULL, 0, 8370000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-19 16:14:59'),
('dh_6a1ed0453ff15', 'DH422979', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-19 00:59:38'),
('dh_6a1ed04540447', 'DH522946', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4260000, 30000, NULL, 0, 4290000, 'Thanh toán qua VNPAY', 0, 1, '2026-01-19 16:53:04'),
('dh_6a1ed045413b0', 'DH471256', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1310000, 30000, NULL, 0, 1340000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-26 07:27:42'),
('dh_6a1ed045420c4', 'DH424358', NULL, 'Khách hàng 45', '0900000045', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4060000, 30000, NULL, 0, 4090000, 'Thanh toán qua VNPAY', 0, 4, '2026-02-26 00:40:20'),
('dh_6a1ed04542c87', 'DH844308', NULL, 'Khách hàng 13', '0900000013', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4800000, 30000, NULL, 0, 4830000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-26 09:09:21'),
('dh_6a1ed04544229', 'DH926725', NULL, 'Khách hàng 29', '0900000029', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 10400000, 30000, NULL, 0, 10430000, 'Thanh toán qua VNPAY', 0, 0, '2026-02-28 06:02:10'),
('dh_6a1ed0454492d', 'DH937202', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-01-31 07:58:36'),
('dh_6a1ed045450b0', 'DH162033', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4230000, 30000, NULL, 0, 4260000, 'Thanh toán qua VNPAY', 0, 0, '2026-01-06 10:36:56'),
('dh_6a1ed04545d28', 'DH309426', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 2860000, 30000, NULL, 0, 2890000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-01 03:18:38'),
('dh_6a1ed04546a33', 'DH908796', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 960000, 30000, NULL, 0, 990000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-11 21:18:47'),
('dh_6a1ed04546ff2', 'DH830899', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 11740000, 30000, NULL, 0, 11770000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-19 16:59:39'),
('dh_6a1ed04548ec6', 'DH720801', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5760000, 30000, NULL, 0, 5790000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-13 19:40:43'),
('dh_6a1ed0454a3f8', 'DH372397', NULL, 'Khách hàng 83', '0900000083', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5910000, 30000, NULL, 0, 5940000, 'Thanh toán qua VNPAY', 0, 4, '2026-04-05 03:37:21'),
('dh_6a1ed0454ace4', 'DH264339', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 11060000, 30000, NULL, 0, 11090000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-13 09:30:40'),
('dh_6a1ed0454c67e', 'DH601340', NULL, 'Khách hàng 93', '0900000093', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4560000, 30000, NULL, 0, 4590000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-31 21:39:58'),
('dh_6a1ed0454d2d5', 'DH882180', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-04-24 02:07:14'),
('dh_6a1ed0454dc11', 'DH947135', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 10980000, 30000, NULL, 0, 11010000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-05-14 03:02:17'),
('dh_6a1ed0454e38b', 'DH792039', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7140000, 30000, NULL, 0, 7170000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-13 22:26:32'),
('dh_6a1ed04550221', 'DH232673', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 10980000, 30000, NULL, 0, 11010000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-10 03:37:07'),
('dh_6a1ed045516f2', 'DH865542', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-08 22:42:01'),
('dh_6a1ed04552c20', 'DH980235', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4320000, 30000, NULL, 0, 4350000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-12 06:03:48'),
('dh_6a1ed04553f13', 'DH237534', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-02 08:26:57'),
('dh_6a1ed04554c42', 'DH189730', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 6300000, 30000, NULL, 0, 6330000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 14:31:33'),
('dh_6a1ed04555aee', 'DH716667', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 11310000, 30000, NULL, 0, 11340000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-01 06:55:35'),
('dh_6a1ed04557a5d', 'DH181790', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 14:51:14'),
('dh_6a1ed045588cc', 'DH675392', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-03 00:25:02'),
('dh_6a1ed04558e0d', 'DH300322', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4840000, 30000, NULL, 0, 4870000, 'Thanh toán qua VNPAY', 0, 4, '2026-04-24 15:31:20'),
('dh_6a1ed045598ed', 'DH990143', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 7650000, 30000, NULL, 0, 7680000, 'Thanh toán qua VNPAY', 0, 4, '2026-03-23 07:05:16'),
('dh_6a1ed0455adab', 'DH955752', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-03-12 19:02:43'),
('dh_6a1ed0455bcae', 'DH428061', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-22 15:15:39'),
('dh_6a1ed0455c334', 'DH273857', NULL, 'Khách hàng 70', '0900000070', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-22 13:38:06'),
('dh_6a1ed0455d56f', 'DH443949', NULL, 'Khách hàng 42', '0900000042', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3870000, 30000, NULL, 0, 3900000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-10 10:53:12'),
('dh_6a1ed0455e824', 'DH908021', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6480000, 30000, NULL, 0, 6510000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-02 09:32:08'),
('dh_6a1ed0455fac4', 'DH521766', NULL, 'Khách hàng 79', '0900000079', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3390000, 30000, NULL, 0, 3420000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-04-29 02:40:10'),
('dh_6a1ed045601b4', 'DH237536', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-21 05:02:06'),
('dh_6a1ed045608a3', 'DH790193', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 7170000, 30000, NULL, 0, 7200000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-25 04:47:17'),
('dh_6a1ed045622fb', 'DH225131', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-01-21 11:31:14'),
('dh_6a1ed045626bc', 'DH233137', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-28 19:31:33'),
('dh_6a1ed04563572', 'DH158673', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9470000, 30000, NULL, 0, 9500000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-07 23:42:56'),
('dh_6a1ed04565346', 'DH221699', NULL, 'Khách hàng 70', '0900000070', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4710000, 30000, NULL, 0, 4740000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-09 11:56:25'),
('dh_6a1ed04566a3d', 'DH707876', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 9030000, 30000, NULL, 0, 9060000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-16 00:44:53'),
('dh_6a1ed04567bc8', 'DH315942', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8790000, 30000, NULL, 0, 8820000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-29 17:27:02'),
('dh_6a1ed04568ea6', 'DH487892', NULL, 'Khách hàng 21', '0900000021', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6540000, 30000, NULL, 0, 6570000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-10 01:08:41'),
('dh_6a1ed0456b489', 'DH360684', NULL, 'Khách hàng 92', '0900000092', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5490000, 30000, NULL, 0, 5520000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-03-06 11:49:28'),
('dh_6a1ed0456c80e', 'DH500761', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-10 10:32:50'),
('dh_6a1ed0456d730', 'DH978253', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-22 05:16:21'),
('dh_6a1ed0456e507', 'DH692114', NULL, 'Khách hàng 14', '0900000014', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5580000, 30000, NULL, 0, 5610000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-25 11:34:45'),
('dh_6a1ed0456f66d', 'DH789613', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 10260000, 30000, NULL, 0, 10290000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-12 20:56:12'),
('dh_6a1ed04570e9a', 'DH888046', NULL, 'Khách hàng 91', '0900000091', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 12020000, 30000, NULL, 0, 12050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-15 12:31:41'),
('dh_6a1ed04572c87', 'DH686097', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8460000, 30000, NULL, 0, 8490000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-24 22:46:50'),
('dh_6a1ed045742d8', 'DH298485', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 13650000, 30000, NULL, 0, 13680000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-04-02 01:16:37'),
('dh_6a1ed04575396', 'DH935352', NULL, 'Khách hàng 32', '0900000032', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5910000, 30000, NULL, 0, 5940000, 'Thanh toán qua VNPAY', 0, 1, '2026-02-17 21:52:48'),
('dh_6a1ed045763b0', 'DH612303', NULL, 'Khách hàng 32', '0900000032', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4530000, 30000, NULL, 0, 4560000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-05 08:37:00'),
('dh_6a1ed0457721d', 'DH692585', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-01-27 12:28:35'),
('dh_6a1ed0457786a', 'DH535217', NULL, 'Khách hàng 88', '0900000088', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-05-17 21:58:49'),
('dh_6a1ed04577e9d', 'DH851776', NULL, 'Khách hàng 78', '0900000078', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 6120000, 30000, NULL, 0, 6150000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-04 12:26:51'),
('dh_6a1ed04578a2c', 'DH125372', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-01-25 00:20:39'),
('dh_6a1ed04578ff5', 'DH819676', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 5630000, 30000, NULL, 0, 5660000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-15 17:09:04'),
('dh_6a1ed045797d3', 'DH915702', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6090000, 30000, NULL, 0, 6120000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-01-05 21:35:51'),
('dh_6a1ed0457a4f6', 'DH938852', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7110000, 30000, NULL, 0, 7140000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-07 02:57:54'),
('dh_6a1ed0457be67', 'DH193107', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 6990000, 30000, NULL, 0, 7020000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-17 16:53:41'),
('dh_6a1ed0457d2d2', 'DH258228', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-13 19:42:45'),
('dh_6a1ed0457d76b', 'DH631489', NULL, 'Khách hàng 92', '0900000092', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3750000, 30000, NULL, 0, 3780000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-20 21:18:13'),
('dh_6a1ed0457e9d2', 'DH964338', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6120000, 30000, NULL, 0, 6150000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-25 20:49:31'),
('dh_6a1ed0457ffd2', 'DH439588', NULL, 'Khách hàng 4', '0900000004', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-25 22:09:37'),
('dh_6a1ed04580469', 'DH207458', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7020000, 30000, NULL, 0, 7050000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-22 08:41:23'),
('dh_6a1ed04582096', 'DH102235', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 10150000, 30000, NULL, 0, 10180000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-29 09:24:25'),
('dh_6a1ed04583505', 'DH564973', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-01 14:01:00'),
('dh_6a1ed04583db2', 'DH146021', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 7440000, 30000, NULL, 0, 7470000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-13 19:07:58'),
('dh_6a1ed045856b0', 'DH592374', NULL, 'Khách hàng 97', '0900000097', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-14 21:52:26'),
('dh_6a1ed04586354', 'DH652781', NULL, 'Khách hàng 57', '0900000057', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4570000, 30000, NULL, 0, 4600000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-05-16 04:57:57'),
('dh_6a1ed04586804', 'DH515675', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5850000, 30000, NULL, 0, 5880000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-04-11 21:49:14'),
('dh_6a1ed04586d8f', 'DH261778', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5550000, 30000, NULL, 0, 5580000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-18 13:40:06'),
('dh_6a1ed04588068', 'DH403114', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5190000, 30000, NULL, 0, 5220000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-16 22:26:17'),
('dh_6a1ed04589b3f', 'DH618064', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6070000, 30000, NULL, 0, 6100000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-05-07 23:02:55'),
('dh_6a1ed04589fa9', 'DH756797', NULL, 'Khách hàng 91', '0900000091', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 3780000, 30000, NULL, 0, 3810000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-15 06:19:18'),
('dh_6a1ed0458b973', 'DH112989', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-03 17:21:54'),
('dh_6a1ed0458cc53', 'DH121065', NULL, 'Khách hàng 10', '0900000010', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4740000, 30000, NULL, 0, 4770000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-08 14:41:21'),
('dh_6a1ed0458d92c', 'DH927002', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7870000, 30000, NULL, 0, 7900000, 'Thanh toán qua VNPAY', 0, 4, '2026-05-18 20:51:04'),
('dh_6a1ed0458ebb2', 'DH845410', NULL, 'Khách hàng 72', '0900000072', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7560000, 30000, NULL, 0, 7590000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-01-23 17:44:17'),
('dh_6a1ed0458fa80', 'DH958184', NULL, 'Khách hàng 40', '0900000040', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 6550000, 30000, NULL, 0, 6580000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-02-22 20:34:59'),
('dh_6a1ed04590a00', 'DH134062', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-09 06:28:52'),
('dh_6a1ed0459134f', 'DH394127', NULL, 'Khách hàng 99', '0900000099', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7690000, 30000, NULL, 0, 7720000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-05-15 22:31:15'),
('dh_6a1ed04591e28', 'DH834260', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2860000, 30000, NULL, 0, 2890000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-25 19:12:29'),
('dh_6a1ed04593141', 'DH230906', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4770000, 30000, NULL, 0, 4800000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-10 09:52:20'),
('dh_6a1ed04593f12', 'DH190253', NULL, 'Khách hàng 86', '0900000086', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8840000, 30000, NULL, 0, 8870000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-29 03:26:41'),
('dh_6a1ed04595fd5', 'DH915095', NULL, 'Khách hàng 83', '0900000083', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3660000, 30000, NULL, 0, 3690000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-11 22:55:56'),
('dh_6a1ed045973a4', 'DH207975', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-27 03:10:12'),
('dh_6a1ed04598585', 'DH771541', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1170000, 30000, NULL, 0, 1200000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-22 10:14:22'),
('dh_6a1ed04598aef', 'DH527955', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-03-26 06:14:57'),
('dh_6a1ed0459938c', 'DH326350', NULL, 'Khách hàng 44', '0900000044', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8430000, 30000, NULL, 0, 8460000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-20 00:41:44'),
('dh_6a1ed0459b372', 'DH249349', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9300000, 30000, NULL, 0, 9330000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-18 13:55:18'),
('dh_6a1ed0459c160', 'DH228304', NULL, 'Khách hàng 99', '0900000099', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6510000, 30000, NULL, 0, 6540000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-24 19:06:13'),
('dh_6a1ed0459e371', 'DH765776', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5840000, 30000, NULL, 0, 5870000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-14 20:40:43'),
('dh_6a1ed0459f7b1', 'DH807629', NULL, 'Khách hàng 69', '0900000069', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7230000, 30000, NULL, 0, 7260000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-12 22:01:28'),
('dh_6a1ed045a0113', 'DH160203', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-24 00:54:17'),
('dh_6a1ed045a085a', 'DH421038', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8420000, 30000, NULL, 0, 8450000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-27 08:10:07'),
('dh_6a1ed045a2243', 'DH775901', NULL, 'Khách hàng 1', '0900000001', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3870000, 30000, NULL, 0, 3900000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-26 06:22:36'),
('dh_6a1ed045a2f20', 'DH840160', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5220000, 30000, NULL, 0, 5250000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-17 17:55:56'),
('dh_6a1ed045a4296', 'DH199385', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6840000, 30000, NULL, 0, 6870000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-05 17:40:33'),
('dh_6a1ed045a5e95', 'DH656832', NULL, 'Khách hàng 15', '0900000015', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-30 13:52:15'),
('dh_6a1ed045a6c1f', 'DH705567', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 6270000, 30000, NULL, 0, 6300000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-02 17:10:18'),
('dh_6a1ed045a7ea0', 'DH355751', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-19 19:02:10'),
('dh_6a1ed045a922f', 'DH720860', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 7100000, 30000, NULL, 0, 7130000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-12 00:12:24'),
('dh_6a1ed045ab2af', 'DH937163', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3840000, 30000, NULL, 0, 3870000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-23 23:52:37'),
('dh_6a1ed045abc3f', 'DH757044', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4390000, 30000, NULL, 0, 4420000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-02-17 17:09:45'),
('dh_6a1ed045ac4a9', 'DH592196', NULL, 'Khách hàng 95', '0900000095', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3850000, 30000, NULL, 0, 3880000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-01-28 05:19:47'),
('dh_6a1ed045ad508', 'DH846403', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 3450000, 30000, NULL, 0, 3480000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-23 12:38:31'),
('dh_6a1ed045aefe6', 'DH295224', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6390000, 30000, NULL, 0, 6420000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-13 17:00:59'),
('dh_6a1ed045b04d0', 'DH444581', NULL, 'Khách hàng 99', '0900000099', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-06-01 09:32:41'),
('dh_6a1ed045b1200', 'DH963229', NULL, 'Khách hàng 83', '0900000083', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-24 15:53:01'),
('dh_6a1ed045b205e', 'DH681308', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6550000, 30000, NULL, 0, 6580000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-16 08:48:00'),
('dh_6a1ed045b3454', 'DH154073', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5850000, 30000, NULL, 0, 5880000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-04-11 06:19:48'),
('dh_6a1ed045b3ecf', 'DH290868', NULL, 'Khách hàng 56', '0900000056', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 4060000, 30000, NULL, 0, 4090000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-04 19:05:49'),
('dh_6a1ed045b5227', 'DH558626', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5100000, 30000, NULL, 0, 5130000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-28 07:55:44'),
('dh_6a1ed045b65a0', 'DH598329', NULL, 'Khách hàng 35', '0900000035', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 4470000, 30000, NULL, 0, 4500000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-14 02:11:12'),
('dh_6a1ed045b766f', 'DH205133', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-08 17:54:07'),
('dh_6a1ed045b7bc0', 'DH605732', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 11220000, 30000, NULL, 0, 11250000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-23 10:49:06'),
('dh_6a1ed045b9b4d', 'DH160309', NULL, 'Khách hàng 39', '0900000039', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-11 15:56:35'),
('dh_6a1ed045baa2e', 'DH307379', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-22 17:19:08'),
('dh_6a1ed045bb808', 'DH174219', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 10840000, 30000, NULL, 0, 10870000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-17 11:08:22'),
('dh_6a1ed045bd65d', 'DH838464', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7050000, 30000, NULL, 0, 7080000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-11 18:18:55'),
('dh_6a1ed045bfa01', 'DH195854', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán qua VNPAY', 0, 2, '2026-02-17 07:29:29'),
('dh_6a1ed045c00aa', 'DH757270', NULL, 'Khách hàng 4', '0900000004', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 10620000, 30000, NULL, 0, 10650000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-01-05 12:40:09'),
('dh_6a1ed045c1167', 'DH835354', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 11120000, 30000, NULL, 0, 11150000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-14 11:14:47'),
('dh_6a1ed045c325b', 'DH283701', NULL, 'Khách hàng 13', '0900000013', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7740000, 30000, NULL, 0, 7770000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-18 11:36:36'),
('dh_6a1ed045c39f5', 'DH740447', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-01 14:00:48'),
('dh_6a1ed045c4488', 'DH267354', NULL, 'Khách hàng 80', '0900000080', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 8730000, 30000, NULL, 0, 8760000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-20 05:54:12'),
('dh_6a1ed045c51a7', 'DH950953', NULL, 'Khách hàng 42', '0900000042', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Thanh toán khi nhận hàng (COD)', 0, 2, '2026-01-16 03:52:38'),
('dh_6a1ed045c559c', 'DH334221', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 15360000, 30000, NULL, 0, 15390000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-12 01:50:25'),
('dh_6a1ed045c7591', 'DH677411', NULL, 'Khách hàng 55', '0900000055', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 6120000, 30000, NULL, 0, 6150000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-23 06:11:09'),
('dh_6a1ed045c8b16', 'DH733878', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 8130000, 30000, NULL, 0, 8160000, 'Thanh toán khi nhận hàng (COD)', 0, 1, '2026-04-25 04:42:02'),
('dh_6a1ed045c9350', 'DH373667', NULL, 'Khách hàng 34', '0900000034', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 1020000, 30000, NULL, 0, 1050000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-26 15:21:24'),
('dh_6a1ed045ca18d', 'DH830549', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-14 12:38:55'),
('dh_6a1ed045caf76', 'DH809269', NULL, 'Khách hàng 89', '0900000089', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 9570000, 30000, NULL, 0, 9600000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-30 22:44:01'),
('dh_6a1ed045cc2ef', 'DH508263', NULL, 'Khách hàng 50', '0900000050', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 7890000, 30000, NULL, 0, 7920000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-09 04:56:47'),
('dh_6a1ed045cd4cf', 'DH644256', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 9480000, 30000, NULL, 0, 9510000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-12 02:39:06'),
('dh_6a1ed045cf52c', 'DH381393', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 13990000, 30000, NULL, 0, 14020000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-27 08:47:11'),
('dh_6a1ed045d10a9', 'DH677521', NULL, 'Khách hàng 81', '0900000081', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 3660000, 30000, NULL, 0, 3690000, 'Thanh toán qua VNPAY', 0, 1, '2026-03-13 05:34:41'),
('dh_6a1ed045d1e12', 'DH633613', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-04-25 15:53:28'),
('dh_6a1ed045d292a', 'DH875567', NULL, 'Khách hàng 11', '0900000011', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 13820000, 30000, NULL, 0, 13850000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-12 14:22:36'),
('dh_6a1ed045d49bd', 'DH147735', NULL, 'Khách hàng 63', '0900000063', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-14 19:47:00'),
('dh_6a1ed045d4f56', 'DH623156', NULL, 'Khách hàng 100', '0900000100', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 6180000, 30000, NULL, 0, 6210000, 'Thanh toán qua VNPAY', 0, 0, '2026-05-12 18:14:00'),
('dh_6a1ed045d6078', 'DH848032', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 10170000, 30000, NULL, 0, 10200000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-18 12:16:22'),
('dh_6a1ed045d8791', 'DH162210', NULL, 'Khách hàng 62', '0900000062', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-02-19 13:08:17'),
('dh_6a1ed045d8d5c', 'DH582827', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 810000, 30000, NULL, 0, 840000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-05 04:44:23'),
('dh_6a1ed045d9385', 'DH489752', NULL, 'Khách hàng 90', '0900000090', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 5130000, 30000, NULL, 0, 5160000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-15 22:06:34'),
('dh_6a1ed045d9d65', 'DH749872', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9140000, 30000, NULL, 0, 9170000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-31 03:36:27'),
('dh_6a1ed045dac76', 'DH307063', NULL, 'Khách hàng 5', '0900000005', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 6110000, 30000, NULL, 0, 6140000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-15 10:51:56'),
('dh_6a1ed045dd59b', 'DH930721', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5830000, 30000, NULL, 0, 5860000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-02-16 13:27:03'),
('dh_6a1ed045de82c', 'DH316226', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 5860000, 30000, NULL, 0, 5890000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-02-18 05:24:43'),
('dh_6a1ed045dfaca', 'DH111044', NULL, 'Khách hàng 59', '0900000059', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8430000, 30000, NULL, 0, 8460000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-21 09:12:55'),
('dh_6a1ed045e0efa', 'DH959609', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-05-22 04:35:57'),
('dh_6a1ed045e2102', 'DH902543', NULL, 'Khách hàng 88', '0900000088', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 7020000, 30000, NULL, 0, 7050000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-25 00:25:18'),
('dh_6a1ed045e3c9c', 'DH507738', NULL, 'Khách hàng 62', '0900000062', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-04 01:14:56'),
('dh_6a1ed045e441b', 'DH774658', NULL, 'Khách hàng 65', '0900000065', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 11250000, 30000, NULL, 0, 11280000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-25 12:50:52'),
('dh_6a1ed045e5229', 'DH842631', NULL, 'Khách hàng 25', '0900000025', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8910000, 30000, NULL, 0, 8940000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-05 02:23:25'),
('dh_6a1ed045e6d88', 'DH137626', NULL, 'Khách hàng 30', '0900000030', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 9690000, 30000, NULL, 0, 9720000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-05 10:46:50'),
('dh_6a1ed045e7c0d', 'DH454241', NULL, 'Khách hàng 33', '0900000033', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-29 17:35:28'),
('dh_6a1ed045e88ea', 'DH378530', NULL, 'Khách hàng 82', '0900000082', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-05 00:42:54'),
('dh_6a1ed045e97d0', 'DH142797', NULL, 'Khách hàng 65', '0900000065', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 10080000, 30000, NULL, 0, 10110000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-17 01:35:21'),
('dh_6a1ed045eb7c1', 'DH305781', NULL, 'Khách hàng 95', '0900000095', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-09 15:21:44'),
('dh_6a1ed045ec498', 'DH990381', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2700000, 30000, NULL, 0, 2730000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-06 05:25:00'),
('dh_6a1ed045ed1dc', 'DH219813', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6720000, 30000, NULL, 0, 6750000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-16 17:42:23'),
('dh_6a1ed045ee74c', 'DH686614', NULL, 'Khách hàng 9', '0900000009', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5910000, 30000, NULL, 0, 5940000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-04-08 05:07:28'),
('dh_6a1ed045ef64d', 'DH763231', NULL, 'Khách hàng 24', '0900000024', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7800000, 30000, NULL, 0, 7830000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-26 18:09:45'),
('dh_6a1ed045f1127', 'DH116051', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 19:10:16'),
('dh_6a1ed045f20ad', 'DH810187', NULL, 'Khách hàng 40', '0900000040', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3950000, 30000, NULL, 0, 3980000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-29 20:39:12'),
('dh_6a1ed045f3104', 'DH510670', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 8110000, 30000, NULL, 0, 8140000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-20 13:21:12'),
('dh_6a1ed04600ac0', 'DH636663', NULL, 'Khách hàng 48', '0900000048', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 2040000, 30000, NULL, 0, 2070000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-01-20 02:17:56'),
('dh_6a1ed04601796', 'DH414577', NULL, 'Khách hàng 74', '0900000074', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3830000, 30000, NULL, 0, 3860000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-26 01:30:00'),
('dh_6a1ed046025b5', 'DH721505', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2760000, 30000, NULL, 0, 2790000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-07 23:23:19'),
('dh_6a1ed04603b9c', 'DH861607', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 11190000, 30000, NULL, 0, 11220000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-11 00:11:45'),
('dh_6a1ed04606098', 'DH154875', NULL, 'Khách hàng 51', '0900000051', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 6960000, 30000, NULL, 0, 6990000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-24 18:54:49'),
('dh_6a1ed04606cd2', 'DH918246', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 5640000, 30000, NULL, 0, 5670000, 'Thanh toán qua VNPAY', 0, 2, '2026-05-19 23:27:47'),
('dh_6a1ed0460747c', 'DH116993', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6480000, 30000, NULL, 0, 6510000, 'Chuyển khoản qua ngân hàng', 0, 0, '2026-05-28 04:29:58'),
('dh_6a1ed04607d1b', 'DH184552', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 9730000, 30000, NULL, 0, 9760000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-04-08 23:55:40'),
('dh_6a1ed04609eab', 'DH468330', NULL, 'Khách hàng 17', '0900000017', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-12 21:25:36'),
('dh_6a1ed0460a278', 'DH433468', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 7180000, 30000, NULL, 0, 7210000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-05 18:01:42'),
('dh_6a1ed0460bbf6', 'DH937839', NULL, 'Khách hàng 98', '0900000098', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1980000, 30000, NULL, 0, 2010000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-24 06:20:46'),
('dh_6a1ed0460c972', 'DH638564', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 6750000, 30000, NULL, 0, 6780000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-09 17:29:33'),
('dh_6a1ed0460dfc8', 'DH216828', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5520000, 30000, NULL, 0, 5550000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-04 20:42:20'),
('dh_6a1ed0460ebea', 'DH290600', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 11290000, 30000, NULL, 0, 11320000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-21 08:35:15'),
('dh_6a1ed04611460', 'DH654262', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7880000, 30000, NULL, 0, 7910000, 'Thanh toán qua VNPAY', 1, 3, '2026-06-01 02:37:31'),
('dh_6a1ed04612c64', 'DH441126', NULL, 'Khách hàng 58', '0900000058', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4500000, 30000, NULL, 0, 4530000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-24 02:09:54'),
('dh_6a1ed046133fd', 'DH286759', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3810000, 30000, NULL, 0, 3840000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-10 05:35:20'),
('dh_6a1ed04614661', 'DH758474', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3540000, 30000, NULL, 0, 3570000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-03 22:36:45'),
('dh_6a1ed046161ea', 'DH542146', NULL, 'Khách hàng 38', '0900000038', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 11050000, 30000, NULL, 0, 11080000, 'Thanh toán khi nhận hàng (COD)', 0, 4, '2026-03-26 04:14:45'),
('dh_6a1ed0461696a', 'DH593421', NULL, 'Khách hàng 90', '0900000090', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4110000, 30000, NULL, 0, 4140000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-05-09 08:22:23');
INSERT INTO `don_hang` (`id`, `ma_don_hang`, `id_nguoi_dung`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_giao_hang`, `ghi_chu`, `tong_tien`, `phi_ship`, `id_voucher`, `tien_giam_gia`, `thanh_tien`, `pt_thanh_toan`, `trang_thai_thanh_toan`, `trang_thai_don_hang`, `ngay_tao`) VALUES
('dh_6a1ed04616eca', 'DH567552', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3630000, 30000, NULL, 0, 3660000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 10:11:22'),
('dh_6a1ed04618090', 'DH127080', NULL, 'Khách hàng 65', '0900000065', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 13180000, 30000, NULL, 0, 13210000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-13 08:16:31'),
('dh_6a1ed0461914f', 'DH517884', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3240000, 30000, NULL, 0, 3270000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-15 06:28:53'),
('dh_6a1ed04619609', 'DH370973', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 7710000, 30000, NULL, 0, 7740000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 14:43:53'),
('dh_6a1ed0461a169', 'DH915767', NULL, 'Khách hàng 52', '0900000052', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-22 06:30:29'),
('dh_6a1ed0461ad85', 'DH822691', NULL, 'Khách hàng 94', '0900000094', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-14 22:55:32'),
('dh_6a1ed0461b8f9', 'DH791944', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Chuyển khoản qua ngân hàng', 0, 1, '2026-01-25 00:35:55'),
('dh_6a1ed0461c28e', 'DH456454', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3360000, 30000, NULL, 0, 3390000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-03-11 10:51:30'),
('dh_6a1ed0461cfdd', 'DH868359', NULL, 'Khách hàng 40', '0900000040', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 8190000, 30000, NULL, 0, 8220000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-30 22:48:08'),
('dh_6a1ed0461e033', 'DH988608', NULL, 'Khách hàng 15', '0900000015', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5990000, 30000, NULL, 0, 6020000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-19 07:57:32'),
('dh_6a1ed0461fc91', 'DH332535', NULL, 'Khách hàng 53', '0900000053', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 5670000, 30000, NULL, 0, 5700000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-07 23:38:17'),
('dh_6a1ed04620dac', 'DH155925', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 12670000, 30000, NULL, 0, 12700000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-16 20:50:55'),
('dh_6a1ed04622065', 'DH923940', NULL, 'Khách hàng 41', '0900000041', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 6100000, 30000, NULL, 0, 6130000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-31 10:34:31'),
('dh_6a1ed04623aed', 'DH107698', NULL, 'Khách hàng 3', '0900000003', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 1620000, 30000, NULL, 0, 1650000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-15 09:31:45'),
('dh_6a1ed04624919', 'DH731126', NULL, 'Khách hàng 31', '0900000031', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5880000, 30000, NULL, 0, 5910000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-06-01 04:58:44'),
('dh_6a1ed046254a8', 'DH590544', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5900000, 30000, NULL, 0, 5930000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-02-03 06:05:46'),
('dh_6a1ed04627204', 'DH363121', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 10170000, 30000, NULL, 0, 10200000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-12 10:10:03'),
('dh_6a1ed046293ac', 'DH847086', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 6100000, 30000, NULL, 0, 6130000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-24 02:38:28'),
('dh_6a1ed04629c0f', 'DH744800', NULL, 'Khách hàng 18', '0900000018', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 2880000, 30000, NULL, 0, 2910000, 'Thanh toán qua VNPAY', 1, 3, '2026-02-01 01:42:36'),
('dh_6a1ed0462a9d0', 'DH388614', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2280000, 30000, NULL, 0, 2310000, 'Thanh toán qua VNPAY', 0, 2, '2026-03-25 23:19:53'),
('dh_6a1ed0462b473', 'DH316103', NULL, 'Khách hàng 88', '0900000088', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 5850000, 30000, NULL, 0, 5880000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-10 16:53:39'),
('dh_6a1ed0462c735', 'DH262069', NULL, 'Khách hàng 12', '0900000012', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 3830000, 30000, NULL, 0, 3860000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-30 08:05:13'),
('dh_6a1ed0462ce49', 'DH932370', NULL, 'Khách hàng 36', '0900000036', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 1350000, 30000, NULL, 0, 1380000, 'Thanh toán qua VNPAY', 0, 2, '2026-04-05 01:21:59'),
('dh_6a1ed0462d820', 'DH751767', NULL, 'Khách hàng 4', '0900000004', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-30 17:02:04'),
('dh_6a1ed0462ece2', 'DH233025', NULL, 'Khách hàng 76', '0900000076', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 4550000, 30000, NULL, 0, 4580000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-02 08:40:51'),
('dh_6a1ed046308ee', 'DH741539', NULL, 'Khách hàng 32', '0900000032', 'Khu vực 1, TP. Hồ Chí Minh', NULL, 4050000, 30000, NULL, 0, 4080000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-03-10 14:21:04'),
('dh_6a1ed04631248', 'DH205915', NULL, 'Khách hàng 6', '0900000006', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 9810000, 30000, NULL, 0, 9840000, 'Thanh toán qua VNPAY', 1, 3, '2026-05-07 20:07:13'),
('dh_6a1ed04631e22', 'DH465950', NULL, 'Khách hàng 16', '0900000016', 'Khu vực 8, TP. Hồ Chí Minh', NULL, 7740000, 30000, NULL, 0, 7770000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-29 06:35:43'),
('dh_6a1ed04632e56', 'DH344315', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 9180000, 30000, NULL, 0, 9210000, 'Thanh toán qua VNPAY', 0, 4, '2026-02-26 05:12:28'),
('dh_6a1ed04633e9d', 'DH115597', NULL, 'Khách hàng 67', '0900000067', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 1510000, 30000, NULL, 0, 1540000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-22 19:50:08'),
('dh_6a1ed04634b88', 'DH987051', NULL, 'Khách hàng 8', '0900000008', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 6930000, 30000, NULL, 0, 6960000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-28 11:21:13'),
('dh_6a1ed04635eb1', 'DH289800', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Thanh toán khi nhận hàng (COD)', 0, 0, '2026-05-02 09:28:31'),
('dh_6a1ed04636827', 'DH717160', NULL, 'Khách hàng 77', '0900000077', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 5940000, 30000, NULL, 0, 5970000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-04 17:57:56'),
('dh_6a1ed0463737f', 'DH903424', NULL, 'Khách hàng 85', '0900000085', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 3780000, 30000, NULL, 0, 3810000, 'Thanh toán qua VNPAY', 1, 3, '2026-01-14 01:11:49'),
('dh_6a1ed04637f44', 'DH403331', NULL, 'Khách hàng 47', '0900000047', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 13980000, 30000, NULL, 0, 14010000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-04-06 16:23:22'),
('dh_6a1ed04639ffb', 'DH917027', NULL, 'Khách hàng 96', '0900000096', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 2520000, 30000, NULL, 0, 2550000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-23 13:28:45'),
('dh_6a1ed0463a78a', 'DH705325', NULL, 'Khách hàng 60', '0900000060', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 9600000, 30000, NULL, 0, 9630000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-01 05:44:51'),
('dh_6a1ed0463c8a8', 'DH722567', NULL, 'Khách hàng 19', '0900000019', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4760000, 30000, NULL, 0, 4790000, 'Thanh toán qua VNPAY', 0, 4, '2026-02-02 19:24:59'),
('dh_6a1ed0463d830', 'DH529711', NULL, 'Khách hàng 26', '0900000026', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-14 20:38:28'),
('dh_6a1ed0463e7b9', 'DH149594', NULL, 'Khách hàng 70', '0900000070', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 1410000, 30000, NULL, 0, 1440000, 'Thanh toán qua VNPAY', 0, 4, '2026-01-01 02:36:56'),
('dh_6a1ed0463eb49', 'DH970181', NULL, 'Khách hàng 99', '0900000099', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 7800000, 30000, NULL, 0, 7830000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-22 02:55:20'),
('dh_6a1ed0463fe82', 'DH475274', NULL, 'Khách hàng 75', '0900000075', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 3870000, 30000, NULL, 0, 3900000, 'Thanh toán qua VNPAY', 1, 3, '2026-04-15 22:38:49'),
('dh_6a1ed04641106', 'DH602625', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 7860000, 30000, NULL, 0, 7890000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-05-15 12:57:24'),
('dh_6a1ed0464224f', 'DH797305', NULL, 'Khách hàng 87', '0900000087', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 12300000, 30000, NULL, 0, 12330000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-02-01 10:00:53'),
('dh_6a1ed0464424e', 'DH236740', NULL, 'Khách hàng 20', '0900000020', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 3660000, 30000, NULL, 0, 3690000, 'Thanh toán qua VNPAY', 0, 1, '2026-01-27 01:58:54'),
('dh_6a1ed04644f5d', 'DH413206', NULL, 'Khách hàng 37', '0900000037', 'Khu vực 5, TP. Hồ Chí Minh', NULL, 5340000, 30000, NULL, 0, 5370000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-18 02:23:04'),
('dh_6a1ed046460cb', 'DH521388', NULL, 'Khách hàng 73', '0900000073', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2370000, 30000, NULL, 0, 2400000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-28 15:43:44'),
('dh_6a1ed04646e0f', 'DH931035', NULL, 'Khách hàng 54', '0900000054', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Thanh toán qua VNPAY', 0, 2, '2026-01-23 13:15:01'),
('dh_6a1ed046489b9', 'DH393333', NULL, 'Khách hàng 66', '0900000066', 'Khu vực 3, TP. Hồ Chí Minh', NULL, 13920000, 30000, NULL, 0, 13950000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-01-10 02:56:15'),
('dh_6a1ed046497e1', 'DH121135', NULL, 'Khách hàng 23', '0900000023', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 2430000, 30000, NULL, 0, 2460000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-09 06:52:20'),
('dh_6a1ed04649d41', 'DH612366', NULL, 'Khách hàng 28', '0900000028', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 3060000, 30000, NULL, 0, 3090000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-05-30 05:07:36'),
('dh_6a1ed0464a8ef', 'DH706849', NULL, 'Khách hàng 79', '0900000079', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 4860000, 30000, NULL, 0, 4890000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-03-13 16:53:32'),
('dh_6a1ed0464be6c', 'DH800421', NULL, 'Khách hàng 71', '0900000071', 'Khu vực 10, TP. Hồ Chí Minh', NULL, 5040000, 30000, NULL, 0, 5070000, 'Chuyển khoản qua ngân hàng', 0, 4, '2026-04-20 11:50:02'),
('dh_6a1ed0464cca3', 'DH703930', NULL, 'Khách hàng 2', '0900000002', 'Khu vực 4, TP. Hồ Chí Minh', NULL, 1980000, 30000, NULL, 0, 2010000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-03-10 13:14:51'),
('dh_6a1ed0464d831', 'DH377217', NULL, 'Khách hàng 68', '0900000068', 'Khu vực 9, TP. Hồ Chí Minh', NULL, 8730000, 30000, NULL, 0, 8760000, 'Chuyển khoản qua ngân hàng', 1, 3, '2026-01-24 19:08:50'),
('dh_6a1ed0464ef4b', 'DH576469', NULL, 'Khách hàng 7', '0900000007', 'Khu vực 7, TP. Hồ Chí Minh', NULL, 4680000, 30000, NULL, 0, 4710000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-01-12 17:31:58'),
('dh_6a1ed0464fd1d', 'DH577117', NULL, 'Khách hàng 64', '0900000064', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 10530000, 30000, NULL, 0, 10560000, 'Thanh toán qua VNPAY', 1, 3, '2026-03-23 21:49:58'),
('dh_6a1ed04651a63', 'DH447071', NULL, 'Khách hàng 49', '0900000049', 'Khu vực 6, TP. Hồ Chí Minh', NULL, 6390000, 30000, NULL, 0, 6420000, 'Thanh toán khi nhận hàng (COD)', 1, 3, '2026-04-24 10:52:40'),
('dh_6a1ed04653194', 'DH686179', NULL, 'Khách hàng 65', '0900000065', 'Khu vực 2, TP. Hồ Chí Minh', NULL, 4320000, 30000, NULL, 0, 4350000, 'Chuyển khoản qua ngân hàng', 0, 2, '2026-03-15 18:19:11'),
('dh_6a2111f01b8b2', 'DH01B8B4', 'ba467f83493062c5b15e72da52ac47fc', 'Hai', '0356895784', '613 Âu Cơ, Phường Phú Trung, Quận Tân Phú, TPHCM', '', 1283500, 0, 'vc_seed_6a1cec6207bdb', 160000, 1123500, 'Thanh toán khi nhận hàng', 0, 3, '2026-06-04 12:49:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) NOT NULL,
  `id_san_pham` varchar(36) NOT NULL,
  `id_bien_the` varchar(36) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 1,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('rank_1', 'Đồng', 0, 0.00, 'mdi:medal-outline', 'Hạng cơ bản cho khách hàng mới', '[\"Voucher cơ bản\",\"Ưu đãi sinh nhật 30K\",\"Theo dõi đơn hàng\"]', 'bg-gray-100 text-gray-700 border-gray-200', 1, '[\"SILVER2\"]'),
('rank_2', 'Bạc', 5000000, 5.00, 'mdi:medal', 'Hạng thân thiết dành cho khách mua thường xuyên', '[\"Giảm 5% mọi đơn\",\"Voucher sinh nhật 100K\",\"Freeship đơn từ 500K\",\"Nhận ưu đãi sớm\"]', 'bg-yellow-100 text-yellow-800 border-yellow-200', 1, '[\"GOLD5\"]'),
('rank_3', 'Vàng', 15000000, 10.00, 'mdi:star-circle', 'Hạng cao cấp dành cho khách hàng VIP', '[\"Giảm 10% mọi đơn\",\"Voucher sinh nhật 300K\",\"Freeship mọi đơn\",\"Quà tặng Lễ/Tết\",\"Ưu tiên hỗ trợ\"]', 'bg-red-100 text-[#6B0D18] border-red-200 shadow-sm', 1, '[\"DIAMOND10\",\"FREESHIPVIP\"]'),
('rank_4', 'Kim Cương', 50000000, 15.00, 'mdi:diamond', 'Hạng cao cấp dành cho khách hàng SVIP', '[\"Giảm 15% mọi đơn\",\"Voucher sinh nhật 500K\",\"Freeship hỏa tốc\",\"Bảo dưỡng trọn đời\",\"Quà tặng độc quyền\",\"Tư vấn chọn vòng riêng\"]', 'bg-blue-100 text-blue-800 border-blue-200', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ket_qua_ban_menh`
--

CREATE TABLE `ket_qua_ban_menh` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) DEFAULT NULL COMMENT 'NULL neu khach vang lai',
  `slug_ket_qua` varchar(36) NOT NULL,
  `loai_lich` enum('duong','am') NOT NULL DEFAULT 'duong',
  `ngay_sinh` tinyint(2) DEFAULT NULL,
  `thang_sinh` tinyint(2) DEFAULT NULL,
  `nam_sinh` smallint(4) NOT NULL,
  `gioi_tinh` enum('male','female') NOT NULL,
  `mong_muon` varchar(50) DEFAULT NULL,
  `ten_menh` varchar(20) NOT NULL,
  `thien_can` varchar(10) NOT NULL,
  `dia_chi` varchar(10) NOT NULL,
  `cung_phi` tinyint(2) NOT NULL,
  `ten_cung` varchar(20) NOT NULL,
  `nhom_menh` varchar(30) NOT NULL,
  `ket_qua_json` longtext NOT NULL,
  `ngay_tra` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ket_qua_ban_menh`
--

INSERT INTO `ket_qua_ban_menh` (`id`, `id_nguoi_dung`, `slug_ket_qua`, `loai_lich`, `ngay_sinh`, `thang_sinh`, `nam_sinh`, `gioi_tinh`, `mong_muon`, `ten_menh`, `thien_can`, `dia_chi`, `cung_phi`, `ten_cung`, `nhom_menh`, `ket_qua_json`, `ngay_tra`) VALUES
('41bf80c2-2ca3-40ae-8abb-d58ea68855da', 'ba467f83493062c5b15e72da52ac47fc', 'abcdbf7b-354f-4360-aead-d03233b65065', 'duong', 15, 11, 2004, 'male', 'tai_loc', 'Mộc', 'Giáp', 'Thân', 4, 'Tốn', 'Đông Tứ Mệnh', '{\"thong_tin_co_ban\":{\"nam_sinh_duong\":2004,\"nam_sinh_am\":2004,\"ngay_thang\":\"15\\/11\",\"loai_lich\":\"duong\",\"gioi_tinh\":\"male\",\"gioi_tinh_ten\":\"Nam\",\"mong_muon\":\"tai_loc\"},\"ngu_hanh\":{\"ten\":\"Mộc\",\"icon\":\"🌿\",\"color\":\"#228B22\",\"gradient\":\"from-green-600 to-green-800\",\"thien_can\":\"Giáp\",\"dia_chi\":\"Thân\",\"con_giap\":\"Khỉ\",\"tuong_sinh_boi\":\"Thủy\",\"sinh_ra\":\"Hỏa\",\"tuong_khac_boi\":\"Kim\",\"khac_ra\":\"Thổ\"},\"mau_sac\":{\"cat\":[{\"ten\":\"Xanh Lá\",\"hex\":\"#228B22\",\"y_nghia\":\"Màu chủ của hành Mộc, tượng trưng cho sự phát triển, sinh sôi và tràn đầy sinh khí\"},{\"ten\":\"Xanh Đậm\",\"hex\":\"#006400\",\"y_nghia\":\"Tăng cường năng lượng Mộc, giúp tập trung, sáng suốt trong quyết định\"},{\"ten\":\"Đen\",\"hex\":\"#1C1C1C\",\"y_nghia\":\"Màu của hành Thủy sinh Mộc, mang lại trí tuệ và sự bảo vệ\"},{\"ten\":\"Xanh Nước\",\"hex\":\"#1C3A5E\",\"y_nghia\":\"Thủy sinh Mộc, kích thích sáng tạo và mở rộng cơ hội\"}],\"hung\":[{\"ten\":\"Trắng\",\"hex\":\"#F5F5F5\",\"ly_do\":\"Kim khắc Mộc – làm suy yếu bản mệnh, tổn hại sức khỏe\"},{\"ten\":\"Xám\",\"hex\":\"#808080\",\"ly_do\":\"Xám thuộc Kim, tương tác tiêu cực với người mệnh Mộc\"}]},\"cung_phi\":{\"so\":4,\"ten\":\"Tốn\",\"hanh\":\"Mộc\",\"phuong_chinh\":\"Đông Nam\",\"nhom_menh\":\"Đông Tứ Mệnh\",\"huong_tot\":[\"Đông\",\"Đông Nam\",\"Bắc\",\"Nam\"],\"huong_xau\":[\"Tây\",\"Tây Bắc\",\"Tây Nam\",\"Đông Bắc\"]},\"da_quy\":{\"tot_nhat\":[{\"ten\":\"Aquamarine (Thạch Anh Xanh Biển)\",\"y_nghia\":\"Đá Thủy sinh Mộc, mang dòng năng lượng Thủy trong trẻo nuôi dưỡng hành Mộc bản mệnh. Aquamarine giúp người mệnh Mộc tăng trực giác, khả năng giao tiếp và cảm xúc ổn định. Đặc biệt phù hợp cho người làm nghề sáng tạo và nghệ thuật.\",\"mau_hex\":\"#7FFFD4\"},{\"ten\":\"Thạch Anh Đen (Black Obsidian)\",\"y_nghia\":\"Đá Thủy hành, bảo vệ bản mệnh khỏi năng lượng âm tính và ma xui quỷ khiến. Obsidian còn giúp người mệnh Mộc giải phóng những cảm xúc tiêu cực và tìm lại sự bình tâm.\",\"mau_hex\":\"#1C1C1C\"}],\"phu_hop\":[{\"ten\":\"Ngọc Bích (Nephrite Jade)\",\"y_nghia\":\"Đá cùng hành Mộc, khuếch đại sức sống, sự thịnh vượng và may mắn. Ngọc Bích là linh vật trường tồn trong phong thủy, mang lại sự bảo vệ toàn diện.\",\"mau_hex\":\"#3CB371\"},{\"ten\":\"Mã Não Xanh Lá\",\"y_nghia\":\"Đá Mộc hành giúp cân bằng cảm xúc, tăng cường sức bền và khả năng chịu đựng áp lực.\",\"mau_hex\":\"#2E8B57\"}],\"can_tranh\":[\"Thạch Anh Trắng\",\"Thạch Anh Vàng\",\"Đá Mắt Hổ Vàng\",\"Chalcedony Trắng\"]},\"diem_van_khi\":{\"tai_loc\":78,\"binh_an\":80,\"tinh_duyen\":82,\"ho_menh\":72,\"tong_van_khi\":78,\"nam_van\":\"Cát\"},\"loi_khuyen\":{\"tieu_de\":\"Tài Lộc & Công Danh cho Người Mệnh Mộc\",\"mo_ta\":\"Người mệnh Mộc như cây xanh vươn lên mạnh mẽ, đại diện cho sự phát triển không ngừng, tư duy sáng tạo và tinh thần tiên phong. Trong kinh doanh, người mệnh Mộc thường là người đi đầu, khai phá những lĩnh vực mới và có tầm nhìn xa trông rộng.\",\"noi_dung\":[\"🎯 **Hướng đặt bàn làm việc tốt nhất:** Ngồi quay về hướng Đông hoặc Đông Nam – đây là hai hướng thuộc Đông Tứ Mệnh, cộng hưởng mạnh mẽ với năng lượng Mộc bản mệnh của bạn.\",\"💰 **Vật phẩm phong thủy chiêu tài:** Đặt một cây xanh nhỏ (trầu bà, may mắn) ở góc Đông của bàn làm việc. Bên cạnh đó, đeo vòng tay Aquamarine (Thủy sinh Mộc) sẽ kích hoạt dòng năng lượng tài vận mạnh mẽ.\",\"🌈 **Màu sắc trong công việc:** Xanh lá cây và đen là màu chủ đạo giúp tăng cường may mắn. Mặc áo sơ-mi xanh khi đi họp, đàm phán sẽ tạo ấn tượng tốt và mang lại kết quả thuận lợi.\",\"📅 **Ngày tốt để ra quyết định:** Ngày Giáp, Ất (Can Mộc) trong tuần là ngày bản mệnh. Ngoài ra, ngày Nhâm, Quý (Can Thủy) cũng rất thuận lợi vì Thủy sinh Mộc.\",\"🔮 **Chiến lược tài vận:** Người mệnh Mộc nên đầu tư dài hạn thay vì lướt sóng ngắn hạn. Như cây lớn cần thời gian, tài sản của bạn sẽ tích lũy bền vững và mạnh mẽ theo thời gian.\"]},\"san_pham_goi_y\":[{\"id\":\"sp_001\",\"ten_sp\":\"Bột Xông Nhà\",\"slug\":\"san-pham-bot-xong-nha-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Bột Xông Nhà\\/bot-xong-nha-1.jpg\",\"gia_ban\":\"1020000\",\"gia_khuyen_mai\":\"816000\",\"tong_ton_kho\":365,\"ten_menh\":\"Mộc\",\"slug_menh\":\"moc\",\"ten_loai_da\":\"Ngọc Bích\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"},{\"id\":\"sp_002\",\"ten_sp\":\"Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích\",\"slug\":\"chuoi-ngoc-muc-duc-a-mix-lu-thong-binh-an-ngoc-bich-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Tràng Hạt\\/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích\\/chuoi-ngoc-muc-duc-1.jpg\",\"gia_ban\":\"810000\",\"gia_khuyen_mai\":\"688500\",\"tong_ton_kho\":124,\"ten_menh\":\"Mộc\",\"slug_menh\":\"moc\",\"ten_loai_da\":\"Ngọc Mực Dục\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"},{\"id\":\"sp_021\",\"ten_sp\":\"Shentacui Bánh Đậu Mứt Cam\",\"slug\":\"vong-tay-shentacui-banh-dau-mut-cam-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Vòng Ngọc\\/Shentacui Bánh Đậu Mứt Cam\\/shentacui-2 (1).jpg\",\"gia_ban\":\"1350000\",\"gia_khuyen_mai\":\"1080000\",\"tong_ton_kho\":187,\"ten_menh\":\"Mộc\",\"slug_menh\":\"moc\",\"ten_loai_da\":\"Ngọc Mực Dục\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"},{\"id\":\"sp_004\",\"ten_sp\":\"Ngọc Hòa Điền Màu Nhã Nhặn\",\"slug\":\"vong-tay-ngoc-hoa-dien-mau-nha-nhan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Tràng Hạt\\/Ngọc Hòa Điền Màu Nhã Nhặn\\/ngoc-hoa-dien-1.jpg\",\"gia_ban\":\"1520000\",\"gia_khuyen_mai\":\"500000\",\"tong_ton_kho\":149,\"ten_menh\":\"Mộc\",\"slug_menh\":\"moc\",\"ten_loai_da\":\"Ngọc Tụ Nham\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"},{\"id\":\"sp_017\",\"ten_sp\":\"Mã Não Hồng Bưởi\",\"slug\":\"vong-tay-ma-nao-hong-buoi-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Vòng Ngọc\\/Mã Não Hồng Bưởi\\/ma-nao-hong-buoi-1.jpg\",\"gia_ban\":\"1070000\",\"gia_khuyen_mai\":\"856000\",\"tong_ton_kho\":120,\"ten_menh\":\"Mộc\",\"slug_menh\":\"moc\",\"ten_loai_da\":\"Ngọc Bích\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"}]}', '2026-06-03 14:48:48'),
('b65d613f-360c-4b6f-bc77-a6cf47eb7427', NULL, 'f5390881-2f69-441d-8f5e-b36a073cdcb4', 'duong', 11, 6, 2000, 'male', 'tinh_duyen', 'Kim', 'Canh', 'Thìn', 8, 'Cấn', 'Tây Tứ Mệnh', '{\"thong_tin_co_ban\":{\"nam_sinh_duong\":2000,\"nam_sinh_am\":2000,\"ngay_thang\":\"11\\/06\",\"loai_lich\":\"duong\",\"gioi_tinh\":\"male\",\"gioi_tinh_ten\":\"Nam\",\"mong_muon\":\"tinh_duyen\"},\"ngu_hanh\":{\"ten\":\"Kim\",\"icon\":\"⚙️\",\"color\":\"#C0C0C0\",\"gradient\":\"from-gray-300 to-gray-500\",\"thien_can\":\"Canh\",\"dia_chi\":\"Thìn\",\"con_giap\":\"Rồng\",\"tuong_sinh_boi\":\"Thổ\",\"sinh_ra\":\"Thủy\",\"tuong_khac_boi\":\"Hỏa\",\"khac_ra\":\"Mộc\"},\"mau_sac\":{\"cat\":[{\"ten\":\"Trắng\",\"hex\":\"#F5F5F5\",\"y_nghia\":\"Màu chủ của hành Kim, tượng trưng cho sự trong sáng, tinh khiết và khởi đầu mới\"},{\"ten\":\"Xám Bạc\",\"hex\":\"#C0C0C0\",\"y_nghia\":\"Màu bạc thu hút tài lộc, thăng tiến và nhận được sự hỗ trợ từ quý nhân\"},{\"ten\":\"Vàng Kim\",\"hex\":\"#D4AF37\",\"y_nghia\":\"Màu vàng đến từ hành Thổ sinh Kim, kích hoạt vượng khí tài lộc\"},{\"ten\":\"Nâu Đất\",\"hex\":\"#8B6914\",\"y_nghia\":\"Màu đất ổn định tài vận, bảo vệ sức khỏe và tăng cường sự kiên định\"}],\"hung\":[{\"ten\":\"Đỏ\",\"hex\":\"#8B0000\",\"ly_do\":\"Hỏa khắc Kim – mang lại bất hòa, tổn thất tài chính, dễ phạm tiểu nhân\"},{\"ten\":\"Cam\",\"hex\":\"#FF6B35\",\"ly_do\":\"Cùng thuộc hành Hỏa, làm suy yếu năng lượng Kim mệnh\"},{\"ten\":\"Tím\",\"hex\":\"#800080\",\"ly_do\":\"Tím thuộc Hỏa, tương tác tiêu cực với người mệnh Kim\"}]},\"cung_phi\":{\"so\":8,\"ten\":\"Cấn\",\"hanh\":\"Thổ\",\"phuong_chinh\":\"Đông Bắc\",\"nhom_menh\":\"Tây Tứ Mệnh\",\"huong_tot\":[\"Tây\",\"Tây Bắc\",\"Tây Nam\",\"Đông Bắc\"],\"huong_xau\":[\"Đông\",\"Đông Nam\",\"Bắc\",\"Nam\"]},\"da_quy\":{\"tot_nhat\":[{\"ten\":\"Thạch Anh Vàng (Citrine)\",\"y_nghia\":\"Đá Thổ sinh Kim, mang nguồn năng lượng Thổ mạnh mẽ nuôi dưỡng bản mệnh, thu hút tài lộc và sự thịnh vượng. Citrine được mệnh danh là \\\"đá của thương nhân\\\" vì khả năng thu hút tiền bạc và cơ hội kinh doanh.\",\"mau_hex\":\"#D4AF37\"},{\"ten\":\"Mắt Hổ Vàng\",\"y_nghia\":\"Đá Thổ sinh Kim, mang lại sự tự tin, quyết đoán và năng lượng bảo vệ mạnh mẽ. Mắt Hổ giúp người mệnh Kim định hướng rõ ràng và tránh bị lừa dối trong các giao dịch.\",\"mau_hex\":\"#C8860A\"}],\"phu_hop\":[{\"ten\":\"Thạch Anh Trắng\",\"y_nghia\":\"Đá cùng hành Kim, khuếch đại năng lượng và thanh lọc tiêu cực. Giúp người mệnh Kim tư duy sắc bén và duy trì tâm trạng bình tĩnh.\",\"mau_hex\":\"#F0F0F0\"},{\"ten\":\"Bạch Ngọc (White Jade)\",\"y_nghia\":\"Ngọc trắng thuần khiết thuộc Kim hành, mang lại sự bình an nội tâm và bảo vệ khỏi năng lượng xấu.\",\"mau_hex\":\"#F5F5F0\"}],\"can_tranh\":[\"Thạch Anh Đỏ\",\"Garnet\",\"Ruby\",\"Đá Đỏ Huyết (Bloodstone)\"]},\"diem_van_khi\":{\"tai_loc\":82,\"binh_an\":75,\"tinh_duyen\":68,\"ho_menh\":85,\"tong_van_khi\":77,\"nam_van\":\"Cát\"},\"loi_khuyen\":{\"tieu_de\":\"Tình Duyên & Gia Đạo cho Người Mệnh Kim\",\"mo_ta\":\"Người mệnh Kim trong tình yêu là người trung thành, nghiêm túc và luôn đặt ra tiêu chuẩn cao. Đôi khi sự cầu toàn và cứng nhắc có thể tạo ra khoảng cách trong các mối quan hệ. Phong thủy giúp người mệnh Kim mềm mại hơn và thu hút được người tâm giao.\",\"noi_dung\":[\"💑 **Người bạn đời lý tưởng:** Người mệnh Thổ (Kỷ, Mậu) là đối tác hoàn hảo nhất vì Thổ sinh Kim, tạo sự hài hòa và bổ sung cho nhau. Người mệnh Kim cũng tương hợp với người mệnh Kim khác nhờ sự đồng điệu.\",\"🏠 **Phong thủy phòng ngủ:** Đặt đầu giường hướng Tây hoặc Tây Bắc. Thêm cặp Mandarin Duck (Uyên Ương Đá) bằng Thạch Anh Hồng ở góc Tây Nam phòng ngủ để kích hoạt Đào Hoa Cung.\",\"💎 **Đá thu hút duyên:** Thạch Anh Hồng (Rose Quartz) kết hợp với Thạch Anh Trắng (Kim hành) đặt trên bàn trang điểm để thu hút năng lượng tình yêu.\",\"🌹 **Nghi thức tăng duyên:** Vào ngày mùng 7 âm lịch hàng tháng, thắp 2 nến màu trắng và đặt hoa hồng trắng hoặc vàng trước bàn thờ Ông Tơ Bà Nguyệt.\",\"🔮 **Hướng tốt cho hẹn hò:** Đặt địa điểm hẹn hò ở phía Tây hoặc Tây Bắc nhà bạn. Chọn ngày Canh, Tân để gặp gỡ người quan trọng.\"]},\"san_pham_goi_y\":[{\"id\":\"sp_016\",\"ten_sp\":\"Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng\",\"slug\":\"vong-tay-ma-nao-anh-dao-diem-hoa-trong-co-vay-rong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Vòng Ngọc\\/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng\\/ma-nao-anh-dao-vay-rong-1.jpg\",\"gia_ban\":\"680000\",\"gia_khuyen_mai\":\"500000\",\"tong_ton_kho\":115,\"ten_menh\":\"Kim\",\"slug_menh\":\"kim\",\"ten_loai_da\":\"Thạch Anh Tóc Vàng\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"}]}', '2026-06-03 14:17:36'),
('eb3ca3ae-7747-47c9-bb89-d5d7c49aed7e', 'ba467f83493062c5b15e72da52ac47fc', '08a61193-be05-4c2c-9bfc-356e8cde162d', 'duong', 15, 11, 2004, 'male', 'tinh_duyen', 'Thủy', 'Giáp', 'Thân', 4, 'Tốn', 'Đông Tứ Mệnh', '{\"thong_tin_co_ban\":{\"nam_sinh_duong\":2004,\"nam_sinh_am\":2004,\"ngay_thang\":\"15\\/11\",\"loai_lich\":\"duong\",\"gioi_tinh\":\"male\",\"gioi_tinh_ten\":\"Nam\",\"mong_muon\":\"tinh_duyen\"},\"ngu_hanh\":{\"ten\":\"Thủy\",\"nap_am\":\"Tuyền Trung Thủy\",\"icon\":\"💧\",\"color\":\"#1C3A5E\",\"gradient\":\"from-blue-700 to-blue-900\",\"thien_can\":\"Giáp\",\"hanh_thien_can\":\"Mộc\",\"dia_chi\":\"Thân\",\"con_giap\":\"Khỉ\",\"tuong_sinh_boi\":\"Kim\",\"sinh_ra\":\"Mộc\",\"tuong_khac_boi\":\"Thổ\",\"khac_ra\":\"Hỏa\"},\"mau_sac\":{\"cat\":[{\"ten\":\"Đen\",\"hex\":\"#1C1C1C\",\"y_nghia\":\"Màu chủ của hành Thủy, tượng trưng cho trí tuệ sâu sắc và sự linh hoạt\"},{\"ten\":\"Xanh Nước\",\"hex\":\"#1C3A5E\",\"y_nghia\":\"Tăng cường năng lượng Thủy, hỗ trợ tư duy và sự nhạy cảm\"},{\"ten\":\"Trắng\",\"hex\":\"#F5F5F5\",\"y_nghia\":\"Kim sinh Thủy – màu trắng bổ sung năng lượng tích cực cho mệnh Thủy\"},{\"ten\":\"Xám Bạc\",\"hex\":\"#C0C0C0\",\"y_nghia\":\"Bạc thuộc Kim, sinh trợ Thủy mệnh, mang lại sự ổn định và tài lộc\"}],\"hung\":[{\"ten\":\"Vàng\",\"hex\":\"#D4AF37\",\"ly_do\":\"Thổ khắc Thủy – cản trở dòng chảy năng lượng, tổn hại sức khỏe\"},{\"ten\":\"Nâu\",\"hex\":\"#8B4513\",\"ly_do\":\"Nâu thuộc Thổ, kìm hãm phát triển của người mệnh Thủy\"}]},\"cung_phi\":{\"so\":4,\"ten\":\"Tốn\",\"hanh\":\"Mộc\",\"phuong_chinh\":\"Đông Nam\",\"nhom_menh\":\"Đông Tứ Mệnh\",\"huong_tot\":[\"Đông\",\"Đông Nam\",\"Bắc\",\"Nam\"],\"huong_xau\":[\"Tây\",\"Tây Bắc\",\"Tây Nam\",\"Đông Bắc\"]},\"da_quy\":{\"tot_nhat\":[{\"ten\":\"Thạch Anh Trắng (Clear Quartz)\",\"y_nghia\":\"Đá Kim sinh Thủy, là nguồn năng lượng Kim trong sáng nhất nuôi dưỡng bản mệnh. Clear Quartz khuếch đại mọi ý định tích cực, tăng cường trí tuệ và khả năng tập trung vượt trội. Người mệnh Thủy đeo đá này sẽ cảm nhận sự rõ ràng trong tư duy.\",\"mau_hex\":\"#F0F0FF\"},{\"ten\":\"Thạch Anh Mặt Trăng (Moonstone)\",\"y_nghia\":\"Đá Kim hành, liên kết với năng lượng Mặt Trăng và Thủy triều, cộng hưởng mạnh mẽ với mệnh Thủy. Giúp tăng cường trực giác, khả năng empathy và cảm xúc sâu sắc.\",\"mau_hex\":\"#E8E8FF\"}],\"phu_hop\":[{\"ten\":\"Obsidian Đen\",\"y_nghia\":\"Cùng hành Thủy, bảo vệ mạnh mẽ khỏi tiêu cực, giải phóng sợ hãi và chữa lành vết thương tâm lý.\",\"mau_hex\":\"#1C1C1C\"},{\"ten\":\"Sapphire Xanh\",\"y_nghia\":\"Đá Thủy hành quý hiếm, thu hút sự tôn trọng, trí tuệ và khả năng lãnh đạo vượt trội.\",\"mau_hex\":\"#082567\"}],\"can_tranh\":[\"Citrine Vàng\",\"Jasper Vàng-Nâu\",\"Đá Mắt Hổ\",\"Tiger Eye Nâu\"]},\"diem_van_khi\":{\"tai_loc\":80,\"binh_an\":70,\"tinh_duyen\":76,\"ho_menh\":78,\"tong_van_khi\":76,\"nam_van\":\"Cát\"},\"loi_khuyen\":{\"tieu_de\":\"Tình Duyên & Gia Đạo cho Người Mệnh Thủy\",\"mo_ta\":\"Người mệnh Thủy trong tình yêu là bản thể của cảm xúc và sự gắn kết sâu sắc. Họ nhạy cảm, đồng cảm cao và có khả năng yêu thương vô điều kiện. Thách thức là người mệnh Thủy đôi khi quá chìm đắm vào cảm xúc và dễ bị tổn thương. Phong thủy giúp cân bằng và bảo vệ cái tôi trong tình yêu.\",\"noi_dung\":[\"💑 **Bạn đời tương sinh:** Người mệnh Kim (Canh, Tân) là đối tác lý tưởng nhất – Kim sinh Thủy, sự bảo vệ và tình yêu của người mệnh Kim bao bọc người mệnh Thủy an toàn.\",\"🏠 **Phong thủy tình cảm:** Trong phòng ngủ, đặt cặp đèn ngủ hình trái tim màu hồng ở góc Tây Nam. Tránh đặt gương đối diện giường – nó phản chiếu năng lượng và phá vỡ sự gắn kết cặp đôi.\",\"💎 **Bộ đôi đá tình yêu:** Thạch Anh Trắng (Kim sinh Thủy) kết hợp Thạch Anh Hồng (Rose Quartz) là combo hoàn hảo để mở trái tim và thu hút tình yêu chân thành.\",\"🌹 **Kích hoạt Đào Hoa:** Đặt bình hoa hồng đỏ ở góc Bắc phòng ngủ (hướng Thủy) mỗi tuần. Nước trong bình nên được thay mỗi 3 ngày để duy trì năng lượng tươi mới.\",\"🔮 **Bảo vệ tình cảm:** Người mệnh Thủy cần đeo Obsidian Đen để bảo vệ khỏi những kẻ có tâm địa xấu và những mối quan hệ không lành mạnh.\"]},\"san_pham_goi_y\":[{\"id\":\"sp_012\",\"ten_sp\":\"Tram Huong\",\"slug\":\"san-pham-tram-huong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy\",\"hinh_anh_chinh\":\"\\/images\\/Sản phẩm\\/Trầm Hương và Nhang\\/tram-huong-1.jpg\",\"gia_ban\":\"790000\",\"gia_khuyen_mai\":\"500000\",\"tong_ton_kho\":213,\"ten_menh\":\"Thủy\",\"slug_menh\":\"thuy\",\"ten_loai_da\":\"Ngọc Mực Dục\",\"uu_tien\":3,\"loai_goi_y\":\"tuong_hop\"}]}', '2026-06-04 09:34:20');

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
('d36b781f-5c1c-11f1-a6a6-088fc37729cd', 'd36b5bba-5c1c-11f1-a6a6-088fc37729cd', 'd36b74ab-5c1c-11f1-a6a6-088fc37729cd', 'KE-B2', 'Kệ B2', 'ke', 2000, 1, '2026-05-30 18:43:50'),
('kv_6a1ed26eaced9', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A01', 'Kệ A01', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead1a8', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A02', 'Kệ A02', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead2f8', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A03', 'Kệ A03', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead433', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A04', 'Kệ A04', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead56c', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A05', 'Kệ A05', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead6c3', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A06', 'Kệ A06', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead8d9', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A07', 'Kệ A07', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26ead9ff', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A08', 'Kệ A08', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26eadb74', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A09', 'Kệ A09', 'khu', 1000, 1, '2026-06-02 19:54:06'),
('kv_6a1ed26eadee3', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', NULL, 'A010', 'Kệ A010', 'khu', 1000, 1, '2026-06-02 19:54:06');

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
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `id` varchar(36) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `chu_de` varchar(100) NOT NULL,
  `menh_nam_sinh` varchar(100) DEFAULT NULL,
  `noi_dung` text NOT NULL,
  `kenh_lien_he` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 0,
  `ngay_tao` datetime DEFAULT current_timestamp()
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
('5e4d964ac24fe1e1abba8a377b6788ee', NULL, 'rank_1', 'KH986998', 'cường', NULL, NULL, NULL, NULL, 'thanhhailop11a6@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-06-02 12:24:14', NULL, 0),
('ba467f83493062c5b15e72da52ac47fc', NULL, 'rank_1', 'KH986997', 'Haioii', 'Nam', '1971-09-16', NULL, NULL, 'thanhhai81004@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0356895784', '613 Âu Cơ, Phường Phú Trung, Quận Tân Phú, TPHCM', NULL, NULL, 1123500, 0, 1, '2026-06-02 12:21:17', NULL, 112),
('kh_6a17dc271eecd', NULL, 'rank_1', 'KHEED0', 'test', 'nam', NULL, 2004, 'menh_3', 'admin1234@example.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0898675436', '789 Trần Hưng Đạo, Quận 1, TP.HCM', '/uploads/users/kh_6a17dc271eecd.jpeg', '', 0, 0, 1, '2026-05-28 13:09:43', '2026-05-28 19:42:27', 0),
('kh_6a17dc6aac40c', NULL, 'rank_1', 'KHC40F', 'tdsdgds', 'nam', '1995-06-16', 1995, 'menh_4', '235235@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '09876353', '12 Võ Văn Kiệt, Cần Thơ', '/uploads/users/kh_6a17dc6aac40c.jpeg', '', 0, 0, 1, '2026-05-28 13:10:50', '2026-05-28 19:42:17', 0),
('kh_6a183864cecd3', NULL, 'rank_1', 'KH63511E', 'Nguyễn Xuân Linh', 'Nữ', '2003-03-01', 2003, NULL, '9936@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0984470724', '45 Lê Duẩn, Hà Nội', NULL, NULL, 3382658, 0, 1, '2025-09-04 14:43:16', NULL, 0),
('kh_6a183864cfc64', NULL, 'rank_1', 'KH4E7B2E', 'Võ Gia Vinh', 'Nữ', '1996-08-20', 1996, NULL, 'vogiavinh4902@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0969559443', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4245178, 0, 1, '2025-06-08 14:43:16', NULL, 0),
('kh_6a183864d0640', NULL, 'rank_1', 'KHFAD19F', 'Phan Đức Khánh', 'Nam', '1970-11-06', 1970, NULL, '1548@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0978772656', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2026-04-20 14:43:16', NULL, 0),
('kh_6a183864d097f', NULL, 'rank_1', 'KH1358F0', 'Huỳnh Đức Dũng', 'Nam', '1984-09-20', 1984, NULL, '7689@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0931171040', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2864973, 0, 1, '2026-03-20 14:43:16', NULL, 0),
('kh_6a183864d0cf7', NULL, 'rank_1', 'KHF35579', 'Đặng Minh Vinh', 'Khác', '1981-08-27', 1981, NULL, '2586@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0962417692', '34 Hai Bà Trưng, Huế', NULL, NULL, 2152460, 0, 1, '2026-04-06 14:43:16', NULL, 0),
('kh_6a183864d1037', NULL, 'rank_1', 'KH475D44', 'Võ Đức Dũng', 'Nữ', '2005-02-08', 2005, NULL, '9868@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0918154900', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 4358309, 0, 1, '2026-05-25 14:43:16', NULL, 0),
('kh_6a183864d141b', NULL, 'rank_1', 'KH094853', 'Phạm Hữu Bình', 'Khác', '1986-07-11', 1986, NULL, '6203@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0999267027', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-03-03 14:43:16', NULL, 0),
('kh_6a183864d1780', NULL, 'rank_1', 'KH331C0B', 'Trần Thanh Anh', 'Nam', '1993-07-27', 1993, NULL, '7045@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0928495551', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4429586, 0, 1, '2025-08-27 14:43:16', NULL, 0),
('kh_6a183864d1a95', NULL, 'rank_1', 'KH5A1BAA', 'Nguyễn Văn Quỳnh', 'Nữ', '1996-10-21', 1996, NULL, '1115@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916825106', '34 Hai Bà Trưng, Huế', NULL, NULL, 3585561, 0, 1, '2026-04-06 14:43:16', NULL, 0),
('kh_6a183864d1d81', NULL, 'rank_1', 'KH96D064', 'Nguyễn Gia Phương', 'Nữ', '2004-08-20', 2004, NULL, '8984@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0949781504', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-01-01 14:43:16', NULL, 0),
('kh_6a183864d2043', NULL, 'rank_2', 'KH27376C', 'Bùi Hữu Giang', 'Nữ', '2000-06-13', 2000, NULL, '2680@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0999757491', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 6170738, 0, 1, '2026-05-26 14:43:16', NULL, 0),
('kh_6a183864d239a', NULL, 'rank_1', 'KH893C39', 'Phan Quang Phương', 'Nữ', '1976-01-16', 1976, NULL, '345@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915714647', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 961599, 0, 1, '2025-12-29 14:43:16', NULL, 0),
('kh_6a183864d2686', NULL, 'rank_1', 'KH3C98BC', 'Lê Tuấn Anh', 'Khác', '1982-08-13', 1982, NULL, '2301@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0990081719', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-07-15 14:43:16', NULL, 0),
('kh_6a183864d2994', NULL, 'rank_1', 'KHD9F637', 'Đặng Thanh Mai', 'Nữ', '1995-02-05', 1995, NULL, '5213@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0985835832', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 418698, 0, 1, '2025-08-11 14:43:16', NULL, 0),
('kh_6a183864d2c59', NULL, 'rank_1', 'KHB3D92E', 'Phạm Thu Anh', 'Nữ', '1988-06-05', 1988, NULL, '5585@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0994866399', '45 Lê Duẩn, Hà Nội', NULL, NULL, 2936248, 0, 1, '2025-08-30 14:43:16', NULL, 0),
('kh_6a183864d3095', NULL, 'rank_1', 'KH008C6E', 'Ngô Đức Em', 'Khác', '1979-11-15', 1979, NULL, '5834@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0938640848', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4958944, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864d3388', NULL, 'rank_1', 'KHA4ADE1', 'Lý Tuấn Oanh', 'Nam', '1994-03-17', 1994, NULL, '2821@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0921022400', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2987663, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864d366c', NULL, 'rank_1', 'KHD9553D', 'Hoàng Minh Khánh', 'Khác', '1979-01-24', 1979, NULL, 'hoangminhkhanh4279@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0971416792', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-03-19 14:43:16', NULL, 0),
('kh_6a183864d38a6', NULL, 'rank_1', 'KH6E85AF', 'Dương Thị Yến', 'Khác', '2005-12-01', 2005, NULL, '615@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0913792721', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 519874, 0, 1, '2025-06-29 14:43:16', NULL, 0),
('kh_6a183864d3b7c', NULL, 'rank_1', 'KHF44557', 'Lê Xuân Bình', 'Nữ', '1999-04-09', 1999, NULL, 'lexuanbinh9834@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0936940457', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-05-19 14:43:16', NULL, 0),
('kh_6a183864d3df0', NULL, 'rank_1', 'KH6A3140', 'Hoàng Văn Giang', 'Khác', '1978-12-10', 1978, NULL, 'hoangvangiang8008@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0922977234', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 452099, 0, 1, '2025-09-29 14:43:16', NULL, 0),
('kh_6a183864d404e', NULL, 'rank_1', 'KHB1613E', 'Phan Minh Yến', 'Nữ', '1978-11-28', 1978, NULL, '6646@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916319167', '45 Lê Duẩn, Hà Nội', NULL, NULL, 2235127, 0, 1, '2026-01-08 14:43:16', NULL, 0),
('kh_6a183864d4360', NULL, 'rank_1', 'KH0A5463', 'Lý Hải Nam', 'Nam', '1983-02-16', 1983, NULL, '1380@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0938599736', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3447958, 0, 1, '2026-01-26 14:43:16', NULL, 0),
('kh_6a183864d461b', NULL, 'rank_1', 'KH02ECDA', 'Trần Hữu Uyên', 'Nam', '1978-07-17', 1978, NULL, '3705@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0992394513', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4123409, 0, 1, '2025-10-30 14:43:16', NULL, 0),
('kh_6a183864d49e4', NULL, 'rank_1', 'KH73E48E', 'Vũ Minh Uyên', 'Nam', '1983-10-12', 1983, NULL, 'vuminhuyen1386@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0924403854', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2963948, 0, 1, '2026-02-07 14:43:16', NULL, 0),
('kh_6a183864d4c48', NULL, 'rank_1', 'KHA9331E', 'Vũ Gia Anh', 'Khác', '1998-01-02', 1998, NULL, 'vugiaanh4993@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0951277788', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-12-02 14:43:16', NULL, 0),
('kh_6a183864d4e56', NULL, 'rank_1', 'KHEE1687', 'Lý Mạnh Bình', 'Nữ', '1983-03-05', 1983, NULL, '5551@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0947527059', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-01-20 14:43:16', NULL, 0),
('kh_6a183864d5370', NULL, 'rank_1', 'KH406689', 'Phan Thanh Anh', 'Nam', '1970-01-20', 1970, NULL, 'phanthanhanh1413@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0949199459', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-09-13 14:43:16', NULL, 0),
('kh_6a183864d56f6', NULL, 'rank_1', 'KH8EA701', 'Phạm Tuấn Dũng', 'Khác', '1984-06-18', 1984, NULL, '1990@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0911552904', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-11-30 14:43:16', NULL, 0),
('kh_6a183864d5b61', NULL, 'rank_1', 'KH33D66A', 'Lý Đức Dũng', 'Nam', '1997-05-14', 1997, NULL, '3516@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0982791888', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-11-02 14:43:16', NULL, 0),
('kh_6a183864d5f72', NULL, 'rank_1', 'KH1B89EC', 'Lý Ngọc Linh', 'Khác', '1994-11-23', 1994, NULL, '8785@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0932397062', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4005261, 0, 1, '2025-11-16 14:43:16', NULL, 0),
('kh_6a183864d62a5', NULL, 'rank_1', 'KH2D97CF', 'Đặng Thu Yến', 'Khác', '2002-06-10', 2002, NULL, '2456@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0980251088', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1821240, 0, 1, '2026-05-04 14:43:16', NULL, 0),
('kh_6a183864d6660', NULL, 'rank_1', 'KH5A5456', 'Hồ Minh Khánh', 'Nữ', '1975-08-20', 1975, NULL, '6280@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0927339467', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 4630497, 0, 1, '2025-12-13 14:43:16', NULL, 0),
('kh_6a183864d6a51', NULL, 'rank_1', 'KH340D22', 'Huỳnh Thanh Anh', 'Nữ', '1994-09-13', 1994, NULL, 'huynhthanhanh5308@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0934346264', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864d6c49', NULL, 'rank_1', 'KHD602B2', 'Đặng Thị Em', 'Nữ', '1996-12-08', 1996, NULL, '7516@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0968586968', '34 Hai Bà Trưng, Huế', NULL, NULL, 3143878, 0, 1, '2025-10-14 14:43:16', NULL, 0),
('kh_6a183864d7fc1', NULL, 'rank_1', 'KH7D19F8', 'Lê Gia Anh', 'Khác', '1978-11-26', 1978, NULL, 'legiaanh4369@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0938570706', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4452028, 0, 1, '2025-11-10 14:43:16', NULL, 0),
('kh_6a183864d8470', NULL, 'rank_1', 'KHAF5957', 'Đỗ Hải Mai', 'Khác', '1998-08-06', 1998, NULL, '2807@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0937624495', '34 Hai Bà Trưng, Huế', NULL, NULL, 2688434, 0, 1, '2025-10-24 14:43:16', NULL, 0),
('kh_6a183864d8938', NULL, 'rank_1', 'KH8052A0', 'Vũ Mạnh Nam', 'Nam', '1986-07-12', 1986, NULL, '7009@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0980483971', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1093295, 0, 1, '2025-11-26 14:43:16', NULL, 0),
('kh_6a183864d8da8', NULL, 'rank_1', 'KH9268B3', 'Dương Quang Dũng', 'Nam', '1993-09-04', 1993, NULL, '1857@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0988874929', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 1090937, 0, 1, '2025-09-19 14:43:16', NULL, 0),
('kh_6a183864d9216', NULL, 'rank_1', 'KH2A97C3', 'Võ Thị Nam', 'Khác', '1982-10-11', 1982, NULL, '1708@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0992454223', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 4750567, 0, 1, '2025-07-26 14:43:16', NULL, 0),
('kh_6a183864d9674', NULL, 'rank_1', 'KH179B21', 'Trần Hữu Lan', 'Nữ', '1990-02-12', 1990, NULL, '9930@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0947837325', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4414524, 0, 1, '2025-09-10 14:43:16', NULL, 0),
('kh_6a183864d9b06', NULL, 'rank_1', 'KHEFD174', 'Hồ Gia Trang', 'Nữ', '1991-08-28', 1991, NULL, '1169@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0936314809', '34 Hai Bà Trưng, Huế', NULL, NULL, 1896164, 0, 1, '2026-05-05 14:43:16', NULL, 0),
('kh_6a183864da034', NULL, 'rank_1', 'KHC010E3', 'Ngô Mạnh Em', 'Nữ', '1986-04-23', 1986, NULL, '1319@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0960858674', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 1379438, 0, 1, '2025-09-25 14:43:16', NULL, 0),
('kh_6a183864da4a6', NULL, 'rank_1', 'KHEDE5FC', 'Lê Gia Vinh', 'Nam', '2005-05-04', 2005, NULL, 'legiavinh4405@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0989228781', '34 Hai Bà Trưng, Huế', NULL, NULL, 4500776, 0, 1, '2025-07-25 14:43:16', NULL, 0),
('kh_6a183864da863', NULL, 'rank_1', 'KHB159BB', 'Phạm Mạnh Uyên', 'Nữ', '1973-05-05', 1973, NULL, '4625@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0918308088', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 571191, 0, 1, '2026-05-12 14:43:16', NULL, 0),
('kh_6a183864daccb', NULL, 'rank_1', 'KHBB0166', 'Bùi Mạnh Lan', 'Nam', '1992-11-04', 1992, NULL, '9430@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916455118', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-04-28 14:43:16', NULL, 0),
('kh_6a183864daf6b', NULL, 'rank_1', 'KHDC6BAB', 'Lý Xuân Phúc', 'Nữ', '1978-04-19', 1978, NULL, 'lyxuanphuc9723@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0935677669', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2026-01-10 14:43:16', NULL, 0),
('kh_6a183864db0c9', NULL, 'rank_1', 'KHD8A591', 'Dương Thị Lan', 'Nữ', '1991-05-17', 1991, NULL, '9990@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0938080761', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-09-19 14:43:16', NULL, 0),
('kh_6a183864db37e', NULL, 'rank_1', 'KH7CB893', 'Phan Minh Anh', 'Nam', '1995-08-18', 1995, NULL, 'phanminhanh7359@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0940263563', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3550125, 0, 1, '2025-09-01 14:43:16', NULL, 0),
('kh_6a183864db59a', NULL, 'rank_1', 'KH588568', 'Bùi Minh Bình', 'Khác', '1998-04-27', 1998, NULL, 'buiminhbinh4621@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0978148710', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4677050, 0, 1, '2025-08-10 14:43:16', NULL, 0),
('kh_6a183864db7a4', NULL, 'rank_1', 'KHEB30A3', 'Hồ Gia Phúc', 'Khác', '2005-09-01', 2005, NULL, '2523@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915965408', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 3546226, 0, 1, '2025-06-04 14:43:16', NULL, 0),
('kh_6a183864dba87', NULL, 'rank_1', 'KH618739', 'Dương Thanh Dũng', 'Khác', '1994-08-26', 1994, NULL, '168@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0968105924', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-10-24 14:43:16', NULL, 0),
('kh_6a183864dbc65', NULL, 'rank_1', 'KH065AED', 'Hồ Thu Dũng', 'Nữ', '1986-03-27', 1986, NULL, '603@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0980263755', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-05-29 14:43:16', NULL, 0),
('kh_6a183864dbed9', NULL, 'rank_1', 'KHE489E3', 'Dương Văn Cường', 'Khác', '2001-01-17', 2001, NULL, '2020@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0917852699', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2765008, 0, 1, '2025-07-28 14:43:16', NULL, 0),
('kh_6a183864dc124', NULL, 'rank_1', 'KHBAB8C3', 'Bùi Thu Nam', 'Khác', '1993-02-21', 1993, NULL, 'buithunam7294@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0994291498', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 182330, 0, 1, '2025-10-01 14:43:16', NULL, 0),
('kh_6a183864dc2ce', NULL, 'rank_1', 'KH4B6442', 'Hoàng Ngọc Cường', 'Nam', '2000-08-06', 2000, NULL, '3988@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0966849918', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-01-26 14:43:16', NULL, 0),
('kh_6a183864dc515', NULL, 'rank_1', 'KH5B3562', 'Vũ Thu Phúc', 'Nam', '1978-05-19', 1978, NULL, 'vuthuphuc1338@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0935057358', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4564380, 0, 1, '2026-01-28 14:43:16', NULL, 0),
('kh_6a183864dc8e2', NULL, 'rank_1', 'KH4CEB48', 'Hoàng Quang Phúc', 'Khác', '1996-02-03', 1996, NULL, 'hoangquangphuc3195@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0932816048', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 4524109, 0, 1, '2025-11-25 14:43:16', NULL, 0),
('kh_6a183864dcc8c', NULL, 'rank_1', 'KHFF285D', 'Phạm Hữu Uyên', 'Nam', '1970-06-07', 1970, NULL, '5260@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0968571452', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-08-08 14:43:16', NULL, 0),
('kh_6a183864dcf8e', NULL, 'rank_1', 'KHD3459E', 'Võ Tuấn Vinh', 'Nam', '1982-04-11', 1982, NULL, '6187@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0960414667', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-01-02 14:43:16', NULL, 0),
('kh_6a183864dd2b1', NULL, 'rank_1', 'KH7A96A4', 'Vũ Tuấn Cường', 'Khác', '1988-07-18', 1988, NULL, '8820@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0972090248', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-06-17 14:43:16', NULL, 0),
('kh_6a183864dd502', NULL, 'rank_1', 'KH9FCC46', 'Phan Văn Dũng', 'Nữ', '1996-11-12', 1996, NULL, 'phanvandung5895@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0942763863', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 243513, 0, 0, '2025-06-23 14:43:16', NULL, 0),
('kh_6a183864dd6ee', NULL, 'rank_1', 'KH3899BC', 'Trần Hải Uyên', 'Khác', '1979-01-16', 1979, NULL, '9833@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0992988946', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 1831029, 0, 1, '2026-01-10 14:43:16', NULL, 0),
('kh_6a183864dd94e', NULL, 'rank_1', 'KH6F1D87', 'Hoàng Quang Quỳnh', 'Nữ', '2000-05-27', 2000, NULL, 'hoangquangquynh7092@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0934723715', '34 Hai Bà Trưng, Huế', NULL, NULL, 1984253, 0, 1, '2025-10-27 14:43:16', NULL, 0),
('kh_6a183864ddaee', NULL, 'rank_1', 'KH76A5C4', 'Lê Thu Trang', 'Nữ', '1976-06-10', 1976, NULL, 'lethutrang1043@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0940495368', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-10-08 14:43:16', NULL, 0),
('kh_6a183864ddc67', NULL, 'rank_1', 'KHA823A6', 'Hồ Thanh Mai', 'Khác', '1975-10-03', 1975, NULL, '7708@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0928888700', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-11-27 14:43:16', NULL, 0),
('kh_6a183864ddec8', NULL, 'rank_1', 'KH241195', 'Phạm Văn Bình', 'Nam', '1979-06-01', 1979, NULL, '2679@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0979937999', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 1088938, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864de10e', NULL, 'rank_1', 'KH41F355', 'Phan Thị Trang', 'Khác', '2003-04-13', 2003, NULL, '9748@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0932750969', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-07-14 14:43:16', NULL, 0),
('kh_6a183864de4c6', NULL, 'rank_1', 'KHD153C5', 'Lê Gia Anh', 'Nam', '1997-10-15', 1997, NULL, 'legiaanh7077@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0930860383', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-05-13 14:43:16', NULL, 0),
('kh_6a183864de67d', NULL, 'rank_1', 'KHA66252', 'Ngô Tuấn Giang', 'Khác', '2000-03-06', 2000, NULL, '1547@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0913404799', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-09-19 14:43:16', NULL, 0),
('kh_6a183864de904', NULL, 'rank_1', 'KH2C3E65', 'Huỳnh Thu Sơn', 'Khác', '1986-11-06', 1986, NULL, '5366@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0968837903', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-02-03 14:43:16', NULL, 0),
('kh_6a183864dec9f', NULL, 'rank_1', 'KHC9947E', 'Lê Đức Quỳnh', 'Khác', '1988-09-03', 1988, NULL, '468@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0990114351', '34 Hai Bà Trưng, Huế', NULL, NULL, 1628764, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864defa6', NULL, 'rank_1', 'KH70FF7E', 'Lê Xuân Oanh', 'Nữ', '1990-03-12', 1990, NULL, 'lexuanoanh1120@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0966078966', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2220734, 0, 0, '2025-09-20 14:43:16', NULL, 0),
('kh_6a183864df195', NULL, 'rank_1', 'KHCC2E9C', 'Phan Xuân Vinh', 'Nam', '1997-11-25', 1997, NULL, 'phanxuanvinh5781@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0927244534', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-07-22 14:43:16', NULL, 0),
('kh_6a183864df364', NULL, 'rank_1', 'KH73163D', 'Phạm Thanh Linh', 'Nam', '1990-06-24', 1990, NULL, '2623@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0927272153', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 3703209, 0, 1, '2026-01-12 14:43:16', NULL, 0),
('kh_6a183864df8e1', NULL, 'rank_1', 'KH8516C3', 'Dương Thị Sơn', 'Nữ', '1975-07-24', 1975, NULL, '1719@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0926834960', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 4660249, 0, 1, '2025-07-22 14:43:16', NULL, 0),
('kh_6a183864dfb1f', NULL, 'rank_1', 'KHDA76AA', 'Huỳnh Hữu Lan', 'Nam', '1991-04-08', 1991, NULL, '1550@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0950574910', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 348149, 0, 1, '2026-01-08 14:43:16', NULL, 0),
('kh_6a183864dfd42', NULL, 'rank_1', 'KHF95AB8', 'Phạm Gia Bình', 'Nữ', '1996-03-22', 1996, NULL, '268@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0969498804', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 669934, 0, 1, '2026-04-04 14:43:16', NULL, 0),
('kh_6a183864dff7a', NULL, 'rank_1', 'KH056223', 'Huỳnh Mạnh Phương', 'Nữ', '1995-01-16', 1995, NULL, '5263@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0937181432', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-12-12 14:43:16', NULL, 0),
('kh_6a183864e01ed', NULL, 'rank_1', 'KH5F67E2', 'Lê Hữu Sơn', 'Khác', '1981-05-28', 1981, NULL, '9015@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915913407', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2198156, 0, 1, '2026-04-22 14:43:16', NULL, 0),
('kh_6a183864e04e7', NULL, 'rank_1', 'KHFAADC4', 'Hoàng Quang Oanh', 'Khác', '1974-07-10', 1974, NULL, 'hoangquangoanh9286@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0976244456', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4661020, 0, 1, '2026-05-19 14:43:16', NULL, 0),
('kh_6a183864e06e7', NULL, 'rank_1', 'KHE0142B', 'Ngô Gia Khánh', 'Nam', '2000-10-18', 2000, NULL, 'ngogiakhanh4590@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0921872101', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2353299, 0, 1, '2025-10-17 14:43:16', NULL, 0),
('kh_6a183864e08d6', NULL, 'rank_1', 'KHAEBDE9', 'Huỳnh Thu Phúc', 'Nữ', '1983-08-26', 1983, NULL, 'huynhthuphuc7254@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0977899571', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 2937410, 0, 1, '2026-02-06 14:43:16', NULL, 0),
('kh_6a183864e0c66', NULL, 'rank_1', 'KHFC3C27', 'Phạm Thu Em', 'Nam', '1997-05-09', 1997, NULL, '861@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916627942', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 3667123, 0, 1, '2026-04-11 14:43:16', NULL, 0),
('kh_6a183864e0f3c', NULL, 'rank_1', 'KHCDC1EC', 'Đỗ Hải Anh', 'Nữ', '1999-04-11', 1999, NULL, '9523@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0933149617', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-11-10 14:43:16', NULL, 0),
('kh_6a183864e11be', NULL, 'rank_1', 'KHC0B315', 'Lý Gia Dũng', 'Khác', '1995-02-11', 1995, NULL, 'lygiadung1219@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0914809588', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-11-13 14:43:16', NULL, 0),
('kh_6a183864e1347', NULL, 'rank_1', 'KH649480', 'Đặng Đức Linh', 'Khác', '1995-10-12', 1995, NULL, '4255@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0977817377', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2410179, 0, 1, '2026-03-22 14:43:16', NULL, 0),
('kh_6a183864e15ab', NULL, 'rank_1', 'KH165C90', 'Đặng Hải Dũng', 'Khác', '2003-03-26', 2003, NULL, '4118@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915887489', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4210706, 0, 1, '2025-06-04 14:43:16', NULL, 0),
('kh_6a183864e1811', NULL, 'rank_1', 'KH0072BA', 'Trần Thanh Hùng', 'Nam', '1992-02-18', 1992, NULL, '7515@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0980296153', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2620094, 0, 1, '2025-07-10 14:43:16', NULL, 0),
('kh_6a183864e1a42', NULL, 'rank_1', 'KHD0B449', 'Đặng Thu Em', 'Khác', '1988-01-17', 1988, NULL, '9100@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0939394996', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2541073, 0, 1, '2025-09-11 14:43:16', NULL, 0),
('kh_6a183864e1c6c', NULL, 'rank_1', 'KH37712E', 'Đỗ Minh Sơn', 'Nam', '1992-08-05', 1992, NULL, '8216@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0927400184', '34 Hai Bà Trưng, Huế', NULL, NULL, 608862, 0, 1, '2025-10-01 14:43:16', NULL, 0),
('kh_6a183864e1ef0', NULL, 'rank_1', 'KHF1F584', 'Võ Xuân Vinh', 'Nam', '1978-01-06', 1978, NULL, 'voxuanvinh5415@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0943519708', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-07-29 14:43:16', NULL, 0),
('kh_6a183864e2115', NULL, 'rank_1', 'KH937C41', 'Hoàng Thu Phúc', 'Khác', '1982-01-20', 1982, NULL, 'hoangthuphuc2632@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0912965767', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2735667, 0, 1, '2025-12-21 14:43:16', NULL, 0),
('kh_6a183864e22de', NULL, 'rank_1', 'KHA6277E', 'Trần Xuân Trang', 'Nữ', '2002-02-19', 2002, NULL, '4496@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0944020875', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 501778, 0, 1, '2026-04-24 14:43:16', NULL, 0),
('kh_6a183864e2552', NULL, 'rank_1', 'KHEED641', 'Hồ Thu Nam', 'Khác', '1974-09-14', 1974, NULL, '2667@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0977104561', '45 Lê Duẩn, Hà Nội', NULL, NULL, 663578, 0, 1, '2025-11-15 14:43:16', NULL, 0),
('kh_6a183864e27a5', NULL, 'rank_1', 'KH916555', 'Vũ Minh Quỳnh', 'Nam', '1989-08-09', 1989, NULL, 'vuminhquynh623@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0985967505', '34 Hai Bà Trưng, Huế', NULL, NULL, 355779, 0, 1, '2025-10-06 14:43:16', NULL, 0),
('kh_6a183864e297a', NULL, 'rank_1', 'KH833558', 'Dương Thu Giang', 'Nam', '1995-08-07', 1995, NULL, '4196@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0930466278', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2612934, 0, 1, '2026-01-21 14:43:16', NULL, 0),
('kh_6a183864e2dce', NULL, 'rank_1', 'KHCD7099', 'Lý Xuân Bình', 'Nữ', '2005-12-25', 2005, NULL, 'lyxuanbinh4216@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0989825994', '45 Lê Duẩn, Hà Nội', NULL, NULL, 1195250, 0, 1, '2025-12-12 14:43:16', NULL, 0),
('kh_6a183864e3037', NULL, 'rank_1', 'KH8B19DA', 'Phạm Thị Phúc', 'Nam', '1992-08-14', 1992, NULL, '2133@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0920070718', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 508595, 0, 0, '2026-01-02 14:43:16', NULL, 0),
('kh_6a183864e324c', NULL, 'rank_1', 'KH3B963F', 'Đỗ Hữu Lan', 'Nữ', '1999-10-16', 1999, NULL, '3648@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0965702760', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2782929, 0, 1, '2025-05-30 14:43:16', NULL, 0),
('kh_6a183864e340d', NULL, 'rank_1', 'KHB629E7', 'Lê Hữu Mai', 'Khác', '1977-10-21', 1977, NULL, '8669@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0930734820', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-01-18 14:43:16', NULL, 0),
('kh_6a183864e35e0', NULL, 'rank_1', 'KH8A2AAF', 'Hoàng Mạnh Em', 'Nam', '1972-01-11', 1972, NULL, '2193@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0952580486', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2026-04-09 14:43:16', NULL, 0),
('kh_6a183864e378b', NULL, 'rank_1', 'KH672366', 'Hoàng Hải Trang', 'Nữ', '1971-08-10', 1971, NULL, '4848@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0973617170', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 4754613, 0, 1, '2026-03-16 14:43:16', NULL, 0),
('kh_6a183864e397e', NULL, 'rank_1', 'KH022EE6', 'Phan Tuấn Mai', 'Khác', '1996-05-07', 1996, NULL, '5268@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0950978217', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2844744, 0, 1, '2025-10-05 14:43:16', NULL, 0),
('kh_6a183864e3bd9', NULL, 'rank_1', 'KH72C64F', 'Đặng Thanh Lan', 'Khác', '1993-04-22', 1993, NULL, '3331@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0936789773', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-11-14 14:43:16', NULL, 0),
('kh_6a183864e3f0d', NULL, 'rank_1', 'KH4278FB', 'Phạm Xuân Anh', 'Nam', '2000-03-18', 2000, NULL, '7127@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0928760376', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-03-29 14:43:16', NULL, 0),
('kh_6a183864e4124', NULL, 'rank_1', 'KH981F9A', 'Trần Hải Quỳnh', 'Nữ', '1974-11-07', 1974, NULL, '4951@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0920212172', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2336647, 0, 1, '2025-07-17 14:43:16', NULL, 0),
('kh_6a183864e42da', NULL, 'rank_1', 'KHFD9989', 'Hoàng Ngọc Em', 'Khác', '1994-04-15', 1994, NULL, '1897@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916545072', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 1668990, 0, 1, '2025-08-11 14:43:16', NULL, 0),
('kh_6a183864e448e', NULL, 'rank_1', 'KH0D3EF5', 'Phan Đức Cường', 'Nam', '1976-04-14', 1976, NULL, '6495@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0972659800', '34 Hai Bà Trưng, Huế', NULL, NULL, 1940646, 0, 1, '2025-08-14 14:43:16', NULL, 0),
('kh_6a183864e465e', NULL, 'rank_1', 'KH32ECD2', 'Vũ Tuấn Uyên', 'Nữ', '1973-09-19', 1973, NULL, '5507@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0973195462', '45 Lê Duẩn, Hà Nội', NULL, NULL, 4969420, 0, 1, '2025-12-07 14:43:16', NULL, 0),
('kh_6a183864e480f', NULL, 'rank_1', 'KHAEFE5F', 'Trần Hải Bình', 'Nam', '1976-11-01', 1976, NULL, '5698@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0925719243', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 343801, 0, 1, '2026-03-03 14:43:16', NULL, 0),
('kh_6a183864e49b2', NULL, 'rank_1', 'KHCD4507', 'Lê Thanh Khánh', 'Nam', '1984-02-27', 1984, NULL, 'lethanhkhanh8632@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0913689453', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 809996, 0, 1, '2026-04-13 14:43:16', NULL, 0),
('kh_6a183864e4ad5', NULL, 'rank_2', 'KHC8DB03', 'Dương Thị Phúc', 'Nam', '1970-04-23', 1970, NULL, '4929@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0942060485', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 1354169, 0, 0, '2026-02-11 14:43:16', NULL, 0),
('kh_6a183864e4e7a', NULL, 'rank_1', 'KHFF7C53', 'Ngô Đức Trang', 'Nữ', '1987-07-10', 1987, NULL, '6679@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0917006059', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 2944192, 0, 1, '2026-01-27 14:43:16', NULL, 0),
('kh_6a183864e51d8', NULL, 'rank_1', 'KH6984E0', 'Lê Ngọc Trang', 'Nữ', '1993-06-09', 1993, NULL, '7684@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0926686413', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 447827, 0, 1, '2025-09-07 14:43:16', NULL, 0),
('kh_6a183864e5616', NULL, 'rank_1', 'KH1BAD1C', 'Bùi Gia Khánh', 'Nữ', '1980-12-16', 1980, NULL, 'buigiakhanh6064@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0919900869', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 4324762, 0, 1, '2026-03-23 14:43:16', NULL, 0),
('kh_6a183864e5953', NULL, 'rank_1', 'KHBF0C60', 'Dương Mạnh Phúc', 'Nữ', '1977-04-05', 1977, NULL, '1387@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0966921801', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-02-24 14:43:16', NULL, 0),
('kh_6a183864e5e62', NULL, 'rank_1', 'KH8D153F', 'Phan Thị Lan', 'Khác', '1984-03-28', 1984, NULL, '2359@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0987203685', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 593508, 0, 1, '2026-02-03 14:43:16', NULL, 0),
('kh_6a183864e626b', NULL, 'rank_1', 'KHE19462', 'Nguyễn Hải Trang', 'Nam', '2003-06-14', 2003, NULL, '1581@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0982335240', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2026-05-06 14:43:16', NULL, 0),
('kh_6a183864e6652', NULL, 'rank_1', 'KHAF1FC8', 'Võ Xuân Khánh', 'Nam', '1976-03-15', 1976, NULL, 'voxuankhanh9988@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0953024854', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-02-12 14:43:16', NULL, 0),
('kh_6a183864e697a', NULL, 'rank_1', 'KH6E0819', 'Ngô Thanh Khánh', 'Nam', '2002-01-24', 2002, NULL, 'ngothanhkhanh2346@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0910562163', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2997512, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864e6ab3', NULL, 'rank_1', 'KH44A75C', 'Lý Tuấn Trang', 'Nam', '1979-01-04', 1979, NULL, '5144@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0999133382', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-04-23 14:43:16', NULL, 0),
('kh_6a183864e6c90', NULL, 'rank_1', 'KHBBD27B', 'Hồ Ngọc Dũng', 'Nữ', '1985-07-13', 1985, NULL, '9408@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0981124157', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-10-13 14:43:16', NULL, 0),
('kh_6a183864e6e30', NULL, 'rank_1', 'KHD28199', 'Dương Mạnh Oanh', 'Nam', '1978-03-24', 1978, NULL, '4026@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0958396054', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2026-05-05 14:43:16', NULL, 0),
('kh_6a183864e6fe0', NULL, 'rank_1', 'KH556816', 'Nguyễn Ngọc Anh', 'Nữ', '1994-09-23', 1994, NULL, '3694@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0979235811', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-11-29 14:43:16', NULL, 0),
('kh_6a183864e71db', NULL, 'rank_1', 'KH26645D', 'Bùi Thị Vinh', 'Nam', '1998-08-24', 1998, NULL, '2532@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0970919804', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 819317, 0, 1, '2025-11-14 14:43:16', NULL, 0),
('kh_6a183864e7437', NULL, 'rank_1', 'KH7D7FA4', 'Trần Tuấn Dũng', 'Nữ', '1978-10-19', 1978, NULL, '1016@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0972860811', '34 Hai Bà Trưng, Huế', NULL, NULL, 3017635, 0, 1, '2026-03-22 14:43:16', NULL, 0),
('kh_6a183864e7836', NULL, 'rank_1', 'KHA9D159', 'Đỗ Thanh Dũng', 'Khác', '2000-07-16', 2000, NULL, '1347@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0929817020', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4731282, 0, 1, '2026-04-14 14:43:16', NULL, 0),
('kh_6a183864e7c2e', NULL, 'rank_1', 'KHD4417C', 'Trần Minh Giang', 'Nam', '1982-05-03', 1982, NULL, '257@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0977683676', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-11-17 14:43:16', NULL, 0),
('kh_6a183864e8000', NULL, 'rank_1', 'KH6172EE', 'Đỗ Thu Em', 'Nữ', '1987-08-26', 1987, NULL, '4690@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0942023270', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 1035710, 0, 1, '2025-09-21 14:43:16', NULL, 0),
('kh_6a183864e8353', NULL, 'rank_1', 'KH90ED35', 'Hồ Văn Phúc', 'Khác', '1989-12-21', 1989, NULL, '4648@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0965234014', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 2274959, 0, 1, '2025-07-10 14:43:16', NULL, 0),
('kh_6a183864e86dc', NULL, 'rank_1', 'KH473A94', 'Hoàng Ngọc Khánh', 'Nữ', '1976-08-07', 1976, NULL, '5570@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0979724182', '45 Lê Duẩn, Hà Nội', NULL, NULL, 3199241, 0, 0, '2025-06-26 14:43:16', NULL, 0),
('kh_6a183864e8aa9', NULL, 'rank_1', 'KH468466', 'Đỗ Hải Yến', 'Khác', '1990-12-12', 1990, NULL, '3881@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0917668687', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 1056265, 0, 1, '2026-02-06 14:43:16', NULL, 0),
('kh_6a183864e8eb1', NULL, 'rank_1', 'KH0544E7', 'Đặng Tuấn Oanh', 'Nữ', '1974-08-01', 1974, NULL, '3232@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0998269494', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2025-09-29 14:43:16', NULL, 0),
('kh_6a183864e92f9', NULL, 'rank_1', 'KHA7655D', 'Hồ Thu Nam', 'Nam', '1994-04-03', 1994, NULL, '5688@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0936441165', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-12-26 14:43:16', NULL, 0),
('kh_6a183864e94fe', NULL, 'rank_1', 'KH893BB4', 'Phạm Hữu Phúc', 'Khác', '2001-11-16', 2001, NULL, '365@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915727016', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3783633, 0, 1, '2025-12-23 14:43:16', NULL, 0),
('kh_6a183864e96f0', NULL, 'rank_1', 'KHAA14EA', 'Vũ Thanh Bình', 'Nam', '1970-03-26', 1970, NULL, 'vuthanhbinh3760@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0974975802', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-05-31 14:43:16', NULL, 0),
('kh_6a183864e97f6', NULL, 'rank_1', 'KH9363D6', 'Lý Văn Vinh', 'Nữ', '1973-07-20', 1973, NULL, 'lyvanvinh2005@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0990664674', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1613167, 0, 1, '2025-10-26 14:43:16', NULL, 0),
('kh_6a183864e9903', NULL, 'rank_1', 'KH33DBA4', 'Huỳnh Quang Lan', 'Nữ', '1990-08-24', 1990, NULL, 'huynhquanglan2030@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0979510034', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 3101136, 0, 1, '2025-10-05 14:43:16', NULL, 0),
('kh_6a183864e9a0f', NULL, 'rank_1', 'KH0A9342', 'Bùi Minh Em', 'Nam', '1973-12-06', 1973, NULL, 'buiminhem8511@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0930202472', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4051941, 0, 1, '2026-02-17 14:43:16', NULL, 0),
('kh_6a183864e9d20', NULL, 'rank_1', 'KHE01D03', 'Ngô Văn Bình', 'Nam', '1992-05-15', 1992, NULL, 'ngovanbinh4804@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0987121635', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 4017715, 0, 1, '2025-06-07 14:43:16', NULL, 0),
('kh_6a183864e9ff4', NULL, 'rank_1', 'KH1C538E', 'Trần Minh Sơn', 'Nữ', '1988-05-22', 1988, NULL, '3822@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0987428676', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1835558, 0, 1, '2026-02-04 14:43:16', NULL, 0),
('kh_6a183864ea37d', NULL, 'rank_1', 'KHEBF633', 'Phạm Thanh Hùng', 'Nữ', '1970-01-22', 1970, NULL, '505@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0935167661', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 4537439, 0, 1, '2025-07-23 14:43:16', NULL, 0),
('kh_6a183864ea6ff', NULL, 'rank_1', 'KH05C9D2', 'Võ Quang Em', 'Khác', '1987-12-20', 1987, NULL, 'voquangem6966@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0997022975', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 2407281, 0, 1, '2025-09-23 14:43:16', NULL, 0),
('kh_6a183864eaa49', NULL, 'rank_1', 'KH1BE13A', 'Vũ Thị Uyên', 'Nam', '1985-12-24', 1985, NULL, '1836@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0914671704', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-10-20 14:43:16', NULL, 0),
('kh_6a183864eae73', NULL, 'rank_1', 'KH570DC6', 'Hoàng Gia Lan', 'Nam', '1998-02-03', 1998, NULL, 'hoanggialan9433@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915066960', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 529891, 0, 1, '2025-12-29 14:43:16', NULL, 0),
('kh_6a183864eb17d', NULL, 'rank_1', 'KHB9651B', 'Lý Gia Giang', 'Khác', '2003-09-01', 2003, NULL, 'lygiagiang1512@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0918923821', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 4643614, 0, 1, '2025-12-25 14:43:16', NULL, 0),
('kh_6a183864eb2bc', NULL, 'rank_1', 'KH9D32AE', 'Đỗ Gia Yến', 'Nữ', '1972-05-22', 1972, NULL, '2869@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916201190', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 0, 0, 1, '2025-08-08 14:43:16', NULL, 0),
('kh_6a183864eb497', NULL, 'rank_1', 'KH65EDE7', 'Phan Thanh Yến', 'Nữ', '1971-11-04', 1971, NULL, '491@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0983907799', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 0, '2026-01-05 14:43:16', NULL, 0),
('kh_6a183864eb656', NULL, 'rank_1', 'KHA4985C', 'Phan Quang Khánh', 'Nữ', '1992-07-07', 1992, NULL, 'phanquangkhanh5612@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0964981894', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2026-03-14 14:43:16', NULL, 0),
('kh_6a183864eb77f', NULL, 'rank_1', 'KH0F7042', 'Bùi Ngọc Khánh', 'Nữ', '1984-01-12', 1984, NULL, '6206@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0971451915', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 3209041, 0, 1, '2025-09-11 14:43:16', NULL, 0),
('kh_6a183864eb94d', NULL, 'rank_1', 'KH4D6BF6', 'Bùi Xuân Quỳnh', 'Nam', '1981-09-04', 1981, NULL, 'buixuanquynh1518@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0966427574', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 3966927, 0, 1, '2026-05-26 14:43:16', NULL, 0),
('kh_6a183864eba74', NULL, 'rank_1', 'KH8F86B0', 'Hoàng Mạnh Lan', 'Nam', '2000-01-08', 2000, NULL, '7092@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0944082095', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 1090968, 0, 1, '2025-12-12 14:43:16', NULL, 0),
('kh_6a183864ebc34', NULL, 'rank_1', 'KHB79C9D', 'Ngô Mạnh Phúc', 'Nữ', '1976-07-26', 1976, NULL, '2672@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0997596600', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2026-01-19 14:43:16', NULL, 0),
('kh_6a183864ebe1c', NULL, 'rank_1', 'KH7D4057', 'Đặng Minh Khánh', 'Khác', '1998-10-23', 1998, NULL, '5599@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0960314702', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 1286175, 0, 1, '2025-07-01 14:43:16', NULL, 0),
('kh_6a183864ebfd1', NULL, 'rank_1', 'KH606AB1', 'Bùi Tuấn Nam', 'Nam', '1972-05-23', 1972, NULL, '6254@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0944156691', '34 Hai Bà Trưng, Huế', NULL, NULL, 992795, 0, 1, '2026-01-06 14:43:16', NULL, 0),
('kh_6a183864ec1a3', NULL, 'rank_1', 'KH695586', 'Trần Minh Hùng', 'Khác', '1991-11-21', 1991, NULL, '1729@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0976865853', '45 Lê Duẩn, Hà Nội', NULL, NULL, 3061502, 0, 1, '2025-08-27 14:43:16', NULL, 0),
('kh_6a183864ec5a2', NULL, 'rank_1', 'KHC87F94', 'Hồ Tuấn Sơn', 'Nữ', '1979-02-05', 1979, NULL, '2394@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0922973758', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2026-04-09 14:43:16', NULL, 0),
('kh_6a183864eccd3', NULL, 'rank_1', 'KHDB4636', 'Phạm Ngọc Anh', 'Nam', '1979-02-03', 1979, NULL, '3902@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0921936506', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 2077153, 0, 1, '2025-06-07 14:43:16', NULL, 0),
('kh_6a183864eceeb', NULL, 'rank_1', 'KH7FCB9C', 'Vũ Minh Em', 'Nữ', '1991-08-23', 1991, NULL, 'vuminhem7602@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0931740650', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 3741947, 0, 1, '2026-04-04 14:43:16', NULL, 0),
('kh_6a183864ed025', NULL, 'rank_1', 'KH6F07C5', 'Vũ Mạnh Linh', 'Nam', '1975-05-06', 1975, NULL, '1361@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0919774498', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 992454, 0, 1, '2025-09-02 14:43:16', NULL, 0),
('kh_6a183864ed220', NULL, 'rank_1', 'KHEE61A1', 'Phan Hữu Nam', 'Nữ', '2004-05-19', 2004, NULL, '2843@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0957784586', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-07-31 14:43:16', NULL, 0),
('kh_6a183864ed3e0', NULL, 'rank_1', 'KH40B790', 'Vũ Hữu Em', 'Khác', '1976-06-28', 1976, NULL, '4407@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915476542', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 3286634, 0, 1, '2026-02-01 14:43:16', NULL, 0),
('kh_6a183864ed5b5', NULL, 'rank_1', 'KHFCC6E3', 'Lý Hữu Hùng', 'Nam', '1999-06-11', 1999, NULL, '2534@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0972823882', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2026-02-05 14:43:16', NULL, 0),
('kh_6a183864ed76b', NULL, 'rank_1', 'KHB02645', 'Đặng Thị Quỳnh', 'Nam', '1990-09-26', 1990, NULL, '2236@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0947328688', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2997422, 0, 1, '2026-01-08 14:43:16', NULL, 0),
('kh_6a183864edb17', NULL, 'rank_1', 'KH986996', 'Dương Gia Phương', 'Khác', '1986-03-19', 1986, NULL, '3387@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0935433241', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-11-19 14:43:16', NULL, 0),
('kh_6a183864edeab', NULL, 'rank_1', 'KH64E9A6', 'Dương Tuấn Oanh', 'Nam', '1991-06-06', 1991, NULL, '5288@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0958954165', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 4065523, 0, 1, '2026-05-01 14:43:16', NULL, 0),
('kh_6a183864ee308', NULL, 'rank_1', 'KH72D165', 'Hoàng Gia Dũng', 'Khác', '1973-10-16', 1973, NULL, 'hoanggiadung3024@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915207482', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-12-03 14:43:16', NULL, 0),
('kh_6a183864ee45b', NULL, 'rank_1', 'KH9091D9', 'Trần Gia Mai', 'Nữ', '1973-07-13', 1973, NULL, '7535@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0929046933', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1528464, 0, 0, '2025-07-25 14:43:16', NULL, 0);
INSERT INTO `nguoi_dung` (`id`, `id_vai_tro`, `id_hang_thanh_vien`, `ma_nd`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `nam_sinh`, `id_menh`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`, `ghi_chu_vip`, `tong_chi_tieu`, `diem_thuong`, `trang_thai`, `ngay_tao`, `deleted_at`, `diem_tich_luy`) VALUES
('kh_6a183864ee640', NULL, 'rank_1', 'KH601EF6', 'Đỗ Đức Uyên', 'Nữ', '1990-10-23', 1990, NULL, '8911@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0956323431', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 3337829, 0, 1, '2025-12-16 14:43:16', NULL, 0),
('kh_6a183864ee82a', NULL, 'rank_1', 'KH4FF832', 'Lý Thu Quỳnh', 'Nam', '1970-12-07', 1970, NULL, 'lythuquynh3833@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0955977344', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-08-12 14:43:16', NULL, 0),
('kh_6a183864ee93f', NULL, 'rank_1', 'KH3A5033', 'Nguyễn Hải Linh', 'Nam', '1995-07-05', 1995, NULL, '6402@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0959514940', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2056694, 0, 1, '2026-01-10 14:43:16', NULL, 0),
('kh_6a183864eeb01', NULL, 'rank_1', 'KHE9AEB4', 'Ngô Minh Lan', 'Khác', '1976-08-28', 1976, NULL, 'ngominhlan9267@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0941234011', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-04-08 14:43:16', NULL, 0),
('kh_6a183864eec20', NULL, 'rank_1', 'KHF500D4', 'Lý Gia Yến', 'Nam', '1979-07-01', 1979, NULL, '1592@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0948380722', '34 Hai Bà Trưng, Huế', NULL, NULL, 0, 0, 1, '2025-12-18 14:43:16', NULL, 0),
('kh_6a183864eedff', NULL, 'rank_1', 'KH15E28E', 'Đỗ Đức Uyên', 'Nam', '1970-05-03', 1970, NULL, '6425@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0916272438', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 4622861, 0, 1, '2026-04-02 14:43:16', NULL, 0),
('kh_6a183864eefc8', NULL, 'rank_1', 'KH6872A3', 'Lý Hữu Anh', 'Khác', '1999-06-24', 1999, NULL, '6977@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0914067817', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-11-25 14:43:16', NULL, 0),
('kh_6a183864ef19f', NULL, 'rank_1', 'KHF5221A', 'Trần Quang Dũng', 'Nam', '2003-01-19', 2003, NULL, '4866@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0935739001', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 4410746, 0, 1, '2026-01-18 14:43:16', NULL, 0),
('kh_6a183864ef344', NULL, 'rank_1', 'KH8A763A', 'Trần Tuấn Lan', 'Nam', '1996-03-13', 1996, NULL, '9624@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0923666306', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 2650042, 0, 1, '2025-06-18 14:43:16', NULL, 0),
('kh_6a183864ef4e4', NULL, 'rank_1', 'KHE17FB3', 'Nguyễn Văn Uyên', 'Nữ', '1987-11-09', 1987, NULL, '5581@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0979181974', '12 Võ Văn Kiệt, Cần Thơ', NULL, NULL, 0, 0, 1, '2026-04-01 14:43:16', NULL, 0),
('kh_6a183864ef658', NULL, 'rank_1', 'KHB96339', 'Hồ Hải Uyên', 'Nam', '1977-11-05', 1977, NULL, '2160@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0915577351', '56 Lý Thường Kiệt, Hải Phòng', NULL, NULL, 2777847, 0, 1, '2025-10-07 14:43:16', NULL, 0),
('kh_6a183864ef83f', NULL, 'rank_1', 'KHBC5D04', 'Võ Ngọc Em', 'Nữ', '1980-07-20', 1980, NULL, '3900@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0922625958', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-09-21 14:43:16', NULL, 0),
('kh_6a183864efc56', NULL, 'rank_1', 'KH5807CC', 'Võ Gia Giang', 'Khác', '1987-01-16', 1987, NULL, 'vogiagiang6605@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0925089968', '45 Lê Duẩn, Hà Nội', NULL, NULL, 494025, 0, 1, '2026-02-12 14:43:16', NULL, 0),
('kh_6a183864efd8d', NULL, 'rank_1', 'KH550C08', 'Võ Minh Bình', 'Khác', '2001-08-01', 2001, NULL, 'vominhbinh1560@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0966182184', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-07-29 14:43:16', NULL, 0),
('kh_6a183864efec4', NULL, 'rank_1', 'KH405DC9', 'Võ Minh Anh', 'Nữ', '1976-08-17', 1976, NULL, 'vominhanh3746@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0987344089', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 0, 0, 1, '2025-08-22 14:43:16', NULL, 0),
('kh_6a183864efffd', NULL, 'rank_1', 'KH3E306C', 'Lý Hải Mai', 'Khác', '1973-08-22', 1973, NULL, '707@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0933860277', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-10-07 14:43:16', NULL, 0),
('kh_6a183864f0202', NULL, 'rank_1', 'KH41144C', 'Nguyễn Tuấn Sơn', 'Nam', '1973-04-26', 1973, NULL, '5809@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0943117963', '45 Lê Duẩn, Hà Nội', NULL, NULL, 337341, 0, 1, '2025-08-15 14:43:16', NULL, 0),
('kh_6a183864f03e3', NULL, 'rank_1', 'KH3D95A6', 'Dương Gia Lan', 'Khác', '1979-03-24', 1979, NULL, '5394@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0963741968', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 840000, 0, 1, '2026-05-18 14:43:16', NULL, 84),
('kh_6a183864f05c2', NULL, 'rank_1', 'KHFC9F39', 'Phan Xuân Mai', 'Nữ', '2002-11-07', 2002, NULL, 'phanxuanmai7424@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0938391397', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 2903073, 0, 1, '2025-12-26 14:43:16', NULL, 0),
('kh_6a183864f06ea', NULL, 'rank_1', 'KH9A5A8D', 'Đỗ Quang Em', 'Nữ', '1979-08-24', 1979, NULL, '2490@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0976312363', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 293298, 0, 1, '2025-12-08 14:43:16', NULL, 0),
('kh_6a183864f08b4', NULL, 'rank_1', 'KH9BFE13', 'Vũ Thanh Anh', 'Nữ', '1979-08-15', 1979, NULL, 'vuthanhanh9712@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0945301608', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 3432708, 0, 1, '2025-10-11 14:43:16', NULL, 0),
('kh_6a183864f09d1', NULL, 'rank_1', 'KH246F4C', 'Trần Hải Yến', 'Khác', '2005-01-03', 2005, NULL, '5793@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0939040602', '789 Trần Hưng Đạo, Quận 1, TP.HCM', NULL, NULL, 0, 0, 1, '2025-06-17 14:43:16', NULL, 0),
('kh_6a183864f0b91', NULL, 'rank_1', 'KH74ED11', 'Võ Đức Yến', 'Khác', '1995-05-25', 1995, NULL, '1190@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0962296810', '45 Lê Duẩn, Hà Nội', NULL, NULL, 0, 0, 1, '2026-04-04 14:43:16', NULL, 0),
('kh_6a183864f0d2f', NULL, 'rank_1', 'KHC03A53', 'Võ Đức Quỳnh', 'Nữ', '1990-12-23', 1990, NULL, '9629@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0940522709', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 0, 0, 1, '2025-07-04 14:43:16', NULL, 0),
('kh_6a183864f0f35', NULL, 'rank_1', 'KH6F3EB0', 'Đặng Minh Linh', 'Nữ', '1982-01-09', 1982, NULL, '9054@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0973115348', '45 Lê Duẩn, Hà Nội', NULL, NULL, 887577, 0, 1, '2025-08-16 14:43:16', NULL, 0),
('kh_6a183864f111f', NULL, 'rank_1', 'KH9C6369', 'Phan Hữu Phúc', 'Khác', '1991-03-26', 1991, NULL, '6698@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0944438877', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 1689742, 0, 1, '2025-11-13 14:43:16', NULL, 0),
('kh_6a183864f1566', NULL, 'rank_1', 'KH62BA4A', 'Huỳnh Minh Em', 'Khác', '1982-07-20', 1982, NULL, 'huynhminhem2152@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0910940521', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 446439, 0, 1, '2026-03-30 14:43:16', NULL, 0),
('kh_6a183864f1999', NULL, 'rank_1', 'KH918C5B', 'Lê Đức Dũng', 'Nam', '1976-04-09', 1976, NULL, '2227@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0959484935', '11 Nguyễn Trãi, Thanh Xuân, Hà Nội', NULL, NULL, 0, 0, 1, '2025-07-27 14:43:16', NULL, 0),
('kh_6a183864f1e48', NULL, 'rank_1', 'KHD6B371', 'Ngô Thị Anh', 'Nữ', '2001-06-16', 2001, NULL, '8577@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0974394785', '123 Nguyễn Văn Linh, Đà Nẵng', NULL, NULL, 1511256, 0, 1, '2026-02-04 14:43:16', NULL, 0),
('kh_6a183864f22c1', NULL, 'rank_1', 'KH954E88', 'Võ Minh Mai', 'Nam', '1990-09-11', 1990, NULL, 'vominhmai716@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '0978101908', '90 Phan Đăng Lưu, Phú Nhuận, TP.HCM', NULL, NULL, 214783, 0, 1, '2026-01-30 14:43:16', NULL, 0),
('user_1', 'role_1', NULL, 'NV001', 'Hải Admin', NULL, NULL, NULL, NULL, 'admin@chuoingoc.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26', NULL, 0),
('user_2', 'role_2', NULL, 'NV002', 'Tuấn Kho', NULL, NULL, NULL, NULL, 'kho@chuoingoc.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', NULL, NULL, NULL, NULL, 0, 0, 1, '2026-05-27 14:38:26', NULL, 0),
('user_3', NULL, 'rank_1', 'KH001', 'Khách hàng A', 'nam', NULL, 2004, 'menh_3', 'khachhang@gmail.com', '$2y$10$ibnQDdBtaFHkOjMHKqzLfO6yWBWLPGgQnCWhBHWCzUqzD3nfTr2Ri', '876987654', '34 Hai Bà Trưng, Huế', NULL, '', 0, 0, 0, '2026-05-27 14:38:26', '2026-05-28 19:42:13', 0);

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

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung_voucher`
--

INSERT INTO `nguoi_dung_voucher` (`id`, `id_nguoi_dung`, `id_voucher`, `trang_thai`, `ngay_tao`) VALUES
('31ba2e6a-05ba-4a6f-a5bf-0fe278eaa40d', 'ba467f83493062c5b15e72da52ac47fc', 'vc_seed_6a1cec62101ae', 0, '2026-06-03 15:54:12'),
('6b751b16-ceb9-4093-936d-723a8e715b12', 'ba467f83493062c5b15e72da52ac47fc', 'vc_seed_6a1cec62162ad', 0, '2026-06-03 19:42:27'),
('8490216e-d275-43e3-89c9-7e98ee1e243d', 'ba467f83493062c5b15e72da52ac47fc', 'vc_seed_6a1cec620926b', 0, '2026-06-03 15:54:09'),
('9ea6448b-238a-4730-870d-4dffa26c3727', 'ba467f83493062c5b15e72da52ac47fc', 'vc_seed_6a1cec6209679', 0, '2026-06-03 15:49:28');

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
(1, 'NV0001', 'Thanh Hai Admin', 'admin@chuoingocshop.com', '0901234567', '$2y$10$OLPu9mPTca6RhZJgmUKglufZMERT6BfaRY989.rPdr2WpTp4zrkry', 'Super Admin', 'Quản trị', 'hoat_dong', NULL, '2004-11-15', '123 Nguyễn Văn Linh, Quận Hải Châu, TP. Đà Nẵng', 'Người sáng lập hệ thống. Phụ trách tổng thể nền tảng.', 0, NULL, '2026-01-01', '2026-06-05 22:52:50', 'Hệ thống', NULL, '2026-06-02 11:44:30', '2026-06-05 22:52:50'),
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
(55, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Hải Admin', '2026-06-02 11:57:46'),
(56, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Hải Admin', '2026-06-02 15:42:27'),
(57, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-02 15:51:02'),
(58, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-02 19:33:40'),
(59, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-03 11:09:51'),
(60, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-03 13:02:03'),
(61, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-03 15:35:51'),
(62, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-04 17:28:36'),
(63, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-04 22:44:17'),
(64, 1, 'Cập nhật đơn hàng dh_6a2111f01b8b2', 'Cập nhật trạng thái thành: Đang chuẩn bị', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', NULL, '2026-06-04 22:50:02'),
(65, 1, 'Cập nhật đơn hàng dh_6a2111f01b8b2', 'Cập nhật trạng thái thành: Đang giao', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', NULL, '2026-06-04 22:53:20'),
(66, 1, 'Cập nhật đơn hàng dh_6a2111f01b8b2', 'Cập nhật trạng thái thành: Thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', NULL, '2026-06-04 22:53:42'),
(67, 1, 'Đăng nhập', 'Đăng nhập thành công', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'Thanh Hai Admin', '2026-06-05 22:52:50');

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
('4bf56e10-5eb6-490c-92b0-53916e9db269', 'NCCHOACAT', 'Công ty TNHH Hòa Cát', 'Nguyễn Thị Hòa', '03659458445', 'hoacat251@gmail.com', 'TPHCM', 1),
('ncc_6a1ed26eab0cf', 'NCC001', 'Công ty TNHH Cung cấp Ngọc 1', 'Mr. Đại Diện 1', '0988000001', 'contact1@ngoc1.com', 'Địa chỉ NCC 1', 1),
('ncc_6a1ed26eab430', 'NCC002', 'Công ty TNHH Cung cấp Ngọc 2', 'Mr. Đại Diện 2', '0988000002', 'contact2@ngoc2.com', 'Địa chỉ NCC 2', 1),
('ncc_6a1ed26eabc93', 'NCC003', 'Công ty TNHH Cung cấp Ngọc 3', 'Mr. Đại Diện 3', '0988000003', 'contact3@ngoc3.com', 'Địa chỉ NCC 3', 1),
('ncc_6a1ed26eac5dd', 'NCC004', 'Công ty TNHH Cung cấp Ngọc 4', 'Mr. Đại Diện 4', '0988000004', 'contact4@ngoc4.com', 'Địa chỉ NCC 4', 1),
('ncc_6a1ed26eac92e', 'NCC005', 'Công ty TNHH Cung cấp Ngọc 5', 'Mr. Đại Diện 5', '0988000005', 'contact5@ngoc5.com', 'Địa chỉ NCC 5', 1);

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
('faedbdeb-5c1f-11f1-a6a6-088fc37729cd', 'NK-20260530-140624-96', 1, NULL, '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 6750000, 'Nhập hàng từ nhà cung cấp', '', 3, '2026-05-30 19:06:24', 6750000, 2, '2026-05-30 00:00:00', '2026-05-30 19:31:16', NULL, 0),
('pn_6a1ed26eae64b', 'PN535963', 1, 'user_1', 'ncc_6a1ed26eab0cf', NULL, 62090000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-07 13:42:17', 62090000, 1, NULL, '2026-04-07 13:42:17', NULL, 0),
('pn_6a1ed26eb008e', 'PN890132', 1, 'user_1', '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 146440000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-04 21:41:17', 146440000, 1, NULL, '2026-05-04 21:41:17', NULL, 0),
('pn_6a1ed26eb0b55', 'PN771153', 1, 'user_1', '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 52710000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-04 14:21:16', 52710000, 1, NULL, '2026-05-04 14:21:16', NULL, 0),
('pn_6a1ed26eb1606', 'PN468544', 1, 'user_1', '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 60060000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-27 05:55:11', 60060000, 1, NULL, '2026-04-27 05:55:11', NULL, 0),
('pn_6a1ed26eb1b87', 'PN124505', 1, 'user_1', 'ncc_6a1ed26eac5dd', NULL, 46340000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-30 02:20:36', 46340000, 1, NULL, '2026-04-30 02:20:36', NULL, 0),
('pn_6a1ed26eb2b89', 'PN739648', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 96530000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-03 14:10:24', 96530000, 1, NULL, '2026-05-03 14:10:24', NULL, 0),
('pn_6a1ed26eb3a33', 'PN595856', 1, 'user_1', 'ncc_6a1ed26eac92e', NULL, 58870000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-03 05:49:47', 58870000, 1, NULL, '2026-05-03 05:49:47', NULL, 0),
('pn_6a1ed26eb4413', 'PN550079', 1, 'user_1', '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 162960000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-13 03:53:02', 162960000, 1, NULL, '2026-04-13 03:53:02', NULL, 0),
('pn_6a1ed26eb5ea6', 'PN359450', 1, 'user_1', '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 64890000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-11 14:06:47', 64890000, 1, NULL, '2026-04-11 14:06:47', NULL, 0),
('pn_6a1ed26eb769d', 'PN317838', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 68320000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-20 02:43:59', 68320000, 1, NULL, '2026-04-20 02:43:59', NULL, 0),
('pn_6a1ed26eb7b17', 'PN325522', 1, 'user_1', 'ncc_6a1ed26eab0cf', NULL, 156730000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-09 00:56:56', 156730000, 1, NULL, '2026-05-09 00:56:56', NULL, 0),
('pn_6a1ed26eb8f98', 'PN146066', 1, 'user_1', '4bf56e10-5eb6-490c-92b0-53916e9db269', NULL, 119210000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-14 04:42:51', 119210000, 1, NULL, '2026-04-14 04:42:51', NULL, 0),
('pn_6a1ed26eb9f27', 'PN285881', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 70770000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-28 04:47:31', 70770000, 1, NULL, '2026-05-28 04:47:31', NULL, 0),
('pn_6a1ed26eba8c9', 'PN225379', 1, 'user_1', 'ncc_6a1ed26eac92e', NULL, 44730000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-11 05:27:39', 44730000, 1, NULL, '2026-04-11 05:27:39', NULL, 0),
('pn_6a1ed26ebad17', 'PN140642', 1, 'user_1', 'ncc_6a1ed26eab0cf', NULL, 164010000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-01 15:32:56', 164010000, 1, NULL, '2026-04-01 15:32:56', NULL, 0),
('pn_6a1ed26ebb590', 'PN268450', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 119140000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-23 01:47:31', 119140000, 1, NULL, '2026-05-23 01:47:31', NULL, 0),
('pn_6a1ed26ebc45d', 'PN242551', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 38710000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-18 14:36:32', 38710000, 1, NULL, '2026-04-18 14:36:32', NULL, 0),
('pn_6a1ed26ebc9fb', 'PN310894', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 110600000, 'Nhập hàng định kỳ', NULL, 3, '2026-06-02 11:19:42', 110600000, 1, NULL, '2026-06-02 11:19:42', NULL, 0),
('pn_6a1ed26ebdc77', 'PN121503', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 125790000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-02 13:16:25', 125790000, 1, NULL, '2026-04-02 13:16:25', NULL, 0),
('pn_6a1ed26ebf3f0', 'PN675257', 1, 'user_1', 'ncc_6a1ed26eab430', NULL, 106050000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-03 18:39:26', 106050000, 1, NULL, '2026-05-03 18:39:26', NULL, 0),
('pn_6a1ed26ebfcc3', 'PN403754', 1, 'user_1', 'ncc_6a1ed26eac5dd', NULL, 83650000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-30 01:07:01', 83650000, 1, NULL, '2026-04-30 01:07:01', NULL, 0),
('pn_6a1ed26ec1399', 'PN225622', 1, 'user_1', 'ncc_6a1ed26eab0cf', NULL, 77070000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-01 10:37:33', 77070000, 1, NULL, '2026-04-01 10:37:33', NULL, 0),
('pn_6a1ed26ec2092', 'PN153829', 1, 'user_1', 'ncc_6a1ed26eab0cf', NULL, 117950000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-08 00:20:20', 117950000, 1, NULL, '2026-04-08 00:20:20', NULL, 0),
('pn_6a1ed26ec35a8', 'PN923609', 1, 'user_1', 'ncc_6a1ed26eac92e', NULL, 40040000, 'Nhập hàng định kỳ', NULL, 3, '2026-05-30 20:00:32', 40040000, 1, NULL, '2026-05-30 20:00:32', NULL, 0),
('pn_6a1ed26ec45c9', 'PN445922', 1, 'user_1', 'ncc_6a1ed26eac5dd', NULL, 121660000, 'Nhập hàng định kỳ', NULL, 3, '2026-04-05 14:02:10', 121660000, 1, NULL, '2026-04-05 14:02:10', NULL, 0),
('px_6a1ed26ec5544', 'PX216940', 2, 'user_1', NULL, NULL, 23310000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-04 16:16:03', 0, 0, NULL, '2026-05-04 16:16:03', NULL, 0),
('px_6a1ed26ec6195', 'PX586874', 2, 'user_1', NULL, NULL, 11830000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-12 11:04:59', 0, 0, NULL, '2026-05-12 11:04:59', NULL, 0),
('px_6a1ed26ec6524', 'PX475278', 2, 'user_1', NULL, NULL, 33390000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-04 09:48:08', 0, 0, NULL, '2026-05-04 09:48:08', NULL, 0),
('px_6a1ed26ec7414', 'PX564720', 2, 'user_1', NULL, NULL, 31010000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-06 01:15:35', 0, 0, NULL, '2026-04-06 01:15:35', NULL, 0),
('px_6a1ed26ec83c2', 'PX989525', 2, 'user_1', NULL, NULL, 28280000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-23 18:47:48', 0, 0, NULL, '2026-05-23 18:47:48', NULL, 0),
('px_6a1ed26ec8882', 'PX276159', 2, 'user_1', NULL, NULL, 25130000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-29 21:40:08', 0, 0, NULL, '2026-05-29 21:40:08', NULL, 0),
('px_6a1ed26ec9800', 'PX193470', 2, 'user_1', NULL, NULL, 7280000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-01 14:32:00', 0, 0, NULL, '2026-04-01 14:32:00', NULL, 0),
('px_6a1ed26ec9b9a', 'PX704022', 2, 'user_1', NULL, NULL, 39760000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-06 05:46:31', 0, 0, NULL, '2026-05-06 05:46:31', NULL, 0),
('px_6a1ed26eca4e0', 'PX391667', 2, 'user_1', NULL, NULL, 2590000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-13 14:31:17', 0, 0, NULL, '2026-05-13 14:31:17', NULL, 0),
('px_6a1ed26ecb2bb', 'PX796770', 2, 'user_1', NULL, NULL, 8820000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-12 17:20:27', 0, 0, NULL, '2026-05-12 17:20:27', NULL, 0),
('px_6a1ed26ecbf6b', 'PX108974', 2, 'user_1', NULL, NULL, 21840000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-02 07:33:19', 0, 0, NULL, '2026-05-02 07:33:19', NULL, 0),
('px_6a1ed26ecd041', 'PX152131', 2, 'user_1', NULL, NULL, 27370000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-06 08:19:19', 0, 0, NULL, '2026-04-06 08:19:19', NULL, 0),
('px_6a1ed26ecdfcf', 'PX780282', 2, 'user_1', NULL, NULL, 14420000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-29 05:00:41', 0, 0, NULL, '2026-05-29 05:00:41', NULL, 0),
('px_6a1ed26ececdd', 'PX420013', 2, 'user_1', NULL, NULL, 10500000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-26 20:20:56', 0, 0, NULL, '2026-04-26 20:20:56', NULL, 0),
('px_6a1ed26ecf93d', 'PX865694', 2, 'user_1', NULL, NULL, 13160000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-20 03:52:24', 0, 0, NULL, '2026-04-20 03:52:24', NULL, 0),
('px_6a1ed26ed0289', 'PX367072', 2, 'user_1', NULL, NULL, 22260000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-26 02:07:14', 0, 0, NULL, '2026-04-26 02:07:14', NULL, 0),
('px_6a1ed26ed0bc7', 'PX103682', 2, 'user_1', NULL, NULL, 19180000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-24 22:03:20', 0, 0, NULL, '2026-05-24 22:03:20', NULL, 0),
('px_6a1ed26ed1811', 'PX944738', 2, 'user_1', NULL, NULL, 10010000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-16 04:07:51', 0, 0, NULL, '2026-04-16 04:07:51', NULL, 0),
('px_6a1ed26ed2518', 'PX709942', 2, 'user_1', NULL, NULL, 4550000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-06 13:51:29', 0, 0, NULL, '2026-04-06 13:51:29', NULL, 0),
('px_6a1ed26ed2e38', 'PX516406', 2, 'user_1', NULL, NULL, 16170000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-12 22:43:20', 0, 0, NULL, '2026-04-12 22:43:20', NULL, 0),
('px_6a1ed26ed353c', 'PX419371', 2, 'user_1', NULL, NULL, 13370000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-10 21:48:32', 0, 0, NULL, '2026-04-10 21:48:32', NULL, 0),
('px_6a1ed26ed3b16', 'PX985104', 2, 'user_1', NULL, NULL, 16520000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-07 12:53:25', 0, 0, NULL, '2026-05-07 12:53:25', NULL, 0),
('px_6a1ed26ed4e40', 'PX684419', 2, 'user_1', NULL, NULL, 19390000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-08 20:59:52', 0, 0, NULL, '2026-04-08 20:59:52', NULL, 0),
('px_6a1ed26ed58a8', 'PX763763', 2, 'user_1', NULL, NULL, 17850000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-04-14 20:21:41', 0, 0, NULL, '2026-04-14 20:21:41', NULL, 0),
('px_6a1ed26ed5f41', 'PX136122', 2, 'user_1', NULL, NULL, 6440000, 'Xuất bán buôn / Xuất hủy', NULL, 3, '2026-05-23 03:27:28', 0, 0, NULL, '2026-05-23 03:27:28', NULL, 0);

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
('ce3db77d-5cab-11f1-962c-088fc37729cd', 'KK20260531747', '', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Kho Cửa hàng - Tân Bình', 5, '', NULL, NULL, '', '2026-05-31 11:47:19', NULL, '2026-05-31 06:49:36'),
('kk_6a1ed26edff61', 'KK728162', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-05 20:21:20', NULL, NULL),
('kk_6a1ed26ee1576', 'KK896148', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-01 18:59:56', NULL, NULL),
('kk_6a1ed26ee2582', 'KK865869', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-16 20:18:04', NULL, NULL),
('kk_6a1ed26ee3490', 'KK365048', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-12 19:28:45', NULL, NULL),
('kk_6a1ed26ee48d4', 'KK240814', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-22 17:35:00', NULL, NULL),
('kk_6a1ed26ee67ae', 'KK480566', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-20 06:59:17', NULL, NULL),
('kk_6a1ed26ee7292', 'KK348090', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-06 07:36:13', NULL, NULL),
('kk_6a1ed26ee8e44', 'KK697304', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-09 01:54:48', NULL, NULL),
('kk_6a1ed26ee99e6', 'KK375769', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-10 21:10:49', NULL, NULL),
('kk_6a1ed26eeace1', 'KK515412', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-02 22:33:24', NULL, NULL),
('kk_6a1ed26eeb99d', 'KK287920', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-19 17:32:59', NULL, NULL),
('kk_6a1ed26eec3e3', 'KK967098', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-02 17:16:19', NULL, NULL),
('kk_6a1ed26eecf85', 'KK487693', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-30 02:10:16', NULL, NULL),
('kk_6a1ed26eed8e5', 'KK630238', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-05 16:57:39', NULL, NULL),
('kk_6a1ed26eee952', 'KK365097', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-21 12:01:02', NULL, NULL),
('kk_6a1ed26ef0060', 'KK154556', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-16 13:21:17', NULL, NULL),
('kk_6a1ed26ef0d8c', 'KK966748', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-15 23:33:40', NULL, NULL),
('kk_6a1ed26ef218a', 'KK893760', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-10 22:18:41', NULL, NULL),
('kk_6a1ed26ef338d', 'KK563651', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-20 07:00:47', NULL, NULL),
('kk_6a1ed26ef3d3a', 'KK969752', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-09 23:13:36', NULL, NULL),
('kk_6a1ed26f00a3e', 'KK662899', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-07 14:45:56', NULL, NULL),
('kk_6a1ed26f013c6', 'KK838201', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-16 13:00:26', NULL, NULL),
('kk_6a1ed26f01e18', 'KK479358', 'Kiểm kê định kỳ tháng 04', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-04-09 18:51:36', NULL, NULL),
('kk_6a1ed26f03436', 'KK371348', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 2, NULL, 'user_1', NULL, NULL, '2026-05-07 10:52:21', NULL, NULL),
('kk_6a1ed26f040df', 'KK314834', 'Kiểm kê định kỳ tháng 05', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'toan_phan', 5, NULL, 'user_1', NULL, NULL, '2026-05-30 05:00:57', NULL, '2026-06-02 19:59:26');

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
  `huong_dan_bao_quan` text DEFAULT NULL,
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

INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `huong_dan_bao_quan`, `hinh_anh_chinh`, `tong_ton_kho`, `luot_xem`, `trang_thai`, `don_vi_tinh`, `ngay_tao`, `da_xoa`) VALUES
('sp_001', 'SP0001', 'Bột Xông Nhà', 'san-pham-bot-xong-nha-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_bot', 'ld_7', 'menh_2', 420000, 1020000, 816000, 'Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '<p><strong>Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p><h3>1. Thông tin chi tiết sản phẩm</h3><ul><li><strong>Tên sản phẩm:</strong> Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li><li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li><li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li><li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li><li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li><li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li><li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li></ul><h3>2. Lợi ích và điểm nổi bật</h3><ul><li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li><li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li><li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li><li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li><li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li></ul><h3>3. Hướng dẫn chọn size</h3><ul><li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li><li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li><li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li></ul><p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p><h3>4. Hướng dẫn sử dụng và bảo quản</h3><ul><li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li><li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li><li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li><li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li></ul><h3>5. Cam kết của shop</h3><ul><li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li><li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li><li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li><li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li></ul><p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg', 365, 8, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_002', 'SP0002', 'Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích', 'chuoi-ngoc-muc-duc-a-mix-lu-thong-binh-an-ngoc-bich-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_4', 'menh_2', 210000, 810000, 688500, 'Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Mực Dục tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Mực Dục 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Lục Đậm, Đen Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay ngọc mực dục, ngọc tự nhiên, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-1.jpg', 124, 13, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_003', 'SP0003', 'Mã Não Mật Mèo Mụp', 'vong-tay-ma-nao-mat-meo-mup-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_1', 'menh_5', 1050000, 1350000, 1150000, 'Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-1.jpg', 190, 2, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_004', 'SP0004', 'Ngọc Hòa Điền Màu Nhã Nhặn', 'vong-tay-ngoc-hoa-dien-mau-nha-nhan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_5', 'menh_2', 1120000, 1520000, 500000, 'Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-1.jpg', 149, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_005', 'SP0005', 'Ngọc Hòa Điền Tân Cương', 'vong-tay-ngoc-hoa-dien-tan-cuong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_6', 'menh_5', 910000, 1410000, 1128000, 'Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-1.jpg', 286, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_006', 'SP0006', 'Ngọc Liu Ninh Thiên Thanh Đông', 'vong-tay-ngoc-liu-ninh-thien-thanh-dong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_3', 'menh_4', 910000, 1510000, 1283500, 'Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Liu Ninh tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Liu Ninh 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Rêu, Xanh Thanh</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc liu ninh, vòng ngọc tự nhiên, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-1.jpg', 98, 16, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_007', 'SP0007', 'Tràng Hạt Ngọc Hòa Điền', 'vong-tay-trang-hat-ngoc-hoa-dien-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_8', 'menh_4', 1050000, 1350000, 1150000, 'Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-1.jpg', 213, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_008', 'SP0008', 'Tràng San Hô Niệm Phật', 'vong-tay-trang-san-ho-niem-phat-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_3', 'menh_4', 560000, 960000, 500000, 'Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu San Hô tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> San Hô 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Trắng</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay san hô, san hô đỏ, trang sức biển, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-1.jpg', 105, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_009', 'SP0009', 'Vòng Thời Trang Xinh Yêu', 'vong-thoi-trang-xinh-yeu-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_1', 'menh_5', 770000, 1170000, 936000, 'Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg', 126, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_010', 'SP0010', 'Vòng Đá Mã Não', 'vong-da-ma-nao-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'ld_3', 'menh_4', 700000, 1200000, 1020000, 'Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg', 199, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_011', 'SP0011', 'Nhang', 'san-pham-nhang-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tramhuong', 'ld_3', 'menh_4', 1120000, 1520000, 1320000, 'Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg', 231, 20, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_012', 'SP0012', 'Tram Huong', 'san-pham-tram-huong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tramhuong', 'ld_4', 'menh_3', 490000, 790000, 500000, 'Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg', 213, 2, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_013', 'SP0013', 'Hồng Anh Đào Ngọc Nương Tử', 'vong-tay-hong-anh-dao-ngoc-nuong-tu-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_8', 'menh_4', 840000, 1140000, 912000, 'Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Hồng Anh Đào tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Hồng Anh Đào 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Hồng Nhạt, Trắng Vân Hồng</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> đá hồng anh đào, vòng tay nữ, vòng thạch anh hồng, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg', 180, 0, 1, 'Cái', '2026-05-28 11:33:25', 0);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `huong_dan_bao_quan`, `hinh_anh_chinh`, `tong_ton_kho`, `luot_xem`, `trang_thai`, `don_vi_tinh`, `ngay_tao`, `da_xoa`) VALUES
('sp_014', 'SP0014', 'Hồng Đào Điểm Son', 'vong-tay-hong-dao-diem-son-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_3', 'menh_4', 1120000, 1520000, 1292000, 'Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg', 185, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_015', 'SP0015', 'Mã Não Anh Đào', 'vong-tay-ma-nao-anh-dao-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_2', 'menh_5', 910000, 1310000, 1110000, 'Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg', 125, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_016', 'SP0016', 'Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng', 'vong-tay-ma-nao-anh-dao-diem-hoa-trong-co-vay-rong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_6', 'menh_1', 280000, 680000, 500000, 'Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-1.jpg', 115, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_017', 'SP0017', 'Mã Não Hồng Bưởi', 'vong-tay-ma-nao-hong-buoi-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_7', 'menh_2', 770000, 1070000, 856000, 'Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg', 120, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_018', 'SP0018', 'Ngọc Lăng Đông Đôn Hoàng', 'vong-tay-ngoc-lang-dong-don-hoang-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_2', 'menh_5', 1120000, 1520000, 1292000, 'Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Lăng Đông tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Lăng Đông 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Nâu Vàng, Hổ Phách</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc lăng đông, vòng ngọc quà tặng, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-1.jpg', 174, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_019', 'SP0019', 'Ngọc Tụ Nham Liu Ninh', 'vong-tay-ngoc-tu-nham-liu-ninh-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_2', 'menh_5', 910000, 1410000, 1210000, 'Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Tụ Nham tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Tụ Nham 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Trong, Vân Mây</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc tụ nham, vòng tay phong thủy ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-1.jpg', 84, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_020', 'SP0020', 'Ngọc Tụ Nham Vân Mây', 'vong-tay-ngoc-tu-nham-van-may-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_8', 'menh_4', 910000, 1510000, 500000, 'Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Tụ Nham tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Ngọc Tụ Nham 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Xanh Trong, Vân Mây</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> ngọc tụ nham, vòng tay phong thủy ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg', 125, 0, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_021', 'SP0021', 'Shentacui Bánh Đậu Mứt Cam', 'vong-tay-shentacui-banh-dau-mut-cam-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_4', 'menh_2', 1050000, 1350000, 1080000, 'Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg', 187, 1, 1, 'Cái', '2026-05-28 11:33:25', 0),
('sp_022', 'SP0022', 'Sâm Panh Thuần', 'vong-tay-sam-panh-thuan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'ld_5', 'menh_4', 1190000, 1790000, 1521500, 'Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '\n<p><strong>Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>\n\n<h3>1. Thông tin chi tiết sản phẩm</h3>\n<ul>\n  <li><strong>Tên sản phẩm:</strong> Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>\n  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>\n  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>\n  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>\n  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>\n  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>\n  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>\n</ul>\n\n<h3>2. Lợi ích và điểm nổi bật</h3>\n<ul>\n  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>\n  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>\n  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>\n  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>\n  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>\n</ul>\n\n<h3>3. Hướng dẫn chọn size</h3>\n<ul>\n  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>\n  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>\n  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>\n</ul>\n<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>\n\n<h3>4. Hướng dẫn sử dụng và bảo quản</h3>\n<ul>\n  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>\n  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>\n  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>\n  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>\n</ul>\n\n<h3>5. Cam kết của shop</h3>\n<ul>\n  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>\n  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>\n  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>\n  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>\n</ul>\n\n<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '- Tránh va đập mạnh hoặc làm rơi rớt.\n- Tránh tiếp xúc lâu với hóa chất.\n- Tháo ra khi tắm, giặt hoặc làm việc nhà.\n- Vệ sinh định kỳ bằng vải mềm và nước sạch.', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg', 171, 0, 1, 'Cái', '2026-05-28 11:33:25', 0);

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
('bt_6a17ca3f3624c_2637', 'sp_005', 'Size 12mm', 96, 0, 40000, 5),
('bt_6a17ca3f3648f_7582', 'sp_005', 'Size 14mm', 70, 0, 40000, 5),
('bt_6a17ca3f36705_1246', 'sp_005', 'Size 8mm', 50, 0, 60000, 5),
('bt_6a17ca3f36ee0_2672', 'sp_006', 'Size 14mm', 43, 0, 0, 5),
('bt_6a17ca3f372d5_2690', 'sp_006', 'Size 12mm', 54, 0, 20000, 5),
('bt_6a17ca3f37bf0_7610', 'sp_007', 'Màu nhạt', 75, 0, 0, 5),
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
('d37a62b2-5c1c-11f1-a6a6-088fc37729cd', 'd36ad3fc-5c1c-11f1-a6a6-088fc37729cd', 'bt_6a17ca3f45a76_9908', 29, '2026-05-30 11:43:50'),
('e25f83de-5e82-11f1-8be8-088fc37729cd', 'kv_6a1ed26ead9ff', 'bt_6a17ca3f37bf0_7610', 9, '2026-06-02 12:59:26'),
('e25fa123-5e82-11f1-8be8-088fc37729cd', 'kv_6a1ed26ead433', 'bt_6a17ca3f3624c_2637', 19, '2026-06-02 12:59:26'),
('e25facf6-5e82-11f1-8be8-088fc37729cd', 'kv_6a1ed26ead1a8', 'bt_6a17ca3f3624c_2637', 18, '2026-06-02 12:59:26');

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
('ba467f83493062c5b15e72da52ac47fc', 'sp_001'),
('ba467f83493062c5b15e72da52ac47fc', 'sp_002'),
('ba467f83493062c5b15e72da52ac47fc', 'sp_003'),
('ba467f83493062c5b15e72da52ac47fc', 'sp_006'),
('ba467f83493062c5b15e72da52ac47fc', 'sp_012'),
('ba467f83493062c5b15e72da52ac47fc', 'sp_021'),
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
-- Cấu trúc bảng cho bảng `so_dia_chi`
--

CREATE TABLE `so_dia_chi` (
  `id` varchar(36) NOT NULL,
  `id_nguoi_dung` varchar(36) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `tinh_thanh` varchar(100) NOT NULL,
  `quan_huyen` varchar(100) NOT NULL,
  `phuong_xa` varchar(100) NOT NULL,
  `dia_chi_cu_the` varchar(255) NOT NULL,
  `la_mac_dinh` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `so_dia_chi`
--

INSERT INTO `so_dia_chi` (`id`, `id_nguoi_dung`, `ho_ten`, `so_dien_thoai`, `tinh_thanh`, `quan_huyen`, `phuong_xa`, `dia_chi_cu_the`, `la_mac_dinh`, `ngay_tao`, `ngay_cap_nhat`) VALUES
('28c6e6b0-5fd6-11f1-9760-088fc37729cd', '5e4d964ac24fe1e1abba8a377b6788ee', 'Test Name', '0123456789', 'HCM', 'Q1', 'P1', '123 ABC', 1, '2026-06-04 12:28:03', '2026-06-04 12:28:03'),
('59936de1-5fd7-11f1-9760-088fc37729cd', 'ba467f83493062c5b15e72da52ac47fc', 'Hai', '03658875541', 'TPHCM', 'Quận Tân Phú', 'Phường Phú Trung', '615 Âu Cơ', 0, '2026-06-04 12:36:35', '2026-06-04 17:48:13'),
('baaf4b18-5fd6-11f1-9760-088fc37729cd', 'ba467f83493062c5b15e72da52ac47fc', 'Hai', '0356895784', 'TPHCM', 'Quận Tân Phú', 'Phường Phú Trung', '613 Âu Cơ', 1, '2026-06-04 12:32:08', '2026-06-04 17:48:13');

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
('tb_6a183bb1d9dec', 'kh_6a183864d1037', 'Quà tặng đặc biệt dành cho bạn!', 'Chuỗi Ngọc xin tặng bạn mã giảm giá 10% cho lần mua sắm tiếp theo. Cảm ơn bạn đã luôn ủng hộ!', 'he_thong', NULL, 0, '2026-05-28 19:57:21'),
('tb_6a1ee69037f77', '5e4d964ac24fe1e1abba8a377b6788ee', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69038465', 'kh_6a183864d2043', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69038e26', 'kh_6a183864eb94d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69038f38', 'kh_6a183864d1037', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69038f84', 'kh_6a183864d3b7c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69038fd4', 'kh_6a183864e04e7', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903904e', 'kh_6a183864f03e3', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903913b', 'kh_6a183864de4c6', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690391fc', 'kh_6a183864da863', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903929d', 'kh_6a183864e626b', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690392fc', 'kh_6a183864d9b06', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039365', 'kh_6a183864e6e30', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039404', 'kh_6a183864d62a5', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039513', 'kh_6a183864edeab', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690395b5', 'kh_6a183864daccb', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903963b', 'kh_6a183864e22de', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903968a', 'kh_6a183864e6ab3', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690396d1', 'kh_6a183864e01ed', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039713', 'kh_6a183864d0640', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039758', 'kh_6a183864e7836', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903979b', 'kh_6a183864e49b2', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690397e0', 'kh_6a183864e0c66', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039828', 'kh_6a183864e35e0', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903986c', 'kh_6a183864ec5a2', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690398bd', 'kh_6a183864eeb01', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039906', 'kh_6a183864d0cf7', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903995f', 'kh_6a183864d1a95', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee690399ba', 'kh_6a183864dfd42', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039a0d', 'kh_6a183864eceeb', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039a65', 'kh_6a183864f0b91', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039aaf', 'kh_6a183864eedff', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039af4', 'kh_6a183864ef4e4', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039b34', 'kh_6a183864f1566', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039b94', 'kh_6a183864e3f0d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039c0b', 'kh_6a183864e5616', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039c61', 'kh_6a183864e1347', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039cb1', 'kh_6a183864e7437', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039cf1', 'kh_6a183864d097f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039d2f', 'kh_6a183864d366c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039d6c', 'kh_6a183864e378b', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039dab', 'kh_6a183864eb656', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039e00', 'kh_6a183864d141b', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039e57', 'kh_6a183864e480f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039ec7', 'kh_6a183864e5953', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee69039f87', 'kh_6a183864e9a0f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a049', 'kh_6a183864e6652', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a0b3', 'kh_6a183864efc56', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a135', 'kh_6a183864d49e4', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a1f9', 'kh_6a183864e08d6', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a31a', 'kh_6a183864e8aa9', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a44c', 'kh_6a183864ed5b5', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a4fc', 'kh_6a183864e9ff4', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a557', 'kh_6a183864f1e48', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a5cb', 'kh_6a183864de904', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a61d', 'kh_6a183864e5e62', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a668', 'kh_6a183864ed3e0', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a6f0', 'kh_6a183864f22c1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a751', 'kh_6a183864dc515', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a7ca', 'kh_6a183864e4e7a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a897', 'kh_6a183864d4360', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903a990', 'kh_6a183864dc2ce', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903aa13', 'kh_6a183864e297a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903aa5e', 'kh_6a183864d4e56', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903aaa3', 'kh_6a183864ebc34', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903aae9', 'kh_6a183864e340d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ab2d', 'kh_6a183864ef19f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ab72', 'kh_6a183864df364', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903abb3', 'kh_6a183864daf6b', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903abf3', 'kh_6a183864dd6ee', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ac32', 'kh_6a183864ee93f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ac6f', 'kh_6a183864d404e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903acac', 'kh_6a183864dfb1f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ace9', 'kh_6a183864ed76b', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ad26', 'kh_6a183864ebfd1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ad63', 'kh_6a183864dcf8e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903adb7', 'kh_6a183864d1d81', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ae20', 'kh_6a183864d239a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ae7a', 'kh_6a183864eae73', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903aecf', 'kh_6a183864e92f9', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903af24', 'kh_6a183864f05c2', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903af91', 'kh_6a183864eb17d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b004', 'kh_6a183864e94fe', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b0ee', 'kh_6a183864e2115', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b1a0', 'kh_6a183864eec20', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b20d', 'kh_6a183864ee640', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b285', 'kh_6a183864d6660', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b2f2', 'kh_6a183864dff7a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b350', 'kh_6a183864e2dce', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b3b1', 'kh_6a183864eba74', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b44a', 'kh_6a183864f06ea', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b4ce', 'kh_6a183864e465e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b543', 'kh_6a183864ee308', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b5b6', 'kh_6a183864d4c48', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b625', 'kh_6a183864d56f6', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b678', 'kh_6a183864e6fe0', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b6c7', 'kh_6a183864ddc67', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b70d', 'kh_6a183864d8938', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b775', 'kh_6a183864dc8e2', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b824', 'kh_6a183864eefc8', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b887', 'kh_6a183864edb17', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b8ce', 'kh_6a183864e7c2e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b922', 'kh_6a183864d5f72', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903b98f', 'kh_6a183864e2552', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ba19', 'kh_6a183864e3bd9', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bb13', 'kh_6a183864e71db', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bb82', 'kh_6a183864e11be', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bbd6', 'kh_6a183864f111f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bc38', 'kh_6a183864d7fc1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bcb9', 'kh_6a183864e0f3c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bd82', 'kh_6a183864d5b61', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bf16', 'kh_6a183864d461b', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903bfd6', 'kh_6a183864dd94e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c06a', 'kh_6a183864e97f6', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c0de', 'kh_6a183864d8470', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c133', 'kh_6a183864dba87', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c18b', 'kh_6a183864eaa49', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c1fb', 'kh_6a183864e06e7', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c287', 'kh_6a183864d6c49', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c418', 'kh_6a183864e6c90', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c517', 'kh_6a183864f08b4', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c575', 'kh_6a183864ddaee', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c5c2', 'kh_6a183864ef658', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c617', 'kh_6a183864efffd', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c67c', 'kh_6a183864e27a5', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c6c6', 'kh_6a183864e397e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c718', 'kh_6a183864e9903', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c75d', 'kh_6a183864dc124', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c79d', 'kh_6a183864e1c6c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c7db', 'kh_6a183864d3df0', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c819', 'kh_6a183864e8eb1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c859', 'kh_6a183864da034', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c899', 'kh_6a183864ea6ff', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c8e3', 'kh_6a183864e8000', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c941', 'kh_6a183864ef83f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903c9b6', 'kh_6a183864d8da8', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ca1f', 'kh_6a183864db0c9', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ca8a', 'kh_6a183864de67d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cb0c', 'kh_6a183864d5370', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cb90', 'kh_6a183864e1a42', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cc18', 'kh_6a183864eb77f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cc74', 'kh_6a183864d9674', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ccef', 'kh_6a183864e51d8', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cd71', 'kh_6a183864cecd3', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cdd2', 'kh_6a183864ed025', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ce2e', 'kh_6a183864db37e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ce79', 'kh_6a183864d2c59', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903ceb9', 'kh_6a183864d1780', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cef7', 'kh_6a183864ec1a3', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cf35', 'kh_6a183864efec4', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903cf73', 'kh_6a183864f0f35', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d007', 'kh_6a183864f0202', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d06e', 'kh_6a183864e448e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d0b5', 'kh_6a183864ee82a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d0f5', 'kh_6a183864d2994', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d134', 'kh_6a183864e42da', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d172', 'kh_6a183864db59a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d1af', 'kh_6a183864dcc8c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d1ec', 'kh_6a183864eb2bc', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d229', 'kh_6a183864ed220', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d26d', 'kh_6a183864e1ef0', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d2aa', 'kh_6a183864efd8d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d2e7', 'kh_6a183864dbed9', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d324', 'kh_6a183864f1999', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d361', 'kh_6a183864d9216', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d39e', 'kh_6a183864da4a6', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d3db', 'kh_6a183864ea37d', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d418', 'kh_6a183864df195', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d455', 'kh_6a183864df8e1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d4a8', 'kh_6a183864e4124', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d50f', 'kh_6a183864d2686', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d55d', 'kh_6a183864de10e', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d59f', 'kh_6a183864e1811', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d5df', 'kh_6a183864e8353', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d641', 'kh_6a183864d3388', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d696', 'kh_6a183864dec9f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d6da', 'kh_6a183864e697a', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d71c', 'kh_6a183864f0d2f', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d75f', 'kh_6a183864ebe1c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d7a3', 'kh_6a183864d38a6', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903d7f0', 'kh_6a183864d3095', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903dc06', 'kh_6a183864d6a51', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903dcc3', 'kh_6a183864ddec8', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903dd47', 'kh_6a183864ef344', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903dd96', 'kh_6a183864dd2b1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903dddf', 'kh_6a183864f09d1', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903de31', 'kh_6a183864cfc64', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903de9d', 'kh_6a183864e9d20', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903df21', 'kh_6a183864eccd3', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903df99', 'kh_6a183864db7a4', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903e04e', 'kh_6a183864e15ab', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903e0f4', 'kh_6a183864e96f0', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903e14e', 'kh_6a183864e324c', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a1ee6903e1a1', 'kh_6a183864dbc65', 'test', 'test', 'tin_nhan', NULL, 0, '2026-06-02 21:20:00'),
('tb_6a219eaadb150', 'ba467f83493062c5b15e72da52ac47fc', 'Đơn hàng #DH01B8B4 đã được xác nhận', 'Đơn hàng #DH01B8B4 đã được xác nhận. Chúng tôi đang chuẩn bị hàng cho bạn!', 'don_hang', 'http://localhost:8080/shopbanhangchuoingoc/chi-tiet-don-hang?id=DH01B8B4', 1, '2026-06-04 22:50:02'),
('tb_6a219f7055f88', 'ba467f83493062c5b15e72da52ac47fc', 'Đơn hàng #DH01B8B4 đang giao đến bạn', 'Đơn hàng #DH01B8B4 đang trên đường giao đến bạn 🚚. Vui lòng giữ điện thoại để nhận hàng.', 'don_hang', 'http://localhost:8080/shopbanhangchuoingoc/chi-tiet-don-hang?id=DH01B8B4', 1, '2026-06-04 22:53:20'),
('tb_6a219f862ee9b', 'ba467f83493062c5b15e72da52ac47fc', 'Đơn hàng #DH01B8B4 đã giao thành công', 'Đơn hàng #DH01B8B4 đã giao thành công! Cảm ơn bạn đã mua sắm tại Chuỗi Ngọc 💎', 'don_hang', 'http://localhost:8080/shopbanhangchuoingoc/chi-tiet-don-hang?id=DH01B8B4', 1, '2026-06-04 22:53:42');

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
('62182a4e-5cab-11f1-962c-088fc37729cd', 'CK20260531999', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'd36b5bba-5c1c-11f1-a6a6-088fc37729cd', 'Chuyển nội bộ', 0, 4, '', NULL, NULL, NULL, '2026-05-31 11:44:18', '2026-05-31 06:44:29', '2026-05-31 06:44:44', '2026-05-31 06:45:11'),
('tc_6a1ed26ed6c0f', 'TC159137', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-23 22:13:57', NULL, '2026-04-23 22:13:57', '2026-04-23 22:13:57'),
('tc_6a1ed26ed7c40', 'TC178024', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-29 14:49:38', NULL, '2026-04-29 14:49:38', '2026-04-29 14:49:38'),
('tc_6a1ed26ed8663', 'TC667002', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-04 17:55:38', NULL, '2026-04-04 17:55:38', '2026-04-04 17:55:38'),
('tc_6a1ed26ed8942', 'TC761976', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-17 06:29:59', NULL, '2026-04-17 06:29:59', '2026-04-17 06:29:59'),
('tc_6a1ed26ed8c2b', 'TC511618', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-23 01:55:56', NULL, '2026-04-23 01:55:56', '2026-04-23 01:55:56'),
('tc_6a1ed26ed9481', 'TC363630', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-13 20:18:29', NULL, '2026-04-13 20:18:29', '2026-04-13 20:18:29'),
('tc_6a1ed26ed9803', 'TC530571', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-13 22:19:56', NULL, '2026-05-13 22:19:56', '2026-05-13 22:19:56'),
('tc_6a1ed26ed9cac', 'TC255969', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-06-01 14:39:12', NULL, '2026-06-01 14:39:12', '2026-06-01 14:39:12'),
('tc_6a1ed26eda49f', 'TC642808', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-26 00:11:25', NULL, '2026-05-26 00:11:25', '2026-05-26 00:11:25'),
('tc_6a1ed26edb0ac', 'TC115893', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-22 04:15:54', NULL, '2026-04-22 04:15:54', '2026-04-22 04:15:54'),
('tc_6a1ed26edb4fb', 'TC831604', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-11 00:56:50', NULL, '2026-04-11 00:56:50', '2026-04-11 00:56:50'),
('tc_6a1ed26edb759', 'TC931634', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-07 02:50:46', NULL, '2026-05-07 02:50:46', '2026-05-07 02:50:46'),
('tc_6a1ed26edbd96', 'TC114841', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-09 21:59:13', NULL, '2026-04-09 21:59:13', '2026-04-09 21:59:13'),
('tc_6a1ed26edc25d', 'TC671014', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-19 20:13:37', NULL, '2026-04-19 20:13:37', '2026-04-19 20:13:37'),
('tc_6a1ed26edc620', 'TC245041', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-08 13:55:08', NULL, '2026-04-08 13:55:08', '2026-04-08 13:55:08'),
('tc_6a1ed26edccd4', 'TC498629', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-04 23:57:25', NULL, '2026-05-04 23:57:25', '2026-05-04 23:57:25'),
('tc_6a1ed26edd606', 'TC793408', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-26 08:09:37', NULL, '2026-04-26 08:09:37', '2026-04-26 08:09:37'),
('tc_6a1ed26eddb1f', 'TC347586', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-17 12:33:00', NULL, '2026-05-17 12:33:00', '2026-05-17 12:33:00'),
('tc_6a1ed26eddf93', 'TC279861', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-28 19:37:09', NULL, '2026-04-28 19:37:09', '2026-04-28 19:37:09'),
('tc_6a1ed26ede42c', 'TC995993', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-30 17:53:42', NULL, '2026-04-30 17:53:42', '2026-04-30 17:53:42'),
('tc_6a1ed26edeeba', 'TC210702', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-23 09:53:40', NULL, '2026-05-23 09:53:40', '2026-05-23 09:53:40'),
('tc_6a1ed26edf15a', 'TC516202', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-06 05:17:40', NULL, '2026-04-06 05:17:40', '2026-04-06 05:17:40'),
('tc_6a1ed26edf3df', 'TC526215', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-05-17 17:20:30', NULL, '2026-05-17 17:20:30', '2026-05-17 17:20:30'),
('tc_6a1ed26edf7f5', 'TC890395', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-28 01:10:05', NULL, '2026-04-28 01:10:05', '2026-04-28 01:10:05'),
('tc_6a1ed26edfa0c', 'TC951316', '2919fc7c-5b60-11f1-8d3a-088fc37729cd', 'd36a7902-5c1c-11f1-a6a6-088fc37729cd', 'Nội bộ', 0, 3, NULL, NULL, 'user_1', NULL, '2026-04-28 17:47:05', NULL, '2026-04-28 17:47:05', '2026-04-28 17:47:05');

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
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gioi_han_moi_user` int(11) DEFAULT 1 COMMENT 'S??? l???n t???i ??a m???i user ???????c d??ng voucher n??y. -1 = kh??ng gi???i h???n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `ma_voucher`, `ten_chuong_trinh`, `mo_ta`, `pham_vi_san_pham`, `doi_tuong`, `hang_thanh_vien`, `is_combine`, `loai_giam`, `gia_tri`, `don_toi_thieu`, `giam_toi_da`, `so_luong`, `da_dung`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `ngay_tao`, `ngay_cap_nhat`, `gioi_han_moi_user`) VALUES
('', 'VIP4BB211', 'Chương trình giảm tiền siêu hot 1', 'Mô tả chi tiết cho chương trình VIP4BB211', 'all', 'all', NULL, 0, 2, 160000, 500000, 0, 129, 0, '2026-05-22 04:17:53', '2026-06-14 04:17:53', 1, '2026-06-01 09:17:53', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62020db', 'NEWD9A611', 'Chương trình miễn phí ship siêu hot 1', 'Mô tả chi tiết cho chương trình NEWD9A611', 'all', 'all', NULL, 1, 3, 0, 400000, 50000, -1, 0, '2026-06-03 04:20:00', '2026-06-14 04:20:00', 1, '2026-06-01 09:20:18', '2026-06-01 15:31:54', 1),
('vc_seed_6a1cec6202bca', 'SALECE2F12', 'Chương trình giảm tiền siêu hot 2', 'Mô tả chi tiết cho chương trình SALECE2F12', 'vat_pham', 'all', NULL, 0, 2, 140000, 300000, 0, -1, 0, '2026-06-05 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6202e6e', 'CHAO7817D3', 'Chương trình giảm tiền siêu hot 3', 'Mô tả chi tiết cho chương trình CHAO7817D3', 'vat_pham', 'all', NULL, 1, 2, 130000, 300000, 0, 184, 0, '2026-05-26 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62030a8', 'CHAO8B9F54', 'Chương trình miễn phí ship siêu hot 4', 'Mô tả chi tiết cho chương trình CHAO8B9F54', 'all', 'all', NULL, 0, 3, 0, 500000, 30000, 415, 0, '2026-06-06 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62034c3', 'LIXI7B36F5', 'Chương trình tặng quà siêu hot 5', 'Mô tả chi tiết cho chương trình LIXI7B36F5', 'vat_pham', 'all', NULL, 0, 4, 0, 200000, 0, 219, 0, '2026-05-28 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62038a2', 'THANG267E86', 'Chương trình giảm tiền siêu hot 6', 'Mô tả chi tiết cho chương trình THANG267E86', 'chuoi_da', 'all', NULL, 0, 2, 130000, 0, 0, 281, 0, '2026-05-24 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec6203c9a', 'VIP62D357', 'Chương trình miễn phí ship siêu hot 7', 'Mô tả chi tiết cho chương trình VIP62D357', 'chuoi_da', 'all', NULL, 1, 3, 0, 300000, 20000, -1, 0, '2026-05-28 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6204050', 'SALEA3F528', 'Chương trình tặng quà siêu hot 8', 'Mô tả chi tiết cho chương trình SALEA3F528', 'vat_pham', 'all', NULL, 0, 4, 0, 300000, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62044d4', 'NEWFE1D19', 'Chương trình tặng quà siêu hot 9', 'Mô tả chi tiết cho chương trình NEWFE1D19', 'vong_ngoc', 'all', NULL, 1, 4, 0, 400000, 0, -1, 0, '2026-06-03 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62048e0', 'LIXIC297C10', 'Chương trình miễn phí ship siêu hot 10', 'Mô tả chi tiết cho chương trình LIXIC297C10', 'all', 'all', NULL, 1, 3, 0, 400000, 30000, 76, 0, '2026-05-29 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec6204c95', 'SALE15B5A11', 'Chương trình giảm tiền siêu hot 11', 'Mô tả chi tiết cho chương trình SALE15B5A11', 'chuoi_da', 'all', NULL, 1, 2, 110000, 0, 0, 304, 0, '2026-05-25 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62050c8', 'LIXI92FBB12', 'Chương trình giảm % siêu hot 12', 'Mô tả chi tiết cho chương trình LIXI92FBB12', 'chuoi_da', 'new', NULL, 0, 1, 23, 300000, 60000, 31, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620528a', 'SALECB11313', 'Chương trình tặng quà siêu hot 13', 'Mô tả chi tiết cho chương trình SALECB11313', 'chuoi_da', 'all', NULL, 1, 4, 0, 400000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62054cb', 'THANGA1B5914', 'Chương trình tặng quà siêu hot 14', 'Mô tả chi tiết cho chương trình THANGA1B5914', 'vong_ngoc', 'all', NULL, 0, 4, 0, 400000, 0, 91, 0, '2026-05-25 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6205681', 'NEWA846215', 'Chương trình giảm tiền siêu hot 15', 'Mô tả chi tiết cho chương trình NEWA846215', 'chuoi_da', 'new', NULL, 0, 2, 50000, 0, 0, 306, 0, '2026-05-28 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620586c', 'LIXIE296F16', 'Chương trình giảm tiền siêu hot 16', 'Mô tả chi tiết cho chương trình LIXIE296F16', 'chuoi_da', 'all', NULL, 1, 2, 190000, 200000, 0, -1, 0, '2026-05-22 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6205a6e', 'CHAO9EDC117', 'Chương trình miễn phí ship siêu hot 17', 'Mô tả chi tiết cho chương trình CHAO9EDC117', 'vong_ngoc', 'all', NULL, 1, 3, 0, 400000, 50000, -1, 0, '2026-06-03 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:27:31', 1),
('vc_seed_6a1cec6205be0', 'LIXIC0BAA18', 'Chương trình giảm % siêu hot 18', 'Mô tả chi tiết cho chương trình LIXIC0BAA18', 'vat_pham', 'all', NULL, 0, 1, 27, 400000, 70000, 195, 0, '2026-05-25 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6205dc6', 'SALEC417219', 'Chương trình miễn phí ship siêu hot 19', 'Mô tả chi tiết cho chương trình SALEC417219', 'all', 'new', NULL, 0, 3, 0, 400000, 40000, 205, 0, '2026-05-23 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 14:35:04', 1),
('vc_seed_6a1cec6205faa', 'NEW4334220', 'Chương trình giảm tiền siêu hot 20', 'Mô tả chi tiết cho chương trình NEW4334220', 'all', 'new', NULL, 0, 2, 160000, 500000, 0, 86, 0, '2026-05-26 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec62061ae', 'NEW93BFE21', 'Chương trình miễn phí ship siêu hot 21', 'Mô tả chi tiết cho chương trình NEW93BFE21', 'chuoi_da', 'new', NULL, 1, 3, 0, 400000, 20000, -1, 0, '2026-05-30 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620639a', 'CHAO97A5E22', 'Chương trình giảm tiền siêu hot 22', 'Mô tả chi tiết cho chương trình CHAO97A5E22', 'vat_pham', 'all', NULL, 1, 2, 120000, 300000, 0, 324, 0, '2026-05-31 04:20:18', '2026-06-13 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec6206556', 'NEWA703023', 'Chương trình tặng quà siêu hot 23', 'Mô tả chi tiết cho chương trình NEWA703023', 'all', 'all', NULL, 0, 4, 0, 300000, 0, 20, 0, '2026-05-14 04:20:18', '2026-05-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620693f', 'SALE2256424', 'Chương trình tặng quà siêu hot 24', 'Mô tả chi tiết cho chương trình SALE2256424', 'vat_pham', 'all', NULL, 1, 4, 0, 500000, 0, -1, 0, '2026-05-11 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6206d29', 'SALE411DA25', 'Chương trình miễn phí ship siêu hot 25', 'Mô tả chi tiết cho chương trình SALE411DA25', 'all', 'new', NULL, 0, 3, 0, 300000, 20000, 138, 0, '2026-05-25 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec62070ea', 'NEW3F4DE26', 'Chương trình giảm % siêu hot 26', 'Mô tả chi tiết cho chương trình NEW3F4DE26', 'chuoi_da', 'all', NULL, 1, 1, 6, 100000, 30000, 273, 0, '2026-05-31 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620725c', 'THANGA70B727', 'Chương trình tặng quà siêu hot 27', 'Mô tả chi tiết cho chương trình THANGA70B727', 'vong_ngoc', 'all', NULL, 0, 4, 0, 400000, 0, 79, 0, '2026-05-16 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620744d', 'THANG7019F28', 'Chương trình tặng quà siêu hot 28', 'Mô tả chi tiết cho chương trình THANG7019F28', 'all', 'new', NULL, 0, 4, 0, 100000, 0, 326, 0, '2026-05-28 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620762c', 'THANGA4B4E29', 'Chương trình miễn phí ship siêu hot 29', 'Mô tả chi tiết cho chương trình THANGA4B4E29', 'chuoi_da', 'all', NULL, 0, 3, 0, 400000, 40000, -1, 0, '2026-05-14 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec62077f3', 'SALE200CF30', 'Chương trình giảm % siêu hot 30', 'Mô tả chi tiết cho chương trình SALE200CF30', 'vong_ngoc', 'all', NULL, 1, 1, 29, 100000, 70000, 414, 0, '2026-06-03 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62079f6', 'THANG9942A31', 'Chương trình miễn phí ship siêu hot 31', 'Mô tả chi tiết cho chương trình THANG9942A31', 'all', 'all', NULL, 0, 3, 0, 300000, 30000, -1, 0, '2026-05-30 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6207bdb', 'NEW547AB32', 'Chương trình miễn phí ship siêu hot 32', 'Mô tả chi tiết cho chương trình NEW547AB32', 'all', 'new', NULL, 0, 3, 0, 200000, 40000, -1, 1, '2026-06-02 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-04 12:49:36', 1),
('vc_seed_6a1cec6207e22', 'SALE47CD133', 'Chương trình giảm % siêu hot 33', 'Mô tả chi tiết cho chương trình SALE47CD133', 'all', 'all', NULL, 0, 1, 36, 500000, 90000, -1, 0, '2026-05-24 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6208cd6', 'SALE7857A34', 'Chương trình giảm % siêu hot 34', 'Mô tả chi tiết cho chương trình SALE7857A34', 'vat_pham', 'all', NULL, 1, 1, 46, 200000, 30000, -1, 0, '2026-05-25 04:20:18', '2026-06-06 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec6208eee', 'NEWC243035', 'Chương trình miễn phí ship siêu hot 35', 'Mô tả chi tiết cho chương trình NEWC243035', 'vong_ngoc', 'all', NULL, 0, 3, 0, 500000, 30000, -1, 0, '2026-05-24 04:20:18', '2026-06-20 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62090d8', 'NEWD0D6636', 'Chương trình giảm tiền siêu hot 36', 'Mô tả chi tiết cho chương trình NEWD0D6636', 'vong_ngoc', 'all', NULL, 1, 2, 110000, 500000, 0, 385, 0, '2026-05-26 04:20:18', '2026-06-25 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620926b', 'LIXI864D737', 'Chương trình giảm tiền siêu hot 37', 'Mô tả chi tiết cho chương trình LIXI864D737', 'vat_pham', 'new', NULL, 1, 2, 180000, 500000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620944a', 'LIXIFD51038', 'Chương trình giảm % siêu hot 38', 'Mô tả chi tiết cho chương trình LIXIFD51038', 'vat_pham', 'new', NULL, 0, 1, 6, 400000, 60000, 227, 0, '2026-05-30 04:20:18', '2026-06-09 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec6209679', 'CHAOB571B39', 'Chương trình giảm % siêu hot 39', 'Mô tả chi tiết cho chương trình CHAOB571B39', 'chuoi_da', 'all', NULL, 0, 1, 42, 300000, 50000, -1, 0, '2026-05-27 04:20:18', '2026-06-05 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620985c', 'SALE2527940', 'Chương trình miễn phí ship siêu hot 40', 'Mô tả chi tiết cho chương trình SALE2527940', 'chuoi_da', 'all', NULL, 0, 3, 0, 0, 20000, 400, 0, '2026-06-06 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6209a68', 'VIP3AEB541', 'Chương trình giảm tiền siêu hot 41', 'Mô tả chi tiết cho chương trình VIP3AEB541', 'chuoi_da', 'all', NULL, 1, 2, 140000, 300000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6209e6f', 'NEW11DDB42', 'Chương trình giảm tiền siêu hot 42', 'Mô tả chi tiết cho chương trình NEW11DDB42', 'chuoi_da', 'all', NULL, 0, 2, 190000, 300000, 0, -1, 0, '2026-05-26 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620a078', 'THANG425D443', 'Chương trình giảm % siêu hot 43', 'Mô tả chi tiết cho chương trình THANG425D443', 'vong_ngoc', 'all', NULL, 1, 1, 35, 200000, 50000, 469, 0, '2026-05-24 04:20:18', '2026-06-11 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620a242', 'VIP9A28E44', 'Chương trình giảm % siêu hot 44', 'Mô tả chi tiết cho chương trình VIP9A28E44', 'vat_pham', 'all', NULL, 0, 1, 43, 400000, 90000, -1, 0, '2026-05-26 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620a430', 'VIPECE4745', 'Chương trình giảm tiền siêu hot 45', 'Mô tả chi tiết cho chương trình VIPECE4745', 'chuoi_da', 'all', NULL, 0, 2, 170000, 400000, 0, 141, 0, '2026-05-27 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620a60f', 'VIP1E3CB46', 'Chương trình miễn phí ship siêu hot 46', 'Mô tả chi tiết cho chương trình VIP1E3CB46', 'chuoi_da', 'all', NULL, 1, 3, 0, 200000, 20000, 141, 0, '2026-06-06 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620a7ce', 'THANG4F7EC47', 'Chương trình giảm % siêu hot 47', 'Mô tả chi tiết cho chương trình THANG4F7EC47', 'all', 'all', NULL, 1, 1, 12, 400000, 20000, -1, 0, '2026-06-04 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620a99a', 'LIXIE894A48', 'Chương trình tặng quà siêu hot 48', 'Mô tả chi tiết cho chương trình LIXIE894A48', 'vat_pham', 'all', NULL, 0, 4, 0, 200000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-06 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620ab53', 'SALE751B649', 'Chương trình giảm tiền siêu hot 49', 'Mô tả chi tiết cho chương trình SALE751B649', 'chuoi_da', 'all', NULL, 0, 2, 130000, 400000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620ad24', 'VIP8E41950', 'Chương trình giảm tiền siêu hot 50', 'Mô tả chi tiết cho chương trình VIP8E41950', 'chuoi_da', 'all', NULL, 1, 2, 120000, 200000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620aed8', 'NEWE691051', 'Chương trình giảm tiền siêu hot 51', 'Mô tả chi tiết cho chương trình NEWE691051', 'vong_ngoc', 'all', NULL, 0, 2, 50000, 400000, 0, -1, 0, '2026-05-26 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620b0a8', 'NEW6485A52', 'Chương trình giảm tiền siêu hot 52', 'Mô tả chi tiết cho chương trình NEW6485A52', 'chuoi_da', 'all', NULL, 1, 2, 160000, 500000, 0, 352, 0, '2026-05-28 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620b269', 'CHAO963AF53', 'Chương trình tặng quà siêu hot 53', 'Mô tả chi tiết cho chương trình CHAO963AF53', 'chuoi_da', 'all', NULL, 0, 4, 0, 300000, 0, -1, 0, '2026-05-12 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620b5c2', 'LIXIA258454', 'Chương trình giảm tiền siêu hot 54', 'Mô tả chi tiết cho chương trình LIXIA258454', 'vat_pham', 'all', NULL, 1, 2, 140000, 500000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620b7ba', 'SALEE859555', 'Chương trình miễn phí ship siêu hot 55', 'Mô tả chi tiết cho chương trình SALEE859555', 'vat_pham', 'all', NULL, 0, 3, 0, 500000, 30000, -1, 0, '2026-06-04 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620b9b1', 'VIP35D9B56', 'Chương trình tặng quà siêu hot 56', 'Mô tả chi tiết cho chương trình VIP35D9B56', 'all', 'new', NULL, 1, 4, 0, 500000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620bbd8', 'LIXI5DF6C57', 'Chương trình giảm % siêu hot 57', 'Mô tả chi tiết cho chương trình LIXI5DF6C57', 'vong_ngoc', 'all', NULL, 0, 1, 36, 200000, 20000, 211, 0, '2026-05-30 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620bdbd', 'CHAO8B8DA58', 'Chương trình giảm tiền siêu hot 58', 'Mô tả chi tiết cho chương trình CHAO8B8DA58', 'all', 'all', NULL, 0, 2, 30000, 200000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620bf91', 'CHAO2ADBB59', 'Chương trình tặng quà siêu hot 59', 'Mô tả chi tiết cho chương trình CHAO2ADBB59', 'all', 'new', NULL, 0, 4, 0, 300000, 0, 274, 0, '2026-05-27 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-01 09:30:22', 1),
('vc_seed_6a1cec620c0d8', 'LIXI7360F60', 'Chương trình giảm tiền siêu hot 60', 'Mô tả chi tiết cho chương trình LIXI7360F60', 'chuoi_da', 'all', NULL, 0, 2, 50000, 100000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620c2a4', 'NEWFFB2061', 'Chương trình tặng quà siêu hot 61', 'Mô tả chi tiết cho chương trình NEWFFB2061', 'all', 'all', '[\"rank_1\"]', 0, 4, 0, 200000, 0, -1, 0, '2026-06-05 04:20:18', '2026-06-19 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620c45f', 'SALE4420162', 'Chương trình miễn phí ship siêu hot 62', 'Mô tả chi tiết cho chương trình SALE4420162', 'vat_pham', 'all', '[\"rank_1\"]', 0, 3, 0, 500000, 30000, 469, 0, '2026-05-29 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620c5a1', 'SALEFA95A63', 'Chương trình giảm tiền siêu hot 63', 'Mô tả chi tiết cho chương trình SALEFA95A63', 'all', 'new', '[\"rank_1\"]', 0, 2, 150000, 0, 0, -1, 0, '2026-05-24 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620c759', 'NEWA0AA164', 'Chương trình tặng quà siêu hot 64', 'Mô tả chi tiết cho chương trình NEWA0AA164', 'all', 'all', '[\"rank_1\"]', 0, 4, 0, 100000, 0, 335, 0, '2026-05-23 04:20:18', '2026-06-06 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620c93e', 'THANGCBB8565', 'Chương trình miễn phí ship siêu hot 65', 'Mô tả chi tiết cho chương trình THANGCBB8565', 'all', 'new', '[\"rank_1\"]', 0, 3, 0, 200000, 40000, 124, 0, '2026-05-27 04:20:18', '2026-06-11 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620cb30', 'VIP44AD966', 'Chương trình giảm % siêu hot 66', 'Mô tả chi tiết cho chương trình VIP44AD966', 'chuoi_da', 'all', '[\"rank_1\"]', 1, 1, 14, 0, 90000, 108, 0, '2026-05-25 04:20:18', '2026-06-26 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620cc83', 'VIP22B9067', 'Chương trình miễn phí ship siêu hot 67', 'Mô tả chi tiết cho chương trình VIP22B9067', 'vat_pham', 'all', '[\"rank_1\"]', 0, 3, 0, 200000, 50000, 257, 0, '2026-05-14 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620ce81', 'NEWEB7B068', 'Chương trình giảm % siêu hot 68', 'Mô tả chi tiết cho chương trình NEWEB7B068', 'all', 'all', '[\"rank_1\"]', 1, 1, 7, 0, 70000, 187, 0, '2026-05-24 04:20:18', '2026-06-05 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620d006', 'VIP7DDF469', 'Chương trình tặng quà siêu hot 69', 'Mô tả chi tiết cho chương trình VIP7DDF469', 'all', 'all', '[\"rank_1\"]', 0, 4, 0, 100000, 0, -1, 0, '2026-05-26 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620d3ad', 'THANG840FA70', 'Chương trình giảm % siêu hot 70', 'Mô tả chi tiết cho chương trình THANG840FA70', 'chuoi_da', 'all', '[\"rank_1\"]', 0, 1, 34, 100000, 40000, 264, 0, '2026-06-03 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620d5d2', 'SALE778B271', 'Chương trình giảm tiền siêu hot 71', 'Mô tả chi tiết cho chương trình SALE778B271', 'vong_ngoc', 'all', '[\"rank_1\"]', 0, 2, 100000, 100000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620d7e5', 'CHAO51BA672', 'Chương trình miễn phí ship siêu hot 72', 'Mô tả chi tiết cho chương trình CHAO51BA672', 'chuoi_da', 'all', '[\"rank_1\"]', 0, 3, 0, 400000, 50000, 400, 0, '2026-05-22 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620da8e', 'VIP66D8573', 'Chương trình giảm % siêu hot 73', 'Mô tả chi tiết cho chương trình VIP66D8573', 'vat_pham', 'all', '[\"rank_1\"]', 0, 1, 11, 300000, 70000, -1, 0, '2026-05-31 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620dc7f', 'THANGD986C74', 'Chương trình giảm tiền siêu hot 74', 'Mô tả chi tiết cho chương trình THANGD986C74', 'vong_ngoc', 'all', '[\"rank_1\"]', 0, 2, 70000, 400000, 0, 376, 0, '2026-06-04 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620dde8', 'VIPAA60675', 'Chương trình giảm tiền siêu hot 75', 'Mô tả chi tiết cho chương trình VIPAA60675', 'vong_ngoc', 'all', '[\"rank_1\"]', 1, 2, 110000, 400000, 0, 77, 0, '2026-05-28 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620df56', 'NEWB916D76', 'Chương trình tặng quà siêu hot 76', 'Mô tả chi tiết cho chương trình NEWB916D76', 'vong_ngoc', 'all', '[\"rank_1\"]', 0, 4, 0, 300000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620e1db', 'NEW8DC0277', 'Chương trình giảm % siêu hot 77', 'Mô tả chi tiết cho chương trình NEW8DC0277', 'vat_pham', 'new', '[\"rank_1\"]', 0, 1, 26, 200000, 40000, -1, 0, '2026-05-23 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620e3be', 'CHAOED74A78', 'Chương trình giảm % siêu hot 78', 'Mô tả chi tiết cho chương trình CHAOED74A78', 'all', 'all', '[\"rank_1\"]', 0, 1, 47, 200000, 40000, -1, 0, '2026-05-31 04:20:18', '2026-06-09 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620e5ad', 'THANG6311279', 'Chương trình giảm % siêu hot 79', 'Mô tả chi tiết cho chương trình THANG6311279', 'chuoi_da', 'all', '[\"rank_1\"]', 1, 1, 22, 0, 80000, 307, 0, '2026-05-22 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620e776', 'NEWA4EFF80', 'Chương trình miễn phí ship siêu hot 80', 'Mô tả chi tiết cho chương trình NEWA4EFF80', 'vong_ngoc', 'all', '[\"rank_1\"]', 0, 3, 0, 200000, 20000, 191, 0, '2026-05-13 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620e94d', 'THANGF34C581', 'Chương trình giảm tiền siêu hot 81', 'Mô tả chi tiết cho chương trình THANGF34C581', 'chuoi_da', 'all', '[\"rank_1\"]', 1, 2, 170000, 400000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620eb4f', 'SALE0F06082', 'Chương trình giảm % siêu hot 82', 'Mô tả chi tiết cho chương trình SALE0F06082', 'vong_ngoc', 'new', '[\"rank_1\"]', 0, 1, 28, 500000, 50000, 261, 0, '2026-05-31 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620ecbf', 'LIXI3F2B183', 'Chương trình miễn phí ship siêu hot 83', 'Mô tả chi tiết cho chương trình LIXI3F2B183', 'chuoi_da', 'all', '[\"rank_1\"]', 1, 3, 0, 100000, 20000, -1, 0, '2026-05-23 04:20:18', '2026-06-15 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620ef00', 'SALE4F63F84', 'Chương trình miễn phí ship siêu hot 84', 'Mô tả chi tiết cho chương trình SALE4F63F84', 'all', 'all', '[\"rank_1\"]', 0, 3, 0, 100000, 40000, 185, 0, '2026-05-21 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620f0df', 'LIXI6271485', 'Chương trình tặng quà siêu hot 85', 'Mô tả chi tiết cho chương trình LIXI6271485', 'vong_ngoc', 'all', '[\"rank_1\"]', 0, 4, 0, 300000, 0, 177, 0, '2026-05-28 04:20:18', '2026-06-07 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620f304', 'VIP1FA6C86', 'Chương trình tặng quà siêu hot 86', 'Mô tả chi tiết cho chương trình VIP1FA6C86', 'vat_pham', 'new', '[\"rank_1\"]', 1, 4, 0, 300000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-25 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620f4da', 'THANG7D84787', 'Chương trình giảm tiền siêu hot 87', 'Mô tả chi tiết cho chương trình THANG7D84787', 'vong_ngoc', 'all', '[\"rank_1\"]', 0, 2, 170000, 300000, 0, 172, 0, '2026-05-28 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620f6b9', 'NEW9453488', 'Chương trình giảm tiền siêu hot 88', 'Mô tả chi tiết cho chương trình NEW9453488', 'all', 'all', '[\"rank_1\"]', 0, 2, 110000, 300000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620f880', 'NEW8BA8189', 'Chương trình giảm tiền siêu hot 89', 'Mô tả chi tiết cho chương trình NEW8BA8189', 'all', 'all', '[\"rank_1\"]', 0, 2, 100000, 100000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-06 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620fa4e', 'VIP808F390', 'Chương trình tặng quà siêu hot 90', 'Mô tả chi tiết cho chương trình VIP808F390', 'vat_pham', 'all', '[\"rank_1\"]', 0, 4, 0, 100000, 0, -1, 0, '2026-05-24 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620fc0d', 'LIXI31F8691', 'Chương trình giảm % siêu hot 91', 'Mô tả chi tiết cho chương trình LIXI31F8691', 'vat_pham', 'all', '[\"rank_2\"]', 1, 1, 39, 0, 100000, -1, 0, '2026-06-04 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620fdf7', 'CHAO2752F92', 'Chương trình giảm tiền siêu hot 92', 'Mô tả chi tiết cho chương trình CHAO2752F92', 'chuoi_da', 'all', '[\"rank_2\"]', 0, 2, 150000, 400000, 0, 206, 0, '2026-05-30 04:20:18', '2026-06-26 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec620ffb8', 'NEW8DDDC93', 'Chương trình giảm % siêu hot 93', 'Mô tả chi tiết cho chương trình NEW8DDDC93', 'chuoi_da', 'all', '[\"rank_2\"]', 0, 1, 30, 400000, 60000, -1, 0, '2026-05-02 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62101ae', 'SALE4073794', 'Chương trình tặng quà siêu hot 94', 'Mô tả chi tiết cho chương trình SALE4073794', 'chuoi_da', 'new', '[\"rank_2\"]', 1, 4, 0, 500000, 0, 334, 0, '2026-05-25 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6210308', 'SALE14C1E95', 'Chương trình miễn phí ship siêu hot 95', 'Mô tả chi tiết cho chương trình SALE14C1E95', 'vat_pham', 'all', '[\"rank_2\"]', 1, 3, 0, 0, 40000, 228, 0, '2026-06-06 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6210503', 'NEW8167E96', 'Chương trình tặng quà siêu hot 96', 'Mô tả chi tiết cho chương trình NEW8167E96', 'vat_pham', 'all', '[\"rank_2\"]', 1, 4, 0, 400000, 0, 406, 0, '2026-05-26 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62106da', 'CHAO074F597', 'Chương trình tặng quà siêu hot 97', 'Mô tả chi tiết cho chương trình CHAO074F597', 'chuoi_da', 'all', '[\"rank_2\"]', 1, 4, 0, 300000, 0, 211, 0, '2026-05-29 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6210914', 'THANG50DE098', 'Chương trình tặng quà siêu hot 98', 'Mô tả chi tiết cho chương trình THANG50DE098', 'vat_pham', 'all', '[\"rank_2\"]', 1, 4, 0, 100000, 0, 200, 0, '2026-05-29 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6210b17', 'LIXI95A8399', 'Chương trình tặng quà siêu hot 99', 'Mô tả chi tiết cho chương trình LIXI95A8399', 'vat_pham', 'all', '[\"rank_2\"]', 1, 4, 0, 300000, 0, -1, 0, '2026-05-08 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6210cfb', 'CHAOEC8FF100', 'Chương trình giảm % siêu hot 100', 'Mô tả chi tiết cho chương trình CHAOEC8FF100', 'vat_pham', 'all', '[\"rank_2\"]', 0, 1, 17, 200000, 40000, -1, 0, '2026-05-25 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6210efa', 'NEWB4F7F101', 'Chương trình miễn phí ship siêu hot 101', 'Mô tả chi tiết cho chương trình NEWB4F7F101', 'chuoi_da', 'new', '[\"rank_2\"]', 1, 3, 0, 400000, 30000, 368, 0, '2026-05-22 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62110d0', 'NEWE402E102', 'Chương trình miễn phí ship siêu hot 102', 'Mô tả chi tiết cho chương trình NEWE402E102', 'vat_pham', 'all', '[\"rank_2\"]', 0, 3, 0, 500000, 50000, 251, 0, '2026-05-23 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62112d6', 'NEW39F80103', 'Chương trình tặng quà siêu hot 103', 'Mô tả chi tiết cho chương trình NEW39F80103', 'chuoi_da', 'all', '[\"rank_2\"]', 0, 4, 0, 500000, 0, 11, 0, '2026-05-28 04:20:18', '2026-06-11 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6211594', 'SALE924F9104', 'Chương trình tặng quà siêu hot 104', 'Mô tả chi tiết cho chương trình SALE924F9104', 'vat_pham', 'new', '[\"rank_2\"]', 1, 4, 0, 100000, 0, -1, 0, '2026-05-22 04:20:18', '2026-06-11 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6211704', 'THANG12F9A105', 'Chương trình giảm % siêu hot 105', 'Mô tả chi tiết cho chương trình THANG12F9A105', 'all', 'all', '[\"rank_2\"]', 0, 1, 14, 400000, 20000, -1, 0, '2026-05-22 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62118ed', 'CHAO6900C106', 'Chương trình giảm % siêu hot 106', 'Mô tả chi tiết cho chương trình CHAO6900C106', 'all', 'new', '[\"rank_2\"]', 0, 1, 33, 100000, 90000, -1, 0, '2026-05-23 04:20:18', '2026-06-07 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6211abc', 'SALE3B3AB107', 'Chương trình tặng quà siêu hot 107', 'Mô tả chi tiết cho chương trình SALE3B3AB107', 'vong_ngoc', 'new', '[\"rank_2\"]', 0, 4, 0, 0, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-20 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6211ca1', 'NEW26360108', 'Chương trình miễn phí ship siêu hot 108', 'Mô tả chi tiết cho chương trình NEW26360108', 'all', 'all', '[\"rank_2\"]', 1, 3, 0, 500000, 20000, -1, 0, '2026-05-26 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6211e6f', 'LIXI03E5A109', 'Chương trình miễn phí ship siêu hot 109', 'Mô tả chi tiết cho chương trình LIXI03E5A109', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 3, 0, 100000, 20000, 103, 0, '2026-05-29 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62120b4', 'VIPE2F79110', 'Chương trình giảm tiền siêu hot 110', 'Mô tả chi tiết cho chương trình VIPE2F79110', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 2, 160000, 300000, 0, 174, 0, '2026-05-29 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62122aa', 'VIP0223B111', 'Chương trình miễn phí ship siêu hot 111', 'Mô tả chi tiết cho chương trình VIP0223B111', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 3, 0, 400000, 30000, -1, 0, '2026-05-28 04:20:18', '2026-06-09 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6212473', 'LIXI7C9BF112', 'Chương trình tặng quà siêu hot 112', 'Mô tả chi tiết cho chương trình LIXI7C9BF112', 'all', 'new', '[\"rank_2\"]', 1, 4, 0, 100000, 0, 124, 0, '2026-05-30 04:20:18', '2026-06-22 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6212631', 'NEW64398113', 'Chương trình giảm % siêu hot 113', 'Mô tả chi tiết cho chương trình NEW64398113', 'vat_pham', 'all', '[\"rank_2\"]', 1, 1, 42, 300000, 30000, 441, 0, '2026-06-03 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6212809', 'LIXI629ED114', 'Chương trình giảm % siêu hot 114', 'Mô tả chi tiết cho chương trình LIXI629ED114', 'vat_pham', 'all', '[\"rank_2\"]', 1, 1, 39, 300000, 60000, 260, 0, '2026-05-18 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62129ee', 'SALE18301115', 'Chương trình giảm tiền siêu hot 115', 'Mô tả chi tiết cho chương trình SALE18301115', 'all', 'all', '[\"rank_2\"]', 0, 2, 120000, 0, 0, -1, 0, '2026-05-24 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6212be6', 'SALE80FCF116', 'Chương trình giảm % siêu hot 116', 'Mô tả chi tiết cho chương trình SALE80FCF116', 'all', 'all', '[\"rank_2\"]', 0, 1, 47, 100000, 40000, -1, 0, '2026-05-31 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6212de5', 'NEWAC874117', 'Chương trình giảm tiền siêu hot 117', 'Mô tả chi tiết cho chương trình NEWAC874117', 'vat_pham', 'all', '[\"rank_2\"]', 1, 2, 40000, 100000, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6212fa0', 'CHAO631A3118', 'Chương trình giảm tiền siêu hot 118', 'Mô tả chi tiết cho chương trình CHAO631A3118', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 2, 200000, 400000, 0, 204, 0, '2026-05-09 04:20:18', '2026-05-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621317e', 'SALED4091119', 'Chương trình giảm tiền siêu hot 119', 'Mô tả chi tiết cho chương trình SALED4091119', 'chuoi_da', 'new', '[\"rank_2\"]', 0, 2, 80000, 0, 0, -1, 0, '2026-05-29 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6213364', 'NEW6EEE8120', 'Chương trình giảm tiền siêu hot 120', 'Mô tả chi tiết cho chương trình NEW6EEE8120', 'vat_pham', 'all', '[\"rank_2\"]', 0, 2, 200000, 500000, 0, 23, 0, '2026-05-27 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6213527', 'LIXIB3AFB121', 'Chương trình miễn phí ship siêu hot 121', 'Mô tả chi tiết cho chương trình LIXIB3AFB121', 'vat_pham', 'all', '[\"rank_2\"]', 0, 3, 0, 300000, 50000, -1, 0, '2026-05-26 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62136f8', 'THANG43966122', 'Chương trình tặng quà siêu hot 122', 'Mô tả chi tiết cho chương trình THANG43966122', 'chuoi_da', 'all', '[\"rank_2\"]', 1, 4, 0, 400000, 0, 44, 0, '2026-05-22 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62138fa', 'CHAOC6DB1123', 'Chương trình tặng quà siêu hot 123', 'Mô tả chi tiết cho chương trình CHAOC6DB1123', 'vat_pham', 'all', '[\"rank_2\"]', 1, 4, 0, 400000, 0, -1, 0, '2026-05-28 04:20:18', '2026-06-15 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6213ae9', 'CHAO2850C124', 'Chương trình miễn phí ship siêu hot 124', 'Mô tả chi tiết cho chương trình CHAO2850C124', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 3, 0, 100000, 20000, 11, 0, '2026-05-31 04:20:18', '2026-06-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6213d04', 'SALE3D3DF125', 'Chương trình tặng quà siêu hot 125', 'Mô tả chi tiết cho chương trình SALE3D3DF125', 'all', 'new', '[\"rank_2\"]', 0, 4, 0, 300000, 0, 443, 0, '2026-05-31 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6213e65', 'LIXIEF4B7126', 'Chương trình giảm % siêu hot 126', 'Mô tả chi tiết cho chương trình LIXIEF4B7126', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 1, 28, 500000, 30000, 130, 0, '2026-05-23 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214054', 'THANGD16DE127', 'Chương trình giảm tiền siêu hot 127', 'Mô tả chi tiết cho chương trình THANGD16DE127', 'vat_pham', 'new', '[\"rank_2\"]', 1, 2, 30000, 500000, 0, -1, 0, '2026-05-08 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62141c3', 'CHAO7E5DF128', 'Chương trình miễn phí ship siêu hot 128', 'Mô tả chi tiết cho chương trình CHAO7E5DF128', 'chuoi_da', 'all', '[\"rank_2\"]', 1, 3, 0, 100000, 40000, -1, 0, '2026-05-22 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214301', 'SALE00F4F129', 'Chương trình giảm tiền siêu hot 129', 'Mô tả chi tiết cho chương trình SALE00F4F129', 'vong_ngoc', 'all', '[\"rank_2\"]', 1, 2, 190000, 500000, 0, 45, 0, '2026-05-29 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214470', 'NEW7DDB0130', 'Chương trình giảm tiền siêu hot 130', 'Mô tả chi tiết cho chương trình NEW7DDB0130', 'chuoi_da', 'all', '[\"rank_2\"]', 0, 2, 20000, 100000, 0, -1, 0, '2026-05-30 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62145e7', 'NEWD6349131', 'Chương trình giảm % siêu hot 131', 'Mô tả chi tiết cho chương trình NEWD6349131', 'vong_ngoc', 'all', '[\"rank_3\"]', 1, 1, 29, 0, 40000, 248, 0, '2026-05-27 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214742', 'THANG3606D132', 'Chương trình giảm % siêu hot 132', 'Mô tả chi tiết cho chương trình THANG3606D132', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 1, 44, 100000, 70000, -1, 0, '2026-05-26 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621488f', 'SALEA10D8133', 'Chương trình miễn phí ship siêu hot 133', 'Mô tả chi tiết cho chương trình SALEA10D8133', 'vat_pham', 'all', '[\"rank_3\"]', 1, 3, 0, 400000, 20000, 287, 0, '2026-05-23 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62149e1', 'NEWAB903134', 'Chương trình miễn phí ship siêu hot 134', 'Mô tả chi tiết cho chương trình NEWAB903134', 'chuoi_da', 'all', '[\"rank_3\"]', 1, 3, 0, 300000, 40000, 185, 0, '2026-05-09 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214b22', 'NEW85722135', 'Chương trình giảm % siêu hot 135', 'Mô tả chi tiết cho chương trình NEW85722135', 'chuoi_da', 'all', '[\"rank_3\"]', 1, 1, 41, 500000, 20000, -1, 0, '2026-05-29 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214c8a', 'LIXI51DEA136', 'Chương trình tặng quà siêu hot 136', 'Mô tả chi tiết cho chương trình LIXI51DEA136', 'chuoi_da', 'new', '[\"rank_3\"]', 0, 4, 0, 500000, 0, -1, 0, '2026-05-25 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214dfb', 'CHAOFCDE0137', 'Chương trình miễn phí ship siêu hot 137', 'Mô tả chi tiết cho chương trình CHAOFCDE0137', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 3, 0, 200000, 30000, 201, 0, '2026-05-27 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6214f65', 'THANG522E1138', 'Chương trình giảm % siêu hot 138', 'Mô tả chi tiết cho chương trình THANG522E1138', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 1, 20, 500000, 100000, 100, 0, '2026-05-31 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62150ba', 'CHAO8531A139', 'Chương trình miễn phí ship siêu hot 139', 'Mô tả chi tiết cho chương trình CHAO8531A139', 'all', 'all', '[\"rank_3\"]', 0, 3, 0, 500000, 50000, -1, 0, '2026-05-24 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215207', 'CHAO111B1140', 'Chương trình miễn phí ship siêu hot 140', 'Mô tả chi tiết cho chương trình CHAO111B1140', 'all', 'all', '[\"rank_3\"]', 0, 3, 0, 0, 50000, 285, 0, '2026-05-27 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621533c', 'THANG226D2141', 'Chương trình giảm tiền siêu hot 141', 'Mô tả chi tiết cho chương trình THANG226D2141', 'vong_ngoc', 'new', '[\"rank_3\"]', 1, 2, 90000, 300000, 0, 67, 0, '2026-05-24 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621548d', 'VIPE7748142', 'Chương trình giảm tiền siêu hot 142', 'Mô tả chi tiết cho chương trình VIPE7748142', 'vat_pham', 'all', '[\"rank_3\"]', 0, 2, 200000, 400000, 0, -1, 0, '2026-05-23 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62155ff', 'NEWF1B95143', 'Chương trình giảm % siêu hot 143', 'Mô tả chi tiết cho chương trình NEWF1B95143', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 1, 9, 400000, 90000, -1, 0, '2026-05-27 04:20:18', '2026-06-13 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215785', 'VIPEC2F5144', 'Chương trình miễn phí ship siêu hot 144', 'Mô tả chi tiết cho chương trình VIPEC2F5144', 'chuoi_da', 'all', '[\"rank_3\"]', 1, 3, 0, 0, 20000, 95, 0, '2026-05-23 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62158f1', 'NEW5420F145', 'Chương trình miễn phí ship siêu hot 145', 'Mô tả chi tiết cho chương trình NEW5420F145', 'chuoi_da', 'all', '[\"rank_3\"]', 1, 3, 0, 0, 40000, 410, 0, '2026-05-23 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215a49', 'VIPE7230146', 'Chương trình giảm % siêu hot 146', 'Mô tả chi tiết cho chương trình VIPE7230146', 'vong_ngoc', 'all', '[\"rank_3\"]', 1, 1, 34, 200000, 40000, 412, 0, '2026-05-25 04:20:18', '2026-06-09 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215b91', 'CHAO7DF13147', 'Chương trình giảm % siêu hot 147', 'Mô tả chi tiết cho chương trình CHAO7DF13147', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 1, 41, 400000, 100000, -1, 0, '2026-05-12 04:20:18', '2026-05-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215ce8', 'NEWE0F8C148', 'Chương trình giảm % siêu hot 148', 'Mô tả chi tiết cho chương trình NEWE0F8C148', 'vat_pham', 'all', '[\"rank_3\"]', 1, 1, 42, 100000, 100000, -1, 0, '2026-05-31 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215e70', 'CHAOBD385149', 'Chương trình tặng quà siêu hot 149', 'Mô tả chi tiết cho chương trình CHAOBD385149', 'chuoi_da', 'all', '[\"rank_3\"]', 1, 4, 0, 500000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6215ff5', 'SALED52D8150', 'Chương trình tặng quà siêu hot 150', 'Mô tả chi tiết cho chương trình SALED52D8150', 'all', 'all', '[\"rank_3\"]', 1, 4, 0, 0, 0, 450, 0, '2026-05-31 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6216160', 'CHAO1B628151', 'Chương trình tặng quà siêu hot 151', 'Mô tả chi tiết cho chương trình CHAO1B628151', 'all', 'all', '[\"rank_3\"]', 0, 4, 0, 400000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62162ad', 'SALEACD5B152', 'Chương trình giảm tiền siêu hot 152', 'Mô tả chi tiết cho chương trình SALEACD5B152', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 2, 120000, 500000, 0, 486, 0, '2026-05-23 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62163fb', 'LIXI07ED7153', 'Chương trình tặng quà siêu hot 153', 'Mô tả chi tiết cho chương trình LIXI07ED7153', 'vong_ngoc', 'all', '[\"rank_3\"]', 1, 4, 0, 100000, 0, 433, 0, '2026-05-28 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621655a', 'VIP09703154', 'Chương trình miễn phí ship siêu hot 154', 'Mô tả chi tiết cho chương trình VIP09703154', 'vat_pham', 'all', '[\"rank_3\"]', 1, 3, 0, 0, 40000, -1, 0, '2026-05-23 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62166b5', 'LIXI1F7D5155', 'Chương trình miễn phí ship siêu hot 155', 'Mô tả chi tiết cho chương trình LIXI1F7D5155', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 3, 0, 200000, 30000, 287, 0, '2026-05-22 04:20:18', '2026-06-03 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621680a', 'CHAO9514F156', 'Chương trình tặng quà siêu hot 156', 'Mô tả chi tiết cho chương trình CHAO9514F156', 'vat_pham', 'new', '[\"rank_3\"]', 1, 4, 0, 0, 0, -1, 0, '2026-05-16 04:20:18', '2026-05-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6216952', 'CHAOCF322157', 'Chương trình giảm % siêu hot 157', 'Mô tả chi tiết cho chương trình CHAOCF322157', 'chuoi_da', 'all', '[\"rank_3\"]', 1, 1, 25, 300000, 100000, -1, 0, '2026-05-28 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6216a93', 'LIXIEAF46158', 'Chương trình tặng quà siêu hot 158', 'Mô tả chi tiết cho chương trình LIXIEAF46158', 'vong_ngoc', 'all', '[\"rank_3\"]', 1, 4, 0, 200000, 0, -1, 0, '2026-05-04 04:20:18', '2026-05-31 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6216bf4', 'CHAOF178A159', 'Chương trình miễn phí ship siêu hot 159', 'Mô tả chi tiết cho chương trình CHAOF178A159', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 3, 0, 0, 50000, 397, 0, '2026-05-31 04:20:18', '2026-06-21 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6216d4a', 'LIXI9B42B160', 'Chương trình miễn phí ship siêu hot 160', 'Mô tả chi tiết cho chương trình LIXI9B42B160', 'vong_ngoc', 'all', '[\"rank_3\"]', 0, 3, 0, 400000, 20000, -1, 0, '2026-05-30 04:20:18', '2026-06-29 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6216e9b', 'VIPCD4FF161', 'Chương trình giảm % siêu hot 161', 'Mô tả chi tiết cho chương trình VIPCD4FF161', 'vong_ngoc', 'all', '[\"rank_3\"]', 1, 1, 32, 200000, 70000, -1, 0, '2026-05-30 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217021', 'NEWC1067162', 'Chương trình miễn phí ship siêu hot 162', 'Mô tả chi tiết cho chương trình NEWC1067162', 'vat_pham', 'all', '[\"rank_3\"]', 1, 3, 0, 500000, 40000, 316, 0, '2026-05-26 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217171', 'LIXI27679163', 'Chương trình tặng quà siêu hot 163', 'Mô tả chi tiết cho chương trình LIXI27679163', 'vong_ngoc', 'all', '[\"rank_3\"]', 0, 4, 0, 200000, 0, -1, 0, '2026-05-07 04:20:18', '2026-05-27 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62172b8', 'NEW4A469164', 'Chương trình miễn phí ship siêu hot 164', 'Mô tả chi tiết cho chương trình NEW4A469164', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 3, 0, 100000, 30000, -1, 0, '2026-06-04 04:20:18', '2026-06-28 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62173fc', 'LIXI29013165', 'Chương trình giảm tiền siêu hot 165', 'Mô tả chi tiết cho chương trình LIXI29013165', 'vong_ngoc', 'all', '[\"rank_3\"]', 0, 2, 90000, 0, 0, 160, 0, '2026-05-23 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217543', 'SALE09159166', 'Chương trình giảm tiền siêu hot 166', 'Mô tả chi tiết cho chương trình SALE09159166', 'vong_ngoc', 'all', '[\"rank_3\"]', 1, 2, 50000, 500000, 0, 107, 0, '2026-05-29 04:20:18', '2026-06-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62176da', 'CHAO25134167', 'Chương trình miễn phí ship siêu hot 167', 'Mô tả chi tiết cho chương trình CHAO25134167', 'all', 'all', '[\"rank_3\"]', 0, 3, 0, 500000, 50000, -1, 0, '2026-05-29 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621784e', 'SALE91E32168', 'Chương trình giảm % siêu hot 168', 'Mô tả chi tiết cho chương trình SALE91E32168', 'all', 'new', '[\"rank_3\"]', 0, 1, 38, 300000, 30000, 15, 0, '2026-05-26 04:20:18', '2026-06-25 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217995', 'LIXIC7630169', 'Chương trình giảm % siêu hot 169', 'Mô tả chi tiết cho chương trình LIXIC7630169', 'chuoi_da', 'all', '[\"rank_3\"]', 0, 1, 6, 0, 90000, 429, 0, '2026-05-26 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217ade', 'THANG5FA0E170', 'Chương trình miễn phí ship siêu hot 170', 'Mô tả chi tiết cho chương trình THANG5FA0E170', 'all', 'all', '[\"rank_3\"]', 0, 3, 0, 300000, 30000, 472, 0, '2026-05-30 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217c60', 'CHAO0E4F4171', 'Chương trình giảm tiền siêu hot 171', 'Mô tả chi tiết cho chương trình CHAO0E4F4171', 'chuoi_da', 'all', '[\"rank_4\"]', 1, 2, 100000, 300000, 0, 123, 0, '2026-05-29 04:20:18', '2026-06-20 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217e65', 'VIP8D4F1172', 'Chương trình giảm tiền siêu hot 172', 'Mô tả chi tiết cho chương trình VIP8D4F1172', 'vat_pham', 'all', '[\"rank_4\"]', 1, 2, 110000, 200000, 0, 385, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6217f9e', 'LIXI25847173', 'Chương trình miễn phí ship siêu hot 173', 'Mô tả chi tiết cho chương trình LIXI25847173', 'vat_pham', 'new', '[\"rank_4\"]', 0, 3, 0, 300000, 40000, 224, 0, '2026-05-25 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1);
INSERT INTO `voucher` (`id`, `ma_voucher`, `ten_chuong_trinh`, `mo_ta`, `pham_vi_san_pham`, `doi_tuong`, `hang_thanh_vien`, `is_combine`, `loai_giam`, `gia_tri`, `don_toi_thieu`, `giam_toi_da`, `so_luong`, `da_dung`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `ngay_tao`, `ngay_cap_nhat`, `gioi_han_moi_user`) VALUES
('vc_seed_6a1cec62180d6', 'NEWECBC2174', 'Chương trình giảm tiền siêu hot 174', 'Mô tả chi tiết cho chương trình NEWECBC2174', 'vat_pham', 'new', '[\"rank_4\"]', 1, 2, 140000, 0, 0, 155, 0, '2026-05-27 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6218223', 'VIP3B570175', 'Chương trình tặng quà siêu hot 175', 'Mô tả chi tiết cho chương trình VIP3B570175', 'vat_pham', 'all', '[\"rank_4\"]', 1, 4, 0, 0, 0, -1, 0, '2026-05-27 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621839c', 'THANG4C022176', 'Chương trình giảm % siêu hot 176', 'Mô tả chi tiết cho chương trình THANG4C022176', 'all', 'all', '[\"rank_4\"]', 0, 1, 20, 300000, 70000, 479, 0, '2026-05-31 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62184eb', 'SALECEA69177', 'Chương trình tặng quà siêu hot 177', 'Mô tả chi tiết cho chương trình SALECEA69177', 'chuoi_da', 'all', '[\"rank_4\"]', 1, 4, 0, 500000, 0, -1, 0, '2026-05-05 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6218635', 'LIXIC2F72178', 'Chương trình giảm tiền siêu hot 178', 'Mô tả chi tiết cho chương trình LIXIC2F72178', 'vat_pham', 'all', '[\"rank_4\"]', 1, 2, 60000, 200000, 0, 313, 0, '2026-06-03 04:20:18', '2026-06-12 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6218782', 'NEW35093179', 'Chương trình giảm tiền siêu hot 179', 'Mô tả chi tiết cho chương trình NEW35093179', 'vong_ngoc', 'all', '[\"rank_4\"]', 1, 2, 20000, 500000, 0, -1, 0, '2026-05-26 04:20:18', '2026-07-01 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62188c6', 'NEW92369180', 'Chương trình miễn phí ship siêu hot 180', 'Mô tả chi tiết cho chương trình NEW92369180', 'vat_pham', 'new', '[\"rank_4\"]', 0, 3, 0, 400000, 50000, -1, 0, '2026-05-31 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6218a20', 'CHAO857BB181', 'Chương trình tặng quà siêu hot 181', 'Mô tả chi tiết cho chương trình CHAO857BB181', 'chuoi_da', 'new', '[\"rank_4\"]', 0, 4, 0, 100000, 0, -1, 0, '2026-05-04 04:20:18', '2026-05-30 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6218d9f', 'VIPFAB47182', 'Chương trình giảm tiền siêu hot 182', 'Mô tả chi tiết cho chương trình VIPFAB47182', 'vong_ngoc', 'new', '[\"rank_4\"]', 0, 2, 160000, 500000, 0, 88, 0, '2026-05-28 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec62190ff', 'NEWD0BBE183', 'Chương trình miễn phí ship siêu hot 183', 'Mô tả chi tiết cho chương trình NEWD0BBE183', 'vong_ngoc', 'new', '[\"rank_4\"]', 1, 3, 0, 500000, 30000, 395, 0, '2026-05-28 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621942f', 'VIP5DEC8184', 'Chương trình miễn phí ship siêu hot 184', 'Mô tả chi tiết cho chương trình VIP5DEC8184', 'all', 'all', '[\"rank_4\"]', 1, 3, 0, 500000, 50000, 16, 0, '2026-05-23 04:20:18', '2026-06-17 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6219768', 'VIPCA366185', 'Chương trình giảm tiền siêu hot 185', 'Mô tả chi tiết cho chương trình VIPCA366185', 'all', 'all', '[\"rank_4\"]', 0, 2, 200000, 100000, 0, 362, 0, '2026-05-31 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6219aa8', 'LIXI4F085186', 'Chương trình tặng quà siêu hot 186', 'Mô tả chi tiết cho chương trình LIXI4F085186', 'vong_ngoc', 'all', '[\"rank_4\"]', 0, 4, 0, 300000, 0, 371, 0, '2026-05-30 04:20:18', '2026-06-14 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec6219dd0', 'CHAO1C368187', 'Chương trình giảm % siêu hot 187', 'Mô tả chi tiết cho chương trình CHAO1C368187', 'all', 'all', '[\"rank_4\"]', 1, 1, 24, 200000, 60000, 215, 0, '2026-05-30 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621a138', 'SALE02671188', 'Chương trình tặng quà siêu hot 188', 'Mô tả chi tiết cho chương trình SALE02671188', 'vong_ngoc', 'new', '[\"rank_4\"]', 0, 4, 0, 100000, 0, 134, 0, '2026-05-22 04:20:18', '2026-06-22 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621a49e', 'SALEE7368189', 'Chương trình giảm tiền siêu hot 189', 'Mô tả chi tiết cho chương trình SALEE7368189', 'all', 'all', '[\"rank_4\"]', 1, 2, 70000, 500000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621a7c1', 'LIXI8C7E6190', 'Chương trình giảm tiền siêu hot 190', 'Mô tả chi tiết cho chương trình LIXI8C7E6190', 'vat_pham', 'all', '[\"rank_4\"]', 1, 2, 200000, 500000, 0, 104, 0, '2026-05-23 04:20:18', '2026-06-26 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621ab53', 'CHAO201D2191', 'Chương trình miễn phí ship siêu hot 191', 'Mô tả chi tiết cho chương trình CHAO201D2191', 'all', 'new', '[\"rank_4\"]', 0, 3, 0, 200000, 50000, -1, 0, '2026-05-29 04:20:18', '2026-06-08 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621aecb', 'LIXIEA23E192', 'Chương trình giảm % siêu hot 192', 'Mô tả chi tiết cho chương trình LIXIEA23E192', 'vat_pham', 'all', '[\"rank_4\"]', 1, 1, 47, 300000, 20000, -1, 0, '2026-05-23 04:20:18', '2026-06-04 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621b23b', 'VIPBB5C0193', 'Chương trình giảm tiền siêu hot 193', 'Mô tả chi tiết cho chương trình VIPBB5C0193', 'vat_pham', 'all', '[\"rank_4\"]', 1, 2, 200000, 300000, 0, 33, 0, '2026-05-28 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621b555', 'LIXIBE7F1194', 'Chương trình giảm tiền siêu hot 194', 'Mô tả chi tiết cho chương trình LIXIBE7F1194', 'chuoi_da', 'all', '[\"rank_4\"]', 0, 2, 130000, 100000, 0, 435, 0, '2026-05-11 04:20:18', '2026-05-29 04:20:18', 0, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621b88f', 'VIP23EB2195', 'Chương trình tặng quà siêu hot 195', 'Mô tả chi tiết cho chương trình VIP23EB2195', 'vat_pham', 'new', '[\"rank_4\"]', 0, 4, 0, 500000, 0, -1, 0, '2026-05-29 04:20:18', '2026-06-19 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621b9f6', 'LIXID020F196', 'Chương trình tặng quà siêu hot 196', 'Mô tả chi tiết cho chương trình LIXID020F196', 'vat_pham', 'all', '[\"rank_4\"]', 1, 4, 0, 100000, 0, 165, 0, '2026-05-22 04:20:18', '2026-06-16 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621bb29', 'CHAO24673197', 'Chương trình tặng quà siêu hot 197', 'Mô tả chi tiết cho chương trình CHAO24673197', 'vat_pham', 'all', '[\"rank_4\"]', 0, 4, 0, 400000, 0, 131, 0, '2026-05-29 04:20:18', '2026-06-02 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621bc6e', 'VIPABE26198', 'Chương trình miễn phí ship siêu hot 198', 'Mô tả chi tiết cho chương trình VIPABE26198', 'vong_ngoc', 'all', '[\"rank_4\"]', 1, 3, 0, 100000, 40000, 172, 0, '2026-05-31 04:20:18', '2026-06-18 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621bdd7', 'LIXI7C369199', 'Chương trình tặng quà siêu hot 199', 'Mô tả chi tiết cho chương trình LIXI7C369199', 'vong_ngoc', 'new', '[\"rank_4\"]', 0, 4, 0, 200000, 0, -1, 0, '2026-05-31 04:20:18', '2026-06-10 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1),
('vc_seed_6a1cec621bf28', 'LIXI182DF200', 'Chương trình tặng quà siêu hot 200', 'Mô tả chi tiết cho chương trình LIXI182DF200', 'vong_ngoc', 'all', '[\"rank_4\"]', 0, 4, 0, 500000, 0, 211, 0, '2026-05-25 04:20:18', '2026-06-24 04:20:18', 1, '2026-06-01 09:20:18', '2026-06-03 12:45:21', 1);

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
-- Chỉ mục cho bảng `binh_luan_bai_viet`
--
ALTER TABLE `binh_luan_bai_viet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bl_bv` (`id_bai_viet`),
  ADD KEY `fk_bl_nd` (`id_nguoi_dung`),
  ADD KEY `fk_bl_ph` (`id_phan_hoi`);

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
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_variant` (`id_nguoi_dung`,`id_san_pham`,`id_bien_the`),
  ADD KEY `fk_gh_sanpham` (`id_san_pham`),
  ADD KEY `fk_gh_bienthe` (`id_bien_the`);

--
-- Chỉ mục cho bảng `hang_thanh_vien`
--
ALTER TABLE `hang_thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ket_qua_ban_menh`
--
ALTER TABLE `ket_qua_ban_menh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_ket_qua` (`slug_ket_qua`),
  ADD KEY `idx_kqbm_user` (`id_nguoi_dung`);

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
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `so_dia_chi`
--
ALTER TABLE `so_dia_chi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoi_dung` (`id_nguoi_dung`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
-- Các ràng buộc cho bảng `binh_luan_bai_viet`
--
ALTER TABLE `binh_luan_bai_viet`
  ADD CONSTRAINT `fk_bl_bv` FOREIGN KEY (`id_bai_viet`) REFERENCES `bai_viet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bl_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_bl_ph` FOREIGN KEY (`id_phan_hoi`) REFERENCES `binh_luan_bai_viet` (`id`) ON DELETE CASCADE;

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
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_gh_bienthe` FOREIGN KEY (`id_bien_the`) REFERENCES `san_pham_bien_the` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_gh_nguoidung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_gh_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ket_qua_ban_menh`
--
ALTER TABLE `ket_qua_ban_menh`
  ADD CONSTRAINT `fk_kqbm_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL;

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
-- Các ràng buộc cho bảng `so_dia_chi`
--
ALTER TABLE `so_dia_chi`
  ADD CONSTRAINT `fk_so_dia_chi_nguoi_dung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
