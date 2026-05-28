<?php
// app/Controllers/Admin/ThuyenChuyenController.php

namespace App\Controllers\Admin;

use App\Core\Controller;

class ThuyenChuyenController extends Controller
{
    private function getMockDanhSach()
    {
        return [
            [
                'id' => 'CK202600123',
                'kho_gui' => 'Kho tổng',
                'kho_nhan' => 'Kho online',
                'san_pham' => [
                    ['ten' => 'Vòng Ngọc Bích Tài Lộc', 'sku' => 'NB-TL-001', 'size' => '16cm', 'hinh_anh' => 'https://via.placeholder.com/60', 'so_luong' => 20]
                ],
                'tong_sl' => 20,
                'nguoi_tao' => 'Hải Admin',
                'vai_tro_tao' => 'Nhân viên kho',
                'ngay_tao' => '18/05/2026 09:30',
                'nguoi_duyet' => 'Quản lý kho',
                'ngay_chuyen' => '18/05/2026 10:00',
                'ngay_nhan' => '18/05/2026 16:30',
                'trang_thai' => 'Đã hoàn tất',
                'ghi_chu' => 'Chuyển gấp để xử lý đơn hàng cuối tuần.',
                'gap' => false
            ],
            [
                'id' => 'CK202600124',
                'kho_gui' => 'Kho tổng',
                'kho_nhan' => 'Kho cửa hàng',
                'san_pham' => [
                    ['ten' => 'Vòng Tay Thạch Anh Tóc Vàng', 'sku' => 'TA-TV-001', 'size' => '10ly', 'hinh_anh' => 'https://via.placeholder.com/60', 'so_luong' => 5],
                    ['ten' => 'Nhẫn Tỳ Hưu Ruby', 'sku' => 'NH-TH-002', 'size' => 'Freesize', 'hinh_anh' => 'https://via.placeholder.com/60', 'so_luong' => 2]
                ],
                'tong_sl' => 7,
                'nguoi_tao' => 'Linh NV',
                'vai_tro_tao' => 'Nhân viên cửa hàng',
                'ngay_tao' => '19/05/2026 08:15',
                'nguoi_duyet' => 'Chưa duyệt',
                'ngay_chuyen' => 'Chưa chuyển',
                'ngay_nhan' => 'Chưa nhận hàng',
                'trang_thai' => 'Chờ xác nhận',
                'ghi_chu' => 'Bổ sung hàng trưng bày',
                'gap' => true
            ],
            [
                'id' => 'CK202600125',
                'kho_gui' => 'Kho chờ kiểm',
                'kho_nhan' => 'Kho sẵn bán',
                'san_pham' => [
                    ['ten' => 'Mặt Dây Chuyền Hồ Ly', 'sku' => 'MD-HL-001', 'size' => 'Tiêu chuẩn', 'hinh_anh' => 'https://via.placeholder.com/60', 'so_luong' => 15]
                ],
                'tong_sl' => 15,
                'nguoi_tao' => 'Khoa NV',
                'vai_tro_tao' => 'KCS',
                'ngay_tao' => '19/05/2026 11:00',
                'nguoi_duyet' => 'Hải Admin',
                'ngay_chuyen' => '19/05/2026 13:30',
                'ngay_nhan' => 'Chưa nhận hàng',
                'trang_thai' => 'Đang chuyển',
                'ghi_chu' => 'Đã kiểm tra chất lượng đá OK',
                'gap' => false
            ],
            [
                'id' => 'CK202600126',
                'kho_gui' => 'Kho cửa hàng',
                'kho_nhan' => 'Kho lỗi / bảo hành',
                'san_pham' => [
                    ['ten' => 'Vòng Mã Não Đỏ', 'sku' => 'MN-D-001', 'size' => '8ly', 'hinh_anh' => 'https://via.placeholder.com/60', 'so_luong' => 2]
                ],
                'tong_sl' => 2,
                'nguoi_tao' => 'Hương NV',
                'vai_tro_tao' => 'Thu ngân',
                'ngay_tao' => '19/05/2026 14:20',
                'nguoi_duyet' => 'Hải Admin',
                'ngay_chuyen' => '19/05/2026 15:00',
                'ngay_nhan' => '19/05/2026 15:30',
                'trang_thai' => 'Có lỗi / thiếu hàng',
                'ghi_chu' => 'KH trả lại do xước, chỉ nhận được 1',
                'thiếu' => 1,
                'gap' => false
            ]
        ];
    }

    public function index()
    {
        $danhSach = $this->getMockDanhSach();
        
        $stats = [
            'tong' => 128,
            'cho_xac_nhan' => 8,
            'dang_chuyen' => 5,
            'hoan_tat' => 102,
            'da_huy' => 7,
            'sp_chuyen' => 1240,
            'co_loi' => 3
        ];

        $this->view('admin_thuyen_chuyen', [
            'current_page' => 'thuyen_chuyen_kho',
            'danhSach' => $danhSach,
            'stats' => $stats
        ], 'admin');
    }

    public function taoMoi()
    {
        // Mock data kho hàng
        $dsKho = ['Kho tổng', 'Kho online', 'Kho cửa hàng', 'Kho chờ kiểm', 'Kho sẵn bán', 'Kho lỗi / bảo hành'];

        $this->view('admin_thuyen_chuyen_them', [
            'current_page' => 'thuyen_chuyen_kho',
            'dsKho' => $dsKho
        ], 'admin');
    }

    public function chiTiet($id)
    {
        $ds = $this->getMockDanhSach();
        $phieu = null;
        foreach($ds as $item) {
            if ($item['id'] === $id) {
                $phieu = $item;
                break;
            }
        }
        if (!$phieu) {
            $phieu = $ds[0]; // Fallback
        }

        // Mock Timeline process
        $timeline = [
            ['step' => 1, 'title' => 'Tạo phiếu', 'time' => $phieu['ngay_tao'], 'actor' => $phieu['nguoi_tao'], 'status' => 'completed'],
            ['step' => 2, 'title' => 'Duyệt phiếu', 'time' => $phieu['trang_thai'] != 'Chờ xác nhận' ? $phieu['ngay_tao'] : '', 'actor' => $phieu['nguoi_duyet'], 'status' => $phieu['trang_thai'] == 'Chờ xác nhận' ? 'pending' : 'completed'],
            ['step' => 3, 'title' => 'Bắt đầu chuyển', 'time' => $phieu['ngay_chuyen'], 'actor' => 'Nhân viên kho', 'status' => in_array($phieu['trang_thai'], ['Đang chuyển', 'Đã hoàn tất', 'Có lỗi / thiếu hàng']) ? 'completed' : 'pending'],
            ['step' => 4, 'title' => 'Nhận hàng', 'time' => $phieu['ngay_nhan'], 'actor' => 'Kho nhận', 'status' => in_array($phieu['trang_thai'], ['Đã hoàn tất', 'Có lỗi / thiếu hàng']) ? 'completed' : 'pending'],
        ];

        $this->view('admin_thuyen_chuyen_chitiet', [
            'current_page' => 'thuyen_chuyen_kho',
            'phieu' => $phieu,
            'timeline' => $timeline
        ], 'admin');
    }
}
