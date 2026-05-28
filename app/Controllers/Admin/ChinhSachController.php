<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class ChinhSachController extends Controller
{
    public function index()
    {
        // Mock data
        $policies = [
            ['id' => 1, 'name' => 'Chính sách đổi trả', 'type' => 'Đổi trả', 'slug' => 'chinh-sach-doi-tra', 'locations' => ['Footer', 'Checkout'], 'status' => 'Đang hiển thị', 'seo' => 'Tốt', 'updated_at' => '18/05/2026', 'updater' => 'Hải Admin'],
            ['id' => 2, 'name' => 'Chính sách bảo hành', 'type' => 'Bảo hành', 'slug' => 'chinh-sach-bao-hanh', 'locations' => ['Footer', 'Trang sản phẩm'], 'status' => 'Đang hiển thị', 'seo' => 'Tốt', 'updated_at' => '17/05/2026', 'updater' => 'Hải Admin'],
            ['id' => 3, 'name' => 'Chính sách vận chuyển', 'type' => 'Vận chuyển', 'slug' => 'chinh-sach-van-chuyen', 'locations' => ['Footer', 'Checkout'], 'status' => 'Đang hiển thị', 'seo' => 'Cần tối ưu', 'updated_at' => '15/05/2026', 'updater' => 'Super Admin'],
            ['id' => 4, 'name' => 'Chính sách bảo mật', 'type' => 'Bảo mật', 'slug' => 'chinh-sach-bao-mat', 'locations' => ['Footer', 'Đăng ký'], 'status' => 'Cần cập nhật', 'seo' => 'Tốt', 'updated_at' => '10/05/2026', 'updater' => 'Hải Admin'],
            ['id' => 5, 'name' => 'Chính sách thanh toán', 'type' => 'Thanh toán', 'slug' => 'chinh-sach-thanh-toan', 'locations' => ['Checkout'], 'status' => 'Đang hiển thị', 'seo' => 'Thiếu meta', 'updated_at' => '05/05/2026', 'updater' => 'Hải Admin'],
            ['id' => 6, 'name' => 'Điều khoản sử dụng', 'type' => 'Điều khoản', 'slug' => 'dieu-khoan-su-dung', 'locations' => ['Footer'], 'status' => 'Đang ẩn', 'seo' => 'Chưa kiểm tra', 'updated_at' => '01/05/2026', 'updater' => 'Super Admin'],
            ['id' => 7, 'name' => 'Hướng dẫn mua hàng', 'type' => 'Hướng dẫn', 'slug' => 'huong-dan-mua-hang', 'locations' => [], 'status' => 'Bản nháp', 'seo' => 'Chưa kiểm tra', 'updated_at' => '20/05/2026', 'updater' => 'Hải Admin'],
            ['id' => 8, 'name' => 'Chính sách kiểm hàng', 'type' => 'Kiểm hàng', 'slug' => 'chinh-sach-kiem-hang', 'locations' => ['Trang sản phẩm'], 'status' => 'Đang hiển thị', 'seo' => 'Tốt', 'updated_at' => '18/05/2026', 'updater' => 'Hải Admin'],
        ];

        $this->view('admin_chinh_sach', [
            'title' => 'Chính sách cửa hàng',
            'current_page' => 'chinh_sach',
            'policies' => $policies
        ], 'admin');
    }

    public function taoMoi()
    {
        $this->view('admin_chinh_sach_form', [
            'title' => 'Thêm chính sách',
            'current_page' => 'chinh_sach'
        ], 'admin');
    }

    public function trangCapNhat($id)
    {
        $this->view('admin_chinh_sach_form', [
            'title' => 'Sửa chính sách',
            'current_page' => 'chinh_sach',
            'id' => $id
        ], 'admin');
    }
}
