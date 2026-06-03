---
trigger: always_on
---

# THÔNG TIN DỰ ÁN & TECH STACK

- Tên dự án: Web Bán Hàng Chuỗi Ngọc (Trang sức phong thủy)
- Tech Stack: PHP thuần (Vanilla PHP không dùng framework), MySQL (PDO), TailwindCSS v4.
- Kiến trúc: Custom MVC (Model - View - Controller - Service).
- Entry point: `public/index.php`. File `.htaccess` định tuyến mọi request về đây.

# QUY TẮC VIẾT CODE CHUNG (GENERAL RULES)

1. TUYỆT ĐỐI KHÔNG SỬ DỤNG syntax hay helper của các PHP Framework (Laravel, Symfony, CodeIgniter...). Chỉ dùng PHP thuần và kiến trúc có sẵn của dự án.
2. Tuân thủ chuẩn PSR-4 cho Autoloading, namespace phải tương ứng với cấu trúc thư mục (vd: `App\Controllers\Admin`, `App\Models\Admin`).
3. Sử dụng các hằng số được định nghĩa sẵn trong thư mục `app/Constants/` thay vì hardcode giá trị (ví dụ: trạng thái đơn hàng, role).

# QUY TẮC KIẾN TRÚC (ARCHITECTURE RULES)

Viết code phải tuân thủ luồng: Route -> Controller -> Service -> Model -> View.

1. **Router (`routes/web.php` & `routes/admin.php`):**
   - Định nghĩa route bằng regex cơ bản thông qua class `Router`.
   - Các API route của admin có prefix dạng `/admin/{module}/api/{action}` và trả về JSON.
2. **Controller (`app/Controllers/`):**
   - Kế thừa từ `App\Core\Controller`.
   - Controller CHỈ nhận request, validate dữ liệu đầu vào cơ bản, gọi Service, và trả về View/JSON. KHÔNG viết logic query database ở đây.
   - Trả về View bằng hàm: `return $this->view('pages/tên_view', $data, 'layout_tên');`.
3. **Service (`app/Services/`):**
   - Xử lý toàn bộ logic nghiệp vụ (Business Logic).
   - Đứng giữa Controller và Model để map dữ liệu, xử lý tính toán, gọi email, thông báo...
4. **Model (`app/Models/`):**
   - Chỉ dùng để tương tác với Database bằng thư viện PDO thuần thông qua Singleton `App\Core\Database::getInstance()`.
   - Sử dụng Prepared Statements cho MỌI query để chống SQL Injection. Không nối chuỗi SQL trực tiếp.
   - Ghi chú: Không tạo file ở `app/Models/User/`, trang khách hàng dùng chung Model với thư mục `Admin`.

# QUY TẮC CƠ SỞ DỮ LIỆU (DATABASE RULES)

1. **Khóa chính (Primary Key):** Toàn bộ PK trong dự án đều dùng UUID (`varchar(36)`). Khi insert bản ghi mới, luôn phải tự gen UUID bằng PHP.
2. **Bảng `nguoi_dung`:** Dùng chung cho cả Admin/Staff và Khách hàng.
   - Rule nhận diện: Khách hàng có `id_vai_tro` là `NULL`. Admin/Staff có `id_vai_tro` khác NULL.
3. Chú ý các logic xóa mềm (Soft Delete) nếu có (như với bảng `san_pham`).

# QUY TẮC FRONTEND & VIEW (VIEW RULES)

1. Layout system sử dụng `ob_start()` buffer.
2. **TailwindCSS:**
   - Trang User (`views/layouts/main.php`): Sử dụng class build từ Tailwind CLI (`style.css`).
   - Trang Admin (`views/layouts/admin.php`): Sử dụng Tailwind qua CDN (`cdn.tailwindcss.com`).
3. **Components:** Để render các partial view (tái sử dụng), dùng helper function: `component('ThưMuc/TenComponent', ['key' => $value])`.
4. Không dùng framework JS lớn (như React/Vue), chỉ viết Vanilla JS, DOM manipulation cơ bản hoặc sử dụng các thư viện đã khai báo (Swiper, Chart.js, AOS).

# QUY TẮC BỔ SUNG (MISC RULES)

- **Gửi Email:** Dùng file `app/Core/MailHelper.php` (sử dụng raw SMTP socket), không dùng PHPMailer hay thư viện ngoài.
- **Tiền tệ:** Luôn format tiền tệ bằng hàm helper `format_currency_short()` (nếu có) trước khi hiển thị.
