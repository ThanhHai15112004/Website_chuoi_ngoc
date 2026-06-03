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

---

# 🔮 Chuoi Ngoc Website – Feng Shui Jewelry E-commerce

<div align="center">

**E-commerce website specializing in feng shui gemstone bracelets, necklaces, and jewelry.**
Modern design · Professional management · Smooth experience

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB_10.4-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

</div>

---

## 📋 Table of Contents

- [Introduction](#-introduction)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Project Architecture](#-project-architecture)
- [Directory Structure](#-directory-structure)
- [Installation & Setup](#-installation--setup)
- [Environment Configuration](#-environment-configuration)
- [Development Progress](#-development-progress)
- [Demo Accounts](#-demo-accounts)
- [Contributing](#-contributing)

---

## 🌟 Introduction

**Chuoi Ngoc** is a full-stack e-commerce project built with **Vanilla PHP** using a **Custom MVC pattern** (without any frameworks). The project aims to provide a professional online shopping experience for feng shui jewelry products such as gemstone bracelets, necklaces, and rings, featuring consulting functionality based on the **five elements of destiny (Wu Xing)**.

The project consists of **2 main modules**:

| Module                           | Description                                                                                                                   |
| -------------------------------- | ----------------------------------------------------------------------------------------------------------------------------- |
| 🛍️ **User Interface (Frontend)** | Home, product catalog, product details, shopping cart, checkout, promotions, blog, contact, user account                      |
| ⚙️ **Admin Panel (Backend)**     | Dashboard, product management, orders, customers, personnel, inventory, promotions, vouchers, blog, notifications, reports... |

---

## ✨ Features

### 🛍️ User Interface (Frontend)

- **Modern Homepage** with banner slider, best-selling products, featured categories, and five elements filter.
- **Product Catalog** with multi-criteria filtering (category, gemstone type, destiny element, price range), flexible sorting, and pagination.
- **Detailed Product Page**: Image gallery, variants (size/color), reviews, applicable vouchers, related products, and recently viewed products.
- **Promotions Page**: Countdown flash sales, voucher list based on membership tiers, discounted products, gift combos, freeship offers, and exclusive privileges for 4 membership tiers (Bronze → Silver → Gold → Diamond).
- **Save Vouchers** directly to account via AJAX from any page.
- **Smooth Cart & Checkout** process.
- **Order Tracking** and personal account management.
- **Blog** featuring feng shui knowledge.
- **Consulting Tool** to suggest jewelry based on the user's destiny element.
- **Register / Login** for customer accounts.
- **Responsive Design** – fully compatible with all devices.

### ⚙️ Admin Panel (Backend)

- **Dashboard** showing general statistics: revenue, orders, new customers, and charts.
- **Product Management** – full CRUD, variants, multiple images, feng shui elements, soft delete.
- **Category Management** – product classification.
- **Gemstone & Destiny Element Management** – system master data.
- **Order Management** – track statuses, view details, create new orders.
- **Customer Management** – information, membership tiers, purchase history.
- **Personnel Management** – manage staff accounts and roles.
- **Inventory Management** including:
  - Goods Receipt / Issue / Transfer
  - Inventory checking
  - Warehouse & location configuration
  - Real-time stock tracking
- **Supplier Management**.
- **Promotions & Vouchers Management** – promotional campaigns, discount codes, application scope by product/category/customer tier.
- **Blog Management** – CMS for feng shui articles.
- **Banner Management** – homepage image slider.
- **Policy Management** – returns, warranties, shipping policies...
- **Payment & Shipping Management** – payment methods, shipping options, freeship rules.
- **Notification System** – send notifications to customers.
- **Activity Log** – track admin behaviors.
- **Reports** – revenue over time, best-selling products, Chart.js visualizations.

---

## 🛠️ Tech Stack

| Component            | Technology                                                                                      |
| -------------------- | ----------------------------------------------------------------------------------------------- |
| **Backend**          | Vanilla PHP 8.0+ (No frameworks)                                                                |
| **Database**         | MySQL / MariaDB 10.4+ (PDO, Prepared Statements)                                                |
| **Frontend (User)**  | HTML5, TailwindCSS v4 (built via CLI), Vanilla JavaScript                                       |
| **Frontend (Admin)** | HTML5, TailwindCSS v4 (CDN), Vanilla JavaScript                                                 |
| **CSS Build Tool**   | `@tailwindcss/cli` v4.3                                                                         |
| **JS Libraries**     | Swiper.js (sliders), Chart.js (charts), AOS (animations), SweetAlert2 (toasts), Iconify (icons) |
| **Email**            | Raw SMTP Socket (custom MailHelper, without PHPMailer)                                          |
| **Web Server**       | Apache (XAMPP) with `mod_rewrite`                                                               |

---

## 🏗️ Project Architecture

The project follows a **Custom MVC** architecture:

```
Request → .htaccess → public/index.php → Router → Controller → Service → Model → Database
                                                       ↓
                                                      View (Layout + Page + Components)
```

| Layer          | Directory          | Role                                                                   |
| -------------- | ------------------ | ---------------------------------------------------------------------- |
| **Router**     | `routes/`          | Defines routes using regex, mapping URL → Controller@action            |
| **Controller** | `app/Controllers/` | Receives requests, validates inputs, calls Services, returns View/JSON |
| **Service**    | `app/Services/`    | Handles business logic                                                 |
| **Model**      | `app/Models/`      | Interacts with the Database via a PDO Singleton                        |
| **View**       | `views/`           | UI: layouts, pages, components, emails                                 |
| **Core**       | `app/Core/`        | Base Router & Controller, Database singleton, Helpers, MailHelper      |
| **Constants**  | `app/Constants/`   | Constants: order statuses, membership tiers, product constants...      |

### Important Conventions:

- All **Primary Keys** use **UUID** (`varchar(36)`), generated via PHP.
- The `nguoi_dung` table is shared for Admin/Staff and Customers (distinguished by `id_vai_tro`).
- **Prepared Statements** are used for 100% of SQL queries to prevent SQL Injection.
- Namespaces follow the **PSR-4** standard with an automatic autoloader.

---

## 📂 Directory Structure

```
shopbanhangchuoingoc/
├── app/
│   ├── Constants/          # System constants (statuses, roles...)
│   ├── Controllers/
│   │   ├── Admin/          # 29 admin controllers
│   │   └── User/           # 11 user controllers
│   ├── Core/
│   │   ├── Controller.php  # Base controller
│   │   ├── Database.php    # PDO Singleton
│   │   ├── Helpers.php     # Utility functions (loadEnv, component...)
│   │   ├── MailHelper.php  # Send email via raw SMTP
│   │   └── Router.php      # Routing engine
│   ├── Models/
│   │   └── Admin/          # 37 models (shared for Admin & User)
│   └── Services/
│       ├── Admin/          # 16 admin business services
│       ├── User/           # 3 user business services
│       ├── MailService.php
│       └── NotificationService.php
├── config/
│   └── constants.php       # APP_NAME, APP_URL, timezone, privileges
├── databases/
│   ├── shop_chuoi_ngoc-export.sql  # ⭐ Full SQL file (schema + data)
│   ├── shop_chuoi_ngoc.sql         # Original schema (structure only)
│   ├── data/                       # Seed data
│   └── migrations/                 # Migration files
├── public/                 # Document root (entry point)
│   ├── index.php           # ⭐ Main entry point
│   ├── .htaccess           # Rewrite rules
│   ├── css/                # Tailwind output (style.css)
│   ├── js/                 # JavaScript files
│   ├── images/             # Static images
│   └── uploads/            # Files uploaded from admin
├── routes/
│   ├── web.php             # User routes
│   └── admin.php           # Admin routes
├── views/
│   ├── layouts/            # 3 layouts: main, admin, auth
│   ├── pages/              # 76 pages (admin + user)
│   ├── components/
│   │   ├── Admin/          # 29 admin component directories
│   │   ├── User/           # 14 user component directories
│   │   └── common/         # Shared components
│   └── emails/             # Email templates
├── .env                    # Environment variables (not committed)
├── .env.example            # Sample environment variables
├── package.json            # TailwindCSS CLI config
└── README_EN.md            # This file
```

---

## 🚀 Installation & Setup

### System Requirements

| Software                                | Minimum Version                              |
| --------------------------------------- | -------------------------------------------- |
| [XAMPP](https://www.apachefriends.org/) | 8.0+ (includes Apache + MySQL/MariaDB + PHP) |
| [Node.js](https://nodejs.org/)          | 18+ (to build TailwindCSS)                   |
| [Git](https://git-scm.com/)             | Any                                          |

### Installation Steps

#### 1️⃣ Clone the project

```bash
cd C:\xampp\htdocs
git clone https://github.com/ThanhHai15112004/Website_chuoi_ngoc.git shopbanhangchuoingoc
cd shopbanhangchuoingoc
```

#### 2️⃣ Create Database and Import Data

1. Open **XAMPP Control Panel** → Start **Apache** and **MySQL**.
2. Go to **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Create a new database:
   - Click **"New"** on the left sidebar.
   - Set database name: `shop_chuoi_ngoc`
   - Select **Collation**: `utf8mb4_unicode_ci`
   - Click **"Create"**.
4. Import data:
   - Select the `shop_chuoi_ngoc` database you just created.
   - Click the **"Import"** tab.
   - Click **"Choose File"** → Select file: `databases/shop_chuoi_ngoc-export.sql`.
   - Ensure the **Character set** is `utf-8`.
   - Click **"Go"** to import.

> ⚠️ **Note:** The `shop_chuoi_ngoc-export.sql` file (~1MB) contains **the complete table structure and sample data** (products, categories, articles, vouchers, customers...). You only need to import this file.

> ⚠️ **If your MySQL runs on a different port than 3306** (e.g., `3307`), please remember it for the next step.

#### 3️⃣ Configure Environment Variables

Create the `.env` file from the example:

```bash
copy .env.example .env
```

Open the `.env` file and fill in your connection details:

```env
# Database
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=shop_chuoi_ngoc
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4

# Email (optional – used for notifications)
EMAIL_HOST=smtp.gmail.com
EMAIL_PORT=587
EMAIL_USER=your_email@gmail.com
EMAIL_PASS=your_app_password
EMAIL_FROM=your_email@gmail.com
```

> 💡 **`DB_PORT`**: The default MySQL port in XAMPP is `3306`. If you changed it (e.g., `3307`), update it accordingly.

> 💡 **Email**: If using Gmail, you need to enable [App Passwords](https://support.google.com/accounts/answer/185833) and use it instead of your normal Gmail password.

#### 4️⃣ Install TailwindCSS (for User Interface)

```bash
npm install
```

Build CSS (first time run):

```bash
npm run build
```

Or run in **watch** mode (auto-rebuild on file changes):

```bash
npm run dev
```

#### 5️⃣ Access the Website

| Page               | URL                                                                                        |
| ------------------ | ------------------------------------------------------------------------------------------ |
| 🏠 **Homepage**    | [http://localhost/shopbanhangchuoingoc](http://localhost/shopbanhangchuoingoc)             |
| ⚙️ **Admin Panel** | [http://localhost/shopbanhangchuoingoc/admin](http://localhost/shopbanhangchuoingoc/admin) |

> 🎉 **Done!** If you see the homepage displaying normally, everything has been installed successfully.

---

## ⚙️ Environment Configuration

### Environment Variables (`.env`)

| Variable      | Description          | Default Value     |
| ------------- | -------------------- | ----------------- |
| `DB_HOST`     | MySQL server address | `127.0.0.1`       |
| `DB_PORT`     | MySQL port           | `3306` or `3307`  |
| `DB_DATABASE` | Database name        | `shop_chuoi_ngoc` |
| `DB_USERNAME` | MySQL username       | `root`            |
| `DB_PASSWORD` | MySQL password       | _(empty)_         |
| `DB_CHARSET`  | Character set        | `utf8mb4`         |
| `EMAIL_HOST`  | SMTP host            | `smtp.gmail.com`  |
| `EMAIL_PORT`  | SMTP port            | `587`             |
| `EMAIL_USER`  | Sending email        | –                 |
| `EMAIL_PASS`  | App password         | –                 |
| `EMAIL_FROM`  | Display sender name  | –                 |

### Apache Configuration

The project uses `.htaccess` to rewrite URLs. Ensure `mod_rewrite` is enabled in your Apache `httpd.conf`:

```apache
LoadModule rewrite_module modules/mod_rewrite.so
```

And `AllowOverride` is set to `All` for the htdocs directory.

---

## 📊 Development Progress

### User Interface (Frontend)

| Module              | Status       | Notes                                                                |
| ------------------- | ------------ | -------------------------------------------------------------------- |
| Homepage            | ✅ Completed | Banner, best-sellers, categories, five elements, blog, reviews       |
| Product Catalog     | ✅ Completed | Filters, sorting, pagination, grid/list view                         |
| Product Details     | ✅ Completed | Gallery, variants, reviews, vouchers, related items, recently viewed |
| Promotions Page     | ✅ Completed | Flash sale, tier-based vouchers, discounts, membership privileges    |
| Shopping Cart       | ✅ Completed | Cart CRUD, quantity updates                                          |
| Checkout            | ✅ Completed | Order form, select payment/shipping methods                          |
| Blog / Articles     | ✅ Completed | Article list, details                                                |
| Login / Register    | ✅ Completed | Authentication, session handling                                     |
| User Account        | ✅ Completed | Information updates, change password                                 |
| Order Tracking      | ✅ Completed | View details, status updates                                         |
| Contact             | ✅ Completed | Contact form                                                         |
| Feng Shui Bracelets | ✅ Completed | Consult products based on the five elements                          |

### Admin Panel (Backend)

| Module                     | Status       | Notes                                             |
| -------------------------- | ------------ | ------------------------------------------------- |
| Dashboard                  | ✅ Completed | Statistics, Chart.js charts                       |
| Product Management         | ✅ Completed | CRUD, variants, multiple images                   |
| Category Management        | ✅ Completed | CRUD                                              |
| Gemstone Management        | ✅ Completed | CRUD                                              |
| Destiny Element Management | ✅ Completed | CRUD                                              |
| Order Management           | ✅ Completed | List, details, create order, update status        |
| Customer Management        | ✅ Completed | CRUD, details, membership tiers                   |
| Personnel Management       | ✅ Completed | CRUD staff, assign roles                          |
| Inventory Management       | ✅ Completed | Receipt/issue/transfer/check, config              |
| Supplier Management        | ✅ Completed | CRUD                                              |
| Promotions Management      | ✅ Completed | Campaigns, Flash Sale                             |
| Voucher Management         | ✅ Completed | CRUD, allocate by customer tier                   |
| Blog Management            | ✅ Completed | CMS for articles                                  |
| Banner Management          | ✅ Completed | Image slider                                      |
| Policy Management          | ✅ Completed | Returns, warranties                               |
| Payment & Shipping         | ✅ Completed | Payment methods, shipping options, freeship rules |
| Notification System        | ✅ Completed | Send notifications to customers                   |
| Activity Log               | ✅ Completed | Log admin actions                                 |
| Revenue Reports            | ✅ Completed | Time-based charts                                 |
| Product Reports            | ✅ Completed | Best-sellers, inventory reports                   |
| Account Management         | ✅ Completed | Admin accounts, roles                             |
| Membership Tiers           | ✅ Completed | 4 tiers: Bronze, Silver, Gold, Diamond            |
| Reviews & Comments         | ✅ Completed | Moderate, reply                                   |

---

## 🔑 Demo Accounts

\*\*\*Admin account:
Email: admin@chuoingocshop.com
Password: admin1234

> ⚠️ Default accounts are available in the sample data. Please check the `nguoi_dung` table in the database after importing.

| Role         | Notes                                  |
| ------------ | -------------------------------------- |
| **Admin**    | Account where `id_vai_tro IS NOT NULL` |
| **Customer** | Account where `id_vai_tro IS NULL`     |

---

## 🤝 Contributing

1. Fork the project
2. Create a new branch (`git checkout -b feature/new-feature`)
3. Commit changes (`git commit -m 'Add new feature XYZ'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Open a Pull Request

---

## 📝 Technical Notes

- **Entry Point**: All requests go through `public/index.php` using `.htaccess`.
- **Autoloading**: Utilizes `spl_autoload_register()` following PSR-4 standards.
- **Session**: Login sessions are managed via PHP Session.
- **TailwindCSS v4**:
  - User Pages: Built via CLI (`npm run dev/build`) → output at `public/css/style.css`.
  - Admin Pages: Loaded directly via CDN (`cdn.tailwindcss.com`).
- **Database**: Uses a PDO Singleton (`App\Core\Database::getInstance()`) with Prepared Statements for every query.
- **UUID**: All primary keys use UUID `varchar(36)`, automatically generated by PHP.

---

<div align="center">

**Developed with ❤️ by [ThanhHai15112004](https://github.com/ThanhHai15112004)**

</div>
