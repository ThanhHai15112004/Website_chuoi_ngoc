# Website_chuoi_ngoc (Trang sức phong thủy)

Dự án E-commerce chuyên kinh doanh các sản phẩm trang sức phong thủy, vòng chuỗi ngọc, vòng sinh mệnh.

## Công nghệ sử dụng
- **Backend:** PHP MVC (Thuần/Không sử dụng Framework)
- **Frontend:** HTML, CSS, JavaScript (Vanilla CSS, thiết kế UI/UX hiện đại)
- **Database:** MySQL
- **Kiến trúc:** Mô hình MVC (Model - View - Controller)

## Cấu trúc thư mục
- `app/` - Chứa mã nguồn chính (Controllers, Models, Core)
- `config/` - Cấu hình hệ thống (Database, App variables)
- `public/` - Tài nguyên tĩnh (CSS, JS, Images) và điểm truy cập (index.php)
- `routes/` - Định tuyến ứng dụng
- `views/` - Giao diện người dùng (Pages, Components, Layouts)

## Tính năng chính
- Hiển thị danh mục sản phẩm, chi tiết sản phẩm.
- Chức năng Giỏ hàng.
- Trang tư vấn "Vòng Sinh Mệnh" phù hợp theo bản mệnh phong thủy.
- Quản lý định tuyến tập trung, không hardcode.

## Cài đặt và chạy dự án
1. Clone dự án về máy.
2. Thiết lập Web Server (XAMPP/MAMP/Laragon) và trỏ thư mục gốc của domain (Virtual Host) vào thư mục `public/`. Hoặc chạy trực tiếp trên thư mục gốc nếu cấu hình `.htaccess` ở thư mục ngoài cùng.
3. Import cơ sở dữ liệu.
4. Cấu hình file database trong `config/`.
5. Truy cập ứng dụng qua trình duyệt.
