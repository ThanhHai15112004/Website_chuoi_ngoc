<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class NhapKhoController extends Controller {
    public function __construct() {
        // Kiểm tra đăng nhập (giả lập)
    }

    public function index() {
        $danhSachPhieuNhap = [
            [
                'id' => 'NK202600123',
                'ncc' => 'Công ty Ngọc An Phát',
                'ma_ncc' => 'NCC000123',
                'kho' => 'Kho online',
                'kho_id' => 'KHO-ONL',
                'tong_sp' => 8,
                'so_luong' => 120,
                'so_luong_nhan' => 118,
                'loi_thieu' => 2,
                'tong_tien' => 35600000,
                'thanh_toan' => 'Công nợ',
                'tien_no' => 12000000,
                'nguoi_tao' => 'Hải Admin',
                'vai_tro' => 'Quản lý kho',
                'nguoi_kiem' => 'Nguyễn Văn A',
                'ngay_tao' => '18/05/2026 09:30',
                'ngay_nhap' => '18/05/2026 16:30',
                'trang_thai' => 'Đã nhập kho'
            ],
            [
                'id' => 'NK202600124',
                'ncc' => 'Xưởng Chế Tác Đá Vạn Xuân',
                'ma_ncc' => 'NCC000124',
                'kho' => 'Kho tổng',
                'kho_id' => 'KHO-TONG',
                'tong_sp' => 3,
                'so_luong' => 500,
                'so_luong_nhan' => null,
                'loi_thieu' => 0,
                'tong_tien' => 125000000,
                'thanh_toan' => 'Đã thanh toán',
                'tien_no' => 0,
                'nguoi_tao' => 'Trần Thị B',
                'vai_tro' => 'Nhân viên kho',
                'nguoi_kiem' => null,
                'ngay_tao' => '19/05/2026 10:15',
                'ngay_nhap' => null,
                'trang_thai' => 'Chờ kiểm hàng'
            ],
            [
                'id' => 'NK202600125',
                'ncc' => 'Phụ Kiện Charm Sài Gòn',
                'ma_ncc' => 'NCC000125',
                'kho' => 'Kho chờ kiểm',
                'kho_id' => 'KHO-CK',
                'tong_sp' => 12,
                'so_luong' => 2000,
                'so_luong_nhan' => 1500,
                'loi_thieu' => 5,
                'tong_tien' => 45000000,
                'thanh_toan' => 'Thanh toán một phần',
                'tien_no' => 20000000,
                'nguoi_tao' => 'Hải Admin',
                'vai_tro' => 'Quản lý kho',
                'nguoi_kiem' => 'Lê Văn C',
                'ngay_tao' => '20/05/2026 08:00',
                'ngay_nhap' => null,
                'trang_thai' => 'Đang kiểm hàng'
            ],
            [
                'id' => 'NK202600126',
                'ncc' => 'Hộp Quà Cao Cấp Bảo Tín',
                'ma_ncc' => 'NCC000126',
                'kho' => 'Kho tổng',
                'kho_id' => 'KHO-TONG',
                'tong_sp' => 2,
                'so_luong' => 1000,
                'so_luong_nhan' => 1000,
                'loi_thieu' => 0,
                'tong_tien' => 15000000,
                'thanh_toan' => 'Chưa thanh toán',
                'tien_no' => 15000000,
                'nguoi_tao' => 'Trần Thị B',
                'vai_tro' => 'Nhân viên kho',
                'nguoi_kiem' => 'Trần Thị B',
                'ngay_tao' => '21/05/2026 14:20',
                'ngay_nhap' => null,
                'trang_thai' => 'Chờ duyệt'
            ],
            [
                'id' => 'NK202600127',
                'ncc' => 'Đá Quý Phong Thủy Tâm Linh',
                'ma_ncc' => 'NCC000127',
                'kho' => 'Kho online',
                'kho_id' => 'KHO-ONL',
                'tong_sp' => 5,
                'so_luong' => 50,
                'so_luong_nhan' => 45,
                'loi_thieu' => 5,
                'tong_tien' => 85000000,
                'thanh_toan' => 'Công nợ',
                'tien_no' => 85000000,
                'nguoi_tao' => 'Hải Admin',
                'vai_tro' => 'Quản lý kho',
                'nguoi_kiem' => 'Nguyễn Văn A',
                'ngay_tao' => '22/05/2026 09:00',
                'ngay_nhap' => '22/05/2026 11:30',
                'trang_thai' => 'Có lỗi / thiếu hàng'
            ],
            [
                'id' => 'NK202600128',
                'ncc' => 'Công ty Ngọc An Phát',
                'ma_ncc' => 'NCC000123',
                'kho' => null,
                'kho_id' => null,
                'tong_sp' => 1,
                'so_luong' => 10,
                'so_luong_nhan' => null,
                'loi_thieu' => 0,
                'tong_tien' => 0,
                'thanh_toan' => 'Chưa thanh toán',
                'tien_no' => 0,
                'nguoi_tao' => 'Hải Admin',
                'vai_tro' => 'Quản lý kho',
                'nguoi_kiem' => null,
                'ngay_tao' => '23/05/2026 15:45',
                'ngay_nhap' => null,
                'trang_thai' => 'Nháp'
            ],
            [
                'id' => 'NK202600129',
                'ncc' => 'Xưởng Dây Chuyền Bạc 925',
                'ma_ncc' => 'NCC000129',
                'kho' => 'Kho tổng',
                'kho_id' => 'KHO-TONG',
                'tong_sp' => 4,
                'so_luong' => 200,
                'so_luong_nhan' => 0,
                'loi_thieu' => 0,
                'tong_tien' => 24000000,
                'thanh_toan' => 'Chưa thanh toán',
                'tien_no' => 24000000,
                'nguoi_tao' => 'Nguyễn Văn A',
                'vai_tro' => 'Nhân viên kho',
                'nguoi_kiem' => null,
                'ngay_tao' => '24/05/2026 08:30',
                'ngay_nhap' => null,
                'trang_thai' => 'Đã hủy'
            ]
        ];

        $this->view('admin_nhap_kho', ['danhSachPhieuNhap' => $danhSachPhieuNhap], 'admin');
    }

    public function create() {
        $this->view('admin_nhap_kho_them', [], 'admin');
    }

    public function edit($id) {
        $this->view('admin_nhap_kho_them', ['id' => $id, 'isEdit' => true], 'admin');
    }

    public function show($id) {
        $this->view('admin_nhap_kho_chitiet', ['id' => $id], 'admin');
    }

    public function check($id) {
        $danhSachKiem = [
            [
                'id' => 'SP001',
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'anh' => 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
                'sku' => 'NB-TL-16-8MM',
                'bien_the' => 'Size 16cm · Hạt 8mm',
                'danh_muc' => 'Vòng tay',
                'don_vi' => 'Vòng',
                'so_luong' => 50,
                'so_luong_nhan' => 50,
                'loi' => 0,
                'thieu' => 0,
                'ket_qua' => 'Đạt'
            ],
            [
                'id' => 'SP002',
                'ten' => 'Nhẫn Tỳ Hưu Cẩm Thạch',
                'anh' => 'https://images.unsplash.com/photo-1605100804763-247f67b454bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
                'sku' => 'N-TH-CT-18',
                'bien_the' => 'Size 18 · Cẩm thạch',
                'danh_muc' => 'Nhẫn',
                'don_vi' => 'Cái',
                'so_luong' => 20,
                'so_luong_nhan' => 18,
                'loi' => 0,
                'thieu' => 2,
                'ket_qua' => 'Thiếu hàng',
                'ly_do' => 'Nhà cung cấp giao thiếu'
            ],
            [
                'id' => 'SP003',
                'ten' => 'Chuỗi Trầm Hương 108 Hạt',
                'anh' => 'https://images.unsplash.com/photo-1599643478514-4a888f61ca78?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
                'sku' => 'C-TH-108-6MM',
                'bien_the' => '108 hạt · 6mm',
                'danh_muc' => 'Chuỗi hạt',
                'don_vi' => 'Chuỗi',
                'so_luong' => 30,
                'so_luong_nhan' => 30,
                'loi' => 3,
                'thieu' => 0,
                'ket_qua' => 'Có hàng lỗi',
                'ly_do' => 'Hạt bị nứt/mẻ',
                'ghi_chu' => 'Gói riêng hàng lỗi gửi trả'
            ],
            [
                'id' => 'SP004',
                'ten' => 'Mặt Dây Chuyền Quan Âm Đá Sapphire',
                'anh' => 'https://images.unsplash.com/photo-1599643477874-5c866f466b0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
                'sku' => 'MDC-QA-SP',
                'bien_the' => 'Sapphire xanh',
                'danh_muc' => 'Mặt dây chuyền',
                'don_vi' => 'Mặt',
                'so_luong' => 20,
                'so_luong_nhan' => 0,
                'loi' => 0,
                'thieu' => 0,
                'ket_qua' => 'Chưa kiểm'
            ]
        ];

        $this->view('admin_nhap_kho_kiem', [
            'id' => $id, 
            'danhSachKiem' => $danhSachKiem
        ], 'admin');
    }
}
