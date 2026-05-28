SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE `san_pham_hinh_anh`;
TRUNCATE TABLE `san_pham_bien_the`;
TRUNCATE TABLE `danh_gia`;
TRUNCATE TABLE `san_pham`;
TRUNCATE TABLE `danh_muc`;
TRUNCATE TABLE `loai_da`;
TRUNCATE TABLE `menh_phong_thuy`;

INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `trang_thai`) VALUES ('menh_kim', 'Mệnh Kim', 'menh-kim', 1);
INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `trang_thai`) VALUES ('menh_moc', 'Mệnh Mộc', 'menh-moc', 1);
INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `trang_thai`) VALUES ('menh_thuy', 'Mệnh Thủy', 'menh-thuy', 1);
INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `trang_thai`) VALUES ('menh_hoa', 'Mệnh Hỏa', 'menh-hoa', 1);
INSERT INTO `menh_phong_thuy` (`id`, `ten_menh`, `slug`, `trang_thai`) VALUES ('menh_tho', 'Mệnh Thổ', 'menh-tho', 1);

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `slug`, `trang_thai`, `thu_tu`, `vi_tri`, `da_xoa`) VALUES ('cat_bot', 'Bột Xông Nhà', 'bot-xong-nha', 1, 1, 'Menu chính', 0);
INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `slug`, `trang_thai`, `thu_tu`, `vi_tri`, `da_xoa`) VALUES ('cat_tranghat', 'Tràng Hạt', 'trang-hat', 1, 2, 'Menu chính', 0);
INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `slug`, `trang_thai`, `thu_tu`, `vi_tri`, `da_xoa`) VALUES ('cat_tramhuong', 'Trầm Hương và Nhang', 'tram-huong-va-nhang', 1, 3, 'Menu chính', 0);
INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `slug`, `trang_thai`, `thu_tu`, `vi_tri`, `da_xoa`) VALUES ('cat_vongngoc', 'Vòng Ngọc', 'vong-ngoc', 1, 4, 'Menu chính', 0);

INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_mucduc', 'Ngọc Mực Dục', 'ngoc-muc-duc', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_manao', 'Mã Não', 'ma-nao', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_hoadien', 'Ngọc Hòa Điền', 'ngoc-hoa-dien', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_liuninh', 'Ngọc Liu Ninh', 'ngoc-liu-ninh', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_sanho', 'San Hô', 'san-ho', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_tunham', 'Ngọc Tụ Nham', 'ngoc-tu-nham', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_langdong', 'Ngọc Lăng Đông', 'ngoc-lang-dong', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_anhdao', 'Hồng Anh Đào', 'hong-anh-dao', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_tramhuong', 'Trầm Hương', 'tram-huong', 1, 0);
INSERT INTO `loai_da` (`id`, `ten_loai_da`, `slug`, `trang_thai`, `da_xoa`) VALUES ('stone_tunhien', 'Đá Tự Nhiên', 'da-tu-nhien', 1, 0);

INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_001', 'SP0001', 'Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'san-pham-bot-xong-nha-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_bot', 'stone_tunhien', 'menh_tho', 420000, 1020000, NULL, 'Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Bot Xong Nha Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_002', 'SP0002', 'Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'chuoi-ngoc-muc-duc-a-mix-lu-thong-binh-an-ngoc-bich-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_mucduc', 'menh_moc', 210000, 810000, NULL, 'Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Mực Dục tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Mực Dục 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Xanh Lục Đậm, Đen Nhạt</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay ngọc mực dục, ngọc tự nhiên, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_003', 'SP0003', 'Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ma-nao-mat-meo-mup-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_manao', 'menh_tho', 1050000, 1350000, 1200000, 'Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Mật Mèo Mụp Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_004', 'SP0004', 'Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ngoc-hoa-dien-mau-nha-nhan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_hoadien', 'menh_moc', 1120000, 1520000, NULL, 'Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Hòa Điền Màu Nhã Nhặn Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_005', 'SP0005', 'Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ngoc-hoa-dien-tan-cuong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_hoadien', 'menh_thuy', 910000, 1410000, 1360000, 'Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Hòa Điền Tân Cương Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_006', 'SP0006', 'Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ngoc-liu-ninh-thien-thanh-dong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_liuninh', 'menh_tho', 910000, 1510000, 1460000, 'Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Liu Ninh tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Liu Ninh Thiên Thanh Đông Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Liu Ninh 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Xanh Rêu, Xanh Thanh</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc liu ninh, vòng ngọc tự nhiên, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_007', 'SP0007', 'Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-trang-hat-ngoc-hoa-dien-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_hoadien', 'menh_kim', 1050000, 1350000, 1300000, 'Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Hòa Điền tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Tràng Hạt Ngọc Hòa Điền Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Hòa Điền 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Trắng Sứ, Xanh Nhạt</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc hòa điền, hetian jade, trang sức ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_008', 'SP0008', 'Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-trang-san-ho-niem-phat-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_sanho', 'menh_thuy', 560000, 960000, NULL, 'Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu San Hô tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Tràng San Hô Niệm Phật Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> San Hô 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Đỏ, Trắng</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay san hô, san hô đỏ, trang sức biển, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_009', 'SP0009', 'Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-thoi-trang-xinh-yeu-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_tunhien', 'menh_kim', 770000, 1170000, NULL, 'Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Thời Trang Xinh Yêu Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_010', 'SP0010', 'Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-da-ma-nao-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tranghat', 'stone_manao', 'menh_moc', 700000, 1200000, NULL, 'Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Đá Mã Não Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_011', 'SP0011', 'Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'san-pham-nhang-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tramhuong', 'stone_tunhien', 'menh_moc', 1120000, 1520000, NULL, 'Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Nhang Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_012', 'SP0012', 'Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'san-pham-tram-huong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_tramhuong', 'stone_tunhien', 'menh_moc', 490000, 790000, NULL, 'Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Sản Phẩm Tram Huong Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_013', 'SP0013', 'Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-hong-anh-dao-ngoc-nuong-tu-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_anhdao', 'menh_kim', 840000, 1140000, NULL, 'Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Hồng Anh Đào tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Hồng Anh Đào Ngọc Nương Tử Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá Hồng Anh Đào 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Hồng Nhạt, Trắng Vân Hồng</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> đá hồng anh đào, vòng tay nữ, vòng thạch anh hồng, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_014', 'SP0014', 'Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-hong-dao-diem-son-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_tunhien', 'menh_moc', 1120000, 1520000, NULL, 'Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Hồng Đào Điểm Son Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_015', 'SP0015', 'Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ma-nao-anh-dao-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_manao', 'menh_hoa', 910000, 1310000, NULL, 'Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Anh Đào Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_016', 'SP0016', 'Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ma-nao-anh-dao-diem-hoa-trong-co-vay-rong-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_manao', 'menh_thuy', 280000, 680000, NULL, 'Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_017', 'SP0017', 'Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ma-nao-hong-buoi-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_manao', 'menh_moc', 770000, 1070000, NULL, 'Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá Mã Não tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Mã Não Hồng Bưởi Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá Mã Não 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Đỏ, Cam, Trắng, Hỗn Hợp</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay mã não, đá mã não, vòng phong thủy, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_018', 'SP0018', 'Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ngoc-lang-dong-don-hoang-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_langdong', 'menh_tho', 1120000, 1520000, 1420000, 'Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Lăng Đông tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Lăng Đông Đôn Hoàng Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Lăng Đông 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Nâu Vàng, Hổ Phách</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc lăng đông, vòng ngọc quà tặng, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_019', 'SP0019', 'Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ngoc-tu-nham-liu-ninh-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_tunham', 'menh_kim', 910000, 1410000, NULL, 'Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Tụ Nham tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Tụ Nham Liu Ninh Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Tụ Nham 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Xanh Trong, Vân Mây</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc tụ nham, vòng tay phong thủy ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-1.jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_020', 'SP0020', 'Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-ngoc-tu-nham-van-may-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_tunham', 'menh_tho', 910000, 1510000, NULL, 'Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Ngọc Tụ Nham tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Ngọc Tụ Nham Vân Mây Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Ngọc Tụ Nham 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Xanh Trong, Vân Mây</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> ngọc tụ nham, vòng tay phong thủy ngọc, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_021', 'SP0021', 'Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-shentacui-banh-dau-mut-cam-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_tunhien', 'menh_hoa', 1050000, 1350000, NULL, 'Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Shentacui Bánh Đậu Mứt Cam Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg', 1);
INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `slug`, `id_danh_muc`, `id_loai_da`, `id_menh_phong_thuy`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `hinh_anh_chinh`, `trang_thai`) VALUES ('sp_022', 'SP0022', 'Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy', 'vong-tay-sam-panh-thuan-tu-nhien-cao-cap-phu-hop-nam-nu-lam-qua-tang-phong-thuy', 'cat_vongngoc', 'stone_tunhien', 'menh_thuy', 1190000, 1790000, 1690000, 'Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy được chế tác tinh xảo, chất liệu Đá/Ngọc Tự Nhiên tự nhiên. Thiết kế sang trọng, dễ đeo hằng ngày, thích hợp làm phụ kiện thời trang hoặc quà tặng phong thủy mang lại may mắn.', '
<p><strong>Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</strong> là dòng sản phẩm phong thủy tinh tế, mang trong mình nguồn năng lượng tích cực từ thiên nhiên, giúp người đeo luôn cảm thấy bình an và tự tin.</p>

<h3>1. Thông tin chi tiết sản phẩm</h3>
<ul>
  <li><strong>Tên sản phẩm:</strong> Vòng Tay Sâm Panh Thuần Tự Nhiên Cao Cấp, Phù Hợp Nam Nữ, Làm Quà Tặng Phong Thủy</li>
  <li><strong>Chất liệu:</strong> Đá/Ngọc Tự Nhiên 100% tự nhiên</li>
  <li><strong>Màu sắc:</strong> Màu sắc tự nhiên theo vân đá</li>
  <li><strong>Kích thước hạt:</strong> Có các size phổ biến 8mm / 10mm / 12mm</li>
  <li><strong>Phù hợp:</strong> Nam, nữ, những người đam mê trang sức phong thủy</li>
  <li><strong>Kiểu dáng:</strong> Vòng chuỗi hạt co giãn, dễ dàng tháo lắp</li>
  <li><strong>Tình trạng:</strong> Hàng mới hoàn toàn</li>
</ul>

<h3>2. Lợi ích và điểm nổi bật</h3>
<ul>
  <li>Thiết kế thanh lịch, màu sắc tự nhiên không kén da, cực kỳ dễ phối với nhiều loại trang phục.</li>
  <li>Mang năng lượng dương mạnh mẽ, giúp xua tan căng thẳng, đem lại sự nhẹ nhàng và tĩnh tâm.</li>
  <li>Có thể sử dụng như phụ kiện thời trang hằng ngày hoặc một món quà tặng vô cùng ý nghĩa cho bạn bè, người thân.</li>
  <li>Phù hợp với những khách hàng yêu thích sự mộc mạc, sang trọng của trang sức đá và ngọc phong thủy.</li>
  <li>Dây xâu cước chun co giãn siêu bền, tiện lợi và ôm form tay.</li>
</ul>

<h3>3. Hướng dẫn chọn size</h3>
<ul>
  <li><strong>Cổ tay nhỏ (Nữ giới):</strong> Nên chọn hạt 6mm - 8mm để tạo sự thanh thoát.</li>
  <li><strong>Cổ tay trung bình:</strong> Nên chọn hạt 8mm - 10mm.</li>
  <li><strong>Cổ tay lớn (Nam giới):</strong> Nên chọn hạt 10mm - 12mm để tôn lên sự mạnh mẽ.</li>
</ul>
<p><em>Lưu ý: Nếu quý khách có yêu cầu đặc biệt về kích thước cổ tay, vui lòng ghi chú hoặc nhắn tin cho shop để được mix size vừa vặn nhất.</em></p>

<h3>4. Hướng dẫn sử dụng và bảo quản</h3>
<ul>
  <li>Tránh va đập mạnh hoặc làm rơi để hạn chế trầy xước, nứt vỡ viên đá/ngọc.</li>
  <li>Hạn chế tiếp xúc thường xuyên với hóa chất, nước hoa hay các chất tẩy rửa mạnh.</li>
  <li>Khi không sử dụng, nên lau sạch và bảo quản cẩn thận trong hộp hoặc túi gấm riêng.</li>
  <li>Thường xuyên lau nhẹ bề mặt sản phẩm bằng khăn mềm để ngọc/đá luôn giữ được độ sáng bóng.</li>
</ul>

<h3>5. Cam kết của shop</h3>
<ul>
  <li>Sản phẩm giao đến tay khách hàng đúng y như mô tả và hình ảnh cung cấp.</li>
  <li>Kiểm tra kỹ lưỡng từng hạt đá/ngọc trước khi đóng gói và giao cho đơn vị vận chuyển.</li>
  <li>Hỗ trợ đổi/trả linh hoạt theo đúng chính sách nếu sản phẩm có lỗi do nhà sản xuất hoặc quá trình vận chuyển.</li>
  <li>Đội ngũ chăm sóc khách hàng của shop luôn sẵn sàng tư vấn nhiệt tình giúp bạn chọn được mẫu ưng ý nhất.</li>
</ul>

<p><strong>Từ khóa liên quan:</strong> vòng tay đá tự nhiên, chuỗi hạt phong thủy, trang sức đá, trang sức phong thủy, quà tặng sinh nhật, vòng tay nam nữ.</p>', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg', 1);

INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0001', 'sp_001', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0002', 'sp_001', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0003', 'sp_001', '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0004', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0005', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0006', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0007', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0008', 'sp_002', '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0009', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0010', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0011', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0012', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0013', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0014', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-6.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0015', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-7.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0016', 'sp_003', '/images/Sản phẩm/Tràng Hạt/Mã Não Mật Mèo Mụp/ma-nao-mat-meo-8.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0017', 'sp_004', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0018', 'sp_004', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0019', 'sp_004', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Màu Nhã Nhặn/ngoc-hoa-dien-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0020', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0021', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0022', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0023', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0024', 'sp_005', '/images/Sản phẩm/Tràng Hạt/Ngọc Hòa Điền Tân Cương/ngoc-hoa-dien-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0025', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0026', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0027', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0028', 'sp_006', '/images/Sản phẩm/Tràng Hạt/Ngọc Liu Ninh Thiên Thanh Đông/ngoc-liu-ninh-thien-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0029', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0030', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0031', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0032', 'sp_007', '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0033', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0034', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0035', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0036', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0037', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0038', 'sp_008', '/images/Sản phẩm/Tràng Hạt/Tràng San Hô Niệm Phật/trang-san-ho-6.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0039', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0040', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0041', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0042', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0043', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0044', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-6.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0045', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-7.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0046', 'sp_009', '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-8.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0047', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0048', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0049', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0050', 'sp_010', '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0051', 'sp_011', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0052', 'sp_011', '/images/Sản phẩm/Trầm Hương và Nhang/nhang-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0053', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0054', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0055', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0056', 'sp_012', '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0057', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0058', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0059', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0060', 'sp_013', '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0061', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0062', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0063', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0064', 'sp_014', '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0065', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0066', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0067', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0068', 'sp_015', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào/ma-nao-anh-dao-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0069', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0070', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0071', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0072', 'sp_016', '/images/Sản phẩm/Vòng Ngọc/Mã Não Anh Đào Điểm Hoa Trong Có Vảy Rồng/ma-nao-anh-dao-vay-rong-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0073', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0074', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0075', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0076', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0077', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0078', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-6.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0079', 'sp_017', '/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-7.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0080', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0081', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0082', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0083', 'sp_018', '/images/Sản phẩm/Vòng Ngọc/Ngọc Lăng Đông Đôn Hoàng/ngoc-lang-dong-don-hoang-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0084', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0085', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0086', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0087', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0088', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-5.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0089', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-6.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0090', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-7.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0091', 'sp_019', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-8.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0092', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0093', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (2).jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0094', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0095', 'sp_020', '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-4.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0096', 'sp_021', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (1).jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0097', 'sp_021', '/images/Sản phẩm/Vòng Ngọc/Shentacui Bánh Đậu Mứt Cam/shentacui-2 (2).jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0098', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0099', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-2.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0100', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-3.jpg');
INSERT INTO `san_pham_hinh_anh` (`id`, `id_san_pham`, `duong_dan`) VALUES ('img_0101', 'sp_022', '/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-4.jpg');

SET FOREIGN_KEY_CHECKS = 1;
