<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class NhatKyHoatDongController extends Controller
{
    public function index()
    {
        // Mock data
        $logs = [
            [
                'id' => 'LOG-1005',
                'time' => '18/05/2026 09:30:15',
                'user' => ['name' => 'Hải Admin', 'role' => 'Super Admin', 'avatar' => 'https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff'],
                'action' => 'Đăng nhập thành công',
                'module' => 'Đăng nhập',
                'target' => null,
                'target_id' => null,
                'changes' => null,
                'ip' => '113.160.22.1',
                'device' => 'Chrome · Windows',
                'level' => 'Bình thường'
            ],
            [
                'id' => 'LOG-1004',
                'time' => '18/05/2026 09:25:00',
                'user' => ['name' => 'Lan CSKH', 'role' => 'CSKH', 'avatar' => 'https://ui-avatars.com/api/?name=Lan+CSKH&background=7c3aed&color=fff'],
                'action' => 'Đổi trạng thái đơn',
                'module' => 'Đơn hàng',
                'target' => 'DH202600123',
                'target_name' => 'Nguyễn Văn A',
                'changes' => ['old' => 'Chờ xác nhận', 'new' => 'Đã xác nhận'],
                'ip' => '14.162.20.10',
                'device' => 'Safari · Mac OS',
                'level' => 'Quan trọng'
            ],
            [
                'id' => 'LOG-1003',
                'time' => '18/05/2026 09:05:12',
                'user' => ['name' => 'Hải Admin', 'role' => 'Super Admin', 'avatar' => 'https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff'],
                'action' => 'Cập nhật sản phẩm',
                'module' => 'Sản phẩm',
                'target' => 'SP000123',
                'target_name' => 'Vòng Ngọc Bích Tài Lộc',
                'changes' => ['old' => 'Giá bán: 850.000đ', 'new' => 'Giá bán: 790.000đ'],
                'ip' => '113.160.22.1',
                'device' => 'Chrome · Windows',
                'level' => 'Quan trọng'
            ],
            [
                'id' => 'LOG-1002',
                'time' => '17/05/2026 15:20:00',
                'user' => ['name' => 'Hải Admin', 'role' => 'Super Admin', 'avatar' => 'https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff'],
                'action' => 'Xóa sản phẩm',
                'module' => 'Sản phẩm',
                'target' => 'SP000089',
                'target_name' => 'Vòng tay thạch anh hồng cũ',
                'changes' => ['old' => 'Tồn tại', 'new' => 'Đã bị xóa'],
                'ip' => '113.160.22.1',
                'device' => 'Chrome · Windows',
                'level' => 'Nguy hiểm'
            ],
            [
                'id' => 'LOG-1001',
                'time' => '17/05/2026 14:15:30',
                'user' => ['name' => 'Tuấn Kho', 'role' => 'Quản lý kho', 'avatar' => 'https://ui-avatars.com/api/?name=Tuan+Kho&background=2563eb&color=fff'],
                'action' => 'Điều chỉnh kho',
                'module' => 'Kho hàng',
                'target' => 'SP000123',
                'target_name' => 'Vòng Ngọc Bích Tài Lộc - Size 16cm',
                'changes' => ['old' => 'Tồn kho: 25', 'new' => 'Tồn kho: 20'],
                'ip' => '115.79.14.22',
                'device' => 'Edge · Windows',
                'level' => 'Nguy hiểm'
            ],
            [
                'id' => 'LOG-1000',
                'time' => '16/05/2026 23:15:00',
                'user' => ['name' => 'Chưa rõ', 'role' => 'Khách', 'avatar' => 'https://ui-avatars.com/api/?name=Unknown&background=ef4444&color=fff'],
                'action' => 'Đăng nhập thất bại',
                'module' => 'Đăng nhập',
                'target' => null,
                'target_name' => null,
                'changes' => ['old' => '', 'new' => 'Sai mật khẩu (Tài khoản: admin@chuoingoc.com)'],
                'ip' => '103.22.11.5',
                'device' => 'Safari · iOS',
                'level' => 'Bảo mật'
            ],
            [
                'id' => 'LOG-0999',
                'time' => '16/05/2026 10:00:00',
                'user' => ['name' => 'Hải Admin', 'role' => 'Super Admin', 'avatar' => 'https://ui-avatars.com/api/?name=Hai+Admin&background=6B0D18&color=fff'],
                'action' => 'Đổi phân quyền',
                'module' => 'Nhân sự',
                'target' => 'NV0005',
                'target_name' => 'Lan CSKH',
                'changes' => ['old' => 'Vai trò: Nhân viên bán hàng', 'new' => 'Vai trò: CSKH'],
                'ip' => '113.160.22.1',
                'device' => 'Chrome · Windows',
                'level' => 'Nguy hiểm'
            ]
        ];

        $this->view('admin_nhat_ky', [
            'title' => 'Nhật ký hoạt động',
            'current_page' => 'nhat_ky',
            'logs' => $logs
        ], 'admin');
    }
}
