<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class TongQuanController extends Controller {
    public function index() {
        // Mock data for Dashboard
        $dashboardModel = new \App\Models\Admin\TongQuanModel();

        $data = [
            'tieu_de' => 'Tổng quan - Chuỗi Ngọc Phong Thủy',
            'thong_ke_nhanh' => $dashboardModel->getThongKeNhanh(),
            'don_hang_moi_nhat' => $dashboardModel->getDonHangMoiNhat(5),
            'san_pham_ban_chay' => $dashboardModel->getSanPhamBanChay(3),
            'san_pham_ban_cham' => $dashboardModel->getSanPhamBanCham(5),
            'canh_bao_ton_kho' => $dashboardModel->getCanhBaoTonKho(),
            'khach_hang_moi_nhat' => $dashboardModel->getKhachHangMoiNhat(5),
            'khuyen_mai_dang_chay' => $dashboardModel->getKhuyenMaiDangChay(5),
            'hoat_dong_gan_day' => $dashboardModel->getHoatDongGanDay(5),
            'bieu_do_doanh_thu' => $dashboardModel->getBieuDoDoanhThu()
        ];

        $this->view('admin_tong_quan', $data, 'admin');
    }
}
