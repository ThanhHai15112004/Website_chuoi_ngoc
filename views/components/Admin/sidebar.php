<?php
// views/components/Admin/sidebar.php

$current_page = $current_page ?? 'dashboard';

// Define groups
$ban_hang_pages = ['don_hang', 'chi_tiet_don_hang', 'voucher', 'khuyen_mai'];
$san_pham_pages = ['san_pham', 'chi_tiet_san_pham', 'them_san_pham', 'danh_muc', 'loai_da', 'menh_phong_thuy', 'binh_luan'];
$khach_hang_pages = ['khach_hang', 'chi_tiet_khach_hang', 'them_khach_hang', 'hop_thu', 'hang_thanh_vien'];
$noi_dung_pages = ['bai_viet', 'banner'];
$bao_cao_pages = ['bao_cao_doanh_thu', 'bao_cao_san_pham'];
$he_thong_pages = ['nhan_vien', 'phan_quyen', 'cau_hinh'];

function isGroupActive($pages, $current) {
    return in_array($current, $pages);
}
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
    <div class="flex-1 overflow-y-auto py-4 px-3 space-y-2 sidebar-scroll">
        
        <!-- Dashboard -->
        <a href="<?= APP_URL ?>/admin/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg <?= $current_page === 'dashboard' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors">
            <span class="iconify text-xl <?= $current_page === 'dashboard' ? 'text-red-900' : 'text-gray-400' ?>" data-icon="mdi:view-dashboard-outline"></span>
            Tổng quan
        </a>

        <!-- Quản lý bán hàng -->
        <?php $isActive = isGroupActive($ban_hang_pages, $current_page); ?>
        <div class="sidebar-group">
            <button onclick="toggleSidebarGroup(this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg <?= $isActive ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="iconify text-xl <?= $isActive ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?>" data-icon="mdi:cart-outline"></span>
                    Quản lý bán hàng
                </div>
                <span class="iconify text-lg transition-transform duration-300 <?= $isActive ? 'rotate-180 text-red-900' : 'text-gray-400' ?>" data-icon="mdi:chevron-down"></span>
            </button>
            <div class="overflow-hidden transition-all duration-300 <?= $isActive ? 'max-h-[500px]' : 'max-h-0' ?>">
                <div class="mt-1 ml-4 pl-4 border-l border-gray-100 space-y-1">
                    <a href="<?= APP_URL ?>/admin/don-hang" class="flex items-center justify-between px-3 py-2 rounded-lg <?= $current_page === 'don_hang' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'don_hang' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:receipt-text-outline"></span> Đơn hàng</span>
                        <span class="<?= $current_page === 'don_hang' ? 'bg-white/20 text-white' : 'bg-red-100 text-red-800' ?> text-[10px] font-bold px-2 py-0.5 rounded-full">12</span>
                    </a>

                    <a href="<?= APP_URL ?>/admin/voucher" class="flex items-center justify-between px-3 py-2 rounded-lg <?= $current_page === 'voucher' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'voucher' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:ticket-percent-outline"></span> Quản lý voucher</span>
                    </a>
                    <a href="<?= APP_URL ?>/admin/khuyen-mai" class="flex items-center justify-between px-3 py-2 rounded-lg <?= $current_page === 'khuyen_mai' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'khuyen_mai' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:sale"></span> Khuyến mãi SP</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Quản lý sản phẩm -->
        <?php $isActive = isGroupActive($san_pham_pages, $current_page); ?>
        <div class="sidebar-group">
            <button onclick="toggleSidebarGroup(this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg <?= $isActive ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="iconify text-xl <?= $isActive ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?>" data-icon="mdi:package-variant-closed"></span>
                    Quản lý sản phẩm
                </div>
                <span class="iconify text-lg transition-transform duration-300 <?= $isActive ? 'rotate-180 text-red-900' : 'text-gray-400' ?>" data-icon="mdi:chevron-down"></span>
            </button>
            <div class="overflow-hidden transition-all duration-300 <?= $isActive ? 'max-h-[500px]' : 'max-h-0' ?>">
                <div class="mt-1 ml-4 pl-4 border-l border-gray-100 space-y-1">
                    <a href="<?= APP_URL ?>/admin/san-pham" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'san_pham' || $current_page === 'chi_tiet_san_pham' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Danh sách sản phẩm
                    </a>
                    <a href="<?= APP_URL ?>/admin/san-pham/them" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'them_san_pham' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Thêm sản phẩm
                    </a>
                    <a href="<?= APP_URL ?>/admin/danh-muc" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'danh_muc' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Quản lý danh mục
                    </a>
                    <a href="<?= APP_URL ?>/admin/loai-da" class="flex items-center justify-between px-3 py-2 rounded-lg <?= $current_page === 'loai_da' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'loai_da' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:diamond-stone"></span> Loại đá / ngọc</span>
                    </a>
                    <a href="<?= APP_URL ?>/admin/menh-phong-thuy" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'menh_phong_thuy' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'menh_phong_thuy' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:yin-yang"></span> Mệnh phong thủy</span>
                    </a>
                    <a href="<?= APP_URL ?>/admin/binh-luan" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'binh_luan' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'binh_luan' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:comment-quote-outline"></span> Bình luận / đánh giá</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Khách hàng & Tương tác -->
        <?php $isActive = isGroupActive($khach_hang_pages, $current_page); ?>
        <div class="sidebar-group">
            <button onclick="toggleSidebarGroup(this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg <?= $isActive ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="iconify text-xl <?= $isActive ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?>" data-icon="mdi:account-group-outline"></span>
                    Quản lý khách hàng
                </div>
                <span class="iconify text-lg transition-transform duration-300 <?= $isActive ? 'rotate-180 text-red-900' : 'text-gray-400' ?>" data-icon="mdi:chevron-down"></span>
            </button>
            <div class="overflow-hidden transition-all duration-300 <?= $isActive ? 'max-h-[500px]' : 'max-h-0' ?>">
                <div class="mt-1 ml-4 pl-4 border-l border-gray-100 space-y-1">
                    <a href="<?= APP_URL ?>/admin/khach-hang" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'khach_hang' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'khach_hang' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:account-group-outline"></span> Quản lý khách hàng</span>
                    </a>
                    <a href="<?= APP_URL ?>/admin/khach-hang/them" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'them_khach_hang' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'them_khach_hang' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:account-plus-outline"></span> Thêm khách hàng</span>
                    </a>
                    <a href="<?= APP_URL ?>/admin/khach-hang/hang-thanh-vien" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'hang_thanh_vien' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'hang_thanh_vien' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:star-circle-outline"></span> Quản lý hạng thành viên</span>
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'chi_tiet_khach_hang' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm <?= $current_page !== 'chi_tiet_khach_hang' ? 'hidden' : '' ?>">
                        Chi tiết khách hàng
                    </a>
                    <a href="<?= APP_URL ?>/admin/notification" class="flex items-center justify-between px-3 py-2 rounded-lg <?= $current_page === 'hop_thu' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'hop_thu' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:email-outline"></span> Hộp thư / thông báo</span>
                        <span class="<?= $current_page === 'hop_thu' ? 'bg-white/20 text-white' : 'bg-red-100 text-red-800' ?> text-[10px] font-bold px-2 py-0.5 rounded-full">5</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Nội dung & Giao diện -->
        <?php $isActive = isGroupActive($noi_dung_pages, $current_page); ?>
        <div class="sidebar-group">
            <button onclick="toggleSidebarGroup(this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg <?= $isActive ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="iconify text-xl <?= $isActive ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?>" data-icon="mdi:post-outline"></span>
                    Quản lý nội dung
                </div>
                <span class="iconify text-lg transition-transform duration-300 <?= $isActive ? 'rotate-180 text-red-900' : 'text-gray-400' ?>" data-icon="mdi:chevron-down"></span>
            </button>
            <div class="overflow-hidden transition-all duration-300 <?= $isActive ? 'max-h-[500px]' : 'max-h-0' ?>">
                <div class="mt-1 ml-4 pl-4 border-l border-gray-100 space-y-1">
                    <a href="<?= APP_URL ?>/admin/post" class="flex items-center justify-between px-3 py-2 rounded-lg <?= $current_page === 'bai_viet' ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= $current_page === 'bai_viet' ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:text-box-outline"></span> Quản lý bài viết</span>
                    </a>
                    <a href="<?= APP_URL ?>/admin/banner" class="flex items-center justify-between px-3 py-2 rounded-lg <?= in_array($current_page, ['banner', 'them_banner', 'sua_banner']) ? 'bg-[#6B0D18] text-white font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-[#6B0D18]' ?> transition-colors text-sm group">
                        <span class="flex items-center gap-2"><span class="iconify <?= in_array($current_page, ['banner', 'them_banner', 'sua_banner']) ? 'text-white' : 'text-gray-400 group-hover:text-[#6B0D18]' ?>" data-icon="mdi:view-carousel-outline"></span> Quản lý banner</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Báo cáo & Thống kê -->
        <?php $isActive = isGroupActive($bao_cao_pages, $current_page); ?>
        <div class="sidebar-group">
            <button onclick="toggleSidebarGroup(this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg <?= $isActive ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="iconify text-xl <?= $isActive ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?>" data-icon="mdi:chart-line"></span>
                    Báo cáo & Thống kê
                </div>
                <span class="iconify text-lg transition-transform duration-300 <?= $isActive ? 'rotate-180 text-red-900' : 'text-gray-400' ?>" data-icon="mdi:chevron-down"></span>
            </button>
            <div class="overflow-hidden transition-all duration-300 <?= $isActive ? 'max-h-[500px]' : 'max-h-0' ?>">
                <div class="mt-1 ml-4 pl-4 border-l border-gray-100 space-y-1">
                    <a href="#" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'bao_cao_doanh_thu' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Báo cáo doanh thu
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'bao_cao_san_pham' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Báo cáo sản phẩm
                    </a>
                </div>
            </div>
        </div>

        <!-- Hệ thống & Cấu hình -->
        <?php $isActive = isGroupActive($he_thong_pages, $current_page); ?>
        <div class="sidebar-group">
            <button onclick="toggleSidebarGroup(this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg <?= $isActive ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-red-900' ?> transition-colors group">
                <div class="flex items-center gap-3">
                    <span class="iconify text-xl <?= $isActive ? 'text-red-900' : 'text-gray-400 group-hover:text-red-900' ?>" data-icon="mdi:cog-outline"></span>
                    Hệ thống & Cấu hình
                </div>
                <span class="iconify text-lg transition-transform duration-300 <?= $isActive ? 'rotate-180 text-red-900' : 'text-gray-400' ?>" data-icon="mdi:chevron-down"></span>
            </button>
            <div class="overflow-hidden transition-all duration-300 <?= $isActive ? 'max-h-[500px]' : 'max-h-0' ?>">
                <div class="mt-1 ml-4 pl-4 border-l border-gray-100 space-y-1">
                    <a href="#" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'nhan_vien' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Quản lý nhân viên
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'phan_quyen' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Trang phân quyền
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 rounded-lg <?= $current_page === 'cau_hinh' ? 'bg-red-50 text-red-900 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-red-900' ?> transition-colors text-sm">
                        Cấu hình cửa hàng
                    </a>
                </div>
            </div>
        </div>

    </div>
    
    <!-- User / Logout Bottom Area -->
    <div class="p-4 border-t border-gray-200 bg-gray-50/50">
        <a href="<?= APP_URL ?>/admin/dang-nhap" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-red-50 hover:text-red-900 hover:border-red-200 transition-all font-medium text-sm">
            <span class="iconify text-lg" data-icon="mdi:logout"></span>
            Đăng xuất
        </a>
    </div>

    <!-- Script for Sidebar Accordion -->
    <script>
        function toggleSidebarGroup(button) {
            const container = button.nextElementSibling;
            const icon = button.querySelector('span:last-child');
            const isOpen = container.classList.contains('max-h-[500px]');

            if (isOpen) {
                container.classList.remove('max-h-[500px]');
                container.classList.add('max-h-0');
                icon.classList.remove('rotate-180');
            } else {
                container.classList.remove('max-h-0');
                container.classList.add('max-h-[500px]');
                icon.classList.add('rotate-180');
            }
        }
    </script>
</aside>
