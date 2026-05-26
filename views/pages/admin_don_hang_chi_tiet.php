<?php
// views/pages/admin_don_hang_chi_tiet.php
?>
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="/shopbanhangchuoingoc/admin/don-hang" class="hover:text-[#6B0D18] flex items-center gap-1 transition-colors">
            <span class="iconify" data-icon="mdi:arrow-left"></span>
            Quay lại danh sách
        </a>
        <span>/</span>
        <span>Quản lý đơn hàng</span>
        <span>/</span>
        <span class="font-medium text-gray-900">Chi tiết đơn hàng</span>
    </div>

    <!-- Title Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight flex items-center gap-3">
                Chi tiết đơn hàng 
                <span class="text-[#6B0D18]">#<?= $don_hang['ma_don'] ?></span>
            </h1>
            <div class="text-sm text-gray-500 mt-1 flex items-center gap-4">
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:calendar-outline"></span> Ngày đặt: <?= $don_hang['ngay_dat'] ?></span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:web"></span> Nguồn: <?= $don_hang['nguon_don'] ?></span>
                <span class="flex items-center gap-1"><span class="iconify" data-icon="mdi:account-outline"></span> Xử lý: <?= $don_hang['nhan_vien'] ?></span>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="openPrintModal()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:printer-outline"></span>
                In hóa đơn
            </button>
            <button onclick="openStatusModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span>
                Cập nhật trạng thái
            </button>
        </div>
    </div>

    <!-- Status Overview Card -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 relative overflow-hidden">
        <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-red-50/50 to-transparent pointer-events-none"></div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="text-sm text-gray-500 mb-1">Trạng thái hiện tại</div>
                <div class="flex items-center gap-3">
                    <?php 
                        // Logic badge cho trang thai hien tai
                        $badgeClasses = 'bg-yellow-50 text-yellow-700'; // Default cho Chờ xác nhận
                        $icon = 'mdi:clock-outline';
                        if($don_hang['trang_thai'] == 'Xác nhận đơn hàng') { $badgeClasses = 'bg-blue-50 text-blue-700'; $icon = 'mdi:check-circle-outline'; }
                        if($don_hang['trang_thai'] == 'Đang giao') { $badgeClasses = 'bg-teal-50 text-teal-700'; $icon = 'mdi:truck-delivery-outline'; }
                        if($don_hang['trang_thai'] == 'Đã giao' || $don_hang['trang_thai'] == 'Thành công') { $badgeClasses = 'bg-emerald-50 text-emerald-700'; $icon = 'mdi:check-all'; }
                        if($don_hang['trang_thai'] == 'Đã hủy') { $badgeClasses = 'bg-gray-100 text-gray-600'; $icon = 'mdi:cancel'; }
                    ?>
                    <span class="px-3 py-1.5 rounded-lg text-sm font-bold flex items-center gap-1.5 <?= $badgeClasses ?>">
                        <span class="iconify text-lg" data-icon="<?= $icon ?>"></span>
                        <?= $don_hang['trang_thai'] ?>
                    </span>
                    <span class="text-xs text-gray-400">Cập nhật: <?= $don_hang['thoi_gian_cap_nhat'] ?></span>
                </div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 flex-1 md:border-l border-gray-100 md:pl-6">
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Thanh toán</div>
                    <div class="font-medium text-sm text-gray-900"><?= $don_hang['thanh_toan']['trang_thai'] ?></div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Tổng tiền</div>
                    <div class="font-bold text-[#6B0D18] text-base"><?= number_format($don_hang['chi_tiet_tien']['tong_thanh_toan'], 0, ',', '.') ?>đ</div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Vận chuyển</div>
                    <div class="font-medium text-sm text-gray-900 truncate" title="<?= $don_hang['giao_hang']['phuong_thuc'] ?>"><?= $don_hang['giao_hang']['phuong_thuc'] ?></div>
                </div>
                <div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider mb-1">Sản phẩm</div>
                    <div class="font-medium text-sm text-gray-900"><?= count($don_hang['san_pham']) ?> mã SP</div>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/don_hang/detail_timeline.php'; ?>

    <!-- Quick Actions Bar -->
    <div class="flex items-center gap-3">
        <?php if($don_hang['trang_thai'] == 'Chờ xác nhận'): ?>
            <button onclick="openStatusModal('Xác nhận')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Xác nhận đơn</button>
            <button onclick="openCancelModal()" class="px-5 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">Hủy đơn</button>
        <?php endif; ?>
        
        <button class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:message-outline"></span> Liên hệ khách
        </button>
    </div>

    <!-- 2 Column Layout -->
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Cột Trái (Main Content) -->
        <div class="lg:w-2/3 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/don_hang/detail_products.php'; ?>

        </div>

        <!-- Cột Phải (Sidebar) -->
        <div class="lg:w-1/3 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/don_hang/detail_customer_info.php'; ?>

        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/Admin/don_hang/detail_modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/don_hang/detail_scripts.php'; ?>
