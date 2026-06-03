# 🔮 Website Chuỗi Ngọc – E-commerce Trang Sức Phong Thủy

<div align="center">

**Website thương mại điện tử chuyên cung cấp vòng tay, chuỗi hạt, trang sức đá quý phong thủy.**
Thiết kế hiện đại · Quản trị chuyên nghiệp · Trải nghiệm mượt mà

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB_10.4-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

</div>

---

## 📋 Mục Lục

- [Giới thiệu](#-giới-thiệu)
- [Tính năng](#-tính-năng)
- [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
- [Kiến trúc dự án](#-kiến-trúc-dự-án)
- [Cấu trúc thư mục](#-cấu-trúc-thư-mục)
- [Cài đặt & Chạy dự án](#-cài-đặt--chạy-dự-án)
- [Cấu hình môi trường](#-cấu-hình-môi-trường)
- [Tiến độ phát triển](#-tiến-độ-phát-triển)
- [Tài khoản demo](#-tài-khoản-demo)
- [Đóng góp](#-đóng-góp)

---

## 🌟 Giới Thiệu

**Chuỗi Ngọc** là dự án Website thương mại điện tử fullstack được xây dựng bằng **PHP thuần** theo mô hình **MVC tự xây dựng** (không sử dụng framework). Dự án hướng đến việc cung cấp trải nghiệm mua sắm trực tuyến chuyên nghiệp cho các sản phẩm trang sức phong thủy như vòng tay đá quý, chuỗi hạt, dây chuyền... với tính năng tư vấn theo **ngũ hành bản mệnh**.

Dự án bao gồm **2 phân hệ chính**:

| Phân hệ                        | Mô tả                                                                                                                      |
| ------------------------------ | -------------------------------------------------------------------------------------------------------------------------- |
| 🛍️ **Trang khách hàng (User)** | Trang chủ, danh sách sản phẩm, chi tiết sản phẩm, giỏ hàng, thanh toán, khuyến mãi, bài viết, liên hệ, tài khoản cá nhân   |
| ⚙️ **Trang quản trị (Admin)**  | Dashboard, quản lý sản phẩm, đơn hàng, khách hàng, nhân sự, kho hàng, khuyến mãi, voucher, bài viết, thông báo, báo cáo... |

---

## ✨ Tính Năng

### 🛍️ Trang Khách Hàng

- **Trang chủ** hiện đại với banner slider, sản phẩm bán chạy, danh mục nổi bật, bộ lọc ngũ hành
- **Danh sách sản phẩm** với bộ lọc đa tiêu chí (danh mục, loại đá, mệnh, khoảng giá), sắp xếp linh hoạt và phân trang
- **Chi tiết sản phẩm** đầy đủ: ảnh gallery, biến thể (size/màu), đánh giá, voucher áp dụng, sản phẩm liên quan, sản phẩm đã xem
- **Trang khuyến mãi** tổng hợp: Flash Sale đếm ngược, danh sách voucher theo hạng thành viên, sản phẩm đang giảm giá, combo quà tặng, ưu đãi freeship, đặc quyền hội viên 4 hạng (Đồng → Bạc → Vàng → Kim Cương)
- **Lưu voucher** trực tiếp vào tài khoản (AJAX) từ mọi trang
- **Giỏ hàng & Thanh toán** mượt mà
- **Tra cứu đơn hàng** và quản lý tài khoản cá nhân
- **Bài viết/Blog** kiến thức phong thủy
- **Tư vấn vòng theo mệnh** phong thủy
- **Đăng ký / Đăng nhập** tài khoản khách hàng
- **Responsive Design** – tương thích tốt trên mọi thiết bị

### ⚙️ Trang Quản Trị (Admin)

- **Dashboard** thống kê tổng quan: doanh thu, đơn hàng, khách hàng mới, biểu đồ
- **Quản lý sản phẩm** – CRUD đầy đủ, biến thể, nhiều ảnh, phong thủy, xóa mềm
- **Quản lý danh mục** – phân loại sản phẩm
- **Quản lý loại đá & mệnh phong thủy** – master data hệ thống
- **Quản lý đơn hàng** – theo dõi trạng thái, xem chi tiết, tạo đơn mới
- **Quản lý khách hàng** – thông tin, hạng thành viên, lịch sử mua hàng
- **Quản lý nhân sự** – thêm/sửa/xóa nhân viên, phân vai trò
- **Quản lý kho hàng** đầy đủ:
  - Nhập kho / Xuất kho / Thuyển chuyển kho
  - Kiểm kê hàng hóa
  - Cấu hình kho & khu vực
  - Theo dõi tồn kho realtime
- **Quản lý nhà cung cấp**
- **Quản lý khuyến mãi & voucher** – chương trình khuyến mãi, mã giảm giá, phạm vi áp dụng theo sản phẩm/danh mục/hạng KH
- **Quản lý bài viết** – CMS blog phong thủy
- **Quản lý banner** – slider ảnh cho trang chủ
- **Quản lý chính sách** – đổi trả, bảo hành, giao hàng...
- **Quản lý thanh toán & vận chuyển** – phương thức thanh toán, vận chuyển, freeship
- **Hệ thống thông báo** – gửi thông báo cho khách hàng
- **Nhật ký hoạt động** – log hành vi quản trị viên
- **Báo cáo** – doanh thu theo thời gian, sản phẩm bán chạy, biểu đồ Chart.js

---

## 🛠️ Công Nghệ Sử Dụng

| Thành phần           | Công nghệ                                                                                              |
| -------------------- | ------------------------------------------------------------------------------------------------------ |
| **Backend**          | PHP 8.0+ thuần (Vanilla PHP, không framework)                                                          |
| **Database**         | MySQL / MariaDB 10.4+ (PDO, Prepared Statements)                                                       |
| **Frontend (User)**  | HTML5, TailwindCSS v4 (build via CLI), Vanilla JavaScript                                              |
| **Frontend (Admin)** | HTML5, TailwindCSS v4 (CDN), Vanilla JavaScript                                                        |
| **CSS Build Tool**   | `@tailwindcss/cli` v4.3                                                                                |
| **Thư viện JS**      | Swiper.js (slider), Chart.js (biểu đồ), AOS (animation on scroll), SweetAlert2 (toast), Iconify (icon) |
| **Email**            | Raw SMTP Socket (custom MailHelper, không dùng PHPMailer)                                              |
| **Web Server**       | Apache (XAMPP) với `mod_rewrite`                                                                       |

---

## 🏗️ Kiến Trúc Dự Án

Dự án tuân theo mô hình **Custom MVC** tự xây dựng:

```
Request → .htaccess → public/index.php → Router → Controller → Service → Model → Database
                                                       ↓
                                                      View (Layout + Page + Components)
```

| Tầng           | Thư mục            | Vai trò                                                          |
| -------------- | ------------------ | ---------------------------------------------------------------- |
| **Router**     | `routes/`          | Định nghĩa route bằng regex, map URL → Controller@action         |
| **Controller** | `app/Controllers/` | Nhận request, validate input, gọi Service, trả View/JSON         |
| **Service**    | `app/Services/`    | Xử lý logic nghiệp vụ (business logic)                           |
| **Model**      | `app/Models/`      | Tương tác Database qua PDO Singleton                             |
| **View**       | `views/`           | Giao diện: layouts, pages, components, emails                    |
| **Core**       | `app/Core/`        | Router, Controller base, Database singleton, Helpers, MailHelper |
| **Constants**  | `app/Constants/`   | Hằng số: trạng thái đơn hàng, hạng thành viên, sản phẩm...       |

### Quy ước quan trọng:

- Tất cả **Primary Key** dùng **UUID** (`varchar(36)`), tự generate bằng PHP
- Bảng `nguoi_dung` dùng chung cho Admin/Staff và Khách hàng (phân biệt qua `id_vai_tro`)
- Sử dụng **Prepared Statements** cho 100% SQL query
- Namespace theo chuẩn **PSR-4**, tự động autoload

---

## 📂 Cấu Trúc Thư Mục

```
shopbanhangchuoingoc/
├── app/
│   ├── Constants/          # Hằng số hệ thống (trạng thái, role...)
│   ├── Controllers/
│   │   ├── Admin/          # 29 controller quản trị
│   │   └── User/           # 11 controller khách hàng
│   ├── Core/
│   │   ├── Controller.php  # Base controller
│   │   ├── Database.php    # PDO Singleton
│   │   ├── Helpers.php     # Hàm tiện ích (loadEnv, component...)
│   │   ├── MailHelper.php  # Gửi email qua raw SMTP
│   │   └── Router.php      # Routing engine
│   ├── Models/
│   │   └── Admin/          # 37 model (dùng chung cho Admin & User)
│   └── Services/
│       ├── Admin/          # 16 service nghiệp vụ admin
│       ├── User/           # 3 service nghiệp vụ user
│       ├── MailService.php
│       └── NotificationService.php
├── config/
│   └── constants.php       # APP_NAME, APP_URL, timezone, quyền
├── databases/
│   ├── shop_chuoi_ngoc-export.sql  # ⭐ File SQL đầy đủ (schema + data)
│   ├── shop_chuoi_ngoc.sql         # Schema gốc (chỉ cấu trúc)
│   ├── data/                       # Dữ liệu seed
│   └── migrations/                 # Migration files
├── public/                 # Document root (entry point)
│   ├── index.php           # ⭐ Entry point chính
│   ├── .htaccess           # Rewrite rules
│   ├── css/                # Tailwind output (style.css)
│   ├── js/                 # JavaScript
│   ├── images/             # Ảnh tĩnh
│   └── uploads/            # File upload từ admin
├── routes/
│   ├── web.php             # Route khách hàng
│   └── admin.php           # Route quản trị
├── views/
│   ├── layouts/            # 3 layout: main, admin, auth
│   ├── pages/              # 76 page (admin + user)
│   ├── components/
│   │   ├── Admin/          # 29 thư mục component admin
│   │   ├── User/           # 14 thư mục component user
│   │   └── common/         # Component dùng chung
│   └── emails/             # Template email
├── .env                    # Biến môi trường (không commit)
├── .env.example            # Mẫu biến môi trường
├── package.json            # TailwindCSS CLI config
└── README.md               # File này
```

---

## 🚀 Cài Đặt & Chạy Dự Án

### Yêu cầu hệ thống

| Phần mềm                                | Phiên bản tối thiểu                         |
| --------------------------------------- | ------------------------------------------- |
| [XAMPP](https://www.apachefriends.org/) | 8.0+ (bao gồm Apache + MySQL/MariaDB + PHP) |
| [Node.js](https://nodejs.org/)          | 18+ (để build TailwindCSS)                  |
| [Git](https://git-scm.com/)             | Bất kỳ                                      |

### Các bước cài đặt

#### 1️⃣ Clone dự án

```bash
cd C:\xampp\htdocs
git clone https://github.com/ThanhHai15112004/Website_chuoi_ngoc.git shopbanhangchuoingoc
cd shopbanhangchuoingoc
```

#### 2️⃣ Tạo Database và Import dữ liệu

1. Mở **XAMPP Control Panel** → Khởi động **Apache** và **MySQL**
2. Truy cập **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3. Tạo database mới:
   - Click **"New"** (hoặc **"Mới"**) ở sidebar trái
   - Đặt tên database: `shop_chuoi_ngoc`
   - Chọn **Collation**: `utf8mb4_unicode_ci`
   - Click **"Create"** (hoặc **"Tạo"**)
4. Import dữ liệu:
   - Chọn database `shop_chuoi_ngoc` vừa tạo
   - Click tab **"Import"** (hoặc **"Nhập"**)
   - Click **"Choose File"** → Chọn file: `databases/shop_chuoi_ngoc-export.sql`
   - Đảm bảo **Character set** là `utf-8`
   - Click **"Go"** (hoặc **"Thực hiện"**) để import

> ⚠️ **Lưu ý:** File `shop_chuoi_ngoc-export.sql` (~1MB) bao gồm **toàn bộ cấu trúc bảng + dữ liệu mẫu** (sản phẩm, danh mục, bài viết, voucher, khách hàng...). Chỉ cần import file này là đủ.

> ⚠️ **Nếu MySQL của bạn chạy ở port khác 3306** (ví dụ `3307`), hãy ghi nhớ port này để cấu hình ở bước tiếp theo.

#### 3️⃣ Cấu hình biến môi trường

Tạo file `.env` từ file mẫu:

```bash
copy .env.example .env
```

Mở file `.env` và điền thông tin kết nối:

```env
# Database
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=shop_chuoi_ngoc
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4

# Email (tùy chọn – dùng cho gửi thông báo)
EMAIL_HOST=smtp.gmail.com
EMAIL_PORT=587
EMAIL_USER=your_email@gmail.com
EMAIL_PASS=your_app_password
EMAIL_FROM=your_email@gmail.com
```

> 💡 **`DB_PORT`**: Mặc định MySQL trong XAMPP là `3306`. Nếu bạn đã đổi port (ví dụ `3307`), hãy cập nhật tương ứng.

> 💡 **Email**: Nếu dùng Gmail, cần bật [App Passwords](https://support.google.com/accounts/answer/185833) và dùng mật khẩu ứng dụng thay vì mật khẩu Gmail thông thường.

#### 4️⃣ Cài đặt TailwindCSS (cho trang User)

```bash
npm install
```

Build CSS (chạy lần đầu):

```bash
npm run build
```

Hoặc chạy ở chế độ **watch** (tự động rebuild khi sửa code):

```bash
npm run dev
```

#### 5️⃣ Truy cập Website

| Trang                 | URL                                                                                        |
| --------------------- | ------------------------------------------------------------------------------------------ |
| 🏠 **Trang chủ**      | [http://localhost/shopbanhangchuoingoc](http://localhost/shopbanhangchuoingoc)             |
| ⚙️ **Trang quản trị** | [http://localhost/shopbanhangchuoingoc/admin](http://localhost/shopbanhangchuoingoc/admin) |

> 🎉 **Xong!** Nếu bạn thấy trang chủ hiển thị bình thường, nghĩa là mọi thứ đã được cài đặt thành công.

---

## ⚙️ Cấu Hình Môi Trường

### Biến môi trường (`.env`)

| Biến          | Mô tả                    | Giá trị mặc định   |
| ------------- | ------------------------ | ------------------ |
| `DB_HOST`     | Địa chỉ MySQL server     | `127.0.0.1`        |
| `DB_PORT`     | Port MySQL               | `3306` hoặc `3307` |
| `DB_DATABASE` | Tên database             | `shop_chuoi_ngoc`  |
| `DB_USERNAME` | Username MySQL           | `root`             |
| `DB_PASSWORD` | Password MySQL           | _(trống)_          |
| `DB_CHARSET`  | Character set            | `utf8mb4`          |
| `EMAIL_HOST`  | SMTP host                | `smtp.gmail.com`   |
| `EMAIL_PORT`  | SMTP port                | `587`              |
| `EMAIL_USER`  | Email gửi đi             | –                  |
| `EMAIL_PASS`  | App password             | –                  |
| `EMAIL_FROM`  | Email hiển thị người gửi | –                  |

### Cấu hình Apache

Dự án sử dụng `.htaccess` để rewrite URL. Đảm bảo `mod_rewrite` đã được bật trong `httpd.conf` của Apache:

```apache
LoadModule rewrite_module modules/mod_rewrite.so
```

Và `AllowOverride` được đặt thành `All` cho thư mục htdocs.

---

## 📊 Tiến Độ Phát Triển

### Trang Khách Hàng (User Frontend)

| Module              | Trạng thái    | Ghi chú                                                        |
| ------------------- | ------------- | -------------------------------------------------------------- |
| Trang chủ           | ✅ Hoàn thành | Banner, SP bán chạy, danh mục, ngũ hành, bài viết, đánh giá    |
| Danh sách sản phẩm  | ✅ Hoàn thành | Bộ lọc, sắp xếp, phân trang, grid/list view                    |
| Chi tiết sản phẩm   | ✅ Hoàn thành | Gallery, biến thể, đánh giá, voucher, SP liên quan, SP đã xem  |
| Trang khuyến mãi    | ✅ Hoàn thành | Flash sale, voucher theo hạng KH, SP giảm giá, ưu đãi hội viên |
| Giỏ hàng            | ✅ Hoàn thành | CRUD giỏ hàng, cập nhật số lượng                               |
| Thanh toán          | ✅ Hoàn thành | Form đặt hàng, chọn PTTT/PTVC                                  |
| Bài viết / Blog     | ✅ Hoàn thành | Danh sách, chi tiết bài viết                                   |
| Đăng nhập / Đăng ký | ✅ Hoàn thành | Xác thực, session                                              |
| Tài khoản cá nhân   | ✅ Hoàn thành | Thông tin, đổi mật khẩu                                        |
| Tra cứu đơn hàng    | ✅ Hoàn thành | Xem chi tiết, trạng thái                                       |
| Liên hệ             | ✅ Hoàn thành | Form liên hệ                                                   |
| Vòng theo mệnh      | ✅ Hoàn thành | Tư vấn SP theo ngũ hành                                        |

### Trang Quản Trị (Admin)

| Module                  | Trạng thái    | Ghi chú                                           |
| ----------------------- | ------------- | ------------------------------------------------- |
| Dashboard               | ✅ Hoàn thành | Thống kê, biểu đồ Chart.js                        |
| Quản lý sản phẩm        | ✅ Hoàn thành | CRUD, biến thể, nhiều ảnh                         |
| Quản lý danh mục        | ✅ Hoàn thành | CRUD                                              |
| Quản lý loại đá         | ✅ Hoàn thành | CRUD                                              |
| Quản lý mệnh phong thủy | ✅ Hoàn thành | CRUD                                              |
| Quản lý đơn hàng        | ✅ Hoàn thành | Danh sách, chi tiết, tạo đơn, cập nhật trạng thái |
| Quản lý khách hàng      | ✅ Hoàn thành | CRUD, chi tiết, hạng thành viên                   |
| Quản lý nhân sự         | ✅ Hoàn thành | CRUD nhân viên, phân vai trò                      |
| Quản lý kho hàng        | ✅ Hoàn thành | Nhập/xuất/thuyên chuyển/kiểm kê, cấu hình kho     |
| Quản lý nhà cung cấp    | ✅ Hoàn thành | CRUD                                              |
| Quản lý khuyến mãi      | ✅ Hoàn thành | Chương trình KM, Flash Sale                       |
| Quản lý voucher         | ✅ Hoàn thành | CRUD, phân bổ theo hạng KH                        |
| Quản lý bài viết        | ✅ Hoàn thành | CMS blog                                          |
| Quản lý banner          | ✅ Hoàn thành | Slider ảnh                                        |
| Quản lý chính sách      | ✅ Hoàn thành | Đổi trả, bảo hành                                 |
| Thanh toán & Vận chuyển | ✅ Hoàn thành | PTTT, PTVC, freeship                              |
| Hệ thống thông báo      | ✅ Hoàn thành | Gửi thông báo KH                                  |
| Nhật ký hoạt động       | ✅ Hoàn thành | Log hành vi admin                                 |
| Báo cáo doanh thu       | ✅ Hoàn thành | Biểu đồ theo thời gian                            |
| Báo cáo sản phẩm        | ✅ Hoàn thành | SP bán chạy, tồn kho                              |
| Quản lý tài khoản       | ✅ Hoàn thành | Admin accounts, vai trò                           |
| Hạng thành viên         | ✅ Hoàn thành | 4 hạng: Đồng, Bạc, Vàng, Kim Cương                |
| Đánh giá / Bình luận    | ✅ Hoàn thành | Duyệt, phản hồi                                   |

---

## 🔑 Tài Khoản Demo

\*\*\*Tài khoản admin:
Tài khoản: admin@chuoingocshop.com
Mật khẩu: admin1234

> ⚠️ Tài khoản mặc định có trong dữ liệu mẫu. Vui lòng kiểm tra bảng `nguoi_dung` trong database sau khi import.

| Vai trò        | Ghi chú                               |
| -------------- | ------------------------------------- |
| **Admin**      | Tài khoản có `id_vai_tro IS NOT NULL` |
| **Khách hàng** | Tài khoản có `id_vai_tro IS NULL`     |

---

## 🤝 Đóng Góp

1. Fork dự án
2. Tạo branch mới (`git checkout -b feature/tinh-nang-moi`)
3. Commit thay đổi (`git commit -m 'Thêm tính năng XYZ'`)
4. Push lên branch (`git push origin feature/tinh-nang-moi`)
5. Tạo Pull Request

---

## 📝 Ghi Chú Kỹ Thuật

- **Entry Point**: Mọi request đều đi qua `public/index.php` nhờ `.htaccess`
- **Autoloading**: Sử dụng `spl_autoload_register()` theo chuẩn PSR-4
- **Session**: Quản lý phiên đăng nhập qua PHP Session
- **TailwindCSS v4**:
  - Trang User: Build qua CLI (`npm run dev/build`) → output tại `public/css/style.css`
  - Trang Admin: Load trực tiếp từ CDN (`cdn.tailwindcss.com`)
- **Database**: Sử dụng PDO Singleton (`App\Core\Database::getInstance()`) với Prepared Statements cho mọi query
- **UUID**: Tất cả khóa chính dùng UUID `varchar(36)`, tự generate bằng PHP

---

<div align="center">

**Được phát triển với ❤️ bởi [ThanhHai15112004](https://github.com/ThanhHai15112004)**

</div>
