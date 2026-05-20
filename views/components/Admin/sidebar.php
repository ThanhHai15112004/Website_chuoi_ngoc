<?php
// views/components/Admin/sidebar.php

$current_page = $current_page ?? 'dashboard';
?>
<aside class="w-64 bg-white border-r border-gray-200 h-screen flex flex-col hidden md:flex flex-shrink-0 z-20 shadow-sm">
    <!-- Logo -->
    <div class="h-20 flex items-center px-6 border-b border-gray-200">
        <a href="<?= APP_URL ?>/admin/dashboard" class="flex items-center gap-2">
            <span class="iconify text-red-900 text-3xl" data-icon="mdi:diamond-stone"></span>
            <div>
                <h1 class="text-lg font-bold text-red-900 leading-tight">Chuỗi Ngọc</h1>
                <p class="text-[11px] text-gray-500 font-medium uppercase tracking-wider">Admin Panel</p>
            </div>
        </a>
    </div>

    <!-- Navigation -->
    <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-2">Tổng quan</p>
        <a href="<?= APP_URL ?>/admin/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'dashboard' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors">
            <span class="iconify text-xl <?= $current_page === 'dashboard' ? 'text-red-900' : 'text-gray-400' ?>" data-icon="mdi:view-dashboard-outline"></span>
            Dashboard
        </a>
        
        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">Quản lý bán hàng</p>
        <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg <?= $current_page === 'don_hang' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <div class="flex items-center gap-3">
                <span class="iconify text-xl <?= $current_page === 'don_hang' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:cart-outline"></span>
                Quản lý đơn hàng
            </div>
            <span class="bg-red-100 text-red-800 text-[10px] font-bold px-2 py-0.5 rounded-full">12</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'chi_tiet_don_hang' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'chi_tiet_don_hang' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:file-document-outline"></span>
            Chi tiết đơn hàng
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'voucher' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'voucher' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:ticket-percent-outline"></span>
            Quản lý voucher
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'khuyen_mai' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'khuyen_mai' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:sale"></span>
            Quản lý khuyến mãi SP
        </a>

        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">Quản lý sản phẩm</p>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'san_pham' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'san_pham' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:package-variant-closed"></span>
            Quản lý sản phẩm
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'them_san_pham' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'them_san_pham' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:plus-box-outline"></span>
            Thêm / sửa sản phẩm
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'danh_muc' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'danh_muc' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:shape-outline"></span>
            Quản lý danh mục
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'loai_da' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'loai_da' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:diamond-stone"></span>
            Quản lý loại đá / ngọc
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'menh_phong_thuy' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'menh_phong_thuy' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:yin-yang"></span>
            Quản lý mệnh phong thủy
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'binh_luan' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'binh_luan' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:comment-text-outline"></span>
            Quản lý bình luận / đánh giá
        </a>
        
        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">Khách hàng & Tương tác</p>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'khach_hang' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'khach_hang' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:account-group-outline"></span>
            Quản lý khách hàng
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'chi_tiet_khach_hang' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'chi_tiet_khach_hang' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:account-details-outline"></span>
            Chi tiết khách hàng
        </a>
        <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-lg <?= $current_page === 'hop_thu' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <div class="flex items-center gap-3">
                <span class="iconify text-xl <?= $current_page === 'hop_thu' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:email-outline"></span>
                Quản lý hộp thư / thông báo
            </div>
            <span class="bg-red-100 text-red-800 text-[10px] font-bold px-2 py-0.5 rounded-full">5</span>
        </a>

        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">Nội dung & Giao diện</p>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'bai_viet' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'bai_viet' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:post-outline"></span>
            Quản lý bài viết
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'banner' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'banner' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:image-multiple-outline"></span>
            Quản lý banner / trang chủ
        </a>

        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">Báo cáo & Thống kê</p>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'bao_cao_doanh_thu' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'bao_cao_doanh_thu' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:chart-line"></span>
            Báo cáo doanh thu
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'bao_cao_san_pham' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'bao_cao_san_pham' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:chart-bar"></span>
            Báo cáo sản phẩm
        </a>

        <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">Hệ thống & Cấu hình</p>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'nhan_vien' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'nhan_vien' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:badge-account-horizontal-outline"></span>
            Quản lý nhân viên
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'phan_quyen' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'phan_quyen' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:shield-account-outline"></span>
            Trang phân quyền
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'cau_hinh' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
            <span class="iconify text-xl <?= $current_page === 'cau_hinh' ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?> transition-colors" data-icon="mdi:cog-outline"></span>
            Cấu hình cửa hàng
        </a>
    </div>
    
    <!-- User / Logout Bottom Area -->
    <div class="p-4 border-t border-gray-200 bg-gray-50/50">
        <a href="<?= APP_URL ?>/admin/dang-nhap" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-red-50 hover:text-red-900 hover:border-red-200 transition-all font-medium text-sm">
            <span class="iconify text-lg" data-icon="mdi:logout"></span>
            Đăng xuất
        </a>
    </div>
</aside>
