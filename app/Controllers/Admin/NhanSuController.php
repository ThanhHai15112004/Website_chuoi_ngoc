<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class NhanSuController extends Controller
{
    public function index()
    {
        // Mock data cho danh sách nhân sự
        $staffs = [
            [
                'id' => 1,
                'name' => 'Hải Admin',
                'code' => 'NV0001',
                'email' => 'thanhhai@example.com',
                'phone' => '0901234567',
                'role' => 'Super Admin',
                'department' => 'Quản trị',
                'permissions' => ['Toàn quyền hệ thống'],
                'status' => 'Đang hoạt động',
                'last_login' => '18/05/2026 09:30',
                'created_at' => '01/01/2026',
                'creator' => 'Hệ thống',
                'avatar' => 'https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff'
            ],
            [
                'id' => 2,
                'name' => 'Nguyễn Văn Kho',
                'code' => 'NV0002',
                'email' => 'vankho@example.com',
                'phone' => '0987654321',
                'role' => 'Quản lý kho',
                'department' => 'Kho',
                'permissions' => ['Kho', 'Sản phẩm'],
                'status' => 'Đang hoạt động',
                'last_login' => '18/05/2026 08:15',
                'created_at' => '15/02/2026',
                'creator' => 'Hải Admin',
                'avatar' => 'https://ui-avatars.com/api/?name=Van+Kho&background=e0f2fe&color=0369a1'
            ],
            [
                'id' => 3,
                'name' => 'Trần Thị Chăm Sóc',
                'code' => 'NV0003',
                'email' => 'chamsoc@example.com',
                'phone' => '0912345678',
                'role' => 'CSKH',
                'department' => 'CSKH',
                'permissions' => ['Đơn hàng', 'Khách hàng'],
                'status' => 'Chờ kích hoạt',
                'last_login' => 'Chưa từng đăng nhập',
                'created_at' => '17/05/2026',
                'creator' => 'Hải Admin',
                'avatar' => 'https://ui-avatars.com/api/?name=Cham+Soc&background=fef3c7&color=b45309'
            ],
            [
                'id' => 4,
                'name' => 'Lê Kế Toán',
                'code' => 'NV0004',
                'email' => 'ketoan@example.com',
                'phone' => 'Chưa cập nhật',
                'role' => 'Kế toán / báo cáo',
                'department' => 'Kế toán',
                'permissions' => ['Báo cáo', 'Thanh toán'],
                'status' => 'Bị khóa',
                'last_login' => '01/05/2026 17:00',
                'created_at' => '10/03/2026',
                'creator' => 'Hải Admin',
                'avatar' => 'https://ui-avatars.com/api/?name=Ke+Toan&background=fee2e2&color=991b1b'
            ],
            [
                'id' => 5,
                'name' => 'Phạm Bán Hàng',
                'code' => 'NV0005',
                'email' => 'banhang@example.com',
                'phone' => '0933445566',
                'role' => 'Nhân viên bán hàng',
                'department' => 'Bán hàng',
                'permissions' => ['Đơn hàng', 'Khách hàng', 'Voucher'],
                'status' => 'Đang hoạt động',
                'last_login' => '17/05/2026 19:20',
                'created_at' => '20/04/2026',
                'creator' => 'Hải Admin',
                'avatar' => 'https://ui-avatars.com/api/?name=Ban+Hang&background=f3e8ff&color=7e22ce'
            ],
        ];

        $this->view('admin_nhan_su', [
            'title' => 'Quản lý nhân sự',
            'current_page' => 'nhan_su',
            'staffs' => $staffs
        ], 'admin');
    }

    public function taoMoi()
    {
        $this->view('admin_nhan_su_form', [
            'title' => 'Thêm nhân viên',
            'current_page' => 'nhan_su'
        ], 'admin');
    }

    public function chiTiet($id)
    {
        $this->view('admin_nhan_su_view', [
            'title' => 'Chi tiết nhân viên',
            'current_page' => 'nhan_su',
            'id' => $id
        ], 'admin');
    }

    public function trangCapNhat($id)
    {
        $this->view('admin_nhan_su_form', [
            'title' => 'Sửa thông tin nhân viên',
            'current_page' => 'nhan_su',
            'id' => $id
        ], 'admin');
    }

    public function roles()
    {
        $this->view('admin_vai_tro', [
            'title' => 'Quản lý vai trò',
            'current_page' => 'nhan_su'
        ], 'admin');
    }
}
